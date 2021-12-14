/*
SQLyog Ultimate v10.42 
MySQL - 5.1.41 : Database - makan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`makan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `makan`;

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama_menu` char(100) DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nama_menu`,`harga`) values (3,'Soto',11000),(7,'Mie Ayam',9000),(8,'pecel',15000),(9,'Rawon',10000),(13,'Nasi Goreng',14000),(15,'Boranan',6000),(17,'Tahu tekh',12000);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` char(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `no_hp` char(13) DEFAULT NULL,
  `alamat` char(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id`,`nama_pelanggan`,`jenis_kelamin`,`no_hp`,`alamat`) values (15,'Iqbal','Laki-laki','56564645','Tirem'),(18,'Seva','Perempuan','0986678767','Giri'),(19,'Biuyyu','Laki-laki','5u657876','GK');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(100) DEFAULT NULL,
  `id_menu` int(100) DEFAULT NULL,
  `jumlah` int(100) DEFAULT NULL,
  `id_user` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id`,`id_pelanggan`,`id_menu`,`jumlah`,`id_user`) values (20,15,3,3,11),(24,18,3,9,11),(26,18,7,3,14),(27,19,7,2,14),(28,15,7,2,10);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(100) DEFAULT NULL,
  `total` int(100) DEFAULT NULL,
  `bayar` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`id_pesanan`,`total`,`bayar`) values (2,24,99000,100000),(3,26,27000,30000),(4,27,18000,20000),(5,28,18000,20000);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` enum('admin','waiter','kasir','owner') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`username`,`password`,`level`) values (10,'Iqbal','iqbal','1','admin'),(11,'Firdaus','firdaus','1','kasir'),(12,'Seva','seva','1','owner'),(13,'Yoga','yoga','1','waiter');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
