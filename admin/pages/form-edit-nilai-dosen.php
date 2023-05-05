<?php
include '../koneksi/koneksi.php';
 $a=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_periode_penilaian where untuk='Dosen'"));
 $tglm=date($a['tgl_mulai']);
$tgla=date($a['batas_periode']);
$tgls=date('Y-m-d H:i:s');

if($tglm > $tgls){
  echo "<script type='text/javascript'>
    alert('Maaf Saat ini belum Periode Pemberian nilai !!');
  </script>";
  echo "<script> window.history.back(); </script>";
 
}elseif($tgla < $tgls){
  echo "<script type='text/javascript'>
    alert('Maaf anda sudah melewati batas pemberian nilai, silahkan hubungi admin prodi !!');
  </script>";
  echo "<script> window.history.back(); </script>";
 
}
else{
?>
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Nilai Untuk Dosen
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Nilai Untuk Dosen</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Nilai Untuk Dosen</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            

                            $nobp=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['pb']) or empty($_POST['kp'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Form Tidak boleh kosong.
                                  </div>';
                              }else{

                              $sql=mysqli_query($koneksi,"UPDATE tb_nilai_dosen SET penguasaan_bahasa='$_POST[pb]',kemampuan_pengembangan='$_POST[kp]',penguasaan_kaidah='$_POST[pk]',kelengkapan_laporan='$_POST[kl]' WHERE nobp='$nobp' and nidn='$id'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Nilai berhasil diedit.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-mahasiswa-sudah-dinilai-dosen>";
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT tb_mhs.* FROM tb_mhs where nobp='$_GET[id]'"));

                        $q1=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_nilai_dosen where nobp='$_GET[id]'"));
                      ?>
                        <div class="row mhs">
                          <div class="col-md-3">
                            <img src="./../images/user/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;">
                          </div>
                          <div class="col-md-9">
                            <p><b>NIM :</b> <?php echo $q['nobp']; ?></p>
                            <p><b>Nama :</b> <?php echo strtoupper($q['nama']); ?></p>
                            <p><b>Jenis Kelamin :</b> <?php echo $q['jekel']; ?></p>
                            <p><b>Judul Laporan PKL:</b> <?php echo $q['jd_lap_pkl']; ?></p>
                          </div>

                        </div>
                        <br>
                          <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Perhatian :</label>
                                <br>
                                    <span><i>* Isi nilai dengan angka dari 1-100</i></span>
                                      </div>
                                     
                                </div>
                            </div>
                          <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>1. Penguasaan Bahasa Dalam Menuangkan ide Gagasan pada Laporan PKL.</label>
                                   <input type="number" name="pb" class="form-control" maxlength="100" value="<?php echo $q1['penguasaan_bahasa']; ?>">

                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>2. Kemampuan mengembangkan dan Mempertahankan ide Selama Bimbingan.</label>
                                   <input type="number" name="kp" class="form-control" maxlength="100" value="<?php echo $q1['kemampuan_pengembangan']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>3. Penguasaan Kaidah Penulisan Laporan PKL</label>
                                   <input type="number" name="pk" class="form-control" maxlength="100" value="<?php echo $q1['penguasaan_kaidah'] ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>4. Kelengkapan Laporan PKL (Isi,Lampiran dll)</label>
                                   <input type="number" name="kl" class="form-control" maxlength="100" value="<?php echo $q1['kelengkapan_laporan']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                          
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Nilai</button>
                                    <a href="index.php?p=list-mahasiswa-sudah-dinilai-dosen" class="btn btn-info"><i class="fa fa-table"></i> Data Mahasiswa</a>
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
   <?php } ?>