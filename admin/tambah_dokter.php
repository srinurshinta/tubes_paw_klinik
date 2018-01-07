
  <div class="container-fluid">
  	<div class="row">
  	<div class="col-sm-12">
	<?php
	$carikode = mysql_query("select max(kode_dokter) from tbl_dokter") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "D".str_pad($kode, 3, "0", STR_PAD_LEFT);
	} else {
		$hasilkode = "D001";
	}
	?>
  		<div class="page-header"><h3 align="center">Tambah Data Dokter</h3>
  		</div>
  		<form class="form-horizontal" action="" method="POST" role="form">
  		<div class="form-group">
  			<label for="kode_dokter" class="control-label col-sm-3">Kode Dokter</label>
  			<div class="col-sm-8">
  				<input type="text" name="kode_dokter" id="kode_dokter" value="<?php echo $hasilkode; ?>" class="form-control" placeholder="Masukan Kode Dokter">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="nama_dokter" class="control-label col-sm-3">Nama Dokter</label>
  			<div class="col-sm-8">
  				<input type="text" name="nama_dokter" id="nama_dokter" class="form-control" placeholder="Masukan Nama Lengkap">
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="tgl_lahir" class="control-label col-sm-3">Tanggal Lahir</label>
  			<div class="col-sm-8">
  				<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir">
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="tempat_lahir" class="control-label col-sm-3">Tempat Lahir</label>
  			<div class="col-sm-8">
  				<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir">
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="jk" class="control-label col-sm-3">Jenis Kelamin</label>
  			<div class="col-sm-8">
  				<select class="form-control" name="jk" id="jk">
  					<option value="">--Pilih Jenis Kelamin--</option>
  					<option value="Laki-laki">Laki-laki</option>
  					<option value="Perempuan">Perempuan</option>
  				</select>
  			</div>	
  		</div>


  		<div class="form-group">
  			<label for="no_telp" class="control-label col-sm-3">No. Handphone</label>
  			<div class="col-sm-8">
  				<input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukan No. Handphone">
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="alamat" class="control-label col-sm-3">Alamat</label>
  			<div class="col-sm-8">
  				<textarea class="form-control" rows="3" name="alamat" id="alamat"></textarea>
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
	$kode_dokter = @$_POST['kode_dokter'];
	$nama_dokter = @$_POST['nama_dokter'];
	$tgl_lahir = @$_POST['tgl_lahir'];
	$tempat_lahir = @$_POST['tempat_lahir'];
	$jk = @$_POST['jk'];
	$no_telp = @$_POST['no_telp'];
	$alamat = @$_POST['alamat'];

	$tambah_dokter = @$_POST['tambah'];

	if($tambah_dokter) {
		if($kode_dokter == "" || $nama_dokter == "" || $tgl_lahir == "" || $tempat_lahir == "" || $jk == "" || $no_telp == "" || $alamat == "") {
			?>
			<script type="text/javascript">
				alert("Inputan tidak boleh kosong !");
			</script>
			<?php
		} else {
			mysql_query("insert into tbl_dokter values('$kode_dokter', '$nama_dokter', '$tgl_lahir', '$tempat_lahir', '$jk', '$no_telp', '$alamat')") or die (mysql_error());
			?>
			<script type="text/javascript">
				alert("Tambah data pasien berhasil !");
				window.location.href="?page=dokter";
			</script>
			<?php
		}
	}
	?>


  </div> <!-- akhir container-fluid semua -->









