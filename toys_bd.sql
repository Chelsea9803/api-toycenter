-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2021 a las 00:42:59
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `toys_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cli_id` int(11) NOT NULL,
  `cli_nombre` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cli_correo` varchar(50) NOT NULL,
  `cli_apellido` varchar(50) NOT NULL,
  `cli_nit` varchar(30) NOT NULL,
  `cli_std` smallint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_nombre`, `user_id`, `cli_correo`, `cli_apellido`, `cli_nit`, `cli_std`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mariana', 9, 'Vmaria@gmail.com', 'Gutierrez', '1001851382', 1, '2021-07-21 18:11:44', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(3, 'Belinda ', 9, 'BelindaVasquez@gmail.com', 'Vasquez', '1042458763', 1, '2021-07-21 21:50:43', '2021-07-21 21:50:43', '2021-07-20 01:12:41');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `gethome`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `gethome` (
`prd_nombre` varchar(165)
,`ma_nombre` varchar(45)
,`prd_price` decimal(30,2)
,`prd_id` int(11)
,`url_prod` varchar(500)
,`ma_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `ma_id` int(11) NOT NULL,
  `ma_nombre` varchar(45) NOT NULL,
  `ma_active` varchar(10) NOT NULL DEFAULT 'SI',
  `created_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`ma_id`, `ma_nombre`, `ma_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nintendo', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(2, 'Lego', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(3, 'Barbie', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(6, 'Nerf', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(8, 'Fisher Price', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(9, 'Hot Wheels', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(10, 'Lol', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(11, 'Marvel', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(12, 'Ronda', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(13, 'Hasbro Gaming', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(14, 'Toy Story', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(15, 'Play Doh', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(16, 'Polly Pocket', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(17, 'Monopoly', 'SI', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(18, 'Distroller-5', 'SI', '2021-07-20 01:12:41', '2021-07-22 20:42:50', '2021-07-20 01:12:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `prd_id` int(11) NOT NULL,
  `prd_nombre` varchar(165) NOT NULL,
  `prd_cost` decimal(30,2) NOT NULL,
  `prd_price` decimal(30,2) NOT NULL,
  `prd_stock` int(10) NOT NULL,
  `ma_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `url_prod` varchar(500) NOT NULL DEFAULT '',
  `prd_std` smallint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`prd_id`, `prd_nombre`, `prd_cost`, `prd_price`, `prd_stock`, `ma_id`, `pro_id`, `url_prod`, `prd_std`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Set Depredador de Guerra ', '100.00', '259900.00', 8, 2, 1, 'Producto1.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(2, 'Batería Musical ', '500.00', '169900.00', 10, 8, 1, 'Producto7.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(3, 'Lanzador Bowstrike', '8909.00', '49900.00', 10, 6, 1, 'Producto6.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(4, 'Set Batalla contra Molten Man', '500.00', '209900.00', 3, 2, 1, 'Producto2.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(5, 'Set Celebración Real ', '630.00', '269900.00', 1, 2, 1, 'Producto3.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(6, 'Batirreactor de Batgirl', '893.00', '163900.00', 1000, 2, 1, 'Producto5.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(7, 'Mini Figura Sorpresa Batman', '790.00', '15900.00', 1000, 2, 1, 'Producto4.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(8, 'Set Patrulla Policía Lego', '678.00', '64900.00', 1000, 2, 1, 'Imagen12.jpeg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(9, 'Bloques Gran Zona Juego', '8909.00', '269900.00', 1000, 2, 1, 'Imagen11.jpeg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(10, 'Convertible de Barbie', '10000.00', '109900.00', 1000, 3, 1, 'Producto8.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(11, 'Pista Laboratorio Científico', '10000.00', '174900.00', 92, 9, 1, 'Producto9.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(12, 'Lanzador Rival Helio XVIII-700', '10000.00', '199900.00', 1000, 6, 1, 'Producto10.jpg', 1, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(19, 'PRUEBA 3 :)', '51000.00', '12000.00', 92, 2, 1, 'Image3.jpg', 1, '2021-07-21 21:29:52', '2021-07-21 21:29:52', '2021-07-20 01:12:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_ventas`
--

CREATE TABLE `products_ventas` (
  `products_prd_id` int(10) NOT NULL,
  `ventas_ven_id` int(10) NOT NULL,
  `venta_tipo` varchar(30) NOT NULL,
  `pv_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `pro_id` int(11) NOT NULL,
  `pro_nit` varchar(30) NOT NULL,
  `pro_nombre` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`pro_id`, `pro_nit`, `pro_nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '12345658', 'LEGOS', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(4, '304 5743562', 'Mi pequeño artista', '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2021-07-13 20:17:13',
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-13 20:17:13',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ADMIN', '2021-07-13 20:17:13', '2021-07-21 21:45:15', '2021-07-20 01:12:41'),
(2, 'USER', '2021-07-13 20:17:13', '2021-07-21 21:44:08', '2021-07-20 01:12:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_nombre` varchar(200) NOT NULL,
  `user_email` varchar(165) DEFAULT NULL,
  `user_pass` varchar(200) NOT NULL,
  `rol_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2021-07-13 20:17:13',
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-13 20:17:13',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-13 20:17:13'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_nombre`, `user_email`, `user_pass`, `rol_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Chelsea Gutierrez', 'macheste9803@gmail.com', '$2y$10$KHYh5/XXQjNob5dVqkHVYOJ6LeeE9XZfwiZbziC4Opn0gfwftKyyy', 1, '2021-07-20 00:50:59', '2021-07-20 00:50:59', '2021-07-13 20:17:13'),
(13, 'Cheyenne Escalante', 'cheyegabi@gmail.com', '$2y$10$RYzuhKrwvbVR56zhMnvYw.C/lMKGV.mffOe7oA.wG2Tc.HT2z5uDC', 1, '2021-07-20 00:56:04', '2021-07-20 00:56:04', '2021-07-13 20:17:13'),
(16, 'PRUEBA3', 'PRUEBA3@gmail.com', '$2y$10$okiODAAQRJF6RPvbSzqG3uTFHdwFioJpyP3YIORQ13y0AnIsrcoK.', 1, '2021-07-21 21:56:37', '2021-07-21 21:56:37', '2021-07-13 20:17:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ven_id` int(10) NOT NULL,
  `ven_factura` varchar(45) NOT NULL,
  `ven_valor` varchar(45) DEFAULT NULL,
  `ven_cant` int(10) NOT NULL DEFAULT 1,
  `cli_id` int(10) NOT NULL,
  `ven_tipo` varchar(30) NOT NULL,
  `id_user` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-20 01:12:41'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ven_id`, `ven_factura`, `ven_valor`, `ven_cant`, `cli_id`, `ven_tipo`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '12356', '100', 1, 2, 'Contado', 9, '2021-07-22 02:17:07', '2021-07-22 02:17:07', '2021-07-22 02:17:07'),
(3, '5000056', '300000', 1, 3, 'Contado', 9, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41'),
(4, '500001', '30000', 1, 3, 'Contado', 16, '2021-07-20 01:12:41', '2021-07-20 01:12:41', '2021-07-20 01:12:41');

-- --------------------------------------------------------

--
-- Estructura para la vista `gethome`
--
DROP TABLE IF EXISTS `gethome`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gethome`  AS SELECT `p`.`prd_nombre` AS `prd_nombre`, `m`.`ma_nombre` AS `ma_nombre`, `p`.`prd_price` AS `prd_price`, `p`.`prd_id` AS `prd_id`, `p`.`url_prod` AS `url_prod`, `p`.`ma_id` AS `ma_id` FROM ((`products` `p` join `proveedores` `pr` on(`pr`.`pro_id` = `p`.`pro_id`)) join `marcas` `m` on(`m`.`ma_id` = `p`.`ma_id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cli_id`),
  ADD UNIQUE KEY `cli_nit` (`cli_nit`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`ma_id`),
  ADD UNIQUE KEY `ma_nombre` (`ma_nombre`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`),
  ADD UNIQUE KEY `prd_nombre` (`prd_nombre`),
  ADD KEY `ma_id` (`ma_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `products_ventas`
--
ALTER TABLE `products_ventas`
  ADD PRIMARY KEY (`products_prd_id`,`ventas_ven_id`,`venta_tipo`),
  ADD KEY `ventas_ven_id` (`ventas_ven_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `pro_nit` (`pro_nit`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ven_id`,`ven_factura`,`ven_tipo`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `ven_factura` (`ven_factura`),
  ADD KEY `ven_tipo` (`ven_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `ma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ven_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ma_id`) REFERENCES `marcas` (`ma_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `proveedores` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products_ventas`
--
ALTER TABLE `products_ventas`
  ADD CONSTRAINT `products_ventas_ibfk_1` FOREIGN KEY (`ventas_ven_id`) REFERENCES `ventas` (`ven_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ventas_ibfk_2` FOREIGN KEY (`products_prd_id`) REFERENCES `products` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
