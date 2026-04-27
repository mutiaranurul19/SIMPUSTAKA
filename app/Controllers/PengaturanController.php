<?php

namespace App\Controllers;

class PengaturanController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['setting'] = $this->db->table('pengaturan')->get()->getRowArray();
        return view('pengaturan/index', $data); 
    }

    public function update()
    {
        $this->db->table('pengaturan')->update([
            'nama_aplikasi'   => $this->request->getPost('nama_aplikasi'),
            'denda_per_hari'  => $this->request->getPost('denda_per_hari'),
            'maksimal_pinjam' => $this->request->getPost('maksimal_pinjam'),
            'lama_pinjam'     => $this->request->getPost('lama_pinjam'),
        ], ['id' => 1]);

        return redirect()->back()->with('success', 'Berhasil disimpan');
    }
}