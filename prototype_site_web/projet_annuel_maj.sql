-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 mai 2018 à 15:51
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet annuel maj`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_message` int(11) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `quantite` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message_forum`
--

DROP TABLE IF EXISTS `message_forum`;
CREATE TABLE IF NOT EXISTS `message_forum` (
  `id_MF` int(11) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_MF`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id_note` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id_recettes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `difficulty` varchar(30) NOT NULL,
  `realisation` text NOT NULL,
  `photo` varchar(255) DEFAULT 'defaultplat.jpg',
  PRIMARY KEY (`id_recettes`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id_recettes`, `nom`, `ingredients`, `difficulty`, `realisation`, `photo`) VALUES
(18, 'riz cantonnais', 'riz', 'medium', 'dzafafaf', NULL),
(13, 'pattes', 'pattes', 'hard', 'fezfefaefa', 'pattes.jpg'),
(16, 'riz cantonnais', 'riz,eau', 'easy', 'fzfeafeafaefae', NULL),
(17, 'riz cantonnais', 'riz,eau', 'easy', 'fzfeafeafaefae', NULL),
(19, 'riz cantonnais', 'riz', 'medium', 'dzafafaf', NULL),
(20, 'riz cantonnais', 'riz', 'medium', 'dzafafaf', NULL),
(21, 'riz cantonnais', 'riz', 'medium', 'dzafafaf', NULL),
(22, 'riz cantonnais', 'riz', 'medium', 'dzafafaf', NULL),
(23, 'riz cantonnais', 'riz', 'medium', 'dzafafaf', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(40) CHARACTER SET utf8 NOT NULL,
  `username` varchar(60) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `type` int(1) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_compte`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_compte`, `nom`, `prenom`, `username`, `email`, `type`, `password`, `date`, `avatar`) VALUES
(26, 'SECK', 'daniel', 'test', 'test@test.fr           ', 1, 'a16358be6e2306b153b1f071477e68837266075e', '2018-04-28 18:57:01', 'default.png'),
(28, 'SECK', 'daniel', 'caca', 'caca@hotmail.fr', 1, 'a16358be6e2306b153b1f071477e68837266075e', '2018-04-29 17:49:03', 'default.png'),
(23, 'SECK', 'daniel', 'vboydan', 'daniel.seck95@gmail.com', 1, 'a16358be6e2306b153b1f071477e68837266075e', '2018-04-25 12:32:38', 'default.png'),
(29, 'SECK', 'daniel', 'toto', 'tototo@hotmail.fr', 1, 'a16358be6e2306b153b1f071477e68837266075e', '2018-04-29 21:26:53', 'default.png'),
(27, 'admin', 'admin', 'admin', 'daniel-viet@hotmail.fr', 1, 'a16358be6e2306b153b1f071477e68837266075e', '2018-04-29 15:03:58', '27.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
