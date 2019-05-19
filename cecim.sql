-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2018 a las 05:52:12
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cecim`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fec_nac` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `institucion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vinculacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `asociacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `tipo_documento`, `num_documento`, `fec_nac`, `institucion`, `vinculacion`, `asociacion`, `correo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'C.C:', '23424234', '2018-10-03', 'INS', 'profesor', 'ASO', 'lhpmpc@hotmail.com', '123', '2018-10-13 02:43:28', '2018-10-13 02:43:28'),
(28, 'Jorge', 'C.C:', '23424234', '2018-10-11', 'INS', 'profesor', 'ASO', 'lhpmpc@hotmail.com', '123', '2018-10-13 05:05:30', '2018-10-13 05:05:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `calificacion` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id`, `id_usuario`, `descripcion`, `calificacion`, `created_at`, `updated_at`) VALUES
(1, 1, 'HOLA A TODOS ESTE ES UN TRABAJO', '223344', '2018-10-10 02:23:44', '2018-10-10 07:23:44'),
(2, 2, 'TRABAJO', '', '2018-10-09 00:25:37', '0000-00-00 00:00:00'),
(4, 1, 'trabajo numero', '11145645634563465', '2018-10-10 02:21:02', '2018-10-10 07:21:02'),
(6, 1, 'otro trabajo más', '6655', '2018-10-11 22:43:14', '2018-10-12 03:43:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fec_nac` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `institucion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vinculacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `asociacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `tipo_documento`, `num_documento`, `fec_nac`, `institucion`, `vinculacion`, `asociacion`, `correo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'LUIS PATIÑO MACHADO', 'CC', '098', '16/08/1977', 'INSTITUTO', 'VINCU', 'ASO', 'lhpm16@hotmail.com', '', '2018-10-10 00:28:40', '2018-10-10 05:28:40'),
(2, 'PEDRO GONSALEZ', '', '', '', '', '', '', '', '', '2018-10-06 20:40:43', '2018-10-07 01:40:43'),
(4, 'ALFREDO JIMENES', '', '', '', '', '', '', '', '', '2018-10-07 01:51:10', '2018-10-07 01:51:10'),
(6, 'PEDRO CONTRERAS', '', '', '', '', '', '', '', '', '2018-10-08 00:25:47', '2018-10-08 00:25:47'),
(7, 'OSCAR AGUDELO', 'C.C:', '2134', '2018-10-04', 'INS', 'VIN', 'ASO', 'lhpm16@hotmail.com', '123', '2018-10-08 20:34:42', '2018-10-08 20:34:42'),
(8, 'pedro', 'C.C:', '232323', '2018-10-02', 'ee', 'ee', 'ee', 'ee', '123', '2018-10-08 21:00:11', '2018-10-08 21:00:11'),
(9, 'werwer', 'C.C:', '23424234', '2018-10-01', 'werwer', 'werwer', 'werwer', 'werwer', '123', '2018-10-08 21:01:49', '2018-10-08 21:01:49'),
(10, 'sdfsfwe', 'C.C:', '556546', '2018-10-01', 'INS', 'vin', 'ASO', 'lhpm16@hotmail.com', '123', '2018-10-08 21:06:00', '2018-10-08 21:06:00'),
(11, 'weqeqwe', 'C.C:', '123', '2018-10-01', 'INS', 'VIN', 'ASO', 'lhpm16@hotmail.com', '1234', '2018-10-08 21:20:03', '2018-10-08 21:20:03'),
(12, 'ssww', 'C.E', '23542345', '2018-10-09', 'INS', 'VIN', 'ASO', 'lhpm16@hotmail.com', '123', '2018-10-08 21:21:11', '2018-10-08 21:21:11'),
(13, 'eerr', 'C.C:', '234234', '2018-10-09', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '123', '2018-10-08 21:22:12', '2018-10-08 21:22:12'),
(14, 'werwer', 'C.C:', '123', '2018-10-02', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '123', '2018-10-08 21:25:14', '2018-10-08 21:25:14'),
(15, 'YYUU', 'C.C:', '435642365', '2018-10-03', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '123456', '2018-10-08 21:29:16', '2018-10-08 21:29:16'),
(16, 'qqwweee', 'C.C:', '23424234', '2018-10-02', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '123456', '2018-10-08 21:33:41', '2018-10-08 21:33:41'),
(17, 'WILSON MARQUES', 'C.C:', '23424234', '2018-10-02', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '12345', '2018-10-08 21:35:17', '2018-10-08 21:35:17'),
(18, 'ROBERTO CARDENAS', 'C.C:', '23424234', '2018-10-03', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '123456', '2018-10-08 21:40:26', '2018-10-08 21:40:26'),
(19, 'Orlando', 'C.C:', '23424234', '2018-10-08', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '123456', '2018-10-08 21:41:58', '2018-10-08 21:41:58'),
(20, 'ertewrtewrtewrtewrtwert', 'C.C:', '23424234', '2018-10-11', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '12345', '2018-10-08 21:57:01', '2018-10-08 21:57:01'),
(21, 'sdfsadfsadgfasdfasdfasdfasdfasdf', 'C.C:', '23424234', '2018-10-09', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '12345', '2018-10-08 21:57:26', '2018-10-08 21:57:26'),
(22, 'fdgrsdgrfwgrfwerg', 'C.C:', '23424234', '2018-10-10', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '12345', '2018-10-08 21:57:59', '2018-10-08 21:57:59'),
(23, 'pedro juan', 'C.C:', '555555555555', '2018-10-04', 'INS', 'VIN', 'ASO', 'lhpmpc@hotmail.com', '12345', '2018-10-08 17:24:57', '2018-10-08 22:24:57'),
(24, 'MARIA', 'C.C:', '23424234', '2018-10-02', 'INS', 'ESTUDIANTE', 'ASO', 'lhpmpc@hotmail.com', '123', '2018-10-10 13:45:53', '2018-10-10 18:45:53'),
(29, 'George', 'C.C:', '23424234', '2018-10-09', 'INS', 'estudiante', 'ASO', 'gg@hotmail.com', '1122', '2018-10-13 05:21:39', '2018-10-13 05:21:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `trabajo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
