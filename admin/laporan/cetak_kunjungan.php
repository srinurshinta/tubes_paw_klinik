<?php
include "fpdf.php";
include "../inc/koneksi.php";

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];

$pdf = new FPDF();
$pdf->AddPage();

$pdf->setfont('Arial', 'B', 16);
$pdf->Cell(0,5,'Klinik Utama Waluya','0','1','C',false);
$pdf->setfont('Arial','i',8);
$pdf->Cell(0,2,'Jl. Raya Tanjungsari No. 349 Sumedang - Jawa Barat','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->setfont('Arial','B',8);
$pdf->Cell(50,5,'Data Kunjungan','0','1','C',false);
$pdf->Ln(3);

$pdf->setfont('Arial','B',7);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(12,6,'Kode Kunjung',1,0,'C');
$pdf->Cell(40,6,'Tanggal Kunjungan',1,0,'C');
$pdf->Cell(20,6,'Nama Pasien',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysql_query("select * from tbl_kunjungan where tgl_kunjung between '$tgl_awal' and '$tgl_akhir'");
while ($data = mysql_fetch_array($sql)){
	$no++;
	$pdf->Ln(4);
	$pdf->setfont('Arial','',7);
	$pdf->Cell(8,4,$no.".",1,0,'C');
	$pdf->Cell(12,4,$data['kode_kunjung'],1,0,'C');
	$pdf->Cell(40,4,$data['tgl_kunjung'],1,0,'C');
	$pdf->Cell(20,4,$data['nama_pasien'],1,0,'C');
}
$pdf->Output();
?>