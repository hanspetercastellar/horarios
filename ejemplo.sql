-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2019 a las 02:37:53
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplo`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarusuario` (IN `login` VARCHAR(20), IN `pass` VARCHAR(20), IN `nom` VARCHAR(20), IN `ced` VARCHAR(20), IN `fec` VARCHAR(20))  insert into usuario(LoginUsuario,PasswordUsuario,NombreUsuario,cedulaUsuario,FechaUsuario)
VALUES(login,pass,nom,ced,fec)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioactualizar` (IN `id` INT, IN `login` VARCHAR(20), IN `pass` VARCHAR(20), IN `nom` VARCHAR(20), IN `ced` VARCHAR(20), IN `fec` VARCHAR(20))  BEGIN
update usuario SET
LoginUsuario=login,
PasswordUsuario=pass,
NombreUsuario=nom,
cedulaUsuario=ced,
FechaUsuario=fec
where IdUsuario=id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioeliminar` (IN `id` INT)  DELETE from usuario where IdUsuario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ususarioconsultar` ()  select IdUsuario,LoginUsuario,PasswordUsuario,NombreUsuario,cedulaUsuario,FechaUsuario FROM usuario$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `LoginUsuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PasswordUsuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NombreUsuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedulaUsuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaUsuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `LoginUsuario`, `PasswordUsuario`, `NombreUsuario`, `cedulaUsuario`, `FechaUsuario`) VALUES
(1, 'bfernandez', '10', 'bryan', '10', '2019-03-05'),
(3, '15', '15', '15', '15', '2014-12-15'),
(7, '74', '74', '747', '74', '2014-02-02'),
(8, '66', '66', '66', '66', '2015-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `LoginUsuario` (`LoginUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
