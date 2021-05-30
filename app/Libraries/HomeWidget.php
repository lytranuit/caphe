<?php

namespace App\Libraries;

class HomeWidget
{
    private $data = array();
    public function __construct()
    {
    }
    public function slider()
    {
        $slider_model = model("SliderModel");
        $this->data['sliders'] = $slider_model->orderby("order", "Asc")->findAll();
        $slider_model->image($this->data['sliders']);
        return view("lib/home/slider", $this->data);
    }

    public function page()
    {
        $slider_model = model("PageModel");
        $this->data['pages'] = $slider_model->where("is_home", 1)->orderby("id", "DESC")->findAll();
        $slider_model->image($this->data['pages']);

        //echo "<pre>";
        //print_r($this->data['pages']);
        //die();
        return view("lib/home/page", $this->data);
    }

    public function navbar()
    {
        $menu_model = model("MenuModel");
        $this->data['menus'] = $menu_model->orderby("order", "asc")->findAll();

        //echo "<pre>";
        //print_r($this->data['pages']);
        //die();
        return view("lib/home/navbar", $this->data);
    }

    public function product()
    {
        $Category_model = model("CategoryModel");
        $product_model = model("ProductModel");
        $this->data['categories'] = $Category_model->where("is_menu", 0)->orderby("date", "DESC")->findAll();
        foreach ($this->data['categories'] as $key => &$row) {
            $products = $product_model->get_product($row->id, "", 0, NULL);
            if (!empty($products)) {
                $product_model->relation($products, array('image'));

                $row->products = $products;
            } else {
                unset($this->data['categories'][$key]);
            }
        }

        // echo "<pre>";
        // print_r($this->data['categories']);
        // die();
        return view("lib/home/product", $this->data);
    }

    public function menu()
    {
        $Category_model = model("CategoryModel");
        $product_model = model("ProductModel");
        $this->data['categories'] = $Category_model->where("is_menu", 1)->orderby("date", "DESC")->findAll();
        foreach ($this->data['categories'] as $key => &$row) {
            $products = $product_model->get_product($row->id, "", 0, NULL);
            if (!empty($products)) {
                $product_model->relation($products, array('image'));

                $row->products = $products;
            } else {
                unset($this->data['categories'][$key]);
            }
        }

        // echo "<pre>";
        // print_r($this->data['categories']);
        // die();
        return view("lib/home/menu", $this->data);
    }

    public function feedback()
    {
        $Feedback_model = model("FeedbackModel");
        $this->data['feedback'] = $Feedback_model->orderby("date", "DESC")->findAll();

        $Feedback_model->image($this->data['feedback']);
        // echo "<pre>";
        // print_r($this->data['categories']);
        // die();
        return view("lib/home/feedback", $this->data);
    }

    public function news()
    {
        $news_model = model("NewsModel");
        $this->data['news'] = $news_model->orderby("id", "DESC")->limit(10)->findAll();

        $news_model->image($this->data['news']);
        //echo "<pre>";
        //print_r($this->data['news']);
        //die();
        return view("lib/home/news", $this->data);
    }

    public function footer()
    {
        //return 1;
        $option_model = model("OptionModel");
        $this->data['options'] = $option_model->get_options_in(array("company_name", 'email', "mo_ta", "dia_chi", "hot_line"));

        //$category_model->image($this->data['category']);
        //echo "<pre>";
        //print_r($this->data['options']);
        //die();
        return view("lib/home/footer", $this->data);
    }

    public function chat()
    {
        //return 1;
        //$option_model = model("OptionModel");
        //$this->data['options'] = $option_model->get_options_in(array("fanpage"));

        //$category_model->image($this->data['category']);
        //echo "<pre>";
        //print_r($this->data['options']);
        //die();
        return view("lib/home/chat", $this->data);
    }
    public function category()
    {
        //return 1;
        $category_model = model("CategoryModel");
        $this->data['category'] = $category_model->orderby("id", "ASC")->limit(7)->findAll();

        $category_model->image($this->data['category']);
        //echo "<pre>";
        //print_r($this->data['category']);
        //die();
        return view("lib/home/category", $this->data);
    }
    public function member()
    {
        $user_model = model("UserModel");
        $this->data['users'] = $user_model->orderby("id", "DESC")->limit(10)->findAll();

        $user_model->relation($this->data['users'], array("image"));
        //echo "<pre>";
        //print_r($this->data['news']);
        //die();
        return view("lib/home/member", $this->data);
    }
}
