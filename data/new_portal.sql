-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 25, 2024 at 05:57 PM
-- Server version: 11.2.2-MariaDB
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `np_site`
--

DROP TABLE IF EXISTS `np_site`;
CREATE TABLE IF NOT EXISTS `np_site` (
  `np_site_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `np_site_selector` varchar(255) NOT NULL,
  `np_site_en` text NOT NULL,
  `np_site_fr` text NOT NULL,
  PRIMARY KEY (`np_site_id`),
  UNIQUE KEY `np_site_selector` (`np_site_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `np_site`
--

INSERT INTO `np_site` (`np_site_id`, `np_site_selector`, `np_site_en`, `np_site_fr`) VALUES
(1, 'homepage_h1', 'Welcome to my new Portfolio Site', 'Bienvenue sur mon nouveau site Portfolio'),
(2, 'navHome', 'Home', 'Accueil'),
(3, 'navContact', 'Contact', 'Contactez moi'),
(4, 'navLogin', 'Login', 'Se Connecter'),
(5, 'navAbout', 'About', 'À Propos de Moi'),
(6, 'logLabelName', 'User Name', 'Nom d\'Utilisateur'),
(7, 'logLabelPwd', 'Password', 'Mot de Passe'),
(8, 'submitLogin', 'Submit', 'Envoyer'),
(9, 'navLogout', 'Logout', 'Déconnexion'),
(10, 'navControl', 'Site Controls', 'Contrôles du site'),
(11, 'controlHeader', 'This is the site control panel', 'Ceci est le panneau de contrôle du site'),
(12, 'getCreate', 'Create a Login', 'Créer un Utilisateur'),
(13, 'logLabelFirst', 'First Name', 'Prénom'),
(14, 'logLabelSecond', 'Last Name', 'Nom de Famille'),
(15, 'logLabelEmail', 'Email', 'E-mail'),
(16, 'logLabelCheck', 'Confirm Pwd', 'Confirmer le mot de passe');

-- --------------------------------------------------------

--
-- Table structure for table `np_users`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `np_users`
--

INSERT INTO `np_users` (`np_user_id`, `np_user_username`, `np_user_firstname`, `np_user_lastname`, `np_user_email`, `np_user_pwd`, `np_user_permission`, `np_user_lang`) VALUES
(1, 'admin', 'Ad', 'Min', 'admin@admin.com', '$2y$10$2sn4jJ0LgUkGCQHNDfsEPOlybZlC20j.Lk3JCM7lfyAwwrizsEaem', 1, 'fr'),
(2, 'leerlandais', 'Lee', 'Brennan', 'lee@leerlandais.com', '$2y$10$y0pLpP4tuXDuLaDakIpkdO17YjRqZ6U5UEHPEid9LHR60L7eYIFy.', 255, 'en'),
(3, '', '', '', '', '$2y$10$HNjc.x0AjTpnWr7sY4eeAeAudAm3Xioopz8nqy.lpU6bClCpfIOlS', 1, 'fr'),
(4, 'guest', 'a', 'guest', 'g@g.com', '$2y$10$XFarHez3hJtyuaH/pFUIVuS6uYLKIZsF6iKGIHLBIdvQx2UWf7l4q', 1, 'en');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
