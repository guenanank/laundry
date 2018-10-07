<!doctype html>
<html>
<head>
  <base href="<?php echo site_url() ?>" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Kiki Laundry POS Administration System">
  <meta name="author" content="nanank" />
  <title>Kiki Laundry
    <?php echo empty($title) ? null : sprintf('  &HorizontalLine;  %s', $title) ?>
  </title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('asset/images/favicon.ico') ?>" />
  <?php
    echo link_tag('assets/css/bootstrap.min.css');
    echo link_tag('assets/css/all.min.css');
    echo link_tag('assets/css/dataTables.bootstrap4.min.css');
    echo link_tag('assets/css/bootstrap-select.min.css');
    echo link_tag('assets/css/gijgo.min.css');
    echo link_tag('assets/css/sweetalert.min.css');
    if (!empty($styles)) {
        foreach ($styles as $style) {
            echo link_tag(sprintf('assets/css/%s.css', $style));
        }
    }
    echo link_tag('assets/css/spinner.css');
    echo link_tag('assets/css/sb-admin.min.css');
    ?>
    <style>
      .table tbody>tr>th,
      .table tbody>tr>td {
        vertical-align: middle;
      }
    </style>
    <script>
      // (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      // (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o)
      // ,m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      // })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      //
      // ga('create', 'UA-8183126-5', 'auto');
      // ga('send', 'pageview');
    </script>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="<?php echo base_url() ?>">Kiki Laundry</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">
    <?php include_once APPPATH . 'views/menu.php' ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
