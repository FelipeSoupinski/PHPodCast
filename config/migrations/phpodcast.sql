-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2020 às 21:23
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `canais`
--

CREATE TABLE `canais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `canais`
--

INSERT INTO `canais` (`id`, `nome`, `categoria`, `descricao`, `imagem`, `usuario_id`, `created`, `modified`) VALUES
(2, 'Imagine Dragons', 'Pop', 'Melhor banda de pop rock', 'imaginedragons.jpg', 4, '2020-11-22 01:33:10', '2020-11-22 01:33:10'),
(3, 'Tribo da Periferia', 'Rap nacional', 'Só trap de qualidade', 'tribo.jpg', 2, '2020-11-22 02:25:42', '2020-11-22 02:25:42'),
(4, 'NerdCast', 'Entretenimento', 'Este é o canal Nerdcast, o seu podcast diário de informações e descontrações. Venha se ligar conosco em mais uma viagem ao mundo da lua...', 'nerdcast.jpg', 3, '2020-11-22 03:10:08', '2020-11-22 03:10:08'),
(5, 'MC Luan', 'Funk', 'Canal do MC Luan da BS', 'artworks-000643943857-8pfnzo-t500x500.jpg', 5, '2020-11-27 02:14:24', '2020-11-27 02:14:24'),
(6, 'Baroes da pisadinha', 'Forró', 'O melhor do forró', 'baroes.png', 1, '2020-11-27 17:07:56', '2020-11-27 21:38:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `episodios`
--

CREATE TABLE `episodios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `canai_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `arquivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `episodios`
--

INSERT INTO `episodios` (`id`, `titulo`, `descricao`, `canai_id`, `data`, `arquivo`) VALUES
(1, 'Matuto se apaixonou pela morena', 'Uma morena dos cabelos grandes, uma estrutura dessa acabou com o homem...', 6, '2020-11-21', ''),
(2, 'Recairei', 'Eu já te superei, mas não manda mensagem, por favor, senão recairei.', 6, '2020-11-21', '-a-recairei-ao-vivo.mp3'),
(3, 'Investe em mim', 'Investe em mim, aposta tudo em mim, que eu prometo te fazer feliz...', 6, '2020-11-21', '-e-investe-em-mim.mp3'),
(4, 'Believer', 'You made me a, you made me a believer, believer', 2, '2020-11-22', 'believer-audio.mp3'),
(5, 'Demons', 'When you feel my heat Look into my eyes...', 2, '2020-11-22', 'demons-feat-micah-martin.mp3'),
(6, 'Nem foi combinado', 'E Nem foi combinado pra dar certo, e deu bom ...', 3, '2020-11-22', '15-nem-foi-combinado-r10cds-oficial.mp3'),
(7, 'Perdidos em Nárnia', 'Ou dança com a carência em particular Ou coração te leva pra outro lugar', 3, '2020-11-22', '14-perdidos-em-nrnia-r10cds-oficial.mp3'),
(8, 'Fumaça do Gênio', 'Olha a fumaça do gênio, olha a fumaça do gênio ...', 3, '2020-11-22', '13-fumaca-do-genio-r10cds-oficial.mp3'),
(9, 'Cade a quentinha?', 'No episódio de hoje estamos a procura da quentinha. Cade a quentinha?', 4, '2020-11-22', 'cade-a-quentinha.mp3'),
(10, 'Te escolhi', 'Ah, mina eu te escolhi...', 5, '2020-11-27', 'te-escolhi-official-music-video.mp3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estatisticas`
--

CREATE TABLE `estatisticas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `canai_id` int(11) NOT NULL,
  `total_ouvintes` int(11) NOT NULL,
  `horas_reproduzidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estatisticas`
--

INSERT INTO `estatisticas` (`id`, `nome`, `data`, `canai_id`, `total_ouvintes`, `horas_reproduzidas`) VALUES
(1, 'Canal Barões', '2020-11-03', 1, 126, 182),
(0, 'Baroneses', '2020-11-03', 6, 321, 678),
(2, 'Baroneses', '2020-11-03', 6, 321, 678);

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `episodio_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`id`, `episodio_id`, `usuario_id`) VALUES
(4, 3, 1),
(6, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nascimento`, `imagem`, `created`, `modified`) VALUES
(1, 'Breno', 'batma@gmail.com', '$2y$10$/UTUbuoj/9bvP7p8fcCQguSpVIzVxApNeel3yd.xdUXzjG1Qv9J9y', '2000-01-01', 'batman.jpg', '2020-11-13 14:34:19', '2020-11-28 02:38:13'),
(2, 'Ryan', 'brabo@gmail.com', '$2y$10$v9yAQUL00BQYgwFqXlzkPOki0qqAxTGrJyc6asRuwIe/VRcV0Ic16', '2000-01-01', 'robin.jpg', '2020-11-13 14:52:12', '2020-11-13 14:52:12'),
(3, 'João da Silva', 'joao@gmail.com', '$2y$10$jPIdO.ad5JQ5Naf5z98JIeRyux0vkGNZip0QKcWGWblOhCKGanVfy', '2000-10-10', NULL, '2020-11-16 01:45:32', '2020-11-16 01:45:32'),
(4, 'gui arakaki', 'gui@gmail.com', '$2y$10$C0iMgUKb0u3LCqxdtmyRH.zBqBlxfbEFt78fvgMMdFy4vPxhG58GS', '2001-01-01', NULL, '2020-11-22 01:27:50', '2020-11-22 01:27:50'),
(5, 'MC Luan', 'luan@gmail.com', '$2y$10$uQZumHERCx2TVwpshtCTe.H4hJ6watMqxCuCBTUP3n./MWg65z/3C', '1990-01-01', NULL, '2020-11-27 02:11:00', '2020-11-27 02:11:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canais`
--
ALTER TABLE `canais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodios`
--
ALTER TABLE `episodios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
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
-- AUTO_INCREMENT for table `canais`
--
ALTER TABLE `canais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `episodios`
--
ALTER TABLE `episodios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
