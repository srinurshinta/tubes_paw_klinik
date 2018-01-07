
  <div class="container-fluid">
  	<div class="row">
  	<div class="col-sm-12">
  	<?php
  	$carikode = mysql_query("select max(kode_kunjung) from tbl_kunjungan") or die (mysql_error());
  	$datakode = mysql_fetch_array($carikode);
  	if($datakode) {
  		$nilaikode = substr($datakode[0], 1);
  		$kode = (int) $nilaikode;
  		$kode = $kode + 1;
  		$hasilkode = "P".str_pad($kode, 3, "0", STR_PAD_LEFT);
  	} else {
  		$hasilkode = "P001";
  	}
  	?>
  		<div class="page-header"><h3 align="center">Tambah Data Kunjungan</h3>
  		</div>
  		<form class="form-horizontal" action="" method="POST" role="form">
  		<div class="form-group">
  			<label for="kode_kunjung" class="control-label col-sm-3">Kode Kunjung</label>
  			<div class="col-sm-8">
  				<input type="text" name="kode_kunjung" id="kode_kunjung" value="<?php echo $hasilkode; ?>" class="form-control" placeholder="Masukan Kode Kunjung">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="no_rm" class="control-label col-sm-3">No. Rekam Medis</label>
  			<div class="col-sm-8">
  				<select name="no_rm" id="no_rm" class="form-control" >
				<option>--Pilih Kode--</option>
					<?php 
					$dm=mysql_query("select*from tbl_pasien");
					while($data_m=mysql_fetch_array($dm)){
					?>
					<option value="<?php echo $data_m['no_rm'];?>"><?php echo $data_m['no_rm']?>
					</option>
					<?php
					}
					?>	
  				</select>
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
  			<label for="tgl_kunjung" class="control-label col-sm-3">Tanggal Kunjungan</label>
  			<div class="col-sm-8">
  			<input type="text" name="tgl_kunjung" id="tgl_kunjung" class="form-control" value="<?php echo date ("Y-m-d") ?>" />
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="jam_kunjung" class="control-label col-sm-3">Jam Kunjungan</label>
  			<div class="col-sm-8">
  			<input type="text" name="jam_kunjung" id="jam_kunjung" class="form-control" value="<?php echo date ("h : i : sa") ?>" />
  			</div>	
  		</div>

 		<div class="form-group">
 			<label for="btn" class="control-label col-sm-3"></label>
	 		<div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="submit" name="tambah_kunjungan" class="btn btn-danger btn-block" value="Tambah" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>

	 			
	 		</div>
 			
 		</div>
  			
  	</form>

	<?php
	$kode_kunjung = @$_POST['kode_kunjung'];
	$no_rm = @$_POST['no_rm'];
	$nama_pasien = @$_POST['nama_pasien'];
	$tgl_kunjung = @$_POST['tgl_kunjung'];
	$jam_kunjung = @$_POST['jam_kunjung'];

	$dm=mysql_query("select*from tbl_pasien where no_rm='$no_rm'");
	$data_m=mysql_fetch_array($dm);

	$dp=mysql_query("select*from tbl_pasien where nama_pasien='$nama_pasien'");
	$data_pasien=mysql_fetch_array($dp);


	$kunjungan = @$_POST['tambah_kunjungan'];

	if($kunjungan) {
		if($kode_kunjung == "" || $no_rm == "" || $nama_pasien == "" || $tgl_kunjung == "" || $jam_kunjung == "") {
			

			mysql_query("insert into tbl_kunjungan values('$kode_kunjung', '$no_rm', '$nama_pasien', '$tgl_kunjung', '$jam_kunjung')") or die (mysql_error());

			?>
			<script type="text/javascript">
				alert("Inputan tidak boleh kosong !");
			</script>
			<?php
		} else {
			mysql_query("insert into tbl_kunjungan values('$kode_kunjung', '$no_rm', '$nama_pasien', '$tgl_kunjung', '$jam_kunjung')") or die (mysql_error());
			?>
			<script type="text/javascript">
				alert("Tambah data kunjungan berhasil !");
				window.location.href="?page=kunjungan";
			</script>
			<?php
		}
	}
	?>
  	

  </div> <!-- akhir container-fluid semua -->






























































