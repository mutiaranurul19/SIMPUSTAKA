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
                        <h3 class="fw-bold text-dark mb-0">Tambah User</h3>
                    </div>

                    <form action="<?= base_url('users/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body px-4">
                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" style="border-radius: 10px;" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan Email" style="border-radius: 10px;" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukan username" style="border-radius: 10px;" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password" style="border-radius: 10px;" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Role</label>
                                <select name="role" class="form-select" style="border-radius: 10px;" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="anggota">Anggota</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="small fw-bold text-muted mb-1">Foto Profil</label>
                                <input type="file" name="foto" class="form-control" style="border-radius: 10px;">
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 pb-4 px-4 d-flex gap-2">
                            <button type="submit" class="btn px-4 fw-bold text-white" style="background-color: #1976D2; border-radius: 10px;">Simpan User</button>
                            <a href="<?= base_url('users') ?>" class="btn px-4 fw-bold" style="background-color: #f1f5f9; color: #475569; border-radius: 10px;">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>