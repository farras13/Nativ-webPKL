      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <h1>
                 Instansi
              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.php"> Home</a></li>
                  <li class="active">Instansi</li><br><br>
                  <a href="index.php?p=tambah-perusahaan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
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
                              <h3 class="box-title" style="margin-top: 15px;">Data Instansi</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <div class="table-responsive">
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>KD Instansi</th>
                                              <th>Nama Instansi</th>
                                              <th>Nomor Telepon</th>
                                              <th>Email</th>
                                              <th>Alamat</th>
                                              <th>Alamat Website</th>
                                              <th>Fax</th>
                                              <th>Foto</th>
                                              <th>Username</th>
                                              <th>Password</th>
                                              <th>Aksi</th>
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
                                                  <td><?php echo $q['kd_instansi']; ?></td>
                                                  <td><?php echo $q['nm_instansi']; ?></td>
                                                  <td><?php echo $q['telp']; ?></td>
                                                  <td><?php echo $q['email']; ?></td>
                                                  <td><?php echo $q['alamat']; ?></td>
                                                  <td><?php echo $q['web']; ?></td>
                                                  <td><?php echo $q['fax']; ?></td>
                                                  <td><img src="../images/user/<?php echo $q['logo']; ?>" alt="" srcset="" width="100px"></td>
                                                  <td><?php echo $q['username']; ?></td>
                                                  <td><?php echo $q['password']; ?></td>
                                                  <td>
                                                      <a href="index.php?p=edit-perusahaan&id=<?php echo $q['kd_instansi']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                      <a href="./pages/delete-perusahaan.php?id=<?php echo $q['kd_instansi']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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