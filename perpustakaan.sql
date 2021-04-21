-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2020 at 01:14 PM
-- Server version: 10.2.31-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(15) NOT NULL,
  `id_aplikasi` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_aplikasi`, `username`, `password`, `foto`) VALUES
('ADM001', 'UNS01', 'administrator', 'e10adc3949ba59abbe56e057f20f883e', 'SCA-13012020004.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(50) NOT NULL,
  `id_aplikasi` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tmpt_tgl_lahir` text NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_aplikasi`, `nim`, `nama_lengkap`, `jenis_kelamin`, `tmpt_tgl_lahir`, `alamat`, `telp`, `foto`) VALUES
('UNAS-098812321', 'UNS01', '098812321', 'Faiz Hibatullah', 'Pria', 'Jakarta, 09 Oktober 1997', 'Jl. Kebagusan raya, Gg, Smp 175, rt. 11 rw. 05, Jakarta Selatan', '08998979604', 'SCA-13012020001.jpeg'),
('UNAS-123456', 'UNS01', '123456', 'Mancing Mania', 'Pria', 'Jakarta, 10 Oktober 1997', 'Jl. Pantai Indah Kapuk, Jakarta Utara', '08998979604', 'lantai.png'),
('UNAS-9987188413', 'UNS01', '9987188413', 'Talking to the moon', 'Wanita', 'Jakarta, 12 Oktober 1998', 'Jl. Kedondong belom mateng, Jakarta Utara', '083871263152', 'SCA-13012020001.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(50) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `isbn` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `th_terbit` varchar(4) NOT NULL,
  `tempat_terbit` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `lokasi_buku` varchar(50) NOT NULL,
  `jml_buku` int(11) NOT NULL,
  `tgl_input` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `isbn`, `judul`, `pengarang`, `penerbit`, `th_terbit`, `tempat_terbit`, `deskripsi`, `gambar`, `lokasi_buku`, `jml_buku`, `tgl_input`) VALUES
('UNAS- 9781783000180 ', 10, ' 9781783000180 ', 'Running Effective Marketing Meetings', 'Daniel Kuperman', 'PACKT E-BOOK', '2014', 'UK', 'A how-to guide to run marketing meetings that teach, inspire, and change how you and your team work', ' 9781783000180 .jpg', 'RAK-31', 3, 'Sat, 25-04-2020'),
('UNAS-12884001', 7, '12884001', 'C++ System Programming Cookbook', 'Onorato Vaticone', 'PACKT E-BOOK', '2020', 'London', 'C++ is the preferred language for system programming due to its efficient low-level computation, data abstraction, and object-oriented features. System programming is about designing and writing computer programs that interact closely with the underlying operating system and allow computer hardware to interface with the programmer and the user. The C++ System Programming Cookbook will serve as a reference for developers who want to have ready-to-use solutions for the essential aspects of system programming using the latest C++ standards wherever possible. ', '9781838646554-original.png', 'RAK-021', 8, 'Fri, 24-04-2020'),
('UNAS-9781788478120', 7, '9781788478120', 'C# 8.0 and .NET Core 3.0 – Modern Cross Platform', 'Mark J. Price', 'Feelo', '2019', 'London', 'In C# 8.0 and .NET Core 3.0 – Modern Cross-Platform Development, Fourth Edition, expert teacher Mark J. Price gives you everything you need to start programming C# applications.\r\n\r\nThis latest edition uses the popular Visual Studio Code editor to work across all major operating systems. It is fully updated and expanded with new chapters on Content Management Systems (CMS) and machine learning with ML.NET.\r\n\r\nThe book covers all the topics you need. Part 1 teaches the fundamentals of C#, including object-oriented programming, and new C# 8.0 features such as nullable reference types, simplified switch pattern matching, and default interface methods. Part 2 covers the .NET Standard APIs, such as managing and querying data, monitoring and improving performance, working with the filesystem, async streams, serialization, and encryption. Part 3 provides examples of cross-platform applications you can build and deploy, such as web apps using ASP.NET Core or mobile apps using Xamarin.Forms. The book introduces three technologies for building Windows desktop applications including Windows Forms, Windows Presentation Foundation (WPF), and Universal Windows Platform (UWP) apps, as well as web applications, web services, and mobile apps.', '9781788478120-original.png', 'RAK-021', 3, 'Fri, 24-04-2020'),
('UNAS-9781789955101', 10, '9781789955101', 'Mastering QuickBooks 2020', 'Crystalynn Shelton ', 'PACKT E-BOOK', '2020', 'London', 'Get up to speed with QuickBooks Online 2020 for financial management and bookkeeping', '9781789955101-original.jpeg', 'RAK-31', 4, 'Fri, 24-04-2020');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama_kategori`, `keterangan`) VALUES
(5, 'Sejarah', 'Sejarah mahluk hidup'),
(7, 'Pemograman', 'Pemograman dasar'),
(9, 'Novel', 'Novel Series'),
(10, 'Managemen Bisnis', 'Managemen Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kembali`
--

INSERT INTO `kembali` (`id_kembali`, `id_transaksi`, `tgl_kembali`, `denda`, `status`) VALUES
(19, 'UNAS-99871884132504202', '2020-04-01', 0, 'Returned'),
(20, 'UNAS-99871884132404201', '2020-04-06', 0, 'Returned'),
(21, 'UNAS-99871884132504203', '2020-04-25', 105000, 'Returned'),
(32, 'UNAS-0988123212504204', '2020-04-25', 305000, 'Returned'),
(33, 'UNAS-1234562504204', '2020-04-25', 0, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_buku` varchar(50) NOT NULL,
  `id_anggota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_buku`, `id_anggota`) VALUES
(123, 'UNAS-12884001', 'UNAS-098812321'),
(124, 'UNAS-9781788478120', 'UNAS-098812321');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_transaksi`, `tgl_pinjam`, `status`) VALUES
(21, 'UNAS-99871884132504202', '2020-03-05', 'Confirmed'),
(22, 'UNAS-99871884132404201', '2020-03-31', 'Confirmed'),
(23, 'UNAS-99871884132504203', '2020-03-31', 'Confirmed'),
(29, 'UNAS-0988123212504204', '2020-02-20', 'Confirmed'),
(30, 'UNAS-1234562504204', '2020-04-25', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_aplikasi` varchar(50) NOT NULL,
  `nama_aplikasi` varchar(50) NOT NULL,
  `sub_id` varchar(15) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `max_hari` int(11) NOT NULL,
  `jml_denda` int(11) NOT NULL,
  `max_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_aplikasi`, `nama_aplikasi`, `sub_id`, `instansi`, `logo`, `max_hari`, `jml_denda`, `max_pinjam`) VALUES
('UNS01', 'PERPUSTAKAAN UNAS', 'UNAS', 'Universitas Nasional', 'logo-unas3.png', 4, 5000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `id_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_transaksi`, `id_anggota`, `id_buku`) VALUES
(157, 'UNAS-99871884132404201', 'UNAS-9987188413', 'UNAS- 9781783000180 '),
(158, 'UNAS-99871884132404201', 'UNAS-9987188413', 'UNAS-12884001'),
(159, 'UNAS-99871884132504202', 'UNAS-9987188413', 'UNAS-9781788478120'),
(160, 'UNAS-99871884132504203', 'UNAS-9987188413', 'UNAS-12884001'),
(161, 'UNAS-0988123212504204', 'UNAS-098812321', 'UNAS- 9781783000180'),
(162, 'UNAS-0988123212504204', 'UNAS-098812321', 'UNAS-12884001'),
(163, 'UNAS-1234562504204', 'UNAS-123456', 'UNAS-12884001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim`, `password`) VALUES
('08998979604', 'e10adc3949ba59abbe56e057f20f883e'),
('098812321', 'e10adc3949ba59abbe56e057f20f883e'),
('123456', 'e10adc3949ba59abbe56e057f20f883e'),
('9987188413', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `nama_aplikasi` (`id_aplikasi`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `email` (`nim`),
  ADD KEY `id_aplikasi` (`id_aplikasi`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`) USING BTREE;

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_aplikasi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kembali`
--
ALTER TABLE `kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_aplikasi`) REFERENCES `setting` (`id_aplikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_aplikasi`) REFERENCES `setting` (`id_aplikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kembali`
--
ALTER TABLE `kembali`
  ADD CONSTRAINT `kembali_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
