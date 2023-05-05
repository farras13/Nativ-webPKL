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
                    <h3><b>POLITEKNIK NEGERI MALANG</b></h3>
                    <h4>Polinema adalah institusi pendidikan tinggi vokasi yang terletak di kota Malang.</h4>
                    <p>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru Kota Malang, Jawa Timur 65141 Telp. (0341) 404424 - Fax. (0341)404420</p>
                    <p><span>Website : https://www.polinema.ac.id/</span> <span>E-mail : upt.humas@polinema.ac.id</span> </p>
                </center>
            </td>

        </tr>
    </table>

    <div style="width:100%;float: left;">
        <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
        <center><b>SURAT TUGAS</b></center>
        <center><b>PRAKTEK KERJA LAPANGAN (PKL)</b></center>
        <br>
    </div>
    <?php
    include '../../koneksi/koneksi.php';

    $log = mysqli_query($koneksi, "SELECT mhs.jd_lap_pkl, mhs.nama as mahasiswa, mhss.nama as mahasiswaa, mhsss.nama as mahasiswaaa, mhs.nobp as nim,mhss.nobp as nimm,mhsss.nobp as nimmm,tb_penempatan.*, tb_dosen.nm_dosen, tb_instansi.nm_instansi FROM tb_penempatan JOIN tb_dosen ON tb_penempatan.dosen_id = tb_dosen.nidn JOIN tb_mhs as mhs ON tb_penempatan.nobp = mhs.nobp LEFT JOIN tb_mhs as mhss ON tb_penempatan.nobp2 = mhss.nobp LEFT JOIN tb_mhs as mhsss ON tb_penempatan.nobp3 = mhsss.nobp LEFT JOIN tb_instansi ON tb_penempatan.kd_instansi = tb_instansi.kd_instansi");
    ?>
    <div style="width: 100%;float: left">
        <table class="table table-bordered table-striped">
            <tr>
                <td><b>
                        <center>NO</center>
                    </b></td>
                <td><b>
                        <center>Nama Mahasiswa</center>
                    </b></td>
                <td><b>
                        <center>Nim</center>
                    </b></td>
                <td><b>
                        <center>Judul</center>
                    </b></td>
                <td><b>
                        <center>Tempat</center>
                    </b></td>
                <td><b>
                        <center>Pembimbing</center>
                    </b></td>
            </tr>
            <?php $n = 1;
            while ($q = mysqli_fetch_array($log)) { ?>
                <tr>
                    <td><?= $n; ?>.</td>
                    <td>
                        <?php if ($q['mahasiswaa'] != null) { ?>
                            <p> 1. &nbsp; <?php echo $q['mahasiswa']; ?> </p>
                            <p> 2. &nbsp; <?php echo $q['mahasiswaa']; ?> </p>
                        <?php } else if ($q['mahasiswaaa'] != null) { ?>
                            <p> 1. &nbsp; <?php echo $q['mahasiswa']; ?> </p>
                            <p> 2. &nbsp; <?php echo $q['mahasiswaa']; ?> </p>
                            <p> 3. &nbsp; <?php echo $q['mahasiswaaa']; ?> </p>
                        <?php } else { ?>
                            <p> 1. &nbsp; <?php echo $q['mahasiswa']; ?> </p>
                        <?php } ?>
                    </td>
                    <td>
                        <p> <?php echo $q['nim']; ?> </p>

                        <?php if ($q['nimm'] != null) {
                            echo "<p> <?php echo $q[nimm]; ?> </p>";
                        } ?>
                        <?php if ($q['nimmm'] != null) {
                            echo "<p> <?php echo $q[nimmmm]; ?> </p>";
                        } ?>
                    </td>
                    <td>
                        <?php echo $q['jd_lap_pkl']; ?>
                    </td>
                    <td>
                        <?php echo $q['nm_instansi']; ?>
                    </td>
                    <td>
                        <?php echo $q['nm_dosen']; ?>
                    </td>
                </tr>
            <?php $n++;
            } ?>
        </table>
    </div>
    <div class="ttd" style="float: right;">
        Malang, <?php echo date("d F Y"); ?><br>
        Direktur
        <br>
        <br>
        <br>
        <br>
        <div style="border-bottom: 1px solid #555">Supriatna Adhisuwignjo, ST., MT.</div>
        NIP : 19710108199031001
    </div>
</body>

</html>