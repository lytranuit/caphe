<?php

namespace App\Controllers\Admin;

use App\Models\FileModel;

class Category extends BaseController
{

    public $is_menu = 0;
    public function index()
    {
        return view($this->data['content'], $this->data);
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            helper("auth");

            $Category_model = model("CategoryModel");
            $data = $this->request->getPost();
            $data['user_id'] = user_id();
            $data['slug'] = str_slug($data['name_vi']);
            $data['is_menu'] = $this->is_menu;
            $obj = new \App\Entities\Category();
            $obj->fill($data);
            $obj->date = date("Y-m-d H:i:s");
            $Category_model->save($obj);
            return redirect()->to(base_url('admin/category'));
        } else {
            //load_editor($this->data);
            return view($this->data['content'], $this->data);
        }
    }

    public function edit($id)
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {

            $Category_model = model("CategoryModel");
            $data = $this->request->getPost();
            $obj = $Category_model->find($id);
            $data['is_menu'] = $this->is_menu;
            //echo "<pre>";
            //print_r($obj);
            //die();
            $obj->fill($data);
            $Category_model->save($obj);
            return redirect()->to(base_url('admin/category'));
        } else {
            $Category_model = model("CategoryModel");
            $tin = $Category_model->where(array('id' => $id))->asObject()->first();
            $Category_model->image($tin);
            $this->data['tin'] = $tin;
            //echo "<pre>";
            //print_r($tin);
            //die();
            //load_editor($this->data);
            //            load_chossen($this->data);
            return view($this->data['content'], $this->data);
        }
    }

    public function up($id)
    { /////// trang ca nhan
        $CategoryModel = model("CategoryModel");
        $data['date'] = date("Y-m-d H:i:s");
        $obj = $CategoryModel->create_object($data);
        $CategoryModel->update($id, $obj);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function remove($id)
    { /////// trang ca nhan
        $Category_model = model("CategoryModel");
        $Category_model->delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function table()
    {
        $Category_model = model("CategoryModel");
        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $page = ($start / $limit) + 1;
        $where = $Category_model->where("is_menu", $this->is_menu);

        $totalData = $where->countAllResults();
        //echo "<pre>";
        //print_r($totalData);
        //die();
        $totalFiltered = $totalData;

        $where = $Category_model->where("is_menu", $this->is_menu);

        $posts = $where->asObject()->orderby("date", "DESC")->paginate($limit, '', $page);
        //echo "<pre>";
        //print_r($posts);
        //die();

        $posts = $Category_model->image($posts);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['name_vi'] = $post->name_vi;
                $nestedData['description_vi'] = $post->description_vi;
                $image = isset($post->image->src) ? base_url($post->image->src) : "";
                $nestedData['image'] = "<img src='$image' width='100'/>";
                // $image = isset($post->image->src) ? base_url() . $post->image->src : "";
                $nestedData['date'] =  date("d/m/Y", strtotime($post->date));
                $nestedData['action'] = '<a href="' . base_url("admin/category/up/" . $post->id) . '" class="btn btn-primary btn-sm mr-2" data-type="confirm" title="Up to Top">'
                    . '<i class="fas fa-arrow-alt-circle-up"></i>'
                    . '</i>'
                    . '</a><a href="' . base_url("admin/category/edit/" . $post->id) . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url("admin/category/remove/" . $post->id) . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
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
