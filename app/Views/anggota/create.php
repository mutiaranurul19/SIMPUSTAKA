<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
<div class="card-header">
    <h3>Tambah Anggota</h3>
</div>

<div class="card-body">

<form method="post" action="<?= base_url('anggota/store') ?>">

    <div class="form-group">
        <label>User</label>
        <select name="user_id" class="form-control">
            <?php foreach($users as $u): ?>
                <option value="<?= $u['id'] ?>"><?= $u['nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>NIS</label>
        <input type="text" name="nis" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>

    <br>

    <button class="btn btn-success">Simpan</button>
    <a href="<?= base_url('anggota') ?>" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

<?= $this->endSection() ?>