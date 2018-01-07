   	
  <div class="container-fluid">
  	<div class="row">
  	<div class="col-sm-12">


  		<div class="page-header"><h3 align="center">Obat Pasien</h3>
  		</div>

  		<form class="form-horizontal" action="" method="">
	    <div class="form-group">
	      <label for="nama_obat" class="control-label col-sm-3">Obat Pasien</label>
	      <div class="col-sm-8">
	        <select class="form-control" name="nama_obat" id="nama_obat">
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
	      <label for="banyak" class="control-label col-sm-3">Banyak Obat</label>
	      <div class="col-sm-8">
	        <input type="text" name="banyak" id="banyak" class="form-control" placeholder="Masukan Jumlah Obat" />
	      </div>  
	    </div>


      <div class="form-group">
      <label for="btn" class="control-label col-sm-3"></label>
        <div class="col-sm-8">
              <div class="col-sm-4">
              <input type="submit" id="submit" name="tambah_rm" class="btn btn-danger btn-block" value="Simpan" />
              </div>
              <div class="col-sm-4">
              <input type="submit" id="submit" class="btn btn-danger btn-block" value="Tambah Obat" />
              </div>
            </div>
      </div>



	    </form>

	 			
	 		</div>
 			
 		</div>
  			
  	</form>
  <?php
  $obat = @$_POST['nama_obat'];
  $banyak = @$_POST['banyak'];


  $rekam_medis = @$_POST['tambah_rm'];

  if($rekam_medis) {
    if($no_rm == "" || $nama_pasien == "" || $tgl_periksa == "" || $nama_dokter == "" || $keluhan == "" || $diagnosa == "" || $penyakit == "" || $tindakan == "") {
      

      ?>
      <script type="text/javascript">
        alert("Inputan tidak boleh kosong !");
      </script>
      <?php
    } else {
      mysql_query("insert into tbl_rm values('$no_rm', '$nama_pasien', '$tgl_periksa', '$nama_dokter', '$keluhan', '$diagnosa', '$penyakit', '$tindakan')") or die (mysql_error());
      ?>
      <script type="text/javascript">
        alert("Tambah rekam medis berhasil !");
        window.location.href="?page=pasien&action=data_rm";
      </script>
      <?php
    }
  }
  ?>


  </div> <!-- akhir container-fluid semua -->











