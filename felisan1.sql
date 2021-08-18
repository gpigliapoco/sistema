-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2021 a las 17:54:20
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `felisan1`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addEmpleado` (IN `nombre` VARCHAR(250), IN `apellido` VARCHAR(250), IN `cargo` INT, IN `direccion` VARCHAR(250), IN `ciudad` VARCHAR(250), IN `dni` INT, IN `movil` INT, IN `nacimiento` DATE, IN `sexo` CHAR(1), IN `estado` VARCHAR(250), IN `ingreso` DATE, IN `nomE` VARCHAR(250), IN `dniE` INT, IN `movilE` INT, IN `hijos` INT, IN `nomB` VARCHAR(250), IN `dniB` INT, IN `movilB` INT, IN `direccionB` VARCHAR(250), IN `moyano` ENUM('s','n'), IN `registro` VARCHAR(250), IN `vencimiento` DATE, IN `observ` VARCHAR(250), IN `foto` VARCHAR(250))  BEGIN
INSERT INTO empleado(empleado.emp_nombre,empleado.emp_apellido,empleado.sector_idsector,empleado.emp_direccion,
                    empleado.emp_ciudad,empleado.emp_dni,empleado.emp_movil,empleado.emp_sexo,
                    empleado.emp_nacimiento,empleado.emp_ingreso,empleado.emp_estado,empleado.emp_status,
                    empleado.emp_foto,empleado.emp_esposa,empleado.emp_esposaDni,empleado.emp_esposaMovil,
                    empleado.emp_hijos)
                    VALUES(nombre,apellido,cargo,direccion,ciudad,dni,movil,sexo,nacimiento,ingreso,estado,'activo',
                          foto,nomE,dniE,movilE,hijos);
SELECT LAST_INSERT_ID();

INSERT INTO empleadoextras(empleadoextras.empleado_idempleado,empleadoextras.ex_nombre,
                          empleadoextras.ex_dni,empleadoextras.ex_movil,empleadoextras.ex_direccion,
                          empleadoextras.ex_registroM,empleadoextras.ex_registro,empleadoextras.ex_vrencimiento,
                          empleadoextras.ex_observacion)
                          VALUES
(LAST_INSERT_ID(),nomB,dniB,movilB,direccionB,moyano,registro,vencimiento,observ);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addSector` (IN `nombre` VARCHAR(45))  INSERT INTO sector(sector) VALUES (nombre)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addVehiculo` (IN `tipo` VARCHAR(250), IN `marca` VARCHAR(250), IN `patente` VARCHAR(250), IN `vtv` DATE, IN `ruta` DATE, IN `poliza` DATE, IN `brama` DATE, IN `obs` VARCHAR(250), IN `foto` VARCHAR(250))  INSERT INTO transporte(transporte.tipo,transporte.marca,
                       transporte.patente,transporte.verificacion,
                       transporte.ruta,transporte.poliza,transporte.bramatologia,transporte.estado,
                       transporte.observacion,transporte.foto) VALUES (tipo,marca,patente,vtv,ruta,poliza,brama,'activo',obs,foto)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `indexEmpleado` ()  SELECT COUNT(*) as emple FROM empleado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `indexTransporte` ()  SELECT COUNT(*) as transp FROM transporte$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarEmpleado` ()  SELECT empleado.idempleado,
empleado.emp_nombre,
empleado.emp_apellido,
empleado.emp_direccion,
empleado.emp_ciudad,
empleado.emp_dni,
empleado.emp_movil,
empleado.emp_sexo,
empleado.emp_estado,
empleado.emp_status,
empleado.emp_foto,
empleado.emp_foto,
empleado.emp_esposa,
empleado.sector_idsector,
empleado.emp_esposaDni,
empleado.emp_esposaMovil,
empleado.emp_esposaMovil,
empleado.emp_hijos,
empleadoextras.idempleadoExtras,
empleadoextras.ex_nombre,
empleadoextras.ex_dni,
empleadoextras.ex_movil,
empleadoextras.ex_direccion,
empleadoextras.ex_registroM,
empleadoextras.ex_registro,
empleadoextras.ex_observacion,
empleadoextras.empleado_idempleado,
sector.sector,
CONCAT(empleado.emp_nombre," ",empleado.emp_apellido)as nombre,
DATE_FORMAT(empleado.emp_nacimiento, '%d-%m-%Y') AS nacimiento,
DATE_FORMAT(empleado.emp_ingreso, '%d-%m-%Y') AS ingreso, 
DATE_FORMAT(empleadoextras.ex_vrencimiento, '%d-%m-%Y') AS vencimiento 
FROM empleado INNER JOIN sector on empleado.sector_idsector=sector.idsector 
 INNER JOIN empleadoextras ON empleadoextras.empleado_idempleado=empleado.idempleado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarEmpleados` (IN `id` INT)  SELECT empleado.idempleado,
empleado.emp_nombre,
empleado.emp_apellido,
empleado.emp_direccion,
empleado.emp_ciudad,
empleado.emp_dni,
empleado.emp_movil,
empleado.emp_sexo,
empleado.emp_estado,
empleado.emp_status,
empleado.emp_foto,
empleado.sector_idsector,
empleado.emp_esposa,
empleado.emp_esposaDni,
empleado.emp_esposaMovil,
empleado.emp_hijos,
empleado.emp_ingreso,
empleado.emp_nacimiento,
sector.sector,
empleadoextras.ex_nombre,
empleadoextras.ex_dni,
empleadoextras.ex_movil,
empleadoextras.ex_direccion,
empleadoextras.ex_registroM,
empleadoextras.ex_registro,
empleadoextras.ex_vrencimiento,
empleadoextras.ex_observacion,
CONCAT(empleado.emp_nombre," ",empleado.emp_apellido)as nombre,
DATE_FORMAT(empleado.emp_nacimiento, '%d-%m-%Y') AS nacimiento,
DATE_FORMAT(empleado.emp_ingreso, '%d-%m-%Y') AS ingreso,
DATE_FORMAT(empleadoextras.ex_vrencimiento, '%d-%m-%Y') AS vencimiento
FROM empleado INNER JOIN sector on sector.idsector=empleado.sector_idsector INNER JOIN empleadoextras on empleadoextras.empleado_idempleado=empleado.idempleado WHERE empleado.idempleado=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarSector` ()  SELECT * FROM sector$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarTransporte` ()  SELECT transporte.idtransporte,
transporte.tipo,
transporte.marca,
transporte.patente,
DATE_FORMAT(transporte.verificacion, '%d-%m-%Y') AS vtv,
DATE_FORMAT(transporte.ruta, '%d-%m-%Y') AS rut,
DATE_FORMAT(transporte.poliza, '%d-%m-%Y') AS poli,
DATE_FORMAT(transporte.bramatologia, '%d-%m-%Y') AS brama,
transporte.verificacion,
transporte.ruta,
transporte.poliza,
transporte.bramatologia,
transporte.estado,
transporte.observacion,
transporte.foto


FROM transporte$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEmpleado` (IN `id` INT, IN `nombre` VARCHAR(250), IN `apellido` VARCHAR(250), IN `cargo` INT, IN `direccion` VARCHAR(250), IN `ciudad` VARCHAR(250), IN `dni` INT, IN `movil` INT, IN `nacimiento` DATE, IN `sexo` CHAR(1), IN `estado` VARCHAR(250), IN `ingreso` DATE, IN `nomE` VARCHAR(250), IN `dniE` INT, IN `movilE` INT, IN `hijos` INT, IN `nomB` VARCHAR(250), IN `dniB` INT, IN `movilB` INT, IN `direccionB` VARCHAR(250), IN `moyano` ENUM('s','n'), IN `registro` VARCHAR(250), IN `vencimiento` DATE, IN `observ` VARCHAR(250))  BEGIN
UPDATE empleado set empleado.emp_nombre=nombre,empleado.emp_apellido=apellido,empleado.emp_direccion=direccion,empleado.emp_ciudad=ciudad,empleado.emp_dni=dni,empleado.emp_movil=movil,empleado.emp_sexo=sexo,empleado.emp_nacimiento=nacimiento,empleado.emp_ingreso=ingreso,empleado.emp_estado=estado,empleado.sector_idsector=cargo,empleado.emp_esposa=nomE,empleado.emp_esposaDni=dniE,empleado.emp_esposaMovil=movilE,empleado.emp_hijos=hijos where empleado.idempleado=id;
UPDATE empleadoextras SET empleadoextras.ex_nombre=nomB,
                          empleadoextras.ex_dni=dniB,empleadoextras.ex_movil=movilB,empleadoextras.ex_direccion=direccionB,
                          empleadoextras.ex_registroM=moyano,empleadoextras.ex_registro=registro,empleadoextras.ex_vrencimiento=vencimiento,
                          empleadoextras.ex_observacion=observ WHERE empleadoextras.empleado_idempleado=id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFotoEmpleado` (IN `id` INT, IN `ruta` VARCHAR(250))  UPDATE empleado SET empleado.emp_foto=ruta WHERE empleado.idempleado=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStatus` (IN `id` INT, IN `estado` VARCHAR(45))  UPDATE empleado SET empleado.emp_status = estado WHERE empleado.idempleado=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStatusTransp` (IN `id` INT(50), IN `estado` VARCHAR(50))  UPDATE transporte SET transporte.estado = estado WHERE transporte.idtransporte=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTranpsorte` (IN `id` INT(50), IN `tipo` VARCHAR(250), IN `marca` VARCHAR(250), IN `pate` VARCHAR(250), IN `veri` DATE, IN `ruta` DATE, IN `poliza` DATE, IN `brama` DATE, IN `observ` VARCHAR(250))  UPDATE transporte SET transporte.tipo=tipo,transporte.marca=marca,transporte.patente=pate,
transporte.verificacion=veri,transporte.ruta=ruta,transporte.poliza=poliza,
transporte.bramatologia=brama,transporte.observacion=observ WHERE transporte.idtransporte=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verVehiculo` (IN `id` INT(50))  SELECT transporte.idtransporte,
transporte.tipo,
transporte.marca,
transporte.patente,
DATE_FORMAT(transporte.verificacion, '%d-%m-%Y') AS vtv,
DATE_FORMAT(transporte.ruta, '%d-%m-%Y') AS rut,
DATE_FORMAT(transporte.poliza, '%d-%m-%Y') AS poli,
DATE_FORMAT(transporte.bramatologia, '%d-%m-%Y') AS brama,
transporte.verificacion,
transporte.ruta,
transporte.poliza,
transporte.bramatologia,
transporte.estado,
transporte.observacion,
transporte.foto


FROM transporte
WHERE transporte.idtransporte=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `emp_nombre` varchar(45) DEFAULT NULL,
  `emp_apellido` varchar(45) DEFAULT NULL,
  `emp_direccion` varchar(45) DEFAULT NULL,
  `emp_ciudad` varchar(45) DEFAULT NULL,
  `emp_dni` int(11) DEFAULT NULL,
  `emp_movil` int(11) DEFAULT NULL,
  `emp_sexo` char(1) DEFAULT NULL,
  `emp_nacimiento` date DEFAULT NULL,
  `emp_ingreso` date DEFAULT NULL,
  `emp_estado` varchar(45) DEFAULT NULL,
  `emp_status` enum('activo','inactivo') DEFAULT NULL,
  `emp_foto` varchar(250) DEFAULT NULL,
  `sector_idsector` int(11) NOT NULL,
  `emp_esposa` varchar(45) DEFAULT NULL,
  `emp_esposaDni` int(11) DEFAULT NULL,
  `emp_esposaMovil` int(11) DEFAULT NULL,
  `emp_hijos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `emp_nombre`, `emp_apellido`, `emp_direccion`, `emp_ciudad`, `emp_dni`, `emp_movil`, `emp_sexo`, `emp_nacimiento`, `emp_ingreso`, `emp_estado`, `emp_status`, `emp_foto`, `sector_idsector`, `emp_esposa`, `emp_esposaDni`, `emp_esposaMovil`, `emp_hijos`) VALUES
(1, 'gerardo', 'piglia', 'quesada 3209', 'vicente lopez', 29985934, 1513213, 'm', '2021-07-15', '2021-07-05', 'soltero', 'activo', 'vista/imagenes/usuario.png', 1, NULL, NULL, NULL, NULL),
(2, 'asda', 'asda', 'jfjhvgjhb', 'asdasda', 321321, 13213, 'm', '0000-00-00', '2021-07-09', 'solt', 'activo', 'vista/imagenes/usuario.png', 1, NULL, NULL, NULL, NULL),
(3, 'leo', 'piglia', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, 'inactivo', 'vista/imagenes/usuario.png', 1, NULL, NULL, NULL, NULL),
(4, 'pao', 'PEFASRSDF', 'CIUDAD DE LA PAZ 2352', 'SAN MIGUEL', 1245314214, 1566617424, 'f', '2021-08-17', '2021-08-18', 's', 'activo', 'vista/imagenes/IMG297202119965.png', 2, 'LEO', 1321651, 2147483647, 1),
(5, 'pao', 'sadas', 'assdasd', 'asda', 0, 0, 'm', '0000-00-00', '0000-00-00', 's', 'activo', 'vista/imagenes/usuario.png', 1, '', 0, 0, 0),
(6, 'pedro', 'lopez', 'moldes 5251', 'vicente lopez', 29985934, 2147483647, 'm', '2021-07-13', '2021-07-15', 's', 'activo', 'vista/imagenes/IMG58202119229.jpg', 2, 'PAOLA ', 313147321, 315646513, 3),
(7, 'ernesto', 'lopez', 'JOSE MOLDES 5253', 'VICENTE LOPEZ', 29985934, 0, '', '1982-12-05', '1982-12-05', 's', 'activo', 'vista/imagenes/usuario.png', 1, 'pepe', 13123, 12321, 1),
(8, 'asdas', 'asda', 'Pasaje Quesada', 'Vicente Lopez', 13213, 0, 'm', '0000-00-00', '0000-00-00', 's', 'activo', 'vista/imagenes/usuario.png', 1, '', 0, 0, 0),
(9, 'SSDFA', 'Agustin', 'Pasaje Quesada', 'Vicente Lopez', 1313, 2131, 'm', '2021-08-30', '2021-08-12', 's', 'activo', 'vista/imagenes/usuario.png', 1, '', 0, 0, 0),
(10, 'MIGUEL', 'Pigliapoco', 'Pasaje Quesada 3249', 'Buenos Aires', 31313, 2313213, 'm', '2021-08-10', '2021-08-18', 's', 'activo', 'vista/imagenes/IMG138202110960.jpg', 1, '', 0, 0, 0),
(11, 'asdf', 'Pigliapoco', 'Pasaje Quesada 3249', 'Buenos Aires', 62131, 213123, 'm', '2021-08-18', '2021-08-17', 's', 'activo', 'vista/imagenes/usuario.png', 1, '', 0, 0, 0),
(12, 'PAOLA ', 'Pigliapoco', 'Pasaje Quesada 3249', 'Buenos Aires', 113213, 13123, 'm', '2021-08-18', '2021-08-10', 's', 'activo', 'vista/imagenes/usuario.png', 1, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadoextras`
--

CREATE TABLE `empleadoextras` (
  `idempleadoExtras` int(11) NOT NULL,
  `ex_nombre` varchar(45) DEFAULT NULL,
  `ex_dni` int(11) DEFAULT NULL,
  `ex_movil` int(11) DEFAULT NULL,
  `ex_direccion` varchar(45) DEFAULT NULL,
  `ex_registroM` enum('s','n') DEFAULT NULL,
  `ex_registro` varchar(45) DEFAULT NULL,
  `ex_vrencimiento` date DEFAULT NULL,
  `empleado_idempleado` int(11) NOT NULL,
  `ex_observacion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleadoextras`
--

INSERT INTO `empleadoextras` (`idempleadoExtras`, `ex_nombre`, `ex_dni`, `ex_movil`, `ex_direccion`, `ex_registroM`, `ex_registro`, `ex_vrencimiento`, `empleado_idempleado`, `ex_observacion`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, ''),
(2, 'LEO', 5131513, 131561, 'MOLDES 5251 VILLA MARTELLI', '', '', '0000-00-00', 4, ''),
(3, '', 0, 0, '', 's', '', '0000-00-00', 5, ''),
(4, 'pepe', 47517322, 215413, 'quesada 3215', 's', '56877135713', '2021-07-05', 6, 'nada'),
(5, 'pepe', 111, 222, 'JOSE MOLDES 5253', '', '13213', '1982-12-05', 7, 'nada'),
(6, '', 0, 0, '', 's', '', '0000-00-00', 8, ''),
(7, 'gerardo', 136132, 36213213, 'Pasaje Quesada', 's', '', '0000-00-00', 9, ''),
(8, 'gerardo', 32132, 13213, 'Pasaje Quesada 3249', 's', '', '0000-00-00', 10, ''),
(9, 'gerardo', 13133, 1313, 'Pasaje Quesada 3249', 's', '', '0000-00-00', 11, ''),
(10, 'gerardo', 1323, 131312, 'Pasaje Quesada 3249', '', '', '0000-00-00', 12, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `idsector` int(11) NOT NULL,
  `sector` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`idsector`, `sector`) VALUES
(1, 'chofer'),
(2, 'administracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idtransporte` int(11) NOT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `marca` varchar(250) DEFAULT NULL,
  `patente` varchar(50) DEFAULT NULL,
  `verificacion` date DEFAULT NULL,
  `ruta` date DEFAULT NULL,
  `poliza` date DEFAULT NULL,
  `bramatologia` date DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`idtransporte`, `tipo`, `marca`, `patente`, `verificacion`, `ruta`, `poliza`, `bramatologia`, `estado`, `observacion`, `foto`) VALUES
(1, 'acoplado', 'patti', 'asd451', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'activo', '', ''),
(2, 'asda', 'PAOLA ', 'PAOLA ', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'inactivo', 'asda', 'vista/imagenes/camion.png'),
(3, 'gerardo', 'sadf', 'asdf', '2021-08-10', '2021-08-24', '2021-08-10', '2021-08-04', 'activo', 'nada', 'vista/imagenes/camion.png'),
(4, 'renault', 'renault', 'frrt452', '0000-00-00', '2021-08-25', '2021-08-19', '2021-08-05', 'activo', 'nada', 'vista/imagenes/camion.png'),
(5, 'gerardo', 'asdas', 'adfa', '2021-08-19', '2021-08-10', '2021-08-13', '2021-08-13', 'activo', 'safas', 'vista/imagenes/IMG138202115873.jpg'),
(6, 'fiat', '', 'ddd222', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'activo', '0000-00-00', 'vista/imagenes/camion.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`),
  ADD KEY `fk_empleado_sector_idx` (`sector_idsector`);

--
-- Indices de la tabla `empleadoextras`
--
ALTER TABLE `empleadoextras`
  ADD PRIMARY KEY (`idempleadoExtras`),
  ADD KEY `fk_empleadoExtras_empleado1_idx` (`empleado_idempleado`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`idsector`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idtransporte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `empleadoextras`
--
ALTER TABLE `empleadoextras`
  MODIFY `idempleadoExtras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `idsector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idtransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_sector` FOREIGN KEY (`sector_idsector`) REFERENCES `sector` (`idsector`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleadoextras`
--
ALTER TABLE `empleadoextras`
  ADD CONSTRAINT `fk_empleadoExtras_empleado1` FOREIGN KEY (`empleado_idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
