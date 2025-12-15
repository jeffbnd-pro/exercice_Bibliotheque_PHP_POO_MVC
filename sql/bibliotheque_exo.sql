-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 12 déc. 2025 à 11:55
-- Version du serveur : 9.5.0
-- Version de PHP : 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque_exo`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `idauteur` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `idbooks` int NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idUniq` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `auteur_idauteur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `books_has_categories`
--

CREATE TABLE `books_has_categories` (
  `books_idbooks` int NOT NULL,
  `categories_idcategories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idcategories` int NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `exemplaireBooks`
--

CREATE TABLE `exemplaireBooks` (
  `idexemplaireBooks` int NOT NULL,
  `Broche` tinyint DEFAULT '1',
  `poche` tinyint DEFAULT '0',
  `relie` tinyint DEFAULT '0',
  `Quantité` int NOT NULL DEFAULT '0',
  `books_idbooks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `idlogs` int NOT NULL,
  `dateCreation` datetime NOT NULL,
  `message` longtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `iduser` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_has_exemplaireBooks`
--

CREATE TABLE `user_has_exemplaireBooks` (
  `user_iduser` int NOT NULL,
  `exemplaireBooks_idexemplaireBooks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`idauteur`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`idbooks`),
  ADD UNIQUE KEY `uniq_idUniq` (`idUniq`),
  ADD KEY `fk_books_auteur1_idx` (`auteur_idauteur`);

--
-- Index pour la table `books_has_categories`
--
ALTER TABLE `books_has_categories`
  ADD PRIMARY KEY (`books_idbooks`,`categories_idcategories`),
  ADD KEY `fk_books_has_categories_categories1_idx` (`categories_idcategories`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcategories`);

--
-- Index pour la table `exemplaireBooks`
--
ALTER TABLE `exemplaireBooks`
  ADD PRIMARY KEY (`idexemplaireBooks`),
  ADD KEY `fk_exemplaireBooks_books1_idx` (`books_idbooks`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idlogs`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Index pour la table `user_has_exemplaireBooks`
--
ALTER TABLE `user_has_exemplaireBooks`
  ADD PRIMARY KEY (`user_iduser`,`exemplaireBooks_idexemplaireBooks`),
  ADD KEY `fk_user_has_exemplaireBooks_exemplaireBooks1_idx` (`exemplaireBooks_idexemplaireBooks`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `idauteur` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `idbooks` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idcategories` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `exemplaireBooks`
--
ALTER TABLE `exemplaireBooks`
  MODIFY `idexemplaireBooks` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `idlogs` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_auteur1` FOREIGN KEY (`auteur_idauteur`) REFERENCES `auteur` (`idauteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `books_has_categories`
--
ALTER TABLE `books_has_categories`
  ADD CONSTRAINT `fk_books_has_categories_books1` FOREIGN KEY (`books_idbooks`) REFERENCES `books` (`idbooks`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_books_has_categories_categories1` FOREIGN KEY (`categories_idcategories`) REFERENCES `categories` (`idcategories`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `exemplaireBooks`
--
ALTER TABLE `exemplaireBooks`
  ADD CONSTRAINT `fk_exemplaireBooks_books1` FOREIGN KEY (`books_idbooks`) REFERENCES `books` (`idbooks`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_has_exemplaireBooks`
--
ALTER TABLE `user_has_exemplaireBooks`
  ADD CONSTRAINT `fk_user_has_exemplaireBooks_exemplaireBooks1` FOREIGN KEY (`exemplaireBooks_idexemplaireBooks`) REFERENCES `exemplaireBooks` (`idexemplaireBooks`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_has_exemplaireBooks_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
