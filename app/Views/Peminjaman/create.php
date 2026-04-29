<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
</style>

<div class="container-fluid py-4">
    <h3 class="fw-bold mb-4">📖 Form Peminjaman</h3>
    
    <form method="post" action="<?= base_url('peminjaman/store') ?>">
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px;">
            <div class="card-body">
                <input type="hidden" name="id_anggota" value="<?= session('id_anggota') ?>">
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white rounded-circle p-3 me-3">
                        <i class="fas fa-user-check fa-lg"></i>
                    </div>
                    <select name="id_anggota" class="form-control" required>
    <option value="">-- Pilih Anggota --</option>
    <?php foreach ($anggota as $a): ?>
        <option value="<?= $a['id_anggota']; ?>">
            <?= $a['nama']; ?>
        </option>
    <?php endforeach; ?>
</select>
                    
                </div>
            </div>
        </div>

        <h5 class="fw-bold text-dark mb-3"><i class="fas fa-book-open text-primary me-2"></i> Pilih Buku (Maksimal 2)</h5>
        
        <div class="row">
            <?php foreach ($buku as $b): ?>
                <div class="col-md-3 mb-4">
                    <label style="display: block; cursor: pointer;">
                        <input type="checkbox" name="id_buku[]" value="<?= $b['id_buku'] ?>" class="book-checkbox">
                        <div class="card h-100 p-2 book-card shadow-sm">
                            <div class="bg-light rounded mb-2 text-center" style="height: 180px; overflow:hidden; display:flex; align-items:center; justify-content:center;">
                                <?php if (!empty($b['cover'])): ?>
                                    <img src="<?= base_url('uploads/cover/'.$b['cover']) ?>" class="img-fluid" style="max-height: 100%;">
                                <?php else: ?>
                                    <span class="text-muted small">No Cover</span>
                                <?php endif; ?>
                            </div>
                            <div class="text-center small fw-bold px-1 text-dark"><?= esc($b['judul']) ?></div>
                        </div>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow" style="border-radius:10px;">PROSES PINJAM</button>
            <a href="<?= base_url('peminjaman') ?>" class="btn btn-light px-4 py-2 border ml-2" style="border-radius:10px;">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>