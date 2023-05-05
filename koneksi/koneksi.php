<?php
$db_host = "localhost";
// $db_user = "pkljtimy_tiayuni";
$db_user = "root";
$db_pass = "";
// $db_pass = "tiawahyunirose123";
$db_name = "pkljtimy_db_si_pkl";
 
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo"<script> alert('Koneksi database gagal.!!'); </script>";
}

?>
