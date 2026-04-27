<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1>Dashboard</h1>
<p>Selamat datang di <b>SIMPUSTAKA</b></p>

<div class="dashboard-box">

    <div class="card-box card-buku">
        <i class="bi bi-book"></i>
        <p>Total Buku</p>
        <h3><?= $total_buku ?></h3>
    </div>

    <div class="card-box card-user">
        <i class="bi bi-people"></i>
        <p>Total User</p>
        <h3><?= $total_user ?></h3>
    </div>

    <div class="card-box card-pinjam">
        <i class="bi bi-journal-arrow-down"></i>
        <p>Peminjaman</p>
        <h3><?= $total_peminjaman ?></h3>
    </div>

</div>

<?= $this->endSection() ?>