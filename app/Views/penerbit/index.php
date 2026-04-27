<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Penerbit</h3>

        <a href="<?= base_url('/penerbit/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Penerbit
        </a>
    </div>

    <!-- CARD -->
    <div class="card card-outline card-primary">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th style="width:70px;">No</th>
                        <th>Nama Penerbit</th>
                        <th>Alamat</th>
                        <th style="width:150px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = 1; foreach ($penerbit as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($p['nama_penerbit']) ?></td>
                        <td><?= esc($p['alamat']) ?></td>

                        <td>
                            <a href="<?= base_url('/penerbit/edit/'.$p['id_penerbit']) ?>" 
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('/penerbit/delete/'.$p['id_penerbit']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus data ini?')">
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