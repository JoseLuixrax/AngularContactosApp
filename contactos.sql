-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2023 a las 10:38:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contactos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, 'afroman', '123456789', 'afroman@gmail.com', '2023-01-27 12:29:32', '2023-02-15 12:20:00'),
(2, 'felipe', '132456789', 'felipe@gmail.com', '2023-01-27 12:29:54', '2023-02-15 08:05:08'),
(3, 'danisan', '123456789', 'danisan@gmail.com', '2023-01-27 13:38:56', '2023-02-15 12:19:52'),
(4, 'luis', '123456789', 'luis@gmail.com', '2023-01-27 13:39:53', '2023-02-15 12:19:42'),
(7, 'juanillo', '123456789', 'juanillo@gmail.com', '2023-02-10 13:40:14', '2023-02-10 13:40:14'),
(11, 'chechu', '123456789', 'chechu@gmail.com', '2023-02-10 13:42:59', '2023-02-15 12:23:42'),
(12, 'manolo', '233333235', 'manolo@yahoo.com', '2023-02-10 13:43:07', '2023-02-14 08:01:24'),
(14, 'josemi', '222344234', 'josemi@gmail.com', '2023-02-14 07:39:05', '2023-02-15 12:20:15'),
(16, 'mewtwo', '22321342', 'mewtwo2', '2023-03-13 08:22:19', '2023-03-13 08:22:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
