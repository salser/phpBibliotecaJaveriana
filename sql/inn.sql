-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2018 a las 01:26:57
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `disponibles` int(11) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `disponibles`, `imagen`) VALUES
(1, 'Razer Blade ', 2, 'razerblade.jpg'),
(2, 'NVIDIA GTX 1080', 0, 'gtx1080.jpg'),
(3, 'AMD Radeon RX480', 2, 'rx480.jpg'),
(4, 'Rasdas', 2, NULL),
(5, 'Rasdas', 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_solicitudes`
--

CREATE TABLE `equipos_solicitudes` (
  `equipo_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `aprobado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos_solicitudes`
--

INSERT INTO `equipos_solicitudes` (`equipo_id`, `usuario_id`, `aprobado`) VALUES
(1, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `lugar` varchar(256) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `lugar`, `fechaInicio`, `fechaFin`, `nombre`) VALUES
(3, 'Salón Biblioteca', '2018-05-16 08:00:00', '2018-05-16 10:00:00', 'Cine\r\n'),
(4, 'Barón', '2018-05-19 14:00:00', '2018-05-19 15:00:00', 'Clase'),
(5, 'Giraldo', '2018-05-30 11:00:00', '2018-05-30 15:00:00', 'Teatro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventosxusuario`
--

CREATE TABLE `eventosxusuario` (
  `id` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `mail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `autor` varchar(150) DEFAULT NULL,
  `edicion` varchar(150) DEFAULT NULL,
  `editorial` varchar(150) DEFAULT NULL,
  `paginas` varchar(150) DEFAULT NULL,
  `isbn` varchar(150) DEFAULT NULL,
  `copias` int(11) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `edicion`, `editorial`, `paginas`, `isbn`, `copias`, `imagen`) VALUES
(1, 'Harry Potter y la piedra filosofal', 'JK Rowling', '1', 'HP', '352', '31872312-312321-', 50, 'harrypotter.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_solicitudes`
--

CREATE TABLE `libros_solicitudes` (
  `id` int(11) NOT NULL,
  `libroid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `fechainicio` varchar(255) DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `reportecada` int(11) DEFAULT NULL,
  `aprobado` int(11) DEFAULT NULL,
  `lastemail_timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros_solicitudes`
--

INSERT INTO `libros_solicitudes` (`id`, `libroid`, `userid`, `fechainicio`, `tiempo`, `reportecada`, `aprobado`, `lastemail_timestamp`) VALUES
(9, 1, 1, '1527892519', 1527899719, 60, 1, 1527895450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id`, `nombre`) VALUES
(1, 'Sala A'),
(2, 'Sala B'),
(3, 'Sala C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas_solicitudes`
--

CREATE TABLE `salas_solicitudes` (
  `id` int(11) NOT NULL,
  `salaid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL,
  `aprobado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salas_solicitudes`
--

INSERT INTO `salas_solicitudes` (`id`, `salaid`, `userid`, `dia`, `hora`, `aprobado`) VALUES
(13, 2, 1, 20, 0, 1),
(17, 1, 1, 1, 19, 1),
(18, 2, 1, 1, 0, 1),
(19, 1, 1, 1, 0, 1),
(20, 1, 1, 1, 0, 1),
(21, 1, 1, 1, 18, 1),
(22, 2, 1, 1, 18, 1),
(23, 2, 1, 18, 0, 1),
(24, 1, 1, 12, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`, `rank`) VALUES
(1, 'Jose', '123456', 'joserafaeldn@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos_solicitudes`
--
ALTER TABLE `equipos_solicitudes`
  ADD PRIMARY KEY (`equipo_id`,`usuario_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventosxusuario`
--
ALTER TABLE `eventosxusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros_solicitudes`
--
ALTER TABLE `libros_solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas_solicitudes`
--
ALTER TABLE `salas_solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD UNIQUE KEY `id_3` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventosxusuario`
--
ALTER TABLE `eventosxusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros_solicitudes`
--
ALTER TABLE `libros_solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salas_solicitudes`
--
ALTER TABLE `salas_solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
