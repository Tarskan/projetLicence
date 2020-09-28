-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 28 sep. 2020 à 13:48
-- Version du serveur :  8.0.18
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
-- Base de données :  `projetlicence`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

DROP TABLE IF EXISTS `categorie_produit`;
CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `id_cat_prod` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `id_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_cat_prod`),
  KEY `fk_prod_cat` (`id_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_utilisateur`
--

DROP TABLE IF EXISTS `categorie_utilisateur`;
CREATE TABLE IF NOT EXISTS `categorie_utilisateur` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libellé` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `fk_utili_cat` (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `quantité` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_utilisateur` (`id_utilisateur`),
  KEY `fk_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `chemin` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_prod` int(11) NOT NULL,
  PRIMARY KEY (`chemin`),
  KEY `fk_prod_objet` (`id_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `reference` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `libelle` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `Raison` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codepostal` int(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
