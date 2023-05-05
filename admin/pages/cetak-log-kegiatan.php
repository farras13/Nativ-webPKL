<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="shortcut icon" href="../../images/logopolinema.png" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cetak</title>
</head>

<style type="text/css" media="print">
    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        padding: 5px;
        line-height: 0.9;

    }
</style>
<style type="text/css" media="screen">
    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        padding: 5px;
        line-height: 0.9;


    }

    h4,
    p {
        margin: 0 0 0px;
    }
</style>

<body onload="window.print();">
    <table style="width: 100%">
        <tr>
            <td width="10%">
                <img src="../../images/logopolinema.png" alt="" style="width:100px;height:70px;float: right;">
            </td>
            <td width="90%">
                <center>
                    <h3><b>POLTEKNIK NEGERI MALANG</b></h3>
                    <h4>Polinema adalah institusi pendidikan tinggi vokasi yang terletak di kota Malang.</h4>
                    <p>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru Kota Malang, Jawa Timur 65141 Telp. (0341) 404424 - Fax. (0341)404420</p>
                    <p><span>Website : https://www.polinema.ac.id/</span> <span>E-mail : upt.humas@polinema.ac.id</span> </p>
                </center>
            </td>

        </tr>
    </table>

    <div style="width:100%;float: left;">
        <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
        <center><b>LOG KEGIATAN MAHASISWA</b></center>
        <center><b>PRAKTEK KERJA LAPANGAN (PKL)</b></center>
        <br>
    </div>
    <?php
    include '../../koneksi/koneksi.php';
    // error_reporting(0);
    $mhs = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_mhs where nobp='$_GET[nobp]'"));
    $dsn = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_dosen where nidn = '$mhs[nidn_pembimbing]'"));
    $q = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan where dosen_id = '$mhs[nidn_pembimbing]'"));
    $inst = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_instansi where kd_instansi = '$q[kd_instansi]'"));
    $log = mysqli_query($koneksi, "SELECT * FROM tb_log_mhs where nim = '$_GET[nobp]'");

    ?>
    <div style="width: 100%;float: left">
        <table>
            <tr>
                <td>NAMA MAHASISWA</td>
                <td>: </td>
                <td style="padding-left: 5px;"> <?php echo strtoupper($mhs['nama']); ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td style="padding-left: 5px;"> <?php echo strtoupper($mhs['nobp']); ?></td>
            </tr>
            <tr>
                <td>NAMA INSTANSI</td>
                <td>:</td>
                <td style="padding-left: 5px;"> <?php echo strtoupper($inst['nm_instansi']); ?></td>
            </tr>
            <tr>
                <td>JUDUL LAPORAN</td>
                <td>:</td>
                <td style="padding-left: 5px;"> <?php echo strtoupper($mhs['jd_lap_pkl']); ?></td>
            </tr>
            <tr>
                <td>NAMA DOSEN PEMBIMBING</td>
                <td>:</td>
                <td style="padding-left: 5px;"> <?php echo strtoupper($dsn['nm_dosen']); ?></td>
            </tr>
        </table>
        <br>

        <table class="table table-bordered table-striped">
            <tr>
                <td><b>
                        <center>Pertemuan ke-</center>
                    </b></td>
                <td><b>
                        <center>Tanggal</center>
                    </b></td>
                <td><b>
                        <center>Pembahasan/Perbaikan</center>
                    </b></td>
                <td><b>
                        <center>Batas Waktu Perbaikan</center>
                    </b></td>
                <td><b>
                        <center>Tandatangan Dosen Pembimbing</center>
                    </b></td>
            </tr>
            <?php $no = 0;
            while ($l = mysqli_fetch_array($log)) {
                $no++; ?>
                <tr>
                    <td><?= $no; ?>.</td>
                    <td> <?= date('d F Y', strtotime($l['tanggal'])); ?></td>
                    <td><b><?= $l['judul_kegiatan']; ?></b> <br> <?= $l['kegiatan']; ?> </td>
                    <td><?= date('d F Y', strtotime($l['batas_waktu'])); ?></td>
                    <td><img src="../images/kegiatan/<?php echo $l['photo']; ?>" alt=""></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="ttd" style="float: right;">
        Malang, <?php echo date("d F Y"); ?><br>
        Dosen Pembimbing
        <br>
        <br>
        <br>
        <br>
        <div style="border-bottom: 1px solid #555"><?php echo $dsn['nm_dosen'] ?></div>
        NIDN : <?php echo $mhs['nidn_pembimbing'] ?>
    </div>
</body>

</html>