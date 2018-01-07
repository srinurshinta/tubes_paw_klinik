  <div class="container-fluid">
  	<div class="row">
  	<div class="col-sm-12">

  		<div class="page-header"><h3 align="center">Tambah Jadwal Dokter</h3>
  		</div>

      <form class="form-horizontal" action="" method="POST" role="form">

      <div class="form-group">
        <label for="kode_dokter" class="control-label col-sm-3">Kode Dokter</label>
        <div class="col-sm-8">
          <select name="kode_dokter" id="kode_dokter" class="form-control" >
        <option>--Pilih Kode Dokter--</option>
          <?php
          $kd=mysql_query("select*from tbl_dokter");
          while($dt_dokter=mysql_fetch_array($kd)){
          ?>
          <option value="<?php echo $dt_dokter['kode_dokter'];?>"><?php echo $dt_dokter['kode_dokter']?>
          </option>
          <?php
          }
          ?>  
          </select>
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
        <label for="waktu" class="control-label col-sm-3">Hari/Jam</label>
        <div class="col-sm-8">
          <textarea class="form-control" rows="6" name="waktu" id="waktu"></textarea>
        </div>  
      </div>

 		<div class="form-group">
 			<label for="btn" class="control-label col-sm-3"></label>
	 		<div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="submit" name="tambah_jadwal" class="btn btn-danger btn-block" value="Tambah" />
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
      $waktu = @$_POST['waktu'];

      $kd=mysql_query("select*from tbl_dokter where kode_dokter='$kode_dokter'");
      $kode_dokter=mysql_fetch_array($kd);

      $dd=mysql_query("select*from tbl_dokter where nama_dokter='$nama_dokter'");
      $data_dokter=mysql_fetch_array($dd);

      $tambah_jadwal = @$_POST['tambah_jadwal'];

      if($tambah_jadwal) {
        if($kode_dokter == "" || $nama_dokter == "" || $waktu == "") {
          ?>
          <script type="text/javascript">
            alert("Inputan tidak boleh kosong !");
          </script>
          <?php
        } else {
          mysql_query("insert into tbl_jadwal values('$kode_dokter', '$nama_dokter', '$waktu')") or die (mysql_error());
          ?>
          <script type="text/javascript">
            alert("Tambah data jadwal berhasil !");
            window.location.href="?page=dokter&action=data_jadwal";
          </script>
          <?php
        }
      }
      ?>


  </div> <!-- akhir container-fluid semua -->










