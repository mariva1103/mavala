-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2023 a las 23:26:45
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
-- Base de datos: `mavala`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id` bigint(12) NOT NULL,
  `idProduc` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eits`
--

CREATE TABLE `eits` (
  `idEits` bigint(20) NOT NULL,
  `nomEits` varchar(30) NOT NULL,
  `desEits` text NOT NULL,
  `imgEits` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eits`
--

INSERT INTO `eits` (`idEits`, `nomEits`, `desEits`, `imgEits`) VALUES
(0, 'VIH', 'El virus de la inmunodeficiencia humana (VIH) ataca el sistema inmunitario y debilita los sistemas de defensa contra las infecciones y contra determinados tipos de cáncer. A medida que el virus destruye las células inmunitarias e impide el normal funcionamiento de la inmunidad, la persona infectada va cayendo gradualmente en una situación de inmunodeficiencia. La función inmunitaria se suele medir mediante el recuento de linfocitos CD4.\r\nLa fase más avanzada de la infección por el VIH es el Síndrome de inmunodeficiencia adquirida o sida que, en función de la persona, puede tardar de 2 a 15 años en manifestarse.\r\nLos síntomas de la infección pueden ser presentar un cuadro seudogripal con fiebre, cefalea, erupciones o dolor de garganta, inflamación de los ganglios linfáticos, pérdida de peso, fiebre, diarrea y tos. ', 'sida.png'),
(4, 'sida', 'ijaindiad', 'WIN_20230818_08_40_36_Pro.jpg'),
(45, 'oso', 'delicioso', 'WIN_20230818_10_29_59_Pro.jpg'),
(55, 'holi', 'zzz', 'WIN_20230818_10_29_59_Pro.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farma`
--

CREATE TABLE `farma` (
  `id` bigint(12) NOT NULL,
  `nomFarm` varchar(20) NOT NULL,
  `barFarm` varchar(30) NOT NULL,
  `dirFarm` varchar(40) NOT NULL,
  `telFarm` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `farma`
--

INSERT INTO `farma` (`id`, `nomFarm`, `barFarm`, `dirFarm`, `telFarm`) VALUES
(2, 'cruz ', 'candido', 'calle 2c n 24-18', 3202389045),
(3, 'la paris', 'catedrall', 'calle 2c n 24-65', 3213690126),
(58, 'la rebaja ', 'los guaduales ', 'calle 2c n 24-18', 8777777),
(88, 'jAJAJA', 'koko', '12c 25', 3188601515);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProduc` bigint(30) NOT NULL,
  `nomProduc` varchar(30) NOT NULL,
  `desProduc` text NOT NULL,
  `precioProduc` bigint(30) NOT NULL,
  `fotoProduc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProduc`, `nomProduc`, `desProduc`, `precioProduc`, `fotoProduc`) VALUES
(1, 'Durex', 'Están hechos de látex de caucho natural y presentan un diseño anatómico que facilita su colocación y proporciona un ajuste seguro y cómodo. ofrecen protección confiable contra el embarazo y las enfermedades de transmisión sexual. ', 11000, 'durex.png'),
(4, 'Today Long Action', 'Today Condones Long Action, Retardante: Larga Duración, Posee un lubricante especial que te permitirá prolongar por más tiempo tu relación. Máxima calidad comprobada, seguridad, sensibilidad y control de calidad electrónico ', 27000, 'today.webp'),
(5, 'Today con Espermicida', 'Provee protección adicional por su Espermicida lo cual ayudar a evitar embarazos. Especialmente lubricado para crear una sensación natural y placentera dando una buena experiencia.', 17000, 'today.jpg'),
(6, 'Toallas Nosotras', 'Toalla Nosotras son absorbentes e Invisibles con Rapisec atrapa rápidamente el flujo y lo retiene evitando manchas y accidentes, así mantiene tu Zona V fresca, limpia y protegida, y a ti sintiéndote segura y confiada.', 8000, 'nosotras.webp'),
(7, 'kotex', 'Cuenta con una nueva tecnología NeutraOdor que encapsula los olores y una cubierta extra suave para máxima comodidad, además su diseño anatómico ayuda a que la toalla no se mueva ayudando así, a prevenir desbordes', 8000, 'kotexx.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idAdmin` int(10) NOT NULL,
  `nomAdmin` varchar(20) NOT NULL,
  `emailAdmin` varchar(30) NOT NULL,
  `passAdmin` bigint(10) NOT NULL,
  `numAdmin` bigint(20) NOT NULL,
  `generoAdmin` varchar(10) NOT NULL,
  `tipoAdmin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idAdmin`, `nomAdmin`, `emailAdmin`, `passAdmin`, `numAdmin`, `generoAdmin`, `tipoAdmin`) VALUES
(1, 'laura hoyos ', 'laurhoyos11@gmail.com', 1108, 3188601556, 'femenina', 1),
(2, 'mariana osorio osori', 'marianaosorio276@gmail.com', 2205, 3213690126, 'femenino', 1),
(3, 'valentina cruz ', 'karol.valeka@gmail.com', 2020, 3107505715, 'femenino', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD KEY `idProduc` (`idProduc`),
  ADD KEY `idFarm` (`id`);

--
-- Indices de la tabla `eits`
--
ALTER TABLE `eits`
  ADD PRIMARY KEY (`idEits`);

--
-- Indices de la tabla `farma`
--
ALTER TABLE `farma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProduc`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `control_ibfk_2` FOREIGN KEY (`idProduc`) REFERENCES `productos` (`idProduc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `control_ibfk_3` FOREIGN KEY (`id`) REFERENCES `farma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
