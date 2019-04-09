-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 30 mars 2019 à 14:52
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nowaste`
--

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

DROP TABLE IF EXISTS `centre`;
CREATE TABLE IF NOT EXISTS `centre` (
  `IDcentre` int(11) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postale` char(5) NOT NULL,
  PRIMARY KEY (`IDcentre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`IDcentre`, `rue`, `numero`, `ville`, `code_postale`) VALUES
(1, 'rrrrrr', 12, 'gonesse', '95652');

-- --------------------------------------------------------

--
-- Structure de la table `deplacement`
--

DROP TABLE IF EXISTS `deplacement`;
CREATE TABLE IF NOT EXISTS `deplacement` (
  `IDcollecte` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `etat` int(11) NOT NULL,
  `IDtransport` int(11) NOT NULL,
  PRIMARY KEY (`IDcollecte`),
  KEY `Deplacement_Vehicule_FK` (`IDtransport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `interagir`
--

DROP TABLE IF EXISTS `interagir`;
CREATE TABLE IF NOT EXISTS `interagir` (
  `IDsociety` int(11) NOT NULL,
  `IDcollecte` int(11) NOT NULL,
  `Demander` int(11) NOT NULL,
  `Valider` int(11) NOT NULL,
  PRIMARY KEY (`IDsociety`,`IDcollecte`),
  KEY `Interagir_Deplacement0_FK` (`IDcollecte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lister`
--

DROP TABLE IF EXISTS `lister`;
CREATE TABLE IF NOT EXISTS `lister` (
  `IDcollecte` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`IDcollecte`,`url`),
  KEY `Lister_Produit0_FK` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `url` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `peremption` date NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `scanner`
--

DROP TABLE IF EXISTS `scanner`;
CREATE TABLE IF NOT EXISTS `scanner` (
  `url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`url`,`email`),
  KEY `Scanner_User0_FK` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `society`
--

DROP TABLE IF EXISTS `society`;
CREATE TABLE IF NOT EXISTS `society` (
  `IDsociety` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` char(5) NOT NULL,
  PRIMARY KEY (`IDsociety`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `society`
--

INSERT INTO `society` (`IDsociety`, `nom`, `adresse`, `telephone`) VALUES
(1, 'fffff', '27 Av du docteur broquet', '55555');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `IDstock` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `IDcentre` int(11) NOT NULL,
  PRIMARY KEY (`IDstock`),
  KEY `Stock_Centre_FK` (`IDcentre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `rue` varchar(255) NOT NULL DEFAULT 'rue victor hugo',
  `numero` int(11) NOT NULL DEFAULT '12',
  `ville` varchar(255) NOT NULL DEFAULT 'Gonesse',
  `code_postale` char(5) NOT NULL DEFAULT '95400',
  `IDuser` int(11) NOT NULL AUTO_INCREMENT,
  `IDcentre` int(11) NOT NULL DEFAULT '1',
  `IDsociety` int(11) DEFAULT '1',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `User_AK` (`IDuser`),
  KEY `User_Centre_FK` (`IDcentre`),
  KEY `User_Society0_FK` (`IDsociety`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`email`, `nom`, `prenom`, `role`, `rue`, `numero`, `ville`, `code_postale`, `IDuser`, `IDcentre`, `IDsociety`, `password`) VALUES
('daniel.se@gmail.com', 'SECK', 'daniel', 1, 'Avenue du Docteur Broquet', 27, 'Gonesse', '95500', 21, 1, 1, '6d4acdc1f82898dd8ea023076d576ff69bcd992e815388b8cdd28ea7eb5bc318'),
('daniel.seck95@gmail.com', 'SECK', 'daniel', 1, 'Avenue du Docteur Broquet', 27, 'Gonesse', '95500', 19, 1, 1, '6d4acdc1f82898dd8ea023076d576ff69bcd992e815388b8cdd28ea7eb5bc318'),
('daniel.seck@gmail.com', 'SECK', 'daniel', 1, 'Avenue du Docteur Broquet', 27, 'Gonesse', '95500', 20, 1, 1, '6d4acdc1f82898dd8ea023076d576ff69bcd992e815388b8cdd28ea7eb5bc318');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `IDtransport` int(11) NOT NULL,
  `autonomie` int(11) NOT NULL,
  `cout` int(11) NOT NULL,
  `volumetrie` int(11) NOT NULL,
  `IDcentre` int(11) NOT NULL,
  PRIMARY KEY (`IDtransport`),
  KEY `Vehicule_Centre_FK` (`IDcentre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `deplacement`
--
ALTER TABLE `deplacement`
  ADD CONSTRAINT `Deplacement_Vehicule_FK` FOREIGN KEY (`IDtransport`) REFERENCES `vehicule` (`IDtransport`);

--
-- Contraintes pour la table `interagir`
--
ALTER TABLE `interagir`
  ADD CONSTRAINT `Interagir_Deplacement0_FK` FOREIGN KEY (`IDcollecte`) REFERENCES `deplacement` (`IDcollecte`),
  ADD CONSTRAINT `Interagir_Society_FK` FOREIGN KEY (`IDsociety`) REFERENCES `society` (`IDsociety`);

--
-- Contraintes pour la table `lister`
--
ALTER TABLE `lister`
  ADD CONSTRAINT `Lister_Deplacement_FK` FOREIGN KEY (`IDcollecte`) REFERENCES `deplacement` (`IDcollecte`),
  ADD CONSTRAINT `Lister_Produit0_FK` FOREIGN KEY (`url`) REFERENCES `produit` (`url`);

--
-- Contraintes pour la table `scanner`
--
ALTER TABLE `scanner`
  ADD CONSTRAINT `Scanner_Produit_FK` FOREIGN KEY (`url`) REFERENCES `produit` (`url`),
  ADD CONSTRAINT `Scanner_User0_FK` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `Stock_Centre_FK` FOREIGN KEY (`IDcentre`) REFERENCES `centre` (`IDcentre`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_Centre_FK` FOREIGN KEY (`IDcentre`) REFERENCES `centre` (`IDcentre`),
  ADD CONSTRAINT `User_Society0_FK` FOREIGN KEY (`IDsociety`) REFERENCES `society` (`IDsociety`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `Vehicule_Centre_FK` FOREIGN KEY (`IDcentre`) REFERENCES `centre` (`IDcentre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
