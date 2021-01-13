-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 13/01/2021 às 21:32
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
-- Estrutura para tabela `locador`
--

CREATE TABLE `locador` (
  `id_imovel` int(11) NOT NULL,
  `descricao_imovel` varchar(500) NOT NULL,
  `regiao` varchar(100) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `img2` varchar(250) DEFAULT NULL,
  `img3` varchar(250) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `data_cadast` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `locador`
--

INSERT INTO `locador` (`id_imovel`, `descricao_imovel`, `regiao`, `img`, `img2`, `img3`, `id_user`, `data_cadast`) VALUES
(1, '2 quartos', 'Zona Leste', NULL, NULL, NULL, 3, '2021-01-13'),
(2, '3 eeeee', 'Zona Oeste', NULL, NULL, NULL, 1, '2021-01-13'),
(3, '2 quartos', 'Zona Leste', NULL, NULL, NULL, 3, '2021-01-13'),
(4, '3 eeeee', 'Zona Oeste', NULL, NULL, NULL, 1, '2021-01-13'),
(5, '2 quartos', 'Zona Leste', '', '', '', 5, '2021-01-13');

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
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `lembrete_senha` varchar(200) NOT NULL,
  `user_cpf` varchar(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_nivel` tinyint(1) NOT NULL DEFAULT 1,
  `user_ativo` tinyint(1) NOT NULL DEFAULT 1,
  `bio` varchar(500) NOT NULL,
  `cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `first_name`, `last_name`, `user_pass`, `lembrete_senha`, `user_cpf`, `user_email`, `user_nivel`, `user_ativo`, `bio`, `cadastro`) VALUES
(1, 'rodrigo', 'reis', '123', '123', '12345678945', 'rodrigo@rodrigo', 1, 1, 'sou legal', '2021-01-13'),
(3, 'rodrigo', 'reis', '123', '123', '12345678945', 'rodrigo@rodrigo', 1, 1, 'sou legal', '2021-01-13'),
(5, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'eee', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, 'eeee', '2021-01-13'),
(6, 'Elsa', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ee', '11120119863', 'elsa@soares', 1, 1, 'ee', '2021-01-13');

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
-- Índices de tabela `locador`
--
ALTER TABLE `locador`
  ADD PRIMARY KEY (`id_imovel`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_msg`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `locador`
--
ALTER TABLE `locador`
  MODIFY `id_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `locador`
--
ALTER TABLE `locador`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
