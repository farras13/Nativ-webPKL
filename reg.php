<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/logopolinema.png" />
    <title>Sistem Informasi Manajemen PKL Politeknik Negeri Malang</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/skins/_all-skins.min.css">
    <style type="text/css">
        .btn-primary {
            background-color: #3ABDD1;
            border-color: #3ABDD1;
        }

        .btn-primary.active.focus,
        .btn-primary.active:focus,
        .btn-primary.active:hover,
        .btn-primary.focus:active,
        .btn-primary:active:focus,
        .btn-primary:active:hover,
        .open>.dropdown-toggle.btn-primary.focus,
        .open>.dropdown-toggle.btn-primary:focus,
        .open>.dropdown-toggle.btn-primary:hover {
            color: #fff;
            background-color: #3ABDD1;
            border-color: #3ABDD1;
        }

        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary.hover {
            background-color: #3ABDD1;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="col-md-6">
        <p style="margin-top: 30px;"></p>

        <div class="login-logo">
            <img src="images/logo2polinema.png" alt="" />
        </div>
        <!-- /.login-logo -->
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')">London</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">REGISTRASI MAHASISWA PKL</p>
            <?php
            include './koneksi/koneksi.php';

            if (isset($_POST['b1'])) {

                //  $auto=rand(11111,99999);
                // $_POST['kd']="KS".$auto;

                if (empty($_POST['telp']) or empty($_POST['nama'])) {

                    echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                } else {

                    $pass = md5($_POST['password']);

                    $sql = mysqli_query($koneksi, "INSERT INTO tb_mhs values ('$_POST[nobp]','$_POST[nama]','','','','$_POST[telp]','$_POST[email]','','','','$_POST[username]','$pass','','')");


                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Registrasi Berhasil Silahkan login dengan Username dan password yang anda daftarkan.
                                  </div>';
                }
            }
            ?>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="NIM" name="nobp" required="">

                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nama" name="nama" required="">

                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nomor Telepon" name="telp" required="">

                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="email" name="email" required="">

                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username" required="">

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="">

                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>

                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" name="b1" class="btn btn-info btn-block btn-flat">Mendaftar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.login-box-body -->
        </div>
    </div>
    <div class="col-md-6">
        <p style="margin-top: 230px;"></p>
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Login Disini</p>

                <p class="login-box-msg">
                    <a href="login.php" class="btn btn-info btn-block btn-flat">LOGIN</a>
                </p>
                <p class="login-box-msg">Mahasiswa / Pembimbing Lapangan / Dosen / Administrator</p>
                <!-- /.col -->
            </div>


        </div>
        <!-- /.login-box-body -->

    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="js/jquery-1.10.2.min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
</body>

</html>