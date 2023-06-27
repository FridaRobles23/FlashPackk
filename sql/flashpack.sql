-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-06-2023 a las 02:12:52
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `flashpack`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `idAdmin` int(15) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `nombre`, `email`, `password`) VALUES
(1, 'Nelly Alanis', '223271023@alumnos.utn.edu.mx', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celulares`
--

DROP TABLE IF EXISTS `celulares`;
CREATE TABLE IF NOT EXISTS `celulares` (
  `idCel` int(15) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(80) NOT NULL,
  `marca` varchar(80) NOT NULL,
  `color` varchar(80) NOT NULL,
  PRIMARY KEY (`idCel`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `celulares`
--

INSERT INTO `celulares` (`idCel`, `modelo`, `marca`, `color`) VALUES
(1, 'Mate 50 Pro', 'Huawei', 'Azul'),
(2, 'Galaxy S23+', 'Samsung', 'Gris'),
(3, 'Velvet', 'LG', 'Azul'),
(4, 'Smartphone Y5P', 'Huawei', 'Turqueza'),
(5, 'Poco X5 ', 'Xiaomi', 'Negro'),
(6, 'Smartphone Y9s', 'Huawei', 'Multicolor'),
(7, 'Smartphone E50', 'Hisense', 'Verde'),
(8, 'Smartphone C21', 'Nokia', 'Azul Obscuro'),
(9, 'Smartphone V40i ', 'Hisense ', 'Rojo'),
(10, 'Galaxy Z Fold4', 'Samsung', 'Blanco'),
(11, 'Galaxy S23 Ultra', 'Samsung', 'Sky Blue'),
(12, 'Galaxy S21 FE 5G', 'Samsung', 'Olivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(15) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `direccion`, `telefono`, `email`, `password`) VALUES
(1, 'Josmar', 'Calle independencia', 553022147, 'jos@gmail.com', 'Jos123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `idmaterial` int(15) NOT NULL AUTO_INCREMENT,
  `material` varchar(80) NOT NULL,
  PRIMARY KEY (`idmaterial`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idmaterial`, `material`) VALUES
(1, 'Carton '),
(2, 'Plastico'),
(3, 'Papel'),
(4, 'Playo'),
(5, 'Madera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

DROP TABLE IF EXISTS `peso`;
CREATE TABLE IF NOT EXISTS `peso` (
  `idpeso` int(15) NOT NULL AUTO_INCREMENT,
  `peso` varchar(30) NOT NULL,
  PRIMARY KEY (`idpeso`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peso`
--

INSERT INTO `peso` (`idpeso`, `peso`) VALUES
(1, '0-4 KILOS'),
(2, '5-10 kilos'),
(3, '11-15 kilos'),
(4, '16-20 kilos'),
(5, '21-25 kilos'),
(6, '26-30 kilos'),
(7, '31-35 kilos'),
(8, '36-40 kilos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidores`
--

DROP TABLE IF EXISTS `repartidores`;
CREATE TABLE IF NOT EXISTS `repartidores` (
  `idRepartidor` int(15) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(15) NOT NULL,
  `idVehiculo` int(15) NOT NULL,
  `idCel` int(15) NOT NULL,
  PRIMARY KEY (`idRepartidor`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repartidores`
--

INSERT INTO `repartidores` (`idRepartidor`, `nombre`, `telefono`, `email`, `password`, `idVehiculo`, `idCel`) VALUES
(1, 'Monse Alanis', 550003014, 'monse@gmail.com', 'Monse123', 3, 1),
(2, 'Lupita Martinez', 552190002, 'lupita@gmail.com', 'Lupita123', 6, 7),
(3, 'Alberto Rodriguez', 553012695, 'beto@gmail.com', 'beto123', 2, 2),
(4, 'Eduardo', 56327896, 'eduardo@gmail.com', 'Eduardo0012', 1, 4),
(5, 'Jose Rosales', 58961753, 'jose@gmail.com', 'Jose123', 4, 5),
(6, 'Santiago Flores', 554477889, 'santiago@gmail.com', 'Sant123', 5, 3),
(7, 'Gonzalo Gonzalez', 54632156, 'gonzalo@gmail.com', 'Gonz12345', 9, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE IF NOT EXISTS `vehiculos` (
  `idVehiculo` int(15) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(80) NOT NULL,
  `tipo` varchar(80) NOT NULL,
  `placa` varchar(80) NOT NULL,
  `capacidad` varchar(80) NOT NULL,
  PRIMARY KEY (`idVehiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`idVehiculo`, `modelo`, `tipo`, `placa`, `capacidad`) VALUES
(1, 'Sedan Toyota', 'Carro', 'MEMM-1950', 'Media'),
(2, 'Jeep Compass', 'Camioneta', 'JGNP-1400', 'Grande'),
(3, 'Yamaha MT-09', 'Moto', 'MTAS-1203', 'PequeÃ±a'),
(4, 'Chevrolet Aveo', 'Carro', 'AAGR-5231', 'Media'),
(5, 'Nissan Kicks', 'Camioneta', 'GARM-1809', 'Grande'),
(6, 'Chevrolet Groove', 'Camioneta', 'QWE-7894', 'Grande'),
(7, 'Ford Mustang', 'carro', 'ERT-2569', 'Media'),
(8, 'Toyota Supra', 'Carro', 'YST-632', 'Media'),
(9, 'Hyundai Grand i10', 'Carro', 'Ã‘LP-8944', 'Media'),
(10, 'Jeep Wrangler', 'Camioneta', 'JKL-7775', 'Grande'),
(11, 'Suzuki Jimny', 'Camioneta', 'DRL-0874', 'Grande'),
(12, 'Chrysler Pacifica', 'Camioneta', 'WER-1234', 'Grande'),
(13, 'Nissan Frontier', 'Camioneta', 'ZXA-6478', 'Grande'),
(14, 'Italika D125', 'Motoneta', 'Dyt-148', 'PequeÃ±a'),
(15, 'Italika D125LT', 'Motoneta', 'LT4-980', 'PequeÃ±a'),
(16, 'Italika Vitalia150', 'Motoneta', 'VTL-0345', 'PequeÃ±a'),
(17, 'DM150', 'Moto', 'MD-152', 'PequeÃ±a'),
(18, 'DM250X', 'Moto', 'FGT-569', 'PequeÃ±a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

DROP TABLE IF EXISTS `zonas`;
CREATE TABLE IF NOT EXISTS `zonas` (
  `idzona` int(15) NOT NULL AUTO_INCREMENT,
  `zona` varchar(80) NOT NULL,
  PRIMARY KEY (`idzona`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`idzona`, `zona`) VALUES
(1, 'Zona Oriente'),
(2, 'Zona Poniente'),
(3, 'Zona Este');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
