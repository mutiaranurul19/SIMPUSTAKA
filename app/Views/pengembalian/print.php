<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
    .header { text-align: center; margin-bottom: 15px; border-bottom: 1px dashed #000; padding-bottom: 10px; }
    .header h3 { margin: 0; font-size: 18px; letter-spacing: 2px; }
    .info-line { display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 5px; }
    .divider { border-bottom: 1px dashed #000; margin: 10px 0; }
    .total-section { display: flex; justify-content: space-between; font-weight: bold; font-size: 14px; margin-top: 10px; }
    .footer { text-align: center; margin-top: 20px; font-size: 10px; color: #555; }
    .btn-print { 
        display: block; width: 100%; padding: 10px; background: #000; color: #fff; 
        text-align: center; text-decoration: none; border-radius: 5px; margin-top: 20px;
    }
</style>

<div class="struk-container">
    <div class="header">
        <h3>SIMPUSTAKA</h3>
        <small>BUKTI PENGEMBALIAN BUKU</small>
    </div>

    <?php foreach ($peminjaman as $p): ?>
        <div class="info-line"><span>ID Transaksi</span> <span>#<?= $p['id_peminjaman'] ?></span></div>
        <div class="info-line"><span>Anggota</span> <span><?= $p['nis'] ?></span></div>
        <div class="info-line"><span>Tgl Pinjam</span> <span><?= $p['tanggal_pinjam'] ?></span></div>
        <div class="info-line"><span>Tgl Kembali</span> <span><?= $p['tanggal_kembali'] ?></span></div>
    <?php endforeach; ?>

    <div class="divider"></div>
    
    <div class="total-section">
        <span>TOTAL DENDA</span>
        <span>Rp <?= number_format($total_denda ?? 0,0,',','.') ?></span>
    </div>

    <div class="footer">
        <p>*** TERIMA KASIH ***<br>Simpan struk ini sebagai bukti resmi pengembalian buku.</p>
    </div>

    <a href="javascript:window.print()" class="btn-print">PRINT STRUK</a>
    <a href="<?= base_url('pengembalian') ?>" class="btn-print" style="background:#888; margin-top:5px;">KEMBALI</a>
</div>