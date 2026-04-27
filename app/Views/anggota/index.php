<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Anggota</h3>
        <div class="card-tools">
            <a href="<?= base_url('anggota/create') ?>" class="btn btn-success btn-sm">
                + Tambah Anggota
            </a>
        </div>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; foreach($anggota as $a): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($a['nama']) ?></td>
                    <td><?= esc($a['nis']) ?></td>
                    <td><?= esc($a['alamat']) ?></td>
                    <td><?= esc($a['no_hp']) ?></td>
                    <td>
                        <a href="<?= base_url('anggota/detail/'.$a['id_anggota']) ?>" class="btn btn-info btn-sm">Detail</a>
                        <a href="<?= base_url('anggota/edit/'.$a['id_anggota']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('anggota/delete/'.$a['id_anggota']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>
</div>

<?= $this->endSection() ?>