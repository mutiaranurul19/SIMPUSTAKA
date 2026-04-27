<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="struk-wrapper">

    <div class="struk-kasir">

        <div class="struk-header" style="text-align:center;">
            <h3>SIMPUSTAKA</h3>
            <p>STRUK PEMINJAMAN</p>
        </div>

        <hr>

        <div class="struk-info">
            <p>Anggota : <?= esc($peminjaman['nama_anggota'] ?? '-') ?></p>
            <p>Tgl Pinjam : <?= esc($peminjaman['tanggal_pinjam'] ?? '-') ?></p>
            <p>Tgl Kembali : <?= esc($peminjaman['tanggal_kembali'] ?? '-') ?></p>
        </div>

        <hr>

        <b>BUKU DIPINJAM</b>

        <?php if (!empty($detail)): ?>
            <?php foreach ($detail as $d): ?>
                <div style="display:flex; justify-content:space-between;">
                    <span><?= esc($d['judul'] ?? '-') ?></span>
                    <span>x<?= esc($d['jumlah'] ?? 0) ?></span>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Data tidak ada</p>
        <?php endif; ?>

        <hr>

        <p style="text-align:center;">TERIMA KASIH</p>
        <p style="text-align:center;">Silakan kembalikan tepat waktu</p>

        <hr>

        <div style="text-align:center;" class="no-print">
            <button onclick="window.print()"
                style="background:#4CAF50;color:white;padding:10px 18px;border:none;border-radius:8px;">
                🖨 PRINT
            </button>
        </div>

    </div>

</div>

<!-- PRINT STYLE -->
<style>
@media print {
    .no-print {
        display: none;
    }

    body {
        font-size: 12px;
    }

    .struk-kasir {
        width: 300px;
        margin: auto;
    }
}
</style>

<?= $this->endSection() ?>