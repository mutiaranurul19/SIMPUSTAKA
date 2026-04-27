<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\AnggotaModel;
use App\Models\BukuModel;

class PeminjamanController extends BaseController
{
    protected $peminjamanModel;
    protected $anggotaModel;
    protected $bukuModel;
    protected $db;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->anggotaModel    = new AnggotaModel();
        $this->bukuModel       = new BukuModel();
        $this->db              = \Config\Database::connect();
    }

    // ================= INDEX =================
   public function index()
{
    $db = \Config\Database::connect();
    
    // Query untuk mengambil data peminjaman lengkap dengan nama anggota
    $builder = $db->table('peminjaman');
    $builder->select('peminjaman.*, users.nama as nama_anggota, COUNT(detail_peminjaman.id_buku) as jumlah_buku');
    
    // JOIN ke tabel anggota
    $builder->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota', 'left');
    
    // JOIN ke tabel users untuk ambil kolom NAMA
    $builder->join('users', 'users.id = anggota.user_id', 'left');
    
    // JOIN ke detail untuk hitung jumlah buku
    $builder->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman', 'left');
    
    $builder->groupBy('peminjaman.id_peminjaman');
    $builder->orderBy('peminjaman.tanggal_pinjam', 'DESC');
    
    $data['peminjaman'] = $builder->get()->getResultArray();

    return view('Peminjaman/index', $data);
}
    // ================= CREATE =================
 public function create() 
{
    $db = \Config\Database::connect();
    
    // Pastikan ini mengambil data dari tabel anggota join ke users
    $anggota = $db->table('anggota')
                  ->select('anggota.id_anggota, anggota.nis, users.nama')
                  ->join('users', 'users.id = anggota.user_id')
                  ->get()->getResultArray();

    $data = [
        'buku'    => $this->bukuModel->findAll(),
        'anggota' => $anggota // Ini akan berisi semua anggota yang ada di database
    ];

    return view('Peminjaman/create', $data);
}
    // ================= STORE =================
    public function store()
{
    $id_anggota = $this->request->getPost('id_anggota');
    $id_buku    = $this->request->getPost('id_buku');
    
    // Jika di form tidak ada input 'tanggal_pinjam', pakai tanggal hari ini
    $pinjam = $this->request->getPost('tanggal_pinjam') ?: date('Y-m-d');

    // Menghitung tanggal kembali (7 hari dari tanggal pinjam)
    $kembali = date('Y-m-d', strtotime($pinjam . ' +7 days'));

    // Cek apakah buku sudah dipilih atau belum untuk menghindari error foreach
    if (empty($id_buku)) {
        return redirect()->back()->with('error', 'Silahkan pilih minimal 1 buku!');
    }

    // 1. Simpan ke tabel peminjaman
    $this->peminjamanModel->save([
        'id_anggota'        => $id_anggota,
        'tanggal_pinjam'    => $pinjam,
        'tanggal_kembali'   => $kembali,
        'status'            => 'dipinjam',
        'jumlah_perpanjang' => 0
    ]);

    // Ambil ID peminjaman yang baru saja masuk
    $id_peminjaman = $this->peminjamanModel->insertID();

    // 2. Simpan detail buku yang dipinjam
    foreach ($id_buku as $b) {
        $this->db->table('detail_peminjaman')->insert([
            'id_peminjaman' => $id_peminjaman,
            'id_buku'       => $b,
            'jumlah'        => 1
        ]);
    }

    return redirect()->to(base_url('peminjaman'))->with('success', 'Peminjaman berhasil disimpan!');
}

   // ================= EDIT =================
public function edit($id)
{
    $data['peminjaman'] = $this->peminjamanModel->find($id);

    $data['anggota'] = $this->db->table('anggota')
        ->select('anggota.id_anggota, anggota.nis, users.nama')
        ->join('users', 'users.id = anggota.user_id')
        ->get()
        ->getResultArray();

    $data['buku'] = $this->bukuModel->findAll();

    $data['dipilih'] = array_column(
        $this->db->table('detail_peminjaman')
            ->where('id_peminjaman', $id)
            ->get()
            ->getResultArray(),
        'id_buku'
        
    );

    return view('peminjaman/edit', $data);
}

    // ================= UPDATE =================
    public function update($id)
    {
        $this->peminjamanModel->update($id, [
            'id_anggota' => $this->request->getPost('id_anggota'),
            'tanggal_pinjam' => $this->request->getPost('tanggal_pinjam'),
            'tanggal_kembali' => $this->request->getPost('tanggal_kembali'),
            'status' => $this->request->getPost('status')
        ]);

        $this->db->table('detail_peminjaman')
            ->where('id_peminjaman', $id)
            ->delete();

        $id_buku = $this->request->getPost('id_buku');

        if ($id_buku) {
            foreach ($id_buku as $b) {
                $this->db->table('detail_peminjaman')->insert([
                    'id_peminjaman' => $id,
                    'id_buku' => $b,
                    'jumlah' => 1
                ]);
            }
        }

        return redirect()->to(base_url('peminjaman'));
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $this->db->table('detail_peminjaman')
            ->where('id_peminjaman', $id)
            ->delete();

        $this->peminjamanModel->delete($id);

        return redirect()->to(base_url('peminjaman'));
    }

    // ================= DETAIL =================
    public function detail($id)
{
    $data['peminjaman'] = $this->db->table('peminjaman')
        ->select('peminjaman.*, users.nama AS nama_anggota')
        ->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota', 'left')
        ->join('users', 'users.id = anggota.user_id', 'left')
        ->where('peminjaman.id_peminjaman', $id)
        ->get()
        ->getRowArray();

    $data['detail'] = $this->db->table('detail_peminjaman')
        ->select('detail_peminjaman.*, buku.judul')
        ->join('buku', 'buku.id_buku = detail_peminjaman.id_buku')
        ->where('detail_peminjaman.id_peminjaman', $id)
        ->get()
        ->getResultArray();

    return view('peminjaman/detail', $data);
}

    // ================= PERPANJANG (MAX 2X) =================
    public function perpanjang($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);

        if (!$peminjaman) {
            return redirect()->to(base_url('peminjaman'));
        }

        $jumlah = $peminjaman['jumlah_perpanjang'] ?? 0;

        if ($jumlah >= 2) {
            return redirect()->to(base_url('peminjaman'))
                ->with('error', 'Maksimal perpanjang hanya 2 kali');
        }

        $tanggalBaru = date('Y-m-d', strtotime($peminjaman['tanggal_kembali'] . ' +7 days'));

        $this->peminjamanModel->update($id, [
            'tanggal_kembali'   => $tanggalBaru,
            'jumlah_perpanjang' => $jumlah + 1
        ]);

        return redirect()->to(base_url('peminjaman'))
            ->with('success', 'Berhasil memperpanjang peminjaman');
    }

    // ================= PRINT =================
    public function print($id)
{
    $data['peminjaman'] = $this->db->table('peminjaman')
        ->select('peminjaman.*, users.nama AS nama_anggota')
        ->join('users', 'users.id = peminjaman.id_anggota', 'left')
        ->where('peminjaman.id_peminjaman', $id)
        ->get()
        ->getRowArray();

    $data['detail'] = $this->db->table('detail_peminjaman')
        ->select('detail_peminjaman.*, buku.judul')
        ->join('buku', 'buku.id_buku = detail_peminjaman.id_buku')
        ->where('detail_peminjaman.id_peminjaman', $id)
        ->get()
        ->getResultArray();

    return view('peminjaman/print', $data);
    
}

}