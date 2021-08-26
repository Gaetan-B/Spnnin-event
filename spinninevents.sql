-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 août 2021 à 15:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spinninevents`
--

-- --------------------------------------------------------

--
-- Structure de la table `date_lineup`
--

DROP TABLE IF EXISTS `date_lineup`;
CREATE TABLE IF NOT EXISTS `date_lineup` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_event` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Line-up` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `champ_libre` varchar(500) DEFAULT NULL,
  `lien_fnac` varchar(250) DEFAULT NULL,
  `video_yt` varchar(250) DEFAULT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`ID`, `nom`, `image`, `adresse`, `champ_libre`, `lien_fnac`, `video_yt`, `date_debut`, `date_fin`) VALUES
(1, 'Test', NULL, 'qzdq', 'qsdqzd', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-04 00:00:00', '0021-08-27 00:00:00'),
(2, 'Test2', NULL, 'qdzqd', 'sqdqzd', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-11 00:00:00', '2021-08-20 00:00:00'),
(3, 'Test3', NULL, 'qdzqd', 'sqdqzd', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-11 00:00:00', '2021-08-20 00:00:00'),
(4, 'Test4', NULL, 'qsdzqd', 'qsdzqd', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-04 00:00:00', '2021-08-19 00:00:00'),
(5, 'Test5', NULL, 'qsdzqd', 'qsdzqd', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-04 00:00:00', '2021-08-19 00:00:00'),
(6, 'test6', NULL, 'sdfe', 'sdfesf', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-26 00:00:00', '2021-08-12 00:00:00'),
(7, 'test7', NULL, 'sdfe', 'sdfesf', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-26 00:00:00', '2021-08-12 00:00:00'),
(8, 'qdzd', NULL, 'qsdzqd', 'qsdqzd', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-10 00:00:00', '2021-08-18 00:00:00'),
(9, 'qdzd', NULL, 'qsdzqd', 'qsdqzd', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-10 00:00:00', '2021-08-18 00:00:00'),
(10, 'test200', NULL, '12, rue des loutres', 'lineup', 'https://www.youtube.com/', 'https://www.youtube.com/', '2021-08-04 00:00:00', '2021-08-19 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`) VALUES
(1, 'admin', '1234'),
(2, 'gaetan@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
