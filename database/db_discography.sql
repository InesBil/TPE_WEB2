-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 23:41:58
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
-- Base de datos: `db_discography`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `album` varchar(45) NOT NULL,
  `year` year(4) NOT NULL,
  `genre` varchar(45) NOT NULL,
  `length` time NOT NULL,
  `id_records_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id`, `img`, `album`, `year`, `genre`, `length`, `id_records_fk`) VALUES
(1, 'Whatever_People.jpg ', 'Whatever People Say I Am, That\'s What I\'m Not', 2006, 'Indie rock', '40:56:00', 1),
(2, 'Favourite_Worst.jpg', 'Favourite Worst Nightmare', 2007, 'Indie rock', '37:50:00', 2),
(3, 'Humbug.jpg', 'Humbug', 2009, 'Rock psicodélico', '39:20:00', 1),
(4, 'Suckitandsee.jpg', 'Suck It and See', 2011, 'Pop rock', '40:09:00', 2),
(5, 'AM.jpg', 'AM', 2013, 'Indie rock', '41:43:00', 3),
(6, 'Tranquility_Base_Hotel_Casino.jpg', 'Tranquility Base Hotel & Casino', 2018, 'Pop psicodélico', '40:51:00', 1),
(7, 'At_the_polo.jpg', 'At the Apollo', 2008, 'Rock', '76:00:00', 4),
(8, 'Live_at_the_Royal_Albert_Hall.jpg', 'Live at the Royal Albert Hall ', 2020, 'Pop rock', '86:07:00', 1),
(9, 'Five_Minutes_with_Arctic_Monkeys.jpg', 'Five Minutes with Arctic Monkeys', 2005, 'Post-punk revival', '06:11:00', 5),
(10, 'Who_the_Fuck_Are_Arctic_Monkeys.jpg', 'Who the Fuck Are Arctic Monkeys?', 2006, 'Indie rock', '18:51:00', 1),
(12, 'Leave_Before_the_ligths_come_on.jpg\n', 'Leave Before the Lights Come On', 2006, 'Alternative', '09:50:00', 1),
(19, 'The_Car.jpg', 'The Car', 2022, 'Indie', '37:18:00', 1),
(20, 'Beneath_the_Boardwalk.jpg', 'sale con fritas', 2004, 'Indie rock', '46:21:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `records`
--

CREATE TABLE `records` (
  `fk_records_id` int(11) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `records` varchar(45) NOT NULL,
  `producer` varchar(45) NOT NULL,
  `studio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `records`
--

INSERT INTO `records` (`fk_records_id`, `img`, `records`, `producer`, `studio`) VALUES
(1, 'Domino_Records.jpg', 'Domino Records', 'Jim Abbiss', 'Chapel Studios, L'),
(2, 'warner_records.jpg', 'Warner Bros', 'James Ford', 'Miloco Studios'),
(3, 'sony.jpg', 'Sony Music', 'Ross Orton', 'Sage & Sound Recording'),
(4, 'warp-films.jpg', 'Warp Films', 'Diarmid Scrimshaw', 'Sheffield & London'),
(5, 'bang-bang-records.jpg', 'Bang Bang Records', 'Mike Crossey', 'Southbank');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'admin@admin', '$2a$06$PfHybeTJIzqgBaIjXDP1e.DzfALtBCblE86WEj8z2ucNedxUcGAYW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_records_fk` (`id_records_fk`);

--
-- Indices de la tabla `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`fk_records_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `records`
--
ALTER TABLE `records`
  MODIFY `fk_records_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`id_records_fk`) REFERENCES `records` (`fk_records_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
