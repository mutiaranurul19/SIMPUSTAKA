<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $users;

    public function __construct()
    {
        $this->users = new \App\Models\UsersModel();
    }

    public function create()
    {
        return view('users/create');
    }

    // Menyimpan data user baru
    public function store()
    {
        // ================= VALIDASI =================
        // Mengambil service validation dari CodeIgniter
        $validation = \Config\Services::validation();

        // Menentukan aturan validasi
        $validation->setRules([
            'nama'     => 'required', // wajib diisi
            'email'    => 'required|valid_email', // wajib & format email valid
            'username' => 'required|is_unique[users.username]', // unik di tabel users
            'password' => 'required|min_length[4]', // minimal 4 karakter
            'role'     => 'required', // wajib diisi
        ]);

        // Jika validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            // Kembali ke halaman sebelumnya + tampilkan error
            return redirect()->back()->with('error', implode('<br>', $validation->getErrors()));
        }

        // ================= UPLOAD FOTO =================
        // Mengambil file dari input name="foto"
        $foto = $this->request->getFile('foto');

        // Default nama foto null
        $namaFoto = null;

        // Jika ada file & valid & belum dipindahkan
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Generate nama random untuk menghindari konflik nama file
            $namaFoto = $foto->getRandomName();

            // Pindahkan file ke folder public/uploads/users
            $foto->move(FCPATH . 'uploads/users', $namaFoto);
        }

        // ================= SIMPAN DATA =================
        $this->users->save([
            'nama'     => $this->request->getPost('nama'), // ambil dari form
            'email'    => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            // Password di-hash untuk keamanan
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
            'foto'     => $namaFoto // simpan nama file foto
        ]);

        // Redirect ke halaman login + pesan sukses
        return redirect()->to('/login')->with('success', 'User berhasil ditambahkan!');
    }

    // Menampilkan daftar user (dengan filter & pagination)
  public function index()
{
    $model = new \App\Models\UsersModel();

    $perPage = 10;

    $keyword = $this->request->getGet('keyword');
    $role    = $this->request->getGet('role');

    if ($keyword) {
        $model->like('nama', $keyword);
    }

    if ($role) {
        $model->where('role', $role);
    }

    //  INI BAGIAN YANG KAMU TANYA
    $data['users'] = $model->paginate($perPage);
    $data['pager'] = $model->pager;
    $data['no'] = 1 + ($perPage * ($data['pager']->getCurrentPage() - 1));

    $data['keyword'] = $keyword;
    $data['role'] = $role;

    return view('users/index', $data);
}
    // Update data user
    public function update($id)
    {
        // Ambil data user lama
        $user = $this->users->find($id);

        // Ambil file foto baru
        $fotoBaru = $this->request->getFile('foto');

        // Default pakai foto lama
        $namaFoto = $user['foto'];

        // Jika user upload foto baru
        if ($fotoBaru && $fotoBaru->isValid() && $fotoBaru->getName() != '') {

            // Hapus foto lama jika ada di folder
            if (!empty($user['foto']) && file_exists(FCPATH . 'uploads/users/' . $user['foto'])) {
                unlink(FCPATH . 'uploads/users/' . $user['foto']);
            }

            // Generate nama baru
            $namaFoto = $fotoBaru->getRandomName();

            // Simpan file baru
            $fotoBaru->move(FCPATH . 'uploads/users', $namaFoto);
        }

        // Data yang akan diupdate
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'role'     => $this->request->getPost('role'),
            'foto'     => $namaFoto
        ];

        // Jika password diisi → update password
        if ($this->request->getPost('password') != "") {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Jalankan update ke database
        $this->users->update($id, $data);

        // Redirect dengan pesan sukses
        return redirect()->to('/users')->with('success', 'Data user berhasil diupdate!');
    }

    // Menghapus user
    public function delete($id)
    {
        // Ambil data user
        $user = $this->users->find($id);

        // Hapus foto jika ada
        if ($user['foto'] && file_exists(FCPATH . 'uploads/users/' . $user['foto'])) {
            unlink(FCPATH . 'uploads/users/' . $user['foto']);
        }

        // Hapus data user di database
        $this->users->delete($id);

        // Redirect dengan pesan sukses
        return redirect()->to('/users')->with('success', 'User berhasil dihapus!');
    }

    // ================= DETAIL USER =================
    public function detail($id)
    {
        // Ambil data user
        $user = $this->users->find($id);

        // Jika tidak ditemukan
        if (!$user) {
            return redirect()->to('/users')->with('error', 'Data tidak ditemukan');
        }

        // Tampilkan detail
        return view('users/detail', ['user' => $user]);
    }

    // ================= PRINT DATA =================
    public function print()
    {
        // Ambil filter
        $keyword = $this->request->getGet('keyword');
        $role = $this->request->getGet('role');

        // Builder query
        $builder = $this->users;

        // Filter keyword
        if ($keyword) {
            $builder = $builder->like('nama', $keyword);
        }

        // Filter role
        if ($role) {
            $builder = $builder->where('role', $role);
        }

        // Ambil semua data (tanpa pagination)
        $data['users'] = $builder->findAll();

        // Tampilkan view print
        return view('users/print', $data);
    }

    // ================= KIRIM WHATSAPP =================
    public function wa($id)
    {
        // Ambil data user
        $user = $this->users->find($id);

        // Jika tidak ada
        if (!$user) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // ================= FORMAT PESAN =================
        $pesan = "DATA USER\n\n";
        $pesan .= "ID: " . $user['id'] . "\n";
        $pesan .= "Nama: " . $user['nama'] . "\n";
        $pesan .= "Email: " . $user['email'] . "\n";
        $pesan .= "Username: " . $user['username'] . "\n";
        $pesan .= "Role: " . ucfirst($user['role']) . "\n";

        // Encode agar aman di URL
        $url = "https://wa.me/6285175017991?text=" . urlencode($pesan);

        // Redirect ke WhatsApp
        return redirect()->to($url);
    }
    public function edit($id)
{
    $data['user'] = $this->users->find($id);

    if (!$data['user']) {
        return redirect()->to('/users')->with('error', 'Data tidak ditemukan');
    }

    return view('users/edit', $data);
}
}