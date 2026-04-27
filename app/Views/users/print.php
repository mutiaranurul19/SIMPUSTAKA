<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Users</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .header{
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2{
            margin: 0;
        }

        .header p{
            margin: 5px 0;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th{
            background: #2c3e50;
            color: white;
            padding: 10px;
        }

        td{
            padding: 8px;
            text-align: center;
        }

        table, th, td{
            border: 1px solid #333;
        }

        .footer{
            margin-top: 30px;
            text-align: right;
        }

        @media print{
            button{ display:none; }
        }
    </style>
</head>

<body onload="window.print()">

<div class="header">
    <h2>SIMPUSTAKA</h2>
    <p>Laporan Data Users</p>
    <hr>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
        </tr>
    </thead>

    <tbody>
        <?php $no=1; foreach($users as $u): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($u['nama']) ?></td>
            <td><?= esc($u['email']) ?></td>
            <td><?= esc($u['username']) ?></td>
            <td>
                <?php if($u['role']=='admin'): ?>
                    Admin
                <?php elseif($u['role']=='petugas'): ?>
                    Petugas
                <?php else: ?>
                    Anggota
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="footer">
    <p>Dicetak tanggal: <?= date('d-m-Y') ?></p>
</div>

</body>
</html>