<?php

namespace App\Controllers;

class UlasanController extends BaseController
{
    public function store()
    {
        $db = \Config\Database::connect();

        $db->table('ulasan')->insert([
            'id_buku'    => $this->request->getPost('id_buku'),
            'id_anggota' => session('id'), // lebih aman dari hidden input
            'rating'     => $this->request->getPost('rating'),
            'komentar'   => $this->request->getPost('komentar'),
            'tanggal'    => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan');
    }
}