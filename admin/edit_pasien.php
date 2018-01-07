
  <div class="container-fluid">
  	<div class="row">
  	<div class="col-sm-12">
	<?php
  $norm = @$_GET['no_rm'];
  $sql = mysql_query("select * from tbl_pasien where no_rm = '$norm' ") or die (mysql_error());
  $data = mysql_fetch_array($sql);
	?>
  		<div class="page-header"><h3 align="center">Edit Data Pasien</h3>
  		</div>
  		<form class="form-horizontal" action="" method="POST" role="form">
  		<div class="form-group">
  			<label for="no_rm" class="control-label col-sm-3">No. Rekam Medis</label>
  			<div class="col-sm-8">
  				<input type="text" name="no_rm" id="no_rm" value="<?php echo $data['no_rm']; ?>" class="form-control" disabled="disabled">
  			</div>	
  		</div>

   		<div class="form-group">
  			<label for="tgl_msk" class="control-label col-sm-3">Tanggal Daftar</label>
  			<div class="col-sm-8">
  				<input type="date" name="tgl_msk" id="tgl_msk" class="form-control" value="<?php echo $data['tgl_msk']; ?>" >
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="nama_pasien" class="control-label col-sm-3">Nama Lengkap</label>
  			<div class="col-sm-8">
  				<input type="text" name="nama_pasien" id="nama_pasien" class="form-control" value="<?php echo $data['nama_pasien']; ?>" >
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="tgl_lahir" class="control-label col-sm-3">Tanggal Lahir</label>
  			<div class="col-sm-8">
  				<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo $data['tgl_lahir']; ?>" >
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="tempat_lahir" class="control-label col-sm-3">Tempat Lahir</label>
  			<div class="col-sm-8">
  				<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" >
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
  			<label for="no_hp" class="control-label col-sm-3">No. Handphone</label>
  			<div class="col-sm-8">
  				<input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" >
  			</div>	
  		</div>

      <div class="form-group">
        <label for="alamat" class="control-label col-sm-3">Alamat</label>
        <div class="col-sm-8">
          <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $data['alamat']; ?>">
        </div>  
      </div>

 		<div class="form-group">
 			<label for="btn" class="control-label col-sm-3"></label>
	 		<div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="submit" name="edit_pasien" class="btn btn-danger btn-block" value="Edit" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>

	 			
	 		</div>
 			
 		</div>
  			
  	</form>

	<?php

	$tgl_msk = @$_POST['tgl_msk'];
	$nama_pasien = @$_POST['nama_pasien'];
	$tgl_lahir = @$_POST['tgl_lahir'];
	$tempat_lahir = @$_POST['tempat_lahir'];
	$jk = @$_POST['jk'];
	$no_hp = @$_POST['no_hp'];
	$alamat = @$_POST['alamat'];

  $edit_pasien = @$_POST['edit_pasien'];
     if($edit_pasien){
         if($tgl_msk == "" || $nama_pasien == "" || $tgl_lahir == "" || $tempat_lahir == "" || $jk == "" || $no_hp == "" || $alamat == "") {
             ?>
             <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
             <?php
         } else {
             mysql_query("update tbl_pasien set tgl_msk= '$tgl_msk', nama_pasien = '$nama_pasien', tgl_lahir = '$tgl_lahir' , tempat_lahir = '$tempat_lahir' , jk = '$jk' , no_hp = '$no_hp' , alamat = '$alamat' where no_rm = '$norm'") or die (mysql_error());
             ?>
             <script type="text/javascript">
             alert("Data pasien berhasil diedit");
             window.location.href="?page=pasien";
             </script>
             <?php
         }
     }
  ?>
  	

  </div> <!-- akhir container-fluid semua -->


