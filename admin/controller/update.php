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

$query = mysql_query("UPDATE santri SET nis='$nis',nama_santri='$nama_santri', alamat='$alamat', kamar='$kamar', angkatan='$angkatan', wali='$wali', no_hp='$no_hp'
 WHERE id_santri='$id_santri'");
if ($query){
header('location:index.php');
    echo "<script>alert('Data Santri Berhasil diubah!'); window.location = 'index.php'</script>";
} else {
	echo "<script>alert('Data Santri Gagal diubah!'); window.location = 'edit.php?hal=edit&kd=$id_santri</script>";
    }
?>
