<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Petugas</h3>

        <a href="<?= base_url('petugas/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Petugas
        </a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ID Petugas</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = 1; foreach($petugas as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($p['id_petugas']) ?></td>
                        <td><?= esc($p['nama']) ?></td>
                        <td><?= esc($p['username']) ?></td>
                        <td>
                            <span class="badge bg-info">
                                <?= esc($p['jabatan']) ?>
                            </span>
                        </td>

                        <td>

                            <a href="<?= base_url('petugas/edit/'.$p['id_petugas']) ?>"
                               class="btn btn-warning btn-sm">
                               <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('petugas/delete/'.$p['id_petugas']) ?>"
                               onclick="return confirm('Hapus data ini?')"
                               class="btn btn-danger btn-sm">
                               <i class="fas fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>
</section>

<?= $this->endSection() ?>