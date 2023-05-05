<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Masukan Judul Laporan PKL

    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"> Home</a></li>
      <li class="active">Judul</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Form Judul Laporan PKL</h3>

          </div><!-- /.box-header -->
          <div class="box-body">
            <?php
            include '../koneksi/koneksi.php';

            $id = $_GET['id'];

            if (isset($_POST['b1'])) {

              if (empty($_POST['jd'])) {

                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
              } else {
                $dosen = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_dosen ORDER BY RAND() LIMIT 1"));
                $pnm = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan WHERE nobp='$id'"));
                if($pnm['nobp2'] != null and $pnm['nobp3'] != null){
                  $sql4 = mysqli_query($koneksi, "UPDATE tb_penempatan SET dosen_id='$dosen[nidn]' WHERE nobp='$id' OR nobp2='$id' OR nobp3='$id'");
                  $sql = mysqli_query($koneksi, "UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', nidn_pembimbing='$dosen[nidn]' WHERE nobp='$id'");
                  $sql2 = mysqli_query($koneksi, "UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', nidn_pembimbing='$dosen[nidn]' WHERE nobp='$pnm[nobp2]'");
                  $sql3 = mysqli_query($koneksi, "UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', nidn_pembimbing='$dosen[nidn]' WHERE nobp='$pnm[nobp3]'");
                } else if ($pnm['nobp2'] != null and $pnm['nobp3'] == null) {
                  $sql = mysqli_query($koneksi, "UPDATE tb_penempatan SET dosen_id='$dosen[nidn]' WHERE nobp='$id' OR nobp2='$id' OR nobp3='$id'");
                  $sql = mysqli_query($koneksi, "UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', nidn_pembimbing='$dosen[nidn]' WHERE nobp='$id'");
                  $sql2 = mysqli_query($koneksi, "UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', nidn_pembimbing='$dosen[nidn]' WHERE nobp='$pnm[nobp2]'");
                }elseif($pnm['nobp2'] == null and $pnm['nobp3'] != null){
                  $sql = mysqli_query($koneksi, "UPDATE tb_penempatan SET dosen_id='$dosen[nidn]' WHERE nobp='$id' OR nobp2='$id' OR nobp3='$id'");
                  $sql = mysqli_query($koneksi, "UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', nidn_pembimbing='$dosen[nidn]' WHERE nobp='$id'");
                  $sql3 = mysqli_query($koneksi, "UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', nidn_pembimbing='$dosen[nidn]' WHERE nobp='$pnm[nobp3]'");
                }else{
                  $sql4 = mysqli_query($koneksi, "UPDATE tb_penempatan SET dosen_id='$dosen[nidn]' WHERE nobp='$id' OR nobp2='$id' OR nobp3='$id'");
                  $sql = mysqli_query($koneksi, "UPDATE tb_mhs SET jd_lap_pkl='$_POST[jd]', nidn_pembimbing='$dosen[nidn]' WHERE nobp='$id'");
                }
                
                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
              }
            }
            ?>

            <?php
            $mhs = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan WHERE (nobp='$_GET[id]' or nobp2='$_GET[id]' or nobp3='$_GET[id]') and status = 'Diterima' "));
            $cek = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_mhs WHERE nobp='$_GET[id]' "));
            if ($mhs != null and $cek['jd_lap_pkl'] == null) { 
            ?>
            <div class="col-lg-6">

              <form id="contactForm" action="" method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-12 ">
                      <label>Perhatian :</label>
                      <br>
                      <span><i>* Isikan Judul yang sudah di acc sama Pembimbing, karena pengimputan hanya boleh satu kali</i></span>
                    </div>

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-12 ">
                      <label>Judul Laporan PKL</label>
                      <textarea name="jd" class="form-control"></textarea>

                    </div>

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>

                  </div>
                </div>
              </form>
            </div>
            <?php }else{ ?>
              <div class="col-lg-12">
                <center><h2>Pastikan Sudah Ter Acc di Menu Penempatan</h2></center>
              </div>
            <?php } ?>

          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->

</div>