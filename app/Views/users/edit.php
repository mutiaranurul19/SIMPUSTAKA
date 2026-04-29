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
    .img-preview-circle {
        width: 100px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
</style>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-custom">
                    <div class="card-header bg-white border-0 pt-4">
                        <h3 class="fw-bold text-dark mb-0">Edit User</h3>
                    </div>

                    <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body px-4">
                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Nama</label>
                                <input type="text" name="nama" class="form-control" style="border-radius: 10px;" value="<?= esc($user['nama']) ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Email</label>
                                <input type="email" name="email" class="form-control" style="border-radius: 10px;" value="<?= esc($user['email']) ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Username</label>
                                <input type="text" name="username" class="form-control" style="border-radius: 10px;" value="<?= esc($user['username']) ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Password <span class="fw-normal text-muted">(kosongkan jika tidak diubah)</span></label>
                                <input type="password" name="password" class="form-control" style="border-radius: 10px;">
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Role</label>
                                <select name="role" class="form-select" style="border-radius: 10px;">
                                    <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
                                    <option value="petugas" <?= $user['role']=='petugas'?'selected':'' ?>>Petugas</option>
                                    <option value="anggota" <?= $user['role']=='anggota'?'selected':'' ?>>Anggota</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Foto Baru</label>
                                <input type="file" name="foto" class="form-control" style="border-radius: 10px;">
                                
                                <div class="mt-4 text-center">
                                    <p class="small fw-bold text-muted mb-2">Foto Saat Ini:</p>
                                    <?php if($user['foto']): ?>
                                        <img src="<?= base_url('uploads/users/'.$user['foto']) ?>" class="img-preview-circle">
                                    <?php else: ?>
                                        <div class="bg-light d-inline-flex align-items-center justify-content-center img-preview-circle text-muted">
                                            <i class="fa fa-user fa-3x"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 pb-4 px-4 d-flex gap-2">
                            <button type="submit" class="btn px-4 fw-bold text-white" style="background-color: #2E7D32; border-radius: 10px;">Update Data</button>
                            <a href="<?= base_url('users') ?>" class="btn px-4 fw-bold" style="background-color: #f1f5f9; color: #475569; border-radius: 10px;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>