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
    <center><b>NILAI PRAKTEK KERJA LAPANGAN</b></center>
    <center><b>PKL</b></center>
    <br>
  </div>
  <?php
  include '../../koneksi/koneksi.php';
  error_reporting(0);
  $mhs =  mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_mhs where tb_mhs.nobp = '$_GET[nobp]'"));
  $penempatan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan where tb_penempatan.nobp = '$_GET[nobp]' OR tb_penempatan.nobp2 = '$_GET[nobp]' OR tb_penempatan.nobp3 = '$_GET[nobp]'"));
  $dosen = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_dosen where tb_dosen.nidn = '$penempatan[dosen_id]'"));
  $instansi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_instansi where tb_instansi.kd_instansi = '$penempatan[kd_instansi]'"));
  $pemlap = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_pgw_lapangan where tb_pgw_lapangan.instansi_id = '$penempatan[kd_instansi]'"));
  $nilai = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penilaian where tb_penilaian.nim='$_GET[nobp]'"));

  $total = ($nilai['nilai_angka_dospem'] + $nilai['nilai_angka_pemlap']) / 2;
  if ($total < 50) {
    $abjad = "D";
  } elseif ($total > 50 and $total < 60) {
    $abjad = "C";
  } elseif ($total > 60 and $total < 66) {
    $abjad = "C+";
  } elseif ($total > 65 and $total < 74) {
    $abjad = "B";
  } elseif ($total > 73 and $total < 80) {
    $abjad = "B+";
  } elseif ($total > 80) {
    $abjad = "A";
  }

  ?>
  <div style="width: 100%;float: left">
    <table>
      <tr>
        <td>Nama Mahasiswa</td>
        <td>: </td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($mhs['nama']); ?></td>
      </tr>
      <tr>
        <td>NIM</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($mhs['nobp']); ?></td>
      </tr>
      <tr>
        <td>Nama Instansi</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($instansi['nm_instansi']); ?></td>
      </tr>
      <tr>
        <td>Alamat PKL</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($instansi['alamat']); ?></td>
      </tr>
      <tr>
        <td>Judul Laporan</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($mhs['jd_lap_pkl']); ?></td>
      </tr>
      <tr>
    </table>
    <br>
    <table>
      <tr>
        <td>Nama Pembimbing 1</td>
        <td>: </td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($pemlap['nama']); ?></td>
      </tr>
      <tr>
        <td colspan="3">(Pembimbing dari instansi tempat PKL)</td>
      </tr>
      <tr>
        <td>Nama Pembimbing 2</td>
        <td>:</td>
        <td style="padding-left: 5px;"> <?php echo strtoupper($dosen['nm_dosen']); ?></td>
      </tr>
      <tr>
        <td colspan="3">(Pembimbing dari Polinema)</td>
      </tr>
    </table>
    <br>
    <table class="table table-bordered table-striped">
      <tr>
        <td rowspan="2"><b>
            <center>Nilai Pembimbing 1 (50%)
              (Pembimbing dari instansi tempat PKL)
            </center>
          </b></td>
        <td><b>
            <center>Tanda tangan + Stempel</center>
          </b></td>
        <td><b>
            <center>Nilai Angka</center>
          </b></td>
        <td><b>
            <center>Nilai Huruf</center>
          </b></td>
      </tr>
      <tr>
        <td><img src="./../../images/user/<?= $nilai['foto_lap']; ?>" width="100" alt=""></td>
        <td> <?= $nilai['nilai_angka_pemlap']; ?></td>
        <td><?php echo $nilai['nilai_abjad_pemlap']; ?></td>
      </tr>
      <tr>
        <td rowspan="2"><b>
            <center>Nilai Pembimbing 2 (50%)
              (Pembimbing dari Polinema)
            </center>
          </b></td>
        <td><b>
            <center>Tanda tangan</center>
          </b></td>
        <td><b>
            <center>Nilai Angka</center>
          </b></td>
        <td><b>
            <center>Nilai Huruf</center>
          </b></td>
      </tr>
      <tr>
        <td><img src="./../../images/user/<?= $nilai['foto']; ?>" width="100" alt=""></td>
        <td> <?= $nilai['nilai_angka_dospem']; ?></td>
        <td><?php echo $nilai['nilai_abjad_dospem']; ?></td>
      </tr>
      <tr>
        <td colspan="2" rowspan="2"><b>Nilai Akhir Rata-rata</b></td>
        <td><b>Nilai Angka</b></td>
        <td><b>Nilai Huruf</b></td>
      </tr>
      <tr>
        <td><b><?= $total; ?></b></td>
        <td><b><?php echo $abjad; ?></b></td>
      </tr>
    </table>
  </div>
  <p>
    <b>Keterangan</b>: <br>
    Nilai Rata-rata 81 ke atas : A<br>
    Nilai Rata-rata 74 - 80 : B+<br>
    Nilai Rata-rata 66 - 73 : B<br>
    Nilai Rata-rata 61 - 65 : C+<br>
    Nilai Rata-rata 51 - 60 : C<br>
    Nilai Rata-rata 50 ke bawah : D
  </p>
</body>
</html>