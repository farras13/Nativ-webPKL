      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  List Template
              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.php"> Home</a></li>
                  <li class="active">List Tempate</li><br><br>
                  <a href="index.php?p=tambah-template" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
              </ol>

          </section>
          <br><br>
          <!-- Main content -->
          <section class="content">
              <!-- Main row -->
              <div class="row">
                  <div class="col-xs-12">
                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title" style="margin-top: 15px;">Data List Template</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <div class="table-responsive">
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Judul</th>
                                              <th>Deskripsi</th>
                                              <th>Dokumen</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                            include './../koneksi/koneksi.php';
                                            $no = 0;
                                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_template");

                                            while ($q = mysqli_fetch_array($sql)) {
                                                $no++;
                                            ?>
                                              <tr>
                                                  <td><?php echo $no; ?></td>
                                                  <td><?php echo $q['judul']; ?></td>
                                                  <td><?php echo $q['deskripsi']; ?></td>
                                                  <td><a href="../../file/<?php echo $q['dokumen']; ?>"><?php echo $q['dokumen']; ?></a></td>
                                                  <td>
                                                      <a href="index.php?p=edt-template&id=<?php echo $q['id_template']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                      <a href="./pages/del-template.php?id=<?php echo $q['id_template']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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