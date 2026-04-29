<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
</style>

<div class="container-fluid py-4" style="background-color: #E3F2FD; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-header bg-white border-0 pt-4 px-4 d-flex align-items-center">
                    <div class="bg-warning text-white rounded-3 p-2 me-3 shadow-sm">
                        <i class="fas fa-edit fa-fw"></i>
                    </div>
                    <h5 class="fw-bold mb-0">Edit Pengembalian</h5>
                </div>
                
                <div class="card-body px-4 pb-4">
                    <div class="p-3 mb-4 rounded-3" style="background-color: #f0f7ff; border: 1px dashed #0d6efd;">
                        <div class="row text-center">
                            <div class="col-6 border-end">
                                <small class="text-muted d-block">Anggota</small>
                                <span class="fw-bold"><?= esc($pengembalian['nama'] ?? '-') ?></span>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">NIS</small>
                                <span class="fw-bold font-monospace text-primary"><?= esc($pengembalian['nis'] ?? '-') ?></span>
                            </div>
                        </div>
                    </div>

                    <form action="<?= base_url('pengembalian/update/'.$pengembalian['id_pengembalian']) ?>" method="post">
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-muted">Jumlah Denda (Rp)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted">Rp</span>
                                <input type="number" name="denda" class="form-control border-start-0 ps-0 fw-bold text-danger shadow-sm" 
                                       value="<?= esc($pengembalian['denda'] ?? 0) ?>" style="font-size: 1.2rem;">
                            </div>
                            <small class="text-muted mt-2 d-block fst-italic">
                                <i class="fas fa-info-circle me-1"></i> Sesuaikan denda jika ada kebijakan khusus.
                            </small>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-3 fw-bold shadow" style="border-radius: 12px;">
                                <i class="fas fa-save me-2"></i> Update Data
                            </button>
                            <a href="<?= base_url('pengembalian') ?>" class="btn btn-light py-2 border-0 text-muted small">Batal & Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>