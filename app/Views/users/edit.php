<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card card-warning">

                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>

                <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">

                    <div class="card-body">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control"
                                   value="<?= esc($user['nama']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= esc($user['email']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control"
                                   value="<?= esc($user['username']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Password (kosongkan jika tidak diubah)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
                                <option value="petugas" <?= $user['role']=='petugas'?'selected':'' ?>>Petugas</option>
                                <option value="anggota" <?= $user['role']=='anggota'?'selected':'' ?>>Anggota</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">

                            <br>

                            <p>Foto sekarang:</p>

                            <?php if($user['foto']): ?>
                                <img src="<?= base_url('uploads/users/'.$user['foto']) ?>"
                                     width="120" class="img-circle elevation-2">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada foto</span>
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-success">
                            Update
                        </button>

                        <a href="<?= base_url('users') ?>" class="btn btn-secondary">
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