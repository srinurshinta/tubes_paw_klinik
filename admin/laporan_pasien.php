<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<?php

//untuk menentukan tanggal awal dan tanggal akhir data di database
$min_tanggal = mysql_fetch_array(mysql_query("select min(tgl_msk) as min_tgl from tbl_pasien"));
$max_tanggal = mysql_fetch_array(mysql_query("select max(tgl_msk) as max_tgl from tbl_pasien"));
?>
<div class="page-header">
	<center>
		<form action="" method="post">
			<table width="854" border="0">
				<td width="105">Tanggal Awal</td>
				<td colspan="2"><input type="date" name="tgl_awal" size="15" placeholder="yyyy-mm-dd"/></td>

			<td width="105">Tanggal Akhir</td>
			<td colspan="2"><input type="date" name="tgl_akhir" size="15" placeholder="yyyy-mm-dd"/></td>

			<td width="188">
				<button type="submit" name="cari_laporan" class="btn btn-white btn-info btn-bold">Tampilkan Data</button>
			</td>
		</table>
	</form>
	</center>
	<br/>
</div>

<?php
//di proses jika sudah klik tombol cari
if(isset($_POST['cari_laporan'])){

	//menangkap nilai form
	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'];
	if(empty($tgl_awal) and empty($tgl_akhir)){
		//jika tidak menginput apa-apa
		$query = mysql_query("select * from tgl_pasien");
	} else{
		?>

		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-header"><i><b>Informasi Data Laporan Pasien : </b> dari tanggal <b><?php echo $_POST['tgl_awal']?></b> sampai dengan tanggal <b><?php echo $_POST['tgl_akhir']?></b></i>
							
						</div>
						<?php
						$query = mysql_query("select * from tbl_pasien where tgl_msk between '$tgl_awal' and '$tgl_akhir'");
					}?>

					<div style="margin-bottom: 15px;" align="right">
						<form action="" method="post">
							<input type="text" name="inputan_pencarian" placeholder="Masukkan Kode Pasien.." style="width: 200px; padding: 5px;" />
							<input type="submit" name="cari_pasien" value="Cari" style="padding: 3px" />
							
						</form>
						
					</div>


					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>

								<th>No</th>
			                    <th>No. Rekam Medis</th>
			                    <th>Tanggal Masuk</th>
			                    <th>Nama Pasien</th>
			                    <th>Tanggal Lahir</th>
			                    <th>Tempat Lahir</th>
			                    <th>Jenis Kelamin</th>
			                    <th>No Hp</th>
			                    <th>Alamat</th>
							
						</thead>

		                <?php
		                $no = 1;

		                $batas = 3;
		                $hal = @$_GET['hal'];
		                if(empty($hal)){
		                    $posisi = 0;
		                    $hal = 1;
		                } else {
		                    $posisi = ($hal - 1) * $batas;
		                }

		                $sql = mysql_query("select * from tbl_pasien LIMIT $posisi, $batas") or die (mysql_error());
		                $no = $posisi + 1;

		                $inputan_pencarian = @$_POST['inputan_pencarian'];
		                $cari_pasien = @$_POST['cari_pasien'];
		                if($cari_pasien){
		                    if($inputan_pencarian != ""){
		                        $sql = mysql_query("select * from tbl_pasien where no_rm like '%$inputan_pencarian%' or nama_pasien like '%$inputan_pencarian%'") or die(mysql_error());
		                        } else {
		                            $sql = mysql_query("select * from tbl_pasien") or die(mysql_error());
		                        }
		                } else {
		                    $sql = mysql_query("select * from tbl_pasien") or die(mysql_error());
		                }

		                $cek = mysql_num_rows($sql);
		                if($cek < 1){
		                    ?>
		                    <tr>
		                        <td colspan="10" align="center" style="padding: 10px;">Data tidak ditemukan.</td>
		                    </tr>
		                    <?php

		                } else {

		                while ($data = mysql_fetch_array($sql)){
		                ?>
		                
		                    <tr>
		                        <td align="center"><?php echo $no++."."; ?></td>
		                        <td align="center"><?php echo $data['no_rm']; ?></td>
		                        <td align="center"><?php echo $data['tgl_msk']; ?></td>
		                        <td align="center"><?php echo $data['nama_pasien']; ?></td>
		                        <td align="center"><?php echo $data['tgl_lahir']; ?></td>
		                        <td align="center"><?php echo $data['tempat_lahir']; ?></td>
		                        <td align="center"><?php echo $data['jk']; ?></td>
		                        <td align="center"><?php echo $data['no_hp']; ?></td>
		                        <td align="center"><?php echo $data['alamat']; ?></td>

		                    </tr>
		                <?php
		                }
		                }
		                ?> 
					</table>
					<hr><a href="laporan/cetak_pasien.php?tgl_awal=<?=$tgl_awal?>&tgl_akhir=<?=$tgl_akhir?>" target="_blank" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Cetak</a></hr>
						<div style="margin-top: 10px; float: left;">

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}else {
		unset($_POST['cari_laporan']);
	}
	?>

	
</div>
	
</div>
	
</div>