<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
    </style>
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 text-center" style="border-radius: 15px;">
                <?php if ($buku['cover']): ?>
                    <img src="<?= base_url('uploads/cover/'.$buku['cover']) ?>" 
                         class="img-fluid rounded" style="max-height: 400px; object-fit: contain; background: #f8fafc;">
                <?php else: ?>
                    <div class="bg-light rounded py-5"><i class="fas fa-book fa-5x text-muted"></i><p>No Cover</p></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h3 class="fw-bold">Detail Informasi Buku</h3>
                </div>
                <div class="card-body px-4">
                    <table class="table table-striped table-borderless">
                        <tr><th width="30%">Judul</th><td>: <?= esc($buku['judul']) ?></td></tr>
                        <tr><th>ISBN</th><td>: <?= esc($buku['isbn']) ?></td></tr>
                        <tr><th>Kategori</th><td>: <?= esc($buku['nama_kategori'] ?? '-') ?></td></tr>
                        <tr><th>Penulis</th><td>: <?= esc($buku['nama_penulis'] ?? '-') ?></td></tr>
                        <tr><th>Penerbit</th><td>: <?= esc($buku['nama_penerbit'] ?? '-') ?></td></tr>
                        <tr><th>Rak / Lokasi</th><td>: <?= esc($buku['nama_rak'] ?? '-') ?></td></tr>
                        <tr><th>Tahun Terbit</th><td>: <?= esc($buku['tahun_terbit']) ?></td></tr>
                        <tr><th>Stok Koleksi</th><td>: <?= esc($buku['jumlah']) ?> Buku</td></tr>
                        <tr><th>Tersedia</th><td>: <span class="badge bg-success"><?= esc($buku['tersedia']) ?> Buku</span></td></tr>
                        <tr><th>Deskripsi</th><td>: <p class="text-muted"><?= esc($buku['deskripsi']) ?></p></td></tr>
                    </table>
                </div>
                <div class="card-footer bg-white border-0 pb-4 px-4">
                    <a href="<?= base_url('buku') ?>" class="btn btn-secondary px-4" style="border-radius: 10px;">Kembali</a>
                    <a href="<?= base_url('buku/edit/'.$buku['id_buku']) ?>" class="btn btn-warning px-4" style="border-radius: 10px;">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>