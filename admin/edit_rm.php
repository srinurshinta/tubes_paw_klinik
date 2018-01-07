<fieldset>
    <legend>Edit Data Rekam Medis</legend>
    
    <?php
    $kdrm = @$_GET['kdrm'];
    $sql = mysql_query("select * from tbl_rm where kd_rm = '$kdrm' ") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>

  		<div class="page-header"><h3 align="center">Edit Data Rekam Medis</h3>
  		</div>
  		<form class="form-horizontal" action="" method="POST" role="form">
  		<div class="form-group">
  			<label for="kd_rm" class="control-label col-sm-3">Kode RM</label>
  			<div class="col-sm-8">
  				<input type="text" name="kd_rm" id="kd_rm" value="<?php echo $data['kd_rm']; ?>" class="form-control" disabled="disabled">
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
				<select name="penyakit">
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
				<select name="tindakan">
					<option>--Pilih Tindakan--</option>
					<option value="konsultasi">Konsultasi Dokter</option>
					<option value="laboratorium">Pemeriksaan Laboratorium</option>
					<option value="rawat_inap">Rawat Inap</option>
					<option value="rawat_jalan">Rawat Jalan</option>
				</select>
  			</div>	
  		</div>


   		<div class="form-group">
  			<label for="obat_pasien" class="control-label col-sm-3">Obat Pasien</label>
  			<div class="col-sm-8">
  				<select name="obat_pasien" id="obat_pasien" class="form-control" >
  				<option>--Pilih Obat--</option>
					<?php
					$do=mysql_query("select*from tbl_obat");
					while($data_obat=mysql_fetch_array($do)){
					?>
					<option value="<?php echo $data_obat['nama_obat'];?>"><?php echo $data_obat['nama_obat']?>
					</option>
					<?php
					}
					?>
  				</select>
  			</div>	
  		</div>

	  	<div class="form-group">
	        <label for="banyak" class="control-label col-sm-3">Jumlah</label>
	        <div class="col-sm-8">
	          <input type="text" name="banyak" id="banyak" class="form-control" placeholder="Masukan Jumlah Obat">
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
    $nama_pasien = @$_POST['nama_pasien'];
	$tgl_periksa = @$_POST['tgl_periksa'];
	$nama_dokter = @$_POST['nama_dokter'];
	$keluhan = @$_POST['keluhan'];
	$diagnosa = @$_POST['diagnosa'];
	$penyakit = @$_POST['penyakit'];
	$tindakan = @$_POST['tindakan'];
	$nama_obat = @$_POST['nama_obat'];
	$banyak = @$_POST['banyak'];
    
     $edit_rm = @$_POST['edit_rm'];
     if($edit_rm){
        if($nama_pasien == "" || $tgl_periksa == "" || $nama_dokter == "" || $keluhan == "" || $diagnosa == "" || $penyakit == "" || $tindakan == "" || $nama_obat == "" || $banyak == "") {
             ?>
             <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
             <?php
         } else {
             mysql_query("update tbl_rm set nama_pasien= '$nama_pasien',  tgl_periksa = '$tgl_periksa' , nama_dokter = '$nama_dokter' , keluhan = '$keluhan' , diagnosa = '$diagnosa' , penyakit = '$penyakit' , tindakan = '$tindakan', 'nama_obat = '$nama_obat', 'banyak = '$banyak' where kd_rm = '$kdrm'") or die (mysql_error());
             ?>
             <script type="text/javascript">
             alert("Data Berhasil Diedit");
             window.location.href="?page=input_rm&action=lihat_rm";
             </script>
             <?php
         }
     }
     ?>
        
</fieldset>
     