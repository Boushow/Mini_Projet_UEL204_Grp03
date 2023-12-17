--
-- Base de données: `bibliotheque`
--

CREATE DATABASE IF NOT EXISTS `bibliotheque` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bibliotheque`;

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE IF NOT EXISTS `livres` (
  `livre_id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_livre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee_publication` year(4) NOT NULL,
  `ajoute_par` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`livre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`id`, `titre_livre`, `auteur`, `annee_publication`, `ajoute_par`) VALUES
(1, 'Croc-Blanc', 'Jack London', 1906, 'Bibliothecaire');
INSERT INTO `livres` (`id`, `titre_livre`, `auteur`, `ajoute_par`) VALUES
(2, 'The Da Vinci Code', 'Dan Brown', 2003, 'Bibliothecaire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum(4) COLLATE utf8_unicode_ci NOT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY `identifiant` (`identifiant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `identifiant`, `motdepasse`, `role`) VALUES
(1, 'Bibliothecaire', 'i48Dha6P', 'proprietaire');
INSERT INTO `utilisateurs` (`id`, `identifiant`, `motdepasse`, `role`) VALUES
(2, 'mohamed', 'test91', 'admin');