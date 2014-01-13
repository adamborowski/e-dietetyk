delimiter $$

CREATE TABLE `uzytkownicy` (
  `login` varchar(31) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `data` varchar(20000) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci$$

CREATE TABLE `posrednicy` (
  `posrednik_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(20000) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`posrednik_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci$$

CREATE TABLE `zamowienia` (
  `zamowienie_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(31) COLLATE utf8_polish_ci NOT NULL,
  `data` varchar(20000) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`zamowienie_id`),
  KEY `login` (`login`),
  CONSTRAINT `fk_zamowienia_uzytkownicy` FOREIGN KEY (`login`) REFERENCES `uzytkownicy` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci$$

CREATE TABLE `diety` (
  `dieta_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(31) COLLATE utf8_polish_ci NOT NULL,
  `data` varchar(20000) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`dieta_id`),
  KEY `login` (`login`),
  CONSTRAINT `fk_diety_uzytkownicy` FOREIGN KEY (`login`) REFERENCES `uzytkownicy` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci$$

CREATE TABLE `opisy_produktow` (
  `opis_prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `posrednik_id` int(10) unsigned NOT NULL,
  `data` varchar(20000) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`opis_prod_id`),
  KEY `posrednik_id` (`posrednik_id`),
  CONSTRAINT `fk_opisy_prod_posrednicy` FOREIGN KEY (`posrednik_id`) REFERENCES `posrednicy` (`posrednik_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci$$

CREATE TABLE `produkty` (
  `produkt_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opis_prod_id` int(10) unsigned NOT NULL,
  `zamowienie_id` int(10) unsigned NULL,
  `dieta_id` int(10) unsigned NOT NULL,
  `data` varchar(20000) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`produkt_id`),
  KEY `opis_prod_id` (`opis_prod_id`),
  KEY `zamowienie_id` (`zamowienie_id`),
  KEY `dieta_id` (`dieta_id`),
  CONSTRAINT `fk_prod_opis_prod` FOREIGN KEY (`opis_prod_id`) REFERENCES `opisy_produktow` (`opis_prod_id`),
  CONSTRAINT `fk_prod_zamowienia` FOREIGN KEY (`zamowienie_id`) REFERENCES `zamowienia` (`zamowienie_id`),
  CONSTRAINT `fk_prod_dieta` FOREIGN KEY (`dieta_id`) REFERENCES `diety` (`dieta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci$$



