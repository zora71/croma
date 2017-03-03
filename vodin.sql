-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Mars 2017 à 13:41
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vodin`
--
CREATE DATABASE IF NOT EXISTS `vodin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vodin`;

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

DROP TABLE IF EXISTS `platforms`;
CREATE TABLE `platforms` (
  `idPlatform` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `platforms`
--

INSERT INTO `platforms` (`idPlatform`, `label`, `url`, `actif`) VALUES
(1, 'youtube', 'www.youtube.com', 0),
(2, 'dailymotion', 'www.dailymotion.com', 1),
(3, 'twitch', 'www.twitch.tv', 1);

-- --------------------------------------------------------

--
-- Structure de la table `styles`
--

DROP TABLE IF EXISTS `styles`;
CREATE TABLE `styles` (
  `idStyle` int(11) NOT NULL,
  `fileName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `styles`
--

INSERT INTO `styles` (`idStyle`, `fileName`) VALUES
(1, 'green.css'),
(2, 'black.css'),
(6, 'red.css'),
(7, 'green.css'),
(8, 'white.css'),
(9, 'boutonrd.css');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `uuid` varchar(250) NOT NULL,
  `emailValid` tinyint(1) DEFAULT '1',
  `lastConnexion` datetime NOT NULL,
  `password` varchar(100) NOT NULL,
  `pwdToken` varchar(100) NOT NULL,
  `setting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `pseudo`, `email`, `avatar`, `uuid`, `emailValid`, `lastConnexion`, `password`, `pwdToken`, `setting`) VALUES
(83, 'amar', 'zora', 'zora', 'z@gmail.fr', '', 'f96b6ab5-82a7-4f85-f84a-a3848740a50b', 0, '2017-03-02 09:53:00', '$2y$10$FnDcEiF.0CyepIw5HWEiFOK9g3StOdVWifJeToM.NvPkSgkMsdfFO', '', ''),
(88, 'cuda', 'isabelle', 'isa', 'isa@gmail.fr', '', '70a9a4e1-9b39-4135-f682-5871152fb323', 0, '2017-03-02 09:56:32', '$2y$10$cdgS1lcaKg3ZGkwStoBQXuyxlqJs5qfIXkPKW4ngXLpJERrXXw0Vq', '', ''),
(89, 'ramenatte', 'david', 'doudou', 'david.ramenatte@gmail.com', '', 'c024dad4-d34c-40b4-e11f-6e748694d87f', 1, '2017-03-03 13:05:26', '$2y$10$robHnb7lXxwPBU2Y//0sduqY4EKcXMk6W7A0P4ScVhkQoAlB1B/xm', '', ''),
(91, 'allioui', 'hatim', 'hatim', 'ha@mail.fr', '', '4a788c56-2b74-4fe9-e52f-8efb75c54a2a', 0, '0000-00-00 00:00:00', '$2y$10$j2QR8hD2SRVkUb/aha003ORXddxo3L/m3fs.18a0F2eZPylDAFqOy', '', ''),
(92, '', '', '752cc31f-8200-4473-de70-7f7aa6392be9', '752cc31f-8200-4473-de70-7f7aa6392be9', '', '752cc31f-8200-4473-de70-7f7aa6392be9', 1, '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users_platforms`
--

DROP TABLE IF EXISTS `users_platforms`;
CREATE TABLE `users_platforms` (
  `id` int(11) NOT NULL,
  `idPlatform` int(11) NOT NULL,
  `apiKey` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`idPlatform`);

--
-- Index pour la table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`idStyle`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `users_platforms`
--
ALTER TABLE `users_platforms`
  ADD KEY `idUser` (`id`),
  ADD KEY `idPlatform` (`idPlatform`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `idPlatform` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `styles`
--
ALTER TABLE `styles`
  MODIFY `idStyle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users_platforms`
--
ALTER TABLE `users_platforms`
  ADD CONSTRAINT `users_platforms_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_platforms_ibfk_2` FOREIGN KEY (`idPlatform`) REFERENCES `platforms` (`idPlatform`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
