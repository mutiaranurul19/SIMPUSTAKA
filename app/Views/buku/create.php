<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="content">
<div class="container-fluid">

<div class="row justify-content-center">
<div class="col-md-8">

<div class="card card-primary">

    <div class="card-header">
        <h3 class="card-title">Tambah Buku</h3>
    </div>

    <form method="post" action="<?= base_url('buku/store') ?>" enctype="multipart/form-data">

    <div class="card-body">

        <!-- JUDUL -->
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <!-- ISBN -->
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>

        <!-- COVER -->
        <div class="form-group">
            <label>Cover</label>
            <input type="file" name="cover" class="form-control">
        </div>

        <!-- KATEGORI -->
        <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach($kategori as $k): ?>
                    <option value="<?= esc($k['id_kategori']) ?>">
                        <?= esc($k['nama_kategori']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- PENULIS -->
        <div class="form-group">
            <label>Penulis</label>
            <select name="id_penulis" class="form-control" required>
                <option value="">-- Pilih Penulis --</option>
                <?php foreach($penulis as $p): ?>
                    <option value="<?= esc($p['id_penulis']) ?>">
                        <?= esc($p['nama_penulis']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- PENERBIT -->
        <div class="form-group">
            <label>Penerbit</label>
            <select name="id_penerbit" class="form-control" required>
                <option value="">-- Pilih Penerbit --</option>
                <?php foreach($penerbit as $p): ?>
                    <option value="<?= esc($p['id_penerbit']) ?>">
                        <?= esc($p['nama_penerbit']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- RAK -->
        <div class="form-group">
            <label>Rak</label>
            <select name="id_rak" class="form-control" required>
                <option value="">-- Pilih Rak --</option>
                <?php foreach($rak as $r): ?>
                    <option value="<?= esc($r['id_rak']) ?>">
                        <?= esc($r['nama_rak']) ?> - <?= esc($r['lokasi']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- TAHUN -->
        <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control">
        </div>

        <!-- JUMLAH -->
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <!-- DESKRIPSI -->
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-success">
            Simpan
        </button>

        <a href="<?= base_url('buku') ?>" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    </form>

</div>

</div>
</div>

</div>
</section>

<?= $this->endSection() ?>