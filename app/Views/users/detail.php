<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">Detail User</h3>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th>Nama</th>
                            <td><?= esc($user['nama']) ?></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><?= esc($user['email']) ?></td>
                        </tr>

                        <tr>
                            <th>Username</th>
                            <td><?= esc($user['username']) ?></td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>
                                <?php if($user['role'] == 'admin'): ?>
                                    <span class="badge bg-danger">Admin</span>
                                <?php elseif($user['role'] == 'petugas'): ?>
                                    <span class="badge bg-warning text-dark">Petugas</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Anggota</span>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Foto</th>
                            <td>
                                <?php if($user['foto']): ?>
                                    <img src="<?= base_url('uploads/users/'.$user['foto']) ?>"
                                         width="120" class="img-circle elevation-2">
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada foto</span>
                                <?php endif; ?>
                            </td>
                        </tr>

                    </table>

                </div>

                <div class="card-footer">

                    <a href="<?= base_url('users') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    <?php if(session('role') == 'admin') : ?>
                        <a href="<?= base_url('users/edit/'.$user['id']) ?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>
</section>

<?= $this->endSection() ?>