<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
<div class="card-header">
    <h3>Edit Anggota</h3>
</div>

<div class="card-body">

<form method="post" action="<?= base_url('anggota/update/'.$anggota['id_anggota']) ?>">

    <div class="form-group">
        <label>User</label>
        <select name="user_id" class="form-control">
            <?php foreach($users as $u): ?>
                <option value="<?= $u['id'] ?>" 
                    <?= $u['id'] == $anggota['user_id'] ? 'selected' : '' ?>>
                    <?= $u['nama'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>NIS</label>
        <input type="text" name="nis" value="<?= $anggota['nis'] ?>" class="form-control">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"><?= $anggota['alamat'] ?></textarea>
    </div>

    <div class="form-group">
        <label>No HP</label>
        <input type="text" name="no_hp" value="<?= $anggota['no_hp'] ?>" class="form-control">
    </div>

    <br>

    <button class="btn btn-primary">Update</button>

</form>

</div>
</div>

<?= $this->endSection() ?>