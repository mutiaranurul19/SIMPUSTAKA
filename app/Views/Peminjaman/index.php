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
            <h3 class="fw-bold text-dark mb-1">📅 Transaksi Peminjaman</h3>
        </div>
        <a href="<?= base_url('peminjaman/create') ?>" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px;">
            <i class="fas fa-plus me-1"></i> Tambah Peminjaman
        </a>
    </div>

    <div class="card card-custom">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Anggota</th>
                        <th>Pinjam</th>
                        <th>Kembali</th>
                        <th class="text-center">Buku</th>
                        <th>Status</th>
                        <th class="text-center pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($peminjaman as $p): ?>
                <tr>
                    <td class="ps-4 text-muted small"><?= $no++ ?></td>
                    <td>
                        <div class="fw-bold text-dark"><?= $p['nama_anggota'] ?? 'Data tidak ditemukan' ?></div>
                    </td>
                    <td class="small"><?= esc($p['tanggal_pinjam'] ?? '-') ?></td>
                    <td class="small text-danger fw-bold"><?= esc($p['tanggal_kembali'] ?? '-') ?></td>
                    <td class="text-center">
                        <span class="badge bg-light text-primary border"><?= esc($p['jumlah_buku'] ?? 0) ?> Eks</span>
                    </td>
                    <td>
                        <?php if (($p['status'] ?? '') == 'dipinjam'): ?>
                            <span class="badge badge-status bg-soft-danger text-danger border-danger" style="background:#fff5f5">Dipinjam</span>
                        <?php else: ?>
                            <span class="badge badge-status bg-soft-success text-success border-success" style="background:#f0fff4">Kembali</span>
                        <?php endif; ?>
                    </td>
                    <td class="pe-4">
                        <div class="d-flex justify-content-center gap-1">
                            <a href="<?= base_url('peminjaman/detail/'.$p['id_peminjaman']) ?>" class="btn btn-sm btn-light text-info border" title="Detail"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url('peminjaman/edit/'.$p['id_peminjaman']) ?>" class="btn btn-sm btn-light text-warning border" title="Edit"><i class="fas fa-edit"></i></a>
                            
                            <?php if($p['status'] == 'dipinjam'): ?>
                                <a href="<?= base_url('pengembalian/kembalikan/'.$p['id_peminjaman']) ?>" class="btn btn-sm btn-success shadow-sm" title="Kembalikan"><i class="fas fa-undo-alt"></i></a>
                                <?php if (($p['jumlah_perpanjang'] ?? 0) < 2): ?>
                                    <a href="<?= base_url('peminjaman/perpanjang/'.$p['id_peminjaman']) ?>" class="btn btn-sm btn-primary shadow-sm" title="Perpanjang"><i class="fas fa-history"></i></a>
                                <?php endif; ?>
                            <?php endif; ?>

                            <a href="<?= base_url('peminjaman/print/'.$p['id_peminjaman']) ?>" class="btn btn-sm btn-dark" title="Print"><i class="fas fa-print"></i></a>
                            <a href="<?= base_url('peminjaman/delete/'.$p['id_peminjaman']) ?>" onclick="return confirm('Hapus transaksi ini?')" class="btn btn-sm btn-light text-danger border"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>