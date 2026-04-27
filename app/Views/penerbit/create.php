<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- CARD -->
            <div class="card card-primary card-outline">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-building"></i> Tambah Penerbit
                    </h3>
                </div>

                <form method="post" action="<?= base_url('/penerbit/store') ?>">

                    <div class="card-body">

                        <!-- NAMA -->
                        <div class="form-group">
                            <label>Nama Penerbit</label>
                            <input type="text" name="nama_penerbit"
                                   class="form-control"
                                   placeholder="Masukkan nama penerbit"
                                   required>
                        </div>

                        <!-- ALAMAT -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan alamat penerbit"
                                      required></textarea>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">

                        <a href="<?= base_url('/penerbit') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</div>
</section>

<?= $this->endSection() ?>