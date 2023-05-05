      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Nilai Akhir

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
                  <h3 class="box-title">Data List Nilai Akhir</h3>
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
                          <th>Nilai Instansi</th>
                          <th>Nilai Dosen</th>
                          <th>Nilai Akhir</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        error_reporting(0);
                        include './../koneksi/koneksi.php';
                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_mhs where nobp='$_GET[id]'");

                        while ($q = mysqli_fetch_array($sql)) {
                          $no++;

                          $nobp = $q['nobp'];

                          $q = mysqli_fetch_array(mysqli_query($koneksi, "SELECT *, tb_mhs.foto as profile FROM tb_mhs,tb_penilaian WHERE tb_mhs.nobp = tb_penilaian.nim AND tb_mhs.nobp = '$nobp'"));
                          
                        ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><img src="./../images/user/<?= $q['profile']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                            <td><?php echo $q['nobp']; ?></td>
                            <td><a href="index.php?p=list-mahasiswa-single&id=<?php echo $q['nobp']; ?>"><?php echo strtoupper($q['nama']); ?></a></td>
                            <td><?php echo $q['nilai_angka_pemlap']; ?></td>
                            <td><?php echo $q['nilai_angka_dospem']; ?></td>
                    
                            <td><?php echo round(($q['nilai_angka_dospem'] + $q['nilai_angka_pemlap']) / 2); ?></td>
                            <td>
                              <a href="./pages/cetak-nilai-akhir.php?nobp=<?php echo $q['nobp']; ?>" class="btn btn-danger" target="_blank">Cetak Nilai Akhir</a>

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