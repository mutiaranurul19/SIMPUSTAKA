<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-0">📦 Data Pengembalian</h3>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3 text-muted small fw-bold">NO</th>
                            <th class="py-3 text-muted small fw-bold">NAMA ANGGOTA</th>
                            <th class="py-3 text-muted small fw-bold">TGL KEMBALI</th>
                            <th class="py-3 text-muted small fw-bold">STATUS</th>
                            <th class="py-3 text-muted small fw-bold">DENDA</th>
                            <th class="py-3 text-muted small fw-bold text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pengembalian)): ?>
                            <?php $no = 1; foreach ($pengembalian as $p): ?>
                            <tr>
                                <td class="ps-4 font-monospace text-muted small"><?= $no++ ?></td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($p['nama'] ?? '-') ?></div>
                                </td>
                                <td><span class="text-secondary small"><?= esc($p['tanggal_dikembalikan'] ?? '-') ?></span></td>
                                <td>
                                    <?php if (($p['denda'] ?? 0) > 0): ?>
                                        <span class="badge rounded-pill bg-soft-danger text-danger px-3" style="background:#FFE3E3">Terlambat</span>
                                    <?php else: ?>
                                        <span class="badge rounded-pill bg-soft-success text-success px-3" style="background:#E3F9E5">Tepat Waktu</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="fw-bold <?= ($p['denda'] ?? 0) > 0 ? 'text-danger' : 'text-muted' ?>">
                                        <?= ($p['denda'] ?? 0) > 0 ? 'Rp ' . number_format($p['denda'],0,',','.') : '-' ?>
                                    </span>
                                </td>
                                <td class="pe-4 text-center">
                                    <div class="btn-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                        <a href="<?= base_url('pengembalian/detail/'.$p['id_pengembalian']) ?>" class="btn btn-white btn-sm border-end" title="Detail"><i class="fas fa-eye text-info"></i></a>
                                        <a href="<?= base_url('pengembalian/edit/'.$p['id_pengembalian']) ?>" class="btn btn-white btn-sm border-end" title="Edit"><i class="fas fa-edit text-warning"></i></a>
                                        <?php if (($p['denda'] ?? 0) > 0): ?>
                                            <a href="<?= base_url('pengembalian/bayar/'.$p['id_pengembalian']) ?>" class="btn btn-white btn-sm border-end" title="Bayar"><i class="fas fa-money-bill-wave text-success"></i></a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('pengembalian/delete/'.$p['id_pengembalian']) ?>" class="btn btn-white btn-sm" onclick="return confirm('Hapus data ini?')" title="Hapus"><i class="fas fa-trash text-danger"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center py-5 text-muted small">Belum ada data pengembalian.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>