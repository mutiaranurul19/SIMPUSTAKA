<?php

namespace App\Controllers;

use App\Models\BukuModel;

class BukuController extends BaseController
{
    protected $buku;
    protected $db;

    public function __construct()
    {
        $this->buku = new BukuModel();
        $this->db = \Config\Database::connect();
        
    }

    // ================= INDEX =================
  public function index()
{
    $keyword = $this->request->getGet('keyword');

    if ($keyword) {
        $this->buku->like('judul', $keyword);
    }

    $data['buku'] = $this->buku
        ->select('buku.*, kategori.nama_kategori, penulis.nama_penulis, penerbit.nama_penerbit, rak.nama_rak')
        ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
        ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left')
        ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left')
        ->join('buku_rak', 'buku_rak.id_buku = buku.id_buku', 'left')
        ->join('rak', 'rak.id_rak = buku_rak.id_rak', 'left')
        ->paginate(10); 

    $data['pager'] = $this->buku->pager;

    return view('buku/index', $data);
}
    // ================= CREATE =================
    public function create()
{
    $data['kategori'] = $this->db->table('kategori')->get()->getResultArray();
    $data['penulis'] = $this->db->table('penulis')->get()->getResultArray();
    $data['penerbit'] = $this->db->table('penerbit')->get()->getResultArray();
    $data['rak'] = $this->db->table('rak')->get()->getResultArray();

    return view('buku/create', $data);
}

    // ================= STORE =================
   public function store()
{
    $file = $this->request->getFile('cover');
    $namaFile = null;

    if ($file && $file->isValid()) {
        $namaFile = $file->getRandomName();
        $file->move('uploads/cover', $namaFile);
    }

    $data = [
        'isbn' => $this->request->getPost('isbn'),
        'judul' => $this->request->getPost('judul'),
        'id_kategori' => $this->request->getPost('id_kategori'),
        'id_penulis' => $this->request->getPost('id_penulis'),
        'id_penerbit' => $this->request->getPost('id_penerbit'),
        'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        'jumlah' => $this->request->getPost('jumlah'),
        'tersedia' => $this->request->getPost('jumlah'),
        'cover' => $namaFile
    ];

    $this->buku->insert($data);

    $id_buku = $this->buku->insertID();

    $this->db->table('buku_rak')->insert([
        'id_buku' => $id_buku,
        'id_rak' => $this->request->getPost('id_rak')
    ]);

    return redirect()->to('/buku')->with('success', 'Data berhasil ditambah');
}
    // ================= EDIT =================
    public function edit($id)
    {
        $data['buku'] = $this->db->table('buku')
    ->select('buku.*, kategori.nama_kategori, penulis.nama_penulis, penerbit.nama_penerbit, buku_rak.id_rak')
    ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
    ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left')
    ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left')
    ->join('buku_rak', 'buku_rak.id_buku = buku.id_buku', 'left')
    ->join('rak', 'rak.id_rak = buku_rak.id_rak', 'left')
    ->where('buku.id_buku', $id)
    ->get()
    ->getRowArray();
        $data['kategori'] = $this->db->table('kategori')->get()->getResultArray();
        $data['penulis'] = $this->db->table('penulis')->get()->getResultArray();
        $data['penerbit'] = $this->db->table('penerbit')->get()->getResultArray();
        $data['rak'] = $this->db->table('rak')->get()->getResultArray();

        return view('buku/edit', $data);
    }

    // ================= UPDATE =================
    public function update($id)
    {
        $data = $this->request->getPost();

        $this->buku->update($id, $data);

        $this->db->table('buku_rak')
            ->where('id_buku', $id)
            ->update(['id_rak' => $data['id_rak']]);

        return redirect()->to('/buku')->with('success', 'Data berhasil diupdate');
    }

    // ================= DELETE =================
    public function delete($id)
    {
        $this->buku->delete($id);
        return redirect()->to('/buku')->with('success', 'Data dihapus');
    }

    // ================= DETAIL =================
  public function detail($id)
{
    $data['buku'] = $this->db->table('buku')
        ->select('buku.*, 
                  kategori.nama_kategori,
                  penulis.nama_penulis,
                  penerbit.nama_penerbit,
                  rak.nama_rak')
        ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
        ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left')
        ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left')
        ->join('buku_rak', 'buku_rak.id_buku = buku.id_buku', 'left')
        ->join('rak', 'rak.id_rak = buku_rak.id_rak', 'left')
        ->where('buku.id_buku', $id)
        ->get()
        ->getRowArray();
        $ulasan = $this->db->table('ulasan')
    ->select('ulasan.*, users.nama')
    ->join('users', 'users.id = ulasan.id_anggota', 'left')
    ->where('ulasan.id_buku', $id)
    ->get()
    ->getResultArray();

$data['ulasan'] = $ulasan;

    return view('buku/detail', $data);
}

    // ================= PRINT =================
    public function print()
    {
        $data['buku'] = $this->db->table('buku')
            ->select('buku.*, kategori.nama_kategori, penulis.nama_penulis, penerbit.nama_penerbit')
            ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
            ->join('penulis', 'penulis.id_penulis = buku.id_penulis', 'left')
            ->join('penerbit', 'penerbit.id_penerbit = buku.id_penerbit', 'left')
            ->get()
            ->getResultArray();

        return view('buku/print', $data);
    }

    // ================= WA =================
    public function wa($id)
    {
        $buku = $this->db->table('buku')
            ->where('id_buku', $id)
            ->get()
            ->getRowArray();

        $pesan = "Halo, saya ingin meminjam buku: " . $buku['judul'];

        return redirect()->to("https://wa.me/628xxxxxxxxxx?text=" . urlencode($pesan));
    }

}