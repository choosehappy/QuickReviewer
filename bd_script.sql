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
(1, 'YTMA79-5_HE_12_good.jpg', 1),
(2, 'YTMA79-5_HE_13_good.jpg', 1),
(3, 'YTMA79-5_HE_14_poor.jpg', 0),
(4, 'YTMA79-5_HE_15_good.jpg', 1),
(5, 'YTMA79-5_HE_16_poor.jpg', 0),
(6, 'YTMA79-5_HE_1_good.jpg', 1),
(7, 'YTMA79-5_HE_22_poor.jpg', 0),
(8, 'YTMA79-5_HE_24_poor.jpg', 0),
(9, 'YTMA79-5_HE_25_poor.jpg', 0),
(10, 'YTMA79-5_HE_2_poor.jpg', 0),
(11, 'YTMA79-5_HE_35_poor.jpg', 0),
(12, 'YTMA79-5_HE_44_poor.jpg', 0),
(13, 'YTMA79-5_HE_45_poor.jpg', 0),
(14, 'YTMA79-5_HE_48_poor.jpg', 0),
(15, 'YTMA79-5_HE_5_poor.jpg', 0),
(16, 'YTMA79-5_HE_7_good.jpg', 1),
(17, 'YTMA79-5_HE_8_good.jpg', 1),
(18, 'YTMA79-5_HE_8_poor.jpg', 0),
(19, 'YTMA79-5_HE_good_15.jpg', 1),
(20, 'YTMA79-5_HE_good_18.jpg', 1),
(21, 'YTMA79-5_HE_good_19.jpg', 1),
(22, 'YTMA79-5_HE_good_23.jpg', 1),
(23, 'YTMA79-5_HE_good_25.jpg', 1),
(24, 'YTMA79-5_HE_good_28.jpg', 1),
(25, 'YTMA79-5_HE_good_33.jpg', 1),
(26, 'YTMA79-5_HE_good_5.jpg', 1),
(27, 'YTMA79-5_HE_good_7.jpg', 1),
(28, 'YTMA79-5_HE_good_9.jpg', 1),
(29, 'YTMA79-5_HE_poor_14.jpg', 0),
(30, 'YTMA79-5_HE_poor_17.jpg', 0),
(31, 'YTMA79-5_HE_poor_2.jpg', 0),
(32, 'YTMA79-5_HE_poor_3.jpg', 0),
(33, 'YTMA79-5_HE_poor_5.jpg', 0),
(34, 'add_YTMA79-5_HE_10_good.jpg', 1),
(35, 'add_YTMA79-5_HE_12_good.jpg', 1),
(36, 'add_YTMA79-5_HE_14_good.jpg', 1),
(37, 'add_YTMA79-5_HE_14_poor.jpg', 0),
(38, 'add_YTMA79-5_HE_16_poor.jpg', 0),
(39, 'add_YTMA79-5_HE_17_poor.jpg', 0),
(40, 'add_YTMA79-5_HE_18_poor.jpg', 0),
(41, 'add_YTMA79-5_HE_19_poor.jpg', 0),
(42, 'add_YTMA79-5_HE_20_good.jpg', 1),
(43, 'add_YTMA79-5_HE_20_poor.jpg', 0),
(44, 'add_YTMA79-5_HE_21_good.jpg', 1),
(45, 'add_YTMA79-5_HE_21_poor.jpg', 0),
(46, 'add_YTMA79-5_HE_25_good.jpg', 1),
(47, 'add_YTMA79-5_HE_26_good.jpg', 1),
(48, 'add_YTMA79-5_HE_26_poor.jpg', 0),
(49, 'add_YTMA79-5_HE_27_good.jpg', 1),
(50, 'add_YTMA79-5_HE_2_good.jpg', 1),
(51, 'add_YTMA79-5_HE_30_good.jpg', 1),
(52, 'add_YTMA79-5_HE_30_poor.jpg', 0),
(53, 'add_YTMA79-5_HE_32_good.jpg', 1),
(54, 'add_YTMA79-5_HE_33_poor.jpg', 0),
(55, 'add_YTMA79-5_HE_34_good.jpg', 1),
(56, 'add_YTMA79-5_HE_34_poor.jpg', 0),
(57, 'add_YTMA79-5_HE_39_poor.jpg', 0),
(58, 'add_YTMA79-5_HE_3_poor.jpg', 0),
(59, 'add_YTMA79-5_HE_7_good.jpg', 1),
(60, 'add_YTMA79-5_HE_9_good.jpg', 1);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `img_usr` (
  `id_user` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `val` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_img`),
  KEY `FK_IMG_USR_REFERENCE_IMAGES` (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
