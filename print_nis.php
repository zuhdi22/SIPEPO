<?php
include "koneksi.php";
require('fpdf17/fpdf.php');
function formatMonth($month){
  if($month == 1){
    return 'Januari';
  }elseif ($month == 2) {
    return 'Februari';
  }elseif ($month == 3) {
    return 'Maret';
  }elseif ($month == 4) {
    return 'April';
  }elseif ($month == 5) {
    return 'Mei';
  }elseif ($month == 6) {
    return 'Juni';
  }elseif ($month == 7) {
    return 'Juli';
  }elseif ($month == 8) {
    return 'Agustus';
  }elseif ($month == 9) {
    return 'September';
  }elseif ($month == 10) {
    return 'Oktober';
  }elseif ($month == 11) {
    return 'November';
  }elseif ($month == 12) {
    return 'Desember';
  }
}

$result = mysql_query($_POST['nis']) or die(mysql_error());
$nis = $_POST['nis'];



// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',13);
// mencetak string
//$pdf->Cell(125);
$pdf->Cell(270,7,'Laporan Pembayaran Santri',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(270,7,'Pondok Pesantren Durrotu Aswaja',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(20,6,'NIS',1,0);
$pdf->Cell(50,6,'NAMA',1,0);
$pdf->Cell(15,6,'Kamar',1,0);
$pdf->Cell(25,6,'Angkatan',1,0);
$pdf->Cell(25,6,'Jenis Bayar',1,0);
$pdf->Cell(15,6,'Bulan',1,0);
$pdf->Cell(35,6,'Nominal',1,0);
$pdf->Cell(30,6,'Tanggal Bayar',1,0);
$pdf->Cell(30,6,'Jam Bayar',1,0);
$pdf->SetFont('Arial','',10);
$pdf->Ln();

//$mahasiswa = mysqli_query($connect, "select * from mahasiswa");
$no = 1;
$sum=0;
while ($row = mysql_fetch_array($result)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(20,6,$row['nis'],1,0);
    $pdf->Cell(50,6,$row['nama_santri'],1,0);
    $pdf->Cell(15,6,$row['kamar'],1,0);
    $pdf->Cell(25,6,$row['angkatan'],1,0);
    $pdf->Cell(25,6,$row['jenis_bayar'],1,0);
    $pdf->Cell(15,6,formatMonth($row['bulan']),1,0);
    $pdf->Cell(35,6,$row['nominal'],1,0);
    $pdf->Cell(30,6,$row['tanggal_bayar'],1,0);
    $pdf->Cell(30,6,$row['jam_bayar'],1,0);
    $pdf->Ln();
    $no++;
    $sum = $sum + $row['nominal'];
    //$pdf->Ln();
}
$pdf->Ln();
$pdf->Cell(40,6,'Total Pemasukan : Rp.'. number_format($sum,2,',','.')) .',-';


$pdf->Output('Rekap Pembayaran Santri','.pdf', 'I' ,$sum);
?>
