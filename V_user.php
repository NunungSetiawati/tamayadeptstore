<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Admin</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fa fa-user-tag">+</i>&nbspTambah</button>
      <p>
        <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">User Admin</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 450px;">
              <table id="example1" class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th style="width: 10px;">No</th>
                    <th>User</th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($user as $m) {  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $m['_fldsnama']; ?></td>
                      <td><?php echo $m['_fldspassword']; ?></td>
                      <td>
                        <a href="#" type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-default1<?php echo $m['id']; ?>"><i class="fas fa-user-edit"></i></a>
                        <a href="user/delete/<?php echo $m['id']; ?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button></a>
                      </td>
                    </tr>

                    <!-- Modal Edit Mahasiswa-->
                    <div class="modal fade" id="modal-default1<?php echo $m['id']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Update User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?php echo site_url('user/update'); ?>" method="post" enctype="multipart/form-data">
                              <?php
                              include 'koneksi.php';
                              $id = $m['id'];
                              $query_edit = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id='$id'");
                              while ($list = mysqli_fetch_array($query_edit)) {
                              ?>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                      <label>User</label>
                                      <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
                                      <input name="_fldsnama" class="form-control" type="text" value="<?php echo $list['_fldsnama']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Password</label>
                                      <input name="_fldspassword" type="password" class="form-control" value="<?php echo $list['_fldspassword']; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="submit" class="btn btn-warning" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                </div><?php } ?>
                            </form>
                          </div>

                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->

                    </div>
                    <!-- FORM EDIT --->

                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <!---Modal-->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Tambah User Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('user/tambah'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>User</label>
                  <input name="_fldsnama" class="form-control" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Password</label>
                  <input name="_flds_password" class="form-control" type="text">
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-warning" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

  </div>
  <!-- /.content -->
</div>
<!-- Modal start here -->
<script src="<?php echo base_url(); ?>vendor/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>vendor/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/plugins/jquery/jquery.min.js"></script>
