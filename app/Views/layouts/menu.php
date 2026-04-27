<?php $role = strtolower(trim(session('role'))); ?>

<b>SIMPUSTAKA</b>
<hr>

<ul style="list-style:none; padding-left:0;">

    <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>

    <?php if($role == 'admin'): ?>

        <li><a href="<?= base_url('users') ?>">Users</a></li>
        <li><a href="<?= base_url('petugas') ?>">Petugas</a></li>
        <li><a href="<?= base_url('anggota') ?>">Anggota</a></li>

        <li><a href="<?= base_url('buku') ?>">Buku</a></li>
        <li><a href="<?= base_url('kategori') ?>">Kategori</a></li>
        <li><a href="<?= base_url('penerbit') ?>">Penerbit</a></li>
        <li><a href="<?= base_url('penulis') ?>">Penulis</a></li>
        <li><a href="<?= base_url('rak') ?>">Rak Buku</a></li>

        <li><a href="<?= base_url('peminjaman') ?>">Peminjaman</a></li>
        <li><a href="<?= base_url('pengembalian') ?>">Pengembalian</a></li>

        <li><a href="<?= base_url('pengaturan') ?>">Setting</a></li>

    <?php elseif($role == 'petugas'): ?>

        <li><a href="<?= base_url('buku') ?>">Buku</a></li>
        <li><a href="<?= base_url('peminjaman') ?>">Peminjaman</a></li>
        <li><a href="<?= base_url('pengembalian') ?>">Pengembalian</a></li>

    <?php elseif($role == 'anggota'): ?>

        <li><a href="<?= base_url('buku') ?>">Lihat Buku</a></li>
        <li><a href="<?= base_url('peminjaman') ?>">Riwayat Peminjaman</a></li>

    <?php endif; ?>

    <li><a href="<?= base_url('logout') ?>">Log Out</a></li>

    <?php if ($role == 'admin') : ?>
        <li><a href="<?= base_url('backup') ?>">Backup Database</a></li>
        <li><a href="<?= base_url('restore') ?>">Restore DB</a></li>
    <?php endif; ?>

</ul>

<hr>

Masuk sebagai:<br>
<b><?= session('nama'); ?> (<?= session('role'); ?>)</b>

<br><br>

<img src="<?= base_url('uploads/users/' . session()->get('foto')) ?>" height="80">