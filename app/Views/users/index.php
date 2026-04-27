<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

<h2>Data Users</h2>

<a href="<?= base_url('users/create') ?>" class="btn btn-primary mb-3">
    + Tambah User
</a>

<!-- FILTER -->
<form method="get" class="row g-2 mb-3">

    <div class="col-md-4">
        <input type="text" name="keyword" class="form-control"
            placeholder="Cari nama..."
            value="<?= esc($_GET['keyword'] ?? '') ?>">
    </div>

    <div class="col-md-3">
        <select name="role" class="form-select">
            <option value="">Semua Role</option>
            <option value="admin" <?= (($_GET['role'] ?? '') == 'admin') ? 'selected' : '' ?>>Admin</option>
            <option value="petugas" <?= (($_GET['role'] ?? '') == 'petugas') ? 'selected' : '' ?>>Petugas</option>
            <option value="anggota" <?= (($_GET['role'] ?? '') == 'anggota') ? 'selected' : '' ?>>Anggota</option>
        </select>
    </div>

    <div class="col-md-5">
        <button class="btn btn-success">Cari</button>
        <a href="<?= base_url('users') ?>" class="btn btn-secondary">Reset</a>
        <a href="<?= base_url('users/print?' . http_build_query($_GET)) ?>"
            target="_blank" class="btn btn-dark">Print</a>
    </div>

</form>

<!-- FLASH -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- TABLE -->
<div class="card shadow">
<div class="card-body p-0">

<table class="table table-striped mb-0">

<thead class="table-dark">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Username</th>
    <th>Role</th>
    <th>Foto</th>

    <?php if (session()->get('role') == 'admin') : ?>
        <th>Aksi</th>
    <?php endif; ?>
</tr>
</thead>

<tbody>

<?php if (!empty($users)): ?>

    <?php $no = 1 + (10 * ($pager->getCurrentPage() ?? 1 - 1)); ?>

    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($u['nama']) ?></td>
            <td><?= esc($u['email']) ?></td>
            <td><?= esc($u['username']) ?></td>
            <td>
                <span class="badge bg-info">
                    <?= ucfirst($u['role']) ?>
                </span>
            </td>

            <td>
                <?php if (!empty($u['foto'])): ?>
                    <img src="<?= base_url('uploads/users/' . $u['foto']) ?>"
                         width="40" height="40" style="border-radius:50%;">
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>

            <?php if (session()->get('role') == 'admin') : ?>
            <td>
                <a href="<?= base_url('users/detail/' . $u['id']) ?>" class="btn btn-sm btn-info">Detail</a>
                <a href="<?= base_url('users/edit/' . $u['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= base_url('users/wa/' . $u['id']) ?>" target="_blank" class="btn btn-sm btn-success">WA</a>
                <a href="<?= base_url('users/delete/' . $u['id']) ?>"
                   onclick="return confirm('Hapus user ini?')"
                   class="btn btn-sm btn-danger">Hapus</a>
            </td>
            <?php endif; ?>

        </tr>
    <?php endforeach; ?>

<?php else: ?>

<tr>
    <td colspan="7" class="text-center">Belum ada data user</td>
</tr>

<?php endif; ?>

</tbody>

</table>

</div>
</div>

<br>

<!-- PAGINATION -->
<div>
    <?= $pager->links() ?>
</div>

</div>

<?= $this->endSection() ?>