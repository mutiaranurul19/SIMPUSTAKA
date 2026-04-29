<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Buku</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 12px; color: #333; margin: 30px; }
        .header { text-align: center; border-bottom: 2px solid #444; padding-bottom: 10px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #f2f2f2; border: 1px solid #ddd; padding: 10px; text-transform: uppercase; font-size: 10px; }
        td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .text-center { text-align: center; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1 style="margin:0;">SIMPUSTAKA</h1>
        <p style="margin:5px 0;">Laporan Inventaris Koleksi Buku Perpustakaan</p>
        <small>Dicetak pada: <?= date('d/m/Y H:i') ?></small>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>ISBN</th>
                <th width="30%">Judul Buku</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($buku as $b): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= esc($b['isbn']) ?></td>
                    <td style="font-weight: bold;"><?= esc($b['judul']) ?></td>
                    <td><?= esc($b['nama_kategori'] ?? '-') ?></td>
                    <td><?= esc($b['nama_penerbit'] ?? '-') ?></td>
                    <td class="text-center"><?= esc($b['tahun_terbit']) ?></td>
                    <td class="text-center"><?= esc($b['jumlah']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>