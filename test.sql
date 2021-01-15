-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2021 a las 18:28:21
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `girltore_carrito`
--

CREATE TABLE `girltore_carrito` (
  `id_fila` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED DEFAULT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `preu` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `autor` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `editorial` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `publicacion` date NOT NULL,
  `paginas` int(4) NOT NULL,
  `edicion` int(2) NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`titulo`, `autor`, `genero`, `editorial`, `precio`, `publicacion`, `paginas`, `edicion`, `tipo`, `id`) VALUES
('Perfectos Mentirosos', 'Alex Mirez', 'Romance', 'Penguin Random House', '17.50', '2020-09-17', 336, 1, 'Tapa Blanda', 1),
('Tampoco pido tanto', 'Megan Maxwell', 'Eroticos', 'Edebé', '8.95', '2019-10-29', 560, 1, 'Bolsillo', 2),
('La promesa de Julia', 'Blue Jeans', 'Otros', 'Alfaguara', '18.90', '2020-05-26', 544, 2, 'Tapa Dura', 3),
('Heartstopper 1. Dos chicos juntos', 'Alice Oseman', 'Romance', 'Salamandra', '15.95', '2018-06-15', 288, 1, 'Tapa Dura', 4),
('La mala leche', 'Henar Álvarez', 'Humor', 'Planeta', '15.90', '2021-01-06', 144, 1, 'Bolsillo', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(2) NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nickname` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `passwd` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `passwd1` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `edad`, `correo`, `nickname`, `passwd`, `apellidos`, `telefono`, `passwd1`, `usuario`) VALUES
(1, '47904886A', 'Aida', 23, 'aida@gmail.com', 'Girltore', '$2y$10$4KeIa.s.', 'Jesus', 123123123, '123123123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `girltore_carrito`
--
ALTER TABLE `girltore_carrito`
  ADD PRIMARY KEY (`id_fila`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `girltore_carrito`
--
ALTER TABLE `girltore_carrito`
  MODIFY `id_fila` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `girltore_carrito`
--
ALTER TABLE `girltore_carrito`
  ADD CONSTRAINT `girltore_carrito_ibfk_1` FOREIGN KEY (`id`) REFERENCES `libros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
