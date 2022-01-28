<?php

namespace App\Controllers;

use App\Models\Rooms;

class Home extends BaseController
{
    public function index()
    {
        $rooms = (new Rooms)->findAll();

        return view('pages/user/index', [
            'rooms' => $rooms
        ]);
    }
}
