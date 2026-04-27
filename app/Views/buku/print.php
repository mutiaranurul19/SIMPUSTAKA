<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Print Data Buku - SIMPUSTAKA</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .header p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #4CAF50;
            color: white;
        }

        /* PRINT MODE */
        @media print {
            body {
                font-size: 12px;
            }

            th {
                background: #ddd !important;
                color: black !important;
            }
        }
    </style>

</head>

<body onload="window.print()">

    <!-- HEADER -->
    <div class="header">
        <h2>SIMPUSTAKA</h2>
        <p>Laporan Data Buku</p>
    </div>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Jumlah</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; foreach ($buku as $b): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($b['judul']) ?></td>
                    <td><?= esc($b['nama_kategori'] ?? '-') ?></td>
                    <td><?= esc($b['nama_penulis'] ?? '-') ?></td>
                    <td><?= esc($b['nama_penerbit'] ?? '-') ?></td>
                    <td><?= esc($b['tahun_terbit']) ?></td>
                    <td><?= esc($b['jumlah']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>