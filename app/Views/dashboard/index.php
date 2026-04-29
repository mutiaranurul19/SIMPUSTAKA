<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    /* Mengganti background utama aplikasi agar tidak gradasi biru-hijau lagi */
    body, .content-wrapper, #main-content { 
        background-color: #F8F9FA !important; /* Warna Abu-abu sangat muda (Soft) */
        background-image: none !important;
    }

    /* Memastikan teks title terlihat jelas */
    .dashboard-title {
        font-weight: 700; 
        color: #333;
        margin-bottom: 5px;
    }
</style>

<div class="mb-4">
    <h3 class="dashboard-title">Dashboard SIMPUSTAKA</h3>
    <p style="color: #888; font-size: 0.95rem;">Selamat datang, <?= session('nama') ?>. Berikut adalah ringkasan data hari ini.</p>
</div>

<div class="row g-3">
    <div class="col-md-3">
        <div class="p-4" style="background-color: #E3F2FD; border-radius: 12px; border: 1px solid rgba(25, 118, 210, 0.1);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div style="color: #1976D2; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 5px;">Total Buku</div>
                    <h2 style="font-weight: 800; color: #1976D2; margin: 0;"><?= $total_buku ?></h2>
                </div>
                <i class="fa fa-book fa-2x" style="color: #1976D2; opacity: 0.4;"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-4" style="background-color: #E8F5E9; border-radius: 12px; border: 1px solid rgba(46, 125, 50, 0.1);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div style="color: #2E7D32; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 5px;">Anggota</div>
                    <h2 style="font-weight: 800; color: #2E7D32; margin: 0;"><?= $total_anggota ?></h2>
                </div>
                <i class="fa fa-users fa-2x" style="color: #2E7D32; opacity: 0.4;"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-4" style="background-color: #FFFDE7; border-radius: 12px; border: 1px solid rgba(249, 168, 37, 0.1);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div style="color: #F9A825; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 5px;">Dipinjam</div>
                    <h2 style="font-weight: 800; color: #F9A825; margin: 0;"><?= $dipinjam ?></h2>
                </div>
                <i class="fa fa-book-open fa-2x" style="color: #F9A825; opacity: 0.4;"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-4" style="background-color: #FFEBEE; border-radius: 12px; border: 1px solid rgba(198, 40, 40, 0.1);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div style="color: #C62828; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 5px;">Terlambat</div>
                    <h2 style="font-weight: 800; color: #C62828; margin: 0;"><?= $terlambat ?></h2>
                </div>
                <i class="fa fa-triangle-exclamation fa-2x" style="color: #C62828; opacity: 0.4;"></i>
            </div>
        </div>
    </div>
</div>

<div class="mt-4" style="background: #fff; border: 1px solid #eee; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
    <div class="p-3" style="border-bottom: 1px solid #eee; background-color: #fff;">
        <h6 style="font-weight: 700; margin: 0; color: #444;">Recent Peminjaman</h6>
    </div>

    <div class="table-responsive">
        <table class="table mb-0" style="vertical-align: middle;">
            <thead style="background-color: #FAFAFA;">
                <tr>
                    <th style="padding: 15px; border-bottom: 1px solid #eee; color: #888; font-size: 0.8rem; font-weight: 700;">NIS</th>
                    <th style="padding: 15px; border-bottom: 1px solid #eee; color: #888; font-size: 0.8rem; font-weight: 700;">NAMA</th>
                    <th style="padding: 15px; border-bottom: 1px solid #eee; color: #888; font-size: 0.8rem; font-weight: 700;">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($recent)): ?>
                    <?php foreach($recent as $r): ?>
                        <tr>
                            <td style="padding: 15px; border-bottom: 1px solid #eee; color: #555;"><?= $r['nis'] ?></td>
                            <td style="padding: 15px; border-bottom: 1px solid #eee; font-weight: 600; color: #333;"><?= $r['nama'] ?></td>
                            <td style="padding: 15px; border-bottom: 1px solid #eee;">
                                <?php if($r['status'] == 'dipinjam'): ?>
                                    <span style="background-color: #FEF3C7; color: #92400E; padding: 4px 12px; border-radius: 6px; font-size: 0.75rem; font-weight: 700;">Dipinjam</span>
                                <?php else: ?>
                                    <span style="background-color: #D1FAE5; color: #065F46; padding: 4px 12px; border-radius: 6px; font-size: 0.75rem; font-weight: 700;">Dikembalikan</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="padding: 30px; text-align: center; color: #bbb;">Belum ada aktivitas terbaru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>