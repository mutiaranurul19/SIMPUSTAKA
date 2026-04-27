<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\DetailPeminjamanModel;
use App\Models\BukuModel;

class PengembalianController extends BaseController
{
    protected $db;
    protected $peminjaman;
    protected $detail;
    protected $buku;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->peminjaman = new PeminjamanModel();
        $this->detail = new DetailPeminjamanModel();
        $this->buku = new BukuModel();
    }

    // ================= LIST =================
   public function index()
{
    $data['pengembalian'] = $this->db->table('pengembalian')
        ->select('
            pengembalian.*,
            peminjaman.id_peminjaman,
            users.nama
        ')
        ->join('peminjaman', 'peminjaman.id_peminjaman = pengembalian.id_peminjaman', 'left')
        ->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota', 'left')
        ->join('users', 'users.id = anggota.user_id', 'left')
        ->get()
        ->getResultArray();

    return view('pengembalian/index', $data);
}

    // ================= PENGEMBALIAN =================
    public function kembalikan($id)
    {
        $setting = $this->db->table('pengaturan')->get()->getRowArray();

        $peminjaman = $this->db->table('peminjaman')
            ->where('id_peminjaman', $id)
            ->get()
            ->getRowArray();

        $tgl_kembali = $peminjaman['tanggal_kembali'];
        $today = date('Y-m-d');

        $denda = 0;

        if ($today > $tgl_kembali) {
            $telat = (strtotime($today) - strtotime($tgl_kembali)) / 86400;
            $denda = $telat * $setting['denda_per_hari'];
        }

        $this->db->table('peminjaman')->update([
            'status' => 'dikembalikan',
            'denda'  => $denda
        ], ['id_peminjaman' => $id]);

        return redirect()->to('/pengembalian')
            ->with('success', 'Buku dikembalikan');
    }

    // ================= STORE =================
    public function store()
    {
        $id_peminjaman = $this->request->getPost('id_peminjaman');

        $cek = $this->db->table('pengembalian')
            ->where('id_peminjaman', $id_peminjaman)
            ->get()
            ->getRowArray();

        if ($cek) {
            return redirect()->back()->with('error', 'Sudah dikembalikan!');
        }

        $peminjaman = $this->db->table('peminjaman')
            ->where('id_peminjaman', $id_peminjaman)
            ->get()
            ->getRowArray();

        $tgl_kembali = $peminjaman['tanggal_kembali'];
        $tgl_dikembalikan = date('Y-m-d');

        $selisih = (strtotime($tgl_dikembalikan) - strtotime($tgl_kembali)) / 86400;

        $denda = ($selisih > 0) ? $selisih * 1000 : 0;

        $status = ($denda > 0) ? 'Terlambat' : 'Tepat Waktu';

        $this->db->table('pengembalian')->insert([
            'id_peminjaman'      => $id_peminjaman,
            'tanggal_dikembalikan' => $tgl_dikembalikan,
            'denda'              => $denda,
            'status'             => $status
        ]);

        $this->db->table('peminjaman')->update([
            'status' => 'dikembalikan'
        ], ['id_peminjaman' => $id_peminjaman]);

        return redirect()->to('/pengembalian')
            ->with('success', 'Buku berhasil dikembalikan');
    }

    // ================= DETAIL =================
    public function detail($id)
    {
        $data['peminjaman'] = $this->db->table('pengembalian')
            ->select('
                pengembalian.*,
                peminjaman.id_peminjaman,
                users.nama,
                anggota.nis
            ')
            ->join('peminjaman', 'peminjaman.id_peminjaman = pengembalian.id_peminjaman', 'left')
            ->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota', 'left')
            ->join('users', 'users.id = anggota.user_id', 'left')
            ->where('pengembalian.id_pengembalian', $id)
            ->get()
            ->getRowArray();

        if (!$data['peminjaman']) {
            return redirect()->to('/pengembalian')
                ->with('error', 'Data tidak ditemukan');
        }

        $data['detail'] = $this->db->table('detail_peminjaman')
            ->select('detail_peminjaman.*, buku.judul')
            ->join('buku', 'buku.id_buku = detail_peminjaman.id_buku')
            ->where('detail_peminjaman.id_peminjaman', $data['peminjaman']['id_peminjaman'])
            ->get()
            ->getResultArray();

        return view('pengembalian/detail', $data);
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $this->db->table('pengembalian')->delete([
            'id_pengembalian' => $id
        ]);

        return redirect()->to('/pengembalian')
            ->with('success', 'Data berhasil dihapus');
    }

    // ================= EDIT =================
    public function edit($id)
{
    $data['pengembalian'] = $this->db->table('pengembalian')
        ->select('pengembalian.*')
        ->where('id_pengembalian', $id)
        ->get()
        ->getRowArray();

    // CEK JIKA DATA KOSONG
    if (!$data['pengembalian']) {
        return redirect()->to('/pengembalian')
            ->with('error', 'Data tidak ditemukan');
    }

    return view('pengembalian/edit', $data);
}

    // ================= UPDATE =================
    public function update($id)
    {
        $denda = $this->request->getPost('denda');

        $this->db->table('pengembalian')->update([
            'denda' => $denda
        ], ['id_pengembalian' => $id]);

        return redirect()->to('/pengembalian')
            ->with('success', 'Data berhasil diupdate');
    }

    // ================= BAYAR =================
    public function bayar($id)
    {
        $this->db->table('pengembalian')->update([
            'denda' => 0,
            'status' => 'Lunas'
        ], ['id_pengembalian' => $id]);

        return redirect()->to('/pengembalian')
            ->with('success', 'Denda berhasil dibayar');
    }
}