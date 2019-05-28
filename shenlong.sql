/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.38-MariaDB : Database - shenlong
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shenlong` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;

USE `shenlong`;

/*Table structure for table `asignaturas` */

DROP TABLE IF EXISTS `asignaturas`;

CREATE TABLE `asignaturas` (
  `asignatura_id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura_nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `asignatura_creditos` int(5) DEFAULT NULL,
  PRIMARY KEY (`asignatura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `asignaturas` */

/*Table structure for table `docentes_asignaturas` */

DROP TABLE IF EXISTS `docentes_asignaturas`;

CREATE TABLE `docentes_asignaturas` (
  `docente_asignatura_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuaio_id` int(11) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`docente_asignatura_id`),
  KEY `fk_asignaturas_docentes_asignaturas_idx` (`asignatura_id`),
  KEY `fk_usuarios_docentes_asignaturas_idx` (`usuaio_id`),
  CONSTRAINT `fk_asignaturas_docentes_asignaturas` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`asignatura_id`),
  CONSTRAINT `fk_usuarios_docentes_asignaturas` FOREIGN KEY (`usuaio_id`) REFERENCES `usuarios` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `docentes_asignaturas` */

/*Table structure for table `docentes_horarios` */

DROP TABLE IF EXISTS `docentes_horarios`;

CREATE TABLE `docentes_horarios` (
  `docente_horario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`docente_horario_id`),
  KEY `fk_usuarios_horarios` (`usuario_id`),
  CONSTRAINT `fk_usuarios_horarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `docentes_horarios` */

insert  into `docentes_horarios`(`docente_horario_id`,`usuario_id`,`fecha`) values 
(26,1,'2019-05-26'),
(27,1,'2019-05-26'),
(28,1,'2019-05-26'),
(29,1,'2019-05-26'),
(30,1,'2019-05-26'),
(31,1,'2019-05-27'),
(32,4,'2019-05-27');

/*Table structure for table `horarios` */

DROP TABLE IF EXISTS `horarios`;

CREATE TABLE `horarios` (
  `horario_id` int(11) NOT NULL AUTO_INCREMENT,
  `lunes` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `martes` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `miercoles` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `jueves` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `viernes` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sabado` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `docente_horario_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`horario_id`),
  KEY `fk_horarios_horarios_docentes` (`docente_horario_id`),
  CONSTRAINT `fk_horarios_horarios_docentes` FOREIGN KEY (`docente_horario_id`) REFERENCES `docentes_horarios` (`docente_horario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=684 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `horarios` */

insert  into `horarios`(`horario_id`,`lunes`,`martes`,`miercoles`,`jueves`,`viernes`,`sabado`,`docente_horario_id`,`fecha`) values 
(682,'sdfsd','sdfsd','sdfsd','sdfsd','23232','23232',27,'2019-05-26'),
(683,'sdfsd','sdfsd','sdfsd','sdfsd','23232','23232',27,'2019-05-26');

/*Table structure for table `programas` */

DROP TABLE IF EXISTS `programas`;

CREATE TABLE `programas` (
  `programa_id` int(11) NOT NULL AUTO_INCREMENT,
  `programa_nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `programa_semestre_numero` int(2) DEFAULT NULL,
  `programa_semestre_actual` int(2) DEFAULT NULL,
  `programa_fecha_inicio` date DEFAULT NULL,
  `programa_fecha_fin` date DEFAULT NULL,
  `programa_codigo` int(5) DEFAULT NULL,
  PRIMARY KEY (`programa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `programas` */

/*Table structure for table `programas_asignaturas` */

DROP TABLE IF EXISTS `programas_asignaturas`;

CREATE TABLE `programas_asignaturas` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `programa_id` int(11) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL,
  `semestre` int(2) DEFAULT NULL,
  PRIMARY KEY (`pa_id`),
  KEY `fk_asignaturas_programas_asignaturas_idx` (`asignatura_id`),
  KEY `fk_programas_programas_asignaturas_idx` (`programa_id`),
  CONSTRAINT `fk_asignaturas_programas_asignaturas` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`asignatura_id`),
  CONSTRAINT `fk_programas_programas_asignaturas` FOREIGN KEY (`programa_id`) REFERENCES `programas` (`programa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `programas_asignaturas` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `roles` */

insert  into `roles`(`rol_id`,`rol`) values 
(1,'docente'),
(2,'administrador');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_documento` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  KEY `fk_roles_usuarios_idx` (`rol_id`),
  CONSTRAINT `fk_roles_usuarios` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`usuario_id`,`usuario_nombre`,`usuario_apellido`,`usuario_documento`,`direccion`,`telefono`,`correo`,`password`,`rol_id`) values 
(1,'hans peter','castellar del rio','1050957574','asdfsadfS',312457854,'hanspeter1512@gmail.com','123456',1),
(2,'juan pedro ','perez garcia','123456','paraiso',3625485,'pedro@gmail.com','123456',1),
(3,'Edilberto','Navarro','124365','calle ancha 987',3224466,'enavarro@ul.edu.co','123456',2),
(4,'sfsd','sdfsdf','23423','sdfsdf',234234,'hanspeter1512@gmail.com','1050957574',1),
(5,'hans peter','castellar','1050957574','sdfdsfdsf',123456,'admin@gmail.com','123456',2),
(6,'victor','nieto','1045705832','calle falsa',32541552,'victor@gmail.com','123456',2),
(7,'juan perez','garcia marquez','123456789','calle sin nombre',123456,'juan@gmail.com','123456',2);

/* Procedure structure for procedure `buscarHorarioXdocente` */

/*!50003 DROP PROCEDURE IF EXISTS  `buscarHorarioXdocente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarHorarioXdocente`(IN `cedula` INT(11))
    NO SQL
SELECT lunes,martes,miercoles,jueves,viernes,sabado
from horarios 
WHERE usuario_id = cedula
order BY fecha ASC limit 17 */$$
DELIMITER ;

/* Procedure structure for procedure `getDocentes` */

/*!50003 DROP PROCEDURE IF EXISTS  `getDocentes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getDocentes`()
    NO SQL
SELECT usuario_id as id, usuario_documento as cedula,usuario_nombre as nombre  from usuarios WHERE rol_id = 1 */$$
DELIMITER ;

/* Procedure structure for procedure `getHorariosXdocente` */

/*!50003 DROP PROCEDURE IF EXISTS  `getHorariosXdocente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getHorariosXdocente`(IN `id_usuario` INT(11))
    NO SQL
SELECT lunes,martes,miercoles,jueves,viernes,sabado from horarios where docente_horario_id = id_usuario */$$
DELIMITER ;

/* Procedure structure for procedure `getIdHoraiosDocentes` */

/*!50003 DROP PROCEDURE IF EXISTS  `getIdHoraiosDocentes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdHoraiosDocentes`(in id_docente int(11))
select docente_horario_id from docentes_horarios where usuario_id = id_docente order by fecha DESC limit 1 */$$
DELIMITER ;

/* Procedure structure for procedure `getRoles` */

/*!50003 DROP PROCEDURE IF EXISTS  `getRoles` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getRoles`()
select rol_id as id, rol from roles */$$
DELIMITER ;

/* Procedure structure for procedure `getUsuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `getUsuarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getUsuarios`()
select usuario_nombre as nombre,
           usuario_apellido as apellido,
           usuario_documento as documento,
           direccion,
           telefono,
           correo,
           rol
    from usuarios 
    join roles 
    using (rol_id) */$$
DELIMITER ;

/* Procedure structure for procedure `login` */

/*!50003 DROP PROCEDURE IF EXISTS  `login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(IN `correo_par` VARCHAR(100), IN `pass` VARCHAR(100))
    NO SQL
SELECT * from usuarios WHERE `password` = pass AND correo = correo_par */$$
DELIMITER ;

/* Procedure structure for procedure `regHorario` */

/*!50003 DROP PROCEDURE IF EXISTS  `regHorario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `regHorario`(IN `lunes_par` VARCHAR(45), IN `martes_par` VARCHAR(45), IN `miercoles_par` VARCHAR(45), IN `jueves_par` VARCHAR(45), IN `viernes_par` VARCHAR(45), IN `sabado_par` VARCHAR(45), IN `usuario_id_par` INT(11))
    NO SQL
INSERT into horarios (lunes,martes,miercoles,jueves,viernes,sabado,docente_horario_id,fecha)
VALUES (lunes_par,martes_par,miercoles_par,jueves_par,viernes_par,sabado_par,usuario_id_par,NOW()) */$$
DELIMITER ;

/* Procedure structure for procedure `regHorarioDocente` */

/*!50003 DROP PROCEDURE IF EXISTS  `regHorarioDocente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `regHorarioDocente`(in id_docente int(11))
begin
insert into docentes_horarios (usuario_id,fecha)
      values (id_docente,now());
select docente_horario_id from docentes_horarios order by docente_horario_id DESC limit 1;
end */$$
DELIMITER ;

/* Procedure structure for procedure `regUsuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `regUsuarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `regUsuarios`(
                    in nombre varchar(45),
                    in apellido varchar(45),
                    in documento varchar(11),
                    in direccion_par varchar(100),
                    in telefono_par varchar(11),
                    in correo_par varchar(100),
                    in pass varchar(100),
                    in rol int(11)
                    )
insert into usuarios (usuario_nombre,usuario_apellido,usuario_documento,direccion,telefono,correo,`password`,rol_id)
                    values (
                             nombre,
                             apellido,
                             documento,
                             direccion_par,
                             telefono_par,
                             correo_par,
                             pass,
                             rol
                     ) */$$
DELIMITER ;

/* Procedure structure for procedure `verificarCorreo` */

/*!50003 DROP PROCEDURE IF EXISTS  `verificarCorreo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarCorreo`(in correo_par varchar(100))
select count(*) from usuarios where correo = correo_par */$$
DELIMITER ;

/* Procedure structure for procedure `verificarDocumento` */

/*!50003 DROP PROCEDURE IF EXISTS  `verificarDocumento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarDocumento`(in documento varchar(11))
select count(*) from usuarios where usuario_documento = documento */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
