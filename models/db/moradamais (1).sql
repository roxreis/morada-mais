-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Fev-2021 às 17:22
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moradamais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `nivel` tinyint(1) UNSIGNED NOT NULL,
  `cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locador`
--

CREATE TABLE `locador` (
  `id_imovel` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descricao_imovel` varchar(500) NOT NULL,
  `regiao` varchar(100) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `img2` varchar(250) DEFAULT NULL,
  `img3` varchar(250) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `valor_aluguel` float NOT NULL,
  `data_cadast` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id_msg` int(11) NOT NULL,
  `nome_msg` varchar(100) NOT NULL,
  `email_msg` varchar(150) NOT NULL,
  `tel_msg` varchar(11) DEFAULT NULL,
  `texto_msg` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id_msg`, `nome_msg`, `email_msg`, `tel_msg`, `texto_msg`) VALUES
(4, 'rodrigo', 'felipe_freiresilva@yahoo.com.br', '11981198706', 'sua mensagem'),
(3, 'rodrigo', 'rodrigoassuncao12@gmail.com', '11981198706', 'sua mensagem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `lembrete_senha` varchar(200) NOT NULL,
  `user_cpf` varchar(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_nivel` tinyint(1) NOT NULL,
  `user_ativo` tinyint(1) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `celular` varchar(80) NOT NULL,
  `data_cadast` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `first_name`, `last_name`, `user_pass`, `lembrete_senha`, `user_cpf`, `user_email`, `user_nivel`, `user_ativo`, `bio`, `img`, `celular`, `data_cadast`) VALUES
(60, 'Rodrigo', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', '', 'rodrigo@reis', 1, 1, 'Não fumante, aceito até 1 pet', 'public/img/clientes/19-02-21-09-02-21-imagem-rosto.jpeg', '11999999999', '2021-02-19 15:35:55');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Índices para tabela `locador`
--
ALTER TABLE `locador`
  ADD PRIMARY KEY (`id_imovel`);

--
-- Índices para tabela `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_msg`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `locador`
--
ALTER TABLE `locador`
  MODIFY `id_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
