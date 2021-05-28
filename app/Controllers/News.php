<?php

namespace App\Controllers;


class News extends BaseController
{
    public function index()
    {
        $tag_model = model("TagModel");
        $tag_id = $this->request->getVar("tag_id") ?? 0;
        $this->data['tag_id'] = $tag_id;

        if ($tag_id > 0) {
            $this->data['tag'] = $tag_model->find($tag_id);
            $this->data['title'] =   $this->data['tag']->{pick_language($this->data['tag'])} . $this->data['title'];
        } else {
            $this->data['title'] =  "Tin tức" . $this->data['title'];
        }
        $this->data['tags'] = $tag_model->findAll();
        //echo "<pre>";
        //print_r($this->data['news']);
        //die();
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
