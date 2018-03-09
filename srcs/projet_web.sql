-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 déc. 2017 à 11:49
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
-- Base de données :  `projet web`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `article_id` varchar(9) NOT NULL,
  `article_title` varchar(30) DEFAULT NULL,
  `article_type` tinyint(4) DEFAULT NULL,
  `article_quantity` int(11) DEFAULT NULL,
  `article_dispo` tinyint(4) DEFAULT NULL,
  `article_width` int(11) DEFAULT NULL,
  `article_nbvotes` int(11) DEFAULT NULL,
  `article_height` int(11) DEFAULT NULL,
  `ladder_ladder_id` varchar(9) NOT NULL,
  `order_order_id` varchar(9) NOT NULL,
  `Commande_Commande_id` varchar(9) NOT NULL,
  `order_user_username` varchar(9) NOT NULL,
  `Article_price` float DEFAULT NULL,
  PRIMARY KEY (`article_id`,`ladder_ladder_id`,`order_order_id`,`Commande_Commande_id`,`order_user_username`),
  KEY `fk_Article_ladder1_idx` (`ladder_ladder_id`),
  KEY `fk_Article_Encheres1_idx` (`order_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
CREATE TABLE IF NOT EXISTS `auctions` (
  `auction_id` varchar(9) NOT NULL,
  `auction_name` varchar(30) DEFAULT NULL,
  `auction_startdate` datetime DEFAULT NULL,
  `auction_enddate` datetime DEFAULT NULL,
  `article_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`auction_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ladder`
--

DROP TABLE IF EXISTS `ladder`;
CREATE TABLE IF NOT EXISTS `ladder` (
  `ladder_id` varchar(9) NOT NULL,
  `ladder_startdate` datetime DEFAULT NULL,
  `ladder_enddate` datetime DEFAULT NULL,
  `ladder1_article_id` varchar(20) DEFAULT NULL,
  `ladder2_article_id` varchar(20) DEFAULT NULL,
  `ladder3_article_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ladder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `username` varchar(9) NOT NULL,
  `article_article_id` varchar(9) NOT NULL,
  `article_ladder_ladder_id` varchar(9) NOT NULL,
  `Article_Encheres_Encheres_id` varchar(9) NOT NULL,
  `Article_Order_Order_id` varchar(9) NOT NULL,
  `Article_Order_User_Username` varchar(9) NOT NULL,
  PRIMARY KEY (`username`,`article_article_id`,`article_ladder_ladder_id`,`Article_Encheres_Encheres_id`,`Article_Order_Order_id`,`Article_Order_User_Username`),
  KEY `fk_User_has_Article_Article1_idx` (`article_article_id`,`article_ladder_ladder_id`,`Article_Encheres_Encheres_id`,`Article_Order_Order_id`,`Article_Order_User_Username`),
  KEY `fk_User_has_Article_User1_idx` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `username_username` varchar(9) NOT NULL,
  `Encheres_Encheres_id` varchar(9) NOT NULL,
  PRIMARY KEY (`username_username`,`Encheres_Encheres_id`),
  KEY `fk_User_has_Encheres_Encheres1_idx` (`Encheres_Encheres_id`),
  KEY `fk_User_has_Encheres_User1_idx` (`username_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(9) NOT NULL,
  `user_lastname` char(20) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `user_password` varchar(20) DEFAULT NULL,
  `user_firstname` char(30) DEFAULT NULL,
  `user_address` varchar(40) DEFAULT NULL,
  `user_address2` varchar(40) DEFAULT NULL,
  `user_zipcode` varchar(8) DEFAULT NULL,
  `user_city` varchar(40) DEFAULT NULL,
  `user_country` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_Article_Encheres1` FOREIGN KEY (`order_order_id`) REFERENCES `auctions` (`auction_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Article_ladder1` FOREIGN KEY (`ladder_ladder_id`) REFERENCES `ladder` (`ladder_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`);

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_User_has_Article_Article1` FOREIGN KEY (`article_article_id`,`article_ladder_ladder_id`,`Article_Encheres_Encheres_id`,`Article_Order_Order_id`,`Article_Order_User_Username`) REFERENCES `article` (`article_id`, `ladder_ladder_id`, `order_order_id`, `Commande_Commande_id`, `order_user_username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Article_User1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `fk_User_has_Encheres_Encheres1` FOREIGN KEY (`Encheres_Encheres_id`) REFERENCES `auctions` (`auction_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Encheres_User1` FOREIGN KEY (`username_username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
