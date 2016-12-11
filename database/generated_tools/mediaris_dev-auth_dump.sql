-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2016 at 12:19 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `alunos`
--

CREATE TABLE `alunos` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuarios_id` int(10) UNSIGNED DEFAULT NULL,
  `nome_exibicao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alunos`
--

INSERT INTO `alunos` (`id`, `usuarios_id`, `nome_exibicao`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Aluno alunado', '2016-11-10 15:57:21', '2016-11-10 15:57:21'),
(2, NULL, 'Aluno alienado', '2016-11-10 15:57:21', '2016-11-10 15:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `docentes`
--

CREATE TABLE `docentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuarios_id` int(10) UNSIGNED DEFAULT NULL,
  `titulacoes_id` int(10) UNSIGNED DEFAULT NULL,
  `nome_exibicao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `docentes`
--

INSERT INTO `docentes` (`id`, `usuarios_id`, `titulacoes_id`, `nome_exibicao`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Joao polimerno', '2016-11-10 15:57:21', '2016-11-10 15:57:21'),
(2, 2, 2, 'Muriel astolfa', '2016-11-10 15:57:21', '2016-11-10 15:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_08_034156_create-usuarios', 1),
(4, '2016_11_08_034922_create-titulacoes', 1),
(5, '2016_11_08_034940_create-alunos', 1),
(6, '2016_11_08_035249_create-docentes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `titulacoes`
--

CREATE TABLE `titulacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abreviacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `titulacoes`
--

INSERT INTO `titulacoes` (`id`, `nome`, `abreviacao`, `created_at`, `updated_at`) VALUES
(1, 'mestre', 'ME', '2016-11-10 15:57:21', '2016-11-10 15:57:21'),
(2, 'doutor', 'DR', '2016-11-10 15:57:21', '2016-11-10 15:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/profile.png',
  `provider` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `social_id` text COLLATE utf8_unicode_ci NOT NULL,
  `super` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `avatar`, `provider`, `social_id`, `super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joao polimerno', 'jaumjaum@email.me', 'ZdB7LxeHuouPjfKit8RDinyqO7t5u7vABBpVc6IKgtPo0WiuLqO5o5vMLGQmvBei', 'google', 'SeZovIpPeRwW13FrP8sf', 1, NULL, '2016-11-10 15:57:21', '2016-11-10 15:57:21'),
(2, 'Muriel astolfa', 'email@email.me', 'TqmRoJqMnC8bYgjRuBkesqlhHhteTYyGanxqJvtWiMyEGqDWmY5W9VrtlmoacPLy', 'yahoo', 'tItbXlsbUH5nrxXaB7wt', 1, NULL, '2016-11-10 15:57:21', '2016-11-10 15:57:21'),
(3, 'Aluno alunado', 'aluno@email.me', 'b7z3fyS5DbaEDWmrweAAt0hNlGxyd17wwGbs3kqrey7c45Hi7h1Yy3gtq2M8aSo6', 'live', 'ydXJsgjcYXXiOB39hebE', 0, NULL, '2016-11-10 15:57:21', '2016-11-10 15:57:21'),
(4, 'Aluno alienado', 'alunero@email.me', 'vfbhTPjLR1ivW3B43I1WIFLxdA4VLdbYk4yoZr8Y6UxRIWC1y1gApBGylZOx3Aji', 'linkedin', 'xghe39rdV2LxgpwJ5wdV', 0, NULL, '2016-11-10 15:57:21', '2016-11-10 15:57:21'),
(5, 'Cristiano Donizete', 'fromagio_cristiano@live.com', 'https://lh4.googleusercontent.com/-o0T_XWwKkew/AAAAAAAAAAI/AAAAAAAAARA/fWnrwLdjyjQ/photo.jpg?sz=50', 'google', '117735360539689983746', 0, 'ndrwXTsGdWo1EBgS5eKIby88vl3ZFVpCmq5IxZjJP7wIh7VTyEzZTf7xyv2I', '2016-11-10 15:58:12', '2016-12-10 00:12:58'),
(6, 'Cristiano Donizete Fromagio', 'fromagio_cristiano@live.com', '/img/profile.png', 'linkedin', 'lE_QTCRmjF', 0, 'QSZP0MOx68BzECZbGNLsRJ5gGBRU2db5sMHBXtuPwEXgMsN8UYhc7pb27hcD', '2016-11-10 15:59:26', '2016-12-10 00:13:28'),
(7, 'Gerenciador Tarefas', 'gerenciadortgfatec@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 'google', '113761340194905400068', 0, 'Vfmozu3N7e13wnOzhYK7oPE9n9ABCyifZta67HypOhyZWt4G7tXCbVo49WbH', '2016-11-11 15:39:12', '2016-11-11 16:36:29'),
(8, 'Cristiano Fromagio', 'fromagio_cristiano@live.com', '/img/profile.png', 'live', '406b63c723b0d163', 0, 'OgFrWuQwRQiFC0uJJn3cTSQfIdd0bkWwlbeXiv3kqMmBIbw9FKS4KrqzhPf0', '2016-12-07 06:02:14', '2016-12-10 00:13:19'),
(9, 'CRISTIANO DONIZETE FROMAGIO', 'cristiano.fromagio@fatec.sp.gov.br', '/img/profile.png', 'live', '1a5c475d-f5b5-46ba-97c8-f8c6694dfb95', 0, '1Xe3a7VklNvTrTDp7vsoTtviJ1jiA9BaL7o2bES5yESUrffwpTmZBM6t2Inp', '2016-12-07 06:03:40', '2016-12-09 19:03:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alunos_usuarios_id_index` (`usuarios_id`);

--
-- Indexes for table `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docentes_usuarios_id_index` (`usuarios_id`),
  ADD KEY `docentes_titulacoes_id_index` (`titulacoes_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulacoes`
--
ALTER TABLE `titulacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `titulacoes`
--
ALTER TABLE `titulacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_usuarios_id_foreign` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_titulacoes_id_foreign` FOREIGN KEY (`titulacoes_id`) REFERENCES `titulacoes` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `docentes_usuarios_id_foreign` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
