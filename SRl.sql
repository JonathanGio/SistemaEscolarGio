/*
SQLyog Ultimate v9.02 
MySQL - 5.5.27 : Database - usuario
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`usuario` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `usuario`;

/*Table structure for table `asigna_g` */

DROP TABLE IF EXISTS `asigna_g`;

CREATE TABLE `asigna_g` (
  `idasi` int(11) NOT NULL AUTO_INCREMENT,
  `Id` int(11) DEFAULT NULL,
  `Idg` int(11) DEFAULT NULL,
  PRIMARY KEY (`idasi`),
  KEY `Id` (`Id`),
  KEY `Idg` (`Idg`),
  CONSTRAINT `asigna_g_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `usuario` (`Id`),
  CONSTRAINT `asigna_g_ibfk_2` FOREIGN KEY (`Idg`) REFERENCES `grupo` (`Idg`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `asigna_g` */

LOCK TABLES `asigna_g` WRITE;

insert  into `asigna_g`(`idasi`,`Id`,`Idg`) values (36,18,1),(40,33,3),(58,37,1);

UNLOCK TABLES;

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `Idg` int(11) NOT NULL,
  `N_grupo` varchar(100) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Idg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

LOCK TABLES `grupo` WRITE;

insert  into `grupo`(`Idg`,`N_grupo`,`activo`) values (1,'ITIC-71','SI'),(2,'ITIC-72','SI'),(3,'ITIC-73','SI');

UNLOCK TABLES;

/*Table structure for table `maestro` */

DROP TABLE IF EXISTS `maestro`;

CREATE TABLE `maestro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(400) DEFAULT NULL,
  `app` varchar(400) DEFAULT NULL,
  `apm` varchar(400) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `orden` varchar(300) DEFAULT NULL,
  `estatus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `maestro` */

LOCK TABLES `maestro` WRITE;

insert  into `maestro`(`id`,`nombre`,`app`,`apm`,`avatar`,`orden`,`estatus`) values (1,'Cinthya M','González','Guadarrama','images/img/page2_img3.jpg','NPI','2'),(2,'Roxana','Pérez','Torres','images/img/page4_img6.jpg','NPI','2'),(3,'Iyeliz','Reyez','De Los Santos','images/img/page1_img1.jpg','NPI','2');

UNLOCK TABLES;

/*Table structure for table `maestros_materias` */

DROP TABLE IF EXISTS `maestros_materias`;

CREATE TABLE `maestros_materias` (
  `idm` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idm`),
  KEY `id_materia` (`id_materia`),
  KEY `id` (`id`),
  CONSTRAINT `maestros_materias_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`),
  CONSTRAINT `maestros_materias_ibfk_2` FOREIGN KEY (`id`) REFERENCES `maestro` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `maestros_materias` */

LOCK TABLES `maestros_materias` WRITE;

insert  into `maestros_materias`(`idm`,`id_materia`,`id`) values (1,1,3),(2,2,3);

UNLOCK TABLES;

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id_materia` int(20) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `estatus` int(12) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

LOCK TABLES `materia` WRITE;

insert  into `materia`(`id_materia`,`nombre`,`estatus`) values (1,'Español',1),(2,'Programación',1),(3,'Mate',1);

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(500) DEFAULT NULL,
  `ApellidoPaterno` varchar(500) DEFAULT NULL,
  `ApellidoMaterno` varchar(500) DEFAULT NULL,
  `Telefono` varchar(500) DEFAULT NULL,
  `Calle` varchar(500) DEFAULT NULL,
  `NumeroExterior` int(100) DEFAULT NULL,
  `NumeroInterior` int(100) DEFAULT NULL,
  `Colonia` varchar(500) DEFAULT NULL,
  `Municipio` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `CP` int(100) DEFAULT NULL,
  `Correo` varchar(500) DEFAULT NULL,
  `Usuario` varchar(500) DEFAULT NULL,
  `Pass` varchar(1000) DEFAULT NULL,
  `Nivel` varchar(500) DEFAULT NULL,
  `Estatus` varchar(500) DEFAULT NULL,
  `Activo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`Id`,`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Telefono`,`Calle`,`NumeroExterior`,`NumeroInterior`,`Colonia`,`Municipio`,`Estado`,`CP`,`Correo`,`Usuario`,`Pass`,`Nivel`,`Estatus`,`Activo`) values (16,'Jonathan Giovanni','Mendoza','Amado',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'jonagio.12@hotmail.com','Gio','202cb962ac59075b964b07152d234b70','1','2','SI'),(17,'Cinthya M','González','Guadarrama',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cint.00@hotmail.com','Cinthya','202cb962ac59075b964b07152d234b70','2','2','SI'),(18,'Roxana','Pérez','Torrez',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'rox.00@hotmail.com','Roxana','202cb962ac59075b964b07152d234b70','2','2','SI'),(33,'Iyeliz ','Reyes','De Los Santos',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Iye.00@hotmail.com','Iyeliz','202cb962ac59075b964b07152d234b70','2','1','SI'),(36,'Donas','Peralta','Ambrocio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'202cb962ac59075b964b07152d234b70','3','1','SI'),(37,'Mas','Mas','Mas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'202cb962ac59075b964b07152d234b70','3','1','SI'),(38,'Liliana','Campos','Fabela',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'202cb962ac59075b964b07152d234b70','3','1','SI'),(39,'Paola','Mendoza','Mendoza',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'202cb962ac59075b964b07152d234b70','3','1','SI');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
