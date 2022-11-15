-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 23:02:12
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.hotmail.com', '$2a$12$S9hgyqSjmbTcMK52fbtoBOYhmscXfProDcwnlFSDdMvUNNmui.f/2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `genero`) VALUES
(1, 'Acción'),
(2, 'Aventura'),
(3, 'Arcade'),
(4, 'Deportivo'),
(5, 'Carrera'),
(6, 'Estrategia'),
(7, 'Supervivencia'),
(8, 'Simulación'),
(9, 'Musicales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_de_lanzamiento` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `caracteristica` varchar(50) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id`, `nombre`, `fecha_de_lanzamiento`, `descripcion`, `caracteristica`, `id_genero`) VALUES
(177, 'Counter-Strike: Global Offensive', '21/08/2012', 'Es un videojuego de disparos en primera persona', 'Multijugador', 1),
(178, 'It Takes Two', '26/03/2021', 'Invita a un amigo a acompañarte en una emotiva historia repleta de desafíos ', 'Multijugador', 2),
(179, 'Cuphead', '29/09/2017', 'La historia trata acerca de dos hermanos, el protagonista Cuphead y Mugman, que deben derrotar a varios enemigos y jefes para poder saldar una deuda que tenían pendiente con el diablo', 'Multijugador', 3),
(180, 'Tony Hawk\'s Pro Skater 2', '19/09/2000', 'Es un videojuego de skateboarding en el que sumas puntos haciendo diferentes trucos en un mapa libre', 'Un Jugador', 4),
(181, 'FlatOut 2', '1/08/2006', 'En estas carreras a gran velocidad, cuanto más daños causes, mejor. Los últimos coches con turbo y los competidores más locos te están esperando para probar tus habilidades destructivas', 'Un Jugador', 5),
(182, 'Age Of Empires III', '15/09/2009', 'Está ambientado en la época de la colonización europea de América, el jugador opta por una civilización y debe engrandecerla recolectando recursos, construyendo edificios, desarrollando tecnologías y destruyendo a los enemigos', 'Un Jugador', 6),
(183, 'Terraria', '16/05/2011', 'Es un videojuego de mundo abierto en 2D. Contiene elementos de construcción, exploración, aventura y combate', 'Multijugador', 7),
(184, 'Rust', '8/02/2018', 'Es un juego de supervivencia en primera persona en el que debemos colaborar con otros jugadores en un mundo persistente en el que el único objetivo es sobrevivir', 'Multijugador', 7),
(185, 'Slime Rancher', '1/08/2017', 'Slime Rancher es la historia de Beatrix LeBeau, una intrépida y joven ranchera que se prepara para una vida a mil años luz de la Tierra en la ‘Lejana, Lejana Pradera’ donde prueba su suerte para ganarse la vida lidiando con slimes', 'Un jugador', 8),
(186, 'Geometry Dash', '22/12/2014', 'Se trata de un juego de plataformas retro, en el que deberemos ir saltando y volando al ritmo de la musica para evitar morir a lo largo de los obstáculos que nos van apareciendo', 'Un Jugador', 9),
(189, 'A Dance of Fire and Ice', '24/01/2019', 'Es un juego de ritmo estricto que trata sobre golpear en el ritmo principal de la musica', 'Un jugador', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero_videojuego` (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD CONSTRAINT `genero_videojuego` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
