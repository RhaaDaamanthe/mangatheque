-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 juil. 2025 à 13:55
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mangatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
CREATE TABLE IF NOT EXISTS `auteurs` (
  `id_auteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id_auteur`, `nom`) VALUES
(1, 'Eiichiro Oda'),
(2, 'Masashi Kishimoto'),
(3, 'Koyoharu Gotouge'),
(4, 'Yūki Tabata'),
(5, 'Takahiro'),
(6, 'Aka Akasaka');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom`) VALUES
(1, 'Action'),
(2, 'Romance'),
(3, 'Drame'),
(4, 'Aventure'),
(5, 'Horreur'),
(6, 'Comédie'),
(7, 'Thriller'),
(8, 'Fantastique');

-- --------------------------------------------------------

--
-- Structure de la table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
CREATE TABLE IF NOT EXISTS `mangas` (
  `id_manga` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `annee_sortie` int DEFAULT NULL,
  `synopsis` text COLLATE utf8mb4_general_ci,
  `nb_volumes_total` int DEFAULT NULL,
  `nb_volumes_possedes` int DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  `id_auteur` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id_manga`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_auteur` (`id_auteur`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mangas`
--

INSERT INTO `mangas` (`id_manga`, `titre`, `annee_sortie`, `synopsis`, `nb_volumes_total`, `nb_volumes_possedes`, `id_categorie`, `id_auteur`, `id_user`) VALUES
(1, 'Naruto', 2002, 'Un jeune ninja rêve de devenir Hokage et de gagner la reconnaissance de son village.', 220, 220, 1, 1, NULL),
(2, 'One Piece', 1999, 'Luffy, un garçon au chapeau de paille, navigue pour devenir le roi des pirates.', 1100, 650, 1, 1, NULL),
(3, 'Demon Slayer', 2019, 'Tanjiro combat des démons pour venger sa famille et sauver sa sœur.', 55, 26, 1, 1, NULL),
(4, 'Black Clover', 2017, 'Asta, un jeune sans magie, rêve de devenir empereur-mage.', 170, 100, 1, 1, NULL),
(5, 'Akame ga Kill', 2014, 'Tatsumi rejoint un groupe d\'assassins pour renverser un gouvernement corrompu.', 24, 24, 2, 1, NULL),
(6, 'Love is War', 2019, 'Deux lycéens amoureux refusent d’avouer leurs sentiments et essaient de faire craquer l’autre.', 37, 20, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `created_at`) VALUES
(13, 'Naruto', 'naruto@gmail.com', '$2y$10$b9Ys50VjqvajgXMMmxpdu.5RHdqMnFUHFyU26kZMFtEHWF6q6wSvi', '2025-07-10 12:38:36'),
(14, 'Sasuke', 'sasuke@gmail.com', '$2y$10$jOBa0hAPO69TElE.v0FyZ.wovnESyc.nuh4o6U7y6FsuUZ2xGnhjm', '2025-07-10 12:38:54');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mangas`
--
ALTER TABLE `mangas`
  ADD CONSTRAINT `mangas_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `mangas_ibfk_2` FOREIGN KEY (`id_auteur`) REFERENCES `auteurs` (`id_auteur`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `mangas_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
