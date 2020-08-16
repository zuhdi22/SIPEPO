<?php
include "../koneksi.php";
$id_santri    	= $_POST['id_santri'];
$nis   	= $_POST['nis'];
$nama_santri  	 = $_POST['nama_santri'];
$kamar 		    = $_POST['kamar'];
$angkatan 		= $_POST['angkatan'];
$alamat			 = $_POST['alamat'];
$wali   		 = $_POST['wali'];
$no_hp  	  = $_POST['no_hp'];

$query = mysql_query("INSERT INTO santri (id_santri, nis, nama_santri, kamar, angkatan, alamat, wali, no_hp) VALUES ('$id_santri', '$nis', '$nama_santri', '$kamar', '$angkatan', '$alamat', '$wali', '$no_hp')");
if ($query){
	echo "<script>alert('Data Santri Berhasil dimasukan!'); window.location = '../index.php'</script>";
} else {
	echo "<script>alert('Data Santri Gagal dimasukan!'); window.location = '../index.php'</script>";
}
?>
