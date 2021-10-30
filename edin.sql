-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 03:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edin`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_user` varchar(10) NOT NULL,
  `id_artikel` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar` varchar(20) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_user`, `id_artikel`, `judul`, `isi_artikel`, `gambar`, `waktu`) VALUES
('admin00001', 'art0000001', 'Hadang Tipu-tipu Online, e-Commerce Mau Diakreditasi', '<p><strong>Jakarta</strong>&nbsp;- Pemerintah mulai serius membenahi industri e-commerce di Indonesia agar bisa lebih aman dan nyaman. Dengan demikian, hal itu bisa memuluskan misi agar valuasi transaksi jual beli online di negeri ini menembus USD 130 miliar di 2020 mendatang.&nbsp;<br />\r\n<br />\r\nSalah satu wacana untuk membuat e-commerce jadi aman dan nyaman adalah dengan adanya akreditasi untuk perusahaan e-commerce. Tujuannya agar meminimalisir aksi penipuan saat jual beli online.<br />\r\n<br />\r\nMenteri Komunikasi dan Informatika Rudiantara pun berharap, adanya akreditasi e-commerce ini semata-mata bertujuan untuk perlindungan bagi konsumer. Dan untuk proses akreditasi tersebut, semua akan diserahkan kepada asosiasi e-commerce.<br />\r\n<br />\r\n&quot;Proses akreditasi ini juga untuk<em>&nbsp;consumer protection.</em>&nbsp;Nanti prosesnya seperti apa, kita serahkan saja ke asosiasi terkait. Biarkan mereka yang&nbsp;<em>self</em>&nbsp;regulated,&quot; ujarnya saat ditemui di sela Indonesia e-Commerce Summit &amp; Expo di Serpong, Rabu (27/4/2016).<br />\r\n<br />\r\nSementara itu, ditemui di tempat yang sama, Ketua Umum Indonesia e-Commerce Association (idEA) Daniel Tumiwa, berujar, jika akreditasi yang akan diminta oleh pemerintah sudah 80% disiapkan. Ada beberapa syarat yang mesti dilakukan oleh perusahaan e-commerce baru untuk mendapatkan akreditasi.<br />\r\n<br />\r\n&quot;Salah satu syarat utama untuk bisa mendapatkan akreditasi adalah&nbsp;<em>consumer protection</em>. Salah satu contoh<em>consumer protection</em>&nbsp;itu<em>&nbsp;customer service.</em>&nbsp;Bagaimana pelayanan&nbsp;<em>customer service&nbsp;</em>dan soal sekuritinya,&quot; jelas Daniel.<br />\r\n<br />\r\nDaniel menambahkan, selain itu juga, syaratnya adalah mendapatkan rekomendasi dari member idEA. Misalnya saja, ada perusahan e-commerce baru, jika mereka ingin mendapatkan akreditasi, maka mereka harus memiliki koneksi member idEA.<br />\r\n<br />\r\n&quot;Jadi intinya berdasarkan dari rekomendasi member idEA. Itu kalau korporat. Untuk individual kita juga bisa agar mereka menjadi member idEA yang individu. Per bulannya itu Rp 200 ribu. Tapi, setiap bulan mesti kita rutin untuk mengeceknya,&quot; jelasnya.&nbsp;<strong>(rou/ash)</strong>&nbsp;</p>\r\n', 'art0000001.jpeg', '2021-05-29 12:16:17'),
('admin00001', 'art0000002', '<i>Wow</i>! Counter-Strike 1.6 Bisa Dimainkan di Smartwatch', '<p><strong>Jakarta</strong>&nbsp;- Penggunaan Android Wear memang belum sepopuler smartphone atau tablet. Meski demikian, perangkat wearable ini tak kalah menarik untuk dijadikan platform bermain Counter-Strike 1.6.<br />\r\n<br />\r\nDiperkenalkan pertama kali pada Maret 2014 lalu, smartwatch Android Wear memiliki fungsi utama sebagai fitness tracker. Dua tahun kemudian, wearable gadget ini nyatanya tak hanya berfungsi sebagai fitness tracker, tapi juga platfrom gaming.<br />\r\n<br />\r\nAdalah Dave Bennett, seorang developer merangkap gamer yang berhasil memainkan game classic shooter Valve itu ke dalam perangkat yang lebih mungil bahkan dari smartphone sekalipun. Semua itu dilakukannya menggunakan LG G Watch.<br />\r\n<br />\r\nDikutip&nbsp;<strong>detikINET&nbsp;</strong>dari&nbsp;<em>Phone Arena,</em>&nbsp;Rabu (27/4/2016), untuk bisa memainkan Counter-Strike 1.6, yang dibutuhkan adalah aplikasi Xash3D. Aplikasi ini memungkinkan salinan game Windows seperti Counter-Strike 1.6 untuk berjalan di perangkat Android Wear.&nbsp;<br />\r\n<br />\r\nMeski sukses dijalankan di perangkat Android Wear, bermain Counter-Strike 1.6 dengan lancar sepertinya mustahil. Dengan ukuran layar yang sempit, tentu akan membatasi ruang gerak dan kontrol pemain.<br />\r\n<br />\r\nSebelumnya, seorang developer berhasil meng-convert Counter-Strike 1.6 untuk perangkat smartphone Android. Namun, tetap saja game ini lebih asyik dimainkan melalui platform PC ketimbang smartphone apalagi Android Wear.</p>', 'art0000002.jpg', '2021-05-29 12:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `bergabung`
--

CREATE TABLE `bergabung` (
  `id_grupbelajar` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bergabung`
--

INSERT INTO `bergabung` (`id_grupbelajar`, `id_user`) VALUES
('g743293049', 'u362641497'),
('g114658966', 'u551310936');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_grup` varchar(10) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id_user` varchar(10) NOT NULL,
  `id_diskusi` varchar(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `topik` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id_user`, `id_diskusi`, `judul`, `topik`, `waktu`) VALUES
('u254660021', 'd000000001', 'Footer PHP tidak bisa turun ke bawah', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae vitae dignissimos dicta impedit deleniti voluptas fugiat veniam architecto eaque rem quos, aliquam minima nisi ullam, facilis doloremque? Enim aspernatur eaque velit, nihil labore eligendi voluptatibus aut exercitationem iure, obcaecati earum doloribus, beatae reiciendis sit pariatur doloremque porro maiores quam rem?', '2021-06-01 09:52:56'),
('u362641497', 'd000000002', 'aku tidak tau', 'loren apa kah kamu tau apa yang akan kamu lakukan kepadaku hingga akhirnya aku tidak tau', '2021-06-01 10:35:50'),
('u551310936', 'f860893804', 'anjay la', 'kenapa gak bisa', '2021-06-01 12:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_user` varchar(10) NOT NULL,
  `id_faq` varchar(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grup_belajar`
--

CREATE TABLE `grup_belajar` (
  `id_grupbelajar` varchar(10) NOT NULL,
  `id_guru` varchar(10) NOT NULL,
  `nama_grupbelajar` varchar(20) NOT NULL,
  `mapel` varchar(20) NOT NULL,
  `instansi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grup_belajar`
--

INSERT INTO `grup_belajar` (`id_grupbelajar`, `id_guru`, `nama_grupbelajar`, `mapel`, `instansi`) VALUES
('g114658966', 'u551310936', 'IBU UDIN ADA', 'b inggris', 'sellong'),
('g743293049', 'u362641497', 'MAN 2 MATARAM', 'b inggris', 'sellong');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_user` varchar(10) NOT NULL,
  `sekolah` varchar(30) NOT NULL,
  `jenjang` enum('SMA/SMK/MA/sederajat','SMP/MTs/sederajat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_user`, `sekolah`, `jenjang`) VALUES
('u362641497', 'SMAN 1 Selong', 'SMA/SMK/MA/sederajat'),
('u551310936', 'SMAN 1 Mataram', 'SMA/SMK/MA/sederajat');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` varchar(10) NOT NULL,
  `id_diskusi` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_diskusi`, `id_user`, `komentar`, `waktu`) VALUES
('k000000001', 'd000000001', 'u254660021', 'anjay kali la peroslan ini', '2021-06-01 10:48:02'),
('k000000002', 'd000000001', 'u362641497', 'ini komentar kedua ku', '2021-06-01 10:48:02'),
('k000000003', 'd000000002', 'u362641497', 'ini diskusi di sebelah', '2021-06-01 10:54:11'),
('k000000004', 'd000000002', 'u254660021', 'kakmvret la', '2021-06-01 10:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_user` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` varchar(10) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `judul_materi` varchar(10) NOT NULL,
  `isi_materi` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `id_user` varchar(10) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `jenjang` enum('SMA/SMK/MA/sederajat','SMP/MTs/sederajat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`id_user`, `sekolah`, `jenjang`) VALUES
('u254660021', 'SMAN 1 Selong', 'SMA/SMK/MA/sederajat');

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id_tugas` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_grup` varchar(10) NOT NULL,
  `konten` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_grupbelajar` varchar(10) NOT NULL,
  `id_tugas` varchar(10) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto_profil` varchar(20) DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `foto_profil`, `role`) VALUES
('admin00001', 'Uno', 'admin@gmail.com', 'admin', NULL, 1),
('u254660021', 'adyan', 'adyan@gmail.com', 'a', 'noimg.png', 3),
('u362641497', 'audiadyan', 'a@gmail.com', 'a', 'noimg.png', 2),
('u551310936', 'audi', 'audi@gmail.com', 'a', '60ac9308dcfd0.jpeg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bergabung`
--
ALTER TABLE `bergabung`
  ADD KEY `gabung_grup` (`id_grupbelajar`),
  ADD KEY `gabung_user` (`id_user`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD KEY `chat_grup` (`id_grup`),
  ADD KEY `chat_user` (`id_user`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD KEY `disk_user` (`id_user`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`,`id_user`),
  ADD KEY `faq_user` (`id_user`);

--
-- Indexes for table `grup_belajar`
--
ALTER TABLE `grup_belajar`
  ADD PRIMARY KEY (`id_grupbelajar`),
  ADD KEY `grup_user` (`id_guru`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `komen_disk` (`id_diskusi`),
  ADD KEY `komen_user` (`id_user`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `mapel_user` (`id_user`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `materi_mapel` (`id_mapel`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD KEY `kumpul_tugas` (`id_tugas`),
  ADD KEY `kumpul_user` (`id_user`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD KEY `peng_grup` (`id_grup`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `tugas_grup` (`id_grupbelajar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `bergabung`
--
ALTER TABLE `bergabung`
  ADD CONSTRAINT `gabung_grup` FOREIGN KEY (`id_grupbelajar`) REFERENCES `grup_belajar` (`id_grupbelajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gabung_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_grup` FOREIGN KEY (`id_grup`) REFERENCES `grup_belajar` (`id_grupbelajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `disk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `grup_belajar`
--
ALTER TABLE `grup_belajar`
  ADD CONSTRAINT `grup_user` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komen_disk` FOREIGN KEY (`id_diskusi`) REFERENCES `diskusi` (`id_diskusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komen_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mapel_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD CONSTRAINT `pel_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD CONSTRAINT `kumpul_tugas` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kumpul_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `peng_grup` FOREIGN KEY (`id_grup`) REFERENCES `grup_belajar` (`id_grupbelajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_grup` FOREIGN KEY (`id_grupbelajar`) REFERENCES `grup_belajar` (`id_grupbelajar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
