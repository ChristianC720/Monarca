-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2024 a las 01:01:25
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
-- Base de datos: `monarca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `type_id`, `user_id`, `last_login`, `created_at`, `admin`) VALUES
(1, 1, 7, '2024-07-24 20:41:16', '2024-07-24 20:41:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_productos`
--

CREATE TABLE `categoria_productos` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_orden`
--

CREATE TABLE `detalles_orden` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `payment_id` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pago`
--

CREATE TABLE `detalles_pago` (
  `id` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio_usuarios`
--

CREATE TABLE `directorio_usuarios` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `genre` enum('H','M','NB') NOT NULL,
  `address` varchar(255) NOT NULL,
  `numext` varchar(5) NOT NULL,
  `numint` varchar(5) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `postal_code` varchar(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_productos`
--

CREATE TABLE `inventario_productos` (
  `id` int(10) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_carrito`
--

CREATE TABLE `items_carrito` (
  `id` int(10) NOT NULL,
  `session_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_orden`
--

CREATE TABLE `items_orden` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodopago_usuarios`
--

CREATE TABLE `metodopago_usuarios` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `payment_type` enum('credit','debit','paypal') NOT NULL,
  `provider` varchar(255) NOT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `inventory_id` int(10) DEFAULT NULL,
  `discount_id` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `category_id`, `inventory_id`, `discount_id`, `name`, `description`, `price`) VALUES
(1, NULL, NULL, NULL, 'Mouse1Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(2, NULL, NULL, NULL, 'Mouse2Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(3, NULL, NULL, NULL, 'Mouse3Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(4, NULL, NULL, NULL, 'Mouse4Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(5, NULL, NULL, NULL, 'Mouse5Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(6, NULL, NULL, NULL, 'Mouse6Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(7, NULL, NULL, NULL, 'Mouse7Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(8, NULL, NULL, NULL, 'Mouse8Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(9, NULL, NULL, NULL, 'Mouse9Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(10, NULL, NULL, NULL, 'Mouse10Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(11, NULL, NULL, NULL, 'Mouse11Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(12, NULL, NULL, NULL, 'Mouse12Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(13, NULL, NULL, NULL, 'Mouse13Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(14, NULL, NULL, NULL, 'Mouse14Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(15, NULL, NULL, NULL, 'Mouse15Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(16, NULL, NULL, NULL, 'Mouse16Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(17, NULL, NULL, NULL, 'Mouse17Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(18, NULL, NULL, NULL, 'Mouse18Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(19, NULL, NULL, NULL, 'Mouse19Logitech', 'Mouse para computadora ñejejeje.', 344.00),
(20, NULL, NULL, NULL, 'Mouse20Logitech', 'Mouse para computadora ñejejeje.', 344.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_carrito`
--

CREATE TABLE `sesion_carrito` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_admin`
--

CREATE TABLE `tipo_admin` (
  `id` int(10) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_admin`
--

INSERT INTO `tipo_admin` (`id`, `admin_type`, `permissions`, `created_at`) VALUES
(1, 'Owner', 'Everything', '2024-07-23 18:02:58'),
(2, 'Administrator', 'Products, Discounts', '2024-07-23 18:04:02'),
(3, 'CommonUser', 'OnlyView', '2024-07-24 20:32:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL DEFAULT 3,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `type_id`, `username`, `password`, `first_name`, `last_name`, `telephone`, `created_at`) VALUES
(7, 1, '23393274@utcancun.edu.mx', '$2y$10$c4WNdTC0b0VpNL.LLhAifuvmGwpsyHhEXgcXWFruyA6wUm61HYYc.', 'Christian', 'Coronel', 2147483647, '2024-07-23 14:55:30'),
(10, 3, 'Coronel', '$2y$10$fAjFTrWug9TGYaF8m.EzPueWyryO6zwcT7XqmAre6KtVK11fcMKOC', '', '', 0, '2024-07-28 22:40:25'),
(11, 1, 'admin', '$2y$10$jDHYRR5G3xMBu2xXsk92b.q4DSCgHFkAunqVFm712coYohpvIYTA2', '', '', 0, '2024-07-29 15:24:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_orden`
--
ALTER TABLE `detalles_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indices de la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `directorio_usuarios`
--
ALTER TABLE `directorio_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indices de la tabla `inventario_productos`
--
ALTER TABLE `inventario_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items_carrito`
--
ALTER TABLE `items_carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `items_orden`
--
ALTER TABLE `items_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `metodopago_usuarios`
--
ALTER TABLE `metodopago_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Indices de la tabla `sesion_carrito`
--
ALTER TABLE `sesion_carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `tipo_admin`
--
ALTER TABLE `tipo_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`type_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalles_orden`
--
ALTER TABLE `detalles_orden`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `directorio_usuarios`
--
ALTER TABLE `directorio_usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_productos`
--
ALTER TABLE `inventario_productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items_carrito`
--
ALTER TABLE `items_carrito`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items_orden`
--
ALTER TABLE `items_orden`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodopago_usuarios`
--
ALTER TABLE `metodopago_usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `sesion_carrito`
--
ALTER TABLE `sesion_carrito`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_admin`
--
ALTER TABLE `tipo_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tipo_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administradores_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_orden`
--
ALTER TABLE `detalles_orden`
  ADD CONSTRAINT `detalles_orden_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_orden_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `detalles_pago` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `directorio_usuarios`
--
ALTER TABLE `directorio_usuarios`
  ADD CONSTRAINT `directorio_usuarios_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `items_carrito`
--
ALTER TABLE `items_carrito`
  ADD CONSTRAINT `items_carrito_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sesion_carrito` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `items_carrito_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `items_orden`
--
ALTER TABLE `items_orden`
  ADD CONSTRAINT `items_orden_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `items_orden_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `detalles_orden` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `metodopago_usuarios`
--
ALTER TABLE `metodopago_usuarios`
  ADD CONSTRAINT `metodopago_usuarios_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categoria_productos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `descuentos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`inventory_id`) REFERENCES `inventario_productos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion_carrito`
--
ALTER TABLE `sesion_carrito`
  ADD CONSTRAINT `sesion_carrito_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
