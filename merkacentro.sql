-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2020 a las 07:11:35
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `merkacentro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Gaseosas'),
(2, 'Jugos'),
(4, 'Granos'),
(5, 'Jabones'),
(6, 'Aseo Persona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id_domicilio` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `carrito` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `proceso` int(1) NOT NULL,
  `id_responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id_domicilio`, `id_cliente`, `carrito`, `fecha_ini`, `fecha_fin`, `proceso`, `id_responsable`) VALUES
(48, 11, ',*4,Real Oranje,2000,../Productos/../Productos/bv8.png,8,*5,cocola cero en lata,1000,../Productos/../Productos/bv5.png,9', '2020-06-16', '0000-00-00', 2, 34),
(49, 11, ',*6,Arberjas,3000,../Productos/../Productos/9.png,2,*4,Real Oranje,2000,../Productos/../Productos/bv8.png,8,*5,cocola cero en lata,1000,../Productos/../Productos/bv5.png,9', '2020-08-27', '2022-08-27', 3, 34),
(51, 11, ',*1,Cocacola,2300,../Productos/bv6.png,5', '2020-08-27', '0000-00-00', 1, 0),
(52, 11, ',*4,Real Oranje,1400,../Productos/../Productos/bv8.png,2,*1,Cocacola,2300,../Productos/bv6.png,5,*6,Arberjas,3000,../Productos/../Productos/9.png,3', '2020-08-29', '2020-08-29', 3, 34),
(53, 11, ',*4,Real Oranje,1400,../Productos/../Productos/bv8.png,6', '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `nombre`, `correo`, `mensaje`) VALUES
(6, 'sergio', 'sergio@silva', 'hola men');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `identidad` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` bigint(11) NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` int(1) NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `identidad`, `nombre`, `celular`, `correo`, `direccion`, `rol`, `password`) VALUES
(11, 1007273585, 'Juan Ignacio Silva Laguna', 3112119638, 'juan@silva', 'Cll 26 c # 3-36', 1, '$argon2i$v=19$m=65536,t=4,p=1$dS5uWXlqVUVyOXNMb290OA$ajrMm37Iio9TP2UnrfCcELU4EW7Bb4UAftR77+SQaSE'),
(12, 1082925006, 'Yessika Alexandra', 3183607181, 'alexa@silva', 'cll 6 #9', 3, '$argon2i$v=19$m=65536,t=4,p=1$M3lCWFdvOXlIa0laclg5Ug$N6UiCT46jnFTGy51Fso770UCSC8j8o/QxJ3vstH20As'),
(31, 1921, 'nuevo cliente', 212, 'nuevo@nuevo', 'por aca', 1, '$argon2i$v=19$m=65536,t=4,p=1$ZGJJS0NON0RobVBrS0d6cg$cHgRetaMM6JP3O/cSgXQhM66T8RqaK+EYqGIuPpXZZA'),
(32, 91991, 'jorge', 99, 'jorge@a', 'jjsjs', 1, '$argon2i$v=19$m=65536,t=4,p=1$SjVTQTAwN2JQMk5XRmwuUA$dIJmAsY57B6Z6ZhqELQ5pzUaBlWNA2EWE5E2PCP6pTU'),
(33, 898989, 'jues', 121, 'jues@a', 'jaj', 1, '$argon2i$v=19$m=65536,t=4,p=1$REpVS0paNi54VnRyUjRaNg$7EPQ2I4CBi8AQVfM24XYC5iO2PdwoZuWXrmpBufSFAM'),
(34, 123111, 'domiciliario', 999, 'domicilio@entrega', 'cll9', 2, '$argon2i$v=19$m=65536,t=4,p=1$S2hnQ1JlQWVTM2p3aDRoMg$DW25uStSn/bfPek/3SIvLdYzD33n/k/bB8TvWvrWYVw'),
(35, 2398832, 'sergio', 9393, 'sergio@pompo', 'slkdkls0', 2, '$argon2i$v=19$m=65536,t=4,p=1$dDYyM3pVbEpBaFR3dkFiVQ$aLImLKPSibebgBoRtk7zMwq61vssyTrzenqr68TGQ3A'),
(36, 7373737, 'julaintos', 828392, 'rojas@pinilla', 'ss2', 1, '$argon2i$v=19$m=65536,t=4,p=1$SFd0bWRaU0hld1FvYmVSMA$vEH7Oe7iuwF4rwskO+42LXFbbmlIWSWQldt7UxeNcMY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio`, `descuento`, `imagen`, `id_categoria`) VALUES
(1, 'Cocacola', 2300, 0, '../Productos/bv6.png', 1),
(2, 'Tropicana CranDerby', 4200, 0, '../Productos/../Productos/bv3.png', 2),
(4, 'Real Oranje', 2000, 30, '../Productos/../Productos/bv8.png', 2),
(5, 'cocola cero en lata', 1000, 0, '../Productos/../Productos/bv5.png', 1),
(6, 'Arberjas', 3000, 0, '../Productos/../Productos/9.png', 4),
(7, 'Limpido', 4000, 0, '../Productos/../Productos/pf2.png', 5),
(8, 'color', 4000, 10, '../Productos/../Productos/p4.jpg', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id_domicilio`),
  ADD KEY `id_persona` (`id_cliente`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
