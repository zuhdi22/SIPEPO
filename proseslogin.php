<?php
include "koneksi.php";
$username = $_POST['user'];
$password = $_POST['pass'];

$query = mysql_query("SELECT level_user FROM tb_user
					WHERE username='$username' AND password='".( $password )."'");
$data = mysql_fetch_array($query);

if ($data['level_user'] == 1){
	session_start();
	$_SESSION['username']    = $username;
    $_SESSION['password']    = $password;
    $username = $_SESSION['username'];

	header('location:admin/index.php');
} else if ($data['level_user'] == 2){
	session_start();
	$_SESSION['username']    = $username;
    $_SESSION['password']    = $password;
    $username = $_SESSION['username'];

	header('location:admin/index.php');
} else if ($data['level_user'] == 3){
	session_start();
	$_SESSION['username']    = $username;
    $_SESSION['password']    = $password;
    $username = $_SESSION['username'];

	header('location:sekre/index.php');
} else if ($data['level_user'] == 4){
	session_start();
	$_SESSION['username']    = $username;
    $_SESSION['password']    = $password;
    $username = $_SESSION['username'];

	header('location:santri/index.php');
} else if ($data['level_user'] == 5){
	session_start();
	$_SESSION['username']    = $username;
    $_SESSION['password']    = $password;
    $username = $_SESSION['username'];

	header('location:sekre/index.php');
}
else{
	echo "<script>alert('Masukan Username dan Password dengan benar'); window.location = 'index.html'</script>";

}



?>
