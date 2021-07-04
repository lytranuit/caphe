<?php

namespace App\Controllers\Admin;

use App\Models\FileModel;

class Library extends BaseController
{

    public function index()
    {
        return view($this->data['content'], $this->data);
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            helper("auth");

            $Library_model = model("LibraryModel");
            $Library_file_model = model("LibraryFileModel");
            $data = $this->request->getPost();
            $data['user_id'] = user_id();
            $data['slug'] = str_slug($data['title_vi']);
            $obj = new \App\Entities\Library();
            $obj->fill($data);
            $obj->date = date("Y-m-d H:i:s");
            $Library_model->save($obj);
            $id = $Library_model->getInsertID();
            /*
             * files
             */
            // print_r($data['dvt']);
            // die();
            if (isset($data['files'])) {
                foreach ($data['files'] as $row) {
                    $array = array(
                        'library_id' => $id,
                        'file_url' => $row
                    );
                    $Library_file_model->insert($array);
                }
                // die();
            }
            return redirect()->to(base_url('admin/Library'));
        } else {
            //load_editor($this->data);

            return view($this->data['content'], $this->data);
        }
    }

    public function edit($id)
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {

            $Library_model = model("LibraryModel");
            $Library_file_model = model("LibraryFileModel");
            $data = $this->request->getPost();
            /*
             * FILES
             */
            // print_r($data['dvt']);
            // die();
            // echo "<pre>";
            // print_r($data);
            // die();
            $Library_file_model->where(array('library_id' => $id))->delete();
            if (isset($data['files'])) {
                foreach ($data['files'] as $row) {
                    $array = array(
                        'library_id' => $id,
                        'file_url' => $row
                    );
                    $Library_file_model->insert($array);
                }
                // die();
            }
            $obj = $Library_model->create_object($data);
            $Library_model->update($id, $obj);
            return redirect()->to(base_url('admin/Library'));
        } else {
            $Library_model = model("LibraryModel");
            $tin = $Library_model->where(array('id' => $id))->asObject()->first();
            $Library_model->relation($tin, array('image', 'files'));


            $this->data['tin'] = $tin;
            //echo "<pre>";
            //print_r($tin);
            //die();
            //load_editor($this->data);
            //            load_chossen($this->data);
            return view($this->data['content'], $this->data);
        }
    }

    public function remove($id)
    { /////// trang ca nhan
        $Library_model = model("LibraryModel");
        $Library_model->delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function table()
    {
        $Library_model = model("LibraryModel");
        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $page = ($start / $limit) + 1;
        $where = $Library_model;

        $totalData = $where->countAllResults();
        //echo "<pre>";
        //print_r($totalData);
        //die();
        $totalFiltered = $totalData;

        $where = $Library_model;
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
                $nestedData['action'] = '<a href="' . base_url("admin/Library/edit/" . $post->id) . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url("admin/Library/remove/" . $post->id) . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
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
