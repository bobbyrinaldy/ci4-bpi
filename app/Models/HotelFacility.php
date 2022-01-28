<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelFacility extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hotel_facilities';

    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'image'];

    // Dates
    protected $useTimestamps = true;
}
