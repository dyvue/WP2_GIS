<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $beforeInsert = ['generateUUID'];
    protected $allowedFields = ['name', 'email', 'photo', 'is_active', 'password', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected function generateUUID(array $data)
    {
        $data['data']['id'] = bin2hex(random_bytes(16));
        return $data;
    }
}
