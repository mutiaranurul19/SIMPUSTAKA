<!DOCTYPE html>
<html>
<head>
    <title>SIMPUSTAKA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body { display:flex; min-height:100vh; margin:0; }

        .sidebar {
            width:240px;
            background:#1e1e2f;
            color:white;
            padding:15px;
        }

        .sidebar a {
            display:block;
            color:#ddd;
            padding:10px;
            text-decoration:none;
        }

        .sidebar a:hover {
            background:#34344a;
            color:white;
        }

        .content {
            flex:1;
            background:#f4f6f9;
            padding:20px;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>SIMPUSTAKA</h4>
    <hr>

    <a href="<?= base_url('dashboard') ?>"><i class="fa fa-home"></i> Dashboard</a>
    <a href="<?= base_url('buku') ?>"><i class="fa fa-book"></i> Buku</a>
    <a href="<?= base_url('anggota') ?>"><i class="fa fa-users"></i> Anggota</a>
    <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-share"></i> Peminjaman</a>
    <a href="<?= base_url('pengembalian') ?>"><i class="fa fa-rotate-left"></i> Pengembalian</a>

    <hr>
    <a href="<?= base_url('logout') ?>">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>