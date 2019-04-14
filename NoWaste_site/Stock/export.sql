-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 11 avr. 2019 à 09:09
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `cineflix_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `Actor`
--

CREATE TABLE `Actor` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Movie`
--

CREATE TABLE `Movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` float NOT NULL,
  `releaseDate` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Movie`
--

INSERT INTO `Movie` (`id`, `title`, `duration`, `releaseDate`, `description`) VALUES
(1, 'Captain Marvel', 125, '2019-03-06', 'Une superhéroïne chargée de sauver la destinée de la Terre...'),
(3, 'Captain Marvel', 125, '2019-03-06', 'Une superhéroïne chargée de sauver la destinée de la Terre...'),
(4, 'Captain Marvel', 125, '2019-03-06', 'Une superhéroïne chargée de sauver la destinée de la Terre...'),
(5, 'Captain Marvel', 125, '2019-03-06', 'Une superhéroïne chargée de sauver la destinée de la Terre...');

-- --------------------------------------------------------

--
-- Structure de la table `MovieActor`
--

CREATE TABLE `MovieActor` (
  `id_movie` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Actor`
--
ALTER TABLE `Actor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `MovieActor`
--
ALTER TABLE `MovieActor`
  ADD PRIMARY KEY (`id_movie`,`id_actor`),
  ADD KEY `fk_actor` (`id_actor`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Actor`
--
ALTER TABLE `Actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Movie`
--
ALTER TABLE `Movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `MovieActor`
--
ALTER TABLE `MovieActor`
  ADD CONSTRAINT `fk_actor` FOREIGN KEY (`id_actor`) REFERENCES `Actor` (`id`),
  ADD CONSTRAINT `fk_movie` FOREIGN KEY (`id_movie`) REFERENCES `Movie` (`id`);
