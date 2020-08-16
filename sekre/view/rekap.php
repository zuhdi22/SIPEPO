<?php
include "../koneksi.php";
require('fpdf17/fpdf.php');

$result=mysql_query("SELECT santri.nis, santri.nama_santri, santri.kamar, santri.angkatan, bayar.bulan, bayar.jenis_bayar, bayar.nominal, bayar.tanggal_bayar, bayar.jam_bayar from santri INNER JOIN bayar ON santri.nis=bayar.nis Order by nama_santri ASC") or die(mysql_error());

//Inisiasi untuk membuat header kolom
$column_nis = "";
$column_nama = "";
$column_angkatan = "";
$column_kamar = "";
$column_nominal = "";
$column_bulan = "";
$column_tanggal = "";
$column_jam ="";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $nis = $row["nis"];
    $nama_santri = $row["nama_santri"];
    $angkatan = $row["angkatan"];
    $kamar = $row["kamar"];
    $nominal = "Rp".$row['nominal'].",-";
    $bulan = $row["bulan"];
    $tanggal_bayar = $row["tanggal_bayar"];
    $jam_bayar = $row["jam_bayar"];



    $column_nis = $column_nis.$nis."\n";
    $column_nama = $column_nama.$nama_santri."\n";
    $column_angkatan = $column_angkatan.$angkatan."\n";
    $column_kamar = $column_kamar.$kamar."\n";
    $column_nominal = $column_nominal.$nominal."\n";
    $column_bulan = $column_bulan.$bulan."\n";
    $column_tanggal = $column_tanggal.$tanggal_bayar."\n";
    $column_jam = $column_jam.$jam_bayar."\n";


//Create a new PDF file
$pdf = new FPDF('L','mm',array(297,210)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../logo.jpg',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(125);
$pdf->Cell(30,10,'Data Pembayaran Santri',0,0,'C');
$pdf->Ln();
$pdf->Cell(125);
$pdf->Cell(30,10,'Pondok Pesantren Durrotu Aswaja Semarang',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(25,8,'No Induk',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(60,8,'Nama Santri',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(25,8,'Angkatan',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(25,8,'Kamar',1,0,'C',1);
$pdf->SetX(140);
$pdf->Cell(60,8,'Nominal',1,0,'C',1);
$pdf->SetX(200);
$pdf->Cell(35,8,'Bulan',1,0,'C',1);
$pdf->SetX(235);
$pdf->Cell(25,8,'Tanggal Bayar',1,0,'C',1);
$pdf->SetX(260);
$pdf->Cell(32,8,'Jam Bayar',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_nis,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(60,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,6,$column_angkatan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(25,6,$column_kamar,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(60,6,$column_nominal,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(200);
$pdf->MultiCell(35,6,$column_bulan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(235);
$pdf->MultiCell(25,6,$column_tanggal,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(260);
$pdf->MultiCell(32,6,$column_jam,1,'C');

$pdf->Output();
?>
