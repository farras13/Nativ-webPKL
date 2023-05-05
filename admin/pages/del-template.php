<?php

include '../../koneksi/koneksi.php';

$id = $_GET['id'];

$sql = mysqli_query($koneksi, "DELETE FROM tb_template WHERE id_template='$id'");

if ($sql) {
    echo '<script> alert("Data berhasil dihapus."); javascript:history.back(); </script>';
} else {
    echo '<script> alert("Data Gagal dihapus."); javascript:history.back(); </script>';
}
