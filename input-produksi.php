<?php include "session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   <?php include "menu.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "navbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Produksi</h1>
          <!-- <p class="mb-4">Inventory <sup>App</sup> www.hakkoblogs.com</p> -->
		  
		  
		  
<?php
if(isset($_POST['simpan'])){

$id_produk   			= $_POST['id_produk'];
$nama_produk 			= $_POST['nama_produk'];
$jenis_barang       	= $_POST['jenis_barang'];
$kategori     			= $_POST['kategori'];
$tgl_produksi     	    = $_POST['tgl_produksi'];

$bahan       			= $_POST['bahan'];
// $jumlah_bahan   		= $_POST['jumlah_bahan'];

$qty         			= $_POST['qty'];
$satuan      			= $_POST['satuan'];


                     $insert = mysqli_query($koneksi, "INSERT INTO produk(id_produk, nama_produk, jenis_barang, kategori, tgl_produksi, bahan, qty, satuan)
                     VALUES('$id_produk', '$nama_produk', '$jenis_barang', '$kategori', '$tgl_produksi', '$bahan', '$qty', '$satuan' )") or die(mysqli_error($koneksi));

                    $qp = mysqli_query($koneksi, "UPDATE produk SET qty=(qty-'$qty') WHERE id_produk='$bahan'");
                     if($insert&&$qp){
						 
                          //$querack = mysqli_query($koneksi, "UPDATE rack SET status='$terisi' WHERE rack_no='$rack_no'");

                          //$insert_history = mysqli_query($koneksi, "INSERT INTO histori_transaksi(id, tanggal, id_pallet, rack_no, part_no, qty, unit, status, pic)
                          //VALUES('$id', '$date', '$id_pallet', '$rack_no', '$part_no', '$qty', '$unit', '$status', '$_SESSION[fullname]')") or die(mysqli_error($koneksi));
                          //echo "<script>window.location = 'index.php'</script>";  
                          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				       }else{
					      echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
                       }
}
?>



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Waktunya produksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form class="form-horizontal style-form" action="input-produksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          
						  

              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>Cari Bahan</b> <span class="glyphicon glyphicon-search"></span></button>
                              </label>
                              <div class="col-sm-6">
                              <input name="bahan" type="text" id="bahan" class="form-control" placeholder="bahan produksi" autocomplete="off" readonly="readonly" /> 
                              </div> 
                          </div>
						  
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah bahan</label>
                              <div class="col-sm-6">
                                  <input name="qty" type="number" id="qty" class="form-control" placeholder="jumlah bahan" autocomplete="off" required="required" readonly="readonly"/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Satuan</label>
                              <div class="col-sm-6">
                                  <input name="satuan" type="text" id="satuan" class="form-control" placeholder="Satuan" autocomplete="off" required="required"  readonly="readonly" />
                              </div>
                          </div>
						  
						<div class="form-group">
                           <hr>
                        </div>

						 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Id Produk</label>
                              <div class="col-sm-6">
                                  <input name="id_produk" type="text" id="id_produk" class="form-control" placeholder="Id produk" autocomplete="off" required="required" />
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                              <div class="col-sm-6">
                                  <input name="nama_produk" type="text" id="nama_produk" class="form-control" placeholder="Nama Produk" autocomplete="off" required="required" />
                              </div>
                          </div>
						  
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jenis barang</label>
                              <div class="col-sm-6">
                                  <input name="jenis_barang" type="text" id="jenis_barang" class="form-control" placeholder="jenis barang" autocomplete="off" required="required" />
                              </div>
                          </div>
						  
                          <div class="form-group">
                          <div class="input-group mb-6">
                              <div class="col-sm-6">
                              
                              <select class="custom-select" id="kategori" name="kategori" >
                                <option selected> - pilih kategori </option>
                                <option value="1">barang jadi</option>
                                <option value="0">bahan baku</option>
                             </select>
                              </div>
                          </div>
                          </div>
						  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Produksi</label>
                              <div class="col-sm-6">
                                  <input name="tgl_produksi" type="date" id="tgl_produksi" class="form-control" value="<?php $d = date("Y-m-d"); echo $d; ?>" placeholder="tgl_produksi" autocomplete="off" required/>
                              </div>
                          </div>
						  
						 
						  
						  
<!-- 						  
						<div class="form-group">
                           <hr>
                        </div> -->
						  
						  
						  
						   <!-- <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>Cari Bahan</b> <span class="glyphicon glyphicon-search"></span></button>
                              </label>
                              <div class="col-sm-6">
                              <input name="bahan" type="text" id="bahan" class="form-control" placeholder="bahan produksi" autocomplete="off" readonly="readonly" /> 
                              </div> 
                          </div>
						  
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah bahan</label>
                              <div class="col-sm-6">
                                  <input name="qty" type="number" id="qty" class="form-control" placeholder="jumlah bahan" autocomplete="off" required="required" readonly="readonly"/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Satuan</label>
                              <div class="col-sm-6">
                                  <input name="satuan" type="text" id="satuan" class="form-control" placeholder="Satuan" autocomplete="off" required="required"  readonly="readonly" />
                              </div>
                          </div> -->
						  
						<!-- <div class="form-group">
                           <hr>
                        </div> -->

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Produksi</label>
                              <div class="col-sm-6">
                                  <input name="qty_prod" type="number" id="qty_prod" class="form-control" placeholder="QTY" autocomplete="off" required="required" />
                              </div>
                          </div>
						  
						   
                          
                          <div class="form-group">
                          <div class="input-group mb-6">
                              <div class="col-sm-6">
                              
                              <select class="custom-select" id="satuan" name="satuan" >
                                <option selected> - pilih satuan </option>
                                <option value="kg">kg</option>
                                <option value="ton">ton</option>
                             </select>
                              </div>
                          </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="transaksi.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
  <?php include "footer.php"; ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width:600px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Master Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Part No</th>
                                    <th>Partname</th>
									<th>Qty</th>
                                    <th>Satuan</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                               
                                $query = mysqli_query($koneksi, 'SELECT * FROM produk where qty > 0 AND kategori = 0 ');
                                while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr class="pilih" data-part="<?php echo $data['id_produk'];  ?>" data-name="<?php echo $data['nama_produk'];  ?>" qty="<?php echo $data['qty'];  ?>" satuan="<?php echo $data['satuan'];  ?>">
                                        <td><?php echo $data['id_produk']; ?></td>
                                        <td><?php echo $data['nama_produk']; ?></td>
                                        <td><?php echo $data['qty']; ?></td>
										<td><?php echo $data['satuan']; ?></td>
                                        <td><?php echo $data['kategori']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("bahan").value = $(this).attr('data-part');
                document.getElementById("qty").value = $(this).attr('qty');
                document.getElementById("satuan").value = $(this).attr('satuan');
                // document.getElementById("nama_produk").value = $(this).attr('data-name');
                
                $('#myModal').modal('hide');
            });

//            tabel lookup mahasiswa
            $(function () {
                $("#lookup").dataTable();
            });

            function dummy() {
                var nim = document.getElementById("nim").value;
                alert('Nomor Induk Mahasiswa ' + nim + ' berhasil tersimpan');
				
				var ket = document.getElementById("ket").value;
                alert('Keterangan ' + ket + ' berhasil tersimpan');
            }
        </script>
</body>

</html>
