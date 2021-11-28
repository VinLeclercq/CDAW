-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : sam. 27 nov. 2021 à 21:32
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medias`
--

-- --------------------------------------------------------

--
-- Structure de la table `belongs_to`
--

CREATE TABLE `belongs_to` (
  `ID_media` bigint UNSIGNED NOT NULL,
  `ID_playlist` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `belongs_to`
--

INSERT INTO `belongs_to` (`ID_media`, `ID_playlist`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(10, 3, NULL, NULL),
(11, 2, NULL, NULL),
(12, 4, NULL, NULL),
(13, 1, NULL, NULL),
(15, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_signaled` tinyint(1) NOT NULL DEFAULT '0',
  `ID_user` bigint UNSIGNED NOT NULL,
  `ID_media` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `title`, `content`, `is_signaled`, `ID_user`, `ID_media`, `created_at`, `updated_at`) VALUES
(3, 'Wow', 'Le meilleur film que j\'ai vu', 0, 9, 12, '2017-02-02 00:00:00', NULL),
(4, 'Surcôté', 'Vraiment un film de merde', 0, 5, 13, '2014-01-07 00:00:00', NULL),
(5, 'Stylé', 'Vraiment passé un très bon moment', 0, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `compose`
--

CREATE TABLE `compose` (
  `ID_media` bigint UNSIGNED NOT NULL,
  `ID_person` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `defined`
--

CREATE TABLE `defined` (
  `ID_media` bigint UNSIGNED NOT NULL,
  `ID_category` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `flag`
--

CREATE TABLE `flag` (
  `ID_flagger` bigint UNSIGNED NOT NULL,
  `ID_flagged` bigint UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liked`
--

CREATE TABLE `liked` (
  `ID_user` bigint UNSIGNED NOT NULL,
  `ID_media` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `liked`
--

INSERT INTO `liked` (`ID_user`, `ID_media`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, NULL),
(8, 8, NULL, NULL),
(10, 12, NULL, NULL),
(12, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode_nb` int DEFAULT NULL,
  `duration_time` int NOT NULL,
  `release_date` date NOT NULL,
  `ending_date` date DEFAULT NULL,
  `total_duration_time` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Film','Série') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('En cours','Fini','Abandonné') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `name`, `episode_nb`, `duration_time`, `release_date`, `ending_date`, `total_duration_time`, `description`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'La La Land', NULL, 120, '2021-11-01', NULL, NULL, 'Hollywood', 'Film', 'Fini', NULL, NULL),
(2, 'Les évadés', NULL, 200, '1994-02-01', NULL, NULL, 'The Shawshank Redemption', 'Film', 'Fini', NULL, NULL),
(3, 'Les évadés', NULL, 200, '1994-02-01', NULL, NULL, 'The Shawshank Redemption', 'Film', 'Fini', NULL, NULL),
(4, 'Le Parrain', NULL, 150, '1972-03-15', NULL, NULL, 'New York', 'Film', 'Fini', NULL, NULL),
(5, 'The Dark Knight', NULL, 120, '2008-10-25', NULL, NULL, 'Joker', 'Film', 'Fini', NULL, NULL),
(6, '12 Hommes en colère', NULL, 90, '1957-04-03', NULL, NULL, 'Tribunal et procès', 'Film', 'Fini', NULL, NULL),
(7, 'La Liste de Schindler', NULL, 82, '1993-06-04', NULL, NULL, 'Seconde Guerre Mondiale', 'Film', 'Fini', NULL, NULL),
(8, 'Le Seigneur des anneaux', NULL, 73, '2003-12-13', NULL, NULL, 'Waaa', 'Film', 'Fini', NULL, NULL),
(9, 'Pulp Fiction', NULL, 85, '1994-01-26', NULL, NULL, 'Pan Pan', 'Film', 'Fini', NULL, NULL),
(10, 'Fight Club', NULL, 100, '1999-04-22', NULL, NULL, 'La bagarre', 'Film', 'Fini', NULL, NULL),
(11, 'Forrest Gump', NULL, 120, '1994-10-18', NULL, NULL, 'Le chocolat', 'Film', 'Fini', NULL, NULL),
(12, 'Inception', NULL, 200, '2010-10-10', NULL, NULL, 'Le gro cervo', 'Film', 'Fini', NULL, NULL),
(13, 'Matrix', NULL, 105, '1999-09-09', NULL, NULL, 'Societer', 'Film', 'Fini', NULL, NULL),
(14, 'Breaking Bad', 80, 40, '2008-11-29', '2015-12-24', 500, 'La bonne drogue', 'Série', 'Fini', NULL, NULL),
(15, 'Love Victor', 22, 30, '2020-07-15', NULL, 200, 'Love is love', 'Série', 'En cours', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_10_27_073728_create_categories_table', 1),
(7, '2021_11_19_132746_create_media_table', 1),
(8, '2021_11_22_085712_create_sessions_table', 1),
(9, '2021_11_24_110343_create_comment_table', 1),
(10, '2021_11_25_192832_create_liked_table', 1),
(11, '2021_11_25_192832_create_watched_table', 1),
(12, '2021_11_25_193325_create_category_defined_media_table', 1),
(13, '2021_11_25_193449_create_user_flag_user_table', 1),
(14, '2021_11_25_193608_create_person_table', 1),
(15, '2021_11_25_193717_create_playlist_table', 1),
(16, '2021_11_25_193947_create_user_moderate_comment_table', 1),
(17, '2021_11_25_194202_create_user_subscribe_to_playlist_table', 1),
(18, '2021_11_25_194255_create_person_compose_media_table', 1),
(19, '2021_11_25_194435_create_media_belongs_to_playlist_table', 1),
(20, '2021_11_25_194536_create_user_own_playlist_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `moderate`
--

CREATE TABLE `moderate` (
  `ID_comment` bigint UNSIGNED NOT NULL,
  `ID_user` bigint UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `moderate`
--

INSERT INTO `moderate` (`ID_comment`, `ID_user`, `message`, `created_at`, `updated_at`) VALUES
(4, 3, 'On se calme sur les mots', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `own`
--

CREATE TABLE `own` (
  `ID_playlist` bigint UNSIGNED NOT NULL,
  `ID_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `own`
--

INSERT INTO `own` (`ID_playlist`, `ID_user`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, NULL),
(2, 3, NULL, NULL),
(3, 12, NULL, NULL),
(4, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

CREATE TABLE `person` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_actor` tinyint(1) NOT NULL,
  `is_director` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE `playlist` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 'Mes incontournales', 1, NULL, NULL),
(2, 'Chill', 1, NULL, NULL),
(3, 'Frisson', 1, NULL, NULL),
(4, 'Pas fou', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subscribe`
--

CREATE TABLE `subscribe` (
  `ID_playlist` bigint UNSIGNED NOT NULL,
  `ID_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subscribe`
--

INSERT INTO `subscribe` (`ID_playlist`, `ID_user`, `created_at`, `updated_at`) VALUES
(1, 11, NULL, NULL),
(2, 7, NULL, NULL),
(3, 4, NULL, NULL),
(4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `is_modo` tinyint(1) NOT NULL DEFAULT '0',
  `blocked_date` timestamp NULL DEFAULT NULL,
  `time_blocked` date DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `avatar_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `forename`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `is_modo`, `blocked_date`, `time_blocked`, `current_team_id`, `avatar_path`, `created_at`, `updated_at`) VALUES
(3, 'Erwan', 'Merly', 'erwan.merly@test.com', 'password', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Leclercq', 'Vinciane', 'vinciane.leclercq@test.com', 'password', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Keuninck', 'Billaume', 'billaume.keuninck@test.com', 'Pa$$w0rd', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Leroux', 'Benjamin', 'benjamin.leroux', 'pass', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Nickler', 'Lila', 'lila.nickler@p.com', 'a', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Baey', 'Marie', 'marie.baey@p.com', 'oui', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Delecluse', 'Raphaël', 'raphael.delecluse@test.com', 'azerty', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Lejeune', 'Théo', 'tleujeune@hacker.com', 'bonjourjesuisunmotdepasse', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Oureib', 'Paul', 'poureib@oui.com', 'umineko', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Caboche Rio', 'Vicent', 'vicent.c.rio@best.com', 'patate', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `watched`
--

CREATE TABLE `watched` (
  `ID_user` bigint UNSIGNED NOT NULL,
  `ID_media` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `watched`
--

INSERT INTO `watched` (`ID_user`, `ID_media`, `date`, `created_at`, `updated_at`) VALUES
(3, 1, '2020-11-01', NULL, NULL),
(4, 1, '2019-11-12', NULL, NULL),
(11, 1, '2019-09-12', NULL, NULL),
(10, 3, '2019-03-13', NULL, NULL),
(8, 4, '2007-11-14', NULL, NULL),
(9, 4, '2013-11-14', NULL, NULL),
(3, 5, '2021-06-02', NULL, NULL),
(8, 6, '2002-11-07', NULL, NULL),
(11, 6, '2010-02-18', NULL, NULL),
(4, 8, '2017-11-09', NULL, NULL),
(8, 8, '2015-07-15', NULL, NULL),
(5, 9, '2016-10-13', NULL, NULL),
(6, 10, '2019-04-16', NULL, NULL),
(7, 10, '2019-04-16', NULL, NULL),
(3, 11, '2012-11-01', NULL, NULL),
(9, 12, '2017-02-02', NULL, NULL),
(10, 12, '2014-11-05', NULL, NULL),
(5, 13, '2014-01-07', NULL, NULL),
(12, 13, '2021-11-26', NULL, NULL),
(5, 14, '2021-08-03', NULL, NULL),
(12, 15, '2020-09-18', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD PRIMARY KEY (`ID_media`,`ID_playlist`),
  ADD KEY `belongs_to_id_media_index` (`ID_media`),
  ADD KEY `belongs_to_id_playlist_index` (`ID_playlist`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id_user_foreign` (`ID_user`),
  ADD KEY `comment_id_media_foreign` (`ID_media`);

--
-- Index pour la table `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`ID_media`,`ID_person`),
  ADD KEY `compose_id_media_index` (`ID_media`),
  ADD KEY `compose_id_person_index` (`ID_person`);

--
-- Index pour la table `defined`
--
ALTER TABLE `defined`
  ADD PRIMARY KEY (`ID_media`,`ID_category`),
  ADD KEY `defined_id_media_index` (`ID_media`),
  ADD KEY `defined_id_category_index` (`ID_category`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`ID_media`,`ID_user`),
  ADD KEY `liked_id_user_index` (`ID_user`),
  ADD KEY `liked_id_media_index` (`ID_media`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `moderate`
--
ALTER TABLE `moderate`
  ADD PRIMARY KEY (`ID_comment`,`ID_user`),
  ADD KEY `moderate_id_comment_index` (`ID_comment`),
  ADD KEY `moderate_id_user_index` (`ID_user`);

--
-- Index pour la table `own`
--
ALTER TABLE `own`
  ADD PRIMARY KEY (`ID_playlist`,`ID_user`),
  ADD KEY `own_id_playlist_index` (`ID_playlist`),
  ADD KEY `own_id_user_index` (`ID_user`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`ID_playlist`,`ID_user`),
  ADD KEY `subscribe_id_playlist_index` (`ID_playlist`),
  ADD KEY `subscribe_id_user_index` (`ID_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `watched`
--
ALTER TABLE `watched`
  ADD PRIMARY KEY (`ID_media`,`ID_user`),
  ADD KEY `watched_id_user_index` (`ID_user`),
  ADD KEY `watched_id_media_index` (`ID_media`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `person`
--
ALTER TABLE `person`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD CONSTRAINT `belongs_to_id_media_foreign` FOREIGN KEY (`ID_media`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `belongs_to_id_playlist_foreign` FOREIGN KEY (`ID_playlist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_media_foreign` FOREIGN KEY (`ID_media`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_id_user_foreign` FOREIGN KEY (`ID_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `compose_id_media_foreign` FOREIGN KEY (`ID_media`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compose_id_person_foreign` FOREIGN KEY (`ID_person`) REFERENCES `person` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `defined`
--
ALTER TABLE `defined`
  ADD CONSTRAINT `defined_id_category_foreign` FOREIGN KEY (`ID_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `defined_id_media_foreign` FOREIGN KEY (`ID_media`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `liked_id_media_foreign` FOREIGN KEY (`ID_media`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `liked_id_user_foreign` FOREIGN KEY (`ID_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `moderate`
--
ALTER TABLE `moderate`
  ADD CONSTRAINT `moderate_id_comment_foreign` FOREIGN KEY (`ID_comment`) REFERENCES `comment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `moderate_id_user_foreign` FOREIGN KEY (`ID_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `own`
--
ALTER TABLE `own`
  ADD CONSTRAINT `own_id_playlist_foreign` FOREIGN KEY (`ID_playlist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `own_id_user_foreign` FOREIGN KEY (`ID_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `subscribe_id_playlist_foreign` FOREIGN KEY (`ID_playlist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribe_id_user_foreign` FOREIGN KEY (`ID_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `watched`
--
ALTER TABLE `watched`
  ADD CONSTRAINT `watched_id_media_foreign` FOREIGN KEY (`ID_media`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watched_id_user_foreign` FOREIGN KEY (`ID_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
