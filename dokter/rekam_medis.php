<div class="container-fluid">
	<div class="row">
	<div class="col-sm-12" style="border: 1px solid silver";>


	<div class="page-header">
	<h3 align="center">Rekam Medis Pasien</h3></div>
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_web");

	$result = mysql_query("select * from tbl_pasien");
	$jsArray = "var prdName = new Array();\n";



	echo '<form class="form-horizontal" action="?page=rekam_medis&action=tambah_rm" method="post" role="form">';
	echo '<div class="form group">';
	echo '<label for="no_rm" class="control-label col-sm-3">Kode Pasien</label>';
	echo '<div class="col-sm-8">';
	echo '<select class="form-control" name="no_rm" id="no_rm" onchange="changeValue(this.value)">';
	echo '<option>-- Pilih Kode Pasien --</option>';
	while ($row = mysql_fetch_array($result)) {
    echo '<option value="' . $row['no_rm'] . '">' . $row['no_rm'] . '</option>';
    $jsArray .= "prdName['" . $row['no_rm'] . "'] = {nama_pasien:'".addslashes($row['nama_pasien'])."'};\n";
	}
	echo '</select>';
	echo '</div>';
  echo '<hr>';

	?>

  
  	<div class="form-group">
  		<label for="nama_pasien" class="control-label col-sm-3">Nama Lengkap</label>
  			<div class="col-sm-8">
  				<input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Masukan Nama Lengkap">
  			</div>	
  	</div>
    



<script type="text/javascript">
	a
</script>
<script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('nama_pasien').value = prdName[id].nama_pasien;


};
</script>

</div>
</div>
</form>
</div><!-- akhir container semua -->
