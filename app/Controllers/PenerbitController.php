<?php

namespace App\Controllers;

use App\Models\PenerbitModel;

class PenerbitController extends BaseController
{
    protected $penerbit;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->penerbit = new PenerbitModel();
    }

    // ================= INDEX =================
    public function index()
    {
        $data['penerbit'] = $this->db->table('penerbit')
            ->select('id_penerbit, nama_penerbit, alamat')
            ->get()
            ->getResultArray();

        return view('penerbit/index', $data);
    }

    // ================= CREATE =================
    public function create()
    {
        return view('penerbit/create');
    }

    // ================= STORE =================
    public function store()
    {
        $this->penerbit->insert([
            'nama_penerbit' => $this->request->getPost('nama_penerbit'),
            'alamat' => $this->request->getPost('alamat')
        ]);

        return redirect()->to('/penerbit')->with('success', 'Data berhasil ditambah');
    }

    // ================= EDIT =================
   public function edit($id)
{
    $data['penerbit'] = $this->db->table('penerbit')
        ->where('id_penerbit', $id)
        ->get()
        ->getRowArray();

    if (!$data['penerbit']) {
        return redirect()->to('/penerbit')->with('error', 'Data tidak ditemukan');
    }

    return view('penerbit/edit', $data);
}

    // ================= UPDATE =================
    public function update($id)
    {
        $this->penerbit->update($id, [
            'nama_penerbit' => $this->request->getPost('nama_penerbit'),
            'alamat' => $this->request->getPost('alamat')
        ]);

        return redirect()->to('/penerbit')->with('success', 'Data berhasil diupdate');
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $this->penerbit->delete($id);
        return redirect()->to('/penerbit');
    }
}
