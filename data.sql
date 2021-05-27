/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.33 : Database - caphe
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `auth_activation_attempts` */

DROP TABLE IF EXISTS `auth_activation_attempts`;

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_activation_attempts` */

/*Table structure for table `auth_groups` */

DROP TABLE IF EXISTS `auth_groups`;

CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups` */

insert  into `auth_groups`(`id`,`name`,`description`) values (1,'admin','Super Admin');
insert  into `auth_groups`(`id`,`name`,`description`) values (2,'member','Thành viên');

/*Table structure for table `auth_groups_permissions` */

DROP TABLE IF EXISTS `auth_groups_permissions`;

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups_permissions` */

/*Table structure for table `auth_groups_users` */

DROP TABLE IF EXISTS `auth_groups_users`;

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_groups_users` */

insert  into `auth_groups_users`(`group_id`,`user_id`) values (1,2);
insert  into `auth_groups_users`(`group_id`,`user_id`) values (1,3);
insert  into `auth_groups_users`(`group_id`,`user_id`) values (2,3);
insert  into `auth_groups_users`(`group_id`,`user_id`) values (2,4);

/*Table structure for table `auth_logins` */

DROP TABLE IF EXISTS `auth_logins`;

CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

/*Data for the table `auth_logins` */

insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (1,'127.0.0.1','daotran@gmail.com',2,'2020-12-28 08:04:30',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (2,'127.0.0.1','daotran@gmail.com',2,'2020-12-29 07:32:47',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (3,'127.0.0.1','daotran@gmail.com',2,'2020-12-29 08:17:16',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (4,'127.0.0.1','daotran@gmail.com',2,'2020-12-29 09:18:11',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (5,'127.0.0.1','daotran@gmail.com',2,'2020-12-29 18:05:59',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (6,'127.0.0.1','daotran@gmail.com',2,'2020-12-30 00:41:38',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (7,'127.0.0.1','daotran@gmail.com',2,'2020-12-30 07:31:37',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (8,'127.0.0.1','daotran@gmail.com',2,'2020-12-30 18:05:43',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (9,'127.0.0.1','daotran@gmail.com',2,'2020-12-31 01:16:27',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (10,'127.0.0.1','daotran@gmail.com',2,'2021-01-02 04:38:51',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (11,'127.0.0.1','daotran@gmail.com',2,'2021-01-02 07:29:29',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (12,'127.0.0.1','daotran@gmail.com',2,'2021-01-03 21:38:52',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (13,'127.0.0.1','daotran@gmail.com',2,'2021-01-04 08:28:07',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (14,'127.0.0.1','daotran@gmail.com',2,'2021-01-04 08:32:04',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (15,'127.0.0.1','daotran@gmail.com',2,'2021-01-04 18:28:50',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (16,'127.0.0.1','daotran@gmail.com',2,'2021-01-05 02:13:48',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (17,'127.0.0.1','daotran@gmail.com',2,'2021-01-05 09:54:34',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (18,'127.0.0.1','daotran@gmail.com',2,'2021-01-05 21:10:52',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (19,'127.0.0.1','daotran@gmail.com',2,'2021-01-06 01:37:46',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (20,'127.0.0.1','daotran@gmail.com',2,'2021-01-07 01:51:30',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (21,'127.0.0.1','daotran@gmail.com',2,'2021-01-07 08:09:01',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (22,'127.0.0.1','daotran@gmail.com',2,'2021-01-07 09:47:01',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (23,'127.0.0.1','lytranuit@gmail.com',3,'2021-01-07 20:39:55',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (24,'127.0.0.1','daotran@gmail.com',2,'2021-01-07 20:46:44',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (25,'127.0.0.1','daotran@gmail.com',2,'2021-01-12 20:48:01',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (26,'127.0.0.1','daotran@gmail.com',2,'2021-01-13 21:17:32',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (27,'127.0.0.1','daotran@gmail.com',2,'2021-01-14 02:12:38',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (28,'127.0.0.1','daotran@gmail.com',2,'2021-01-14 20:51:17',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (29,'127.0.0.1','daotran@gmail.com',2,'2021-01-17 18:14:46',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (30,'127.0.0.1','daotran@gmail.com',2,'2021-01-18 19:32:45',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (31,'127.0.0.1','daotran@gmail.com',2,'2021-01-18 19:37:25',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (32,'127.0.0.1','daotran@gmail.com',2,'2021-01-19 22:09:21',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (33,'127.0.0.1','daotran@gmail.com',2,'2021-01-20 03:37:24',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (34,'127.0.0.1','daotran@gmail.com',2,'2021-01-20 03:39:24',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (35,'127.0.0.1','daotran@gmail.com',2,'2021-01-21 17:52:27',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (36,'127.0.0.1','daotran@gmail.com',2,'2021-01-22 03:07:19',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (37,'127.0.0.1','daotran@gmail.com',2,'2021-01-22 21:51:32',1);
insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (38,'127.0.0.1','daotran@gmail.com',2,'2021-01-24 18:08:25',1);

/*Table structure for table `auth_permissions` */

DROP TABLE IF EXISTS `auth_permissions`;

CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_permissions` */

/*Table structure for table `auth_reset_attempts` */

DROP TABLE IF EXISTS `auth_reset_attempts`;

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_reset_attempts` */

/*Table structure for table `auth_tokens` */

DROP TABLE IF EXISTS `auth_tokens`;

CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_tokens` */

/*Table structure for table `auth_users_permissions` */

DROP TABLE IF EXISTS `auth_users_permissions`;

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_users_permissions` */

/*Table structure for table `cf_category` */

DROP TABLE IF EXISTS `cf_category`;

CREATE TABLE `cf_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(256) DEFAULT NULL,
  `name_vi` varchar(256) DEFAULT NULL,
  `description_vi` text,
  `name_en` varchar(256) DEFAULT NULL,
  `description_en` text,
  `name_jp` varchar(256) DEFAULT NULL,
  `description_jp` text,
  `content_vi` text,
  `content_en` text,
  `content_jp` text,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `cf_category` */

insert  into `cf_category`(`id`,`slug`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`content_vi`,`content_en`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (1,NULL,'Gạo đặc sản','','','','','',NULL,NULL,NULL,'2020-12-31 01:36:25',2,23,0,NULL,NULL,NULL);
insert  into `cf_category`(`id`,`slug`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`content_vi`,`content_en`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (2,NULL,'Gạo xát mộc','','','','','',NULL,NULL,NULL,'2020-12-31 01:36:47',2,24,0,NULL,NULL,NULL);
insert  into `cf_category`(`id`,`slug`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`content_vi`,`content_en`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (3,'gao-lam-bun','Gạo làm bún','','','','','','','','','2020-12-31 01:36:57',2,25,0,NULL,NULL,NULL);
insert  into `cf_category`(`id`,`slug`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`content_vi`,`content_en`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (4,NULL,'Cám,Tấm','','','','','',NULL,NULL,NULL,'2020-12-31 03:23:23',2,26,0,NULL,NULL,NULL);
insert  into `cf_category`(`id`,`slug`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`content_vi`,`content_en`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (5,NULL,'Lúa các loại','','','','','',NULL,NULL,NULL,'2021-01-17 21:28:03',2,27,0,NULL,NULL,NULL);
insert  into `cf_category`(`id`,`slug`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`content_vi`,`content_en`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (6,NULL,'Phụ tùng xay xát','','','','','',NULL,NULL,NULL,'2021-01-21 18:01:47',2,28,0,NULL,NULL,NULL);
insert  into `cf_category`(`id`,`slug`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`content_vi`,`content_en`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (7,'','Đặc sản phú yên','','','','','','','','','2021-01-21 18:02:05',2,29,0,NULL,NULL,NULL);

/*Table structure for table `cf_file` */

DROP TABLE IF EXISTS `cf_file`;

CREATE TABLE `cf_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `src` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `file_type` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `real_name` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `cf_file` */

insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (1,'1609319379_7f471fbbf5153ea6be6e.jpg',NULL,'uploads/2020-12-30/1609319379_7f471fbbf5153ea6be6e.jpg',2,2147483647,'image/jpeg','Autopol.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (2,'1609319875_433e2248e918f64a4366.jpg',NULL,'uploads/2020-12-30/1609319875_433e2248e918f64a4366.jpg',2,2147483647,'image/jpeg','Autopol.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (3,'1609320099_159ed4f4b98634b08bcf.jpeg',NULL,'assets/uploads/2020-12-30/1609320099_159ed4f4b98634b08bcf.jpeg',2,634728448,'image/jpeg','Bin.jpeg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (4,'1609320101_7dc7086d3e54d117dba2.jpeg',NULL,'assets/uploads/2020-12-30/1609320101_7dc7086d3e54d117dba2.jpeg',2,781685760,'image/jpeg','dapvien.jpeg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (5,'1609402676_cb5c67968635ef214d55.jpeg',NULL,'assets/uploads/2020-12-31/1609402676_cb5c67968635ef214d55.jpeg',2,864038912,'image/jpeg','ep_vi&vonang.jpeg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (6,'1609597399_9581827338ef44075d32.jpeg',NULL,'assets/uploads/2021-01-02/1609597399_9581827338ef44075d32.jpeg',2,114354176,'image/jpeg','dd44ea97fc5c52209fc2458fbff8ad79.jpeg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (7,'1609597425_4514eb1ee8ef8f80d5d3.png',NULL,'assets/uploads/2021-01-02/1609597425_4514eb1ee8ef8f80d5d3.png',2,244817920,'image/png','fe8cc0a552551525fc8dc1e8151c0cf3.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (8,'1609771188_fe5b490d922f4859df64.png',NULL,'assets/uploads/2021-01-04/1609771188_fe5b490d922f4859df64.png',2,230090752,'image/png','app-sc-01.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (9,'1610506096_09f2c1fc69dbb336f267.jpg',NULL,'assets/uploads/2021-01-12/1610506096_09f2c1fc69dbb336f267.jpg',2,52507648,'image/jpeg','unnamed.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (10,'1610506116_a3def2e1618b0ed5ac3c.jpg',NULL,'assets/uploads/2021-01-12/1610506116_a3def2e1618b0ed5ac3c.jpg',2,190741504,'image/jpeg','8f034aefe8ac01f258bd.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (11,'1610506340_a173322efbc451aafb28.png',NULL,'assets/uploads/2021-01-12/1610506340_a173322efbc451aafb28.png',2,1043051520,'image/png','8f034aefe8ac01f258bd.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (12,'1610594269_f7b96a6b0d138b421440.png',NULL,'assets/uploads/2021-01-13/1610594269_f7b96a6b0d138b421440.png',2,674518016,'image/png','8f034aefe8ac01f258bd.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (13,'1610611978_1e4766e6418f61875e12.jpg',NULL,'assets/uploads/2021-01-14/1610611978_1e4766e6418f61875e12.jpg',2,55877632,'image/jpeg','cropped-banner-ban-cam-gao-ngoc-trai.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (14,'1610613205_43fc4dca5f9854ae3d17.jpg',NULL,'assets/uploads/2021-01-14/1610613205_43fc4dca5f9854ae3d17.jpg',2,2147483647,'image/jpeg','1.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (15,'1610613208_9253e083e9421e920f45.jpg',NULL,'assets/uploads/2021-01-14/1610613208_9253e083e9421e920f45.jpg',2,2147483647,'image/jpeg','2.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (16,'1610614557_a4f084107c8eac22cab5.jpg',NULL,'assets/uploads/2021-01-14/1610614557_a4f084107c8eac22cab5.jpg',2,2147483647,'image/jpeg','big-rice-field-morning-thailand.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (17,'1610614571_02b1d413a8d55bf1aadb.jpg',NULL,'assets/uploads/2021-01-14/1610614571_02b1d413a8d55bf1aadb.jpg',2,1193795584,'image/jpeg','white-rice-bag-with-copy-space.jpg',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (18,'1610679095_da28dbd0f13b2def0f7f.png',NULL,'assets/uploads/2021-01-14/1610679095_da28dbd0f13b2def0f7f.png',2,1542642688,'image/png','3526165.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (19,'1610928900_50333ef83c9f3bb7f794.png',NULL,'assets/uploads/2021-01-17/1610928900_50333ef83c9f3bb7f794.png',2,1066245120,'image/png','18899193.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (20,'1610929039_f99221cd9677e22bffba.png',NULL,'assets/uploads/2021-01-17/1610929039_f99221cd9677e22bffba.png',2,1138319360,'image/png','3526165.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (21,'1610936265_cd35319a436f925a3c1b.png',NULL,'assets/uploads/2021-01-17/1610936265_cd35319a436f925a3c1b.png',2,953324544,'image/png','3526165.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (22,'1610936782_517a1aae58ce3269403c.png',NULL,'assets/uploads/2021-01-17/1610936782_517a1aae58ce3269403c.png',2,1034964992,'image/png','3526165.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (23,'1611273593_c768846d56a1c58a404b.png',NULL,'assets/uploads/2021-01-21/1611273593_c768846d56a1c58a404b.png',2,269499392,'image/png','gao-dac-san.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (24,'1611273621_3beeb2ae8054a0820c5b.png',NULL,'assets/uploads/2021-01-21/1611273621_3beeb2ae8054a0820c5b.png',2,251187200,'image/png','xay-moc.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (25,'1611273644_8e320ebcb3e50149aebd.png',NULL,'assets/uploads/2021-01-21/1611273644_8e320ebcb3e50149aebd.png',2,249303040,'image/png','nguyen-lieu.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (26,'1611273667_3c9ce30733fbd97f829e.png',NULL,'assets/uploads/2021-01-21/1611273667_3c9ce30733fbd97f829e.png',2,235935744,'image/png','cam-gao.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (27,'1611273684_8ab4f9ccb5644ccc1016.png',NULL,'assets/uploads/2021-01-21/1611273684_8ab4f9ccb5644ccc1016.png',2,291017728,'image/png','lua.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (28,'1611273704_ffa0e29acf181cd0913b.png',NULL,'assets/uploads/2021-01-21/1611273704_ffa0e29acf181cd0913b.png',2,218032128,'image/png','phu-tung.png',NULL,0,NULL,NULL,NULL);
insert  into `cf_file`(`id`,`name`,`date`,`src`,`user_id`,`size`,`file_type`,`real_name`,`type`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (29,'1611273722_a97d7fc24c49ec43b075.png',NULL,'assets/uploads/2021-01-21/1611273722_a97d7fc24c49ec43b075.png',2,313111552,'image/png','dac-san.png',NULL,0,NULL,NULL,NULL);

/*Table structure for table `cf_language` */

DROP TABLE IF EXISTS `cf_language`;

CREATE TABLE `cf_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) DEFAULT NULL,
  `vi` varchar(256) DEFAULT NULL,
  `en` varchar(256) DEFAULT NULL,
  `jp` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8;

/*Data for the table `cf_language` */

insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (76,'footer_about','Giới thiệu','Introduction','紹介');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (77,'footer_fp','Kết nối với Fanpage','Visit Fanpage','ファンページへ');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (78,'footer_page','Chính sách bán hàng','Sales Policy','販売規約');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (79,'header_widget_page','Bạn cần biết','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (80,'home','Trang chủ','Home','ホーム');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (81,'login','Đăng nhập','Log In','ログイン');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (82,'info','Thông tin Cá nhân','Personal Information','お客さま情報');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (83,'logout','Đăng xuất','Log Out','ログアウト');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (84,'sign_up','Đăng ký','Register','新規登録');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (85,'title_login','Bạn mới biết tới Foodzone?','Creat new account','アカウントを作成する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (86,'login_identity_label','Tên đăng nhập','User ID','ユーザーID');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (87,'login_password_label','Mật khẩu','Password','パスワード');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (88,'login_confirm_password_label','Xác nhận lại mật khẩu','Re-enter Password','パスワード再入力');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (89,'login_name_label','Tên','Name','お名前（ローマ字）');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (90,'login_email_label','Email','Email','メールアドレス');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (91,'login_address_label','Địa chỉ','Address','住所');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (92,'login_phone_label','Số điện thoại','Phone Number','電話番号');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (93,'remember_me','Ghi nhớ','Remember Me','次回から入力を省略');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (94,'widget_header_page','Bạn cần biết','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (95,'widget_header_product_new','Hàng mới về','New Arrival','新商品');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (96,'widget_header_seen','Mua sản phẩm đã xem','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (97,'header_quick_order','','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (98,'details_mo_ta','Mô tả','Description','商品情報');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (99,'details_huong_dan','Hướng dẫn sử dụng','How To Use','使い方');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (100,'details_sp_lien_quan','Sản phẩm liên quan','Related Product','関連商品');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (101,'danh_muc','Danh mục sản phẩm','Category','カテゴリー');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (102,'topic','Chủ đề','Recipe','レシピ');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (103,'post','Bài viết','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (104,'khuyen_mai','SIÊU KHUYẾN MẠI','PROMOTION','お買い得');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (105,'index_menu_slide','Danh mục sản phẩm','Category','カテゴリー');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (106,'result_search','Kết quả tìm kiếm','Search Results','検索結果');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (107,'qui_cach','Qui cách','Unit','規格');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (108,'xuat_xu','Xuất xứ','Origin','原産国');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (109,'bao_quan','Bảo quản','Storage','保管温度');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (110,'han_su_dung','Hạn sử dụng','Shelf Life','賞味期間');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (111,'add_to_cart','Thêm vào Giỏ hàng','Add to Cart','商品をかごに追加');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (112,'code','Mã hàng','Product ID','商品ID');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (113,'dvt','ĐVT','Unit','規格');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (114,'view','Xem nhanh','Quick View','クイックビュー');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (115,'all','Tất cả','All','すべて');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (116,'date','Ngày','Date','日付');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (117,'posted_by','Đăng bởi','Posted_by','投稿者');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (118,'share','Chia sẻ','Share','シェア');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (119,'product_name','Sản phẩm','Product','商品');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (120,'quantity','Số lượng','Quantity','数量');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (121,'amount','Tổng tiền','Total Amount','合計');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (122,'action','Thao tác','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (123,'total','Thành tiền','Amount','小計');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (124,'service_fee','Phí giao hàng','Shipping Fee','送料');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (125,'order_btn','Điền thông tin giao hàng','Input delivery information','ご購入手続きへ');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (126,'order_title','Đơn hàng','Order list','オーダーリスト');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (127,'cart_title','Giỏ hàng','Cart','買い物かご');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (128,'cart_info_title','Địa chỉ nhận hàng','Delivery Address','送付先');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (129,'cart_anwser','Bạn đã có Tài khoản?','Already have an Account?','すでにアカウントをお持ちですか？');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (130,'cart_info_name','Tên người nhận','Name','氏名（ローマ字でご記入ください）');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (131,'cart_info_note','Ghi chú cho Shop (nếu có)','Note','備考');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (132,'cart_finish','Hoàn tất đơn hàng','Confirm Order','注文を確定する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (133,'cart_text_finish','Đặt hàng thành công! FOODZONE sẽ liên hệ với bạn sớm nhất.','Thank you for your order!','ご注文ありがとうございました!');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (134,'cart_next','Tiếp tục mua hàng','Continue Shopping','買い物を続ける');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (135,'cart_alert','Đã thêm vào Giỏ hàng!','Item has been added to Shopping Cart!','商品をかごに追加しました！');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (136,'footer_tru_so','Trụ sở chính','Head Office Location','本社所在地');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (137,'footer_phone','Liên hệ','Contact','お問い合わせ');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (138,'footer_open','Giờ mở cửa','Opening Hours','営業時間');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (139,'footer_customer','Chăm sóc Khách hàng','Customer Service','カスタマーサービス');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (140,'search_text','Tìm sản phẩm','Search','検索');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (141,'or','hoặc','or','または');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (142,'no_result','Không tìm thấy kết quả tìm kiếm','Result Not Found','検索結果がみつかりませんでした');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (143,'header_text_ship','Miễn phí vận chuyển','Free Shipping','送料無料');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (144,'header_text_ship_sub','Đơn hàng từ 500k - Khu vực nội thành','For order amount from VND 500,000 up','500,000ドン以上のご注文');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (145,'header_text_hotline','Hỗ trợ 24/7','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (146,'header_text_hotline_sub','Hotline: ','Hotline:','お問い合わせ番号');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (147,'header_text_opening','Giờ làm việc','Opening Hour','営業時間');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (148,'header_text_opening_sub','T2 - T7 ( 08 -18h )','Mon - Sat ( 8AM - 6PM )','月～土 ( 8時～18時 )');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (149,'history_order','Lịch sử đơn hàng','Order History','購入履歴');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (150,'remove','Xóa','Delete','削除');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (151,'selected','Đã chọn','Selected - Deliver to this address','選択済 - この住所へ送付する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (152,'no_selected','Chọn địa chỉ','Select','選択');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (153,'new_address','Địa chỉ nhận hàng mới','Deliver to new address','別の住所へ送る');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (154,'cart_info_delivery','Ngày giao hàng','Delivery Date','お届け日指定');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (155,'my_order','Đơn hàng của tôi','My Cart','買い物かご');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (156,'code_order','Mã đơn hàng','PO Number','注文番号');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (157,'date_order','Ngày mua hàng','Order Date','注文日');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (158,'amount_order','Tổng tiền','Total Amount','合計金額');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (159,'status_order','Trạng thái đơn hàng','Status','ステータス');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (160,'details_order','Chi tiết đơn hàng','Order Detail','注文明細');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (161,'price_order','Đơn giá','Unit price','単価');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (162,'cancle_order','Hủy đơn hàng','Cancel','キャンセル');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (163,'lien_ket','Hỗ trợ khách hàng','Customer Support','カスタマーサポート');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (164,'footer_hdmh','Hướng dẫn mua hàng','Shopping Guide','ショッピングガイド');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (165,'footer_cstt','Chính sách về thanh toán, giao nhận, vận chuyển','Payment / Delivery / Transportation Policy','規約（支払 / 配送 / 物流）');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (166,'footer_csdh','Chính sách đổi hàng, trả hàng, hoàn tiền','Return / Exchange / Refund Policy','規約（返品 / 交換）');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (167,'footer_csbm','Chính sách bảo mật','Security Policy','セキュリティポリシー');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (168,'login_area_label','Quận','District','区');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (169,'other_area','Khu vực khác','Other Area','その他エリア');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (170,'price_zero','Phí theo nhà vận chuyển','Shipping fee will be informed later','送料について、後ほどご連絡します');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (171,'policy_delivery','Miễn phí giao hàng cho đơn hàng từ 500,000 ₫ trở lên','Free Shipping for 500,000VND+','500,000ドン以上のご注文で、送料無料です');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (172,'policy_vat','Giá niêm yết bao gồm VAT','The listed prices include VAT','表示価格は全てVAT込です');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (173,'policy_pay','Thanh toán bằng chuyển khoản ngân hàng hoặc tiền mặt','Payment : Methods Bank Transfer / Cash','お支払い方法 : 銀行振込 / 現金');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (174,'policy_support','Vui lòng gọi 028 777 04567 để biết thêm chi tiết','Please call  028 777 04567 for more details','お問い合わせは 028 777 04567 へお電話ください');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (175,'remove_cart','Xóa khỏi giỏ hàng?','Do you want to remove this item?','このアイテムを削除しますか？');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (176,'default','Mặc định','Default',' デフォルト');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (177,'high_to_low','Giá cao->thấp','Price: High to Low','価格 : 高から低');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (178,'low_to_high','Giá thấp->cao','Price: Low to High','価格 : 低から高');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (179,'status_1','Mới đặt hàng','Just ordered- Waiting for confirmation','ご注文確認中');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (180,'status_2','Đã xác nhận, chờ giao','Confirmed - waiting for Delivery','確認済 - 配送準備中');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (181,'status_3','Đã thanh toán','Paid','支払済');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (182,'status_4','Hoàn tất giao hàng','Delivered','配送済');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (183,'status_5','Đã hủy','Cancelled','キャンセル済');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (184,'status_6','Đã khóa','Locked',' ロックされた');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (185,'status_7','Đã sửa','Fixed','修繕された');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (186,'status_8','Đang giao hàng','Under Delivery','配送中');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (187,'login_successful','Đăng nhập thành công','Logged in successfully.','ログインに成功しました');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (188,'login_unsuccessful','Tài khoản hoặc mật khẩu không đúng','Wrong email or password','ID、パスワードの入力に誤りがあるか登録されていません');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (189,'login_unsuccessful_not_active','Tài khoản này đã bị khoá','Your account has been locked.','アカウントがブロックされました');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (190,'login_timeout','Tài khoản này đã tạm thời bị khoá, vui lòng thử lại sau','Login has been timeout.','ログインがタイムアウトしました');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (191,'logout_successful','Đăng xuất thành công','Successfully logged out.','正常にログアウトしました');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (192,'change_password_old_password_label','Mật khẩu cũ:','Old Password','現在のパスワード');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (193,'change_password_new_password_label','Mật khẩu mới (ít nhất %s ký tự):','New Password','新しいパスワード');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (194,'change_password_new_password_confirm_label','Xác nhận mật khẩu mới:','Confirm New Password','新しいパスワードの再入力');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (195,'change_password_submit_btn','Lưu lại','Save','確定する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (196,'thay_doi_password','Thay đổi mật khẩu','Change Password','パスワード変更');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (197,'password_change_successful','Đã thay đổi mật khẩu thành công','Password changed successfully.','パスワードが変更されました');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (198,'password_change_unsuccessful_oldpassword','Mật khẩu cũ không đúng','Your old password appears to be incorrect.','現在のパスワードに誤りがあります');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (199,'password_change_unsuccessful_confirmpassword','Xác nhận mật khẩu mới không đúng.','The password confirm does not match.','再入力されたパスワードが不一致です');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (200,'account_creation_duplicate_email','Địa chỉ email không hợp lệ hoặc đã được sử dụng','Email is invalid or already taken.','すでに使用されているEメールアドレスです');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (201,'account_creation_duplicate_identity','Tên tài khoản không hợp lệ hoặc đã được sử dụng','Username is already taken.','すでに使用されているユーザーネームです');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (202,'index_topic','NGUYÊN LIỆU THEO MÓN ĂN','RECIPES','レシピから食材を選ぶ');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (203,'login_forgot_password','Quên mật khẩu?','Forgot Password?','パスワードをお忘れですか？');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (204,'forgot_password_identity_label','Email:','Email:','メールアドレス :');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (205,'change_password_heading','Đổi mật khẩu','Change password','パスワードを変更する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (206,'change_password_validation_old_password_label','Mật khẩu cũ','Old password','以前のパスワード');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (207,'change_password_validation_new_password_label','Mật khẩu mới','New password','新しいパスワード');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (208,'change_password_validation_new_password_confirm_la','Xác nhận mật khẩu mới','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (209,'forgot_password_heading','Quên mật khẩu','Send password to registered Email address.','登録メールアドレスへパスワードを送信');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (210,'forgot_password_subheading','Vui lòng nhập %s để nhận được email khôi phục mật khẩu.','Please enter your %s that you want to reset the password.','パスワードをリセットしたい％sを入力してください。');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (211,'forgot_password_email_label','%s:','%s:','%s:');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (212,'forgot_password_submit_btn','Xác nhận','Send','送信');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (213,'forgot_password_validation_email_label','Email','Email address',' メールアドレス');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (214,'forgot_password_username_identity_label','Tài khoản','Username','ユーザー名');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (215,'forgot_password_email_identity_label','Email','Email','Eメール');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (216,'forgot_password_email_not_found','Địa chỉ email không tồn tại.','Your email doesn','Eメールは存在しません。');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (217,'forgot_password_identity_not_found','No record of that username address.','','ユーザーネームは存在しません');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (218,'password_change_unsuccessful','Không thể thay đổi mật khẩu vào lúc này','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (219,'forgot_password_successful','Email khôi phục mật khẩu đã được gửi đi','Password reset email sent','パスワード再設定Eメールを送信しました。');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (220,'forgot_password_unsuccessful','Không thể khôi phục mật khẩu vào lúc này','','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (221,'email_forgotten_password_subject','Xác nhận quên mật khẩu','Reset password confirmation',' パスワードのリセットを認証する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (222,'email_forgot_password_heading','Khôi phục mật khẩu cho %s','You have requested to reset the password for %s','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (223,'email_forgot_password_subheading','Vui lòng click vào link này để %s.','Your password has been reset. Please %s','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (224,'email_forgot_password_link','Khôi phục mật khẩu của bạn','click here to log in.','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (225,'reset_password_heading','Đổi mật khẩu','Change password','パスワードを変更する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (226,'reset_password_new_password_label','Mật khẩu mới (ít nhất %s ký tự):','New password (must be %s characters):','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (227,'reset_password_new_password_confirm_label','Xác nhận mật khẩu mới:','Confirm new password','新しいパスワードを認証する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (228,'reset_password_submit_btn','Lưu lại','Save','保存する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (229,'reset_password_validation_new_password_label','Mật khẩu mới','New password','新しいパスワード');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (291,'choose_area','Chọn khu vực','Choose your region','お住まいの地域を選択してください');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (292,'des_area','Hãy chọn khu vực của bạn. Bạn có thể thay đổi khu vực tại đầu trang.','Please select your region or you can change at the top of website.','ページ上部のタブより、いつでも変更可能です');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (293,'yes_area','Đồng ý','Accept','選択');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (294,'area_N','Miền Nam','South','南部');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (295,'area_B','Miền Bắc','North','北部');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (296,'area_T','Miền Trung','Central','中部');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (297,'inv_text','Xuất hóa đơn tài chính','Issue a financial invoice','レッドインボイスを発行する');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (298,'inv_header','Thông tin xuất hóa đơn','Company Information','会社情報');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (299,'inv_name','Tên người mua hàng','Company Name','会社名');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (300,'inv_address','Địa chỉ','Issue Address','住所');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (301,'inv_tax_code','Mã số thuế','Tax code','TAXコード');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (384,'language','Ngôn ngữ','Language','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (385,'dashboard','Tổng quan','Dashboard','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (386,'news','Tin tức','News','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (387,'slider','Silder','Silder','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (388,'general','Cài đặt chung','General Settings','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (389,'account','Tài khoản','Account','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (390,'menu','Menu','Menu','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (391,'product','Sản phẩm','Product','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (392,'product_category','Danh mục sản phẩm','Product Category','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (393,'news_category','Danh mục tin tức','News Category','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (394,'setting','Cài đặt','Settings','');
insert  into `cf_language`(`id`,`key`,`vi`,`en`,`jp`) values (395,'page','Trang','Page','');

/*Table structure for table `cf_menu` */

DROP TABLE IF EXISTS `cf_menu`;

CREATE TABLE `cf_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(256) DEFAULT NULL,
  `name_en` varchar(256) DEFAULT NULL,
  `name_jp` varchar(256) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL,
  `category_id` int(11) DEFAULT '0',
  `order` int(11) DEFAULT '0',
  `parent_id` int(11) DEFAULT '0',
  `deleted` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `cf_menu` */

insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (1,'Sản phẩm','','',2,'#',1,1,0,1,'2021-01-02 04:58:49',NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (2,'Giới thiệu','','',4,'#',2,0,0,0,NULL,NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (3,'Sản phẩm','','',2,'#',0,1,0,0,NULL,NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (4,'Gạo','','',2,'#',1,0,0,0,'2021-01-03 22:09:32',NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (5,'Liên hệ','','',4,'#',1,7,0,0,NULL,NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (6,'Vật tư','','',1,'#',0,4,0,0,'2021-01-13 21:18:52',NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (7,'Tin tức','','',3,'#',0,6,0,0,NULL,NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (8,'Trại giống','','',1,'#',0,2,0,0,'2021-01-13 21:18:48',NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (9,'Vùng sản xuất','','',1,'#',0,3,0,0,'2021-01-13 21:18:50',NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (10,'Gạo đặc sản phú yên','','',2,'#',1,2,0,0,NULL,NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (11,'Gạo làm bún','','',2,'#',3,3,0,0,NULL,NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (12,'Gạo xát mộc','','',2,'#',2,4,0,0,NULL,NULL,NULL);
insert  into `cf_menu`(`id`,`name_vi`,`name_en`,`name_jp`,`type`,`link`,`category_id`,`order`,`parent_id`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (13,'Đặc sản phú yên','','',2,'#',7,5,0,0,NULL,NULL,NULL);

/*Table structure for table `cf_news` */

DROP TABLE IF EXISTS `cf_news`;

CREATE TABLE `cf_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_vi` varchar(256) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `content_vi` text,
  `title_en` varchar(256) DEFAULT NULL,
  `content_en` text,
  `title_jp` varchar(256) DEFAULT NULL,
  `content_jp` text,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `cf_news` */

insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (2,'Highcharts Demo',NULL,'<p>helolololdfgdfgdfg<span class=\"fr-video fr-dvb fr-draggable\" contenteditable=\"false\" draggable=\"true\"><iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/jkfLbg_aMbA\" frameborder=\"0\" allowfullscreen=\"\"></iframe></span></p>',NULL,NULL,NULL,NULL,'2020-04-19 21:51:58',5,8,1,'2020-12-31 03:19:05',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (3,'Test youtube',NULL,'<p><span class=\"fr-video fr-dvb fr-draggable\" contenteditable=\"false\" draggable=\"true\"><iframe width=\"640\" height=\"360\" src=\"//www.youtube.com/embed/aYOOXs4yjYI?wmode=opaque\" frameborder=\"0\" allowfullscreen=\"\"></iframe></span></p>',NULL,NULL,NULL,NULL,'2020-04-19 22:01:39',5,8,1,'2020-12-31 03:19:04',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (4,'Phí vận chuyển tại Foodzone',NULL,'<table data-mce-style=\"width: 1041px; margin-left: auto; margin-right: auto;\"><tbody><tr data-mce-style=\"height: 80px;\"><td data-mce-style=\"width: 202.4px; text-align: center; height: 80px;\"><span data-mce-style=\"font-size: 11pt;\"><strong>Gi&aacute; trị h&oacute;a đơn</strong></span><br></td><td data-mce-style=\"width: 202.4px; text-align: center; height: 80px;\"><span data-mce-style=\"font-size: 11pt;\"><strong>1/3/4/5/6/8/</strong></span><br><span data-mce-style=\"font-size: 11pt;\"><strong>10/11/&nbsp;</strong></span><span data-mce-style=\"font-size: 11pt;\"><strong>Ph&uacute; Nhuận</strong></span><br></td><td data-mce-style=\"width: 164px; text-align: center; height: 80px;\"><span data-mce-style=\"font-size: 11pt;\"><strong>7/T&acirc;n B&igrave;nh/T&acirc;n Ph&uacute;/B&igrave;nh Thạnh</strong></span></td><td data-mce-style=\"width: 203.2px; text-align: center; height: 80px;\"><span data-mce-style=\"font-size: 11pt;\"><strong>2</strong></span></td><td data-mce-style=\"width: 260.8px; text-align: center; height: 80px;\"><span data-mce-style=\"font-size: 11pt;\"><strong>12/G&ograve; Vấp/Kh&aacute;c</strong></span></td></tr><tr data-mce-style=\"height: 54px;\"><td data-mce-style=\"width: 179.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">&ge;500.000đ</span></td><td data-mce-style=\"width: 202.4px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\"><strong>Miễn ph&iacute;</strong></span></td><td data-mce-style=\"width: 164px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\"><strong>Miễn ph&iacute;</strong></span></td><td data-mce-style=\"width: 203.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\"><strong>Miễn ph&iacute;</strong></span></td><td data-mce-style=\"width: 260.8px; height: 325px;\" rowspan=\"6\"><span data-mce-style=\"font-size: 10pt;\">Theo gi&aacute; nh&agrave; vận chuyển</span></td></tr><tr data-mce-style=\"height: 54px;\"><td data-mce-style=\"width: 179.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">&ge;400.000đ</span></td><td data-mce-style=\"width: 202.4px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">10.000</span></td><td data-mce-style=\"width: 164px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">15.000</span></td><td data-mce-style=\"width: 203.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 10pt;\">20.000</span></td></tr><tr data-mce-style=\"height: 54px;\"><td data-mce-style=\"width: 179.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">&ge;300.000đ</span></td><td data-mce-style=\"width: 202.4px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">15.000</span></td><td data-mce-style=\"width: 164px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">25.000</span></td><td data-mce-style=\"width: 203.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 13.3333px;\">30.000</span></td></tr><tr data-mce-style=\"height: 54px;\"><td data-mce-style=\"width: 179.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">&ge;200.000đ</span></td><td data-mce-style=\"width: 202.4px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">20.000</span></td><td data-mce-style=\"width: 164px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">30.000</span></td><td data-mce-style=\"width: 203.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 10pt;\">40.000</span></td></tr><tr data-mce-style=\"height: 54px;\"><td data-mce-style=\"width: 179.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">&ge;100.000đ</span></td><td data-mce-style=\"width: 202.4px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">25.000</span></td><td data-mce-style=\"width: 164px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">35.000</span></td><td data-mce-style=\"width: 203.2px; height: 54px; text-align: center;\"><span data-mce-style=\"font-size: 10pt;\">50.000</span></td></tr><tr data-mce-style=\"height: 55px;\"><td data-mce-style=\"width: 179.2px; height: 55px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">&lt;100.000đ&nbsp;</span></td><td data-mce-style=\"width: 202.4px; height: 55px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">30.000</span></td><td data-mce-style=\"width: 164px; height: 55px; text-align: center;\"><span data-mce-style=\"font-size: 11pt;\">40.000</span></td><td data-mce-style=\"width: 203.2px; height: 55px; text-align: center;\"><span data-mce-style=\"font-size: 10pt;\">60.000</span></td></tr></tbody></table>',NULL,NULL,NULL,NULL,'2020-06-01 23:42:04',5,2860,1,'2020-12-31 03:19:02',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (5,'Hướng dẫn mua hàng',NULL,'<p><strong>Bước 1: Chọn sản phẩm</strong></p><p>&nbsp;Tại trang chủ <a href=\"http://www.foodzone.vn/\"><span>www.foodzone.vn</span></a>, để gi&uacute;pbạn dễ d&agrave;ng lựa chọn hơn, ch&uacute;ng t&ocirc;i đ&atilde; ph&acirc;n loại sản phẩm theo nh&oacute;m. Ngo&agrave;i ra,bạn c&oacute; thể nhập trực tiếp mặt h&agrave;ng m&igrave;nh muốn mua v&agrave;o thanh c&ocirc;ng cụ t&igrave;m kiếm.</p><p>Di chuột v&agrave;o mặt h&agrave;ng muốn mua. Bấm &ldquo;<strong>Xem nhanh</strong>&rdquo; để biết được th&ocirc;ng tin sơ bộ của sản phẩm.</p><p>Nhấp &ldquo;Th&ecirc;m v&agrave;o giỏ h&agrave;ng&rdquo;&nbsp;<img class=\"fr-dib fr-draggable fr-fil\" src=\"http://www.foodzone.vn/public/uploads/2020-08-25/1598333652.png\" style=\"width: 181px; height: 42.8367px;\"></p><p>Nếu bạn đ&atilde; mua đủ sản phẩm, nhấp v&agrave;o biểu tượng giỏ h&agrave;ng (gần ngay thanh c&ocirc;ng cụ t&igrave;m kiếm sản phẩm).&nbsp;<img class=\"fr-dib fr-draggable fr-fil\" src=\"http://www.foodzone.vn/public/uploads/2020-08-25/1598333701.png\" style=\"width: 49px; height: 41.2632px;\"></p><p>Tại đ&acirc;y, bạn sẽ c&oacute; th&ocirc;ng tin tất cả sản phẩm m&igrave;nh đ&atilde; mua, bao gồm cả gi&aacute; tiền cần phải thanh to&aacute;n.</p><p>&nbsp;<strong>Bước 2: Điền th&ocirc;ng tin giao h&agrave;ng</strong></p><p>Nếu bạn c&oacute; t&agrave;i khoản <a href=\"http://www.foodzone.vn\"><span>www.foodzone.vn</span></a>, trang web sẽ lưu lại địa chỉ giao h&agrave;ng cho lần sau v&agrave; dễ quản l&yacute; t&agrave;i khoản v&agrave; đơn h&agrave;ng của bạn hơn.</p><p>Nếu bạn chưa c&oacute; t&agrave;i khoản, phiền bạn điền c&aacute;c th&ocirc;ng tin: T&ecirc;n, email, số điện thoại, địa chỉ nhận h&agrave;ng&hellip;&nbsp;</p><p><strong>Bước 3: Ho&agrave;n tất đặt h&agrave;ng</strong></p><p>Sau khi đền đầy đủ th&ocirc;ng tin, kiểm tra lại số lượng, h&agrave;ng h&oacute;a bạn mua.&nbsp;</p><p>Nhấn n&uacute;t &quot;<strong>HO&Agrave;N TẤT ĐƠN H&Agrave;NG</strong>&rdquo;<span>&nbsp;</span><br><span><img class=\"fr-dib fr-draggable fr-fil\" src=\"http://www.foodzone.vn/public/uploads/2020-08-25/1598333743.png\" style=\"width: 164px; height: 37.1733px;\"></span></p><p>Nếu đơn h&agrave;ng của bạn th&agrave;nh c&ocirc;ng sẽ hiện <strong>&ldquo;Đơn h&agrave;ng của bạn đ&atilde; th&agrave;nh c&ocirc;ng! FOODZONE sẽ li&ecirc;n hệ với bạn sớm nhất.&rdquo;</strong></p>','','','','','2020-06-28 00:08:52',5,0,0,'2020-12-31 03:19:01',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (6,'Chính sách về thanh toán, giao nhận, vận chuyển',NULL,'<p><strong><u>1. Điều khoản về thanh to&aacute;n:</u></strong></p><p>&nbsp; &nbsp;Đối với kh&aacute;ch h&agrave;ng tại Tp.HCM, Đ&agrave; Nẵng, H&agrave; Nội , việc thanh to&aacute;n c&oacute; thể bằng tiền mặt cho nh&acirc;n vi&ecirc;n giao h&agrave;ng tại thời điểm nhận h&agrave;ng, hoặc bằng chuyển khoản qua ng&acirc;n h&agrave;ng trước khi giao h&agrave;ng. Đối với kh&aacute;ch h&agrave;ng ở c&aacute;c tỉnh th&agrave;nh kh&aacute;c, vui l&ograve;ng thanh to&aacute;n bằng chuyển khoản trước khi Sim Ba gửi h&agrave;ng. Chi tiết ng&acirc;n h&agrave;ng để chuyển khoản như sau:</p><p style=\"margin-left: 20px;\">Người thụ hưởng:<strong><span>&nbsp;</span>C&ocirc;ng ty Cổ Phần Thương Mại Sim Ba</strong><br>Ng&acirc;n h&agrave;ng Vietcombank: T&agrave;i khoản số <strong>0421003918237 tại ng&acirc;n h&agrave;ng Vietcombank &ndash; Tp. HCM&nbsp;</strong><br>Ng&acirc;n h&agrave;ng &Aacute; Ch&acirc;u: T&agrave;i khoản số <strong>11095399 tại ng&acirc;n h&agrave;ng ACB - Tp. HCM.</strong><br>Ng&acirc;n h&agrave;ng Standard Chartered Bank: T&agrave;i khoản số <strong>99143933299 tại ng&acirc;n h&agrave;ng Standard Chartered &ndash; Tp. HCM.</strong></p><p><u><strong>2. Điều khoản Giao h&agrave;ng:</strong></u></p><p>- Đối với c&aacute;c kh&aacute;ch h&agrave;ng tại Tp.HCM, Đ&agrave; nẵng, H&agrave; nội, h&agrave;ng h&oacute;a sẽ được giao trong v&ograve;ng 24-48 giờ kể từ khi Foodzone.vn x&aacute;c nhận đơn h&agrave;ng qua điện thoại, fax hoặc email.<br>- Đối với c&aacute;c kh&aacute;ch h&agrave;ng ở địa phương kh&aacute;c, h&agrave;ng h&oacute;a sẽ được giao trong v&ograve;ng 24-72 giờ kể từ khi Foodzone.vn nhận được thanh to&aacute;n qua chuyển khoản ng&acirc;n h&agrave;ng. Vui l&ograve;ng th&ocirc;ng b&aacute;o cho Foodzone.vn bằng số 028 7770 4567 , fax 028-62999708 hoặc email đến Foodzone.vn nếu trong khoảng thời gian tr&ecirc;n qu&yacute; kh&aacute;ch h&agrave;ng vẫn chưa nhận được h&agrave;ng.</p><p>Việc gửi h&agrave;ng bằng đường bưu điện đ&ocirc;i khi c&oacute; thể c&oacute; sự chậm trễ do c&aacute;c điều kiện kh&aacute;ch quan như thi&ecirc;n tai, tai nạn, v.v&hellip; Những việc chậm trễ như vậy sẽ được coi l&agrave; trường hợp bất khả kh&aacute;ng.</p><p><u><strong><strong><em>3. C&aacute;c điều k</em></strong>hoản kh&aacute;c:</strong></u><br>- Gi&aacute; cả được ni&ecirc;m yết tr&ecirc;n website đ&atilde; bao gồm thuế gi&aacute; trị gia tăng VAT;<br>- Foodzone chịu tr&aacute;ch nhiệm về chất lượng h&agrave;ng h&oacute;a v&agrave; dịch vụ cung cấp cho kh&aacute;ch h&agrave;ng;<br>- Foodzone c&oacute; tr&aacute;ch nhiệm cung cấp c&aacute;c giấy tờ ph&aacute;p l&yacute; li&ecirc;n quan đến h&agrave;ng h&oacute;a như c&aacute;c c&ocirc;ng bố chất lượng, giấy chứng nhận đạt chất lượng nhập khẩu, xuất xứ h&agrave;ng h&oacute;a, v.v&hellip;</p>','','','','','2020-06-28 00:09:00',5,0,0,'2020-12-31 03:18:59',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (7,'Chính sách đổi hàng, trả hàng, hoàn tiền',NULL,'<p><u><strong>1. Việc Hủy đơn h&agrave;ng:</strong></u><br>Trước khi h&agrave;ng được giao, đơn h&agrave;ng đ&atilde; đặt c&oacute; thể được hủy. Kh&aacute;ch h&agrave;ng vui l&ograve;ng gọi đến số Hotline 028 7770 4567 để hủy đơn h&agrave;ng.<br><br><u><strong>2. Việc đổi h&agrave;ng, trả h&agrave;ng, ho&agrave;n tiền:</strong></u></p><p><strong><u>(Kh&ocirc;ng &aacute;p dụng cho h&agrave;ng Khuyến M&atilde;i).</u></strong><br>Sau khi mua h&agrave;ng v&agrave; nhận được h&agrave;ng, Kh&aacute;ch h&agrave;ng c&oacute; thể đổi h&agrave;ng trong v&ograve;ng 03 ng&agrave;y sau khi nhận được h&agrave;ng. Trường hợp Kh&aacute;ch h&agrave;ng muốn đổi h&agrave;ng, vui l&ograve;ng kh&ocirc;ng mở bao b&igrave; hoặc ni&ecirc;m phong h&agrave;ng h&oacute;a, v&agrave; gọi số Hotline 028 7770 4567 hoặc Fax (028) 62999708 hoặc email</p><p><u><strong>1. Việc Hủy đơn h&agrave;ng:</strong></u><br>Trước khi h&agrave;ng được giao, đơn h&agrave;ng đ&atilde; đặt c&oacute; thể được hủy. Kh&aacute;ch h&agrave;ng vui l&ograve;ng gọi đến số Hotline 028 7770 4567 để hủy đơn h&agrave;ng.<br><br><u><strong>2. Việc đổi h&agrave;ng, trả h&agrave;ng, ho&agrave;n tiền:</strong></u></p><p><strong><u>(Kh&ocirc;ng &aacute;p dụng cho h&agrave;ng Khuyến M&atilde;i).</u></strong></p><p><br>Sau khi mua h&agrave;ng v&agrave; nhận được h&agrave;ng, Kh&aacute;ch h&agrave;ng c&oacute; thể đổi h&agrave;ng trong v&ograve;ng 03 ng&agrave;y sau khi nhận được h&agrave;ng. Trường hợp Kh&aacute;ch h&agrave;ng muốn đổi h&agrave;ng, vui l&ograve;ng kh&ocirc;ng mở bao b&igrave; hoặc ni&ecirc;m phong h&agrave;ng h&oacute;a, v&agrave; gọi số Hotline 028 7770 4567 hoặc Fax (028) 62999708 hoặc email Foodzone.vn để đổi h&agrave;ng;<br><br>Việc Trả h&agrave;ng c&oacute; thể được thực hiện trong v&ograve;ng 03 ng&agrave;y kể từ khi Kh&aacute;ch h&agrave;ng nhận h&agrave;ng. Vui l&ograve;ng kh&ocirc;ng mở bao b&igrave; h&agrave;ng h&oacute;a hoặc ni&ecirc;m phong của h&agrave;ng muốn trả. Trường hợp qu&yacute; kh&aacute;ch mua h&agrave;ng c&oacute; sản phẩm khuyến m&atilde;i k&egrave;m theo, h&agrave;ng khuyến m&atilde;i cần được trả c&ugrave;ng với h&agrave;ng mua.<br><br>Chi ph&iacute; vận chuyển/giao nhận li&ecirc;n quan đến đổi/trả h&agrave;ng sẽ do Foodzone.vn chịu, nếu việc đổi/trả h&agrave;ng do lỗi của Foodzone.vn; trường hợp việc đổi trả do &yacute; muốn chủ quan của kh&aacute;ch h&agrave;ng, th&igrave; Kh&aacute;ch h&agrave;ng sẽ chịu ph&iacute; vận chuyển/giao nhận. Địa chỉ nhận h&agrave;ng đổi trả như sau:</p><p>&nbsp; <strong>&nbsp;C&ocirc;ng ty TNHH Thương Mại Sim Ba<br>&nbsp; &nbsp;R1-08-03, T&ograve;a nh&agrave; EverRich,<br>&nbsp; &nbsp;Số 968 Ba Th&aacute;ng Hai, Phường 15, Quận 11, Tp.HCM.</strong><br><br><u><strong>3. Ho&agrave;n tiền:</strong></u><br>Foodzone.vn cam kết sẽ ho&agrave;n tiền cho Kh&aacute;ch h&agrave;ng trong v&ograve;ng 03 ng&agrave;y sau khi nhận được v&agrave; x&aacute;c nhận t&igrave;nh trạng của h&agrave;ng đổi trả.<br><br><u><strong>4. Việc Khiếu nại chất lượng h&agrave;ng h&oacute;a:</strong></u><br>Trường hợp Kh&aacute;ch h&agrave;ng c&oacute; khiếu nại về chất lượng h&agrave;ng h&oacute;a, vui l&ograve;ng gọi số Hotline 028 7770 4567 hoặc Fax (028) 62 999 708) trong v&ograve;ng 07 ng&agrave;y kể từ khi nhận được h&agrave;ng. Foodzone.vn sẽ li&ecirc;n lạc ngay với kh&aacute;ch h&agrave;ng để giải quyết c&aacute;c khiếu nại.</p>',NULL,NULL,NULL,NULL,'2020-06-28 00:09:08',5,0,0,'2020-12-31 03:18:58',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (8,'Chính sách bảo mật',NULL,'<p>Foodzone.vn cam kết sẽ bảo mật những th&ocirc;ng tin mang t&iacute;nh ri&ecirc;ng tư của bạn. Bạn vui l&ograve;ng đọc bản &ldquo;Ch&iacute;nh s&aacute;ch bảo mật&rdquo; dưới đ&acirc;y để hiểu hơn những cam kết m&agrave; ch&uacute;ng t&ocirc;i thực hiện, nhằm t&ocirc;n trọng v&agrave; bảo vệ quyền lợi của người truy cập:</p><p><strong>1. Mục đ&iacute;ch v&agrave; phạm vi thu thập</strong></p><p>- Để truy cập v&agrave; sử dụng một số dịch vụ tại Foodzone.vn, bạn c&oacute; thể sẽ được y&ecirc;u cầu đăng k&yacute; với ch&uacute;ng t&ocirc;i th&ocirc;ng tin c&aacute; nh&acirc;n (Email, Họ t&ecirc;n, Số ĐT li&ecirc;n lạc&hellip;). Mọi th&ocirc;ng tin khai b&aacute;o phải đảm bảo t&iacute;nh ch&iacute;nh x&aacute;c v&agrave; hợp ph&aacute;p. Foodzone.vn kh&ocirc;ng chịu mọi tr&aacute;ch nhiệm li&ecirc;n quan đến ph&aacute;p luật của th&ocirc;ng tin khai b&aacute;o.&nbsp;</p><p>- Ch&uacute;ng t&ocirc;i cũng c&oacute; thể thu thập th&ocirc;ng tin về số lần viếng thăm, bao gồm số trang bạn xem, số links (li&ecirc;n kết) bạn click v&agrave; những th&ocirc;ng tin kh&aacute;c li&ecirc;n quan đến việc kết nối đến site Foodzone.vn. Ch&uacute;ng t&ocirc;i cũng thu thập c&aacute;c th&ocirc;ng tin m&agrave; tr&igrave;nh duyệt Web (Browser) bạn sử dụng mỗi khi truy cập v&agrave;o Foodzone.vn, bao gồm: địa chỉ IP, loại Browser, ng&ocirc;n ngữ sử dụng, thời gian v&agrave; những địa chỉ m&agrave; Browser truy xuất đến.</p><p><strong>2. Phạm vi sử dụng th&ocirc;ng tin</strong></p><p>Foodzone.vn thu thập v&agrave; sử dụng th&ocirc;ng tin c&aacute; nh&acirc;n bạn với mục đ&iacute;ch ph&ugrave; hợp v&agrave; ho&agrave;n to&agrave;n tu&acirc;n thủ nội dung của &ldquo;Ch&iacute;nh s&aacute;ch bảo mật&rdquo; n&agrave;y. Khi cần thiết, ch&uacute;ng t&ocirc;i c&oacute; thể sử dụng những th&ocirc;ng tin n&agrave;y v&agrave;o c&aacute;c mục đ&iacute;ch:</p><p>- Xử l&yacute; đơn h&agrave;ng: gọi điện/tin nhắn x&aacute;c nhận việc đặt h&agrave;ng, th&ocirc;ng b&aacute;o về trạng th&aacute;i đơn h&agrave;ng &amp; thời gian giao h&agrave;ng, x&aacute;c nhận việc huỷ đơn h&agrave;ng (nếu c&oacute;).</p><p>- Gởi thư ngỏ/ thư cảm ơn, giới thiệu sản phẩm, cung cấp th&ocirc;ng tin/ dịch vụ mới hoặc c&aacute;c chương tr&igrave;nh khuyến m&atilde;i của Foodzone.vn.</p><p>- Giải quyết khiếu nại v&agrave; giải đ&aacute;p thắc mắc của kh&aacute;ch h&agrave;ng.</p><p>- Xem x&eacute;t v&agrave; n&acirc;ng cấp nội dung v&agrave; giao diện của website v&agrave; ứng dụng.</p><p>- C&aacute;c khảo s&aacute;t để chăm s&oacute;c kh&aacute;ch h&agrave;ng tốt hơn.</p><p>- X&aacute;c nhận c&aacute;c th&ocirc;ng tin về kỹ thuật &amp; bảo mật th&ocirc;ng tin kh&aacute;ch h&agrave;ng.</p><p>- C&aacute;c trường hợp c&oacute; sự y&ecirc;u cầu của cơ quan nh&agrave; nước c&oacute; thẩm quyền, theo đ&uacute;ng quy định của ph&aacute;p luật.</p><p><strong>3. Thời gian lưu trữ th&ocirc;ng tin</strong></p><p>Dữ liệu c&aacute; nh&acirc;n của Th&agrave;nh vi&ecirc;n sẽ được lưu trữ cho đến khi c&oacute; y&ecirc;u cầu hủy bỏ hoặc tự th&agrave;nh vi&ecirc;n đăng nhập v&agrave; thực hiện hủy bỏ. C&ograve;n lại trong mọi trường hợp th&ocirc;ng tin c&aacute; nh&acirc;n th&agrave;nh vi&ecirc;n sẽ được bảo mật tr&ecirc;n m&aacute;y chủ của Foodzone.vn.</p><p><strong>4. Địa chỉ của đơn vị thu thập v&agrave; quản l&yacute; th&ocirc;ng tin c&aacute; nh&acirc;n</strong></p><p>C&Ocirc;NG TY TNHH THƯƠNG MẠI SIM BA</p><p>Địa chỉ : R1-08-03 T&ograve;a nh&agrave; Everich Số 968, Ba Th&aacute;ng Hai, P.15, Q11, Tp.HCM</p><p>Điện thoại: 028 7770 4567</p><p><strong>5. Phương tiện v&agrave; c&ocirc;ng cụ để người d&ugrave;ng tiếp cận v&agrave; chỉnh sửa dữ liệu c&aacute; nh&acirc;n</strong></p><p>Người d&ugrave;ng tiếp cận v&agrave; chỉnh sửa dữ liệu c&aacute; nh&acirc;n bằng c&aacute;ch h&igrave;nh thức sau:</p><p>+ Trực tiếp truy cập website bằng ID c&aacute; nh&acirc;n v&agrave; chỉnh sửa/ cập nhật th&ocirc;ng tin tại mục Th&ocirc;ng tin c&aacute; nh&acirc;n.</p><p>+ Gọi điện thoại đến tổng đ&agrave;i chăm s&oacute;c kh&aacute;ch h&agrave;ng 028 7770 4567, bằng nghiệp vụ chuy&ecirc;n m&ocirc;n x&aacute;c định th&ocirc;ng tin c&aacute; nh&acirc;n v&agrave; nh&acirc;n vi&ecirc;n c&ocirc;ng ty sẽ hỗ trợ chỉnh sửa thay người d&ugrave;ng.</p><p>+ Gửi g&oacute;p &yacute; trực tiếp từ website Foodzone.vn, quản trị vi&ecirc;n kiểm tra th&ocirc;ng tin v&agrave; li&ecirc;n lạc lại với người d&ugrave;ng để x&aacute;c nhận th&ocirc;ng tin 1 lần nữa v&agrave; quản trị vi&ecirc;n chỉnh sửa th&ocirc;ng tin cho người d&ugrave;ng.</p><p><strong>6. Cam kết bảo mật th&ocirc;ng tin c&aacute; nh&acirc;n kh&aacute;ch h&agrave;ng</strong><br>+ Kh&aacute;ch h&agrave;ng c&oacute; quyền y&ecirc;u cầu thay đổi hoặc huỷ bỏ th&ocirc;ng tin c&aacute; nh&acirc;n của m&igrave;nh.</p><p>+ Th&ocirc;ng tin c&aacute; nh&acirc;n của th&agrave;nh vi&ecirc;n tr&ecirc;n Foodzone.vn được Foodzone.vn cam kết bảo mật tuyệt đối theo ch&iacute;nh s&aacute;ch bảo vệ th&ocirc;ng tin c&aacute; nh&acirc;n của Foodzone.vn. Việc thu thập v&agrave; sử dụng th&ocirc;ng tin của mỗi th&agrave;nh vi&ecirc;n chỉ được thực hiện khi c&oacute; sự đồng &yacute; của kh&aacute;ch h&agrave;ng đ&oacute; trừ những trường hợp ph&aacute;p luật c&oacute; quy định kh&aacute;c.</p><p>+ Chỉ sử dụng th&ocirc;ng tin kh&aacute;ch h&agrave;ng v&agrave;o c&aacute;c nội dung ở mục 2. Kh&ocirc;ng ph&aacute;t t&aacute;n, cung cấp th&ocirc;ng tin kh&aacute;ch h&agrave;ng cho b&ecirc;n thứ 3 trừ trường hợp cơ quan nh&agrave; nước c&oacute; thẩm quyền y&ecirc;u cầu.</p><p>Foodzone.vn cũng khuyến c&aacute;o qu&yacute; kh&aacute;ch n&ecirc;n tu&acirc;n thủ c&aacute;c nguy&ecirc;n tắc sau để c&oacute; thể bảo vệ th&ocirc;ng tin c&aacute; nh&acirc;n của m&igrave;nh, gồm:</p><p>+ Kh&ocirc;ng tiết lộ T&ecirc;n sử dụng/T&ecirc;n đăng nhập v&agrave;/hoặc Mật khẩu với bất kỳ ai, viết hoặc sử dụng ở nơi m&agrave; mọi người c&oacute; thể nhận biết v&agrave; nh&igrave;n thấy được.</p><p>+ Khi chọn mật khẩu qu&yacute; kh&aacute;ch kh&ocirc;ng n&ecirc;n chọn những th&ocirc;ng tin dễ x&aacute;c định như họ t&ecirc;n, ng&agrave;y sinh, số điện thoại hoặc một số k&yacute; tự, con số dễ nhận biết từ t&ecirc;n, ng&agrave;y sinh, số điện thoại của qu&yacute; kh&aacute;ch.</p><p>+ Tho&aacute;t khỏi hệ thống v&agrave; tr&igrave;nh duyệt khi rời khỏi m&aacute;y t&iacute;nh, ngay cả trong thời gian ngắn. Nếu sử dụng m&aacute;y t&iacute;nh chung nhiều người, qu&yacute; kh&aacute;ch n&ecirc;n đăng xuất, hoặc tho&aacute;t hết tất cả cửa sổ website đang mở.</p><p>+ Khi nghi ngờ mật khẩu đ&atilde; bị lộ, qu&yacute; kh&aacute;ch thay đổi mật khẩu ngay lập tức, trong trường hợp cần thiết qu&yacute; kh&aacute;ch lập tức th&ocirc;ng b&aacute;o v&agrave; đề nghị được hỗ trợ từ Foodzone.vn.</p>',NULL,NULL,NULL,NULL,'2020-06-28 00:09:16',5,0,0,'2020-12-31 03:18:55',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (9,'ĐIỀU CHỈNH GIẢM GIÁ BÁN RƯỢU DASSAI 45',NULL,'<p><img src=\"http://www.simba.com.vn/public/uploads/2020-03-02/1583121123.jpg\" class=\"fr-dii fr-draggable\"></p><p align=\"left\">K&iacute;nh gửi Qu&yacute; kh&aacute;ch h&agrave;ng,<br><br>Sim Ba xin gửi đến Qu&yacute; kh&aacute;ch h&agrave;ng lời ch&agrave;o tr&acirc;n trọng. C&aacute;m ơn Qu&yacute; kh&aacute;ch h&agrave;ng đ&atilde; lu&ocirc;n ủng hộ ch&uacute;ng t&ocirc;i trong thời gian qua.<br><br>&nbsp;Sau khi l&agrave;m việc với nh&agrave; sản xuất, ch&uacute;ng t&ocirc;i quyết định điều chỉnh giảm gi&aacute; b&aacute;n rượu <strong>Dassai 45</strong> c&aacute;c size kể từ ng&agrave;y <strong>01/03/2020</strong>, cụ thể như sau:</p><p align=\"left\"><img src=\"http://www.simba.com.vn/public/uploads/2020-03-02/1583122604.jpg\" class=\"fr-dii fr-draggable\"></p>',NULL,NULL,NULL,NULL,'2020-07-21 14:30:52',5,3413,1,'2020-12-31 03:18:57',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (10,'Test 1',NULL,'<p>Test</p>','Good News','<p>sdfsdf</p>','Japanese','<p>sdfsdf</p>','2020-07-21 15:26:37',5,3366,1,'2020-12-31 03:18:54',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (11,'Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc',NULL,'<p style=\"text-align: justify;\"><strong><span style=\"font-size: 18px;\">Với những t&iacute;n đồ ẩm thực Nhật Bản y&ecirc;u th&iacute;ch hương vị thuần khiết của Sushi, Sashimi v&agrave; Tempura th&igrave; tuyệt phẩm Omakase sẽ l&agrave; một trải nghiệm kh&ocirc;ng thể bỏ qua.</span></strong></p><p>Omakase l&agrave; phong ẩm thực nổi tiếng v&agrave; l&acirc;u đời của người Nhật. Khi bạn chọn thực đơn Omakase th&igrave; c&oacute; nghĩa l&agrave; bạn sẽ để đầu bếp quyết định m&oacute;n ăn của m&igrave;nh. Bản th&acirc;n của từ n&agrave;y trong tiếng Nhật c&oacute; nghĩa l&agrave; &ldquo;t&ocirc;i tin tưởng (tuỳ) v&agrave;o bạn&rdquo;. Omakase c&oacute; mặt tại những nh&agrave; h&agrave;ng c&oacute; nguy&ecirc;n liệu tươi sống mỗi ng&agrave;y như c&aacute;c nh&agrave; h&agrave;ng Sushi.</p><p style=\"text-align: justify;\"><br></p><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-4-154622.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 1\" class=\"fr-dii fr-draggable\" style=\"width: 555px; height: 367.688px;\"></figure><p><br></p><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-14-154640.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 2\" class=\"fr-dii fr-draggable\" style=\"width: 557px; height: 370.007px;\"></figure></figure><p style=\"text-align: justify;\">Trải nghiệm Omakase l&agrave; một h&agrave;nh tr&igrave;nh thi vị, độc nhất v&agrave; ẩn chứa nhiều bất ngờ m&agrave; hiếm m&oacute;n ăn n&agrave;o c&oacute; thể mang lại.</p><p style=\"text-align: justify;\">Thực kh&aacute;ch sẽ kh&ocirc;ng gọi m&oacute;n cụ thể hay y&ecirc;u cầu thay đổi theo khẩu vị c&aacute; nh&acirc;n m&agrave; chuẩn bị tinh thần đ&oacute;n nhận những trải nghiệm bất ngờ từ những s&aacute;ng tạo độc đ&aacute;o, gu ẩm thực tuyệt vời của một đầu bếp phục vụ Omakase đầy t&acirc;m huyết.</p><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-8-154701.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 3\" class=\"fr-dii fr-draggable\" style=\"width: 554px; height: 368.007px;\"></figure></figure><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/img_0980-154723.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 4\" class=\"fr-dii fr-draggable\" style=\"width: 552px; height: 366.686px;\"></figure></figure><p style=\"text-align: justify;\">Kh&ocirc;ng chỉ thưởng thức ẩm thực đơn thuần, thực kh&aacute;ch c&ograve;n c&oacute; cơ hội tr&ograve; chuyện với đầu bếp Omakase để thấu hiểu hơn về tinh thần l&agrave;m n&ecirc;n những tuyệt phẩm ho&agrave;n hảo cả về vị gi&aacute;c lẫn h&igrave;nh thức &ndash; điểm nhấn quan trọng tạo ra sự kh&aacute;c biệt đ&aacute;ng kể trong phong c&aacute;ch thưởng thức m&oacute;n ăn v&ocirc; c&ugrave;ng th&uacute; vị n&agrave;y.</p><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-1-154739.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 5\" class=\"fr-dii fr-draggable\" style=\"width: 553px; height: 367.35px;\"></figure></figure><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-15-160140.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 6\" class=\"fr-dii fr-draggable\" style=\"width: 552px; height: 366.686px;\"></figure></figure><p style=\"text-align: justify;\">Omakase chỉ phổ biến trong thực đơn của những nh&agrave; h&agrave;ng Nhật Bản cao cấp, đ&ograve;i hỏi nguy&ecirc;n liệu tươi ngon thuần khiết nhất, được chế biến bởi đ&ocirc;i b&agrave;n tay t&agrave;i hoa của c&aacute;c bậc thầy am hiểu ẩm thực đỉnh cao để c&oacute; thể tạo n&ecirc;n m&oacute;n Omakase đ&uacute;ng điệu.</p><p style=\"text-align: justify;\">Kh&ocirc;ng gian để thưởng thức Omakase cũng phải được thiết kế đặc biệt, ấm c&uacute;ng v&agrave; gần gũi để thực kh&aacute;ch &ldquo;mục sở thị&rdquo; qu&aacute; tr&igrave;nh chế biến của đầu bếp.</p><p style=\"text-align: justify;\">Bằng sự kh&eacute;o l&eacute;o, cảm nhận tinh tế c&ugrave;ng niềm đam m&ecirc;, đầu bếp Omakase &ldquo;thổi hồn&rdquo; v&agrave;o từng nguy&ecirc;n liệu, biến những &yacute; tưởng s&aacute;ng tạo th&agrave;nh những m&oacute;n ăn ho&agrave;n hảo, độc nhất được b&agrave;i tr&iacute; c&ocirc;ng phu với hương vị kh&oacute; qu&ecirc;n.&nbsp;</p><p style=\"text-align: right;\"><em>Theo R.R</em></p>','Omakase - a journey to discover the Japanese culinary','<p style=\"text-align: justify;\"><strong><span style=\"font-size: 18px;\">For Japanese culinary devotees who love the pure flavors of Sushi, Sashimi and Tempura, Omakase will be an experience not to be missed.</span></strong></p><p style=\"text-align: justify;\">Omakase is a famous dinning tradition of letting the chef decide your order, originated from Japan. The word itself means &ldquo;I will leave it to you&rdquo;.</p><p style=\"text-align: justify;\">Omakase course is usually available at restaurants with fresh ingredients arriving everyday. These restaurants often serve sushi where the dishes require fresh seafood and meat.</p><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-4-154622.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 1\" class=\"fr-dii fr-draggable\" style=\"width: 551px; height: 366.021px;\"></figure><p style=\"text-align: center;\"><br></p><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-14-154640.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 2\" class=\"fr-dii fr-draggable\" style=\"width: 546px; height: 362.7px;\"></figure><p style=\"text-align: justify;\">Experiencing Omakase is a poetic, unique and full of surprises that few dishes can bring.<br>Diners will not order specific dishes or request to change according to personal taste but prepare the spirit of receiving unexpected experiences from the unique creations and great culinary tastes of a dedicated Omakase chef.</p><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-8-154701.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 3\" class=\"fr-dii fr-draggable\" style=\"width: 546px; height: 362.7px;\"></figure></figure><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/img_0980-154723.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 4\" class=\"fr-dii fr-draggable\" style=\"width: 549px; height: 364.693px;\"></figure></figure><p style=\"text-align: justify;\">Not only enjoying pure cuisine, diners also have the opportunity to chat with chef Omakase to better understand the spirit of making perfect masterpieces in both taste and form - an important highlight to create the There is a significant difference in the style of enjoying this interesting meal.</p><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-1-154739.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 5\" class=\"fr-dii fr-draggable\" style=\"width: 550px; height: 365.357px;\"></figure></figure><figure><figure style=\"text-align: center;\"><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-15-160140.jpg\" alt=\"Omakase - hành trình khám phá ẩm thực đỉnh cao đất nước Mặt trời mọc - Ảnh 6\" class=\"fr-dii fr-draggable\" style=\"width: 553px; height: 367.35px;\"></figure></figure><p style=\"text-align: justify;\">Omakase is only popular in the menu of high-end Japanese restaurants, requiring the purest fresh ingredients, prepared by the talented hands of expert culinary masters to be able to create the Omakase.</p><p style=\"text-align: justify;\">The space to enjoy Omakase must also be specially designed, cozy and close for diners to &quot;taste&quot; the chef&apos;s processing.</p><p style=\"text-align: justify;\">With the ingenuity, delicate feeling and passion, the Omakase chef &quot;brings soul&quot; into each ingredient, turning creative ideas into perfect, unique dishes, ornate with flavor unforgettable.</p><p style=\"text-align: right;\"><em>Theo R.R</em></p>','おまかせ-日本の料理を発見する旅','<p><strong>寿司、刺身、天ぷらのピュアな味わいを愛する日本の料理愛好家にとって、おまかせは必見の体験です。</strong></p><p>おまかせは、日本発祥の伝統料理で、シェフが注文を決めます。言葉そのものは「お任せします」という意味です。</p><p>おまかせコースは通常、新鮮な食材が毎日届くレストランで利用できます。これらのレストランでは、新鮮な魚介類や肉が必要な寿司を提供しています。</p><figure><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-4-154622.jpg\" alt=\"おまかせ-hànhtrìnhkhámpháẩmthựcđỉnhcaođấtnướcMặttrờimọc-Ảnh1\" class=\"fr-dii fr-draggable\"></figure><p><br></p><figure><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-14-154640.jpg\" alt=\"おまかせ-hànhtrìnhkhámpháẩmthựcđỉnhcaođấtnướcMặttrờimọc-Ảnh2\" class=\"fr-dii fr-draggable\"></figure><p>おまかせを体験することは詩的で独特であり、いくつかの料理がもたらす驚きに満ちています。<br>ダイナーは、特定の料理を注文したり、個人の好みに応じて変更を要求したりせず、専任のオマカセシェフのユニークな料理と素晴らしい料理の味から予想外の体験を受け取る精神を準備します。</p><figure><figure><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-8-154701.jpg\" alt=\"おまかせ-hànhtrìnhkhámpháẩmthựcđỉnhcaođấtnướcMặttrờimọc-Ảnh3\" class=\"fr-dii fr-draggable\"></figure></figure><figure><figure><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/img_0980-154723.jpg\" alt=\"おまかせ-hànhtrìnhkhámpháẩmthựcđỉnhcaođấtnướcMặttrờimọc-Ảnh4\" class=\"fr-dii fr-draggable\"></figure></figure><p>純粋な料理を楽しむだけでなく、おまかせシェフと話をして、味と形の両方で完璧な傑作を作る精神をよりよく理解することもできます。この興味深い食事の楽しみ方には大きな違いがあります。&nbsp;</p><figure><figure><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-1-154739.jpg\" alt=\"おまかせ-hànhtrìnhkhámpháẩmthựcđỉnhcaođấtnướcMặttrờimọc-Ảnh5\" class=\"fr-dii fr-draggable\"></figure></figure><figure><figure><img src=\"https://static.doanhnhan.vn/w761/images/upload/2020/7/7/pp-sorae-15-160140.jpg\" alt=\"おまかせ-hànhtrìnhkhámpháẩmthựcđỉnhcaođấtnướcMặttrờimọc-Ảnh6\" class=\"fr-dii fr-draggable\"></figure></figure><p>おまかせは、高級日本食レストランのメニューでのみ人気があり、熟練した料理の達人の才能のある手によっておまかせを作成できるように準備された、最も純粋で新鮮な食材が必要です。</p><p>おまかせを楽しむための空間は、特別にデザインされ、居心地がよく、ディナーの際にシェフの加工を「味わう」ために近くなければなりません。</p><p>創意工夫、繊細な気分、情熱で、おまかせのシェフはそれぞれの要素に「魂」を吹き込み、創造的なアイデアを完璧でユニークな料理に変え、忘れられない風味で華やかにします。</p><p style=\"text-align: right;\"><em>RR</em></p><p style=\"text-align: right;\"><br></p>','2020-08-12 11:31:36',5,3420,0,'2020-12-31 03:18:51',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (12,'Natto - Món ăn bổ dưỡng từ Nhật Bản',NULL,'<p style=\"text-align: justify;\"><span lang=\"vi\">L&agrave; một loại enzyme c&oacute; độ tinh khiết cao, Natto được coi l&agrave; một trong những si&ecirc;u thực dưỡng ng&agrave;y nay. Chất bổ sung đặc biệt hiệu quả để cải thiện qu&aacute; tr&igrave;nh lưu th&ocirc;ng m&aacute;u, nhưng c&ocirc;ng dụng của n&oacute; kh&ocirc;ng dừng lại ở đ&oacute;. Chất nhầy v&agrave; vị mặn của natto rất kh&oacute; để hấp dẫn mọi người; tuy nhi&ecirc;n, n&oacute; lại l&agrave; sản phẩm rất tốt cho sức khỏe.</span></p><p style=\"text-align: justify;\">Natto (な っ と う hay 納豆) l&agrave; một m&oacute;n ăn truyền thống của Nhật Bản được l&agrave;m từ đậu n&agrave;nh l&ecirc;n men. N&oacute; thường được ăn với cơm, h&agrave;nh l&aacute;, nước tương v&agrave; một &iacute;t m&ugrave; tạt v&agrave;ng karashi. Natto thường được người Nhật ăn v&agrave;o bữa s&aacute;ng.</p><p style=\"text-align: center;\"><img src=\"http://www.foodzone.vn/public/uploads/2020-08-12/1597224220.png\" class=\"fr-dii fr-draggable\" style=\"width: 543px; height: 543px;\"></p><p style=\"text-align: justify;\"><span lang=\"vi\">Natto - một sự kết hợp tạo ra nhiều loại protein thực vật c&oacute; lợi cho sức khỏe. Ban đầu natto c&oacute; hương vị kh&aacute; kh&oacute; ngửi, mặn v&agrave; nhầy.&nbsp;</span><span lang=\"vi\">Tuy nhi&ecirc;n, Natto c&oacute; thể được sử dụng như một phương ph&aacute;p điều trị v&agrave; ph&ograve;ng ngừa sức khỏe hiệu quả. Với bảng m&agrave;u protein đa dạng, thực phẩm cung cấp nhiều loại chất dinh dưỡng tốt cho việc điều trị một loạt c&aacute;c t&igrave;nh trạng sức khỏe.</span><a href=\"http://www.foodzone.vn/index/details/3965\"></a></p><p style=\"text-align: justify;\"><a href=\"http://www.foodzone.vn/index/details/3965\">Bạn c&oacute; thể mua natto tại đ&acirc;y</a>.</p><p style=\"text-align: justify;\"><span lang=\"vi\">C&oacute; c&acirc;u: &ldquo;You are what you eat - Những g&igrave; bạn ăn thể hiện bạn l&agrave; ai&rdquo;. Quan điểm n&agrave;y đặc biệt đ&uacute;ng khi n&oacute;i đến c&aacute;c loại thực phẩm như natto - một loại si&ecirc;u thực phẩm chứa đầy chất dinh dưỡng c&oacute; hiệu quả để điều trị một loạt c&aacute;c t&igrave;nh trạng kh&aacute;c nhau.</span></p><p style=\"text-align: right;\"><em>Source: justonecookbook</em></p>','Natto - Health Benefits','<p style=\"text-align: justify;\"><strong>A highly purified enzyme, natto is considered one of today&rsquo;s superfoods. The supplement is particularly effective for improving circulation and reducing swelling, but its uses do not stop there. The enzyme&rsquo;s slimy texture and salty flavor are not necessarily attractive to everyone; however, its health benefits are.</strong></p><p style=\"text-align: justify;\"><strong>Natto</strong> (<span lang=\"ja\">なっとう or 納豆</span>) is a traditional Japanese food made of fermented soybeans. &nbsp;It is usually served over rice with green onions, soy sauce and<span>&nbsp;</span><em>karashi</em><span>&nbsp;</span>mustard. &nbsp;Natto is most commonly eaten as a Japanese style breakfast food.</p><p style=\"text-align: center;\"><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-08-12/1597224220.png\" style=\"width: 540px; height: 540px;\"></p><p style=\"text-align: justify;\">Natto &ndash; a combination that renders an assortment of healthful vegetable proteins. Traditionally called nattokinase, natto can be described in flavor as strong and pungent with a slimy texture. The supplement can also be likened in flavor to the salty bite of blue cheese and is typically eaten with rice.<br><a href=\"http://www.foodzone.vn/index/details/3965\">Detailed reference for Natto</a></p><p style=\"text-align: justify;\">The saying goes, &ldquo;You are what you eat.&rdquo; This sentiment is especially true when it comes to supplemental foods like natto &ndash; a nutrient filled superfood effective for treating a host of different conditions.</p><p style=\"text-align: right;\"><em>Source: justonecookbook</em></p>','納豆-健康上の利点','<p><strong>高度に精製された酵素である納豆は、今日のスーパーフードの1つと考えられています。サプリメントは循環の改善と腫れの軽減に特に効果的ですが、その使用はそこで止まりません。酵素のぬるぬるした食感と塩味は必ずしも誰にとっても魅力的ではありません。しかし、その健康上の利点があります。</strong></p><p><strong>納豆は</strong>（<span lang=\"ja\">なっとうや納豆</span>）納豆で作られた日本の伝統的な食べ物です。通常、ネギ、醤油、<em>唐辛子</em>マスタードを添えてご飯の上に出されます。納豆は、和食の朝食によく食べられます。 &nbsp;</p><p><img src=\"http://www.foodzone.vn/public/uploads/2020-08-12/1597224220.png\" class=\"fr-dii fr-draggable\"></p><p>納豆&ndash;健康的な植物性タンパク質の品揃えを提供する組み合わせ。納豆は伝統的にナットウキナーゼと呼ばれ、味は粘り気があり、粘り気があり、粘り気があり、粘り気がある。サプリメントは、風味がブルーチーズの塩味に似ていることもあり、通常はご飯と一緒に食べられます。</p><p><span style=\"color: rgb(0, 0, 0);\"><a href=\"http://www.foodzone.vn/index/search?q=ms021&type=product\">ここで納豆を買うことができます。</a></span></p><p><span style=\"color: rgb(0, 0, 0);\">「あなたはあなたが食べるものです。」という格言は続きます。この感情は、納豆のような栄養補助食品に特に当てはまります。これは、さまざまな病状の治療に効果的な栄養素入りのスーパーフードです。</span></p><p style=\"text-align: right;\"><span style=\"color: rgb(0, 0, 0);\"><em>justonecookbook</em></span></p><h1 lang=\"en\"><br></h1>','2020-08-12 16:28:08',5,3421,0,'2020-12-31 03:18:50',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (13,'Tamago Kakegohan - Vì sao người Nhật mê đắm món cơm trứng sống này?',NULL,'<p style=\"text-align: left;\">Một trong những m&oacute;n ăn phổ biến, được nhiều người Nhật ưa chuộng nhất l&agrave; cơm trộn trứng sống (Tamago Kakegohan). Cho trứng sống v&agrave;o b&aacute;t cơm trắng, th&ecirc;m ch&uacute;t x&igrave; dầu v&agrave; &iacute;t h&agrave;nh ng&ograve;, thế l&agrave; th&agrave;nh bữa s&aacute;ng đơn giản m&agrave; tiết kiệm.</p><p><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-08-13/1597285643.jpg\" style=\"width: 537px; height: 357.664px;\"></p><p style=\"text-align: justify;\">Ngo&agrave;i ra c&ograve;n nhiều m&oacute;n kh&aacute;c sử dụng trứng sống như Oyako-don, lẩu sukiyaki, lẩu shabushabu...<br>Kh&aacute;c với người Việt thường ăn ch&iacute;n uống s&ocirc;i, người Nhật lại rất th&iacute;ch ăn trứng g&agrave; sống v&agrave; sử dụng cho hầu hết c&aacute;c m&oacute;n ăn y&ecirc;u th&iacute;ch của họ.<br>Nhưng khi sống ở nước ngo&agrave;i họ lại kh&ocirc;ng ăn trứng g&agrave; sống m&agrave; chỉ khi về lại Nhật họ mới thưởng thức với vẻ m&atilde;n nguyện r&otilde; rệt. Bạn c&oacute; biết v&igrave; sao kh&ocirc;ng?</p><p style=\"text-align: justify;\">Trứng l&agrave; loại dễ nhiễm phải vi khuẩn Salmonella SE, nguy&ecirc;n nh&acirc;n g&acirc;y ra chứng ngộ độc thực phẩm ở người. Tại Mỹ, khoảng 0.03% trứng sống bị nhiễm v&agrave; con số đ&oacute; c&oacute; lẽ sẽ cao hơn tại Việt Nam.</p><p style=\"text-align: justify;\">Để diệt vi khuẩn n&agrave;y phải qua xử l&yacute; nhiệt ở 100 độ. V&igrave; vậy phần l&ograve;ng v&agrave;ng của trứng nếu trong t&igrave;nh trạng lỏng, chưa ch&iacute;n th&igrave; vẫn c&ograve;n tồn tại vi khuẩn đ&oacute;. Do đ&oacute;, d&ugrave; rất th&iacute;ch ăn trứng sống nhưng người Nhật vẫn lựa chọn kh&ocirc;ng ăn khi ở nước ngo&agrave;i.<br>Như thế c&oacute; nghĩa l&agrave; trứng g&agrave; sống ở Nhật an to&agrave;n?<br>Sự thật đ&uacute;ng như vậy.</p><p style=\"text-align: justify;\"><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-08-14/1597394764.png\" style=\"width: 546px; height: 238.483px;\"></p><p style=\"text-align: center;\"><a href=\"http://www.foodzone.vn/index/details/5286\"><em>Trứng g&agrave; ăn sống Vfood</em></a></p><p style=\"text-align: justify;\">Người ta ti&ecirc;m ph&ograve;ng vắc-xin cho g&agrave; đầy đủ, v.v&hellip; n&ecirc;n g&agrave; con đẻ ra được nu&ocirc;i th&agrave;nh g&agrave; đẻ trứng khỏe mạnh m&agrave; ho&agrave;n to&agrave;n kh&ocirc;ng sử dụng c&aacute;c chất kh&aacute;ng sinh ngay từ giai đoạn c&ograve;n l&agrave; g&agrave; con.G&agrave; con được chăm s&oacute;c ch&uacute; trọng đến m&ocirc;i trường kh&ocirc;ng kh&iacute;, quản l&yacute; vệ sinh, được cung cấp thức ăn dinh dưỡng để sinh sống thoải m&aacute;i trong chuồng g&agrave; đ&atilde; ngăn chặn sự x&acirc;m nhập của c&aacute;c t&aacute;c nh&acirc;n b&ecirc;n ngo&agrave;i mang vi khuẩn, v.v&hellip; v&agrave;o chuồng.Đ&oacute; l&agrave; nguy&ecirc;n nh&acirc;n m&agrave; người Nhật c&oacute; thể thoải m&aacute;i ăn trứng g&agrave; sống m&agrave; kh&ocirc;ng lo ngộ độc thực phẩm.</p><p style=\"text-align: justify;\">Người Nhật kh&ocirc;ng phải t&ugrave;y tiện cho trứng sống v&agrave;o thức ăn, m&agrave; họ đ&atilde; t&iacute;nh to&aacute;n v&agrave; nghi&ecirc;n cứu kỹ m&oacute;n ăn n&agrave;o kết hợp<br>được với trứng sống sẽ ra hương vị đặc biệt g&igrave;.</p><p style=\"text-align: justify;\"><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-08-14/1597395308.png\" style=\"width: 544px; height: 364.103px;\">Như lẩu sukiyaki, khi cho thịt b&ograve; ch&iacute;n nh&uacute;ng v&agrave;o trứng sống l&agrave;m miếng thịt mềm, b&eacute;o ngậy, khiến c&aacute;c thực kh&aacute;ch cứ muốn ăn m&atilde;i. Kh&ocirc;ng c&oacute; trứng sống sẽ kh&ocirc;ng l&agrave;m n&ecirc;n lẩu sukiyaki.</p><p style=\"text-align: right;\"><em>Nguồn: Kengo Abe - www.japo.vn</em></p>','Rice topped with egg','<h2><em><span style=\"font-size: 14px;\"><strong class=\"\">What Is Tamago Kake Gohan?</strong></span></em></h2><p>Tamago kake gohan can be translated into English as &ldquo;rice topped with egg.&quot; It is a simple but incredibly popular dish in Japanese cuisine that is usually eaten at breakfast, although it can be enjoyed at any time of the day. White rice, a raw egg, and soy sauce are all you need for this deceptively hearty meal. In recent years, tamago kake gohan has gained some notoriety outside of Japan from its depiction in the anime Gin no Saji (Silver Spoon). The dish has received a lot of positive and curious reactions from anime fans across the world, but one hangup that non-Japanese often have about TKG is the concern about how safe it is to eat raw eggs.</p><p><img src=\"https://d20aeo683mqd6t.cloudfront.net/images/imgs/000/048/147/original/pouring-soysauce-onto-tamago-kake-gohan-p63046529_M.jpg?1591160823&amp;d=750x750\" alt=\"Tamago kake gohan raw egg with rice\" class=\"fr-dii fr-draggable\"></p><h2><strong><em><span style=\"font-size: 14px;\">Is It Safe to Eat Raw Eggs?&nbsp;</span></em></strong><strong><em><span style=\"font-size: 14px;\">Japanese Egg Regulations</span></em></strong></h2><p>In most countries, it is normal to be concerned about eating raw eggs. The risk of salmonella poisoning from raw eggs is nothing to laugh at, with the average case causing stomach cramps, fever, and diarrhea lasting for four to seven days. Severe cases of salmonella can even be fatal, so why take the risk? Well, Japan, in its quest for culinary perfection, has devised methods to ensure a way of safely consuming raw eggs.</p><p>Thanks to strict procedures and regulations for egg production in Japan, the chance of contracting salmonella from eating an egg is close to nil. The sanitary regulations for Japanese chicken farms are more stringent than in many other countries, Japanese chicken farmers wear more protective gear when entering the coop, and extra precautions are taken to prevent the chickens from coming into contact with sources of contagions such as wild birds, insects, and other animals. This leads to a much lower chance that the chickens themselves become infected with salmonella and therefore reduces the risk of it passing on to the egg.&nbsp;</p><p style=\"text-align: right;\"><img src=\"http://www.foodzone.vn/public/uploads/2020-08-14/1597394764.png\" class=\"fr-draggable fr-dii\"><br></p><p style=\"text-align: center;\"><a href=\"http://www.foodzone.vn/index/details/5286\">Chicken Egg ISE - Vfood Vitamin E (Eat raw)</a></p><p>On top of this, once the eggs are collected, they are thoroughly tested. Each egg is run through a machine that individually washes, sterilizes, and checks for potential issues such as cracks, dirt, or blood spots. The machines even scan the eggs for any traces of bacteria, and eggs with imperfections are discarded. The eggs are then immediately shipped to stores, so that they will be consumed when still extremely fresh. In Japan, eggs are treated as though they will be consumed raw, so the expiration date is typically set to only 2 weeks after processing. This is much shorter than in many other countries and is another measure to ensure that the eggs will be eaten while fresh.&nbsp;</p><p style=\"text-align: right;\"><strong><em>Source :</em></strong>&nbsp;<a href=\"https://www.tsunagujapan.com/tamago-kake-gohan/\"></a><a href=\"https://www.tsunagujapan.com/tamago-kake-gohan/\">https://www.tsunagujapan.com</a></p><p><br></p>','玉子かけごはん','<h2><span style=\"font-size: 14px;\"><strong class=\"\">玉子かけごはんとは？</strong></span></h2><p>玉子かけごはんは英語に「たまごかけご飯」と訳されます。日替わりでとても人気のある料理で、朝食によく食べられますが、いつでも楽しめます。白米玉子かけごはんは、アニメ「銀のさじ」の描写から、近年海外でも知られるようになりました。世界中のアニメファンからの好奇心旺盛な反応の1つですが、外国人がTKGについてよく抱くハングアップの1つは、生の卵を食べることの安全性に関する懸念です。</p><p><img src=\"https://d20aeo683mqd6t.cloudfront.net/images/imgs/000/048/134/original/Stirred-tamago-kake-gohan-s1643750071.jpg?1591152660&amp;d=750x750\" class=\"fr-dii fr-draggable\"></p><h2><strong><span style=\"font-size: 14px;\">生卵を食べても安全ですか？日本の卵の規制</span></strong></h2><p>ほとんどの国では、生の卵を食べることを心配するのが普通です。生卵によるサルモネラ中毒のリスクは笑いものではありません。平均的なケースでは、胃のけいれん、発熱、下痢が4〜7日間続きます。サルモネラ菌の重症例は致命的でさえあり得るので、なぜリスクを取るのか？さて、日本は料理の完璧さを求めて、生卵を安全に消費する方法を確実にする方法を考案しました。</p><p>日本の産卵に関する厳格な手続きと規制のおかげで、サルモネラ菌が卵を食べることで感染する可能性はほとんどありません。日本の養鶏場の衛生規則は、他の多くの国よりも厳格であり、日本の養鶏家は小屋に入るときに保護具を着用し、鶏が野鳥などの伝染源と接触しないように特別な予防策が講じられています。昆虫、およびその他の動物。これにより、ニワトリ自身がサルモネラに感染する可能性がはるかに低くなり、その結果、ニワトリが卵に伝染するリスクが減少します。</p><p style=\"text-align: center;\"><a href=\"http://www.foodzone.vn/index/details/5286\"><img src=\"http://www.foodzone.vn/public/uploads/2020-08-14/1597394764.png\" style=\"background-color: initial; text-align: initial; font-size: 0.88rem;\" class=\"fr-draggable fr-dii\"></a></p><p style=\"text-align: center;\">&nbsp; <a href=\"http://www.foodzone.vn/index/details/5286\">たまご（伊勢エッグ）Vfood　ビタミンE</a></p><p>これに加えて、卵が収集されたら、徹底的にテストされます。各卵は、個別に洗浄、殺菌、亀裂、汚れ、または血斑などの潜在的な問題がないかどうかを確認する機械を通過します。機械は卵に細菌の痕跡がないかスキャンし、欠陥のある卵は廃棄されます。卵はすぐに店舗に出荷され、非常に新鮮なときに消費されます。日本では、卵は生で消費されるかのように扱われるため、有効期限は通常、処理後わずか2週間に設定されています。これは他の多くの国よりもはるかに短く、卵が新鮮な間に食べられるようにするためのもう1つの方法です。</p><p style=\"text-align: right;\"><strong><em>Source :</em></strong>&nbsp;<a href=\"https://www.tsunagujapan.com/tamago-kake-gohan/\"></a><a href=\"https://www.tsunagujapan.com\">https://www.tsunagujapan.com</a></p><p><br></p><p><br></p>','2020-08-12 17:18:01',5,3425,0,'2020-12-31 03:18:48',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (14,'Narutomaki là gì? (Miếng chả màu trắng và hồng hay được topping trên mì ramen ở Nhật)',NULL,'<p style=\"text-align: center;\"><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054283.jpg\" class=\"fr-dii fr-draggable\" style=\"width: 553px; height: 368.337px;\"><br><em>Phong c&aacute;ch m&igrave; ramen ở Tokyo</em></p><p>M&agrave;u trắng v&agrave; hồng xoắn hay được topping tr&ecirc;n m&igrave; ramen ở Nhật Bản l&agrave; g&igrave;? Đ&oacute; ch&iacute;nh l&agrave; &quot;<a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a> -鳴門巻&quot; hoặc gọi tắt l&agrave; Naruto. Naruto l&agrave; một loại chả c&aacute; (ở Nhật gọi l&agrave; kamaboko) thường được d&ugrave;ng để topping l&ecirc;n m&igrave; ramen.</p><p><strong>&quot;Naruto&quot; được l&agrave;m như thế n&agrave;o?</strong></p><p style=\"text-align: center;\"><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054418.jpg\" class=\"fr-dii fr-draggable\" style=\"width: 550px; height: 367.652px;\"><br><em>Narutomaki</em></p><p><a href=\"http://www.foodzone.vn/index/details/2570\"><span lang=\"vi\">Narutomaki</span></a><span lang=\"vi\">&nbsp;được l&agrave;m bằng c&aacute;ch bọc chả c&aacute; trắng v&agrave; chả c&aacute; m&agrave;u hồng lại với nhau th&agrave;nh h&igrave;nh thanh d&agrave;i. Chả c&aacute; sau đ&oacute; được l&agrave;m ch&iacute;n bằng hơi nước, để đ&ocirc;ng lại v&agrave; c&oacute; thể cắt th&agrave;nh từng l&aacute;t mỏng.</span></p><p><strong>Narutomaki c&oacute; vị như thế n&agrave;o?</strong></p><p style=\"text-align: center;\"><strong><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054460.jpg\" class=\"fr-dii fr-draggable\" style=\"width: 546px; height: 364px;\"></strong></p><p style=\"text-align: justify;\"><a href=\"http://www.foodzone.vn/index/details/2570\"><span lang=\"vi\">Narutomaki</span></a><span lang=\"vi\">&nbsp;c&oacute; vị tanh nhẹ v&agrave; hơi dai. Ban đầu n&oacute; thường được topping tr&ecirc;n m&igrave; ramen như một sự tương phản trực quan với m&agrave;u n&acirc;u của nước soup, thịt v&agrave; măng đ&atilde; chiếm phần lớn tr&ecirc;n b&aacute;t m&igrave;. V&agrave; v&igrave; n&oacute; kh&ocirc;ng thực sự quan trọng, n&ecirc;n phần lớn c&aacute;c cửa h&agrave;ng ramen hiện đại kh&ocirc;ng c&ograve;n sử dụng naruto để topping nữa. Tuy nhi&ecirc;n, n&oacute; c&oacute; vị ngon v&agrave; vẫn được nhiều người y&ecirc;u th&iacute;ch!</span></p><p><strong>Tại sao lại gọi l&agrave; Naruto?</strong></p><p style=\"text-align: center;\"><strong><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602057726.jpg\" style=\"width: 487px; height: 487px;\"></strong><em>Xo&aacute;y nước Naruto (鳴門の渦潮)</em></p><p style=\"text-align: justify;\">R&otilde; r&agrave;ng kh&ocirc;ng c&oacute; t&agrave;i liệu n&agrave;o ghi lại nguồn gốc của c&aacute;i t&ecirc;n &apos;<a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a>&apos;, nhưng một số giả thuyết cho rằng Naruto được đặt t&ecirc;n v&igrave; h&igrave;nh dạng gợi nhớ đến &apos;Xo&aacute;y nước Naruto&quot;</p><p><strong>Tại sao narutomaki được sử dụng để topping m&igrave; ramen?</strong></p><p style=\"text-align: center;\"><strong><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602055091.jpg\" class=\"fr-dii fr-draggable\" style=\"width: 549px; height: 365.673px;\"></strong><br><em>&nbsp;M&igrave; soba Nhật Bản với naruto được topping ph&iacute;a tr&ecirc;n.</em></p><p style=\"text-align: justify;\"><a href=\"http://www.foodzone.vn/index/details/2570\"><span lang=\"vi\">Naruto</span></a><span lang=\"vi\">&nbsp;đ&atilde; được sử dụng l&agrave;m topping cho m&oacute;n m&igrave; soba của Nhật Bản từ cuối thời Edo (khoảng hơn 150 năm trước). Khi ramen lần đầu ti&ecirc;n du nhập v&agrave;o Nhật Bản từ Trung Quốc v&agrave;o đầu những năm 1900, n&oacute; được gọi l&agrave; &apos;shina soba,&apos; c&oacute; nghĩa l&agrave; &apos;Soba của Trung Quốc.&apos;&nbsp;</span></p><p style=\"text-align: right;\"><em>Source:favy-jp</em></p>','What is Narutomaki? (The White and Pink Thing on Ramen)','<p style=\"text-align: center;\"><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054283.jpg\" style=\"width: 542px; height: 361.333px;\"><em>Tokyo-style ramen</em></p><p style=\"text-align: justify;\">What&apos;s the white and pink swirl thing on ramen? It&apos;s called &apos;<a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a>&apos;鳴門巻 or just &apos;Naruto&apos; for short. <a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a> is a type of fish cake (called kamaboko in Japanese) that is a classic topping for ramen.</p><p style=\"text-align: left;\"><strong><span style=\"font-size: 14px;\">What do you mean by &quot;fish cake?&quot;</span></strong></p><p style=\"text-align: center;\"><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054418.jpg\" style=\"width: 540px; height: 360px;\"><em>Narutomaki up close</em></p><p style=\"text-align: left;\"><a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a> is made by wrapping white fish paste colored with red food dye with undyed fish paste into a log shape. The fish paste log is then cooked with steam so that it solidifies and can be cut into thin slices.</p><p style=\"text-align: justify;\"><strong><span style=\"font-size: 14px;\">What does narutomaki taste like?</span></strong><strong><span style=\"font-size: 14px;\"><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054460.jpg\" style=\"width: 536px; height: 356.967px;\"></span></strong><a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a> has a fairly mild fishy taste and a chewy texture. It was originally included in ramen as a visual contrast to the brown colors of the soup, chashu, and menma that dominate the bowl. Since it&apos;s not really important for flavor, the majority of modern ramen shops no longer use naruto as a topping. However, it does taste good and is still loved by many!</p><p style=\"text-align: left;\"><span style=\"font-size: 14px;\"><strong>Why is it called &apos;Naruto?&apos;</strong></span></p><p style=\"text-align: center;\"><span style=\"font-size: 14px;\"><strong><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054506.jpg\" style=\"width: 546px; height: 361.944px;\"></strong></span><em>Naruto Whirlpools (鳴門の渦潮)</em></p><p style=\"text-align: justify;\">There&apos;s apparently no written record of the origin of the name &apos;<a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a>,&apos; but the common theory is that the fish cake was given its name because the shape is reminiscent of the famous &apos;Naruto Whirlpools.&apos;</p><p style=\"text-align: left;\"><strong><span style=\"font-size: 14px;\">Why is narutomaki used as a ramen topping?</span></strong></p><p style=\"text-align: center;\"><strong><span style=\"font-size: 14px;\"><img class=\"fr-dib fr-draggable\" src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602055091.jpg\" style=\"width: 531px; height: 353.633px;\"></span></strong><em>Japanese soba with naruto as a topping</em></p><p style=\"text-align: justify;\">Naruto had been used as a topping for Japanese soba noodles since the end of the Edo period, some 150+ years ago, before ramen was even eaten in Japan. When ramen was first introduced to Japan from China in the early 1900s, it was called &apos;shina soba,&apos; which means &apos;Chinese soba.&apos; It&apos;s thought that since <a href=\"http://www.foodzone.vn/index/details/2570\">narutomaki</a> was commonly used as a topping for Japanese soba, it was soon added to the new &apos;Chinese soba&apos; as well.</p><p style=\"text-align: right;\"><em>Source:favy-jp</em></p>','什么是鸣鸟？ （拉面的白色和粉红色的东西）','<p style=\"text-align: center;\"><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054283.jpg\" class=\"fr-dii fr-draggable\"><br><em>东京风味的拉面</em></p><p>拉面上的白色和粉红色漩涡状东西是什么？它被称为&ldquo; <a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a>&rdquo;鸣门巻，或简称为&ldquo; Naruto&rdquo;。 <a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a>是一种鱼饼（日语称为kamaboko），是拉面的经典浇头。</p><p style=\"text-align: left;\"><strong><span style=\"font-size: 14px;\">&ldquo;鱼糕&rdquo;是什么意思？</span></strong></p><p style=\"text-align: center;\"><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054418.jpg\" class=\"fr-dii fr-draggable\"><br><em>Narutomaki关闭</em></p><p><a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a>是通过将染有红色食用染料的白色鱼酱和未染色的鱼酱包裹成原木形状制成的。然后将鱼肉原木用蒸汽煮熟，使其固化，然后切成薄片。</p><p><strong>narutomaki的味道如何？</strong></p><p style=\"text-align: center;\"><strong><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054460.jpg\" class=\"fr-dii fr-draggable\"></strong></p><p style=\"text-align: justify;\"><a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a>具有相当温和的腥味和耐嚼的质地。它最初是包含在拉面中的，与形成碗状的汤，茶树和浓汤的棕色形成视觉对比。由于味道并不是很重要，因此大多数现代拉面店不再将火影忍者用作浇头。但是，它的味道确实不错，仍然受到许多人的喜爱！</p><p style=\"text-align: left;\"><strong>为什么叫&ldquo;火影忍者&rdquo;？</strong></p><p style=\"text-align: center;\"><strong><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602054506.jpg\" class=\"fr-dii fr-draggable\"></strong><br>鸣门の涡潮（Naruto Whirlpools）</p><p style=\"text-align: justify;\">&ldquo; <a href=\"http://www.foodzone.vn/index/details/2570\">Narutomaki</a>&rdquo;这个名字的由来似乎没有任何书面记录，但是通常的理论是，鱼饼之所以被命名是因为它的形状让人联想到著名的&ldquo; Naruto Whirlpools&rdquo;。</p><p style=\"text-align: left;\"><strong>为什么将narutomaki用作拉面浇头？</strong></p><p style=\"text-align: center;\"><strong><img src=\"http://www.foodzone.vn/public/uploads/2020-10-07/1602055091.jpg\" class=\"fr-dii fr-draggable\"></strong><br><em>日本荞麦面与火影忍者作为浇头</em></p><p style=\"text-align: justify;\">火影忍者自江户时代末期（大约150年前）起就被用作日本荞麦面的浇头，而在日本甚至还没有吃过拉面。 1900年代初期，拉面从中国首次引入日本时，被称为&ldquo;什锦荞麦面&rdquo;，意为&ldquo;中国荞麦面&rdquo;。人们认为，由于<a href=\"http://www.foodzone.vn/index/details/2570\">narutomaki</a>通常被用作日本荞麦面的配料，因此很快也将其添加到了新的&ldquo;中国荞麦面&rdquo;中。</p><p style=\"text-align: right;\"><em>Source:favy-jp</em></p>','2020-10-07 14:21:37',5,3463,0,'2020-12-31 03:18:47',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (15,'adas',NULL,'<p>đâsxcvdfgdfg</p>','','','','',NULL,2,0,0,'2020-12-31 03:18:45',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (16,'adas',NULL,'<p>đâsxcvdfgdfg</p>','','','','',NULL,2,0,0,'2020-12-31 03:18:42',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (17,'ád',NULL,'<p>xcvdfgghrtyrt</p>','','','','',NULL,2,0,0,'2020-12-31 03:18:39',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (18,'xcvdfgrtyrty',NULL,'<p>rtfghfghryt</p>','','','','',NULL,2,0,0,'2020-12-30 07:34:54',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (19,'xcvdfgrtyrtyg',NULL,'<p>ưerwerdghretert</p>','','','','',NULL,2,0,0,'2020-12-30 07:34:51',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (20,'ádzxcvdfgdfdasdasd',NULL,'<figure class=\"table\"><table><tbody><tr><td><p><strong>CÔNG TY CP PYMEPHARCO</strong></p><p><strong>Đơn vị: Xưởng thuốc viên Nonbetalactam – STADA VN</strong></p></td><td><p><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></p><p><strong>Độc lập – Tự do – Hạnh phúc</strong></p><p><i>Tuy Hòa, ngày &nbsp; 30 &nbsp;tháng &nbsp; 12 &nbsp;năm 2020</i></p></td></tr></tbody></table></figure><p><strong>GIẤY ĐỀ NGHỊ SỬA CHỮA</strong></p><p><strong>Kính gửi:&nbsp;&nbsp; Ban giám đốc</strong></p><p><strong>Phòng CƠ KHÍ- BẢO TRÌ</strong></p><p>Nội dung đề nghị sửa chữa:&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Máy Laptop HP Pavilion của Giám đốc sản xuất</p><p>Tình trạng hiện tại: &nbsp;&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Hiện tại máy Laptop HP Pavilion bị hư pin</p><p>Phương án sửa chữa:&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đề nghị phòng IT thay pin mới</p><p>Thời gian sửa chữa: Từ ngày 31/12/2020 – 0/01/2021</p><figure class=\"table\"><table><tbody><tr><td><strong>Phê duyệt&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Trưởng bộ phận</strong></td><td><p>Ngày 30 tháng 01 năm 2021</p><p><strong>Người đề nghị</strong></p></td></tr></tbody></table></figure><p>Ý kiến người sửa chữa:</p><p>..........................................................................................................................................................&nbsp;</p><p>..........................................................................................................................................................&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td><p>Ngày……tháng ….. năm ……</p><p><strong>Người sửa chữa</strong></p></td></tr></tbody></table></figure>','','','','',NULL,2,3,0,'2020-12-31 03:18:41',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (21,'rưerwerwergfhty',NULL,'<p>adxcvdfg</p>','','','','','2020-12-30 21:10:12',2,0,0,'2020-12-31 03:19:06',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (22,'rưerwerwergfhty',NULL,'<p>adxcvdfg</p>','','','','','2020-12-30 21:10:28',2,0,0,'2020-12-31 03:19:14',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (23,'ẻwerwerwer',NULL,'<p>ádxcvswerwerw</p>','','','','','2020-12-30 21:10:35',2,0,0,'2020-12-31 03:19:13',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (24,'ẻwerwerwer',NULL,'<p>ádxcvswerwerw</p>','','','','','2020-12-30 21:11:42',2,0,0,'2020-12-31 03:19:12',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (25,'ẻwerwerwer',NULL,'<p>ádxcvswerwerw</p>','','','','','2020-12-30 21:11:43',2,0,0,'2020-12-31 03:19:11',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (26,'ẻwerwerwer',NULL,'<p>ádxcvswerwerw</p>','','','','','2020-12-30 21:11:44',2,0,0,'2020-12-31 03:19:11',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (27,'đâsd',NULL,'<p>tran</p>','','','','','2020-12-30 21:16:23',2,3,0,'2020-12-31 03:19:10',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (28,'sdfvcbfgh',NULL,'<p>rtyrtyrytrtyrty</p>','','','','','2020-12-30 22:16:19',2,3,0,'2020-12-31 03:19:09',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (29,'Hiểu đúng về Truy xuất nguồn gốc sản phẩm',NULL,'<p>Hiện tại nhiều người còn chưa biết thế nào là truy xuất nguồn gốc và làm thế nào cho đúng hoặc đang hiểu sai về truy xuất nguồn gốc. Mọi người cứ nghĩ là tạo ra cái mã QR Code rồi dán lên sản phẩm với một vài thông tin cơ bản là truy xuất nguồn gốc nhưng ko phải. Hiện tại đến 95% mã Qr Code được dán lên các sản phẩm trong siêu thị không phải là mã truy xuất nguồn gốc mà chỉ là truy xuất thông tin Mã truy xuất nguồn gốc đúng cần đảm bảo truy xuất được toàn bộ quá trình sản xuất - chế biến - phân phối sản phẩm và phải đảm bảo có 5 điều kiện sau :&nbsp;</p><p>1. Xem được đầy đủ thông tin về sản phẩm theo quy định lưu hành và công bố sản phẩm.&nbsp;</p><p>2. Truy xuất được chuỗi liên kết tạo ra giá trị sản phẩm ( Các cá nhân và tổ chức có tham gia hoặc liên quan đến quá trình sản xuất - chế biến - phân phối sản phẩm ).&nbsp;</p><p>3. Xem được chỉ dẫn địa lý của vùng sản xuất ra sản phẩm.&nbsp;</p><p>4. Xem được các giấy tờ và các chứng nhận về thành phần, chất lượng và các công nhận về sản phẩm.</p><p>&nbsp;5. Chứng minh được lịch sử sản xuất - chế biến - phân phối sản phẩm thông qua nhật ký hoạt động điện tử được đóng góp bởi tất cả các thành viên trong chuỗi liên kết giá trị sản phẩm. Nếu không đảm bảo các yêu cầu này thì đều chỉ là mã xem thông tin. Rất dễ để có thể tạo ra mã xem thông tin bằng cách coppy link sản phẩm bỏ và trình tạo mã Qr code miễn phí của hoptacxa.vn là có ngay mã dán lên sản phẩm&nbsp;</p><p>HƯỚNG DẪN TỰ LÀM TRUY XUẤT NGUỒN GỐC SẢN PHẨM&nbsp;</p><p>1. Tải ứng dụng Hoptacxa trên chợ ứng dụng về điện thoại&nbsp;</p><p>2. Mời tất cả các thành viên trong chuỗi liên kết giá trị sản phẩm đăng ký vào hệ thống và ghi lại mọi hoạt động liên quan đến việc sản xuất, chế biến, phân phối sản phẩm.&nbsp;</p><p>3. Cập nhật lại thông tin cá nhân có đầy đủ chuỗi liên kết các thành viên liên quan.&nbsp;</p><p>4. Ghi nhật ký mọi hoạt động liên quan đến việc sản xuất, chế biến, phân phối sản phẩm để chứng minh lịch sử.&nbsp;</p><p>5. Tạo mã truy xuất nguồn gốc cho các sản phẩm của mình&nbsp;</p><p>6. Yêu cầu các thành viên trong chuỗi liên kết tạo mã truy xuất nguồn gốc cho các vật tư và nguyên liệu góp phần tạo ra sản phẩm&nbsp;</p><p>7. Cập nhật lại mã truy xuất nguồn gốc sản phẩm có đầy đủ chuỗi liên kết giá trị sản phẩm và đầy đủ danh sách nguyên liệu tạo ra sản phẩm.&nbsp;</p><p>8. Tải mã truy xuất nguồn gốc in ra và dán lên sản phẩm 9. Tiếp tục cùng các thành viên trong chuỗi liên kết giá trị sản phẩm ghi lại mọi hoạt động liên quan đến việc sản xuất, chế biến, phân phối sản phẩm. Nếu bạn cần một hệ thống riêng và bài bản hãy liên hệ ngay tôi sẽ giúp bạn ( bao gồm quy trình và giấy tờ đảm bảo xuất khẩu hàng hoá đi toàn cầu).&nbsp;</p><p>HỆ THỐNG TRUY XUẤT NGUỒN GỐC BAO GỒM&nbsp;</p><p>1. Website giới thiệu thông tin hệ thống và thông tin truy xuất nguồn gốc sản phẩm&nbsp;</p><p>2. Ứng dụng (app) quản lý cho thành viên trên điện thoại hệ điều hành Androi và IOS.&nbsp;</p><p>3. Profile chi tiết tất cả các thành viên liên quan trong các chuỗi liên kết giá trị sản phẩm và mối quan hệ giữa các thành viên trong chuỗi liên kết.&nbsp;</p><p>4. Nhật ký điện tử giúp minh bạch và chứng minh nguồn gốc xuất xứ sản phẩm, lịch sử sản xuất - phân phối - lưu hành sản phẩm và lịch sử hoạt động của các thành viên trong chuỗi liên kết giá trị sản phẩm. Đồng thời giúp mọi thành viên có thể giám sát chéo lẫn nhau, học hỏi lẫn nhau cùng nâng cao chất lượng sản phẩm.&nbsp;</p><p>5. Bản đồ chỉ dẫn địa lý hiển thị đầy đủ các vùng sản xuất, giúp các thành viên và khách hàng thấy được vị trí phân bố của các vùng sản xuất trên bản đồ đồng thời có thể xem chi tiết một vùng nguyên liệu tại một vị trí trên bản đồ.&nbsp;</p><p>6. Hệ thống tạo thông tin truy xuất nguồn gốc, xuất mã tem truy xuất nguồn gốc cho các lô sản phẩm được thành viên tạo ra. Mã truy xuất nguồn gốc được chấp nhận bởi Hải Quan toàn cầu.&nbsp;</p><p>7. Sàn giao dịch sản phẩm giúp giới thiệu các sản phẩm có thông tin truy xuất nguồn gốc đầy đủ đến khách hàng trên toàn thế giới. Hệ thống dịch ngôn ngữ tự động ra 22 ngôn ngữ phổ biến nhất thế giới.&nbsp;</p><p>8. Bảng tin giúp mọi thành viên và khách hàng đóng góp thông tin, trao đổi thông tin, trao đổi kinh nghiệm, cập nhật thông tin mới, giao lưu học hỏi tạo chuỗi liên kết giá trị sản phẩm.</p><p>&nbsp;CHÚNG TÔI LUÔN PHẤN ĐẤU KHÔNG NGỪNG - Giúp khách hàng có được một vùng nguyên liệu Chất Lượng - Đủ Lớn - Ổn Định Lâu Dài - Giúp khách hàng an tâm về chất lượng sản phẩm bằng cách cùng đưa ra quy trình quy định và tham gia giám sát 24/24 toàn bộ quá trình sản xuất - chế biến - phân phối sản phẩm. - Giúp nâng cao chất lượng và giá trị sản phẩm của Việt Nam - Giúp nông dân có đầu ra ổn định lâu dài, nâng cao giá bán sản phẩm, nâng cao chất lượng cuộc sống.</p>','','','','','2020-12-31 03:20:55',2,0,0,'2020-12-31 03:21:36',NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (30,'Hiểu đúng về Truy xuất nguồn gốc sản phẩm',NULL,'','','','','','2020-12-31 03:21:33',2,4,0,NULL,NULL,NULL);
insert  into `cf_news`(`id`,`title_vi`,`slug`,`content_vi`,`title_en`,`content_en`,`title_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (31,'Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội',NULL,'<p>C&acirc;y sanh cổ được nhắc đến thuộc sở hữu của nghệ nh&acirc;n Nguyễn Gia Thọ- Chủ tịch Hội Sinh Vật Cảnh Việt Nam, người được giới&nbsp;c&acirc;y cảnh&nbsp;nghệ thuật biết đến với những t&aacute;c phẩm c&acirc;y cảnh nghệ thuật đặc sắc mang phong c&aacute;ch &quot;Cổ - Linh - Tinh - T&uacute;&quot;.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội - 2\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-10-18/1602982212-1f70ae7ba01687cd35f46809cbab7795.jpg\" /></p>\r\n\r\n<p>C&acirc;y được định gi&aacute; hơn 4 tỷ đồng, l&agrave; một trong những bảo vật được giới sinh vật cảnh săn l&ugrave;ng bởi bộ rễ tuyệt đẹp, phong h&oacute;a c&ugrave;ng thời gian.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội - 3\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-10-18/1602982212-c8d9f592d301634c7171406245cba638.jpg\" /></p>\r\n\r\n<p>Được biết, c&acirc;y đ&atilde; trải qua 3 đời chậu nhỏ, to&agrave;n bộ số chậu cũ đều được rễ quấn tr&agrave;n, &quot;nuốt&quot; trọn bao quanh. &quot;Hiểu đơn giản l&agrave; khi c&acirc;y ph&aacute;t triển, số chậu cũ đều kh&ocirc;ng đ&aacute;p ứng được kh&ocirc;ng gian trồng. Thế n&ecirc;n, c&acirc;y tiếp tục mọc l&ecirc;n, vượt qua khỏi ranh giới cũ. Qua mỗi lần như vậy, nghệ nh&acirc;n lại đặt th&ecirc;m chậu mới to hơn, rộng hơn cho c&acirc;y m&agrave; kh&ocirc;ng ph&aacute; bỏ chậu cũ&quot; - &ocirc;ng Thọ l&yacute; giải.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội - 4\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-10-18/1602982212-cdac03e5729ce2b548c96a542c76f261.jpg\" /></p>\r\n\r\n<p>Hiện tượng c&acirc;y &quot;nuốt&quot; chậu kh&ocirc;ng phải l&agrave; hiếm nhưng theo &ocirc;ng Vương Xu&acirc;n Nguy&ecirc;n- Ch&aacute;nh văn ph&ograve;ng Hội sinh vật cảnh H&agrave; Nội, c&acirc;y &quot;nuốt&quot; chậu lại ra được h&igrave;nh d&aacute;ng đẹp như thế n&agrave;y thực sự rất kh&oacute; t&igrave;m.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội - 5\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-10-18/1602982212-79d4290dbb7c0afdd11a2e4f7c5000f5.jpg\" /></p>\r\n\r\n<p>C&acirc;y đạt được 9 ti&ecirc;u ch&iacute; v&agrave;ng của giới sinh vật cảnh l&agrave; ph&ocirc; th&acirc;n, khoe l&aacute;, lộ căn, cổ, linh, tinh, t&uacute;, kỹ dăm, mịn t&agrave;n.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội - 6\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-10-18/1602982212-7eff187fb71a440c0d9ab57896f9ee22.jpg\" /></p>\r\n\r\n<p>C&aacute;c phần rễ của c&acirc;y vẫn đang trong qu&aacute; tr&igrave;nh thiết kế v&agrave; nu&ocirc;i trồng. Tay c&agrave;nh được l&agrave;m theo lối tản v&acirc;n rất c&ocirc;ng phu.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội - 7\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-10-18/1602982213-0cf3da795f3e4e686fb9812b7187d1f5.jpg\" /></p>\r\n\r\n<p>Ngo&agrave;i sanh cổ n&oacute;i tr&ecirc;n, nghệ nh&acirc;n Nguyễn Gia Thọ c&ograve;n sở hữu kh&ocirc;ng &iacute;t những c&acirc;y cảnh gi&aacute; trị, trong đ&oacute;, nổi bật phải kể đến t&aacute;c phẩm Hải Ch&acirc;u với d&aacute;ng thế độc đ&aacute;o, nghệ thuật.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội - 8\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-10-18/1602982213-f9665316a2fcff8fbce1aef1c1fb1134.jpg\" /></p>\r\n\r\n<p>C&acirc;y mai chiếu thủy hoa trắng, d&ograve;ng bonsai, d&aacute;ng trực, th&acirc;n vặn xoắn ốc của &ocirc;ng Thọ hiện được định gi&aacute; l&ecirc;n tới h&agrave;ng tỷ đồng.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Chiêm ngưỡng cây sanh cổ trăm tuổi phong hóa cùng thời gian, trị giá ngang căn chung cư của đại gia Hà Nội - 9\" src=\"https://cdn.24h.com.vn/upload/4-2020/images/2020-10-18/1602982213-7255f4ad70fe8f3dbc9f7f5764df3481.jpg\" /></p>\r\n\r\n<p>C&acirc;y c&oacute; ni&ecirc;n đại h&agrave;ng trăm năm, sở hữu bộ rễ cực phẩm, độc đ&aacute;o bện lại với nhau th&agrave;nh một khối trụ k&eacute;o d&agrave;i thẳng đứng.</p>\r\n','','','','','2021-01-05 21:41:18',2,0,0,NULL,NULL,NULL);

/*Table structure for table `cf_news_tag` */

DROP TABLE IF EXISTS `cf_news_tag`;

CREATE TABLE `cf_news_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `cf_news_tag` */

insert  into `cf_news_tag`(`id`,`tag_id`,`news_id`) values (2,2,27);
insert  into `cf_news_tag`(`id`,`tag_id`,`news_id`) values (4,3,27);
insert  into `cf_news_tag`(`id`,`tag_id`,`news_id`) values (5,2,28);
insert  into `cf_news_tag`(`id`,`tag_id`,`news_id`) values (6,3,30);
insert  into `cf_news_tag`(`id`,`tag_id`,`news_id`) values (7,3,31);

/*Table structure for table `cf_options` */

DROP TABLE IF EXISTS `cf_options`;

CREATE TABLE `cf_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(256) DEFAULT NULL,
  `value` longtext,
  `title` varchar(100) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `group` varchar(256) DEFAULT NULL,
  `deleted` tinyint(9) unsigned NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `cf_options` */

insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (1,'hot_line','035.392.8135 - 038.833.2079 Mr Tú','Số điện thoại',NULL,'varchar',5,'general',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (3,'dia_chi','Thôn Ngọc Sơn, Hòa Quang Bắc, Phú hòa, Tỉnh Phú Yên','Địa chỉ',NULL,'varchar',3,'general',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (4,'mo_ta','NHÀ MÁY XAY XÁT TÚ LOAN','Mô tả',NULL,'text',2,'general',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (5,'email','lytranuit@gmail.com','Email',NULL,'varchar',4,'general',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (6,'hour_open','8h - 18h','Giờ mở cửa',NULL,'text',6,'general',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (9,'company_name','HỢP TÁC XÃ NÔNG NGHIỆP PHÚ YÊN','Tên công ty',NULL,'varchar',1,'general',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (10,'email_server','smtp.gmail.com','Email Server',NULL,'varchar',0,'send_mail',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (11,'email_port','465','Port',NULL,'varchar',0,'send_mail',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (12,'email_name','Foodzone E-shop','Name',NULL,'varchar',0,'send_mail',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (13,'email_email','lytranuit@gmail.com','Email',NULL,'varchar',0,'send_mail',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (18,'email_security','ssl','Security',NULL,'varchar',0,'send_mail',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (19,'email_username','lytranuit@gmail.com','Username',NULL,'varchar',0,'send_mail',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (20,'email_password','vexdxgjkbyqtbsf','Password',NULL,'varchar',0,'send_mail',0,NULL,NULL,NULL);
insert  into `cf_options`(`id`,`key`,`value`,`title`,`comment`,`type`,`order`,`group`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (21,'email_contact','binh.nguyen@simba.com.vn,cskh@simba.com.vn,simbasales@simba.com.vn,so-support@simba.com.vn,lytranuit@gmail.com,minh@greenitsolution.vn','Email Contact Name',NULL,'varchar',0,'send_mail',0,NULL,NULL,NULL);

/*Table structure for table `cf_page` */

DROP TABLE IF EXISTS `cf_page`;

CREATE TABLE `cf_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(256) DEFAULT NULL,
  `title_vi` varchar(256) DEFAULT NULL,
  `description_vi` varchar(256) DEFAULT NULL,
  `content_vi` text,
  `title_en` varchar(256) DEFAULT NULL,
  `description_en` varchar(256) DEFAULT NULL,
  `content_en` text,
  `title_jp` varchar(256) DEFAULT NULL,
  `description_jp` varchar(256) DEFAULT NULL,
  `content_jp` text,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_home` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cf_page` */

insert  into `cf_page`(`id`,`slug`,`title_vi`,`description_vi`,`content_vi`,`title_en`,`description_en`,`content_en`,`title_jp`,`description_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`,`is_home`) values (1,NULL,'Liên hệ',NULL,'<p>ádsdffdgdf</p>','',NULL,'','',NULL,'','2020-12-31 03:09:27',2,4,0,NULL,NULL,NULL,0);
insert  into `cf_page`(`id`,`slug`,`title_vi`,`description_vi`,`content_vi`,`title_en`,`description_en`,`content_en`,`title_jp`,`description_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`,`is_home`) values (2,NULL,'Giới thiệu','','<p><strong>T&uacute; Loan&nbsp;Rice &ndash; N&acirc;ng cao gi&aacute; trị gạo Ph&uacute; Y&ecirc;n</strong><br />\r\n<br />\r\nL&uacute;a đạt chuẩn ngay từ đầu &quot;C&aacute;nh đồng ở Ph&uacute; Y&ecirc;n&quot; &ndash; sau đ&oacute; được Ch&uacute;ng t&ocirc;i thu mua vận chuyển đến nh&agrave; m&aacute;y sản xuất gạo sạch Nga &Yacute;&nbsp;Rice. Với đặc th&ugrave; gạo sạch theo đ&uacute;ng ti&ecirc;u chuẩn&nbsp;Vệ Sinh An To&agrave;n Thực Phẩm (VSATTP), tuyệt đối&nbsp;kh&ocirc;ng&nbsp;sử dụng bất kỳ h&oacute;a chất,&nbsp;chất bảo quản trong qu&aacute; tr&igrave;nh sản xuất v&agrave; chế biến. Ch&iacute;nh v&igrave; vậy,&nbsp;Từng hạt gạo&nbsp;của GạoPh&uacute;Y&ecirc;n.Vn - Nga &Yacute;&nbsp;Rice trước khi được trao đến tay người ti&ecirc;u d&ugrave;ng đều qua sự kiểm tra khắt khe theo đ&uacute;ng quy tr&igrave;nh đăng k&yacute; VSATTP.&rdquo;</p>\r\n\r\n<p><br />\r\nN&acirc;ng gi&aacute; trị gạo Ph&uacute; Y&ecirc;n</p>\r\n\r\n<p><strong>Tầm nh&igrave;n</strong></p>\r\n\r\n<ul>\r\n	<li>Tầm nh&igrave;n của ch&uacute;ng t&ocirc;i l&agrave; &quot;N&acirc;ng cao gi&aacute; trị gạo&nbsp;Ph&uacute; Y&ecirc;n&quot; bằng những h&agrave;nh động cụ thể như sau:\r\n	<ul>\r\n		<li>Đồng h&agrave;nh c&ugrave;ng N&ocirc;ng D&acirc;n ra đồng tạo ra sản phẩm l&uacute;a chất lượng, đảm bảo VSATTP</li>\r\n		<li>Từng bước ph&aacute;t triển n&acirc;ng cao c&ocirc;ng nghệ sản xuất hiện đại</li>\r\n	</ul>\r\n	</li>\r\n	<li>G&oacute;p phần tăng gi&aacute; trị&nbsp;bữa cơm gia đ&igrave;nh ở Ph&uacute; Y&ecirc;n n&oacute;i ri&ecirc;ng v&agrave; Việt Nam n&oacute;i chung.</li>\r\n</ul>\r\n\r\n<p><strong>Sứ mệnh</strong></p>\r\n\r\n<ul>\r\n	<li>N&acirc;ng cao ti&ecirc;u chuẩn sản xuất của gạo Ph&uacute; Y&ecirc;n</li>\r\n	<li>N&acirc;ng tầm thương hiệu gạo Ph&uacute; Y&ecirc;n tr&ecirc;n thị trường Việt Nam</li>\r\n	<li>X&acirc;y dựng thương&nbsp; hiệu gạo Ph&uacute; Y&ecirc;n ph&aacute;t triển bền vững, trở th&agrave;nh niềm tự h&agrave;o của người Ph&uacute; Y&ecirc;n.</li>\r\n</ul>\r\n\r\n<p><strong>Sản Phẩm</strong></p>\r\n\r\n<ul>\r\n	<li><strong><em>Gạo sạch cho Gia Đ&igrave;nh:</em></strong>&nbsp;Với hơn 22 năm kinh nghiệm trong ng&agrave;nh l&uacute;a gạo, l&agrave; một trong những đơn vị h&agrave;ng đầu cung ứng gạo sạch ăn ngon cơm, đậm vị ngọt mặn m&agrave; g&oacute;p phần &yacute; nghĩa cho bữa cơm gia đ&igrave;nh. Ch&uacute;ng t&ocirc;i tuyển chọn những hạt l&uacute;a chất lượng nhất từ người n&ocirc;ng d&acirc;n, đem sản xuất v&agrave; đ&oacute;ng g&oacute;i trực tiếp tại nh&agrave; m&aacute;y xay x&aacute;t ở x&atilde; H&ograve;a Quang, huyện Ph&uacute; H&ograve;a, Ph&uacute; Y&ecirc;n. Tất cả sản phẩm của ch&uacute;ng t&ocirc;i đều được đăng k&yacute; đảm bảo Vệ Sinh An To&agrave;n Thực Phẩm. Với c&aacute;c d&ograve;ng sản phẩm ch&iacute;nh như:\r\n\r\n	<ul>\r\n		<li>​Gạo đặc sản Ph&uacute; Y&ecirc;n: Thơm Jasmine, Thơm H&ograve;a Quang HT1, D&agrave;i Mềm ANS1, Dẻo Tuy H&ograve;a, PY Xốp Nở.</li>\r\n		<li>Gạo X&aacute;t Mộc: GXM loại A+ t&uacute;i 10kg; GXM AA+ t&uacute;i 10kg.</li>\r\n	</ul>\r\n	</li>\r\n	<li><em><strong>Gạo nguy&ecirc;n liệu sản xuất:</strong></em>&nbsp;Tự h&agrave;o l&agrave; đơn vị cung cấp gạo nguy&ecirc;n liệu l&agrave;m b&uacute;n, b&aacute;nh, phở số 1 tại x&atilde; H&ograve;a Đa, Tuy An. Với ti&ecirc;u ch&iacute;: Ổn Định, Chuẩn v&agrave; M&agrave;u trắng giấy tự nhi&ecirc;n đ&atilde; l&agrave;m h&agrave;i l&ograve;ng biết bao nh&agrave; sản xuất B&uacute;n, B&aacute;nh &amp; Phở. Với c&aacute;c d&ograve;ng sản phẩm ch&iacute;nh sau:\r\n	<ul>\r\n		<li>​Gạo Xẹt ĐV108; BD258 l&agrave;m b&uacute;n b&aacute;nh</li>\r\n		<li>Gạo Q l&agrave;m phở</li>\r\n		<li>Gạo 5 số/Đ&agrave; Nẵng l&agrave;m b&uacute;n b&aacute;nh</li>\r\n		<li>Gạo HoreCa với đặc t&iacute;nh Dẻo vừa, mềm cơm, thơm nhẹ ph&ugrave; hợp Bếp ăn c&ocirc;ng nghiệp, qu&aacute;n cơm, nh&agrave; h&agrave;ng, qu&acirc;n đội.&nbsp;</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>Với hệ thống xay x&aacute;t hiện tại, kho b&atilde;i rộng r&atilde;i &gt;1500m2 v&agrave; đa dạng kiểu loại bao b&igrave; đ&oacute;ng g&oacute;i. Ch&uacute;ng t&ocirc;i mang đến cho Qu&yacute; Đại l&yacute; trong to&agrave;n tỉnh Ph&uacute; Y&ecirc;n với nhiều ch&iacute;nh s&aacute;ch:</p>\r\n\r\n<ul>\r\n	<li>Sản phẩm gạo chất lượng ổn định;</li>\r\n	<li>Gi&aacute; cả cạnh tranh;</li>\r\n	<li>Đội ngũ xe tải, bốc xếp giao gạo tận nơi nhanh ch&oacute;ng;</li>\r\n	<li>Sẵn s&agrave;ng chia sẻ, trao đổi kinh nghiệm kinh doanh gạo.</li>\r\n</ul>\r\n\r\n<p><strong>GạoPh&uacute;Y&ecirc;n</strong></p>\r\n\r\n<p>ĐC: Th&ocirc;n Ngọc Sơn, H&ograve;a Quang Bắc, Ph&uacute; h&ograve;a, Tỉnh Ph&uacute; Y&ecirc;n</p>\r\n\r\n<p>Li&ecirc;n hệ : 035.392.8135 - 038.833.2079 Mr T&uacute;</p>\r\n','','','','','','','2020-12-31 03:10:23',2,12,0,NULL,NULL,NULL,0);
insert  into `cf_page`(`id`,`slug`,`title_vi`,`description_vi`,`content_vi`,`title_en`,`description_en`,`content_en`,`title_jp`,`description_jp`,`content_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`,`is_home`) values (3,NULL,'Phần mềm truy xuất nguồn gốc sản phẩm hàng hóa theo tiêu chuẩn GS1 toàn cầu','Đã được chứng nhận phù hợp tiêu chuẩn truy xuất nguồn gốc quốc gia và quốc tế','<p><img alt=\"\" src=\"/assets/userfiles/images/gao-dac-san.png\" style=\"height:342px; width:395px\" /></p>\r\n','','','','','','','2021-01-04 08:39:52',2,21,0,NULL,NULL,NULL,1);

/*Table structure for table `cf_product` */

DROP TABLE IF EXISTS `cf_product`;

CREATE TABLE `cf_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(256) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `name_vi` varchar(256) DEFAULT NULL,
  `description_vi` text,
  `guide_vi` text,
  `element_vi` text,
  `uses_vi` text,
  `name_en` varchar(256) DEFAULT NULL,
  `description_en` text,
  `guide_en` text,
  `element_en` text,
  `uses_en` int(11) DEFAULT NULL,
  `name_jp` varchar(256) DEFAULT NULL,
  `description_jp` text,
  `guide_jp` text,
  `element_jp` text,
  `uses_jp` text,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `cf_product` */

insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (1,'cf001',100000,NULL,'Gạo FESXCZ','','','','','','','','',0,'','','','','',2,'2020-12-31 01:52:22',4,0,'2020-12-31 01:53:05',NULL,NULL);
insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (2,'cf001',100000,NULL,'Gạo FESXCZ','<p>xvcfdgwerwerwer</p>','','','','','','','',0,'','','','','',2,'2020-12-31 01:52:59',4,0,NULL,NULL,NULL);
insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (3,'cf02020',20000,NULL,'Gạo làng ta','<p>sfdxcvtwewrwerwerwer</p>','','','','','','','',0,'','','','','',2,'2021-01-04 19:34:11',8,0,NULL,NULL,NULL);
insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (4,'cf202020',10000,NULL,'Lúa tốt','<p>xcvdfgwerwerwer</p>','','','','','','','',0,'','','','','',2,'2021-01-04 19:36:40',3,0,NULL,NULL,NULL);
insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (5,'cf1000100',10000,NULL,' Xăng dầu','','','','','','','','',0,'','','','','',2,'2021-01-05 02:17:20',0,0,NULL,NULL,NULL);
insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (6,'cvbdfg',100000,NULL,'bncvbdfgdfgertert','<p>sdfsdfvbnfghfghfgh</p>\r\n','','','','','','','',0,'','','','','',2,'2021-01-22 21:52:01',25,0,NULL,NULL,NULL);
insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (7,'cf34234',1000000,NULL,'vbnfghertrqweqweqwe','','','','','','','','',0,'','','','','',2,'2021-01-22 21:52:21',23,0,NULL,NULL,NULL);
insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (8,'HTC567',50000,NULL,'vbnfgweerqweqwe','','','','<p style=\"text-align:center\"><img alt=\"\" src=\"/assets/userfiles/images/gao-dac-san.png\" style=\"height:342px; width:395px\" /></p>\r\n\r\n<p style=\"text-align:center\">ok baby</p>\r\n','','','','',0,'','','','','',2,'2021-01-22 21:52:37',29,0,NULL,NULL,NULL);
insert  into `cf_product`(`id`,`code`,`price`,`slug`,`name_vi`,`description_vi`,`guide_vi`,`element_vi`,`uses_vi`,`name_en`,`description_en`,`guide_en`,`element_en`,`uses_en`,`name_jp`,`description_jp`,`guide_jp`,`element_jp`,`uses_jp`,`user_id`,`date`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (9,'HTC231123',200000,'tet-ma-nguon-moi','tét mã nguồn mới','<p>xcvsdsdfsdfsf</p>\r\n','<p>rưerwerwer</p>\r\n','<p>sdfsdfcvbsdwerwerw</p>\r\n','<p>ẻwẻwerwe</p>\r\n','','','','',0,'','','','','',2,'2021-01-24 18:24:13',23,0,NULL,NULL,NULL);

/*Table structure for table `cf_product_category` */

DROP TABLE IF EXISTS `cf_product_category`;

CREATE TABLE `cf_product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `cf_product_category` */

insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (5,5,3);
insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (6,4,2);
insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (7,2,1);
insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (8,3,1);
insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (9,7,4);
insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (10,8,1);
insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (11,9,1);
insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (12,9,2);
insert  into `cf_product_category`(`id`,`product_id`,`category_id`) values (13,9,3);

/*Table structure for table `cf_product_image` */

DROP TABLE IF EXISTS `cf_product_image`;

CREATE TABLE `cf_product_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2705 DEFAULT CHARSET=utf8;

/*Data for the table `cf_product_image` */

insert  into `cf_product_image`(`id`,`product_id`,`image_id`) values (2702,4,8);
insert  into `cf_product_image`(`id`,`product_id`,`image_id`) values (2703,4,7);
insert  into `cf_product_image`(`id`,`product_id`,`image_id`) values (2704,2,7);

/*Table structure for table `cf_slider` */

DROP TABLE IF EXISTS `cf_slider`;

CREATE TABLE `cf_slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `text` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `cf_slider` */

insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (1,4,NULL,NULL,1,1,'2020-12-31 02:16:59',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (2,6,NULL,NULL,2,1,'2020-12-31 02:17:01',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (3,3409,'','',4,1,'2020-12-31 02:17:02',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (4,3415,'','',3,0,'2020-12-31 02:17:03',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (5,3456,'','',1,0,'2020-12-31 02:17:04',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (6,3414,'','http://www.foodzone.vn/index/category/77',2,0,'2020-12-31 02:17:05',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (7,3418,'','',4,0,'2020-12-31 02:17:06',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (8,3417,'','',5,0,'2020-12-31 02:17:07',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (9,3,NULL,'',0,0,'2020-12-31 02:17:08',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (10,4,NULL,'',0,0,'2020-12-31 02:17:09',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (11,10,NULL,'',2,0,'2021-01-12 20:50:12',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (12,15,NULL,'',1,0,'2021-01-14 20:51:22',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (13,22,NULL,'',2,0,NULL,NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (14,16,NULL,'',3,0,'2021-01-14 20:51:24',NULL,NULL);
insert  into `cf_slider`(`id`,`image_id`,`text`,`url`,`order`,`deleted`,`deleted_at`,`created_at`,`updated_at`) values (15,19,NULL,'',4,0,NULL,NULL,NULL);

/*Table structure for table `cf_tag` */

DROP TABLE IF EXISTS `cf_tag`;

CREATE TABLE `cf_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(256) DEFAULT NULL,
  `description_vi` text,
  `name_en` varchar(256) DEFAULT NULL,
  `description_en` text,
  `name_jp` varchar(256) DEFAULT NULL,
  `description_jp` text,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cf_tag` */

insert  into `cf_tag`(`id`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (1,'tran','','','','','',NULL,2,3,0,'2020-12-30 20:36:38',NULL,NULL);
insert  into `cf_tag`(`id`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (2,'Tin Tức','test','','','','','2020-12-30 20:34:59',2,3,0,'2020-12-31 03:19:20',NULL,NULL);
insert  into `cf_tag`(`id`,`name_vi`,`description_vi`,`name_en`,`description_en`,`name_jp`,`description_jp`,`date`,`user_id`,`image_id`,`deleted`,`deleted_at`,`updated_at`,`created_at`) values (3,'Giới thiệu','vbfgdertertert','','','','','2020-12-30 20:59:59',2,3,0,NULL,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values (1,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1609163262,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`username`,`password_hash`,`reset_hash`,`reset_at`,`reset_expires`,`activate_hash`,`status`,`status_message`,`active`,`force_pass_reset`,`name`,`description`,`image_id`,`address`,`phone`,`created_at`,`updated_at`,`deleted_at`) values (2,'daotran@gmail.com','daotran','$2y$10$4wVDPQnlNfwE7c3mymbt8ugeiBoaXRPAcTmEnyCShkB/ONQYKqXbW',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'trân','sdfdfgdfhertert',8,'sdf234234werwer','123123asd','2020-12-28 08:04:03','2021-01-07 10:04:07',NULL);
insert  into `users`(`id`,`email`,`username`,`password_hash`,`reset_hash`,`reset_at`,`reset_expires`,`activate_hash`,`status`,`status_message`,`active`,`force_pass_reset`,`name`,`description`,`image_id`,`address`,`phone`,`created_at`,`updated_at`,`deleted_at`) values (3,'lytranuit@gmail.com','tranit','$2y$10$/By8EO75wGLrZZE3pC27Q.oXsaYWdISfkADrDRPcFjVeET4Wz3bgm',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'test','',0,'','','2021-01-07 09:49:41','2021-01-07 20:48:20',NULL);
insert  into `users`(`id`,`email`,`username`,`password_hash`,`reset_hash`,`reset_at`,`reset_expires`,`activate_hash`,`status`,`status_message`,`active`,`force_pass_reset`,`name`,`description`,`image_id`,`address`,`phone`,`created_at`,`updated_at`,`deleted_at`) values (4,'1610034659@gmail.com','hienit','$2y$10$Q3y3B0LqTiWecUN8Mdve.eDPWoCV6R4W5OB00YDCBppJQ3bvdqI82',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'test','',0,'','','2021-01-07 09:50:59','2021-01-07 09:52:40','2021-01-07 09:52:40');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
