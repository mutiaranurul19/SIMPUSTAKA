<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
    .struk-card { background: #fff; max-width: 380px; margin: 40px auto; padding: 25px; border: 1px dashed #ddd; border-radius: 0; box-shadow: 0 0 20px rgba(0,0,0,0.05); }
    .struk-header h3 { font-family: 'Courier New', Courier, monospace; font-weight: bold; margin-bottom: 0; }
    .struk-info p { margin-bottom: 5px; font-size: 13px; }
    @media print {
        .no-print, .main-footer, .main-header, .nav { display: none !important; }
        .content-wrapper { background: white !important; margin: 0; padding: 0; }
        .struk-card { box-shadow: none; border: none; margin: 0; }
    }
</style>

<div class="container-fluid">
    <div class="struk-card text-dark">
        <div class="struk-header text-center">
            <h3 class="mb-1">SIMPUSTAKA</h3>
            <p class="small text-uppercase mb-1">Bukti Peminjaman Buku</p>
            <p class="small"><?= date('d/m/Y H:i') ?></p>
        </div>

        <hr style="border-top: 1px dashed #000;">

        <div class="struk-info">
            <div class="d-flex justify-content-between"><span>Peminjam:</span> <b><?= esc($peminjaman['nama_anggota']) ?></b></div>
            <div class="d-flex justify-content-between"><span>Tgl Pinjam:</span> <span><?= $peminjaman['tanggal_pinjam'] ?></span></div>
            <div class="d-flex justify-content-between text-danger fw-bold"><span>Tgl Kembali:</span> <span><?= $peminjaman['tanggal_kembali'] ?></span></div>
        </div>

        <hr style="border-top: 1px dashed #000;">

        <p class="fw-bold small mb-2">DAFTAR BUKU:</p>
        <?php foreach ($detail as $d): ?>
            <div class="d-flex justify-content-between small mb-1">
                <span style="max-width: 80%;"><?= esc($d['judul']) ?></span>
                <span>x<?= $d['jumlah'] ?></span>
            </div>
        <?php endforeach; ?>

        <hr style="border-top: 1px dashed #000;">
        
        <div class="text-center mt-4 small">
            <p class="mb-1">Terima kasih telah berkunjung.</p>
            <p class="fw-bold">JANGAN TERLAMBAT!</p>
        </div>

        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary btn-block shadow-sm">
                <i class="fas fa-print me-2"></i> Cetak Struk
    </div>
</div>

<?= $this->endSection() ?>