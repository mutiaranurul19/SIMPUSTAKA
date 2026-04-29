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
                    <h4 class="fw-bold text-dark">📝 Edit Data Penulis</h4>
                </div>

                <form method="post" action="<?= base_url('penulis/update/'.$penulis['id_penulis']) ?>">
                    <div class="card-body px-4">
                        <div class="form-group mb-3">
                            <label class="form-label small fw-bold text-muted">Nama Penulis</label>
                            <input type="text" name="nama_penulis" 
                                   class="form-control shadow-sm" 
                                   value="<?= esc($penulis['nama_penulis']) ?>" 
                                   required>
                        </div>
                    </div>

                    <div class="card-footer bg-white pb-4 px-4 border-0 d-flex gap-2">
                        <button type="submit" class="btn btn-warning text-dark px-4 fw-bold shadow-sm w-100" style="border-radius: 10px;">
                            <i class="fas fa-check-circle me-1"></i> Update Data
                        </button>
                        <a href="<?= base_url('penulis') ?>" class="btn btn-light px-4 border w-100" style="border-radius: 10px;">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>