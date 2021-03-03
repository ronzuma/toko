/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - kios
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kios` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `kios`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `barcode` varchar(20) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga_jual` int(25) DEFAULT NULL,
  `keterangan_barang` tinytext DEFAULT NULL,
  PRIMARY KEY (`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`barcode`,`nama_kategori`,`nama_barang`,`harga_jual`,`keterangan_barang`) values 
('B0001','LCD','Kecap Bango',1000,'keterangan barang'),
('B0002','Aksesoris','Kapal Api',1000,''),
('B0003',NULL,'INDOMILK',4000,''),
('B0004',NULL,'Enzim',2000,''),
('B0005',NULL,'Pepsoden',4000,''),
('B0007',NULL,'Lolipop',500,''),
('B0008',NULL,'Marshmellow',1000,''),
('B0009',NULL,'Jelly',1000,''),
('B0010',NULL,'Oki Nata De coco',1000,''),
('B0011',NULL,'Softcase',15000,''),
('B0012',NULL,'LCD Sony',180000,''),
('B0013',NULL,'Gulali',5000,'');

/*Table structure for table `detail_barang` */

DROP TABLE IF EXISTS `detail_barang`;

CREATE TABLE `detail_barang` (
  `id_barang` varchar(40) NOT NULL,
  `barcode` varchar(20) DEFAULT NULL,
  `stok_barang` int(10) DEFAULT NULL,
  `harga_modal` int(25) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_barang` */

insert  into `detail_barang`(`id_barang`,`barcode`,`stok_barang`,`harga_modal`) values 
('B0001','B0001',19,1000),
('B0002','B0002',3,1000),
('B0003','B0003',5,4000),
('B0004','B0004',5,2000),
('B0005','B0005',20,4000),
('B0007','B0007',20,500),
('B0008','B0008',7,1000),
('B0009','B0009',8,1000),
('B0010','B0010',18,1000),
('B0011','B0011',6,15000),
('B0012','B0012',8,180000),
('B0013','B0013',7,5000);

/*Table structure for table `dump_pembelian` */

DROP TABLE IF EXISTS `dump_pembelian`;

CREATE TABLE `dump_pembelian` (
  `no_nota` char(48) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga_barang` int(25) DEFAULT NULL,
  `jumlah` int(9) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `no_nota` (`no_nota`),
  KEY `kode_barang` (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dump_pembelian` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`keterangan`) values 
(1,'LCD',NULL),
(2,'Baterai',NULL),
(3,'Casing',NULL),
(4,'Aksesoris',NULL);

/*Table structure for table `log_akses` */

DROP TABLE IF EXISTS `log_akses`;

CREATE TABLE `log_akses` (
  `user` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `jenis` varchar(18) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log_akses` */

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `no_nota` char(48) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` int(40) DEFAULT NULL,
  `kasir` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`no_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembelian` */

insert  into `pembelian`(`no_nota`,`tanggal`,`nominal`,`kasir`) values 
('B_201911250001','2019-11-25',2000000,'Bang Admin'),
('B_202008220001','2020-08-22',34000,'Bang Admin');

/*Table structure for table `pembelian_detail` */

DROP TABLE IF EXISTS `pembelian_detail`;

CREATE TABLE `pembelian_detail` (
  `no_nota` char(48) DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `harga_barang` int(25) DEFAULT NULL,
  `jumlah` int(9) DEFAULT NULL,
  KEY `kode_barang` (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembelian_detail` */

insert  into `pembelian_detail`(`no_nota`,`id_barang`,`harga_barang`,`jumlah`) values 
('B_201911250001','B0002',200000,10),
('B_202008220001','B0010',3400,10);

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `no_nota` char(48) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `nominal` int(40) DEFAULT NULL,
  `kasir` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`no_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

insert  into `penjualan`(`no_nota`,`waktu`,`nominal`,`kasir`) values 
('S_201911250001','2019-11-25 09:56:31',250000,'Bang Admin');

/*Table structure for table `penjualan_detail` */

DROP TABLE IF EXISTS `penjualan_detail`;

CREATE TABLE `penjualan_detail` (
  `no_nota` char(48) DEFAULT NULL,
  `kode_barang` varchar(80) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `harga` int(16) DEFAULT NULL,
  `sub_total` int(16) DEFAULT NULL,
  KEY `no_nota` (`no_nota`),
  KEY `kode_barang` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penjualan_detail` */

insert  into `penjualan_detail`(`no_nota`,`kode_barang`,`nama_barang`,`jumlah`,`harga`,`sub_total`) values 
('S_201911250001','B0001','LCD Xiaomi Redmi 6A Putih',1,250000,250000);

/*Table structure for table `pj_akses` */

DROP TABLE IF EXISTS `pj_akses`;

CREATE TABLE `pj_akses` (
  `id_akses` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(10) NOT NULL,
  `level_akses` varchar(15) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pj_akses` */

insert  into `pj_akses`(`id_akses`,`label`,`level_akses`) values 
(1,'admin','Administrator'),
(2,'frontend','Staff Kasir'),
(3,'inventory','Staff Inventory'),
(4,'backend','Staff Keuangan'),
(5,'su','Super User');

/*Table structure for table `pj_ci_sessions` */

DROP TABLE IF EXISTS `pj_ci_sessions`;

CREATE TABLE `pj_ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pj_ci_sessions` */

insert  into `pj_ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('20mj9pof9ato68c78tejqan67q8uamjr','::1',1574647049,'__ci_last_regenerate|i:1574646857;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('lbq209cieula7ahe794036q7qjbj41eq','::1',1574647444,'__ci_last_regenerate|i:1574647205;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('e83s2c8gq8c526g16tg1f3hdc6tdvb2e','::1',1574648189,'__ci_last_regenerate|i:1574647934;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('jo083agibfj8du5k8odsd84vhjnd1vgf','::1',1574648541,'__ci_last_regenerate|i:1574648249;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('7jn8pek1f2hhdj6mvue2cjkciqu1m92o','::1',1574648972,'__ci_last_regenerate|i:1574648932;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('0l350jud1obs1f9v2m4c1fovfs2043jb','::1',1574649696,'__ci_last_regenerate|i:1574649407;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('78bb9t39kikhf2gqeqjash1bdfertmbn','::1',1574649962,'__ci_last_regenerate|i:1574649712;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('6hcpjiei1244jlqgigpljcujhqfdis4u','::1',1574650319,'__ci_last_regenerate|i:1574650031;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('kpltqspknnheu7lt0shkt17rd8hbjgj8','::1',1574650442,'__ci_last_regenerate|i:1574650338;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('9cs29kee9flk7r7tafel1m319i9iis67','::1',1574650879,'__ci_last_regenerate|i:1574650841;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('ev3mfa877ta3thnr5bqq3c3av1dcvb5t','::1',1574651257,'__ci_last_regenerate|i:1574651195;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('pni7j9ht3dd2c6s34lr91ch6rsoaibot','::1',1574652471,'__ci_last_regenerate|i:1574652172;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('h43o9apd6r2epdghtb3k4fj7vcva4mjm','::1',1574652755,'__ci_last_regenerate|i:1574652483;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('gf02nbv28rss5t2j65ireok39kdvbi9q','::1',1574652888,'__ci_last_regenerate|i:1574652791;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('8r7mm9ce84njhnfsmo8uap8g4lmq92oi','::1',1574653904,'__ci_last_regenerate|i:1574653831;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('blveq43033jgg63v12nbq4tlg4gk2git','::1',1574664531,'__ci_last_regenerate|i:1574664457;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('vie2n07909gskot62cg0emhhq1ijefuq','::1',1574665461,'__ci_last_regenerate|i:1574665353;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('1fhvgh00tdbpsa578eps4ktgut2186o2','::1',1574665807,'__ci_last_regenerate|i:1574665707;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('37q6jlbr16vn12ughqkji05088pq9cl5','::1',1574666994,'__ci_last_regenerate|i:1574666847;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('5eurem6ifqv3qblr3mi15n3n2delekph','::1',1574667532,'__ci_last_regenerate|i:1574667236;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('7evg8m7saj0j7318ceo892rkg47mvodf','::1',1574667858,'__ci_last_regenerate|i:1574667592;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('5peq06ifj1l6vm41c4vc619988hqiluo','::1',1574668220,'__ci_last_regenerate|i:1574667959;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('tj9cnbejm7p6dksrc7p7q20ti1rl3us5','::1',1574668360,'__ci_last_regenerate|i:1574668262;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('l2lhbap8p8t1s1jm1sbqjt3lk7gegrlb','::1',1574670264,'__ci_last_regenerate|i:1574670189;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('9rqk4r9r77qu1kak50iq8paun70q17k9','::1',1574670882,'__ci_last_regenerate|i:1574670667;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('r5s37m9pvjt3cirbs7bjt0ea45su4eeq','::1',1574671051,'__ci_last_regenerate|i:1574670990;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('ob32co6opthq8baoukhvr364ghab3185','::1',1574671361,'__ci_last_regenerate|i:1574671342;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('6737ubcbhop665mqfjas3l6ehdc3k4av','::1',1574671835,'__ci_last_regenerate|i:1574671766;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('skr5abm5e6smtas4d0dkuh2bs8akf21h','::1',1574672270,'__ci_last_regenerate|i:1574672140;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('km753j48t1o5ocf0v78jel66ht6mfm1v','::1',1574672723,'__ci_last_regenerate|i:1574672495;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('cdlajmhdue2e58t1qdp9to46pps8r37f','::1',1574672880,'__ci_last_regenerate|i:1574672835;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('ro8nqo7incnsj214j61stra80qrp440t','::1',1574728085,'__ci_last_regenerate|i:1574727795;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('371odhljlmnrh0uj42c02cqdf6dpospa','::1',1574728324,'__ci_last_regenerate|i:1574728147;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('iv5ksodonu58i74pflkscbua1lks05la','::1',1574728750,'__ci_last_regenerate|i:1574728509;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('ttu98r59dnsb80om5iv3o0dlhunckjqu','::1',1574728980,'__ci_last_regenerate|i:1574728818;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('76mtnv1hv3lgtsok9dp37nasocctjvm4','::1',1574729460,'__ci_last_regenerate|i:1574729398;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('3s53jfno3t4evofs6kp4h4acdfafr2hr','::1',1574731778,'__ci_last_regenerate|i:1574731552;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('cv6lh6r6fl8e3vethfbe27tqddqo048t','::1',1574732277,'__ci_last_regenerate|i:1574731983;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('f8st5osmij6gvuugnvj6vpgc0krri3bf','::1',1574732894,'__ci_last_regenerate|i:1574732719;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('giev8l0q83sbaobsdsegrt51g7pb8k99','::1',1574733262,'__ci_last_regenerate|i:1574733236;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('0s191pimchpls898tn0hbi6ioiqj7tpf','::1',1574759096,'__ci_last_regenerate|i:1574758829;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('nsvqloc7s53987nm53ot2598e83oa5ae','::1',1574759431,'__ci_last_regenerate|i:1574759197;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('prebuq6kcvvoj9cij2bfgsb9qg2uh0t4','::1',1574759732,'__ci_last_regenerate|i:1574759531;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('g2bm94li60pii8di0q3710dovipjotad','::1',1574760366,'__ci_last_regenerate|i:1574760086;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('na0kc2gtoi4scnhi4tluarur77qv9ol3','::1',1574760436,'__ci_last_regenerate|i:1574760436;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('hm9fu8k07pl0t14t4j240dcbq58b0rq3','::1',1574838003,'__ci_last_regenerate|i:1574837737;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('94re0rv4lg4gj4phjb4oed5racdvjuoi','::1',1574838378,'__ci_last_regenerate|i:1574838088;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('adhcam45l7rmliio735sjgje46sg5cif','::1',1574838409,'__ci_last_regenerate|i:1574838409;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('8scgt6rtvdhobb7kcf0dhvlksi57lcli','::1',1598010017,'__ci_last_regenerate|i:1598010017;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('4nd8un0gvvvvt3umvg1fv4lvjt8njrfl','::1',1598011988,'__ci_last_regenerate|i:1598011988;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('qkj9tdniimsp495qehstsq1nesrahi8t','::1',1598012525,'__ci_last_regenerate|i:1598012525;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('orcbv0rp959lnueva9gaptutogn5cpn3','::1',1598012842,'__ci_last_regenerate|i:1598012842;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('r0o0odi8ra0391bp9vu7tkvjqu42ehi6','::1',1598013392,'__ci_last_regenerate|i:1598013392;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('f9e3qgd6eg11itj0sg84r737vjqel2af','::1',1598013741,'__ci_last_regenerate|i:1598013741;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('ucjlbh8ujjqld41ijh2mgmc4dfianhuh','::1',1598014047,'__ci_last_regenerate|i:1598014047;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('jch5cul8l0kmksinvmb35dan5hb4bs3h','::1',1598014361,'__ci_last_regenerate|i:1598014361;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('dpocgupq4qg0fqfrlkvffe2a6o5i3oeh','::1',1598014731,'__ci_last_regenerate|i:1598014731;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('e064hu9ftd37jgglmi5h7srpn5ic27s8','::1',1598015124,'__ci_last_regenerate|i:1598015124;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('rpbfvosar0krhnpbsqvk97qhasn7gjet','::1',1598015443,'__ci_last_regenerate|i:1598015443;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('3m2aq8qo7l23nbpsjb6klem9cchtg953','::1',1598015809,'__ci_last_regenerate|i:1598015809;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('aa80qqluo43epu75q595fhv51hognrqb','::1',1598015857,'__ci_last_regenerate|i:1598015809;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";cart_contents|a:4:{s:10:\"cart_total\";d:290000;s:11:\"total_items\";d:2;s:32:\"dbdd1b7e84fced56cd674967c9c980be\";a:6:{s:2:\"id\";s:5:\"awe12\";s:4:\"name\";s:23:\"Baterai Iphone 6S Hitam\";s:5:\"price\";d:200000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"dbdd1b7e84fced56cd674967c9c980be\";s:8:\"subtotal\";d:200000;}s:32:\"cde086307bfe1be883d4ea8bac3739bc\";a:6:{s:2:\"id\";s:6:\"B00021\";s:4:\"name\";s:16:\"LCD Sony Z2 Gold\";s:5:\"price\";d:90000;s:3:\"qty\";d:1;s:5:\"rowid\";s:32:\"cde086307bfe1be883d4ea8bac3739bc\";s:8:\"subtotal\";d:90000;}}'),
('jkpc38d43go2valpc9166fsiea08od2r','::1',1598049891,'__ci_last_regenerate|i:1598049891;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('gg57dt91tdq1aeb15sn09ii9k591ghcg','::1',1598050271,'__ci_last_regenerate|i:1598050271;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('5osk6vf9iulaag57hf520dku21f8v2ur','::1',1598050622,'__ci_last_regenerate|i:1598050622;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('ed16j5t44v5pj6b821sa5g7e9kocsaol','::1',1598051665,'__ci_last_regenerate|i:1598051665;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('1s78ceoi97vfff3rs5lr8j828r6v25kf','::1',1598052481,'__ci_last_regenerate|i:1598052481;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('lsaip42421miov3ut73drr0221bb3abc','::1',1598052810,'__ci_last_regenerate|i:1598052810;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('8smusvtrl9fqt4jhue1ksei1aiq5vslq','::1',1598053336,'__ci_last_regenerate|i:1598053336;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('bppc3ssdorhtu635e1o7ap2q76btsfp0','::1',1598053654,'__ci_last_regenerate|i:1598053654;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('dkq8ln1u68ucndqogicag39i3gjkurk8','::1',1598054259,'__ci_last_regenerate|i:1598054259;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('625dumb65cpir4aitk77h3l2mrgrtu9h','::1',1598054659,'__ci_last_regenerate|i:1598054659;ap_id_user|s:1:\"1\";ap_password|s:40:\"d033e22ae348aeb5660fc2140aec35850c4da997\";ap_nama|s:10:\"Bang Admin\";ap_level|s:5:\"admin\";ap_level_caption|s:13:\"Administrator\";'),
('ccgfvm553d53ntscjqnsju4kefrvgs44','::1',1598054660,'__ci_last_regenerate|i:1598054659;');

/*Table structure for table `pj_user` */

DROP TABLE IF EXISTS `pj_user`;

CREATE TABLE `pj_user` (
  `id_user` mediumint(1) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_akses` tinyint(1) unsigned NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL,
  `dihapus` enum('tidak','ya') NOT NULL DEFAULT 'tidak',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `pj_user` */

insert  into `pj_user`(`id_user`,`username`,`password`,`nama`,`id_akses`,`status`,`dihapus`) values 
(1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Bang Admin',1,'Aktif','tidak'),
(8,'backend','d033e22ae348aeb5660fc2140aec35850c4da997','Back End',4,'Aktif','tidak'),
(9,'kasir','d033e22ae348aeb5660fc2140aec35850c4da997','Kasir',2,'Aktif','tidak'),
(11,'ronzuma','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','zamroni',1,'Aktif','tidak');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`id`,`nama_barang`,`keterangan`,`id_kategori`) values 
(3,'Baterai Iphone 6S',NULL,2),
(4,'Back Case Sony Z5',NULL,3),
(5,'LCD Sony Z2','',4);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` int(8) NOT NULL AUTO_INCREMENT,
  `nama_sup` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama_sup`,`owner`,`alamat`,`telp`) values 
(1,'Fauzan','fauzi','Jl. Raya Rembige','087860046689'),
(2,'Detik','Teddy','Jl. Pejanggik No. 31','0370');

/*Table structure for table `toko` */

DROP TABLE IF EXISTS `toko`;

CREATE TABLE `toko` (
  `id_toko` int(8) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(50) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_toko`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `toko` */

insert  into `toko`(`id_toko`,`nama_toko`,`cp`,`lokasi`,`telp`) values 
(1,'Lebui Monjok','Khaerul','Monjok','0811128716'),
(2,'Lebui Labuapi','Azhari','Terong Tawah','0887993627');

/*Table structure for table `warna` */

DROP TABLE IF EXISTS `warna`;

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_warna` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_warna`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `warna` */

insert  into `warna`(`id_warna`,`nama_warna`) values 
(1,'-'),
(2,'Putih'),
(3,'Gold'),
(4,'Hitam');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
