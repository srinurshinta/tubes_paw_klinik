
<div class="container-fluid">
<legend>Data Rekam Medis - Klinik Utama Waluya </legend>
    <div class="row">
	<div class="col-md-12">


		<div style="margin-bottom: 15px;" align="right">
			<form action="" method="post">
				<input type="text" name="inputan_pencarian" placeholder="Masukan No.RM/Nama Dokter.." style="width: 200px; padding: 5px;" />
				<input type="submit" name="cari_rm" value="Cari" style="padding: 3px;" />
			</form>
		</div>

    <div class="row">
	<div class="col-md-12 col-xs-12">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<th>No</th>
				<th>Kode RM</th>
				<th>Tanggal Periksa</th>
				<th>Nama Dokter</th>
				<th>Keluhan</th>
				<th>Diagnosa</th>
				<th>Penyakit</th>
				<th>Tindakan</th>
				<th>Obat Pasien</th>
				<th>Jumlah</th>
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
					$sql = mysql_query("select * from tbl_rm where no_rm like '%$inputan_pencarian%' or nama_dokter like '%$inputan_pencarian%'") or die(mysql_error());
					} else {
						$sql = mysql_query("select * from tbl_rm") or die(mysql_error());
					}
			} else {
				$sql = mysql_query("select * from tbl_rm") or die(mysql_error());
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
					<td align="center"><?php echo $data['kd_rm']; ?></td>
					<td align="center"><?php echo $data['tgl_periksa']; ?></td>
					<td align="center"><?php echo $data['nama_dokter']; ?></td>
					<td align="center"><?php echo $data['keluhan']; ?></td>
					<td align="center"><?php echo $data['diagnosa']; ?></td>
					<td align="center"><?php echo $data['penyakit']; ?></td>
					<td align="center"><?php echo $data['tindakan']; ?></td>
					<td align="center"><?php echo $data['nama_obat']; ?></td>
					<td align="center"><?php echo $data['banyak']; ?></td>
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
</div>



</div> <!-- akhir container-fluid semua -->

























































