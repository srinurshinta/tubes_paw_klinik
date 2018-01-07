<div class="container-fluid">

<div class="row">
	<div class="col-md-6">
	<a href="?page=user&action=tambah_user" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Tambah Baru</a>
		
	</div>
	<div class="col-md-6">
		
	</div>
	
</div>


<div class="row">
<div class="col-md-12 col-xs-12">
	<table  id="dynamic-table" class="table table-bordered table-striped table-hover">
	<thead>
	<hr>
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nama</th>
			<th>level</th>
			<th>Action</th>
		</tr>
		</hr>

	</thead>
	<tbody>
		<?php
		$sql = mysql_query("SELECT * FROM tb_login");
		$no = 1;
		while($data = mysql_fetch_array($sql)){
		?>

		<tr>
			<td><?php echo $no ; $no++; ?></td>
			<td><?php echo $data['username']; ?> </td>
			<td><?php echo $data['password']; ?> </td>
			<td><?php echo $data['nama']; ?> </td>
			<td><?php echo $data['level']; ?> </td>
			<td>
			   	<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=pasien&action=hapus_pasien&norm=<?php echo $data['no_rm']; ?>" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-remove"></span></a>
			</td>

		</tr>
	</tbody>
		<?php
	}
	?>
	</table>
	
</div>
	
</div>
	
</div>