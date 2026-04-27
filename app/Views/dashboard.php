<div class="row">

<div class="col-md-4">
<div class="card bg-primary text-white p-3">
<h4>Buku</h4>
<h2><?= $total_buku ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card bg-success text-white p-3">
<h4>Anggota</h4>
<h2><?= $total_anggota ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card bg-warning text-white p-3">
<h4>Peminjaman</h4>
<h2><?= $total_pinjam ?></h2>
</div>
</div>

</div>

<hr>

<h5>Recent Peminjaman</h5>

<table class="table table-striped">
<tr>
<th>NIS</th>
<th>Nama</th>
<th>Status</th>
</tr>

<?php foreach($recent_pinjam as $r): ?>
<tr>
<td><?= $r['nis'] ?></td>
<td><?= $r['nama'] ?></td>
<td><?= $r['status'] ?? 'dipinjam' ?></td>
</tr>
<?php endforeach; ?>

</table>