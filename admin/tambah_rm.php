
  <div class="container-fluid">
  	<div class="row">
  	<div class="col-sm-12">

  	<?php
	$carikode = mysql_query("select max(kd_rm) from tbl_rm") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "K".str_pad($kode, 3, "0", STR_PAD_LEFT);
	} else {
		$hasilkode = "K001";
	}
	?>

  		<div class="page-header"><h3 align="center">Tambah Data Rekam Medis</h3>
  		</div>
  		<form class="form-horizontal" action="" method="POST" role="form">
  		<div class="form-group">
  			<label for="kd_rm" class="control-label col-sm-3">Kode RM</label>
  			<div class="col-sm-8">
  				<input type="text" name="kd_rm" id="kd_rm" value="<?php echo $hasilkode; ?>" class="form-control" placeholder="Masukan No. RM">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="nama_pasien" class="control-label col-sm-3">Nama Pasien</label>
  			<div class="col-sm-8">
  				<select name="nama_pasien" id="nama_pasien" class="form-control" >
  				<option>--Pilih Pasien--</option>
					<?php
					$dt=mysql_query("select*from tbl_pasien");
					while($data=mysql_fetch_array($dt)){
					?>
					<option value="<?php echo $data['nama_pasien'];?>"><?php echo $data['nama_pasien']?>
					</option>
					<?php
					}
					?>
  				</select>
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="tgl_periksa" class="control-label col-sm-3">Tanggal Periksa</label>
  			<div class="col-sm-8">
  			<input type="text" name="tgl_periksa" id="tgl_periksa" class="form-control" value="<?php echo date ("Y-m-d") ?>" />
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="nama_dokter" class="control-label col-sm-3">Nama Dokter</label>
  			<div class="col-sm-8">
  				<select name="nama_dokter" id="nama_dokter" class="form-control" >
  				<option>--Pilih Dokter--</option>
					<?php
					$dd=mysql_query("select*from tbl_dokter");
					while($data_dokter=mysql_fetch_array($dd)){
					?>
					<option value="<?php echo $data_dokter['nama_dokter'];?>"><?php echo $data_dokter['nama_dokter']?>
					</option>
					<?php
					}
					?>
  				</select>
  			</div>	
  		</div>

	  	<div class="form-group">
	        <label for="keluhan" class="control-label col-sm-3">Keluhan</label>
	        <div class="col-sm-8">
	          <input type="text" name="keluhan" id="keluhan" class="form-control" placeholder="Masukan Keluhan">
	        </div>  
	     </div>

  		<div class="form-group">
  			<label for="diagnosa" class="control-label col-sm-3">Diagnosa</label>
  			<div class="col-sm-8">
  				<input type="text" name="diagnosa" id="keluhan" class="form-control" placeholder="Masukan Diagnosa">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="penyakit" class="control-label col-sm-3">Nama Penyakit</label>
  			<div class="col-sm-8">
				<select name="penyakit" id="penyakit" class="form-control">
					<option>--Pilih Penyakit--</option>
					<option value="asma">Asma</option>
					<option value="anemia">Anemia</option>
					<option value="diabetes">Diabetes Melitu</option>
					<option value="diare">Diare</option>
					<option value="ginjal">Gangguan Ginjal</option>
					<option value="mata">Gangguan Mata</option>
					<option value="hipertensi">Hipertensi</option>
					<option value="jantung">Jantung</option>
					<option value="kecelakaan">Kecelakaan</option>
					<option value="kulit">Kulit</option>
					<option value="paru-paru">Paru-paru</option>
				</select>
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="tindakan" class="control-label col-sm-3">Tindakan</label>
  			<div class="col-sm-8">
				<select name="tindakan" id="tindakan" class="form-control">
					<option>--Pilih Tindakan--</option>
					<option value="konsultasi">Konsultasi Dokter</option>
					<option value="laboratorium">Pemeriksaan Laboratorium</option>
					<option value="rawat_inap">Rawat Inap</option>
					<option value="rawat_jalan">Rawat Jalan</option>
				</select>
  			</div>	
  		</div>




 		<div class="form-group">
 			<label for="btn" class="control-label col-sm-3"></label>
	 		<div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="submit" name="tambah_rm" class="btn btn-danger btn-block" value="Tambah" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>

	 			
	 		</div>
 			
 		</div>
  			
  	</form>

	<?php

	$kd_rm = @$_POST['kd_rm'];
	$nama_pasien = @$_POST['nama_pasien'];
	$tgl_periksa = @$_POST['tgl_periksa'];
	$nama_dokter = @$_POST['nama_dokter'];
	$keluhan = @$_POST['keluhan'];
	$diagnosa = @$_POST['diagnosa'];
	$penyakit = @$_POST['penyakit'];
	$tindakan = @$_POST['tindakan'];


	$dp=mysql_query("select*from tbl_pasien where nama_pasien='$nama_pasien'");
	$data_pasien=mysql_fetch_array($dp);

	$dd=mysql_query("select*from tbl_dokter where nama_dokter='$nama_dokter'");
	$data_dokter=mysql_fetch_array($dd);


	$rekam_medis = @$_POST['tambah_rm'];

	if($rekam_medis) {
		if($kd_rm == "" || $nama_pasien == "" || $tgl_periksa == "" || $nama_dokter == "" || $keluhan == "" || $diagnosa == "" || $penyakit == "" || $tindakan == "") {
			

			mysql_query("insert into tbl_rm values('$kd_rm', '$nama_pasien', '$tgl_periksa', '$nama_dokter', '$keluhan', '$diagnosa', '$penyakit', '$tindakan')") or die (mysql_error());

			?>
			<script type="text/javascript">
				alert("Inputan tidak boleh kosong !");
			</script>
			<?php
		} else {
			mysql_query("insert into tbl_rm values('$kd_rm', '$nama_pasien', '$tgl_periksa', '$nama_dokter', '$keluhan', '$diagnosa', '$penyakit', '$tindakan')") or die (mysql_error());
			?>
			<script type="text/javascript">
				alert("Tambah rekam medis berhasil !");
				window.location.href="?page=rekam_medis";
			</script>
			<?php
		}
	}
	?>

</div>



