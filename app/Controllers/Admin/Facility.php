<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Facility as FacilityModel;
use App\Models\Rooms;

class Facility extends BaseController
{
    public function __construct()
    {
        $this->room = new Rooms();
        $this->facility = new FacilityModel();
    }

    public function index()
    {
        $data = $this->facility->with('rooms')->findAll();
        return view('pages/admin/facility/index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $rooms = $this->room->findAll();
        return view('pages/admin/facility/create', [
            'rooms' => $rooms
        ]);
    }

    public function store()
    {
        $rules = [
            'room_id'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Room type is required.'
                ]
            ],
            'name'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Room Facility is required.'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $this->facility->save([
            'room_id' => $this->request->getVar('room_id'),
            'name' => $this->request->getVar('name'),
        ]);

        session()->setFlashdata('success', 'Berhasil Menyimpan Data.');
        return redirect()->route('facility.index');
    }

    public function edit($id)
    {
        $rooms = $this->room->findAll();

        $facility = $this->facility->with('rooms')->find($id);
        return view('pages/admin/facility/edit', [
            'rooms' => $rooms,
            'facility' => $facility
        ]);
    }

    public function update($id)
    {
        $rules = [
            'room_id'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Room type is required.'
                ]
            ],
            'name'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Room Facility is required.'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $room = $this->facility->find($id);

        if ($room) {
            $params = [
                'id' => $room['id'],
                'room_id' => $this->request->getVar('room_id'),
                'name' => $this->request->getVar('name'),
            ];
            $this->facility->save($params);
            session()->setFlashdata('msg', 'Berhasil Menyimpan Data.');
        } else {
            session()->setFlashdata('msg', 'Gagal Menyimpan Data.');
        }

        return redirect()->route('facility.index');
    }

    public function delete($id)
    {
        $this->facility->delete($id);
        session()->setFlashdata('msg', 'Berhasil Menghapus Data.');
        return redirect()->route('facility.index');
    }
}
