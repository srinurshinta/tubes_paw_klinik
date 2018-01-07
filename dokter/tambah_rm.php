
<div class="container-fluid">
  <div class="row">
  <div class="col-sm-12">

  <div class="page-header"><h3 align="center">Rekam Medis Pasien</h3>
  </div>
  
  <form class="form-horizontal" action="" method="POST" role="form">

    <div class="form-group">
      <label for="no_rm" class="control-label col-sm-3">Kode Pasien</label>
      <div class="col-sm-8">
        <select class="form-control" name="no_rm" id="no_rm">
          <option>--Pilih Kode Pasien--</option>
          <?php
          $dt=mysql_query("select*from tbl_pasien");
          while($data_pasien=mysql_fetch_array($dt)){
          ?>
          <option value="<?php echo $data_pasien['no_rm'];?>"><?php echo $data_pasien['no_rm']?>
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
        <select class="form-control" name="nama_pasien" id="nama_pasien">
          <option>--Pilih Nama Pasien--</option>
          <?php
          $dp=mysql_query("select*from tbl_pasien");
          while($data_p=mysql_fetch_array($dp)){
          ?>
          <option value="<?php echo $data_p['nama_pasien'];?>"><?php echo $data_p['nama_pasien']?>
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
        <select class="form-control" name="nama_dokter" id="nama_dokter">
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
        <input type="text" name="keluhan" id="keluhan" class="form-control" placeholder="Masukan Keluhan" />
      </div>  
    </div>


    <div class="form-group">
      <label for="diagnosa" class="control-label col-sm-3">Diagnosa</label>
      <div class="col-sm-8">
        <input type="text" name="diagnosa" id="diagnosa" class="form-control" placeholder="Masukan Diagnosa" />
      </div>  
    </div>


    <div class="form-group">
      <label for="penyakit" class="control-label col-sm-3">Penyakit</label>
        <div class="col-sm-8">
          <select class="form-control" name="penyakit" id="penyakit">
            <option value="">--Pilih Jenis Penyakit--</option>
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
          <select class="form-control" name="tindakan" id="tindakan">
            <option value="">--Pilih Tindakan--</option>
          <option value="Konsultasi Dokter">Konsultasi Dokter</option>
          <option value="Pemeriksaan Laboratorium">Pemeriksaan Laboratorium</option>
          <option value="Rawat Inap">Rawat Inap</option>
          <option value="Rawat Jalan">Rawat Jalan</option>          
        </select>
        </div>  
    </div>

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
            <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
            </div>
          </div>
    </div>

    </form>

  </div>
    
  </div>
  
</div>


  <?php
  $no_rm = @$_POST['no_rm'];
  $nama_pasien = @$_POST['nama_pasien'];
  $tgl_periksa = @$_POST['tgl_periksa'];
  $nama_dokter = @$_POST['nama_dokter'];
  $keluhan = @$_POST['keluhan'];
  $diagnosa = @$_POST['diagnosa'];
  $penyakit = @$_POST['penyakit'];
  $tindakan = @$_POST['tindakan'];
  $nama_obat = @$_POST['nama_obat'];
  $banyak = @$_POST['banyak'];

  $dp=mysql_query("select*from tbl_pasien where nama_pasien='$nama_pasien'");
  $data_p=mysql_fetch_array($dp);


  $dt=mysql_query("select*from tbl_pasien where no_rm='$no_rm'");
  $data_pasien=mysql_fetch_array($dt);

  $dd=mysql_query("select*from tbl_dokter where nama_dokter='$nama_dokter'");
  $data_dokter=mysql_fetch_array($dd);

  $do=mysql_query("select*from tbl_obat where nama_obat='$nama_obat'");
  $data_obat=mysql_fetch_array($do);


  $rekam_medis = @$_POST['tambah_rm'];

  if($rekam_medis) {
    if($no_rm == "" || $nama_pasien == "" || $tgl_periksa == "" || $nama_dokter == "" || $keluhan == "" || $diagnosa == "" || $penyakit == "" || $tindakan == "" || $nama_obat == "" || $banyak == "") {
      

      ?>
      <script type="text/javascript">
        alert("Inputan tidak boleh kosong !");
      </script>
      <?php
    } else {
      mysql_query("insert into tbl_rm values('$no_rm', '$nama_pasien', '$tgl_periksa', '$nama_dokter', '$keluhan', '$diagnosa', '$penyakit', '$tindakan', '$nama_obat', '$banyak')") or die (mysql_error());
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









