<?php

mysql_connect("localhost","root","");
mysql_select_db("durrotua_dbsantri");

date_default_timezone_set("Asia/Jakarta");
//fungsi format rupiah
function format_rupiah($rp) {
	$hasil = "Rp." . number_format($rp, 0, "", ". ") . ",00";
	return $hasil;

}
?>
