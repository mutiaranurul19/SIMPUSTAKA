<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    // Menampilkan halaman view/auth/login
    public function login()
    {
        return view('auth/login');
    }

    // Memproses data login yang diinput pada halaman login
    public function prosesLogin()
    {
        $session = session();
        $usersModel = new UsersModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $users = $usersModel->getUsersByUsername($username);

        if ($users) {
            if (password_verify($password, $users['password'])) {
                $session->set([
                    'id' => $users['id'],
                    'nama' => $users['nama'],
                    'email' => $users['email'],
                    'username' => $users['username'],
                    'role' => $users['role'],
                    'foto' => $users['foto'],
                    'logged_in' => true
                ]);

                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('salahpw', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Nama tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    // Logout (keluar dari aplikasi)
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    // Menampilkan halaman register
public function register()
{
    return view('auth/register');
}

// Menyimpan data pendaftaran
public function saveRegister()
{
    $usersModel = new UsersModel();

    // ambil file foto
    $fileFoto = $this->request->getFile('foto');

    // cek apakah upload atau tidak
    if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {

        // buat nama random biar ga bentrok
        $namaFoto = $fileFoto->getRandomName();

        // pindahkan ke folder public/uploads/users
        $fileFoto->move('uploads/users/', $namaFoto);

    } else {
        // kalau ga upload, pakai default
        $namaFoto = 'default.png';
    }

    $data = [
        'nama'     => $this->request->getPost('nama'),
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role'     => 'anggota',
        'foto'     => $namaFoto
    ];

    $usersModel->insert($data);

    return redirect()->to('/login')->with('success', 'Akun berhasil dibuat');
}
}