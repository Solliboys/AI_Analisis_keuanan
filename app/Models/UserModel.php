<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'role_id',
        'nama',
        'email',
        'password',
        'status_aktif'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;



}
