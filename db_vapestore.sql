-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_vapestore
CREATE DATABASE IF NOT EXISTS `db_vapestore` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_vapestore`;

-- Dumping structure for table db_vapestore.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `satuan_barang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `satuan_harga` int DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table db_vapestore.barang: ~0 rows (approximately)
INSERT INTO `barang` (`id_barang`, `nama`, `gambar`, `satuan_barang`, `satuan_harga`, `keterangan`) VALUES
	(5, 'Liquid', '1690594195_81ebc91d9263d568fb75.png', 'pcs', 10000, 'Liquid untuk vape');

-- Dumping structure for table db_vapestore.item_transaksi_keluar
CREATE TABLE IF NOT EXISTS `item_transaksi_keluar` (
  `id_itk` int unsigned NOT NULL AUTO_INCREMENT,
  `id_tk` int unsigned DEFAULT NULL,
  `id_pembeli` int unsigned DEFAULT NULL,
  `id_barang` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id_itk`),
  KEY `id_tk` (`id_tk`),
  KEY `id_pembeli` (`id_pembeli`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `FK_item_transaksi_keluar_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  CONSTRAINT `FK_item_transaksi_keluar_transaksi_keluar` FOREIGN KEY (`id_tk`) REFERENCES `transaksi_keluar` (`id_tk`),
  CONSTRAINT `FK_item_transaksi_keluar_user` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table db_vapestore.item_transaksi_keluar: ~0 rows (approximately)

-- Dumping structure for table db_vapestore.item_transaksi_masuk
CREATE TABLE IF NOT EXISTS `item_transaksi_masuk` (
  `id_itm` int unsigned NOT NULL AUTO_INCREMENT,
  `id_tm` int unsigned DEFAULT NULL,
  `id_barang` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id_itm`),
  KEY `id_tm` (`id_tm`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `FK_item_transaksi_masuk_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  CONSTRAINT `FK_item_transaksi_masuk_transaksi_masuk` FOREIGN KEY (`id_tm`) REFERENCES `transaksi_masuk` (`id_tm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table db_vapestore.item_transaksi_masuk: ~0 rows (approximately)

-- Dumping structure for table db_vapestore.transaksi_keluar
CREATE TABLE IF NOT EXISTS `transaksi_keluar` (
  `id_tk` int unsigned NOT NULL AUTO_INCREMENT,
  `jumlah` int DEFAULT NULL,
  `total_bayar` int DEFAULT NULL,
  `status` enum('menunggu','lunas') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_tk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table db_vapestore.transaksi_keluar: ~0 rows (approximately)

-- Dumping structure for table db_vapestore.transaksi_masuk
CREATE TABLE IF NOT EXISTS `transaksi_masuk` (
  `id_tm` int unsigned NOT NULL AUTO_INCREMENT,
  `supplier` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `total_harga_beli` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id_tm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table db_vapestore.transaksi_masuk: ~0 rows (approximately)

-- Dumping structure for table db_vapestore.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenis_kelamin` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `no_hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `level` enum('admin','pelanggan','pemilik') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table db_vapestore.user: ~0 rows (approximately)
INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `alamat`, `jenis_kelamin`, `no_hp`, `level`) VALUES
	(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'Magelang', 'laki-laki', '081', 'admin'),
	(6, 'cek', '6ab97dc5c706cfdc425ca52a65d97b0d', 'cek', 'cek@gmail.com', 'cek', 'Perempuan', 'cek', 'pemilik'),
	(7, 'coba', 'c3ec0f7b054e729c5a716c8125839829', 'coba', 'coba@gmail.com', 'magelang', 'perempuan', '081', 'pelanggan');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
