-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 19 jan. 2024 à 15:26
-- Version du serveur : 8.1.0
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nws_escape_game`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(535) COLLATE utf8mb4_general_ci NOT NULL,
  `response` varchar(535) COLLATE utf8mb4_general_ci NOT NULL,
  `totalResponse` int NOT NULL DEFAULT '0',
  `totalSuccessResponse` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `response`, `totalResponse`, `totalSuccessResponse`) VALUES
(14, 'Qu’est ce qui est plus grand que la Tour Eiffel, mais infiniment moins lourd ?', 'Son ombre', 4, 3),
(13, 'Qu\'est-ce qui peut être dans la mer et dans le ciel ?', 'une étoile', 15, 2),
(15, 'Qu\'est-ce qui commence la nuit et termine le matin ?', 'La lettre N', 3, 1),
(16, 'Qu\'est-ce qui fait le tour de la maison sans bouger ?', 'Le mur', 1, 1),
(17, 'Qu\'est-ce qui t\'appartient mais que les autres utilisent plus que toi ?', 'Ton prénom', 1, 0),
(18, 'Un smartphone et sa coque coûtent 110 euros en tout. Le smartphone coûte 100 euros de plus que la coque. Combien coûte le smartphone ?', '105 euros', 3, 0),
(19, 'test', 'tesd', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
