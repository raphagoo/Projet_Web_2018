-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 déc. 2017 à 13:50
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web_2017`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `Article_id` varchar(9) NOT NULL,
  `Article_title` varchar(30) DEFAULT NULL,
  `Article_type` tinyint(4) DEFAULT NULL,
  `Article_nbdexemplaire` int(11) DEFAULT NULL,
  `Article_dispo` tinyint(4) DEFAULT NULL,
  `article_largeur` int(11) DEFAULT NULL,
  `Article_nbvotes` int(11) DEFAULT NULL,
  `article_hauteur` int(11) DEFAULT NULL,
  `ladder_ladder_id` varchar(9) NOT NULL,
  `Encheres_Encheres_id` varchar(9) NOT NULL,
  `Commande_Commande_id` varchar(9) NOT NULL,
  `Commande_User_User_pseudo` varchar(9) NOT NULL,
  PRIMARY KEY (`Article_id`,`ladder_ladder_id`,`Encheres_Encheres_id`,`Commande_Commande_id`,`Commande_User_User_pseudo`),
  KEY `fk_Article_ladder1_idx` (`ladder_ladder_id`),
  KEY `fk_Article_Encheres1_idx` (`Encheres_Encheres_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE IF NOT EXISTS `commander` (
  `User_User_pseudo` varchar(9) NOT NULL,
  `Article_Article_id` varchar(9) NOT NULL,
  `Article_ladder_ladder_id` varchar(9) NOT NULL,
  `Article_Encheres_Encheres_id` varchar(9) NOT NULL,
  `Article_Commande_Commande_id` varchar(9) NOT NULL,
  `Article_Commande_User_User_pseudo` varchar(9) NOT NULL,
  PRIMARY KEY (`User_User_pseudo`,`Article_Article_id`,`Article_ladder_ladder_id`,`Article_Encheres_Encheres_id`,`Article_Commande_Commande_id`,`Article_Commande_User_User_pseudo`),
  KEY `fk_User_has_Article_Article1_idx` (`Article_Article_id`,`Article_ladder_ladder_id`,`Article_Encheres_Encheres_id`,`Article_Commande_Commande_id`,`Article_Commande_User_User_pseudo`),
  KEY `fk_User_has_Article_User1_idx` (`User_User_pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `encheres`
--

DROP TABLE IF EXISTS `encheres`;
CREATE TABLE IF NOT EXISTS `encheres` (
  `Encheres_id` varchar(9) NOT NULL,
  `encheres_nom` varchar(30) DEFAULT NULL,
  `encheres_datedebut` datetime DEFAULT NULL,
  `encheres_datefin` datetime DEFAULT NULL,
  `encheres_tableau_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Encheres_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ladder`
--

DROP TABLE IF EXISTS `ladder`;
CREATE TABLE IF NOT EXISTS `ladder` (
  `ladder_id` varchar(9) NOT NULL,
  `ladder_datedebut` datetime DEFAULT NULL,
  `ladder_datefin` datetime DEFAULT NULL,
  `ladder1_article_id` varchar(20) DEFAULT NULL,
  `ladder2_article_id` varchar(20) DEFAULT NULL,
  `ladder3_article_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ladder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `User_User_pseudo` varchar(9) NOT NULL,
  `Encheres_Encheres_id` varchar(9) NOT NULL,
  PRIMARY KEY (`User_User_pseudo`,`Encheres_Encheres_id`),
  KEY `fk_User_has_Encheres_Encheres1_idx` (`Encheres_Encheres_id`),
  KEY `fk_User_has_Encheres_User1_idx` (`User_User_pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur_pseudo` varchar(9) NOT NULL,
  `utilisateur_nom` char(20) DEFAULT NULL,
  `utilisateur_addresse` text,
  `utilisateur_mail` varchar(50) DEFAULT NULL,
  `utilisateur_motdepasse` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`utilisateur_pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_Article_Encheres1` FOREIGN KEY (`Encheres_Encheres_id`) REFERENCES `encheres` (`Encheres_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Article_ladder1` FOREIGN KEY (`ladder_ladder_id`) REFERENCES `ladder` (`ladder_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `fk_User_has_Article_Article1` FOREIGN KEY (`Article_Article_id`,`Article_ladder_ladder_id`,`Article_Encheres_Encheres_id`,`Article_Commande_Commande_id`,`Article_Commande_User_User_pseudo`) REFERENCES `article` (`Article_id`, `ladder_ladder_id`, `Encheres_Encheres_id`, `Commande_Commande_id`, `Commande_User_User_pseudo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Article_User1` FOREIGN KEY (`User_User_pseudo`) REFERENCES `utilisateur` (`utilisateur_pseudo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `fk_User_has_Encheres_Encheres1` FOREIGN KEY (`Encheres_Encheres_id`) REFERENCES `encheres` (`Encheres_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Encheres_User1` FOREIGN KEY (`User_User_pseudo`) REFERENCES `utilisateur` (`utilisateur_pseudo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
