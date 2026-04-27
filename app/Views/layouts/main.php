<!DOCTYPE html>
<html>
<head>
    <title>SIMPUSTAKA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: #1e1e2f;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 20px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #333;
        }

        .sidebar-menu {
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-menu a {
            display: block;
            padding: 10px 18px;
            color: #ddd;
            text-decoration: none;
        }

        .sidebar-menu a:hover {
            background: #34344a;
            color: #fff;
        }

        .sidebar-footer {
            padding: 15px;
            border-top: 1px solid #333;
            font-size: 13px;
        }

        /* CONTENT */
        .content {
            flex: 1;
            background: #f4f6f9;
            padding: 20px;
        }

        .user-photo {
            border-radius: 50%;
            margin-top: 10px;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <!-- HEADER -->
    <div class="sidebar-header">
        SIMPUSTAKA
    </div>

    <!-- MENU -->
    <div class="sidebar-menu">

        <a href="<?= base_url('dashboard') ?>">
            <i class="fa fa-home"></i> Dashboard
        </a>

        <?php if(session('role') == 'admin'): ?>

            <a href="<?= base_url('users') ?>"><i class="fa fa-users"></i> Users</a>
            <a href="<?= base_url('petugas') ?>"><i class="fa fa-user-tie"></i> Petugas</a>

            <hr style="border-color:#444;">

            <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Buku</a>
            <a href="<?= base_url('kategori') ?>"><i class="fa fa-list"></i> Kategori</a>
            <a href="<?= base_url('penerbit') ?>"><i class="fa fa-building"></i> Penerbit</a>
            <a href="<?= base_url('penulis') ?>"><i class="fa fa-pen"></i> Penulis</a>
            <a href="<?= base_url('rak') ?>"><i class="fa fa-archive"></i> Rak Buku</a>

            <hr style="border-color:#444;">

            <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-book-reader"></i> Peminjaman</a>
            <a href="<?= base_url('pengembalian') ?>"><i class="fa fa-rotate-left"></i> Pengembalian</a>

            <hr style="border-color:#444;">

            <a href="<?= base_url('pengaturan') ?>"><i class="fa fa-gear"></i> Setting</a>

        <?php elseif(session('role') == 'petugas'): ?>

            <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Buku</a>
            <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-book-reader"></i> Peminjaman</a>
            <a href="<?= base_url('pengembalian') ?>"><i class="fa fa-rotate-left"></i> Pengembalian</a>

        <?php elseif(session('role') == 'anggota'): ?>

            <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Lihat Buku</a>
            <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-clock"></i> Riwayat Peminjaman</a>

        <?php endif; ?>

        <hr style="border-color:#444;">

        <a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>

        <?php if (session('role') == 'admin') : ?>
            <a href="<?= base_url('backup') ?>"><i class="fa fa-database"></i> Backup DB</a>
            <a href="<?= base_url('restore') ?>"><i class="fa fa-upload"></i> Restore DB</a>
        <?php endif; ?>

    </div>

    <!-- FOOTER USER -->
    <div class="sidebar-footer text-center">

        <div>
            Masuk sebagai:<br>
            <b><?= session('nama'); ?> (<?= session('role'); ?>)</b>
        </div>

        <img class="user-photo" 
             src="<?= base_url('uploads/users/' . session()->get('foto')) ?>" 
             height="70">

    </div>

</div>

<!-- CONTENT -->
<div class="content">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>