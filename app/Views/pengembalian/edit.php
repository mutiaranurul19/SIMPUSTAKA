<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card card-primary shadow">

                <!-- HEADER -->
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-undo"></i> Edit Pengembalian
                    </h3>
                </div>

                <div class="card-body">

                    <?php if (!empty($pengembalian)) : ?>

                    <!-- ================= INFO ANGGOTA ================= -->
                    <div class="card card-outline card-info mb-3">
                        <div class="card-header">
                            <b>👤 Data Anggota</b>
                        </div>
                        <div class="card-body">
                            <p><b>Nama:</b> <?= esc($pengembalian['nama'] ?? '-') ?></p>
                            <p><b>NIS:</b> <?= esc($pengembalian['nis'] ?? '-') ?></p>
                        </div>
                    </div>

                    <!-- ================= DETAIL PENGEMBALIAN ================= -->
                    <div class="card card-outline card-warning mb-3">
                        <div class="card-header">
                            <b>📦 Detail Pengembalian</b>
                        </div>

                        <div class="card-body">

                            <p>
                                <b>Status:</b> 
                                <span class="badge bg-info">
                                    <?= esc($pengembalian['status'] ?? '-') ?>
                                </span>
                            </p>

                            <p>
                                <b>Tanggal Dikembalikan:</b> 
                                <?= esc($pengembalian['tanggal_dikembalikan'] ?? '-') ?>
                            </p>

                        </div>
                    </div>

                    <!-- ================= BUKU ================= -->
                    <div class="card card-outline card-success mb-3">
                        <div class="card-header">
                            <b>📚 Buku Dipinjam</b>
                        </div>

                        <div class="card-body table-responsive">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul Buku</th>
                                        <th width="100">Jumlah</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($detail)) : ?>
                                        <?php foreach ($detail as $d) : ?>
                                            <tr>
                                                <td><?= esc($d['judul']) ?></td>
                                                <td>
                                                    <span class="badge bg-primary">
                                                        <?= esc($d['jumlah']) ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="2" class="text-center text-muted">
                                                Tidak ada data buku
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- ================= FORM DENDA ================= -->
                    <form action="<?= base_url('pengembalian/update/'.$pengembalian['id_pengembalian']) ?>" method="post">

                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <b>💰 Denda</b>
                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Jumlah Denda (Rp)</label>
                                    <input type="number" name="denda" class="form-control"
                                        value="<?= esc($pengembalian['denda'] ?? 0) ?>">
                                </div>

                                <div class="alert alert-info mt-2">
                                    Total denda bisa diubah manual jika diperlukan.
                                </div>

                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="mt-3 d-flex justify-content-between">

                            <a href="<?= base_url('pengembalian') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>

                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan
                            </button>

                        </div>

                    </form>

                    <?php else : ?>

                        <div class="alert alert-danger">
                            Data pengembalian tidak ditemukan
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>