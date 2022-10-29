<div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>REPORT</h1>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                      <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                   <a class="nav-link" href="<?php echo site_url('report');?>">Penjualan</a></li>
				  <li class="nav-item">
                   <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Per Unit</a>
                </ul> 
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">                 
<!--- TABEL BBM ---->                   
          <div class="card">
            <div class="card-header"> 
                <div class="row">
                <div class="col-md-8"> 
                  <form  action="<?php echo site_url('report/perunit');?>" method="POST" class="form-inline mt-3" target="_blank">
                  <label for="date1">Tanggal&nbsp&nbsp&nbsp&nbsp</label>
                  <input type="date" name="date1" id="date1" class="form-control mr-2">
                  <label for="date2">Nama Barang&nbsp&nbsp&nbsp&nbsp</label>
				  <select name="_fldsnamabrg" class="form-control mr-2">
					<option></option>
                    <?php foreach ($brg as $data) { ?>
                    <option value="<?php echo $data['_fldsnamabrg']; ?>"><?php echo $data['_fldsnamabrg']; ?> </option>
                    <?php } ?>
				  </select>
                  <button type="submit" class="btn btn-warning btn-md"><i class="fas fa-print"></i>&nbspCetak</button>
                  </form>
                </div>
				
              </div>
            </div>

                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					  <th>No</th>
                      <th>Tgl Pembelian</th>
                      <th>Nama Barang</th>
					  <th>Merk</th>
					  <th>Jenis</th>
                      <th>Harga</th>
					  <th>Jumlah</th>
					  <th>Diskon</th>
					  <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					include 'koneksi.php';
					$q = mysqli_query($koneksi,"SELECT  * FROM tbl_pembelian ORDER BY id DESC");
                    $no = 1;
                    while ($m = mysqli_fetch_array($q)) { ?>
                      <tr>
                      <td><?php echo $no++; ?></td>
                        <td><?php echo $m['_flddtgl']; ?></td>
                        <td><?php echo $m['_fldsnamabrg']; ?></td>
						<td><?php echo $m['_fldsmerk']; ?></td>
                        <td><?php echo $m['_fldsjenis']; ?></td>
                        <td><?php echo $m['_fldsharga']; ?></td>
						<td><?php echo $m['_fldsjml']; ?></td>
						<td><?php echo $m['_fldsdiskon'];?></td>
                        <td><?php echo $m['_fldstotal']; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
<!--END TABEL -->
                  </div>
                  <!-- BBM END -->
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>


            </div>

          </div>

        </div>

      </section>


    </div>

  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>vendor/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>vendor/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>vendor/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
$(function () {
  $("#example1").DataTable({
  "responsive": true, "lengthChange": false, "autoWidth": false,
  "buttons": ["excel"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

</script>