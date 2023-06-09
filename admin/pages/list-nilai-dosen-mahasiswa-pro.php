      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Nilai Dosen

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
                  <h3 class="box-title">Data List Nilai Dosen</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">

                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>Tempat PKL</th>
                          <th>Dosen Pembimbing</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // error_reporting(0);

                        include './../koneksi/koneksi.php';
                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_mhs,tb_instansi,tb_penempatan,tb_dosen where tb_penempatan.nobp=tb_mhs.nobp and tb_penempatan.kd_instansi=tb_instansi.kd_instansi and tb_dosen.nidn=tb_mhs.nidn_pembimbing GROUP BY `tb_mhs`.`nobp` ORDER BY `tb_mhs`.`nobp` ASC");

                        while ($q = mysqli_fetch_array($sql)) {
                          $no++;

                        ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                            <td><?php echo $q['nobp']; ?></td>
                            <td><a href="index.php?p=list-mahasiswa-single&id=<?php echo $q['nobp']; ?>"><?php echo strtoupper($q['nama']); ?></a></td>
                            <td><a href="index.php?p=list-instansi-single&idi=<?php echo $q['kd_instansi']; ?>"><?php echo strtoupper($q['nm_instansi']); ?></a></td>
                            <td><a href="index.php?p=list-dosen-single&idi=<?php echo $q['nidn']; ?>"><?php echo strtoupper($q['nm_dosen']); ?></a></td>
                            <td>
                              <a href="./pages/cetak-nilai-dosen.php?nobp=<?php echo $q['nobp']; ?>" class="btn btn-danger" target="_blank">Cetak Nilai</a>
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