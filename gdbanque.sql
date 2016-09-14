-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 14 Septembre 2016 à 18:16
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gdbanque`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `nomclient` varchar(255) NOT NULL,
  `prenomclient` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `datecreation` date NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idclient`, `nomclient`, `prenomclient`, `sexe`, `profession`, `datecreation`, `actif`) VALUES
(39, '   jon', '   snow', 'masculin', '   acteur', '2016-01-01', 1),
(40, 'Janvier', 'Jeanne', 'feminin', 'comptable', '2016-09-02', 1),
(41, ' DOSSOU', ' Damienne', 'feminin', ' caissiÃ¨re', '2016-01-01', 1),
(42, 'daSilva', 'Case', 'masculin', 'professeur', '2016-09-04', 1),
(45, 'Akoba', 'Damienne', 'feminin', 'couturiÃ¨re', '2016-09-03', 0),
(47, 'MAGENGO', 'Gutembert', 'masculin', 'informaticien', '2016-06-08', 1),
(48, 'Mandelai', 'Magengo', 'masculin', 'couturier', '1970-01-01', 1),
(49, '  Toto', '  Jaja', 'masculin', '  cultivateur', '2016-01-01', 1),
(51, 'Fort', 'Boyard', 'masculin', 'joueur', '2016-01-01', 1),
(53, 'Djangoli', 'Mandelai', 'masculin', 'poussepousseur', '2016-01-01', 0),
(54, 'Jean', 'jacques', 'masculin', 'ouvrier', '2016-01-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `idcompte` int(11) NOT NULL AUTO_INCREMENT,
  `montcrediter` double NOT NULL,
  `montdebiter` double NOT NULL,
  `solde` double NOT NULL,
  `dateupdate` date NOT NULL,
  `idclient` int(11) NOT NULL,
  `numerocompte` varchar(25) NOT NULL,
  PRIMARY KEY (`idcompte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`idcompte`, `montcrediter`, `montdebiter`, `solde`, `dateupdate`, `idclient`, `numerocompte`) VALUES
(33, 2000, 2000, 5800, '2016-01-01', 39, '10000000001'),
(35, 0, 0, 5000000, '2016-09-02', 41, '10000000003'),
(36, 0, 0, 6300054, '2016-09-09', 42, '10000000004'),
(39, 0, 0, 2258666464, '2016-09-02', 45, '10000000008'),
(41, 0, 0, 0, '0000-00-00', 39, '10000000009'),
(42, 500000, 75000, 490000, '2016-09-13', 47, '10024607280'),
(43, 5000, 2500, 2500, '2016-09-13', 48, '67684185000'),
(44, 0, 0, 0, '0000-00-00', 49, '67684185003'),
(48, 0, 0, 0, '0000-00-00', 53, '2016186025970'),
(49, 5400, 9900, 491500, '1970-01-01', 54, '2016964909393'),
(50, 0, 0, 0, '0000-00-00', 51, '2016158252258'),
(51, 0, 0, 0, '0000-00-00', 51, '2016861771667');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `numerocompte` varchar(25) NOT NULL,
  `transaction` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `montant` double NOT NULL,
  `solde` double NOT NULL,
  PRIMARY KEY (`id_transaction`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id_transaction`, `idclient`, `numerocompte`, `transaction`, `date`, `montant`, `solde`) VALUES
(1, 54, '2016964909393', 'credit', '2016-01-01', 500000, 500000),
(2, 54, '2016964909393', 'credit', '2016-09-01', 2500, 502500),
(3, 54, '2016964909393', 'credit', '2016-09-05', 5400, 507900),
(4, 54, '2016964909393', 'debit', '1970-01-01', 6500, 514400),
(5, 54, '2016964909393', 'debit', '1970-01-01', 9900, 511300),
(6, 39, '10000000001', 'debit', '2016-01-01', 2200, 6200),
(7, 39, '10000000001', 'credit', '2016-09-01', 4000, 5800),
(8, 39, '10000000001', 'debit', '1970-01-01', 2000, 7800),
(9, 39, '10000000001', 'credit', '2016-01-01', 2000, 5800);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nomuser` varchar(255) NOT NULL,
  `prenomuser` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `nomuser`, `prenomuser`, `type`, `pass`) VALUES
(2, 'jean', 'jacques', 'user', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(3, 'Dossou', 'Israel', 'admin', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(4, 'Kegnide', 'Farid', 'admin', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(6, 'Joe', 'Jonas', 'user', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(7, 'Kendall', 'Jenner', 'user', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(8, 'Kim', 'Kardashian', 'user', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(9, 'john', 'kennedy', 'user', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(10, 'Robert', 'MOLI', 'user', 'cdab85587ed770dab74636fec91f740f46b773be');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
