<?php
if(isset($_POST['submit-cari-akun'])) {
  $_SESSION['session_pencarian'] = $_POST['keyword'];
  $keyword = $_SESSION ['session_pencarian'];
}else {
  $keyword=['session_pencarian'];
}

$tampil = mysql_query("SELECT * from santri where nama_santri LIKE '%keyword%' or angkatan LIKE '%keyword%' ORDER BY ASC");
?>
