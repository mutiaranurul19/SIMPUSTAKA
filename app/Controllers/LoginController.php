<?php

namespace App\Controllers;

use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    //  INI TEMPAT KODE KAMU
    public function proses()
    {
        $model = new UsersModel();

        $request = \Config\Services::request();

        $username = $request->getPost('username');
        $password = $request->getPost('password');

        $user = $model->where('username', $username)->first();

        if (!$user) {
            return redirect()->to('/login')->with('error', 'User tidak ditemukan');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->to('/login')->with('error', 'Password salah');
        }

        session()->set([
        'id_anggota' => $user['id_anggota'],
        'nama'       => $user['nama'],
        ]);

        return redirect()->to('/dashboard');
    }
    public function register()
{
    return view('auth/register');
}

public function saveRegister()
{
    $model = new \App\Models\UserModel();

    $data = [
        'nama'     => $this->request->getPost('nama'),
        'username' => $this->request->getPost('username'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role'     => 'anggota', // default
    ];

    $model->insert($data);

    return redirect()->to('/login')->with('success', 'Akun berhasil dibuat!');
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}