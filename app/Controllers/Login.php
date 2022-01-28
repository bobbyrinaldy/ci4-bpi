<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Login extends BaseController
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function postAuth()
    {
        $rules = [
            'email'         => 'required',
            'password'      => 'required',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $data = $this->user->where('email', $this->request->getVar('email'))->first();

        if ($data) {
            $authenticatePassword = password_verify($this->request->getVar('password'), $data['password']);
            if ($authenticatePassword) {
                session()->set([
                    'user' => $data,
                    'isLoggedIn' => TRUE
                ]);

                return redirect()->route('dashboard.index');
            } else {
                session()->setFlashdata('error', 'Email or Password is incorrect.');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'User does not exist.');
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function postRegistration()
    {
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('login.index');
    }
}
