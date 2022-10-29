  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url(); ?>vendor/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block">TAMAYA Dept Store</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
<nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo site_url('data'); ?>" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Data Barang
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('beli'); ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pembelian
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo site_url('report'); ?>" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Report
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Konfigurasi
              </p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo site_url('user'); ?>" class="nav-link">
                    <i class="fas fa-user-check nav-icon"></i>
                    <p>User Modul</p>
                  </a>
                </li>
            </ul>
          </li>
      </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<script>
  let log_off = new Date();
  log_off.setSeconds(log_off.getSeconds() + <?php echo $auto; ?>)
  log_off = new Date(log_off)
  let int_logoff = setInterval(function() {
    let now = new Date();
    if (now > log_off) {
      window.location.assign("<?php echo base_url('home'); ?>");
      clearInterval(int_logoff);
    }
  }, 5000);

  $('body').on('click', function() {
    console.log('asdfsaf')
    log_off = new Date()
    log_off.setSeconds(log_off.getSeconds() + <?php echo $auto; ?>)
    log_off = new Date(log_off)
    console.log(log_off)
  })
</script>