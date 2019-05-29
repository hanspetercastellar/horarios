/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.37-MariaDB : Database - shenlong
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shenlong` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `shenlong`;

/*Table structure for table `asignaturas` */

DROP TABLE IF EXISTS `asignaturas`;

CREATE TABLE `asignaturas` (
  `asignatura_id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura_nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `asignatura_creditos` int(5) DEFAULT NULL,
  PRIMARY KEY (`asignatura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `asignaturas` */

insert  into `asignaturas`(`asignatura_id`,`asignatura_nombre`,`asignatura_creditos`) values 
(1,'CALCULO DIFERENCIAL',2),
(2,'DESARROLLO WEB',50);

/*Table structure for table `docentes_asignaturas` */

DROP TABLE IF EXISTS `docentes_asignaturas`;

CREATE TABLE `docentes_asignaturas` (
  `docente_asignatura_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`docente_asignatura_id`),
  KEY `fk_asignaturas_docentes_asignaturas_idx` (`asignatura_id`),
  KEY `fk_usuarios_docentes_asignaturas_idx` (`usuario_id`),
  CONSTRAINT `fk_asignaturas_docentes_asignaturas` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`asignatura_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarios_docentes_asignaturas` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `docentes_asignaturas` */

insert  into `docentes_asignaturas`(`docente_asignatura_id`,`usuario_id`,`asignatura_id`) values 
(1,1,2),
(2,1,1);

/*Table structure for table `docentes_horarios` */

DROP TABLE IF EXISTS `docentes_horarios`;

CREATE TABLE `docentes_horarios` (
  `docente_horario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`docente_horario_id`),
  KEY `fk_usuarios_horarios` (`usuario_id`),
  CONSTRAINT `fk_usuarios_horarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `docentes_horarios` */

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
  CONSTRAINT `fk_horarios_horarios_docentes` FOREIGN KEY (`docente_horario_id`) REFERENCES `docentes_horarios` (`docente_horario_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `horarios` */

/*Table structure for table `programas` */

DROP TABLE IF EXISTS `programas`;

CREATE TABLE `programas` (
  `programa_id` int(11) NOT NULL AUTO_INCREMENT,
  `programa_nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`programa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `programas` */

insert  into `programas`(`programa_id`,`programa_nombre`,`fecha`) values 
(4,'INGENIERIA DE SISTEMAS',NULL);

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
  CONSTRAINT `fk_asignaturas_programas_asignaturas` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`asignatura_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_programas_programas_asignaturas` FOREIGN KEY (`programa_id`) REFERENCES `programas` (`programa_id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `fk_roles_usuarios` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`usuario_id`,`usuario_nombre`,`usuario_apellido`,`usuario_documento`,`direccion`,`telefono`,`correo`,`password`,`rol_id`) values 
(1,'hans peter','castellar del rio','1050957574','sin direccion',3147550088,'hanspeter1512@gmail.com','123456',1),
(2,'administrador','admin','123456789','calle larga',3147550056,'admin@gmail.com','123456',2),
(3,'juan','perez garcia','123456','calle sin nombre',3046582479,'juan@gmail.com','123456',1);

/* Procedure structure for procedure `buscarHorarioXdocente` */

/*!50003 DROP PROCEDURE IF EXISTS  `buscarHorarioXdocente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarHorarioXdocente`(IN `cedula` INT(11))
    NO SQL
SELECT lunes,martes,miercoles,jueves,viernes,sabado
from horarios 
join docentes_horarios as dh using(docente_horario_id)
WHERE dh.usuario_id = cedula */$$
DELIMITER ;

/* Procedure structure for procedure `deleteProgramas` */

/*!50003 DROP PROCEDURE IF EXISTS  `deleteProgramas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteProgramas`(in programa_id_par int)
delete from programas where programa_id = programa_id_par */$$
DELIMITER ;

/* Procedure structure for procedure `getAsignaturasXdocentes` */

/*!50003 DROP PROCEDURE IF EXISTS  `getAsignaturasXdocentes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getAsignaturasXdocentes`(in id_docente int(11))
select asignatura_nombre as asignatura  from docentes_asignaturas 
     join asignaturas using(asignatura_id)
        WHERE docentes_asignaturas.usuario_id = id_docente */$$
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
SELECT lunes,martes,miercoles,jueves,viernes,sabado FROM horarios WHERE docente_horario_id = id_usuario */$$
DELIMITER ;

/* Procedure structure for procedure `getIdHoraiosDocentes` */

/*!50003 DROP PROCEDURE IF EXISTS  `getIdHoraiosDocentes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdHoraiosDocentes`(in id_docente int(11))
select docente_horario_id from docentes_horarios where usuario_id = id_docente order by docente_horario_id  DESC limit 1 */$$
DELIMITER ;

/* Procedure structure for procedure `getInfoDocente` */

/*!50003 DROP PROCEDURE IF EXISTS  `getInfoDocente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getInfoDocente`(in id_docente int(11))
select usuario_nombre as nombre,
     usuario_apellido as apellido,
      usuario_documento as documento
      from usuarios */$$
DELIMITER ;

/* Procedure structure for procedure `getProgramas` */

/*!50003 DROP PROCEDURE IF EXISTS  `getProgramas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getProgramas`()
select * from programas */$$
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

/* Procedure structure for procedure `regProgramas` */

/*!50003 DROP PROCEDURE IF EXISTS  `regProgramas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `regProgramas`(in nombre varchar(255))
insert into programas (programa_nombre) values (nombre) */$$
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

/* Procedure structure for procedure `updateHorario` */

/*!50003 DROP PROCEDURE IF EXISTS  `updateHorario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `updateHorario`(IN `lunes_par` VARCHAR(45), IN `martes_par` VARCHAR(45), IN `miercoles_par` VARCHAR(45), IN `jueves_par` VARCHAR(45), IN `viernes_par` VARCHAR(45), IN `sabado_par` VARCHAR(45), IN `usuario_id_par` INT(11))
update  horarios set  lunes = lunes_par,
                           martes = martes_par,
                           miercoles = miercoles_par,
                           jueves = jueves_par,
                           viernes = viernes_par,
                           sabado = sabado_par
                           
          where  docente_horario_id = usuario_id_par */$$
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
