<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pendaftaran PKL

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Pendaftaran PKL</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <center>
                            <h1 class="box-title">
                                <b>Pendaftaran PKL</b>
                            </h1>
                        </center>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        include '../koneksi/koneksi.php';
        
                       
                        if (isset($_POST['b1'])) {

                            if (empty($_POST['mhs']) or empty($_POST['instansi'])) {

                                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                            } else {
                                $tmpf = $_FILES['ft']['tmp_name'];
                                $nmf = $_FILES['ft']['name'];
                                move_uploaded_file($tmpf, "../file/" . $nmf);
                                $cek = mysqli_query($koneksi, "SELECT * FROM tb_penempatan WHERE nobp='$_POST[mhs]' or nobp2 = '$_POST[mhs]' or nobp3='$_POST[mhs]'");
                                $rowcount=mysqli_num_rows($cek);
                                $cek2 = mysqli_query($koneksi, "SELECT * FROM tb_penempatan WHERE nobp='$_POST[mhss]' or nobp2 = '$_POST[mhss]' or nobp3='$_POST[mhss]'");
                                $rowcount2=mysqli_num_rows($qa); 
                                $cek3 = mysqli_query($koneksi, "SELECT * FROM tb_penempatan WHERE nobp='$_POST[mhsss]' or nobp2 = '$_POST[mhsss]' or nobp3='$_POST[mhsss]'");
                                $rowcount3=mysqli_num_rows($qa); 
                                
                                if($rowcount > 0){
                                    echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                      <strong>Gagal!</strong> Mahasiswa dengan nim'. $_POST[mhs] .'sudah terdaftar !.
                                      </div>';
                                }else if($rowcount2 > 0){
                                    echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                      <strong>Gagal!</strong> Mahasiswa dengan nim'. $_POST[mhss] .'sudah terdaftar !.
                                      </div>';
                                }else if($rowcount3 > 0){
                                    echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                      <strong>Gagal!</strong> Mahasiswa dengan nim'. $_POST[mhsss] .'sudah terdaftar !.
                                      </div>';
                                }else{
                                    
                                    $sql = mysqli_query($koneksi, "INSERT INTO tb_penempatan values ('','$_POST[mhs]','$_POST[mhss]', '$_POST[mhsss]','$_POST[instansi]','','','Pending','$_POST[periode]','$_POST[tglm]','$_POST[tgls]','','$nmf','')");
                                
                                // var_dump($sql);
                                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                        <strong>Sukses!</strong> Data berhasil ditambah.
                                        </div>';
                                }
                                
                            }
                        }
                        ?>
                        <?php  
                        $qa = mysqli_query($koneksi, "SELECT * FROM tb_penempatan WHERE nobp='$id' or nobp2 = '$id' or nobp3='$id'");
                        $rowcount=mysqli_num_rows($qa); 
                        
                        if($rowcount < 1){ ?>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">

                            <form id="contactForm" action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-4 ">
                                            <label>Nama Mahasiswa</label>
                                            <select name="mhs" class="form-control">
                                                <option value="">-Pilih-</option>
                                                <?php
                                                include './../koneksi/koneksi.php';
                                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_mhs");
                                                while ($q = mysqli_fetch_array($sql)) { ?>
                                                    <option value="<?php echo $q['nobp']; ?>"><?php echo $q['nama'] . ' - ' . $q['nobp']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <div class="col-lg-4 ">
                                            <label>Nama Mahasiswa</label>
                                            <select name="mhss" class="form-control">
                                                <option value="">-Pilih-</option>
                                                <?php
                                                include './../koneksi/koneksi.php';
                                                $qa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan WHERE nobp='$id' or nobp2 = '$id' or nobp3='$id'"));
                                                $rowcount=mysqli_num_rows($qa);
                                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_mhs");
                                                while ($q = mysqli_fetch_array($sql)) { ?>
                                                    <option value="<?php echo $q['nobp']; ?>"><?php echo $q['nama'] . ' - ' . $q['nobp']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <div class="col-lg-4 ">
                                            <label>Nama Mahasiswa</label>
                                            <select name="mhsss" class="form-control">
                                                <option value="">-Pilih-</option>
                                                <?php
                                                include './../koneksi/koneksi.php';
                                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_mhs");
                                                while ($q = mysqli_fetch_array($sql)) { ?>
                                                    <option value="<?php echo $q['nobp']; ?>"><?php echo $q['nama'] . ' - ' . $q['nobp']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>Penempatan / Nama Instansi</label>
                                            <select name="instansi" class="form-control">
                                                <option value="">-Pilih-</option>
                                                <?php
                                                include './../koneksi/koneksi.php';
                                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_instansi");
                                                while ($q = mysqli_fetch_array($sql)) { ?>
                                                    <option value="<?php echo $q['kd_instansi']; ?>"><?php echo $q['nm_instansi']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>Periode</label>
                                            <input type="text" name="periode" class="form-control" maxlength="100" value="">
                                            <span> <i>* exp : 2018/2019</i></span>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>Tanggal Mulai PKL</label>
                                            <input type="text" name="tglm" class="form-control" maxlength="100" id="datepicker3" value="">
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>Tanggal Akhir PKL</label>
                                            <input type="text" name="tgls" class="form-control" maxlength="100" value="" id="datepicker4">
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>File Proposal</label>
                                            <input type="file" name="ft" class="form-control" maxlength="100">
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                        <a href="index.php?p=list-penempatan2&id=<?= $id ?>" class="btn btn-info"><i class="fa fa-table"></i> Data Penempatan</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2"></div>
                        <?php }else{ ?>
                            <center><h2> Anda Sudah Terdaftar! </h2></center>
                        <?php } ?>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->

</div>