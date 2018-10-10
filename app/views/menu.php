<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="<?php echo base_url('dasbor') ?>">Kiki Laundry</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="accordionMenu">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="<?php echo base_url('dasbor') ?>">
          <i class="fa fa-fw fa-home"></i>
          <span class="nav-link-text">Halaman Utama</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master Data">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#masterData" data-parent="#accordionMenu">
          <i class="fa fa-fw fa-industry"></i>
          <span class="nav-link-text">Master</span>
        </a>
        <ul class="sidenav-second-level collapse" id="masterData">
          <li><?php echo anchor('karyawan', 'Karyawan') ?></li>
          <li><?php echo anchor('pelanggan', 'Pelanggan') ?></li>
          <li><?php echo anchor('barang', 'Barang') ?></li>
          <li><?php echo anchor('cuci', 'Cucian') ?></li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Order">
        <a class="nav-link" href="<?php echo base_url('order') ?>">
          <i class="fa fa-fw fa-flash"></i>
          <span class="nav-link-text">Order</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administrasi">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#administrasi" data-parent="#accordionMenu">
          <i class="fa fa-fw fa-money"></i>
          <span class="nav-link-text">Administrasi</span>
        </a>
        <ul class="sidenav-second-level collapse" id="administrasi">
          <li><?php echo anchor('pemasukan', 'Pemasukan') ?></li>
          <li><?php echo anchor('pengeluaran', 'Pengeluaran') ?></li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
