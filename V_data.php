  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-folder-plus"></i>&nbspTambah </button>
        <p>
          <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Data Barang</h3>
                </div>
              <div class="card-body">
                <table id="example1" class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10px;">No</th>
                      <th>Nama Barang</th>
                      <th>Merk</th>
                      <th>Jenis</th>
                      <th>Harga</th>
					  <th>Total</th>
                      <th>No Rak</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($brg as $m) {  ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $m['_fldsnamabrg']; ?></td>
                        <td><?php echo $m['_fldsmerk']; ?></td>
                        <td><?php echo $m['_fldsjenis']; ?></td>
                        <td><?php echo $m['_fldsharga']; ?></td>
						<td><?php echo $m['_flditotal']; ?></td>
                        <td><?php echo $m['_fldsnorak']; ?></td>
                        <td>
                          <div class="form-button-action" align="center">
                            <a href="#" type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-defaultl<?php echo $m['id']; ?>"><i class="fas fa-user-edit"></i></a>
                            <a href="data/delete/<?php echo $m['id']; ?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button></a>
						</tr>

                      <!-- Modal Edit-->
                      <div class="modal fade" id="modal-defaultl<?php echo $m['id']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Data Barang</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo site_url('data/update'); ?>" method="post">
                                <?php
                                include 'koneksi.php';
                                $id = $m['id'];
                                $query_edit = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id='$id'");
                                while ($list = mysqli_fetch_array($query_edit)) {
                                ?>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
                                        <input name="_fldsnamabrg" class="form-control" type="text" value="<?php echo $list['_fldsnamabrg']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Merk</label>
                                        <input name="_fldsmerk" class="form-control" type="text" value="<?php echo $list['_fldsmerk']; ?>">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Jenis</label>
                                        <input name="_fldsjenis" class="form-control" type="text" value="<?php echo $list['_fldsjenis']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Harga</label>
                                        <input name="_fldsharga" class="form-control" type="text" value="<?php echo $list['_fldsharga']; ?>">
                                      </div>
                                    </div>
                                  </div>
								  
								  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Total</label>
                                        <input name="_flditotal" class="form-control" type="text" value="<?php echo $list['_flditotal']; ?>">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>No Rak</label>
                                        <input name="_fldsnorak" class="form-control" type="text" value="<?php echo $list['_fldsnorak']; ?>">
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
            <h4 class="modal-title">Form Tambah Data Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo site_url('data/tambah'); ?>" method="post">
              <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input name="_fldsnamabrg" class="form-control" type="text">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Merk</label>
                    <input name="_fldsmerk" class="form-control" type="text">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Jenis</label>
                    <input name="_fldsjenis" class="form-control" type="text">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Harga</label>
                    <input name="_fldsharga" class="form-control" type="text">
                  </div>
                </div>
              </div>
			  
			  <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Total</label>
                    <input name="_flditotal" class="form-control" type="text">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>No Rak</label>
                    <input name="_fldsnorak" class="form-control" type="text">
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>