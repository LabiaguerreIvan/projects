-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2024 a las 23:00:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `club_futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuarios`
--

CREATE TABLE `estado_usuarios` (
  `cod_estado_usuario` int(11) NOT NULL,
  `desc_estado_usuario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_usuarios`
--

INSERT INTO `estado_usuarios` (`cod_estado_usuario`, `desc_estado_usuario`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extremidades`
--

CREATE TABLE `extremidades` (
  `cod_extremidad` int(11) NOT NULL,
  `desc_extremidad` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `extremidades`
--

INSERT INTO `extremidades` (`cod_extremidad`, `desc_extremidad`) VALUES
(1, 'Izquierda'),
(2, 'Derecha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `cod_jugador` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `posicion` int(11) NOT NULL,
  `posicion_alternativa` int(11) NOT NULL,
  `pierna_habil` int(11) NOT NULL,
  `mano_habil` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `numero_camiseta` int(11) NOT NULL,
  `telefono_emergencia` varchar(15) DEFAULT NULL,
  `email_contacto` varchar(100) NOT NULL,
  `dniUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`cod_jugador`, `dni`, `nombre`, `apellido`, `fecha_nacimiento`, `posicion`, `posicion_alternativa`, `pierna_habil`, `mano_habil`, `estado`, `numero_camiseta`, `telefono_emergencia`, `email_contacto`, `dniUsuario`) VALUES
(1, 12345678, 'Axel', 'Castillo', '2009-09-02', 1, 2, 1, 2, 3, 1, '12345670', 'axel@gmail.com', 87654321),
(3, 45496234, 'Ivan', 'Labiaguerre', '2004-02-04', 4, 3, 2, 1, 3, 7, '3765138755', 'labiaguerreivan@gmail.com', 45496234),
(4, 87654321, 'Maximo', 'Frankowski', '2004-02-22', 2, 1, 1, 2, 3, 10, '21313442', 'maximofrankowski@gmail.com', 77777777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE `posicion` (
  `cod_posicion` int(11) NOT NULL,
  `posicion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posicion`
--

INSERT INTO `posicion` (`cod_posicion`, `posicion`) VALUES
(1, 'Arquero'),
(2, 'Defensor'),
(3, 'Mediocampi'),
(4, 'Delantero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `cod_tipo_usuario` int(11) NOT NULL,
  `desc_tipo_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`cod_tipo_usuario`, `desc_tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `nom_usuario` varchar(80) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `clave` varchar(250) DEFAULT NULL,
  `estado_usuario` int(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nom_usuario`, `dni`, `email`, `clave`, `estado_usuario`, `tipo_usuario`) VALUES
(35, 'Ivan Labiaguerre', 45496234, 'labiaguerreivan@gmail.com', '$2y$10$8M/NzVUNgGRucqVXuq2CsuYnow6/9W6qxTW9rDD3QB3Zn5yMUA1me', 1, 1),
(38, 'leonEma', 46730824, 'gilaryemaleon@gmail.com', '$2y$10$4wyobc0x7NLxMRwbID2Ld.J.JGp0kx.YxfPsXO/YXQO/HPlSBxNXa', 2, 2),
(39, 'Julieta Labiaguerre', 49119011, 'julietalabiaguerre20@gmail.com', '$2y$10$gBtFUQi9qf7hQl9Wdt90uO.2ruiHY/pCvoCxv4vWQFIPDDnSyWhCC', 2, 3),
(42, 'Negan', 77777777, 'killer@gmail.com', '$2y$10$pxVjf619WOkjeY0CDQm1zewtRXl5lGSYP9tNtoBBbDuAbhxUPBJjW', 2, 2),
(44, 'Maximo Frankowski', 12345678, 'franko@gmail.com', '$2y$10$esCTWt/Wyb0XggptxCVQmep/u12AsRNazo1c9/OIIH3ohKZgZ0ETa', 1, 3),
(45, 'Franco Kenyuk ', 12345670, 'kenyuk@gmail.com', '$2y$10$sTmd.inV2RQ4obyIDd1UouxGov0TAjI8qUpCdQAzfLeOfNgVtMDLS', 1, 3),
(49, 'Juan Carlos', 87654321, 'juan@gmail.com', '$2y$10$8knytiO8L/XZags8nK56X.0/JyVejZ01DzbyLLb5Rg2Rl/JsEWVaK', 2, 2),
(50, 'Leonel Messi', 35090810, 'leomessi@gmail.com', '$2y$10$eOEdRNDYBfiX8l5aZxX/LeZjHm4Hu0lCqhmAs/DFp4e./afO7XKGa', 2, 2),
(51, 'Luis Galeano', 3456789, 'luis@gmail.com', '$2y$10$kiimuqHt8IKRz5QaHO/kS.lhm21dbzr2..NTJsXdltP.IafBow1wK', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  ADD PRIMARY KEY (`cod_estado_usuario`);

--
-- Indices de la tabla `extremidades`
--
ALTER TABLE `extremidades`
  ADD PRIMARY KEY (`cod_extremidad`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`cod_jugador`);

--
-- Indices de la tabla `posicion`
--
ALTER TABLE `posicion`
  ADD PRIMARY KEY (`cod_posicion`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`cod_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  MODIFY `cod_estado_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `extremidades`
--
ALTER TABLE `extremidades`
  MODIFY `cod_extremidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `cod_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `posicion`
--
ALTER TABLE `posicion`
  MODIFY `cod_posicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `cod_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
