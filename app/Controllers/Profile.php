<?php

namespace App\Controllers;

class Profile extends BaseController
{

    public function index()
    {
        return view($this->data['content'], $this->data);
    }
    public function view($id)
    {
        $user_model = model("UserModel");
        $this->data['info'] = $user_model->find($id);
        $user_model->relation($this->data['info'], array("image"));
        return view($this->data['content'], $this->data);
    }
}
