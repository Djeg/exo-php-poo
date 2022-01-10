-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : lun. 10 jan. 2022 à 11:31
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `createdAt`, `updatedAt`, `content`) VALUES
(1, 'Mon premier article', 'Description de mon premier article', '2022-01-10 11:28:34', '2022-01-10 11:28:34', '<p>\r\nlorem ipsum dolor sit amet\r\n</p>\r\n\r\n<p>\r\nlorem ipsum dolor sit amet\r\n</p>'),
(2, 'Mon second article', 'Description de mon deuxième article', '2022-01-10 11:28:34', '2022-01-10 11:28:34', '<p>\r\nlorem ipsum dolor sit amet\r\n</p>\r\n<p>\r\nlorem ipsum dolor sit amet\r\n</p>\r\n<p>\r\nlorem ipsum dolor sit amet\r\n</p>\r\n<p>\r\nlorem ipsum dolor sit amet\r\n</p>\r\n<p>\r\nlorem ipsum dolor sit amet\r\n</p>\r\n<p>\r\nlorem ipsum dolor sit amet\r\n</p>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
