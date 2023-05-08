-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2023 at 06:24 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkljtimy_db_si_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_administrator`
--

INSERT INTO `tb_administrator` (`id_admin`, `username`, `password`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'DWP-preview-1-0a1e420c2bfe24b8266da02aec93c060.gif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_adm_prodi`
--

CREATE TABLE `tb_adm_prodi` (
  `kd_prodi` int(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_adm_prodi`
--

INSERT INTO `tb_adm_prodi` (`kd_prodi`, `nama`, `jekel`, `alamat`, `username`, `password`, `email`, `foto`) VALUES
(5, 'Rendi', 'Laki-laki', 'Jl. Semeru No 11 Malang, Jawa Timur', 'rendi', 'd209fc47646bba5e5fdc3d3bbaad4b9c', 'prodi@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `deskripsi`, `tanggal`) VALUES
(2, 'PRAKTEK KERJA LAPANGAN', '<p>Diinformasikan bahwa Sabtu tgl 9 April akan dilakukan semhas PKL.&nbsp;Adapun yg perlu disiapkan adalah:</p><p>1. PPT untuk presentasi selama 10 menit (7 menit presentasi, 3 menit tanya jawab)<br />2. Form nilai yang akan disubmit di link yang akan diberikan hari ini<br />3. Jas Almamater, dasi, dan kemeja putih serta bawahan hitam meskipun akan dilaksanakan secara online.</p>', '2022-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nidn` varchar(15) NOT NULL,
  `nm_dosen` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nidn`, `nm_dosen`, `jekel`, `alamat`, `telp`, `email`, `username`, `password`, `foto`) VALUES
('0001', 'Fitria Husada', 'Perempuan', 'Tulungagung', '081256348999', 'fitria@gmail.com', 'fitria', 'ef208a5dfcfc3ea9941d7a6c43841784', ''),
('0002', 'Hendry Sulistio', 'Perempuan', 'Surabaya', '081287365901', 'hendry@gmail.com', 'hendry', 'f4dfad803df83144a5be86d9bca87678', ''),
('0003', 'Tri Wahyuni', 'Perempuan', 'Bogor', '082452187666', 'tri@gmail.com', 'tri', 'd2cfe69af2d64330670e08efb2c86df7', ''),
('0004', 'Eddie Munson', 'Laki-laki', 'Hawkins', '087634219873', 'eddie@gmail.com', 'eddie', 'b67733c3e4ddc0633ddb2531e3a51ec9', ''),
('0005', 'Steve Harington', 'Laki-laki', 'Bandung', '082137373470', 'steve@gmail.com', 'steve', 'd69403e2673e611d4cbd3fad6fd1788e', ''),
('0006', 'M. Yusuf H', 'Laki-laki', 'Malang', '085237040235', 'mchyus@gmail.com', 'yusuf', 'dd2eb170076a5dec97cdbbbbff9a4405', 'Logo_Kota_Malang_color.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `kd_instansi` varchar(15) NOT NULL,
  `nm_instansi` varchar(35) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `web` text NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_instansi`
--

INSERT INTO `tb_instansi` (`kd_instansi`, `nm_instansi`, `telp`, `fax`, `email`, `alamat`, `web`, `deskripsi`, `logo`, `username`, `password`) VALUES
('INS404292', 'Shopee', '085123456789', '+6212345', 'shopee@gmail.com', 'Singapura', 'www.shopee.co.id', '', 'Shopee Logo PNG Vector (SVG) Free Download.png', 'shopee', '430a317dcbfb1a83c98bcf6762cd0ab0'),
('INS567941', 'Heaven Club', '083846294610', '+423 176 388', 'bintar.putra4077@gmail.com', 'Jl. Manyar Sabrangan IX No 50, Manyar Sabrangan', 'www.heavenclub.com', '', 'IMG_6316.JPG', 'heaven.club', '49634f03bfdb5482999fa9ae6af291ab'),
('INS848872', 'PT Izza Tech Tbk', '082137373470', '61263', 'izzarafi7@gmail.com', 'DS. BAKALAN WRINGINPITU RT09 RW01, BALONGBENDO 61263, SIDOARJO, JAWA TIMUR.', 'https://tokopedia.link/izzaraff', '', '2022-02-06 06.39.31 1.jpg', 'IzzaRafi', '33d3393db6cd0e671bae6966e0ae2c75'),
('INS883583', 'PT PAMA PERSADA KALTIM', '085345678901', '+6223456', 'pamapersada@gmail.com', 'Kalimantan Timur', 'www.pamapersada.com', '', '', 'pama', '3fe23fd2b13eb96923c7e9c2486c3bfb'),
('INS926960', 'Muizul Corp', '087803824712', '+ 4739 133 987', 'muizulcorp@gmail.com', 'Jln. Istana No IX, Kec. Arthajaya', 'www.muizulcorp.co.id', '', 'OIP.jpg', 'muizulcorp', '58e540634b130e21ee142e16c6cac192');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_mhs`
--

CREATE TABLE `tb_log_mhs` (
  `id_log_mhs` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `judul_kegiatan` varchar(100) NOT NULL,
  `kegiatan` text NOT NULL,
  `link` text NOT NULL,
  `photo` text NOT NULL,
  `batas_waktu` date NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_log_mhs`
--

INSERT INTO `tb_log_mhs` (`id_log_mhs`, `nim`, `judul_kegiatan`, `kegiatan`, `link`, `photo`, `batas_waktu`, `tanggal`) VALUES
(18, '1931710131', 'Menjadi content writer', '<p>Menulis konten di dalam website</p>', '', '', '2022-08-14', '2022-07-13'),
(22, '1931130003', 'Pemantauan lingkungan tambang', '<p>Memantau lingkungan di sekitar tambang bersama pembimbing mitra</p>', '', '', '0000-00-00', '2022-07-13'),
(23, '1931130003', 'Perbaikan alat tambang', '<p>Melakukan perbaikan pada alat tambang yang rusak</p>', '', '', '0000-00-00', '2022-07-13'),
(24, '1931710160', 'Buat website', '<p>Membuat halaman awal</p>', '', '', '0000-00-00', '2022-07-13'),
(32, '1932610018', 'Menulis laporan keuangan', '<p>Membuat dokumen excel</p>', '', '', '0000-00-00', '2022-07-13'),
(36, '1931710131', 'Membuat webiste', '<p>Membuat website dengan menggunakan framework laravel</p>', '', '', '0000-00-00', '2022-07-13'),
(37, '1931710002', 'testing', '<p>mencoba testing web</p>', 'https://www.youtube.com/watch?v=azyaGKf9A5M&ab_channel=PopVibes', '', '0000-00-00', '2022-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `nobp` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nidn_pembimbing` varchar(15) NOT NULL,
  `jd_lap_pkl` text,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `periode` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`nobp`, `nama`, `jekel`, `agama`, `alamat`, `telp`, `email`, `tgl_lahir`, `nidn_pembimbing`, `jd_lap_pkl`, `username`, `password`, `foto`, `periode`) VALUES
('1098877798', 'Habib Ubaidillah', '', '', '', '0999888009', 'habib@ubai.com', '0000-00-00', '0005', 'Sistem Informasi PKL', 'habib', '1391921ec73a2f5dff54e075bbda7487', '', ''),
('1931130003', 'Narulitha Henry Hawalia', 'Perempuan', 'Islam', 'jl senggani no.18', '085706616803', 'narulitha17@gmail.com', '2002-04-18', '0006', 'Pengelolaan dan Pemantauan Lingkungan Kerja di Sektor Pertambangan', 'narulithaaa', 'def8ec131efe78396b3205b064a204ff', 'WhatsApp Image 2022-07-12 at 22.39.47.jpeg', '2021/2022'),
('1931130049', 'Tiara Widya Elfareta', '', '', '', '081297775023', 'tiarawidyae@gmail.com', '0000-00-00', '0006', 'Pengelolaan dan Pemantauan Lingkungan Kerja di Sektor Pertambangan', 'tiaraelfareta', 'cd786950f7eb917d0a024c4eae2d0994', '', ''),
('1931310044', 'Deoxys', 'Perempuan', 'Islam', '', '021344142', 'deoxys38@yahoo.com', '1952-07-30', '', '', 'deoxys', '25d55ad283aa400af464c76d713c07ad', 'default.jpg', ''),
('1931410008', 'Nimas Qusnul Khotimah ', '', '', '', '085731085408', 'qusnulnimas@gmail.com', '0000-00-00', '', '', 'Nimas Qusnul ', '0ad5e57774d2ddeb5e25175dd73ebc00', '', ''),
('1931410035', 'Taris Wina', '', '', '', '085259237839', 'tariswinarahmawati@gmail.com', '0000-00-00', '0004', 'Pengaruh Jenis Alkohol terhadap Tingkat Kesadaran ', 'tariswr', 'd23b274a19fc98398af72c058a96bc5e', '', ''),
('1931410090', 'Jihan', '', '', '', '085790831532', 'jihannoorazizah14@gmail.com', '0000-00-00', '0004', 'Pengaruh Jenis Alkohol terhadap Tingkat Kesadaran ', 'Jihan', 'a9253f3552d4d7765bdb7537690bb4df', '', ''),
('1931410157', 'Adenia Aulia Hapsari', 'Perempuan', 'Islam', 'Disini', '087819606611', 'adeniaaulia99@gmail.com', '2000-08-14', '0004', 'Pengaruh Jenis Alkohol terhadap Tingkat Kesadaran ', 'adenia', '306e727e39e9e7a7e85e995f4969f036', 'pre-aromatic content.jpeg', '2022/2023'),
('1931710002', 'Yuni Rose', '', '', '', '081332299586', 'Imyunirose@gmail.com', '0000-00-00', '0005', 'Sistem Informasi PKL', 'rose', 'fcdc7b4207660a1372d0cd5491ad856e', '', ''),
('1931710131', 'Tia Wahyu Eka Ningsih', 'Perempuan', 'Islam', 'Blitar', '085748813742', 'tiawahyueka35@gmail.com', '2001-04-11', '0004', 'Kisah Matcha dan Taro', 'tia', 'e7292d5ba58672ce7f6fc3c0b646ab63', 'tia.jpg', '2021/2022'),
('1931710160', 'Yuni Rose Amara Devi', 'Perempuan', 'Islam', 'Jalan Papan Dayan no 40, RT.001, RW.002 Desa Kauman, Kecamatan Kauman 66261', '+628133229958', 'ydevi149@gmail.com', '2000-06-01', '0006', 'Sistem Informasi Online Invoice Service', 'yuni', '6b9d6ba55e4f27b1eb5ab5ca05d160a4', 'yumeko.jpg', '2021/2022'),
('1932610018', 'Meirani Wahyuniarum', '', '', '', '085708374903', 'meirani.1605@gmail.com', '0000-00-00', '0006', 'Pengelolaan dan Pemantauan Lingkungan Kerja di Sektor Pertambangan', 'meirani.1605', 'a5e7ec1242360bdb2d95d086dd126dd2', 'IMG_20220625_084339.jpg', ''),
('1932610146', 'Elsyah', 'Perempuan', '', 'Perumahan Mutiara Jingga Residence', '082233972045', 'elsyahchurinin49@gmail.com', '2001-03-07', '', '', 'Elsyah', 'fe30a9e732d7571d8261025037795620', '1932610146.jpg', '2021/2022'),
('2019101403', 'Audisyach Effendi Putra', '', '', '', '081333583441', 'audisyaheffendi@gmail.com', '0000-00-00', '', '', 'Audisyah13', 'ea5fd36dd6936015491ed0adf3ee4ff5', '', ''),
('2041320004', 'Alfian Wardhana', 'Laki-laki', 'Islam', 'Jln. Suren, Kota Blitar', '082331769691', 'wardhanaalfian25@gmail.com', '2001-05-25', '0004', 'Kisah Matcha dan Taro', 'AlfianWardhana', '483087fff9714eea7c76ddceae3a4507', 'IMG-20220708-WA0046.jpg', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_panitia`
--

CREATE TABLE `tb_panitia` (
  `id_panitia` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_panitia`
--

INSERT INTO `tb_panitia` (`id_panitia`, `nama`, `username`, `password`, `logo`) VALUES
(2, 'Rini Sulistyawati', 'rini', 'b86872751de1e13c142d050acfd09842', 'Logo Polinema (Politeknik Negeri Malang).png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penempatan`
--

CREATE TABLE `tb_penempatan` (
  `kd_penempatan` int(11) NOT NULL,
  `nobp` varchar(15) NOT NULL,
  `nobp2` varchar(15) DEFAULT NULL,
  `nobp3` varchar(15) DEFAULT NULL,
  `kd_instansi` varchar(15) NOT NULL,
  `dosen_id` varchar(100) NOT NULL,
  `kd_lapangan` varchar(100) NOT NULL,
  `status` enum('Pending','Diterima','Ditolak') NOT NULL DEFAULT 'Pending',
  `periode` varchar(25) NOT NULL,
  `tgl_mulai_pkl` date NOT NULL,
  `tgl_akhir_pkl` date NOT NULL,
  `ket` text,
  `proposal` text NOT NULL,
  `surat_pengantar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penempatan`
--

INSERT INTO `tb_penempatan` (`kd_penempatan`, `nobp`, `nobp2`, `nobp3`, `kd_instansi`, `dosen_id`, `kd_lapangan`, `status`, `periode`, `tgl_mulai_pkl`, `tgl_akhir_pkl`, `ket`, `proposal`, `surat_pengantar`) VALUES
(29, '2041320004', '1931710131', '', 'INS848872', '0004', '12', 'Diterima', '2021/2022', '2022-07-14', '2022-08-14', '', 'template_proposal.pdf', 'SURAT PENGANTAR.pdf'),
(31, '1931410008', '', '', 'INS404292', '', '14', 'Diterima', '2022/2023', '2022-07-12', '2022-09-10', '', 'Summary Revisi Laporan Akhir Adeni dan Jihan.docx', 'SURAT PENGANTAR.pdf'),
(32, '1931130003', '1931130049', '1932610018', 'INS883583', '0006', '15', 'Diterima', '2021/2022', '2022-07-17', '2023-01-17', '', 'template_proposal.pdf', 'SURAT PENGANTAR.pdf'),
(33, '1931710160', '', '', 'INS926960', '0006', '13', 'Diterima', '2021/2022', '2022-07-12', '2022-09-12', '', 'template_proposal.pdf', 'SURAT PENGANTAR.pdf'),
(34, '1932610146', '', '', 'INS883583', '', '15', 'Diterima', '2021/2022', '2021-06-21', '2021-08-21', '', 'PROPOSAL PKL ELSYAH.pdf', 'template_proposal.pdf'),
(35, '1931310044', '', '', 'INS404292', '', '', 'Pending', '2019', '2022-07-13', '2022-07-14', '', 'Curriculum Vitae Tia.docx', ''),
(36, '11', '', '', 'INS404292', '0005', '14', 'Diterima', '2021/2022', '2022-07-14', '2022-07-28', '', '', ''),
(37, '1931710002', '1098877798', '', 'INS404292', '0005', '14', 'Diterima', '2021/2022', '2022-08-01', '2022-09-01', '', 'File Laporan Akhir_new.pdf', 'File Laporan Akhir_new.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id` int(11) NOT NULL,
  `nim` int(15) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `pemlap_id` int(15) NOT NULL,
  `nilai_angka_dospem` int(20) NOT NULL,
  `nilai_angka_pemlap` int(20) NOT NULL,
  `nilai_abjad_dospem` varchar(5) NOT NULL,
  `nilai_abjad_pemlap` varchar(5) NOT NULL,
  `foto` text NOT NULL,
  `foto_lap` text NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id`, `nim`, `nip`, `pemlap_id`, `nilai_angka_dospem`, `nilai_angka_pemlap`, `nilai_abjad_dospem`, `nilai_abjad_pemlap`, `foto`, `foto_lap`, `created`) VALUES
(13, 1931710131, 'NULL', 12, 95, 85, 'A', 'A', 'haikyuu fly.jpg', '', '2022-07-13'),
(14, 2041320004, 'NULL', 12, 95, 98, 'A', 'A', 'haikyuu fly.jpg', '', '2022-07-13'),
(15, 1931710160, 'NULL', 13, 0, 100, 'NULL', 'A', 'NULL', 'ttd ku.jpg', '2022-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pgw_lapangan`
--

CREATE TABLE `tb_pgw_lapangan` (
  `id` int(11) NOT NULL,
  `instansi_id` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pgw_lapangan`
--

INSERT INTO `tb_pgw_lapangan` (`id`, `instansi_id`, `nama`, `username`, `password`, `foto`) VALUES
(11, 'INS567941', 'Bintar Putra', 'bintar', 'cf80a88e8c5563d28c4918fa07902901', ''),
(12, 'INS848872', 'Izza Rafi', 'izza', '4b569f5568af7aea0bd5b56c8267d22c', ''),
(13, 'INS926960', 'Muizul Fajar', 'fajar', '24bc50d85ad8fa9cda686145cf1f8aca', ''),
(14, 'INS404292', 'Siti Maimunah', 'siti', 'db04eb4b07e0aaf8d1d477ae342bdff9', ''),
(15, 'INS883583', 'Roni Subardi', 'roni', 'd78b154c99fe7f06ebc02ebd63d1c87c', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_template`
--

CREATE TABLE `tb_template` (
  `id_template` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `dokumen` text NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_template`
--

INSERT INTO `tb_template` (`id_template`, `judul`, `deskripsi`, `dokumen`, `created`, `modified`) VALUES
(9, 'Template Proposal ', 'Silakan mengunduh template proposal Laporan Akhir ', 'template_proposal.pdf', '2022-07-12', '2022-07-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_adm_prodi`
--
ALTER TABLE `tb_adm_prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`kd_instansi`);

--
-- Indexes for table `tb_log_mhs`
--
ALTER TABLE `tb_log_mhs`
  ADD PRIMARY KEY (`id_log_mhs`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`nobp`);

--
-- Indexes for table `tb_panitia`
--
ALTER TABLE `tb_panitia`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indexes for table `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  ADD PRIMARY KEY (`kd_penempatan`),
  ADD KEY `kd_instansi` (`kd_instansi`),
  ADD KEY `nobp` (`nobp`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pgw_lapangan`
--
ALTER TABLE `tb_pgw_lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_template`
--
ALTER TABLE `tb_template`
  ADD PRIMARY KEY (`id_template`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_adm_prodi`
--
ALTER TABLE `tb_adm_prodi`
  MODIFY `kd_prodi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_log_mhs`
--
ALTER TABLE `tb_log_mhs`
  MODIFY `id_log_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_panitia`
--
ALTER TABLE `tb_panitia`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  MODIFY `kd_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pgw_lapangan`
--
ALTER TABLE `tb_pgw_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_template`
--
ALTER TABLE `tb_template`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penempatan`
--
ALTER TABLE `tb_penempatan`
  ADD CONSTRAINT `tb_penempatan_ibfk_1` FOREIGN KEY (`kd_instansi`) REFERENCES `tb_instansi` (`kd_instansi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_penempatan_ibfk_2` FOREIGN KEY (`nobp`) REFERENCES `tb_mhs` (`nobp`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
