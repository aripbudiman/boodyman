/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.20 : Database - inventory_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventory_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventory_db`;

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`kd_barang`,`nama_barang`,`merk`,`harga`,`stok`) values ('001','tes','merah',3000,2),('B001','Springbed','Cream',2500000,8),('b002','asdf','aksjdf',6000,2);

/*Table structure for table `tb_barangkeluar` */

DROP TABLE IF EXISTS `tb_barangkeluar`;

CREATE TABLE `tb_barangkeluar` (
  `no_barangkeluar` varchar(10) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kd_sales` varchar(15) NOT NULL,
  `approve` enum('0','1') NOT NULL,
  PRIMARY KEY (`no_barangkeluar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_barangkeluar` */

insert  into `tb_barangkeluar`(`no_barangkeluar`,`tgl_keluar`,`kd_barang`,`jumlah`,`kd_sales`,`approve`) values ('000001','2017-05-03','B001',2,'S001','1');

/*Table structure for table `tb_barangmasuk` */

DROP TABLE IF EXISTS `tb_barangmasuk`;

CREATE TABLE `tb_barangmasuk` (
  `no_barangmasuk` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kd_supplier` varchar(15) NOT NULL,
  `approve` enum('0','1') NOT NULL,
  PRIMARY KEY (`no_barangmasuk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_barangmasuk` */

insert  into `tb_barangmasuk`(`no_barangmasuk`,`tgl_masuk`,`kd_barang`,`jumlah`,`kd_supplier`,`approve`) values ('000001','2017-05-03','B001',10,'S001','1'),('000002','2017-05-18','001',2,'S001','1'),('000003','2017-05-22','b002',2,'S001','1');

/*Table structure for table `tb_sales` */

DROP TABLE IF EXISTS `tb_sales`;

CREATE TABLE `tb_sales` (
  `kd_sales` varchar(10) NOT NULL,
  `nama_sales` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `keypass` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`kd_sales`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_sales` */

insert  into `tb_sales`(`kd_sales`,`nama_sales`,`no_telp`,`email`,`password`,`keypass`,`foto`) values ('S001','xyz','08227312671','thonie.chopper@gmail.com','202cb962ac59075b964b07152d234b70','743741740','boruto-ep1.png');

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `kd_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`kd_supplier`,`nama_supplier`,`no_telp`,`alamat`) values ('S001','xyz','7798965786','skdfjskdj');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('Gudang','Sales','Pimpinan') NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`nama`,`username`,`password`,`level`,`foto`) values ('Pimpinan','pimpinan','202cb962ac59075b964b07152d234b70','Pimpinan',''),('SELLA','sella','202cb962ac59075b964b07152d234b70','Gudang','boruto-ep1.png');

/*Table structure for table `barang_keluar` */

DROP TABLE IF EXISTS `barang_keluar`;

/*!50001 DROP VIEW IF EXISTS `barang_keluar` */;
/*!50001 DROP TABLE IF EXISTS `barang_keluar` */;

/*!50001 CREATE TABLE  `barang_keluar`(
 `kd_barang` varchar(10) ,
 `nama_barang` varchar(50) ,
 `merk` varchar(20) ,
 `harga` int(11) ,
 `stok` int(11) ,
 `no_barangkeluar` varchar(10) ,
 `tgl_keluar` date ,
 `jumlah` int(11) ,
 `approve` enum('0','1') ,
 `kd_sales` varchar(10) ,
 `nama_sales` varchar(50) 
)*/;

/*Table structure for table `barang_masuk` */

DROP TABLE IF EXISTS `barang_masuk`;

/*!50001 DROP VIEW IF EXISTS `barang_masuk` */;
/*!50001 DROP TABLE IF EXISTS `barang_masuk` */;

/*!50001 CREATE TABLE  `barang_masuk`(
 `kd_barang` varchar(10) ,
 `nama_barang` varchar(50) ,
 `merk` varchar(20) ,
 `harga` int(11) ,
 `stok` int(11) ,
 `kd_supplier` varchar(15) ,
 `nama_supplier` varchar(50) ,
 `no_telp` varchar(15) ,
 `alamat` text ,
 `no_barangmasuk` varchar(10) ,
 `tgl_masuk` date ,
 `jumlah` int(11) ,
 `approve` enum('0','1') 
)*/;

/*View structure for view barang_keluar */

/*!50001 DROP TABLE IF EXISTS `barang_keluar` */;
/*!50001 DROP VIEW IF EXISTS `barang_keluar` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_keluar` AS select `tb_barang`.`kd_barang` AS `kd_barang`,`tb_barang`.`nama_barang` AS `nama_barang`,`tb_barang`.`merk` AS `merk`,`tb_barang`.`harga` AS `harga`,`tb_barang`.`stok` AS `stok`,`tb_barangkeluar`.`no_barangkeluar` AS `no_barangkeluar`,`tb_barangkeluar`.`tgl_keluar` AS `tgl_keluar`,`tb_barangkeluar`.`jumlah` AS `jumlah`,`tb_barangkeluar`.`approve` AS `approve`,`tb_sales`.`kd_sales` AS `kd_sales`,`tb_sales`.`nama_sales` AS `nama_sales` from ((`tb_barang` join `tb_barangkeluar`) join `tb_sales`) where ((`tb_barang`.`kd_barang` = `tb_barangkeluar`.`kd_barang`) and (`tb_sales`.`kd_sales` = `tb_barangkeluar`.`kd_sales`)) */;

/*View structure for view barang_masuk */

/*!50001 DROP TABLE IF EXISTS `barang_masuk` */;
/*!50001 DROP VIEW IF EXISTS `barang_masuk` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_masuk` AS select `tb_barang`.`kd_barang` AS `kd_barang`,`tb_barang`.`nama_barang` AS `nama_barang`,`tb_barang`.`merk` AS `merk`,`tb_barang`.`harga` AS `harga`,`tb_barang`.`stok` AS `stok`,`tb_supplier`.`kd_supplier` AS `kd_supplier`,`tb_supplier`.`nama_supplier` AS `nama_supplier`,`tb_supplier`.`no_telp` AS `no_telp`,`tb_supplier`.`alamat` AS `alamat`,`tb_barangmasuk`.`no_barangmasuk` AS `no_barangmasuk`,`tb_barangmasuk`.`tgl_masuk` AS `tgl_masuk`,`tb_barangmasuk`.`jumlah` AS `jumlah`,`tb_barangmasuk`.`approve` AS `approve` from ((`tb_barang` join `tb_barangmasuk`) join `tb_supplier`) where ((`tb_barang`.`kd_barang` = `tb_barangmasuk`.`kd_barang`) and (`tb_supplier`.`kd_supplier` = `tb_barangmasuk`.`kd_supplier`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
