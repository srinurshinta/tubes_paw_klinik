<div class="container-fluid">
<div class="row">
<div class="col-md-12">
	<div class="col-md-2">

		
	</div>

	<div class="col-md-8">
		<div class="page-header"><h3 align="center">Tambah Data Pasien</h3>
      	</div>
      	<form class="form-horizontal" action="" method="POST" role="form">
	      	<div class="form-group">
	      		<label class="control-label col-sm-3">Username</label>
	      			<div class="col-sm-5">
	      				<input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username ..">
	      			</div>
	      	</div>

	      	<div class="form-group">
	      		<label class="control-label col-sm-3">Password</label>
	      			<div class="col-sm-5">
	      				<input type="text" name="password" id="password" class="form-control" placeholder="Masukan Password ..">
	      			</div>
	      	</div>


	      	<div class="form-group">
	      		<label class="control-label col-sm-3">Nama</label>
	      			<div class="col-sm-5">
	      				<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama ..">
	      			</div>
	      	</div>

	      	<div class="form-group">
		        <label for="jk" class="control-label col-sm-3">Level</label>
		        <div class="col-sm-5">
		          <select class="form-control" name="level" id="level">
		            <option value="">--Pilih Level--</option>
		            <option value="admin">Admin</option>
		            <option value="dokter">Dokter</option>
		          </select>
		        </div>  
		    </div>

	      	<div class="form-group">
	      		<label for="btn" class="control-label col-sm-3"></label>
	      			<div class="col-sm-6">
	      				<div class="col-sm-3">
	      				<input type="submit" name="tambah" id="submit" class="btn btn-info btn-block" value="Tambah" />		
	      				</div>
	      				<div class="col-sm-3">
	      				<input type="reset" id="reset" class="btn btn-info btn-block" value="Batal" />	
	      				</div>
	      			</div>
	      	</div>
      	</form>
      	<?php
      	$username = @$_POST['username'];
      	$password = @$_POST['password'];
      	$nama = @$_POST['nama'];
      	$level = @$_POST['level'];

      	$tambah_user = @$_POST['tambah'];

      	if($tambah_user){
      		if($username == "" || $password == "" || $nama == "" || $level == ""){
      			?>
      			<script type="text/javascript">
      				alert("Inputan tidak boleh kosong!");	
      			</script>
      			<?php
      		} else {
      			mysql_query("insert into tb_login values ($username', '$password', '$nama', '$level')") or die (mysql_error());
      			?>
      			<script type="text/javascript">
      				alert("Tambah data berhasil");
      				window.location.href="?page=user";
      			</script>
      			<?php
      		}
      	}
      	?>

	</div>

	<div class="col-md-2">
		
	</div>
	
</div>
	
</div>
	
</div>