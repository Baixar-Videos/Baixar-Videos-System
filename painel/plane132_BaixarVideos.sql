-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 13-Jun-2018 às 00:02
-- Versão do servidor: 5.5.51-38.2
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plane132_BaixarVideos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fi_lancamentos`
--

CREATE TABLE IF NOT EXISTS `fi_lancamentos` (
  `id` int(11) NOT NULL,
  `data` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pagador` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  `rumo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_mes` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fi_lancamentos`
--

INSERT INTO `fi_lancamentos` (`id`, `data`, `categoria`, `descricao`, `pagador`, `status`, `valor`, `rumo`, `data_mes`) VALUES
(1, '2016-04-05', 'Dominio', 'Registro do dominio', 'UOL HOST', 'Pago', 54.9, 'Saida', '2016-04'),
(2, '2017-03-16', 'Dominio', 'RenovaÃ§Ã£o do dominio', 'UOL HOST', 'Pago', 54.9, 'Saida', '2017-03'),
(3, '2016-06-23', 'Adsense', 'Ganhos com anuncios', 'Google Adsense', 'Pago', 47, 'Entrada', '2016-06'),
(4, '2016-09-27', 'Adsense', 'Ganhos com anuncio', 'Google Adsense', 'Pago', 120, 'Entrada', '2016-09'),
(5, '2016-04-05', 'Compras', 'Registro da conta na microsoft store', 'Microsoft - Loja', 'Pago', 46, 'Saida', '2016-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fu_ponto`
--

CREATE TABLE IF NOT EXISTS `fu_ponto` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_mes` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entrada` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `saida` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intervalo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `horas_trabalhadas` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fu_ponto`
--

INSERT INTO `fu_ponto` (`id`, `user_id`, `data`, `data_mes`, `entrada`, `saida`, `intervalo`, `horas_trabalhadas`) VALUES
(1, 1, '2017-09-01', '2017-09', '22:15', '06:15', '01:00', '07:00'),
(2, 1, '2017-09-10', '2017-09', '17:02', '01:02', '01:00', '07:00'),
(3, 1, '2017-09-14', '2017-09', '18:22', '02:22', '01:00', '07:00'),
(4, 1, '2017-09-26', '2017-09', '20:50', '04:50', '01:00', '07:00'),
(5, 1, '2017-09-27', '2017-09', '14:11', '22:11', '01:00', '07:00'),
(6, 1, '2017-09-28', '2017-09', '13:50', '21:50', '01:00', '07:00'),
(7, 1, '2017-09-29', '2017-09', '13:46', '21:46', '01:00', '07:00'),
(8, 1, '2017-10-16', '2017-10', '01:29', '09:29', '01:00', '07:00'),
(9, 1, '2017-10-29', '2017-10', '05:52', '13:52', '01:00', '07:00'),
(10, 1, '2017-11-10', '2017-11', '21:10', '05:10', '01:00', '07:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `id_seguranca` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_seguranca`, `ip`, `nome`, `usuario`, `senha`) VALUES
(1, '04c18bddc91548f2423a421055936ef97c96794a9daf8743a62397d6c055cf53-8623fb2e6a6e1065d23995fdc5e6de7678c414e2d54e83710c9e4ff030d41a54', '201.6.229.122', 'Rubens Flinco', 'jotinha_br', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fi_lancamentos`
--
ALTER TABLE `fi_lancamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fu_ponto`
--
ALTER TABLE `fu_ponto`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `data` (`data`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fi_lancamentos`
--
ALTER TABLE `fi_lancamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fu_ponto`
--
ALTER TABLE `fu_ponto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
