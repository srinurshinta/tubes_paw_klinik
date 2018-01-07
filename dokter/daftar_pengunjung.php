
<div class="container-fluid">
<legend>Data Kunjungan - Klinik Utama Waluya </legend>
	<div class="row">
		<div class="col-md-6">
			
		</div>
		<div class="col-md-6">
			<div style="margin-bottom: 15px;" align="right">
				<form action="" method="post">
					<input type="text" name="inputan_pencarian" placeholder="Masukan Nama.." style="width: 200px; padding: 5px;" />
					<input type="submit" name="cari_kj" value="Cari" style="padding: 3px;" />
				</form>
			</div>
		</div>
    <div class="row">
	<div class="col-md-12 col-xs-12">
		<table class="table table-bordered table-striped table-hover">
				<thead>
					<th>No</th>
					<th>Kode Kunjungan</th>
					<th>No. Rekam Medis</th>
					<th>Nama Pasien</th>
					<th>Tanggal Kunjungan</th>
					<th>Jam Kunjungan</th>
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

				$sql = mysql_query("select * from tbl_kunjungan LIMIT $posisi, $batas") or die (mysql_error());
				$no = $posisi + 1;

				$inputan_pencarian = @$_POST['inputan_pencarian'];
				$cari_kj = @$_POST['cari_kj'];
				if($cari_kj){
					if($inputan_pencarian != ""){
						$sql = mysql_query("select * from tbl_kunjungan where kode_kunjung like '%$inputan_pencarian%' or nama_pasien like '%$inputan_pencarian%'") or die(mysql_error());
						} else {
							$sql = mysql_query("select * from tbl_kunjungan") or die(mysql_error());
						}
				} else {
					$sql = mysql_query("select * from tbl_kunjungan") or die(mysql_error());
				}

				$cek = mysql_num_rows($sql);
				if($cek < 1){
					?>
					<tr>
						<td colspan="9" align="center" style="padding: 10px;">Data tidak ditemukan.</td>
					</tr>
					<?php

				} else {

				while ($data = mysql_fetch_array($sql)){
				?>

				<tr>
						<td align="center"><?php echo $no++."."; ?></td>
						<td align="center"><?php echo $data['kode_kunjung']; ?></td>
						<td align="center"><?php echo $data['no_rm']; ?></td>
						<td align="center"><?php echo $data['nama_pasien']; ?></td>
						<td align="center"><?php echo $data['tgl_kunjung']; ?></td>
						<td align="center"><?php echo $data['jam_kunjung']; ?></td>
					</tr>
				<?php
				}
			}
		?>

	</tbody>
	</table>
	<div style="margin-top: 10px; float: left;">
		<?php 
		$jml = mysql_num_rows(mysql_query("select * from tbl_kunjungan"));
		echo "Jumlah Data : <b>".$jml."</b>"; ?>
	</div>
			
		</div>
      </div>
    </div> 
</div>


</div> <!-- akhir container-fluid semua -->


















































