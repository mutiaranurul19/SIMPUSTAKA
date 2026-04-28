<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="#">SIM</a>
  </div>

  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">

    <button class="navbar-toggler navbar-toggler align-self-center" type="button">
      <span class="mdi mdi-menu"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">

      <li class="nav-item dropdown">
        <a class="nav-link" href="#">
          <i class="mdi mdi-bell"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="#">
          <i class="mdi mdi-account-circle"></i>
          <?= session('nama') ?? 'Admin' ?>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
          Logout
        </a>
      </li>

    </ul>

  </div>
</nav>