
<div class="container-fluid">
<legend>Data Pasien - Klinik Utama Waluya </legend>
	<div class="row">
		<div class="col-md-6">
			
		</div>
		<div class="col-md-6">
			<div style="margin-bottom: 15px;" align="right">
				<form action="" method="post">
					<input type="text" name="inputan_pencarian" placeholder="Masukan No.RM/Nama.." style="width: 200px; padding: 5px;" />
					<input type="submit" name="cari_pasien" value="Cari" style="padding: 3px;" />
				</form>
			</div>
		</div>
		
	</div>
    <div class="row">
		<div class="col-md-12 col-xs-12">
			<table class="table table-bordered table-striped table-hover">
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
					<th>Opsi</th>
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
                        <td align="center">
                            <a href="?page=pasien&action=data_rm&no_rm=<?php echo $data['no_rm']; ?>&nama_pasien=<?=$data['nama_pasien']?>" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-list-alt"></span></a>
                            <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=pasien&action=hapus_pasien&norm=<?php echo $data['no_rm']; ?>" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-remove"></span></a>
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
				$jml = mysql_num_rows(mysql_query("select * from tbl_pasien"));
				echo "Jumlah Data : <b>".$jml."</b>"; ?>
			</div>	
		</div>
      </div>
    </div> 
</div>


</div> <!-- akhir container-fluid semua -->

