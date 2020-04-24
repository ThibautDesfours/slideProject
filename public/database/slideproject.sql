-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 avr. 2020 à 13:24
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
-- Base de données :  `slideproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `path_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `name_picture`, `created_at`, `path_picture`) VALUES
(10, 'vache', '2020-04-24 13:13:25', 'cow-5ea1b50ff1e46-5ea2e5f53c499.jpeg'),
(11, 'élèves', '2020-04-24 13:14:06', '1-5ea2e61eb054c.jpeg'),
(12, 'galerie', '2020-04-24 13:14:27', '9-5ea2e6335c209.jpeg'),
(13, 'apple', '2020-04-24 13:14:36', 'apple-5ea1b1e58de20-5ea2e63c1c940.png'),
(14, 'ballons', '2020-04-24 13:14:46', 'ballons-5ea2e64628600.jpeg'),
(15, 'cat', '2020-04-24 13:14:55', 'cat-5ea2e64f6145f.jpeg'),
(16, 'dès', '2020-04-24 13:15:08', 'des-5ea1aeeee2334-5ea2e65c2b1fc.png'),
(17, 'chien', '2020-04-24 13:15:27', 'dog-5ea2e66fadea0.jpeg'),
(18, 'panda', '2020-04-24 13:15:37', 'panda-5ea1b5a26865c-5ea2e6791bea5.jpeg'),
(19, 'people', '2020-04-24 13:15:47', 'people-5ea2e6831857d.jpeg'),
(20, 'pont', '2020-04-24 13:16:06', 'picture-5ea2e6966d74a.jpeg'),
(21, 'stitch', '2020-04-24 13:16:41', 'stitch-5ea2e6b950265.jpeg'),
(22, 'arbre', '2020-04-24 13:18:00', 'tree-5ea2e7082dc11.webp'),
(23, 'feuille sur l\'eau', '2020-04-24 13:18:29', 'white-transparent-leaf-on-mirror-260nw-1029171697-5ea1b77ce43ba-5ea2e725a8059.webp');

-- --------------------------------------------------------

--
-- Structure de la table `picture_effect`
--

DROP TABLE IF EXISTS `picture_effect`;
CREATE TABLE IF NOT EXISTS `picture_effect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_id` int(11) DEFAULT NULL,
  `length_effect` double DEFAULT NULL,
  `x_start` float DEFAULT NULL,
  `y_start` float DEFAULT NULL,
  `slide_id` int(11) DEFAULT NULL,
  `w_start` float DEFAULT NULL,
  `x_end` float DEFAULT NULL,
  `y_end` float DEFAULT NULL,
  `w_end` float DEFAULT NULL,
  `h_start` float DEFAULT NULL,
  `h_end` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_278427E2EE45BDBF` (`picture_id`),
  KEY `IDX_278427E2DD5AFB87` (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture_effect`
--

INSERT INTO `picture_effect` (`id`, `picture_id`, `length_effect`, `x_start`, `y_start`, `slide_id`, `w_start`, `x_end`, `y_end`, `w_end`, `h_start`, `h_end`) VALUES
(36, 10, 10, 190, 16, 18, 904, 419, 240, 388, 670, 367),
(37, 15, 12, 2, 1, 18, 1108, 221, 276, 416, 719, 306),
(38, 17, 10, 53, 238, 18, 1012, 552, 48, 260, 478, 195),
(39, 18, 10, 51, 40, 18, 1028, 259, 85, 526, 526, 339),
(40, 20, 10, 74, 97, 19, 921, 640, 115, 297, 503, 395),
(41, 22, 9, 2, 1, 19, 1108, 334, 273, 453, 690, 292);

-- --------------------------------------------------------

--
-- Structure de la table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `removed_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slide`
--

INSERT INTO `slide` (`id`, `title_slide`, `created_at`, `removed_at`) VALUES
(18, 'Les animaux wohah !', '2020-04-24 13:19:26', NULL),
(19, 'Damn les paysages !', '2020-04-24 13:21:23', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `picture_effect`
--
ALTER TABLE `picture_effect`
  ADD CONSTRAINT `FK_278427E2DD5AFB87` FOREIGN KEY (`slide_id`) REFERENCES `slide` (`id`),
  ADD CONSTRAINT `FK_278427E2EE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
