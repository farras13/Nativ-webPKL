<?php
session_start();
include './../koneksi/koneksi.php';
$username = $_POST['user'];
$password = md5($_POST['pas']);
// $level = $_POST['level'];

// query to check login
$mahasiswa = "SELECT * FROM tb_mhs WHERE username='" . $username . "' AND password='" . $password . "'";
$dosen = "SELECT * FROM tb_dosen WHERE username='" . $username . "' AND password='" . $password . "'";
$prodi = "SELECT * FROM tb_adm_prodi WHERE username='" . $username . "' AND password='" . $password . "'";
$instansi = "SELECT * FROM tb_instansi WHERE username='" . $username . "' AND password='" . $password . "'";
$panitia = "SELECT * FROM tb_panitia WHERE username='" . $username . "' AND password='" . $password . "'";
$lapangan = "SELECT * FROM tb_pgw_lapangan WHERE username='" . $username . "' AND password='" . $password . "'";
$admin = "SELECT * FROM tb_administrator WHERE username='" . $username . "' AND password='" . $password . "'";

// group query by level
$level = ['Mahasiswa' => $mahasiswa, 'Dosen' => $dosen, 'Prodi' => $prodi, 'Instansi' => $instansi, 'Panitia' => $panitia, 'Lapangan' => $lapangan, 'Admin' => $admin];

// checking user pass 1 by 1
foreach ($level as $key => $value) {
    $query = mysqli_query($koneksi, $value) or die(mysqli_error());
    $row = mysqli_num_rows($query);

    if ($row > 0) {
        $cid = mysqli_fetch_array($query);
        if ($key == "Mahasiswa") {
            $_SESSION['id'] = $cid['nobp'];
            $_SESSION['nama'] = $cid['nama'];
            $_SESSION['foto'] = $cid['foto'];
        } elseif ($key == "Dosen") {
            $_SESSION['id'] = $cid['nidn'];
            $_SESSION['nama'] = $cid['nm_dosen'];
            $_SESSION['foto'] = $cid['foto'];
        } elseif ($key == "Prodi") {
            $_SESSION['id'] = $cid['kd_prodi'];
            $_SESSION['nama'] = $cid['nama'];
            $_SESSION['foto'] = $cid['foto'];
        } elseif ($key == "Instansi") {
            $_SESSION['id'] = $cid['kd_instansi'];
            $_SESSION['nama'] = $cid['nm_instansi'];
            if ($cid['logo'] != null) {
                $_SESSION['foto'] = $cid['logo'];
            } else {
                $_SESSION['foto'] = "default.png";
            }
        } elseif ($key == "Panitia") {
            $_SESSION['id'] = $cid['id_panitia'];
            $_SESSION['nama'] = $cid['nama'];
            if ($cid['logo'] != null) {
                $_SESSION['foto'] = $cid['logo'];
            } else {
                $_SESSION['foto'] = "default.png";
            }
        } elseif ($key == "Lapangan") {
            $_SESSION['id'] = $cid['id'];
            $_SESSION['nama'] = $cid['nama'];
            if ($cid['foto'] != null) {
                $_SESSION['foto'] = $cid['foto'];
            } else {
                $_SESSION['foto'] = "default.png";
            }
        } else {
            $_SESSION['id'] = $cid['id_admin'];
            $_SESSION['nama'] = $cid['username'];
            if ($cid['foto'] != null) {
                $_SESSION['foto'] = $cid['foto'];
            } else {
                $_SESSION['foto'] = "default.png";
            }
        }

        $_SESSION['isLoggedIn'] = 'yes';
        $_SESSION['lev'] = $key;
        header('Location: ../admin');
    }
}

echo "<script type='text/javascript'>
		alert('Username Atau Password Anda Salah..!');
	</script>";
echo "<script> window.history.back(); </script>";
