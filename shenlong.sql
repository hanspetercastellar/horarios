-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 11:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shenlong`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getDocentes` ()  NO SQL
SELECT usuario_id as id, usuario_documento as cedula,usuario_nombre as nombre  from usuarios WHERE rol_id = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `correo_par` VARCHAR(100), IN `pass` VARCHAR(100))  NO SQL
SELECT * from usuarios WHERE `password` = pass AND correo = correo_par$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `regHorario` (IN `lunes_par` VARCHAR(45), IN `martes_par` VARCHAR(45), IN `miercoles_par` VARCHAR(45), IN `jueves_par` VARCHAR(45), IN `viernes_par` VARCHAR(45), IN `sabado_par` VARCHAR(45), IN `usuario_id_par` INT(11) UNSIGNED)  NO SQL
INSERT into horarios (lunes,martes,miercoles,jueves,viernes,sabado,usuario_id,fecha)
VALUES (lunes_par,martes_par,miercoles_par,jueves_par,viernes_par,sabado_par,usuario_id_par,NOW())$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `asignaturas`
--

CREATE TABLE `asignaturas` (
  `asignatura_id` int(11) NOT NULL,
  `asignatura_nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `asignatura_creditos` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docentes_asignaturas`
--

CREATE TABLE `docentes_asignaturas` (
  `docente_asignatura_id` int(11) NOT NULL,
  `usuaio_id` int(11) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `horario_id` int(11) NOT NULL,
  `lunes` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `martes` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `miercoles` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `jueves` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `viernes` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sabado` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`horario_id`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `usuario_id`, `fecha`) VALUES
(1, '', '', '', '', '', '', 1, '2019-05-21'),
(2, '', '', ' 07:00 ', '', '', '', 1, '2019-05-21'),
(3, '', '', '', '', '', '', 1, '2019-05-21'),
(4, '', '', ' 09:00 ', '', '', '', 1, '2019-05-21'),
(5, '', '', '', '', '', '', 1, '2019-05-21'),
(6, '', '', ' 11:00 ', '', '', '', 1, '2019-05-21'),
(7, '', '', '', '', '', '', 1, '2019-05-21'),
(8, '', '', '', '', '', '', 1, '2019-05-21'),
(9, '', '', ' 14:00 ', '', '', '', 1, '2019-05-21'),
(10, '', '', '', '', '', '', 1, '2019-05-21'),
(11, '', '', '', '', '', '', 1, '2019-05-21'),
(12, '', '', '', '', '', '', 1, '2019-05-21'),
(13, '', '', '', '', '', '', 1, '2019-05-21'),
(14, '', '', '', '', '', '', 1, '2019-05-21'),
(15, '', '', '', '', '', '', 1, '2019-05-21'),
(16, '', '', '', '', '', '', 1, '2019-05-21'),
(17, '', '', '', '', '', '', 1, '2019-05-21'),
(18, ' 06:00 ', '', '', '', '', '', 1, '2019-05-21'),
(19, ' 07:00 ', '', ' 07:00 ', '', '', '', 1, '2019-05-21'),
(20, ' 08:00 ', '', ' 08:00 ', '', '', '', 1, '2019-05-21'),
(21, ' 09:00 ', '', ' 09:00 ', '', '', '', 1, '2019-05-21'),
(22, '', '', ' 10:00 ', '', '', '', 1, '2019-05-21'),
(23, '', '', '', '', '', '', 1, '2019-05-21'),
(24, '', '', ' 12:00 ', '', '', '', 1, '2019-05-21'),
(25, ' 13:00 ', '', ' 13:00 ', '', '', '', 1, '2019-05-21'),
(26, ' 14:00 ', '', '', '', '', '', 1, '2019-05-21'),
(27, ' 15:00 ', '', '', '', ' 15:00 ', '', 1, '2019-05-21'),
(28, '', '', '', '', '', '', 1, '2019-05-21'),
(29, ' 17:00 ', '', '', '', '', '', 1, '2019-05-21'),
(30, ' 18:00 ', '', '', '', ' 18:00 ', '', 1, '2019-05-21'),
(31, '', '', '', '', '', '', 1, '2019-05-21'),
(32, '', '', '', '', '', '', 1, '2019-05-21'),
(33, '', '', '', '', '', '', 1, '2019-05-21'),
(34, '', '', '', '', '', '', 1, '2019-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `programas`
--

CREATE TABLE `programas` (
  `programa_id` int(11) NOT NULL,
  `programa_nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `programa_semestre_numero` int(2) DEFAULT NULL,
  `programa_semestre_actual` int(2) DEFAULT NULL,
  `programa_fecha_inicio` date DEFAULT NULL,
  `programa_fecha_fin` date DEFAULT NULL,
  `programa_codigo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programas_asignaturas`
--

CREATE TABLE `programas_asignaturas` (
  `pa_id` int(11) NOT NULL,
  `programa_id` int(11) DEFAULT NULL,
  `asignatura_id` int(11) DEFAULT NULL,
  `semestre` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rol_id`, `rol`) VALUES
(1, 'docente'),
(2, 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_documento` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` bigint(11) DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_documento`, `direccion`, `telefono`, `correo`, `password`, `rol_id`) VALUES
(1, 'hans peter', 'castellar del rio', '1050957574', 'asdfsadfS', 312457854, 'hanspeter1512@gmail.com', '123456', 1),
(2, 'juan pedro ', 'perez garcia', '123456', 'paraiso', 3625485, 'pedro@gmail.com', '123456', 1),
(3, 'Edilberto', 'Navarro', '124365', 'calle ancha 987', 3224466, 'enavarro@ul.edu.co', '123456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`asignatura_id`);

--
-- Indexes for table `docentes_asignaturas`
--
ALTER TABLE `docentes_asignaturas`
  ADD PRIMARY KEY (`docente_asignatura_id`),
  ADD KEY `fk_asignaturas_docentes_asignaturas_idx` (`asignatura_id`),
  ADD KEY `fk_usuarios_docentes_asignaturas_idx` (`usuaio_id`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`horario_id`),
  ADD KEY `horarios_usuarios_usuario_id_fk` (`usuario_id`);

--
-- Indexes for table `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`programa_id`);

--
-- Indexes for table `programas_asignaturas`
--
ALTER TABLE `programas_asignaturas`
  ADD PRIMARY KEY (`pa_id`),
  ADD KEY `fk_asignaturas_programas_asignaturas_idx` (`asignatura_id`),
  ADD KEY `fk_programas_programas_asignaturas_idx` (`programa_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `fk_roles_usuarios_idx` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `asignatura_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docentes_asignaturas`
--
ALTER TABLE `docentes_asignaturas`
  MODIFY `docente_asignatura_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `horario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `programas`
--
ALTER TABLE `programas`
  MODIFY `programa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programas_asignaturas`
--
ALTER TABLE `programas_asignaturas`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `docentes_asignaturas`
--
ALTER TABLE `docentes_asignaturas`
  ADD CONSTRAINT `fk_asignaturas_docentes_asignaturas` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`asignatura_id`),
  ADD CONSTRAINT `fk_usuarios_docentes_asignaturas` FOREIGN KEY (`usuaio_id`) REFERENCES `usuarios` (`usuario_id`);

--
-- Constraints for table `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_usuarios_usuario_id_fk` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);

--
-- Constraints for table `programas_asignaturas`
--
ALTER TABLE `programas_asignaturas`
  ADD CONSTRAINT `fk_asignaturas_programas_asignaturas` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`asignatura_id`),
  ADD CONSTRAINT `fk_programas_programas_asignaturas` FOREIGN KEY (`programa_id`) REFERENCES `programas` (`programa_id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_roles_usuarios` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
