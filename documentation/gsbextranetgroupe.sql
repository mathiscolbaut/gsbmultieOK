-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 22 nov. 2022 à 18:37
-- Version du serveur : 10.3.36-MariaDB-0+deb10u2
-- Version de PHP : 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gsbextranetgroupe`
--

-- --------------------------------------------------------

--
-- Structure de la table `etatSite`
--

CREATE TABLE `etatSite` (
  `infoSite` varchar(20) NOT NULL,
  `valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etatSite`
--

INSERT INTO `etatSite` (`infoSite`, `valeur`) VALUES
('maintenance', 0);

-- --------------------------------------------------------

--
-- Structure de la table `historiqueconnexion`
--

CREATE TABLE `historiqueconnexion` (
  `idMedecin` int(11) NOT NULL,
  `dateDebutLog` datetime NOT NULL,
  `dateFinLog` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historiqueconnexion`
--

INSERT INTO `historiqueconnexion` (`idMedecin`, `dateDebutLog`, `dateFinLog`) VALUES
(7, '2022-10-06 17:30:30', NULL),
(7, '2022-10-06 17:34:48', NULL),
(7, '2022-10-06 17:40:03', NULL),
(7, '2022-10-06 17:40:48', NULL),
(7, '2022-10-06 17:41:04', NULL),
(7, '2022-10-06 18:15:07', NULL),
(7, '2022-10-06 18:17:32', NULL),
(7, '2022-10-06 18:18:19', NULL),
(7, '2022-10-06 18:19:18', NULL),
(7, '2022-10-06 18:28:21', NULL),
(7, '2022-10-06 18:31:59', NULL),
(7, '2022-10-06 18:35:00', NULL),
(7, '2022-10-06 18:36:22', NULL),
(7, '2022-10-06 18:39:06', NULL),
(7, '2022-10-06 18:53:53', NULL),
(7, '2022-10-06 19:00:30', NULL),
(7, '2022-10-06 19:02:57', NULL),
(7, '2022-10-06 19:22:20', NULL),
(7, '2022-10-06 19:23:03', NULL),
(7, '2022-10-06 19:27:53', NULL),
(7, '2022-10-06 19:28:12', NULL),
(8, '2022-10-06 17:31:04', NULL),
(8, '2022-10-06 18:07:11', NULL),
(8, '2022-10-06 18:08:40', NULL),
(8, '2022-10-06 18:22:01', NULL),
(8, '2022-10-06 18:22:48', NULL),
(8, '2022-10-06 18:24:00', NULL),
(8, '2022-10-06 18:25:12', NULL),
(8, '2022-10-06 18:27:13', NULL),
(8, '2022-10-06 18:27:36', NULL),
(8, '2022-10-06 18:28:00', NULL),
(8, '2022-10-07 13:24:19', NULL),
(8, '2022-10-07 13:36:28', NULL),
(8, '2022-10-07 13:37:08', NULL),
(8, '2022-10-07 13:39:28', NULL),
(8, '2022-10-07 13:40:41', NULL),
(8, '2022-10-07 13:42:49', NULL),
(8, '2022-10-07 16:50:40', NULL),
(8, '2022-10-07 16:58:48', NULL),
(8, '2022-10-07 17:05:29', NULL),
(8, '2022-10-25 12:17:58', NULL),
(8, '2022-10-25 12:22:17', NULL),
(8, '2022-11-17 11:25:24', NULL),
(8, '2022-11-17 12:02:45', NULL),
(8, '2022-11-17 12:03:33', NULL),
(8, '2022-11-22 09:29:47', NULL),
(8, '2022-11-22 12:16:15', NULL),
(8, '2022-11-22 13:11:48', NULL),
(8, '2022-11-22 14:45:28', NULL),
(9, '2022-10-06 17:30:34', NULL),
(9, '2022-10-06 17:42:21', NULL),
(9, '2022-10-25 12:18:37', NULL),
(10, '2022-10-06 17:33:34', NULL),
(11, '2022-10-19 14:20:40', NULL),
(11, '2022-10-19 14:22:30', NULL),
(11, '2022-10-19 14:24:11', NULL),
(11, '2022-10-19 15:34:13', NULL),
(12, '2022-10-19 17:33:40', NULL),
(13, '2022-11-15 19:28:31', NULL),
(13, '2022-11-15 19:30:30', NULL),
(13, '2022-11-15 20:56:43', NULL),
(13, '2022-11-15 21:04:32', NULL),
(13, '2022-11-15 21:07:42', NULL),
(13, '2022-11-15 21:24:15', NULL),
(13, '2022-11-15 21:25:11', NULL),
(13, '2022-11-16 15:28:15', NULL),
(13, '2022-11-16 21:40:23', NULL),
(13, '2022-11-16 21:42:08', NULL),
(13, '2022-11-16 21:42:42', NULL),
(13, '2022-11-16 21:47:25', NULL),
(13, '2022-11-22 16:39:32', NULL),
(13, '2022-11-22 16:43:00', NULL),
(14, '2022-11-15 21:02:08', NULL),
(14, '2022-11-15 21:15:24', NULL),
(14, '2022-11-15 21:18:43', NULL),
(14, '2022-11-15 22:32:11', NULL),
(14, '2022-11-15 22:34:50', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `motDePasse` varchar(256) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `rpps` varchar(10) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `tokenDate` datetime DEFAULT NULL,
  `dateDiplome` date DEFAULT NULL,
  `dateConsentement` date DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `tokenValidationMedecin` varchar(50) DEFAULT NULL,
  `otp` int(6) DEFAULT NULL,
  `tempOTP` datetime DEFAULT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `mail`, `dateNaissance`, `motDePasse`, `dateCreation`, `rpps`, `token`, `tokenDate`, `dateDiplome`, `dateConsentement`, `valide`, `tokenValidationMedecin`, `otp`, `tempOTP`, `idRole`) VALUES
(7, 'colbaut', 'mathis', 'mathiscolbaut@gmail.com', NULL, '$2y$10$IlXTnSri7C3u0RPmFeAy7u0dJ9zpnmhlKNcMMhBXbCqPAvHLVB8X.', '2022-10-06 14:45:07', NULL, NULL, '0000-00-00 00:00:00', NULL, '2022-10-06', NULL, NULL, 597010, '2022-10-06 19:28:04', 5),
(8, 'BECQUAERT', 'Rémi', 'remi.becquaert35@gmail.com', NULL, '$2y$10$SYD3JRSiF2ph1PKl.wEuL.yrxdGd.WLxVVRjVlJyGsv3KTOQg3mhK', '2022-10-06 15:10:55', NULL, NULL, '0000-00-00 00:00:00', NULL, '2022-10-06', NULL, NULL, 256799, '2022-11-22 14:45:19', 4),
(9, 'BECQUAERT', 'Rémi', 'remi@gmail.com', NULL, '$2y$10$RSdvHQso6fLHVe7B4XdM0e8GqCGCox.2AG8mHKhnXvLjQI6gBuTz6', '2022-10-06 15:23:29', NULL, NULL, '0000-00-00 00:00:00', NULL, '2022-10-06', NULL, NULL, 103084, NULL, 4),
(10, 'fej', 'afja', 'test@gmail.com', NULL, '$2y$10$9ekWHpTw8VMQx5WrkL3QbegMjswepeZ9ufJFUyE1NpBvy22yMrCKW', '2022-10-06 17:33:34', NULL, NULL, '0000-00-00 00:00:00', NULL, '2022-10-06', NULL, NULL, NULL, NULL, 1),
(11, 'MATHON', 'Chloé', 'oldChloee', NULL, '$2y$10$X.JjTFzQyOzrr.XExZfHB.3SAM1zToIA7He5bbMPPZClVmjpCHOnu', '2022-10-17 14:20:40', NULL, NULL, '2022-10-19 17:15:50', NULL, '2022-10-19', NULL, NULL, 401816, '2022-11-15 19:26:52', 1),
(12, 'MAthon2', 'Chloé', 'oldChloe', NULL, '$2y$10$1MWUs/QD4aL0mu9Tf.t5MOxCVBOnAaoOiYgqDf7IGUmmcB1ZdcV86', '2022-10-19 17:30:40', NULL, NULL, '2022-11-15 19:12:12', NULL, '2022-10-19', NULL, NULL, 321629, '2022-11-15 19:25:20', 5),
(13, 'MATHON', 'Chloé', 'chloe.mathn@gmail.com', NULL, '$2y$10$TijePX7DrIUwDSk0pPiYr.3XtJ15NmBFJJ0Cf..QEaT4lwKju7JmK', '2022-11-15 19:28:05', NULL, NULL, '2022-11-15 19:28:05', NULL, '2022-11-15', 1, NULL, 382579, '2022-11-22 16:42:51', 5),
(14, 'MATHON', 'ChloéValidateur', 'chloemathn@gmail.com', NULL, '$2y$10$TijePX7DrIUwDSk0pPiYr.3XtJ15NmBFJJ0Cf..QEaT4lwKju7JmK', '2022-11-15 19:28:05', NULL, NULL, '2022-11-15 21:01:33', NULL, '2022-11-15', 1, 'arkT7Kqj0JbhlYv0Yknn', 230492, '2022-11-15 22:34:41', 3),
(15, 'BECQUAERT', 'Rémi', 'remi.becquaert@outlook.fr', NULL, '$2y$10$izQMeGppbOGdrbJ3R9tGr.xqRs.VH8y3Th2m0O4Qxl4qWHutoU0BK', '2022-11-17 11:56:56', NULL, '3wZAJuDxGjsxaihvDpQj', '2022-11-17 11:56:56', NULL, '2022-11-17', 1, NULL, NULL, NULL, 5),
(16, 'Test', 'Rémi', 'remi.test@gmail.com', NULL, '$2y$10$yqnjtfNrANid/7GGue04ZOmM4FmSacp89qltzz0/fpoII/FI/CoSu', '2022-11-17 12:03:57', NULL, 'iUPkwezRg7sEio45sgGm', '2022-11-17 12:03:57', NULL, '2022-11-17', NULL, NULL, NULL, NULL, 5),
(17, 'JeSuisLe', 'Medecin', 'medecin.test@test.fr', NULL, '$2y$10$QjxZT4/KA0dNY1kwg/jzieEcTkgOBcDDjGwSzPBMHCsCfGhcGCd7G', '2022-11-22 18:29:28', NULL, 'KnAli0h4WTr5r7n5qj33', '2022-11-22 18:29:28', NULL, '2022-11-22', NULL, NULL, NULL, NULL, 1),
(18, 'JeSuisLeValidateur', '', 'validateur.test@test.fr', NULL, '$2y$10$QjxZT4/KA0dNY1kwg/jzieEcTkgOBcDDjGwSzPBMHCsCfGhcGCd7G', '2022-11-15 19:28:05', NULL, NULL, '2022-11-15 21:01:33', NULL, '2022-11-15', 1, 'arkT7Kqj0JbhlYv0Yknn', 230492, '2022-11-15 22:34:41', 3),
(19, 'JeSuisLeModerateur', '', 'moderateur.test@test.fr', NULL, '$2y$10$QjxZT4/KA0dNY1kwg/jzieEcTkgOBcDDjGwSzPBMHCsCfGhcGCd7G', '2022-11-15 19:28:05', NULL, NULL, '2022-11-15 21:01:33', NULL, '2022-11-15', 1, 'arkT7Kqj0JbhlYv0Yknn', 230492, '2022-11-15 22:34:41', 2),
(20, 'JeSuisLeChefProduit', '', 'chefproduitt.test@test.fr', NULL, '$2y$10$QjxZT4/KA0dNY1kwg/jzieEcTkgOBcDDjGwSzPBMHCsCfGhcGCd7G', '2022-11-15 19:28:05', NULL, NULL, '2022-11-15 21:01:33', NULL, '2022-11-15', 1, 'arkT7Kqj0JbhlYv0Yknn', 230492, '2022-11-15 22:34:41', 4),
(21, 'JeSuisLeAdmin', '', 'admin.test@test.fr', NULL, '$2y$10$QjxZT4/KA0dNY1kwg/jzieEcTkgOBcDDjGwSzPBMHCsCfGhcGCd7G', '2022-11-15 19:28:05', NULL, NULL, '2022-11-15 21:01:33', NULL, '2022-11-15', 1, 'arkT7Kqj0JbhlYv0Yknn', 230492, '2022-11-15 22:34:41', 5);

-- --------------------------------------------------------

--
-- Structure de la table `medecinproduit`
--

CREATE TABLE `medecinproduit` (
  `idMedecin` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `medecinvisio`
--

CREATE TABLE `medecinvisio` (
  `idMedecin` int(11) NOT NULL,
  `idVisio` int(11) NOT NULL,
  `dateInscription` date NOT NULL,
  `avis` text DEFAULT NULL,
  `tokenAvis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medecinvisio`
--

INSERT INTO `medecinvisio` (`idMedecin`, `idVisio`, `dateInscription`, `avis`, `tokenAvis`) VALUES
(7, 8, '2022-11-16', 'Cool', 'sss'),
(8, 8, '2022-11-16', 'J ai adoré symphony', ''),
(13, 8, '2022-11-16', 'J ai adoré ce TP !!', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `idOperation` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `actionDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`idOperation`, `idProduit`, `idUser`, `ip`, `actionDesc`) VALUES
(2, 3, 13, '127.0.0.1', ' visionnage du produit'),
(3, 3, 13, '127.0.0.1', ' création d\'uns produit'),
(4, 6, 13, '127.0.0.1', ' modification du produit');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `objectif` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `information` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `effetIndesirable` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `objectif`, `information`, `effetIndesirable`, `photo`) VALUES
(3, 'Doliprane', 'test', 'c', 'd', NULL),
(4, 'Aprazolam2', 'Réduire l\'anxiété', 'Accro si trop grande prise', 'Dépéndance, Somnolances', NULL),
(6, 'Seroplex', 'Antidepresseurs', 'Aucune', 'Dependances', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roleSite`
--

CREATE TABLE `roleSite` (
  `id` int(11) NOT NULL,
  `libelle` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roleSite`
--

INSERT INTO `roleSite` (`id`, `libelle`) VALUES
(1, 'Médecin'),
(2, 'Modérateur'),
(3, 'Validateur'),
(4, 'Chef de produit'),
(5, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `visioconference`
--

CREATE TABLE `visioconference` (
  `id` int(11) NOT NULL,
  `nomVisio` varchar(100) DEFAULT NULL,
  `objectif` text DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `dateVisio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visioconference`
--

INSERT INTO `visioconference` (`id`, `nomVisio`, `objectif`, `url`, `dateVisio`) VALUES
(6, 'Conférence sur les potimarrons', 'C\'est beau un potimarron', 'potimarron.com', '2022-11-15'),
(7, 'Conférence sur le roblochon', 'mhh', 'mhh', '2022-11-17'),
(8, 'j\'adore le développement', 'vive C#', 'microsoft.com', '2002-11-17'),
(11, 'Sous Xanax', 'Vive l\'aprazolam', 'boirons.com', '2022-11-16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etatSite`
--
ALTER TABLE `etatSite`
  ADD PRIMARY KEY (`infoSite`);

--
-- Index pour la table `historiqueconnexion`
--
ALTER TABLE `historiqueconnexion`
  ADD PRIMARY KEY (`idMedecin`,`dateDebutLog`) USING BTREE;

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RoleUser` (`idRole`);

--
-- Index pour la table `medecinproduit`
--
ALTER TABLE `medecinproduit`
  ADD PRIMARY KEY (`idMedecin`,`idProduit`,`Date`,`Heure`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `medecinvisio`
--
ALTER TABLE `medecinvisio`
  ADD PRIMARY KEY (`idMedecin`,`idVisio`),
  ADD KEY `idVisio` (`idVisio`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`idOperation`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roleSite`
--
ALTER TABLE `roleSite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visioconference`
--
ALTER TABLE `visioconference`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `idOperation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `roleSite`
--
ALTER TABLE `roleSite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `visioconference`
--
ALTER TABLE `visioconference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historiqueconnexion`
--
ALTER TABLE `historiqueconnexion`
  ADD CONSTRAINT `historiqueconnexion_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`id`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `RoleUser` FOREIGN KEY (`idRole`) REFERENCES `roleSite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `medecinproduit`
--
ALTER TABLE `medecinproduit`
  ADD CONSTRAINT `medecinproduit_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`id`),
  ADD CONSTRAINT `medecinproduit_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `medecinvisio`
--
ALTER TABLE `medecinvisio`
  ADD CONSTRAINT `medecinvisio_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`id`),
  ADD CONSTRAINT `medecinvisio_ibfk_2` FOREIGN KEY (`idVisio`) REFERENCES `visioconference` (`id`);

--
-- Contraintes pour la table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `medecin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
