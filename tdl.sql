-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 25 fév. 2021 à 17:30
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdl`
--

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_completed` datetime DEFAULT NULL,
  `id_task_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id_task`, `title`, `description`, `date_created`, `date_completed`, `id_task_status`) VALUES
(160, 'Okay', 'dsds', '2021-02-22 20:12:24', '2021-02-22 20:12:38', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tasks_attribution`
--

CREATE TABLE `tasks_attribution` (
  `id_planning` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tasks_status`
--

CREATE TABLE `tasks_status` (
  `id_task_status` int(11) NOT NULL,
  `name_task_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tasks_status`
--

INSERT INTO `tasks_status` (`id_task_status`, `name_task_status`) VALUES
(1, 'en cours'),
(2, 'terminée');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `lastname`, `firstname`, `mail`, `password`, `id_user_status`) VALUES
(60, 'Habib', 'Ruben', 'admin@gmail.com', 'admin', 1),
(59, 'Jacquens', 'Nadia', 'nadia.jacquens@gmail.com', '$2y$10$ccm3ugGdszlkhtPe.Zq4Wup5vjo.wI0aBnwtC/4ZwwA91Aq4/fJwq', 2),
(58, 'Jacquens', 'Louis', 'louis.jacquens@gmail.com', 'Pooding999!!!', 1),
(57, 'Jacquens', 'Philippe', 'philippe.jacquens@gmail.com', '$2y$10$rseQXKMixr3bv9VGJ8Wbs.Z2Fgi2BytnNfBJ5rCedaXxNJbrxl6BK', 1),
(56, 'Jacquens', 'Kevin', 'kevin.jacquens@gmail.com', '$2y$10$goX3tU9lPcs1IVU4jcBfOeMQCWG95BMOsj0pg7dZkcAmyZtUFqNpG', 1),
(55, 'Jacquens', 'Julie', 'julie.jacquens@gmail.com', '$2y$10$QDd3Q0Utnkwna7HFohd9tOZiTzhlvHbjn.mpP7gx7CmvPAGCmXMFS', 1),
(54, 'Proust', 'Marcel', 'marcel.proust@gmail.com', '$2y$10$8vM8stxv.S8wLk.6toNGdOq.Za2Do2pJyuvOVcyp/XmuesGWu9Re2', 1),
(53, 'Jacquens', 'Colette', 'colette.jacquens@gmail.com', '$2y$10$OprV/c8.gdoW4/mDFsrKG.lfzNdedupY3v6Q5.TGxplp4yKQHks5i', 1),
(52, 'Jacquens', 'Colin', 'colin.jacquens@gmail.com', '$2y$10$tYwQP14s9e9Kev4SuGe2mOH8WOJWLC51OQ7ARtKpNoh0gip4GwiGq', 1),
(51, 'Thomas', 'Eliot', 'eliot.thomas@gmail.com', '$2y$10$N42aDT/RJPhJKQqHvS4GEOLW1o2Vt4kRj6fKR/j2QMcIj.yWMH9H.', 1),
(50, 'Jacquens', 'David', 'david.jacquens@gmail.com', '$2y$10$8W0vwn7vGYVKlTJSsp3ueeq4bEIOLWlbqjvnrIUDkYFBHvC6i1TDe', 1),
(49, 'Jacquens', 'Melanie ', 'melanie.jacquens@gmail.com', '$2y$10$qB4JLH57U/NK.SJbPGpcZ.grN/kqmE7n1JZQEy7RZgENoDD3iiQJS', 1),
(48, 'Jacquens', 'Marine', 'marine.jacquens@gmail.com', '$2y$10$YFfK9f7C.AeZlSO/kAXqvuSs9TPB11SSWWXtXOOlnBVkLZyz94yiO', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_status`
--

CREATE TABLE `users_status` (
  `id_user_status` int(11) NOT NULL,
  `name_user_status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_status`
--

INSERT INTO `users_status` (`id_user_status`, `name_user_status`) VALUES
(1, 'admin'),
(2, 'normal');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`);

--
-- Index pour la table `tasks_attribution`
--
ALTER TABLE `tasks_attribution`
  ADD PRIMARY KEY (`id_planning`);

--
-- Index pour la table `tasks_status`
--
ALTER TABLE `tasks_status`
  ADD PRIMARY KEY (`id_task_status`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `users_status`
--
ALTER TABLE `users_status`
  ADD PRIMARY KEY (`id_user_status`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `tasks_attribution`
--
ALTER TABLE `tasks_attribution`
  MODIFY `id_planning` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tasks_status`
--
ALTER TABLE `tasks_status`
  MODIFY `id_task_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `users_status`
--
ALTER TABLE `users_status`
  MODIFY `id_user_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
