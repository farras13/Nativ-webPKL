      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  List Mahasiswa

              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.php"> Home</a></li>
                  <li class="active">List Mahasiswa</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">
              <!-- Main row -->
              <div class="row">
                  <div class="col-xs-12">

                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title">Data List Mahasiswa</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <div class="table-responsive">
                                  <table id="example1" class="table table-bordered table-striped">

                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Nama Mahasiswa</th>
                                              <th>Penempatan / Nama Instansi</th>
                                              <th>Periode</th>
                                              <th>Tanggal PKL</th>
                                              <th>Status</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                            include './../koneksi/koneksi.php';
                                            $no = 0;
                                            $sql = mysqli_query($koneksi, "SELECT tb_penempatan.*,tb_mhs.nama,tb_instansi.nm_instansi FROM tb_penempatan,tb_mhs,tb_instansi where (tb_mhs.nobp=tb_penempatan.nobp or tb_mhs.nobp=tb_penempatan.nobp2 or tb_mhs.nobp=tb_penempatan.nobp3) and tb_instansi.kd_instansi=tb_penempatan.kd_instansi and tb_penempatan.dosen_id = '$id'");
                                            while ($q = mysqli_fetch_array($sql)) {
                                                $no++;

                                            ?>
                                              <tr>
                                                  <td><?php echo $no; ?></td>
                                                  <td><?php echo $q['nama']; ?></td>
                                                  <td><?php echo $q['nm_instansi']; ?></td>
                                                  <td><?php echo $q['periode']; ?></td>
                                                  <td><?php echo date("d F Y", strtotime($q['tgl_mulai_pkl'])); ?> - <?php echo date("d F Y", strtotime($q['tgl_akhir_pkl'])); ?></td>
                                                  <td><?php
                                                        if ($q['status'] == "Pending") {

                                                            echo "<label class='label label-warning'>" . $q['status'] . "</label>";
                                                        } elseif ($q['status'] == "Diterima") {

                                                            echo "<label class='label label-success'>" . $q['status'] . "</label>";
                                                        } else {

                                                            echo "<label class='label label-danger'>" . $q['status'] . "</label>";
                                                        }
                                                        ?></td>
                                                  <td><?php echo $q['ket']; ?></td>
                                                  <td>
                                                      <a href="index.php?p=form-nilai-dosen&id=<?php echo $q['kd_penempatan']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
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