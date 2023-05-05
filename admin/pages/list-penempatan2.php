      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Penempatan

          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">List Penempatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Penempatan</h3>
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
                          <th>File</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include './../koneksi/koneksi.php';
                        $no = 0;
                        $sql = mysqli_query($koneksi, "SELECT tb_penempatan.*,tb_mhs.nama,tb_instansi.nm_instansi FROM tb_penempatan,tb_mhs,tb_instansi where tb_mhs.nobp=tb_penempatan.nobp and tb_instansi.kd_instansi=tb_penempatan.kd_instansi and (tb_penempatan.nobp='$_GET[id]' OR tb_penempatan.nobp2 = '$_GET[id]' OR tb_penempatan.nobp3 = '$_GET[id]')");
                        while ($q = mysqli_fetch_array($sql)) {
                          $no++;
                        ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $q['nama']; ?></td>
                            <td><a href="index.php?p=list-instansi-single&idi=<?php echo $q['kd_instansi']; ?>"><?php echo strtoupper($q['nm_instansi']); ?></a></td>
                            <td><?php echo $q['periode']; ?></td>
                            <td><?php echo date("d F Y", strtotime($q['tgl_mulai_pkl'])); ?> - <?php echo date("d F Y", strtotime($q['tgl_akhir_pkl'])); ?></td>
                            <td><?php echo $q['status']; ?></td>
                            <td>
                              <a href="../file/<?= $q['proposal']; ?>">Download Proposal</a> ||
                              <?php if ($q['surat_pengantar'] != null) { ?>
                                <a href="../file/<?= $q['surat_pengantar']; ?>">Download Surat Pengantar</a>
                              <?php } else {
                                echo "Surat Pengantar masih di proses";
                              } ?>
                              
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