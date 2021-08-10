/*
SQLyog Community v9.20 
MySQL - 5.5.27 : Database - libros
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`libros` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `libros`;

/*Table structure for table `detalle_devolucion` */

DROP TABLE IF EXISTS `detalle_devolucion`;

CREATE TABLE `detalle_devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `Cantidad_Devuelto` int(11) NOT NULL,
  `Precio_Devuelto` int(11) NOT NULL,
  PRIMARY KEY (`id_devolucion`,`id_libro`),
  KEY `libro_detalle_devolucion_fk` (`id_libro`),
  CONSTRAINT `devolucion_detalle_devolucion_fk` FOREIGN KEY (`id_devolucion`) REFERENCES `devolucion` (`id_devolucion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `libro_detalle_devolucion_fk` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalle_devolucion` */

insert  into `detalle_devolucion`(`id_devolucion`,`id_libro`,`Cantidad_Devuelto`,`Precio_Devuelto`) values (1,1,2,400000),(2,3,6,400000);

/*Table structure for table `devolucion` */

DROP TABLE IF EXISTS `devolucion`;

CREATE TABLE `devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `id_prestamo` int(11) NOT NULL,
  `Fecha_Devuelto` date NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'DEVUELTO',
  PRIMARY KEY (`id_devolucion`,`id_prestamo`),
  UNIQUE KEY `id_prestamo` (`id_prestamo`),
  CONSTRAINT `prestamo_devolucion_fk` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `devolucion` */

insert  into `devolucion`(`id_devolucion`,`id_prestamo`,`Fecha_Devuelto`,`estado`) values (1,1,'2018-11-18','DEVUELTO'),(2,2,'2018-11-30','DEVUELTO');

/*Table structure for table `lector` */

DROP TABLE IF EXISTS `lector`;

CREATE TABLE `lector` (
  `id_lector` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Ci` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_lector`),
  UNIQUE KEY `Ci` (`Ci`),
  UNIQUE KEY `Nombre` (`Nombre`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lector` */

insert  into `lector`(`id_lector`,`Nombre`,`Edad`,`Ci`,`Telefono`,`Email`,`Direccion`) values (1,'Aldo Arevalo Oritiz',33,4524242,992231886,'aldoarevaloorti@gmail.com','Optasiano Gomez Rivas casi esperanza'),(2,'Mario Arevalo',40,1665625,982232886,'marioa@gmail.com','Optasiano Gomez Rivas casi esperanza'),(3,'Mariano Baez',20,6525456,994520468,'mariano@gmail.com','Mariano roque alonso y Humaita'),(4,'Monica Belen Gonzalez',25,5625588,992235226,'monica@hotmail.com','Oscar Neto y Mariano Vargas'),(5,'Ivan Gonzalez',19,6555888,994520466,'ivan@gmail.com','Mariano roque alonso y Humaita'),(6,'Alan Josue',10,6222566,991222555,'alan@hotmail.com','Montevideo y ygatimi');

/*Table structure for table `libro` */

DROP TABLE IF EXISTS `libro`;

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Autor` varchar(50) NOT NULL,
  `Anio` int(11) NOT NULL,
  `Tipo` varchar(250) NOT NULL,
  `Cantidad_Total` int(11) NOT NULL,
  `Cantidad_Disponible` int(11) NOT NULL,
  `Precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_libro`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `libro` */

insert  into `libro`(`id_libro`,`Nombre`,`Autor`,`Anio`,`Tipo`,`Cantidad_Total`,`Cantidad_Disponible`,`Precio`) values (1,'Aprendiendo UML en 24 horas','joseph schmuller',1996,'lecciones de uml',20,20,400000),(2,'C J Date Introducion a los sistemas de Base de Datos','Prentice Hall',2000,'Sistemas de Base de Datos',20,20,560000),(3,'Desarrollo Orientado a Objetos con UML','Juan de Dios Batiz Paredes',1996,'lecciones de uml',25,25,400000),(4,'DiseÃ±o orientado a objetos con UML','RAÃšL ALARCÃ“N',2000,'lecciones de uml',30,28,460000),(5,'Disseny de sistemes orientats a objectes amb notaciÃ³ UML ','Cristina GÃ³mez',1999,'lecciones de uml',20,20,250000),(6,'El lenguaje Unificado de Modelado - Manual de Referencia','james Rumbaugh - ivar jacobson- grady booch',2000,'lecciones de uml',20,13,350000),(7,'Manual Metodolog a de Investigacion pasos para hacer tesis','Aristides Alfredo Vara Horna',2008,'Metodologia',10,8,500000);

/*Table structure for table `prestamo` */

DROP TABLE IF EXISTS `prestamo`;

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `id_lector` int(11) NOT NULL,
  `Fecha_Prestamo` date NOT NULL,
  `Fecha_Entrega` date NOT NULL,
  `Fecha_Devolucion` date NOT NULL DEFAULT '0000-00-00',
  `estado` varchar(50) NOT NULL DEFAULT 'EN PRESTAMO',
  PRIMARY KEY (`id_prestamo`),
  KEY `lector_prestamo_fk` (`id_lector`),
  CONSTRAINT `lector_prestamo_fk` FOREIGN KEY (`id_lector`) REFERENCES `lector` (`id_lector`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prestamo` */

insert  into `prestamo`(`id_prestamo`,`id_lector`,`Fecha_Prestamo`,`Fecha_Entrega`,`Fecha_Devolucion`,`estado`) values (1,1,'2019-11-08','2018-11-25','2018-11-25','DEVUELTO'),(2,2,'2018-11-30','2018-11-30','2018-11-30','DEVUELTO'),(3,1,'2019-11-06','2019-11-08','0000-00-00','EN PRESTAMO'),(4,2,'2019-11-06','2019-11-08','0000-00-00','EN PRESTAMO'),(5,4,'2019-11-06','2019-11-08','0000-00-00','EN PRESTAMO'),(6,5,'2019-11-06','2019-11-08','0000-00-00','EN PRESTAMO'),(7,1,'2019-11-06','2019-11-08','0000-00-00','EN PRESTAMO');

/*Table structure for table `prestamo_detalle` */

DROP TABLE IF EXISTS `prestamo_detalle`;

CREATE TABLE `prestamo_detalle` (
  `id_prestamo` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `Cantidad_Libro` int(11) NOT NULL,
  `Precio_Prestamo` int(11) NOT NULL,
  PRIMARY KEY (`id_prestamo`,`id_libro`),
  KEY `libro_prestamo_detalle_fk` (`id_libro`),
  CONSTRAINT `libro_prestamo_detalle_fk` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `prestamo_prestamo_detalle_fk` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prestamo_detalle` */

insert  into `prestamo_detalle`(`id_prestamo`,`id_libro`,`Cantidad_Libro`,`Precio_Prestamo`) values (1,1,2,400000),(2,3,6,400000),(3,1,3,400000),(4,1,5,400000),(5,6,7,350000),(6,4,2,460000),(7,7,2,500000);

/* Trigger structure for table `detalle_devolucion` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `actualizarlibrosuma` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `actualizarlibrosuma` AFTER INSERT ON `detalle_devolucion` FOR EACH ROW UPDATE libro SET Cantidad_Disponible=Cantidad_Disponible+new.Cantidad_Devuelto 
WHERE id_libro=new.id_libro */$$


DELIMITER ;

/* Trigger structure for table `devolucion` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `devolucionyaingreso` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `devolucionyaingreso` BEFORE UPDATE ON `devolucion` FOR EACH ROW BEGIN
        -- condition to check
        IF NEW.id_prestamo =old.id_prestamo THEN
            -- hack to solve absence of SIGNAL/prepared statements in triggers
            UPDATE `El Prestamo Ya ingreso en su Totalidad` SET X=1;
        END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `libro` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `nohaylibros` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `nohaylibros` BEFORE UPDATE ON `libro` FOR EACH ROW BEGIN
        -- condition to check
        IF NEW.Cantidad_Disponible < 0 THEN
            -- hack to solve absence of SIGNAL/prepared statements in triggers
            update `La Cantidad de la Venta Supera el Stock de Libros` SET x=1;
        END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `prestamo_detalle` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `actualizarlibrosresta` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `actualizarlibrosresta` AFTER INSERT ON `prestamo_detalle` FOR EACH ROW UPDATE libro SET Cantidad_Disponible=Cantidad_Disponible-new.Cantidad_Libro 
WHERE id_libro=new.id_libro */$$


DELIMITER ;

/*Table structure for table `vistaprestamos` */

DROP TABLE IF EXISTS `vistaprestamos`;

/*!50001 DROP VIEW IF EXISTS `vistaprestamos` */;
/*!50001 DROP TABLE IF EXISTS `vistaprestamos` */;

/*!50001 CREATE TABLE  `vistaprestamos`(
 `id_prestamo` int(11) ,
 `id_lector` int(11) ,
 `Nombre` varchar(50) ,
 `Cedula` int(11) ,
 `Fecha_Prestamo` date ,
 `Fecha_Entrega` date ,
 `Fecha_Devolucion` date ,
 `estado` varchar(50) ,
 `id_libro` int(11) ,
 `Libro` varchar(250) ,
 `Precio_Libro` int(11) ,
 `Cantidad_Libro` int(11) ,
 `Precio_Prestamo` int(11) ,
 `total` bigint(21) ,
 `totalp` decimal(42,0) 
)*/;

/*View structure for view vistaprestamos */

/*!50001 DROP TABLE IF EXISTS `vistaprestamos` */;
/*!50001 DROP VIEW IF EXISTS `vistaprestamos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`aldo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `vistaprestamos` AS select `p`.`id_prestamo` AS `id_prestamo`,`l`.`id_lector` AS `id_lector`,`l`.`Nombre` AS `Nombre`,`l`.`Ci` AS `Cedula`,`p`.`Fecha_Prestamo` AS `Fecha_Prestamo`,`p`.`Fecha_Entrega` AS `Fecha_Entrega`,`p`.`Fecha_Devolucion` AS `Fecha_Devolucion`,`p`.`estado` AS `estado`,`pd`.`id_libro` AS `id_libro`,`li`.`Nombre` AS `Libro`,`li`.`Precio` AS `Precio_Libro`,`pd`.`Cantidad_Libro` AS `Cantidad_Libro`,`pd`.`Precio_Prestamo` AS `Precio_Prestamo`,(`pd`.`Cantidad_Libro` * `li`.`Precio`) AS `total`,(select sum((`dt`.`Cantidad_Libro` * `pt`.`Precio`)) AS `TotalPagar` from (`prestamo_detalle` `dt` join `libro` `pt` on((`dt`.`id_libro` = `pt`.`id_libro`))) where (`dt`.`id_prestamo` = `pd`.`id_prestamo`)) AS `totalp` from (((`prestamo` `p` join `prestamo_detalle` `pd` on((`p`.`id_prestamo` = `pd`.`id_prestamo`))) join `libro` `li` on((`pd`.`id_libro` = `li`.`id_libro`))) join `lector` `l` on((`l`.`id_lector` = `p`.`id_lector`))) order by `p`.`id_prestamo`,`pd`.`id_prestamo` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
