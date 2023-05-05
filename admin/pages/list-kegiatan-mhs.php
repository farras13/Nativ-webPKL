      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  Log Kegiatan
              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.php"> Home</a></li>
                  <li class="active">Log Kegiatan</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">
              <!-- Main row -->
              <div class="row">
                  <div class="col-xs-12">

                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title" style="margin-top: 15px;">Data Log Kegiatan</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <?php error_reporting(0);
                                if ($_GET['id'] != null and $lev == "Mahasiswa") { ?>
                                  <div class="text-right"><a class="btn btn-primary" href="./pages/cetak-log-kegiatan.php?nobp=<?php echo $_GET['id']; ?>" style="margin-bottom: 30px;">CETAK PDF</a></div>
                              <?php } ?>
                              <div class="table-responsive">
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>NIM</th>
                                              <th>Judul Kegiatan</th>
                                              <th>Deskripsi Kegiatan</th>
                                              <th>URL</th>
                                              <th>Tanggal</th>
                                              <th>Batas Perbaikan</th>
                                              <th>TTD</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                            include './../koneksi/koneksi.php';
                                            $no = 0;
                                            
                                            if ($lev == "Mahasiswa") {
                                                if ($_GET['id'] != null) {
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_log_mhs where nim = '$_GET[id]'");
                                                } else {
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_log_mhs");
                                                }
                                            } else if ($lev == "Dosen") {
                                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_log_mhs join tb_mhs on tb_log_mhs.nim = tb_mhs.nobp where tb_mhs.nidn_pembimbing = '$_GET[id]' ");
                                            } else if ($lev == "Lapangan") {
                                                var_dump($levl);
                                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_log_mhs, tb_penempatan WHERE (tb_log_mhs.nim = tb_penempatan.nobp OR tb_log_mhs.nim = tb_penempatan.nobp2 OR tb_log_mhs.nim = tb_penempatan.nobp3) AND tb_penempatan.kd_lapangan = '$id' ");
                                            }else{
                                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_log_mhs, tb_penempatan WHERE tb_log_mhs.nim = tb_penempatan.nobp OR tb_log_mhs.nim = tb_penempatan.nobp2 OR tb_log_mhs.nim = tb_penempatan.nobp3");
                                            }

                                            while ($q = mysqli_fetch_array($sql)) {
                                                $no++;
                                            ?>
                                              <tr>
                                                  <td><?php echo $no; ?></td>
                                                  <td><?php echo $q['nim']; ?></td>
                                                  <td><?php echo $q['judul_kegiatan']; ?></td>
                                                  <td><?php echo $q['kegiatan']; ?></td>
                                                  <td><?php if ($q['link'] != null) { ?>
                                                          <a href="<?= $q['link']; ?>">LINK</a>
                                                      <?php } else {
                                                            echo "-";
                                                        } ?>
                                                  </td>
                                                  <td><?php echo date('d F Y', strtotime($q['tanggal'])); ?></td>
                                                  <?php if ($q['batas_waktu'] != "0000-00-00") { ?>
                                                      <td><?php echo date('d F Y', strtotime($q['batas_waktu'])); ?></td>
                                                  <?php } else {
                                                        echo "<td>-</td>";
                                                    } ?>
                                                  <?php if ($q['photo'] != null or $q['photo'] != "") { ?>
                                                      <td><img src="../images/kegiatan/<?php echo $q['photo']; ?>" width="250px"></td>
                                                  <?php } else {
                                                        echo "<td>-</td>";
                                                    } ?>
                                                  <td>
                                                      <?php if ($lev == "Mahasiswa") { ?>
                                                          <a href="./pages/cetak-log-kegiatan.php?nobp=<?php echo $q['nim']; ?>" class="btn btn-info"><i class="fa fa-file"></i></a>
                                                      <?php } ?>
                                                      <a href="index.php?p=edit-kegiatan-mhs&id=<?php echo $q['id_log_mhs']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                      <a href="./pages/delete-kegiatan-mhs.php?id=<?php echo $q['id_log_mhs']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                  </td>
                                              </tr>
                                          <?php } ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div><!-- /.box-body -->
                      </div><!-- /.box -->
                  </div><!-- /.col -->
              </div><!-- /.row -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->