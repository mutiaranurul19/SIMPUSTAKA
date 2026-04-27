<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Pengaturan Aplikasi</h3>
    </div>

    <div class="card-body">

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('pengaturan/update') ?>">

            <!-- NAMA APLIKASI -->
            <div class="form-group">
                <label>Nama Aplikasi</label>
                <input type="text"
                       name="nama_aplikasi"
                       value="<?= $setting['nama_aplikasi'] ?>"
                       class="form-control">
            </div>

            <!-- DENDA -->
            <div class="form-group">
                <label>Denda Per Hari</label>
                <input type="number"
                       name="denda_per_hari"
                       value="<?= $setting['denda_per_hari'] ?>"
                       class="form-control">
            </div>

            <!-- MAKS PINJAM -->
            <div class="form-group">
                <label>Maksimal Pinjam (Buku)</label>
                <input type="number"
                       name="maksimal_pinjam"
                       value="<?= $setting['maksimal_pinjam'] ?>"
                       class="form-control">
            </div>

            <!-- LAMA PINJAM -->
            <div class="form-group">
                <label>Lama Pinjam (Hari)</label>
                <input type="number"
                       name="lama_pinjam"
                       value="<?= $setting['lama_pinjam'] ?>"
                       class="form-control">
            </div>

            <button type="submit" class="btn btn-success">
                Simpan Pengaturan
            </button>

        </form>

    </div>

</div>

<?= $this->endSection() ?>