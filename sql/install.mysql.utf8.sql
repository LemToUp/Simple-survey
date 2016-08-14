CREATE TABLE IF NOT EXISTS `#__simple_survey_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `button_text` varchar(50) NOT NULL  DEFAULT '0',
  `button_url` varchar(50) NOT NULL  DEFAULT '0',
  `url_from` varchar(50) NOT NULL  DEFAULT '0',
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;