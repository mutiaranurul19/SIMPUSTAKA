<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
<div class="card-body">

<h3>Detail Anggota</h3>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td><?= $anggota['nama'] ?></td>
    </tr>
    <tr>
        <th>NIS</th>
        <td><?= $anggota['nis'] ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?= $anggota['alamat'] ?></td>
    </tr>
    <tr>
        <th>No HP</th>
        <td><?= $anggota['no_hp'] ?></td>
    </tr>
</table>

<a href="<?= base_url('anggota') ?>" class="btn btn-secondary">Kembali</a>

</div>
</div>

<?= $this->endSection() ?>