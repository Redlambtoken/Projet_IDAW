/*--------------------------------------------------------------------------------------------------------*/


/*          Ceci est un fichier exemple, il doit contenir la base dedonnée afin d'être créé               */


/*--------------------------------------------------------------------------------------------------------*/
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 15 oct. 2024 à 07:16
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbtest`
--

-- --------------------------------------------------------

--
-- Structure de la table `pepito`
--

DROP TABLE IF EXISTS `pepito`;
CREATE TABLE IF NOT EXISTS `pepito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pepito`
--

INSERT INTO `pepito` (`id`, `name`, `email`) VALUES
(6, 'Leo', 'chouippe@gmail.com'),
(2, 'Suzanne', 'oui@gmail.com'),
(3, 'Oui-Oui', 'oui.oui@gmail.com'),
(4, 'Boby', 'ybob@gmail.com'),
(5, 'Lisa', 'simpson@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;