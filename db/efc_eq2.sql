-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 25 avr. 2021 à 17:28
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `efc_eq2`
--
CREATE DATABASE IF NOT EXISTS `efc_eq2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `efc_eq2`;

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE `conversation` (
  `conversation_id` int(11) NOT NULL,
  `utilisateur1_id` varchar(3) NOT NULL,
  `utilisateur2_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `emploies`
--

DROP TABLE IF EXISTS `emploies`;
CREATE TABLE `emploies` (
  `id_emploie` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_media` varchar(25) NOT NULL,
  `url_media` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emploies`
--

INSERT INTO `emploies` (`id_emploie`, `titre`, `id_user`, `type_media`, `url_media`, `description`) VALUES
(1, 'qwert', 7, 'image', 'https://www.ntaskmanager.com/wp-content/uploads/2019/07/3.png', 'qwerty');

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `message` varchar(600) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `utilisateur_id` varchar(3) NOT NULL,
  `conversation_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `type_media` varchar(10) NOT NULL,
  `url_media` text NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom`, `type_media`, `url_media`, `description`, `likes`, `id_user`) VALUES
(1, 'qwert', 'image', 'qwert', 'qwert', 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `bio` text NOT NULL,
  `img` text NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `location` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `bio`, `img`, `password`, `type`, `mail`, `location`) VALUES
(6, 'qwerty', '', '$2y$10$txEwuOxJ6POqff9XBY13pOC9SDhG8NTLaFjJAFTM2qjK7.fD2iupG', 'personnal', 'william.caouette2001@gmail.com', 'Canada'),
(7, 'wertyui', '', '$2y$10$JOHMNryb6s2W1uOLM13OJOa/XBNFA6Mld019h7zMlJGRlvaL1Kdza', 'business', 'norensgaming@gmail.com', 'Belize'),
(8, 'lemotestlong', '', '$2y$10$lH2zoibATneoS9jT8drn/e1QHCkWgalD84TSzv9SEEz0wO23qIWtG', 'business', 'jean-roger@gmail.com', 'Afganistan');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Index pour la table `emploies`
--
ALTER TABLE `emploies`
  ADD PRIMARY KEY (`id_emploie`);

--
-- Index pour la table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`project_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`),
  ADD UNIQUE KEY `mail` (`mail`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emploies`
--
ALTER TABLE `emploies`
  MODIFY `id_emploie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
