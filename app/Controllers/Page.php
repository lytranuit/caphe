<?php

namespace App\Controllers;


class Page extends BaseController
{
    //public function index()
    //{
    //    //$category_model = model("CategoryModel");
    //    //$category_id = $this->request->getVar("category_id") ?? 0;
    //    //$this->data['category_id'] = $category_id;
    //    //if ($category_id > 0) {
    //    //    $this->data['category'] = $category_model->find($category_id);
    //    //}
    //    //$this->data['categories'] = $category_model->findAll();
    //    //echo "<pre>";
    //    //print_r($this->data['categories']);
    //    //die();
    //    return view($this->data['content'], $this->data);
    //}

    public function landing()
    {
        return view($this->data['content'], $this->data);
    }

    //--------------------------------------------------------------------
    public function view($id)
    {
        $page_model = model("PageModel");
        $this->data['info'] = $page_model->find($id);

        $this->data['title'] =   $this->data['info']->{pick_language($this->data['info'], "title_")} . $this->data['title'];
        //$product_model->relation($this->data['info'], array("image", "image_other", 'categories'));

        //$categories = array_map(function ($item) {
        //    return $item->category_id;
        //}, $this->data['info']->categories);
        ////echo "<pre>";
        ////print_r($categories);
        ////die();
        //$this->data['products'] = $product_model->get_product_related($id, $categories);
        //echo "<pre>";
        //print_r($this->data['products']);
        //die();
        return view($this->data['content'], $this->data);
    }
}
