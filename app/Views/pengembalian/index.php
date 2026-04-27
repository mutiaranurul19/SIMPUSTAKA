<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Pengembalian</h3>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($pengembalian)): ?>
                    <?php $no = 1; foreach ($pengembalian as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($p['nama'] ?? '-') ?></td>
                        <td><?= esc($p['tanggal_dikembalikan'] ?? '-') ?></td>

                        <td>
                            <?php if (($p['denda'] ?? 0) > 0): ?>
                                <span class="badge bg-danger">Terlambat</span>
                            <?php else: ?>
                                <span class="badge bg-success">Tepat Waktu</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if (($p['denda'] ?? 0) > 0): ?>
                                Rp <?= number_format($p['denda'],0,',','.') ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="<?= base_url('pengembalian/detail/'.$p['id_pengembalian']) ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="<?= base_url('pengembalian/edit/'.$p['id_pengembalian']) ?>" class="btn btn-warning btn-sm">Edit</a>

                            <?php if (($p['denda'] ?? 0) > 0): ?>
                                <a href="<?= base_url('pengembalian/bayar/'.$p['id_pengembalian']) ?>" class="btn btn-success btn-sm">Bayar</a>
                            <?php endif; ?>

                            <a href="<?= base_url('pengembalian/delete/'.$p['id_pengembalian']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">
                                Hapus
                            </a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>