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
                        include './../koneksi/koneksi.php';
                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_mhs");

                        while ($q = mysqli_fetch_array($sql)) {
                          $no++;

                          $nobp = $q['nobp'];

                          $q1 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_nilai_dosen where nobp='$nobp'"));

                          if ($q1 == null) {
                            $ndos = 0;
                            $nins = 0;
                          } else {
                            $total1 = $q1['penguasaan_bahasa'] + $q1['kemampuan_pengembangan'] + $q1['penguasaan_kaidah'] + $q1['kelengkapan_laporan'];
                            $ndos = $total1 / 4;

                            $q2 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_nilai_instansi where nobp='$nobp'"));

                            $total2 = $q2['disiplin'] + $q2['jujur'] + $q2['sosialisasi'] + $q2['k_manajerial'] + $q2['komunikasi'] + $q2['k_komputer'] + $q2['k_tim'] + $q2['p_ilmu_penunjang'] + $q2['kwa_hasil_kerja'] + $q2['motivasi_hal_baru'];
                            $nins = $total2 / 10;

                            $nakhir = $ndos * 0.50 + $nins * 0.50;
                          }
                        ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                            <td><?php echo $q['nobp']; ?></td>
                            <td><a href="index.php?p=list-mahasiswa-single&id=<?php echo $q['nobp']; ?>"><?php echo strtoupper($q['nama']); ?></a></td>
                            <td><?php echo $nins; ?></td>
                            <td><?php echo $ndos; ?></td>
                            <td><?php echo round($nakhir); ?></td>
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