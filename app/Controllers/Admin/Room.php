<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Rooms;

class Room extends BaseController
{
    public function __construct()
    {
        $this->room = new Rooms();
    }

    public function index()
    {
        return view('pages/admin/room/index', [
            'data' => $this->room->findAll()
        ]);
    }

    public function create()
    {
        return view('pages/admin/room/create');
    }

    public function store()
    {
        $rules = [
            'type'         => 'required|is_unique[rooms.type]',
            'quantity'      => 'required',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
        $image = $this->request->getFile('image');

        $fileName = '';
        if ($image->isValid()) {
            $fileName = $image->getRandomName();
            $image->move('uploads/image/', $fileName);
        }

        $this->room->save([
            'type' => $this->request->getVar('type'),
            'quantity' => $this->request->getVar('quantity'),
            'image' => 'uploads/image/' . $fileName,
        ]);

        session()->setFlashdata('success', 'Berhasil Menyimpan Data.');
        return redirect()->route('room.index');
    }

    public function edit($id)
    {
        $room = $this->room->find($id);
        return view('pages/admin/room/edit', [
            'room' => $room
        ]);
    }

    public function update($id)
    {
        $rules = [
            'type'         => 'required|is_unique[rooms.type,id,' . $id . ']',
            'quantity'      => 'required',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $room = $this->room->find($id);

        if ($room) {
            $params = [
                'id' => $room['id'],
                'type' => $this->request->getVar('type'),
                'quantity' => $this->request->getVar('quantity'),
            ];

            $image = $this->request->getFile('image');
            if ($image->isValid()) {
                $fileName = $image->getRandomName();
                $image->move('uploads/image/', $fileName);
                $params['image'] = 'uploads/image/' . $fileName;
            }

            $this->room->save($params);
            session()->setFlashdata('msg', 'Berhasil Menyimpan Data.');
        } else {
            session()->setFlashdata('msg', 'Gagal Menyimpan Data.');
        }

        return redirect()->route('room.index');
    }

    public function delete($id)
    {
        $this->room->delete($id);
        session()->setFlashdata('msg', 'Berhasil Menghapus Data.');
        return redirect()->route('room.index');
    }
}
