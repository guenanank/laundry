<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url() ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="master" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Master</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="master">
      <?php echo anchor('karyawan', 'Karyawan', ['class' => 'dropdown-item']) ?>
      <?php echo anchor('pelanggan', 'Pelanggan', ['class' => 'dropdown-item']) ?>
      <?php echo anchor('barang', 'Barang', ['class' => 'dropdown-item']) ?>
      <?php echo anchor('cuci', 'Cucian', ['class' => 'dropdown-item']) ?>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('order') ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Order</span></a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="administrasi" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Administrasi</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="administrasi">
      <?php echo anchor('pemasukan', 'Pemasukan', ['class' => 'dropdown-item']) ?>
      <?php echo anchor('pengeluaran', 'Pengeluaran', ['class' => 'dropdown-item']) ?>
    </div>
  </li>
</ul>
