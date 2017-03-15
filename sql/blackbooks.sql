-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Mars 2017 à 13:05
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blackbooks`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `author`
--

INSERT INTO `author` (`id`, `nom`, `prenom`) VALUES
(1, 'DERRIEUX', 'LOIC'),
(2, 'PHILIP K.', 'DICK');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` int(11) NOT NULL,
  `resume` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `vignette` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:object)',
  `editeur` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:object)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CBE5A331FF7747B4` (`titre`),
  UNIQUE KEY `UNIQ_CBE5A331CC1CF4E6` (`isbn`),
  UNIQUE KEY `UNIQ_CBE5A33160C1D0A0` (`resume`),
  UNIQUE KEY `UNIQ_CBE5A331B4B561E` (`vignette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maison` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `editeur`
--

INSERT INTO `editeur` (`id`, `maison`) VALUES
(1, 'Les anges lust'),
(2, 'douces rêveries');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_55CAF7626DE44026` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id`, `description`) VALUES
(4, 'hs'),
(1, 'neuf'),
(2, 'potable'),
(3, 'usure');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(5,2) NOT NULL,
  `fk_book` int(11) DEFAULT NULL,
  `fk_etat` int(11) DEFAULT NULL,
  `fk_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5EF83C9247DB7D0F` (`fk_book`),
  KEY `IDX_5EF83C92D9F4295C` (`fk_etat`),
  KEY `IDX_5EF83C925BAE0D8C` (`fk_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7B00651C7B00651C` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(2, 'cave'),
(5, 'en attente'),
(3, 'prêté'),
(1, 'rayon'),
(4, 'vendu');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `FK_5EF83C9247DB7D0F` FOREIGN KEY (`fk_book`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `FK_5EF83C925BAE0D8C` FOREIGN KEY (`fk_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_5EF83C92D9F4295C` FOREIGN KEY (`fk_etat`) REFERENCES `etat` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
