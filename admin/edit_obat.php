
  <div class="container-fluid">
    <div class="row">
    <div class="col-sm-12">
    
    <?php
    $kodeobat = @$_GET['kode_obat'];
    $sql = mysql_query("select * from tbl_obat where kode_obat = '$kodeobat' ") or die (mysql_error());
    $data = mysql_fetch_array($sql);
    ?>

        <div class="page-header"><h3 align="center">Tambah Data Obat</h3>
        </div>
        <form class="form-horizontal" action="" method="POST" role="form">
        <div class="form-group">
            <label for="kode_obat" class="control-label col-sm-3">Kode Obat</label>
            <div class="col-sm-8">
                <input type="text" name="kode_obat" id="kode_obat" value="<?php echo $data['kode_obat']; ?>" class="form-control" disabled="disabled">
            </div>  
        </div>

        <div class="form-group">
            <label for="nama_obat" class="control-label col-sm-3">Nama Obat</label>
            <div class="col-sm-8">
                <input type="text" name="nama_obat" id="nama_obat" class="form-control" value="<?php echo $data['nama_obat']; ?> ">
            </div>  
        </div>

        <div class="form-group">
            <label for="jenis_obat" class="control-label col-sm-3">Jenis Obat</label>
            <div class="col-sm-8">
                <input type="text" name="jenis_obat" id="jenis_obat" class="form-control" value="<?php echo $data['jenis_obat']; ?>">
            </div>  
        </div>

        <div class="form-group">
            <label for="harga" class="control-label col-sm-3">Harga</label>
            <div class="col-sm-8">
                <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $data['harga']; ?>">
            </div>  
        </div>

        <div class="form-group">
            <label for="stock" class="control-label col-sm-3">Stock</label>
            <div class="col-sm-8">
                <input type="text" name="stock" id="stock" class="form-control" value="<?php echo $data['stock']; ?>">
            </div>  
        </div>

        <div class="form-group">
            <label for="expired" class="control-label col-sm-3">Expired</label>
            <div class="col-sm-8">
                <input type="date" name="expired" id="expired" class="form-control" value="<?php echo $data['expired']; ?>">
            </div>  
        </div>

        <div class="form-group">
            <label for="btn" class="control-label col-sm-3"></label>
            <div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="submit" name="edit_obat" class="btn btn-danger btn-block" value="Tambah" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>
    
            </div>
            
        </div>
            
    </form>
     
    <?php
    $nama_obat = @$_POST['nama_obat'];
    $jenis_obat = @$_POST['jenis_obat'];
    $harga = @$_POST['harga'];
    $stock = @$_POST['stock'];
    $expired = @$_POST['expired'];
    
     $edit_obat = @$_POST['edit_obat'];
     if($edit_obat){
         if($nama_obat == "" || $jenis_obat == "" || $harga == "" || $stock == "" || $expired == "") {
             ?>
             <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
             <?php
         } else {
             mysql_query("update tbl_obat set nama_obat = '$nama_obat' , jenis_obat = '$jenis_obat' , harga = '$harga' , stock = '$stock' , expired = '$expired'
                 where kode_obat = '$kodeobat'") or die (mysql_error());
             ?>
             <script type="text/javascript">
             alert("Data Berhasil Diedit");
             window.location.href="?page=obat";
             </script>
             <?php
         }
     }
     ?>
        
</div>