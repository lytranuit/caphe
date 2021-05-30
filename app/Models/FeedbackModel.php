<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table      = 'cf_feedback';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Feedback';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'date', 'content', 'image_id'];



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
    //protected $skipValidation     = true;
}
