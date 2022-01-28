<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'email',
        'password',
        'fullname',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;
}
