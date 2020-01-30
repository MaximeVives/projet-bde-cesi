-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 17 nov. 2019 à 01:06
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bde-cesi`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActiviteMois` ()  NO SQL
SELECT * FROM `activite` ORDER BY Prix_activite DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AjoutActivite` (IN `P_nom` VARCHAR(50), IN `P_description` VARCHAR(50), IN `P_URL` VARCHAR(50), IN `P_date` DATE, IN `P_prix` INT, IN `P_recurrence` INT)  NO SQL
INSERT INTO `activite` (`ID_activite`, `Nom_activite`, `Description_activite`, `URL_photo`, `Likes`, `Commentaires`, `Date_activite`, `ID_prix`, `ID_Recurrence`) VALUES (NULL, P_nom, P_Description, P_URL, "0" , "0", P_date, P_prix, P_recurrence)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AjoutPanier` (IN `P_user` INT, IN `P_obj` INT)  NO SQL
INSERT INTO `commande` (`Id_Commande`, `id`, `ID_Produit`) VALUES (NULL, P_user, P_obj)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AjoutProduit` (IN `P_nom` VARCHAR(50), IN `P_description` VARCHAR(150), IN `P_Prix` INT, IN `P_categorie` VARCHAR(50), IN `P_quantite` INT, IN `P_url` VARCHAR(100))  NO SQL
INSERT INTO `produit` (`ID_Produit`, `Nom_Produit`, `Description_Produit`, `Prix_Produit`, `Categorie_Produit`, `quantite`, `URL_photo`) VALUES (NULL, P_nom, P_Description, P_Prix, P_categorie, P_quantite, P_url)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DelActivite` (IN `P_ID` INT)  NO SQL
DELETE FROM activite WHERE ID_activite = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DelAllPanier` (IN `P_user` INT)  NO SQL
DELETE FROM `commande`
WHERE id = P_user$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DelProduit` (IN `P_ID` INT)  NO SQL
DELETE FROM produit WHERE ID_produit = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DelProduitPanier` (IN `P_user` INT, IN `P_produit` INT)  NO SQL
DELETE FROM `commande`
WHERE id=P_user AND ID_Produit=P_produit$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListeActivite` ()  NO SQL
SELECT * FROM activite$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListePanier` (IN `P_user` INT)  NO SQL
SELECT commande.Id_Commande, commande.id, commande.ID_Produit, produit.Nom_Produit, produit.Prix_Produit, produit.Quantite, produit.URL_photo
FROM commande
INNER JOIN produit ON commande.ID_Produit = produit.ID_Produit
WHERE id = P_user$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListeProduits` ()  NO SQL
SELECT * FROM produit$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListeProduitsASC` ()  NO SQL
SELECT nom_produit, prix_produit FROM produit ORDER BY prix_produit ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListeProduitsDESC` ()  NO SQL
SELECT nom_produit, prix_produit, URL_photo FROM produit ORDER BY prix_produit DESC LIMIT 3$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MajQuantite` (IN `P_prod` INT)  NO SQL
UPDATE produit
SET Quantite = Quantite-1
WHERE ID_Produit = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateCategorieProduit` (IN `P_categorie` VARCHAR(50), IN `P_ID` INT)  NO SQL
UPDATE `produit` SET `Categorie_produit` = P_categorie WHERE `ID_Produit` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateDateActivite` (IN `P_ID` INT, IN `P_date` DATE)  NO SQL
UPDATE `activite` SET `Date_Activite` = P_date WHERE `ID_Activite` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateDescActivite` (IN `P_ID` INT, IN `P_desc` VARCHAR(150))  NO SQL
UPDATE `activite` SET `Description_activite` = P_desc WHERE `ID_Activite` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateDescProduit` (IN `P_desc` VARCHAR(150), IN `P_ID` INT)  NO SQL
UPDATE `produit` SET `Description_produit` = P_desc WHERE `ID_Produit` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateNomActivite` (IN `P_ID` INT, IN `P_nom` VARCHAR(50))  NO SQL
UPDATE `activite` SET `Nom_activite` = P_nom WHERE `ID_Activite` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateNomProduit` (IN `P_nom` VARCHAR(50), IN `P_ID` INT)  NO SQL
UPDATE `produit` SET `Nom_produit` = P_nom WHERE `ID_Produit` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePanier` (IN `P_idprod` INT)  NO SQL
UPDATE commande
SET Quantite = Quantite-1
WHERE ID_Produit = P_idprod$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePrixActivite` (IN `P_ID` INT, IN `P_prix` INT)  NO SQL
UPDATE `activite` SET `ID_prix` = P_prix WHERE `ID_Activite` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePrixProduit` (IN `P_prix` INT, IN `P_ID` INT)  NO SQL
UPDATE `produit` SET `Prix_Produit` = P_prix WHERE `ID_Produit` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateQuantiteProduit` (IN `P_Quantite` INT, IN `P_ID` INT)  NO SQL
UPDATE `Produit` SET `Quantite` = P_Quantite WHERE `ID_Produit` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateRecuActivite` (IN `P_ID` INT, IN `P_rec` INT)  NO SQL
UPDATE `activite` SET `ID_recurrence` = P_rec WHERE `ID_Activite` = P_ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUrlProduit` (IN `P_URL` VARCHAR(50), IN `P_ID` INT)  NO SQL
UPDATE `produit` SET `URL_Photo` = P_URL WHERE `ID_Produit` = P_ID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `ID_Activite` bigint(20) UNSIGNED NOT NULL,
  `Nom_Activite` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description_Activite` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `URL_Photo` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Likes` int(11) NOT NULL,
  `Commentaires` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_Activite` date NOT NULL,
  `Prix_activite` int(11) NOT NULL,
  `ID_Recurrence` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`ID_Activite`, `Nom_Activite`, `Description_Activite`, `URL_Photo`, `Likes`, `Commentaires`, `Date_Activite`, `Prix_activite`, `ID_Recurrence`) VALUES
(1, 'LaserQuest', 'Séance de LaserQuest dans un établissement de la ville de Pau.', 'laserquest_1.jpg', 0, '0', '2019-11-23', 18, 0),
(2, 'Soccer', 'Nous partirons cette fois à la découverte du sport nommé \'soccer\", la partie prendra place à Idron.', 'soccer.jpg', 0, '0', '2019-11-24', 13, 0),
(3, 'Golf', 'Partie de golf entre amis et collègues, venez nombreux !', 'golf.jpg', 0, '0', '2019-11-21', 25, 0),
(4, 'Natation', 'Journée à la piscine afin de découvrir les joies de la natation.', 'natation.jpg', 0, '0', '2019-12-03', 4, 0),
(5, 'Lan Party', 'Lan party de 40 personnes avec prix à remporter.', 'Lan.jpg', 0, '0', '2019-12-11', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE `centre` (
  `id_centre` int(30) NOT NULL DEFAULT '1',
  `centre` varchar(65) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`id_centre`, `centre`) VALUES
(1, 'Aix-en-provence'),
(2, 'Alger'),
(3, 'Angoulême'),
(4, 'Arras'),
(5, 'Bordeaux'),
(6, 'Brest'),
(7, 'Caen'),
(8, 'Dijon'),
(9, 'Douala'),
(10, 'Grenoble'),
(11, 'La Rochelle'),
(12, 'Le Mans'),
(13, 'Lille'),
(14, 'Lyon'),
(15, 'Montpellier'),
(16, 'Nancy'),
(17, 'Nantes'),
(18, 'Nice'),
(19, 'Orléans'),
(20, 'Paris Nanterre'),
(21, 'Pau'),
(22, 'Reims'),
(23, 'Rouen'),
(24, 'Saint-Nazaire'),
(25, 'Strasbourg'),
(26, 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `Id_Commande` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ID_Produit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `ID_Commentaire` bigint(20) UNSIGNED NOT NULL,
  `Contenu` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Utilisateur` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Activite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `ID_Inscrit` bigint(20) UNSIGNED NOT NULL,
  `ID_Activite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_Produit` bigint(20) UNSIGNED NOT NULL,
  `Nom_Produit` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description_Produit` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prix_Produit` double(8,2) NOT NULL,
  `Categorie_Produit` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantite` int(11) NOT NULL,
  `URL_photo` char(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID_Produit`, `Nom_Produit`, `Description_Produit`, `Prix_Produit`, `Categorie_Produit`, `Quantite`, `URL_photo`) VALUES
(1, 'Maillot Vitality 2019', 'Le nouveau maillot de l\'équipe n°1 en France', 80.00, 'Maillot', 12, 'maillot_1.png'),
(2, 'Gotaga', 'Le FrenchMonster', 150.00, 'COD/FORTNITE', 1, 'maillot_3.png'),
(3, 'Maillot Vitality 2018', 'Les anciens maillot de l\'équipe n°1 en France', 75.00, 'Maillot', 13, 'maillot_2.png'),
(4, 'Stickers Vitality', 'Les stickers issue du dernier Logo Vitality', 12.00, 'Stickers', 200, 'logo_1.png'),
(5, 'Pull Vitality', 'Restez compétitif en Hiver', 65.00, 'Pull', 12, 'pull_1.png');

-- --------------------------------------------------------

--
-- Structure de la table `recurrence`
--

CREATE TABLE `recurrence` (
  `ID_Recurrence` bigint(20) UNSIGNED NOT NULL,
  `Recurrence_Activite` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(5) NOT NULL,
  `statut` varchar(65) NOT NULL DEFAULT 'Etudiant'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `statut`) VALUES
(1, 'Membre du BDE'),
(2, 'Apprenant'),
(3, 'Etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_centre` int(30) NOT NULL DEFAULT '1',
  `id_statut` int(5) NOT NULL DEFAULT '3',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `id_centre`, `id_statut`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jack O\'Lantern', 'jacky64@viacesi.fr', '$2y$10$gu6hnJlQmnL/5EJNE5Hy5u/a6J9TikeICE4qKTt8TcIZ0OUhoS/qK', 9, 1, NULL, NULL, '2019-11-16 13:56:46', '2019-11-16 13:56:46'),
(2, 'maxime', 'maxime@viacesi.fr', '$2y$10$83ZbI1eEifd4KVelPUvkm.5xGfeOMhyAPadCEapEmOxOtHiKHbf5e', 16, 1, NULL, NULL, '2019-11-16 17:15:21', '2019-11-16 17:15:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`ID_Activite`),
  ADD KEY `activite_id_recurrence_foreign` (`ID_Recurrence`);

--
-- Index pour la table `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`id_centre`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`Id_Commande`),
  ADD KEY `id` (`id`),
  ADD KEY `ID_Produit` (`ID_Produit`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`ID_Commentaire`),
  ADD KEY `commentaire_id_activite_foreign` (`ID_Activite`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`ID_Inscrit`),
  ADD KEY `participe_id_activite_foreign` (`ID_Activite`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ID_Produit`);

--
-- Index pour la table `recurrence`
--
ALTER TABLE `recurrence`
  ADD PRIMARY KEY (`ID_Recurrence`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_statut` (`id_statut`),
  ADD KEY `id_centre` (`id_centre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `ID_Activite` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `Id_Commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `ID_Commentaire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `participe`
--
ALTER TABLE `participe`
  MODIFY `ID_Inscrit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ID_Produit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `recurrence`
--
ALTER TABLE `recurrence`
  MODIFY `ID_Recurrence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
