-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 jan. 2024 à 18:16
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `slicebdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `total_price` int NOT NULL,
  `date` date NOT NULL,
  `is_delivered` tinyint(1) NOT NULL DEFAULT '0',
  `reference` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `calories_100g` float NOT NULL,
  `weight` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `calories_100g`, `weight`) VALUES
(1, 'Crème fraiche', 269, 100),
(2, 'Sauce tomate', 29, 100),
(3, 'Mozzarella', 280, 100),
(4, 'Bacon', 541, 40),
(5, 'Poulet', 239, 100),
(6, 'Oignons', 40, 40),
(7, 'Sauce BBQ', 172, 30),
(8, 'Merguez', 316, 10),
(9, 'Boeuf haché', 332, 100),
(10, 'Reblochon', 330, 80),
(11, 'Patates', 80.5, 100),
(12, 'Lardons', 329, 80),
(13, 'Nugget', 296, 100),
(14, 'Frites', 312, 180),
(15, 'Beignets d\'oignons', 414, 78);

-- --------------------------------------------------------

--
-- Structure de la table `ingredients_produits`
--

DROP TABLE IF EXISTS `ingredients_produits`;
CREATE TABLE IF NOT EXISTS `ingredients_produits` (
  `ingredients_id` int NOT NULL,
  `produits_id` int NOT NULL,
  `quantite_produits` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredients_produits`
--

INSERT INTO `ingredients_produits` (`ingredients_id`, `produits_id`, `quantite_produits`) VALUES
(1, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(3, 2, 1),
(5, 2, 1),
(0, 2, 0),
(0, 2, 0),
(7, 2, 1),
(8, 2, 1),
(9, 2, 1),
(10, 3, 1),
(11, 3, 1),
(12, 3, 1),
(1, 3, 1),
(13, 10, 1),
(15, 5, 1),
(14, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categories_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `description` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` float NOT NULL,
  `is_displayed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `categories_id`, `name`, `pic_name`, `description`, `price`, `is_displayed`) VALUES
(1, 1, 'Bacon Groovy', 'bacongroovy.jpg', 'La meilleure pizza.\r\nSur cette pizza enchanteresse, la crème fraîche légère française crée une toile douce. La mozzarella fondante, le poulet rôti tendre, les oignons caramélisés au caramel et le bacon croustillant dansent en parfaite harmonie, tandis que la sauce barbecue ajoute une touche sucrée-fumée. Une expérience gustative raffinée tout au long de vos bouchées.', 7.9, 1),
(2, 1, 'Cannibale', 'cannibale.jpg', 'Sous une couverture généreuse de mozzarella dorée à souhait, la pizza exhale une symphonie de saveurs audacieuses. La base de sauce barbecue, suave et fumée, danse avec la tendresse du poulet rôti, l\'audace épicée de la merguez, et la richesse du haché au bœuf parfaitement assaisonné. Un festin de contrastes, chaque bouchée révélant une fusion magnifique d\'arômes.', 7.9, 1),
(3, 1, 'Savoyarde', 'savoyarde.jpg', 'La pizza savoyarde, un poème gustatif, dévoile son charme alpin. Une croûte croustillante, telle la neige fraîche des sommets, soutient une danse de saveurs robustes. L\'élégance du reblochon fondant en harmonie avec les pommes de terre épaisses et dorées, escortées par la générosité des lardons. Une odyssée culinaire aux accents montagnards, chaque bouchée une échappée gourmande dans les hauteurs.', 8.6, 1),
(4, 2, 'Frites', 'frites_menu.jpg', ' Des bâtonnets d\'or croustillants, dorés à la perfection à l\'extérieur, révélant une chair moelleuse à l\'intérieur. Une symphonie de saveurs simples, mais irrésistiblement délicieuse.', 4, 1),
(5, 2, 'Onions rings x 5', 'onion_rings2.jpg', 'Des anneaux d\'oignons enrobés d\'une panure dorée et croustillante. À chaque bouchée, une explosion de saveurs douces et savoureuses, mariant la tendresse de l\'oignon à la texture croquante de la panure. Un régal à la fois rustique et gourmand.', 4, 1),
(6, 2, 'Cheese roll x 4', 'cheese_roll.jpg', 'Un délice roulé dans une fine couche de pâte, renfermant une fusion parfaite de fromage fondant. Une bouchée tendre et savoureuse, offrant une expérience gourmande inégalée.', 3, 0),
(7, 3, 'Coca Cola', 'coca.jpg', 'Une canette glacée renfermant l\'effervescence pétillante et le goût rafraîchissant emblématique du Coca-Cola. Un éclat de fraîcheur pour étancher la soif, prêt à vous désaltérer en une gorgée.', 2, 1),
(8, 3, 'Ice Tea 33cl', 'ice_tea.jpg', '', 2, 1),
(9, 3, 'Eau plate 50cl', 'eau.jpg', 'Une bouteille d\'eau de 50cl, parfait pour se désaltérer après une bonne pizza', 2, 1),
(10, 2, 'Chicken nuggets', 'nugget.jpg', 'Des pépites de poulet croustillantes à souhait, dorées à la perfection. Un en-cas irrésistible qui marie la tendresse de la volaille à une panure délicieusement croquante. Les Chicken Nuggets, une explosion de saveurs à chaque bouchée.', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_commandes`
--

DROP TABLE IF EXISTS `produits_commandes`;
CREATE TABLE IF NOT EXISTS `produits_commandes` (
  `commandes_id` int NOT NULL,
  `produits_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_admin`) VALUES
(1, 'AdminUser', '$2y$10$gH9g0pjBf1wurlAKGIUd1O.rZl1eds1/CnFmZ1vWTi2lZ09UqiCEe', 'admin@admin.com', 1),
(2, 'Random', '$2y$10$qfd.iuFEYdVd8kIyx8WtouB9tc64tAKHgAFByQJLhzFEzdHB9Vszm', 'user@user.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
