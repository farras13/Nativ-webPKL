<?php
include '../koneksi/koneksi.php';
// $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_periode_penilaian where untuk='Dosen'"));
// $tglm = date($a['tgl_mulai']);
// $tgla = date($a['batas_periode']);
// $tgls = date('Y-m-d H:i:s');

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Form Nilai Dari Dosen

    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"> Home</a></li>
      <li class="active">Nilai Dari Dosen</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Form Nilai Dari Dosen</h3>

          </div><!-- /.box-header -->
          <div class="box-body">
            <?php
            $nobp = $_GET['id'];
            if (isset($_POST['b1'])) {
              if ($_FILES['ft']['name'] == "") {
                $nmf = null;
              } else {
                if ($_FILES['ft']['size'] > 5242880) {
                  echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <strong>Error!</strong> File is too large. Maximum file size is 1 MB.
                    </div>';
                } else {
                  $tmpf = $_FILES['ft']['tmp_name'];
                  $nmf = $_FILES['ft']['name'];
                  move_uploaded_file($tmpf, "../images/user/" . $nmf);
                }
              }
              for ($i = 0; $i < $_POST['no']; $i++) {
                $nim = $_POST['nim' . $i];
                $cek = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penilaian where nim = '$nim'"));
                $nilai = $_POST['pb' . $i];
                if ($nilai < 50) {
                  $abjad = "D";
                } elseif ($nilai > 50 and $nilai < 61) {
                  $abjad = "C";
                } elseif ($nilai > 60 and $nilai < 66) {
                  $abjad = "C+";
                } elseif ($nilai > 65 and $nilai < 74) {
                  $abjad = "B";
                } elseif ($nilai > 73 and $nilai < 81) {
                  $abjad = "B+";
                } elseif ($nilai > 80) {
                  $abjad = "A";
                }
                $now = date('Y-m-d');
                if ($cek != null) {
                  if ($nmf != null) {
                    $sql = mysqli_query($koneksi, "UPDATE tb_penilaian SET foto='$nmf', nilai_angka_dospem='$nilai', nilai_abjad_dospem='$abjad'");
                  } else {
                    $sql = mysqli_query($koneksi, "UPDATE tb_penilaian SET nilai_angka_dospem='$nilai', nilai_abjad_dospem='$abjad'");
                  }
                } else {
                  $sql = mysqli_query($koneksi, "INSERT INTO tb_penilaian VALUES ('NULL','$nim','$_POST[dosen]', 'NULL', '$nilai', 'NULL', '$abjad','NULL', '$nmf', 'NULL','$now')");
                }
              }

              echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Nilai berhasil diberikan.
                                  </div>';
              // echo "<meta http-equiv=refresh content=1;url=index.php?p=list-mahasiswa-belum-dinilai-dosen>";
            }

            ?>
            <form id="contactForm" action="" method="post" enctype="multipart/form-data">
              <?php
              // $dosen = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan where dosen_id = '$id'"));                
              $dosen = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan where kd_penempatan = '$nobp'"));
              $q = mysqli_query($koneksi, "SELECT tb_mhs.* FROM tb_mhs where nobp='$dosen[nobp]' or nobp='$dosen[nobp2]' or nobp='$dosen[nobp3]'");
              // $q = mysqli_query($koneksi, "SELECT tb_mhs.* FROM tb_mhs where nobp='$dosen[nobp]' or nobp='$dosen[nobp2]' or nobp='$dosen[nobp3]'");
              ?>
              <?php $n = 0;
              while ($d = mysqli_fetch_array($q)) { ?>
                <div class="col-lg-6" style="margin-bottom: 10px;">
                  <div class="row mhs">
                    <div class="col-md-3">
                      <img src="./../images/user/<?php echo $d['foto']; ?>" alt="" style="width: 100px;height: 100px;">
                    </div>
                    <div class="col-md-9">
                      <p><b>NIM :</b> <?php echo $d['nobp']; ?></p>
                      <p><b>Nama :</b> <?php echo strtoupper($d['nama']); ?></p>
                      <p><b>Jenis Kelamin :</b> <?php echo $d['jekel']; ?></p>
                      <p><b>Judul Laporan PKL:</b> <?php echo $d['jd_lap_pkl']; ?></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <div class="col-lg-12 ">
                        <label>Perhatian :</label>
                        <br>
                        <span><i>* Isi nilai dengan angka dari 1-100</i></span>
                      </div>

                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-lg-12 ">
                        <label>1. Nilai PKL Dospem.</label>
                        <input type="number" name="pb<?php echo $n; ?>" class="form-control" maxlength="100" value="">
                        <input type="hidden" name="nim<?php echo $n; ?>" class="form-control" maxlength="100" value="<?php echo $d['nobp']; ?>">
                      </div>
                    </div>
                  </div>
                  <br>
                </div>
              <?php $n++;
              } ?>
              <div class="col-lg-12" style="margin-bottom: 15px;">
                <div class="row">
                  <div class=" form-group">
                    <div class="col-lg-12 ">
                      <label>Upload TTD + Stempel.</label>
                      <input type="hidden" name="dosen" class="form-control" maxlength="100" value="<?= $dosen['dosen_id']; ?>">
                      <input type="file" name="ft" class="form-control" maxlength="100" value="">
                      <input type="hidden" name="no" class="form-control" maxlength="100" value="<?php echo $n; ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Nilai</button>
                  <a href="index.php?p=list-mahasiswa-belum-dinilai-dosen" class="btn btn-info"><i class="fa fa-table"></i> Data Mahasiswa</a>
                </div>
              </div>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->

</div>