-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2021 at 07:46 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spacetrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `idarticle` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `distance_terre` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `depart` varchar(255) NOT NULL,
  `navette` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `prix` int(11) NOT NULL,
  `grosdes` text NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`idarticle`, `nom`, `image`, `distance_terre`, `duree`, `depart`, `navette`, `commentaire`, `prix`, `grosdes`, `categorie`) VALUES
(1, 'Lune', 'https://cdn.pixabay.com/photo/2016/04/02/19/40/moon-1303512_960_720.png', 0, 3, 'Toulouse', 'MOON HOLIDAY', 'Notre croisiere la plus demandee. Depaysement assure pour cette escapade  sur notre satellite naturel!', 20000, 'Rendez-vous a Toulouse pour un dacollage et un voyage inoubliable ! Nos deux piscines geantes vous donnerons une vue sur les etoiles et les planetes a distance grace a une baie vitree a la vue panoramique 360 degree. Restaurants, salles de spectacle et de sport, zone habitations disponibles.', 1),
(2, 'Mars', 'https://pngimg.com/uploads/mars_planet/mars_planet_PNG28.png', 78, 7, 'Paris', 'Le Mars', 'La croisiere la plus populaire. Decouverte de la destination phare de Space Trip, la future planete habitable apres la Terre.', 50000, 'Cette croisiere passe par la Lune. Arrive vers Mars vous admirerez les colonies mises en place par Elon Musk, une superficie de 10 km².Le MARS dispose de 1 km² de superficie pour un maximum de 1500 passagers. Restaurants, salles de spectacle et de sport, zone habitations disponibles.', 1),
(3, 'Saturn', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Saturn_01.svg/1200px-Saturn_01.svg.png', 230, 14, 'Aix-Les-Bains', 'Saturn Discorvery', 'DECOUVREZ CETTE PLANETE UNIQUE DE NOTRE SYSTEME SOLAIRE. SPECTACLE GARANTIE !', 100000, 'Attachez vos ceintures et installez vous confortablement pour ce voyage vers Saturne. Vous pourrez profiter a bord du SATURN DISCOVERY de toutes les commodites et confort necessaires a ce periple unique : restaurants, casino, theatre et meme une piscine avec vue unique sur le cosmos.', 2),
(4, 'Pluton', 'https://cdn.pixabay.com/photo/2017/04/04/14/26/pluto-2201446_960_720.png', 480, 21, 'Nice', 'Pluton Observer', 'Le voyage ultime ! Osez visiter cette fabuleuse planete aux confins de notre systeme solaire.', 200000, 'La croisiere la plus longue de Space Trip. Un voyage passant par toutes les planetes precedentes. Restaurants, salles de spectacle et de sport ainsi que des zones d\'habitations disponibles.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categorie_article`
--

CREATE TABLE `categorie_article` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie_article`
--

INSERT INTO `categorie_article` (`id`, `libelle`) VALUES
(1, 'Petit voyage'),
(2, 'Long voyage');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
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
-- Table structure for table `livredor`
--

CREATE TABLE `livredor` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livredor`
--

INSERT INTO `livredor` (`id`, `nom`, `commentaire`) VALUES
(45, 'Raphael P', 'Laisser votre petite trace sur le site ;)'),
(55, 'S', 'FIRST'),
(65, 'Thomas Pesquet', 'Voyage très confortable, je recommande'),
(75, 'JESUS CHRIST', 'BAH ALORS JE DONNE DES MEILLEURS SOLUTIONS QUE TON FORMATEUR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idarticle`),
  ADD KEY `FK_ARTICLE_CATEGORIE` (`categorie`);

--
-- Indexes for table `categorie_article`
--
ALTER TABLE `categorie_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livredor`
--
ALTER TABLE `livredor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `idarticle` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categorie_article`
--
ALTER TABLE `categorie_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `livredor`
--
ALTER TABLE `livredor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ARTICLE_CATEGORIE` FOREIGN KEY (`categorie`) REFERENCES `categorie_article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
