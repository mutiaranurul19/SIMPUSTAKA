<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- PAGE TITLE -->
    <div class="mb-3">
        <h3 class="fw-bold">📦 Detail Pengembalian</h3>
    </div>

    <div class="row">

        <!-- INFORMASI -->
        <div class="col-md-4">

            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    Informasi Pengembalian
                </div>

                <div class="card-body">

                    <p><b>👤 Anggota:</b><br>
                        <?= esc($peminjaman['nama'] ?? '-') ?>
                    </p>

                    <p><b>🆔 NIS:</b><br>
                        <?= esc($peminjaman['nis'] ?? '-') ?>
                    </p>

                    <p><b>📌 Status:</b><br>
                        <span class="badge bg-info">
                            <?= esc($peminjaman['status'] ?? '-') ?>
                        </span>
                    </p>

                    <p><b>📅 Tanggal Kembali:</b><br>
                        <?= esc($peminjaman['tanggal_dikembalikan'] ?? '-') ?>
                    </p>

                    <p><b>💰 Denda:</b><br>
                        <span class="text-danger fw-bold">
                            Rp <?= number_format($peminjaman['denda'] ?? 0, 0, ',', '.') ?>
                        </span>
                    </p>

                </div>
            </div>

        </div>

        <!-- TABLE BUKU -->
        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header bg-primary text-white">
                    📚 Buku yang Dipinjam
                </div>

                <div class="card-body p-0">

                    <table class="table table-striped table-hover mb-0">

                        <thead class="table-dark">
                            <tr>
                                <th>Judul Buku</th>
                                <th width="120">Jumlah</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php if (!empty($detail)): ?>
                            <?php foreach ($detail as $d): ?>
                                <tr>
                                    <td><?= esc($d['judul']) ?></td>
                                    <td>
                                        <span class="badge bg-primary">
                                            <?= esc($d['jumlah']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
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

        </div>

    </div>

    <!-- BUTTON BACK -->
    <div class="mt-3">
        <a href="<?= base_url('pengembalian') ?>" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

</div>

<?= $this->endSection() ?>