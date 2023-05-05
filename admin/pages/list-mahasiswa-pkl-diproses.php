      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Mahasiswa PKL
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">List Mahasiswa PKL</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Mahasiswa PKL</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Periode</th>
                        <th>Tanggal PKL</th>
                        <th>Status</th>
                        <th>Posisi</th>
                        <th>Keterangan Dari Instansi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tb_penempatan.*,tb_mhs.nama,tb_instansi.nm_instansi FROM tb_penempatan,tb_mhs,tb_instansi where tb_mhs.nobp=tb_penempatan.nobp and tb_instansi.kd_instansi=tb_penempatan.kd_instansi and tb_penempatan.kd_instansi='$id' and tb_penempatan.status!='Pending'");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><a href="index.php?p=list-mahasiswa-single&id=<?php echo $q['nobp']; ?>"><?php echo strtoupper($q['nama']); ?></a></td>
                        <td><?php echo $q['periode']; ?></td>
                         <td><?php echo date("d F Y",strtotime($q['tgl_mulai_pkl'])); ?> -  <?php echo date("d F Y",strtotime($q['tgl_akhir_pkl'])); ?></td>
                        <td><?php
                         if($q['status']=="Pending"){

                              echo"<label class='label label-warning'>".$q['status']."</label>";

                            }elseif($q['status']=="Diterima"){

                                 echo"<label class='label label-success'>".$q['status']."</label>";

                            }else{

                                echo "<label class='label label-danger'>".$q['status']."</label>";
                            }
                             ?></td>
                         <td><?php echo $q['posisi']; ?></td>
                          <td><?php echo $q['ket']; ?></td>
                          <td>
                            <?php if($q['status']!='Diterima'){ ?>
                          <a href="index.php?p=proses-mahasiswa&id=<?php echo $q['kd_penempatan']; ?>" class="btn btn-success">Proses</a>
                          <?php } ?>
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