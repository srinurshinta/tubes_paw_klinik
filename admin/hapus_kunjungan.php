<?php
$kodekunjung = @$_GET['kodekunjung'];

mysql_query("delete from tbl_kunjungan where kode_kunjung = '$kodekunjung'")
?>

<script type="text/javascript">
	window.location.href="?page=kunjungan";
</script>
