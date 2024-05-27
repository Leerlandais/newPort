-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 27 mai 2024 à 13:18
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `new_portal`
--

-- --------------------------------------------------------

--
-- Structure de la table `np_carousel`
--

DROP TABLE IF EXISTS `np_carousel`;
CREATE TABLE IF NOT EXISTS `np_carousel` (
  `np_carousel_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `np_carousel_title` varchar(255) NOT NULL,
  `np_carousel_desc_en` varchar(1024) NOT NULL,
  `np_carousel_desc_fr` varchar(1024) NOT NULL,
  `np_carousel_img` varchar(255) NOT NULL,
  `np_carousel_width` varchar(8) NOT NULL,
  `np_carousel_height` varchar(8) NOT NULL,
  `np_carousel_vis` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`np_carousel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `np_carousel`
--

INSERT INTO `np_carousel` (`np_carousel_id`, `np_carousel_title`, `np_carousel_desc_en`, `np_carousel_desc_fr`, `np_carousel_img`, `np_carousel_width`, `np_carousel_height`, `np_carousel_vis`) VALUES
(1, 'TI-1', 'Our first \'Integration Test\'. The purpose here was to show correct use of MVC structure', 'Notre premier « Test d\'intégration ». Le but ici était de montrer l\'utilisation correcte de la structure MVC', 'img/TI1.png', '100', '100', 1),
(2, 'The 2nd TI', 'Our second Integration Test. This one included Database manipulation and responsive layout', 'Notre deuxième test d\'intégration. Celui-ci comprenait la manipulation de la base de données et la mise en page réactive', 'img/postit.jpeg', '100', '100', 1),
(3, 'Prefo Site', 'This was my first site. Completed at the end of the 6 week Preformation', 'C&#039;était mon premier site. Terminé à la fin de la préformation de 6 semaines', 'img/cmdrPet.jpeg', '100', '100', 1),
(4, 'TI3', 'Our 3rd Integration Test. CRUD, Bootstrap, Leaflet etc', 'Notre 3ème Test d&#039;Intégration. CRUD, Bootstrap, dépliant, etc.', 'img/mapCard.png', '100', '100', 1),
(5, 'Memory', 'An experiment in Javascript', 'Une expérience en Javascript', 'img/memCardGame.png', '100', '100', 1);

-- --------------------------------------------------------

--
-- Structure de la table `np_css`
--

DROP TABLE IF EXISTS `np_css`;
CREATE TABLE IF NOT EXISTS `np_css` (
  `np_css_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `np_css_selector` text NOT NULL,
  `np_css_attribute` varchar(255) NOT NULL,
  `np_css_value` varchar(1024) DEFAULT NULL,
  `np_css_old_val` varchar(1024) DEFAULT NULL,
  `np_css_def_val` varchar(1024) NOT NULL,
  PRIMARY KEY (`np_css_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `np_css`
--

INSERT INTO `np_css` (`np_css_id`, `np_css_selector`, `np_css_attribute`, `np_css_value`, `np_css_old_val`, `np_css_def_val`) VALUES
(4, 'headerNormal', 'border', '2px solid  hsla(211, 36%, 46%, 1)', 'red', '2px solid  hsla(211, 36%, 46%, 1)'),
(11, 'headerNormal', 'border-radius', '20px', '25px', '20px'),
(15, 'headerNormal', 'box-shadow', '0px 4px 8px black, 0px 8px 16px black, 0px 16px 32px black, 0px 32px 64px black;', NULL, '0px 4px 8px black, 0px 8px 16px black, 0px 16px 32px black, 0px 32px 64px black;');

-- --------------------------------------------------------

--
-- Structure de la table `np_site`
--

DROP TABLE IF EXISTS `np_site`;
CREATE TABLE IF NOT EXISTS `np_site` (
  `np_site_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `np_site_selector` varchar(255) NOT NULL,
  `np_site_en` text NOT NULL,
  `np_site_fr` text NOT NULL,
  `np_site_type` varchar(5) NOT NULL DEFAULT 'id',
  PRIMARY KEY (`np_site_id`),
  UNIQUE KEY `np_site_selector` (`np_site_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `np_site`
--

INSERT INTO `np_site` (`np_site_id`, `np_site_selector`, `np_site_en`, `np_site_fr`, `np_site_type`) VALUES
(1, 'homepage_h1', 'Welcome to my new Portfolio Site', 'Bienvenue sur mon nouveau site Portfolio', 'id'),
(2, 'navHome', 'Home', 'Accueil', 'id'),
(3, 'navContact', 'Contact', 'Contactez moi', 'id'),
(4, 'navLogin', 'Login', 'Se Connecter', 'id'),
(5, 'navAbout', 'About', 'À Propos de Moi', 'id'),
(6, 'logLabelName', 'User Name', 'Nom d\'Utilisateur', 'id'),
(7, 'logLabelPwd', 'Password', 'Mot de Passe', 'id'),
(8, 'submitLogin', 'Submit', 'Envoyer', 'id'),
(9, 'navLogout', 'Logout', 'Déconnexion', 'id'),
(10, 'navControl', 'Site Controls', 'Contrôles du site', 'id'),
(11, 'controlHeader', 'This is the site control panel', 'Ceci est le panneau de contrôle du site', 'id'),
(12, 'getCreate', 'Create a Login', 'Créer un Utilisateur', 'id'),
(13, 'logLabelFirst', 'First Name', 'Prénom', 'id'),
(14, 'logLabelSecond', 'Last Name', 'Nom de Famille', 'id'),
(15, 'logLabelEmail', 'Email', 'E-mail', 'id'),
(16, 'logLabelCheck', 'Confirm Pwd', 'Confirmer le mot de passe', 'id'),
(17, 'forMarie', 'test', 'teste', 'id'),
(18, 'submitCarousel', 'Submit', 'Ajouter', 'id'),
(19, 'aboutMeText', 'Since beginning my apprenticehip with CF2M, I have discovered within myself a passion for coding.</br> Be it Javascript, PHP, HTML, CSS or SQL, I delight in creating things, improving them and improving them some more.<br> Via this portfolio, you can see my progress right from the start. For posterity, I have left my previous projects as they were.<br> In order to showcase some of my favourite work of late (behind the scene manipulation), I created this version of my portfolio.<br> By creating a user account, you can gain access to the backstage and see the site automation controls.', 'Depuis le début de mon apprentissage au CF2M, je me suis découvert une passion pour le codage.<br> Que ce soit Javascript, PHP, HTML, CSS ou SQL, j&#039;aime créer des choses, les améliorer et les améliorer encore.<br>Via ce portfolio, vous pouvez voir mes progrès dès le début. Pour la postérité, j’ai laissé mes projets précédents tels qu’ils étaient.<br> Afin de présenter certains de mes travaux préférés ces derniers temps (dans les coulisses de la manipulation de scène),<br> j\'ai créé cette version de mon portfolio. <br>En créant un compte utilisateur, vous pouvez accéder aux coulisses et voir les contrôles d\'automatisation du site.', 'id'),
(20, 'addTextLegend', 'Add New Text', 'Ajouter un nouveau texte', 'id'),
(21, 'addCarouselLegend', 'Add a Carousel Item', 'Ajouter un élément au carrousel', 'id'),
(22, 'carouselDesc0', 'Our first &#039;Integration Test&#039;. The purpose here was to show correct use of MVC structure', 'Notre premier « Test d&#039;intégration ». Le but ici était de montrer l&#039;utilisation correcte de la structure MVC', 'id'),
(24, 'carouselDesc1', 'Our second Integration Test. This one included Database manipulation and responsive layout', 'Notre deuxième test d&#039;intégration. Celui-ci comprenait la manipulation de la base de données et la mise en page réactive', 'id'),
(25, 'carouselDesc2', 'This was my first site. Completed at the end of the 6 week Preformation', 'C&amp;#039;était mon premier site. Terminé à la fin de la préformation de 6 semaines', 'id'),
(26, 'carouselDesc3', 'Our 3rd Integration Test. CRUD, Bootstrap, Leaflet etc', 'Notre 3ème Test d&amp;#039;Intégration. CRUD, Bootstrap, dépliant, etc.', 'id'),
(27, 'carouselDesc4', 'An experiment in Javascript', 'Une expérience en Javascript', 'id'),
(28, 'addCssLegend', 'Header CSS Controls', 'Contrôles CSS d&#039;en-tête', 'id'),
(31, 'undoButton', 'Undo', 'Annuler', 'class'),
(32, 'resetButton', 'Reset', 'Réinitialiser', 'class'),
(36, 'typeInpIdLabel', 'ID :', 'ID :', 'id'),
(37, 'typeInpClassLabel', 'Class :', 'Classe :', 'id'),
(41, 'submitButton', 'Submit', 'Soumettre', 'class');

-- --------------------------------------------------------

--
-- Structure de la table `np_users`
--

DROP TABLE IF EXISTS `np_users`;
CREATE TABLE IF NOT EXISTS `np_users` (
  `np_user_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `np_user_username` varchar(255) NOT NULL,
  `np_user_firstname` varchar(128) NOT NULL,
  `np_user_lastname` varchar(128) NOT NULL,
  `np_user_email` varchar(128) NOT NULL,
  `np_user_pwd` varchar(255) NOT NULL,
  `np_user_permission` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1 - basic user\r\n128 - Me\r\n255 - superAdmin',
  `np_user_lang` varchar(2) NOT NULL DEFAULT 'en',
  PRIMARY KEY (`np_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `np_users`
--

INSERT INTO `np_users` (`np_user_id`, `np_user_username`, `np_user_firstname`, `np_user_lastname`, `np_user_email`, `np_user_pwd`, `np_user_permission`, `np_user_lang`) VALUES
(1, 'admin', 'Ad', 'Min', 'admin@admin.com', '$2y$10$2sn4jJ0LgUkGCQHNDfsEPOlybZlC20j.Lk3JCM7lfyAwwrizsEaem', 1, 'fr'),
(2, 'leerlandais', 'Lee', 'Brennan', 'lee@leerlandais.com', '$2y$10$y0pLpP4tuXDuLaDakIpkdO17YjRqZ6U5UEHPEid9LHR60L7eYIFy.', 255, 'en'),
(3, '', '', '', '', '$2y$10$HNjc.x0AjTpnWr7sY4eeAeAudAm3Xioopz8nqy.lpU6bClCpfIOlS', 1, 'fr'),
(4, 'guest', 'a', 'guest', 'g@g.com', '$2y$10$XFarHez3hJtyuaH/pFUIVuS6uYLKIZsF6iKGIHLBIdvQx2UWf7l4q', 1, 'en'),
(5, 'test', 'kjh', 'min', 't@t.com', '$2y$10$duL91XMWHIhiTrz7pjLQOeXvkDvy80CMIrWE2KwV7eh5RIDElXQPC', 1, 'en'),
(6, 'qsd', 'kjh', 'brennan', 't@t.com', '$2y$10$TTf0ssQ5ShSINVx0PPoKruG2vnfszcwN/f5EqDmPILg5SZHwLOIeG', 1, 'en'),
(7, 'aaa', 'aaa', 'aaa', 'a@a.com', '$2y$10$hbG5O.H83Px5tU3YHA8NSelu2gwfMY.vkjTS5Djq.FyfkmKyTrbce', 1, 'fr'),
(8, 'bbb', 'bbb', 'bbb', 'b@b.com', '$2y$10$fmNEoolEYQr7Ptn4i.ZQseVGrjAVfNW9tGG0yGzLZScPgi.epJmnW', 1, 'fr'),
(9, 'ccc', 'ccc', 'ccc', 'ccc@ccc.com', '$2y$10$v3/Lgx.X/jUekTaCQiAUgO9ZDgAd3GXR4MxwJ9VQF5rW.bYwSZGg2', 1, 'fr'),
(10, 'd', 'd', 'd', 'd@d.d', '$2y$10$vqJ0sO63I/wWxfN0A44k1u7oRvC0V1ZkQK4rHaBFjIQv74TccwIFq', 1, 'fr'),
(11, 'eddy', 'ed', 'dy', 'ed@dy.com', '$2y$10$pDDHHP2xFkB21XWKjzeaaukRPIUAfReSuBxBpfr2QfLRIwOQsRLMW', 1, 'fr'),
(12, 'fff', 'fff', 'fff', 'fff@ff.com', '$2y$10$xJ7V618xx//gP84EGlwruuWtoNmyVvf/fuq5AdIxk9M5uaSeC9JIS', 1, 'fr'),
(13, 's', 's', 's', 's@s.com', '$2y$10$k44zUOibmpAkLDfLLvGi7eK4mQ8Rn/gZfQOOe.mB0/vYpIRvEGnYi', 1, 'fr'),
(14, 'kk', 'k', 'k', 'k@k.com', '$2y$10$qd/zWyHZyhl.SFrB0QKh6.DlccA/tg44T3gaW0dNMe3wmGL4B9ERW', 1, 'fr'),
(15, 'y', 'y', 'y', 'y@y.com', '$2y$10$ApeGyWvVWotKMkVaUxoUGOGpMLzdfZTRaKwsNDOzemEgHP2PYStem', 1, 'fr'),
(16, 'o', 'o', 'o', 'o@o.com', '$2y$10$pZv8onbKfN2tgWdTcyNeSedKHozp/e9f2JMGM3ZwvHcwq2If.KIeq', 1, 'fr'),
(17, 'l', 'l', 'l', 'l@l.com', '$2y$10$dE45H9rzm.erkvIatAGnIeNsACpuDa8V3t2etvOR/eMfqFTXCMFlG', 1, 'fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
