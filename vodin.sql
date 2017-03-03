-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Mars 2017 à 17:23
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
DROP DATABASE IF EXISTS `vodin`;
CREATE DATABASE `vodin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vodin`;

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--


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


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `createDate` datetime NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `uuid` varchar(250) NOT NULL,
  `emailValid` tinyint(1) DEFAULT '0',
  `emailToken` varchar(100) NOT NULL,
  `lastConnexion` datetime NOT NULL,
  `password` varchar(100) NOT NULL,
  `pwdToken` varchar(100) NOT NULL,
  `settings` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `pseudo`, `email`, `createDate`, `avatar`, `uuid`, `emailValid`, `emailToken`, `lastConnexion`, `password`, `pwdToken`, `settings`) VALUES
(88, 'cuda', 'isabelle', 'isa', 'isa@gmail.fr', '0000-00-00 00:00:00', '', '70a9a4e1-9b39-4135-f682-5871152fb323', 1, '', '2017-03-03 16:55:40', '$2y$10$cdgS1lcaKg3ZGkwStoBQXuyxlqJs5qfIXkPKW4ngXLpJERrXXw0Vq', '', ''),
(89, 'ramenatte', 'david', 'doudou', 'david.ramenatte@gmail.com', '0000-00-00 00:00:00', '', 'c024dad4-d34c-40b4-e11f-6e748694d87f', 1, '', '2017-03-03 13:05:26', '$2y$10$robHnb7lXxwPBU2Y//0sduqY4EKcXMk6W7A0P4ScVhkQoAlB1B/xm', '', ''),
(102, 'amar', 'zora', 'zora', 'zora.amar71@gmail.com', '2017-03-06 16:11:31', '', 'd229fc3e-34d9-4982-9707-d9e57bae998f', 1, '', '2017-03-06 16:11:31', '$2y$10$ZJ9FA5IurH5lf/B5FQkb4eLf7x8LaFMYRfaJybY6SiJ4pz4hqOL4a', '', 'a:4:{s:6:"layout";s:4:"left";s:7:"youtube";s:7:"youtube";s:6:"twitch";s:6:"twitch";s:6:"btnSub";s:7:"Validez";}'),
(103, '', '', '14021061-56da-4298-e7f3-a1d38603786b', '14021061-56da-4298-e7f3-a1d38603786b', '0000-00-00 00:00:00', '', '14021061-56da-4298-e7f3-a1d38603786b', 0, '', '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users_platforms`
--


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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users_platforms`
--
ALTER TABLE `users_platforms`
  ADD CONSTRAINT `users_platforms_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_platforms_ibfk_2` FOREIGN KEY (`idPlatform`) REFERENCES `platforms` (`idPlatform`) ON UPDATE CASCADE;

DELIMITER $$
--
-- Événements
--
DROP EVENT `delusers`$$
CREATE DEFINER=`root`@`localhost` EVENT `delusers` ON SCHEDULE EVERY 2 WEEK STARTS '2017-03-03 15:27:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
DELETE FROM users_platforms
WHERE id= (SELECT id FROM users
		   WHERE datediff( now(), lastConnexion)>30);
DELETE FROM users
WHERE datediff( now(), lastConnexion)>30;

END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
