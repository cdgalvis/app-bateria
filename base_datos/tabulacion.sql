-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 03:55:05
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tabulacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `departments_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `nombre`, `active`, `departments_id`) VALUES
(1, 'ABRIAQUI', 1, 5),
(2, 'ACACIAS', 1, 50),
(3, 'ACANDI', 1, 27),
(4, 'ACEVEDO', 1, 41),
(5, 'ACHI', 1, 13),
(6, 'AGRADO', 1, 41),
(7, 'AGUA DE DIOS', 1, 25),
(8, 'AGUACHICA', 1, 20),
(9, 'AGUADA', 1, 68),
(10, 'AGUADAS', 1, 17),
(11, 'AGUAZUL', 1, 85),
(12, 'AGUSTIN CODAZZI', 1, 20),
(13, 'AIPE', 1, 41),
(14, 'ALBANIA', 1, 18),
(15, 'ALBANIA', 1, 44),
(16, 'ALBANIA', 1, 68),
(17, 'ALBAN', 1, 25),
(18, 'ALBAN (SAN JOSE)', 1, 52),
(19, 'ALCALA', 1, 76),
(20, 'ALEJANDRIA', 1, 5),
(21, 'ALGARROBO', 1, 47),
(22, 'ALGECIRAS', 1, 41),
(23, 'ALMAGUER', 1, 19),
(24, 'ALMEIDA', 1, 15),
(25, 'ALPUJARRA', 1, 73),
(26, 'ALTAMIRA', 1, 41),
(27, 'ALTO BAUDO (PIE DE PATO)', 1, 27),
(28, 'ALTOS DEL ROSARIO', 1, 13),
(29, 'ALVARADO', 1, 73),
(30, 'AMAGA', 1, 5),
(31, 'AMALFI', 1, 5),
(32, 'AMBALEMA', 1, 73),
(33, 'ANAPOIMA', 1, 25),
(34, 'ANCUYA', 1, 52),
(35, 'ANDALUCIA', 1, 76),
(36, 'ANDES', 1, 5),
(37, 'ANGELOPOLIS', 1, 5),
(38, 'ANGOSTURA', 1, 5),
(39, 'ANOLAIMA', 1, 25),
(40, 'ANORI', 1, 5),
(41, 'ANSERMA', 1, 17),
(42, 'ANSERMANUEVO', 1, 76),
(43, 'ANZOATEGUI', 1, 73),
(44, 'ANZA', 1, 5),
(45, 'APARTADO', 1, 5),
(46, 'APULO', 1, 25),
(47, 'APIA', 1, 66),
(48, 'AQUITANIA', 1, 15),
(49, 'ARACATACA', 1, 47),
(50, 'ARANZAZU', 1, 17),
(51, 'ARATOCA', 1, 68),
(52, 'ARAUCA', 1, 81),
(53, 'ARAUQUITA', 1, 81),
(54, 'ARBELAEZ', 1, 25),
(55, 'ARBOLEDA (BERRUECOS)', 1, 52),
(56, 'ARBOLEDAS', 1, 54),
(57, 'ARBOLETES', 1, 5),
(58, 'ARCABUCO', 1, 15),
(59, 'ARENAL', 1, 13),
(60, 'ARGELIA', 1, 5),
(61, 'ARGELIA', 1, 19),
(62, 'ARGELIA', 1, 76),
(63, 'ARIGUANI (EL DIFICIL)', 1, 47),
(64, 'ARJONA', 1, 13),
(65, 'ARMENIA', 1, 5),
(66, 'ARMENIA', 1, 63),
(67, 'ARMERO (GUAYABAL)', 1, 73),
(68, 'ARROYOHONDO', 1, 13),
(69, 'ASTREA', 1, 20),
(70, 'ATACO', 1, 73),
(71, 'ATRATO (YUTO)', 1, 27),
(72, 'AYAPEL', 1, 23),
(73, 'BAGADO', 1, 27),
(74, 'BAHIA SOLANO (MUTIS)', 1, 27),
(75, 'BAJO BAUDO (PIZARRO)', 1, 27),
(76, 'BALBOA', 1, 19),
(77, 'BALBOA', 1, 66),
(78, 'BARANOA', 1, 8),
(79, 'BARAYA', 1, 41),
(80, 'BARBACOAS', 1, 52),
(81, 'BARBOSA', 1, 5),
(82, 'BARBOSA', 1, 68),
(83, 'BARICHARA', 1, 68),
(84, 'BARRANCA DE UPIA', 1, 50),
(85, 'BARRANCABERMEJA', 1, 68),
(86, 'BARRANCAS', 1, 44),
(87, 'BARRANCO DE LOBA', 1, 13),
(88, 'BARRANQUILLA', 1, 8),
(89, 'BECERRIL', 1, 20),
(90, 'BELALCAZAR', 1, 17),
(91, 'BELLO', 1, 5),
(92, 'BELMIRA', 1, 5),
(93, 'BELTRAN', 1, 25),
(94, 'BELEN', 1, 15),
(95, 'BELEN', 1, 52),
(96, 'BELEN DE BAJIRA', 1, 27),
(97, 'BELEN DE UMBRIA', 1, 66),
(98, 'BELEN DE LOS ANDAQUIES', 1, 18),
(99, 'BERBEO', 1, 15),
(100, 'BETANIA', 1, 5),
(101, 'BETEITIVA', 1, 15),
(102, 'BETULIA', 1, 5),
(103, 'BETULIA', 1, 68),
(104, 'BITUIMA', 1, 25),
(105, 'BOAVITA', 1, 15),
(106, 'BOCHALEMA', 1, 54),
(107, 'BOGOTA D.C.', 1, 11),
(108, 'BOJACA', 1, 25),
(109, 'BOJAYA (BELLAVISTA)', 1, 27),
(110, 'BOLIVAR', 1, 5),
(111, 'BOLIVAR', 1, 19),
(112, 'BOLIVAR', 1, 68),
(113, 'BOLIVAR', 1, 76),
(114, 'BOSCONIA', 1, 20),
(115, 'BOYACA', 1, 15),
(116, 'BRICEÑO', 1, 5),
(117, 'BRICEÑO', 1, 15),
(118, 'BUCARAMANGA', 1, 68),
(119, 'BUCARASICA', 1, 54),
(120, 'BUENAVENTURA', 1, 76),
(121, 'BUENAVISTA', 1, 15),
(122, 'BUENAVISTA', 1, 23),
(123, 'BUENAVISTA', 1, 63),
(124, 'BUENAVISTA', 1, 70),
(125, 'BUENOS AIRES', 1, 19),
(126, 'BUESACO', 1, 52),
(127, 'BUGA', 1, 76),
(128, 'BUGALAGRANDE', 1, 76),
(129, 'BURITICA', 1, 5),
(130, 'BUSBANZA', 1, 15),
(131, 'CABRERA', 1, 25),
(132, 'CABRERA', 1, 68),
(133, 'CABUYARO', 1, 50),
(134, 'CACHIPAY', 1, 25),
(135, 'CAICEDO', 1, 5),
(136, 'CAICEDONIA', 1, 76),
(137, 'CAIMITO', 1, 70),
(138, 'CAJAMARCA', 1, 73),
(139, 'CAJIBIO', 1, 19),
(140, 'CAJICA', 1, 25),
(141, 'CALAMAR', 1, 13),
(142, 'CALAMAR', 1, 95),
(143, 'CALARCA', 1, 63),
(144, 'CALDAS', 1, 5),
(145, 'CALDAS', 1, 15),
(146, 'CALDONO', 1, 19),
(147, 'CALIFORNIA', 1, 68),
(148, 'CALIMA (DARIEN)', 1, 76),
(149, 'CALOTO', 1, 19),
(150, 'CALI', 1, 76),
(151, 'CAMPAMENTO', 1, 5),
(152, 'CAMPO DE LA CRUZ', 1, 8),
(153, 'CAMPOALEGRE', 1, 41),
(154, 'CAMPOHERMOSO', 1, 15),
(155, 'CANALETE', 1, 23),
(156, 'CANDELARIA', 1, 8),
(157, 'CANDELARIA', 1, 76),
(158, 'CANTAGALLO', 1, 13),
(159, 'CANTON DE SAN PABLO', 1, 27),
(160, 'CAPARRAPI', 1, 25),
(161, 'CAPITANEJO', 1, 68),
(162, 'CARACOLI', 1, 5),
(163, 'CARAMANTA', 1, 5),
(164, 'CARCASI', 1, 68),
(165, 'CAREPA', 1, 5),
(166, 'CARMEN DE APICALA', 1, 73),
(167, 'CARMEN DE CARUPA', 1, 25),
(168, 'CARMEN DE VIBORAL', 1, 5),
(169, 'CARMEN DEL DARIEN (CURBARADO)', 1, 27),
(170, 'CAROLINA', 1, 5),
(171, 'CARTAGENA', 1, 13),
(172, 'CARTAGENA DEL CHAIRA', 1, 18),
(173, 'CARTAGO', 1, 76),
(174, 'CARURU', 1, 97),
(175, 'CASABIANCA', 1, 73),
(176, 'CASTILLA LA NUEVA', 1, 50),
(177, 'CAUCASIA', 1, 5),
(178, 'CAÑASGORDAS', 1, 5),
(179, 'CEPITA', 1, 68),
(180, 'CERETE', 1, 23),
(181, 'CERINZA', 1, 15),
(182, 'CERRITO', 1, 68),
(183, 'CERRO SAN ANTONIO', 1, 47),
(184, 'CHACHAGUI', 1, 52),
(185, 'CHAGUANI', 1, 25),
(186, 'CHALAN', 1, 70),
(187, 'CHAPARRAL', 1, 73),
(188, 'CHARALA', 1, 68),
(189, 'CHARTA', 1, 68),
(190, 'CHIGORODO', 1, 5),
(191, 'CHIMA', 1, 68),
(192, 'CHIMICHAGUA', 1, 20),
(193, 'CHIMA', 1, 23),
(194, 'CHINAVITA', 1, 15),
(195, 'CHINCHINA', 1, 17),
(196, 'CHINACOTA', 1, 54),
(197, 'CHINU', 1, 23),
(198, 'CHIPAQUE', 1, 25),
(199, 'CHIPATA', 1, 68),
(200, 'CHIQUINQUIRA', 1, 15),
(201, 'CHIRIGUANA', 1, 20),
(202, 'CHISCAS', 1, 15),
(203, 'CHITA', 1, 15),
(204, 'CHITAGA', 1, 54),
(205, 'CHITARAQUE', 1, 15),
(206, 'CHIVATA', 1, 15),
(207, 'CHIVOLO', 1, 47),
(208, 'CHOACHI', 1, 25),
(209, 'CHOCONTA', 1, 25),
(210, 'CHAMEZA', 1, 85),
(211, 'CHIA', 1, 25),
(212, 'CHIQUIZA', 1, 15),
(213, 'CHIVOR', 1, 15),
(214, 'CICUCO', 1, 13),
(215, 'CIMITARRA', 1, 68),
(216, 'CIRCASIA', 1, 63),
(217, 'CISNEROS', 1, 5),
(218, 'CIENAGA', 1, 15),
(219, 'CIENAGA', 1, 47),
(220, 'CIENAGA DE ORO', 1, 23),
(221, 'CLEMENCIA', 1, 13),
(222, 'COCORNA', 1, 5),
(223, 'COELLO', 1, 73),
(224, 'COGUA', 1, 25),
(225, 'COLOMBIA', 1, 41),
(226, 'COLOSO (RICAURTE)', 1, 70),
(227, 'COLON', 1, 86),
(228, 'COLON (GENOVA)', 1, 52),
(229, 'CONCEPCION', 1, 5),
(230, 'CONCEPCION', 1, 68),
(231, 'CONCORDIA', 1, 5),
(232, 'CONCORDIA', 1, 47),
(233, 'CONDOTO', 1, 27),
(234, 'CONFINES', 1, 68),
(235, 'CONSACA', 1, 52),
(236, 'CONTADERO', 1, 52),
(237, 'CONTRATACION', 1, 68),
(238, 'CONVENCION', 1, 54),
(239, 'COPACABANA', 1, 5),
(240, 'COPER', 1, 15),
(241, 'CORDOBA', 1, 63),
(242, 'CORINTO', 1, 19),
(243, 'COROMORO', 1, 68),
(244, 'COROZAL', 1, 70),
(245, 'CORRALES', 1, 15),
(246, 'COTA', 1, 25),
(247, 'COTORRA', 1, 23),
(248, 'COVARACHIA', 1, 15),
(249, 'COVEÑAS', 1, 70),
(250, 'COYAIMA', 1, 73),
(251, 'CRAVO NORTE', 1, 81),
(252, 'CUASPUD (CARLOSAMA)', 1, 52),
(253, 'CUBARRAL', 1, 50),
(254, 'CUBARA', 1, 15),
(255, 'CUCAITA', 1, 15),
(256, 'CUCUNUBA', 1, 25),
(257, 'CUCUTILLA', 1, 54),
(258, 'CUITIVA', 1, 15),
(259, 'CUMARAL', 1, 50),
(260, 'CUMARIBO', 1, 99),
(261, 'CUMBAL', 1, 52),
(262, 'CUMBITARA', 1, 52),
(263, 'CUNDAY', 1, 73),
(264, 'CURILLO', 1, 18),
(265, 'CURITI', 1, 68),
(266, 'CURUMANI', 1, 20),
(267, 'CACERES', 1, 5),
(268, 'CACHIRA', 1, 54),
(269, 'CACOTA', 1, 54),
(270, 'CAQUEZA', 1, 25),
(271, 'CERTEGUI', 1, 27),
(272, 'COMBITA', 1, 15),
(273, 'CORDOBA', 1, 13),
(274, 'CORDOBA', 1, 52),
(275, 'CUCUTA', 1, 54),
(276, 'DABEIBA', 1, 5),
(277, 'DAGUA', 1, 76),
(278, 'DIBULLA', 1, 44),
(279, 'DISTRACCION', 1, 44),
(280, 'DOLORES', 1, 73),
(281, 'DON MATIAS', 1, 5),
(282, 'DOS QUEBRADAS', 1, 66),
(283, 'DUITAMA', 1, 15),
(284, 'DURANIA', 1, 54),
(285, 'EBEJICO', 1, 5),
(286, 'EL BAGRE', 1, 5),
(287, 'EL BANCO', 1, 47),
(288, 'EL CAIRO', 1, 76),
(289, 'EL CALVARIO', 1, 50),
(290, 'EL CARMEN', 1, 54),
(291, 'EL CARMEN', 1, 68),
(292, 'EL CARMEN DE ATRATO', 1, 27),
(293, 'EL CARMEN DE BOLIVAR', 1, 13),
(294, 'EL CASTILLO', 1, 50),
(295, 'EL CERRITO', 1, 76),
(296, 'EL CHARCO', 1, 52),
(297, 'EL COCUY', 1, 15),
(298, 'EL COLEGIO', 1, 25),
(299, 'EL COPEY', 1, 20),
(300, 'EL DONCELLO', 1, 18),
(301, 'EL DORADO', 1, 50),
(302, 'EL DOVIO', 1, 76),
(303, 'EL ESPINO', 1, 15),
(304, 'EL GUACAMAYO', 1, 68),
(305, 'EL GUAMO', 1, 13),
(306, 'EL MOLINO', 1, 44),
(307, 'EL PASO', 1, 20),
(308, 'EL PAUJIL', 1, 18),
(309, 'EL PEÑOL', 1, 52),
(310, 'EL PEÑON', 1, 13),
(311, 'EL PEÑON', 1, 68),
(312, 'EL PEÑON', 1, 25),
(313, 'EL PIÑON', 1, 47),
(314, 'EL PLAYON', 1, 68),
(315, 'EL RETORNO', 1, 95),
(316, 'EL RETEN', 1, 47),
(317, 'EL ROBLE', 1, 70),
(318, 'EL ROSAL', 1, 25),
(319, 'EL ROSARIO', 1, 52),
(320, 'EL TABLON DE GOMEZ', 1, 52),
(321, 'EL TAMBO', 1, 19),
(322, 'EL TAMBO', 1, 52),
(323, 'EL TARRA', 1, 54),
(324, 'EL ZULIA', 1, 54),
(325, 'EL AGUILA', 1, 76),
(326, 'ELIAS', 1, 41),
(327, 'ENCINO', 1, 68),
(328, 'ENCISO', 1, 68),
(329, 'ENTRERRIOS', 1, 5),
(330, 'ENVIGADO', 1, 5),
(331, 'ESPINAL', 1, 73),
(332, 'FACATATIVA', 1, 25),
(333, 'FALAN', 1, 73),
(334, 'FILADELFIA', 1, 17),
(335, 'FILANDIA', 1, 63),
(336, 'FIRAVITOBA', 1, 15),
(337, 'FLANDES', 1, 73),
(338, 'FLORENCIA', 1, 18),
(339, 'FLORENCIA', 1, 19),
(340, 'FLORESTA', 1, 15),
(341, 'FLORIDA', 1, 76),
(342, 'FLORIDABLANCA', 1, 68),
(343, 'FLORIAN', 1, 68),
(344, 'FONSECA', 1, 44),
(345, 'FORTUL', 1, 81),
(346, 'FOSCA', 1, 25),
(347, 'FRANCISCO PIZARRO', 1, 52),
(348, 'FREDONIA', 1, 5),
(349, 'FRESNO', 1, 73),
(350, 'FRONTINO', 1, 5),
(351, 'FUENTE DE ORO', 1, 50),
(352, 'FUNDACION', 1, 47),
(353, 'FUNES', 1, 52),
(354, 'FUNZA', 1, 25),
(355, 'FUSAGASUGA', 1, 25),
(356, 'FOMEQUE', 1, 25),
(357, 'FUQUENE', 1, 25),
(358, 'GACHALA', 1, 25),
(359, 'GACHANCIPA', 1, 25),
(360, 'GACHANTIVA', 1, 15),
(361, 'GACHETA', 1, 25),
(362, 'GALAPA', 1, 8),
(363, 'GALERAS (NUEVA GRANADA)', 1, 70),
(364, 'GALAN', 1, 68),
(365, 'GAMA', 1, 25),
(366, 'GAMARRA', 1, 20),
(367, 'GARAGOA', 1, 15),
(368, 'GARZON', 1, 41),
(369, 'GIGANTE', 1, 41),
(370, 'GINEBRA', 1, 76),
(371, 'GIRALDO', 1, 5),
(372, 'GIRARDOT', 1, 25),
(373, 'GIRARDOTA', 1, 5),
(374, 'GIRON', 1, 68),
(375, 'GONZALEZ', 1, 20),
(376, 'GRAMALOTE', 1, 54),
(377, 'GRANADA', 1, 5),
(378, 'GRANADA', 1, 25),
(379, 'GRANADA', 1, 50),
(380, 'GUACA', 1, 68),
(381, 'GUACAMAYAS', 1, 15),
(382, 'GUACARI', 1, 76),
(383, 'GUACHAVES', 1, 52),
(384, 'GUACHENE', 1, 19),
(385, 'GUACHETA', 1, 25),
(386, 'GUACHUCAL', 1, 52),
(387, 'GUADALUPE', 1, 5),
(388, 'GUADALUPE', 1, 41),
(389, 'GUADALUPE', 1, 68),
(390, 'GUADUAS', 1, 25),
(391, 'GUAITARILLA', 1, 52),
(392, 'GUALMATAN', 1, 52),
(393, 'GUAMAL', 1, 47),
(394, 'GUAMAL', 1, 50),
(395, 'GUAMO', 1, 73),
(396, 'GUAPOTA', 1, 68),
(397, 'GUAPI', 1, 19),
(398, 'GUARANDA', 1, 70),
(399, 'GUARNE', 1, 5),
(400, 'GUASCA', 1, 25),
(401, 'GUATAPE', 1, 5),
(402, 'GUATAQUI', 1, 25),
(403, 'GUATAVITA', 1, 25),
(404, 'GUATEQUE', 1, 15),
(405, 'GUAVATA', 1, 68),
(406, 'GUAYABAL DE SIQUIMA', 1, 25),
(407, 'GUAYABETAL', 1, 25),
(408, 'GUAYATA', 1, 15),
(409, 'GUEPSA', 1, 68),
(410, 'GUICAN', 1, 15),
(411, 'GUTIERREZ', 1, 25),
(412, 'GUATICA', 1, 66),
(413, 'GAMBITA', 1, 68),
(414, 'GAMEZA', 1, 15),
(415, 'GENOVA', 1, 63),
(416, 'GOMEZ PLATA', 1, 5),
(417, 'HACARI', 1, 54),
(418, 'HATILLO DE LOBA', 1, 13),
(419, 'HATO', 1, 68),
(420, 'HATO COROZAL', 1, 85),
(421, 'HATONUEVO', 1, 44),
(422, 'HELICONIA', 1, 5),
(423, 'HERRAN', 1, 54),
(424, 'HERVEO', 1, 73),
(425, 'HISPANIA', 1, 5),
(426, 'HOBO', 1, 41),
(427, 'HONDA', 1, 73),
(428, 'IBAGUE', 1, 73),
(429, 'ICONONZO', 1, 73),
(430, 'ILES', 1, 52),
(431, 'IMUES', 1, 52),
(432, 'INZA', 1, 19),
(433, 'INIRIDA', 1, 94),
(434, 'IPIALES', 1, 52),
(435, 'ISNOS', 1, 41),
(436, 'ISTMINA', 1, 27),
(437, 'ITAGUI', 1, 5),
(438, 'ITUANGO', 1, 5),
(439, 'IZA', 1, 15),
(440, 'JAMBALO', 1, 19),
(441, 'JAMUNDI', 1, 76),
(442, 'JARDIN', 1, 5),
(443, 'JENESANO', 1, 15),
(444, 'JERICO', 1, 5),
(445, 'JERICO', 1, 15),
(446, 'JERUSALEN', 1, 25),
(447, 'JESUS MARIA', 1, 68),
(448, 'JORDAN', 1, 68),
(449, 'JUAN DE ACOSTA', 1, 8),
(450, 'JUNIN', 1, 25),
(451, 'JURADO', 1, 27),
(452, 'LA APARTADA Y LA FRONTERA', 1, 23),
(453, 'LA ARGENTINA', 1, 41),
(454, 'LA BELLEZA', 1, 68),
(455, 'LA CALERA', 1, 25),
(456, 'LA CAPILLA', 1, 15),
(457, 'LA CEJA', 1, 5),
(458, 'LA CELIA', 1, 66),
(459, 'LA CRUZ', 1, 52),
(460, 'LA CUMBRE', 1, 76),
(461, 'LA DORADA', 1, 17),
(462, 'LA ESPERANZA', 1, 54),
(463, 'LA ESTRELLA', 1, 5),
(464, 'LA FLORIDA', 1, 52),
(465, 'LA GLORIA', 1, 20),
(466, 'LA JAGUA DE IBIRICO', 1, 20),
(467, 'LA JAGUA DEL PILAR', 1, 44),
(468, 'LA LLANADA', 1, 52),
(469, 'LA MACARENA', 1, 50),
(470, 'LA MERCED', 1, 17),
(471, 'LA MESA', 1, 25),
(472, 'LA MONTAÑITA', 1, 18),
(473, 'LA PALMA', 1, 25),
(474, 'LA PAZ', 1, 68),
(475, 'LA PAZ (ROBLES)', 1, 20),
(476, 'LA PEÑA', 1, 25),
(477, 'LA PINTADA', 1, 5),
(478, 'LA PLATA', 1, 41),
(479, 'LA PLAYA', 1, 54),
(480, 'LA PRIMAVERA', 1, 99),
(481, 'LA SALINA', 1, 85),
(482, 'LA SIERRA', 1, 19),
(483, 'LA TEBAIDA', 1, 63),
(484, 'LA TOLA', 1, 52),
(485, 'LA UNION', 1, 5),
(486, 'LA UNION', 1, 52),
(487, 'LA UNION', 1, 70),
(488, 'LA UNION', 1, 76),
(489, 'LA UVITA', 1, 15),
(490, 'LA VEGA', 1, 19),
(491, 'LA VEGA', 1, 25),
(492, 'LA VICTORIA', 1, 15),
(493, 'LA VICTORIA', 1, 17),
(494, 'LA VICTORIA', 1, 76),
(495, 'LA VIRGINIA', 1, 66),
(496, 'LABATECA', 1, 54),
(497, 'LABRANZAGRANDE', 1, 15),
(498, 'LANDAZURI', 1, 68),
(499, 'LEBRIJA', 1, 68),
(500, 'LEIVA', 1, 52),
(501, 'LEJANIAS', 1, 50),
(502, 'LENGUAZAQUE', 1, 25),
(503, 'LETICIA', 1, 91),
(504, 'LIBORINA', 1, 5),
(505, 'LINARES', 1, 52),
(506, 'LLORO', 1, 27),
(507, 'LORICA', 1, 23),
(508, 'LOS CORDOBAS', 1, 23),
(509, 'LOS PALMITOS', 1, 70),
(510, 'LOS PATIOS', 1, 54),
(511, 'LOS SANTOS', 1, 68),
(512, 'LOURDES', 1, 54),
(513, 'LURUACO', 1, 8),
(514, 'LERIDA', 1, 73),
(515, 'LIBANO', 1, 73),
(516, 'LOPEZ (MICAY)', 1, 19),
(517, 'MACANAL', 1, 15),
(518, 'MACARAVITA', 1, 68),
(519, 'MACEO', 1, 5),
(520, 'MACHETA', 1, 25),
(521, 'MADRID', 1, 25),
(522, 'MAGANGUE', 1, 13),
(523, 'MAGUI (PAYAN)', 1, 52),
(524, 'MAHATES', 1, 13),
(525, 'MAICAO', 1, 44),
(526, 'MAJAGUAL', 1, 70),
(527, 'MALAMBO', 1, 8),
(528, 'MALLAMA (PIEDRANCHA)', 1, 52),
(529, 'MANATI', 1, 8),
(530, 'MANAURE', 1, 44),
(531, 'MANAURE BALCON DEL CESAR', 1, 20),
(532, 'MANIZALES', 1, 17),
(533, 'MANTA', 1, 25),
(534, 'MANZANARES', 1, 17),
(535, 'MANI', 1, 85),
(536, 'MAPIRIPAN', 1, 50),
(537, 'MARGARITA', 1, 13),
(538, 'MARINILLA', 1, 5),
(539, 'MARIPI', 1, 15),
(540, 'MARIQUITA', 1, 73),
(541, 'MARMATO', 1, 17),
(542, 'MARQUETALIA', 1, 17),
(543, 'MARSELLA', 1, 66),
(544, 'MARULANDA', 1, 17),
(545, 'MARIA LA BAJA', 1, 13),
(546, 'MATANZA', 1, 68),
(547, 'MEDELLIN', 1, 5),
(548, 'MEDINA', 1, 25),
(549, 'MEDIO ATRATO', 1, 27),
(550, 'MEDIO BAUDO', 1, 27),
(551, 'MEDIO SAN JUAN (ANDAGOYA)', 1, 27),
(552, 'MELGAR', 1, 73),
(553, 'MERCADERES', 1, 19),
(554, 'MESETAS', 1, 50),
(555, 'MILAN', 1, 18),
(556, 'MIRAFLORES', 1, 15),
(557, 'MIRAFLORES', 1, 95),
(558, 'MIRANDA', 1, 19),
(559, 'MISTRATO', 1, 66),
(560, 'MITU', 1, 97),
(561, 'MOCOA', 1, 86),
(562, 'MOGOTES', 1, 68),
(563, 'MOLAGAVITA', 1, 68),
(564, 'MOMIL', 1, 23),
(565, 'MOMPOS', 1, 13),
(566, 'MONGUA', 1, 15),
(567, 'MONGUI', 1, 15),
(568, 'MONIQUIRA', 1, 15),
(569, 'MONTEBELLO', 1, 5),
(570, 'MONTECRISTO', 1, 13),
(571, 'MONTELIBANO', 1, 23),
(572, 'MONTENEGRO', 1, 63),
(573, 'MONTERIA', 1, 23),
(574, 'MONTERREY', 1, 85),
(575, 'MORALES', 1, 13),
(576, 'MORALES', 1, 19),
(577, 'MORELIA', 1, 18),
(578, 'MORROA', 1, 70),
(579, 'MOSQUERA', 1, 25),
(580, 'MOSQUERA', 1, 52),
(581, 'MOTAVITA', 1, 15),
(582, 'MOÑITOS', 1, 23),
(583, 'MURILLO', 1, 73),
(584, 'MURINDO', 1, 5),
(585, 'MUTATA', 1, 5),
(586, 'MUTISCUA', 1, 54),
(587, 'MUZO', 1, 15),
(588, 'MALAGA', 1, 68),
(589, 'NARIÑO', 1, 5),
(590, 'NARIÑO', 1, 25),
(591, 'NARIÑO', 1, 52),
(592, 'NATAGAIMA', 1, 73),
(593, 'NECHI', 1, 5),
(594, 'NECOCLI', 1, 5),
(595, 'NEIRA', 1, 17),
(596, 'NEIVA', 1, 41),
(597, 'NEMOCON', 1, 25),
(598, 'NILO', 1, 25),
(599, 'NIMAIMA', 1, 25),
(600, 'NOBSA', 1, 15),
(601, 'NOCAIMA', 1, 25),
(602, 'NORCASIA', 1, 17),
(603, 'NOROSI', 1, 13),
(604, 'NOVITA', 1, 27),
(605, 'NUEVA GRANADA', 1, 47),
(606, 'NUEVO COLON', 1, 15),
(607, 'NUNCHIA', 1, 85),
(608, 'NUQUI', 1, 27),
(609, 'NATAGA', 1, 41),
(610, 'OBANDO', 1, 76),
(611, 'OCAMONTE', 1, 68),
(612, 'OCAÑA', 1, 54),
(613, 'OIBA', 1, 68),
(614, 'OICATA', 1, 15),
(615, 'OLAYA', 1, 5),
(616, 'OLAYA HERRERA', 1, 52),
(617, 'ONZAGA', 1, 68),
(618, 'OPORAPA', 1, 41),
(619, 'ORITO', 1, 86),
(620, 'OROCUE', 1, 85),
(621, 'ORTEGA', 1, 73),
(622, 'OSPINA', 1, 52),
(623, 'OTANCHE', 1, 15),
(624, 'OVEJAS', 1, 70),
(625, 'PACHAVITA', 1, 15),
(626, 'PACHO', 1, 25),
(627, 'PADILLA', 1, 19),
(628, 'PAICOL', 1, 41),
(629, 'PAILITAS', 1, 20),
(630, 'PAIME', 1, 25),
(631, 'PAIPA', 1, 15),
(632, 'PAJARITO', 1, 15),
(633, 'PALERMO', 1, 41),
(634, 'PALESTINA', 1, 17),
(635, 'PALESTINA', 1, 41),
(636, 'PALMAR', 1, 68),
(637, 'PALMAR DE VARELA', 1, 8),
(638, 'PALMAS DEL SOCORRO', 1, 68),
(639, 'PALMIRA', 1, 76),
(640, 'PALMITO', 1, 70),
(641, 'PALOCABILDO', 1, 73),
(642, 'PAMPLONA', 1, 54),
(643, 'PAMPLONITA', 1, 54),
(644, 'PANDI', 1, 25),
(645, 'PANQUEBA', 1, 15),
(646, 'PARATEBUENO', 1, 25),
(647, 'PASCA', 1, 25),
(648, 'PATIA (EL BORDO)', 1, 19),
(649, 'PAUNA', 1, 15),
(650, 'PAYA', 1, 15),
(651, 'PAZ DE ARIPORO', 1, 85),
(652, 'PAZ DE RIO', 1, 15),
(653, 'PEDRAZA', 1, 47),
(654, 'PELAYA', 1, 20),
(655, 'PENSILVANIA', 1, 17),
(656, 'PEQUE', 1, 5),
(657, 'PEREIRA', 1, 66),
(658, 'PESCA', 1, 15),
(659, 'PEÑOL', 1, 5),
(660, 'PIAMONTE', 1, 19),
(661, 'PIE DE CUESTA', 1, 68),
(662, 'PIEDRAS', 1, 73),
(663, 'PIENDAMO', 1, 19),
(664, 'PIJAO', 1, 63),
(665, 'PIJIÑO', 1, 47),
(666, 'PINCHOTE', 1, 68),
(667, 'PINILLOS', 1, 13),
(668, 'PIOJO', 1, 8),
(669, 'PISVA', 1, 15),
(670, 'PITAL', 1, 41),
(671, 'PITALITO', 1, 41),
(672, 'PIVIJAY', 1, 47),
(673, 'PLANADAS', 1, 73),
(674, 'PLANETA RICA', 1, 23),
(675, 'PLATO', 1, 47),
(676, 'POLICARPA', 1, 52),
(677, 'POLONUEVO', 1, 8),
(678, 'PONEDERA', 1, 8),
(679, 'POPAYAN', 1, 19),
(680, 'PORE', 1, 85),
(681, 'POTOSI', 1, 52),
(682, 'PRADERA', 1, 76),
(683, 'PRADO', 1, 73),
(684, 'PROVIDENCIA', 1, 52),
(685, 'PROVIDENCIA', 1, 88),
(686, 'PUEBLO BELLO', 1, 20),
(687, 'PUEBLO NUEVO', 1, 23),
(688, 'PUEBLO RICO', 1, 66),
(689, 'PUEBLORRICO', 1, 5),
(690, 'PUEBLOVIEJO', 1, 47),
(691, 'PUENTE NACIONAL', 1, 68),
(692, 'PUERRES', 1, 52),
(693, 'PUERTO ASIS', 1, 86),
(694, 'PUERTO BERRIO', 1, 5),
(695, 'PUERTO BOYACA', 1, 15),
(696, 'PUERTO CAICEDO', 1, 86),
(697, 'PUERTO CARREÑO', 1, 99),
(698, 'PUERTO COLOMBIA', 1, 8),
(699, 'PUERTO CONCORDIA', 1, 50),
(700, 'PUERTO ESCONDIDO', 1, 23),
(701, 'PUERTO GAITAN', 1, 50),
(702, 'PUERTO GUZMAN', 1, 86),
(703, 'PUERTO LEGUIZAMO', 1, 86),
(704, 'PUERTO LIBERTADOR', 1, 23),
(705, 'PUERTO LLERAS', 1, 50),
(706, 'PUERTO LOPEZ', 1, 50),
(707, 'PUERTO NARE', 1, 5),
(708, 'PUERTO NARIÑO', 1, 91),
(709, 'PUERTO PARRA', 1, 68),
(710, 'PUERTO RICO', 1, 18),
(711, 'PUERTO RICO', 1, 50),
(712, 'PUERTO RONDON', 1, 81),
(713, 'PUERTO SALGAR', 1, 25),
(714, 'PUERTO SANTANDER', 1, 54),
(715, 'PUERTO TEJADA', 1, 19),
(716, 'PUERTO TRIUNFO', 1, 5),
(717, 'PUERTO WILCHES', 1, 68),
(718, 'PULI', 1, 25),
(719, 'PUPIALES', 1, 52),
(720, 'PURACE (COCONUCO)', 1, 19),
(721, 'PURIFICACION', 1, 73),
(722, 'PURISIMA', 1, 23),
(723, 'PACORA', 1, 17),
(724, 'PAEZ', 1, 15),
(725, 'PAEZ (BELALCAZAR)', 1, 19),
(726, 'PARAMO', 1, 68),
(727, 'QUEBRADANEGRA', 1, 25),
(728, 'QUETAME', 1, 25),
(729, 'QUIBDO', 1, 27),
(730, 'QUIMBAYA', 1, 63),
(731, 'QUINCHIA', 1, 66),
(732, 'QUIPAMA', 1, 15),
(733, 'QUIPILE', 1, 25),
(734, 'RAGONVALIA', 1, 54),
(735, 'RAMIRIQUI', 1, 15),
(736, 'RECETOR', 1, 85),
(737, 'REGIDOR', 1, 13),
(738, 'REMEDIOS', 1, 5),
(739, 'REMOLINO', 1, 47),
(740, 'REPELON', 1, 8),
(741, 'RESTREPO', 1, 50),
(742, 'RESTREPO', 1, 76),
(743, 'RETIRO', 1, 5),
(744, 'RICAURTE', 1, 25),
(745, 'RICAURTE', 1, 52),
(746, 'RIO NEGRO', 1, 68),
(747, 'RIOBLANCO', 1, 73),
(748, 'RIOFRIO', 1, 76),
(749, 'RIOHACHA', 1, 44),
(750, 'RISARALDA', 1, 17),
(751, 'RIVERA', 1, 41),
(752, 'ROBERTO PAYAN (SAN JOSE)', 1, 52),
(753, 'ROLDANILLO', 1, 76),
(754, 'RONCESVALLES', 1, 73),
(755, 'RONDON', 1, 15),
(756, 'ROSAS', 1, 19),
(757, 'ROVIRA', 1, 73),
(758, 'RAQUIRA', 1, 15),
(759, 'RIO IRO', 1, 27),
(760, 'RIO QUITO', 1, 27),
(761, 'RIO SUCIO', 1, 17),
(762, 'RIO VIEJO', 1, 13),
(763, 'RIO DE ORO', 1, 20),
(764, 'RIONEGRO', 1, 5),
(765, 'RIOSUCIO', 1, 27),
(766, 'SABANA DE TORRES', 1, 68),
(767, 'SABANAGRANDE', 1, 8),
(768, 'SABANALARGA', 1, 5),
(769, 'SABANALARGA', 1, 8),
(770, 'SABANALARGA', 1, 85),
(771, 'SABANAS DE SAN ANGEL (SAN ANGEL)', 1, 47),
(772, 'SABANETA', 1, 5),
(773, 'SABOYA', 1, 15),
(774, 'SAHAGUN', 1, 23),
(775, 'SALADOBLANCO', 1, 41),
(776, 'SALAMINA', 1, 17),
(777, 'SALAMINA', 1, 47),
(778, 'SALAZAR', 1, 54),
(779, 'SALDAÑA', 1, 73),
(780, 'SALENTO', 1, 63),
(781, 'SALGAR', 1, 5),
(782, 'SAMACA', 1, 15),
(783, 'SAMANIEGO', 1, 52),
(784, 'SAMANA', 1, 17),
(785, 'SAMPUES', 1, 70),
(786, 'SAN AGUSTIN', 1, 41),
(787, 'SAN ALBERTO', 1, 20),
(788, 'SAN ANDRES', 1, 68),
(789, 'SAN ANDRES SOTAVENTO', 1, 23),
(790, 'SAN ANDRES DE CUERQUIA', 1, 5),
(791, 'SAN ANTERO', 1, 23),
(792, 'SAN ANTONIO', 1, 73),
(793, 'SAN ANTONIO DE TEQUENDAMA', 1, 25),
(794, 'SAN BENITO', 1, 68),
(795, 'SAN BENITO ABAD', 1, 70),
(796, 'SAN BERNARDO', 1, 25),
(797, 'SAN BERNARDO', 1, 52),
(798, 'SAN BERNARDO DEL VIENTO', 1, 23),
(799, 'SAN CALIXTO', 1, 54),
(800, 'SAN CARLOS', 1, 5),
(801, 'SAN CARLOS', 1, 23),
(802, 'SAN CARLOS DE GUAROA', 1, 50),
(803, 'SAN CAYETANO', 1, 25),
(804, 'SAN CAYETANO', 1, 54),
(805, 'SAN CRISTOBAL', 1, 13),
(806, 'SAN DIEGO', 1, 20),
(807, 'SAN EDUARDO', 1, 15),
(808, 'SAN ESTANISLAO', 1, 13),
(809, 'SAN FERNANDO', 1, 13),
(810, 'SAN FRANCISCO', 1, 5),
(811, 'SAN FRANCISCO', 1, 25),
(812, 'SAN FRANCISCO', 1, 86),
(813, 'SAN GIL', 1, 68),
(814, 'SAN JACINTO', 1, 13),
(815, 'SAN JACINTO DEL CAUCA', 1, 13),
(816, 'SAN JERONIMO', 1, 5),
(817, 'SAN JOAQUIN', 1, 68),
(818, 'SAN JOSE', 1, 17),
(819, 'SAN JOSE DE MIRANDA', 1, 68),
(820, 'SAN JOSE DE MONTAÑA', 1, 5),
(821, 'SAN JOSE DE PARE', 1, 15),
(822, 'SAN JOSE DE URE', 1, 23),
(823, 'SAN JOSE DEL FRAGUA', 1, 18),
(824, 'SAN JOSE DEL GUAVIARE', 1, 95),
(825, 'SAN JOSE DEL PALMAR', 1, 27),
(826, 'SAN JUAN DE ARAMA', 1, 50),
(827, 'SAN JUAN DE BETULIA', 1, 70),
(828, 'SAN JUAN DE NEPOMUCENO', 1, 13),
(829, 'SAN JUAN DE PASTO', 1, 52),
(830, 'SAN JUAN DE RIO SECO', 1, 25),
(831, 'SAN JUAN DE URABA', 1, 5),
(832, 'SAN JUAN DEL CESAR', 1, 44),
(833, 'SAN JUANITO', 1, 50),
(834, 'SAN LORENZO', 1, 52),
(835, 'SAN LUIS', 1, 73),
(836, 'SAN LUIS', 1, 5),
(837, 'SAN LUIS DE GACENO', 1, 15),
(838, 'SAN LUIS DE PALENQUE', 1, 85),
(839, 'SAN MARCOS', 1, 70),
(840, 'SAN MARTIN', 1, 20),
(841, 'SAN MARTIN', 1, 50),
(842, 'SAN MARTIN DE LOBA', 1, 13),
(843, 'SAN MATEO', 1, 15),
(844, 'SAN MIGUEL', 1, 68),
(845, 'SAN MIGUEL', 1, 86),
(846, 'SAN MIGUEL DE SEMA', 1, 15),
(847, 'SAN ONOFRE', 1, 70),
(848, 'SAN PABLO', 1, 13),
(849, 'SAN PABLO', 1, 52),
(850, 'SAN PABLO DE BORBUR', 1, 15),
(851, 'SAN PEDRO', 1, 5),
(852, 'SAN PEDRO', 1, 70),
(853, 'SAN PEDRO', 1, 76),
(854, 'SAN PEDRO DE CARTAGO', 1, 52),
(855, 'SAN PEDRO DE URABA', 1, 5),
(856, 'SAN PELAYO', 1, 23),
(857, 'SAN RAFAEL', 1, 5),
(858, 'SAN ROQUE', 1, 5),
(859, 'SAN SEBASTIAN', 1, 19),
(860, 'SAN SEBASTIAN DE BUENAVISTA', 1, 47),
(861, 'SAN VICENTE', 1, 5),
(862, 'SAN VICENTE DEL CAGUAN', 1, 18),
(863, 'SAN VICENTE DEL CHUCURI', 1, 68),
(864, 'SAN ZENON', 1, 47),
(865, 'SANDONA', 1, 52),
(866, 'SANTA ANA', 1, 47),
(867, 'SANTA BARBARA', 1, 5),
(868, 'SANTA BARBARA', 1, 68),
(869, 'SANTA BARBARA (ISCUANDE)', 1, 52),
(870, 'SANTA BARBARA DE PINTO', 1, 47),
(871, 'SANTA CATALINA', 1, 13),
(872, 'SANTA FE DE ANTIOQUIA', 1, 5),
(873, 'SANTA GENOVEVA DE DOCORODO', 1, 27),
(874, 'SANTA HELENA DEL OPON', 1, 68),
(875, 'SANTA ISABEL', 1, 73),
(876, 'SANTA LUCIA', 1, 8),
(877, 'SANTA MARTA', 1, 47),
(878, 'SANTA MARIA', 1, 15),
(879, 'SANTA MARIA', 1, 41),
(880, 'SANTA ROSA', 1, 13),
(881, 'SANTA ROSA', 1, 19),
(882, 'SANTA ROSA DE CABAL', 1, 66),
(883, 'SANTA ROSA DE OSOS', 1, 5),
(884, 'SANTA ROSA DE VITERBO', 1, 15),
(885, 'SANTA ROSA DEL SUR', 1, 13),
(886, 'SANTA ROSALIA', 1, 99),
(887, 'SANTA SOFIA', 1, 15),
(888, 'SANTANA', 1, 15),
(889, 'SANTANDER DE QUILICHAO', 1, 19),
(890, 'SANTIAGO', 1, 54),
(891, 'SANTIAGO', 1, 86),
(892, 'SANTO DOMINGO', 1, 5),
(893, 'SANTO TOMAS', 1, 8),
(894, 'SANTUARIO', 1, 5),
(895, 'SANTUARIO', 1, 66),
(896, 'SAPUYES', 1, 52),
(897, 'SARAVENA', 1, 81),
(898, 'SARDINATA', 1, 54),
(899, 'SASAIMA', 1, 25),
(900, 'SATIVANORTE', 1, 15),
(901, 'SATIVASUR', 1, 15),
(902, 'SEGOVIA', 1, 5),
(903, 'SESQUILE', 1, 25),
(904, 'SEVILLA', 1, 76),
(905, 'SIACHOQUE', 1, 15),
(906, 'SIBATE', 1, 25),
(907, 'SIBUNDOY', 1, 86),
(908, 'SILOS', 1, 54),
(909, 'SILVANIA', 1, 25),
(910, 'SILVIA', 1, 19),
(911, 'SIMACOTA', 1, 68),
(912, 'SIMIJACA', 1, 25),
(913, 'SIMITI', 1, 13),
(914, 'SINCELEJO', 1, 70),
(915, 'SINCE', 1, 70),
(916, 'SIPI', 1, 27),
(917, 'SITIONUEVO', 1, 47),
(918, 'SOACHA', 1, 25),
(919, 'SOATA', 1, 15),
(920, 'SOCHA', 1, 15),
(921, 'SOCORRO', 1, 68),
(922, 'SOCOTA', 1, 15),
(923, 'SOGAMOSO', 1, 15),
(924, 'SOLANO', 1, 18),
(925, 'SOLEDAD', 1, 8),
(926, 'SOLITA', 1, 18),
(927, 'SOMONDOCO', 1, 15),
(928, 'SONSON', 1, 5),
(929, 'SOPETRAN', 1, 5),
(930, 'SOPLAVIENTO', 1, 13),
(931, 'SOPO', 1, 25),
(932, 'SORA', 1, 15),
(933, 'SORACA', 1, 15),
(934, 'SOTAQUIRA', 1, 15),
(935, 'SOTARA (PAISPAMBA)', 1, 19),
(936, 'SOTOMAYOR (LOS ANDES)', 1, 52),
(937, 'SUAITA', 1, 68),
(938, 'SUAN', 1, 8),
(939, 'SUAZA', 1, 41),
(940, 'SUBACHOQUE', 1, 25),
(941, 'SUCRE', 1, 19),
(942, 'SUCRE', 1, 68),
(943, 'SUCRE', 1, 70),
(944, 'SUESCA', 1, 25),
(945, 'SUPATA', 1, 25),
(946, 'SUPIA', 1, 17),
(947, 'SURATA', 1, 68),
(948, 'SUSA', 1, 25),
(949, 'SUSACON', 1, 15),
(950, 'SUTAMARCHAN', 1, 15),
(951, 'SUTATAUSA', 1, 25),
(952, 'SUTATENZA', 1, 15),
(953, 'SUAREZ', 1, 19),
(954, 'SUAREZ', 1, 73),
(955, 'SACAMA', 1, 85),
(956, 'SACHICA', 1, 15),
(957, 'TABIO', 1, 25),
(958, 'TADO', 1, 27),
(959, 'TALAIGUA NUEVO', 1, 13),
(960, 'TAMALAMEQUE', 1, 20),
(961, 'TAME', 1, 81),
(962, 'TAMINANGO', 1, 52),
(963, 'TANGUA', 1, 52),
(964, 'TARAIRA', 1, 97),
(965, 'TARAZA', 1, 5),
(966, 'TARQUI', 1, 41),
(967, 'TARSO', 1, 5),
(968, 'TASCO', 1, 15),
(969, 'TAURAMENA', 1, 85),
(970, 'TAUSA', 1, 25),
(971, 'TELLO', 1, 41),
(972, 'TENA', 1, 25),
(973, 'TENERIFE', 1, 47),
(974, 'TENJO', 1, 25),
(975, 'TENZA', 1, 15),
(976, 'TEORAMA', 1, 54),
(977, 'TERUEL', 1, 41),
(978, 'TESALIA', 1, 41),
(979, 'TIBACUY', 1, 25),
(980, 'TIBANA', 1, 15),
(981, 'TIBASOSA', 1, 15),
(982, 'TIBIRITA', 1, 25),
(983, 'TIBU', 1, 54),
(984, 'TIERRALTA', 1, 23),
(985, 'TIMANA', 1, 41),
(986, 'TIMBIQUI', 1, 19),
(987, 'TIMBIO', 1, 19),
(988, 'TINJACA', 1, 15),
(989, 'TIPACOQUE', 1, 15),
(990, 'TIQUISIO (PUERTO RICO)', 1, 13),
(991, 'TITIRIBI', 1, 5),
(992, 'TOCA', 1, 15),
(993, 'TOCAIMA', 1, 25),
(994, 'TOCANCIPA', 1, 25),
(995, 'TOGUI', 1, 15),
(996, 'TOLEDO', 1, 5),
(997, 'TOLEDO', 1, 54),
(998, 'TOLU', 1, 70),
(999, 'TOLU VIEJO', 1, 70),
(1000, 'TONA', 1, 68),
(1001, 'TOPAGA', 1, 15),
(1002, 'TOPAIPI', 1, 25),
(1003, 'TORIBIO', 1, 19),
(1004, 'TORO', 1, 76),
(1005, 'TOTA', 1, 15),
(1006, 'TOTORO', 1, 19),
(1007, 'TRINIDAD', 1, 85),
(1008, 'TRUJILLO', 1, 76),
(1009, 'TUBARA', 1, 8),
(1010, 'TUCHIN', 1, 23),
(1011, 'TULUA', 1, 76),
(1012, 'TUMACO', 1, 52),
(1013, 'TUNJA', 1, 15),
(1014, 'TUNUNGUA', 1, 15),
(1015, 'TURBACO', 1, 13),
(1016, 'TURBANA', 1, 13),
(1017, 'TURBO', 1, 5),
(1018, 'TURMEQUE', 1, 15),
(1019, 'TUTA', 1, 15),
(1020, 'TUTASA', 1, 15),
(1021, 'TAMARA', 1, 85),
(1022, 'TAMESIS', 1, 5),
(1023, 'TUQUERRES', 1, 52),
(1024, 'UBALA', 1, 25),
(1025, 'UBAQUE', 1, 25),
(1026, 'UBATE', 1, 25),
(1027, 'ULLOA', 1, 76),
(1028, 'UNE', 1, 25),
(1029, 'UNGUIA', 1, 27),
(1030, 'UNION PANAMERICANA (ANIMAS)', 1, 27),
(1031, 'URAMITA', 1, 5),
(1032, 'URIBE', 1, 50),
(1033, 'URIBIA', 1, 44),
(1034, 'URRAO', 1, 5),
(1035, 'URUMITA', 1, 44),
(1036, 'USIACURI', 1, 8),
(1037, 'VALDIVIA', 1, 5),
(1038, 'VALENCIA', 1, 23),
(1039, 'VALLE DE SAN JOSE', 1, 68),
(1040, 'VALLE DE SAN JUAN', 1, 73),
(1041, 'VALLE DEL GUAMUEZ', 1, 86),
(1042, 'VALLEDUPAR', 1, 20),
(1043, 'VALPARAISO', 1, 5),
(1044, 'VALPARAISO', 1, 18),
(1045, 'VEGACHI', 1, 5),
(1046, 'VENADILLO', 1, 73),
(1047, 'VENECIA', 1, 5),
(1048, 'VENECIA (OSPINA PEREZ)', 1, 25),
(1049, 'VENTAQUEMADA', 1, 15),
(1050, 'VERGARA', 1, 25),
(1051, 'VERSALLES', 1, 76),
(1052, 'VETAS', 1, 68),
(1053, 'VIANI', 1, 25),
(1054, 'VIGIA DEL FUERTE', 1, 5),
(1055, 'VIJES', 1, 76),
(1056, 'VILLA CARO', 1, 54),
(1057, 'VILLA RICA', 1, 19),
(1058, 'VILLA DE LEIVA', 1, 15),
(1059, 'VILLA DEL ROSARIO', 1, 54),
(1060, 'VILLAGARZON', 1, 86),
(1061, 'VILLAGOMEZ', 1, 25),
(1062, 'VILLAHERMOSA', 1, 73),
(1063, 'VILLAMARIA', 1, 17),
(1064, 'VILLANUEVA', 1, 13),
(1065, 'VILLANUEVA', 1, 44),
(1066, 'VILLANUEVA', 1, 68),
(1067, 'VILLANUEVA', 1, 85),
(1068, 'VILLAPINZON', 1, 25),
(1069, 'VILLARRICA', 1, 73),
(1070, 'VILLAVICENCIO', 1, 50),
(1071, 'VILLAVIEJA', 1, 41),
(1072, 'VILLETA', 1, 25),
(1073, 'VIOTA', 1, 25),
(1074, 'VIRACACHA', 1, 15),
(1075, 'VISTA HERMOSA', 1, 50),
(1076, 'VITERBO', 1, 17),
(1077, 'VELEZ', 1, 68),
(1078, 'YACOPI', 1, 25),
(1079, 'YACUANQUER', 1, 52),
(1080, 'YAGUARA', 1, 41),
(1081, 'YALI', 1, 5),
(1082, 'YARUMAL', 1, 5),
(1083, 'YOLOMBO', 1, 5),
(1084, 'YONDO (CASABE)', 1, 5),
(1085, 'YOPAL', 1, 85),
(1086, 'YOTOCO', 1, 76),
(1087, 'YUMBO', 1, 76),
(1088, 'ZAMBRANO', 1, 13),
(1089, 'ZAPATOCA', 1, 68),
(1090, 'ZAPAYAN (PUNTA DE PIEDRAS)', 1, 47),
(1091, 'ZARAGOZA', 1, 5),
(1092, 'ZARZAL', 1, 76),
(1093, 'ZETAQUIRA', 1, 15),
(1094, 'ZIPACON', 1, 25),
(1095, 'ZIPAQUIRA', 1, 25),
(1096, 'ZONA BANANERA (PRADO - SEVILLA)', 1, 47),
(1097, 'ABREGO', 1, 54),
(1098, 'IQUIRA', 1, 41),
(1099, 'UMBITA', 1, 15),
(1100, 'UTICA', 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nombre_contacto` varchar(100) NOT NULL,
  `registro_evaluacion` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `nombre`, `documento`, `direccion`, `telefono`, `nombre_contacto`, `registro_evaluacion`, `active`) VALUES
(1, 'Prueba 2', '124578451', 'Calle 2', 124578451, 'Cristhian 2', 'Prueba', 0),
(2, 'Empresa 1', '365478', 'Calle', 6547845, 'Prueba ', 'pru', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `tipo_documento` varchar(15) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `area` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `companies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `nombres`, `apellidos`, `tipo_documento`, `identificacion`, `area`, `email`, `telefono`, `fecha_nacimiento`, `ciudad`, `companies_id`) VALUES
(1, 'Cristhian', 'Galvis', 'CEDULA', '1107079637', 'Desarrollo', 'cristian@gmail.com', '3201457845', '0000-00-00', 'Cali', 1),
(2, 'David', 'Cardona', 'CEDULA', '5478451236', 'Desarrollo', 'david@gmail.com', '3021457845', '0000-00-00', 'Cali', 1),
(3, 'Andres', 'Galvis', 'CEDULA', '1107079637', 'Desarrollo', 'cristian@gmail.com', '3201457845', '0000-00-00', 'Cali', 2),
(4, 'Carlos', 'Cardona', 'CEDULA', '5478451236', 'Desarrollo', 'david@gmail.com', '3021457845', '0000-00-00', 'Cali', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `nombre`) VALUES
(5, 0),
(8, 0),
(11, 0),
(13, 0),
(15, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(23, 0),
(25, 0),
(27, 0),
(41, 0),
(44, 0),
(47, 0),
(50, 0),
(52, 0),
(54, 0),
(63, 0),
(66, 0),
(68, 0),
(70, 0),
(73, 0),
(76, 0),
(81, 0),
(85, 0),
(86, 0),
(88, 0),
(91, 0),
(94, 0),
(95, 0),
(97, 0),
(99, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL,
  `companies_id` int(11) NOT NULL,
  `cities_id` int(11) NOT NULL,
  `codigo_sesion` varchar(50) NOT NULL,
  `respuesta` tinyint(4) NOT NULL,
  `formatoA` int(11) NOT NULL,
  `formatoB` int(11) NOT NULL,
  `burnout` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `companies_id`, `cities_id`, `codigo_sesion`, `respuesta`, `formatoA`, `formatoB`, `burnout`, `active`) VALUES
(1, 2, 150, '54', 0, 10, 10, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatoa`
--

CREATE TABLE `formatoa` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(15) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `anio_nacimiento` varchar(20) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `nivel_estudio` varchar(100) NOT NULL,
  `ocupacion_profesion` varchar(100) NOT NULL,
  `residenciaciudad` varchar(100) NOT NULL,
  `residenciadepartamento` varchar(100) NOT NULL,
  `estrato` varchar(10) NOT NULL,
  `dependencia_economica` varchar(100) NOT NULL,
  `trabajociudad` varchar(100) NOT NULL,
  `trabajodepartamento` varchar(100) NOT NULL,
  `anios_trabajo` varchar(20) NOT NULL,
  `cargo_ocupa` varchar(100) NOT NULL,
  `tipo_cargo` varchar(100) NOT NULL,
  `anios_cargo` varchar(20) NOT NULL,
  `nombre_area` varchar(100) NOT NULL,
  `tipo_contrato` varchar(100) NOT NULL,
  `horas_diarias` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `tipo_vivienda` varchar(50) NOT NULL,
  `tipo_salario` varchar(50) NOT NULL,
  `formatoA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formatoa`
--

INSERT INTO `formatoa` (`id`, `tipo_documento`, `identificacion`, `nombre_completo`, `anio_nacimiento`, `estado_civil`, `nivel_estudio`, `ocupacion_profesion`, `residenciaciudad`, `residenciadepartamento`, `estrato`, `dependencia_economica`, `trabajociudad`, `trabajodepartamento`, `anios_trabajo`, `cargo_ocupa`, `tipo_cargo`, `anios_cargo`, `nombre_area`, `tipo_contrato`, `horas_diarias`, `sexo`, `tipo_vivienda`, `tipo_salario`, `formatoA`) VALUES
(2, 'CEDULA', '1107079637', 'David', '1993', 'Soltero (a)', 'Profesional completo', 'Ingeniero', 'Dosquebradas', 'Risaralda', '3', '1', 'Dosquebradas', 'Risaralda', 'Menos de un Año', 'Senior Developer', 'Profesional-analista-técnico-tecnólogo', 'Menos de un Año', 'Big Data', 'Término indefinido', '45', 'Masculino', 'Propia', 'Una parte fija y otra variable', '{\"intralaboral\":{\"1\":\"Siempre\",\"2\":\"Casi siempre\",\"5\":\"Casi siempre\",\"6\":\"Casi siempre\",\"8\":\"Algunas veces\",\"9\":\"Casi siempre\",\"10\":\"Casi nunca\",\"11\":\"Casi siempre\"},\"estres\":{\"1\":\"Siempre\",\"2\":\"Casi siempre\",\"5\":\"A veces\",\"6\":\"Casi siempre\",\"7\":\"Casi nunca\",\"8\":\"A veces\",\"10\":\"Casi siempre\",\"11\":\"Siempre\"},\"extralaborales\":{\"1\":\"Siempre\",\"2\":\"Algunas veces\",\"3\":\"Casi siempre\",\"4\":\"Casi nunca\",\"7\":\"Algunas veces\",\"10\":\"Casi nunca\"}}'),
(3, 'NIT', '1234578451', 's', '2', 'Soltero (a)', 'Ninguno', 's', 's', 's', '2', '4', 's', 's', '5', 's', 'Operario-operador-ayudante-servicios generales', '5', 's', 'Término indefinido', '54', 'Femenino', 'En arriendo', 'Fijo', '{\"intralaboral\":{\"1\":\"Siempre\",\"2\":\"Casi siempre\",\"3\":\"Casi siempre\",\"4\":\"Casi siempre\",\"5\":\"Casi siempre\",\"6\":\"Casi siempre\",\"7\":\"Casi siempre\",\"8\":\"Casi siempre\",\"9\":\"Casi siempre\",\"10\":\"Casi siempre\",\"11\":\"Casi siempre\",\"12\":\"Casi siempre\",\"13\":\"Casi siempre\",\"14\":\"Casi siempre\",\"15\":\"Casi siempre\",\"16\":\"Casi siempre\",\"17\":\"Casi siempre\",\"18\":\"Casi siempre\",\"19\":\"Casi siempre\",\"20\":\"Casi siempre\",\"21\":\"Casi siempre\",\"22\":\"Casi siempre\",\"23\":\"Casi siempre\",\"24\":\"Casi siempre\",\"25\":\"Casi siempre\",\"26\":\"Casi siempre\",\"27\":\"Casi siempre\",\"28\":\"Casi siempre\",\"29\":\"Casi siempre\",\"30\":\"Casi siempre\",\"31\":\"Casi siempre\",\"32\":\"Casi siempre\",\"33\":\"Casi siempre\",\"34\":\"Casi siempre\",\"35\":\"Casi siempre\",\"36\":\"Casi siempre\",\"37\":\"Casi siempre\",\"38\":\"Casi siempre\",\"39\":\"Casi siempre\",\"40\":\"Casi siempre\",\"41\":\"Casi siempre\",\"42\":\"Casi siempre\",\"43\":\"Casi siempre\",\"44\":\"Casi siempre\",\"45\":\"Casi siempre\",\"46\":\"Casi siempre\",\"47\":\"Casi siempre\",\"48\":\"Casi siempre\",\"49\":\"Casi siempre\",\"50\":\"Casi siempre\",\"51\":\"Casi siempre\",\"52\":\"Casi siempre\",\"53\":\"Casi siempre\",\"54\":\"Casi siempre\",\"55\":\"Casi siempre\",\"56\":\"Casi siempre\",\"57\":\"Casi siempre\",\"58\":\"Casi siempre\",\"59\":\"Casi siempre\",\"60\":\"Casi siempre\",\"61\":\"Casi siempre\",\"62\":\"Casi siempre\",\"63\":\"Casi siempre\",\"64\":\"Casi siempre\",\"65\":\"Casi siempre\",\"66\":\"Casi siempre\",\"67\":\"Casi siempre\",\"68\":\"Casi siempre\",\"69\":\"Casi siempre\",\"70\":\"Casi siempre\",\"71\":\"Casi siempre\",\"72\":\"Casi siempre\",\"73\":\"Casi siempre\",\"74\":\"Casi siempre\",\"75\":\"Casi siempre\",\"76\":\"Casi siempre\",\"77\":\"Casi siempre\",\"78\":\"Casi siempre\",\"79\":\"Casi siempre\",\"80\":\"Casi siempre\",\"81\":\"Casi siempre\",\"82\":\"Casi siempre\",\"83\":\"Casi siempre\",\"84\":\"Casi siempre\",\"85\":\"Casi siempre\",\"86\":\"Casi siempre\",\"87\":\"Casi siempre\",\"88\":\"Casi siempre\",\"89\":\"Casi siempre\",\"90\":\"Casi siempre\",\"91\":\"Casi siempre\",\"92\":\"Casi siempre\",\"93\":\"Casi siempre\",\"94\":\"Casi siempre\",\"95\":\"Casi siempre\",\"96\":\"Casi siempre\",\"97\":\"Casi siempre\",\"98\":\"Casi siempre\",\"99\":\"Casi siempre\",\"100\":\"Casi siempre\",\"101\":\"Casi siempre\",\"102\":\"Casi siempre\",\"103\":\"Casi siempre\",\"104\":\"Casi siempre\",\"105\":\"Casi siempre\",\"106\":\"Casi siempre\",\"107\":\"Casi siempre\",\"108\":\"Casi siempre\",\"109\":\"Casi siempre\",\"110\":\"Casi siempre\",\"111\":\"Casi siempre\",\"112\":\"Casi siempre\",\"113\":\"Casi siempre\",\"114\":\"Casi siempre\",\"115\":\"Casi siempre\",\"116\":\"Casi siempre\",\"117\":\"Casi siempre\",\"118\":\"Casi siempre\",\"119\":\"Casi siempre\",\"120\":\"Casi siempre\",\"121\":\"Casi siempre\",\"122\":\"Casi siempre\"},\"estres\":{\"1\":\"Siempre\",\"2\":\"Casi siempre\",\"3\":\"Casi siempre\",\"4\":\"Casi siempre\",\"5\":\"Casi siempre\",\"6\":\"Casi siempre\",\"7\":\"Casi siempre\",\"8\":\"Casi siempre\",\"9\":\"Casi siempre\",\"10\":\"Casi siempre\",\"11\":\"Casi siempre\",\"12\":\"Casi siempre\",\"13\":\"Casi siempre\",\"14\":\"Casi siempre\",\"15\":\"Casi siempre\",\"16\":\"Casi siempre\",\"17\":\"Casi siempre\",\"18\":\"Casi siempre\",\"19\":\"Casi siempre\",\"20\":\"Casi siempre\",\"21\":\"Casi siempre\",\"22\":\"Casi siempre\",\"23\":\"Casi siempre\",\"24\":\"Casi siempre\",\"25\":\"Casi siempre\",\"26\":\"Casi siempre\",\"27\":\"Casi siempre\",\"28\":\"Casi siempre\",\"29\":\"Casi siempre\",\"30\":\"Casi siempre\"},\"extralaborales\":{\"1\":\"Siempre\",\"2\":\"Casi siempre\",\"3\":\"Casi siempre\",\"4\":\"Casi siempre\",\"5\":\"Casi siempre\",\"6\":\"Casi siempre\",\"7\":\"Casi siempre\",\"8\":\"Casi siempre\",\"9\":\"Casi siempre\",\"10\":\"Casi siempre\",\"11\":\"Casi siempre\",\"12\":\"Casi siempre\",\"13\":\"Casi siempre\",\"14\":\"Casi siempre\",\"15\":\"Casi siempre\",\"16\":\"Casi siempre\",\"17\":\"Casi siempre\",\"18\":\"Casi siempre\",\"19\":\"Casi siempre\",\"20\":\"Casi siempre\",\"21\":\"Casi siempre\",\"22\":\"Casi siempre\",\"23\":\"Casi siempre\",\"24\":\"Casi siempre\",\"25\":\"Casi siempre\",\"26\":\"Casi siempre\",\"27\":\"Casi siempre\",\"28\":\"Casi siempre\",\"29\":\"Casi siempre\",\"30\":\"Casi siempre\"}}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `gru_nombre` varchar(70) NOT NULL,
  `gru_visible` tinyint(1) NOT NULL,
  `gru_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `gru_nombre`, `gru_visible`, `gru_url`) VALUES
(1, 'Sistema', 0, ''),
(2, 'Evaluación', 0, ''),
(3, 'Digitación', 0, ''),
(4, 'Informes', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modpermi`
--

CREATE TABLE `modpermi` (
  `id` int(11) NOT NULL,
  `modules_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modpermi`
--

INSERT INTO `modpermi` (`id`, `modules_id`, `users_id`) VALUES
(1, 1, 3),
(2, 4, 3),
(3, 2, 3),
(4, 3, 3),
(5, 7, 3),
(6, 8, 3),
(7, 5, 3),
(8, 9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `mod_nombre` varchar(70) NOT NULL,
  `mod_visible` tinyint(1) NOT NULL,
  `mod_url` text NOT NULL,
  `groups_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `mod_nombre`, `mod_visible`, `mod_url`, `groups_id`) VALUES
(1, 'Usuarios', 0, 'vistas/usuario/usuarios.php', 1),
(2, 'Roles', 0, 'vistas/rol/roles.php', 1),
(3, 'Empresas', 0, 'vistas/empresa/empresas.php', 1),
(4, 'Formato A', 0, '#', 3),
(5, 'Formato B', 0, '#', 3),
(6, 'Burn-Out', 0, '#', 3),
(7, 'Detalles', 0, '#', 4),
(8, 'Estadísticas', 0, '#', 4),
(9, 'Evaluación', 0, 'vistas/evaluacion/evaluaciones.php', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol_nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol_nombre`) VALUES
(1, 'Administrador'),
(2, 'Evaluador'),
(3, 'Digitador'),
(4, 'Supervisor'),
(5, 'Prueba1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(15) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `tipo_documento`, `nombres`, `apellidos`, `username`, `password`, `roles_id`, `identificacion`, `email`, `active`) VALUES
(1, '', 'David', 'Gomez', 'DGomez', '12345678', 1, 1234578451, '', 0),
(2, '', 'Madisson', 'Galvis', 'MGalvis', '12345678', 1, 12345678, '', 0),
(3, '', 'Lisbeth', 'Roldan', 'LRoldan', '12345678', 1, 987456321, '', 0),
(4, '', 'Cristhian', 'Galvis', 'cgalvis', '12345678', 1, 1234578451, 'cgalvis@prueba.com', 1),
(5, '', 'Carlos Andres', 'Gonzales Arenas', 'cgonzales', '12345678', 2, 2147483647, 'cgonzales@gmail.com', 1),
(6, 'CEDULA', 'Hernan', 'Ramirez', 'hramirez', '12345678', 2, 354125474, 'hramirez@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formatoa`
--
ALTER TABLE `formatoa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `modpermi`
--
ALTER TABLE `modpermi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `modules_id` (`modules_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `groups_id` (`groups_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formatoa`
--
ALTER TABLE `formatoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modpermi`
--
ALTER TABLE `modpermi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modpermi`
--
ALTER TABLE `modpermi`
  ADD CONSTRAINT `modpermi_ibfk_1` FOREIGN KEY (`modules_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modpermi_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
