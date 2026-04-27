<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
  public function index()
{
    $db = \Config\Database::connect();

    $data['total_buku'] = $db->table('buku')->countAll();
    $data['total_anggota'] = $db->table('anggota')->countAll();

    $data['dipinjam'] = $db->table('peminjaman')
        ->where('status', 'dipinjam')
        ->countAllResults();

    $data['terlambat'] = $db->table('pengembalian')
        ->where('denda >', 0)
        ->countAllResults();

    $data['total_denda'] = $db->table('pengembalian')
        ->selectSum('denda')
        ->get()->getRow()->denda ?? 0;

    // CHART 6 BULAN
    $model = new \App\Models\PeminjamanModel();

    $data['chart'] = [
        $model->where('MONTH(tanggal_pinjam)', 1)->countAllResults(),
        $model->where('MONTH(tanggal_pinjam)', 2)->countAllResults(),
        $model->where('MONTH(tanggal_pinjam)', 3)->countAllResults(),
        $model->where('MONTH(tanggal_pinjam)', 4)->countAllResults(),
        $model->where('MONTH(tanggal_pinjam)', 5)->countAllResults(),
        $model->where('MONTH(tanggal_pinjam)', 6)->countAllResults(),
    ];

    // RECENT ACTIVITY
    $data['recent'] = $db->table('peminjaman')
        ->select('peminjaman.*, users.nama, anggota.nis')
        ->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota')
        ->join('users', 'users.id = anggota.user_id')
        ->orderBy('id_peminjaman', 'DESC')
        ->limit(5)
        ->get()->getResultArray();

    return view('dashboard/index', $data);
}
}