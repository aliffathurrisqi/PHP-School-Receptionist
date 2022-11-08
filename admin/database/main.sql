/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.18-MariaDB : Database - db_receptionist
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_receptionist` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_receptionist`;

/*Table structure for table `komentar` */

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pengunjung` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `rating` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `komentar` */

/*Table structure for table `kunjungan` */

DROP TABLE IF EXISTS `kunjungan`;

CREATE TABLE `kunjungan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_pengunjung` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `tujuan` text NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kunjungan` */

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `subject` */

/*Table structure for table `tujuan` */

DROP TABLE IF EXISTS `tujuan`;

CREATE TABLE `tujuan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tujuan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tujuan` */

insert  into `tujuan`(`id`,`tujuan`) values 
(1,'Bertemu Kepala Sekolah'),
(2,'Meminta Legalisir Ijazah'),
(3,'Meminta Surat Perizinan'),
(4,'Bertemu Staff/Guru'),
(5,'Membuat Surat Pindah');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `password` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`username`,`password`,`nama`) values 
('admin','21232f297a57a5a7','Admin');

/*Table structure for table `data_komentar` */

DROP TABLE IF EXISTS `data_komentar`;

/*!50001 DROP VIEW IF EXISTS `data_komentar` */;
/*!50001 DROP TABLE IF EXISTS `data_komentar` */;

/*!50001 CREATE TABLE  `data_komentar`(
 `pengunjung` varchar(255) ,
 `komentar` text ,
 `rating` int(11) ,
 `time` varchar(86) 
)*/;

/*Table structure for table `data_kunjungan` */

DROP TABLE IF EXISTS `data_kunjungan`;

/*!50001 DROP VIEW IF EXISTS `data_kunjungan` */;
/*!50001 DROP TABLE IF EXISTS `data_kunjungan` */;

/*!50001 CREATE TABLE  `data_kunjungan`(
 `nama_pengunjung` varchar(255) ,
 `alamat` text ,
 `telp` varchar(15) ,
 `instansi` varchar(255) ,
 `tujuan` text ,
 `subject` varchar(255) ,
 `keterangan` text ,
 `time` varchar(86) 
)*/;

/*View structure for view data_komentar */

/*!50001 DROP TABLE IF EXISTS `data_komentar` */;
/*!50001 DROP VIEW IF EXISTS `data_komentar` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_komentar` AS select `komentar`.`pengunjung` AS `pengunjung`,`komentar`.`komentar` AS `komentar`,`komentar`.`rating` AS `rating`,date_format(`komentar`.`time`,'%d %M %Y %H:%i:%s') AS `time` from `komentar` order by `komentar`.`id` desc */;

/*View structure for view data_kunjungan */

/*!50001 DROP TABLE IF EXISTS `data_kunjungan` */;
/*!50001 DROP VIEW IF EXISTS `data_kunjungan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_kunjungan` AS select `kunjungan`.`nama_pengunjung` AS `nama_pengunjung`,`kunjungan`.`alamat` AS `alamat`,`kunjungan`.`telp` AS `telp`,`kunjungan`.`instansi` AS `instansi`,`kunjungan`.`tujuan` AS `tujuan`,`kunjungan`.`subject` AS `subject`,`kunjungan`.`keterangan` AS `keterangan`,date_format(`kunjungan`.`time`,'%d %M %Y %H:%i:%s') AS `time` from `kunjungan` order by `kunjungan`.`id` desc */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
