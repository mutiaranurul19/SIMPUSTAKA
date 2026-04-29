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
        <div class="col-md-5">
            <div class="card card-form">
                <div class="card-header bg-white pt-4 px-4 border-0">
                    <h4 class="fw-bold text-dark"><i class="fas fa-plus-circle text-primary me-2"></i> Tambah Rak</h4>
                </div>

                <form method="post" action="<?= base_url('rak/store') ?>">
                    <div class="card-body px-4 pt-0">
                        <div class="form-group mb-3">
                            <label class="form-label small fw-bold text-muted">Nama Rak</label>
                            <input type="text" name="nama_rak" class="form-control" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label small fw-bold text-muted">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" placeholder="Masukan Lokasi" required>
                        </div>
                    </div>

                    <div class="card-footer bg-white pb-4 px-4 border-0 d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm" style="border-radius: 10px;">
                            Simpan Rak
                        </button>
                        <a href="<?= base_url('rak') ?>" class="btn btn-light px-4 border" style="border-radius: 10px;">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>