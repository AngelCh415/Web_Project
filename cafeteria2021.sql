-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2021 a las 19:25:09
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_pedido` int(10) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `cantidad` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_producto` int(5) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `existencia` int(5) NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `auditoria` datetime DEFAULT NULL,
  `categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_producto`, `nombre`, `descripcion`, `existencia`, `precio`, `imagen`, `auditoria`, `categoria`) VALUES
(1, 'Espresso', '60ml de espresso. Dulce con un acidez ligero', 0, 40, NULL, '2021-06-15 11:31:54', 'Café'),
(2, 'Cortado', 'Espresso con leche texturizada 180ml', 0, 48, NULL, '2021-06-15 11:31:54', 'Café'),
(3, 'CHIQUITITO', 'Leche condensada, espresso y leche texturizada 240ml', 0, 50, NULL, '2021-06-15 11:31:54', 'Café'),
(4, 'Americano', 'Espresso con agua caliente 360ml', 0, 48, NULL, '2021-06-15 11:33:30', 'Café'),
(5, 'Cappuccino', 'Espreso con leche texturizada', 0, 55, NULL, '2021-06-15 11:37:47', 'Café'),
(6, 'Latte', 'Espresso con leche texturizada 480ml', 0, 58, NULL, '2021-06-15 11:37:47', 'Café'),
(7, 'Café con leche', 'Espresso con agua caliente, y leche texturizada 480ml', 0, 55, NULL, '2021-06-15 11:37:47', 'Café'),
(8, 'Latte Vainilla', 'Espresso, vainilla y leche texturizada 480ml', 0, 60, NULL, '2021-06-15 11:37:47', 'Café'),
(9, 'Mocha', 'Espresso, chocolate y leche texturizada 480ml', 0, 60, NULL, '2021-06-15 11:37:47', 'Café'),
(10, 'Latte Caramelo', 'Espresso, caramelo y leche texturizada 480ml', 0, 60, NULL, '2021-06-15 11:37:47', 'Café'),
(11, 'Matcha Latte Puro', 'Matcha latte hecho con matcha puro 480ml', 0, 65, NULL, '2021-06-15 11:41:45', 'Bebidas Calientes'),
(12, 'Matcha Latte Dulce', 'Matcha latte hecho con matcha poquito endulzado 480ml', 0, 65, NULL, '2021-06-15 11:41:46', 'Bebidas Calientes'),
(13, 'Doradita', 'Bebida con mezcla de especias con base en curcuma 360ml', 0, 60, NULL, '2021-06-15 11:41:46', 'Bebidas Calientes'),
(14, 'Betabel Latte', 'Bebida con mezcla de especias con base de betabel 360ml', 0, 60, NULL, '2021-06-15 11:41:46', 'Bebidas Calientes'),
(15, 'Té', 'Escoges el tipo de té', 0, 50, NULL, '2021-06-15 11:41:46', 'Bebidas Calientes'),
(16, 'Chocolate Caliente', 'Chocolate estilo oaxaqueno con leche texturizada 480ml', 0, 60, NULL, '2021-06-15 11:41:46', 'Bebidas Calientes'),
(17, 'Chai Dulce', 'Base de chai poco endulzado con leche texturizada 480ml', 0, 65, NULL, '2021-06-15 11:44:39', 'Bebidas Calientes'),
(18, 'Chai Masala', 'Chai natural de especies 360ml', 0, 55, NULL, '2021-06-15 11:44:39', 'Bebidas Calientes'),
(19, 'Chai Espresso', 'Base de chai poco endulzado, leche texturizada y espresso 480ml', 0, 70, NULL, '2021-06-15 11:44:39', 'Bebidas Calientes'),
(20, 'Babyccino', 'Leche texturizada con sabor a tu elección 240ml', 0, 40, NULL, '2021-06-15 11:44:39', 'Bebidas Calientes'),
(21, 'Aeropress', 'Café hecho en manera artesanal en el Aeropress 300ml', 0, 50, NULL, '2021-06-15 11:47:43', 'Métodos Artesanales'),
(22, 'Chemex', 'Café hecho en manera artesanal en el Chemex 300ml', 0, 50, NULL, '2021-06-15 11:47:44', 'Métodos Artesanales'),
(23, 'Prensa Francesa', 'Café hecho en manera artesanal en el Prensa Francesa 300ml', 0, 50, NULL, '2021-06-15 11:47:44', 'Métodos Artesanales'),
(24, 'Pour Over V60', 'Café hecho en manera artesanal en el Hario v60 300ml', 0, 50, NULL, '2021-06-15 11:47:44', 'Métodos Artesanales'),
(25, 'Cold Brew', 'Extracción en frío de cafpe, el extracto mezclado con agua 480ml', 0, 50, NULL, '2021-06-15 11:53:54', 'Bebidas Frías'),
(26, 'Botella Cold Brew', 'Extracto puro de café 250ml', 0, 150, NULL, '2021-06-15 11:53:54', 'Bebidas Frías'),
(27, 'Espresso Tonic', 'Extracto puro de café 250ml', 0, 65, NULL, '2021-06-15 11:53:54', 'Bebidas Frías'),
(28, 'Latte Frío en Botella', 'Latte frío en botella para tomar en casa con gusto 500ml', 0, 90, NULL, '2021-06-15 11:53:55', 'Bebidas Frías'),
(29, 'Chocolate Frío', 'Chocolate estilo oaxacaqueno con leche fría 480ml', 0, 60, NULL, '2021-06-15 11:53:55', 'Bebidas Frías'),
(30, 'Latte Frío', 'Latte hecho con espresso o cold brew con leche 480ml', 0, 58, NULL, '2021-06-15 11:53:55', 'Bebidas Frías'),
(31, 'Chai Dulce Frío', 'Base de Chai poco endulzado con leche fría 480ml', 0, 65, NULL, '2021-06-15 11:53:55', 'Bebidas Frías'),
(32, 'Chai Masala Latte Frío', 'Chai natural de especies 480ml', 0, 60, NULL, '2021-06-15 11:53:55', 'Bebidas Frías'),
(33, 'Matcha Frío', 'Matcha latte hecho con matcha poquito endulzado 480ml', 0, 65, NULL, '2021-06-15 11:53:55', 'Bebidas Frías'),
(34, 'Frappé Cappuccino', 'Base frappé café con espresso, leche y hielos 480ml', 0, 70, NULL, '2021-06-15 11:56:24', 'Bebidas Frías'),
(35, 'Frappé Chai', 'Base frappé chai con leche y hielos 480ml', 0, 70, NULL, '2021-06-15 11:56:24', 'Bebidas Frías'),
(36, 'Frappé Matcha', 'Base frappé matcha con leche y hielos', 0, 70, NULL, '2021-06-15 11:56:24', 'Bebidas Frías'),
(37, 'Topo Chico', 'Topo Chico Mineral 355ml', 0, 35, NULL, '2021-06-15 11:56:24', 'Bebidas Frías'),
(38, 'Dominga Kombucha', '-', 0, 105, NULL, '2021-06-15 11:56:24', 'Bebidas Frías'),
(39, 'Pudín de Chía', 'Pudín de chía con leche de coco, toque de miel y frutos rojos', 0, 60, NULL, '2021-06-15 11:59:51', 'Postres'),
(40, 'Yoghurt Orgánico con Granola', 'Yoghurt orgánico, frutos rojos y granola de la casa', 0, 55, NULL, '2021-06-15 11:59:51', 'Postres'),
(41, 'Arroz con 3 Leches', 'Arroz con 3 Leches', 0, 55, NULL, '2021-06-15 11:59:51', 'Postres'),
(42, 'Gelatina de Queso', 'Gelatina de Queso', 0, 50, NULL, '2021-06-15 11:59:51', 'Postres'),
(43, 'Pay de Limón con Merengue', 'Pay de limón con merengue', 0, 55, NULL, '2021-06-15 11:59:51', 'Postres'),
(44, 'Gajos de Toronja', '-', 0, 54, NULL, '2021-06-15 11:59:52', 'Postres'),
(45, 'Panqué de Plátano Rebanada', 'Panqué de Plátano Rebanada', 0, 45, NULL, '2021-06-15 12:05:58', 'Panqués/Galletas/Scones'),
(46, 'Panqué de Matcha Rebanada', 'Panqué de Matcha Rebanada', 0, 55, NULL, '2021-06-15 12:05:58', 'Panqués/Galletas/Scones'),
(47, 'Panqué de Nata Rebanada', 'Panqué de Nata Rebanada', 0, 45, NULL, '2021-06-15 12:05:58', 'Panqués/Galletas/Scones'),
(48, 'Panqué de yoghurt, limón y cardamomo rebanada', 'Panqué de yoghurt, limón y cardamomo rebanada', 0, 45, NULL, '2021-06-15 12:05:58', 'Panqués/Galletas/Scones'),
(49, 'Panqué de Plátano Completa', 'Panqué de Plátano Completa-Pedir con un día de anticipación', 0, 270, NULL, '2021-06-15 12:05:58', 'Panqués/Galletas/Scones'),
(50, 'Panqué de Matcha Completa', 'Panqué de Matcha Completa-Pedir con un día de anticipación', 0, 300, NULL, '2021-06-15 12:05:59', 'Panqués/Galletas/Scones'),
(51, 'Panqué de Nata Completa', 'Panqué de Nata Completa-Pedir con un día de anticipación', 0, 270, NULL, '2021-06-15 12:05:59', 'Panqués/Galletas/Scones'),
(52, 'Panqué de yoghurt, limón y cardamomo completa', 'Panqué de yoghurt, limón y cardamomo completa-Pedir con un día de anticipación', 0, 270, NULL, '2021-06-15 12:05:59', 'Panqués/Galletas/Scones'),
(53, 'Galleta Chispas de Chocolate', 'Galleta Chispas de Chocolate', 0, 30, NULL, '2021-06-15 12:09:12', 'Panqués/Galletas/Scones'),
(54, 'Galleta de Avena', 'Galleta de Avena', 0, 25, NULL, '2021-06-15 12:09:13', 'Panqués/Galletas/Scones'),
(55, 'Galleta de Dulce de Leche', 'Galleta de Dulce de Leche', 0, 30, NULL, '2021-06-15 12:09:13', 'Panqués/Galletas/Scones'),
(56, 'Galleta de Nutella', 'Galleta de Nutella', 0, 30, NULL, '2021-06-15 12:09:13', 'Panqués/Galletas/Scones'),
(57, 'Galleta de Nuez', 'Galleta de Nuez', 0, 40, NULL, '2021-06-15 12:09:13', 'Panqués/Galletas/Scones'),
(58, 'Scones', '-', 0, 45, NULL, '2021-06-15 12:09:13', 'Panqués/Galletas/Scones'),
(59, 'Pan de Granos Aguacate', 'Pan de granos, aguacate, arúgula, aceite de oliva, jitomate y sal de mar', 0, 120, NULL, '2021-06-15 12:14:03', 'Sandwiches'),
(60, 'Pan de Granos Hummus', 'Pan de granos, hummus, arúgula, aceite de oliva, jitomate y sal de mar', 0, 105, NULL, '2021-06-15 12:14:03', 'Sandwiches'),
(61, 'Croissant con Jamón de Pavo', '-', 0, 75, NULL, '2021-06-15 12:14:03', 'Sandwiches'),
(62, 'Pan Blanco', 'Pan blanco con jamón de pavo, panela, tomate, lechuga y mayonesa chipotle', 0, 110, NULL, '2021-06-15 12:14:03', 'Sandwiches'),
(63, 'Baguel de Salmón', 'Baguel, salmón, alcaparras y queso crema', 0, 115, NULL, '2021-06-15 12:14:03', 'Sandwiches'),
(64, 'Ciabatta Queso de Cabra', 'Ciabatta con queso de cabra, pepino y tapenade', 0, 95, NULL, '2021-06-15 12:14:03', 'Sandwiches'),
(65, 'Baguette Tomates Rojos', 'Baguette con tomates rojos, mozzarella fresco y pesto de la casa', 0, 100, NULL, '2021-06-15 12:14:03', 'Sandwiches'),
(66, 'Baguette de Jamón Serrano', 'Baguette con jamón serrano, queso brie, moztaza dijon, aguacate, lechuga y aceite de oliva', 0, 125, NULL, '2021-06-15 12:14:03', 'Sandwiches'),
(67, 'Espresso Boca Del Monte-Café en Grano', 'Este es el café que usamos para nuestro espresso. viene del boca del monte, veracruz, es dulce, con una acidez presente, con notas de chocolate, almendra, y miel, es muy versátil, lo puedes usar para todos los métodos de preparación de café', 0, 150, NULL, '2021-06-15 12:20:07', 'Café en grano/Para casa'),
(68, 'Café con Jiribilla Veracruz', 'Del productor Marco Córdoba tenemos un café de un micro lote de la Finca Corahe, en Zentla, Veracruz, es café natural, secado en camas, de la variedad sarchimor, notas de sabor: caramelo, fresa y chocolate. Café con Jiribilla es el proyecto de Carlos de la Torre', 0, 195, NULL, '2021-06-15 12:20:07', 'Café en grano/Para casa'),
(69, 'Café con Jiribilla Oaxaca', 'Del productor Salvador Moreno tenemos un café de la Finca el Zacatal, en Santa Cruz Acatepec, Oaxaca, es una mezcla de los variedades typica y bourbon, con un proceso lavado, que típicamente deja una taza muy fresca y limpia en la boca, notas de sabor: toronja deshidratada, flor de naranja y ciruela', 0, 195, NULL, '2021-06-15 12:20:07', 'Café en grano/Para casa'),
(70, 'Café Finca Las Nieves', 'Este café es un bourbon natural, con notas de sabor: Cacao obscuro, cereza, fresa', 0, 175, NULL, '2021-06-15 12:20:07', 'Café en grano/Para casa'),
(71, 'Granola de la casa', 'Una bolsa de 250 gramos de nuestra granola hecha en casa', 0, 100, NULL, '2021-06-15 12:20:07', 'Café en grano/Para casa'),
(72, 'Mama Pacha Chocolate en Barra', 'Mamá Pacha chocolate artesanal, Ingredientes: 75% cacao nativo, azúcar de coco 70 gramos', 0, 125, NULL, '2021-06-15 12:20:07', 'Café en grano/Para casa'),
(73, 'Tote Bag Chiquitito', '-', 0, 250, NULL, '2021-06-15 12:20:07', 'Café en grano/Para casa'),
(74, 'Hamburguesas BBQ', '-', 0, 80, NULL, '2021-06-15 12:21:06', 'Hamburguesas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(10) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `estado` int(8) NOT NULL,
  `auditoria` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `tipo` int(1) NOT NULL,
  `saldo` double DEFAULT NULL,
  `auditoria` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `contrasena`, `tipo`, `saldo`, `auditoria`) VALUES
(1, 'Administrador', 'maildelproyectocafe@gmail.com', 'patitasGrises34', 0, NULL, '2021-06-15 11:22:37'),
(2, 'Cocinero', 'kitchen1@gmail.com', 'Qwerty', 1, NULL, '2021-06-15 11:23:29'),
(3, 'Juan García', 'benvadam@gmail.com', '12345678', 2, 300, '2021-06-15 11:24:27'),
(4, 'Fernando Diosdado', 'thelvadam@outlook.com', '12345678', 2, 0, '2021-06-15 11:25:25'),
(5, 'Mauricio García', 'correo@correo.com', '12345678', 2, 24, '2021-06-15 11:26:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_pedido`,`id_producto`),
  ADD KEY `fkproducto` (`id_producto`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fkusuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_producto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fkpedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkproducto` FOREIGN KEY (`id_producto`) REFERENCES `inventario` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fkusuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
