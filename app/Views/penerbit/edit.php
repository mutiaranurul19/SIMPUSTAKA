<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- CARD -->
            <div class="card card-warning card-outline">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Edit Penerbit
                    </h3>
                </div>

                <form method="post" action="<?= base_url('/penerbit/update/'.$penerbit['id_penerbit']) ?>">

                    <div class="card-body">

                        <!-- NAMA -->
                        <div class="form-group">
                            <label>Nama Penerbit</label>
                            <input type="text"
                                   name="nama_penerbit"
                                   class="form-control"
                                   value="<?= esc($penerbit['nama_penerbit']) ?>"
                                   required>
                        </div>

                        <!-- ALAMAT -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat"
                                      class="form-control"
                                      rows="3"
                                      required><?= esc($penerbit['alamat']) ?></textarea>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">

                        <a href="<?= base_url('/penerbit') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</div>
</section>

<?= $this->endSection() ?>