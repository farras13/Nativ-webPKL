      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                  Admin Prodi / Jurusan
              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.php"> Home</a></li>
                  <li class="active">Admin Prodi / Jurusan</li><br><br>
                  <a href="index.php?p=tambah-prodi" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
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
                              <h3 class="box-title" style="margin-top: 15px;">Data Admin Prodi / Jurusan</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <div class="table-responsive">
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Nama</th>
                                              <th>Gender</th>
                                              <th>Alamat</th>
                                              <th>email</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                            include './../koneksi/koneksi.php';
                                            $no = 0;
                                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_adm_prodi");

                                            while ($q = mysqli_fetch_array($sql)) {
                                                $no++;
                                            ?>
                                              <tr>
                                                  <td><?php echo $no; ?></td>
                                                  <td><?php echo $q['nama']; ?></td>
                                                  <td><?php echo $q['jekel']; ?></td>
                                                  <td><?php echo $q['alamat']; ?></td>
                                                  <td><?php echo $q['email']; ?></td>
                                                  <td>
                                                      <a href="index.php?p=edit-prodi&id=<?php echo $q['kd_prodi']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                      <a href="./pages/delete-prodi.php?id=<?php echo $q['kd_prodi']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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