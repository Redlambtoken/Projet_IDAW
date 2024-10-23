-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 23 oct. 2024 à 09:17
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `calend'eat`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartient_a`
--

DROP TABLE IF EXISTS `appartient_a`;
CREATE TABLE IF NOT EXISTS `appartient_a` (
  `ID_RECETTE` int NOT NULL,
  `ID_SSCAT` int NOT NULL,
  PRIMARY KEY (`ID_RECETTE`,`ID_SSCAT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_recette`
--

DROP TABLE IF EXISTS `categorie_recette`;
CREATE TABLE IF NOT EXISTS `categorie_recette` (
  `ID_CAT` int NOT NULL AUTO_INCREMENT,
  `LABEL_CAT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_CAT`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie_recette`
--

INSERT INTO `categorie_recette` (`ID_CAT`, `LABEL_CAT`) VALUES
(1, 'aides culinaires et ingrédients divers'),
(2, 'aliments infantiles'),
(3, 'eaux et autres boissons'),
(4, 'entrées et plats composés'),
(5, 'fruits, légumes, légumineuses et oléagineux'),
(6, 'glaces et sorbets'),
(7, 'produits céréaliers'),
(8, 'produits laitiers et assimilés'),
(9, 'produits sucrés'),
(10, 'viandes, œufs, poissons et assimilés');

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `ID_REPAS` bigint NOT NULL,
  `ID_RECETTE` int NOT NULL,
  PRIMARY KEY (`ID_REPAS`,`ID_RECETTE`),
  KEY `FK_CONTIENT2` (`ID_RECETTE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doc_alimentation`
--

DROP TABLE IF EXISTS `doc_alimentation`;
CREATE TABLE IF NOT EXISTS `doc_alimentation` (
  `ID_APPORT` int NOT NULL AUTO_INCREMENT,
  `ID_SPORT` int NOT NULL,
  `ID_SEXE` int NOT NULL,
  `ID_AGE` int NOT NULL,
  `NOM_APPORT` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `MIN` double DEFAULT NULL,
  `MAX` double NOT NULL,
  PRIMARY KEY (`ID_APPORT`),
  KEY `FK_A_BESOIN` (`ID_SEXE`),
  KEY `FK_EXIGE` (`ID_AGE`),
  KEY `FK_NECESSITE` (`ID_SPORT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `est_compose_de`
--

DROP TABLE IF EXISTS `est_compose_de`;
CREATE TABLE IF NOT EXISTS `est_compose_de` (
  `ID_ALIMENT` int NOT NULL,
  `ID_NUTRIMENT` int NOT NULL,
  `POURCENTAGE` int DEFAULT NULL,
  PRIMARY KEY (`ID_ALIMENT`,`ID_NUTRIMENT`),
  KEY `FK_EST_COMPOSE_DE2` (`ID_NUTRIMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fait_de`
--

DROP TABLE IF EXISTS `fait_de`;
CREATE TABLE IF NOT EXISTS `fait_de` (
  `ID_RECETTE` int NOT NULL,
  `ID_ALIMENT` int NOT NULL,
  `QUANTITE` int DEFAULT NULL,
  PRIMARY KEY (`ID_RECETTE`,`ID_ALIMENT`),
  KEY `FK_FAIT_DE2` (`ID_ALIMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau_sport`
--

DROP TABLE IF EXISTS `niveau_sport`;
CREATE TABLE IF NOT EXISTS `niveau_sport` (
  `ID_SPORT` int NOT NULL AUTO_INCREMENT,
  `LABEL_SPORT` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_SPORT`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau_sport`
--

INSERT INTO `niveau_sport` (`ID_SPORT`, `LABEL_SPORT`) VALUES
(1, 'bas'),
(2, 'moyen'),
(3, 'élevé');

-- --------------------------------------------------------

--
-- Structure de la table `nourriture`
--

DROP TABLE IF EXISTS `nourriture`;
CREATE TABLE IF NOT EXISTS `nourriture` (
  `ID_ALIMENT` int NOT NULL AUTO_INCREMENT,
  `LABEL_ALIMENT` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_ALIMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `nutriment`
--

DROP TABLE IF EXISTS `nutriment`;
CREATE TABLE IF NOT EXISTS `nutriment` (
  `ID_NUTRIMENT` int NOT NULL AUTO_INCREMENT,
  `LABEL_NUTRIMENT` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_NUTRIMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `ID_RECETTE` int NOT NULL AUTO_INCREMENT,
  `NOM_RECETTE` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ID_CAT` int DEFAULT NULL,
  `ID_SCAT` int DEFAULT NULL,
  `ID_SSCAT` int DEFAULT NULL,
  PRIMARY KEY (`ID_RECETTE`),
  KEY `FK_APPARTIENT_A` (`ID_SSCAT`),
  KEY `FK_EST_DANS` (`ID_CAT`),
  KEY `FK_REPRESENTE` (`ID_SCAT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `ID_REPAS` bigint NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` bigint NOT NULL,
  `DATE_REPAS` datetime NOT NULL,
  PRIMARY KEY (`ID_REPAS`),
  KEY `FK_MANGE` (`ID_UTILISATEUR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `ID_SEXE` int NOT NULL AUTO_INCREMENT,
  `LABEL_SEXE` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_SEXE`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`ID_SEXE`, `LABEL_SEXE`) VALUES
(1, 'Femme'),
(2, 'Homme'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie_recette`
--

DROP TABLE IF EXISTS `sous_categorie_recette`;
CREATE TABLE IF NOT EXISTS `sous_categorie_recette` (
  `ID_SCAT` int NOT NULL AUTO_INCREMENT,
  `LABEL_SCAT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_SCAT`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sous_categorie_recette`
--

INSERT INTO `sous_categorie_recette` (`ID_SCAT`, `LABEL_SCAT`) VALUES
(1, 'épices'),
(2, 'œufs'),
(3, 'aides culinaires'),
(4, 'aides culinaires et ingrédients pour végétariens'),
(5, 'algues'),
(6, 'autres matières grasses'),
(7, 'autres produits à base de viande\r\n'),
(8, 'barres céréalières\r\n'),
(9, 'beurres'),
(10, 'biscuits apéritifs'),
(11, 'biscuits sucrés'),
(12, 'boisson alcoolisées'),
(13, 'boissons sans alcool'),
(14, 'céréales de petit-déjeuner'),
(15, 'céréales et biscuits infantiles'),
(16, 'charcuteries et assimilés'),
(17, 'chocolats et produits à base de chocolat'),
(18, 'condiments'),
(19, 'confiseries non chocolatées'),
(20, 'confitures et assimilés'),
(21, 'crèmes et spécialités à base de crème'),
(22, 'denrées destinées à une alimentation particulière'),
(23, 'desserts glacés'),
(24, 'desserts infantiles'),
(25, 'eaux'),
(26, 'feuilletées et autres entrées'),
(27, 'fromages et assimilés'),
(28, 'fruits'),
(29, 'fruits à coque et graines oléagineuses'),
(30, 'gâteaux et pâtisseries'),
(31, 'glaces'),
(32, 'herbes'),
(33, 'huiles de poissons'),
(34, 'huiles et graisses végétales'),
(35, 'ingrédients divers'),
(36, 'légumes'),
(37, 'légumineuses'),
(38, 'laits'),
(39, 'laits et boissons infantiles'),
(40, 'margarines'),
(41, 'mollusques et crustacés crus'),
(42, 'mollusques et crustacés cuits'),
(43, 'pâtes, riz et céréales'),
(44, 'pains et assimilés'),
(45, 'petits pots salés et plats infantiles'),
(46, 'pizzas, tartes et crêpes salées'),
(47, 'plats composés'),
(48, 'poissons crus'),
(49, 'poissons cuits'),
(50, 'pommes de terre et autres tubercules'),
(51, 'produits à base de poissons et produits de la mer'),
(52, 'produits laitiers frais et assimilés'),
(53, 'salades composées et crudités'),
(54, 'sandwichs'),
(55, 'sauces'),
(56, 'sels'),
(57, 'sorbets'),
(58, 'soupes'),
(59, 'substitus de produits carnés'),
(60, 'sucres, miels et assimilés'),
(61, 'viandes crues'),
(62, 'viandes cuites'),
(63, 'viennoiseries');

-- --------------------------------------------------------

--
-- Structure de la table `sous_sous_categorie_recette`
--

DROP TABLE IF EXISTS `sous_sous_categorie_recette`;
CREATE TABLE IF NOT EXISTS `sous_sous_categorie_recette` (
  `ID_SSCAT` int NOT NULL AUTO_INCREMENT,
  `LABEL_SSCAT` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_SSCAT`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sous_sous_categorie_recette`
--

INSERT INTO `sous_sous_categorie_recette` (`ID_SSCAT`, `LABEL_SSCAT`) VALUES
(1, 'œufs crus'),
(2, 'œufs cuits'),
(3, 'abats'),
(4, 'agneau et mouton'),
(5, 'autres desserts'),
(6, 'autres fromages et spécialités'),
(7, 'autres spécialités charcutières'),
(8, 'autres viandes'),
(9, 'bœuf et veau'),
(10, 'bières et cidres'),
(11, 'biscottes et pains grillés'),
(12, 'boissons à reconstituer'),
(13, 'boissons rafraîchissantes lactées'),
(14, 'boissons rafraîchissantes sans alcool'),
(15, 'boissons végétales'),
(16, 'café, thé, cacao etc. prêts à consommer'),
(17, 'cocktails'),
(18, 'compotes et assimilés'),
(19, 'desserts lactés'),
(20, 'desserts végétaux'),
(21, 'dinde'),
(22, 'fromage fondus'),
(23, 'fromages à pâte molle'),
(24, 'fromages à pâte persillée'),
(25, 'fromages à pâte pressée'),
(26, 'fromages blancs'),
(27, 'fruits appertisés'),
(28, 'fruits crus'),
(29, 'fruits et leurs produits de la Martinique'),
(30, 'fruits et leurs produits de la Réunion'),
(31, 'fruits séchés'),
(32, 'gibier'),
(33, 'herbes fraîches'),
(34, 'herbes séchées'),
(35, 'jambons cuits'),
(36, 'jambons secs et crus'),
(37, 'jus'),
(38, 'légumes crus'),
(39, 'légumes cuits'),
(40, 'légumes et leurs produits de la Martinique'),
(41, 'légumes et leurs produits de la Réunion'),
(42, 'légumes séchés ou déshydratés'),
(43, 'légumineuses cuites'),
(44, 'légumineuses fraîches'),
(45, 'légumineuses sèches'),
(46, 'laits autres que de vache'),
(47, 'laits de vache concentrés ou en poudre'),
(48, 'laits de vaches liquides (non concentrés)'),
(49, 'liqueurs et alcools'),
(50, 'nectars'),
(51, 'omelettes et autres ovoproduits'),
(52, 'pâtés et terrines'),
(53, 'pâtes, riz et céréales crus'),
(54, 'pâtes, riz et céréales cuits'),
(55, 'pains'),
(56, 'plats de céréales/pâtes'),
(57, 'plats de fromage'),
(58, 'plats de légumes/légumineuses'),
(59, 'plats de poisson et féculents'),
(60, 'plats de poisson sans garniture'),
(61, 'plats de viande et féculents'),
(62, 'plats de viande et légumes/légumineuses'),
(63, 'plats de viande sans garniture'),
(64, 'plats végétariens'),
(65, 'porc'),
(66, 'poulet'),
(67, 'quenelles'),
(68, 'rillettes'),
(69, 'sauces chaudes'),
(70, 'sauces condimentaires'),
(71, 'sauces condimentaires'),
(72, 'sauces sucrées'),
(73, ''),
(74, 'saucisses et assimilés'),
(75, 'saucisson secs'),
(76, 'substituts de charcuteries pour végétariens'),
(77, 'substituts de fromages pour végétariens'),
(78, 'vins'),
(79, 'yaourts et spécialités laitières type yaourt');

-- --------------------------------------------------------

--
-- Structure de la table `tranche_age`
--

DROP TABLE IF EXISTS `tranche_age`;
CREATE TABLE IF NOT EXISTS `tranche_age` (
  `ID_AGE` int NOT NULL AUTO_INCREMENT,
  `TRANCHE_D_AGE` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `AGE_MIN` int DEFAULT NULL,
  `AGE_MAX` int DEFAULT NULL,
  PRIMARY KEY (`ID_AGE`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tranche_age`
--

INSERT INTO `tranche_age` (`ID_AGE`, `TRANCHE_D_AGE`, `AGE_MIN`, `AGE_MAX`) VALUES
(1, '<20', 0, 20),
(2, '21-40', 21, 40),
(3, '41-60', 41, 60),
(4, '+60', 61, 200);

-- --------------------------------------------------------

--
-- Structure de la table `type_cuisson`
--

DROP TABLE IF EXISTS `type_cuisson`;
CREATE TABLE IF NOT EXISTS `type_cuisson` (
  `ID_CUISSON` int NOT NULL AUTO_INCREMENT,
  `NOM_CUISSON` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `APPORT_CUISSON` float NOT NULL,
  PRIMARY KEY (`ID_CUISSON`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` bigint NOT NULL AUTO_INCREMENT,
  `ID_SEXE` int NOT NULL,
  `ID_SPORT` int NOT NULL,
  `NOM_UTILISATEUR` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `PRENOM_UTILISATEUR` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `LOGIN_UTILISATEUR` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ANNEE_DE_NAISSANCE` int NOT NULL,
  `PASSWORD` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`),
  KEY `FK_A` (`ID_SPORT`),
  KEY `FK_EST` (`ID_SEXE`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `ID_SEXE`, `ID_SPORT`, `NOM_UTILISATEUR`, `PRENOM_UTILISATEUR`, `LOGIN_UTILISATEUR`, `ANNEE_DE_NAISSANCE`, `PASSWORD`, `EMAIL`) VALUES
(1, 2, 2, 'BOBA', 'FETT', '', 1983, '8bac014b1d8f0d4eadf658f6f308993b', 'bobaFett@gmail.com'),
(2, 1, 3, 'Skywalker', 'Leia', '', 1972, '7ba20633c1519a0c2169cd06559ab501', 'Skywalker@gmail.com'),
(3, 3, 1, 'Jabba', 'LeHut', '', 1874, '16993482cd3b73ed816953d1d4b5b727', 'JabaBest@hotmail.com'),
(4, 3, 3, 'Chewy', 'Bacca', '', 1844, '3970f70b6790c70b6cb98acec9bfeeef', 'Rrwwwgg@Gwwwrghh.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilise`
--

DROP TABLE IF EXISTS `utilise`;
CREATE TABLE IF NOT EXISTS `utilise` (
  `ID_RECETTE` int NOT NULL,
  `ID_CUISSON` int NOT NULL,
  PRIMARY KEY (`ID_RECETTE`,`ID_CUISSON`),
  KEY `FK_UTILISE2` (`ID_CUISSON`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
