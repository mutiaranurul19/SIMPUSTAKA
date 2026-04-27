<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Data Peminjaman</h3>

        <a href="<?= base_url('peminjaman/create') ?>" class="btn btn-primary">
            + Tambah Peminjaman
        </a>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Jumlah Buku</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
<?php $no = 1; foreach($peminjaman as $p): ?>
<tr>

    <td><?= $no++ ?></td>

    <td><?= $p['nama_anggota'] ?? 'Data tidak ditemukan' ?></td>

    <td><?= esc($p['tanggal_pinjam'] ?? '-') ?></td>

    <td><?= esc($p['tanggal_kembali'] ?? '-') ?></td>

    <td><?= esc($p['jumlah_buku'] ?? 0) ?></td>

    <td>
        <?php if (($p['status'] ?? '') == 'dipinjam'): ?>
            <span class="badge bg-danger">Dipinjam</span>
        <?php else: ?>
            <span class="badge bg-success">Kembali</span>
        <?php endif; ?>
    </td>

    <td class="d-flex gap-1 flex-wrap">

    <!-- DETAIL -->
    <a href="<?= base_url('peminjaman/detail/'.$p['id_peminjaman']) ?>" 
       class="btn btn-info btn-sm">
        👁 Detail
    </a>

    <!-- EDIT -->
    <a href="<?= base_url('peminjaman/edit/'.$p['id_peminjaman']) ?>" 
       class="btn btn-warning btn-sm">
        ✏ Edit
    </a>

    <!-- PERPANJANG -->
    <?php if (($p['jumlah_perpanjang'] ?? 0) < 2): ?>
        <a href="<?= base_url('peminjaman/perpanjang/'.$p['id_peminjaman']) ?>" 
           class="btn btn-success btn-sm">
            ⏳ Perpanjang
        </a>
    <?php else: ?>
        <span class="badge bg-secondary">Max 2x</span>
    <?php endif; ?>

    <!-- HAPUS -->
    <a href="<?= base_url('peminjaman/delete/'.$p['id_peminjaman']) ?>" 
       onclick="return confirm('Yakin ingin menghapus data ini?')" 
       class="btn btn-danger btn-sm">
        🗑 Hapus
    </a>

    <!-- PRINT -->
    <a href="<?= base_url('peminjaman/print/'.$p['id_peminjaman']) ?>" 
       class="btn btn-dark btn-sm">
        🖨 Print
    </a>

</td>

</tr>
<?php endforeach; ?>
</tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>