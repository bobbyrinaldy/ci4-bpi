<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new User();
        $userModel->save([
            'fullname'     => 'administrator',
            'email'    => 'admin@hotel.com',
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
            'status' => 'admin'
        ]);

        $userModel = new User();
        $userModel->save([
            'fullname'     => 'receptionist',
            'email'    => 'receptionist@hotel.com',
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
            'status' => 'receptionist'
        ]);
    }
}
