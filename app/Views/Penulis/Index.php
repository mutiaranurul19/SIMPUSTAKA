<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Penulis</h3>

        <a href="<?= base_url('penulis/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Penulis
        </a>
    </div>

    <!-- CARD -->
    <div class="card card-outline card-primary">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th style="width:70px;">No</th>
                        <th>Nama Penulis</th>
                        <th style="width:140px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = 1; foreach($penulis as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($p['nama_penulis']) ?></td>

                        <td>
                            <a href="<?= base_url('penulis/edit/'.$p['id_penulis']) ?>" 
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('penulis/delete/'.$p['id_penulis']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus data ini?')">
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