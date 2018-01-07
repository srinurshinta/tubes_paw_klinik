
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12">

    <?php
    $kodedokter = @$_GET['kode_dokter'];
    $sql = mysql_query("select * from tbl_dokter where kode_dokter = '$kodedokter' ") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>

        <div class="page-header"><h3 align="center">Edit Data Dokter</h3>
        </div>
        <form class="form-horizontal" action="" method="POST" role="form">
        <div class="form-group">
            <label for="kode_dokter" class="control-label col-sm-3">Kode Dokter</label>
            <div class="col-sm-8">
                <input type="text" name="kode_dokter" id="kode_dokter" value="<?php echo $data['kode_dokter']; ?>" class="form-control" disabled="disabled">
            </div>  
        </div>

        <div class="form-group">
            <label for="nama_dokter" class="control-label col-sm-3">Nama Lengkap</label>
            <div class="col-sm-8">
                <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" value="<?php echo $data['nama_dokter']; ?>" >
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
            <label for="no_telp" class="control-label col-sm-3">No. Handphone</label>
            <div class="col-sm-8">
                <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" >
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
        <input type="submit" id="submit" name="edit_dokter" class="btn btn-danger btn-block" value="Edit" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>

                
            </div>
            
        </div>
            
    </form>

    <?php
    $nama_dokter = @$_POST['nama_dokter'];
    $tgl_lahir = @$_POST['tgl_lahir'];
    $tempat_lahir = @$_POST['tempat_lahir'];
    $jk = @$_POST['jk'];
    $no_telp = @$_POST['no_telp'];
    $alamat = @$_POST['alamat'];
    
     $edit_dokter = @$_POST['edit_dokter'];
     if($edit_dokter){
        if($nama_dokter == "" || $tgl_lahir == "" || $tempat_lahir == "" || $jk == "" || $no_telp == "" || $alamat == "") {
             ?>
             <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
             <?php
         } else {
             mysql_query("update tbl_dokter set nama_dokter= '$nama_dokter',  tgl_lahir = '$tgl_lahir' , tempat_lahir = '$tempat_lahir' , jk = '$jk', no_telp = '$no_telp' , alamat = '$alamat' where kode_dokter = '$kodedokter'") or die (mysql_error());
             ?>
             <script type="text/javascript">
             alert("Data Berhasil Diedit");
             window.location.href="?page=dokter";
             </script>
             <?php
         }
     }
     ?>
</div> <!-- akhir container-fluid semua -->


