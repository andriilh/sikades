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


-- Dumping database structure for db_sikades
CREATE DATABASE IF NOT EXISTS `db_sikades` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_sikades`;

-- Dumping structure for table db_sikades.login
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_user` enum('sekertaris','lurah','masyarakat') NOT NULL,
  `status_keaktifan` enum('aktif','tidak aktif') NOT NULL DEFAULT 'tidak aktif',
  PRIMARY KEY (`id_login`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.login: ~23 rows (approximately)
INSERT INTO `login` (`id_login`, `id_user`, `username`, `password`, `status_user`, `status_keaktifan`) VALUES
	(7, 'SK001', 'RiskaS', 'riska125', 'sekertaris', 'aktif'),
	(11, 'MSY-20221028215638', 'indra123', 'indra123', 'masyarakat', 'aktif'),
	(12, 'L001', 'lurah123', 'lurah123', 'lurah', 'aktif'),
	(13, 'MSY-2022117213740', 'irwan123', 'irwan123', 'masyarakat', 'aktif'),
	(17, 'MSY-2022118133354', 'puji123', 'puji123', 'masyarakat', 'aktif'),
	(18, 'MSY-2022118195428', 'iu32862378', 'iu32862378', 'masyarakat', 'aktif'),
	(19, 'MSY-2022118202023', '17111000', '17111000', 'masyarakat', 'aktif'),
	(20, 'MSY-20221110145459', '9281672862821', '9281672862821', 'masyarakat', 'aktif'),
	(24, 'MSY-2022111017531', 'yuyu123', 'yuyu123', 'masyarakat', 'aktif'),
	(25, 'MSY-20221124105949', 'faisal', 'faisal268', 'masyarakat', 'aktif'),
	(26, 'MSY-2022121392627', 'Riska', 'riska125', 'sekertaris', 'aktif'),
	(27, 'MSY-2023220191911', '3072892323', '3072892323', 'masyarakat', 'aktif'),
	(28, 'MSY-202343064238', '1344789', '1344789', 'masyarakat', 'aktif'),
	(29, 'MSY-2023529192051', 'salsa', 'salsa125', 'masyarakat', 'aktif'),
	(30, 'MSY-2023529192838', 'hopid', 'hopid125', 'masyarakat', 'aktif'),
	(31, 'MSY-202362843229', 'udin', 'udin123', 'masyarakat', 'aktif'),
	(32, 'MSY-20236281190', 'aminah', 'aminah123', 'masyarakat', 'aktif'),
	(33, 'MSY-202371223546', 'ilham', 'ilham123', 'masyarakat', 'aktif'),
	(34, 'MSY-202381011233', 'tono123', 'tono123', 'masyarakat', 'tidak aktif'),
	(35, 'MSY-202381013523', 'indraa', 'indraa', 'masyarakat', 'tidak aktif'),
	(36, 'MSY-202381013745', 'indraaa', 'indraaa', 'masyarakat', 'tidak aktif'),
	(37, 'MSY-202381219164', '3072892323', '3072892323', 'masyarakat', 'aktif'),
	(38, 'MSY-2023812211812', '879791723', '879791723', 'masyarakat', 'aktif');

-- Dumping structure for table db_sikades.lurah
CREATE TABLE IF NOT EXISTS `lurah` (
  `id_lurah` varchar(20) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `nama_lurah` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Protestan','Katholik','Hindu','Budha') NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_lurah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.lurah: ~1 rows (approximately)
INSERT INTO `lurah` (`id_lurah`, `NIK`, `nama_lurah`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `no_hp`, `email`, `alamat`) VALUES
	('L001', '289563469', 'Pak BUdi', 'Perempuan', 'bandung 24', '1999-08-17', 'Islam', '0814837687342', 'lurah12783578@gmail.com', 'Jakarta pasar senin rt 2345');

-- Dumping structure for table db_sikades.masyarakat
CREATE TABLE IF NOT EXISTS `masyarakat` (
  `id_masyarakat` varchar(20) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `nama_masyarakat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `agama` enum('Islam','Protestan','Katholik','Hindu','Budha') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_masyarakat`),
  KEY `NIK` (`NIK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.masyarakat: ~23 rows (approximately)
INSERT INTO `masyarakat` (`id_masyarakat`, `NIK`, `nama_masyarakat`, `jenis_kelamin`, `tempat_lahir`, `agama`, `tgl_lahir`, `no_hp`, `email`, `alamat`) VALUES
	('MSY-20221028215638', '3072892323', 'Indra Kusnadi', 'Laki-laki', 'garut', 'Islam', '1888-08-16', '0812784315', 'fdsa@gmail.com', 'waaffdas'),
	('MSY-20221110145459', '9281672862821', 'Vina', 'Perempuan', 'bandung', 'Islam', '2022-11-17', '', '', 'fdsfdsa'),
	('MSY-2022111017531', '13232', 'yuyu', 'Laki-laki', '', 'Islam', '0000-00-00', '362835728', 'yuyu@gmail.com', ''),
	('MSY-20221124105949', '25678901', 'faisal', 'Laki-laki', '', 'Islam', '0000-00-00', '085217767265', 'faisalharis@gmail.vom', ''),
	('MSY-2022117213740', '89235698732', 'Irwan', 'Laki-laki', 'bandung', 'Islam', '1999-10-31', '0981272858212', 'iswan879243568@gmail.com', 'Bojongloa kidul'),
	('MSY-2022118132755', '982369812', 'Yulia', 'Perempuan', 'bandung 24', 'Islam', '2022-11-21', '', '', 'subang'),
	('MSY-2022118133014', '23455234', 'Babang tamban', 'Laki-laki', 'bali', 'Islam', '2022-11-08', '', '', 'bali'),
	('MSY-2022118133354', '3287587323', 'Puji Astuti', 'Perempuan', 'Jakarta', 'Islam', '1996-11-07', '', '', 'Hahah alamat gua ya'),
	('MSY-2022118195428', 'iu32862378', 'Hana Ajwa', 'Perempuan', 'bandung', 'Budha', '2022-11-24', '', '', 'Bandung lautan api rt 24'),
	('MSY-2022118202023', '17111000', 'Tono', 'Laki-laki', 'palembang', 'Hindu', '2022-11-14', '', '', 'jalan haji naim'),
	('MSY-2022121392627', '3205154905990002', 'Riska Ervina', 'Laki-laki', '', 'Islam', '0000-00-00', '085719418284', 'yani81599@gmail.com', ''),
	('MSY-2023220191911', '3072892323', 'Riska safina', 'Perempuan', 'Garut', 'Islam', '2023-02-20', '', '', 'jl. sukawning garut jawa barat'),
	('MSY-202343064238', '1344789', 'Riska safina', 'Perempuan', 'Garut', 'Islam', '1998-03-05', '', '', 'sukawening'),
	('MSY-2023529192051', '3072892323', 'Salsabila', 'Laki-laki', '', 'Islam', '0000-00-00', '08528898253', 'salsa45@gmail.com', ''),
	('MSY-2023529192838', '3205154905990003', 'Hopid Saparudin', 'Laki-laki', '', 'Islam', '0000-00-00', '083891281030', 'HopidS@gmail.com', ''),
	('MSY-20236281190', '3072892327', 'siti aminah', 'Laki-laki', '', 'Islam', '0000-00-00', '085217767265', 'aminah12@gmail.com', ''),
	('MSY-202362843229', '3072892326', 'udin syamsudn', 'Laki-laki', '', 'Islam', '0000-00-00', '083891281030', 'udin12@mail.com', ''),
	('MSY-202371223546', '3072892329', 'ilham rahmatillah', 'Laki-laki', '', 'Islam', '0000-00-00', '083891281030', 'ilham@gmail.com', ''),
	('MSY-2023812211812', '879791723', 'Indra Kusnadi', 'Laki-laki', 'Tangerang', 'Islam', '2023-08-12', '', '', 'qweqweqwe');

-- Dumping structure for table db_sikades.pengajuan_surat
CREATE TABLE IF NOT EXISTS `pengajuan_surat` (
  `id_pengajuan_surat` varchar(50) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `id_surat` varchar(50) NOT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `file` text NOT NULL,
  `file_surat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('menunggu','diproses','selesai','ditolak','disetujui','disetujui2') NOT NULL,
  `tipe_pengajuan` enum('mandiri','admin') NOT NULL,
  `operator` varchar(50) NOT NULL,
  `acc_admin` varchar(50) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_pengajuan_surat`),
  KEY `NIK` (`NIK`),
  CONSTRAINT `pengajuan_surat_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.pengajuan_surat: ~11 rows (approximately)
INSERT INTO `pengajuan_surat` (`id_pengajuan_surat`, `NIK`, `id_surat`, `tgl_pengajuan`, `file`, `file_surat`, `status`, `tipe_pengajuan`, `operator`, `acc_admin`, `keterangan`) VALUES
	('SRPJ-20221124104917', '89235698732', 'SR-2022102117219', '2022-11-24', '10.1.03.02.0247.pdf', '', 'selesai', 'mandiri', 'MSY-2022117213740', 'SK001', NULL),
	('SRPJ-202211241148', '25678901', 'SR-20221021192120', '2022-11-24', 'WRG.pdf', '', 'selesai', 'mandiri', 'MSY-20221124105949', 'SK001', NULL),
	('SRPJ-2022121394012', '3072892323', 'SR-2022118104151', '2022-12-13', 'tani.pdf', '', 'disetujui', 'mandiri', 'MSY-20221028215638', 'SK001', NULL),
	('SRPJ-2023211133940', '3072892323', 'SR-20221212142431', '2023-02-11', 'DaftarHadir-PCIPPNU-Dep.Kaderisasi.fix.pdf', '', 'diproses', 'mandiri', 'MSY-20221028215638', 'SK001', NULL),
	('SRPJ-202343064238', '1344789', 'SR-20221021192120', '2023-04-30', '- Object Management Group. OMG Unified Modeling Language (OMG UML). Version 2.5.pdf', '', 'selesai', 'admin', 'SK001', '', NULL),
	('SRPJ-202351411549', '89235698732', 'SR-2022121214220', '2023-05-14', '- Object Management Group. OMG Unified Modeling Language (OMG UML). Version 2.5_6.pdf', '', 'selesai', 'mandiri', 'MSY-2022117213740', 'SK001', NULL),
	('SRPJ-202388211840', '3072892323', 'SR-20221212141819', '2023-08-09', 'document.pdf', '', 'disetujui2', 'mandiri', 'MSY-20221028215638', 'SK001', NULL);

-- Dumping structure for table db_sikades.sekertaris
CREATE TABLE IF NOT EXISTS `sekertaris` (
  `id_sekertaris` varchar(20) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `nama_sekertaris` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `agama` enum('Islam','Protestan','Katholik','Hindu','Budha') NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_sekertaris`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.sekertaris: ~1 rows (approximately)
INSERT INTO `sekertaris` (`id_sekertaris`, `NIK`, `nama_sekertaris`, `jenis_kelamin`, `tgl_lahir`, `tempat_lahir`, `agama`, `no_hp`, `email`, `alamat`) VALUES
	('SK001', '278215873158', 'Riska Safina', 'Perempuan', '1999-08-19', 'Garut', 'Islam', '6285719418284', 'riskasafina1908@gmail.com', 'sukawening garut');

-- Dumping structure for table db_sikades.surat
CREATE TABLE IF NOT EXISTS `surat` (
  `id_surat` varchar(50) NOT NULL,
  `nama_surat` varchar(50) NOT NULL,
  `keterangan_surat` text NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.surat: ~13 rows (approximately)
INSERT INTO `surat` (`id_surat`, `nama_surat`, `keterangan_surat`) VALUES
	('SR-2022102117219', 'Belum Kerja', 'Surat Keterangan Belum Kejra'),
	('SR-20221021192120', 'Izin  sakit', 'Surat Izin SAkit'),
	('SR-2022118104151', 'Surat Hilang', 'Surat keterangan hilang'),
	('SR-20221212141147', 'Pembuatan KK', 'Surat Pembuatan kartu keluarga'),
	('SR-20221212141626', 'SKCK', 'Surat Keterangan Catatan Kepolisian'),
	('SR-20221212141819', 'Jalan Dinas', 'Surat Keterangan Jalan Dinas'),
	('SR-20221212141923', 'Domisili', 'Surat Keterangan Domisili'),
	('SR-20221212142019', 'Penghasilan Orang Tua', 'Surat Keterangan Penghasilan Orang Tua\r\n'),
	('SR-20221212142120', 'Izin Usaha', 'Surat Keterangan Izin Usaha'),
	('SR-2022121214220', 'Beda Nama ', 'Surat Keterangan beda nama'),
	('SR-20221212142238', 'Izin Acara', 'Surat Keterangan Izin acara'),
	('SR-20221212142336', 'Pemilik Tanah', 'Surat Keterangan Pemilik Tanah'),
	('SR-20221212142431', 'Tidak Mampu', 'Surat Keterangan Tidak Mampu');

-- Dumping structure for table db_sikades.surat_keluar
CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `id_surat_keluar` varchar(50) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `file` text NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tgl_entry` date DEFAULT NULL,
  `status` enum('menunggu','disetujui','ditolak') NOT NULL DEFAULT 'menunggu',
  PRIMARY KEY (`id_surat_keluar`),
  KEY `operator` (`operator`),
  CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`operator`) REFERENCES `login` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.surat_keluar: ~1 rows (approximately)
INSERT INTO `surat_keluar` (`id_surat_keluar`, `tgl_keluar`, `kode_surat`, `no_surat`, `nama_bagian`, `tgl_surat`, `kepada`, `perihal`, `file`, `operator`, `tgl_entry`, `status`) VALUES
	('SRKR-2023721112546', '2023-07-21', 'RND', '321', 'wq', '2023-07-21', 'Lurah', 'Dajatan', 'document (2).pdf', 'SK001', NULL, 'disetujui');

-- Dumping structure for table db_sikades.surat_masuk
CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id_surat_masuk` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kode_surat` varchar(100) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `pengirim` varchar(50) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `perihal` text NOT NULL,
  `file` text NOT NULL,
  `operator` varchar(50) NOT NULL,
  `status` enum('menunggu','disetujui','ditolak') NOT NULL DEFAULT 'menunggu',
  `tgl_entry` date DEFAULT NULL,
  PRIMARY KEY (`id_surat_masuk`),
  KEY `operator` (`operator`),
  CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`operator`) REFERENCES `login` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.surat_masuk: ~3 rows (approximately)
INSERT INTO `surat_masuk` (`id_surat_masuk`, `tgl_masuk`, `kode_surat`, `no_surat`, `tgl_surat`, `pengirim`, `kepada`, `perihal`, `file`, `operator`, `status`, `tgl_entry`) VALUES
	('SRMS-20221124114919', '2022-11-20', 'AB', 'SKR/SIM/XI/2022', '2022-11-21', 'KOTA', 'LURAH', 'halalbihalal', '10.1.03.02.0247.pdf', 'SK001', 'disetujui', '2022-11-24'),
	('SRMS-20221124115014', '2022-11-25', 'af', 'SKR/SUM/XI/2022', '2022-11-30', 'klinik', 'LURAH', 'program imunisas', 'Ekonomi Makro_Muchtolifah.pdf', 'SK001', 'disetujui', '2022-11-24');

-- Dumping structure for table db_sikades.syarat
CREATE TABLE IF NOT EXISTS `syarat` (
  `id_syarat` varchar(50) NOT NULL,
  `nama_syarat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_syarat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.syarat: ~4 rows (approximately)
INSERT INTO `syarat` (`id_syarat`, `nama_syarat`) VALUES
	('S001', 'KTP / KK'),
	('SY-20221026185452', 'Surat Dokter'),
	('SY002', 'KK'),
	('SY003', 'KTP');

-- Dumping structure for table db_sikades.syarat_surat
CREATE TABLE IF NOT EXISTS `syarat_surat` (
  `id_syarat_surat` varchar(50) NOT NULL,
  `id_surat` varchar(50) NOT NULL,
  `id_syarat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_syarat_surat`),
  KEY `id_surat` (`id_surat`,`id_syarat`),
  KEY `id_syarat` (`id_syarat`),
  CONSTRAINT `syarat_surat_ibfk_1` FOREIGN KEY (`id_syarat`) REFERENCES `syarat` (`id_syarat`),
  CONSTRAINT `syarat_surat_ibfk_2` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_sikades.syarat_surat: ~13 rows (approximately)
INSERT INTO `syarat_surat` (`id_syarat_surat`, `id_surat`, `id_syarat`) VALUES
	('PSY-20221026183848', 'SR-2022102117219', 'S001'),
	('PSY-20221026185641', 'SR-20221021192120', 'SY-20221026185452'),
	('PSY-20221212144458', 'SR-20221212141147', 'SY003'),
	('PSY-20221212144143', 'SR-20221212141626', 'S001'),
	('PSY-2022121214428', 'SR-20221212141819', 'S001'),
	('PSY-20221212144259', 'SR-20221212141923', 'S001'),
	('PSY-20221212144314', 'SR-20221212142019', 'S001'),
	('PSY-20221212144326', 'SR-20221212142120', 'S001'),
	('PSY-20221212144349', 'SR-2022121214220', 'S001'),
	('PSY-2022121214446', 'SR-20221212142238', 'S001'),
	('PSY-20221212144427', 'SR-20221212142336', 'S001'),
	('PSY-20221212144440', 'SR-20221212142431', 'S001');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
