-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2025 a las 03:28:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_crud_pdo`
--
CREATE DATABASE IF NOT EXISTS `db_crud_pdo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_crud_pdo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `descripcion` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id`, `marca`, `modelo`, `anio`, `precio`, `descripcion`, `imagen`) VALUES
('23', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg'),
('22', 'ford', 'mustang', 2020, 111111111, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://cdn.motor1.com/images/mgl/9mZpXv/s1/2020-2022-ford-mustang-shelby-gt500kr.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` varchar(100) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `usuario_id` varchar(100) DEFAULT NULL,
  `tarjeta` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `marca`, `modelo`, `anio`, `precio`, `descripcion`, `imagen`, `usuario_id`, `tarjeta`) VALUES
('66be09df7b68d', 'toyota', 'AE86', 1983, 150000, 'unico dueño solo conocedores', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9Yd3wJxp6j4-BhN2Pu0XGOVA8tMwLV0xcMQ&s', NULL, ''),
('66be0d2304430', 'toyota', 'AE86', 1983, 150000, 'unico dueño solo conocedores', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9Yd3wJxp6j4-BhN2Pu0XGOVA8tMwLV0xcMQ&s', NULL, ''),
('66be21c1a24dd', 'toyota', 'AE86', 1986, 123444, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd2fzTAY2mDm3DAdPXlW7W-GH4vLaeT3bm3A&s', NULL, ''),
('66be227923157', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66be28064d705', 'toyota', 'AE86', 1986, 123444, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd2fzTAY2mDm3DAdPXlW7W-GH4vLaeT3bm3A&s', NULL, ''),
('66be31d3f335d', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66be33da4cc4e', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66bf788b62184', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66bf78ab956da', 'Nissan', '350Z', 2006, 350000, 'cuenta con modificaciones en el exterior y en el interior cuenta con body kit y un kit de Twin turbo', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRulmXsnKG3SQWSA9O2gNo7BkVTdDwzA-gYA&s', NULL, ''),
('66bf78ca017ec', 'Nissan', '350Z', 2006, 350000, 'cuenta con modificaciones en el exterior y en el interior cuenta con body kit y un kit de Twin turbo', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRulmXsnKG3SQWSA9O2gNo7BkVTdDwzA-gYA&s', NULL, ''),
('66bf792651425', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66c3cfffa719f', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66c3d3f52d94f', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '111111'),
('66c3d500b9ba4', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '111111'),
('66c3d50b72fe4', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c3d6a205445', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c3d6b129145', 'Nissan', '350Z', 2006, 350000, 'cuenta con modificaciones en el exterior y en el interior cuenta con body kit y un kit de Twin turbo', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRulmXsnKG3SQWSA9O2gNo7BkVTdDwzA-gYA&s', NULL, '1234'),
('66c3d767a9246', 'Nissan', '240sx', 1995, 125000, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico due', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c3da44a98e4', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66c3db8bce328', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c3dd58bd389', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66c3dd72c262f', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66c3dda0e29d1', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66c3dff489c44', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, ''),
('66c407a4338b9', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c40816d28c1', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c40878a4146', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c4091bcc0a3', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c409439f5eb', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c409a853058', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c40a032b191', 'Nissan', '240sx', 1995, 12222, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://c4.wallpaperflare.com/wallpaper/390/804/856/240sx-cars-coupe-japan-wallpaper-preview.jpg', NULL, '1234'),
('66c40b816e1d1', 'ford', 'mustang', 2020, 111111111, 'el carro cuenta con varias modificaciones en el exterior como en el motor todo le funciona unico dueño', 'https://cdn.motor1.com/images/mgl/9mZpXv/s1/2020-2022-ford-mustang-shelby-gt500kr.jpg', NULL, '23456780');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `correo`, `mensaje`, `fecha`) VALUES
(1, 'Carlos Misael ', 'carlos@gmail.com', 'dnfbpienvirgn óidmÉRIMF', '2024-08-16 16:08:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_financiamiento`
--

CREATE TABLE `solicitudes_financiamiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ingresos` varchar(255) NOT NULL,
  `vehiculo` varchar(255) NOT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes_financiamiento`
--

INSERT INTO `solicitudes_financiamiento` (`id`, `nombre`, `correo`, `telefono`, `ingresos`, `vehiculo`, `fecha_solicitud`) VALUES
(1, 'Paco', 'carlos@gmail.com', '4444444', '12345', 'nissan 240sx', '2024-08-15 19:50:42'),
(2, 'Carlos Misael ', 'carlos3@gmail.com', '12345', '80000', 'mustang', '2024-08-16 16:07:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
('100', 'manuel', 'manuel@gmail.com', '1234'),
('132', 'Carlos Misael ', 'carlos@gmail.com', '1234'),
('22', 'Paco', 'gol@gmail.com', '1234'),
('23', 'Paco', 'w@gmail.com', '1234'),
('44', 'jorge', 'Ajorge@gmailcom', '1234'),
('45', 'pedro', 'pedro@gmail.com', '1234'),
('67', 'Jose', 'jose@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes_financiamiento`
--
ALTER TABLE `solicitudes_financiamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitudes_financiamiento`
--
ALTER TABLE `solicitudes_financiamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
