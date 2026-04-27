<?php

namespace App\Controllers;

use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    // 🔥 INI TEMPAT KODE KAMU
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
            'id' => $user['id'],
            'nama' => $user['nama'],
            'role' => $user['role'],
            'logged_in' => true
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}