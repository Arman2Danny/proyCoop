-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2023 a las 16:56:48
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcooptaxis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciasocio`
--

CREATE TABLE `asistenciasocio` (
  `idasistencia` int(11) NOT NULL,
  `apellidosocio` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha_asist` date NOT NULL,
  `monto_multa` double NOT NULL,
  `pagomulta` double NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciaunidad`
--

CREATE TABLE `asistenciaunidad` (
  `idasistenciaunidad` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `numerounidad` varchar(150) NOT NULL,
  `nombreid` int(11) NOT NULL,
  `apellidosocio` varchar(150) NOT NULL,
  `fechaunidad` date NOT NULL,
  `horaunidad` time NOT NULL,
  `id_ubicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL,
  `nombre_evento` varchar(150) NOT NULL,
  `Descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ordendia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idevento`, `nombre_evento`, `Descripcion`, `fecha`, `hora`, `ordendia`) VALUES
(1, 'Deportes', 'Juego deportivo en las canchas de fun deportes  a las 8am', '2023-01-28', '05:05:00', '1.  rtyrtyrt\n2. fgfgfg'),
(3, 'Asamble Ordinaria', 'Es convocada por razones muy importantes', '2023-01-29', '00:00:00', ''),
(4, 'Asamblea general', 'asuntos varios', '2023-01-30', '00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `mruta` varchar(150) NOT NULL,
  `micon` varchar(50) NOT NULL,
  `mnombre` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `mruta`, `micon`, `mnombre`, `estado`) VALUES
(1, 'Roles', 'fa fa-address-card mx-2', 'Roles', 1),
(2, 'Socios', 'fa fa-users mx-2', 'Socios', 1),
(3, 'Vehiculos', 'fa fa-taxi mx-2', 'Vehiculos', 1),
(4, 'Asistencia', 'fas fa-clipboard-list mx-2', 'Asistencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `tipopermiso` int(11) NOT NULL,
  `tiposocio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`tipopermiso`, `tiposocio`) VALUES
(1, 'Administrador'),
(2, 'Gerencias'),
(3, 'Comision Deportiva'),
(4, 'Vigilancia'),
(5, 'Consejo Administrativo'),
(6, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `idsocio` int(11) NOT NULL,
  `nombresocio` varchar(150) NOT NULL,
  `apellidosocio` varchar(150) NOT NULL,
  `passw` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`idsocio`, `nombresocio`, `apellidosocio`, `passw`, `correo`, `estado`, `id_permiso`) VALUES
(1, 'armando', 'ibañez', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'armandoibaez820@gmail.com', 1, 1),
(6, 'karen', 'Tobar', '1f707cd9f1548819257c8f0b432af46955e4e351a7a61236388eb5bd27cdba7c', 'kerenobando@hotmail.com', 1, 5),
(12, 'Pedro', 'Monteverde', 'ab2e30bf75636a9c97e05099d9ccc9b623c17a44f629e7ce7206dba683028db1', 'pedro@gmail.com', 0, 4),
(13, 'Daniel', 'Asipuela', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'armandoAsipuela1981@gmail.com', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idticket` int(11) NOT NULL,
  `codigoticket` varchar(100) NOT NULL,
  `idnombresocio` int(11) NOT NULL,
  `apellidosocio` varchar(100) NOT NULL,
  `valor` double NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `fechaticket` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `idubicacion` int(11) NOT NULL,
  `nombreubicacion` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`idubicacion`, `nombreubicacion`, `direccion`) VALUES
(1, 'Mena dos', 'rtrt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idvehiculo` int(11) NOT NULL,
  `num_unidad` varchar(10) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `num_chasis` varchar(20) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `fecha_fabricacion` date NOT NULL,
  `num_habilitacion` varchar(10) NOT NULL,
  `id_socio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`idvehiculo`, `num_unidad`, `placa`, `num_chasis`, `marca`, `fecha_fabricacion`, `num_habilitacion`, `id_socio`) VALUES
(2, '100', 'PCSX100', 'PPRSS', 'CHEVROLET', '2023-03-07', '100', 1),
(3, '101', 'PCBX101', 'EDDSE', 'SUSUKI', '2023-03-20', '101', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistenciasocio`
--
ALTER TABLE `asistenciasocio`
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `idasistencia` (`idasistencia`);

--
-- Indices de la tabla `asistenciaunidad`
--
ALTER TABLE `asistenciaunidad`
  ADD PRIMARY KEY (`idasistenciaunidad`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `nombreid` (`nombreid`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idevento`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`tipopermiso`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`idsocio`),
  ADD KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idticket`),
  ADD KEY `idnombresocio` (`idnombresocio`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`idubicacion`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idvehiculo`),
  ADD KEY `id_socio` (`id_socio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistenciaunidad`
--
ALTER TABLE `asistenciaunidad`
  MODIFY `idasistenciaunidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `tipopermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `idsocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `idubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idvehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistenciasocio`
--
ALTER TABLE `asistenciasocio`
  ADD CONSTRAINT `asistenciasocio_ibfk_1` FOREIGN KEY (`idasistencia`) REFERENCES `socios` (`idsocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistenciasocio_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`idevento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistenciaunidad`
--
ALTER TABLE `asistenciaunidad`
  ADD CONSTRAINT `asistenciaunidad_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`idvehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistenciaunidad_ibfk_2` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`idubicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistenciaunidad_ibfk_3` FOREIGN KEY (`nombreid`) REFERENCES `socios` (`idsocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `socios`
--
ALTER TABLE `socios`
  ADD CONSTRAINT `socios_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`tipopermiso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`idnombresocio`) REFERENCES `socios` (`idsocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socios` (`idsocio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
