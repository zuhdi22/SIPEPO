<?php

if(isset($_POST['submit-cari-bayar'])) {
$_SESSION['session_pencarian'] = $_POST['keyword'];
$keyword = $_SESSION ['session_pencarian'];
}else {
$keyword=['session_pencarian'];
}

$tampil = mysql_query("SELECT santri.nis, santri.nama_santri, santri.kamar, santri.angkatan, bayar.bulan, bayar.jenis_bayar, bayar.nominal, bayar.tanggal_bayar, bayar.jam_bayar INNER JOIN santri ON santri.nis=bayar.nis where nis LIKE 'keyword' ORDER BY ASC");

?>
