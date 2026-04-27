<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
<div class="card-body">
<?php 
?>
<h3>Tambah Peminjaman</h3>

<form method="post" action="<?= base_url('peminjaman/store') ?>">

<!-- ANGGOTA -->
<div class="mb-3">
    <label class="form-label">Pilih Anggota</label>
    <select name="id_anggota" class="form-select" required>
        <option value="">-- Pilih Anggota --</option>
        <?php foreach ($anggota as $a): ?>
            <option value="<?= $a['id_anggota'] ?>">
                <?= $a['nama'] ?> (NIS: <?= $a['nis'] ?>)
            </option>
        <?php endforeach; ?>
    </select>
</div>
<br>

<!-- TANGGAL PINJAM -->
<h5>Pilih Buku (maksimal 2)</h5>

<div class="row">
    <?php foreach ($buku as $b): ?>
        <div class="col-md-3 mb-4">
            <label class="card shadow-sm h-100 p-2" style="cursor:pointer; transition: 0.2s; border: 1px solid #ddd;">
                
                <div class="text-center mb-2">
                    <input type="checkbox" name="id_buku[]" value="<?= $b['id_buku'] ?>" class="book-checkbox">
                </div>

                <div style="height: 200px; width: 100%; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 6px; overflow: hidden;" class="mb-2">
                    <?php if (!empty($b['cover'])): ?>
                        <img src="<?= base_url('uploads/cover/'.$b['cover']) ?>" 
                             class="img-fluid"
                             style="max-height: 100%; max-width: 100%; object-fit: contain;">
                    <?php else: ?>
                        <div style="color: #999; font-size: 0.8rem;">No Cover</div>
                    <?php endif; ?>
                </div>

                <div style="font-weight:bold; text-align:center; font-size: 0.9rem; flex-grow: 1; display: flex; align-items: center; justify-content: center;">
                    <?= esc($b['judul']) ?>
                </div>

            </label>
        </div>
    <?php endforeach; ?>
</div>

<style>
    label.card:hover {
        border-color: #007bff;
        background-color: #f0f7ff;
    }
    input.book-checkbox:checked + label.card {
        border: 2px solid #007bff;
        background-color: #e7f1ff;
    }
</style>

<br>

<button type="submit" class="btn btn-success">Pinjam</button>
<a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">Kembali</a>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2 pada dropdown anggota
        $('select[name="id_anggota"]').select2({
            placeholder: "-- Cari Nama Anggota --",
            allowClear: true
        });
    });
</script>
</form>

</div>
</div>

<?= $this->endSection() ?>