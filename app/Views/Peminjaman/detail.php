<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
</style>

<div class="container-fluid py-4">
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 600px; border-radius: 15px;">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <h4 class="fw-bold text-dark"><i class="fas fa-info-circle text-info me-2"></i> Detail Peminjaman</h4>
        </div>
        <div class="card-body px-4">
            <table class="table table-borderless align-middle">
                <thead class="bg-light" style="border-radius: 10px;">
                    <tr>
                        <th class="py-3 ps-3">Judul Buku Dipinjam</th>
                        <th class="py-3 text-center" width="100">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($detail)): foreach ($detail as $d): ?>
                        <tr class="border-bottom">
                            <td class="py-3">
                                <div class="fw-bold text-dark"><?= esc($d['judul']) ?></div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary rounded-pill"><?= esc($d['jumlah']) ?></span>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="2" class="text-center py-5 text-muted small">Data tidak tersedia</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white border-0 pb-4 text-center">
            <a href="<?= base_url('peminjaman') ?>" class="btn btn-light border px-4" style="border-radius: 10px;">Tutup Detail</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>