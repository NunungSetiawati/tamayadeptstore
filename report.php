<?php
class PDF extends FPDF{ 
// Page header
function Header(){
$this->SetY(0.3);
$this->SetMargins(0.3,0.3,0.3);
$this->SetTitle('Report');
 	//header 
$this->Ln();
$this->SetFont('Arial', 'B', 9);
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date('d-m-Y h:i:s A', time());
$tanggal = '2017-01-31';
$hari = date('l', microtime($tanggal));
$hari_indonesia = array(
	'Monday' => 'Senin,',
	'Tuesday' => 'Selasa,',
	'Wednesday' => 'Rabu,',
	'Thursday' => 'Kamis,',  
	'Friday' => 'Jumat,',
	'Saturday' => 'Sabtu,',
	'Sunday' => 'Minggu,'
);
$this->Cell(3 ,0.75,"TAMAYA Dept Store",0,0,'L');
$this->Cell(5, 0.75, "", 0, 0, 'L');
$this->Ln(0.5);
$this->SetFont('Arial', 'B', 9);
$this->Cell(3 ,0.75,"",0,1,'L');
$this->Ln(0);
$from = $_POST['date1'];
$end = $_POST['date2'];
$this->SetFont('Arial', 'B', 11);
$this->Cell(0 ,0.75,"LAPORAN Penjualan Periode ".format_indo($from)." s/d ".format_indo($end)."",0,1,'C');
$this->Ln(0);
$this->Cell(5 ,0.75,"Tanggal dan Waktu",0,0,'L');
$this->Cell(5, 0.75, ": ".$hari_indonesia[$hari] . date(" d-m-Y / H:i:s a")."", 0, 0, 'L');
$this->Ln();
$this->SetFont('Arial', 'B', 9);
$this->Cell(0.7, 0.8, 'NO', 'LRT', 0, 'C');
$this->Cell(2.3, 0.8, 'Tanggal', 'LRT', 0, 'C');
$this->Cell(4, 0.8, 'Nama Barang', 'LRT', 0, 'C');
$this->Cell(3, 0.8, 'Merk', 'LRT', 0, 'C');
$this->Cell(3, 0.8, 'Jenis', 'LRT', 0, 'C');
$this->Cell(2, 0.8, 'Harga', 'LRT', 0, 'C');
$this->Cell(1.5, 0.8, 'Jumlah', 'LRT', 0, 'C');
$this->Cell(1.5, 0.8, 'Diskon', 'LRT', 0, 'C');
$this->Cell(2.5, 0.8, 'Total', 'LRT', 0, 'C');
$this->Ln();

}

    function Footer() {
    // Position at 1.5 cm from bottom 
$this->SetY(-0.5);
    // Arial italic 8
$this->SetFont('Arial', '', 10);
    // Page number
$this->Cell(0, 0, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
 

}
$laporan = new PDF('P', 'cm', 'A4');
$laporan->AliasNbPages();
$laporan->AddPage();
$no = 1;

$from = $_POST['date1'];
$end = $_POST['date2'];
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pembelian  WHERE (_flddtgl BETWEEN '$from' AND '$end') ORDER BY _flddtgl ASC");
while ($lihat = mysqli_fetch_array($query)) {

	$laporan->Cell(0.7, 0.8, $no, 'LRTB', 0, 'C');
	$laporan->Cell(2.3, 0.8, format_indo($lihat['_flddtgl']), 'LRTB', 0, 'L');
	$laporan->Cell(4, 0.8, $lihat['_fldsnamabrg'], 'LRTB', 0, 'L');
	$laporan->Cell(3, 0.8, $lihat['_fldsmerk'], 'LRTB', 0, 'LB');
	$laporan->Cell(3, 0.8, $lihat['_fldsjenis'], 'LRTB', 0, 'LB');
	$laporan->Cell(2, 0.8, harga($lihat['_fldsharga']), 'LRTB', 0, 'LB');
	$laporan->Cell(1.5, 0.8, $lihat['_fldsjml'], 'LRTB', 0, 'LB');
	$laporan->Cell(1.5, 0.8, $lihat['_fldsdiskon'], 'LRTB', 0, 'L');
	$laporan->Cell(2.5, 0.8, harga($lihat['_fldstotal']), 'LRTB', 1, 'L');
	$no++;
}

$laporan->Cell(15, 0.8, 'TOTAL PENDAPATAN', 'LRTB', 0, 'C');

$q = mysqli_query($koneksi, "SELECT SUM(_fldstotal) AS tot FROM tbl_pembelian WHERE (_flddtgl BETWEEN '$from' AND '$end')");
$r = mysqli_fetch_array($q);
$laporan->Cell(5.5, 0.8, harga($r['tot']), 'LRTB', 0, 'LB');


$laporan->Output("REPORT SURAT JALAN", 'I');
