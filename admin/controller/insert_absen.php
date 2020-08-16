<?php
include "../koneksi.php";
//$id_bayar       = $_POST['id_bayar'];
$nis 	 					= $_POST['nis'];
$tanggal_bayar 	= date("Y-m-d");//formatDate($_POST['tanggal_bayar']);
$jam_bayar 	  	= date("H:i:s");//$_POST['jam_bayar'];
$jenis_bayar 	  = $_POST['jenis_bayar'];
$nominal	  		= $_POST['nominal'];
$bulan	  			= $_POST['bulan'];
$tahun	  			= $_POST['tahun'];
$ket	  			 	= $_POST['ket'];
$query = mysql_query("INSERT INTO bayar (nis, tanggal_bayar, jam_bayar, jenis_bayar, nominal, bulan, tahun, ket) VALUES ('$nis', '$tanggal_bayar', '$jam_bayar', '$jenis_bayar', '$nominal', '$bulan', '$tahun', '$ket')");

if ($query){
	if($jenis_bayar == 'Katering'){
		$query2 = mysql_query("INSERT INTO rekap_tahunan_katering(tahun, nis, `$bulan`) VALUES ('$tahun', '$nis', '$ket')");
	}elseif($jenis_bayar == 'Ianah'){
		$query2 = mysql_query("INSERT INTO rekap_tahunan_ianah(tahun, nis, `$bulan`) VALUES ('$tahun', '$nis', '$ket')");
	}
	if($query2){
		echo "<script>alert('Data Pembayaran Santri Berhasil dimasukan!'); window.location = '../index.php'</script>";
	}
	else{
		if($jenis_bayar == 'Katering'){
			$query3 = mysql_query("UPDATE rekap_tahunan_katering SET `$bulan` = '$ket'  WHERE tahun='$tahun' AND nis='$nis'");
		}elseif($jenis_bayar == 'Ianah'){
			$query3 = mysql_query("UPDATE rekap_tahunan_ianah SET `$bulan` = '$ket'  WHERE tahun='$tahun' AND nis='$nis'");
		}

		if ($query3) {
			echo "<script>alert('Data Pembayaran Santri Berhasil dimasukan!'); window.location = '../index.php'</script>";
		}else{
			echo "<script>alert('Data Pembayaran Santri Gagal dimasukan!'); window.location = '../index.php'</script>";
		}
	}
}else{
	echo "<script>alert('Data Pembayaran Santri Gagal dimasukan! NIS Salah'); window.location = '../index.php'</script>";
}

function formatDate($date){
	return date("Y-m-d", strtotime($date));
}
?>
