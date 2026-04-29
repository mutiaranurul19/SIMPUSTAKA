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
                <div class="card-header bg-white pt-4 px-4 border-0 text-center">
                    <h4 class="fw-bold text-dark">🖋️ Tambah Penulis</h4>
                </div>

                <form method="post" action="<?= base_url('penulis/store') ?>">
                    <div class="card-body px-4">
                        <div class="form-group mb-3">
                            <label class="form-label small fw-bold text-muted">Nama Lengkap Penulis</label>
                            <input type="text" name="nama_penulis" class="form-control shadow-sm" placeholder="Masukan Nama" required>
                        </div>
                    </div>

                    <div class="card-footer bg-white pb-4 px-4 border-0 d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm w-100" style="border-radius: 10px;">
                            <i class="fas fa-save me-1"></i> Simpan Penulis
                        </button>
                        <a href="<?= base_url('penulis') ?>" class="btn btn-light px-4 border w-100" style="border-radius: 10px;">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>