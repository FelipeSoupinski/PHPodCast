-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2020 às 04:36
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpodcast`
--
CREATE DATABASE IF NOT EXISTS `phpodcast` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `phpodcast`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `canais`
--

DROP TABLE IF EXISTS `canais`;
CREATE TABLE IF NOT EXISTS `canais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `canais`
--

INSERT INTO `canais` (`id`, `nome`, `categoria`, `descricao`, `imagem`, `usuario_id`, `created`, `modified`) VALUES
(1, 'Barões da pisadinha', 'Forró', 'O melhor do forró', 'baroes.png', 1, '2020-11-21 03:18:38', '2020-11-21 03:18:38'),
(2, 'Imagine Dragons', 'Pop', 'Melhor banda de pop rock', 'imaginedragons.jpg', 4, '2020-11-22 01:33:10', '2020-11-22 01:33:10'),
(3, 'Tribo da Periferia', 'Rap nacional', 'Só trap de qualidade', 'tribo.jpg', 2, '2020-11-22 02:25:42', '2020-11-22 02:25:42'),
(4, 'NerdCast', 'Entretenimento', 'Este é o canal Nerdcast, o seu podcast diário de informações e descontrações. Venha se ligar conosco em mais uma viagem ao mundo da lua...', 'nerdcast.jpg', 3, '2020-11-22 03:10:08', '2020-11-22 03:10:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `episodios`
--

DROP TABLE IF EXISTS `episodios`;
CREATE TABLE IF NOT EXISTS `episodios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `canai_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `arquivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `episodios`
--

INSERT INTO `episodios` (`id`, `titulo`, `descricao`, `canai_id`, `data`, `arquivo`) VALUES
(1, 'Matuto se apaixonou', 'Uma morena dos cabelos grandes, uma estrutura dessa acabou com o homem...', 1, '2020-11-21', '-f-o-matuto-se-apaixonou.mp3'),
(2, 'Recairei', 'Eu já te superei, mas não manda mensagem, por favor, senão recairei.', 1, '2020-11-21', '-a-recairei-ao-vivo.mp3'),
(3, 'Investe em mim', 'Investe em mim, aposta tudo em mim, que eu prometo te fazer feliz...', 1, '2020-11-21', '-e-investe-em-mim.mp3'),
(4, 'Believer', 'You made me a, you made me a believer, believer', 2, '2020-11-22', 'believer-audio.mp3'),
(5, 'Demons', 'When you feel my heat Look into my eyes...', 2, '2020-11-22', 'demons-feat-micah-martin.mp3'),
(6, 'Nem foi combinado', 'E Nem foi combinado pra dar certo, e deu bom ...', 3, '2020-11-22', '15-nem-foi-combinado-r10cds-oficial.mp3'),
(7, 'Perdidos em Nárnia', 'Ou dança com a carência em particular Ou coração te leva pra outro lugar', 3, '2020-11-22', '14-perdidos-em-nrnia-r10cds-oficial.mp3'),
(8, 'Fumaça do Gênio', 'Olha a fumaça do gênio, olha a fumaça do gênio ...', 3, '2020-11-22', '13-fumaca-do-genio-r10cds-oficial.mp3'),
(9, 'Cade a quentinha?', 'No episódio de hoje estamos a procura da quentinha. Cade a quentinha?', 4, '2020-11-22', 'cade-a-quentinha.mp3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estatisticas`
--

DROP TABLE IF EXISTS `estatisticas`;
CREATE TABLE IF NOT EXISTS `estatisticas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `canai_id` int(11) NOT NULL,
  `total_ouvintes` int(11) NOT NULL,
  `horas_reproduzidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `episodio_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nascimento`, `imagem`, `created`, `modified`) VALUES
(1, 'Breno', 'batman@gmail.com', '$2y$10$hXZk/.nIit7/Bl2dGqrsOONzdlsGKn/csUnlPtVMV3JjRMtgFVV0O', '2000-01-01', 'batman.jpg', '2020-11-13 14:34:19', '2020-11-13 14:34:19'),
(2, 'Ryan', 'brabo@gmail.com', '$2y$10$v9yAQUL00BQYgwFqXlzkPOki0qqAxTGrJyc6asRuwIe/VRcV0Ic16', '2000-01-01', 'robin.jpg', '2020-11-13 14:52:12', '2020-11-13 14:52:12'),
(3, 'João da Silva', 'joao@gmail.com', '$2y$10$jPIdO.ad5JQ5Naf5z98JIeRyux0vkGNZip0QKcWGWblOhCKGanVfy', '2000-10-10', NULL, '2020-11-16 01:45:32', '2020-11-16 01:45:32'),
(4, 'gui arakaki', 'gui@gmail.com', '$2y$10$C0iMgUKb0u3LCqxdtmyRH.zBqBlxfbEFt78fvgMMdFy4vPxhG58GS', '2001-01-01', NULL, '2020-11-22 01:27:50', '2020-11-22 01:27:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
