-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql206.epizy.com
-- Tempo de geração: 09/02/2021 às 13:24
-- Versão do servidor: 5.6.48-88.0
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_27117810_moradamais`
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
  `cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `locador`
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
  `data_cadast` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `locador`
--

INSERT INTO `locador` (`id_imovel`, `titulo`, `descricao_imovel`, `regiao`, `img`, `img2`, `img3`, `id_user`, `valor_aluguel`, `data_cadast`) VALUES
(0, 'Casa prÃ³ximo ao metrÃ´', '2 quartos, cozinha, sala e banhiero', 'Zona Leste', 'http://moradamais.infinityfreeapp.com/img/casas/20-01-21-casa04-02.jpg', 'img/casas/20-01-21-', 'img/casas/20-01-21-', 1, 300, '2021-01-20 21:53:46'),
(0, '2 quartos grandes', '2 quartos, sala, cozinha, banheiro reformado', 'Zona Norte', 'http://moradamais.infinityfreeapp.com/img/casas/20-01-21-casa06-02.jpg', 'img/casas/20-01-21-', 'img/casas/20-01-21-', 1, 300, '2021-01-20 21:58:00'),
(0, 'Casa proximo metro', '2 quartos, cozinha, sala e banhiero', 'Zona Norte', 'http://moradamais.infinityfreeapp.com/img/casas/27-01-21-sala.jpg', 'img/casas/27-01-21-', 'img/casas/27-01-21-', 9, 300, '2021-01-27 14:42:17'),
(0, 'Casa proximo metro', '2 quartos', 'Zona Norte', 'http://moradamais.infinityfreeapp.com/img/casas/28-01-21-casa06-01.jpg', 'img/casas/28-01-21-', 'img/casas/28-01-21-', 16, 0, '2021-01-28 06:36:18'),
(0, 'Casa proxima ao centro', '2 quartos, banheiro, sala ampla e cozinha', 'Zona Norte', 'http://moradamais.infinityfreeapp.com/img/casas/28-01-21-casa06-01.jpg', 'img/casas/28-01-21-', 'img/casas/28-01-21-', 17, 300, '2021-01-28 09:52:12');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `mensagem`
--

INSERT INTO `mensagem` (`id_msg`, `nome_msg`, `email_msg`, `tel_msg`, `texto_msg`) VALUES
(4, 'rodrigo', 'felipe_freiresilva@yahoo.com.br', '11981198706', 'sua mensagem'),
(3, 'rodrigo', 'rodrigoassuncao12@gmail.com', '11981198706', 'sua mensagem'),
(5, 'Camila', 'camila.dpr@hotmail.com', '11980475111', 'Oi, sÃ³ estou testando para curiar o site de vcs :D');

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
  `user_nivel` tinyint(1) NOT NULL,
  `user_ativo` tinyint(1) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `data_cadast` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `first_name`, `last_name`, `user_pass`, `lembrete_senha`, `user_cpf`, `user_email`, `user_nivel`, `user_ativo`, `bio`, `img`, `data_cadast`) VALUES
(1, 'Jane', 'Ribeiro', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '123', '45594092005', 'rodrigo222@gmail.com', 1, 2, 'Fumante e amante da arte', 'http://moradamais.infinityfreeapp.com/img/clientes/20-01-21-elsa-cliente.jpg', '2021-01-27 05:00:00'),
(18, 'rodrigo', 'reis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ppp', '11111111111', 'felipe_freiresilva@yahoo.com.br', 1, 1, 'pp', 'http://moradamais.infinityfreeapp.com/img/clientes/28-01-21-', '2021-01-28 15:41:15'),
(17, 'Antonio', 'Carlos', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', '27499955566', 'antonio@carlos', 1, 1, 'NÃ£o fumante, aceito atÃ© 1 pet (cachorro ou gato)', 'http://moradamais.infinityfreeapp.com/img/clientes/28-01-21-foto-3x4-correto2.jpg', '2021-01-28 14:51:18'),
(19, 'Camila', 'Reis', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'um dois trÃªs quatro cinco seis', '29482696874', 'camila.dpr@hotmail.com', 1, 1, 'Testando :)', 'http://moradamais.infinityfreeapp.com/img/clientes/28-01-21-', '2021-01-28 17:09:10');

--
-- Índices de tabelas apagadas
--

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
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
