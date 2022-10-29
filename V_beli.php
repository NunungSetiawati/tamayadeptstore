  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pembelian</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-folder-plus"></i>&nbspTambah </button>
        <p>
          <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Data Pembelian</h3>
                </div>
              <div class="card-body">
                <table id="example1" class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10px;">No</th>
                      <th>Tgl Pembelian</th>
                      <th>Nama Barang</th>
					  <th>Merk</th>
					  <th>Jenis</th>
                      <th>Harga</th>
					  <th>Jumlah</th>
					  <th>Diskon</th>
					  <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($beli as $m) {  ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $m['_flddtgl']; ?></td>
                        <td><?php echo $m['_fldsnamabrg']; ?></td>
						<td><?php echo $m['_fldsmerk']; ?></td>
                        <td><?php echo $m['_fldsjenis']; ?></td>
                        <td><?php echo rp($m['_fldsharga']); ?></td>
						<td><?php echo $m['_fldsjml']; ?></td>
						<td><?php echo $m['_fldsdiskon'];?></td>
                        <td><?php echo rp($m['_fldstotal']); ?></td>
                        <td>
                          <div class="form-button-action" align="center">
                            <a href="#" type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-lgedit<?php echo $m['id']; ?>"><i class="fas fa-user-edit"></i></a>
                            <a href="beli/delete/<?php echo $m['id']; ?>"><button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button></a>
						</tr>

                      <!-- Modal Edit-->
                      <div class="modal fade" id="modal-lgedit<?php echo $m['id']; ?>">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Data Pembelian</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
							<?php
                                include 'koneksi.php';
                                $id = $m['id'];
                                $query_edit = mysqli_query($koneksi, "SELECT * FROM tbl_pembelian WHERE id='$id'");
                                while ($list = mysqli_fetch_array($query_edit)) {
                                ?>
                              <form action="<?php echo site_url('beli/update'); ?>" method="post">
				<div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">[ Jumlah Pembelian ]</h3>
                  </div>
                  <div class="card-body">
				  <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tanggal Pembelian</label>
					<input type="hidden" name="id" value="<?php echo $list['id']; ?>">
                    <input name="_flddtgl" class="form-control" type="date" value="<?php echo $list['_flddtgl']; ?>">
                  </div>
				</div>
				
				<div class="col-sm-6">  
				  <div class="form-group">
                     <label>Total</label>
					 <input name="_fldstotal" class="form-control" type="text" id="tedit" value="<?php echo $list['_fldstotal']; ?>">
                  </div>
                </div>
				</div>
                    <div class="row after-add-more">
                      <div class="col-3">
                       <label>Nama Barang</label>
						<select name="_fldsnamabrg" class="form-control" id="brgedit">
						<option></option>
                        <?php foreach ($brg as $data) { 
						if ($list['_fldsnamabrg'] == $data['_fldsnamabrg']) {
                          $select = "selected"; } else {
                          $select = "";  }?>
                         <option <?php echo $select; ?> value="<?php echo $data['_fldsnamabrg']; ?>" data-merkedit="<?php echo $data['_fldsmerk'];?>" data-jenisedit="<?php echo $data['_fldsjenis'];?>"  data-hedit="<?php echo $data['_fldsharga'];?>"><?php echo $data['_fldsnamabrg']; ?> </option>
                        <?php } ?>
						</select>
                      </div>
                      <div class="col-2">
                        <label>Merk</label>
						<input name="_fldsmerk" id="merkedit" class="form-control" type="text" value="<?php echo $list['_fldsmerk']; ?>">
                      </div>
					  <div class="col-2">
                        <label>Jenis</label>
						<input name="_fldsjenis" id="jenisedit" class="form-control" type="text" value="<?php echo $list['_fldsjenis']; ?>">
                      </div>
                      <div class="col-2">
                        <label>Harga</label>
						<input name="_fldsharga" class="form-control" type="text" id="hedit" onchange="edit()" value="<?php echo $list['_fldsharga']; ?>">
                      </div> 
                      <div class="col-1">
                        <label>Jumlah</label>
						<input name="_fldsjml" class="form-control" type="text" id="jedit" onchange="edit()" value="<?php echo $list['_fldsjml']; ?>">
                      </div>
                      <div class="col-2">
                        <label>Disc</label>
						<input name="_fldsdiskon" class="form-control" id="dedit" type="text" value="<?php echo $list['_fldsdiskon']; ?>">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
				<?php } ?>
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
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Tambah Data Pembelian</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
			<div class="tab-pane" id="tab_2">
                <a class="btn btn-app" id="anggota">
                  <span class="badge bg-teal"></span>
                  <i class="fas fa-inbox"></i> Anggota
                </a>
                <a class="btn btn-app" id="pembeli">
                  <span class="badge bg-teal"></span>
                  <i class="fas fa-inbox"></i> Pembeli
                </a>
	
	<div id="box_anggota" style="display: none;">
	<form action="<?php echo site_url('beli/tambah'); ?>" method="post">
				<div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">[ Jumlah Pembelian ]</h3>
                  </div>
                  <div class="card-body">
				  <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input name="_flddtgl" class="form-control" type="date">
                  </div>
				</div>
				
				<div class="col-sm-6">  
				  <div class="form-group">
                     <label>Total</label>
					 <input name="_fldstotal" class="form-control" type="text" id="t">
                  </div>
                </div>
				</div>
                    <div class="row after-add-more">
                      <div class="col-3">
                       <label>Nama Barang</label>
						<select name="_fldsnamabrg" class="form-control" id="brg">
						<option></option>
                        <?php foreach ($brg as $data) { ?>
                         <option value="<?php echo $data['_fldsnamabrg']; ?>" data-merk="<?php echo $data['_fldsmerk'];?>" data-jenis="<?php echo $data['_fldsjenis'];?>"  data-harga="<?php echo $data['_fldsharga'];?>"><?php echo $data['_fldsnamabrg']; ?> </option>
                        <?php } ?>
						</select>
                      </div>
                      <div class="col-2">
                        <label>Merk</label>
						<input name="_fldsmerk" id="merk" class="form-control" type="text">
                      </div>
					  <div class="col-2">
                        <label>Jenis</label>
						<input name="_fldsjenis" id="jenis" class="form-control" type="text">
                      </div>
                      <div class="col-2">
                        <label>Harga</label>
						<input name="_fldsharga" class="form-control" type="text" id="h" onchange="sum()">
                      </div> 
                      <div class="col-1">
                        <label>Jumlah</label>
						<input name="_fldsjml" class="form-control" type="text" id="j" onchange="sum()">
                      </div>
                      <div class="col-2">
                        <label>Disc</label>
						<input name="_fldsdiskon" class="form-control" type="text" value="5%">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
	</div>
	
	<div id="box_pembeli" style="display: none;">
	<form action="<?php echo site_url('beli/tambah'); ?>" method="post">
				<div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">[ Jumlah Pembelian ]</h3>
                  </div>
                  <div class="card-body">
				  <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input name="_flddtgl" class="form-control" type="date">
                  </div>
				</div>
				
				<div class="col-sm-6">  
				  <div class="form-group">
                     <label>Total</label>
					 <input name="_fldstotal" class="form-control" type="text" id="t2">
                  </div>
                </div>
				</div>
                    <div class="row after-add-more">
                      <div class="col-3">
                       <label>Nama Barang</label>
						<select name="_fldsnamabrg" class="form-control" id="_fldsnamabrg2">
						<option></option>
                        <?php foreach ($brg as $data) { ?>
                         <option value="<?php echo $data['_fldsnamabrg']; ?>" data-merk2="<?php echo $data['_fldsmerk'];?>" data-jenis2="<?php echo $data['_fldsjenis'];?>"  data-harga2="<?php echo $data['_fldsharga'];?>"><?php echo $data['_fldsnamabrg']; ?> </option>
                        <?php } ?>
						</select>
                      </div>
                      <div class="col-2">
                        <label>Merk</label>
						<input name="_fldsmerk" id="merk2" class="form-control" type="text">
                      </div>
					  <div class="col-2">
                        <label>Jenis</label>
						<input name="_fldsjenis" id="jenis2" class="form-control" type="text">
                      </div>
                      <div class="col-2">
                        <label>Harga</label>
						<input name="_fldsharga" class="form-control" type="text" id="h2" onchange="sum2()">
                      </div> 
                      <div class="col-1">
                        <label>Jumlah</label>
						<input name="_fldsjml" class="form-control" type="text" id="j2" onchange="sum2()">
                      </div>
                      <div class="col-2">
                        <label>Disc</label>
						<input name="_fldsdiskon" class="form-control" type="text"  disabled>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
	</div>
			</div>
			
			
            
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
$('#brg').on('change', function(){
  const merk = $('#brg option:selected').data('merk');
  const jenis = $('#brg option:selected').data('jenis');
  const harga = $('#brg option:selected').data('harga');
  $('[id=merk]').val(merk);
  $('[id=jenis]').val(jenis);
  $('[id=h]').val(harga);
});

$('#_fldsnamabrg2').on('change', function(){
  const merk2 = $('#_fldsnamabrg2 option:selected').data('merk2');
  const jenis2 = $('#_fldsnamabrg2 option:selected').data('jenis2');
  const harga2 = $('#_fldsnamabrg2 option:selected').data('harga2');
  $('[id=merk2]').val(merk2);
  $('[id=jenis2]').val(jenis2);
  $('[id=h2]').val(harga2);
});

$('#brgedit').on('change', function(){
  const merk2 = $('#brgedit option:selected').data('merkedit');
  const jenis2 = $('#brgedit option:selected').data('jenisedit');
  const harga2 = $('#brgedit option:selected').data('hedit');
  $('[id=merkedit]').val(merk2);
  $('[id=jenisedit]').val(jenis2);
  $('[id=hedit]').val(harga2);
});


function sum() {
var _fldsharga = document.getElementById('h').value;
var _fldsjml = document.getElementById('j').value;
var total = _fldsharga*_fldsjml;
var disc = total*5/100

document.getElementById('t').value = total-disc;
}

function sum2() {
var _fldsharga = document.getElementById('h2').value;
var _fldsjml = document.getElementById('j2').value;

document.getElementById('t2').value = _fldsharga*_fldsjml;
}

function edit() {
var _fldsharga = document.getElementById('hedit').value;
var _fldsjml = document.getElementById('jedit').value;
var d = document.getElementById('dedit').value;
var total = _fldsharga*_fldsjml;
var disc = total*d/100

document.getElementById('tedit').value = total-disc;
}

     $(document).ready(function() {
  
     $("#anggota").click(function() {
       $("#box_anggota").show();
       $("#box_pembeli").hide();
     })

     $("#pembeli").click(function() {
      $("#box_pembeli").show();
      $("#box_anggota").hide();
     })

  
   });

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>