<?php
$conn = mysqli_connect("localhost", "root","", "durrotua_dbsantri");
$sql = mysqli_query($conn, 'SELECT tahun FROM bayar UNION SELECT tahun FROM bayar ORDER BY tahun ASC');
?>
