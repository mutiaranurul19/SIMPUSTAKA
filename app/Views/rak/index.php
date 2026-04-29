<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
    .card-custom { 
        border: none !important; 
        border-radius: 15px !important; 
        box-shadow: 0 8px 30px rgba(0,0,0,0.05) !important; 
        background-color: #ffffff !important;
        overflow: hidden; 
    }
    .table thead th { 
        background-color: #f8fafc !important; 
        color: #64748b !important; 
        text-transform: uppercase; 
        font-size: 0.75rem; 
        letter-spacing: 0.5px; 
        border: none !important; 
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">🗄️ Data Rak</h3>
        </div>
        <a href="<?= base_url('rak/create') ?>" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px;">
            <i class="fas fa-plus me-1"></i> Tambah Rak
        </a>
    </div>

    <div class="card card-custom">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3" width="70">No</th>
                        <th class="py-3">Nama Rak</th>
                        <th class="py-3">Lokasi / Lantai</th>
                        <th class="py-3 text-center" width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($rak as $r): ?>
                    <tr>
                        <td class="ps-4 text-muted small"><?= $no++ ?></td>
                        <td>
                            <div class="fw-bold text-dark"><i class="fas fa-layer-group me-2 text-primary small"></i><?= esc($r['nama_rak']) ?></div>
                        </td>
                        <td>
                            <span class="badge bg-light text-secondary px-3 py-2" style="border-radius: 8px;">
                                <i class="fas fa-map-marker-alt me-1 text-danger"></i> <?= esc($r['lokasi']) ?>
                            </span>
                        </td>
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= base_url('rak/edit/'.$r['id_rak']) ?>" 
                                   class="btn btn-sm btn-light text-warning border" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('rak/delete/'.$r['id_rak']) ?>" 
                                   onclick="return confirm('Hapus data ini?')" 
                                   class="btn btn-sm btn-light text-danger border" title="Hapus">
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