-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 02 Mai 2017 à 23:39
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project_db`
--
CREATE DATABASE IF NOT EXISTS `project_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project_db`;
-- --------------------------------------------------------

--
-- Structure de la table `filetodownload`
--

CREATE TABLE `filetodownload` (
  `file_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `filetodownload`
--

INSERT INTO `filetodownload` (`file_id`, `name`, `date_uploaded`) VALUES
(68, 'Guide de crÃ©ation des articles avec le langage D.pdf', '2017-05-02 21:38:55'),
(69, 'manuel_installation (1).docx', '2017-05-02 21:39:04'),
(70, 'manuel_utilisation_final.docx', '2017-05-02 21:39:08');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`img_id`, `name`, `caption`, `date_uploaded`) VALUES
(177, '560.jpg', '', '2017-05-02 21:37:35'),
(178, '540.jpg', '', '2017-05-02 21:37:35'),
(179, '550.jpg', '', '2017-05-02 21:37:35'),
(180, '520.jpg', '', '2017-05-02 21:37:35'),
(181, 'autocomplete.gif', '', '2017-05-02 21:37:54'),
(182, 'jquery.png', '', '2017-05-02 21:37:54'),
(183, 'php-tag.jpg', '', '2017-05-02 21:37:54'),
(184, 'macbook-iphone-mockup.png', '', '2017-05-02 21:37:54'),
(185, 'Lighthouse.jpg', '', '2017-05-02 21:37:54'),
(186, 'Penguins.jpg', '', '2017-05-02 21:37:54'),
(187, 'Koala.jpg', '', '2017-05-02 21:37:54');

-- --------------------------------------------------------

--
-- Structure de la table `savedwebsites`
--

CREATE TABLE `savedwebsites` (
  `website_id` int(11) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_content` longtext NOT NULL,
  `website_description` text NOT NULL,
  `website_date_saved` datetime NOT NULL,
  `website_thumbnail` varchar(255) NOT NULL,
  `website_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `savedwebsites`
--

INSERT INTO `savedwebsites` (`website_id`, `website_name`, `website_content`, `website_description`, `website_date_saved`, `website_thumbnail`, `website_category`) VALUES
(6, 'WEB SITE', '-ruban[ -couleur[-taille[DANYA PROJECT | 5 ] | #ffffff]]\r\n\r\n-p[Danya Editor, the Editor is similar to a desktop based Text editor with many \r\n  awesome features including multiple selections, multiple editing, Smart syntax\r\n  Highlighter for D Markup Language, smart Code autocomplete and easy user interface\r\n  for inserting code through shortcuts and many other features to discover.\r\n]\r\n  -observation[Danya Editor, the Editor is similar to a desktop based Text editor with many \r\n  awesome features including multiple selections, multiple editing, Smart syntax\r\n  Highlighter for D Markup Language, smart Code autocomplete and easy user interface\r\n  for inserting code through shortcuts and many other features to discover.\r\n] \r\n  -alerte[Danya Editor, the Editor is similar to a desktop based Text editor with many \r\n  awesome features including multiple selections, multiple editing, Smart syntax\r\n  Highlighter for D Markup Language, smart Code autocomplete and easy user interface\r\n  for inserting code through shortcuts and many other features to discover.\r\n] \r\n    \r\n-slide[540.jpg | /*le lien correspondant*/]\r\n-slide[560.jpg | /*le lien correspondant*/]\r\n-slide[520.jpg | /*le lien correspondant*/]\r\n-slide[550.jpg | /*le lien correspondant*/]\r\n-afficherslide\r\n\r\n \r\n-entetetable[test1|test2|test3]\r\n-lignetable[-lvu[ test lien  | google.dz ] |-lvu[ test lien  | google.dz ] |-lvu[ test lien  |google.dz ] ]\r\n-lignetable[-lvu[ test lien  | google.dz ] |-lvu[ test lien  | google.dz ] |-lvu[ test lien  |google.dz ] ]\r\n-affichertable\r\n\r\n', 'FIRST TEST', '2017-05-02 23:28:15', 'aliens.jpg', 'Education');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `videos`
--

INSERT INTO `videos` (`video_id`, `name`, `date_uploaded`) VALUES
(9, 'Short video clip-nature.mp4.mp4', '2017-05-02 21:38:36'),
(10, 'small.mp4', '2017-05-02 21:38:41');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `filetodownload`
--
ALTER TABLE `filetodownload`
  ADD PRIMARY KEY (`file_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Index pour la table `savedwebsites`
--
ALTER TABLE `savedwebsites`
  ADD PRIMARY KEY (`website_id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `filetodownload`
--
ALTER TABLE `filetodownload`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT pour la table `savedwebsites`
--
ALTER TABLE `savedwebsites`
  MODIFY `website_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
