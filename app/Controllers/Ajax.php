<?php

namespace App\Controllers;

class Ajax extends BaseController
{
    public function index()
    {
        return view($this->data['content'], $this->data);
    }
    function product()
    {
        $category_id = $this->request->getVar("category_id");
        $keyword = $this->request->getVar("keyword");
        $offset = $this->request->getVar("offset");
        $limit = $this->request->getVar("limit");
        $product_model = model("ProductModel");
        $this->data['products'] = $product_model->get_product($category_id, $keyword, $offset, $limit);
        $product_model->relation($this->data['products'], array("image"));
        return view("lib/ajax/product", $this->data);
    }

    function news()
    {
        $tag_id = $this->request->getVar("tag_id");
        $keyword = $this->request->getVar("keyword");
        $offset = $this->request->getVar("offset");
        $limit = $this->request->getVar("limit");
        $news_model = model("NewsModel");
        $this->data['news'] = $news_model->get_news($tag_id, $keyword, $offset, $limit);
        $news_model->relation($this->data['news'], array("image", "user", "user_image"));
        return view("lib/ajax/news", $this->data);
    }
    function images()
    {
        $file_model = model("FileModel");
        $data = $file_model->orderby("id", "desc")->findAll();
        echo json_encode($data);
    }
    /*
     * UPload hình ảnh
     */

    public function uploadimage()
    {
        helper("auth");
        $file_model = model("FileModel");
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        $date = date("Y-m-d");
        $upload_path_url = "uploads/$date/";
        $dir = ROOTPATH . 'uploads/' . $date;
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        //$config['upload_path'] = $dir;
        //$config['allowed_types'] = 'jpg|jpeg|png|gif';
        //$config['max_size'] = '10000';
        //$this->load->library('upload', $config);
        $file = $this->request->getFile('file');
        $real_name = $file->getName();
        $ext = $file->getClientExtension();
        $type = $file->getClientMimeType();
        $size = $file->getSize('kb');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move($dir, $newName);
            $data_up = array(
                'name' => $newName,
                'real_name' => $real_name,
                'src' => $upload_path_url . $newName,
                'file_type' => $type,
                'size' => $size * 1024,
                'user_id' => user_id()
            );
            $id_image = $file_model->insert($data_up);
            $data_up['id'] = $id_image;
            echo json_encode($data_up);
        }
    }
}
