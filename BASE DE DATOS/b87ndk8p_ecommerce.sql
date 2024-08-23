-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-08-2024 a las 21:54:30
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `b87ndk8p_ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `pass`, `nombre`, `DNI`, `telefono`, `direccion`) VALUES
(1, 'luis.chavez.kook@gmail.com', 'ee12026a0b34f078925edcb4d85680c8', 'Luis Angel Chavez Mamani', '70583764', '955257610', 'Virgen del Carmen Mz C -Lt 3'),
(9, 'chavezmamaniluisangel5@gmail.com', 'ee12026a0b34f078925edcb4d85680c8', 'Chavez Luis angel', '70583366', '955256612', 'calle Arequipa 315'),
(10, 'diana@gmail.com', 'ee12026a0b34f078925edcb4d85680c8', 'Diana Mayra', '52565458', '958867102', 'urb. el paraiso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_preventa`
--

CREATE TABLE `detalle_preventa` (
  `id_detalle` int NOT NULL,
  `id_preventa` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `estado` enum('pendiente','finalizado') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_preventa`
--

INSERT INTO `detalle_preventa` (`id_detalle`, `id_preventa`, `id_producto`, `cantidad`, `precio_unitario`, `estado`) VALUES
(290, 205, 80, 5, 25.00, 'pendiente'),
(291, 205, 87, 4, 7.00, 'pendiente'),
(292, 205, 77, 1, 50.00, 'pendiente'),
(293, 206, 81, 1, 12.00, 'pendiente'),
(294, 207, 81, 1, 12.00, 'pendiente'),
(295, 208, 81, 1, 12.00, 'pendiente'),
(296, 209, 81, 1, 12.00, 'pendiente'),
(297, 210, 81, 1, 12.00, 'pendiente'),
(298, 211, 81, 1, 12.00, 'pendiente'),
(299, 212, 81, 1, 12.00, 'pendiente'),
(300, 213, 81, 1, 12.00, 'pendiente'),
(301, 214, 81, 1, 12.00, 'pendiente'),
(302, 215, 81, 1, 12.00, 'pendiente'),
(303, 216, 81, 1, 12.00, 'pendiente'),
(304, 217, 87, 1, 7.00, 'pendiente'),
(305, 218, 87, 1, 7.00, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle` int NOT NULL,
  `id_venta` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `estado` enum('pendiente','finalizado') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'finalizado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_ventas`
--

CREATE TABLE `pre_ventas` (
  `id_preventa` int NOT NULL,
  `id_cliente` int DEFAULT NULL,
  `fecha_compra` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) DEFAULT NULL,
  `estado` enum('pendiente','finalizado') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pre_ventas`
--

INSERT INTO `pre_ventas` (`id_preventa`, `id_cliente`, `fecha_compra`, `total`, `estado`) VALUES
(200, 1, '2024-05-01 22:31:10', 2.00, 'pendiente'),
(201, 1, '2024-05-27 04:44:17', 4.00, 'pendiente'),
(202, 1, '2024-06-07 14:08:25', 2.00, 'pendiente'),
(203, 1, '2024-06-09 18:41:41', 127.00, 'pendiente'),
(204, 1, '2024-06-09 18:43:35', 134.00, 'pendiente'),
(205, 1, '2024-06-10 08:33:42', 203.00, 'pendiente'),
(206, 1, '2024-06-17 04:22:16', 12.00, 'pendiente'),
(207, 1, '2024-06-17 04:28:45', 12.00, 'pendiente'),
(208, 1, '2024-06-17 04:33:32', 12.00, 'pendiente'),
(209, 1, '2024-06-17 04:35:11', 12.00, 'pendiente'),
(210, 1, '2024-06-17 04:37:37', 12.00, 'pendiente'),
(211, 1, '2024-06-17 04:38:06', 12.00, 'pendiente'),
(212, 1, '2024-06-17 04:43:17', 12.00, 'pendiente'),
(213, 1, '2024-06-17 04:48:22', 12.00, 'pendiente'),
(214, 1, '2024-06-17 04:49:07', 12.00, 'pendiente'),
(215, 1, '2024-06-17 04:52:11', 12.00, 'pendiente'),
(216, 1, '2024-06-17 05:28:15', 12.00, 'pendiente'),
(217, 1, '2024-06-17 05:31:32', 7.00, 'pendiente'),
(218, 1, '2024-06-17 05:33:08', 7.00, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `Categoria` enum('Importado','Personalizado','Simples','Kits','P.Tendencia') CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int DEFAULT NULL,
  `imgProducto` varchar(255) DEFAULT NULL,
  `descripcion_producto` text NOT NULL,
  `requisitos` varchar(255) DEFAULT NULL,
  `crtsColor1` varchar(255) DEFAULT NULL,
  `crtsColor2` varchar(255) DEFAULT NULL,
  `crtsColorFdo1` varchar(255) DEFAULT NULL,
  `crtsColorFdo2` varchar(255) DEFAULT NULL,
  `crtsTama1` varchar(255) DEFAULT NULL,
  `crtsTama2` varchar(255) DEFAULT NULL,
  `crtsTamaFdo1` varchar(255) DEFAULT NULL,
  `crtsTamaFdo2` varchar(255) DEFAULT NULL,
  `crtsDise1` varchar(255) DEFAULT NULL,
  `crtsDise2` varchar(255) DEFAULT NULL,
  `crtsDiseFdo1` varchar(255) DEFAULT NULL,
  `crtsDiseFdo2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `Categoria`, `precio`, `stock`, `imgProducto`, `descripcion_producto`, `requisitos`, `crtsColor1`, `crtsColor2`, `crtsColorFdo1`, `crtsColorFdo2`, `crtsTama1`, `crtsTama2`, `crtsTamaFdo1`, `crtsTamaFdo2`, `crtsDise1`, `crtsDise2`, `crtsDiseFdo1`, `crtsDiseFdo2`) VALUES
(66, 'Taza Personalizada', 'Simples', 25.00, 20, 'dist/imgProducto/01-Taza-Personalizada-2-C.jpg', 'Taza personalizada, ideal para regalar. Resistente y con un diseño bonito. Perfecta para sorprender a alguien especial. Las medidas son: 95 mm altura x 80 mm y la impresión fotográfica nítida a todo color.', 'Bueno', 'dist/imgProducto/01-Taza-Personalizada-1-S.png', 'dist/imgProducto/01-Taza-Personalizada-2-S.png', 'dist/imgProducto/01-Taza-Personalizada-1-C.jpg', 'dist/imgProducto/01-Taza-Personalizada-2-C.jpg', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(67, 'Llaveros Personalizados', 'Simples', 2.00, 15, 'dist/imgProducto/02-Llaveros-Personalizado-2-C.jpg', 'Llaveros personalizados, el detalle perfecto para esa persona especial. Diseños únicos y memorables, con el tema de tu preferencia, grupo k-pop, personajes de animes entre otros, es plastificado más argolla de metal.', 'Barato', 'dist/imgProducto/02-Llaveros-Personalizado-2-S.png', 'dist/imgProducto/02-Llaveros-Personalizado-1-S.png', 'dist/imgProducto/02-Llaveros-Personalizado-2-C.jpg', 'dist/imgProducto/02-Llaveros-Personalizado-1-C.jpg', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(68, 'Calendario Personalizado', 'Simples', 25.00, 10, 'dist/imgProducto/03-Calendario-Personalizado-1-C.jpg', 'Calendarios personalizados, organiza tu año con estilo, ideales para planificar y recordar fechas importantes, muy versátil y útil, ¡Hazlo tuyo con colores y detalles únicos!', 'Bueno', 'dist/imgProducto/03-Calendario-Personalizado-1-S.png', 'dist/imgProducto/03-Calendario-Personalizado-2-S.png', 'dist/imgProducto/03-Calendario-Personalizado-1-C.jpg', 'dist/imgProducto/03-Calendario-Personalizado-2-C.jpg', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(69, 'Cuaderno Personalizado', 'Simples', 20.00, 16, 'dist/imgProducto/04-Cuaderno-Personalizado-2-C.jpg', 'Cuaderno personalizado, un obsequio único y memorable. Diseños exclusivos que puedes plasmar para crear algo verdaderamente especial. Además, puedes elegir entre hojas cuadriculada, de líneas y más, llévalo a tu oficina o escuela.', 'Bonito', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'dist/imgProducto/04-Cuaderno-Personalizado-2-S.png', 'dist/imgProducto/04-Cuaderno-Personalizado-1-S.png', 'dist/imgProducto/04-Cuaderno-Personalizado-2-C.jpg', 'dist/imgProducto/04-Cuaderno-Personalizado-1-C.jpg'),
(70, 'Agendas 2024', 'Simples', 35.00, 10, 'dist/imgProducto/05-Agenda-Personalizada-1-C.jpg', 'Agendas personalizadas, el complemento perfecto para estudio y trabajo, que los diseños te inspiren y motiven cada día, tapas resistentes, hojas gruesas, incluye un planner de mes, frases motivadoras y estados de ánimo.', 'Bonito', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'dist/imgProducto/05-Agenda-Personalizada-1-S.png', 'dist/imgProducto/05-Agenda-Personalizada-2-S.png', 'dist/imgProducto/05-Agenda-Personalizada-1-C.jpg', 'dist/imgProducto/05-Agenda-Personalizada-2-C.jpg'),
(71, 'MousePad Personalizado', 'Simples', 15.00, 25, 'dist/imgProducto/06-Mouse-Pad-Personalizados-2-C.jpg', 'Mousepads personalizados, añade estilo a tu espacio de trabajo con diseños únicos y motivadores, perfectos para uso diario en el trabajo o instituto, perfecto para regalar a ese amig@ especial.', 'Bueno', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'dist/imgProducto/06-Mouse-Pad-Personalizados-2-S.png', 'dist/imgProducto/06-Mouse-Pad-Personalizados-1-S.png', 'dist/imgProducto/06-Mouse-Pad-Personalizados-2-C.jpg', 'dist/imgProducto/06-Mouse-Pad-Personalizados-1-C.jpg'),
(72, 'Pines', 'Simples', 3.00, 48, 'dist/imgProducto/07-Pines-Personalizados-1-C.jpg', 'Pines personalizados, añade un toque especial a tu estilo con diseños únicos y significativos, perfectos para cualquier ocasión, para cualquier bolsa, de material metal y imágenes de calidad.', 'Barato', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'dist/imgProducto/07-Pines-Personalizados-1-S.png', 'dist/imgProducto/07-Pines-Personalizados-2-S.png', 'dist/imgProducto/07-Pines-Personalizados-1-C.jpg', 'dist/imgProducto/07-Pines-Personalizados-2-C.jpg'),
(73, 'Almohadas Personalizadas', 'Simples', 30.00, 50, 'dist/imgProducto/08-Almohadasr-Personalizadas-1-C.jpg', 'Almohadas personalizadas, confort y estilo único en cada diseño. El regalo perfecto para cualquier ocasión, hecho a tu medida y a tu cama, duerme cómodo todos los días.', 'Barato', 'NULL', 'NULL', 'NULL', 'NULL', 'dist/imgProducto/08-Almohadasr-Personalizadas-1-S.png', 'dist/imgProducto/08-Almohadasr-Personalizadas-2-S.png', 'dist/imgProducto/08-Almohadasr-Personalizadas-1-C.jpg', 'dist/imgProducto/08-Almohadasr-Personalizadas-2-C.jpg', 'NULL', 'NULL', 'NULL', 'NULL'),
(74, 'Stickers Personalizados', 'Simples', 5.00, 39, 'dist/imgProducto/09-Sticker-Personalizado-1-C.jpg', 'Stickers personalizados, diseños únicos para decorar y personalizar tus objetos favoritos. Ideal para regalos y expresión personal, de muchas medidas, incluso de tamaño real.\r\n', 'Barato', 'NULL', 'NULL', 'NULL', 'NULL', 'dist/imgProducto/09-Sticker-Personalizado-1-S.png', 'dist/imgProducto/09-Sticker-Personalizado-2-S.png', 'dist/imgProducto/09-Sticker-Personalizado-1-C.jpg', 'dist/imgProducto/09-Sticker-Personalizado-2-C.jpg', 'NULL', 'NULL', 'NULL', 'NULL'),
(75, 'Rompecabezas Personalizados', 'Simples', 25.00, 10, 'dist/imgProducto/10-Rompecabezas-Personalizada-1-C.jpg', 'Rompecabezas personalizados: crea momentos especiales con tus fotos favoritas. Un regalo único y entretenido para todas las edades, plasma ese momento y recuerda cada vez que los armes.', 'Bonito', 'NULL', 'NULL', 'NULL', 'NULL', 'dist/imgProducto/10-Rompecabezas-Personalizada-1-S.png', 'dist/imgProducto/10-Rompecabezas-Personalizada-2-S.png', 'dist/imgProducto/10-Rompecabezas-Personalizada-1-C.jpg', 'dist/imgProducto/10-Rompecabezas-Personalizada-2-C.jpg', 'NULL', 'NULL', 'NULL', 'NULL'),
(76, 'Kit Festividades', 'Kits', 45.00, 5, 'dist/imgProducto/Kit-festividades-2.jpg', 'kit perfecto para regalar a una persona especial, incluye una caja de cartón abierta o cerrada, 30 fotocards, adornos dependiendo a la temática escogida, 9 bocadillos dulces y salados, 1 bebida gasificada y una tarjeta de palabras. Regalo especial opcional.', 'Bonito', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(77, 'Kit Cumpleañero', 'Kits', 50.00, 0, 'dist/imgProducto/Kit-cumpleanos-3.jpg', 'kit perfecto para regalar en días especiales, incluye una caja de cartón abierta o cerrada, 1 cuadro de fotografía, 10 fotocards, los adornos dependerán del día festivo, 15 bocadillos dulces y salados, 1 bebida gasificada y una tarjeta de palabras. Regalo especial opcional.', 'Bueno', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(78, 'Kit Kpoper', 'Kits', 50.00, 5, 'dist/imgProducto/Kit-kpoper-1.jpg', 'kit perfecto para regalar o regalarte a ti mismo, para personas con gusto musical exquisito, incluye una caja de cartón abierta o cerrada, 10 photocard, 2 separadores, 3 llaveros, los adornos con temática kpop, 5 bocadillos dulces y salados, 2 bebidas gasificadas y una tarjeta de palabras. Regalo especial opcional.', 'Bonito', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(79, 'Kit Otaku', 'Kits', 50.00, 5, 'dist/imgProducto/Kit-otakur-1.jpg', 'kit perfecto para regalar o regalarte a ti mismo, para personas con gusto cinematográfico grandioso, incluye una caja de cartón abierta o cerrada, 3 photocard, 4 separadores, 5 llaveros, los adornos con temática anime, 10 bocadillos dulces y salados, 2 bebidas gasificadas y una tarjeta de palabras. Regalo especial opcional.', 'Bueno', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(80, 'Ramen', 'P.Tendencia', 25.00, 5, 'dist/imgProducto/P.TENDENCIA  (1).jpg', 'Hot Chicken Sopa Ramen, ramen instantáneo picante estilo estofado, con solo 5 minutos de cocción está listo para comer. No pierdas la oportunidad de deleitar productos coreanos.', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(81, 'Soju', 'P.Tendencia', 12.00, 9, 'dist/imgProducto/P.TENDENCIA  (2).jpg', 'Si eres mayor de edad este licor destilado de arroz sabor a mango es para ti. NO CONSUMIR MENORES DE EDAD. Cantidad de alcohol 12.5 % y peso neto 360 ml. Recuerda que consumir bebidas en exceso es dañino.', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(82, 'Lotte Milks', 'P.Tendencia', 9.00, 15, 'dist/imgProducto/P.TENDENCIA  (4).jpg', 'Bebida gasificada con sabor a yogurt, está hecha con la combinación perfecta de sabor a yogurt y leche. Su textura cremosa y gasificada segura que te satisfará al máximo. ', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(83, 'Snack', 'P.Tendencia', 6.00, 20, 'dist/imgProducto/P.TENDENCIA  (3).jpg', 'Hecho de papas deshidratadas y saborizado con polvo de papa y dulce. Tiene una textura crujiente y un sabor salado y ligeramente dulce. Disfruta en familia y con amigos. ', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(84, 'Choco Pie', 'P.Tendencia', 3.00, 14, 'dist/imgProducto/P.TENDENCIA  (6).jpg', 'Pastel de bocadillo dulce sinónimo de pastel de chocolate. Cuando necesites salir, cuando necesites dulzura, este pastelillo se adapta a ti, ligero de llevar fácil de consumir. ', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(85, 'Aloe Vera', 'P.Tendencia', 10.00, 8, 'dist/imgProducto/P.TENDENCIA  (5).jpg', 'Estas bebidas suelen tener un sabor refrescante y se disfrutan como una opción hidratante. Las bebidas de aloe vera coreanas suelen contener pequeños trozos de gel de aloe vera, lo que agrega una textura única a la bebida.', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(86, 'Figuras de Anime', 'P.Tendencia', 45.00, 10, 'dist/imgProducto/P.TENDENCIA  (7).jpg', 'Figura de Anime de Demon Slayer de 17CM, muñeco bonito de Kamado, Nezuko, batalla en cuclillas, modelo sentado, juguete de chica, regalo, colecciona Material de PVC en la caja.', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL'),
(87, 'Peperos', 'P.Tendencia', 7.00, 24, 'dist/imgProducto/P.TENDENCIA  (8).jpg', 'Galleta en forma de bastón cubierto con crema sabor a chocolate y trocitos de galleta sabor chocolate blanco. Listos para compartir con las personas que más quieres, no pierdas la oportunidad de llevarlos en tu cartera.\r\n', 'Barato', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pass`, `nombre`) VALUES
(1, 'hongjo@gmail.com', 'fc669e5a4a7969383fd7db020c630380', 'Gato Hong Jo'),
(17, 'luis.chavez.kook@gmail.com', '6777c2ae7b635584c8d7c09ca12bf2c5', 'Luis Angel '),
(21, 'admin@gmail.com', '609e29d3cfb9699875efcdb7d6aee78b', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int NOT NULL,
  `id_cliente` int DEFAULT NULL,
  `fecha_compra` timestamp NULL DEFAULT NULL,
  `fecha_confirmacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,2) DEFAULT NULL,
  `estado` enum('pendiente','finalizado') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `fecha_compra`, `fecha_confirmacion`, `total`, `estado`) VALUES
(78, 1, '2023-12-11 03:52:40', '2023-12-11 03:53:35', 12.00, 'finalizado'),
(79, 1, '2023-12-12 19:57:55', '2023-12-12 19:59:36', 4.00, 'finalizado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kEmail` (`email`);

--
-- Indices de la tabla `detalle_preventa`
--
ALTER TABLE `detalle_preventa`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_preventa` (`id_preventa`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `pre_ventas`
--
ALTER TABLE `pre_ventas`
  ADD PRIMARY KEY (`id_preventa`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_ventas_clientes` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_preventa`
--
ALTER TABLE `detalle_preventa`
  MODIFY `id_detalle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `pre_ventas`
--
ALTER TABLE `pre_ventas`
  MODIFY `id_preventa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_preventa`
--
ALTER TABLE `detalle_preventa`
  ADD CONSTRAINT `detalle_preventa_ibfk_1` FOREIGN KEY (`id_preventa`) REFERENCES `pre_ventas` (`id_preventa`),
  ADD CONSTRAINT `detalle_preventa_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pre_ventas`
--
ALTER TABLE `pre_ventas`
  ADD CONSTRAINT `pre_ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
