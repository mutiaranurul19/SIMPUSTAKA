<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    } 
    .card-custom { 
        border: none !important; 
        border-radius: 15px !important; 
        box-shadow: 0 8px 30px rgba(0,0,0,0.05) !important; 
    }

    .form-control { 
        border-radius: 10px; 
        border: 1px solid #e2e8f0; 
    }

    /* Styling Kartu Buku */
    .book-card { 
        border: 2px solid transparent; 
        border-radius: 15px; 
        transition: all 0.3s ease; 
        background: #fff;
    }

    /* Sembunyikan checkbox asli, gunakan card sebagai pemicu */
    .book-checkbox { 
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .book-checkbox:checked + .book-card { 
        border-color: #0d6efd; 
        background-color: #f0f7ff; 
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.15) !important;
    }

    .book-checkbox:checked + .book-card .check-icon {
        display: block !important;
    }

    .check-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #0d6efd;
        color: white;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        display: none;
        text-align: center;
        line-height: 25px;
        z-index: 10;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-warning text-white rounded-circle p-3 me-3 shadow-sm">
            <i class="fas fa-edit fa-lg"></i>
        </div>
        <div>
            <h3 class="fw-bold text-dark mb-0">Edit Transaksi Peminjaman</h3>
            <p class="text-muted small">Perbarui data atau buku yang dipinjam oleh anggota.</p>
        </div>
    </div>

    <form action="<?= base_url('peminjaman/update/' . $peminjaman['id_peminjaman']) ?>" method="post">
        <div class="row">

            <div class="col-md-4">
                <div class="card card-custom mb-4">
                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <h5 class="fw-bold"><i class="fas fa-file-alt text-primary me-2"></i> Informasi Utama</h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Nama Anggota</label>
                            <select name="id_anggota" class="form-control form-select shadow-sm" required>
                                <?php foreach ($anggota as $a): ?>
                                    <option value="<?= $a['id_anggota'] ?>" <?= ($a['id_anggota'] == $peminjaman['id_anggota']) ? 'selected' : '' ?>>
                                        <?= esc($a['nama']) ?> (<?= esc($a['nis']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam'] ?>" class="form-control shadow-sm">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Target Kembali</label>
                            <input type="date" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali'] ?>" class="form-control shadow-sm text-danger fw-bold">
                        </div>

                        <div class="mb-0">
                            <label class="form-label small fw-bold text-muted">Status Transaksi</label>
                            <select name="status" class="form-control form-select shadow-sm">
                                <option value="dipinjam" <?= ($peminjaman['status'] == 'dipinjam') ? 'selected' : '' ?>>Dipinjam</option>
                                <option value="dikembalikan" <?= ($peminjaman['status'] == 'dikembalikan') ? 'selected' : '' ?>>Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary py-3 fw-bold shadow" style="border-radius: 12px;">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                    <a href="<?= base_url('peminjaman') ?>" class="btn btn-light py-2 border">
                        Batal
                    </a>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between">
                        <h5 class="fw-bold"><i class="fas fa-book text-primary me-2"></i> Pilih Koleksi Buku</h5>
                        <span class="badge bg-light text-primary border px-3">Maksimal 2 Buku</span>
                    </div>
                    <div class="card-body px-4">
                        <div class="row">
                            <?php foreach ($buku as $b): ?>
                                <div class="col-md-4 mb-4">
                                    <label class="w-100 mb-0 position-relative">
                                        <input type="checkbox" name="id_buku[]" value="<?= $b['id_buku'] ?>" 
                                               class="book-checkbox" <?= in_array($b['id_buku'], $dipilih) ? 'checked' : '' ?>>
                                        
                                        <div class="card h-100 p-2 book-card shadow-sm">
                                            <div class="check-icon shadow-sm"><i class="fas fa-check"></i></div>
                                            
                                            <div class="bg-light rounded-3 mb-2 d-flex align-items-center justify-content-center overflow-hidden" style="height: 180px;">
                                                <?php if (!empty($b['cover'])): ?>
                                                    <img src="<?= base_url('uploads/cover/' . $b['cover']) ?>" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                                                <?php else: ?>
                                                    <div class="text-muted text-center">
                                                        <i class="fas fa-image fa-2x mb-1 d-block opacity-25"></i>
                                                        <span class="small">No Cover</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="text-center px-1">
                                                <div class="small fw-bold text-dark text-truncate mb-1"><?= esc($b['judul']) ?></div>
                                                <div class="badge bg-soft-info text-primary small p-0" style="font-size: 10px;">ID: #<?= $b['id_buku'] ?></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<?= $this->endSection() ?>