<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
</style>

<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-form">
                <div class="card-header bg-white pt-4 px-4 border-0">
                    <h4 class="fw-bold text-dark"><i class="fas fa-building text-primary me-2"></i> Tambah Penerbit</h4>
                </div>

                <form method="post" action="<?= base_url('penerbit/store') ?>">
                    <div class="card-body px-4">
                        <div class="form-group mb-4">
                            <label class="form-label small fw-bold text-muted">Nama Penerbit</label>
                            <input type="text" name="nama_penerbit" class="form-control" placeholder="Masukkan nama lengkap penerbit" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label small fw-bold text-muted">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat lengkap kantor penerbit" required></textarea>
                        </div>
                    </div>

                    <div class="card-footer bg-white pb-4 px-4 border-0 d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm" style="border-radius: 10px;">
                            <i class="fas fa-save me-1"></i> Simpan Data
                        </button>
                        <a href="<?= base_url('penerbit') ?>" class="btn btn-light px-4 border" style="border-radius: 10px;">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>