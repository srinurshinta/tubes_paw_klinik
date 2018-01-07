<?php
require '../inc/koneksi.php';
if(isset($_POST)) {


	$no_rm = @$_POST['no_rm'];
	$tgl_msk = @$_POST['tgl_msk'];
	$nama_pasien = @$_POST['nama_pasien'];
	$tgl_lahir = @$_POST['tgl_lahir'];
	$tempat_lahir = @$_POST['tempat_lahir'];
	$jk = @$_POST['jk'];
	$no_hp = @$_POST['no_hp'];
	$alamat = @$_POST['alamat'];
$failure = "Failure !!!, id Sudah Ada";

$sql = mysql_query("SELECT MAX(no_rm) AS Mid FROM tbl_pasien");
$f = mysql_fetch_array($sql);
$Maxid = $f['Mid'];

function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
$kode = substr($id_terakhir, 0, $panjang_kode);
$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
$id_baru = $kode.$angka_baru;
return $id_baru;
}



$fMaxid = autonumber($Maxid, 1, 4);
//f999 max id

$ceknum = mysql_query("SELECT no_rm FROM tbl_pasien WHERE no_rm = '$fMaxid' ");
$ceknum2 = mysql_num_rows($ceknum);

if($ceknum2) {?>
  <div class="alert alert-warning">
     Failure !!!, id Sudah Ada
      </div>
<?php
}
else {
    $insert = mysql_query("INSERT INTO tbapotek (id, kategori, nama, jenis, umur, alamat, nohp) values('$fMaxid', '$kategori', '$nama', '$jenis', '$umur', '$alamat', '$nohp')");
    $insert2 = mysql_query("INSERT INTO tbriwayat(id, tanggal, keluhan, bb, ss, td, gds, ua, chol, alergi, obat, tarif) values('$fMaxid', '$date', '$keluhan', '$bb', '$ss', '$td', '$gds', '$ua', '$chol', '$alergi', '$obat', '$tarif')");
}

}
?>
