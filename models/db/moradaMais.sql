-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Fev-2021 às 15:55
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

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `nome`, `admin_email`, `admin_pass`, `nivel`, `cadastro`) VALUES
(0, 'Adm', 'adm@adm', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, '2021-02-16 20:05:57'),
(0, 'Adm2', 'adm2@adm', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, '2021-02-16 20:12:35'),
(0, 'Adm2', 'adm2@adm', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, '2021-02-16 20:12:35');

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

--
-- Extraindo dados da tabela `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 0, 20, 'oi\n', '2021-02-16 22:23:52', 1),
(2, 17, 20, 'ola', '2021-02-17 09:46:58', 0),
(3, 20, 17, 'Tudo bem?\n', '2021-02-17 09:51:02', 0),
(4, 20, 20, 'ola\n', '2021-02-17 15:44:06', 0),
(5, 17, 20, 'oi', '2021-02-17 15:45:40', 0),
(6, 17, 20, 'Estou bem\n', '2021-02-18 19:00:08', 0);

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

--
-- Extraindo dados da tabela `locador`
--

INSERT INTO `locador` (`id_imovel`, `titulo`, `descricao_imovel`, `regiao`, `img`, `img2`, `img3`, `id_user`, `valor_aluguel`, `data_cadast`) VALUES
(1, 'Casa prÃ³ximo ao metrÃ´', '2 quartos, cozinha, sala e banhiero', 'Zona Leste', 'http://moradamais.infinityfreeapp.com/img/casas/20-01-21-casa04-02.jpg', 'img/casas/20-01-21-', 'img/casas/20-01-21-', 1, 300, '2021-01-20 21:53:46'),
(3, 'Casa proximo metro', '2 quartos, cozinha, sala e banhiero', 'Zona Norte', 'http://moradamais.infinityfreeapp.com/img/casas/27-01-21-sala.jpg', 'img/casas/27-01-21-', 'img/casas/27-01-21-', 9, 300, '2021-01-27 14:42:17'),
(5, 'Casa proxima ao centro', '2 quartos, banheiro, sala ampla e cozinha', 'Zona Norte', 'http://moradamais.infinityfreeapp.com/img/casas/28-01-21-casa06-01.jpg', 'img/casas/28-01-21-', 'img/casas/28-01-21-', 17, 300, '2021-01-28 09:52:12'),
(13, 'Ótima localização', '3 quartos grandes', 'Zona Leste', 'public/img/casas/17-02-21-banheiro branco com deck.JPG', '/morada-mais/public/img/casas/17-02-21-', '/morada-mais/public/img/casas/17-02-21-', 20, 0, '2021-02-17 17:08:05');

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

--
-- Extraindo dados da tabela `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 0, '2021-02-16 21:44:38', 'no'),
(2, 0, '2021-02-16 21:45:19', 'no'),
(3, 0, '2021-02-16 21:45:33', 'no'),
(4, 0, '2021-02-16 21:46:14', 'no'),
(5, 20, '2021-02-16 21:52:43', 'no'),
(6, 20, '2021-02-17 09:21:08', 'no'),
(7, 20, '2021-02-17 15:10:33', 'no'),
(8, 17, '2021-02-17 14:34:03', 'no'),
(9, 20, '2021-02-17 15:46:07', 'no'),
(10, 17, '2021-02-17 15:47:16', 'no'),
(11, 20, '2021-02-17 19:37:20', 'no'),
(12, 24, '2021-02-17 20:18:53', 'no'),
(13, 20, '2021-02-18 01:09:47', 'no'),
(14, 20, '2021-02-18 19:01:28', 'no'),
(15, 17, '2021-02-18 19:32:59', 'no');

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
(3, 'rodrigo', 'rodrigoassuncao12@gmail.com', '11981198706', 'sua mensagem'),
(5, 'Camila', 'camila.dpr@hotmail.com', '11980475111', 'Oi, sÃ³ estou testando para curiar o site de vcs :D');

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
(27, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '00000000000', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 19:49:36'),
(17, 'Antonio', 'Carlos', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', '27499955566', 'antonio@carlos', 1, 1, 'NÃ£o fumante, aceito atÃ© 1 pet (cachorro ou gato)', 'http://moradamais.infinityfreeapp.com/img/clientes/28-01-21-foto-3x4-correto2.jpg', '11981198706', '2021-01-28 14:51:18'),
(20, 'Rodrigo', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', '11111111111', 'rodrigo@reis', 1, 1, 'Não fumante', 'img/clientes/09-02-21-imagem-rosto.jpeg', '11980475199', '2021-02-09 18:27:22'),
(28, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 19:51:27'),
(24, 'Silvia', 'Santos', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', '22222222222', 'silvia@santos', 1, 1, 'Não fumante', 'public/img/clientes/17-02-21-banheiro branco com deck.JPG', '', '2021-02-17 20:15:54'),
(26, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '00000000000', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 19:49:36'),
(29, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 19:51:27'),
(30, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 19:56:53'),
(31, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 19:56:53'),
(32, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '77777777777', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 19:59:05'),
(33, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '77777777777', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 19:59:05'),
(34, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:14:08'),
(35, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:14:08'),
(36, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:17:16'),
(37, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:17:16'),
(38, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:17:54'),
(39, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:17:54'),
(40, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:18:47'),
(41, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:18:47'),
(42, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:24:47'),
(43, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:24:47'),
(44, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:26:14'),
(45, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:26:14'),
(46, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:27:31'),
(47, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:27:31'),
(48, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:37:16'),
(49, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:37:16'),
(50, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:38:57'),
(51, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:38:57'),
(52, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:48:06'),
(53, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:48:06'),
(54, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:53:37'),
(55, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:53:37'),
(56, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:55:12'),
(57, 'Rodrigo Aparecido de Assunção', 'Reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '99999999999', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:55:12'),
(58, 'cpf ', 'valido', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '29482696875', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:59:36'),
(59, 'cpf ', 'valido', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '29482696875', 'rodrigoassuncao12@gmail.com', 1, 1, '', 'public/img/clientes/18-02-21-', '1199999999', '2021-02-18 20:59:36');

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
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
