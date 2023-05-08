 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar" style="">
   <!-- Sidebar user panel -->
   <div class="user-panel">
     <div class="pull-left image">
       <img src="../images/user/<?php echo $foto; ?>" class="img-rounded" alt="User Image">
     </div>
     <div class="pull-left info">
       <p><?php echo $nama; ?></p>
       <a href="#"><i class="fa fa-users text-success"></i> <?php echo $lev; ?></a>
     </div>
   </div>

   <!-- sidebar menu: : style can be found in sidebar.less -->
   <ul class="sidebar-menu">

     <li class="treeview" style="border-top: 1px solid #c8c8cb !important;  ">
       <a href="index.php">
         <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
     </li>

     <?php if ($lev == "Mahasiswa") {
        include './../koneksi/koneksi.php';
        $qa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_mhs WHERE nobp='$id'"));
      ?>
       <li class="treeview">
         <a href="index.php?p=edit-mahasiswa2&id=<?php echo $id; ?>">
           <i class="fa fa-user"></i>
           <span>Biodata</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>

       </li>
       <?php if (empty($qa['jd_lap_pkl'])) { ?>
         <li class="treeview">
           <a href="index.php?p=form-judul-lap-pkl&id=<?php echo $id; ?>">
             <i class="fa fa-files-o"></i>
             <span>Judul Laporan PKL</span>
             <i class="fa fa-angle-left pull-right"></i>
           </a>

         </li>
       <?php } ?>
       <li class="treeview">
         <a href="index.php?p=list-pendaftaran&id=<?php echo $id; ?>">
           <i class="fa fa-map-marker"></i>
           <span>Pendaftaran PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
       <li class="treeview">
         <a href="index.php?p=list-penempatan2&id=<?php echo $id; ?>">
           <i class="fa fa-map-marker"></i>
           <span>Penempatan PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
       <li class="treeview">
         <a href="index.php?p=list-dosen-single2&id=<?php echo $id; ?>">
           <i class="fa fa-users"></i>
           <span>Dosen Pembimbing</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-files-o"></i>
           <span>Log Kegiatan PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=tambah-kegiatan-mhs&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i>Tambah Log Kegiatan</a></li>
           <li><a href="index.php?p=list-kegiatan-mhs&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i> Log Kegiatan</a></li>
         </ul>
       </li>
       <!-- <li class="treeview">
         <a href="#">
           <i class="fa fa-files-o"></i>
           <span>Nilai</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=list-nilai-instansi-mahasiswa-pro2&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i> Nilai Dari Instansi</a></li>
           <li><a href="index.php?p=list-nilai-dosen-mahasiswa-pro2&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i> Nilai Dari Dosen</a></li>
         </ul>
       </li> -->
       <li class="treeview">
         <a href="pages/cetak-nilai-akhir.php?nobp=<?php echo $id; ?>">
           <i class="fa fa-files-o"></i>
           <span>Nilai Akhir Mahasiswa</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>

       </li>

     <?php } elseif ($lev == "Dosen") { ?>
       <li class="treeview">
         <a href="index.php?p=list-mahasiswa-bimbingan">
           <i class="fa fa-users"></i>
           <span>Mahasiswa</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
       <li class="treeview">
         <a href="">
           <i class="fa fa-files-o"></i>
           <span>Log Kegiatan PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=list-kegiatan-mhs&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i> Log Kegiatan</a></li>
         </ul>
       </li>
       <li class="treeview">
         <a href="index.php?p=list-nilai-dosen&id=<?php echo $id; ?>">
           <i class="fa fa-files-o"></i>
           <span>Beri Nilai Mhs</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
     <?php } elseif ($lev == "Instansi") { ?>
       <li class="treeview">
         <a href="index.php?p=list-penempatan">
           <i class="fa fa-users"></i>
           <span>Mahasiswa PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
     <?php } elseif ($lev == "Panitia") { ?>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-building-o"></i>
           <span>Pembimbing Lapangan</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=tambah-instansi"><i class="fa fa-circle-o"></i> Tambah Pembimbing </a></li>
           <li><a href="index.php?p=list-pembimbinglap"><i class="fa fa-circle-o"></i> Data Pembimbing</a></li>
         </ul>
       </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-user"></i>
           <span>Dosen</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=tambah-dosen"><i class="fa fa-circle-o"></i> Tambah Dosen </a></li>
           <li><a href="index.php?p=list-dosen"><i class="fa fa-circle-o"></i> Data Dosen</a></li>

         </ul>
       </li>
       <li class="treeview">
         <a href="index.php?p=list-kegiatan-mhs">
           <i class="fa fa-calendar"></i>
           <span>Log Mahasiswa</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-files-o"></i>
           <span>Berita</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=berita-tambah"><i class="fa fa-circle-o"></i> Tambah Berita</a></li>
           <li><a href="index.php?p=berita"><i class="fa fa-circle-o"></i> List Berita</a></li>
         </ul>
       </li>
       <li class="treeview">
         <a href="index.php?p=list-template">
           <i class="fa fa-file"></i>
           <span>Template Surat</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
       <li class="treeview">
         <a href="./pages/cetak-st.php">
           <i class="fa fa-file"></i>
           <span>Cetak Surat Tugas</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>

     <?php } elseif ($lev == "Prodi") { ?>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-map-marker"></i>
           <span>Penempatan PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=list-penempatan"><i class="fa fa-circle-o"></i> Data Penempatan</a></li>
         </ul>
       </li>
     <?php } elseif ($lev == "Lapangan") { ?>

       <li class="treeview">
         <a href="index.php?p=list-penempatan">
           <i class="fa fa-users"></i>
           <span>Mahasiswa PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
        
       </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-files-o"></i>
           <span>Log Kegiatan PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=list-kegiatan-mhs&id=<?php echo $id; ?>"><i class="fa fa-circle-o"></i> Log Kegiatan</a></li>
         </ul>
       </li>
       <!-- <li class="treeview">
         <a href="#">
           <i class="fa fa-files-o"></i>
           <span>Penilaian Mhs PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=list-mahasiswa-belum-dinilai"><i class="fa fa-circle-o"></i> Mhs Belum Diberi Nilai </a></li>
           <li><a href="index.php?p=list-mahasiswa-sudah-dinilai"><i class="fa fa-circle-o"></i> Mhs Sudah Diberi Nilai</a></li>

         </ul>
       </li> -->
       <li class="treeview">
         <a href="index.php?p=form-nilai-instansi">
           <i class="fa fa-calendar"></i>
           <span>Penilaian Mhs PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>

     <?php } else { ?>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-users"></i>
           <span>Mahasiswa</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=tambah-mahasiswa"><i class="fa fa-circle-o"></i> Tambah Mahasiswa </a></li>
           <li><a href="index.php?p=list-mahasiswa"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
         </ul>
       </li>
       <li class="treeview">
         <a href="#">
           <i class="fa fa-user"></i>
           <span>Dosen</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=tambah-dosen"><i class="fa fa-circle-o"></i> Tambah Dosen </a></li>
           <li><a href="index.php?p=list-dosen"><i class="fa fa-circle-o"></i> Data Dosen</a></li>
         </ul>
       </li>

       <li class="treeview">
         <a href="#">
           <i class="fa fa-building-o"></i>
           <span>Data Perusahaan</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=tambah-perusahaan"><i class="fa fa-circle-o"></i> Tambah Perusahaan </a></li>
           <li><a href="index.php?p=list-instansi"><i class="fa fa-circle-o"></i> Data Perusahaan</a></li>
         </ul>
       </li>

       <li class="treeview">
         <a href="#">
           <i class="fa fa-building-o"></i>
           <span>Pembimbing Lapangan</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
           <li><a href="index.php?p=tambah-instansi"><i class="fa fa-circle-o"></i> Tambah Pembimbing </a></li>
           <li><a href="index.php?p=list-pembimbinglap"><i class="fa fa-circle-o"></i> Data Pembimbing</a></li>
         </ul>
       </li>

       <li class="treeview">
         <a href="index.php?p=list-prodi">
           <i class="fa fa-building-o"></i>
           <span>Admin Prodi</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>

       <li class="treeview">
         <a href="index.php?p=panitia">
           <i class="fa fa-building-o"></i>
           <span>Panitia PKL</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li>
       <!-- <li class="treeview">
         <a href="index.php?p=list-periode">
           <i class="fa fa-calendar"></i>
           <span>Periode Penilaian</span>
           <i class="fa fa-angle-left pull-right"></i>
         </a>
       </li> -->



     <?php } ?>
   </ul>
 </section>
 <!-- /.sidebar -->