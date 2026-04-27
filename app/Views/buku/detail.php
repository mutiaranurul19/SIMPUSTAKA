<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

<div class="row">

<div class="col-md-4">
    <div class="card">
        <div class="card-body text-center">

            <?php if ($buku['cover']): ?>
                <img src="<?= base_url('uploads/cover/'.$buku['cover']) ?>"
                     class="img-fluid mb-3">
            <?php else: ?>
                <p>No Cover</p>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="card">

        <div class="card-header">
            <h3>Detail Buku</h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr><th>Judul</th><td><?= esc($buku['judul']) ?></td></tr>
                <tr><th>ISBN</th><td><?= esc($buku['isbn']) ?></td></tr>
                <tr><th>Kategori</th><td><?= esc($buku['nama_kategori'] ?? '-') ?></td></tr>
                <tr><th>Penulis</th><td><?= esc($buku['nama_penulis'] ?? '-') ?></td></tr>
                <tr><th>Penerbit</th><td><?= esc($buku['nama_penerbit'] ?? '-') ?></td></tr>
                <tr><th>Rak</th><td><?= esc($buku['nama_rak'] ?? '-') ?></td></tr>
                <tr><th>Tahun</th><td><?= esc($buku['tahun_terbit']) ?></td></tr>
                <tr><th>Jumlah</th><td><?= esc($buku['jumlah']) ?></td></tr>
                <tr><th>Tersedia</th><td><?= esc($buku['tersedia']) ?></td></tr>
                <tr><th>Deskripsi</th><td><?= esc($buku['deskripsi']) ?></td></tr>

            </table>

        </div>

        <div class="card-footer">
            <a href="<?= base_url('buku') ?>" class="btn btn-secondary">Kembali</a>
        </div>

    </div>
</div>

</div>

</div>
</section>

<?= $this->endSection() ?>