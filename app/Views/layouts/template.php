<!DOCTYPE html>
<html>
<head>
    <title>SIMPUSTAKA</title>

    <link rel="stylesheet" href="<?= base_url('assets/celestial/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/celestial/css/style.css') ?>">
</head>

<body>

<div class="container-scroller">

    <!-- SIDEBAR -->
    <?= $this->include('layout/sidebar') ?>

    <div class="container-fluid page-body-wrapper">

        <!-- NAVBAR -->
        <?= $this->include('layout/navbar') ?>

        <!-- CONTENT -->
        <div class="main-panel">
            <div class="content-wrapper">

                <?= $this->renderSection('content') ?>

            </div>
        </div>

    </div>
</div>

<script src="<?= base_url('assets/celestial/vendors/js/vendor.bundle.base.js') ?>"></script>
<script src="<?= base_url('assets/celestial/js/off-canvas.js') ?>"></script>
<script src="<?= base_url('assets/celestial/js/template.js') ?>"></script>

</body>
</html>