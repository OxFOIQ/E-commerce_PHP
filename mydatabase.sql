-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 29 mai 2023 à 23:10
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mydatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `admininfo`
--

DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE IF NOT EXISTS `admininfo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admininfo`
--

INSERT INTO `admininfo` (`id`, `mail`, `pass`) VALUES
(1, 'log@storeal.com', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `client_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `zipcode` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(100) NOT NULL,
  `statu` int NOT NULL,
  `client_card` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `commandeholdername` varchar(255) NOT NULL,
  `datecommande` date NOT NULL,
  `total_achat` int NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix_unitaire` int NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `highlights` text NOT NULL,
  `shipping` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `description`, `prix_unitaire`, `quantite`, `image`, `highlights`, `shipping`) VALUES
(1, 'BLACK STAINLESS STEEL MESH', 'crafted with precision and made from high-quality materials to ensure durability and comfort', 140, 'in stock', 'mougela-4-transformed.png', 'WRIST BAND WIDTH: ---------- 20MM \nWATER RESISTANCE : ---------- 5ATM\nWATCH CASE : ---------- 20MM\nMOVEMENT : --- MIYOTA 2025\nGLASS:---------- SAPPHIRE CRYSTAL\nDIAL: ---------- BRASS BASE\nBATTERY:  ---------- MAXELL SR626SW\nBANDS:   ---------- BLACK LEATHER\nFUNCTIONS: ---------- H/M DISPLAY\nPRODUCTION: ---------- STOREAL \nDESIGNED IN: ---------- Tunisia\nMANUFACTURED IN: ---------- HONG KONG\n\n\n\n\n', 'FREE SHIPPING'),
(2, 'WHITE LEATHER BAND', 'crafted with precision and made from high-quality materials to ensure durability and comfort', 185, 'in stock', 'mougela-3-transformed.png', 'WRIST BAND WIDTH: ---------- 20MM \r\nWATER RESISTANCE : ---------- 5ATM\r\nWATCH CASE : ---------- 20MM\r\nMOVEMENT : --- MIYOTA 2025\r\nGLASS:---------- SAPPHIRE CRYSTAL\r\nDIAL: ---------- BRASS BASE\r\nBATTERY:  ---------- MAXELL SR626SW\r\nBANDS:   ---------- WHITE LEATHER\r\nFUNCTIONS: ---------- H/M DISPLAY\r\nPRODUCTION: ---------- STOREAL MANIFACUTOR\r\nDESIGNED IN: ---------- Tunisia\r\nMANUFACTURED IN: ---------- HONG KONG\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'FREE SHIPPING'),
(3, 'BLACK LEATHER BAND', 'crafted with precision and made from high-quality materials to ensure durability and comfort', 150, 'in stock', 'mougela-x-transformed.png', 'WRIST BAND WIDTH: ---------- 20MM\r\nWATER RESISTANCE : ---------- 5ATM\r\nWATCH CASE : ---------- 20MM\r\nMOVEMENT : --- MIYOTA 2025\r\nGLASS:---------- SAPPHIRE CRYSTAL\r\nDIAL: ---------- BRASS BASE\r\nBATTERY:  ---------- MAXELL SR626SW\r\nBANDS:   ---------- BLACK LEATHER\r\nFUNCTIONS: ---------- H/M DISPLAY\r\nPRODUCTION: ---------- STOREAL MANIFACUTOR\r\nDESIGNED IN: ---------- Tunisia\r\nMANUFACTURED IN: ---------- HONG KONG\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'FREE SHIPPING');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `verify_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `code` bigint NOT NULL,
  `verif_status` int NOT NULL DEFAULT '0',
  `feedback` mediumtext NOT NULL,
  `help` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
