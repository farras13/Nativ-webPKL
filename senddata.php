<?php
include('koneksi/koneksi.php');

$data_akun_admin = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_administrator"));
$data_akun_prodi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_adm_prodi"));
$data_akun_dosen = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_dosen"));
$data_akun_instansi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_instansi"));
$data_akun_mhs = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_mhs"));
$data_akun_panitia = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_panitia"));
$data_akun_pgw_lapangan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_pgw_lapangan"));

$tabel_akun =  ['tb_administrator', 'tb_adm_prodi', 'tb_dosen', 'tb_instansi', 'tb_mhs', 'tb_panitia', 'tb_pgw_lapangan'];

foreach ($tabel_akun as $key => $value) {
    $data_akun = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM $value"));
    echo $value , ': '; print_r($data_akun); echo "<br>";  echo "<br>";       
    foreach ($data_akun as $index => $data) {
        // print_r($data);
        // $sql = mysqli_query($koneksi, "INSERT INTO tb_akun values ('$data[username]','$data[password]', '$key'");
    }
}