<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'cf_product';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Product';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['slug', 'code', 'price', 'name_vi', 'description_vi', 'element_vi', 'uses_vi', 'guide_vi', 'name_en', 'description_en', 'element_en', 'uses_en', 'guide_en', 'name_jp', 'description_jp', 'element_jp', 'uses_jp', 'guide_jp', 'date', 'user_id', 'image_id'];



    public function relation(&$data, $relation = array())
    {
        $type = gettype($data);
        if ($type == "array" && !isset($data['id'])) {
            foreach ($data as &$row) {
                if (gettype($row) == "object") {
                    if (in_array("image", $relation)) {
                        $image_id = $row->image_id;
                        $builder = $this->db->table('cf_file');
                        $row->image = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow();
                    }
                    if (in_array("image_other", $relation)) {
                        $product_id = $row->id;
                        $builder = $this->db->table('cf_product_image')->join("cf_file", "cf_product_image.image_id = cf_file.id");
                        $row->image_other = $builder->where('product_id', $product_id)->get()->getResult();
                    }
                    if (in_array("categories", $relation)) {
                        $product_id = $row->id;
                        $builder = $this->db->table('cf_product_category')->join("cf_category", "cf_product_category.category_id = cf_category.id");
                        $row->categories = $builder->where('product_id', $product_id)->get()->getResult();
                    }
                } else {
                    if (in_array("image", $relation)) {
                        $image_id = $row['image_id'];
                        $builder = $this->db->table('cf_file');
                        $row['image'] = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow("array");
                    }
                    if (in_array("image_other", $relation)) {
                        $product_id = $row['id'];
                        $builder = $this->db->table('cf_product_image')->join("cf_file", "cf_product_image.image_id = cf_file.id");
                        $row['image_other'] = $builder->where('product_id', $product_id)->get()->getResult("array");
                    }
                    if (in_array("categories", $relation)) {
                        $product_id = $row['id'];
                        $builder = $this->db->table('cf_product_category')->join("cf_category", "cf_product_category.category_id = cf_category.id");
                        $row['categories'] = $builder->where('product_id', $product_id)->get()->getResult("array");
                    }
                }
            }
        } elseif ($type == "array" && isset($data['id'])) {
            if (in_array("image", $relation)) {
                $image_id = $data['image_id'];
                $builder = $this->db->table('cf_file');
                $data['image'] = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow('array');
            }
            if (in_array("image_other", $relation)) {
                $product_id = $data['id'];
                $builder = $this->db->table('cf_product_image')->join("cf_file", "cf_product_image.image_id = cf_file.id");
                $data['image_other'] = $builder->where('product_id', $product_id)->get()->getResult("array");
            }
            if (in_array("categories", $relation)) {
                $product_id = $data['id'];
                $builder = $this->db->table('cf_product_category')->join("cf_category", "cf_product_category.category_id = cf_category.id");
                $data['categories'] = $builder->where('product_id', $product_id)->get()->getResult("array");
            }
        } else {
            if (in_array("image", $relation)) {
                $image_id = $data->image_id;
                $builder = $this->db->table('cf_file');
                $data->image = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow();
            }
            if (in_array("image_other", $relation)) {
                $product_id = $data->id;
                $builder = $this->db->table('cf_product_image')->join("cf_file", "cf_product_image.image_id = cf_file.id");
                $data->image_other = $builder->where('product_id', $product_id)->get()->getResult();
            }
            if (in_array("categories", $relation)) {
                $product_id = $data->id;
                $builder = $this->db->table('cf_product_category')->join("cf_category", "cf_product_category.category_id = cf_category.id");
                $data->categories = $builder->where('product_id', $product_id)->get()->getResult();
            }
        }
        return $data;
    }

    public function image(&$data)
    {
        $type = gettype($data);
        if ($type == "array" && !isset($data['id'])) {
            foreach ($data as &$row) {
                if (gettype($row) == "object") {
                    $image_id = $row->image_id;
                    $builder = $this->db->table('cf_file');
                    $row->image = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow();
                } else {
                    $image_id = $row['image_id'];
                    $builder = $this->db->table('cf_file');
                    $row['image'] = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow("array");
                }
            }
        } elseif ($type == "array" && isset($data['id'])) {
            $image_id = $data['image_id'];
            $builder = $this->db->table('cf_file');
            $data['image'] = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow('array');
        } else {
            $image_id = $data->image_id;
            $builder = $this->db->table('cf_file');
            $data->image = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow();
        }
        return $data;
    }
    public function get_product_related($id, $categories)
    {
        if (empty($categories)) {
            return array();
        }
        $builder = $this->db->table("cf_product");
        $builder->whereIn('id', function (BaseBuilder $builder) use ($categories) {
            return $builder->select('product_id')->from('cf_product_category')->whereIn('category_id', $categories);
        });
        return $builder->where("deleted_at", NULL)->where("deleted", 0)->where('id !=', $id)->get()->getResult();
    }

    public function get_product($category_id = 0, $keyword = "", $offset = 0, $limit = 20)
    {
        $builder = $this->db->table("cf_product");

        if ($category_id > 0) {
            $builder->whereIn('id', function (BaseBuilder $builder) use ($category_id) {
                return $builder->select('product_id')->from('cf_product_category')->where('category_id', $category_id);
            });
        }
        if ($keyword != "") {
            $builder->groupStart();
            $builder->like('code', $keyword);
            $builder->orLike("name_" . current_language(), $keyword);
            $builder->groupEnd();
        }

        if ($limit > 0) {
            $builder->limit($limit, $offset);
        }
        //print_r($builder->where("deleted_at", NULL)->where("deleted", 0)->orderBy("id", "DESC")->limit($limit, $offset)->getCompiledSelect());
        //die();
        return $builder->where("deleted_at", NULL)->where("deleted", 0)->orderBy("date", "DESC")->get()->getResult();
    }
    function create_object($data)
    {
        $db = $this->db;
        $array = $db->getFieldNames($this->table);
        $obj = array();
        foreach ($array as $key) {
            if (isset($data[$key])) {
                if ($key == "price" || $key == "quantity" || $key == "retail_price" || $key == "min" || $key == "max" || $key == "fee") {
                    $obj[$key] = str_replace(",", "", $data[$key]);
                    $obj[$key] = (float) str_replace(" VND", "", $obj[$key]);
                } else
                    $obj[$key] = $data[$key];
            } else
                continue;
        }

        return $obj;
    }
    //protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = true;
}
