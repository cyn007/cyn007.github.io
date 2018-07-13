-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 13 Juillet 2018 à 08:32
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'PRESENTATION'),
(2, 'PARTAGE MUSICAL'),
(3, 'CREATIONS');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `adresse_mail` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL,
  `moderateur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom`, `prenom`, `pseudo`, `motDePasse`, `adresse_mail`, `date_de_naissance`, `date_inscription`, `admin`, `moderateur`) VALUES
(1, 'dragon', 'ball', 'jordan23', 'jojo', 'Jordan@jojo.fr', '1989-07-12', '2018-07-12 13:06:15', 0, 0),
(2, 'Chevalier', 'Alexandre', 'Arthur', 'emmanuel', 'emmanuel@monprof.fr', '2008-07-19', '2018-07-05 09:42:29', 0, 0),
(3, 'De Riv', 'Geralt', 'witcher3', 'yennefer', 'cdprojeckt@red.fr', '1640-07-16', '2018-07-05 09:46:05', 0, 0),
(4, 'Noblet', 'Manon', 'Prinity', 'sharuman', 'manonprinity@sharuman.com', '1993-08-28', '2018-07-09 20:22:31', 0, 0),
(5, 'Chakir', 'Zaid', 'lebronjames', 'lakers', 'la@citedesanges.com', '1980-07-11', '2018-07-09 20:26:15', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `corp_message` text NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_membre` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `corp_message`, `date_message`, `id_membre`, `id_sujet`) VALUES
(1, 'Bonjour a tous', '2018-07-12 20:53:27', 1, 3),
(2, 'je me reponds a moi meme', '2018-07-12 21:17:26', 1, 3),
(3, 'partagez', '2018-07-12 22:02:04', 1, 4),
(4, 'encore', '2018-07-12 22:06:27', 1, 4),
(5, 'bonjour', '2018-07-12 22:08:52', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `message_prive`
--

CREATE TABLE `message_prive` (
  `id_message_prive` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message_prive`
--

INSERT INTO `message_prive` (`id_message_prive`, `id_expediteur`, `id_destinataire`, `message`) VALUES
(1, 1, 2, 'dsqdsqdq'),
(2, 2, 1, 'Bonjour jojo'),
(3, 4, 2, 'Hello WORLD');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `id_sujet` int(11) NOT NULL,
  `nom_sujet` varchar(255) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date_heure_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `nom_sujet`, `id_membre`, `id_categorie`, `date_heure_creation`) VALUES
(3, 'BONJOUR A TOUS', 1, 1, '2018-07-12 20:01:26'),
(4, 'PARTAGER !!!!!!', 1, 2, '2018-07-12 21:55:13');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `message_membre_FK` (`id_membre`),
  ADD KEY `message_sujet0_FK` (`id_sujet`);

--
-- Index pour la table `message_prive`
--
ALTER TABLE `message_prive`
  ADD PRIMARY KEY (`id_message_prive`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id_sujet`),
  ADD KEY `sujet_membre_FK` (`id_membre`),
  ADD KEY `sujet_categorie0_FK` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `message_prive`
--
ALTER TABLE `message_prive`
  MODIFY `id_message_prive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id_sujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_membre_FK` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`),
  ADD CONSTRAINT `message_sujet0_FK` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`);

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_categorie0_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `sujet_membre_FK` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
