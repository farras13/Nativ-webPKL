<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah Berita

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Berita</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Form Tambah Berita</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        include '../koneksi/koneksi.php';

                        if (isset($_POST['b1'])) {

                            //  $auto=rand(11111,99999);
                            // $_POST['kd']="KS".$auto;

                            if (empty($_POST['deskripsi']) or empty($_POST['judul'])) {

                                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                            } else {
                                $now = date('Y-m-d');
                                $sql = mysqli_query($koneksi, "INSERT INTO `tb_berita` (`judul`, `deskripsi`, `tanggal`) VALUES ('$_POST[judul]', '$_POST[deskripsi]', '$now')");

                                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil ditambah.
                                  </div>';
                            }
                        }
                        ?>
                        <div class="col-lg-6">

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
                                            <label>Isi Berita</label>
                                            <textarea name="deskripsi" id="ckedtor" class="ckeditor form-control" cols="30" rows="10"></textarea>
                                            <!-- <input type="text" name="nama" class="form-control" maxlength="100" value=""> -->
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                        <a href="index.php?p=berita" class="btn btn-info"><i class="fa fa-table"></i> Data Berita</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->

</div>