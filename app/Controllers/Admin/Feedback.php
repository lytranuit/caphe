<?php

namespace App\Controllers\Admin;

use App\Models\FileModel;

class Feedback extends BaseController
{

    public function index()
    {
        return view($this->data['content'], $this->data);
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            helper("auth");

            $Feedback_model = model("FeedbackModel");
            $data = $this->request->getPost();
            $obj = new \App\Entities\Feedback();
            $obj->fill($data);
            $obj->date = date("Y-m-d H:i:s");
            $Feedback_model->save($obj);
            return redirect()->to(base_url('admin/feedback'));
        } else {
            //load_editor($this->data);
            return view($this->data['content'], $this->data);
        }
    }

    public function edit($id)
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {

            $Feedback_model = model("FeedbackModel");
            $data = $this->request->getPost();
            $obj = $Feedback_model->find($id);
            //echo "<pre>";
            //print_r($obj);
            //die();
            $obj->fill($data);
            $Feedback_model->save($obj);
            return redirect()->to(base_url('admin/feedback'));
        } else {
            $Feedback_model = model("FeedbackModel");
            $tin = $Feedback_model->where(array('id' => $id))->asObject()->first();
            $Feedback_model->image($tin);
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
        $FeedbackModel = model("FeedbackModel");
        $data['date'] = date("Y-m-d H:i:s");
        $obj = $FeedbackModel->create_object($data);
        $FeedbackModel->update($id, $obj);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function remove($id)
    { /////// trang ca nhan
        $Feedback_model = model("FeedbackModel");
        $Feedback_model->delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function table()
    {
        $Feedback_model = model("FeedbackModel");
        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $page = ($start / $limit) + 1;
        $where = $Feedback_model;

        $totalData = $where->countAllResults();
        //echo "<pre>";
        //print_r($totalData);
        //die();
        $totalFiltered = $totalData;

        $where = $Feedback_model;

        $posts = $where->asObject()->orderby("date", "DESC")->paginate($limit, '', $page);
        // echo "<pre>";
        // print_r($posts);
        // die();

        $posts = $Feedback_model->image($posts);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['content'] = $post->content;
                $image = isset($post->image->src) ? base_url($post->image->src) : "";
                $nestedData['image'] = "<img src='$image' width='100'/>";
                // $image = isset($post->image->src) ? base_url() . $post->image->src : "";
                $nestedData['date'] =  date("d/m/Y", strtotime($post->date));
                $nestedData['action'] = '<a href="' . base_url("admin/feedback/up/" . $post->id) . '" class="btn btn-primary btn-sm mr-2" data-type="confirm" title="Up to Top">'
                    . '<i class="fas fa-arrow-alt-circle-up"></i>'
                    . '</i>'
                    . '</a><a href="' . base_url("admin/feedback/edit/" . $post->id) . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url("admin/feedback/remove/" . $post->id) . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
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
