-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Ven 18 Juillet 2014 à 15:01
-- Version du serveur: 5.5.15
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `eureka_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `eur_admin`
--

CREATE TABLE IF NOT EXISTS `eur_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `eur_admin`
--

INSERT INTO `eur_admin` (`id`, `login`, `password`, `tel`) VALUES
(1, 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Structure de la table `eur_demandes`
--

CREATE TABLE IF NOT EXISTS `eur_demandes` (
  `idClient` int(11) NOT NULL,
  `ref_demande` varchar(256) CHARACTER SET utf8 NOT NULL,
  `nat_demande` varchar(255) NOT NULL,
  `descrip_demande` varchar(255) NOT NULL,
  `freq_demande` varchar(255) NOT NULL,
  `statut_demande` varchar(255) NOT NULL DEFAULT 'En attente',
  `date_demande` date NOT NULL,
  `date_upload` date NOT NULL,
  `date_download` date NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `emailC` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eur_demandes`
--

INSERT INTO `eur_demandes` (`idClient`, `ref_demande`, `nat_demande`, `descrip_demande`, `freq_demande`, `statut_demande`, `date_demande`, `date_upload`, `date_download`, `prix`, `url`, `emailC`) VALUES
(63, '2077', 'Information', 'simo ghrissi', 'Mensuelle', 'valide', '2014-05-21', '0000-00-00', '0000-00-00', '0', '', 'simoghrissi@gmail.com'),
(63, '6751', 'Information', 'je teste c tout', 'Imm?diate', 'valide', '2014-05-23', '0000-00-00', '0000-00-00', '0', '', 'simoghrissi@gmail.com'),
(0, '18171', ' CV', 'test 23-05', 'Imm?diate', 'valide', '2014-05-23', '0000-00-00', '0000-00-00', '0', '', 'zineb@hotmail.com'),
(0, '28016', ' CV', 'teste 2', 'Imm?diate', 'valide', '2014-05-23', '0000-00-00', '0000-00-00', '0', '', 'zineb@hotmail.com'),
(65, '29570', ' CV', 'un truc ', 'Imm?diate', 'valide', '2014-05-23', '0000-00-00', '0000-00-00', '0', '', 'zineb@hotmail.com'),
(65, '7039', ' CV', 'test modifier', 'Imm?diate', 'valide', '2014-05-23', '0000-00-00', '0000-00-00', '0', '', 'zineb@hotmail.com'),
(10, '19178', ' CV', 'zzz', 'Imm?diate', 'valide', '2014-06-06', '0000-00-00', '0000-00-00', '0', '', 'regis92130@gmail.com'),
(10, '23547', ' CV', 'e', 'Imm?diate', 'valide', '2014-06-06', '0000-00-00', '0000-00-00', '0', '', 'regis92130@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `eur_factures`
--

CREATE TABLE IF NOT EXISTS `eur_factures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raison` varchar(255) NOT NULL,
  `ref_demande` varchar(255) NOT NULL,
  `nat_demande` varchar(255) NOT NULL,
  `mois_demande` date NOT NULL,
  `quantite` int(255) NOT NULL,
  `prix_total` decimal(10,0) NOT NULL,
  `ref_facture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `eur_factures`
--

INSERT INTO `eur_factures` (`id`, `raison`, `ref_demande`, `nat_demande`, `mois_demande`, `quantite`, `prix_total`, `ref_facture`) VALUES
(1, 'Pluton', 'P4X-958', 'CV', '0000-00-00', 15, '3000', ''),
(2, 'Pluton', 'P6Y-923', 'Lettre de motivation', '0000-00-00', 10, '30', ''),
(3, 'Pluton', 'P6G-892', 'Autre', '0000-00-00', 5, '42', ''),
(4, 'Luthorcorp', '', 'CV', '0000-00-00', 1, '0', ''),
(5, 'Luthorcorp', 'cap.jpg', 'Synthèse', '0000-00-00', 1, '0', ''),
(6, 'Luthorcorp', 'cap2.jpg', 'Synthèse', '0000-00-00', 1, '0', ''),
(7, 'Luthorcorp', 'cap3.jpg', 'CV', '0000-00-00', 1, '0', ''),
(8, 'Luthorcorp', 'cap4.jpg', 'CV', '0000-00-00', 1, '0', ''),
(9, 'Luthorcorp', 'cf-contact.jpg', 'CV', '0000-00-00', 1, '0', ''),
(10, 'Luthorcorp', 'cf-ies.jpg', 'CV', '0000-00-00', 1, '0', ''),
(11, 'Luthorcorp', 'logo.png', 'CV', '0000-00-00', 1, '0', ''),
(12, 'Luthorcorp', 'srh-ies.jpg', 'CV', '0000-00-00', 1, '0', ''),
(13, 'Luthorcorp', 'srh-ies.jpg', 'CV', '0000-00-00', 1, '0', ''),
(14, 'Luthorcorp', 'srh-ies.jpg', 'CV', '0000-00-00', 1, '0', ''),
(15, 'Luthorcorp', 'srh-os.jpg', 'CV', '0000-00-00', 1, '0', ''),
(16, 'Luthorcorp', 'srh-os.jpg', 'CV', '0000-00-00', 1, '0', ''),
(17, 'Luthorcorp', 'image200.jpg', 'Information', '0000-00-00', 1, '50', ''),
(18, 'Luthorcorp', 'cap.jpg', 'Forfait CVs', '0000-00-00', 1, '600', ''),
(19, 'grana sa', 'ERREURS-WINDOWS.txt', 'Suivi site', '0000-00-00', 1, '800', ''),
(20, 'Liber8', 'cf-of.jpg', 'CV', '0000-00-00', 1, '0', ''),
(21, 'Liber8', 'logo.png', 'CV', '0000-00-00', 1, '0', ''),
(22, 'Liber8', 'logo-sit.png', 'CV', '0000-00-00', 1, '0', ''),
(23, 'Liber8', 'logo-vit.png', 'CV', '0000-00-00', 1, '0', ''),
(24, 'Liber8', 'vit-ies.jpg', 'Information', '0000-00-00', 1, '50', ''),
(25, 'Liber8', 'vit-os.jpg', 'CV', '0000-00-00', 1, '0', ''),
(26, '', 'ils329.pdf', 'CV', '0000-00-00', 1, '0', ''),
(27, 'Liber8', 'cours.jpg', 'CV', '0000-00-00', 1, '0', ''),
(28, 'SA POMMIER', 'Collines.jpg', 'CV', '0000-00-00', 1, '0', '');

-- --------------------------------------------------------

--
-- Structure de la table `eur_formes_juridiques`
--

CREATE TABLE IF NOT EXISTS `eur_formes_juridiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `eur_formes_juridiques`
--

INSERT INTO `eur_formes_juridiques` (`id`, `nom`) VALUES
(1, 'SA'),
(2, 'SARL'),
(3, 'SAS(U)'),
(4, 'SCOP'),
(5, 'SCP'),
(6, 'SNC'),
(7, 'Société civile'),
(8, 'Société de fait'),
(9, 'Société en participation'),
(10, 'Profession libérale'),
(11, 'Auto entreprise'),
(12, 'EIRL'),
(13, 'EURL'),
(14, 'Libéral en association'),
(15, 'Association'),
(16, 'GIE'),
(17, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `eur_frequences`
--

CREATE TABLE IF NOT EXISTS `eur_frequences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `eur_frequences`
--

INSERT INTO `eur_frequences` (`id`, `nom`) VALUES
(1, 'Immédiate'),
(2, 'Hebdomadaire'),
(3, 'Mensuelle'),
(4, 'Trimestrielle'),
(5, 'Semestrielle'),
(6, 'Annuelle');

-- --------------------------------------------------------

--
-- Structure de la table `eur_statuts`
--

CREATE TABLE IF NOT EXISTS `eur_statuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `eur_statuts`
--

INSERT INTO `eur_statuts` (`id`, `nom`) VALUES
(1, 'Client'),
(2, 'Prospect'),
(3, 'Abonné newsletter');

-- --------------------------------------------------------

--
-- Structure de la table `eur_tarifs`
--

CREATE TABLE IF NOT EXISTS `eur_tarifs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `eur_tarifs`
--

INSERT INTO `eur_tarifs` (`id`, `nom_service`, `prix`) VALUES
(1, ' CV', 400),
(2, 'Forfait CVs', 600),
(3, 'Information', 50),
(4, 'Synthèse', 90),
(5, 'Suivi site', 800);

-- --------------------------------------------------------

--
-- Structure de la table `eur_users`
--

CREATE TABLE IF NOT EXISTS `eur_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(255) NOT NULL,
  `forme` varchar(255) NOT NULL,
  `raison` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `portable` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `clé` varchar(32) NOT NULL,
  `active` binary(1) NOT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `eur_users`
--

INSERT INTO `eur_users` (`id`, `statut`, `forme`, `raison`, `nom`, `prenom`, `email`, `tel`, `portable`, `fax`, `password`, `clé`, `active`, `date_inscription`) VALUES
(1, 'Admin', '', 'ADMIN', 'Pietri', 'Régis', 'admin', 0, 0, 0, 'yop', '', '\0', '0000-00-00 00:00:00'),
(2, 'Prospect', 'GIE', 'Pluton', 'Kent', 'Jean', 'blueskyerlsc_2005@hotmail.com', 0, 0, 0, 'leaf', '', '\0', '0000-00-00 00:00:00'),
(3, 'Client', 'SA', 'sgg', 'aewrr', 'dfdbb', 'dadsg@fsdg.com', 2147483647, 0, 0, '123456', '', '\0', '0000-00-00 00:00:00'),
(4, 'Client', 'SA', 'sgg', 'aewrr', 'dfdbb', 'dadsgfsdg.com', 2147483647, 0, 0, '123456', '', '\0', '0000-00-00 00:00:00'),
(6, 'Prospect', 'Société de fait', 'SSCI Lol', 'Goufre', 'Laurent', 'francoisho@free.fr', 0, 0, 0, 'pouet', '', '\0', '0000-00-00 00:00:00'),
(7, 'Client', 'Association', 'JonathanSARL', 'monthezume', 'jonathan', 'monthezume-jonathan@hotmail.fr', 610907772, 0, 0, 'david971', '', '\0', '0000-00-00 00:00:00'),
(9, 'Client', 'SA', 'grana sa', 'granarolo2', 'regis2', 'regis.granarolo@gmail.com', 123456789, 0, 0, 'aaaaaa', '', '\0', '0000-00-00 00:00:00'),
(10, 'Client', 'SARL', 'EUREKA', 'Granarolo', 'Régis', 'regis92130@gmail.com', 123456789, 0, 0, 'aaaaaa', '', '\0', '0000-00-00 00:00:00'),
(11, 'Client', 'toujours', '', '', '', 'simoghrissi@gmail.com', 0, 0, 0, 'simoghrissi', '753e4fecbebe58f2d8134df1656f1cc0', '\0', '2014-06-06 17:10:30');

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `file_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idClient` int(11) NOT NULL,
  `refDemande` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `file`
--

INSERT INTO `file` (`id`, `name`, `file_url`, `idClient`, `refDemande`) VALUES
(1, 'stage 1.pdf', 'file/stage 1.pdf', 0, 0),
(2, 'uploadgpl.txt', 'file/uploadgpl.txt', 63, 0),
(3, 'desription_detaille_projets2014.pdf', 'file/desription_detaille_projets2014.pdf', 63, 0),
(4, 'desription_detaille_projets2014.pdf', 'file/desription_detaille_projets2014.pdf', 2, 0),
(5, 'stage 1.pdf', 'file/stage 1.pdf', 63, 2077),
(6, 'stage 1.pdf', 'file/stage 1.pdf', 10, 23547);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
