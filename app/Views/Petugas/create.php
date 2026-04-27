<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Tambah Petugas</h3>
                </div>

                <form method="post" action="<?= base_url('petugas/store') ?>">

                    <div class="card-body">

                        <!-- USER SELECT -->
                        <div class="form-group">
                            <label>Pilih User</label>
                            <select name="user_id" class="form-control" required>
                                <option value="">-- Pilih User --</option>

                                <?php foreach($users as $u): ?>
                                    <option value="<?= esc($u['id']) ?>">
                                        <?= esc($u['nama']) ?> (<?= esc($u['username']) ?>)
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <!-- JABATAN -->
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan" class="form-control" required>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-success">
                            Simpan
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