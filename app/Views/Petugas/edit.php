<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card card-warning">

                <div class="card-header">
                    <h3 class="card-title">Edit Petugas</h3>
                </div>

                <form method="post" action="<?= base_url('petugas/update/'.$petugas['id_petugas']) ?>">

                    <div class="card-body">

                        <div class="form-group">
                            <label>User ID</label>
                            <input type="number" name="user_id" class="form-control"
                                   value="<?= esc($petugas['user_id']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan" class="form-control" required>
                                <option value="admin" <?= $petugas['jabatan']=='admin'?'selected':'' ?>>
                                    Admin
                                </option>
                                <option value="petugas" <?= $petugas['jabatan']=='petugas'?'selected':'' ?>>
                                    Petugas
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-success">
                            Update
                        </button>

                        <a href="<?= base_url('petugas') ?>" class="btn btn-secondary">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
</section>

<?= $this->endSection() ?>