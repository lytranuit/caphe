<?php

namespace App\Controllers;


class News extends BaseController
{
    public function index()
    {
        $news_model = model("NewsModel");
        $this->data['news'] = $news_model->paginate(10);
        $this->data['pager'] = $news_model->pager;
        $news_model->image($this->data['news']);
        // echo "<pre>";
        // print_r($this->data['news']);
        // die();
        return view($this->data['content'], $this->data);
    }

    //--------------------------------------------------------------------
    public function view($id)
    {
        $news_model = model("NewsModel");
        $this->data['info'] = $news_model->find($id);
        $news_model->relation($this->data['info'], array("image", 'tags'));
        $this->data['title'] =   $this->data['info']->{pick_language($this->data['info'], "title_")} . $this->data['title'];

        // $tags = array_map(function ($item) {
        //     return $item->tag_id;
        // }, $this->data['info']->tags);
        // //echo "<pre>";
        // //print_r($categories);
        // //die();
        // $this->data['news'] = $news_model->get_news_related($id, $tags);

        $this->data['news'] = $news_model->where("id <>", $id)->orderby("id", "DESC")->limit(10)->findAll();
        // echo "<pre>";
        // print_r($this->data['news']);
        // die();
        return view($this->data['content'], $this->data);
    }
}
