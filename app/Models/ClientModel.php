<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'client';
    protected $primaryKey       = 'client_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['client_id', 'client_firstname', 'client_lastname', 'client_address', 'client_phonenumber', 'client_email', 'client_description', 'client_appointment_date', 'client_password', 'client_created_at', 'client_updated_at', 'client_deleted_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'client_created_at';
    protected $updatedField  = 'client_updated_at';
    protected $deletedField  = 'client_deleted_at';

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
        if (isset($data['data']['client_password'])) {
            $data['data']['client_password'] = password_hash($data['data']['client_password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}
