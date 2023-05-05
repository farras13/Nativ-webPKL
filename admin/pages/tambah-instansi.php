<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Pembimbing Lapangan

    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"> Home</a></li>
      <li class="active">Pembimbing Lapangan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Form Tambah Pembimbing Lapangan</h3>

          </div><!-- /.box-header -->
          <div class="box-body">
            <?php
            include '../koneksi/koneksi.php';

            $auto = rand(111111, 999999);
            $kode = "INS" . $auto;

            if (isset($_POST['b1'])) {

              if (empty($_POST['nama'])) {

                echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
              } else {

                $tmpf = $_FILES['ft']['tmp_name'];
                $nmf = $_FILES['ft']['name'];
                move_uploaded_file($tmpf, "../images/user/" . $nmf);

                $pass = md5($_POST['pass']);

                // var_dump($koneksi);
                $sql =  mysqli_query($koneksi, "INSERT INTO tb_pgw_lapangan VALUES (null, '$_POST[kd]', '$_POST[nama]', '$_POST[username]', '$pass', '$nmf')");
                var_dump($sql);
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
                      <label>KD Instansi</label>
                      <?php
                      $qa = mysqli_query($koneksi, "SELECT * FROM tb_instansi");
                      ?>
                      <select name="kd" id="kd" class="form-control">
                        <option value="">-- Select --</option>
                        <?php
                        while ($q = mysqli_fetch_array($qa)) { ?>
                          <option value="<?= $q['kd_instansi']; ?>"><?= $q['nm_instansi']; ?></option>
                        <?php }
                        ?>
                      </select>
                    </div>

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-12 ">
                      <label>Nama Pembimbing Lapangan</label>
                      <input type="text" name="nama" class="form-control" maxlength="100" value="">
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-12 ">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" maxlength="100" value="">
                    </div>

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-12 ">
                      <label>Password</label>
                      <input type="password" name="pass" class="form-control" maxlength="100" value="">
                    </div>

                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-12 ">
                      <label>Foto</label>
                      <input type="file" name="ft" class="form-control" maxlength="100" value="" placeholder="Foto">

                    </div>

                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="index.php?p=list-pembimbinglap" class="btn btn-info"><i class="fa fa-table"></i> Data Pembimbing Lapangan</a>
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