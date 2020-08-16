<?php
$jenis = $_POST['jenis'];
$tahun = $_POST['tahun'];
$kamar = $_POST['kamar'];
$angkatan = $_POST['angkatan'];

$conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
if ($jenis == 'Katering') {
  $sql = "SELECT rekap_tahunan_katering.nis, santri.nama_santri, rekap_tahunan_katering.1, rekap_tahunan_katering.2, rekap_tahunan_katering.3, rekap_tahunan_katering.4, rekap_tahunan_katering.5, rekap_tahunan_katering.6, rekap_tahunan_katering.7, rekap_tahunan_katering.8, rekap_tahunan_katering.9, rekap_tahunan_katering.10, rekap_tahunan_katering.11, rekap_tahunan_katering.12 FROM rekap_tahunan_katering LEFT JOIN santri ON rekap_tahunan_katering.nis = santri.nis WHERE rekap_tahunan_katering.tahun = '$tahun'";
  if ($kamar == null && $angkatan == null) {
    $query = mysqli_query($conn, $sql);
  }elseif ($kamar != null && $angkatan == null) {
    $sql = $sql." AND santri.kamar = '$kamar'";
    $query = mysqli_query($conn, $sql);
  }elseif ($kamar == null && $angkatan != null) {
    $sql = $sql." AND santri.angkatan = '$angkatan'";
    $query = mysqli_query($conn, $sql);
  }elseif ($kamar != null && $angkatan != null) {
    $sql = $sql." AND santri.kamar = '$kamar' AND santri.angkatan = '$angkatan'";
    $query = mysqli_query($conn, $sql);
  }
}elseif ($jenis == 'Ianah') {
  $sql = "SELECT rekap_tahunan_ianah.nis, santri.nama_santri, rekap_tahunan_ianah.1, rekap_tahunan_ianah.2, rekap_tahunan_ianah.3, rekap_tahunan_ianah.4, rekap_tahunan_ianah.5, rekap_tahunan_ianah.6, rekap_tahunan_ianah.7, rekap_tahunan_ianah.8, rekap_tahunan_ianah.9, rekap_tahunan_ianah.10, rekap_tahunan_ianah.11, rekap_tahunan_ianah.12 FROM rekap_tahunan_ianah LEFT JOIN santri ON rekap_tahunan_ianah.nis = santri.nis WHERE rekap_tahunan_ianah.tahun = '$tahun'";
  if ($kamar == null && $angkatan == null) {
    $query = mysqli_query($conn, $sql);
  }elseif ($kamar != null && $angkatan == null) {
    $sql = $sql." AND santri.kamar = '$kamar'";
    $query = mysqli_query($conn, $sql);
  }elseif ($kamar == null && $angkatan != null) {
    $sql = $sql."AND santri.angkatan = '$angkatan'";
    $query = mysqli_query($conn, $sql);
  }elseif ($kamar != null && $angkatan != null) {
    $sql = $sql."AND santri.kamar = '$kamar' AND santri.angkatan = '$angkatan'";
    $query = mysqli_query($conn, $sql);
  }
}
//$num = mysqli_num_rows($query);
?>
