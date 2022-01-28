<?php

namespace App\Models;

use CodeIgniter\Model;
use Tatter\Relations\Traits\ModelTrait;


class Reservation extends Model
{
    use ModelTrait;
    protected $table = 'reservations';

    protected $allowedFields    = [
        'name',
        'email',
        'guess_name',
        'phone',
        'room_id',
        'check_in',
        'check_out',
        'room_total'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $with = 'rooms';
}
