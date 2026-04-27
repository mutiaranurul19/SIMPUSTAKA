<div class="struk-kasir">

    <div class="struk-header">
        <h3>SIMPUSTAKA</h3>
        <p>STRUK PENGEMBALIAN</p>
    </div>

    <div class="garis">--------------------------------</div>

    <?php foreach ($peminjaman as $p): ?>
        <div class="item">
            <span>ID</span>
            <span><?= $p['id_peminjaman'] ?></span>
        </div>

        <div class="item">
            <span>Anggota</span>
            <span><?= $p['nis'] ?></span>
        </div>

        <div class="item">
            <span>Pinjam</span>
            <span><?= $p['tanggal_pinjam'] ?></span>
        </div>

        <div class="item">
            <span>Kembali</span>
            <span><?= $p['tanggal_kembali'] ?></span>
        </div>

        <div class="item">
            <span>Status</span>
            <span><?= $p['status'] ?></span>
        </div>

        <div class="garis">--------------------------------</div>

    <?php endforeach; ?>

    <div class="item total">
        <span><b>TOTAL DENDA</b></span>
        <span><b>Rp <?= number_format($total_denda ?? 0,0,',','.') ?></b></span>
    </div>

    <div class="garis">--------------------------------</div>

    <p class="center">TERIMA KASIH</p>
    <p class="center">Telah Menggunakan SIMPUSTAKA</p>

    <div class="center">
        <button onclick="window.print()" class="btn-print">🖨 PRINT</button>
    </div>

</div>