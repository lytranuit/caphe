<?php

namespace App\Models;


use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table      = 'cf_file';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'date', 'src', 'user_id', 'size', 'file_type', 'real_name'];

    //protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = true;
}
