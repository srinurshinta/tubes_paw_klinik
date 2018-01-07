<div class="container-fluid">
	<div class="row">
	<div class="col-sm-12">
	<div class="row">
		<div class="col-md-6">
			<a href="?page=pasien&action=rm&no_rm=<?=$_GET['no_rm']?>&nama_pasien=<?=$_GET['nama_pasien']?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Rekam Medis</a>
		</div>
		<div class="col-md-6">
			<div style="margin-bottom: 15px;" align="right">
				<form action="" method="post">
					<input type="text" name="inputan_pencarian" placeholder="Masukan Tanggal Periksa/Nama Dokter.." style="width: 200px; padding: 5px;" />
					<input type="submit" name="cari_rm" value="Cari" style="padding: 3px;" />
				</form>
			</div>
		</div>
		
	</div>
	<?php

	$norm = @$_GET['no_rm'];
  	$sql = mysql_query("select * from tbl_pasien where no_rm = '$norm' ") or die (mysql_error());
  	$data = mysql_fetch_array($sql);
  	$norm = $data['no_rm'];
  	$tgl_msk = $data['tgl_msk'];
  	$nama_pasien = $data['nama_pasien'];
  	$tgl_lahir = $data['tgl_lahir'];
  	$tempat_lahir = $data['tempat_lahir'];
  	$jk = $data['jk'];
  	$no_hp = $data['no_hp'];
  	$alamat = $data['alamat'];
	?>
	<hr>
	<div class="row">
		<div class="col-xs-2"><b>No. RM</b></div>
		<div class="col-xs-3">: <?php echo $data['no_rm']; ?></div>
		<div class="col-xs-2"><b>Tempat Lahir</b></div>
		<div class="col-xs-3">: <?php echo $data['tempat_lahir']; ?></div>
	</div>

	<div class="row">
		<div class="col-xs-2"><b>Nama Pasien</b></div>
		<div class="col-xs-3">: <?php echo $data['nama_pasien']; ?></div>
		<div class="col-xs-2"><b>Tanggal Masuk</b></div>
		<div class="col-xs-3">: <?php echo $data['tgl_msk']; ?></div>
	</div>

	<div class="row">
		<div class="col-xs-2"><b>Jenis Kelamin</b></div>
		<div class="col-xs-3">: <?php echo $data['jk']; ?></div>
		<div class="col-xs-2"><b>Alamat</b></div>
		<div class="col-xs-3">: <?php echo $data['alamat']; ?></div>
	</div>

	<div class="row">
		<div class="col-xs-2"><b>Tanggal Lahir</b></div>
		<div class="col-xs-3">: <?php echo $data['tgl_lahir']; ?></div>
		<div class="col-xs-2"><b>No. Handphone</b></div>
		<div class="col-xs-3">: <?php echo $data['no_hp']; ?></div>
	</div>
	</hr>

	<hr>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<table class="table table-bordered table-striped table-hover">
			<thead>
				<th>No</th>
				<th>No RM</th>
				<th>Nama Pasien</th>
				<th>Tanggal Periksa</th>
				<th>Nama Dokter</th>
				<th>Keluhan</th>
				<th>Diagnosa</th>
				<th>Penyakit</th>
				<th>Tindakan</th>
				<th>Obat Pasien</th>
				<th>Banyak Obat</th>
				<th>Aksi</th>
			</thead>
			<tbody>
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

			$sql = mysql_query("select * from tbl_rm LIMIT $posisi, $batas") or die (mysql_error());
			$no = $posisi + 1;

			$inputan_pencarian = @$_POST['inputan_pencarian'];
			$cari_rm = @$_POST['cari_rm'];
			if($cari_rm){
				if($inputan_pencarian != ""){
					$sql = mysql_query("select * from tbl_rm where tgl_periksa like '%$inputan_pencarian%' or nama_dokter like '%$inputan_pencarian%'") or die(mysql_error());
					} else {
						$sql = mysql_query("select * from tbl_rm") or die(mysql_error());
					}
			} else {
				$no_rm = $_GET['no_rm'];
				$sql = mysql_query("select * from tbl_rm where no_rm='$no_rm'") or die(mysql_error());
			}

			$cek = mysql_num_rows($sql);
			if($cek < 1){
				?>
				<tr>
					<td colspan="12" align="center" style="padding: 10px;">Data tidak ditemukan.</td>
				</tr>
				<?php

			} else {

			while ($data = mysql_fetch_array($sql)){
			?>
				
					<tr>
						<td align="center"><?php echo $no++."."; ?></td>
						<td align="center"><?php echo $data['no_rm']; ?></td>
						<td align="center"><?php echo $data['nama_pasien']; ?></td>
						<td align="center"><?php echo $data['tgl_periksa']; ?></td>
						<td align="center"><?php echo $data['nama_dokter']; ?></td>
						<td align="center"><?php echo $data['keluhan']; ?></td>
						<td align="center"><?php echo $data['diagnosa']; ?></td>
						<td align="center"><?php echo $data['penyakit']; ?></td>
						<td align="center"><?php echo $data['tindakan']; ?></td>
						<td align="center"><?php echo $data['nama_obat']; ?></td>
						<td align="center"><?php echo $data['banyak']; ?></td>
						<td align="center">
							<a href="?page=rekam_medis&action=edit_rm&no_rm=<?php echo $data['no_rm']; ?>" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a>
							<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=rekam_medis&action=hapus_rm&norm=<?php echo $data['no_rm']; ?>" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-remove"></span></a>
						</td>

					</tr>
				<?php
				}
				}
				?>				
			</tbody>	
			</table>
			<div style="margin-top: 10px; float: left;">
				<?php 
				$jml = mysql_num_rows(mysql_query("select * from tbl_rm"));
				echo "Jumlah Data : <b>".$jml."</b>"; ?>
			</div>	
		</div>
      </div>
    </div> 
    </hr>







		
	</div>
		
	</div>
	
</div> <!-- akhir container-fluid semua -->