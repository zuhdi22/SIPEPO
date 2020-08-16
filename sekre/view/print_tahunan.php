<?php
include "../koneksi.php";
require('fpdf17/fpdf.php');

$result = mysql_query($_POST['sql']) or die(mysql_error());
$tahun = $_POST['tahun'];
$jenis = $_POST['jenis'];
$angkatan = $_POST['angkatan'];
$kamar = $_POST['kamar'];
if($angkatan != null){
  $additional = 'Angkatan '.$angkatan.' ';
}elseif ($kamar != null){
  $additional = 'Kamar '.$kamar.' ';
}else{
  $additional = '';
}


// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',13);
// mencetak string
//$pdf->Cell(125);
$pdf->Cell(270,7,'Laporan Pembayaran '.$jenis.' '.$additional.'Tahun '.$tahun,0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(270,7,'Pondok Pesantren Durrotu Aswaja',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(15,6,'NIS',1,0);
$pdf->Cell(70,6,'NAMA',1,0);
$pdf->Cell(15,6,'JAN',1,0);
$pdf->Cell(15,6,'FEB',1,0);
$pdf->Cell(15,6,'MAR',1,0);
$pdf->Cell(15,6,'APR',1,0);
$pdf->Cell(15,6,'MEI',1,0);
$pdf->Cell(15,6,'JUN',1,0);
$pdf->Cell(15,6,'JUL',1,0);
$pdf->Cell(15,6,'AGU',1,0);
$pdf->Cell(15,6,'SEP',1,0);
$pdf->Cell(15,6,'OKT',1,0);
$pdf->Cell(15,6,'NOV',1,0);
$pdf->Cell(15,6,'DES',1,1);
$pdf->SetFont('Arial','',10);


//$mahasiswa = mysqli_query($connect, "select * from mahasiswa");
$no = 1;
while ($row = mysql_fetch_array($result)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(15,6,$row['nis'],1,0);
    $pdf->Cell(70,6,$row['nama_santri'],1,0);
    $pdf->Cell(15,6,$row['1'],1,0);
    $pdf->Cell(15,6,$row['2'],1,0);
    $pdf->Cell(15,6,$row['3'],1,0);
    $pdf->Cell(15,6,$row['4'],1,0);
    $pdf->Cell(15,6,$row['5'],1,0);
    $pdf->Cell(15,6,$row['6'],1,0);
    $pdf->Cell(15,6,$row['7'],1,0);
    $pdf->Cell(15,6,$row['8'],1,0);
    $pdf->Cell(15,6,$row['9'],1,0);
    $pdf->Cell(15,6,$row['10'],1,0);
    $pdf->Cell(15,6,$row['11'],1,0);
    $pdf->Cell(15,6,$row['12'],1,1);
    $no++;
    //$pdf->Ln();
}


$pdf->Output('Rekap_'.$jenis.'_'.$additional.'_Tahun_'.$tahun.'.pdf', 'I');
?>
