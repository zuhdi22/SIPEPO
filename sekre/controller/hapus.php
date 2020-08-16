<?php
include "../koneksi.php";
$id_santri 	= $_GET['kd'];

$query = mysql_query("DELETE FROM santri WHERE id_santri='$id_santri'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = '../index.php'</script>";
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = '../index.php'</script>";	
}
?>
