/*
SQLyog Trial v13.1.8 (64 bit)
MySQL - 5.7.35-38 : Database - employees
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`employees` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `employees`;

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lead_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `department_id_uindex` (`id`),
  KEY `fk_department_lead_by_id` (`lead_by`),
  CONSTRAINT `fk_department_lead_by_id` FOREIGN KEY (`lead_by`) REFERENCES `employee` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `department` */

insert  into `department`(`id`,`name`,`lead_by`) values 
(1,'Sales',1),
(2,'IT',2),
(3,'Accounting',3),
(4,'HR',6),
(5,'Logistics',8);

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_name_uindex` (`name`),
  KEY `fk_employee_department_id` (`department_id`),
  CONSTRAINT `fk_employee_department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`id`,`name`,`department_id`) values 
(1,'Mary',1),
(2,'Stan',2),
(3,'John',3),
(4,'Michelle',1),
(5,'Simone',1),
(6,'Macy',4),
(7,'Mike',5),
(8,'James',5),
(9,'Tina',4),
(10,'Paul',1);

/*Table structure for table `employee_job` */

DROP TABLE IF EXISTS `employee_job`;

CREATE TABLE `employee_job` (
  `employee_id` int(10) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  KEY `fk_employee_job_employee_id` (`employee_id`),
  KEY `fk_employee_job_job_id` (`job_id`),
  CONSTRAINT `fk_employee_job_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  CONSTRAINT `fk_employee_job_job_id` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employee_job` */

insert  into `employee_job`(`employee_id`,`job_id`) values 
(1,9),
(2,11),
(3,12),
(4,10),
(5,9),
(7,15),
(8,15),
(6,13),
(9,13),
(10,9),
(1,11);

/*Table structure for table `job` */

DROP TABLE IF EXISTS `job`;

CREATE TABLE `job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `job` */

insert  into `job`(`id`,`name`) values 
(9,'Agent'),
(10,'Senior Agent'),
(11,'Sysadmin'),
(12,'Accountant'),
(13,'Recruiter'),
(14,'Programmer'),
(15,'Planner'),
(16,'Economist');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
