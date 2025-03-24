-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 mars 2025 à 09:43
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
-- Base de données : `mediasmart`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id_author`, `name`, `country`) VALUES
(1, 'Valérie Perrin', 'FR'),
(2, 'Freida McFadden', 'US'),
(3, 'Stefan Zweig', 'FR'),
(4, 'Laurence Legrand', 'FR'),
(5, 'James Path', 'US'),
(6, 'Jinpa Sherab', 'US'),
(7, 'Angelina Delcroix', 'FR'),
(8, 'alexis Aubenque', 'FR'),
(9, 'suzanne Collins', 'US'),
(10, 'J.K. Rowling', 'US'),
(11, 'DC COMICS', ''),
(12, '‎James Cameron', ''),
(13, 'Luc Besson', ''),
(14, 'John McTiernan', ''),
(15, 'Bird Brad', ''),
(16, 'James Mangold', ''),
(17, 'Francis Veber', ''),
(18, 'Dany Boon', ''),
(19, 'Jordon Prince-Wright', ''),
(20, 'David Aboucaya', ''),
(21, 'Grégory Ecale', ''),
(22, 'Denis Villeneuve', ''),
(23, 'Christopher Caldwell', ''),
(24, 'Microsoft', ''),
(25, 'Giants Software', ''),
(26, 'BlueTwelve Studio', ''),
(27, 'Nintendo', ''),
(28, 'Deep Purple', ''),
(29, 'Lynyrd Skynyrd ', ''),
(30, 'The Cure', ''),
(31, 'Earth Wind & Fire', ''),
(32, 'Salomé Saqué', ''),
(33, 'Henry David Thoreau', ''),
(34, 'Anne Franck', ''),
(35, 'Jérôme Loubry', ''),
(36, 'Olivier Tournut', ''),
(37, 'Nelson Mandela', ''),
(38, 'Rupi Kaur', ''),
(39, 'Jean-Michel Maulpoix', ''),
(40, 'Masashi Kishimoto', ''),
(41, 'Shirow Masamune', ''),
(42, 'René Goscinny', ''),
(43, 'Delaf', ''),
(44, 'Fred Neidhardt', '');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'LIVRE'),
(2, 'DVD'),
(3, 'JEUX VIDEO'),
(4, 'CD');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id_employee` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_employee`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id_employee`, `name`, `first_name`, `password`) VALUES
(2, 'boby', '', '$2y$10$jjit8QC6rv.f2cIfFoczNeHQl9TY3FVKR0vRSas/FLik5xIoO/P0y'),
(3, 'serge', 'serge', '$2y$10$T4fG5ceP6EqHM5sKziyjH.UVhyaTHXdIGiGyS6IkFDqVawy8y1PyK'),
(4, 'vincent', 'vincent', '$2y$10$0lE/Ou168Zd6v3pB5A5SduvKCF5DwvZ/SqISVdiiWiJRC9jZLldZm');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt_resa`
--

DROP TABLE IF EXISTS `emprunt_resa`;
CREATE TABLE IF NOT EXISTS `emprunt_resa` (
  `id_user` int NOT NULL,
  `id_exemplaire` int NOT NULL,
  `emprunt_date` datetime NOT NULL,
  `max_return_date` datetime NOT NULL,
  `resa` int NOT NULL,
  `mail_sent` int NOT NULL,
  `mail_sent_date` datetime NOT NULL,
  KEY `USER` (`id_user`),
  KEY `EXEMPLAIRE` (`id_exemplaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emprunt_resa`
--

INSERT INTO `emprunt_resa` (`id_user`, `id_exemplaire`, `emprunt_date`, `max_return_date`, `resa`, `mail_sent`, `mail_sent_date`) VALUES
(4, 14, '2025-03-19 10:16:09', '2025-04-09 10:16:09', 0, 0, '0000-00-00 00:00:00'),
(10, 35, '2025-03-19 15:41:54', '2025-04-09 15:41:54', 0, 0, '0000-00-00 00:00:00'),
(11, 19, '2025-03-19 15:42:16', '2025-04-09 15:42:16', 0, 0, '0000-00-00 00:00:00'),
(8, 32, '2025-03-19 15:42:30', '2025-04-09 15:42:30', 0, 0, '0000-00-00 00:00:00'),
(9, 64, '2025-03-19 15:42:50', '2025-04-09 15:42:50', 0, 0, '0000-00-00 00:00:00'),
(2, 82, '2025-03-19 15:43:08', '2025-04-09 15:43:08', 0, 0, '0000-00-00 00:00:00'),
(6, 76, '2025-03-19 15:43:39', '2025-04-09 15:43:39', 0, 0, '0000-00-00 00:00:00'),
(7, 58, '2025-03-19 15:44:25', '2025-04-09 15:44:25', 0, 0, '0000-00-00 00:00:00'),
(4, 59, '2025-03-24 08:27:14', '2025-04-14 08:27:14', 0, 0, '0000-00-00 00:00:00'),
(4, 11, '2025-03-24 08:34:15', '2025-04-14 08:34:15', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `id_exemplaire` int NOT NULL AUTO_INCREMENT,
  `id_media` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `creation_date` datetime NOT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_exemplaire`),
  KEY `MEDIA` (`id_media`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `exemplaire`
--

INSERT INTO `exemplaire` (`id_exemplaire`, `id_media`, `status`, `creation_date`, `barcode`) VALUES
(6, 3, 1, '2025-03-04 07:42:34', '35088895475612383'),
(7, 6, 1, '2025-03-11 10:41:26', ''),
(8, 6, 1, '2025-03-11 10:41:26', ''),
(9, 6, 1, '2025-03-11 10:41:26', ''),
(10, 7, 2, '2025-03-11 10:51:45', ''),
(11, 7, 1, '2025-03-11 10:51:45', ''),
(12, 7, 1, '2025-03-11 10:51:45', ''),
(13, 7, 1, '2025-03-11 10:51:45', ''),
(14, 8, 1, '2025-03-11 10:57:31', ''),
(15, 9, 1, '2025-03-11 11:02:44', ''),
(16, 9, 1, '2025-03-11 11:02:44', ''),
(17, 10, 1, '2025-03-17 15:45:01', ''),
(18, 10, 1, '2025-03-17 15:45:01', ''),
(19, 12, 1, '2025-03-19 08:54:53', ''),
(20, 14, 1, '2025-03-19 10:01:36', ''),
(21, 14, 1, '2025-03-19 10:01:36', ''),
(22, 14, 1, '2025-03-19 10:01:36', ''),
(23, 14, 1, '2025-03-19 10:01:36', ''),
(24, 14, 1, '2025-03-19 10:01:36', ''),
(25, 15, 1, '2025-03-19 09:31:03', ''),
(26, 15, 1, '2025-03-19 09:31:03', ''),
(27, 15, 1, '2025-03-19 09:31:40', ''),
(28, 16, 1, '2025-03-19 10:39:07', ''),
(29, 16, 1, '2025-03-19 10:39:07', ''),
(30, 16, 1, '2025-03-19 10:39:07', ''),
(31, 16, 1, '2025-03-19 10:39:07', ''),
(32, 17, 1, '2025-03-19 10:51:55', ''),
(33, 17, 1, '2025-03-19 10:51:55', ''),
(34, 17, 1, '2025-03-19 10:51:55', ''),
(35, 18, 1, '2025-03-19 10:56:50', ''),
(36, 18, 1, '2025-03-19 10:56:50', ''),
(37, 18, 1, '2025-03-19 10:56:50', ''),
(38, 18, 1, '2025-03-19 10:56:50', ''),
(39, 19, 1, '2025-03-19 11:00:35', ''),
(40, 19, 1, '2025-03-19 11:00:35', ''),
(41, 19, 1, '2025-03-19 11:00:35', ''),
(42, 20, 1, '2025-03-19 11:04:16', ''),
(43, 20, 1, '2025-03-19 11:04:16', ''),
(44, 20, 1, '2025-03-19 11:04:16', ''),
(45, 21, 1, '2025-03-19 11:08:18', ''),
(46, 21, 1, '2025-03-19 11:08:18', ''),
(47, 22, 1, '2025-03-19 11:13:56', ''),
(48, 22, 1, '2025-03-19 11:13:56', ''),
(49, 23, 1, '2025-03-19 11:17:29', ''),
(50, 23, 1, '2025-03-19 11:17:29', ''),
(51, 24, 1, '2025-03-19 11:20:35', ''),
(52, 24, 1, '2025-03-19 11:20:35', ''),
(56, 26, 1, '2025-03-19 10:39:34', ''),
(57, 26, 1, '2025-03-19 10:39:34', ''),
(58, 27, 1, '2025-03-19 11:44:06', ''),
(59, 27, 1, '2025-03-19 11:44:06', ''),
(60, 27, 1, '2025-03-19 11:44:06', ''),
(61, 28, 1, '2025-03-19 11:48:50', ''),
(62, 28, 1, '2025-03-19 11:48:50', ''),
(63, 28, 1, '2025-03-19 11:48:50', ''),
(64, 29, 1, '2025-03-19 11:54:57', ''),
(65, 29, 1, '2025-03-19 11:54:57', ''),
(66, 29, 1, '2025-03-19 11:54:57', ''),
(67, 29, 1, '2025-03-19 11:54:57', ''),
(68, 30, 1, '2025-03-19 11:58:37', ''),
(69, 30, 1, '2025-03-19 11:58:37', ''),
(70, 30, 1, '2025-03-19 11:58:37', ''),
(71, 31, 1, '2025-03-19 12:50:30', ''),
(72, 32, 1, '2025-03-19 12:57:36', ''),
(73, 32, 1, '2025-03-19 12:57:36', ''),
(74, 32, 1, '2025-03-19 12:57:36', ''),
(75, 32, 1, '2025-03-19 12:57:36', ''),
(76, 33, 1, '2025-03-19 13:04:28', ''),
(77, 33, 1, '2025-03-19 13:04:28', ''),
(78, 33, 1, '2025-03-19 13:04:28', ''),
(79, 34, 1, '2025-03-19 13:10:34', ''),
(80, 34, 1, '2025-03-19 13:10:34', ''),
(81, 35, 1, '2025-03-19 13:17:08', ''),
(82, 36, 1, '2025-03-19 13:20:10', ''),
(83, 36, 1, '2025-03-19 13:20:10', ''),
(84, 37, 1, '2025-03-19 13:29:38', ''),
(85, 37, 1, '2025-03-19 13:29:38', ''),
(86, 38, 1, '2025-03-19 13:38:48', ''),
(87, 38, 1, '2025-03-19 13:38:48', ''),
(88, 39, 1, '2025-03-19 13:41:19', ''),
(89, 39, 1, '2025-03-19 13:41:19', ''),
(90, 39, 1, '2025-03-19 13:41:19', ''),
(91, 40, 1, '2025-03-19 13:44:39', ''),
(92, 41, 1, '2025-03-19 13:46:35', ''),
(93, 42, 1, '2025-03-19 13:48:34', ''),
(94, 43, 1, '2025-03-19 13:50:34', ''),
(95, 43, 1, '2025-03-19 13:50:34', ''),
(96, 43, 1, '2025-03-19 13:50:34', ''),
(97, 43, 1, '2025-03-19 13:50:34', ''),
(98, 43, 1, '2025-03-19 13:50:34', ''),
(99, 44, 1, '2025-03-19 13:55:21', ''),
(100, 44, 1, '2025-03-19 13:55:21', ''),
(101, 44, 1, '2025-03-19 13:55:21', ''),
(102, 45, 1, '2025-03-19 13:58:29', ''),
(103, 45, 1, '2025-03-19 13:58:29', ''),
(104, 45, 1, '2025-03-19 13:58:29', ''),
(105, 45, 1, '2025-03-19 13:58:29', ''),
(106, 45, 1, '2025-03-19 13:58:29', ''),
(107, 46, 1, '2025-03-19 14:00:50', ''),
(108, 46, 1, '2025-03-19 14:00:50', ''),
(109, 46, 1, '2025-03-19 14:00:50', ''),
(110, 46, 1, '2025-03-19 14:00:50', ''),
(111, 47, 1, '2025-03-19 14:02:31', ''),
(112, 47, 1, '2025-03-19 14:02:31', ''),
(113, 47, 1, '2025-03-19 14:02:31', ''),
(114, 48, 1, '2025-03-19 14:07:02', ''),
(115, 48, 1, '2025-03-19 14:07:02', ''),
(116, 48, 1, '2025-03-19 14:07:02', '');

-- --------------------------------------------------------

--
-- Structure de la table `historic`
--

DROP TABLE IF EXISTS `historic`;
CREATE TABLE IF NOT EXISTS `historic` (
  `id_historic` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_exemplaire` int NOT NULL,
  `type_histo` int NOT NULL,
  `emprunt_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `user_statut` int NOT NULL,
  `exemplaire_status` int NOT NULL,
  PRIMARY KEY (`id_historic`),
  KEY `USER` (`id_user`),
  KEY `EXEMPLAIRE` (`id_exemplaire`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historic`
--

INSERT INTO `historic` (`id_historic`, `id_user`, `id_exemplaire`, `type_histo`, `emprunt_date`, `return_date`, `user_statut`, `exemplaire_status`) VALUES
(1, 7, 10, 1, '2025-03-17 16:35:34', '2025-04-07 16:35:34', 1, 1),
(2, 6, 14, 1, '2025-03-17 16:36:25', '2025-04-07 16:36:25', 2, 1),
(3, 2, 7, 1, '2025-03-17 16:37:18', '2025-04-07 16:37:18', 2, 1),
(4, 4, 8, 1, '2025-03-18 07:21:59', '2025-04-08 07:21:59', 1, 1),
(5, 2, 7, 2, '2025-03-17 16:37:18', '2025-03-18 07:22:04', 2, 1),
(6, 4, 6, 2, '2025-03-04 07:46:06', '2025-03-18 08:12:47', 1, 1),
(7, 7, 7, 1, '2025-03-18 08:19:59', '2025-04-08 08:19:59', 1, 1),
(8, 4, 17, 1, '2025-03-18 10:34:37', '2025-04-08 10:34:37', 1, 1),
(9, 4, 11, 1, '2025-03-18 11:15:28', '2025-04-08 11:15:28', 1, 1),
(10, 4, 9, 1, '2025-03-18 11:15:37', '2025-04-08 11:15:37', 1, 1),
(11, 4, 6, 1, '2025-03-18 11:15:54', '2025-04-08 11:15:54', 1, 1),
(12, 4, 11, 2, '2025-03-18 11:15:28', '2025-03-18 14:02:14', 1, 1),
(13, 7, 10, 2, '2025-03-17 16:35:34', '2025-03-18 14:02:15', 1, 1),
(14, 4, 8, 2, '2025-03-18 07:21:59', '2025-03-18 14:02:22', 1, 1),
(15, 4, 9, 2, '2025-03-18 11:15:37', '2025-03-18 14:02:23', 1, 1),
(16, 7, 7, 2, '2025-03-18 08:19:59', '2025-03-18 14:02:24', 1, 1),
(17, 6, 14, 2, '2025-03-17 16:36:25', '2025-03-18 14:02:36', 2, 1),
(18, 4, 10, 1, '2025-03-18 15:26:51', '2025-04-08 15:26:51', 1, 1),
(19, 4, 10, 2, '2025-03-18 15:26:51', '2025-03-19 10:13:21', 1, 2),
(20, 4, 17, 2, '2025-03-18 10:34:37', '2025-03-19 10:13:31', 1, 1),
(21, 4, 14, 1, '2025-03-19 10:16:09', '2025-04-09 10:16:09', 1, 1),
(22, 4, 20, 1, '2025-03-19 10:16:28', '2025-04-09 10:16:28', 1, 1),
(23, 4, 20, 2, '2025-03-19 10:16:28', '2025-03-19 10:16:35', 1, 1),
(24, 10, 35, 1, '2025-03-19 15:41:54', '2025-04-09 15:41:54', 1, 1),
(25, 11, 19, 1, '2025-03-19 15:42:16', '2025-04-09 15:42:16', 1, 1),
(26, 8, 32, 1, '2025-03-19 15:42:30', '2025-04-09 15:42:30', 1, 1),
(27, 9, 64, 1, '2025-03-19 15:42:50', '2025-04-09 15:42:50', 1, 1),
(28, 2, 82, 1, '2025-03-19 15:43:08', '2025-04-09 15:43:08', 2, 1),
(29, 6, 76, 1, '2025-03-19 15:43:39', '2025-04-09 15:43:39', 2, 1),
(30, 7, 58, 1, '2025-03-19 15:44:25', '2025-04-09 15:44:25', 1, 1),
(31, 4, 6, 2, '2025-03-18 11:15:54', '2025-03-19 16:13:52', 1, 1),
(32, 4, 59, 1, '2025-03-24 08:27:14', '2025-04-14 08:27:14', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int NOT NULL AUTO_INCREMENT,
  `id_subcategory` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_author` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_recto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_verso` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `SUBCATEGORY` (`id_subcategory`),
  KEY `AUTHOR` (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id_media`, `id_subcategory`, `title`, `id_author`, `description`, `image_recto`, `image_verso`) VALUES
(3, 1, 'La femme de ménage', 2, 'Avec ce nouvel emploi, Millie semble avoir une chance en or. Chez les Garrick, un couple fortuné qui possède un somptueux appartement avec vue sur Manhattan, elle fait le ménage et prépare les repas dans la magnifique cuisine. Mais elle ne tarde pas à déc', '../assets/img/livre1_recto_la_femme_de_ménage.webp', '../assets/img/livre1_verso.webp'),
(5, 12, 'La grenouille et le nénuphar', 1, 'Dans le tumulte de la vie moderne, la sagesse ancestrale des contes taoïstes offre une échappatoire lumineuse.\"La grenouille et le nénuphar\" vous guidera à travers 52 de ces récits, un pour chaque semaine de l\'année.', '../assets/img/livre3_recto.webp', '../assets/img/livre3_verso.webp'),
(6, 1, 'Un automne à River Falls', 8, 'En ce début d\'automne, deux assassinats commis coup sur coup viennent troubler la tranquilité toutes relative de River Falls.', '../assets/img/livre11_recto.webp', '../assets/img/livre11_verso.webp'),
(7, 4, 'Harry Potter et le prisonnier d\'Azkaban', 10, 'Sirius Black, le dangereux criminel qui s\'est échappé de la forteresse d\'Azkaban, recherhce Harry Potter. C\'est donc sous bonne garde que l\'apprenti sorcier fait sa rentrée à Poudlard.', '../assets/img/livre_harry_potter_recto.webp', '../assets/img/harry_potter_verso.webp'),
(8, 1, 'Changer l\'eau des fleurs', 1, 'Violette Toussaint est garde-cimetière dans une petite ville de Bourgogne. Les gens de passage et les habitués viennent se confier et se réchauffer dans sa loge. Avec la petite équipe de fossoyeurs et le jeune curé, elle forme une famille décalée. ', '../assets/img/livre8_recto.webp', '../assets/img/livre8_verso.webp'),
(9, 3, 'Mémoire d\'un expert psychiatre', 7, 'Adam Jacuri est expert psychiatre près de la Cour d\'appel de Lyon. Arrivant en fin de carrière, il décide de confier ses mémoires à Jessie Maure, auteure de thrillers.', '../assets/img/livre10_recto.webp', '../assets/img/livre10_verso.webp'),
(10, 13, 'Batman et les batgirls', 11, 'Batman sauvent des batgirls', '../assets/img/batman.webp', ''),
(12, 19, 'Avatar 2 : La Voie de l\'eau', 12, 'Se déroulant plus d’une décennie après les événements relatés dans le premier film, AVATAR : LA VOIE DE L’EAU raconte l\'histoire des membres de la famille Sully (Jake, Neytiri et leurs enfants), les épreuves auxquelles ils sont confrontés, les chemins qu’', '../assets/img/avatar.webp', ''),
(14, 19, 'Le Cinquième élement', 13, 'New York, XXIIIème siècle. Une boule de feu fonce sur la Terre. Pour l\'arrêter il faut retrouver le Cinquième Élément, l\'être suprême, qui associé aux quatre éléments vitaux - l\'air, l\'eau, le feu et la terre - peut seul repousser Le Mal. Cornélius reçoit', '../assets/img/5element.webp', ''),
(15, 15, ' Une Journée en Enfer', 14, 'Le lieutenant John McClane est de retour et il est demandé en personne par un terroriste, Simon, qui menace New York. Alors qu\'il fait équipe avec Zeus, un commerçant du quartier d\'Harlem embarqué dans l\'aventure malgré lui, McLane se livre à un petit jeu', '../assets/img/dh.webp', ''),
(16, 15, 'Mission: Impossible - Ghost Protocol', 15, 'Impliquée dans l\'attentat terroriste du Kremlin, l\'agence Mission Impossible (IMF) est totalement discréditée. Tandis que le président lance l\'opération \"Protocole Fantôme\", Ethan Hunt, privé de ressources et de renfort, doit trouver le moyen de blanchir ', '../assets/img/mi.webp', ''),
(17, 16, 'Indiana Jones et Le Cadran de la destinée', 16, '1969 : Après avoir passé plus de dix ans à enseigner au Hunter College de New York, l\'estimé docteur Jones, professeur d\'archéologie, est sur le point de prendre sa retraite et de couler des jours paisibles. Tout bascule après la visite surprise de sa fil', '../assets/img/ij.webp', ''),
(18, 17, 'Le Dîner de cons', 17, 'Tous les mercredis, Pierre Brochant et ses amis organisent un dîner où chacun doit amener un con. Celui qui a trouvé le plus spectaculaire est declaré vainqueur. Ce soir, Brochant exulte, il est sur d\'avoir trouvé la perle rare, un con de classe mondiale:', '../assets/img/dc.webp', ''),
(19, 17, 'La maison du bonheur', 18, 'Un mari radin décide d\'être généreux avec sa femme et veut lui offrir une maison de campagne avec travaux mais comme il ne peut s\'empêcher de faire des économies, il fait confiance à un agent immobiler véreux et fait appel à des ouvriers foireux...', '../assets/img/mb.webp', ''),
(20, 20, 'Soldat Collins', 19, 'Rien ne l\'a préparé à cette guerre...', '../assets/img/sc.webp', ''),
(21, 20, 'Piège de guerre', 20, 'Durant la seconde guerre mondiale, à la suite d’une embuscade menée dans un fort par les troupes allemandes, Eugène, soldat allié, se retrouve pris au piège sous terre. Luttant désormais pour sa survie, son destin va se jouer parallèlement à celui d’un au', '../assets/img/pg.webp', ''),
(22, 21, 'Le Prix de la loyaute', 21, 'Le Capitaine Marie Jourdan de la PJ de Lyon est appelée en urgence pour sortir de prison son ami le Capitaine Paul Danceny accusé d’avoir assassiné sa maîtresse, la femme d’un chirurgien esthétique, personnage aussi charismatique que manipulateur.', '../assets/img/pl.webp', ''),
(23, 22, 'Premier Contact', 22, 'Lorsque de mystérieux vaisseaux venus du fond de l’espace surgissent un peu partout sur Terre, une équipe d’experts est rassemblée sous la direction de la linguiste Louise Banks afin de tenter de comprendre leurs intentions.', '../assets/img/pc.webp', ''),
(24, 22, 'Prospect', 23, 'Adolescente idéaliste, Cee accompagne son père dans son quotidien de prospecteur spatial, en quête de ressources rares qu\'ils revendent à de puissants industriels. Lorsqu\'ils sont dépêchés sur la Lune verte, à la recherche d\'un précieux minerai, Cee et so', '../assets/img/p.webp', ''),
(26, 23, 'Call of Duty®: Black Ops 6', 24, 'Call of Duty®: Black Ops 6', '../assets/img/cod6.webp', ''),
(27, 23, 'Farming Simulator 25', 25, 'Farming Simulator 25 inonde les champs d\'une flopée de machines, de fonctionnalités et d\'améliorations graphiques inédites, et même d\'eau fraîche pour faire pousser du riz... pour ajouter encore plus de profondeur et de diversité agricoles à cette série.', '../assets/img/fs25.webp', ''),
(28, 23, 'Stray', 26, 'L\'histoire suit le parcours d\'un chat errant (stray signifiant « errant » en anglais) qui chute dans une ville confinée peuplée de robots, de machines et de bactéries mutantes, et entreprend de retourner à la surface avec l\'aide d\'un compagnon drone nommé', '../assets/img/stray.webp', ''),
(29, 24, 'The Legend of Zelda : Breath of the Wild', 27, 'Link se réveille d\'un sommeil de 100 ans dans un royaume d\'Hyrule dévasté. Il lui faudra percer les mystères du passé et vaincre Ganon, le fléau. L\'aventure prend place dans un gigantesque monde ouvert et accorde ainsi une part importante à l\'exploration.', '../assets/img/bow.webp', ''),
(30, 24, 'Animal Crossing : New Horizons', 27, 'Si l\'agitation de la vie moderne vous épuise, Tom Nook vous réserve un nouveau produit que vous allez adorer... la formule Évasion île déserte de Nook Inc. ! Vous avez probablement déjà croisé la route de personnages attachants, passé d\'excellents moment ', '../assets/img/ac.webp', ''),
(31, 25, 'Deep Purple - Live at montreux 2011', 28, 'Deep Purple - Live at montreux 2011 - 10th anniversary edition [DVD+2CD]', '../assets/img/dp.webp', ''),
(32, 25, 'Lynryd Skynyrd : Greatest hits', 29, 'Le légendaire Lynyrd Skynyrd, basé en Floride, était l\'un des groupes de rock sudiste les plus emblématiques de tous les temps, bien que leur carrière ait été tragiquement interrompue par un accident d\'avion en 1977.', '../assets/img/ls.webp', ''),
(33, 25, 'Staring At The Sea - Best of', 30, 'Les années 80 ont incontestablement été marquées au fer rouge par la cold et la new wave de formations emblématiques comme New Order et Cure. Robert Smith, leader de l\'anthracite groupe de Crawley, est un homme à part. Obsédé par sa paranoïa et ses démons', '../assets/img/tc.webp', ''),
(34, 26, 'Earth Wind & Fire Best of', 31, 'Earth Wind & Fire Best of Gold Métal Box', '../assets/img/ewf.webp', ''),
(35, 11, 'Résister', 32, 'L\'extrême droite est aux portes du pouvoir. Dans les urnes comme dans les esprits, ses thèmes, son narratif et son vocabulaires\'imposent.', '../assets/img/essai_recto.webp', '../assets/img/essai_verso.webp'),
(36, 11, 'La désobéissance civile', 33, 'Comment lutter contre la tendance de la majorité à soumettre les minorités ? Doit-on se plier à la loi lorsque celle-ci est injuste ? Tout geste de désobéissance contient en lui un refus des compromissions qui fondent nos institutions.\r\nThoreau nous confr', '../assets/img/essai1_recto.webp', ''),
(37, 7, 'Le journal d\'Anne Franck', 34, '\"Je vais pouvoir, j\'espère, te confier toutes sortes de choses, comme je n\'ai encore pu le faire à personne, et j\'espère que tu me seras d\'un grand soutien.\"', '../assets/img/l16_recto.webp', ''),
(38, 3, 'Lechant du silence', 35, 'Le père de Damien s\'est jeté du haut de la baie des veuves, cette falaise d\'oùles femmes guettaient autrefois le retour des bateaux de pêches...', '../assets/img/l17_recto.webp', ''),
(39, 3, 'Post Mortem', 36, '\"Une œuvre pas belle à voir\": telle est la façon dont la scène de crime a été décrite à la capitaine Isabelle Le Peletier avant son arrivée sur les lieux.', '../assets/img/l18_recto.webp', ''),
(40, 7, 'Nelson Mandela un long chemin vers la liberté', 37, 'Nelson Mandela a commencé la rédaction de ses souvenirs en 1974 au pénitencier de Robben Island et l\'achève après sa libération en 1990.', '../assets/img/l22_recto.webp', ''),
(41, 8, 'Lait et miel', 38, 'Receuil de poésie...', '../assets/img/poésie2.webp', ''),
(42, 8, 'Rue des fleurs', 39, 'Goncourt de la poésie 2022', '../assets/img/poésie1.webp', ''),
(43, 6, 'Naruto volume 7', 40, 'Naruto volume 7', '../assets/img/manga3.webp', ''),
(44, 6, 'The Ghost in the Shell Perfect edition', 41, 'Dans un univers futuriste où la majorité des individus sont connectés au réseau, le major Kusanagi et son équipe traquent les criminels les plus tenaces. Force d\'enquête tout autant que d\'intervention, ils doivent chaque jour affronter des menaces civiles', '../assets/img/gs.webp', ''),
(45, 13, 'Astérix - L\'Empire du Milieu', 42, 'Nous sommes en 50 av J.-C. Loin, très loin du petit village d\'Armorique que nous connaissons bien, l\'Impératrice de Chine est emprisonnée suite à coup d\'état fomenté par l\'infâme Deng Tsin Qin.\r\n\r\nLa princesse Fu Yi, fille unique de l\'Impératrice, aidée p', '../assets/img/asterix.webp', ''),
(46, 13, 'Gaston - Le retour de Lagaffe', 43, 'Gaston, c\'est un des personnages les plus sympathiques de toute la bande dessinée franco-belge. Né il y a 66 ans sous le crayon d\'André Franquin, Gaston est au début un antihéros paresseux qui très vite va devenir un personnage à l\'imagination et à l\'éner', '../assets/img/lagaffe.webp', ''),
(47, 13, 'Les Tuniques Bleues - De l\'or pour les Bleus', 44, 'Alors qu\'ils chevauchent vers une permission bien méritée, Blutch et Chesterfield assistent à l\'assassinat de deux soldats sudistes par une troupe de brigands. Recueillant les dernières volontés de l\'un des mourants, Chesterfield lui promet de ramener son', '../assets/img/tb.webp', ''),
(48, 4, 'HARRY POTTER ET L\'ENFANT MAUDIT', 10, 'La huitième histoire. Dix-neuf ans plus tard. Être Harry Potter n\'a jamais été facile et ne l\'est pas davantage depuis qu\'il travaille au coeur des secrets du ministère de la Magie. ', '../assets/img/hpem.webp', '');

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id_subcategory` int NOT NULL AUTO_INCREMENT,
  `id_category` int NOT NULL,
  `theme` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_subcategory`),
  KEY `CATEGORY` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`id_subcategory`, `id_category`, `theme`) VALUES
(1, 1, 'ROMAN'),
(2, 1, 'NOUVELLE'),
(3, 1, 'POLAR'),
(4, 1, 'FANTASTIQUE'),
(5, 1, 'FICTION'),
(6, 1, 'MANGA'),
(7, 1, 'BIOGRAPHIE'),
(8, 1, 'POESIE'),
(11, 1, 'ESSAI'),
(12, 1, 'CONTE ET LEGENDE'),
(13, 1, 'BANDE DESSINEE'),
(14, 1, 'JEUNESSE'),
(15, 2, 'ACTION'),
(16, 2, 'AVENTURE'),
(17, 2, 'COMEDIE'),
(18, 2, 'DRAME'),
(19, 2, 'FANTASTIQUE'),
(20, 2, 'GUERRE'),
(21, 2, 'POLICIER'),
(22, 2, 'SCIENCE FICTION'),
(23, 3, 'PS5'),
(24, 3, 'SWITCH'),
(25, 4, 'ROCK'),
(26, 4, 'FUNCK');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inscription_date` datetime NOT NULL,
  `statut` int NOT NULL DEFAULT '1',
  `email_verified` int NOT NULL DEFAULT '0',
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_connexion` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name`, `first_name`, `email`, `password`, `adress`, `phone`, `inscription_date`, `statut`, `email_verified`, `token`, `last_connexion`) VALUES
(2, 'Dupont', 'Zoé', 'valerie@gmail.com', '$2y$10$a3bhm/ysoUS1Yv7Cv92li.XwEwnwfLWl4o2k0TMnMGN0PDNUEQsWe', '292 chemin des peupliers 38150 Saint Maurice l\'Exil', '06 72 45 89 33', '2025-02-25 16:19:48', 2, 0, '', '0000-00-00 00:00:00'),
(4, 'Champagnol', 'bob', 'bob@bob.com', '$2y$10$mQvo.Oh9Pxq6892SL5Yg.euJLMkiunScC48MfuZFGwUjxapKoE9lu', '2 rue de la quiétude', '06 72 45 71 89', '2025-03-03 09:56:42', 1, 1, 'e43e8e227f8d5cf588d6c4d1f4135f27', '2025-03-24 09:37:39'),
(6, 'Dupont', 'Valérie', 'valerie@gmail.com', '$2y$10$nJb9VbIYOG3D8a7GjNNzH.JWrbbGHy9uRAefD498y9i0bhSxJgq7O', '292 chemin des peupliers 38150 Saint Maurice l\'Exil', '06 72 45 89 33', '2025-03-03 16:01:55', 2, 1, '6bea53f78f24cdc78c601be96780f579', '2025-03-06 13:42:51'),
(7, 'william', 'poire', 'poire@poire.com', '$2y$10$EAheKd7FIaPwi.vJwPbRLuGN.Dk3UV5bD5MWnugDqei9g9Z8laT5G', 'adresse de poire', '06 24 56 85 95', '2025-03-14 11:23:30', 1, 1, 'cacc4772c411aa842bdaa285b588f8a7', '2025-03-14 11:45:32'),
(8, 'Rostaing', 'Gaêtan', 'rostainggaetan@gmail.com', '$2y$10$6qRUyen9n1VX53rNHXALRuI9AzvIOjMKIMNo0A.m5yVzlYIXBlBZ6', '13 allées des cèdres', '06 24 56 85 95', '2025-03-18 11:26:25', 1, 1, 'b65077776d66c144f27a3e6612f16e28', '2025-03-18 11:27:25'),
(9, 'Rodriguez', 'Julie', 'julie@gmail.com', '$2y$10$9JXwIzTzVw8y7kKalqadHOyQX8gJapqpEAPakAGwrnAF4NFkf658G', '24 chemin du petit pont', '06 25 45 83 06', '2025-03-18 11:28:44', 1, 1, 'a1a357d07b502e3f402e13dd7de54934', '2025-03-18 11:29:15'),
(10, 'Artimbal', 'José', 'jose@gmail.com', '$2y$10$GUt5AvKOx1LhEuZmPrz3B.kBEJk42afat0JrjrYDtweBwV5Ds/816', 'chemin du grand sentier', '07 52 68 99 24', '2025-03-18 11:33:48', 1, 1, '2b6e7f068c4fcbdae0e4bd043352afd8', '2025-03-18 11:33:48'),
(11, 'Rochambaud', 'Arthur', 'arthur@gmail.com', '$2y$10$Lv3KwbIhvPPjEv9XJ6/Tgu9ipDppQhOS71wttwmroZjzBhnmn5XOK', '356 avenue des cyprès', '06 45 85 12 29', '2025-03-18 13:30:29', 1, 1, 'f59051cf2fdcf371f41f6d35015013f4', '2025-03-18 13:30:29');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt_resa`
--
ALTER TABLE `emprunt_resa`
  ADD CONSTRAINT `emprunt_resa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_resa_ibfk_2` FOREIGN KEY (`id_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `historic`
--
ALTER TABLE `historic`
  ADD CONSTRAINT `historic_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historic_ibfk_2` FOREIGN KEY (`id_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id_subcategory`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
