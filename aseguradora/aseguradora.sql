-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2020 a las 22:27:01
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aseguradora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abogado`
--

CREATE TABLE `abogado` (
  `carne` int(15) NOT NULL,
  `campo_de_accion` varchar(30) NOT NULL,
  `años_de_experiencia` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analista`
--

CREATE TABLE `analista` (
  `carne` int(15) NOT NULL,
  `años_de_experiencia` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `carne` int(15) NOT NULL,
  `cedula` int(15) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `salario` double NOT NULL,
  `nivel_de_educacion` varchar(20) NOT NULL,
  `fecha_de_ingreso` date NOT NULL,
  `tipo_empleado` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incentivo`
--

CREATE TABLE `incentivo` (
  `codigo` int(15) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_de_incentivo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `carne_emp` int(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_aux`
--

CREATE TABLE `tabla_aux` (
  `carne_emp` int(15) NOT NULL,
  `conteo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `carne` int(15) NOT NULL,
  `reputacion` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abogado`
--
ALTER TABLE `abogado`
  ADD PRIMARY KEY (`carne`),
  ADD UNIQUE KEY `fk_abo_emp` (`carne`);

--
-- Indices de la tabla `analista`
--
ALTER TABLE `analista`
  ADD PRIMARY KEY (`carne`),
  ADD UNIQUE KEY `fk_ana_emp` (`carne`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`carne`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `incentivo`
--
ALTER TABLE `incentivo`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_inc_emp` (`carne_emp`);

--
-- Indices de la tabla `tabla_aux`
--
ALTER TABLE `tabla_aux`
  ADD PRIMARY KEY (`carne_emp`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`carne`),
  ADD UNIQUE KEY `fk_ven_emp` (`carne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
