-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2021 a las 18:55:05
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `add1Vehiculo` (IN `tipo` VARCHAR(250), IN `marca` VARCHAR(250), IN `patente` VARCHAR(250), IN `vtv` DATE, IN `ruta` DATE, IN `poliza` DATE, IN `brama` DATE, IN `obs` VARCHAR(250), IN `foto` VARCHAR(250))  BEGIN
DECLARE pat varchar(250);
SET @pat:=(SELECT COUNT(*) FROM transporte WHERE transporte.patente=patente);
if @pat=0 THEN
INSERT INTO transporte(transporte.tipo,transporte.marca,
                       transporte.patente,transporte.verificacion,
                       transporte.ruta,transporte.poliza,transporte.bramatologia,transporte.estado,
                       transporte.observacion,transporte.foto) VALUES (tipo,marca,patente,vtv,ruta,poliza,brama,'activo',obs,foto);
SELECT 1;
ELSE
SELECT 2;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addEmpleado` (IN `nombre` VARCHAR(250), IN `apellido` VARCHAR(250), IN `cargo` INT, IN `direccion` VARCHAR(250), IN `ciudad` VARCHAR(250), IN `dni` INT, IN `movil` INT, IN `nacimiento` DATE, IN `sexo` CHAR(1), IN `estado` VARCHAR(250), IN `ingreso` DATE, IN `nomE` VARCHAR(250), IN `dniE` INT, IN `movilE` INT, IN `hijos` INT, IN `nomB` VARCHAR(250), IN `dniB` INT, IN `movilB` INT, IN `direccionB` VARCHAR(250), IN `moyano` ENUM('s','n'), IN `registro` VARCHAR(250), IN `vencimiento` DATE, IN `observ` VARCHAR(250), IN `foto` VARCHAR(250))  BEGIN
DECLARE dniE int(50);
SET @dniE:=(SELECT COUNT(*) FROM empleado WHERE empleado.emp_dni=dni);
if @dniE=0 THEN
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
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addSector` (IN `nombre` VARCHAR(45))  INSERT INTO sector(sector) VALUES (nombre)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addVehiculo` (IN `tipo` VARCHAR(250), IN `marca` VARCHAR(250), IN `patente` VARCHAR(250), IN `vtv` DATE, IN `ruta` DATE, IN `poliza` DATE, IN `brama` DATE, IN `obs` VARCHAR(250), IN `foto` VARCHAR(250))  INSERT INTO transporte(transporte.tipo,transporte.marca,
                       transporte.patente,transporte.verificacion,
                       transporte.ruta,transporte.poliza,transporte.bramatologia,transporte.estado,
                       transporte.observacion,transporte.foto) VALUES (tipo,marca,patente,vtv,ruta,poliza,brama,'activo',obs,foto)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dniVVV` (IN `dni` INT(50))  BEGIN
DECLARE dniE int;
SET @dniE:=(SELECT COUNT(*) FROM empleado WHERE empleado.emp_dni=dni);
if @dniE=0 THEN
SELECT 1;
ELSE
SELECT 2;
END IF;
END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFotoVehiculo` (IN `id` INT(50), IN `destino` VARCHAR(250))  UPDATE transporte SET transporte.foto=destino WHERE transporte.idtransporte=id$$

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
(1, 'Luis Sebastian', 'castro', 'Cabildo 342', 'malvinas argentina', 31562633, 1137725028, 'm', '1984-12-27', '2015-01-01', 's', 'activo', 'vista/imagenes/IMG19820219184.png', 1, '', 0, 0, 0),
(7, 'PATRICIO ', 'CANDIA', 'VIEYTES 552', 'VILLA MARTELLI', 40855719, 0, 'm', '2021-08-01', '2020-01-25', 's', 'activo', 'vista/imagenes/usuario.png', 1, 'GOMEZ LUDMILA', NULL, 1169821303, 1),
(8, 'GONZALO ERNESTO', 'BARRIOS', 'CONSTITUYENTES 677', 'SAN MARTIN', 37019072, 1166506420, 'm', '2021-08-01', '2021-02-01', 'c', 'activo', 'vista/imagenes/usuario.png', 5, 'ROSA MINIO', NULL, 1159628491, 0),
(9, 'LUCAS NICOLAS', 'LOPEZ', 'CONSTITUYENTES Y LA NUEVA', 'SAN MARTIN', 36644700, 0, 'm', '2021-08-01', '2017-07-10', 's', 'activo', 'vista/imagenes/IMG198202113176.png', 5, '', NULL, 0, 0),
(10, 'GABRIEL', 'GONZALES', 'LAVALLE 5294', 'VILLA MARTELLI', 43302746, 1162183674, 'm', '2021-08-01', '2019-11-11', 's', 'activo', 'vista/imagenes/usuario.png', 5, 'NN', NULL, 0, 0),
(11, 'SANTIAGO ', 'BRENDAN', 'LOYOLA Manz.11 Casa 11', 'VILLA ZAGALA', 36978084, 373165437, 'm', '2021-08-06', '2019-04-12', 's', 'activo', 'vista/imagenes/IMG19820211378.png', 5, 'NUNIES MARIELA', NULL, 1157582992, 6);

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
(1, 'nn', 0, 0, 'nn', 's', '', '2023-04-29', 1, ''),
(2, 'GOMEZ LUDMILA', 39517406, 1169821303, 'VIEYTES 522 V.MARTELLI', 's', 'NN', '2022-11-19', 7, ''),
(3, 'ROSA MINIO', 21621094, 1159628491, 'CONSTITUYENTES 677 SAN MARTIN', 's', '', '0000-00-00', 8, ''),
(4, 'SEPULVEDA NORMA', 11417984, 0, 'NN', 's', '', '0000-00-00', 9, ''),
(5, 'ZARZA ALICIA', 28252552, 1132569021, 'LAVALLE 5294 VILLA MARTELLI', 'n', '', '0000-00-00', 10, ''),
(6, 'NUNIES MARIELA', 0, 1157582992, 'LOYOLA Manz.11 Casa 11 ZAGALA', 'n', '', '0000-00-00', 11, 'HOSPITAL TORNU');

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
(2, 'administracion'),
(3, 'changa'),
(4, 'mantenimiento'),
(5, 'produccion');

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
(1, 'acoplado', 'pratti', 'WUG672', '2021-11-11', '0000-00-00', '2021-08-19', '2022-02-26', 'activo', '', 'vista/imagenes/camion.png'),
(2, 'CHASIS', 'FORD CARGO', 'EQE861', '0000-00-00', '0000-00-00', '0000-00-00', '2022-01-26', 'activo', '', 'vista/imagenes/camion.png'),
(3, 'TRACTOR', 'FIAT', 'SRV854', '2021-07-28', '2021-07-20', '2021-12-09', '0000-00-00', 'activo', '', 'vista/imagenes/camion.png'),
(4, 'TRACTOR', 'CHEVROLET KODIA', 'COE407', '0000-00-00', '0000-00-00', '2021-10-19', '0000-00-00', 'activo', '', 'vista/imagenes/camion.png'),
(5, 'CAMION', 'MERCEDES BENZ 710', 'AWP113', '0000-00-00', '0000-00-00', '2021-08-31', '0000-00-00', 'activo', '', 'vista/imagenes/camion.png'),
(6, 'CAMION', 'MERCEDES 1215', 'VAD365', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'activo', '', 'vista/imagenes/camion.png'),
(7, 'CAMIONETA', 'MERCEDES SPRINTER', 'CZC226', '2021-08-10', '0000-00-00', '2021-08-09', '2022-01-06', 'activo', '', 'vista/imagenes/camion.png'),
(8, 'CAMIONETA', 'MERCEDES SPRINTER', 'JTH524', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'activo', '', 'vista/imagenes/camion.png'),
(9, 'SEMI', 'MONTENEGRO', 'SVI900', '2021-08-12', '2021-07-20', '2021-12-09', '0000-00-00', 'activo', '', 'vista/imagenes/camion.png'),
(10, 'SEMI', 'SALTO', 'UZE068', '0000-00-00', '2021-09-11', '2021-10-07', '2022-06-17', 'activo', '', 'vista/imagenes/camion.png');

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
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empleadoextras`
--
ALTER TABLE `empleadoextras`
  MODIFY `idempleadoExtras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `idsector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idtransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
