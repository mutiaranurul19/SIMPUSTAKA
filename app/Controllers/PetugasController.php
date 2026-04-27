<?php

namespace App\Controllers;

use App\Models\PetugasModel;

class PetugasController extends BaseController
{
    protected $petugas;
    protected $db;

    public function __construct()
    {
        $this->petugas = new PetugasModel();
        $this->db = \Config\Database::connect();
    }

    // LIST
    public function index()
    {
        $data['petugas'] = $this->db->table('petugas')
            ->select('petugas.*, users.nama, users.username')
            ->join('users', 'users.id = petugas.user_id')
            ->get()
            ->getResultArray();

        return view('petugas/index', $data);
    }

    // CREATE
    public function create()
    {
        $data['users'] = $this->db->table('users')
            ->whereIn('role', ['admin','petugas'])
            ->get()
            ->getResultArray();

        return view('petugas/create', $data);
    }

    // STORE
    public function store()
    {
        $this->db->table('petugas')->insert([
            'user_id' => $this->request->getPost('user_id'),
            'jabatan' => $this->request->getPost('jabatan')
        ]);

        return redirect()->to('/petugas')
            ->with('success', 'Petugas berhasil ditambah');
    }

    // EDIT
    public function edit($id)
    {
        $data['petugas'] = $this->petugas->find($id);
        return view('petugas/edit', $data);
    }

    // UPDATE
    public function update($id)
    {
        $this->petugas->update($id, [
            'user_id' => $this->request->getPost('user_id'),
            'jabatan' => $this->request->getPost('jabatan'),
        ]);

        return redirect()->to('/petugas');
    }

    // DELETE
    public function delete($id)
    {
        $this->petugas->delete($id);

        return redirect()->to('/petugas')
            ->with('success', 'Data petugas berhasil dihapus');
    }
}