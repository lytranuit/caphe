<?php

namespace App\Controllers\Admin;

use App\Models\FileModel;

class Product extends BaseController
{

    public function index()
    {
        return view($this->data['content'], $this->data);
    }

    public function add()
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {
            helper("auth");

            $Product_model = model("ProductModel");
            $Product_category_model = model("ProductCategoryModel");
            $Product_image_model = model("ProductImageModel");
            $data = $this->request->getPost();
            $data['user_id'] = user_id();
            $data['slug'] = str_slug($data['name_vi']);
            $obj = new \App\Entities\Product();
            $obj->fill($data);
            $obj->date = date("Y-m-d H:i:s");
            $Product_model->save($obj);
            $id = $Product_model->getInsertID();
            /* CATEGORY */
            if (isset($data['category_list'])) {
                $array_add = $data['category_list'];
                foreach ($array_add as $row) {
                    $array = array(
                        'category_id' => $row,
                        'product_id' => $id
                    );
                    $Product_category_model->insert($array);
                }
            }

            /*
             * Image_other
             */
            // print_r($data['dvt']);
            // die();
            if (isset($data['image_other'])) {
                foreach ($data['image_other'] as $row) {
                    $array = array(
                        'product_id' => $id,
                        'image_id' => $row
                    );
                    $Product_image_model->insert($array);
                }
                // die();
            }
            return redirect()->to(base_url('admin/product'));
        } else {
            //load_editor($this->data);

            $category_model = model("CategoryModel");
            $this->data['category'] = $category_model->where("is_menu", 0)->findAll();
            $this->data['menu'] = $category_model->where("is_menu", 1)->findAll();
            return view($this->data['content'], $this->data);
        }
    }

    public function edit($id)
    { /////// trang ca nhan
        if (isset($_POST['dangtin'])) {

            $Product_model = model("ProductModel");
            $Product_category_model = model("ProductCategoryModel");
            $Product_image_model = model("ProductImageModel");
            $data = $this->request->getPost();
            $related_new = array();
            if (isset($data['category_list'])) {
                $related_new = array_merge($related_new, $data['category_list']);
                unset($data['category_list']);
            }
            //print_r($data);
            //die();

            /* CATEGORY */
            $array = $Product_category_model->where('product_id', $id)->findAll();
            $related_old = array_map(function ($item) {
                return $item['category_id'];
            }, (array) $array);
            $array_delete = array_diff($related_old, $related_new);
            $array_add = array_diff($related_new, $related_old);
            foreach ($array_add as $row) {
                $array = array(
                    'category_id' => $row,
                    'product_id' => $id
                );
                $Product_category_model->insert($array);
            }
            foreach ($array_delete as $row) {
                $array = array(
                    'category_id' => $row,
                    'product_id' => $id
                );
                $Product_category_model->where($array)->delete();
            }

            /*
             * Image_other
             */
            // print_r($data['dvt']);
            // die();
            $Product_image_model->where(array('product_id' => $id))->delete();
            if (isset($data['image_other'])) {
                foreach ($data['image_other'] as $row) {
                    $array = array(
                        'product_id' => $id,
                        'image_id' => $row
                    );
                    $Product_image_model->insert($array);
                }
                // die();
            }

            $obj = $Product_model->create_object($data);
            $Product_model->update($id, $obj);
            return redirect()->to(base_url('admin/product'));
        } else {
            $Product_model = model("ProductModel");
            $category_model = model("CategoryModel");
            $Product_category_model = model("ProductCategoryModel");
            $tin = $Product_model->where(array('id' => $id))->asObject()->first();
            $Product_model->relation($tin, array('image', 'image_other'));
            /*category*/
            $category = $Product_category_model->where(array('product_id' => $id))->findAll();
            //print_r($category);
            //die();

            if (!empty($category)) {
                $cate_id = array();
                foreach ($category as $key => $cate) {
                    $cate_id[] = $cate['category_id'];
                }
                $tin->category_list = $cate_id;
            }
            $this->data['tin'] = $tin;
            //echo "<pre>";
            //print_r($tin);
            //die();
            //load_editor($this->data);
            //            load_chossen($this->data);

            $this->data['category'] = $category_model->where("is_menu", 0)->findAll();
            $this->data['menu'] = $category_model->where("is_menu", 1)->findAll();
            return view($this->data['content'], $this->data);
        }
    }

    public function remove($id)
    { /////// trang ca nhan
        $Product_model = model("ProductModel");
        $Product_model->delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    public function up($id)
    { /////// trang ca nhan
        $Product_model = model("ProductModel");
        $data['date'] = date("Y-m-d H:i:s");
        $obj = $Product_model->create_object($data);
        $Product_model->update($id, $obj);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function table()
    {
        $Product_model = model("ProductModel");
        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $page = ($start / $limit) + 1;
        $where = $Product_model;

        $totalData = $where->countAllResults();
        //echo "<pre>";
        //print_r($totalData);
        //die();
        $totalFiltered = $totalData;

        $where = $Product_model;
        $posts = $where->asObject()->orderby("date", "DESC")->paginate($limit, '', $page);
        //echo "<pre>";
        //print_r($posts);
        //die();
        $posts = $Product_model->image($posts);
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['name_vi'] = $post->name_vi;
                $nestedData['code'] = $post->code;
                $image = isset($post->image->src) ? base_url($post->image->src) : "";
                $nestedData['image'] = "<img src='$image' width='100'/>";
                $nestedData['price'] =  number_format($post->price, 0, ",", ".") . "đ";
                // $image = isset($post->image->src) ? base_url() . $post->image->src : "";
                // $nestedData['image'] = "<img src='$image' width='100'/>";
                $nestedData['date'] =  date("d/m/Y", strtotime($post->date));
                $nestedData['action'] = '<a href="' . base_url("admin/product/up/" . $post->id) . '" class="btn btn-primary btn-sm mr-2" data-type="confirm" title="Up to Top">'
                    . '<i class="fas fa-arrow-alt-circle-up"></i>'
                    . '</i>'
                    . '</a><a href="' . base_url("admin/product/edit/" . $post->id) . '" class="btn btn-warning btn-sm mr-2" title="edit">'
                    . '<i class="fas fa-pencil-alt">'
                    . '</i>'
                    . '</a>'
                    . '<a href="' . base_url("admin/product/remove/" . $post->id) . '" class="btn btn-danger btn-sm" data-type="confirm" title="remove">'
                    . '<i class="far fa-trash-alt">'
                    . '</i>'
                    . '</a>';

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->request->getVar('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
}
