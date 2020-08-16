<?php
function formatDate($date){
  return date("d-m-Y", strtotime($date));
}
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
$tahun = $_POST['tahun'];
$kamar = $_POST['kamar'];
$conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
$sql =  "SELECT santri.nis, santri.nama_santri, santri.kamar, santri.angkatan, bayar.id_bayar ,bayar.bulan, bayar.jenis_bayar, bayar.nominal, bayar.tanggal_bayar, bayar.tahun, bayar.jam_bayar from bayar LEFT JOIN santri ON bayar.nis = santri.nis WHERE bayar.tahun = '$tahun' AND santri.kamar = '$kamar' ";
$query = mysqli_query($conn, $sql);

//$num = mysqli_num_rows($query);
?>
