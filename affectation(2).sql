-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 23 Janvier 2022 à 17:44
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `affectation`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE IF NOT EXISTS `affectation` (
  `Id_affect` int(2) NOT NULL AUTO_INCREMENT,
  `Id_agent` int(2) NOT NULL,
  `Id_poste` int(2) NOT NULL,
  PRIMARY KEY (`Id_affect`),
  KEY `ID Agent_2` (`Id_agent`),
  KEY `ID Poste` (`Id_poste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `id_agent` int(2) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Statut` varchar(10) NOT NULL,
  PRIMARY KEY (`id_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `Username`, `Nom`, `Prenom`, `Mobile`, `Statut`) VALUES
(1, 'aimenkara', 'karkar', 'aimen', 776707070, 'actif'),
(2, 'ahmednadjib', 'annane', 'nadjib', 555555555, 'actif'),
(3, 'abdkorab', 'korabi', 'abderahmane', 770077007, 'actif'),
(4, 'roujamiri', 'amiri', 'mohamed', 557755775, 'actif');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE IF NOT EXISTS `poste` (
  `id_poste` int(2) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Role` varchar(20) NOT NULL,
  PRIMARY KEY (`id_poste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `Designation`, `Role`) VALUES
(1, 'jeu1', 'Jeu'),
(2, 'entree1', 'Entree'),
(3, 'chfr', 'chauffeur'),
(4, 'cft', 'cafetier');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affect_agent` FOREIGN KEY (`Id_agent`) REFERENCES `agent` (`id_agent`),
  ADD CONSTRAINT `affect_poste` FOREIGN KEY (`Id_poste`) REFERENCES `poste` (`Id_poste`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
