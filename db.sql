/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 10.1.9-MariaDB : Database - jmc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jmc` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `jmc`;

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`created`,`last_updated`) values (1,'Admin','2016-02-03 15:19:40','2016-02-03 15:19:40'),(2,'User','2016-02-03 15:19:40','2016-02-03 15:19:40');

/*Table structure for table `kabupaten` */

DROP TABLE IF EXISTS `kabupaten`;

CREATE TABLE `kabupaten` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `penduduk` int(5) unsigned DEFAULT '0',
  `user_id` int(5) unsigned NOT NULL,
  `provinsi_id` int(5) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `last_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `provinsi_id` (`provinsi_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`),
  CONSTRAINT `kabupaten_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `kabupaten` */

insert  into `kabupaten`(`id`,`name`,`penduduk`,`user_id`,`provinsi_id`,`created`,`last_edited`,`deleted`) values (1,'Bantul',20,1,2,'2016-02-04 03:41:46','2016-02-04 10:00:30',0),(2,'Parigi Moutong',100,1,1,'2016-02-04 04:03:57','2016-02-04 13:00:53',1),(3,'Poso',10,1,1,'2016-02-04 05:49:48','2016-02-04 12:57:07',1);

/*Table structure for table `provinsi` */

DROP TABLE IF EXISTS `provinsi`;

CREATE TABLE `provinsi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(5) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `last_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `provinsi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `provinsi` */

insert  into `provinsi`(`id`,`name`,`user_id`,`created`,`last_edited`,`deleted`) values (1,'Sulawesi Tengah',1,'0000-00-00 00:00:00','2016-02-04 12:59:44',1),(2,'Daerah Istmewa Yogyakarta',1,'0000-00-00 00:00:00','2016-02-03 22:27:02',0);

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(5) unsigned NOT NULL,
  `group_id` int(5) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `last_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `user_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`user_id`,`group_id`,`created`,`last_edited`) values (1,1,1,'2016-02-03 15:23:02','2016-02-03 15:23:02'),(2,2,1,'2016-02-03 15:23:02','2016-02-04 12:40:34'),(3,4,2,'2016-02-04 05:06:30','2016-02-04 11:06:30'),(4,5,2,'2016-02-04 06:17:44','2016-02-04 12:17:44');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `last_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`created`,`last_edited`,`deleted`) values (1,'made','827ccb0eea8a706c4c34a16891f84e7b','2016-02-03 15:22:06','2016-02-03 15:22:06',0),(2,'agus','fdf169558242ee051cca1479770ebac3','2016-02-03 15:22:06','2016-02-04 12:41:14',0),(4,'made123','e10adc3949ba59abbe56e057f20f883e','2016-02-04 05:06:30','2016-02-04 11:06:30',0),(5,'made1234','e10adc3949ba59abbe56e057f20f883e','2016-02-04 06:17:44','2016-02-04 13:00:46',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
