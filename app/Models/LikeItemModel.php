<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeItemModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'like_item';
    protected $primaryKey       = 'like_item_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['like_item_id','product_id', 'client_id', 'li_created_at', 'li_updated_at', 'li_deleted_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'li_created_at';
    protected $updatedField  = 'li_updated_at';
    protected $deletedField  = 'li_deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
