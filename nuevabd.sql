-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2023 a las 17:08:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
  `codigoAsistencia` int(11) NOT NULL,
  `idasistencia` int(11) NOT NULL,
  `apellidosocio` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha_asist` date NOT NULL,
  `monto_multa` double NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistenciasocio`
--

INSERT INTO `asistenciasocio` (`codigoAsistencia`, `idasistencia`, `apellidosocio`, `estado`, `fecha_asist`, `monto_multa`, `id_evento`) VALUES
(20, 1, 'ibañez', 'Falta', '2023-08-26', 20, 4);

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
-- Estructura de tabla para la tabla `detalle_permisos`
--

CREATE TABLE `detalle_permisos` (
  `id` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_permisos`
--

INSERT INTO `detalle_permisos` (`id`, `id_socio`, `id_permiso`) VALUES
(15, 15, 2),
(16, 15, 3),
(17, 15, 4),
(18, 12, 2),
(32, 1, 1),
(33, 1, 2),
(34, 1, 3),
(35, 1, 4),
(36, 1, 5),
(37, 1, 6),
(41, 6, 3);

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
(4, 'Asamblea general', 'asuntos varios', '2023-01-30', '05:05:00', '1. no nada'),
(5, 'REUNION DEL MES', 'listad', '2023-07-05', '13:39:00', 'sdsd'),
(6, 'mes de abril', 'dfdf', '2023-07-06', '16:44:00', 'dfdf'),
(7, 'REUNION DEL MES MAYO', 'REUNION', '2023-07-19', '17:47:00', '1.- LISTADO GENERAL'),
(8, 'PLAN DEL MSES', 'DFF', '2023-07-06', '15:52:00', 'DFDF'),
(10, 'Mañana Deportiva', 'compañerismo', '2023-07-29', '10:00:00', '1.- Tomar lista\r<br>2.- reunion de equipos'),
(12, 'ASAMBLEA SEPTIEMBRE', 'TODOS ASISTEN', '2023-08-17', '20:40:00', '1.- TOMAR ASISTENCIA SOCIOS');

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
(4, 'Asistencia', 'fas fa-clipboard-list mx-2', 'Asistencia', 1),
(6, 'Evento', 'fa fa-calendar mx-2', 'Evento', 1),
(7, 'Ticket', 'fa fa-ticket mx-2', 'Ticket', 1),
(8, 'Multa', 'fa fa-sticky-note mx-2', 'Multa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` int(11) NOT NULL,
  `permiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `permiso`) VALUES
(1, 'socios'),
(2, 'vehiculos'),
(3, 'asistencia'),
(4, 'evento'),
(5, 'ticket'),
(6, 'multa'),
(7, 'roles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `tipopermiso` int(11) NOT NULL,
  `tiposocio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`tipopermiso`, `tiposocio`) VALUES
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
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `passw` varchar(100) NOT NULL,
  `cedula` varchar(13) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`idsocio`, `nombresocio`, `apellidosocio`, `direccion`, `telefono`, `passw`, `cedula`, `correo`, `estado`, `id_permiso`) VALUES
(1, 'armando', 'ibañez', '', '', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '', 'armandoibaez820@gmail.com', 1, 1),
(6, 'karen', 'Tobar', 'wewewe', '54124756', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '171456', 'kerenobando@hotmail.com', 1, 5),
(12, 'Pedro', 'Monteverde', '', '', 'a976270e7922fceaf8deaed98809e1c4f63c0898e5119a82f45d9f3be1226b23', '', 'pedro@gmail.com', 0, 4),
(13, 'Daniel', 'Asipuela', 'Av. Universitaria', '3102390', '06f67fd63dd76fa88393c7c2b35416a5778f7ea1b9165bc20b7d09be65adb8af', '', 'armandoAsipuela1981@gmail.com', 1, 6),
(15, 'Paulina', 'Rubio', '', '', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 'paulinarubio@hotmail.com', 0, 6),
(19, 'santiago', 'tinpatuña', 'sfdf', '2134534234', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2323453453', 'santiago@hotmail.com', 1, 6),
(20, 'Jaime', 'Learner', 'Av. de La prensa', '345234325', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '1734332456', 'jaimelearner@gmail.es', 0, 6),
(21, 'Pablo', 'piña', 'san andres', '345623434', '756bc47cb5215dc3329ca7e1f7be33a2dad68990bb94b76d90aa07f4e44a233a', '1234567893', 'pablo@yahoo.com', 1, 6),
(22, 'Guillermo', 'Cauga', 'CHilibulo', '098753623', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '12223244567', 'guillermopat0021@gmail.com', 1, 6),
(23, 'Carlos', 'Segovia', 'LOS PARAMOS', '231234321', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1234567890', 'carlossegovia@hotmail.es', 1, 4),
(28, 'sddfdf', 'erer', 'solanda', '3215878', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1250178637', 'angel@gmail.com', 1, 6);

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

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idticket`, `codigoticket`, `idnombresocio`, `apellidosocio`, `valor`, `detalle`, `fechaticket`) VALUES
(1, '1', 6, 'Tobar', 20, 'pago mensual', '2023-08-13'),
(2, ' 2', 1, 'ibañez', 20, 'pago mensual', '2023-08-13'),
(3, ' 3', 15, 'Rubio', 20, 'pago de mes de agosto', '2023-08-14'),
(4, ' 4', 19, 'tinpatuña', 20, 'hhh', '2023-08-12'),
(5, ' 5', 22, 'Cauga', 22, 'pago del mes', '2023-08-17');

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
  ADD PRIMARY KEY (`codigoAsistencia`),
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
-- Indices de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT de la tabla `asistenciasocio`
--
ALTER TABLE `asistenciasocio`
  MODIFY `codigoAsistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `asistenciaunidad`
--
ALTER TABLE `asistenciaunidad`
  MODIFY `idasistenciaunidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `tipopermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `idsocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `socios_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `roles` (`tipopermiso`) ON DELETE CASCADE ON UPDATE CASCADE;

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
