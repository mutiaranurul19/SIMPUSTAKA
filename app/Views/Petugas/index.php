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
            <h3 class="fw-bold text-dark mb-1">👮 Data Petugas</h3>
        </div>
        <a href="<?= base_url('petugas/create') ?>" class="btn px-4 py-2 fw-bold text-white" style="background-color: #1976D2; border-radius: 12px;">
            <i class="fas fa-plus me-1"></i> Tambah Petugas
        </a>
    </div>

    <div class="card card-custom overflow-hidden">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">No</th>
                        <th class="py-3">ID Petugas</th>
                        <th class="py-3">Nama Lengkap</th>
                        <th class="py-3">Username</th>
                        <th class="py-3">Jabatan</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($petugas as $p): ?>
                    <tr>
                        <td class="ps-4 text-muted small"><?= $no++ ?></td>
                        <td><span class="badge bg-light text-dark border" style="border-radius: 6px;"><?= esc($p['id_petugas']) ?></span></td>
                        <td class="fw-bold text-dark"><?= esc($p['nama']) ?></td>
                        <td class="text-muted">@<?= esc($p['username']) ?></td>
                        <td>
                            <?php $badgeColor = ($p['jabatan'] == 'admin') ? 'background-color: #eef2ff; color: #4f46e5;' : 'background-color: #f0fdf4; color: #16a34a;'; ?>
                            <span class="badge px-3 py-2 fw-bold" style="<?= $badgeColor ?> border-radius: 8px; font-size: 0.7rem;">
                                <?= strtoupper(esc($p['jabatan'])) ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="<?= base_url('petugas/edit/'.$p['id_petugas']) ?>" class="btn btn-sm btn-light text-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('petugas/delete/'.$p['id_petugas']) ?>" 
                                   onclick="return confirm('Hapus data petugas ini?')" 
                                   class="btn btn-sm btn-light text-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>