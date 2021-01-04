-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 18 oct. 2020 à 18:01
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pizzadelaplace`
--

-- --------------------------------------------------------

--
-- Structure de la table `boissons`
--

DROP TABLE IF EXISTS `boissons`;
CREATE TABLE IF NOT EXISTS `boissons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boissons`
--

INSERT INTO `boissons` (`id`, `name`, `price`) VALUES
(1, 'Café', 1),
(2, 'Soda 33cl', 1),
(3, 'Soda bouteille', 3),
(4, 'Bière (Heineken, 1664)', 2),
(5, 'Desperados', 2.5);

-- --------------------------------------------------------

--
-- Structure de la table `pizza_blanches`
--

DROP TABLE IF EXISTS `pizza_blanches`;
CREATE TABLE IF NOT EXISTS `pizza_blanches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `content` varchar(500) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pizza_blanches`
--

INSERT INTO `pizza_blanches` (`id`, `name`, `content`, `price`) VALUES
(1, 'Poulet curry', 'Crème, poulet, curry', 9.5),
(2, 'Kebab', 'Creme, kebab, fromage', 9.5),
(3, 'Norvegienne', 'Creme, saumon, formage', 10),
(4, 'La Marius', 'Creme, chevre, lardons, miel, fromage', 10),
(5, 'Fermiere confite', 'Creme, poulet grille, oignons confits, fromage', 10),
(6, 'Tarto', 'Creme, pommes de terre, reblochon, lardons ou poulet, steak, merguez, saumon, kebab', 11);

-- --------------------------------------------------------

--
-- Structure de la table `pizza_dessert`
--

DROP TABLE IF EXISTS `pizza_dessert`;
CREATE TABLE IF NOT EXISTS `pizza_dessert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pizza_dessert`
--

INSERT INTO `pizza_dessert` (`id`, `name`, `price`) VALUES
(1, 'Nutella et sucre glace', 7),
(2, 'Confiture', 7);

-- --------------------------------------------------------

--
-- Structure de la table `pizza_rouges`
--

DROP TABLE IF EXISTS `pizza_rouges`;
CREATE TABLE IF NOT EXISTS `pizza_rouges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pizza_rouges`
--

INSERT INTO `pizza_rouges` (`id`, `name`, `content`, `price`) VALUES
(1, 'Margarita', 'Sauce tomate, olives, fromage', 8),
(2, 'Jambon', 'Sauce tomate, jambon ou jambon de dinde , fromage', 8.5),
(3, 'Pesto', 'Sauce tomate, fromage, pesto, olives', 8.5),
(4, 'Balsa', 'Sauce tomate, roquette, balsamique, fromage', 9),
(5, '4 Fromages', 'Sauce tomate, fromage, chèvre, gorgonzola, olives', 9.5),
(6, 'Napolitaine', 'Sauce tomate, anchois marinés au citron, olives, fromage', 9.5),
(7, 'Chorizo', 'Sauce tomate, chorizo, poivrons confits, olives, fromage', 9.5),
(8, 'Merguez', 'Sauce tomate, merguez, olives, fromage', 9.5),
(9, 'Arménienne', 'Sauce tomate, viande hachée, oignons, poivrons', 9.5),
(10, 'Royale', 'Sauce tomate, jambon, champignons frais, fromage, olives', 9.5);

-- --------------------------------------------------------

--
-- Structure de la table `produit_allergènes`
--

DROP TABLE IF EXISTS `produit_allergènes`;
CREATE TABLE IF NOT EXISTS `produit_allergènes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit_allergènes`
--

INSERT INTO `produit_allergènes` (`id`, `name`) VALUES
(1, 'Céréales contenant du gluten'),
(2, 'Crustacés'),
(3, 'Oeufs'),
(4, 'Poissons'),
(5, 'Arachides'),
(6, 'Soja'),
(7, 'Lait'),
(8, 'Fruits à coques'),
(9, 'Céleri'),
(10, 'Moutarde'),
(11, 'Graine de sésame'),
(12, 'Anhydride sulfureux et sulfites'),
(13, 'Lupin'),
(14, 'Mollusques ');

-- --------------------------------------------------------

--
-- Structure de la table `speciales_blanches`
--

DROP TABLE IF EXISTS `speciales_blanches`;
CREATE TABLE IF NOT EXISTS `speciales_blanches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `speciales_blanches`
--

INSERT INTO `speciales_blanches` (`id`, `name`, `content`, `price`) VALUES
(1, 'Raviole', 'Crème fraiche, ravioles, fromage, pesto, chèvre', 10),
(2, 'Rustique', 'Crème fraiche, camembert, roquette, fromage, balsamique', 12),
(3, 'Truffe', 'Crème fraiche, champignon, huile de truffe, jambon cru', 12),
(4, 'La Léonie ', 'Crème de champignons, pommes de terre, magret séché, parmesan, jeunes pousses, fromage', 12),
(5, 'Explosion', 'Crème fraiche, kebab, chèvre, sauce burger, oignons, fromage', 12);

-- --------------------------------------------------------

--
-- Structure de la table `speciales_rouges`
--

DROP TABLE IF EXISTS `speciales_rouges`;
CREATE TABLE IF NOT EXISTS `speciales_rouges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `speciales_rouges`
--

INSERT INTO `speciales_rouges` (`id`, `name`, `content`, `price`) VALUES
(1, 'Raclette', 'Sauce tomate, fromage, raclette', 9.5),
(2, 'Paprika', 'Sauce tomate, poulet, paprika', 9.5),
(3, 'Végétarienne', 'Sauce tomate, aubergines grillées, courgettes, pesto, parmesan, olives, fromage', 10),
(4, 'Burger', 'Sauce tomate, viande hachée, oignons, fromage, olives, sauce burger, cheddar', 12),
(5, 'L\'italienne', 'Sauce tomate, jambon cru, tomates séchées, parmesan, pesto, olives, jeunes pousses, fromage', 12),
(6, 'Balaise', 'Sauce tomate, chorizo, merguez, viande hachée, fromage, olives', 12),
(7, 'La provençale', 'Sauce tomate, aubergines grillées, poivrons et oignons confits, bœuf, olives, fromage', 12);

-- --------------------------------------------------------

--
-- Structure de la table `vins`
--

DROP TABLE IF EXISTS `vins`;
CREATE TABLE IF NOT EXISTS `vins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vins`
--

INSERT INTO `vins` (`id`, `name`, `price`) VALUES
(1, 'Le verre', 2),
(2, 'Pichet 1/2l', 6),
(3, 'Bouteille 75cl', 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
