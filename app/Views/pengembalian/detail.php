<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
</style>

<div class="container-fluid py-4" style="background-color: #E3F2FD;">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <h6 class="text-uppercase text-muted fw-bold small mb-4">Ringkasan Transaksi</h6>
                    <div class="text-center mb-4">
                        <div class="avatar bg-soft-primary text-primary rounded-circle mb-3 mx-auto shadow-sm" style="width: 60px; height: 60px; line-height: 60px; background: #E3F2FD;">
                            <i class="fas fa-user-check fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-0"><?= esc($peminjaman['nama'] ?? '-') ?></h5>
                        <span class="text-muted small">ID Anggota: <?= esc($peminjaman['nis'] ?? '-') ?></span>
                    </div>

                    <hr class="opacity-10">

                    <div class="mb-3">
                        <label class="d-block text-muted small">Status Kembali</label>
                        <span class="badge w-100 py-2 bg-info shadow-sm" style="border-radius: 8px;">
                            <i class="fas fa-clock me-2"></i><?= strtoupper(esc($peminjaman['status'] ?? '-')) ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <label class="d-block text-muted small">Tanggal Pengembalian</label>
                        <span class="fw-bold"><i class="far fa-calendar-alt text-primary me-2"></i><?= esc($peminjaman['tanggal_dikembalikan'] ?? '-') ?></span>
                    </div>

                    <div class="p-3 bg-light rounded-3 text-center border">
                        <label class="d-block text-muted small">Total Denda</label>
                        <h4 class="fw-bold text-danger mb-0">Rp <?= number_format($peminjaman['denda'] ?? 0, 0, ',', '.') ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0"><i class="fas fa-book-open text-primary me-2"></i> Daftar Buku Dikembalikan</h5>
                </div>
                <div class="card-body px-4">
                    <table class="table align-middle">
                        <thead class="small text-muted text-uppercase">
                            <tr>
                                <th>Judul Buku</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail as $d): ?>
                            <tr>
                                <td class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3"><i class="fas fa-book text-muted"></i></div>
                                        <span class="fw-bold text-dark"><?= esc($d['judul']) ?></span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary px-3 rounded-pill">x<?= esc($d['jumlah']) ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <div class="mt-4 border-top pt-3 text-end">
                        <a href="<?= base_url('pengembalian') ?>" class="btn btn-secondary border-0 px-4" style="border-radius: 10px;">Kembali</a>
                        <button onclick="window.print()" class="btn btn-dark border-0 px-4 ms-2" style="border-radius: 10px;">
                            <i class="fas fa-print me-2"></i> Cetak Struk
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>