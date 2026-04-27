<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <h3 class="mb-3">✏️ Edit Peminjaman</h3>

    <form action="<?= base_url('peminjaman/update/' . $peminjaman['id_peminjaman']) ?>" method="post">

        <div class="row">

            <!-- LEFT FORM -->
            <div class="col-md-4">

                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-primary text-white">
                        Data Peminjaman
                    </div>

                    <div class="card-body">

                        <!-- ANGGOTA -->
                        <div class="mb-3">
                            <label>Anggota</label>
                            <select name="id_anggota" class="form-control" required>
                                <?php foreach ($anggota as $a): ?>
                                    <option value="<?= $a['id_anggota'] ?>"
                                        <?= ($a['id_anggota'] == $peminjaman['id_anggota']) ? 'selected' : '' ?>>
                                        <?= esc($a['nama']) ?> (<?= esc($a['nis']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- TANGGAL -->
                        <div class="mb-3">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam"
                                value="<?= $peminjaman['tanggal_pinjam'] ?>"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali"
                                value="<?= $peminjaman['tanggal_kembali'] ?>"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="dipinjam" <?= ($peminjaman['status'] == 'dipinjam') ? 'selected' : '' ?>>
                                    Dipinjam
                                </option>
                                <option value="dikembalikan" <?= ($peminjaman['status'] == 'dikembalikan') ? 'selected' : '' ?>>
                                    Dikembalikan
                                </option>
                            </select>
                        </div>

                    </div>
                </div>

            </div>

            <!-- RIGHT BOOK GRID -->
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        📚 Pilih Buku (klik untuk checklist)
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <?php foreach ($buku as $b): ?>
                                <div class="col-md-4 mb-3">

                                    <label class="card h-100 shadow-sm p-2 book-card"
                                           style="cursor:pointer; border-radius:12px;">

                                        <!-- CHECKBOX -->
                                        <input type="checkbox"
                                               name="id_buku[]"
                                               value="<?= $b['id_buku'] ?>"
                                               class="form-check-input mb-2"
                                               <?= in_array($b['id_buku'], $dipilih) ? 'checked' : '' ?>>

                                        <!-- COVER -->
                                        <?php if (!empty($b['cover'])): ?>
                                            <img src="<?= base_url('uploads/cover/' . $b['cover']) ?>"
                                                 class="img-fluid"
                                                 style="height:180px; object-fit:cover; border-radius:10px;">
                                        <?php else: ?>
                                            <div style="height:180px; background:#eee; display:flex; align-items:center; justify-content:center; border-radius:10px;">
                                                No Cover
                                            </div>
                                        <?php endif; ?>

                                        <!-- TITLE -->
                                        <div class="mt-2 text-center fw-bold">
                                            <?= esc($b['judul']) ?>
                                        </div>

                                    </label>

                                </div>
                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-3">
            <button class="btn btn-success">
                💾 Update Peminjaman
            </button>
            <a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>
<?= esc($a['nama']) ?> (<?= esc($a['nis']) ?>)

<?= $this->endSection() ?>