-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Jeu 11 Avril 2019 à 21:01
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ProjetAPI`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_util` int(11) NOT NULL,
  `nom_commentateur` varchar(255) NOT NULL,
  `nombre_commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_util`, `nom_commentateur`, `nombre_commentaire`) VALUES
(1, 'kiki_marchand', 3),
(1, 'teamrocketbest', 1);

-- --------------------------------------------------------

--
-- Structure de la table `hashtag`
--

CREATE TABLE `hashtag` (
  `id_util` int(11) NOT NULL,
  `nom_tag` varchar(255) NOT NULL,
  `nombre_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `hashtag`
--

INSERT INTO `hashtag` (`id_util`, `nom_tag`, `nombre_tag`) VALUES
(1, 'test', 1),
(1, 'projet', 1);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id_util` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_util`, `type`, `lien`, `latitude`, `longitude`) VALUES
(1, 'image', 'https://scontent.cdninstagram.com/vp/92b7b553d65de621c3c0e21a9899c052/5D47F50B/t51.2885-15/sh0.08/e35/s640x640/53435607_2231408233789416_541723574156556751_n.jpg?_nc_ht=scontent.cdninstagram.com', '48.005308', '0.198258'),
(1, 'video', 'https://scontent.cdninstagram.com/vp/230fb3e1cb82232611dd1134d8a67c77/5CB1FE21/t50.2886-16/55890702_267726470842369_7087845904192781707_n.mp4?_nc_ht=scontent.cdninstagram.com', '48.01686', '0.1658'),
(1, 'image', 'https://scontent.cdninstagram.com/vp/3172aa45b327f04530bf60f3377b3392/5D3FDB33/t51.2885-15/sh0.08/e35/s640x640/52761079_155520182126299_7610263450016261302_n.jpg?_nc_ht=scontent.cdninstagram.com', NULL, NULL),
(1, 'image', 'https://scontent.cdninstagram.com/vp/f29befc5818ef7e4977a7d5555806305/5D3DC0A1/t51.2885-15/sh0.08/e35/s640x640/53439385_814718502224410_1836873030969479848_n.jpg?_nc_ht=scontent.cdninstagram.com', '40.4469470596', '10.546875'),
(1, 'image', 'https://scontent.cdninstagram.com/vp/02814aeaedcf15882d8f8c912b607b70/5D42338C/t51.2885-15/e35/52165317_253464672257012_8207550748800210882_n.jpg?_nc_ht=scontent.cdninstagram.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_util` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `nb_follows` int(11) DEFAULT NULL,
  `nb_followed_by` int(11) DEFAULT NULL,
  `nb_medias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_util`, `user_id`, `token`, `nb_follows`, `nb_followed_by`, `nb_medias`) VALUES
(1, '11414822554', '11414822554.1677ed0.99a09a5f898f4a5eaa5d2434565a47e9', 28, 13, 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_util`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_util` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
