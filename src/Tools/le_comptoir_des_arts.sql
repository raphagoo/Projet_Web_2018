-- Base de données :  `le_comptoir_des_arts`
--
CREATE DATABASE IF NOT EXISTS `le_comptoir_des_arts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `le_comptoir_des_arts`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `details_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Admin_id`),
  KEY `FK_Admin_details_id` (`details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Admin_id`, `username`, `password`, `details_id`) VALUES
(1, 'admin', '$argon2i$v=19$m=1024,t=2,p=2$aUNOTEFKcGVUc0FRWnhQbw$mn37yI5rGfu1JDGr1jHCpEBljBlJBalTZNgXV72MkCU', 1);

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `Artist_name` varchar(100) NOT NULL,
  PRIMARY KEY (`Artist_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`Artist_name`) VALUES
('Agnes Cecile'),
('Alexis Vartengel'),
('doc'),
('W-E-Z');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `details_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `FK_Customer_details_id` (`details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_state` int(11) NOT NULL,
  `estimatedDate` date NOT NULL,
  `DeliveryCompany_id` int(11) DEFAULT NULL,
  `Order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `FK_Delivery_DeliveryCompany_id` (`DeliveryCompany_id`),
  KEY `FK_Delivery_Order_id` (`Order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deliverycompany`
--

DROP TABLE IF EXISTS `deliverycompany`;
CREATE TABLE IF NOT EXISTS `deliverycompany` (
  `DeliveryCompany_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(80) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `zipcode` varchar(40) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`DeliveryCompany_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `details_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `zipCode` varchar(40) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `Admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`details_id`),
  KEY `FK_Details_customer_id` (`customer_id`),
  KEY `FK_Details_Admin_id` (`Admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `amount` int(11) DEFAULT NULL,
  `Order_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  PRIMARY KEY (`Order_id`,`Product_id`),
  KEY `FK_OrderDetails_Product_id` (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `totalPrice` float NOT NULL,
  `amount` int(8) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Order_id`),
  KEY `FK_Orders_customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `Theme` text NOT NULL,
  `Category` text NOT NULL,
  `picturePath` text NOT NULL,
  `color` text NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `qty` int(8) NOT NULL,
  `Artist_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Product_id`),
  KEY `FK_Product_Artist_name` (`Artist_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`Product_id`, `name`, `description`, `price`, `Theme`, `Category`, `picturePath`, `color`, `width`, `height`, `qty`, `Artist_name`) VALUES
(1, 'aenigma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper est et ligula congue, non pretium nibh feugiat. Pellentesque mattis augue ligula, at dapibus felis porta vel. Morbi eleifend nulla nunc, et facilisis mi bibendum ac. Etiam sed lacus condimentum, suscipit diam sit amet, venenatis est. Sed in ante sit amet nulla tincidunt tincidunt. Vestibulum finibus tellus nec ullamcorper tincidunt. Ut gravida tortor condimentum ex dapibus tincidunt. Ut ultricies eros porttitor leo accumsan placerat. Proin luctus, quam sed luctus egestas, nulla eros scelerisque nulla, ut volutpat ante massa eget metus.', 80, 'Urbain', 'Edition', 'Assets/IMG/aenigma2.jpg', 'Noir', 80, 80, 1, 'Agnes Cecile'),
(2, 'Lines hold the memories', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper est et ligula congue, non pretium nibh feugiat. Pellentesque mattis augue ligula, at dapibus felis porta vel. Morbi eleifend nulla nunc, et facilisis mi bibendum ac. Etiam sed lacus condimentum, suscipit diam sit amet, venenatis est. Sed in ante sit amet nulla tincidunt tincidunt. Vestibulum finibus tellus nec ullamcorper tincidunt. Ut gravida tortor condimentum ex dapibus tincidunt. Ut ultricies eros porttitor leo accumsan placerat. Proin luctus, quam sed luctus egestas, nulla eros scelerisque nulla, ut volutpat ante massa eget metus.', 240, 'Portrait', 'Dessin', 'Assets/IMG/lines_hold_the_memories_by_agnes_cecile-d38y67i.jpg', 'Blanc, Noir', 90, 90, 1, 'Agnes Cecile'),
(3, 'Visage', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper est et ligula congue, non pretium nibh feugiat. Pellentesque mattis augue ligula, at dapibus felis porta vel. Morbi eleifend nulla nunc, et facilisis mi bibendum ac. Etiam sed lacus condimentum, suscipit diam sit amet, venenatis est. Sed in ante sit amet nulla tincidunt tincidunt. Vestibulum finibus tellus nec ullamcorper tincidunt. Ut gravida tortor condimentum ex dapibus tincidunt. Ut ultricies eros porttitor leo accumsan placerat. Proin luctus, quam sed luctus egestas, nulla eros scelerisque nulla, ut volutpat ante massa eget metus.', 140, 'Portrait, Abstrait', 'Edition', 'Assets/IMG/new_painting_6_5x4_5feet_by_art_by_doc-d6l5pcp.jpg', 'Blanc', 120, 100, 1, 'doc'),
(4, 'Untitled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper est et ligula congue, non pretium nibh feugiat. Pellentesque mattis augue ligula, at dapibus felis porta vel. Morbi eleifend nulla nunc, et facilisis mi bibendum ac. Etiam sed lacus condimentum, suscipit diam sit amet, venenatis est. Sed in ante sit amet nulla tincidunt tincidunt. Vestibulum finibus tellus nec ullamcorper tincidunt. Ut gravida tortor condimentum ex dapibus tincidunt. Ut ultricies eros porttitor leo accumsan placerat. Proin luctus, quam sed luctus egestas, nulla eros scelerisque nulla, ut volutpat ante massa eget metus.', 45, 'Paysage, Minimalisme', 'Peinture', 'Assets/IMG/untitled_by_alexsvartengel-d5cl9gl.jpg', 'Vert, Blanc', 120, 80, 1, 'Alexis Vartengel');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_Admin_details_id` FOREIGN KEY (`details_id`) REFERENCES `details` (`details_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_Customer_details_id` FOREIGN KEY (`details_id`) REFERENCES `details` (`details_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `FK_Delivery_DeliveryCompany_id` FOREIGN KEY (`DeliveryCompany_id`) REFERENCES `deliverycompany` (`DeliveryCompany_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Delivery_Order_id` FOREIGN KEY (`Order_id`) REFERENCES `orders` (`Order_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `FK_Details_Admin_id` FOREIGN KEY (`Admin_id`) REFERENCES `admin` (`Admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Details_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK_OrderDetails_Order_id` FOREIGN KEY (`Order_id`) REFERENCES `orders` (`Order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_OrderDetails_Product_id` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_Orders_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_Artist_name` FOREIGN KEY (`Artist_name`) REFERENCES `artist` (`Artist_name`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
