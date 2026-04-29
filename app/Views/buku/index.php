<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    /* 1. MEMAKSA BACKGROUND BIRU PADA PEMBUNGKUS ADMINLTE */
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }

    /* 2. STYLE CARD AGAR TERLIHAT MENGAPUNG DI ATAS WARNA BIRU */
    .card-custom { 
        border: none !important; 
        border-radius: 15px !important; 
        box-shadow: 0 8px 30px rgba(0,0,0,0.05) !important; 
        background-color: #ffffff !important;
        overflow: hidden; 
    }

    /* 3. STYLE TABEL */
    .table thead th {
        background-color: #f8fafc;
        color: #64748b;
        border-bottom: 1px solid #edf2f7;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* 4. STYLE COVER BUKU (ANTI POTONG/ZOOM) */
    .img-cover-table { 
        width: 45px; 
        height: 60px; 
        object-fit: contain; 
        background-color: #f1f5f9; 
        border-radius: 6px; 
        padding: 2px; 
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">📚 Data Koleksi Buku</h3>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= base_url('buku/create') ?>" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px; background-color: #0d6efd;">
                <i class="fas fa-plus me-1"></i> Tambah
            </a>
            <a href="<?= base_url('buku/print') ?>" target="_blank" class="btn btn-dark px-4 shadow-sm" style="border-radius: 10px;">
                <i class="fas fa-print me-1"></i> Print
            </a>
        </div>
    </div>

    <div class="card card-custom mb-4">
        <div class="card-body p-3">
            <form method="get" class="row g-2">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text border-0 bg-light"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="keyword" class="form-control border-0 bg-light" placeholder="Cari judul atau ISBN..." value="<?= esc($keyword ?? '') ?>" style="border-radius: 0 10px 10px 0;">
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100 fw-bold" style="border-radius: 10px;">Cari</button>
                </div>
                <div class="col-md-1">
                    <a href="<?= base_url('buku') ?>" class="btn btn-outline-secondary w-100" style="border-radius: 10px;">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-custom">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">No</th>
                        <th class="py-3">Cover</th>
                        <th class="py-3">Judul & ISBN</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Rak</th>
                        <th class="py-3 text-center">Stok</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = $no ?? 1; foreach($buku as $b): ?>
                    <tr>
                        <td class="ps-4 small text-muted"><?= $no++ ?></td>
                        <td>
                            <?php if($b['cover']): ?>
                                <img src="<?= base_url('uploads/cover/'.$b['cover']) ?>" class="img-cover-table">
                            <?php else: ?>
                                <div class="img-cover-table d-flex align-items-center justify-content-center">
                                    <i class="fas fa-book text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="fw-bold text-dark" style="font-size: 0.95rem;"><?= esc($b['judul']) ?></div>
                            <small class="text-muted" style="letter-spacing: 0.5px;"><?= esc($b['isbn']) ?></small>
                        </td>
                        <td>
                            <span class="badge px-3 py-2" style="background-color: #E3F2FD; color: #0d6efd; border-radius: 8px; font-weight: 600;">
                                <?= esc($b['nama_kategori'] ?? '-') ?>
                            </span>
                        </td>
                        <td>
                            <div class="small text-dark fw-bold"><i class="fas fa-folder-open me-1 text-warning"></i> <?= esc($b['nama_rak'] ?? '-') ?></div>
                        </td>
                        <td class="text-center">
                            <div class="small fw-bold">Tersedia: <span class="text-success"><?= esc($b['tersedia']) ?></span></div>
                            <div class="text-muted" style="font-size: 11px;">Dari total: <?= esc($b['jumlah']) ?></div>
                        </td>
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="<?= base_url('buku/detail/'.$b['id_buku']) ?>" class="btn btn-sm btn-light text-info border" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= base_url('buku/edit/'.$b['id_buku']) ?>" class="btn btn-sm btn-light text-warning border" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('buku/delete/'.$b['id_buku']) ?>" onclick="return confirm('Hapus buku?')" class="btn btn-sm btn-light text-danger border" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white border-0 py-4">
             <?= $pager->links() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>