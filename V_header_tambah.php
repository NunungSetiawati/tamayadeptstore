<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SiduPURTI</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<script src="<?php echo base_url(); ?>vendor/jquery/jquery-1.4.2.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.hotkeys.js"></script>

<script type="text/javascript">
  document.onkeyup = function(e) {
    if (e.ctrlKey && e.which == 123) {
      window.location = '<?php echo site_url(); ?>konfigurasi/red';
    } else if (e.ctrlKey && e.which == 112) {
      window.location = '<?php echo site_url(); ?>konfigurasi/green';
    }
  };
</script>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm sidebar-collapse sidebar-closed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo site_url('home/utama'); ?>" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('home/logout'); ?>" role="button">
            <i class="fas fa-sign-out-alt">Logout</i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->