-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 17:38:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea_practica_3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `comentario`, `fecha`) VALUES
(1, 'freddy garcia', 'prueba de comentario', '2023-11-14 21:24:27'),
(2, 'rose', 'prueba comentario 2', '2023-11-14 21:35:27'),
(3, 'a', 'a', '2023-11-14 21:36:40'),
(4, 'Marlene', 'hola mundo prueba 3', '2023-11-14 21:46:50'),
(5, 'JONATHAN', 'HOLA MUNDO PRUEBA JONATHAN', '2023-11-15 01:56:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`) VALUES
(1, 'Computadora', 19.99, 'Combo de computadora mas teclado y mouse'),
(2, 'Laptop Asus', 29.99, 'Laptop última generación'),
(3, 'Celular S23 ultra', 39.99, 'Celular de gama alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_login`
--

CREATE TABLE `usuarios_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios_login`
--

INSERT INTO `usuarios_login` (`id`, `username`, `password`) VALUES
(1, 'freddy', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_reg`
--

CREATE TABLE `usuarios_reg` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios_reg`
--

INSERT INTO `usuarios_reg` (`id`, `nombre`, `email`, `contrasena`) VALUES
(1, 'freddy', 'freddygarcian94@gmail.com', '$2y$10$4XrNU3HbyWlzNsJTrX9BY.70Oa.8o/SW.ZaJ1wGN5TCsL2kqAWmLu'),
(2, 'rosa', 'freddygarcian94@gmail.com', '$2y$10$K.EyybtHiZIJGMJ5lXwppOq3dzcnwK65v9HkELvc.mPbIA5cUXGqq'),
(3, 'diego', 'diego@gmail.com', '$2y$10$xJ6Li6IXQEa0wk7qJLpGMetxgvS28yoq/d55JIDhNU50S05oeHFs.'),
(4, 'nicolas', 'nicolas@gmail.com', '$2y$10$kCcZZ899faWnylCuDy9I9.jgV48T9Y8B07FhcbEfLIZiw40sLwLOm'),
(5, 'marlene', 'marlene@gmail.com', '$2y$10$gVT29grUHV8A7Yu.Pb8pwuuFC3sCEC9sHHnRCjcLBzIgSaUOrdPWK'),
(6, 'JONATHAN', 'JGARCIA@GAIL.COM', '$2y$10$dUVf09NVwTHXTAvRJVuzQeBg84lFIqnIH.2AEka2IfjBpFkQaNtPO'),
(7, 'freddy', 'freddygarcian94@gmail.com', '$2y$10$vv/VlOj7Yh7CYQIDy1CyG.u7t1FzQ.ao5uF36WhmAdDtFiUFa/z7G'),
(8, 'Cesar', 'ccoronel@gmail.com', '$2y$10$eNxfinDGZzpVlUGWiVNSO.r/eb9LOpJN7AyBYYWHvkYoU7seQc.zW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_login`
--
ALTER TABLE `usuarios_login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_reg`
--
ALTER TABLE `usuarios_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios_login`
--
ALTER TABLE `usuarios_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_reg`
--
ALTER TABLE `usuarios_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
