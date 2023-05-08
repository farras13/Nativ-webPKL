<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah Kegiatan
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Kegiatan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Form Kegiatan</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        include '../koneksi/koneksi.php';

                        if (isset($_POST['b1'])) {


                            if (empty($_POST['deskripsi']) or empty($_POST['judul'])) {

                                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                            } else {
                                $now = date('Y-m-d');
                                $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_mhs WHERE nobp='$_GET[id]'"));
                                $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_mhs WHERE nobp='$_GET[id]'"));
                                if ($lev == "Dosen") {
                                    if ($_FILES['ft']['size'] > 5242880) {
                                        echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">×</span></button>
                                          <strong>Error!</strong> File is too large. Maximum file size is 1 MB.
                                          </div>';
                                    } else {
                                        $tmpf = $_FILES['ft']['tmp_name'];
                                        $nmf = $_FILES['ft']['name'];
                                        move_uploaded_file($tmpf, "../images/kegiatan/" . $nmf);
                                        $sql = mysqli_query($koneksi, "INSERT INTO `tb_log_mhs` (`nim`, `judul_kegiatan`, `kegiatan`, `link`, `photo`, `batas_waktu`, `tanggal`) VALUES ('$a[nobp]', '$_POST[judul]', '$_POST[deskripsi]', '$_POST[link]', '$nmf', '$_POST[bts]', '$now')");
                                    }
                                } else {
                                    $sql = mysqli_query($koneksi, "INSERT INTO `tb_log_mhs` (`nim`, `judul_kegiatan`, `kegiatan`, `link`, `photo`, `batas_waktu`, `tanggal`) VALUES ('$a[nobp]', '$_POST[judul]', '$_POST[deskripsi]', '$_POST[link]', '','','$now')");
                                }

                                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil ditambah.
                                  </div>';
                            }
                        }
                        ?>
                        <div class="col-lg-12">
                            <?php $now = strtotime(date('Y-m-d'));
                            $mhs = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_penempatan WHERE nobp='$_GET[id]' or nobp2 = '$_GET[id]' or nobp3 = '$_GET[id]'"));
                            if ($now <= strtotime($mhs['tgl_akhir_pkl'])) { ?>
                                <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12 ">
                                                <label>Judul</label>
                                                <input type="text" name="judul" class="form-control" maxlength="100" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12 ">
                                                <label>Kegiatan</label>
                                                <textarea name="deskripsi" id="ckeditor" class="ckeditor form-control" cols="30" rows="10"></textarea>
                                                <!-- <input type="text" name="nama" class="form-control" maxlength="100" value=""> -->
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>Link Kegiatan</label>
                                                <input type="text" name="link" class="form-control" placeholder="https://github.com/">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($lev == "Dosen") { ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label>Batas Waktu</label>
                                                    <input type="date" name="bts" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-lg-12 ">
                                                    <label>TTD Bimbingan</label>
                                                    <input type="file" name="ft" class="form-control" maxlength="100" value="" placeholder="Foto">
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                            <a href="index.php?p=list-kegiatan-mhs&id=<?= $_GET['id'] ?>" class="btn btn-info"><i class="fa fa-table"></i> Data Log Kegiatan</a>
                                        </div>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <center>
                                            <h2>Periode PKL Telah berakhir</h2>
                                        </center>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->

</div>