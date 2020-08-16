<?php
$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = ''; // Password (Isi jika menggunakan password)
$database = 'durrotua_dbsantri'; // Nama databasenya
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

$limit = 5; // Jumlah data per halamanya

              // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
$limit_start = ($page - 1) * $limit;

$no = $limit_start + 1;
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
?>
