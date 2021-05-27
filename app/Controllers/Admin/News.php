<?php

namespace App\Controllers\Admin;

use App\Models\FileModel;

class News extends BaseController
{

    public function index()
    {
        return view($this->data['content'], $this->data);
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            helper("auth");

            $news_model = model("NewsModel");
            $news_tag_model = model("NewsTagModel");
            $data = $this->request->getPost();
            $data['user_id'] = user_id();
            $data['slug'] = str_slug($data['title_vi']);
            $obj = new \App\Entities\News();
            $obj->fill($data);
            $obj->date = date("Y-m-d H:i:s");
            $news_model->save($obj);
            $id = $news_model->getInsertID();
            /* CATEGORY */
            if (isset($data['tag_list'])) {

                $array_add = $data['tag_list'];
                foreach ($array_add as $row) {
                    $array = array(
                        'tag_id' => $row,
                        'news_id' => $id
                    );
                    $news_tag_model->insert($array);
                }
            }
            return redirect()->to(base_url('admin/news'));
        } else {
            //load_editor($this->data);

            $tag_model = model("TagModel");
            $this->data['category'] = $tag_model->findAll();
            return view($this->data['content'], $this->data);
        }
    }

    public function edit($id)
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {

            $news_model = model("NewsModel");
            $news_tag_model = model("NewsTagModel");
            $data = $this->request->getPost();
            $related_new = array();
            if (isset($data['tag_list'])) {
                $related_new = array_merge($related_new, $data['tag_list']);
                unset($data['tag_list']);
            }
            //print_r($data);
            //die();

            /* CATEGORY */
            $array = $news_tag_model->where('news_id', $id)->findAll();
            $related_old = array_map(function ($item) {
                return $item['tag_id'];
            }, (array) $array);
            $array_delete = array_diff($related_old, $related_new);
            $array_add = array_diff($related_new, $related_old);
            foreach ($array_add as $row) {
                $array = array(
                    'tag_id' => $row,
                    'news_id' => $id
                );
                $news_tag_model->insert($array);
            }
            foreach ($array_delete as $row) {
                $array = array(
                    'tag_id' => $row,
                    'news_id' => $id
                );
                $news_tag_model->where($array)->delete();
            }



            $obj = $news_model->create_object($data);
            $news_model->update($id, $obj);
            return redirect()->to(base_url('admin/news'));
        } else {
            $news_model = model("NewsModel");
            $tag_model = model("TagModel");
            $news_tag_model = model("NewsTagModel");
            $tin = $news_model->where(array('id' => $id))->asObject()->first();
            $news_model->image($tin);
            /*TAG*/
            $category = $news_tag_model->where(array('news_id' => $id))->findAll();
            //print_r($category);
            //die();

            if (!empty($category)) {
                $cate_id = array();
                foreach ($category as $key => $cate) {
                    $cate_id[] = $cate['tag_id'];
                }
                $tin->tag_list = $cate_id;
            }
            $this->data['tin'] = $tin;
            //echo "<pre>";
            //print_r($tin);
            //die();
            //load_editor($this->data);
            //            load_chossen($this->data);

            $this->data['category'] = $tag_model->findAll();
            return view($this->data['content'], $this->data);
        }
    }

    public function remove($id)
    { /////// trang ca nhan
        $news_model = model("NewsModel");
        $news_model->delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function table()
    {
        $news_model = model("NewsModel");
        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $page = ($start / $limit) + 1;
        $where = $news_model;

        $totalData = $where->countAllResults();
        //echo "<pre>";
        //print_r($totalData);
        //die();
        $totalFiltered = $totalData;

        $where = $news_model;
        $posts = $where->asObject()->orderby("id", "DESC")->paginate($limit, '', $page);
        //echo "<pre>";
        //print_r($posts);
        //die();
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['title_vi'] = $post->title_vi;
                $nestedData['title_en'] = $post->title_en;
                $nestedData['title_jp'] = $post->title_jp;
                // $image = isset($post->image->src) ? base_url() . $post->image->src : "";
                // $nestedData['image'] = "<img src='$image' width='100'/>";
                $nestedData['date'] =  date("d/m/Y", strtotime($post->date));
                $nestedData['action'] = '<a href="' . base_url("admin/news/edit/" . $post->id) . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url("admin/news/remove/" . $post->id) . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
                    . '<i class="far fa-trash-alt">'
                    . '</i>'
                    . '</a>';

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->request->getVar('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
}
