<?php

namespace App\Models;

use CodeIgniter\Model;
use Tatter\Relations\Traits\ModelTrait;

class Rooms extends Model
{
    use ModelTrait;

    protected $table            = 'rooms';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'type', 'quantity', 'image'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';

    protected $with = ['facilities'];
}
