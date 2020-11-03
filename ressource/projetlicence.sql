-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 nov. 2020 à 11:06
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetlicence`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

DROP TABLE IF EXISTS `categorie_produit`;
CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `id_cat_prod` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id_cat_prod`, `libelle`) VALUES
(1, 'Vis'),
(2, 'Poulie');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_utilisateur`
--

DROP TABLE IF EXISTS `categorie_utilisateur`;
CREATE TABLE IF NOT EXISTS `categorie_utilisateur` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libellé` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
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
-- Structure de la table `conseils`
--

DROP TABLE IF EXISTS `conseils`;
CREATE TABLE IF NOT EXISTS `conseils` (
  `id_cons` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `id_categ` int(11) NOT NULL,
  PRIMARY KEY (`id_cons`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conseils`
--

INSERT INTO `conseils` (`id_cons`, `titre`, `libelle`, `video`, `id_categ`) VALUES
(1, 'Comment visser une vis', 'Avant de procéder au vissage, appliquez de la paraffine ou de la bougie sur le filet de la vis pour faciliter sa pénétration. Vissez progressivement : adaptez la vitesse de vissage au fur et à mesure.\r\nRegardez ce tuto pour visser comme un pro', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6T9n-bxfU0E\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen class=\"align-self-start mr-3\"></iframe>', 1),
(2, 'Quelle clé pour serrer un écrous, un raccord, ou un boulon ?', 'Vidéo d\'aide', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2BDq-e4fAGw\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen class=\"align-self-start mr-3\"></iframe>', 3);

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

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`chemin`, `image`, `id_prod`) VALUES
('../public/img/vis.jpg', 'vis', 1),
('../public/img/visLong.jpg', 'Vis long', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(5) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_cat` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `quantité`, `prix_unitaire`, `libelle`, `description`, `id_cat`) VALUES
(1, 'A700', 10, 8, 'Vis', 'Ceci est une vis normale.', 1),
(2, 'A701', 10, 9, 'Vis longue', 'Ceci est une vis longue.', 1);

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
  `codepostal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cat_util` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=1234567892 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Nom`, `Prenom`, `email`, `MDP`, `Raison`, `adresse`, `codepostal`, `ville`, `tel`, `id_cat`) VALUES
(1234567891, 'Six', 'Tristan', 'sixtristan@orange.fr', 'tortue93', 'lol', 'dsdq', 59139, 'Wattginies', '26522156', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
