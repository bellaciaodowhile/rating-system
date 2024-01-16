-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2024 a las 16:16:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reviews_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `idAdmin` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`idAdmin`, `id`, `title`, `image`) VALUES
(16, 'yApwAM7OEEiByDd8g0Ya', 'Ramiro Velasquez', 'default.avif'),
(17, 'zwXKNRJxc3i92B8SKkcF', 'Samira Lolera', 'vGyxgDU8QEM3bstnsQX7.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `idAdmin` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `post_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`idAdmin`, `id`, `post_id`, `user_id`, `rating`, `title`, `description`, `date`) VALUES
(41, 'ZNiVjy5OOhEuX9f0fXc0', 'zwXKNRJxc3i92B8SKkcF', '0aPxTFjeJbD9RPeLHcjF', '5', 'Compra de USDT', 'Contrasena calidad', 'Enero 15, 2024 7:39 PM'),
(42, 'Q48Uw0ycox9UWElY1wGr', 'zwXKNRJxc3i92B8SKkcF', '0aPxTFjeJbD9RPeLHcjF', '5', 'fdsafdsa', 'fdsafdsa', 'Enero 15, 2024 7:39 PM'),
(43, '3dCWkfjKwUzJ7EiHPPik', 'zwXKNRJxc3i92B8SKkcF', '0aPxTFjeJbD9RPeLHcjF', '5', 'Ultimo', 'que te pasa bolivar', 'Enero 15, 2024 7:43 PM'),
(45, 'lSrVf5yhTA5fHc2mwbfV', 'zwXKNRJxc3i92B8SKkcF', '0aPxTFjeJbD9RPeLHcjF', '5', 'fdsafdsa123', '123', 'Enero 15, 2024 7:45 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idAdmin` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(30) NOT NULL,
  `vip` varchar(222) NOT NULL,
  `vip_status` varchar(222) NOT NULL,
  `date_vip` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idAdmin`, `id`, `name`, `email`, `password`, `image`, `vip`, `vip_status`, `date_vip`) VALUES
(11, '0aPxTFjeJbD9RPeLHcjF', 'Ramiro Velasquez', 'email@gmail.com', '$2y$10$JVX/DJrS4JyUacYOauR9zeN7aJWdjpl0AMNSk18uWCe24MowSVyEC', 'default.avif', '123123', '1', 'Enero 16, 2024 11:12 AM'),
(12, 'SxtlFJtBR7QTDDYEwePN', 'Samira Lolera', 'correo@gmail.com', '$2y$10$162kf0pXBVxX.ILWqDH94.WHfLuj8okpXFaPmmfUW5JUUiiXRRZLu', 'vGyxgDU8QEM3bstnsQX7.jpg', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idAdmin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
