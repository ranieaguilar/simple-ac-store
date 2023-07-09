<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'admin_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['admin_id', 'admin_username','admin_password','admin_type', 'admin_status','admin_created_at', 'admin_profile_pic', 'admin_updated_at', 'admin_deleted_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'admin_created_at';
    protected $updatedField  = 'admin_updated_at';
    protected $deletedField  = 'admin_deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['encryptPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['encryptPassword'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function encryptPassword(array $data)
    {
        if (isset($data['data']['admin_password'])) {
            $data['data']['admin_password'] = password_hash($data['data']['admin_password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}
