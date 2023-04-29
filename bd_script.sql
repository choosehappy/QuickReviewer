CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `val` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `name`, `val`) VALUES
(1, "394-high.jpg", 0),
(2, "395-low.jpg", 0),
(3, "396-mod.jpg", 0),
(4, "397-mod.jpg", 0),
(5, "398-low.jpg", 0),
(6, "399-low.jpg", 0),
(7, "400-mod.jpg", 0),
(8, "401-mod.jpg", 0),
(9, "402-mod.jpg", 0),
(10, "403-low.jpg", 0),
(11, "404-high.jpg", 0),
(12, "405-low.jpg", 0),
(13, "406-low.jpg", 0),
(14, "407-mod.jpg", 0),
(15, "408-mod.jpg", 0),
(16, "409-low.jpg", 0),
(17, "410-mod.jpg", 0),
(18, "411-mod.jpg", 0),
(19, "412-mod.jpg", 0),
(20, "413-mod.jpg", 0),
(21, "414-mod.jpg", 0),
(22, "415-high.jpg", 0),
(23, "416-high.jpg", 0),
(24, "417-high.jpg", 0),
(25, "418-high.jpg", 0),
(26, "419-mod.jpg", 0),
(27, "421-mod.jpg", 0),
(28, "422-high.jpg", 0),
(29, "423-mod.jpg", 0),
(30, "424-low.jpg", 0),
(31, "425-mod.jpg", 0),
(32, "426-mod.jpg", 0),
(33, "427-mod.jpg", 0),
(34, "428-high.jpg", 0),
(35, "429-low.jpg", 0),
(36, "430-mod.jpg", 0),
(37, "431-mod.jpg", 0),
(38, "432-mod.jpg", 0),
(39, "433-high.jpg", 0),
(40, "434-high.jpg", 0),
(41, "435-mod.jpg", 0),
(42, "436-mod.jpg", 0),
(43, "437-high.jpg", 0),
(44, "438-mod.jpg", 0),
(45, "439-mod.jpg", 0),
(46, "440-high.jpg", 0),
(47, "441-high.jpg", 0),
(48, "443-mod.jpg", 0);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `img_usr` (
  `id_user` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `val` smallint(6) DEFAULT NULL,
  `timespan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_img`),
  KEY `FK_IMG_USR_REFERENCE_IMAGES` (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
