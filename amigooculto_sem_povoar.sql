-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/11/2019 às 01:24
-- Versão do servidor: 10.4.8-MariaDB
-- Versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `amigooculto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `presentes`
--

CREATE TABLE `presentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `possui` tinyint(1) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `preview`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `preview` (
`sorteio_id` bigint(20) unsigned
,`user_id` bigint(20) unsigned
,`descricao` varchar(255)
,`email` varchar(255)
,`nome` varchar(255)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultados`
--

CREATE TABLE `resultados` (
  `id_usuario` int(11) NOT NULL,
  `id_sorteado` int(11) DEFAULT NULL,
  `id_sorteio` bigint(20) UNSIGNED NOT NULL,
  `sorteou` int(11) NOT NULL DEFAULT 0,
  `sorteado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sorteios`
--

CREATE TABLE `sorteios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sorteio_user`
--

CREATE TABLE `sorteio_user` (
  `sorteio_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_presentes`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_presentes` (
`id` bigint(20) unsigned
,`nome` varchar(255)
,`email` varchar(255)
,`descricao` varchar(255)
,`possui` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura para view `preview`
--
DROP TABLE IF EXISTS `preview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `preview`  AS  select `sorteio_user`.`sorteio_id` AS `sorteio_id`,`sorteio_user`.`user_id` AS `user_id`,`sorteios`.`descricao` AS `descricao`,`users`.`email` AS `email`,`users`.`nome` AS `nome` from ((`sorteio_user` join `sorteios` on(`sorteios`.`id` = `sorteio_user`.`sorteio_id`)) join `users` on(`users`.`id` = `sorteio_user`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_presentes`
--
DROP TABLE IF EXISTS `view_presentes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_presentes`  AS  select `u`.`id` AS `id`,`u`.`nome` AS `nome`,`u`.`email` AS `email`,`p`.`descricao` AS `descricao`,`p`.`possui` AS `possui` from (`users` `u` join `presentes` `p`) where `u`.`id` = `p`.`user_id` ;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `presentes`
--
ALTER TABLE `presentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presentes_user_id_foreign` (`user_id`);

--
-- Índices de tabela `sorteios`
--
ALTER TABLE `sorteios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sorteio_user`
--
ALTER TABLE `sorteio_user`
  ADD PRIMARY KEY (`sorteio_id`,`user_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `presentes`
--
ALTER TABLE `presentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sorteios`
--
ALTER TABLE `sorteios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `presentes`
--
ALTER TABLE `presentes`
  ADD CONSTRAINT `presentes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
