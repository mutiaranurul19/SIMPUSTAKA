<!DOCTYPE html>
<html>
<head>
    <title>SIMPUSTAKA</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS KAMU -->
    <link href="<?= base_url('assets/css/simpustaka.css') ?>" rel="stylesheet">

<style>
body {
    margin: 0;
    display: flex;
    min-height: 100vh;
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    font-family: 'Segoe UI', sans-serif;
}

/* SIDEBAR */
.sidebar {
    width: 260px;
    background: #111827;
    color: white;
    display: flex;
    flex-direction: column;
}

.sidebar-header {
    padding: 20px;
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
    color: #cbd5e1;
    text-decoration: none;
}

.sidebar-menu a:hover {
    background: #1f2937;
    color: white;
}

/* CONTENT */
.content {
    flex: 1;
    padding: 20px;
    background: transparent;
    color: white;
}

/* FOOTER USER */
.sidebar-footer {
    padding: 15px;
    border-top: 1px solid #333;
    text-align: center;
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

    <div class="sidebar-header">
        SIMPUSTAKA
    </div>

    <div class="sidebar-menu">

        <a href="<?= base_url('dashboard') ?>"><i class="fa fa-home"></i> Dashboard</a>

        <?php if(session('role') == 'admin'): ?>

            <a href="<?= base_url('users') ?>"><i class="fa fa-users"></i> Users</a>
            <a href="<?= base_url('petugas') ?>"><i class="fa fa-user-tie"></i> Petugas</a>

            <hr>

            <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Buku</a>
            <a href="<?= base_url('kategori') ?>"><i class="fa fa-list"></i> Kategori</a>
            <a href="<?= base_url('penerbit') ?>"><i class="fa fa-building"></i> Penerbit</a>
            <a href="<?= base_url('penulis') ?>"><i class="fa fa-pen"></i> Penulis</a>
            <a href="<?= base_url('rak') ?>"><i class="fa fa-archive"></i> Rak</a>

            <hr>

            <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-book-reader"></i> Peminjaman</a>
            <a href="<?= base_url('pengembalian') ?>"><i class="fa fa-rotate-left"></i> Pengembalian</a>

            <hr>

            <a href="<?= base_url('backup') ?>"><i class="fa fa-database"></i> Backup</a>
            <a href="<?= base_url('restore') ?>"><i class="fa fa-upload"></i> Restore</a>

        <?php elseif(session('role') == 'petugas'): ?>

            <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Buku</a>
            <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-book-reader"></i> Peminjaman</a>
            <a href="<?= base_url('pengembalian') ?>"><i class="fa fa-rotate-left"></i> Pengembalian</a>

        <?php else: ?>

            <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Lihat Buku</a>
            <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-clock"></i> Riwayat</a>

        <?php endif; ?>

        <hr>

        <a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>

    </div>

    <div class="sidebar-footer">
        <div>
            <?= session('nama') ?><br>
            <small>(<?= session('role') ?>)</small>
        </div>

        <img class="user-photo"
             src="<?= base_url('uploads/users/' . session()->get('foto')) ?>"
             height="60">
    </div>

</div>

<!-- CONTENT -->
<div class="content">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>