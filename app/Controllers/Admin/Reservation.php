<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Reservation as ModelsReservation;

class Reservation extends BaseController
{
    public function index()
    {
        $model = (new ModelsReservation());
        $data = $model->with('rooms')->findAll();
        return view('pages/admin/reservation/index', [
            'data' => $data
        ]);
    }
}
