-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: SIMPUSTAKA
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota`
--

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` VALUES (1,1,'rika','pamarisen','085787652315','2026-04-09');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tersedia` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (28,'9786020321111','Bumi',1,2,14,0,2014,5,5,'','1776895107_a24a28ece2e185b58192.jpg'),(29,'9786020321112','Bulan',1,2,25,0,2015,5,5,'','1776895314_520f4c05e500dc02659c.jpg'),(30,'9786020321113','Matahari',1,2,25,0,2016,5,5,'','1776895433_d2ac1606ad5e65f05f5d.jpg'),(31,'9786020321114','Hujan',1,2,25,0,2016,5,5,'','1776895513_c2736c25ebf460a4ea4e.jpg'),(32,'9786020321115','Laskar Pelangi',1,11,18,0,2005,5,5,'Cerita inspiratif anak-anak Belitung.','1776895668_0692296d0f94295d7836.jpg'),(33,'9786020321116','Sang Pemimpi',1,11,18,0,2006,5,5,'','1776895817_0d692b821ffe9bc49fee.jpg'),(34,'9786020321117','Negeri 5 Menara',1,15,25,0,2009,5,5,'','1776926970_a51d09b740f4258f3737.jpg'),(36,'9786020321118','Malioboro at Midnight ',1,21,20,0,2021,5,5,'','1776927511_1ab1ba9827ea4cf3a8f9.jpg'),(37,'9786020321119','Ayah Ini Arahnya Kemana Ya?',1,23,19,0,2018,5,5,'','1776927667_af9c423080f3ebf6b49a.jpg'),(39,'9786020321120','Dilan 1990',1,1,14,0,2014,5,5,'Kisah cinta remaja SMA yang ringan.','1776927852_991236e5dffb98f3653f.jpg'),(40,'9786020321121','Hell University',1,24,26,0,2019,5,5,'Novel misteri thriller dengan latar dunia kampus penuh rahasia.','1776928026_daac62bada6841adfffa.jpg');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_rak`
--

DROP TABLE IF EXISTS `buku_rak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku_rak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_rak`
--

LOCK TABLES `buku_rak` WRITE;
/*!40000 ALTER TABLE `buku_rak` DISABLE KEYS */;
INSERT INTO `buku_rak` VALUES (5,16,1),(6,17,1),(7,18,1),(8,20,1),(9,21,1),(10,22,1),(11,23,1),(12,24,1),(13,26,1),(14,27,11),(15,28,11),(16,29,11),(17,30,11),(18,31,11),(19,32,11),(20,33,11),(21,34,11),(22,35,11),(23,36,11),(24,37,11),(25,38,11),(26,39,11),(27,40,11);
/*!40000 ALTER TABLE `buku_rak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denda`
--

DROP TABLE IF EXISTS `denda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengembalian` int(11) NOT NULL,
  `jumlah_denda` decimal(10,2) NOT NULL,
  `status` enum('belum bayar','lunas','','') NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denda`
--

LOCK TABLES `denda` WRITE;
/*!40000 ALTER TABLE `denda` DISABLE KEYS */;
INSERT INTO `denda` VALUES (1,12,12.00,'belum bayar');
/*!40000 ALTER TABLE `denda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_peminjaman`
--

DROP TABLE IF EXISTS `detail_peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_peminjaman` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_peminjaman`
--

LOCK TABLES `detail_peminjaman` WRITE;
/*!40000 ALTER TABLE `detail_peminjaman` DISABLE KEYS */;
INSERT INTO `detail_peminjaman` VALUES (23,23,17,1),(24,23,21,1),(25,24,17,1),(26,25,21,1),(27,25,23,1);
/*!40000 ALTER TABLE `detail_peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Novel'),(5,'Sejarah'),(6,'Komik'),(7,'Pendidikan'),(8,'Teknologi'),(9,'Agama'),(10,'Bisnis'),(11,'Hukum'),(12,'Psikologi'),(13,'Sastra'),(14,'Kesehatan'),(15,'Sains'),(16,'Ekonomi'),(17,'Politik'),(18,'Pengembangan Diri');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_aktivitas`
--

DROP TABLE IF EXISTS `log_aktivitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `aktivitas` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_aktivitas`
--

LOCK TABLES `log_aktivitas` WRITE;
/*!40000 ALTER TABLE `log_aktivitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_aktivitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `denda` int(11) NOT NULL,
  `perpanjang` int(11) NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (25,1,0,'2026-04-21','2026-04-28','dipinjam',0,0);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penarikan`
--

DROP TABLE IF EXISTS `penarikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `biaya` decimal(10,2) NOT NULL,
  `status` enum('pending','diproses','selesai','dibatalkan') NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `petugas_id` int(11) NOT NULL,
  PRIMARY KEY (`id_penarikan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penarikan`
--

LOCK TABLES `penarikan` WRITE;
/*!40000 ALTER TABLE `penarikan` DISABLE KEYS */;
/*!40000 ALTER TABLE `penarikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penerbit`
--

DROP TABLE IF EXISTS `penerbit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerbit` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penerbit`
--

LOCK TABLES `penerbit` WRITE;
/*!40000 ALTER TABLE `penerbit` DISABLE KEYS */;
INSERT INTO `penerbit` VALUES (14,'Gramedia Pustaka Utama','Jakarta'),(15,'Erlangga','Jakarta'),(16,'Mizan','Bandung'),(17,'Republika','Jakarta'),(18,'Bentang Pustaka','Yogyakarta'),(19,'GagasMedia','Jakarta'),(20,'Bukune','Jakarta'),(21,'Penerbit Haru','Jakarta'),(22,'Andi Publisher','Yogyakarta'),(23,'Salemba Empat','Jakarta'),(24,'Kepustakaan Populer Gramedia','Jakarta'),(25,'Gramedia','Jakarta'),(26,'Coconut Books','Depok');
/*!40000 ALTER TABLE `penerbit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengaturan`
--

DROP TABLE IF EXISTS `pengaturan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(100) NOT NULL,
  `denda_per_hari` decimal(10,2) NOT NULL,
  `maksimal_pinjam` int(11) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2027 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaturan`
--

LOCK TABLES `pengaturan` WRITE;
/*!40000 ALTER TABLE `pengaturan` DISABLE KEYS */;
INSERT INTO `pengaturan` VALUES (1,'SIMPUSTAKA',2000.00,2,7);
/*!40000 ALTER TABLE `pengaturan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengembalian`
--

DROP TABLE IF EXISTS `pengembalian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `denda` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengembalian`
--

LOCK TABLES `pengembalian` WRITE;
/*!40000 ALTER TABLE `pengembalian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengembalian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penulis`
--

DROP TABLE IF EXISTS `penulis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penulis` varchar(100) NOT NULL,
  PRIMARY KEY (`id_penulis`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penulis`
--

LOCK TABLES `penulis` WRITE;
/*!40000 ALTER TABLE `penulis` DISABLE KEYS */;
INSERT INTO `penulis` VALUES (1,'Pidi Baiq'),(2,'Tere Liye'),(3,'Leila S. Chudori'),(11,'Andrea Hirata'),(12,'Habiburrahman El Shirazy'),(13,'Pramoedya Ananta Toer'),(14,'Dee Lestari'),(15,'Ahmad Fuadi'),(16,'Raditya Dika'),(17,'Asma Nadia'),(18,'Boy Candra'),(19,'Helvy Tiana Rosa'),(20,'KnightInBlack'),(21,'Skysphire'),(22,'Henry Manampiring'),(23,'Sabda Armandio'),(24,'Irene Dyah');
/*!40000 ALTER TABLE `penulis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` VALUES (12,123,'petugas'),(13,1234,'petugas');
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rak`
--

DROP TABLE IF EXISTS `rak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rak`
--

LOCK TABLES `rak` WRITE;
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` VALUES (9,'Rak A1','Lantai 1 - Dekat Pintu Masuk'),(10,'Rak A2','Lantai 1 - Sebelah Resepsionis'),(11,'Rak B1','Lantai 1 - Area Novel'),(12,'Rak B2','Lantai 1 - Area Sejarah'),(13,'Rak C1','Lantai 2 - Area Teknologi'),(14,'Rak C2','Lantai 2 - Area Pemrograman'),(15,'Rak D1','Lantai 2 - Area Psikologi'),(16,'Rak D2','Lantai 2 - Area Filosofi'),(17,'Rak E1','Lantai 3 - Area Referensi'),(18,'Rak E2','Lantai 3 - Gudang Buku');
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ulasan`
--

DROP TABLE IF EXISTS `ulasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_ulasan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ulasan`
--

LOCK TABLES `ulasan` WRITE;
/*!40000 ALTER TABLE `ulasan` DISABLE KEYS */;
INSERT INTO `ulasan` VALUES (1,18,2026,3,'bagus','2026-04-22 09:28:39'),(2,18,191207,5,'SERUUUU','2026-04-22 09:35:26');
/*!40000 ALTER TABLE `ulasan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','anggota','') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100317 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (123,'mutiaranurul','mutiara.nurul1474@smk.belajar.id','mutiaranurul','$2y$10$TPEQ1YNsV4a4kulRjpcUw.skqHT8K9yW0AKuCCMdYK5o6hzlig0ne','admin','1776374846_e57a2222bbc21187cdf5.jpg','aktif'),(1234,'rika','rika.apriliani85@smk.belajar.id','rika','$2y$10$FMQRdH0ecCbZZVWtN2n7/u1YZN/gr7X98Er4NG4sqDAWCXlZwmB6S','anggota','1776374860_547bb5ad8c1b7541cfc5.jpg','aktif'),(2026,'siti ','siti.uro@gmail.com','siti uroifah','$2y$10$hiGzxBCWuXQR84A0jt7pxemJHpyWG7N/KBr3B/tg0BSQ2nJsnoyL2','anggota','1776466397_52870b2714ba8690da25.jpg','aktif'),(12345,'rafa','rafa.delan19@smk.belajar.id','rafadelan','$2y$10$FMQRdH0ecCbZZVWtN2n7/u1YZN/gr7X98Er4NG4sqDAWCXlZwmB6S','petugas','1776466504_bd583c11f2b36480ba28.png','aktif'),(100313,'kamal','kamaludin10@gmail.com','kamaludin','$2y$10$TPEQ1YNsV4a4kulRjpcUw.skqHT8K9yW0AKuCCMdYK5o6hzlig0ne','anggota','1776374913_8b1bc840260cc7e147ac.png','aktif'),(100314,'lutfi','lutfiw@gmail.com','lutfiw','$2y$10$8Ivyv3Eyp/MGnUmxN048Tej26QYQ1pLwOW/OW8vNTvGBfo5moX2U6','anggota','1776466343_d98251b370e9fed448b5.jpg','aktif'),(100315,'aldi','ahmadadlul@gmail.com','ahmadadlul','$2y$10$loWVZE6S.opqryPq/Ls9oehTdXVCuRWkDb64UyUJzpQnSIbqrTNw6','anggota','1776808668_1d10016e93a044a1b9f3.jpg','aktif'),(100316,'siti','siti@gmail.com','siti','$2y$10$PpFLz13fPC0HB1UCIISSTeyC6CdydrLnExiowi6vH4PiCFLgJXjmS','petugas','1776808801_b65b7c177f2edaab32e1.jpg','aktif');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-23  0:30:38
