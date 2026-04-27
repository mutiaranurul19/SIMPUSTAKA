<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Kategori</h3>

        <a href="<?= base_url('kategori/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <!-- TABLE -->
    <div class="card">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th width="80">No</th>
                        <th>Nama Kategori</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = 1; ?>
                <?php foreach($kategori as $k): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($k['nama_kategori']) ?></td>

                        <td>

                            <a href="<?= base_url('kategori/edit/'.$k['id_kategori']) ?>"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('kategori/delete/'.$k['id_kategori']) ?>"
                               onclick="return confirm('Hapus kategori ini?')"
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