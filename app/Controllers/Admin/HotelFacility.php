<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HotelFacility as HotelFacilityModel;

class HotelFacility extends BaseController
{
    public function __construct()
    {
        $this->hotel = new HotelFacilityModel();
    }

    public function index()
    {
        return view('pages/admin/hotel_facility/index', [
            'data' => $this->hotel->findAll()
        ]);
    }

    public function create()
    {
        return view('pages/admin/hotel_facility/create');
    }

    public function store()
    {
        $rules = [
            'name'         => 'required|is_unique[hotel_facilities.name]',
            'image'      => 'uploaded[image]',
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

        $this->hotel->save([
            'name' => $this->request->getVar('name'),
            'image' => 'uploads/image/' . $fileName,
        ]);

        session()->setFlashdata('success', 'Berhasil Menyimpan Data.');
        return redirect()->route('hotel_facility.index');
    }

    public function edit($id)
    {
        $hotel = $this->hotel->find($id);
        return view('pages/admin/hotel_facility/edit', [
            'hotel' => $hotel
        ]);
    }

    public function update($id)
    {
        $rules = [
            'name'         => 'required',
            'image'      => 'uploaded[image]',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $hotel = $this->hotel->find($id);

        if ($hotel) {
            $params = [
                'id' => $hotel['id'],
                'name' => $this->request->getVar('name'),
                'image' => $this->request->getVar('image'),
            ];

            $image = $this->request->getFile('image');
            if ($image->isValid()) {
                $fileName = $image->getRandomName();
                $image->move('uploads/image/', $fileName);
                $params['image'] = 'uploads/image/' . $fileName;
            }

            $this->hotel->save($params);
            session()->setFlashdata('msg', 'Berhasil Menyimpan Data.');
        } else {
            session()->setFlashdata('msg', 'Gagal Menyimpan Data.');
        }

        return redirect()->route('hotel_facility.index');
    }

    public function delete($id)
    {
        $this->hotel->delete($id);
        session()->setFlashdata('msg', 'Berhasil Menghapus Data.');
        return redirect()->route('hotel_facility.index');
    }
}
