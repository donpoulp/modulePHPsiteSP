-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 sep. 2021 à 09:22
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spacetrip`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idarticle` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `distance_terre` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `depart` varchar(255) NOT NULL,
  `navette` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `prix` int(11) NOT NULL,
  `grosdes` text NOT NULL,
  `categorie` int(11) NOT NULL,
  PRIMARY KEY (`idarticle`),
  KEY `FK_ARTICLE_CATEGORIE` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `nom`, `image`, `distance_terre`, `duree`, `depart`, `navette`, `commentaire`, `prix`, `grosdes`, `categorie`) VALUES
(1, 'Lune', 'https://cdn.pixabay.com/photo/2016/04/02/19/40/moon-1303512_960_720.png', 0, 3, 'Toulouse', 'MOON HOLIDAY', 'Notre croisiere la plus demandee. Depaysement assure pour cette escapade  sur notre satellite naturel!', 20000, 'Rendez-vous a Toulouse pour un dacollage et un voyage inoubliable ! Nos deux piscines geantes vous donnerons une vue sur les etoiles et les planetes a distance grace a une baie vitree a la vue panoramique 360 degree. Restaurants, salles de spectacle et de sport, zone habitations disponibles.', 1),
(2, 'Mars', 'https://pngimg.com/uploads/mars_planet/mars_planet_PNG28.png', 78, 7, 'Paris', 'Le Mars', 'La croisiere la plus populaire. Decouverte de la destination phare de Space Trip, la future planete habitable apres la Terre.', 50000, 'Cette croisiere passe par la Lune. Arrive vers Mars vous admirerez les colonies mises en place par Elon Musk, une superficie de 10 km.Le MARS dispose de 1 km de superficie pour un maximum de 1500 passagers. Restaurants, salles de spectacle et de sport, zone habitations disponibles.', 1),
(3, 'Saturn', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Saturn_01.svg/1200px-Saturn_01.svg.png', 230, 14, 'Aix-Les-Bains', 'Saturn Discorvery', 'DECOUVREZ CETTE PLANETE UNIQUE DE NOTRE SYSTEME SOLAIRE. SPECTACLE GARANTIE !', 100000, 'Attachez vos ceintures et installez vous confortablement pour ce voyage vers Saturne. Vous pourrez profiter a bord du SATURN DISCOVERY de toutes les commodites et confort necessaires a ce periple unique : restaurants, casino, theatre et meme une piscine avec vue unique sur le cosmos.', 2),
(4, 'Pluton', 'https://cdn.pixabay.com/photo/2017/04/04/14/26/pluto-2201446_960_720.png', 480, 21, 'Nice', 'Pluton Observer', 'Le voyage ultime ! Osez visiter cette fabuleuse planete aux confins de notre systeme solaire.', 200000, 'La croisiere la plus longue de Space Trip. Un voyage passant par toutes les planetes precedentes. Restaurants, salles de spectacle et de sport ainsi que des zones d\'habitations disponibles.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_article`
--

DROP TABLE IF EXISTS `categorie_article`;
CREATE TABLE IF NOT EXISTS `categorie_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_article`
--

INSERT INTO `categorie_article` (`id`, `libelle`) VALUES
(1, 'Petit voyage'),
(2, 'Long voyage');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `username`, `email`, `mdp`) VALUES
(1, 'raphael', 'leraphistoleur@gmail.com', 'petrozzi'),
(2, 'raphael', 'leraphistoleur@gmail.com', 'petrozzi'),
(3, 'raphael', 'leraphistoleur@gmail.com', 'petrozzi'),
(4, 'raphael', 'leraphistoleur@gmail.com', 'petrozzi'),
(5, 'raphael', 'leraphistoleur@gmail.com', 'petrozzi'),
(6, 'ghjghj', 'hgjhg', 'jhgjghj'),
(7, 'makakouille', 'sandrinem73@live.fr', 'jtmgl'),
(8, 'dede', 'yoda1999@hotmail.fr', 'dedede'),
(9, 'frfrfr', 'dedede', 'jtmgl'),
(10, 'lololo', 'lolololo', 'lololo');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `FK_CLIENT` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `idClient`) VALUES
(1, '2021-09-09', 3),
(2, '2021-09-01', 4),
(3, '2021-09-22', 9);

-- --------------------------------------------------------

--
-- Structure de la table `commandeaddarticle`
--

DROP TABLE IF EXISTS `commandeaddarticle`;
CREATE TABLE IF NOT EXISTS `commandeaddarticle` (
  `idCommandeAddArticle` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  PRIMARY KEY (`idCommandeAddArticle`),
  KEY `FK_COMMANDE2` (`idCommande`),
  KEY `FK_IDARTICLE` (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandeaddarticle`
--

INSERT INTO `commandeaddarticle` (`idCommandeAddArticle`, `quantite`, `idCommande`, `idArticle`) VALUES
(1, 3, 1, 4),
(2, 1, 1, 1),
(3, 3, 2, 2),
(4, 1, 3, 3),
(5, 1, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `livredor`
--

DROP TABLE IF EXISTS `livredor`;
CREATE TABLE IF NOT EXISTS `livredor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livredor`
--

INSERT INTO `livredor` (`id`, `nom`, `commentaire`) VALUES
(45, 'Raphael P', 'Laisser votre petite trace sur le site ;)'),
(55, 'S', 'FIRST'),
(65, 'Thomas Pesquet', 'Voyage très confortable, je recommande'),
(75, 'JESUS CHRIST', 'BAH ALORS JE DONNE DES MEILLEURS SOLUTIONS QUE TON FORMATEUR');

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `token`
--

INSERT INTO `token` (`id`, `token`) VALUES
(1, '123456');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ARTICLE_CATEGORIE` FOREIGN KEY (`categorie`) REFERENCES `categorie_article` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_CLIENT` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `commandeaddarticle`
--
ALTER TABLE `commandeaddarticle`
  ADD CONSTRAINT `FK_COMMANDE2` FOREIGN KEY (`idCommande`) REFERENCES `commandeaddarticle` (`idCommandeAddArticle`),
  ADD CONSTRAINT `FK_IDARTICLE` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idarticle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
