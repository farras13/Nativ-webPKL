<?php
include './../koneksi/koneksi.php';
$id = $_GET['id'];
$qa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_dosen ORDER BY RAND() LIMIT 1"));
mysqli_query($koneksi, "UPDATE tb_penempatan SET status='$_POST[status]'WHERE kd_penempatan='$id'");

header("location: list-penempatan2.php");
