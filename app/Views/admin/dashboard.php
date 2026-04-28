<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h3 class="mb-4">Dashboard SIMPUSTAKA</h3>

<div class="row">

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>Buku</h5>
            <h2 id="total_buku"><?= $total_buku ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>Anggota</h5>
            <h2 id="total_anggota"><?= $total_anggota ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>Peminjaman</h5>
            <h2 id="total_pinjam"><?= $total_pinjam ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h5>Pinjam Aktif</h5>
            <h2 id="pinjam_aktif"><?= $pinjam_aktif ?></h2>
        </div>
    </div>

</div>

<!-- =========================
     🔥 REALTIME SCRIPT
========================= -->
<script>
function loadStats() {
    fetch("<?= base_url('dashboard/stats') ?>")
        .then(response => response.json())
        .then(data => {
            document.getElementById('total_buku').innerText = data.total_buku;
            document.getElementById('total_anggota').innerText = data.total_anggota;
            document.getElementById('total_pinjam').innerText = data.total_pinjam;
            document.getElementById('pinjam_aktif').innerText = data.pinjam_aktif;
        });
}

// update tiap 3 detik (REALTIME)
setInterval(loadStats, 3000);
</script>

<?= $this->endSection() ?>