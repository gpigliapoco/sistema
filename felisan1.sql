-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2021 a las 21:00:25
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `addDetallePlan` (IN `id` INT(50), IN `cuota` INT(50), IN `total` INT(50), IN `estado` VARCHAR(250), IN `fecha` DATE)  INSERT INTO detalleplan(detalleplan.idplan_detalle,detalleplan.cuota,detalleplan.total_cuota,
                        detalleplan.fechaDet,detalleplan.estado) VALUES
                        (id,cuota,total,fecha,'debe')$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPlan` (IN `cuit` VARCHAR(50), IN `plan` VARCHAR(250), IN `deta` VARCHAR(250), IN `total` INT(50), IN `fecha` DATE)  BEGIN
INSERT INTO planespago(planespago.plan,planespago.detalle,planespago.cuit,
                       planespago.total,planespago.estado,planespago.fecha) VALUES
                       (plan,deta,cuit,total,'activo',fecha);
                       SELECT LAST_INSERT_ID();
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `indexPlan` ()  SELECT COUNT(planespago.idplanesPago) as plan FROM planespago$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `indexTransporte` ()  SELECT COUNT(*) as transp FROM transporte$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listaplanVer` (IN `id` INT(50))  SELECT planespago.* FROM planespago 
WHERE planespago.idplanesPago=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarComboPlan` ()  SELECT planespago.idplanesPago,planespago.plan,CONCAT(planespago.plan," - ",planespago.cuit) as planes FROM planespago$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarIndex` ()  SELECT planespago.plan,planespago.cuit,planespago.total,planespago.estado,COUNT(detalleplan.cuota) as cuotas FROM planespago INNER JOIN detalleplan ON planespago.idplanesPago=detalleplan.idplan_detalle GROUP BY planespago.idplanesPago$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarPlan` (IN `id` INT(50))  SELECT planespago.*,detalleplan.* FROM planespago INNER JOIN detalleplan on detalleplan.idplan_detalle=planespago.idplanesPago
WHERE planespago.idplanesPago=id$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `prueba` ()  SELECT detalleplan.idplan_detalle,planespago.plan, COUNT(detalleplan.cuota)  FROM detalleplan INNER JOIN planespago ON detalleplan.idplan_detalle=planespago.idplanesPago GROUP BY detalleplan.idplan_detalle$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `saldoPlan` (IN `id` INT(50))  SELECT SUM(detalleplan.total_cuota) FROM detalleplan WHERE detalleplan.idplan_detalle=id AND detalleplan.estado='Pago'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEmpleado` (IN `id` INT, IN `nombre` VARCHAR(250), IN `apellido` VARCHAR(250), IN `cargo` INT, IN `direccion` VARCHAR(250), IN `ciudad` VARCHAR(250), IN `dni` INT, IN `movil` INT, IN `nacimiento` DATE, IN `sexo` CHAR(1), IN `estado` VARCHAR(250), IN `ingreso` DATE, IN `nomE` VARCHAR(250), IN `dniE` INT, IN `movilE` INT, IN `hijos` INT, IN `nomB` VARCHAR(250), IN `dniB` INT, IN `movilB` INT, IN `direccionB` VARCHAR(250), IN `moyano` ENUM('s','n'), IN `registro` VARCHAR(250), IN `vencimiento` DATE, IN `observ` VARCHAR(250))  BEGIN
UPDATE empleado set empleado.emp_nombre=nombre,empleado.emp_apellido=apellido,empleado.emp_direccion=direccion,empleado.emp_ciudad=ciudad,empleado.emp_dni=dni,empleado.emp_movil=movil,empleado.emp_sexo=sexo,empleado.emp_nacimiento=nacimiento,empleado.emp_ingreso=ingreso,empleado.emp_estado=estado,empleado.sector_idsector=cargo,empleado.emp_esposa=nomE,empleado.emp_esposaDni=dniE,empleado.emp_esposaMovil=movilE,empleado.emp_hijos=hijos where empleado.idempleado=id;
UPDATE empleadoextras SET empleadoextras.ex_nombre=nomB,
                          empleadoextras.ex_dni=dniB,empleadoextras.ex_movil=movilB,empleadoextras.ex_direccion=direccionB,
                          empleadoextras.ex_registroM=moyano,empleadoextras.ex_registro=registro,empleadoextras.ex_vrencimiento=vencimiento,
                          empleadoextras.ex_observacion=observ WHERE empleadoextras.empleado_idempleado=id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFotoEmpleado` (IN `id` INT, IN `ruta` VARCHAR(250))  UPDATE empleado SET empleado.emp_foto=ruta WHERE empleado.idempleado=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFotoVehiculo` (IN `id` INT(50), IN `destino` VARCHAR(250))  UPDATE transporte SET transporte.foto=destino WHERE transporte.idtransporte=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePlan` (IN `id` INT(50), IN `cuit` VARCHAR(50), IN `plan` VARCHAR(50), IN `deta` VARCHAR(250), IN `total` INT(50), IN `fecha` DATE, IN `estado` VARCHAR(250))  UPDATE planespago SET planespago.cuit=cuit,planespago.plan=plan,planespago.detalle=deta,
planespago.total=total,planespago.fecha=fecha,planespago.estado=estado WHERE planespago.idplanesPago=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStatus` (IN `id` INT, IN `estado` VARCHAR(45))  UPDATE empleado SET empleado.emp_status = estado WHERE empleado.idempleado=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStatusPlan` (IN `id` INT, IN `estado` VARCHAR(250))  UPDATE detalleplan SET detalleplan.estado = estado WHERE detalleplan.iddetallePlan=id$$

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
-- Estructura de tabla para la tabla `detalleplan`
--

CREATE TABLE `detalleplan` (
  `iddetallePlan` int(11) NOT NULL,
  `cuota` int(50) NOT NULL,
  `total_cuota` int(50) NOT NULL,
  `estado` enum('Pago','Debe','','') NOT NULL,
  `idplan_detalle` int(50) NOT NULL,
  `fechaDet` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleplan`
--

INSERT INTO `detalleplan` (`iddetallePlan`, `cuota`, `total_cuota`, `estado`, `idplan_detalle`, `fechaDet`) VALUES
(1, 1, 3000, 'Pago', 1, '2020-07-16'),
(2, 2, 3084, 'Pago', 1, '2020-08-16'),
(3, 3, 3165, 'Pago', 1, '2020-09-16'),
(4, 4, 3244, 'Pago', 1, '2020-10-16'),
(5, 5, 3367, 'Pago', 1, '2020-11-16'),
(6, 6, 3447, 'Pago', 1, '2020-12-16'),
(7, 7, 3490, 'Pago', 1, '2021-01-16'),
(8, 8, 3571, 'Pago', 1, '2021-02-16'),
(9, 9, 3644, 'Pago', 1, '2021-03-16'),
(10, 10, 3733, 'Pago', 1, '2021-04-16'),
(11, 11, 3811, 'Pago', 1, '2021-05-16'),
(12, 12, 3895, 'Pago', 1, '2021-06-16'),
(13, 13, 3974, 'Pago', 1, '2021-07-16'),
(14, 14, 4057, 'Pago', 1, '2021-08-16'),
(15, 15, 4138, 'Debe', 1, '2021-09-16'),
(16, 16, 4217, 'Debe', 1, '2021-10-16'),
(17, 17, 4301, 'Debe', 1, '2021-11-16'),
(18, 18, 4379, 'Debe', 1, '2021-12-16'),
(19, 19, 4463, 'Debe', 1, '2022-01-16'),
(20, 20, 4544, 'Debe', 1, '2022-02-16'),
(21, 21, 4617, 'Debe', 1, '2022-03-16'),
(22, 22, 4706, 'Debe', 1, '2022-04-16'),
(23, 23, 4785, 'Debe', 1, '2022-05-16'),
(24, 24, 4869, 'Debe', 1, '2022-06-16'),
(25, 1, 4702, 'Pago', 2, '2020-04-16'),
(26, 2, 4835, 'Pago', 2, '2020-05-16'),
(27, 3, 4968, 'Pago', 2, '2020-06-16'),
(28, 4, 5102, 'Pago', 2, '2020-07-16'),
(29, 5, 5235, 'Pago', 2, '2020-08-16'),
(30, 6, 5368, 'Pago', 2, '2020-09-16'),
(31, 7, 5501, 'Pago', 2, '2020-10-16'),
(32, 8, 5634, 'Pago', 2, '2020-11-16'),
(33, 9, 5767, 'Pago', 2, '2020-12-16'),
(34, 10, 5900, 'Pago', 2, '2021-01-16'),
(35, 11, 6033, 'Pago', 2, '2021-02-16'),
(36, 12, 6166, 'Pago', 2, '2021-03-16'),
(37, 13, 6299, 'Pago', 2, '2021-04-16'),
(38, 14, 6433, 'Debe', 2, '2021-05-16'),
(39, 15, 6566, 'Debe', 2, '2021-06-16'),
(40, 16, 6699, 'Debe', 2, '2021-07-16'),
(41, 17, 6832, 'Debe', 2, '2021-08-16'),
(42, 18, 6965, 'Debe', 2, '2021-09-16'),
(43, 19, 7098, 'Debe', 2, '2021-10-16'),
(44, 20, 7231, 'Debe', 2, '2021-11-16'),
(45, 21, 7364, 'Debe', 2, '2021-12-16'),
(46, 22, 7497, 'Debe', 2, '2022-01-16'),
(47, 23, 7630, 'Debe', 2, '2022-02-16'),
(48, 24, 7764, 'Debe', 2, '2022-03-16'),
(49, 25, 7897, 'Debe', 2, '2022-04-16'),
(50, 26, 8030, 'Debe', 2, '2022-05-16'),
(51, 27, 8163, 'Debe', 2, '2022-06-16'),
(52, 28, 8296, 'Debe', 2, '2022-07-16'),
(53, 29, 8429, 'Debe', 2, '2022-08-16'),
(54, 30, 8562, 'Debe', 2, '2022-09-16'),
(55, 31, 8695, 'Debe', 2, '2022-10-16'),
(56, 32, 8828, 'Debe', 2, '2022-11-16'),
(57, 33, 8961, 'Debe', 2, '2022-12-16'),
(58, 34, 9095, 'Debe', 2, '2023-01-16'),
(59, 35, 9228, 'Debe', 2, '2023-02-16'),
(60, 36, 9360, 'Debe', 2, '2023-03-16'),
(61, 2, 3560, 'Debe', 3, '2020-05-16'),
(62, 3, 3658, 'Debe', 3, '2020-06-16'),
(63, 4, 3756, 'Debe', 3, '2020-07-16'),
(64, 5, 3854, 'Debe', 3, '2020-08-16'),
(65, 6, 3952, 'Debe', 3, '2020-09-16'),
(66, 7, 4050, 'Debe', 3, '2020-10-16'),
(67, 8, 4148, 'Debe', 3, '2020-11-16'),
(68, 9, 4246, 'Debe', 3, '2020-12-16'),
(69, 10, 4344, 'Debe', 3, '2021-01-16'),
(70, 11, 4442, 'Debe', 3, '2021-02-16'),
(71, 12, 4540, 'Debe', 3, '2021-03-16'),
(72, 13, 4638, 'Debe', 3, '2021-04-16'),
(73, 14, 4736, 'Debe', 3, '2021-05-16'),
(74, 15, 4834, 'Debe', 3, '2021-06-16'),
(75, 16, 4932, 'Debe', 3, '2021-07-16'),
(76, 17, 5030, 'Debe', 3, '2021-08-16'),
(77, 18, 5128, 'Debe', 3, '2021-09-16'),
(78, 19, 5226, 'Debe', 3, '2021-10-16'),
(79, 20, 5324, 'Debe', 3, '2021-11-16'),
(80, 21, 5422, 'Debe', 3, '2021-12-16'),
(81, 22, 5520, 'Debe', 3, '2022-01-16'),
(82, 23, 5618, 'Debe', 3, '2022-02-16'),
(83, 24, 5716, 'Debe', 3, '2022-03-16'),
(84, 25, 5814, 'Debe', 3, '2022-04-16'),
(85, 26, 5912, 'Debe', 3, '2022-05-16'),
(86, 27, 6010, 'Debe', 3, '2022-06-16'),
(87, 28, 6108, 'Debe', 3, '2022-07-16'),
(88, 29, 6206, 'Debe', 3, '2022-08-16'),
(89, 30, 6304, 'Debe', 3, '2022-09-16'),
(90, 31, 6402, 'Debe', 3, '2022-10-16'),
(91, 32, 6500, 'Debe', 3, '2022-11-16'),
(92, 33, 6598, 'Debe', 3, '2022-12-16'),
(93, 34, 6696, 'Debe', 3, '2023-01-16'),
(94, 35, 6794, 'Debe', 3, '2023-02-16'),
(95, 36, 6892, 'Debe', 3, '2023-03-16'),
(96, 1, 16714, 'Pago', 4, '2021-03-10'),
(97, 2, 16714, 'Pago', 4, '2021-04-12'),
(98, 3, 16714, 'Pago', 4, '2021-05-16'),
(99, 4, 16714, 'Pago', 4, '2021-06-16'),
(100, 5, 16714, 'Debe', 4, '2021-07-16'),
(101, 6, 16714, 'Debe', 4, '2021-08-10'),
(102, 7, 16714, 'Debe', 4, '2021-09-16'),
(103, 10, 16714, 'Debe', 4, '2021-10-10'),
(104, 11, 16714, 'Debe', 4, '2021-11-16'),
(105, 12, 16714, 'Debe', 4, '2021-12-16'),
(106, 13, 16714, 'Debe', 4, '2022-01-16'),
(107, 14, 16714, 'Debe', 4, '2022-02-16'),
(108, 15, 16714, 'Debe', 4, '2022-03-16'),
(109, 16, 16714, 'Debe', 4, '2022-04-16'),
(110, 17, 16714, 'Debe', 4, '2022-05-16'),
(111, 18, 16714, 'Debe', 4, '2022-06-16'),
(112, 0, 20431, 'Pago', 5, '2020-11-27'),
(113, 1, 13793, 'Pago', 5, '2020-12-16'),
(114, 2, 14075, 'Pago', 5, '2021-01-16'),
(115, 3, 14347, 'Pago', 5, '2021-02-16'),
(116, 4, 14592, 'Pago', 5, '2021-03-16'),
(117, 5, 14892, 'Pago', 5, '2021-04-16'),
(118, 6, 15155, 'Pago', 5, '2021-05-16'),
(119, 7, 15437, 'Pago', 5, '2021-06-16'),
(120, 8, 15700, 'Pago', 5, '2021-07-16'),
(121, 9, 15982, 'Pago', 5, '2021-08-16'),
(122, 10, 16254, 'Debe', 5, '2021-09-16'),
(123, 11, 16517, 'Debe', 5, '2021-10-16'),
(124, 12, 16799, 'Debe', 5, '2021-11-16'),
(125, 13, 17062, 'Debe', 5, '2021-12-16'),
(126, 14, 17344, 'Debe', 5, '2022-01-16'),
(127, 15, 17616, 'Debe', 5, '2022-02-16'),
(128, 16, 17861, 'Debe', 5, '2022-03-16'),
(129, 17, 18161, 'Debe', 5, '2022-04-16'),
(130, 18, 18424, 'Debe', 5, '2022-05-16'),
(131, 19, 18706, 'Debe', 5, '2022-06-16'),
(132, 20, 18969, 'Debe', 5, '2022-07-16'),
(133, 21, 19251, 'Debe', 5, '2022-08-16'),
(134, 22, 19523, 'Debe', 5, '2022-09-16'),
(135, 23, 19787, 'Debe', 5, '2022-10-16'),
(136, 24, 20068, 'Debe', 5, '2022-11-16'),
(137, 25, 20331, 'Debe', 5, '2022-12-16'),
(138, 26, 20613, 'Debe', 5, '2023-01-16'),
(139, 27, 20885, 'Debe', 5, '2023-02-16'),
(140, 28, 20885, 'Debe', 5, '2023-03-16'),
(141, 29, 21430, 'Debe', 5, '2023-04-16'),
(142, 30, 21694, 'Debe', 5, '2023-05-16'),
(143, 31, 21975, 'Debe', 5, '2023-06-16'),
(144, 32, 22238, 'Debe', 5, '2023-07-16'),
(145, 33, 22520, 'Debe', 5, '2023-08-16'),
(146, 34, 22792, 'Debe', 5, '2023-09-16'),
(147, 35, 23056, 'Debe', 5, '2023-10-16'),
(148, 36, 23337, 'Debe', 5, '2023-11-16');

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
(11, 'SANTIAGO ', 'BRENDAN', 'LOYOLA Manz.11 Casa 11', 'VILLA ZAGALA', 36978084, 373165437, 'm', '2021-08-06', '2019-04-12', 's', 'activo', 'vista/imagenes/IMG19820211378.png', 5, 'NUNIES MARIELA', NULL, 1157582992, 6),
(12, 'RAINZ WILFREDO', 'CANDIA', 'COLOMBIA 1550', 'SAN ANDRES', 93793774, 1131113750, 'm', '2021-08-01', '2007-07-13', 's', 'activo', 'vista/imagenes/IMG198202114604.png', 5, 'NN', NULL, 0, 8),
(13, 'NORBERTO UBALDO', 'ACOSTA', 'FRENCH 1119', 'VILLA MARTELLI', 27389296, 1168518578, 'm', '2021-08-02', '2019-10-07', 's', 'activo', 'vista/imagenes/IMG198202114352.png', 5, 'NN', NULL, 0, 2),
(14, 'ALFREDO EZEQUIEL', 'LECLERC', 'MENDOZA 2800 (colombia y san jose Casa 37)', 'SAN MARTIN', 35681938, 1553151134, 'm', '2021-08-17', '2019-11-15', 's', 'activo', 'vista/imagenes/IMG198202114277.png', 5, '', NULL, 0, 0),
(15, 'DAHIANA LUJAN', 'SANCHEZ ACOSTA', 'COLOMBIA 1555', 'VILLA MARTELLI', 96005301, 114945596, 'f', '2021-08-10', '2021-01-21', 's', 'activo', 'vista/imagenes/IMG198202114802.png', 5, '', NULL, 0, 2),
(16, 'ESTEBAN GABRIEL', 'ISTRAULIN', 'GURRUCHAGA 560', 'SAN MARTIN', 32884714, 1131695633, 'm', '2021-01-01', '2017-03-05', 's', 'activo', 'vista/imagenes/IMG198202114844.png', 5, '', NULL, 0, 2),
(17, 'RUBEN ERNESTO', 'CANDIA', 'EVA PERON 5700 CASA 31', 'SAN MARTIN', 27540395, 1158531413, 'm', '2021-01-01', '2007-11-01', 's', 'activo', 'vista/imagenes/IMG1982021147.png', 1, 'ARROYO ALEJANDRA', NULL, 1168665550, 4),
(18, 'LIZ LAURA MARCELA', 'FLEITAS', 'MOLDES 5200', 'VILLA MARTELLI', 94078511, 1166611437, 'f', '1981-10-19', '2018-01-01', 's', 'activo', 'vista/imagenes/IMG198202115584.png', 4, 'SOSA CARLOS', NULL, 0, 3);

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
(6, 'NUNIES MARIELA', 0, 1157582992, 'LOYOLA Manz.11 Casa 11 ZAGALA', 'n', '', '0000-00-00', 11, 'HOSPITAL TORNU'),
(7, 'TERESA RAINZ', 13557234, 1164605333, 'NN', 'n', '', '0000-00-00', 12, ''),
(8, 'ACOSTA RAUL', 10697761, 0, 'FRENCH 1119', 'n', '', '0000-00-00', 13, 'HOSPITAL BELGRANO'),
(9, 'TEREZA RAINZ', 13557234, 1531304288, 'NN', 'n', '', '0000-00-00', 14, ''),
(10, 'ACOSTA VALLEJO CARMEN', 95358243, 1131711333, 'COLOMBIA 1555', 'n', '', '0000-00-00', 15, ''),
(11, 'OLIVEIRA YOLANDA', 0, 1123845055, 'N', 'n', '', '0000-00-00', 16, ''),
(12, 'ARROYO ALEJANDRA', 27601117, 1168665550, 'EVA PERON 5700', 's', '', '2021-05-28', 17, 'OSPIA'),
(13, 'NN', 0, 0, 'NN', 'n', '', '0000-00-00', 18, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planespago`
--

CREATE TABLE `planespago` (
  `idplanesPago` int(50) NOT NULL,
  `plan` varchar(250) NOT NULL,
  `detalle` varchar(250) NOT NULL,
  `cuit` varchar(50) NOT NULL,
  `total` int(100) NOT NULL,
  `estado` enum('activo','inactivo','','') NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planespago`
--

INSERT INTO `planespago` (`idplanesPago`, `plan`, `detalle`, `cuit`, `total`, `estado`, `fecha`) VALUES
(1, 'LEO-M791525', 'SE DEBITA DE CTA.CREDICOOP 24 cuotas', '20299859348', 94431, 'activo', '2020-03-26'),
(2, 'GERA-M788184', 'SE DEBITA DE CTA.CREDICOOP GERA 36 cuotas', '23147724799', 253151, 'activo', '2019-11-26'),
(3, 'GERA-M788173', 'SE DEBITA DE CTA.CREDICOOP GERA 36 CUOTAS', '23147724799', 186390, 'activo', '2019-11-26'),
(4, 'LEO-07801', 'BOLETAS QUE PAGAR 1 X MES 18 CUOTAS IIBB', '20299859348', 300852, 'activo', '2021-02-05'),
(5, 'ORESTES-0313086', 'SE DEBITA DE CTA.CREDICOOP SOSA APORTES SUSS 36 CUOTAS', '2147483647', 688770, 'activo', '2020-11-27');

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
-- Indices de la tabla `detalleplan`
--
ALTER TABLE `detalleplan`
  ADD PRIMARY KEY (`iddetallePlan`),
  ADD KEY `fk_detallePlan_planesPago` (`idplan_detalle`);

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
-- Indices de la tabla `planespago`
--
ALTER TABLE `planespago`
  ADD PRIMARY KEY (`idplanesPago`);

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
-- AUTO_INCREMENT de la tabla `detalleplan`
--
ALTER TABLE `detalleplan`
  MODIFY `iddetallePlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empleadoextras`
--
ALTER TABLE `empleadoextras`
  MODIFY `idempleadoExtras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `planespago`
--
ALTER TABLE `planespago`
  MODIFY `idplanesPago` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Filtros para la tabla `detalleplan`
--
ALTER TABLE `detalleplan`
  ADD CONSTRAINT `fk_detallePlan_planesPago` FOREIGN KEY (`idplan_detalle`) REFERENCES `planespago` (`idplanesPago`) ON DELETE CASCADE ON UPDATE CASCADE;

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
