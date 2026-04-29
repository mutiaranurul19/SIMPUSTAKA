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
    .detail-photo {
        width: 100px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
</style>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-custom">
                    <div class="card-header bg-white border-0 pt-4 text-center">
                        <h3 class="fw-bold text-dark mb-3">Detail Profil User</h3>
                        <div class="mb-2">
                            <?php if($user['foto']): ?>
                                <img src="<?= base_url('uploads/users/'.$user['foto']) ?>" class="detail-photo">
                            <?php else: ?>
                                <div class="bg-light d-inline-flex align-items-center justify-content-center detail-photo text-muted">
                                    <i class="fa fa-user fa-4x"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-body px-4">
                        <table class="table table-borderless">
                            <tr class="border-bottom">
                                <th class="py-3 text-muted" width="30%">Nama Lengkap</th>
                                <td class="py-3 fw-bold text-dark"><?= esc($user['nama']) ?></td>
                            </tr>
                            <tr class="border-bottom">
                                <th class="py-3 text-muted">Email</th>
                                <td class="py-3 text-dark"><?= esc($user['email']) ?></td>
                            </tr>
                            <tr class="border-bottom">
                                <th class="py-3 text-muted">Username</th>
                                <td class="py-3 text-dark">@<?= esc($user['username']) ?></td>
                            </tr>
                            <tr>
                                <th class="py-3 text-muted">Status Role</th>
                                <td class="py-3">
                                    <?php 
                                        $badge = 'bg-success';
                                        if($user['role'] == 'admin') $badge = 'bg-danger';
                                        if($user['role'] == 'petugas') $badge = 'bg-warning text-dark';
                                    ?>
                                    <span class="badge <?= $badge ?> px-3 py-2" style="border-radius: 8px;">
                                        <?= strtoupper($user['role']) ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="card-footer bg-white border-0 pb-4 px-4 d-flex justify-content-center gap-2">
                        <a href="<?= base_url('users') ?>" class="btn px-4 fw-bold" style="background-color: #f1f5f9; color: #475569; border-radius: 10px;">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <?php if(session('role') == 'admin') : ?>
                            <a href="<?= base_url('users/edit/'.$user['id']) ?>" class="btn px-4 fw-bold text-white" style="background-color: #1976D2; border-radius: 10px;">
                                <i class="fas fa-edit me-1"></i> Edit Data
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>