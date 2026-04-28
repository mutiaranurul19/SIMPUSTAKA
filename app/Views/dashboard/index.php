<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- TITLE -->
<div class="mb-4">
    <h3 style="font-weight:700;">📊 Dashboard SIMPUSTAKA</h3>
    <p style="color:#666;">Selamat datang, <?= session('nama') ?> 👋</p>
</div>

<!-- SMALL BOX -->
<div class="row g-3">

    <div class="col-md-3">
        <div class="card text-white bg-primary shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3><?= $total_buku ?></h3>
                    <small>Total Buku</small>
                </div>
                <i class="fa fa-book fa-2x opacity-50"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3><?= $total_anggota ?></h3>
                    <small>Anggota</small>
                </div>
                <i class="fa fa-users fa-2x opacity-50"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3><?= $dipinjam ?></h3>
                    <small>Dipinjam</small>
                </div>
                <i class="fa fa-book-open fa-2x opacity-50"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3><?= $terlambat ?></h3>
                    <small>Terlambat</small>
                </div>
                <i class="fa fa-triangle-exclamation fa-2x opacity-50"></i>
            </div>
        </div>
    </div>

</div>

<!-- TABLE CARD -->
<div class="card mt-4 shadow-sm">
    <div class="card-header bg-dark text-white">
        <i class="fa fa-clock"></i> Recent Peminjaman
    </div>

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="table-light">
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

            <?php if (!empty($recent)): ?>
                <?php foreach($recent as $r): ?>
                    <tr>
                        <td><?= $r['nis'] ?></td>
                        <td><?= $r['nama'] ?></td>
                        <td>
                            <?php if($r['status'] == 'dipinjam'): ?>
                                <span class="badge bg-warning text-dark">Dipinjam</span>
                            <?php else: ?>
                                <span class="badge bg-success">Dikembalikan</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center text-muted py-3">
                        Belum ada data peminjaman
                    </td>
                </tr>
            <?php endif; ?>

            </tbody>

        </table>

    </div>
</div>

<!-- STYLE TAMBAHAN -->
<style>
.card {
    border-radius: 12px;
    border: none;
}

.card-body i {
    opacity: 0.6;
}

.table-hover tbody tr:hover {
    background: #f5f5f5;
}
</style>

<?= $this->endSection() ?>