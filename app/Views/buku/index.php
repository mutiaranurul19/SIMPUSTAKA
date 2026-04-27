<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Buku</h3>

        <div>
            <a href="<?= base_url('buku/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah
            </a>

            <a href="<?= base_url('buku/print') ?>" target="_blank" class="btn btn-dark">
                <i class="fas fa-print"></i> Print
            </a>
        </div>
    </div>

    <!-- FILTER -->
    <div class="card card-outline card-primary">
        <div class="card-body">

            <form method="get" class="row">

                <div class="col-md-6">
                    <input type="text" name="keyword" class="form-control"
                           placeholder="Cari judul buku..."
                           value="<?= esc($keyword ?? '') ?>">
                </div>

                <div class="col-md-6">
                    <button class="btn btn-success">
                        <i class="fas fa-search"></i> Cari
                    </button>

                    <a href="<?= base_url('buku') ?>" class="btn btn-secondary">
                        Reset
                    </a>
                </div>

            </form>

        </div>
    </div>

    <!-- TABLE -->
    <div class="card">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ISBN</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Rak</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                        <th>Tersedia</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no = $no ?? 1; ?>
                <?php foreach($buku as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($b['isbn']) ?></td>

                        <td>
                            <?php if($b['cover']): ?>
                                <img src="<?= base_url('uploads/cover/'.$b['cover']) ?>"
                                     width="50">
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>

                        <td><?= esc($b['judul']) ?></td>
                        <td><?= esc($b['nama_kategori'] ?? '-') ?></td>
                        <td><?= esc($b['nama_penulis'] ?? '-') ?></td>
                        <td><?= esc($b['nama_penerbit'] ?? '-') ?></td>
                        <td><?= esc($b['nama_rak'] ?? '-') ?></td>
                        <td><?= esc($b['tahun_terbit']) ?></td>
                        <td><?= esc($b['jumlah']) ?></td>
                        <td>
                            <span class="badge bg-info">
                                <?= esc($b['tersedia']) ?>
                            </span>
                        </td>

                        <td>

                            <a href="<?= base_url('buku/detail/'.$b['id_buku']) ?>"
                               class="btn btn-info btn-sm">
                               <i class="fas fa-eye"></i>
                            </a>

                            <a href="<?= base_url('buku/edit/'.$b['id_buku']) ?>"
                               class="btn btn-warning btn-sm">
                               <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('buku/delete/'.$b['id_buku']) ?>"
                               onclick="return confirm('Hapus buku ini?')"
                               class="btn btn-danger btn-sm">
                               <i class="fas fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="card-footer">
            <?= $pager->links() ?>
        </div>

    </div>

</div>
</section>

<?= $this->endSection() ?>