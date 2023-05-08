    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Panitia PKL

            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"> Home</a></li>
                <li class="active">Panitia PKL</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Form Edit Panitia PKL</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php
                            include '../koneksi/koneksi.php';

                            $id = $_GET['id'];

                            if (isset($_POST['b1'])) {

                                if (empty($_POST['username'])) {

                                    echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                                } else {

                                    if ($_FILES['ft']['name'] == "") {

                                        $nmf = $_POST['ft_lama'];
                                    } else {
                                        if ($_FILES['ft']['size'] > 5242880) {
                                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">×</span></button>
                                              <strong>Error!</strong> File is too large. Maximum file size is 1 MB.
                                              </div>';
                                        } else {
                                            $tmpf = $_FILES['ft']['tmp_name'];
                                            $nmf = $_FILES['ft']['name'];

                                            move_uploaded_file($tmpf, "../images/user/" . $nmf);
                                        }
                                    }

                                    if ($_POST['password'] != $_POST['password_lama']) {
                                        $pass = md5($_POST['password']);
                                    } else {
                                        $pass = $_POST['password_lama'];
                                    }

                                    $sql = mysqli_query($koneksi, "UPDATE tb_panitia SET nama='$_POST[nama]',logo='$nmf',username='$_POST[username]', password='$pass' WHERE id_panitia='$id'");


                                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                                }
                            }
                            ?>
                            <div class="col-lg-6">
                                <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                                    <?php
                                    $q = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_panitia where id_panitia='$id'"));

                                    ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12 ">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" maxlength="100" value="<?php echo $q['nama']; ?>">
                                            </div>

                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12 ">
                                                <label>Foto</label><br>
                                                <img src="./../images/user/<?php echo $q['logo']; ?>" style="width: 100px; height: 100px;" class="img-thumbnail">
                                                <input type="hidden" name="ft_lama" class="form-control" maxlength="100" value="<?php echo $q['logo']; ?>">
                                                <input type="file" name="ft" class="form-control" maxlength="100" value="">
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12 ">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" maxlength="100" value="<?php echo $q['username']; ?>">
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12 ">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" maxlength="100" value="<?php echo $q['password']; ?>">
                                                <input type="hidden" name="password_lama" class="form-control" maxlength="100" value="<?php echo $q['password']; ?>">
                                                <span><i>* Untuk mengganti Password silahkan hapus password lama isi dengan password baru</i></span>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                            <a href="index.php?p=panitia" class="btn btn-info"><i class="fa fa-table"></i> Data Panitia PKL</a>
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