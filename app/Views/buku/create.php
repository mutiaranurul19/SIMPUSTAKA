<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<style>
    body, .content-wrapper, #main-content { 
        background-color: #E3F2FD !important; 
        background-image: none !important;
    }
    </style>
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h3 class="fw-bold"><?= isset($buku) ? 'Edit Buku' : 'Tambah Buku Baru' ?></h3>
                </div>
                <form action="<?= isset($buku) ? base_url('buku/update/'.$buku['id_buku']) : base_url('buku/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Judul Buku</label>
                                    <input type="text" name="judul" class="form-control" value="<?= $buku['judul'] ?? '' ?>" required style="border-radius: 8px;">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">ISBN</label>
                                    <input type="text" name="isbn" class="form-control" value="<?= $buku['isbn'] ?? '' ?>" required style="border-radius: 8px;">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Kategori</label>
                                    <select name="id_kategori" class="form-select" required style="border-radius: 8px;">
                                        <?php foreach($kategori as $k): ?>
                                            <option value="<?= $k['id_kategori'] ?>" <?= (isset($buku) && $buku['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Penulis</label>
                                    <select name="id_penulis" class="form-select" required style="border-radius: 8px;">
                                        <?php foreach($penulis as $p): ?>
                                            <option value="<?= $p['id_penulis'] ?>" <?= (isset($buku) && $buku['id_penulis'] == $p['id_penulis']) ? 'selected' : '' ?>><?= $p['nama_penulis'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label small fw-bold">Tahun</label>
                                        <input type="number" name="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit'] ?? '' ?>" style="border-radius: 8px;">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label small fw-bold">Jumlah Stok</label>
                                        <input type="number" name="jumlah" class="form-control" value="<?= $buku['jumlah'] ?? '' ?>" required style="border-radius: 8px;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Pilih Rak</label>
                                    <select name="id_rak" class="form-select" required style="border-radius: 8px;">
                                        <?php foreach($rak as $r): ?>
                                            <option value="<?= $r['id_rak'] ?>" <?= (isset($buku) && $buku['id_rak'] == $r['id_rak']) ? 'selected' : '' ?>><?= $r['nama_rak'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Upload Cover</label>
                                    <input type="file" name="cover" class="form-control" style="border-radius: 8px;">
                                    <?php if(isset($buku['cover'])): ?>
                                        <img src="<?= base_url('uploads/cover/'.$buku['cover']) ?>" width="60" class="mt-2 rounded">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label small fw-bold">Deskripsi Singkat</label>
                                <textarea name="deskripsi" class="form-control" rows="3" style="border-radius: 8px;"><?= $buku['deskripsi'] ?? '' ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 pb-4 px-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 fw-bold" style="border-radius: 10px;">Simpan Data</button>
                        <a href="<?= base_url('buku') ?>" class="btn btn-light px-4" style="border-radius: 10px;">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>