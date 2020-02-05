-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2020 a las 11:34:58
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viaje`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `nombre`) VALUES
('mimi', '$2y$10$L54Hriw6eXUBOo.VaxWUSOesLsMD0WS/CmG/qBg6KZUjghnbv2WT6', 'Maria José');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precioprivado` decimal(8,2) NOT NULL,
  `caducidad` date DEFAULT NULL,
  `imagenurl` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id`, `titulo`, `precio`, `descripcion`, `precioprivado`, `caducidad`, `imagenurl`) VALUES
(1, 'Turquía. 5 días en hotel de lujo.', '450.00', 'Hotel \"buenas vistas\"<br>\r\nCon sauna, masaje<br>\r\nPrecio por persona en habitación doble\r\n', '250.00', '2020-02-29', 'https://loremflickr.com/640/480/turquia?lock=2'),
(2, 'Shanghai - Beijing en tren. 12 días. Vuelo incluido', '1220.40', '5 días en hotel de 4 estrellas en Beijing.</br>\r\nBillete para el tren transcontinental turísitico.</br>\r\n4 días en hotel de 3 estrellas en Beijing, con excursiones organizadas\r\n', '780.30', '2020-02-29', 'https://loremflickr.com/640/480/shanghai?lock=1'),
(3, 'Praga, pensión completa 5 días.', '340.95', 'Incluye 4 noches de hotel de tres estrellas en habitación doble.<br>\r\nPaseo por el rio en barca<br>\r\n', '251.23', '2020-02-29', 'https://loremflickr.com/640/480/praga?lock=1'),
(4, 'Retiro espiritual en La Almunia de Doña Godina', '589.21', '7 Días de retiro y meditación con los monjes marrasquinos.<br>\r\nUn paraje incomparable en un edificio único', '380.23', '2020-02-26', 'https://loremflickr.com/640/480/monk?lock=1'),
(5, 'Ruta gastronómica por Minglanillas de la Oliva', '399.99', '4 días conociendo los mejores restaurantes y albergues.<br>\r\nUna experiencia única para mochileros amantes de la gastronomía.<br>\r\nIncluye desayuno* y almuerzo* en lugares típicos.\r\n<hr>\r\n* Con opción vegan.\r\n', '310.00', '2020-02-29', 'https://loremflickr.com/640/480/meal,vegan/all?lock=2'),
(6, 'Excursión a Ayna (Albacete), siguiendo los pasos de Jimmy y Teodoro.', '269.00', 'Incluye alojamiento de lujo en casa rural, pero solo si puedes mantener una conversación sobre Dostoievski (si no, en el hostal del pueblo).<br>\r\nVisita a la casa de la Paddington y al huerto de la calabaza.<br>\r\nLa última noche saldremos pronto para ver amanecer.\r\n', '220.50', '2020-02-24', 'https://www.eldiario.es/fotos/Teodoro-Jimmy-llegando-pueblo-Amanece_EDIIMA20170703_0375_5.jpg'),
(7, 'Seis dias de deportes acuáticos en Campello.', '490.00', 'Cinco noches de hotel tres estrellas en primera línea de playa<br>\r\nMedia pensión<br>\r\nIncluye tres mañanas de clases de windsurf, natación en aguas abiertas y water sky.', '410.00', '0000-00-00', 'https://loremflickr.com/cache/resized/7594_17122985605_77c954eb42_c_640_480_nofilter.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
