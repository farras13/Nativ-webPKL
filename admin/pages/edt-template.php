<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Template

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Template</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Form Edit Template</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        include '../koneksi/koneksi.php';

                        if (isset($_POST['b1'])) {
                            $id = $_GET['id'];

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

                                    move_uploaded_file($tmpf, "../file/" . $nmf);
                                }
                            }

                            $now = date('Y-m-d');
                            $sql = mysqli_query($koneksi, "UPDATE tb_template SET judul='$_POST[judul]', deskripsi='$_POST[desk]', dokumen='$nmf', modified='$now' WHERE id_template='$id'");

                            echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil ditambah.
                                  </div>';
                        }

                        ?>
                        <div class="col-lg-6">
                            <?php
                            $q = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_template where id_template='$_GET[id]'"));
                            ?>
                            <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>Judul</label>
                                            <input type="text" name="judul" class="form-control" maxlength="100" value="<?php echo $q['judul']; ?>">
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>Deskripsi</label>
                                            <textarea name="desk" class="form-control"><?php echo $q['deskripsi']; ?></textarea>

                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 ">
                                            <label>File Template</label>
                                            <a href="./../file/<?php echo $q['dokumen']; ?>" style="width: 100px; height: 100px;" class="img-thumbnail"><?php echo $q['dokumen']; ?></a>
                                            <input type="hidden" name="ft_lama" class="form-control" maxlength="100" value="<?php echo $q['dokumen']; ?>">
                                            <input type="file" name="ft" class="form-control" maxlength="100" value="">
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                        <a href="index.php?p=list-template" class="btn btn-info"><i class="fa fa-table"></i> Data Template</a>
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