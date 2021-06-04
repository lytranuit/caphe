<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $this->data['title'] =  "Trang chủ" . $this->data['title'];
        //echo $this->data['title'];
        //die();  

        return view($this->data['content'], $this->data);
    }
    public function contact()
    {
        $this->data['title'] =  "Liên hệ" . $this->data['title'];
        //echo $this->data['title'];
        //die();  

        return view($this->data['content'], $this->data);
    }
    public function about()
    {
        $this->data['title'] =  "Giới thiệu" . $this->data['title'];
        //echo $this->data['title'];
        //die();  

        return view($this->data['content'], $this->data);
    }
}
