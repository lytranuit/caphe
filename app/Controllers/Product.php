<?php

namespace App\Controllers;

use CodeIgniter\Database\BaseBuilder;

class Product extends BaseController
{
    public function index()
    {

        $category_model = model("CategoryModel");
        $category_id = $this->request->getVar("category_id") ?? 0;
        $this->data['category_id'] = $category_id;
        if ($category_id > 0) {
            $this->data['category'] = $category_model->find($category_id);

            $this->data['title'] =   $this->data['category']->{pick_language($this->data['category'])} . $this->data['title'];
        } else {
            $this->data['title'] =  "Sản phẩm" . $this->data['title'];
        }
        $this->data['categories'] = $category_model->findAll();
        //echo "<pre>";
        //print_r($this->data['categories']);
        //die();
        return view($this->data['content'], $this->data);
    }
    public function category($category_id)
    {

        $category_model = model("CategoryModel");
        $this->data['category_id'] = $category_id;
        $this->data['category'] = $category_model->find($category_id);
        $this->data['title'] =   $this->data['category']->{pick_language($this->data['category'])} . $this->data['title'];
        $this->data['categories'] = $category_model->findAll();
        $this->data['content'] = "frontend/product/index";
        //echo "<pre>";
        //print_r($this->data['categories']);
        //die();
        return view($this->data['content'], $this->data);
    }

    //--------------------------------------------------------------------
    public function view($id)
    {
        $product_model = model("ProductModel");
        $this->data['info'] = $product_model->find($id);
        $product_model->relation($this->data['info'], array("image", "image_other", 'categories'));

        $categories = array_map(function ($item) {
            return $item->category_id;
        }, $this->data['info']->categories);
        //echo "<pre>";
        //print_r($categories);
        //die();
        $this->data['products'] = $product_model->get_product_related($id, $categories);
        
        $product_model->relation($this->data['products'], array("image"));
        //echo "<pre>";
        //print_r($this->data['products']);
        //die();

        $this->data['title'] =   $this->data['info']->{pick_language($this->data['info'])} . $this->data['title'];
        return view($this->data['content'], $this->data);
    }
}
