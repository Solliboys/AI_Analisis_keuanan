<?php

namespace App\Models;

use CodeIgniter\Model;

class LogAuditSistemModel extends Model
{
    protected $table = 'log_audit_sistem';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'aktivitas_yang_dilakukan',
        'waktu_kejadian'
    ];

}
