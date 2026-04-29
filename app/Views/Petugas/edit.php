<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
    .card-custom {
        background-color: #ffffff !important;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
</style>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header bg-white border-0 pt-4">
                        <h3 class="fw-bold text-dark mb-0">Edit Petugas</h3>
                    </div>

                    <form method="post" action="<?= base_url('petugas/update/'.$petugas['id_petugas']) ?>">
                        <div class="card-body px-4">
                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">User ID</label>
                                <input type="number" name="user_id" class="form-control" 
                                       style="border-radius: 10px; background-color: #f8fafc;"
                                       value="<?= esc($petugas['user_id']) ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Jabatan</label>
                                <select name="jabatan" class="form-select" style="border-radius: 10px;" required>
                                    <option value="admin" <?= $petugas['jabatan']=='admin'?'selected':'' ?>>Admin</option>
                                    <option value="petugas" <?= $petugas['jabatan']=='petugas'?'selected':'' ?>>Petugas</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 pb-4 px-4 d-flex gap-2">
                            <button type="submit" class="btn px-4 fw-bold text-white" style="background-color: #2E7D32; border-radius: 10px;">Update Data</button>
                            <a href="<?= base_url('petugas') ?>" class="btn px-4 fw-bold" style="background-color: #f1f5f9; color: #475569; border-radius: 10px;">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>