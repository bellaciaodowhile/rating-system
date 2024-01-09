-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2024 a las 03:25:39
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
(10, 'nfPlb6mZcI5yMQvxBEV2', 'nombre apellido', 'default.avif'),
(11, 'r5mrrd0Ewy2NDpfgK6Os', 'Mario', 'default.avif'),
(12, '73c6k60r6GMDeAerkGaO', 'Cosas que tener', 'CibJBycH027mdvX6amTj.jpeg');

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
(5, 'nkG06vKYLXlOD7nV32Yu', 'nfPlb6mZcI5yMQvxBEV2', 'vJtDwOWppXLmUlad03cY', '1', 'ue teas', 'Agradezco', ''),
(6, 'gFSJOigxG4JqJjDOvLOK', 'nfPlb6mZcI5yMQvxBEV2', 'vJtDwOWppXLmUlad03cY', '3', 'fdsafdsa', 'fdsafdsa', ''),
(7, 'KsgqZ3wMUrLLIskg4QIj', 'nfPlb6mZcI5yMQvxBEV2', 'VANt87jOnQsxJY73Bqbs', '5', 'Calidad', 'calidad', ''),
(8, 'QN5k8ffiQdIkw5a5eHjT', 'nfPlb6mZcI5yMQvxBEV2', 'VANt87jOnQsxJY73Bqbs', '1', 'vale ', 'conchale', ''),
(9, 'ZmXBQi1xZUBOcDsOg86r', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '5', 'Ahorita', 'contrasena', ''),
(10, 'keXGehslW2vXxXqq2l4E', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '5', 'SDabanita', 'conachas', ''),
(11, '87JlFZOKKT78Esxk1G5K', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '1', 'Vale ', '$get_id = $_GET[&#39;get_id&#39;];', ''),
(12, 'nXkDTO628KU8UJMtn2lW', 'fdsfd', 'tPI3880aVbmQqYkzy9E8', '1', 'fdsa', 'fdsa', ''),
(13, 'YbcQv41MnZbkAqQGoneG', 'r5mrrd0Ewy2NDpfgK6Os', 'tPI3880aVbmQqYkzy9E8', '1', '', 'es calidad vender placas, pero no tanto', ''),
(14, 'WlWcBVOXGGww28OMl1Mn', 'r5mrrd0Ewy2NDpfgK6Os', 'tPI3880aVbmQqYkzy9E8', '1', 'placas', 'es malo vendiendo placas', ''),
(15, 'ElneteVxzF8mNCsUvRtI', 'r5mrrd0Ewy2NDpfgK6Os', 'tPI3880aVbmQqYkzy9E8', '1', 'Negra', 'Marron con clase', ''),
(16, 'jmMpCPnoGOYLHnuK11g7', 'r5mrrd0Ewy2NDpfgK6Os', 'tPI3880aVbmQqYkzy9E8', '1', 'Venta de palomas', 'le gustan muchas palomas', ''),
(17, 'Ltf53zPWlLEGNIDhMTop', 'r5mrrd0Ewy2NDpfgK6Os', 'tPI3880aVbmQqYkzy9E8', '1', 'Mario', 'es gay', ''),
(18, 'WVEJ6E87QoExlLzNgC9T', 'r5mrrd0Ewy2NDpfgK6Os', 'tPI3880aVbmQqYkzy9E8', '1', 'mario', 'fdsafdsa', ''),
(19, 'fU3zuojoaKhpn9QGID35', 'r5mrrd0Ewy2NDpfgK6Os', 'tPI3880aVbmQqYkzy9E8', '1', 'fdsa', 'fdsa', ''),
(20, 'fWDbSnsFIjlZKAPNSO9K', 'r5mrrd0Ewy2NDpfgK6Os', 'tPI3880aVbmQqYkzy9E8', '1', 'fdsa', 'fdsa', ''),
(21, 'd3Njk0FdZIA70GaSzBO0', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '2', 'Esta es el titulo', 'Y ahora la description', ''),
(22, '9DrGBGglGwieLxYoHmDO', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '2', 'Esta es el titulo', 'Y ahora la description', ''),
(23, 'BW0N1pBHPNf7int6lD6q', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '1', 'esafdsa', 'fdsa', ''),
(24, '6oWxqkz2m0GUWdoNvu8s', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '1', 'esafdsa', 'fdsa', ''),
(25, 'Qa9LzdeXIz8oTADPPgoC', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '5', 'Novale', 'Claro que si', ''),
(26, 'fpFXJnkLM5Qk6yvcKwAv', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '2', 'Esta es la otra vale', 'Claro que siss', ''),
(27, 'mBE5lAZFmlHJUcx7NgDW', '73c6k60r6GMDeAerkGaO', 'tPI3880aVbmQqYkzy9E8', '3', 'Putocarro', 'estasies', '');

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
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idAdmin`, `id`, `name`, `email`, `password`, `image`) VALUES
(5, 'tPI3880aVbmQqYkzy9E8', 'nombre apellido', 'email@gmail.com', '$2y$10$qyRIUGfKNeajLgmA6GULoeN2MgiYfTcdXhdTqQKSqcNnIHJJS4HM2', 'default.avif'),
(6, 'vJtDwOWppXLmUlad03cY', 'Mario', 'kart@mail.com', '$2y$10$EwHDpnH0PZQ9bAo.eP3X5.XnDrfNRuVFTlDHUeOQGlA4/VtvyUOeG', 'default.avif'),
(7, 'VANt87jOnQsxJY73Bqbs', 'Cosas que tener', 'cosas@gmail.com', '$2y$10$UpOndPNIk2CmJybOt4k0zeaIina2uRv1po.pOyeOG0vc59tie5fd6', 'CibJBycH027mdvX6amTj.jpeg');

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
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
