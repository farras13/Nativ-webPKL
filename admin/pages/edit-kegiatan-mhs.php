<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Log Kegiatan Mahasiswa

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Dosen</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Form Edit Log Kegiatan Mahasiswa</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        include '../koneksi/koneksi.php';

                        $id = $_GET['id'];
                        $now = date('Y-m-d');
                        $q = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_log_mhs where id_log_mhs='$id'"));

                        if (isset($_POST['b1'])) {

                            if (empty($_POST['deskripsi']) or empty($_POST['judul'])) {

                                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                </div>';
                            } else {
                                
                                if ($lev == "Dosen") {
                                    if ($_FILES['ft']['name'] != "") {
                                        $tmpf = $_FILES['ft']['tmp_name'];
                                        $nmf = $_FILES['ft']['name'];
                                        move_uploaded_file($tmpf, "../images/kegiatan/" . $nmf);
                                        $sql = mysqli_query($koneksi, "UPDATE `tb_log_mhs` SET `judul_kegiatan` = '$_POST[judul]', `link` = '$_POST[link]', `kegiatan` = '$_POST[deskripsi]', batas_waktu='$_POST[bts]', `photo` = '$nmf' WHERE `tb_log_mhs`.`id_log_mhs` = '$id'");
                                    } else {
                                        $sql = mysqli_query($koneksi, "UPDATE `tb_log_mhs` SET `judul_kegiatan` = '$_POST[judul]', `link` = '$_POST[link]', `kegiatan` = '$_POST[deskripsi]', batas_waktu='$_POST[bts]' WHERE `tb_log_mhs`.`id_log_mhs` = '$id'");
                                    }
                                }else{
                                    $sql = mysqli_query($koneksi, "UPDATE `tb_log_mhs` SET `judul_kegiatan` = '$_POST[judul]', `link` = '$_POST[link]', `kegiatan` = '$_POST[deskripsi]' WHERE `tb_log_mhs`.`id_log_mhs` = '$id'");
                                }

                                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil ditambah.
                                  </div>';
                            }
                        }


                        ?>
                        <div class="col-lg-6">
                            <?php if($q['batas_waktu'] == '0000-00-00' or $now <= $q['batas_waktu']){ ?>
                            <form id="contactForm" action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>Judul</label>
                                            <input type="text" name="judul" class="form-control" maxlength="100" value="<?= $q['judul_kegiatan']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>Kegiatan</label>
                                            <textarea name="deskripsi" id="ckeditor" class="ckeditor form-control" cols="30" rows="10"><?= $q['kegiatan']; ?></textarea>
                                            <!-- <input type="text" name="nama" class="form-control" maxlength="100" value=""> -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Link Kegiatan</label>
                                            <input type="text" name="link" class="form-control" value="<?= $q['link']; ?>" placeholder="https://github.com/">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <?php if ($lev == "Dosen") { ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>Batas Waktu</label>
                                                <input type="date" name="bts" class="form-control" value="<?= $q['batas_waktu']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12 ">
                                                <label>Foto Kegiatan</label>
                                                <img src="../images/kegiatan/<?php echo $q['photo']; ?>" style="width: 250px; height: 250px;" class="img-thumbnail">
                                                <input type="file" name="ft" class="form-control" maxlength="100" value="" placeholder="Foto">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                <?php } ?>
                
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                        <a href="index.php?p=list-kegiatan-mhs&id=<?= $q['nim']; ?>" class="btn btn-info"><i class="fa fa-table"></i> Data Log Kegiatan Mahasiswa</a>
                                    </div>
                                </div>
                            </form>
                            <?php }else{ echo "<h2>Sudah Expired anda tidak dapat melakukan edit data!</h2>";} ?>
                            
                        </div>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->

</div>