<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\UsersModel;
class AnggotaController extends BaseController
{
    protected $anggota;

    public function __construct()
    {
        $this->anggota = new AnggotaModel();
    }

    // ================= INDEX =================
    public function index()
    {
        $data['anggota'] = $this->anggota
            ->select('anggota.*, users.nama')
            ->join('users', 'users.id = anggota.user_id', 'left')
            ->findAll();

        return view('anggota/index', $data);
    }

    // ================= CREATE =================
    public function create()
    {
        $userModel = new UsersModel();
        $data['users'] = $usersModel->findAll();

        return view('anggota/create', $data);
    }

    // ================= STORE =================
    public function store()
    {
        $this->anggota->save([
            'user_id' => $this->request->getPost('user_id'),
            'nis'     => $this->request->getPost('nis'),
            'alamat'  => $this->request->getPost('alamat'),
            'no_hp'   => $this->request->getPost('no_hp'),
        ]);

        return redirect()->to('/anggota');
    }

    // ================= DETAIL =================
    public function detail($id)
    {
        $data['anggota'] = $this->anggota
            ->select('anggota.*, users.nama')
            ->join('users', 'users.id = anggota.user_id', 'left')
            ->where('id_anggota', $id)
            ->first();

        return view('anggota/detail', $data);
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $userModel = new UsersModel();

        $data['anggota'] = $this->anggota->find($id);
        $data['users']   = $userModel->findAll();

        return view('anggota/edit', $data);
    }

    // ================= UPDATE =================
    public function update($id)
    {
        $this->anggota->update($id, [
            'user_id' => $this->request->getPost('user_id'),
            'nis'     => $this->request->getPost('nis'),
            'alamat'  => $this->request->getPost('alamat'),
            'no_hp'   => $this->request->getPost('no_hp'),
        ]);

        return redirect()->to('/anggota');
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $this->anggota->delete($id);

        return redirect()->to('/anggota');
    }
}