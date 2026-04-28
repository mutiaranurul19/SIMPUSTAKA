<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setAutoRoute(false);

// Variabel Filter
$authFilter = ['filter' => 'auth'];

// Variabel Role
$admin   = ['filter' => 'role:admin'];
$petugas = ['filter' => 'role:petugas'];
$anggota = ['filter' => 'role:anggota'];
$allRole = ['filter' => 'role:admin,petugas,anggota'];

// Login
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// Halaman utama
$routes->get('/', 'DashboardController::index');
$routes->get('/dashboard', 'DashboardController::index');
// Users
$routes->get('/users/create', 'Users::create');
$routes->post('/users/store', 'Users::store');
$routes->get('/users', 'Users::index', ['filter' => 'role:admin,petugas']);
$routes->get('/users/edit/(:num)', 'Users::edit/$1', $allRole);
$routes->post('/users/update/(:num)', 'Users::update/$1', $allRole);
$routes->get('/users/delete/(:num)', 'Users::delete/$1', $admin);
$routes->get('users/detail/(:num)', 'Users::detail/$1', $allRole); // aksi detail user
$routes->get('users/print', 'Users::print', $allRole); // aksi print data user
$routes->get('users/wa/(:num)', 'Users::wa/$1', $allRole); // aksi kirim ke whatsapp

$routes->get('/buku', 'BukuController::index');
$routes->get('buku/create', 'BukuController::create');
$routes->post('buku/store', 'BukuController::store');
$routes->get('buku/detail/(:num)', 'BukuController::detail/$1');
$routes->get('buku/edit/(:num)', 'BukuController::edit/$1');
$routes->post('buku/update/(:num)', 'BukuController::update/$1');
$routes->get('buku/delete/(:num)', 'BukuController::delete/$1');
$routes->get('buku/print', 'BukuController::print');
$routes->get('/buku/wa/(:num)', 'BukuController::wa/$1');

$routes->get('/peminjaman', 'PeminjamanController::index');
$routes->get('/peminjaman/create', 'PeminjamanController::create');
$routes->post('/peminjaman/store', 'PeminjamanController::store');
$routes->get('/peminjaman/detail/(:num)', 'PeminjamanController::detail/$1');
$routes->get('/peminjaman/delete/(:num)', 'PeminjamanController::delete/$1');
$routes->get('/peminjaman/tambahBuku/(:num)', 'PeminjamanController::tambahBuku/$1');
$routes->post('/peminjaman/simpanBuku', 'PeminjamanController::simpanBuku');
$routes->get('/peminjaman/print', 'PeminjamanController::print');
$routes->get('/peminjaman/edit/(:num)', 'PeminjamanController::edit/$1');
$routes->post('/peminjaman/update/(:num)', 'PeminjamanController::update/$1');
$routes->get('/peminjaman/delete/(:num)', 'PeminjamanController::delete/$1');
$routes->get('peminjaman/hapusBuku/(:num)/(:num)', 'PeminjamanController::hapusBuku/$1/$2');
$routes->post('peminjaman/tambahBuku/(:num)', 'PeminjamanController::tambahBuku/$1');
$routes->get('peminjaman/print/(:num)', 'PeminjamanController::print/$1');
$routes->get('peminjaman/print', 'PeminjamanController::print');
$routes->get('peminjaman/print/(:num)', 'PeminjamanController::print/$1');
$routes->get('/pengembalian', 'PengembalianController::index');
$routes->get('/pengembalian/kembalikan/(:num)', 'PengembalianController::kembalikan/$1');
$routes->get('/pengembalian/print', 'PengembalianController::print');
$routes->get('/pengembalian/detail/(:num)', 'PengembalianController::detail/$1');
$routes->get('/pengembalian/print/(:num)', 'PengembalianController::print/$1');
$routes->get('pengembalian/delete/(:num)', 'PengembalianController::delete/$1');
$routes->get('pengembalian/edit/(:num)', 'PengembalianController::edit/$1');
$routes->post('pengembalian/update/(:num)', 'PengembalianController::update/$1');

$routes->group('kategori', ['filter' => 'role:admin'], function($routes){

    $routes->get('/', 'KategoriController::index');
    $routes->get('create', 'KategoriController::create');
    $routes->post('store', 'KategoriController::store');

    $routes->get('edit/(:num)', 'KategoriController::edit/$1');
    $routes->post('update/(:num)', 'KategoriController::update/$1');

    $routes->get('delete/(:num)', 'KategoriController::delete/$1');

});

$routes->group('penerbit', ['filter' => 'role:admin'], function($routes){

    $routes->get('/', 'PenerbitController::index');
    $routes->get('create', 'PenerbitController::create');
    $routes->post('store', 'PenerbitController::store');

    $routes->get('edit/(:num)', 'PenerbitController::edit/$1');
    $routes->post('update/(:num)', 'PenerbitController::update/$1');

    $routes->get('delete/(:num)', 'PenerbitController::delete/$1');

});

$routes->get('penulis', 'PenulisController::index');
$routes->get('penulis/create', 'PenulisController::create');
$routes->post('penulis/store', 'PenulisController::store');
$routes->get('penulis/edit/(:num)', 'PenulisController::edit/$1');
$routes->post('penulis/update/(:num)', 'PenulisController::update/$1');
$routes->get('penulis/delete/(:num)', 'PenulisController::delete/$1');

$routes->get('rak', 'RakController::index');
$routes->get('rak/create', 'RakController::create');
$routes->post('rak/store', 'RakController::store');
$routes->get('rak/edit/(:num)', 'RakController::edit/$1');
$routes->post('rak/update/(:num)', 'RakController::update/$1');
$routes->get('rak/delete/(:num)', 'RakController::delete/$1');

$routes->get('/petugas', 'PetugasController::index');
$routes->get('/petugas/create', 'PetugasController::create');
$routes->post('/petugas/store', 'PetugasController::store');
$routes->get('/petugas/edit/(:num)', 'PetugasController::edit/$1');
$routes->post('/petugas/update/(:num)', 'PetugasController::update/$1');
$routes->get('/petugas/delete/(:num)', 'PetugasController::delete/$1');

$routes->get('/pengaturan', 'PengaturanController::index');
$routes->post('/pengaturan/update', 'PengaturanController::update');

$routes->get('/peminjaman/perpanjang/(:num)', 'PeminjamanController::perpanjang/$1');

$routes->post('ulasan/store', 'UlasanController::store');

$routes->get('/backup', 'Backup::index');

$routes->get('/restore', 'Restore::index');
$routes->post('/restore/auth', 'Restore::auth');
$routes->get('/restore/form', 'Restore::form');
$routes->post('/restore/process', 'Restore::process');

$routes->get('dashboard', 'Dashboard::index');
$routes->get('users/create', 'Users::create');
$routes->post('users/store', 'Users::store');

$routes->get('peminjaman/perpanjang/(:num)', 'PeminjamanController::perpanjang/$1');

$routes->get('pengembalian/bayar/(:num)', 'PengembalianController::bayar/$1');
$routes->get('dashboard', 'DashboardController::index');

$routes->group('', ['filter' => 'role:admin'], function($routes) {

    $routes->get('users', 'Users::index');
    $routes->get('petugas', 'Petugas::index');
    $routes->get('kategori', 'Kategori::index');
    $routes->get('penerbit', 'Penerbit::index');
    $routes->get('penulis', 'Penulis::index');
    $routes->get('rak', 'Rak::index');
    $routes->get('pengaturan', 'Pengaturan::index');

});
$routes->group('', ['filter' => 'role:admin,petugas'], function($routes) {

    $routes->get('buku', 'Buku::index');
    $routes->get('peminjaman', 'Peminjaman::index');
    $routes->get('pengembalian', 'Pengembalian::index');

});
$routes->group('', ['filter' => 'role:admin,petugas,anggota'], function($routes) {

    $routes->get('dashboard', 'DashboardController::index');

});
$routes->get('anggota', 'AnggotaController::index');
$routes->get('anggota/create', 'AnggotaController::create');
$routes->post('anggota/store', 'AnggotaController::store');

$routes->get('anggota', 'AnggotaController::index');
$routes->get('anggota/create', 'AnggotaController::create');
$routes->post('anggota/store', 'AnggotaController::store');

$routes->get('anggota/detail/(:num)', 'AnggotaController::detail/$1');

$routes->get('anggota/edit/(:num)', 'AnggotaController::edit/$1');
$routes->post('anggota/update/(:num)', 'AnggotaController::update/$1');

$routes->get('anggota/delete/(:num)', 'AnggotaController::delete/$1');

$routes->get('login', 'LoginController::index');
$routes->post('login/proses', 'LoginController::proses');
$routes->get('logout', 'LoginController::logout');

$routes->get('pengembalian/kembalikan/(:num)', 'PengembalianController::kembalikan/$1');

$routes->get('/register', 'Auth::register');
$routes->post('/register/save', 'Auth::saveRegister');
$routes->post('/login', 'Auth::prosesLogin');

// DASHBOARD
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/stats', 'Dashboard::stats'); // 🔥 realtime data
$routes->get('/dashboard/stats', 'Dashboard::stats');