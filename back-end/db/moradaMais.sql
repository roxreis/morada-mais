-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/11/2020 às 22:55
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moradaMais`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `nivel` tinyint(1) UNSIGNED NOT NULL,
  `cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id_msg` int(11) NOT NULL,
  `nome_msg` varchar(100) NOT NULL,
  `email_msg` varchar(150) NOT NULL,
  `tel_msg` varchar(11) DEFAULT NULL,
  `texto_msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `mensagem`
--

INSERT INTO `mensagem` (`id_msg`, `nome_msg`, `email_msg`, `tel_msg`, `texto_msg`) VALUES
(1, 'Rodrigo Aparecido de Assunção dos Reis', 'rodrigoassuncao12@gmail.com', '11981198706', 'eeeeeeeeeeeeeeeeeeeeeee');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `lembrete_senha` varchar(200) NOT NULL,
  `user_cpf` varchar(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_nivel` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `user_ativo` tinyint(1) NOT NULL DEFAULT 1,
  `check_locador` varchar(1) DEFAULT NULL,
  `check_locatario` varchar(1) DEFAULT NULL,
  `regiao` varchar(50) DEFAULT NULL,
  `descricao_imovel` varchar(500) DEFAULT NULL,
  `cadastro` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `first_name`, `last_name`, `user_pass`, `lembrete_senha`, `user_cpf`, `user_email`, `user_nivel`, `user_ativo`, `check_locador`, `check_locatario`, `regiao`, `descricao_imovel`, `cadastro`) VALUES
(64, 'teste', 'Teste Sobrenome', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'teste', '11120119863', 'teste@teste', 1, 1, '1', '', 'Escolha uma opção', '', '2020-11-06 00:30:35'),
(63, 'Elsa', 'Soares', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9', 'toto', '99999999999', 'elsa@soares', 1, 1, '', '', 'Escolha uma opção', '\"\"\"\"', '2020-11-05 23:42:58');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Índices de tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_msg`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_cpf` (`user_cpf`),
  ADD KEY `user_nivel` (`user_nivel`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
