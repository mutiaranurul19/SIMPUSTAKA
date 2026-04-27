<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card card-warning card-outline">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i> Edit Penulis
                    </h3>
                </div>

                <form method="post" action="<?= base_url('penulis/update/'.$penulis['id_penulis']) ?>">

                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama Penulis</label>
                            <input type="text"
                                   name="nama_penulis"
                                   class="form-control"
                                   value="<?= esc($penulis['nama_penulis']) ?>"
                                   required>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-between">

                        <a href="<?= base_url('penulis') ?>" class="btn btn-secondary">
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