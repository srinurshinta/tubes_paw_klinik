<div class="container-fluid">
<legend>Jadwal Dokter - Klinik Utama Waluya </legend>
	<div class="row">
		<div class="col-md-6">

			<a href="?page=dokter&action=tambah_jadwal" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah Baru</a>
			
		</div>
		<div class="col-md-6">
			<div style="margin-bottom: 15px;" align="right">
				<form action="" method="post">
					<input type="text" name="inputan_pencarian" placeholder="Masukan Kode Dokter/Nama.." style="width: 200px; padding: 5px;" />
					<input type="submit" name="cari_jadwal" value="Cari" style="padding: 3px;" />
				</form>
			</div>
		
	</div>
    <div class="row">
		<div class="col-md-12 col-xs-12">
				<table class="table table-bordered table-striped table-hover">
				<thead>
					<th>No</th>
					<th>Kode Dokter</th>
					<th>Nama Dokter</th>
					<th>Hari/Jam</th>
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

				$sql = mysql_query("select * from tbl_jadwal LIMIT $posisi, $batas") or die (mysql_error());
				$no = $posisi + 1;

				$inputan_pencarian = @$_POST['inputan_pencarian'];
				$cari_jadwal = @$_POST['cari_jadwal'];
				if($cari_jadwal){
					if($inputan_pencarian != ""){
						$sql = mysql_query("select * from tbl_jadwal where kode_dokter like '%$inputan_pencarian%' or nama_dokter like '%$inputan_pencarian%'") or die(mysql_error());
						} else {
							$sql = mysql_query("select * from tbl_jadwal") or die(mysql_error());
						}
				} else {
					$sql = mysql_query("select * from tbl_jadwal") or die(mysql_error());
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
						<td align="center"><?php echo $data['kode_dokter']; ?></td>
						<td align="center"><?php echo $data['nama_dokter']; ?></td>
						<td align="center"><?php echo $data['waktu']; ?></td>
						<td align="center">
							<a href="?page=dokter&action=edit_jadwal&kode_dokter=<?php echo $data['kode_dokter']; ?>"><a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
							<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=dokter&action=hapus_jadwal&kd=<?php echo $data['kode_dokter']; ?>"><a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
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
				$jml = mysql_num_rows(mysql_query("select * from tbl_jadwal"));
				echo "Jumlah Data : <b>".$jml."</b>"; ?>
			</div>
		</div>
      </div>
    </div> 
</div>


</div> <!-- akhir container-fluid semua -->






















