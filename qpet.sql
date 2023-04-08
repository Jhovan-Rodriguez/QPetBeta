-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-04-2023 a las 02:26:21
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

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
  `id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `valoracion` float NOT NULL,
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_veterinario_mascota`
--

CREATE TABLE `cita_veterinario_mascota` (
  `id_mascota` int(11) NOT NULL,
  `id_veterinario` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `id_veterinario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `raza` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso` double NOT NULL,
  `altura` double NOT NULL,
  `sexo` tinyint(4) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido_p` varchar(40) NOT NULL,
  `apellido_m` varchar(40) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_nacimientno` date NOT NULL,
  `genero` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nombre`, `apellido_p`, `apellido_m`, `telefono`, `email`, `fecha_nacimientno`, `genero`, `password`) VALUES
(1, 'jhovan', 'Jhovan', 'Rodriguez', 'Moreno', '8341061102', 'jrdzmoreni@gmail.com', '2017-09-02', 1, '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinaria`
--

CREATE TABLE `veterinaria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `codigo_postal` smallint(6) NOT NULL,
  `telefono` int(11) NOT NULL,
  `horario` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`horario`)),
  `estado` tinyint(4) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario_mascota`
--

CREATE TABLE `veterinario_mascota` (
  `id_mascota` int(11) NOT NULL,
  `id_veterinaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cita_veterinario_mascota`
--
ALTER TABLE `cita_veterinario_mascota`
  ADD KEY `id_cita` (`id_cita`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_veterinario` (`id_veterinario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `veterinaria`
--
ALTER TABLE `veterinaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita_veterinario_mascota`
--
ALTER TABLE `cita_veterinario_mascota`
  ADD CONSTRAINT `cita_veterinario_mascota_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id`),
  ADD CONSTRAINT `cita_veterinario_mascota_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`),
  ADD CONSTRAINT `cita_veterinario_mascota_ibfk_3` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id`),
  ADD CONSTRAINT `cita_veterinario_mascota_ibfk_4` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`),
  ADD CONSTRAINT `cita_veterinario_mascota_ibfk_5` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinaria` (`id`),
  ADD CONSTRAINT `cita_veterinario_mascota_ibfk_6` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinaria` (`id`);

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
  ADD CONSTRAINT `veterinario_mascota_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`),
  ADD CONSTRAINT `veterinario_mascota_ibfk_2` FOREIGN KEY (`id_veterinaria`) REFERENCES `veterinaria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
