      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  Pembimbing Lapangan
              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.php"> Home</a></li>
                  <li class="active">Pembimbing Lapangan</li>
              </ol>
          </section>

          <!-- Main content -->
          <section class="content">
              <!-- Main row -->
              <div class="row">
                  <div class="col-xs-12">

                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title" style="margin-top: 15px;">Data Pembimbing Lapangan</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <div class="table-responsive">
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Nama</th>
                                              <th>KD_Instansi</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                            include './../koneksi/koneksi.php';
                                            $no = 0;
                                            $sql = mysqli_query($koneksi, "SELECT tb_pgw_lapangan.*, tb_instansi.kd_instansi, tb_instansi.nm_instansi FROM tb_pgw_lapangan join tb_instansi on tb_instansi.kd_instansi = tb_pgw_lapangan.instansi_id");

                                            while ($q = mysqli_fetch_array($sql)) {
                                                $no++;
                                            ?>
                                              <tr>
                                                  <td><?php echo $no; ?></td>
                                                  <td><?php echo $q['nama']; ?></td>
                                                  <td><a href="index.php?p=list-instansi-single&idi=<?php echo $q['kd_instansi']; ?>"><?php echo strtoupper($q['nm_instansi']); ?></a></td>
                                                  <td>
                                                      <a href="index.php?p=edit-pembimbinglap&id=<?php echo $q['id']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                      <a href="./pages/del-pembimbinglap.php?id=<?php echo $q['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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