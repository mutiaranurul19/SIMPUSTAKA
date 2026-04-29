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
            <h3 class="fw-bold text-dark mb-1">🏷️ Data Kategori</h3>
        </div>
        <a href="<?= base_url('kategori/create') ?>" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px;">
            <i class="fas fa-plus me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="card card-custom">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3" width="80">No</th>
                        <th class="py-3">Nama Kategori</th>
                        <th class="py-3 text-center" width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($kategori as $k): ?>
                    <tr>
                        <td class="ps-4 text-muted small"><?= $no++ ?></td>
                        <td class="fw-bold text-dark"><?= esc($k['nama_kategori']) ?></td>
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= base_url('kategori/edit/'.$k['id_kategori']) ?>" 
                                   class="btn btn-sm btn-light text-warning border" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('kategori/delete/'.$k['id_kategori']) ?>" 
                                   onclick="return confirm('Hapus kategori ini?')" 
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