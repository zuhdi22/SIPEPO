<?php
include "../koneksi.php";
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

$result = mysql_query($_POST['sql']) or die(mysql_error());
$bulan = $_POST['bulan'];

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',13);
// mencetak string
//$pdf->Cell(125);
$pdf->Cell(270,7,'Laporan Pembayaran Bulan '.$bulan.' '.date('Y'),0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(270,7,'Pondok Pesantren Durrotu Aswaja',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NO',1,0);
$pdf->Cell(30,6,'NIS',1,0);
$pdf->Cell(80,6,'NAMA',1,0);
$pdf->Cell(30,6,'JENIS BAYAR',1,0);
$pdf->Cell(40,6,'BULAN/TAHUN',1,0);
$pdf->Cell(35,6,'NOMINAL',1,0);
$pdf->Cell(40,6,'KETERANGAN',1,1);

$pdf->SetFont('Arial','',10);


//$mahasiswa = mysqli_query($connect, "select * from mahasiswa");
$no = 1;
$sum=0;
while ($row = mysql_fetch_array($result)){
    $pdf->Cell(20,6,$no,1,0);
    $pdf->Cell(30,6,$row['nis'],1,0);
    $pdf->Cell(80,6,$row['nama_santri'],1,0);
    $pdf->Cell(30,6,$row['jenis_bayar'],1,0);
    $pdf->Cell(40,6,formatMonth($row['bulan']).' '.$row['tahun'],1,0);
    $pdf->Cell(35,6,$row['nominal'],1,0);
    $pdf->Cell(40,6,$row['ket'],1,1);
    $no++;
    $sum = $sum + $row['nominal'];
    //$pdf->Ln();
}
$pdf->Ln();
$pdf->Cell(40,6,'Total Pemasukan : Rp.'. number_format($sum,2,',','.')) .',-';


$pdf->Output('Laporan_Bulan_'.$bulan.'.pdf', 'I' ,$sum);
?>
