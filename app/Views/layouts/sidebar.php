<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item nav-profile">
      <a class="nav-link" href="#">
        <div class="nav-profile-image">
          <img src="<?= base_url('assets/celestial/images/faces/face1.jpg') ?>" alt="profile">
        </div>
        <div class="nav-profile-text">
          <p class="mb-1"><?= session('nama') ?? 'Admin' ?></p>
          <small class="text-muted"><?= session('role') ?? 'Administrator' ?></small>
        </div>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard') ?>">
        <i class="menu-icon mdi mdi-home"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-book-open-page-variant"></i>
        <span class="menu-title">Data Buku</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Data Anggota</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-book"></i>
        <span class="menu-title">Peminjaman</span>
      </a>
    </li>

  </ul>
</nav>