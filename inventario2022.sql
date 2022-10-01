-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-09-2022 a las 23:36:06
-- Versión del servidor: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario2022`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_cajones`
--

CREATE TABLE `inv_cajones` (
  `id_cajon` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_gabeta` int(11) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inv_cajones`
--

INSERT INTO `inv_cajones` (`id_cajon`, `nombre`, `id_gabeta`, `estatus`) VALUES
(506, 'Cajon 1', 65, 'inactivo'),
(507, 'Cajon 2', 54, 'inactivo'),
(509, 'Cajon 4', 54, 'inactivo'),
(510, 'Cajon 1', 55, 'activo'),
(511, 'Cajon 2', 55, 'activo'),
(512, 'gabeta1', 55, 'activo'),
(533, 'Cajon 1', 62, 'activo'),
(534, 'Cajon 2', 62, 'activo'),
(535, 'Cajon 3', 62, 'activo'),
(536, 'Cajon 1', 63, 'activo'),
(537, 'Cajon 2', 63, 'activo'),
(538, 'Cajon 3', 63, 'activo'),
(539, 'Cajon 4', 63, 'activo'),
(540, 'Cajon 5', 63, 'activo'),
(541, 'Cajon 6', 63, 'activo'),
(542, 'Cajon 7', 63, 'activo'),
(543, 'Cajon 8', 63, 'activo'),
(544, 'Cajon 9', 63, 'activo'),
(545, 'Cajon 10', 63, 'activo'),
(548, 'Cajon 1', 65, 'inactivo'),
(549, 'Cajon 2', 65, 'inactivo'),
(566, 'Cajon 1', 68, 'inactivo'),
(567, 'Cajon 2', 68, 'inactivo'),
(568, 'Cajon 3', 68, 'inactivo'),
(569, 'Cajon 4', 68, 'inactivo'),
(570, 'Cajon de adan 3', 69, 'inactivo'),
(571, 'Cajon de adan 4', 69, 'inactivo'),
(572, 'Cajon 3', 69, 'inactivo'),
(573, 'Cajon 4', 69, 'inactivo'),
(575, 'Cajon 1', 70, 'inactivo'),
(576, 'Cajon 2', 70, 'inactivo'),
(577, 'Cajon 3', 70, 'inactivo'),
(578, 'Cajon 1', 71, 'inactivo'),
(579, 'Cajon 2', 71, 'inactivo'),
(580, 'Cajon 3', 71, 'inactivo'),
(581, 'TUERCAS XD', 71, 'inactivo'),
(585, 'CAJON 0001', 68, 'inactivo'),
(586, 'CAJON 0002', 68, 'inactivo'),
(587, 'Cajon CHIDO', 73, 'inactivo'),
(588, 'Cajon 2', 71, 'inactivo'),
(589, 'Cajon 3', 73, 'inactivo'),
(590, 'Cajon 4', 73, 'inactivo'),
(591, 'Cajon 5', 73, 'inactivo'),
(592, 'Cajon 6', 73, 'inactivo'),
(593, 'Cajon 7', 73, 'inactivo'),
(594, 'Cajon 8', 73, 'inactivo'),
(595, 'Cajon 9', 73, 'inactivo'),
(596, 'Cajon 1', 74, 'inactivo'),
(597, 'PINZAS', 73, 'inactivo'),
(598, 'Cajon 1', 75, 'inactivo'),
(599, 'Cajon 2', 75, 'inactivo'),
(600, 'Cajon 3', 75, 'inactivo'),
(601, 'Cajon 4', 75, 'inactivo'),
(602, 'Cajon 5', 75, 'inactivo'),
(603, 'Cajon 6', 75, 'inactivo'),
(604, 'Cajon 7', 75, 'inactivo'),
(605, 'Cajon 8', 75, 'inactivo'),
(606, 'Cajon 9', 75, 'inactivo'),
(607, 'Cajon 1', 76, 'activo'),
(608, 'Cajon 2', 76, 'activo'),
(609, 'Cajon 3', 76, 'activo'),
(610, 'Cajon 4', 76, 'activo'),
(611, 'Cajon 5', 76, 'activo'),
(612, 'Cajon 6', 76, 'activo'),
(613, 'Cajon 7', 76, 'activo'),
(614, 'Cajon 8', 76, 'activo'),
(615, 'Cajon 9', 76, 'activo'),
(616, 'Cajon 1', 77, 'activo'),
(617, 'Cajon 2', 77, 'activo'),
(618, 'Cajon 3', 77, 'activo'),
(619, 'Cajon 4', 77, 'activo'),
(620, 'Cajon 5', 77, 'activo'),
(621, 'Cajon 6', 77, 'activo'),
(622, 'Cajon 7', 77, 'activo'),
(623, 'Cajon 8', 77, 'activo'),
(624, 'Cajon 9', 77, 'activo'),
(625, 'Cajon 10', 77, 'activo'),
(626, 'Cajon 11', 77, 'activo'),
(627, 'Cajon 12', 77, 'activo'),
(628, 'Cajon 13', 77, 'activo'),
(629, 'Cajon 1', 78, 'activo'),
(630, 'Cajon 2', 78, 'activo'),
(631, 'Cajon 3', 78, 'activo'),
(632, 'Cajon 4', 78, 'activo'),
(633, 'Cajon 5', 78, 'activo'),
(634, 'Cajon 6', 78, 'activo'),
(635, 'Cajon 7', 78, 'activo'),
(636, 'Cajon 8', 78, 'activo'),
(637, 'Cajon 9', 78, 'activo'),
(638, 'Cajon 10', 78, 'activo'),
(639, 'Cajon 11', 78, 'activo'),
(640, 'Cajon 12', 78, 'activo'),
(641, 'Cajon 13', 78, 'activo'),
(648, 'Cajon 1', 81, 'inactivo'),
(649, 'Cajon 2', 81, 'inactivo'),
(650, 'Cajon 3', 81, 'inactivo'),
(651, 'Cajon 1', 82, 'activo'),
(652, 'Cajon 1', 83, 'activo'),
(653, 'Cajon 2', 83, 'activo'),
(654, 'Cajon 3', 83, 'activo'),
(655, 'Cajon 4', 83, 'activo'),
(656, 'Cajon 5', 83, 'activo'),
(657, 'Cajon 6', 83, 'activo'),
(658, 'Cajon 7', 83, 'activo'),
(659, 'Cajon 8', 83, 'activo'),
(660, 'Cajon 9', 83, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_gabeta`
--

CREATE TABLE `inv_gabeta` (
  `id_gabeta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `num_cajones` int(11) NOT NULL,
  `idmecanico` int(11) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inv_gabeta`
--

INSERT INTO `inv_gabeta` (`id_gabeta`, `nombre`, `descripcion`, `num_cajones`, `idmecanico`, `estatus`) VALUES
(54, 'GABETA 3', 'DESCRIPCION', 2, 3, 'inactivo'),
(55, 'gaveta2', 'dfgg', 2, 4, 'activo'),
(62, 'GABETA PRUEBA BRANDON 1', 'BRANDON 1', 3, 4, 'activo'),
(63, 'SERRUCHOS', 'LOS SERRUCHOS', 10, 4, 'activo'),
(65, 'GABETA 2', 'DESCRIPCION', 2, 3, 'inactivo'),
(68, 'SEGUETAS', 'PARA CORTE', 4, 5, 'inactivo'),
(69, 'DESARMADORES', 'DESCRIPCION DE DESARMADORES', 4, 5, 'inactivo'),
(70, 'GABETA 1', 'ALGO', 3, 3, 'inactivo'),
(71, 'MARTILLOS', 'DESCRIPCION DE MARTILLOS', 3, 5, 'inactivo'),
(73, 'GAVETA CHIDA', '1.1.1', 9, 5, 'inactivo'),
(74, 'GAVETA 2', '2', 1, 10, 'inactivo'),
(75, 'Husky 1', 'Herramienta de mecanicos', 9, 11, 'inactivo'),
(76, 'Gaveta Husky 1', 'Herramienta mecanica', 9, 12, 'activo'),
(77, 'Snap-on', 'Recepcion', 13, 13, 'activo'),
(78, 'Caja herramienta truper', 'Extensión de 12,7mm x127', 13, 14, 'activo'),
(81, 'Prueba ', 'Prueba ', 3, 10, 'inactivo'),
(82, 'Prueba', 'Gaveta de prueba ', 1, 10, 'activo'),
(83, 'Husky 2. 1/4 oz', 'Es la gaveta que tiene Sakura de estampa', 9, 15, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_herramienta`
--

CREATE TABLE `inv_herramienta` (
  `idHerramienta` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `costo` double NOT NULL,
  `piezas` int(11) NOT NULL,
  `estado` int(11) DEFAULT 0,
  `anomalia` varchar(300) DEFAULT NULL,
  `inventario` varchar(50) DEFAULT 'alta',
  `id_cajon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inv_herramienta`
--

INSERT INTO `inv_herramienta` (`idHerramienta`, `foto`, `nombre`, `descripcion`, `costo`, `piezas`, `estado`, `anomalia`, `inventario`, `id_cajon`) VALUES
(68, '4d40979db09380083d4e386f25199146.jpg', 'llave inglesa', 'llave para mecanicos 2', 8, 3, 1, 'se nada', 'alta', 570),
(82, 'sinfoto.png', '1', 'llave para mecanicos', 2, 2, 0, '', 'alta', 536),
(83, 'sinfoto.png', '2', 'llave para mecanicos', 22, 22, 0, '', 'alta', 537),
(84, 'sinfoto.png', 'HERRAMINTA PRUEBA 1', 'HERRAMINTA PRUEBA 1', 4, 4, 0, '', 'alta', 538),
(87, 'sinfoto.png', 'jkldjklajdkldas', 'saddasd', 2, 22, 1, '', 'alta', 625),
(88, 'eadf766f3e6c8dbf5f66f5c75c043d97.png', 'DESARMADOR CHIDOTE', 'DE CRUZ DE CRISTO', 1000, 6, 1, 'se rompio', 'alta', 506),
(89, 'cb7a3af56ba6832b740444369143c507.jpeg', 'pinza 2', 'pinza caiman', 300, 2, 1, '', 'alta', 578),
(90, '7d6446a439688ff676a85a4f11bb9447.jpeg', 'pinza', 'pinza caiman', 300, 2, 1, 'ESTE ES DE OTRO CAJON', 'alta', 585),
(91, '37339b87656326bab686b2c467f7969a.png', 'Desatornillador', 'llave para mecanicos', 33, 3, 1, '', 'alta', 628),
(92, '8f7e75444800555b8c42414c5819dbd6.jpg', 'Desatornillador', 'punta cruz', 34, 3, 1, '', 'alta', 578),
(93, '6ece5be12b8649a5e3184aabbf61f0b2.jpg', 'Herramienta', 'llave para mecanicos', 3, 3, 1, '', 'alta', 578),
(94, '1cca44d92fd0c621bd853569040ad5db.jpg', 'Tuercas de rosca ', 'rosca', 23, 1, 1, '', 'alta', 581),
(95, 'b3e7a716a6a334da037e46a02ce77425.jpeg', 'DESARMADOR PUNTA DE CRUZ', '9/16', 80, 3, 1, '', 'alta', 589),
(96, '0a47f5153f7e7b31c362b282219c1492.jpg', 'Pinza de presion trupper ', 'cromada', 66, 3, 1, 'regular', 'alta', 598),
(97, '1db52b8f0a98228ead32208127b2bfe8.jpg', 'torque Urrea 1/2', 'mango metalico', 1, 1, 0, 'funcionable ', 'alta', 607),
(98, '95036a86d60f25064800de6bb7e632cf.jpg', 'maneral Urrea 1/2', 'maneral articulado', 1, 1, 0, 'funcionable', 'alta', 607),
(99, '8659425de2a4c2191dbf40233b490c09.jpg', 'Maneral articulado snap-on 1/2', 'color cromo', 1, 1, 0, 'funcionable ', 'alta', 607),
(100, 'ca4a4e8dcaf4d1daf1726c2997d66a90.jpg', 'Extención de 20 cm (1/2) truper', 'cromada', 1, 1, 0, 'desgastada de la entrada de la matraca', 'alta', 607),
(101, '363dd07bb4feeb334b1f981be70b394c.jpg', 'Extención de 12 cm (1/2) truper', 'cromada', 1, 1, 0, 'desgastada y golpeada de la entrada de la matraca', 'alta', 607),
(102, '6512cb773471ddbfc80c5a70a43a6039.jpg', 'Caja de dados de impacto de 1/2 (17,19,21,22', 'es una caja negra, dado 19 estrellado', 1, 3, 0, 'hace falta un dado de medida 21', 'alta', 607),
(103, '73e1fd0acd69e3808d9181d4d4fd9c6f.jpg', 'Iman truper', 'color negro con punta cromada', 1, 1, 0, 'usado pero aún funciona', 'alta', 607),
(104, '3ac12192cb0ffbf70f364da181422422.jpg', 'Ahorcadores ', 'color cromados', 1, 2, 0, 'desgastadas pero funcionan aun', 'alta', 607),
(105, '05ccb6cb44ae39df3e1c66ae7f68c6c1.jpg', 'perico (10) pretul', 'color negro', 1, 1, 0, 'desgastada pero aún funciona', 'alta', 607),
(106, 'e1c88b87b9d23c5c2b927929ba14faf6.jpg', 'Extención (7cm) truper', 'color cromada', 1, 1, 0, 'en buen estado', 'alta', 607),
(107, 'b570a0474c3ad78b6fc1a81e08c01323.jpg', 'Cúter truper ', 'color negro con naranga', 1, 1, 0, 'hace falta la hoja para cortar', 'alta', 607),
(108, 'e4a0299ac9d62ac3ca003dc190a5fda1.jpg', 'calibrador cuenta hilos 4_42', 'v-us-amer-nat', 1, 1, 0, 'funcionable', 'alta', 607),
(109, 'edc5fb5881a6e7b4950bd15e4b316335.jpg', 'Calibrador de hilos 0.4-6.0', 'cromada', 1, 1, 0, 'funcionable', 'alta', 607),
(110, '9abdbd44a311473565e703f31a9705e4.jpg', 'Calibrador de moneda surtek', 'cromada', 1, 1, 0, 'desgastada', 'alta', 607),
(111, '2a61d5853316211af776007fe48a23e7.jpg', 'piensas para cable de bujías ', 'color amarillas', 1, 2, 0, 'están usadas', 'alta', 607),
(112, 'cb5eef61e5cfabd2c279e66cfd5e9e92.jpg', 'Calibrador de lainas truper', 'cromada ', 1, 1, 0, 'contiene lainas desgastadas', 'alta', 607),
(113, 'f83a05a6ff699ee2714dc71eae31b16e.jpg', 'Dado de bujía para extención magnético 5/8 truper', 'cromada', 1, 1, 0, 'en buen estado', 'alta', 608),
(114, '668b9f143248ec862ee4ec4e491e24e9.jpg', 'Dado para bujía 13/16 truper', 'cromada', 1, 1, 0, 'funcionable', 'alta', 608),
(115, '7132416eb30316364d38b7e8bdf3e07f.jpg', 'Dado para bujía 5/8 truper', 'cromada', 1, 1, 0, 'funciona', 'alta', 608),
(116, 'de4db46ff9b627aee44756c6eee91be4.jpg', 'Juego de dados exabados milimetricos 1/2(13,14,15,16,17,18)', 'caja negra', 1, 6, 0, 'funcionable', 'alta', 608),
(117, 'da86eaf5c81cce0e9c958c8ba0cadee6.jpg', 'Juego de dados cortos milimetricos 3/8(12,14,15,16,17,18)', 'caja negra, hace falta tres dados (10 ,11,13', 1, 7, 0, 'desgastados pero aún funcionan', 'alta', 608),
(118, 'f72a0b53aa6e3d175d6334f48e58974d.jpg', 'Juego de dados largos std truper 3/8(3/8,7/16/1/2,9/16,11/16,3/4,13/16,7/8)', 'estuche negro,hace falta un dado 5/8', 1, 8, 0, 'usadas pero aún funcionan', 'alta', 608),
(119, '426ae3c958819a693324873c4ab7c41d.jpg', 'Extención con dado de bujía articulado magnético truper 13/16', 'cromada', 1, 1, 0, 'ninguna, funcionable', 'alta', 608),
(120, '06fe81a219ec2c4b9ff651f65788cfea.jpg', 'Espejo truper', 'color naranja', 1, 1, 0, 'no presenta ninguna', 'alta', 609),
(121, '8949a0f6a7b4151cc87103d2ac5a614c.jpg', 'Juego de dados de punta Alen truper 1/2  (1/4,5/16,3/8,7/16,9/16,5/8)', 'estuche color naranja', 1, 7, 0, 'funcionables', 'alta', 609),
(122, 'e00c600ab442d016a735665a50551401.jpg', 'Juego de puntas tor de 1/2 truper(t20,t25,t30,t40,t50,t55,)', 'estuche naranja', 7, 7, 0, 'algunas están desgastadas', 'alta', 609),
(123, 'fc15f025700261b96df3d3f232d1bf56.jpg', 'Juego de letras de golpe surtek', 'estuche amarillo con etiqueta azul', 1, 27, 0, 'fucionables', 'alta', 609),
(124, '4753b997c403b851a968b20593f0397d.jpg', 'Extractor de filtro de aceite ', 'tipo sincho truper', 1, 2, 0, 'usadas, aún funcionan', 'alta', 610),
(125, '10b43dbea673f3f8d8f4fc17386090e5.jpg', 'Extractor de filtro metal truper', 'color negro', 1, 1, 0, 'funcionable', 'alta', 610),
(126, 'e4e122eb0b3973972ecbdf87ea0b6b42.jpg', 'Extractor de filtro de aceite araña 3/8 truper', 'cromada', 1, 1, 0, 'funcionable', 'alta', 610),
(127, '433cfd0b4deca691a76b198a13bca5ae.jpg', 'Extractor de filtro de aceite tipo araña 3/8', 'negro', 1, 1, 0, 'funcionable', 'alta', 610),
(128, 'cf67d5c8cf33b085b778874c57c30d66.jpg', 'Pistola de impacto 3/4 truper', 'cromada con negro', 1, 1, 0, 'usada aún funciona', 'alta', 611),
(129, '95eaf680fea70915bb398b3afffdc72c.jpg', 'llave tipo (L) 3/4, reducción de 1/2 a 3/4', 'cromada', 1, 2, 0, 'funcionando', 'alta', 611),
(130, 'eb9ed06826e88fc059f9529299547154.jpg', 'Torquimetro 3/8 dduralast', 'color cromo', 1, 1, 0, 'aún funciona', 'alta', 611),
(131, '38722a97835fb6949aac96ac88260ccb.jpg', 'Dado 3/4( sin medida)', 'cromado con un negro', 1, 1, 0, 'un poco golpeado de la entrada del maneral', 'alta', 611),
(132, '4a901c78f08fd82be4ce98039d03b440.jpg', 'Matraca articulada Truper 1/2', 'cromada con decoración negra', 1, 1, 0, 'usada, aún funciona', 'alta', 612),
(133, '2e9eddf940ccc3b2f4311c3225d99ed4.jpg', 'DADOS', 'DIFERNYES TAMAÑOS', 0, 38, 0, 'REVUELTOS', 'alta', 616),
(134, 'c874c91a3650e17c3e9e54958aca5468.jpg', 'DE', 'DE', 1, 1, 0, 'DE', 'alta', 616),
(135, '9d1ae77b400e627caa4bca42adbf5aee.jpg', 'Extensión de 12,7mm x 127mm', 'Extensiones Paq 6 pero hay 4 físicas ', 480, 4, 0, '', 'alta', 629),
(136, '2e4d1a3c27e363e3ba8292edd974a220.jpg', 'Matraca 9,5mm, cabeza de pera ', 'La caja contiene 3pzs. solo ay 2pzs.', 110, 2, 0, 'Nueva ', 'alta', 629),
(137, '3f6749910cbcdd52708d12e260cc2ccc.jpg', 'Extensión de 9,5mm x 203,2mm', 'La caja contiene 6pzs pero tiene 5pzs', 120, 5, 0, 'Nueva', 'alta', 629),
(138, 'e22f36da8b635e1229928e2ede64b5e9.jpg', 'Extensión de 12,7mm x 254mm', 'La caja contiene 6pzs pero tiene 4pzs ', 120, 4, 0, 'Nueva ', 'alta', 629),
(139, 'fed44a3b95c2e3d34b21ef82a2e24fc1.jpg', 'Extensión de 203mm, cuadro de 12,7mm - Estándar ', 'La caja contiene 6pzs pero tiene 5', 140, 5, 0, 'Nueva ', 'alta', 629),
(140, 'e1a51ca6fa01feaccce4172c0927c403.jpg', 'Pinza de electricista 200mm', 'La caja contiene 3 pzs tiene 3 pzs ', 120, 3, 0, 'Nueva ', 'alta', 629),
(141, 'bce13dde8b82c861b97d6fadf7dd1cdd.jpg', 'Pinza de presión, mordaza curva de 254mm', 'La caja contiene 3pzs  tiene 3pzs ', 200, 3, 0, 'Nueva ', 'alta', 629),
(142, '8ce92184c2d91f929487bb2b0651b15b.jpg', 'Pinza de presión, mordaza curva de 125mm', '2 cajas de 3 pzs. Solo ay 2 en casa una ', 120, 4, 0, 'Nueva ', 'alta', 629),
(143, '8b882591ad9d477dd77e8fe320875b3d.jpg', 'Pinza de presión, mordaza recta de 300mm', 'La caja contiene 3 pzs tiene 3', 200, 3, 0, 'Nueva ', 'alta', 629),
(144, 'd1028a1ba51b39f8d396a52d9e337013.jpg', 'Pinza de presión, mordaza recta de 300mm', 'La caja contiene 3pzs ', 200, 3, 0, 'Nueva ', 'alta', 629),
(145, 'e5f962bc72851af7ca571b41b98d473b.jpg', 'Pinza profesional de electricista 200mm', 'La caja contiene 3pzs tiene 3', 150, 3, 0, 'Nueva ', 'alta', 629),
(146, '274bddfa38f19302f07b4b398c4faecb.jpg', 'Extensión de 6,3mm x 76,2mm', 'La caja contiene 6pzs tiene 5pzs', 100, 5, 0, 'Nueva ', 'alta', 629),
(147, '844fd72f18a9f843bc07dc1e781861d1.jpg', 'Extensión de 150mm, cuadro de 6,3mm - Estándar ', 'La caja contiene 6pzs tiene 3 pzs ', 100, 3, 0, 'Nueva  ', 'alta', 629),
(148, '433079339b07d529287d15424c975c98.jpg', 'Extensión de 150mm cuadro de 9,5mm - Estándar ', 'La caja contiene 6pzs tiene 5pzs ', 120, 5, 0, 'Nueva ', 'alta', 629),
(149, '777abb9d6ec0fd155aeecaf265f1f63c.jpg', 'Matraca 6,3mm cabeza de pera ', 'La caja contiene 3pzs tiene 1', 100, 1, 0, 'Nueva ', 'alta', 629),
(150, 'ffc28332876810eb7c85f05f001a3e7f.jpg', 'Matraca 6,3mm cabeza de pera ', 'La caja contiene 3pzs tiene 1', 100, 1, 1, 'Nueva ', 'alta', 629),
(151, 'c3e59e06b28a885e6a06b8c5f52f98d2.jpg', 'Matraca 12,7mm', 'La caja contiene 3pzs tiene 2pzs', 200, 2, 0, 'Nueva ', 'alta', 629),
(156, '0472df47bd13a0d3f449d9bac4a4225e.jpg', 'Matraca cabeza de pera de 13mm', 'La caja contiene 6pzs tiene 5pzs', 200, 5, 0, 'Nueva ', 'alta', 629),
(157, '3ff9fe9acff0d006ff6329a1c2a7658c.jpg', 'Pinza de corte diagonal de 175mm', 'La caja contiene 6pzs tiene 2', 120, 2, 0, 'Nueva ', 'alta', 629),
(158, '68ea7dfe5b9f243494918f705ff99968.jpg', 'Llave para filtro de aceite ', 'La caja contiene 4pzs tiene 2', 150, 2, 0, 'Nueva ', 'alta', 629),
(159, 'a1b4af9336d2effa274ed0994558983a.jpg', 'Matraca 12,7mm, cabeza de pera ', 'La caja contiene 3pzs tiene 1', 120, 1, 0, 'Nueva ', 'alta', 629),
(160, 'b3310c6e2e699b2c038bab6188dc4cbc.jpg', 'Pinzas de presión, mordaza curva de 250mm, mangos recubiertos ', 'La caja contiene 3pzs tiene 3', 150, 3, 0, 'Nueva ', 'alta', 629),
(161, '54f8e2748ac6d6df68388dc81dc1b2db.jpg', 'Matraca cabeza redonda de 13mm.', 'La caja contiene 6pzs tiene 5', 120, 5, 0, 'Nueva ', 'alta', 629),
(162, '74d892d671668d0b16ace6c01ed42a0f.jpg', 'Llave de banda ', 'La caja contiene 6pzs tiene 4', 100, 4, 0, 'Nueva ', 'alta', 629),
(163, '4beb5b2c0bdcf92c5efa56fe173465ad.jpg', 'Pinzas de chófer de 200mm', 'La caja contiene 6pzs tiene 3', 120, 3, 0, 'Nueva ', 'alta', 629),
(164, '0320223c4cb23e55deb07340efc620f4.jpg', 'Matraca telescópica cabeza flexible ', 'La caja contiene 3pzs tiene 1', 200, 1, 0, 'Nueva ', 'alta', 629),
(165, '187782cf823c17674f4207ac92af4cc1.jpg', 'Saca bujías articulado 10\'\'(254mm)', 'La caja contiene 6pzs tiene 3', 120, 3, 0, 'Nueva ', 'alta', 629),
(166, 'e33676bf9cce2d0cc765b35efd447668.jpg', 'Extensión de 12,7mm x 63,5mm', 'La caja contiene 6pzs tiene 2', 80, 2, 0, 'Nueva ', 'alta', 629),
(167, '65688f1c227ea3f08020da8ae5938322.jpg', 'Pinza de electricista 225mm', 'La caja contiene 3pzs tiene 1', 120, 1, 0, 'Nueva ', 'alta', 629),
(168, '1ff1ca72b1f091aa2b20e449887a5eea.jpg', 'Pinza de electricista 200mm', 'La caja contiene 3pzs tiene 3', 120, 3, 0, 'Nueva ', 'alta', 629),
(169, 'f253579a314da462e44f061171003eb2.jpg', 'Pinza de presión, mordaza curva de 254mm', 'La caja contiene 3 pzs tiene 2', 200, 2, 0, 'Nueva ', 'alta', 629),
(170, 'b76e32c986caa4ecb52a7de55e56267f.jpg', 'Matraca doble cuadro 6,3mm - 9,5mm', 'Caja contiene 3pzs tiene 1', 12, 1, 0, 'Nueva ', 'alta', 629),
(171, 'a5053d8dd08b4a4325f932c3f7791686.jpg', 'Llave de banda para filtros de aceite ', 'La caja contiene 6pzs tiene 6', 150, 6, 0, 'Nueva ', 'alta', 629),
(172, 'eef0f7e45d52417612cba2d7fec877fd.jpg', 'Saca bujías articulado 10\"(254mm)', 'La caja contiene 6pzs tiene 4', 100, 4, 0, 'Nueva ', 'alta', 629),
(173, '54d4cb780c2fd64c07bf74bf66f9281e.jpg', 'Matraca cabeza de pera de 9,5mm ', 'La caja contiene 6pzs tiene 5', 100, 5, 0, 'Nueva ', 'alta', 629),
(174, 'bef659c3709b029e0a333c892a147c1e.jpg', 'Llave universal de 3 mordazas para filtros de aceite ', 'La caja contiene 4pzs tiene 2', 100, 2, 0, 'Nueva ', 'alta', 629),
(175, '58b94700a7cd2703e1620faf50ad66ff.jpg', 'Extensión de 9,5mm x 76,2mm', 'La caja contiene 6pzs tiene 5', 80, 5, 0, 'Nueva ', 'alta', 629),
(176, 'eaa70092b3305f02ba5111b05363dbb3.jpg', 'Matraca triple cuadro ', 'La caja contiene 3pzs tiene 2', 100, 2, 0, 'Nueva ', 'alta', 629),
(177, 'e63872db7d07382177734d3bcfd0dfc7.jpg', 'Llave para filtros de aceite (63,5mm-82,5mm)', 'La caja contiene 6pzs tiene 5', 150, 5, 0, 'Nueva ', 'alta', 629),
(178, 'f467882d41bb82cbd77dcf396054ead2.jpg', 'Caja gris', 'Tiene diferentes herramientas un desarmador de dados amarillo, 19 puntas y un dado largo ', 2, 21, 1, 'Esta incompleta la caja', 'alta', 619),
(179, '898d888ff203c51928a3d2e40fb40621.jpg', 'Caja gris', 'Tiene diferentes herramientas un desarmador de dados amarillo, 19 puntas y un dado largo ', 2, 21, 0, 'Esta incompleta la caja', 'alta', 619),
(180, '99ff45987d558df0121dac5690e13981.jpg', 'Prueba ', 'Prueba ', 3, 3, 1, '', 'alta', 648),
(181, 'd571dda487d8c2a3f3c30c7af9548244.jpg', 'Tijera multiuso', 'Tijeras ,300-301', 535, 2, 0, 'Bien', 'alta', 617),
(182, '6b0bc5c6924eedaf68dadda805ef9b19.jpg', 'Cortador de borde cóncavo de acero inoxidable ', 'Gris ', 1560, 1, 0, 'Buen estado', 'alta', 617),
(183, '33d6905e9f7915d38ca159e04c212e0c.jpg', 'Pelacables ', 'Dónde mangos de colores ', 4155, 3, 0, 'Falta una pieza de pelacables ', 'alta', 617),
(184, '4992f5c920d8d6489f2064177a2482e7.jpg', 'Alicate ', 'Alicate con mango negro', 504, 1, 0, 'Buen estado', 'alta', 617),
(185, 'c4dab20635a876c8ff611741983db4b3.jpg', 'Pinzas para anillos de retención ', 'Mangos rojod', 1790, 2, 0, 'Buen estado', 'alta', 617),
(186, 'efce1a6ed0534e76660c1c7c626e1938.jpg', 'Matraca ', 'Cornell 16', 584, 1, 0, 'Buen estado', 'alta', 617),
(187, '3e35c96c8c2f5f3804223d65f04311a9.jpg', 'Soporte de carpeta ', 'Gris con rojo', 1946, 1, 0, 'Buen estado', 'alta', 617),
(188, '657682c827149416dc9aa9e78bf7fe55.jpg', 'Pinzas de extensión ', 'Mango naranja G12', 384, 1, 0, 'Buen estado', 'alta', 617),
(189, '9df065a41370de7749babc0d627185d6.jpg', 'Snap on blue point Demagnetizer', 'Desmagnetizador', 102.5, 1, 0, 'Buen estado', 'alta', 617),
(190, '2cb51621b66517f557e650373c829c3d.jpg', 'Alicate con rueda ', 'Con rueda partida', 421, 1, 0, 'Buen estado', 'alta', 617),
(191, '5ebdb9939ab109a0ed5df3d73899747d.jpg', 'Pinzas para aros', 'Mango naranja', 393, 1, 0, 'Buen estado', 'alta', 617),
(192, '5b0309d32dbc87149b90e163325d5580.jpg', '2 Alicates ', 'Dos alicates de diferentes medidas', 395, 2, 0, 'Buen estado', 'alta', 617),
(193, 'e0185297b474a1957575cf61f5085fe1.jpg', 'Cortador diagonal', 'Mango rojo', 250, 1, 0, 'Buen estado', 'alta', 617),
(194, 'e2be1795b0109b7d82c6c51e5912d0bc.jpg', 'Alicate truper', 'Truper', 436, 1, 0, 'Buen estado', 'alta', 617),
(195, 'e2b958103d681cd08fbe3aa50f90bd16.jpg', 'Alicate ', 'Viejito', 396, 1, 0, 'Muy viejito o usado', 'alta', 617),
(196, '47a053c9d8f1eabb32c26cc914f0c609.jpg', 'Alicate diagonal ', 'Mango rojo', 450, 1, 0, 'Buen estado viejo', 'alta', 617),
(197, '2c0d24e163b68a78034753c6943e97a8.jpg', 'Alicate ', 'Mango rojo', 9000, 1, 0, 'Buen estado', 'alta', 617),
(198, 'a97b6493d0025dd2a2a6ff1d67e38a7b.jpg', 'Pinza para anillo de gallo', 'Cortador ', 1350, 1, 0, 'Buen estado', 'alta', 617),
(199, 'fbf60d6d2474a7d20a567cda4926f77e.jpg', 'Pinzas de presión ', 'Dos', 1905, 2, 0, 'Buen estado', 'alta', 617),
(200, 'bc6d8367d01c6910bf17ebc1ac853aff.jpg', 'Pinzas de presión ', '2,4,6 ', 395, 3, 0, 'Usadas ', 'alta', 617),
(201, 'c2332ab8c76c853375822437873b1cd7.jpg', 'Separador de freno de disco ', '1', 1025, 1, 0, 'Usada', 'alta', 617),
(202, '7698056a9be3c2cc8286535f48c96c4d.jpg', 'Pinza de presión 7\"', '1', 453, 1, 0, 'Usada ', 'alta', 617),
(203, '39d6ebd963979abec12b91abfba37fc5.jpg', 'Llave de perico vise-grip', 'Mango amarillo', 802, 1, 0, 'Usados ', 'alta', 617),
(204, '3cc1d9c5e8d02f4caa63484d37182672.jpg', 'Llave de perico ajustable ', 'Ajustable', 245, 1, 0, 'Usada', 'alta', 617),
(205, 'c83f47c8f5911bdba99ab6db9e477511.jpg', 'Herramienta profesional de crimpado', 'Crimpado de martillo', 1275, 1, 0, 'Buen estado', 'alta', 617),
(206, 'c40bee5523c1cb31beb05cf67ef4c97c.jpg', 'Cortador de cadena', 'Cortador de cadena ', 599, 1, 0, 'Nueva', 'alta', 617),
(207, '6742d92991e63cb37dfcf8addf3b0f2a.jpg', 'Dados tipo nudos ', '5 pzs y uno descompuesto', 550, 5, 0, 'Usados', 'alta', 617),
(208, '5ab65f23c2f56182f9a9e95d2c62fcfc.jpg', 'Dado largo', 'Largo', 67, 1, 0, 'Buen estado', 'alta', 617),
(209, '86a3d40b1292a0161ff1f58624e58eb9.jpg', 'Cinta métrica ', 'De 25 metros', 601, 2, 0, 'Buen estado', 'alta', 617),
(210, '4f3f86a66b511ee00d550cd9da676492.jpg', 'Destornillador plano grande', 'Mango rojo con negro cp10r', 672, 1, 0, 'Buen estado', 'alta', 617),
(211, '8fbf9e9d8d51fd33f7f4c0796d69931c.jpg', '9 destornilladores ', 'son de diferente punta ', 526, 9, 0, 'todos vienen marcados con ja', 'alta', 617),
(212, '7a75948b2dd5f6a77ae24a04dfdc1fdc.jpg', '8 destirnilladores', 'son 8 destirnilladores de diferentes puntas aunados a los anteriores 9', 526, 8, 0, 'usados vienen marcados con ja', 'alta', 617),
(213, '85afe1f5d2998d2089a11e2bb1b09798.jpg', 'tubo de tuberia', 'con bolsa  ', 280, 2, 0, 'nuevas', 'alta', 617),
(214, '604ee8fdcd9faf5785ff50045e0630ec.jpg', 'puntas de osciloscopio', 'con negro y rojo', 100, 1, 0, 'buen estado', 'alta', 617),
(215, 'sinfoto.png', 'desarmador de caja ', 'un mango gris y otro transparentr', 360, 2, 0, 'buen estado', 'alta', 617),
(216, '54730f045db4375f34ce5bb068c68eca.jpg', 'Juego de dados de punta de impacto', 'juego completo', 971, 5, 0, 'buen estado', 'alta', 619),
(217, 'ca8861c7857d06ef8a0e19c1e07c84e4.jpg', 'Caja de puntillas tubos destornillador ', 'está incompleta', 1309, 21, 0, 'buen estado', 'alta', 619),
(218, '2f1e4fbb2a974c8029b735306603c1cc.jpg', 'Sacador de dados', 'son snap on', 1300, 4, 0, 'buen estado', 'alta', 619),
(219, '8ac513f09fd2504334ad473bae696149.jpg', 'set de pulido', 'se ve incompleta', 179, 1, 0, 'bien', 'alta', 619),
(220, 'd022f308aabac7d9053e3071f8c4f9d3.jpg', 'destornillador de impacto con puntas ', 'caja azul 8 puntas y 1 destirnillador', 1396, 9, 0, 'bien', 'alta', 619),
(221, 'dd9258b98140c02514435741295119b3.jpg', 'Repuesto', 'dorado', 165, 1, 0, 'bien', 'alta', 619),
(222, '6a4aa2309472d0489bc0e10e7e39f1a7.jpg', '2 llaves ', 'una crashfran y otra snap on', 650, 2, 0, 'bien', 'alta', 619),
(223, '7b89cb7a6dd94a4434fc360a4797a43a.jpg', 'Juego de 4 brocas escalonadas', 'en un estuche rojo', 896, 4, 0, 'bien', 'alta', 619),
(224, '0689ab895cc9072ba11e5d02ebd79449.jpg', 'estuche instrumental con Luz ', 'se mira que le faltan cosas', 4496, 10, 0, 'bien', 'alta', 619),
(225, 'b1b7891babe9bec9fd9d808f6f3b6e8a.jpg', 'broca larga hhs316', 'marca Weston ', 500, 1, 0, 'bien', 'alta', 622),
(226, '3f0727afaf7973c52ce6bdeeda79eff0.jpg', 'broca larga hhs316', 'marca Weston ', 500, 1, 1, 'bien', 'alta', 622),
(227, 'cc6b394229402f2ce92bdd88ada30fc6.jpg', 'broca mediana weston', '1weston', 450, 1, 0, 'bien', 'alta', 622),
(228, '055b30efa64b68510d28c56448fd997b.jpg', '2 brocas medianas ', '2 piezas westorn', 700, 2, 0, 'bien', 'alta', 622),
(229, '0e7199ddf4111db1a00d0aa5f0960fb3.jpg', 'base magnetica', 'caja azul ', 560, 1, 0, 'bien', 'alta', 622),
(230, '91b6ad6bc1112aba0c66a7f4d581efa1.jpg', 'reloj para base magnetica ', 'nuevo', 1000, 1, 0, 'nuevo', 'alta', 622),
(231, 'db91a404499e44c02ea3c73580e566f2.jpg', '7 Machuelos ', 'diferentes medidas', 2800, 7, 0, 'bien', 'alta', 618),
(232, 'a6929ee3faca986cc33d7745315493ef.jpg', 'Puntas de destornillador ', 'cuatro puntas', 1400, 4, 0, 'bien', 'alta', 618),
(233, '886a130842a78eecf359d3674b26345d.jpg', 'Juego de destirnilladores y brocas pretul', 'está incompleta se ve que faltan pinzas y dados(( va en el cajón 7))', 16997, 11, 0, 'bien pero incompleto', 'alta', 618),
(234, '086558d3f1efd8e950a0421f17d736f4.jpg', 'juego de machuelos', 'vienen en una cajita', 1200, 3, 0, 'bien', 'alta', 618),
(235, '080e876f0114389762eec5b3add847e1.jpg', '2 llaves arrancador', 'mango amarillo', 128, 2, 0, 'bien', 'alta', 618),
(236, 'b58861ec01eea608f83da748480d0687.jpg', '2 llaves arrancador', 'mango amarillo', 128, 2, 0, 'bien', 'alta', 618),
(237, '0d4bd40d62e5551a00e26804023fb382.jpg', 'lápiz con puntas ', 'tiene 2 puntas y una tapa', 350, 1, 0, 'bien', 'alta', 618),
(238, '4b929e54f333b107faa55e0f044320c3.jpg', '3 puntas allen', '3 llaves ', 600, 3, 0, 'bien', 'alta', 618),
(239, 'fd5174c6a001ce9f5e5a86dbdc77aeea.jpg', 'lima rotativa', 'mango azul ', 453, 1, 0, 'bien', 'alta', 618),
(240, '7acd24b515d1302dabb8a843fa94ca1d.jpg', 'extractor para microfiltro', 'negro nuevo', 204, 1, 0, 'nueva', 'alta', 618),
(241, 'c23f99dbeb2cecb9bea5069ab9b5df4b.jpg', 'Medidor de profundidad', '1 ', 65, 1, 0, 'bien', 'alta', 618),
(242, '5793738948df15b7a20e268885bdda30.jpg', 'tornillos', 'son 4 ', 60, 4, 0, 'bien', 'alta', 618),
(243, '5727647ae710be63fd67540b562c6da5.jpg', '2 llaves alen', 'una de pico y otra redonda', 180, 2, 0, 'bien', 'alta', 618),
(244, '299e21da57f0bea19f53afaa05c38fb3.jpg', 'espejo telescopico', 'con espejo', 325, 1, 0, 'bien', 'alta', 618),
(245, 'b17193a4669e33f1ebb2ecc519be7216.jpg', 'mini clavos estriados ', '8 en una bolsita', 350, 8, 0, 'bien', 'alta', 618),
(246, '9b2e95cc00418d590c81e16ad146814f.jpg', 'destornillador magnetico', '1 ', 150, 1, 0, 'bien', 'alta', 618),
(247, 'be8b26d2c877083f90d508b0402cf7da.jpg', '7 llaves tele allen', 'juego de 7', 287, 7, 0, 'bien', 'alta', 618),
(248, '1fd771e3e6a38e5b872881475564157c.jpg', 'Algo', 'Algo', 2, 2, 0, 'Ninguna', 'alta', 651),
(249, '5aee0d960ef6aaaa1f8930bf766ebe20.jpg', 'Otra prueba ', 'Alala', 6, 3, 0, '', 'alta', 651),
(250, '4580e6d52e6f8ffc91ccc8a1962f227f.jpg', 'algo', '2', 3, 2, 0, '3', 'alta', 651),
(251, '3744bcdedb6776a6aa03f997a5b4a42e.jpg', 'kgjgj', 'kvvkckckckvkhkg', 3, 3, 0, 'revueltas', 'alta', 651),
(252, '8689d068a6191de1ddc1868dc5f9bd4e.jpg', 'pinzas para filtro de aceite ', 'mango rojo ', 194, 1, 0, 'usada ', 'alta', 652),
(253, '13bae73a1221af0e300c2e1de73c03e6.jpg', 'pinza para anillos de retención ', 'mango rojo', 92, 1, 0, 'usada ', 'alta', 652),
(254, '9b660da62c05c87fc1b1eab56763322f.jpg', 'pinzas de extención ', 'mango rojo', 299, 1, 0, 'usada ', 'alta', 652),
(255, '981c217e41029638f8e068edfcbe90d0.jpg', 'Soporte de resorte giratorio', 'En una bolsita roja', 200, 15, 0, 'Bien', 'alta', 620),
(256, '02c5ea98bf13badd47433d69bb1d1915.jpg', 'Set de barras de extensión ', 'Vienen en una esponja ', 685, 6, 0, 'Bien', 'alta', 620),
(257, '0a2c205f91c1d652a37146211e23a6d8.jpg', 'Navaja', 'Grande', 250, 1, 0, 'Bien ', 'alta', 620),
(258, 'b4a937717af35ac66f48f0059ba4ddce.jpg', 'Regla ', 'Metal ', 215, 1, 0, 'Bien', 'alta', 620),
(259, 'febc1ee4960f7ce18906e2c1ab4126e0.jpg', 'Lámpara de luz negra', 'Plata', 520, 1, 0, 'Bien', 'alta', 620),
(260, '580dc0d6c0fedb3b14a7a2dcd040b31a.jpg', 'Telescopio de espejo', 'Largo', 323, 1, 0, 'Bien ', 'alta', 620),
(261, '41f4cf914e89805391701e7f5fa2b1cb.jpg', 'Extensiones snap', 'Extensiones snap', 923, 4, 0, 'Bien', 'alta', 620),
(262, '88761b6cc887604b41865d9637628a2b.jpg', 'Lamparas', '2', 500, 2, 0, 'No prenden', 'alta', 620),
(263, 'a3d8f1b79f951a2f1793213ac7d98591.jpg', 'Medidor de profundidad ', '1', 125, 1, 0, 'Bien', 'alta', 620),
(264, '80ac43ab0deaed86ec1719a6b5005206.jpg', 'Alaba de seguridad', 'Roja', 454, 1, 0, 'Usada', 'alta', 620),
(265, '818793a9ca69a36e87782019e57ebb30.jpg', 'Llave de carraca', 'Un poco oxidado ', 524, 1, 0, 'Usada', 'alta', 620),
(266, 'acd58aec2738a12c8ac7c755aab5809b.jpg', 'Torquimetro', 'Usado', 658, 1, 0, 'Bien', 'alta', 620),
(267, 'e21d5d2c155fdd61f91e6fae688e119d.jpg', '3 lápices medidores', '3', 350, 3, 0, 'Usados', 'alta', 620),
(268, '4ca21569a031f55b36f39ec268bd96f1.jpg', 'Pinzas de sellado', 'Pinza de Clip de sellado', 256, 1, 0, 'Bien', 'alta', 620),
(269, '60111d4f9b787bcdaca196099cea5612.jpg', 'Puntillas de máquina de rectificadora ', '4', 400, 4, 0, 'Bien', 'alta', 619),
(270, 'b5cf087fd3e5f337d8247a8b7b222a40.jpg', 'Bisagra de soporte', '1', 265, 1, 0, 'Bien', 'alta', 619),
(271, '3ae5597c3f52338fa51854587a6c0209.jpg', 'Regla de madera', '2', 50, 2, 0, 'Bien', 'alta', 620),
(272, 'cf227ef7ed1c75e454f2a5f2130e3fd9.jpg', 'Desarmadores', '2', 125, 2, 0, 'Bien', 'alta', 620),
(273, 'sinfoto.png', '8 juegos llave con arillo', '8', 230, 8, 0, 'Viejas', 'alta', 620),
(274, 'e261ab5d732dc9bcaf008348d0f6e052.jpg', '7 llaves individuales ', '7', 125, 7, 0, 'Bien', 'alta', 620),
(275, '3ef142e4e6291bdfcd72e9f05978461e.jpg', 'Tenazas para corriente', '1 par', 200, 1, 0, '1', 'alta', 620),
(276, '919ffa599e9791d1a1e7e0d185f78208.jpg', 'Clavija', '1', 35, 1, 0, 'Bien', 'alta', 620),
(277, 'c47ed68fac644c5786e57093086f52e1.jpg', 'Perno', 'Con un agujero', 100, 1, 0, 'Bien ', 'alta', 620),
(278, 'dc9a76d9a1b36d46aaa2a792b050ad13.jpg', 'Tapa de matraca ', '1', 35, 1, 0, 'Bien', 'alta', 620),
(279, '8997c33cea118b730ad156c6e07ea37b.jpg', 'Etiquetas', '2', 50, 2, 0, 'Bien', 'alta', 620),
(280, 'ab24d2508119f1b6884ce757e10aac97.jpg', '2 candados', '2', 600, 2, 0, 'Nuevos ', 'alta', 619),
(281, '2c0c0c9eebfe2cd8dc7dda0f664dcccd.jpg', 'Navajas ', '1 paquete ', 125, 1, 0, 'Bien', 'alta', 620),
(282, '8a5ff70ae829e8493612e859ec0f38e5.jpg', 'pinza para seguros ', 'están revueltas', 169, 1, 0, 'usada ', 'alta', 652),
(283, '1b98b717229a5d2fc81ead455baa8f84.jpg', 'pinzas para abrazaderas de presión ', 'mango rojo ', 200, 1, 0, 'usada ', 'alta', 652),
(284, 'a3709bcbbce994eb8fb455972d03a2b9.jpg', 'pinzas de presión de punta ', 'mac tolls', 200, 1, 0, 'usada ', 'alta', 652),
(285, '1fa09f5ff415b664ffc8b272f45c8f6d.jpg', 'pinzas de presión 10\"', 'truper ', 150, 2, 0, 'usadas ', 'alta', 652),
(286, '6b929bb70f76f383570c1550e2b0009d.jpg', 'pinzas de presión 6\"', 'truper ', 120, 1, 0, 'usada ', 'alta', 652),
(287, '7348a3a815811dc1f2beab1e65aeac7b.jpg', 'pinzas para seguros ', 'mango rojo', 100, 1, 0, 'usadas ', 'alta', 652),
(288, '90c2f20c3fb4f96ce4b40d4ee4ce2d1a.jpg', 'alicate de punta ', 'mango negro ', 70, 1, 0, 'usada ', 'alta', 652),
(289, 'd180561c06926f5a8348d6a55d5c94b1.jpg', 'alicate deslizante ', 'mango blanco ', 100, 1, 0, 'usada ', 'alta', 652),
(290, '2bcdbf9159c7424e0049fca1acd5d29d.jpg', 'alicate ajustable ', 'mango rojo ', 100, 1, 0, 'usada ', 'alta', 652),
(291, 'ee3ec83539a42671613a5f8446665328.jpg', 'pinzas de corte ', 'mango negro ', 150, 1, 0, 'usada ', 'alta', 652),
(292, '6f76895382867ec9c6448f1bc47e1b1f.jpg', 'pinzas de mecánica ', 'mango rojo', 120, 1, 0, 'usada ', 'alta', 652),
(293, 'e866275a0f3d270a1951cee17ec0b10b.jpg', 'pinzas para seguros Omega ', 'mango negro ', 150, 1, 0, 'usada ', 'alta', 652),
(294, 'ec6caff1acb8792b826b42f94040c75d.jpg', 'Juego de llave con Matraca porta rojo', 'Porta llave rojo,18,17,15,15,5/8,12,14,12,3/4', 1000, 9, 0, 'Están revueltas por marca', 'alta', 623),
(295, 'c2ab33950b24aba393f77c9ba7288090.jpg', 'pinza de erraje ', 'están revueltas', 150, 1, 0, 'usada ', 'alta', 652),
(296, '401d7a77a248d42497afce0c55849427.jpg', 'Juego porta llave Craftman ', 'Mango azul,17,16,15,14,13,11,9,9,8,8,6', 1000, 11, 0, 'Bien todas, trae una pretul', 'alta', 623),
(297, 'f78776c08bf00b6656b64ddbc230ae69.jpg', 'Juego de llaves pequeñas ', '1/2,12,7/16,11,5/16,9,1/4', 900, 7, 0, 'Bien', 'alta', 623),
(298, 'f68790b14b0b50b2e3468095a6f84b43.jpg', 'llave 14 mm', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(299, '2bfc7ef724f84404a875f7f58340e00d.jpg', 'llave 15 ', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(300, '7796625e9fd0776f83424a6591a2b95b.jpg', 'Juego de llaves con matraca ', '5/8,19,18,17,16,15,9/16,15,11', 1000, 9, 0, 'Bien', 'alta', 623),
(301, '08185f38918b226a601bc0202fa8cf8c.jpg', 'llave 16 mm', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(302, '3d790ccb88e5260975ec29772d77a971.jpg', 'llave 15 mm', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(303, '39cce11feeabb809663947c6160507a1.jpg', 'llave 16 ', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(304, '8d9ae141d7bd84ea9da8788882dd6418.jpg', 'llave 19 mm', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(305, 'd81493fc162210676231732b15fef42b.jpg', 'llave 19', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(306, '67b0b77be13cff16666bea729efd1f78.jpg', 'llave 18mm', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(307, '2f39789556e0f50a322683c4db805bee.jpg', 'Llave con doble cara  craftsman', '5/8,15,5/8,9/16,3/8,7/16,7,7,1/4', 1000, 10, 0, 'Bien', 'alta', 623),
(308, '6c2576446bb7d07701c0e3ef76e8c852.jpg', 'llave 22mm', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(309, '4a4c833af97887378dffeb22b02b0b41.jpg', 'llave de matraca 16mm', 'están revueltas', 80, 1, 0, 'usada ', 'alta', 652),
(310, '48dfae09c0d91c6872ad8c8f2bc5f872.jpg', 'Juego de llaves con matraca y doble cara', '17,16,14,12,11/32,3/8,11/32', 1000, 7, 0, 'Bien ', 'alta', 623),
(311, '350aea010c5ac86473289addf137d46c.jpg', 'llave de matraca 14mm', 'están revueltas', 80, 1, 0, 'usada ', 'alta', 652),
(312, 'adfcd2bc4db41c004cbf58a4b46c36ce.jpg', 'llave 12 ', 'están revueltas', 80, 1, 0, 'usada ', 'alta', 652),
(313, '31cec33362d80998ac4b6ae5bba627f0.jpg', 'llave 5/8', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(314, '6b0d6682163f5885d651a427ea4a60ca.jpg', 'llave 13/16\"', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(315, '960d26b7ce9f003bea8f8d4f5906b2eb.jpg', 'llave 3/4', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(316, '6050faeb103d2f72a8e083a7f608dd46.jpg', 'llave 13/16', 'están revueltas', 50, 2, 1, 'usada ', 'alta', 652),
(317, '7d57b138dbfe1c7cc2e8118fea47186c.jpg', 'llave 7/8\"', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(318, 'cad1598f6424b3d040fe66164abc743e.jpg', 'llave 1\"', '15/16', 50, 1, 0, 'usada ', 'alta', 652),
(319, '81f9946d92ec8ab6c318995f8d29b9eb.jpg', 'llave 6', 'están revueltas', 30, 1, 0, 'usada ', 'alta', 652),
(320, 'd1451cf280d1759a2792c260fc97f09f.jpg', 'llave 1/4', 'están revueltas', 30, 2, 0, 'usada ', 'alta', 652),
(321, '51677afa2180971b45fa8578f8759a21.jpg', 'llave 1/4\"', 'están revueltas', 30, 1, 0, 'usada ', 'alta', 652),
(322, '7b4c48da302c36485c17c7b12694e5fb.jpg', 'llave 1/4\"', 'están revueltas', 30, 1, 0, 'usada ', 'alta', 652),
(323, 'd1e641b98ae9200204462ad9169b8230.jpg', 'llave 3/8 ', 'están revueltas', 30, 2, 0, 'usada ', 'alta', 652),
(324, '678b9976a56dcab85622c18f7b18cb68.jpg', 'llave 3/8\"', 'están revueltas', 30, 1, 0, 'usada', 'alta', 652),
(325, '269bca09d554326ce3d1a80887703435.jpg', 'llave 1/2 ', 'están revueltas', 50, 2, 0, 'usada ', 'alta', 652),
(326, '1b22e90533928a5f5cd028ccca3f3fec.jpg', 'llave de matraca 9/16\"', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(327, '4bfcf2e9cde7439ca072372635be2b33.jpg', 'llave 9/16', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(328, 'db5c9c1c938b732001e3612f56a2816d.jpg', 'llave 14mm', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(329, 'cddecb1fefa62447b3d787367b1612ed.jpg', 'llave 5/8 ', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(330, 'dc311c115480d9b2eac9bf69aa658789.jpg', 'llave 11/16', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(331, 'e6440996c2239c8de046387e396261da.jpg', 'llave 11/16', 'pretul', 40, 1, 0, 'usada ', 'alta', 652),
(332, '5e561728840dc4f8e6b61811440e9491.jpg', 'llave 3/4 ', 'están revueltas', 40, 1, 0, 'usada ', 'alta', 652),
(333, 'e96a97342ffd50edbfb73bc47003b377.jpg', 'extención ', '1/4', 50, 2, 0, 'usada ', 'alta', 652),
(334, '6f92c4cf9c645fa15ebb2de53f86a965.jpg', 'extención ', '3/8', 50, 3, 0, 'usada', 'alta', 652),
(335, '09612aef54622722a7573d6c6b102d4f.jpg', 'extención ', '1/2', 50, 3, 0, 'usada ', 'alta', 652),
(336, '8622fc0426c67c826a8a64cc178a5467.jpg', 'extención ', '3/8', 50, 1, 0, 'usada ', 'alta', 652),
(337, '79380d6b1eed8e6fbf78d83f1007b2fe.jpg', 'extención ', '3/4', 100, 1, 0, 'usada ', 'alta', 652),
(338, '6e682817b047bf1e24f8e194157c664f.jpg', 'caja de dados ', '1/16 - 1/8 - 1/4 - 5/16 - 3/8 - 7/16 - 1/2 ', 3600, 8, 0, 'usada', 'alta', 652),
(339, '82e4028abaff2d358478a9597537ed61.jpg', 'dado 1/2', 'están revueltas', 50, 1, 0, 'usada ', 'alta', 652),
(340, '7a4b234fbe9beaf773bcf3f5c82f76ac.jpg', 'dado 9/16', 'están revueltas', 100, 1, 0, 'usada ', 'alta', 652),
(341, '52ce2b9fa803cd7c94ccac782481a35c.jpg', 'dado 11/16', 'están revueltas', 100, 1, 0, 'usada ', 'alta', 652),
(342, '5763f0792d41123f84872ee07f2532ad.jpg', 'dado 1\"', 'están revueltas', 100, 1, 0, 'usado', 'alta', 652),
(343, '26465940ea56349787452ce0a330acf8.jpg', 'dado 1/16', 'están revueltas', 100, 1, 0, 'usado', 'alta', 652),
(344, '47d9bb42d95651405207c30905a2797b.jpg', 'dado 1\"', 'están revueltas', 100, 1, 0, 'usado', 'alta', 652),
(345, '0407f2fdfc5c7c13a2091969f5f6d77e.jpg', 'caja de dados ', '10,11,12,13,14,15,16,18,20,21 mm', 3500, 10, 0, 'usados ', 'alta', 652),
(346, 'b5ca27899ee15e83b402d61c0b1df984.jpg', 'llave estilson ', '18\"', 350, 1, 0, 'usada', 'alta', 652),
(347, '1516c4fc2623ea6be271bdaca95103c2.jpg', 'llave estilson ', '10\"', 200, 2, 0, 'usada ', 'alta', 652),
(348, 'bff97083350e0229b08cd8ed4c5fd948.jpg', 'pinzas para seguros', 'están revueltas', 150, 2, 0, 'usadas ', 'alta', 652),
(349, '3f3e0c4f10f416b502b933c7d3175cef.jpg', 'pinzas de seguro Omega ', 'están revueltas', 150, 1, 0, 'usada', 'alta', 652),
(350, 'c6417c7e689c92daf19585b973ff07ba.jpg', 'Porta llaves con matraca', ' 7/16,7/16,13,5/8,11/16,3/4,13/16,7/8,1-1/16', 2000, 10, 0, 'Bien', 'alta', 623),
(351, '2c476d6a73d95a235ba11a73a907385c.jpg', 'Juego llaves azul celeste', '11/4,11/8,1,15/16,7/8,13/16,3/4,11/16,5/8,9/16,1/2,7/16,3/8', 2500, 13, 0, 'Bien', 'alta', 623),
(352, '25604ffba35f52b9672b5f975ff9dc38.jpg', 'Juego de 3 alicates ', '3 empaque gris', 2030, 3, 0, 'Bien', 'alta', 624),
(353, '31188bdc1bd68eb012597a2adcb2c1c2.jpg', 'Set de rebarbadores', '4', 2500, 4, 0, 'Bien', 'alta', 624),
(354, '669aec060e0facf556265af608187d75.jpg', 'Juego de removedores de sellado', '6', 1140, 6, 0, 'Bien', 'alta', 624),
(355, 'c7a653d281c0a20f4066bbafaabab42e.jpg', 'Pinzas de corte', 'Mag tools ', 3548, 11, 0, 'Bien', 'alta', 624),
(356, '432fde66a26ae2d752489ac127663ce1.jpg', '2 llaves españolas', '#14', 250, 2, 0, 'Bien', 'alta', 624),
(357, 'b50b509a56d75a41ef2c66aa22dfa070.jpg', 'Tijeras industriales ', 'Partsmasters ', 335, 1, 0, 'Bien', 'alta', 624),
(358, 'a58847b13bba34214abf39e53fd5c73c.jpg', 'Desarmador', 'Michael petric', 150, 1, 0, 'Usada', 'alta', 624),
(359, 'e51b59c972bd4fab45c5d66ca1998a19.jpg', 'Desarmadores snap on', '8', 2350, 8, 0, 'Bien', 'alta', 625),
(360, 'sinfoto.png', 'Juego Llave combinada ', '3/8,5/8,5/8,7/8,15/16,15/16,15/16', 4000, 7, 0, 'Bien', 'alta', 625),
(361, '550cb44c89ee61811188116705138009.jpg', '9 Llaves combinadas', '7/16,7/16,3/8,3/8,9,11/32,8,1/4,6', 2580, 9, 0, 'Bien', 'alta', 625),
(362, '4f6b279ea1e247307fde4b142952287c.jpg', '3 Llaves dobles ', '6,6,1/4', 350, 3, 0, 'Bien', 'alta', 625),
(363, 'fb8edfc304b74b03032507306b8bf9bc.jpg', 'Juego de 10 llaves', '1-1/2,3/4,12,10,16,1-1/16,18,7/8', 4500, 8, 0, 'Bien ', 'alta', 625),
(364, '77bd0cc86421e57bcf07db086e7caba1.jpg', 'caja de dados ', 'Alen ', 2000, 38, 0, 'usadas ', 'alta', 659),
(365, '6003ff645ca12e9a0ca07a4a057969d4.jpg', 'Juego de llaves de llaves españolas ', '1-1/4,7/16,11,1-1/2,1-9/16,1-5/8', 1200, 6, 0, 'ATD', 'alta', 625);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `accion` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id_log`, `idUsuario`, `accion`, `fecha`, `hora`) VALUES
(1, 73, 'Creó el usuario: PERFECTO LUNA BARRAGÁN ', '2022-09-13', '14:32:25'),
(2, 74, 'Registró gaveta: Gaveta ', '2022-09-13', '14:34:26'),
(3, 74, 'Registró cajón: Cajon 1', '2022-09-13', '14:34:26'),
(4, 74, 'Registró cajón: Cajon 2', '2022-09-13', '14:34:26'),
(5, 74, 'Registró cajón: Cajon 3', '2022-09-13', '14:34:26'),
(6, 74, 'Registró la herramienta: Perico ', '2022-09-13', '14:34:56'),
(7, 73, 'Eliminó la gaveta: Gaveta ', '2022-09-13', '14:36:53'),
(8, 73, 'Eliminó todas las herramientas de la gaveta: Gaveta ', '2022-09-13', '14:36:53'),
(9, 73, 'Cambió contraseña al usuario: PERFECTO LUNA BARRAGÁN ', '2022-09-13', '14:42:35'),
(10, 73, 'Registró gaveta: PRUEBA ', '2022-09-13', '14:48:41'),
(11, 73, 'Registró cajón: Cajon 1', '2022-09-13', '14:48:41'),
(12, 73, 'Registró cajón: Cajon 2', '2022-09-13', '14:48:41'),
(13, 73, 'Registró cajón: Cajon 3', '2022-09-13', '14:48:41'),
(14, 73, 'Registró la herramienta: Prueba herramienta ', '2022-09-13', '14:50:46'),
(15, 73, 'Registró la herramienta: Prueba 2', '2022-09-13', '14:51:57'),
(16, 73, 'Creó el usuario: Dimas ', '2022-09-13', '15:01:19'),
(17, 75, 'Registró la herramienta: Herramienta dimas', '2022-09-13', '15:02:34'),
(18, 75, 'Actualizó al mecánico: Truper nuevas /Dimas', '2022-09-13', '15:27:18'),
(19, 75, 'Registró la herramienta: Matraca cabeza de pera de 13mm', '2022-09-13', '17:55:05'),
(20, 75, 'Registró la herramienta: Pinza de corte diagonal de 175mm', '2022-09-13', '17:56:33'),
(21, 75, 'Registró la herramienta: Llave para filtro de aceite ', '2022-09-13', '17:58:16'),
(22, 75, 'Registró la herramienta: Matraca 12,7mm, cabeza de pera ', '2022-09-13', '18:01:26'),
(23, 75, 'Registró la herramienta: Pinzas de presión, mordaza curva de 250mm, mangos recubiertos ', '2022-09-13', '18:03:25'),
(24, 75, 'Registró la herramienta: Matraca cabeza redonda de 13mm.', '2022-09-13', '18:04:53'),
(25, 75, 'Registró la herramienta: Llave de banda ', '2022-09-13', '18:06:11'),
(26, 75, 'Registró la herramienta: Pinzas de chófer de 200mm', '2022-09-13', '18:10:34'),
(27, 75, 'Registró la herramienta: Matraca telescópica cabeza flexible ', '2022-09-13', '18:12:49'),
(28, 75, 'Registró la herramienta: Saca bujías articulado 10\'\'(254mm)', '2022-09-13', '18:14:29'),
(29, 75, 'Registró la herramienta: Extensión de 12,7mm x 63,5mm', '2022-09-13', '18:16:14'),
(30, 75, 'Registró la herramienta: Pinza de electricista 225mm', '2022-09-13', '18:17:19'),
(31, 75, 'Registró la herramienta: Pinza de electricista 200mm', '2022-09-13', '21:29:56'),
(32, 75, 'Actualizó la herramienta: Pinza de electricista 200mm', '2022-09-13', '21:31:54'),
(33, 75, 'Registró la herramienta: Pinza de presión, mordaza curva de 254mm', '2022-09-13', '21:34:33'),
(34, 75, 'Registró la herramienta: Matraca doble cuadro 6,3mm - 9,5mm', '2022-09-13', '21:47:40'),
(35, 75, 'Registró la herramienta: Llave de banda para filtros de aceite ', '2022-09-13', '21:54:41'),
(36, 75, 'Registró la herramienta: Saca bujías articulado 10\"(254mm)', '2022-09-13', '21:57:02'),
(37, 75, 'Registró la herramienta: Matraca cabeza de pera de 9,5mm ', '2022-09-13', '21:59:29'),
(38, 75, 'Registró la herramienta: Llave universal de 3 mordazas para filtros de aceite ', '2022-09-13', '22:01:17'),
(39, 75, 'Registró la herramienta: Extensión de 9,5mm x 76,2mm', '2022-09-13', '22:02:39'),
(40, 75, 'Registró la herramienta: Matraca triple cuadro ', '2022-09-13', '23:34:56'),
(41, 75, 'Registró la herramienta: Llave para filtros de aceite (63,5mm-82,5mm)', '2022-09-13', '23:36:50'),
(42, 73, 'Registró la herramienta: Caja gris', '2022-09-19', '19:19:24'),
(43, 73, 'Registró la herramienta: Caja gris', '2022-09-19', '19:19:24'),
(44, 73, 'Eliminó la herramienta: Caja gris', '2022-09-19', '19:19:47'),
(45, 73, 'Registró gaveta: Prueba ', '2022-09-19', '19:23:51'),
(46, 73, 'Registró cajón: Cajon 1', '2022-09-19', '19:23:51'),
(47, 73, 'Registró cajón: Cajon 2', '2022-09-19', '19:23:51'),
(48, 73, 'Registró cajón: Cajon 3', '2022-09-19', '19:23:51'),
(49, 73, 'Registró la herramienta: Prueba ', '2022-09-19', '19:24:43'),
(50, 73, 'Eliminó la gaveta: Prueba ', '2022-09-19', '19:25:52'),
(51, 73, 'Eliminó todas las herramientas de la gaveta: Prueba ', '2022-09-19', '19:25:52'),
(52, 73, 'Registró la herramienta: Tijera multiuso', '2022-09-26', '15:46:22'),
(53, 73, 'Registró la herramienta: Cortador de borde cóncavo de acero inoxidable ', '2022-09-26', '15:51:52'),
(54, 73, 'Registró la herramienta: Pelacables ', '2022-09-26', '16:00:20'),
(55, 73, 'Registró la herramienta: Alicate ', '2022-09-26', '16:02:12'),
(56, 73, 'Registró la herramienta: Pinzas para anillos de retención ', '2022-09-26', '16:05:36'),
(57, 73, 'Registró la herramienta: Matraca ', '2022-09-26', '16:09:35'),
(58, 73, 'Registró la herramienta: Soporte de carpeta ', '2022-09-26', '16:11:17'),
(59, 73, 'Registró la herramienta: Pinzas de extensión ', '2022-09-26', '16:13:51'),
(60, 73, 'Registró la herramienta: Snap on blue point Demagnetizer', '2022-09-26', '16:20:49'),
(61, 73, 'Registró la herramienta: Alicate con rueda ', '2022-09-26', '16:22:31'),
(62, 73, 'Registró la herramienta: Pinzas para aros', '2022-09-26', '16:23:52'),
(63, 73, 'Registró la herramienta: 2 Alicates ', '2022-09-26', '16:24:59'),
(64, 73, 'Registró la herramienta: Cortador diagonal', '2022-09-26', '16:26:14'),
(65, 73, 'Registró la herramienta: Alicate truper', '2022-09-26', '16:27:32'),
(66, 73, 'Registró la herramienta: Alicate ', '2022-09-26', '16:28:44'),
(67, 73, 'Registró la herramienta: Alicate diagonal ', '2022-09-26', '16:30:26'),
(68, 73, 'Registró la herramienta: Alicate ', '2022-09-26', '16:31:56'),
(69, 73, 'Registró la herramienta: Pinza para anillo de gallo', '2022-09-26', '16:32:49'),
(70, 73, 'Registró la herramienta: Pinzas de presión ', '2022-09-26', '16:35:05'),
(71, 73, 'Registró la herramienta: Pinzas de presión ', '2022-09-26', '16:37:41'),
(72, 73, 'Registró la herramienta: Separador de freno de disco ', '2022-09-26', '16:41:11'),
(73, 73, 'Registró la herramienta: Pinza de presión 7\"', '2022-09-26', '16:42:18'),
(74, 73, 'Registró la herramienta: Llave de perico vise-grip', '2022-09-26', '16:52:58'),
(75, 73, 'Registró la herramienta: Llave de perico ajustable ', '2022-09-26', '16:53:57'),
(76, 73, 'Registró la herramienta: Herramienta profesional de crimpado', '2022-09-26', '17:14:47'),
(77, 73, 'Registró la herramienta: Cortador de cadena', '2022-09-26', '17:20:28'),
(78, 73, 'Registró la herramienta: Dados tipo nudos ', '2022-09-26', '17:25:03'),
(79, 73, 'Registró la herramienta: Dado largo', '2022-09-26', '17:27:33'),
(80, 73, 'Registró la herramienta: Cinta métrica ', '2022-09-26', '17:31:05'),
(81, 73, 'Registró la herramienta: Destornillador plano grande', '2022-09-26', '17:33:57'),
(82, 73, 'Registró la herramienta: 9 destornilladores ', '2022-09-28', '18:49:27'),
(83, 73, 'Registró la herramienta: 8 destirnilladores', '2022-09-28', '18:51:56'),
(84, 73, 'Registró la herramienta: tubo de tuberia', '2022-09-28', '18:53:22'),
(85, 73, 'Registró la herramienta: puntas de osciloscopio', '2022-09-28', '18:54:40'),
(86, 73, 'Registró la herramienta: desarmador de caja ', '2022-09-28', '18:55:59'),
(87, 73, 'Registró la herramienta: Juego de dados de punta de impacto', '2022-09-28', '19:01:51'),
(88, 73, 'Registró la herramienta: Caja de puntillas tubos destornillador ', '2022-09-28', '19:07:12'),
(89, 73, 'Registró la herramienta: Sacador de dados', '2022-09-28', '19:09:21'),
(90, 73, 'Registró la herramienta: set de pulido', '2022-09-28', '19:10:56'),
(91, 73, 'Registró la herramienta: destornillador de impacto con puntas ', '2022-09-28', '19:15:00'),
(92, 73, 'Registró la herramienta: Repuesto', '2022-09-28', '19:17:13'),
(93, 73, 'Registró la herramienta: 2 llaves ', '2022-09-28', '19:18:54'),
(94, 73, 'Registró la herramienta: Juego de 4 brocas escalonadas', '2022-09-28', '19:21:26'),
(95, 73, 'Registró la herramienta: estuche instrumental con Luz ', '2022-09-28', '19:28:01'),
(96, 73, 'Actualizó la herramienta: estuche instrumental con Luz ', '2022-09-28', '20:04:59'),
(97, 73, 'Registró la herramienta: broca larga hhs316', '2022-09-28', '20:24:31'),
(98, 73, 'Registró la herramienta: broca larga hhs316', '2022-09-28', '20:24:31'),
(99, 73, 'Registró la herramienta: broca mediana weston', '2022-09-28', '20:26:13'),
(100, 73, 'Registró la herramienta: 2 brocas medianas ', '2022-09-28', '20:29:42'),
(101, 73, 'Registró la herramienta: base magnetica', '2022-09-28', '20:31:48'),
(102, 73, 'Registró la herramienta: reloj para base magnetica ', '2022-09-28', '20:34:45'),
(103, 73, 'Registró la herramienta: 7 Machuelos ', '2022-09-28', '21:54:23'),
(104, 73, 'Registró la herramienta: Puntas de destornillador ', '2022-09-28', '21:59:43'),
(105, 73, 'Registró la herramienta: Juego de destirnilladores y brocas pretul', '2022-09-28', '22:11:41'),
(106, 73, 'Actualizó la herramienta: Juego de destirnilladores y brocas pretul', '2022-09-28', '22:12:44'),
(107, 73, 'Registró la herramienta: juego de machuelos', '2022-09-28', '22:17:30'),
(108, 73, 'Registró la herramienta: 2 llaves arrancador', '2022-09-28', '22:24:22'),
(109, 73, 'Registró la herramienta: 2 llaves arrancador', '2022-09-28', '22:24:22'),
(110, 73, 'Registró la herramienta: lápiz con puntas ', '2022-09-28', '22:29:10'),
(111, 73, 'Registró la herramienta: 3 puntas allen', '2022-09-28', '22:32:42'),
(112, 73, 'Registró la herramienta: lima rotativa', '2022-09-28', '22:34:27'),
(113, 73, 'Registró la herramienta: extractor para microfiltro', '2022-09-28', '22:38:13'),
(114, 73, 'Registró la herramienta: Medidor de profundidad', '2022-09-28', '22:48:02'),
(115, 73, 'Registró la herramienta: tornillos', '2022-09-28', '22:49:07'),
(116, 73, 'Registró la herramienta: 2 llaves alen', '2022-09-28', '22:50:32'),
(117, 73, 'Registró la herramienta: espejo telescopico', '2022-09-28', '22:52:02'),
(118, 73, 'Registró la herramienta: mini clavos estriados ', '2022-09-28', '22:53:55'),
(119, 73, 'Registró la herramienta: destornillador magnetico', '2022-09-28', '22:59:37'),
(120, 73, 'Registró la herramienta: 7 llaves tele allen', '2022-09-29', '17:41:04'),
(121, 73, 'Registró gaveta: Prueba', '2022-09-29', '18:12:55'),
(122, 73, 'Registró cajón: Cajon 1', '2022-09-29', '18:12:55'),
(123, 73, 'Registró la herramienta: Algo', '2022-09-29', '18:14:22'),
(124, 73, 'Registró la herramienta: Otra prueba ', '2022-09-29', '18:15:04'),
(125, 73, 'Eliminó la herramienta: broca larga hhs316', '2022-09-29', '19:44:32'),
(126, 73, 'Actualizó el usuario: Almacén electronico', '2022-09-29', '19:51:49'),
(127, 73, 'Registró la herramienta: algo', '2022-09-29', '19:52:01'),
(128, 73, 'Registró la herramienta: kgjgj', '2022-09-29', '19:52:51'),
(129, 73, 'Registró al mecánico: Abel ', '2022-09-29', '21:13:28'),
(130, 73, 'Registró gaveta: Husky 2. 1/4 oz', '2022-09-29', '21:17:18'),
(131, 73, 'Registró cajón: Cajon 1', '2022-09-29', '21:17:18'),
(132, 73, 'Registró cajón: Cajon 2', '2022-09-29', '21:17:18'),
(133, 73, 'Registró cajón: Cajon 3', '2022-09-29', '21:17:18'),
(134, 73, 'Registró cajón: Cajon 4', '2022-09-29', '21:17:18'),
(135, 73, 'Registró cajón: Cajon 5', '2022-09-29', '21:17:18'),
(136, 73, 'Registró cajón: Cajon 6', '2022-09-29', '21:17:18'),
(137, 73, 'Registró cajón: Cajon 7', '2022-09-29', '21:17:18'),
(138, 73, 'Registró cajón: Cajon 8', '2022-09-29', '21:17:18'),
(139, 73, 'Registró cajón: Cajon 9', '2022-09-29', '21:17:18'),
(140, 73, 'Registró la herramienta: pinzas para filtro de aceite ', '2022-09-29', '21:21:42'),
(141, 73, 'Registró la herramienta: pinza para anillos de retención ', '2022-09-29', '21:42:26'),
(142, 73, 'Registró la herramienta: pinzas de extención ', '2022-09-29', '21:44:28'),
(143, 73, 'Registró la herramienta: Soporte de resorte giratorio', '2022-09-29', '22:10:59'),
(144, 73, 'Actualizó la herramienta: Soporte de resorte giratorio', '2022-09-29', '22:11:59'),
(145, 73, 'Registró la herramienta: Set de barras de extensión ', '2022-09-29', '22:17:41'),
(146, 73, 'Registró la herramienta: Navaja', '2022-09-29', '22:18:44'),
(147, 73, 'Registró la herramienta: Regla ', '2022-09-29', '22:21:05'),
(148, 73, 'Registró la herramienta: Lámpara de luz negra', '2022-09-29', '22:23:09'),
(149, 73, 'Registró la herramienta: Telescopio de espejo', '2022-09-29', '22:24:39'),
(150, 73, 'Registró la herramienta: Extensiones snap', '2022-09-29', '22:26:41'),
(151, 73, 'Registró la herramienta: Lamparas', '2022-09-29', '22:28:24'),
(152, 73, 'Registró la herramienta: Medidor de profundidad ', '2022-09-29', '22:30:02'),
(153, 73, 'Registró la herramienta: Alaba de seguridad', '2022-09-29', '22:31:45'),
(154, 73, 'Registró la herramienta: Llave de carraca', '2022-09-29', '22:33:16'),
(155, 73, 'Registró la herramienta: Torquimetro', '2022-09-29', '22:34:21'),
(156, 73, 'Registró la herramienta: 3 lápices medidores', '2022-09-29', '22:36:05'),
(157, 73, 'Registró la herramienta: Pinzas de sellado', '2022-09-29', '22:37:28'),
(158, 73, 'Registró la herramienta: Puntillas de máquina de rectificadora ', '2022-09-29', '22:40:51'),
(159, 73, 'Registró la herramienta: Bisagra de soporte', '2022-09-29', '22:42:27'),
(160, 73, 'Registró la herramienta: Regla de madera', '2022-09-29', '22:43:41'),
(161, 73, 'Registró la herramienta: Desarmadores', '2022-09-29', '22:46:04'),
(162, 73, 'Registró la herramienta: 8 juegos llave con arillo', '2022-09-29', '22:46:50'),
(163, 73, 'Registró la herramienta: 7 llaves individuales ', '2022-09-29', '22:48:21'),
(164, 73, 'Registró la herramienta: Tenazas para corriente', '2022-09-29', '22:50:05'),
(165, 73, 'Registró la herramienta: Clavija', '2022-09-29', '22:51:33'),
(166, 73, 'Registró la herramienta: Perno', '2022-09-29', '22:52:22'),
(167, 73, 'Registró la herramienta: Tapa de matraca ', '2022-09-29', '22:53:51'),
(168, 73, 'Registró la herramienta: Etiquetas', '2022-09-29', '22:54:43'),
(169, 73, 'Registró la herramienta: 2 candados', '2022-09-29', '22:55:19'),
(170, 73, 'Registró la herramienta: Navajas ', '2022-09-29', '22:56:56'),
(171, 73, 'Recuperó la herramienta: jkldjklajdkldas', '2022-09-30', '06:43:52'),
(172, 73, 'Recuperó la herramienta: Desatornillador', '2022-09-30', '06:44:31'),
(173, 73, 'Eliminó la herramienta: Desatornillador', '2022-09-30', '06:45:32'),
(174, 73, 'Eliminó la herramienta: jkldjklajdkldas', '2022-09-30', '06:45:50'),
(175, 73, 'Registró la herramienta: pinza para seguros ', '2022-09-30', '14:31:10'),
(176, 73, 'Registró la herramienta: pinzas para abrazaderas de presión ', '2022-09-30', '14:33:24'),
(177, 73, 'Registró la herramienta: pinzas de presión de punta ', '2022-09-30', '14:34:24'),
(178, 73, 'Registró la herramienta: pinzas de presión 10\"', '2022-09-30', '14:37:44'),
(179, 73, 'Registró la herramienta: pinzas de presión 6\"', '2022-09-30', '14:38:39'),
(180, 73, 'Registró la herramienta: pinzas para seguros ', '2022-09-30', '14:40:11'),
(181, 73, 'Registró la herramienta: alicate de punta ', '2022-09-30', '14:41:15'),
(182, 73, 'Registró la herramienta: alicate deslizante ', '2022-09-30', '14:43:01'),
(183, 73, 'Registró la herramienta: alicate ajustable ', '2022-09-30', '14:44:11'),
(184, 73, 'Registró la herramienta: pinzas de corte ', '2022-09-30', '14:46:02'),
(185, 73, 'Registró la herramienta: pinzas de mecánica ', '2022-09-30', '14:48:22'),
(186, 73, 'Registró la herramienta: pinzas para seguros Omega ', '2022-09-30', '14:49:06'),
(187, 73, 'Registró la herramienta: Juego de llave con Matraca porta rojo', '2022-09-30', '14:49:23'),
(188, 73, 'Registró la herramienta: pinza de erraje ', '2022-09-30', '14:50:17'),
(189, 73, 'Registró la herramienta: Juego porta llave Craftman ', '2022-09-30', '14:51:55'),
(190, 73, 'Registró la herramienta: Juego de llaves pequeñas ', '2022-09-30', '14:53:32'),
(191, 73, 'Registró la herramienta: llave 14 mm', '2022-09-30', '14:54:37'),
(192, 73, 'Registró la herramienta: llave 15 ', '2022-09-30', '14:55:16'),
(193, 73, 'Registró la herramienta: Juego de llaves con matraca ', '2022-09-30', '14:55:50'),
(194, 73, 'Registró la herramienta: llave 16 mm', '2022-09-30', '14:55:54'),
(195, 73, 'Registró la herramienta: llave 15 mm', '2022-09-30', '14:56:41'),
(196, 73, 'Registró la herramienta: llave 16 ', '2022-09-30', '14:57:50'),
(197, 73, 'Registró la herramienta: llave 19 mm', '2022-09-30', '14:58:30'),
(198, 73, 'Registró la herramienta: llave 19', '2022-09-30', '14:59:22'),
(199, 73, 'Registró la herramienta: llave 18mm', '2022-09-30', '14:59:52'),
(200, 73, 'Registró la herramienta: Llave con doble cara  craftsman', '2022-09-30', '15:00:08'),
(201, 73, 'Registró la herramienta: llave 22mm', '2022-09-30', '15:00:21'),
(202, 73, 'Registró la herramienta: llave de matraca 16mm', '2022-09-30', '15:01:03'),
(203, 73, 'Registró la herramienta: Juego de llaves con matraca y doble cara', '2022-09-30', '15:01:28'),
(204, 73, 'Registró la herramienta: llave de matraca 14mm', '2022-09-30', '15:01:34'),
(205, 73, 'Registró la herramienta: llave 12 ', '2022-09-30', '15:02:38'),
(206, 73, 'Registró la herramienta: llave 5/8', '2022-09-30', '15:55:13'),
(207, 73, 'Registró la herramienta: llave 13/16\"', '2022-09-30', '15:55:57'),
(208, 73, 'Registró la herramienta: llave 3/4', '2022-09-30', '15:57:05'),
(209, 73, 'Registró la herramienta: llave 13/16', '2022-09-30', '15:57:35'),
(210, 73, 'Actualizó la herramienta: llave 13/16', '2022-09-30', '15:58:26'),
(211, 73, 'Registró la herramienta: llave 7/8\"', '2022-09-30', '15:59:10'),
(212, 73, 'Registró la herramienta: llave 1\"', '2022-09-30', '16:00:11'),
(213, 73, 'Registró la herramienta: llave 6', '2022-09-30', '16:01:39'),
(214, 73, 'Registró la herramienta: llave 1/4', '2022-09-30', '16:02:24'),
(215, 73, 'Registró la herramienta: llave 1/4\"', '2022-09-30', '16:03:06'),
(216, 73, 'Registró la herramienta: llave 1/4\"', '2022-09-30', '16:03:07'),
(217, 73, 'Eliminó la herramienta: llave 13/16', '2022-09-30', '16:03:33'),
(218, 73, 'Registró la herramienta: llave 3/8 ', '2022-09-30', '16:04:12'),
(219, 73, 'Registró la herramienta: llave 3/8\"', '2022-09-30', '16:04:51'),
(220, 73, 'Registró la herramienta: llave 1/2 ', '2022-09-30', '16:06:35'),
(221, 73, 'Registró la herramienta: llave de matraca 9/16\"', '2022-09-30', '16:07:28'),
(222, 73, 'Registró la herramienta: llave 9/16', '2022-09-30', '16:07:58'),
(223, 73, 'Registró la herramienta: llave 14mm', '2022-09-30', '16:08:29'),
(224, 73, 'Registró la herramienta: llave 5/8 ', '2022-09-30', '16:09:57'),
(225, 73, 'Registró la herramienta: llave 11/16', '2022-09-30', '16:11:22'),
(226, 73, 'Registró la herramienta: llave 11/16', '2022-09-30', '16:12:14'),
(227, 73, 'Registró la herramienta: llave 3/4 ', '2022-09-30', '16:12:41'),
(228, 73, 'Registró la herramienta: extención ', '2022-09-30', '16:14:28'),
(229, 73, 'Registró la herramienta: extención ', '2022-09-30', '16:15:45'),
(230, 73, 'Registró la herramienta: extención ', '2022-09-30', '16:16:47'),
(231, 73, 'Registró la herramienta: extención ', '2022-09-30', '16:17:25'),
(232, 73, 'Registró la herramienta: extención ', '2022-09-30', '16:20:11'),
(233, 73, 'Registró la herramienta: caja de dados ', '2022-09-30', '16:23:49'),
(234, 73, 'Registró la herramienta: dado 1/2', '2022-09-30', '16:25:13'),
(235, 73, 'Registró la herramienta: dado 9/16', '2022-09-30', '16:26:13'),
(236, 73, 'Registró la herramienta: dado 11/16', '2022-09-30', '16:27:35'),
(237, 73, 'Registró la herramienta: dado 1\"', '2022-09-30', '16:28:11'),
(238, 73, 'Registró la herramienta: dado 1/16', '2022-09-30', '16:29:04'),
(239, 73, 'Registró la herramienta: dado 1\"', '2022-09-30', '16:29:29'),
(240, 73, 'Registró la herramienta: caja de dados ', '2022-09-30', '16:33:48'),
(241, 73, 'Registró la herramienta: llave estilson ', '2022-09-30', '16:36:26'),
(242, 73, 'Registró la herramienta: llave estilson ', '2022-09-30', '16:37:41'),
(243, 73, 'Registró la herramienta: pinzas para seguros', '2022-09-30', '18:42:02'),
(244, 73, 'Registró la herramienta: pinzas de seguro Omega ', '2022-09-30', '18:44:00'),
(245, 73, 'Eliminó la herramienta: 2 candados', '2022-09-30', '19:36:22'),
(246, 73, 'Recuperó la herramienta: 2 candados', '2022-09-30', '19:37:38'),
(247, 73, 'Registró la herramienta: Porta llaves con matraca', '2022-09-30', '21:12:27'),
(248, 73, 'Registró la herramienta: Juego llaves azul celeste', '2022-09-30', '21:16:10'),
(249, 73, 'Registró la herramienta: Juego de 3 alicates ', '2022-09-30', '21:18:21'),
(250, 73, 'Registró la herramienta: Set de rebarbadores', '2022-09-30', '21:20:47'),
(251, 73, 'Registró la herramienta: Juego de removedores de sellado', '2022-09-30', '21:22:46'),
(252, 73, 'Registró la herramienta: Pinzas de corte', '2022-09-30', '21:25:35'),
(253, 73, 'Actualizó la herramienta: Pinzas de corte', '2022-09-30', '21:26:39'),
(254, 73, 'Registró la herramienta: 2 llaves españolas', '2022-09-30', '21:28:39'),
(255, 73, 'Registró la herramienta: Tijeras industriales ', '2022-09-30', '21:30:12'),
(256, 73, 'Registró la herramienta: Desarmador', '2022-09-30', '21:32:49'),
(257, 73, 'Registró la herramienta: Desarmadores snap on', '2022-09-30', '21:41:50'),
(258, 73, 'Registró la herramienta: Juego Llave combinada ', '2022-09-30', '21:45:10'),
(259, 73, 'Registró la herramienta: 9 Llaves combinadas', '2022-09-30', '21:55:26'),
(260, 73, 'Registró la herramienta: 3 Llaves dobles ', '2022-09-30', '21:57:07'),
(261, 73, 'Registró la herramienta: Juego de 10 llaves', '2022-09-30', '22:21:19'),
(262, 73, 'Registró la herramienta: caja de dados ', '2022-09-30', '22:30:21'),
(263, 73, 'Registró la herramienta: Juego de llaves de llaves españolas ', '2022-09-30', '22:51:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanicos`
--

CREATE TABLE `mecanicos` (
  `id_mecanico` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `area` varchar(100) DEFAULT NULL,
  `foto` varchar(128) DEFAULT 'sinFotoPerf.png',
  `estatus` varchar(10) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mecanicos`
--

INSERT INTO `mecanicos` (`id_mecanico`, `nombre`, `area`, `foto`, `estatus`) VALUES
(3, 'JUAN CARLOS TECUA ', NULL, 'sinFotoPerf.png', 'inactivo'),
(4, 'BRANDON YAEL GARCIA GARCIA', 'PINTURA', '19168e63fcabd8f65370b240e23b0cd7.jpg', 'activo'),
(5, 'ADAN PEREZ LUNA', 'LAMINADO', '9812aac055aa4dd2b1e5c6f01e779b26.jpg', 'inactivo'),
(10, 'Abel Carrera', 'mecánica', '935e8669d20727d4fdcb2ed56eacddea.JPG', 'activo'),
(11, 'Leonardo Antonio Sanchez Contreras', 'Mecánico', '712dbaf4f282938266c82c003a923df2.jpeg', 'inactivo'),
(12, 'Jorge Tobon Garcia', 'mecanicos', 'sinFotoPerf.png', 'activo'),
(13, 'Perfecto', 'Recepcion', 'sinFotoPerf.png', 'activo'),
(14, 'Truper nuevas /Dimas', 'Almacén electrico', 'sinFotoPerf.png', 'activo'),
(15, 'Abel ', 'mecanicos', 'sinFotoPerf.png', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'sinFotoPerf.png',
  `tipo` varchar(100) DEFAULT NULL,
  `permisos` varchar(15) DEFAULT '0000000000',
  `secreta` varchar(255) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `email`, `password`, `foto`, `tipo`, `permisos`, `secreta`, `estatus`) VALUES
(27, 'RICARDO ADMIN', 'cabanzo007@gmail.com', 'N0VoS1kyajNETmZlSXp5S0NWNzVVUT09', '157421671bd0fe1f0425cc985f7e0e0e.jpg', '1', 'SUPERADMIN', 'QytzSlNOVHBWZ0Mya1V5Q1hFNVNUUT09', 'activo'),
(73, 'ADMINISTRADOR', 'administrador@georgio.com', 'RnQ5cWY3Rit5SmVJbzBDQzhsSkI0QT09', '157421671bd0fe1f0425cc985f7e0e0e.jpg', '1', 'SUPERADMIN', NULL, 'activo'),
(74, 'PERFECTO LUNA BARRAGÁN ', 'luna@georgio.com', 'VXQvc3J6dTBCTFlsR1ZneHZORDl5UT09', 'sinFotoPerf.png', '1', 'ADMIN', NULL, 'activo'),
(75, 'Almacén electronico', 'alamcen@georgio.com', 'WUxUNDd5akl3YlMzTXBHVXYwb1J3Zz09', 'sinFotoPerf.png', '1', 'ADMIN', NULL, 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inv_cajones`
--
ALTER TABLE `inv_cajones`
  ADD PRIMARY KEY (`id_cajon`),
  ADD KEY `idgabeta_fk_gabeta` (`id_gabeta`);

--
-- Indices de la tabla `inv_gabeta`
--
ALTER TABLE `inv_gabeta`
  ADD PRIMARY KEY (`id_gabeta`),
  ADD KEY `idgabeta_fk_idmecanico` (`idmecanico`);

--
-- Indices de la tabla `inv_herramienta`
--
ALTER TABLE `inv_herramienta`
  ADD PRIMARY KEY (`idHerramienta`),
  ADD KEY `ideMecanico` (`id_cajon`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `idUsuario_fk_Usuario` (`idUsuario`);

--
-- Indices de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD PRIMARY KEY (`id_mecanico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inv_cajones`
--
ALTER TABLE `inv_cajones`
  MODIFY `id_cajon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=661;

--
-- AUTO_INCREMENT de la tabla `inv_gabeta`
--
ALTER TABLE `inv_gabeta`
  MODIFY `id_gabeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `inv_herramienta`
--
ALTER TABLE `inv_herramienta`
  MODIFY `idHerramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  MODIFY `id_mecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inv_cajones`
--
ALTER TABLE `inv_cajones`
  ADD CONSTRAINT `idgabeta_fk_gabeta` FOREIGN KEY (`id_gabeta`) REFERENCES `inv_gabeta` (`id_gabeta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inv_gabeta`
--
ALTER TABLE `inv_gabeta`
  ADD CONSTRAINT `idgabeta_fk_idmecanico` FOREIGN KEY (`idmecanico`) REFERENCES `mecanicos` (`id_mecanico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inv_herramienta`
--
ALTER TABLE `inv_herramienta`
  ADD CONSTRAINT `id_cajon_fk_cajon` FOREIGN KEY (`id_cajon`) REFERENCES `inv_cajones` (`id_cajon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `idUsuario_fk_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
