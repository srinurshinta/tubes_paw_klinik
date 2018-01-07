
  <div class="container-fluid">
  	<div class="row">
  	<div class="col-sm-12">
	<?php
	$carikode = mysql_query("select max(kode_obat) from tbl_obat") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "B".str_pad($kode, 3, "0", STR_PAD_LEFT);
	} else {
		$hasilkode = "B001";
	}
	?>
  		<div class="page-header"><h3 align="center">Tambah Data Obat</h3>
  		</div>
  		<form class="form-horizontal" action="" method="POST" role="form">
  		<div class="form-group">
  			<label for="kode_obat" class="control-label col-sm-3">Kode Obat</label>
  			<div class="col-sm-8">
  				<input type="text" name="kode_obat" id="kode_obat" value="<?php echo $hasilkode; ?>" class="form-control" placeholder="Masukan Kode Obat">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="nama_obat" class="control-label col-sm-3">Nama Obat</label>
  			<div class="col-sm-8">
  				<input type="text" name="nama_obat" id="nama_obat" class="form-control" placeholder="Masukan Nama Obat">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="jenis_obat" class="control-label col-sm-3">Jenis Obat</label>
  			<div class="col-sm-8">
  				<input type="text" name="jenis_obat" id="jenis_obat" class="form-control" placeholder="Masukan Jenis Obat">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="harga" class="control-label col-sm-3">Harga</label>
  			<div class="col-sm-8">
  				<input type="text" name="harga" id="harga" class="form-control" placeholder="Masukan Harga Obat">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="stock" class="control-label col-sm-3">Stock</label>
  			<div class="col-sm-8">
  				<input type="text" name="stock" id="stock" class="form-control" placeholder="Masukan Stock Obat">
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="expired" class="control-label col-sm-3">Expired</label>
  			<div class="col-sm-8">
  				<input type="date" name="expired" id="expired" class="form-control" placeholder="Expired">
  			</div>	
  		</div>

 		<div class="form-group">
 			<label for="btn" class="control-label col-sm-3"></label>
	 		<div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="submit" name="tambah" class="btn btn-danger btn-block" value="Tambah" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>
	
	 		</div>
 			
 		</div>
  			
  	</form>
	<?php
	$kode_obat = @$_POST['kode_obat'];
	$nama_obat = @$_POST['nama_obat'];
	$jenis_obat = @$_POST['jenis_obat'];
	$harga = @$_POST['harga'];
	$stock = @$_POST['stock'];
	$expired = @$_POST['expired'];

	$tambah_obat = @$_POST['tambah'];

	if($tambah_obat) {
		if($kode_obat == "" || $nama_obat == "" || $jenis_obat == "" || $harga == "" || $stock == "" || $expired == "") {
			?>
			<script type="text/javascript">
				alert("Inputan tidak boleh kosong!");
			</script>
			<?php
		} else {
			mysql_query("insert into tbl_obat values ('$kode_obat', '$nama_obat', '$jenis_obat', '$harga', '$stock', '$expired')") or die (mysql_error());
			?>
			<script type="text/javascript">
				alert("Tambah data obat berhasil");
				window.location.href="?page=obat";
			</script>
			<?php
		}
	}
	?>


  </div> <!-- akhir container-fluid semua -->









