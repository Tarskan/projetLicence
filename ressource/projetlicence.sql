-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 nov. 2020 à 14:26
-- Version du serveur :  8.0.21
-- Version de PHP : 7.2.33

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
  `id_cat_prod` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id_cat_prod`, `libelle`) VALUES
(1, 'Vis'),
(2, 'Poulie'),
(5, 'Roue'),
(6, 'Plaque');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_utilisateur`
--

DROP TABLE IF EXISTS `categorie_utilisateur`;
CREATE TABLE IF NOT EXISTS `categorie_utilisateur` (
  `id_cat` int NOT NULL AUTO_INCREMENT,
  `libellé` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_utilisateur`
--

INSERT INTO `categorie_utilisateur` (`id_cat`, `libellé`) VALUES
(2, 'Utilisateur'),
(3, 'Modérateur'),
(1, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `quantité` int NOT NULL,
  `date` date NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_produit` int NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_utilisateur` (`id_utilisateur`),
  KEY `fk_produit` (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `quantité`, `date`, `id_utilisateur`, `id_produit`) VALUES
(1, 10, '2020-11-18', 1234567891, 2);

-- --------------------------------------------------------

--
-- Structure de la table `conseils`
--

DROP TABLE IF EXISTS `conseils`;
CREATE TABLE IF NOT EXISTS `conseils` (
  `id_cons` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cons`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conseils`
--

INSERT INTO `conseils` (`id_cons`, `titre`, `libelle`, `video`) VALUES
(1, 'Comment visser une vis', 'Avant de procéder au vissage, appliquez de la paraffine ou de la bougie sur le filet de la vis pour faciliter sa pénétration. Vissez progressivement : adaptez la vitesse de vissage au fur et à mesure.\r\nRegardez ce tuto pour visser comme un pro', 'https://www.youtube.com/embed/6T9n-bxfU0E'),
(2, 'Quelle clé pour serrer un écrous, un raccord, ou un boulon ?', 'Vidéo d\'aide', 'https://www.youtube.com/embed/2BDq-e4fAGw'),
(5, 'Comment mettre une cheville', 'Video testsqdqsd', 'https://youtu.be/NCCEwuJ2Ats');

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_prod` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prod_objet` (`id_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`id`, `chemin`, `image`, `id_prod`) VALUES
(4, '../public/img/pneu4Poulie.jpg', 'pneu4Poulie.jpg', 17),
(2, '../public/img/visLong.jpg', 'Vis long', 2),
(3, '../public/img/poulie.jpg', 'poulie.jpg', 13);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `reference` varchar(5) NOT NULL,
  `quantité` int NOT NULL,
  `prix_unitaire` int NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_cat` int NOT NULL,
  `promotion` int DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_cat` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `quantité`, `prix_unitaire`, `libelle`, `description`, `id_cat`, `promotion`) VALUES
(17, 'B801', 50, 2, 'Pneu Poulie', 'C\'est une poulie pneu', 2, 4),
(2, 'A701', 80, 9, 'Vis longue', 'Ceci est une vis longue.', 1, NULL),
(13, 'B800', 50, 2, 'Poulie', 'Une poulie Simple', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pourcentage` int NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `pourcentage`, `datedebut`, `datefin`) VALUES
(1, 20, '2020-11-11', '2020-11-30'),
(2, 40, '2020-11-27', '2020-12-12'),
(4, 50, '2020-11-27', '2020-12-25');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `Raison` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codepostal` int NOT NULL,
  `ville` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `id_cat` int NOT NULL,
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
