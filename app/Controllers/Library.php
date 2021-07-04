<?php

namespace App\Controllers;

use CodeIgniter\Database\BaseBuilder;

class Library extends BaseController
{
    public function index()
    {
        return view($this->data['content'], $this->data);
    }
    //--------------------------------------------------------------------
    public function view($id)
    {
        $Library_model = model("LibraryModel");
        $this->data['info'] = $Library_model->find($id);
        $Library_model->relation($this->data['info'], array("files"));
        // echo "<pre>";
        // print_r($this->data['info']);
        // die();

        $this->data['title'] =   $this->data['info']->{pick_language($this->data['info'], "title_")} . $this->data['title'];
        return view($this->data['content'], $this->data);
    }
}
