<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\AnggotaModel;
use App\Models\PeminjamanModel;

class Dashboard extends BaseController
{
    protected $bukuModel;
    protected $anggotaModel;
    protected $peminjamanModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->anggotaModel = new AnggotaModel();
        $this->peminjamanModel = new PeminjamanModel();

        helper(['url', 'form']);
    }

    public function index()
    {
        $data = [
            'total_buku'       => $this->bukuModel->countAll(),
            'total_anggota'    => $this->anggotaModel->countAll(),
            'total_pinjam'     => $this->peminjamanModel->countAll(),
            'pinjam_aktif'     => $this->peminjamanModel->where('status', 'dipinjam')->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }

    // 🔥 AJAX realtime stats (tanpa reload)
    public function stats()
    {
        $data = [
            'total_buku'    => $this->bukuModel->countAll(),
            'total_anggota' => $this->anggotaModel->countAll(),
            'total_pinjam'  => $this->peminjamanModel->countAll(),
            'pinjam_aktif'  => $this->peminjamanModel->where('status', 'dipinjam')->countAllResults(),
        ];

        return $this->response->setJSON($data);
    }
}