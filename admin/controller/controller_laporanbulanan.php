<?php
$bulan = $_POST['date_range'];
$jenis = $_POST['jenis'];
$date = date('Y').'-'.$bulan;
$conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
if ($jenis == 'Katering') {
  $sql = "SELECT bayar.*, santri.nama_santri FROM bayar JOIN santri ON bayar.nis = santri.nis WHERE tanggal_bayar LIKE '%$date%' AND jenis_bayar LIKE '%$jenis%'";
  $query = mysqli_query($conn, $sql);
}elseif ($jenis == 'Ianah') {
  $sql = "SELECT bayar.*, santri.nama_santri FROM bayar JOIN santri ON bayar.nis = santri.nis WHERE tanggal_bayar LIKE '%$date%' AND jenis_bayar LIKE '%$jenis%'";
  $query = mysqli_query($conn, $sql);
}

//$num = mysqli_num_rows($query);

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
?>
