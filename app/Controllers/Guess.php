<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HotelFacility;
use App\Models\Reservation;
use App\Models\Rooms;

class Guess extends BaseController
{
    public function roomList()
    {
        $rooms = (new Rooms())->with('facilities')->findAll();
        return view('pages/user/room', [
            'rooms' => $rooms
        ]);
    }

    public function hotelList()
    {
        $hotels = (new HotelFacility())->findAll();
        return view('pages/user/hotel', [
            'hotels' => $hotels
        ]);
    }

    public function reservation()
    {
        $rules = [
            'email' => 'required',
            'phone' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'room_total' => 'required',
            'room_id' => 'required',
            'name' => 'required',
        ];

        if (!$this->validate($rules)) {
            dd($this->validator->getErrors());
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        (new Reservation())->save([
            'email' => $this->request->getVar('email'),
            'guess_name' => $this->request->getVar('guess_name'),
            'phone' => $this->request->getVar('phone'),
            'check_in' => $this->request->getVar('check_in'),
            'check_out' => $this->request->getVar('check_out'),
            'room_total' => $this->request->getVar('room_total'),
            'room_id' => $this->request->getVar('room_id'),
            'name' => $this->request->getVar('name'),
        ]);

        session()->setFlashdata('success', 'Berhasil Menyimpan Data.');
        return redirect()->route('home');
    }
}
