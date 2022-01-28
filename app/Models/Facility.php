<?php

namespace App\Models;

use CodeIgniter\Model;
use Tatter\Relations\Traits\ModelTrait;

class Facility extends Model
{
    use ModelTrait;

    protected $table            = 'facilities';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'room_id'];

    // Dates
    protected $useTimestamps = true;

    protected $with = 'rooms';
}
