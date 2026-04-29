<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    /* MENGGANTI LATAR BELAKANG MENJADI BIRU SOFT (SOLID) */
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; /* Biru soft seperti dashboard */
        background-image: none !important;    /* Menghapus gradasi biru-hijau */
    }

    /* Styling Foto agar Bulat Sempurna & Tidak Terpotong */
    .user-photo-circle {
        width: 60px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover; /* Menjaga rasio foto agar tidak gepeng */
        border: 2px solid #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .photo-placeholder {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #f1f5f9;
        color: #cbd5e1;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #fff;
    }

    /* Memastikan Card Tabel Tetap Putih Bersih */
    .card-custom {
        background-color: #ffffff !important;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    /* Warna Header Tabel yang Lebih Soft */
    .table thead th {
        background-color: #f8fafc;
        color: #64748b;
        border-bottom: 1px solid #edf2f7;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">👥 Data Users</h3>
        </div>
        <a href="<?= base_url('users/create') ?>" class="btn px-4 py-2 fw-bold text-white" style="background-color: #1976D2; border-radius: 12px;">
            <i class="fa fa-plus me-1"></i> Tambah User
        </a>
    </div>

    <div class="card card-custom mb-4">
        <div class="card-body p-4">
            <form method="get" class="row g-3">
                <div class="col-md-4">
                    <label class="small fw-bold text-muted mb-1">Cari Nama</label>
                    <input type="text" name="keyword" class="form-control" 
                           style="border-radius: 10px; border: 1.5px solid #edf2f7;"
                           placeholder="Masukkan nama..." 
                           value="<?= esc($_GET['keyword'] ?? '') ?>">
                </div>
                <div class="col-md-3">
                    <label class="small fw-bold text-muted mb-1">Role</label>
                    <select name="role" class="form-select" style="border-radius: 10px; border: 1.5px solid #edf2f7;">
                        <option value="">Semua Role</option>
                        <option value="admin" <?= (($_GET['role'] ?? '') == 'admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="petugas" <?= (($_GET['role'] ?? '') == 'petugas') ? 'selected' : '' ?>>Petugas</option>
                        <option value="anggota" <?= (($_GET['role'] ?? '') == 'anggota') ? 'selected' : '' ?>>Anggota</option>
                    </select>
                </div>
                <div class="col-md-5 d-flex align-items-end gap-2">
                    <button class="btn px-4 fw-bold text-white" style="background-color: #2E7D32; border-radius: 10px;">Cari</button>
                    <a href="<?= base_url('users') ?>" class="btn px-4 fw-bold" style="background-color: #f1f5f9; color: #475569; border-radius: 10px;">Reset</a>
                    <a href="<?= base_url('users/print?' . http_build_query($_GET)) ?>" 
                       target="_blank" class="btn px-4 fw-bold text-white" style="background-color: #334155; border-radius: 10px;">Print</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-custom overflow-hidden">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">No</th>
                        <th class="py-3">Nama & Username</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">Role</th>
                        <th class="py-3 text-center">Foto</th>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <th class="py-3 text-center">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php $no = 1 + (10 * (($pager->getCurrentPage() ?? 1) - 1)); ?>
                        <?php foreach ($users as $u): ?>
                            <tr>
                                <td class="ps-4 text-muted small"><?= $no++ ?></td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($u['nama']) ?></div>
                                    <div class="text-muted small">@<?= esc($u['username']) ?></div>
                                </td>
                                <td class="small"><?= esc($u['email']) ?></td>
                                <td>
                                    <?php 
                                        $style = 'background-color: #f1f5f9; color: #475569;';
                                        if(strtolower($u['role']) == 'admin') $style = 'background-color: #eef2ff; color: #4f46e5;';
                                        if(strtolower($u['role']) == 'petugas') $style = 'background-color: #f0fdf4; color: #16a34a;';
                                        if(strtolower($u['role']) == 'anggota') $style = 'background-color: #fffbeb; color: #d97706;';
                                    ?>
                                    <span class="badge px-3 py-2 fw-bold" style="<?= $style ?> border-radius: 8px; font-size: 0.7rem;">
                                        <?= strtoupper($u['role']) ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <?php if (!empty($u['foto'])): ?>
                                        <img src="<?= base_url('uploads/users/' . $u['foto']) ?>" class="user-photo-circle">
                                    <?php else: ?>
                                        <div class="photo-placeholder mx-auto">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <?php if (session()->get('role') == 'admin') : ?>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="<?= base_url('users/detail/' . $u['id']) ?>" class="btn btn-sm btn-light text-info" title="Detail"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('users/edit/' . $u['id']) ?>" class="btn btn-sm btn-light text-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('users/wa/' . $u['id']) ?>" target="_blank" class="btn btn-sm btn-light text-success" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                            <a href="<?= base_url('users/delete/' . $u['id']) ?>" onclick="return confirm('Hapus user ini?')" class="btn btn-sm btn-light text-danger" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted small">Belum ada data user.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        <?= $pager->links() ?>
    </div>

</div>

<?= $this->endSection() ?>