<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <?php if ($lev == "Prodi") { ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php

              $sql4 = mysqli_query($koneksi, "SELECT * FROM tb_penempatan");
              $q4 = mysqli_num_rows($sql4);
              ?>
              <h3><?php echo $q4; ?></h3>
              <p>Penempatan PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <a href="index.php?p=list-penempatan" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
      <?php } elseif ($lev == "Instansi") { ?>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <h3>Mahasiswa</h3>
              <p>PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="index.php?p=list-penempatan" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->

      <?php } elseif ($lev == "Dosen") { ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
              include "../koneksi/koneksi.php";
              date_default_timezone_set("Asia/Jakarta");

              $sql = mysqli_query($koneksi, "SELECT * FROM tb_mhs where nidn_pembimbing='$id'");
              $q = mysqli_num_rows($sql);
              ?>
              <h3>Menu</h3>
              <p>Mahasiswa Bimbingan</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="index.php?p=list-mahasiswa-bimbingan" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php

              $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_nilai_dosen where nidn='$id'");
              $q2 = mysqli_num_rows($sql2);
              ?>
              <h3>Menu</h3>
              <p>Nilai Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <a href="index.php?p=list-mahasiswa-sudah-dinilai-dosen" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
              $sql3 = mysqli_query($koneksi, "SELECT * FROM tb_nilai_instansi,tb_mhs where tb_mhs.nidn_pembimbing='$id' and tb_nilai_instansi.nobp=tb_mhs.nobp");
              $q3 = mysqli_num_rows($sql3);
              ?>
              <h3>Menu</h3>
              <p>Log Kegiatan PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <!-- <a href="index.php?p=list-mahasiswa-nilai-instansi" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a> -->
            <a href="index.php?p=list-kegiatan-mhs&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
      <?php } elseif ($lev == "Administrator") { ?>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
              include "../koneksi/koneksi.php";
              date_default_timezone_set("Asia/Jakarta");

              $sql = mysqli_query($koneksi, "SELECT * FROM tb_mhs");
              $q = mysqli_num_rows($sql);
              ?>
              <h3><?php echo $q; ?></h3>
              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="index.php?p=list-mahasiswa" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
              $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_panitia");
              $q2 = mysqli_num_rows($sql2);
              ?>
              <h3><?php echo $q2; ?></h3>
              <p>Panitia PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?p=panitia" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
              $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_dosen");
              $q2 = mysqli_num_rows($sql2);
              ?>
              <h3><?php echo $q2; ?></h3>
              <p>Dosen</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?p=list-dosen" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
              $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_pgw_lapangan");
              $q2 = mysqli_num_rows($sql2);
              ?>
              <h3><?php echo $q2; ?></h3>
              <p>Pembimbing Lapangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?p=list-pembimbinglap" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
              $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_adm_prodi");
              $q2 = mysqli_num_rows($sql2);
              ?>
              <h3><?php echo $q2; ?></h3>
              <p>Admin Prodi</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?p=list-prodi" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->




      <?php } elseif ($lev == "Lapangan") { ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
              include "../koneksi/koneksi.php";
              date_default_timezone_set("Asia/Jakarta");

              $sql = mysqli_query($koneksi, "SELECT * FROM tb_penempatan");
              $q = mysqli_num_rows($sql);
              ?>
              <h3>Menu</h3>
              <p>Mahasiswa PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="index.php?p=list-penempatan" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Menu</h3>
              <p>Log Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <?php
            $pemlap = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_pgw_lapangan where id = '$id'"));
            $penempatan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan where kd_instansi = '$pemlap[instansi_id]'"));
            ?>
            <a href="index.php?p=list-kegiatan-mhs&id=<?= $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Menu</h3>
              <p>Penilaian Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <?php
            $pemlap = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_pgw_lapangan where id = '$id'"));
            $penempatan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan where kd_instansi = '$pemlap[instansi_id]'"));
            ?>
            <a href="index.php?p=form-nilai-instansi" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
      <?php } elseif ($lev == "Panitia") { ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

              <h3>Menu</h3>
              <p>Dosen Pembimbing</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?p=list-dosen" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Menu</h3>
              <p>Pembimbing Lapangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?p=list-pembimbinglap" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

              <h3>Menu</h3>
              <p>Mahasiswa PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?p=list-mahasiswa" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Menu</h3>
              <p>Penempatan PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <a href="index.php?p=list-penempatan&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <?php } else { ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <h3>Menu</h3>
              <p>Biodata</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="index.php?p=edit-mahasiswa2&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">

              <h3>Menu</h3>
              <p>Dosen Pembimbing</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?p=list-dosen-single2&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

              <h3>Menu</h3>
              <p>Penempatan PKL</p>
            </div>
            <div class="icon">
              <i class="fa fa-building-o"></i>
            </div>
            <a href="index.php?p=list-penempatan2&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

              <h3>Menu</h3>
              <p>Nilai Akhir</p>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <a href="index.php?p=list-nilai-akhir-mahasiswa-pro2&id=<?php echo $id; ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
      <?php } ?>

    <?php if ($lev == "Mahasiswa" || $lev == "Panitia") { ?>
      <div class="row">
        <!-- berita -->
        <?php
        $tmp = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_template limit 1"));
        ?>
        <div class="col-md-12">
          <a href="../file/<?= $tmp['dokumen']; ?>" class="btn btn-primary" style="margin-bottom: 15px; width: 100%;"><i class="fa fa-save"></i> Download Template Proposal</a>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="margin: 10px;"><b>BERITA TERKINI</b< /h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <?php
              include './../koneksi/koneksi.php';
              $no = 0;
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_berita");
              while ($q = mysqli_fetch_array($sql)) {
                $no++;
              ?>
                <div class="panel panel-default" style="background-color: #3db7e4;">
                  <div class="panel-body">
                    <h4><b><?php echo $q['judul']; ?></b></h4>
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <p><?php echo $q['deskripsi']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div><!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- list Perusahaan -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="margin: 10px;"><b>List Perusahaan</b< /h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive" style="margin: 10px;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Perusahaan</th>
                      <th>Alamat</th>
                      <th>Deskripsi</th>
                      <th>Email</th>
                      <th>Telepon</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include './../koneksi/koneksi.php';
                    $no = 0;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_instansi");
                    while ($q = mysqli_fetch_array($sql)) {
                      $no++;
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['nm_instansi']; ?></td>
                        <td><?php echo $q['alamat']; ?></td>
                        <td><?php echo $q['deskripsi']; ?></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['telp']; ?></td>
                        <!-- list Perusahaan -->
                      </tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    <?php } ?>
</div>
</section><!-- /.content -->
</div>