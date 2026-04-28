<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<h3>Dashboard SIMPUSTAKA</h3>

<div class="row">
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Buku</h5>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Anggota</h5>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Peminjaman</h5>
        </div>
    </div>
</div>

<?= $this->endSection() ?>