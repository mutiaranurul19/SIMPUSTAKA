<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Daftar Buku Dipinjam</h3>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">

            <thead style="background:#d4c12f; color:black;">
                <tr>
                    <th>Judul Buku</th>
                    <th width="120">Jumlah</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($detail)): ?>
                    <?php foreach ($detail as $d): ?>
                        <tr>
                            <td><?= esc($d['judul'] ?? '-') ?></td>
                            <td>
                                <span class="badge bg-primary">
                                    <?= esc($d['jumlah'] ?? 0) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center text-muted">
                            Data tidak ada
                        </td>
                    </tr>
                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>