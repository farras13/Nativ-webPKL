    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Penempatan

        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"> Home</a></li>
          <li class="active">Penempatan</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main row -->
        <div class="row">
          <div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Form Edit Penempatan</h3>

              </div><!-- /.box-header -->
              <div class="box-body">
                <?php
                include '../koneksi/koneksi.php';

                $id = $_GET['id'];
                error_reporting(0);
                if (isset($_POST['b1'])) {

                  if (empty($_POST['mhs']) or empty($_POST['instansi'])) {

                    echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                  } else {

                    $instansi = $_POST['instansi'];

                    $cek = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_pgw_lapangan WHERE instansi_id = '$instansi'"));
                    if ($_FILES['ft']['name'] == "") {
                      $sql = mysqli_query($koneksi, "UPDATE tb_penempatan SET nobp='$_POST[mhs]', nobp2='$_POST[mhss]', nobp3='$_POST[mhsss]', kd_instansi='$_POST[instansi]', kd_lapangan='$cek[id]', periode='$_POST[periode]', status='$_POST[status]',tgl_mulai_pkl='$_POST[tglm]',tgl_akhir_pkl='$_POST[tgls]' WHERE kd_penempatan='$id'");
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
                        move_uploaded_file($tmpf, "../file/" . $nmf);
                        $sql = mysqli_query($koneksi, "UPDATE tb_penempatan SET nobp='$_POST[mhs]', nobp2='$_POST[mhss]', nobp3='$_POST[mhsss]', kd_instansi='$_POST[instansi]', kd_lapangan='$cek[id]', periode='$_POST[periode]', status='$_POST[status]',tgl_mulai_pkl='$_POST[tglm]',tgl_akhir_pkl='$_POST[tgls]', surat_pengantar='$nmf' WHERE kd_penempatan='$id'");
                        echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <strong>Sukses!</strong> Data berhasil diedit.
                                </div>';
                      }
                    }
                  }
                }
                ?>
                <div class="col-lg-6">

                  <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                    <?php

                    $q = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan where kd_penempatan='$id'"));
                    ?>

                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Nama Mahasiswa</label>
                          <select name="mhs" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php
                            include './../koneksi/koneksi.php';
                            $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_mhs");
                            while ($q2 = mysqli_fetch_array($sql2)) { ?>
                              <option value="<?php echo $q2['nobp']; ?>" <?php if ($q2['nobp'] == $q['nobp']) echo "Selected" ?>><?php echo $q2['nama']; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Nama Mahasiswa</label>
                          <select name="mhss" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php
                            include './../koneksi/koneksi.php';
                            $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_mhs");
                            while ($q2 = mysqli_fetch_array($sql2)) { ?>
                              <option value="<?php echo $q2['nobp']; ?>" <?php if ($q2['nobp'] == $q['nobp2']) echo "Selected" ?>><?php echo $q2['nama']; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Nama Mahasiswa</label>
                          <select name="mhsss" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php
                            include './../koneksi/koneksi.php';
                            $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_mhs");
                            while ($q2 = mysqli_fetch_array($sql2)) { ?>
                              <option value="<?php echo $q2['nobp']; ?>" <?php if ($q2['nobp'] == $q['nobp3']) echo "Selected" ?>><?php echo $q2['nama']; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Penempatan / Nama Instansi</label>
                          <select name="instansi" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php
                            include './../koneksi/koneksi.php';
                            $sql3 = mysqli_query($koneksi, "SELECT * FROM tb_instansi");
                            while ($q3 = mysqli_fetch_array($sql3)) { ?>
                              <option value="<?php echo $q3['kd_instansi']; ?>" <?php if ($q3['kd_instansi'] == $q['kd_instansi']) echo "Selected" ?>><?php echo $q3['nm_instansi']; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Periode</label>
                          <input type="text" name="periode" class="form-control" maxlength="100" value="<?php echo $q['periode']; ?>">
                          <span> <i>* exp : 2018/2019</i></span>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Status</label>
                          <select name="status" id="status" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                          </select>
                        </div>

                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Tanggal Mulai PKL</label>
                          <input type="text" name="tglm" class="form-control" maxlength="100" id="datepicker3" value="<?php echo $q['tgl_mulai_pkl']; ?>">
                        </div>

                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Tanggal Akhir PKL</label>
                          <input type="text" name="tgls" class="form-control" maxlength="100" value="<?php echo $q['tgl_akhir_pkl']; ?>" id="datepicker4">
                        </div>

                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="form-group">
                        <div class="col-lg-12 ">
                          <label>Dokumen Pengantar</label>
                          <input type="file" name="ft" class="form-control" maxlength="100" id="datepicker4">
                        </div>

                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a href="index.php?p=list-penempatan" class="btn btn-info"><i class="fa fa-table"></i> Data Penempatan</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->

      </section><!-- /.content -->

    </div>