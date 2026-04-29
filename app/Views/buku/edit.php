<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
    </style>
<section class="content">
<div class="container-fluid">

<div class="row justify-content-center">
<div class="col-md-8">

<div class="card card-primary">

<div class="card-header">
    <h3 class="card-title">Edit Buku</h3>
</div>

<form action="<?= base_url('buku/update/'.$buku['id_buku']) ?>" method="post" enctype="multipart/form-data">

<div class="card-body">

    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="<?= esc($buku['judul']) ?>">
    </div>

    <div class="form-group">
        <label>ISBN</label>
        <input type="text" name="isbn" class="form-control" value="<?= esc($buku['isbn']) ?>">
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control" value="<?= esc($buku['nama_kategori']) ?>" disabled>
    </div>

    <div class="form-group">
        <label>Penulis</label>
        <input type="text" class="form-control" value="<?= esc($buku['nama_penulis']) ?>" disabled>
    </div>

    <div class="form-group">
        <label>Penerbit</label>
        <input type="text" class="form-control" value="<?= esc($buku['nama_penerbit']) ?>" disabled>
    </div>

    <div class="form-group">
        <label>Rak</label>
        <select name="id_rak" class="form-control">
            <?php foreach ($rak as $r): ?>
                <option value="<?= $r['id_rak'] ?>"
                    <?= ($r['id_rak'] == $buku['id_rak']) ? 'selected' : '' ?>>
                    <?= esc($r['nama_rak']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Tahun</label>
        <input type="text" name="tahun_terbit" class="form-control" value="<?= esc($buku['tahun_terbit']) ?>">
    </div>

    <div class="form-group">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" value="<?= esc($buku['jumlah']) ?>">
    </div>

    <div class="form-group">
        <label>Tersedia</label>
        <input type="number" name="tersedia" class="form-control" value="<?= esc($buku['tersedia']) ?>">
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"><?= esc($buku['deskripsi']) ?></textarea>
    </div>

    <div class="form-group">
        <label>Cover</label>
        <input type="file" name="cover" class="form-control">

        <?php if (!empty($buku['cover'])): ?>
            <img src="<?= base_url('uploads/cover/'.$buku['cover']) ?>" width="100" class="mt-2">
        <?php endif; ?>
    </div>

</div>

<div class="card-footer">
    <button class="btn btn-success">Update</button>
    <a href="<?= base_url('buku') ?>" class="btn btn-secondary">Kembali</a>
</div>

</form>

</div>

</div>
</div>

</div>
</section>

<?= $this->endSection() ?>