<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Rak</h3>
    </div>

    <div class="card-body">

        <form method="post" action="<?= base_url('rak/store') ?>">

            <div class="form-group mb-3">
                <label>Nama Rak</label>
                <input type="text" name="nama_rak" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>

                <a href="<?= base_url('rak') ?>" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

<?= $this->endSection() ?>