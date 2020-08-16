<?php
require ("lib/fpdf/fpdf.php");
require ("lib/lib-function.php");
Class durrotua_dbsantri extends FPDF
{
	/*Format Kwitansi Sederhana oleh : Ahyarudin -- www.ayayank.com*/
	var $tanggal,$kwnums,$admins,$notevalid,$headerCo,$headerAddr,$headerTel;
	/* Header Kwitansi */
	function Header(){
		$this->SetFont('Arial','B',12);
		$this->Cell(40,7,$this->headerCo,0,1,'L');
		$this->SetFont('Arial','B',11);
		$this->Cell(0,7,$this->headerAddr,0,1,'L');
		$this->Cell(120,7,$this->headerTel,0,0,'L');
		$this->SetFont('Arial','',12);
		$this->Cell(28,7,'No. Kwitansi : ',0,0,'L');
		$this->SetFont('Courier','',12);
		$this->Cell(0,7,$this->kwnums,0,1,'L');
		$this->SetFillColor(95, 95, 95);
		$this->Rect(5, 27.5, 198, 3, 'FD');
	}
	/* Footer Kwitansi*/
	function Footer(){
		$this->SetY(-40);
		$this->SetFont('Courier','',12);
		$this->Cell(130);
		$this->Cell(0,6,'Semarang, '.$this->tanggal,0,1,'C');
		$this->Ln(10);
		$this->Cell(130);
		$this->SetFont('Courier','B',12);
		$this->Cell(0,6,$this->admins,0,1,'C');
		$this->Ln(3);
		$this->SetFont('Arial','I',10);
		$this->Cell(0,6,$this->notevalid,0,1,'R');
	}
	function setHeaderParam($pt,$jl,$tel){
		$this->headerCo=$pt;
		$this->headerAddr=$jl;
		$this->headerTel=$tel;
		}
	function setTanggal($tgl){$this->tanggal=$tgl;}
	function setAdmins($admins){$this->admins=$admins;}
	function setKwtNums($kwnums){$this->kwnums=$kwnums;}
	function setValidasi($word){$this->notevalid=$word;}
}
/*Deklarasi variable untuk cetak*/
$pt='Pondok Pesantren Durrotu Ahlissunnah Waljamaah';
$jl='Jl. Kalimasada No.10 - Semarang';
$tel='021 - 6540258';
$cash=$_POST['nominal'];
$pembayar=$_POST['nama_santri'];
$admins=$_POST['admin'];
$payment=$_POST['jenis_bayar'];
$bulan=$_POST['bulan'];
$notevalid='validasi pembayaran dianggap sah bila disertai tanda tangan dan stempel';
/*parameter kertas*/
$pdf=new durrotua_dbsantri('L','mm','A5');
$fungsi=new Fungsi();
$tglCetak=$fungsi->Tanggal('tgl').' '.$fungsi->Tanggal('blnL').' '.$fungsi->Tanggal('THN');
/* Retrieve No. Kwitansi*/
$KwtNum = $fungsi->KwNums();
/*Persiapan Parameter*/
$pdf->setTanggal($tglCetak);
$pdf->setAdmins($admins);
$pdf->setKwtNums($KwtNum);
$pdf->setValidasi($notevalid);
$pdf->setHeaderParam($pt,$jl,$tel);
/* Bagian di mana inti dari kwitansi berada*/
$pdf->setMargins(5,5,5);
$pdf->AddPage();
$pdf->SetLineWidth(0.6);
$pdf->Ln(10);
$pdf->Cell(20);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,8,'Terima Dari  : ',0,0,'R');
$pdf->SetFont('Courier','',14);
$pdf->Cell(16,8,$pembayar,0,1,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20);
$pdf->Cell(40,8,'Uang Sejumlah  : ',0,0,'R');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,'###'.$fungsi->Terbilang($cash).' RUPIAH ###',0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->SetY(-90);
$pdf->Cell(20);
$pdf->Cell(40,8,'Untuk Pembayaran  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$payment,0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->SetY(-80);
$pdf->Cell(20);
$pdf->Cell(40,8,'Bulan  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$bulan,0,'L');
$pdf->SetY(-50);
$pdf->SetFont('Courier','B','16');
$pdf->Cell(60,12,'Rp '.$fungsi->Ribuan($cash),1,0,'C');
$pdf->SetAuthor('http://www.ayayank.com',true);
$pdf->Output();
$fungsi->insertData($cash, $pembayar, $admins,$payment, $bulan);
?>
