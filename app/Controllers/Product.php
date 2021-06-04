<?php

namespace App\Controllers;

use CodeIgniter\Database\BaseBuilder;

class Product extends BaseController
{
    public function index()
    {
        $product_model = model("ProductModel");
        $this->data['products'] = $product_model->paginate(10);
        $this->data['pager'] = $product_model->pager;
        $product_model->image($this->data['products']);
        echo "<pre>";
        print_r($this->data['products']);
        die();
        return view($this->data['content'], $this->data);
    }
    public function category($category_id)
    {
        $category_model = model("CategoryModel");
        $product_model = model("ProductModel");

        $this->data['category'] = $category_model->find($category_id);
        if ($this->data['category']->is_menu == 1) {
            $this->data['content'] = "frontend/product/menuview";
        } else {
            $this->data['content'] = "frontend/product/productview";
        }

        $this->data['products'] = $product_model->join('cf_product_category', 'cf_product_category.product_id = cf_product.id')->where("category_id", $category_id)->paginate(10);

        $this->data['pager'] = $product_model->join('cf_product_category', 'cf_product_category.product_id = cf_product.id')->where("category_id", $category_id)->pager;

        $product_model->image($this->data['products']);
        // echo "<pre>";
        // print_r($this->data['products']);
        // die();
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
