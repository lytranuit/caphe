<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class LibraryModel extends Model
{
    protected $table      = 'cf_library';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Library';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['slug', 'title_vi', 'title_en', 'title_jp', 'content_vi', 'content_en', 'content_jp', 'date', 'user_id', 'image_id', 'image_url'];




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
                    if (in_array("user", $relation)) {
                        $user_id = $row->user_id;
                        $builder = $this->db->table('users');
                        $row->user = $builder->where('id', $user_id)->limit(1)->get()->getFirstRow();
                        if (in_array("user_image", $relation)) {
                            $image_id = $row->user->image_id;
                            $builder = $this->db->table('cf_file');
                            $row->user->image = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow();
                        }
                    }
                    if (in_array("files", $relation)) {
                        $library_id = $row->id;
                        $builder = $this->db->table('cf_library_file');
                        $row->files = $builder->where('library_id', $library_id)->get()->getResult();
                    }

                    //if (in_array("image_other", $relation)) {
                    //    $Library_id = $row->id;
                    //    $builder = $this->db->table('cf_Library_image')->join("cf_file", "cf_Library_image.image_id = cf_file.id");
                    //    $row->image_other = $builder->where('Library_id', $Library_id)->get()->getResult();
                    //}
                    // if (in_array("tags", $relation)) {
                    //     $Library_id = $row->id;
                    //     $builder = $this->db->table('cf_Library_tag')->join("cf_tag", "cf_Library_tag.tag_id = cf_tag.id");
                    //     $row->tags = $builder->where('Library_id', $Library_id)->get()->getResult();
                    // }
                } else {
                    if (in_array("image", $relation)) {
                        $image_id = $row['image_id'];
                        $builder = $this->db->table('cf_file');
                        $row['image'] = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow("array");
                    }

                    if (in_array("user", $relation)) {
                        $user_id = $row['user_id'];
                        $builder = $this->db->table('users');
                        $row['user'] = $builder->where('id', $user_id)->limit(1)->get()->getFirstRow();
                        if (in_array("user_image", $relation)) {
                            $image_id = $row['user']['image_id'];
                            $builder = $this->db->table('cf_file');
                            $row['user']['image'] = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow("array");
                        }
                    }
                    if (in_array("files", $relation)) {
                        $library_id = $row['id'];
                        $builder = $this->db->table('cf_library_file');
                        $row['files'] = $builder->where('library_id', $library_id)->get()->getResult("array");
                    }
                    // if (in_array("tags", $relation)) {
                    //     $Library_id = $row['id'];
                    //     $builder = $this->db->table('cf_Library_tag')->join("cf_tag", "cf_Library_tag.tag_id = cf_tag.id");
                    //     $row['tags'] = $builder->where('Library_id', $Library_id)->get()->getResult("array");
                    // }
                }
            }
        } elseif ($type == "array" && isset($data['id'])) {
            if (in_array("image", $relation)) {
                $image_id = $data['image_id'];
                $builder = $this->db->table('cf_file');
                $data['image'] = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow('array');
            }

            if (in_array("user", $relation)) {
                $user_id = $data['user_id'];
                $builder = $this->db->table('users');
                $data['user'] = $builder->where('id', $user_id)->limit(1)->get()->getFirstRow();
                if (in_array("user_image", $relation)) {
                    $image_id = $data['user']['image_id'];
                    $builder = $this->db->table('cf_file');
                    $data['user']['image'] = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow('array');
                }
            }
            if (in_array("files", $relation)) {
                $library_id = $data['id'];
                $builder = $this->db->table('cf_library_file');
                $data['files'] = $builder->where('library_id', $library_id)->get()->getResult("array");
            }
            //if (in_array("image_other", $relation)) {
            //    $Library_id = $data['id'];
            //    $builder = $this->db->table('cf_Library_image')->join("cf_file", "cf_Library_image.image_id = cf_file.id");
            //    $data['image_other'] = $builder->where('Library_id', $Library_id)->get()->getResult("array");
            //}
            // if (in_array("tags", $relation)) {
            //     $Library_id = $data['id'];
            //     $builder = $this->db->table('cf_Library_tag')->join("cf_tag", "cf_Library_tag.tag_id = cf_tag.id");
            //     $data['tags'] = $builder->where('Library_id', $Library_id)->get()->getResult("array");
            // }
        } else {
            if (in_array("image", $relation)) {
                $image_id = $data->image_id;
                $builder = $this->db->table('cf_file');
                $data->image = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow();
            }
            if (in_array("user", $relation)) {
                $user_id = $data->user_id;
                $builder = $this->db->table('users');
                $data->user = $builder->where('id', $user_id)->limit(1)->get()->getFirstRow();
                if (in_array("user_image", $relation)) {
                    $image_id = $data->user->image_id;
                    $builder = $this->db->table('cf_file');
                    $data->user->image = $builder->where('id', $image_id)->limit(1)->get()->getFirstRow();
                }
            }
            if (in_array("files", $relation)) {
                $library_id = $data->id;
                $builder = $this->db->table('cf_library_file');
                $data->files = $builder->where('library_id', $library_id)->get()->getResult();
            }
            // if (in_array("tags", $relation)) {
            //     $Library_id = $data->id;
            //     $builder = $this->db->table('cf_Library_tag')->join("cf_tag", "cf_Library_tag.tag_id = cf_tag.id");
            //     $data->tags = $builder->where('Library_id', $Library_id)->get()->getResult();
            // }
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
