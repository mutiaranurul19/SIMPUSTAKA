<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

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
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index', $authFilter);

// Users
$routes->get('/users/create', 'Users::create', $admin);
$routes->post('/users/store', 'Users::store', $admin);
$routes->get('/users', 'Users::index', ['filter' => 'role:admin,petugas']);
$routes->get('/users/edit/(:num)', 'Users::edit/$1', $allRole);
$routes->post('/users/update/(:num)', 'Users::update/$1', $allRole);
$routes->get('/users/delete/(:num)', 'Users::delete/$1', $admin);
$routes->get('users/detail/(:num)', 'Users::detail/$1', $allRole); // aksi detail user
$routes->get('users/print', 'Users::print', $allRole); // aksi print data user
$routes->get('users/wa/(:num)', 'Users::wa/$1', $allRole); // aksi kirim ke whatsapp