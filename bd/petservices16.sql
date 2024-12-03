-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 08:50:53
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
-- Base de datos: `petservices16`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `fecha_agregado` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Accesorios'),
(2, 'Alimento'),
(3, 'Higiene'),
(4, 'Salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_detalle`, `id_pedido`, `id_producto`, `cantidad`, `precio_unitario`, `subtotal`) VALUES
(34, 22, 33, 1, 8.50, 8.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `idcategoriaespecialidad` int(8) NOT NULL,
  `nombre_especialidad` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`idcategoriaespecialidad`, `nombre_especialidad`, `descripcion`) VALUES
(1, 'Animales Pequeños', 'Animales que de raza pequeña, y que sean pequeños de dimension'),
(2, 'Animales Grandes', 'Animales de raza grande y su dimensión sea grande'),
(3, 'Animales Exoticos', 'Animales poco comunes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `edad_meses` int(11) NOT NULL,
  `genero` enum('Macho','Hembra') NOT NULL,
  `tiene_enfermedad` enum('Si','No') NOT NULL,
  `enfermedad` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `historia` text DEFAULT NULL,
  `otros_detalles` text DEFAULT NULL,
  `tipo_mascota` enum('Perro','Gato','Conejo','Ave','Otros') NOT NULL,
  `actividad` enum('Alta','Media','Baja') NOT NULL,
  `peso` enum('0-5kg','5-10kg','10-20kg','20kg+') NOT NULL,
  `tamano` enum('Pequeño','Mediano','Grande') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `nombre`, `edad`, `edad_meses`, `genero`, `tiene_enfermedad`, `enfermedad`, `foto`, `historia`, `otros_detalles`, `tipo_mascota`, `actividad`, `peso`, `tamano`) VALUES
(1, 'Rex', 3, 36, 'Macho', 'No', NULL, 'uploads/adopcion_1.jpg', 'Es un perro muy juguetón', 'Le gusta correr y jugar en el parque', 'Perro', 'Alta', '20kg+', 'Grande'),
(2, 'Luna', 1, 12, 'Hembra', 'Si', 'Alergia leve', 'uploads/adopcion_8.jpg', 'Es una gata cariñosa y tranquila', 'Le gusta estar en interiores', 'Gato', 'Baja', '10-20kg', 'Pequeño'),
(3, 'Bobby', 2, 24, 'Macho', 'No', NULL, 'uploads/adopcion_9.jpg', 'Un conejo simpático y muy activo', 'Es excelente para la compañía en casa', 'Conejo', 'Media', '5-10kg', 'Pequeño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_pedido` datetime DEFAULT current_timestamp(),
  `estado` enum('pendiente','procesando','completado','cancelado') DEFAULT 'pendiente',
  `total` decimal(10,2) NOT NULL,
  `direccion_envio` text NOT NULL,
  `metodo_pago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `idusuario`, `fecha_pedido`, `estado`, `total`, `direccion_envio`, `metodo_pago`) VALUES
(1, 4, '2024-11-18 12:59:15', 'completado', 0.00, 'Dirección por defecto', 'yape'),
(2, 4, '2024-11-18 13:05:48', 'completado', 268.55, 'Dirección por defecto', 'yape'),
(3, 4, '2024-11-18 13:10:04', 'pendiente', 63.15, 'Dirección por defecto', 'efectivo'),
(4, 4, '2024-11-18 13:17:21', 'pendiente', 36.50, 'Dirección por defecto', 'efectivo'),
(5, 4, '2024-11-19 09:46:54', 'completado', 134.10, 'Dirección por defecto', 'yape'),
(6, 4, '2024-11-19 09:48:40', 'pendiente', 124.20, 'Dirección por defecto', 'yape'),
(7, 4, '2024-11-19 10:42:33', 'completado', 134.60, 'Dirección por defecto', 'yape'),
(8, 4, '2024-11-27 09:53:54', 'pendiente', 410.05, 'Dirección por defecto', 'efectivo'),
(9, 4, '2024-11-27 18:46:11', 'pendiente', 149.90, '0', 'yape'),
(10, 4, '2024-11-27 18:51:27', 'pendiente', 56.00, '0', 'efectivo'),
(11, 4, '2024-11-27 18:56:33', 'pendiente', 8.50, '0', 'efectivo'),
(12, 4, '2024-11-27 19:00:05', 'pendiente', 20.90, '0', 'efectivo'),
(13, 4, '2024-11-27 19:02:45', 'pendiente', 45.00, '0', 'efectivo'),
(14, 4, '2024-11-27 19:09:09', 'pendiente', 28.00, 'avenida E-2', 'efectivo'),
(16, 4, '2024-12-02 13:21:01', 'pendiente', 112.74, 'avenida E-2', 'efectivo'),
(17, 4, '2024-12-02 23:46:29', 'pendiente', 20.90, 'Av.Piura Upao', 'efectivo'),
(18, 4, '2024-12-02 23:55:52', 'pendiente', 18.40, '', 'efectivo'),
(19, 4, '2024-12-03 00:19:34', 'pendiente', 57.40, 'su casa', 'yape'),
(20, 4, '2024-12-03 01:27:10', 'pendiente', 36.50, '', 'yape'),
(21, 4, '2024-12-03 01:32:37', 'pendiente', 20.90, '', 'efectivo'),
(22, 4, '2024-12-03 02:46:53', 'pendiente', 8.50, '', 'efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `descuento` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `imagen`, `id_categoria`, `activo`, `descuento`) VALUES
(31, 'Alimento Gatos Adultos', 'Alimento completo para gatos adultos', 22.00, 'Alimento Gatos Adultos.jpeg', 2, 1, 5),
(32, 'Alimento Cachorros', 'Alimento para cachorros con alto contenido nutricional', 28.00, 'Cachorros.jpeg', 2, 1, 0),
(33, 'Alimento para Peces', 'Comida en escamas para peces de agua dulce', 10.00, 'Alimento para Peces.jpeg', 2, 1, 15),
(34, 'Alimento para Aves', 'Semillas seleccionadas para aves domésticas', 15.00, 'Alimento para Aves.jpeg', 2, 1, 5),
(35, 'Alimento para Conejos', 'Comida especial para conejos jóvenes', 20.00, 'Alimento para Conejos.jpeg', 2, 1, 8),
(36, 'Alimento Balanceado Gatos', 'Alimento premium para gatos de todas las razas', 23.00, 'Alimento Balanceado Gatos.jpeg', 2, 1, 12),
(37, 'Collar para Perros', 'Collar ajustable para perros de tamaño mediano', 12.00, 'Collar para Perros.jpeg', 1, 1, 5),
(38, 'Correa Extensible', 'Correa extensible para paseos cómodos', 18.50, 'Correa Extensible.jpeg', 1, 1, 10),
(39, 'Juguete para Gatos', 'Ratón de peluche con sonido para gatos', 7.00, 'Juguete para Gatos.jpeg', 1, 1, 15),
(40, 'Rascador para Gatos', 'Rascador vertical con base de madera', 30.00, 'Rascador para Gatos.jpg', 1, 1, 20),
(41, 'Casita para Perros', 'Casa de plástico resistente al clima', 50.00, 'Casita para Perros.jpeg', 1, 1, 8),
(42, 'Cama para Gatos', 'Cama acolchada para gatos con funda removible', 25.00, 'Cama para Gatos.jpeg', 1, 1, 10),
(43, 'Comedero Inteligente', 'Comedero automático para mascotas con temporizador', 60.00, 'Comedero Inteligente.jpeg', 1, 1, 12),
(44, 'Shampoo para Perros', 'Shampoo antipulgas y antiséptico', 15.00, 'Shampoo para Perros.jpeg', 4, 1, 5),
(45, 'Vitaminas para Gatos', 'Suplemento vitamínico para gatos adultos', 10.00, 'Vitaminas para Gatos.jpeg', 4, 1, 7),
(46, 'Antipulgas en Pipeta', 'Tratamiento antipulgas para perros y gatos', 18.00, 'Antipulgas en Pipeta.jpeg', 4, 1, 10),
(47, 'Desparasitante Oral', 'Desparasitante para perros y gatos en formato comprimido', 8.00, 'Desparasitante Oral.jpeg', 4, 1, 0),
(48, 'Cortaúñas para Mascotas', 'Cortaúñas especial para perros y gatos', 12.00, 'Cortaúñas para Mascotas.jpeg', 4, 1, 5),
(49, 'Sueroterapia Oral', 'Solución oral para rehidratación de mascotas', 5.00, 'Sueroterapia Oral.jpeg', 4, 1, 8),
(50, 'Cepillo de Dientes para Perros', 'Cepillo dental doble cabeza para perros', 6.00, 'Cepillo de Dientes para Perros.jpeg', 4, 1, 12),
(51, 'Arena Sanitaria para Gatos', 'Arena absorbente y libre de polvo para gatos', 12.00, 'Arena Sanitaria para Gatos.jpeg', 3, 1, 8),
(52, 'Bolsas Recolectoras', 'Bolsas biodegradables para recolección de heces', 3.00, 'Bolsas Recolectoras.jpeg', 3, 1, 5),
(53, 'Toallas Húmedas para Perros', 'Toallas desinfectantes para limpieza rápida', 8.00, 'Toallas Húmedas para Perros.jpeg', 3, 1, 7),
(55, 'Cepillo para Perros', 'Cepillo de cerdas suaves para el pelaje', 15.00, 'Cepillo para Perros.jpeg', 3, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `nombre`, `descripcion`) VALUES
(1, 'AdminVet', 'Administrador del sistema veterinario'),
(2, 'Usuario', 'Usuario regular del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idservicio` int(11) NOT NULL,
  `nombre_servicio` varchar(100) NOT NULL,
  `descripcion_servicio` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idservicio`, `nombre_servicio`, `descripcion_servicio`, `precio`, `categoria`, `imagen`) VALUES
(1, 'tilin', 'si', 12.00, 'corte', '9d193bafd59e2ec99c3395067c1fa44b.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_adopcion`
--

CREATE TABLE `solicitudes_adopcion` (
  `id` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado_solicitud` enum('pendiente','aceptada','negado') NOT NULL DEFAULT 'pendiente',
  `pregunta1` text NOT NULL,
  `pregunta2` text NOT NULL,
  `pregunta3` text NOT NULL,
  `pregunta4` text NOT NULL,
  `pregunta5` text NOT NULL,
  `pregunta6` text NOT NULL,
  `pregunta7` text NOT NULL,
  `pregunta8` text NOT NULL,
  `pregunta9` text NOT NULL,
  `pregunta10` text NOT NULL,
  `pregunta11` text NOT NULL,
  `pregunta12` text NOT NULL,
  `pregunta13` text NOT NULL,
  `pregunta14` text NOT NULL,
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `solicitudes_adopcion`
--

INSERT INTO `solicitudes_adopcion` (`id`, `id_mascota`, `idusuario`, `estado_solicitud`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `pregunta11`, `pregunta12`, `pregunta13`, `pregunta14`, `comentario`) VALUES
(1, 1, 2, 'pendiente', 'Quiero adoptar una mascota para tener compañía y mejorar mi bienestar emocional', 'Yo seré el propietario, pero mi familia me apoyará en su cuidado', 'Arriendo un departamento en un lugar tranquilo y adecuado para mascotas', 'Es un departamento con espacio suficiente para un perro mediano', 'Considero que adoptar a este perro es ideal porque puedo brindarle el amor y tiempo que necesita', 'Sí, toda mi familia está de acuerdo y emocionada con la adopción', 'Si la mascota se enferma, la llevaré de inmediato al veterinario para asegurarme de que reciba el mejor cuidado', 'No, no hemos cambiado de domicilio en los últimos años', 'No tengo niños en casa', 'Nadie en mi hogar tiene alergias conocidas a mascotas', 'Sí, tengo el tiempo necesario para cuidar y dedicarle atención diaria a la mascota', 'Si viajo, dejaré la mascota bajo el cuidado de un amigo de confianza que también tiene experiencia con animales', 'No, esta no es la primera mascota que adopto, ya tengo experiencia', 'Actualmente no convivo con otras mascotas', 'Estoy emocionado y espero poder brindarle un hogar lleno de amor y cuidados.'),
(2, 2, 2, 'pendiente', 'Siempre he querido adoptar una mascota para enriquecer nuestra familia', 'La mascota será de todos en la familia, pero yo seré el responsable principal de su bienestar', 'Tengo una casa propia con espacio adecuado para una mascota', 'Es una casa con jardín, lo cual es ideal para una mascota activa', 'Este gato se ajustará bien a nuestro estilo de vida, es tranquilo y nosotros buscamos una compañía tranquila', 'Sí, mi familia ha estado involucrada en esta decisión y todos estamos de acuerdo', 'Si llega a enfermarse, lo llevaré al veterinario que siempre ha atendido nuestras otras mascotas', 'No, hemos estado en la misma casa por varios años', 'No hay niños pequeños, pero mis hijos mayores saben cómo cuidar a una mascota', 'Nadie en mi familia tiene alergias a los gatos ni a otros animales', 'Sí, puedo dedicarle el tiempo necesario tanto para jugar como para cuidarlo diariamente', 'Si salgo de viaje, un familiar cercano se encargará de la mascota', 'Sí, es la primera vez que adopto formalmente, aunque he tenido mascotas antes', 'Actualmente convivo con un gato que es muy sociable', 'Confío en que ambos gatos se llevarán bien y que todo el proceso de adaptación será positivo.'),
(3, 3, 2, 'pendiente', 'Me gustaría adoptar una mascota para enseñar responsabilidad y empatía a mis hijos', 'Yo seré el encargado del cuidado, aunque mis hijos también participarán', 'Soy propietario de una casa pequeña, pero cómoda para un conejo', 'Es una casa con el espacio adecuado para un conejo, incluyendo un pequeño patio donde puede jugar', 'Creo que este conejo es perfecto porque es de fácil manejo y se ajustará a nuestro hogar familiar', 'Sí, mi familia está emocionada por la llegada de la mascota', 'Si la mascota se enferma, la llevaré al veterinario y seguiré todas las recomendaciones para su recuperación', 'No, hemos estado en el mismo domicilio por años', 'Sí, mis hijos entienden cómo cuidar a una mascota pequeña como un conejo', 'No, ninguno de nosotros tiene alergias a animales', 'Sí, dispongo de tiempo para cuidar y atender las necesidades del conejo diariamente', 'Si necesito viajar, mis padres cuidarán de la mascota, ya que tienen experiencia con animales', 'Sí, es la primera vez que adopto una mascota de este tipo', 'No tengo otras mascotas en casa actualmente', 'Estoy seguro de que será una experiencia enriquecedora para toda la familia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `estrellas` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `comentario`, `estrellas`, `usuario_id`) VALUES
(9, 'Es un producto de calidad y 100% recomendado, por eso deben adquirir sus servicios.', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `num_telefono` bigint(20) DEFAULT NULL,
  `password` varchar(70) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT 0,
  `email_verificado` tinyint(1) DEFAULT 0,
  `token_verificacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `idrol`, `nombre`, `apellido`, `direccion`, `email`, `num_telefono`, `password`, `token_password`, `password_request`, `email_verificado`, `token_verificacion`) VALUES
(1, 1, 'Max Alessandro', 'Garcia Lopez', 'mariscal castilla', 'max_noviembre_7@hotmail.com', 97382473, '$2y$10$80n88P9PwClZEA7W6dY4HeoD.TOfFSGFGMglqOalqUW5JN.pQ78S6', NULL, 0, 1, NULL),
(2, 1, 'Max', 'Admin', 'utp', 'u222012741@gmail.com', 978530945, '$2y$10$pwc2lcvu9DeOM6zv1UQYnOy7cwoBG/pNQ2UAvKtSkC.vAsJGrzVRa', NULL, 0, 1, NULL),
(4, 1, 'yassir', 'adanaque', 'avenida', 'chorritos159753@gmail.com', 912921985, '$2y$10$N0t.3Jg4mew6K/.lzPM6xunelTNu40r5bvvfj7JcecNLlR8UpavNS', NULL, 0, 1, NULL),
(5, 2, 'Max', 'Garcia', '123', 'monstergym123@gmail.com', 123, '$2y$10$R1FASkBdDSRmR5rRjj//6OrWRtWwvVe./FWFrwOhtHpr.GW5byopy', NULL, 0, 1, NULL),
(7, 2, 'Joseph', 'Gato', '123', 'maxito2343@gmail.com', 123, '$2y$10$zeyDrlxabQRHviMwKYdKv.dvbK3lTEJkmw29RU4m51jI7vjgogP3a', NULL, 0, 0, NULL),
(8, 2, 'asd', 'wad', 'ad', 'monstergymw123@gmail.com', 0, '$2y$10$sieIZfMfJlQgX2.fCK9MBOOAI8XZ2Kj1dKwJFNDDTe31xYX6JGYWe', NULL, 0, 0, NULL),
(9, 2, 'max', '123', 'max', 'monstergym2123@gmail.com', 123, '$2y$10$5k1ztw7Sgwy8F.DQKYFGrO2/L3LJpETjCpEPLtgT37myjKCKePHhm', NULL, 0, 0, '70eee196773ac097efe21c9d1abc4a66d14cc10c'),
(10, 2, '123', '123', '123', 'u22201741@gmail.com', 123, '$2y$10$uCVDtDFgBMD4JlxEk71y2.vvfBY1JW/lUjXch.QQ4YY5/K28hwqny', NULL, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinarios`
--

CREATE TABLE `veterinarios` (
  `id_veterinario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` int(9) NOT NULL,
  `fotoperfil` varchar(255) NOT NULL,
  `sede` varchar(255) NOT NULL,
  `biografia` varchar(255) NOT NULL,
  `idcategoriaespecialidad` int(8) NOT NULL,
  `curriculum_vitae` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `veterinarios`
--

INSERT INTO `veterinarios` (`id_veterinario`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `fotoperfil`, `sede`, `biografia`, `idcategoriaespecialidad`, `curriculum_vitae`) VALUES
(19, 'Luisa', 'Sanchez', 'Av.Piura Upao', 'luisa@hotmail.com', 994050607, 'foto_6747c93a219657.88614943.jpg', 'Piura', 'Doctora egresada de la Universidad Nacional de Piura', 2, 'https://1drv.ms/b/c/8dbd9cefbb2afdd8/EZmSEmvJ8dxKoQPMa8u-290B4bxadFteouxGScU1RKAMQw?e=DkG6JJ'),
(40, 'Monica', 'Zapata', 'Avenida las gardenias mz A lote 3', 'Monica@gmail.com', 991050605, 'foto_6747c9b39855f3.57796672.jpg', 'Piura', 'Cardiologa de experiencia 15 años', 2, 'https://1drv.ms/b/c/8dbd9cefbb2afdd8/EZmSEmvJ8dxKoQPMa8u-290B4bxadFteouxGScU1RKAMQw?e=DkG6JJ'),
(46, 'Fabio', 'Paris', 'Piura', 'fabio@gmail.com', 991050605, 'foto_6747d63980b9b2.26072121.jpg', 'Piura', 'Cardiologo de experiencia 15 años', 1, 'https://1drv.ms/b/c/8dbd9cefbb2afdd8/EZmSEmvJ8dxKoQPMa8u-290B4bxadFteouxGScU1RKAMQw?e=0aNgBg'),
(47, 'Lucas', 'Rodriguez', 'Piura', 'Lucas@gmail.com', 666666666, 'foto_6747d6bc0758d5.84839534.jpg', 'Piura', 'Cirujano de experiencia de 30 años', 1, 'https://1drv.ms/b/c/8dbd9cefbb2afdd8/EZmSEmvJ8dxKoQPMa8u-290B4bxadFteouxGScU1RKAMQw?e=0aNgBg'),
(48, 'Fresia', 'Guadalupe', 'Piura', 'fresia@gmail.com', 666666666, 'foto_6747d6f37f5096.18273778.jpg', 'Piura', 'Experiencia en animales poco vistos', 3, 'https://1drv.ms/b/c/8dbd9cefbb2afdd8/EZmSEmvJ8dxKoQPMa8u-290B4bxadFteouxGScU1RKAMQw?e=0aNgBg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idservicio` (`idservicio`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`idcategoriaespecialidad`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_categoria` (`id_categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `solicitudes_adopcion`
--
ALTER TABLE `solicitudes_adopcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idrol` (`idrol`);

--
-- Indices de la tabla `veterinarios`
--
ALTER TABLE `veterinarios`
  ADD PRIMARY KEY (`id_veterinario`),
  ADD KEY `idcategoriaespecialidad` (`idcategoriaespecialidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `idcategoriaespecialidad` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitudes_adopcion`
--
ALTER TABLE `solicitudes_adopcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `veterinarios`
--
ALTER TABLE `veterinarios`
  MODIFY `id_veterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `solicitudes_adopcion`
--
ALTER TABLE `solicitudes_adopcion`
  ADD CONSTRAINT `solicitudes_adopcion_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solicitudes_adopcion_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD CONSTRAINT `testimonios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);

--
-- Filtros para la tabla `veterinarios`
--
ALTER TABLE `veterinarios`
  ADD CONSTRAINT `veterinarios_ibfk_1` FOREIGN KEY (`idcategoriaespecialidad`) REFERENCES `especialidades` (`idcategoriaespecialidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
