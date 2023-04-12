-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-04-2023 a las 04:30:18
-- Versión del servidor: 8.0.32-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qpet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id` int NOT NULL,
  `fecha` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `hora` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_veterinaria` int NOT NULL,
  `id_mascota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id`, `fecha`, `hora`, `comentario`, `id_veterinaria`, `id_mascota`) VALUES
(1, '2023-04-06', '23:00', 'sdfgsdfg', 1, 2),
(2, '2023-04-07', '13:00', 'asdfr3t', 1, 4),
(3, '2023-04-05', '15:00', 'ccc', 1, 1),
(4, '2023-03-30', '20:30', 'ajua', 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_veterinario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `especie` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `raza` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso` double NOT NULL,
  `altura` double NOT NULL,
  `sexo` tinyint NOT NULL,
  `id_usuario` int NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `especie`, `raza`, `fecha_nacimiento`, `peso`, `altura`, `sexo`, `id_usuario`, `descripcion`) VALUES
(1, 'Cafecin', 'Perro', 'Labrador', '2018-04-10', 10.7, 0.7, 1, 1, 'Es café y es todo un corredor'),
(2, 'Chuy', 'Gato', 'Lampiño', '2022-02-17', 10.7, 0.7, 2, 1, 'Es un gato blanco'),
(3, 'Copo', 'Gato', 'Blanco', '2023-04-11', 10.7, 0.7, 2, 1, 'Es un gatillo blanco'),
(4, 'Bodoque', 'Perro', 'Curza', '2023-04-11', 10.7, 0.7, 1, 1, 'Es hijo de cafecin'),
(10, 'Kira', 'Perro', 'Pug', '2020-12-18', 5, 30, 2, 9, 'Es una mascota muy alegre y cariñosa con todos'),
(11, 'Tribilín', 'Perro', 'Mestizo', '2021-09-17', 50, 110, 1, 1, 'Ingeniero en en la vida y en ser papa luchon'),
(12, 'Camilo', 'Perro', 'Pug', '2021-09-20', 9, 40, 1, 7, 'Es un desmadre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_p` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_m` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` tinyint NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usuario` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nombre`, `apellido_p`, `apellido_m`, `telefono`, `email`, `fecha_nacimiento`, `genero`, `password`, `tipo_usuario`) VALUES
(1, 'JhovanRM', 'Jhovan', 'Rodriguez', 'Moreno', '8341061102', 'jrdzmoreni@gmail.com', '2017-09-02', 1, 'jhovan', 2),
(4, 'Mau12', 'Mau', 'aaaa', 'aaa', '834106102', 'jrdzmoreni@gmail.com', '2023-04-27', 1, '1212', 1),
(7, 'pablito23', 'pablo', 'Martinez', 'Ruiz', '83401061102', 'pablitoClava@gmaul.com', '2002-09-17', 1, '1234', 2),
(8, 'Marisol17', 'Marisol', 'Romero', 'Hernández', '831460456', 'mari@gmail.com', '2002-09-20', 2, 'marisol', 1),
(9, 'jorge', 'jorge luis', 'charles', 'torres', '8341100900', '2030340@upv.edu.mx', '2002-08-18', 1, 'jorge', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinaria`
--

CREATE TABLE `veterinaria` (
  `id` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `colonia` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_postal` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `horario` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `disponible` tinyint NOT NULL,
  `activo` tinyint NOT NULL,
  `id_usuario` int NOT NULL
) ;

--
-- Volcado de datos para la tabla `veterinaria`
--

INSERT INTO `veterinaria` (`id`, `nombre`, `colonia`, `calle`, `codigo_postal`, `telefono`, `horario`, `disponible`, `activo`, `id_usuario`) VALUES
(1, 'Milmascotas', 'Mainero', 'Naciones Unidas', '87049', '8342556155', '{\"lunes_viernes\":{\"hora_inicio\":\"08:00\",\"hora_fin\":\"18:00\"},\"sábado\":{\"hora_inicio\":\"09:00\",\"hora_fin\":\"13:00\"},\"domingo\":{\"hora_inicio\":\"09:00\",\"hora_fin\":\"13:00\"}}', 1, 1, 7),
(6, 'Jhovan', 'Satelite', 'pleyades', '87087', '8341061102', '{\"lunes_viernes\":{\"hora_inicio\":\"22:29\",\"hora_fin\":\"22:29\"},\"sabado\":{\"hora_inicio\":\"22:30\",\"hora_fin\":\"22:28\"},\"domingo\":{\"hora_inicio\":\"22:30\",\"hora_fin\":\"13:26\"}}', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario_mascota`
--

CREATE TABLE `veterinario_mascota` (
  `id_usuario` int NOT NULL,
  `id_mascota` int NOT NULL,
  `id_veterinaria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `veterinario_mascota`
--

INSERT INTO `veterinario_mascota` (`id_usuario`, `id_mascota`, `id_veterinaria`) VALUES
(1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cita_veterinaria` (`id_veterinaria`),
  ADD KEY `fk_cita_mascota` (`id_mascota`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_veterinario` (`id_veterinario`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `veterinaria`
--
ALTER TABLE `veterinaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `veterinario_mascota`
--
ALTER TABLE `veterinario_mascota`
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_veterinaria` (`id_veterinaria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `veterinaria`
--
ALTER TABLE `veterinaria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_cita_mascota` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cita_veterinaria` FOREIGN KEY (`id_veterinaria`) REFERENCES `veterinaria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinaria` (`id`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `veterinaria`
--
ALTER TABLE `veterinaria`
  ADD CONSTRAINT `veterinaria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `veterinario_mascota`
--
ALTER TABLE `veterinario_mascota`
  ADD CONSTRAINT `veterinario_mascota_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `veterinario_mascota_ibfk_2` FOREIGN KEY (`id_veterinaria`) REFERENCES `veterinaria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
