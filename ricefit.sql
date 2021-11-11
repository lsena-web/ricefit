-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2021 às 23:13
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ricefit`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(200) NOT NULL,
  `celular` char(14) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `anexo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `celular`, `senha`, `anexo`) VALUES
(1, 'Lucas sena', 'admin@gmail.com', '88981754649', '$2y$10$hub9YFQqHHZjyBPP5LFBBe1PbkP7/I3keb.zrG5wSC9ATZ8ch.vRa', '618c021c7dc71.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` char(14) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `condicao` enum('s','n') NOT NULL,
  `anexo` varchar(60) NOT NULL,
  `descricao` text NOT NULL,
  `turma` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `email`, `celular`, `senha`, `condicao`, `anexo`, `descricao`, `turma`) VALUES
(5, 'lucas sena', 'lucas@gmail.com', '88992450331', '$2y$10$d2USufP.iXwTpQST/kQJre9z/.mhBuGpZXBWBsDD9Wz9YkhqDlvP2', 's', '615dfb4e0543e.jpg', '                                                                                                                                                                                                                                                                                                                                                treinamento de hipertrofia                                                                                                                                                                                                                                                                                                                     ', 'bodybuilder'),
(6, 'Damião lucas', 'l@gmail.com', '88981754649', '$2y$10$FDSM0SYtMoHieaU6o4UAOOn4O3mdRyt4951GWK1KBaAHHm7vyL4g6', 's', '615dfb35b7d58.png', '                                                amador                                            ', 'bodybuilder'),
(8, 'lucas dev', 'dev@gmail.com', '99999999999', '$2y$10$6vlngoJ98F4n9UuS34HgyepDSMqfSkoRI1Xg8kZNCnIHp.SRy.Sxa', 's', '618c054cce2e2.jpg', '<p>asdasdgfhiasfçkiasifgpiasfisahgfagpisaghfipçsfviç uf hgpiasfhgpisdv ifhgviusvupiçs hupiçf 8pi</p>', 'bodybuilder');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios`
--

CREATE TABLE `exercicios` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `descricao` text NOT NULL,
  `anexo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicios`
--

INSERT INTO `exercicios` (`id`, `nome`, `descricao`, `anexo`) VALUES
(1, 'supino reto', '<span style=\"color: rgb(0, 0, 0); font-family: arial, sans-serif;\">O </span><span style=\"font-weight: bolder; color: rgb(0, 0, 0); font-family: arial, sans-serif;\">supino reto</span><font face=\"arial, sans-serif\" style=\"color: rgb(0, 0, 0);\"> consiste essencialmente em uma flexão de ombro horizontal seguida por uma extensão de cotovelo — movimentos potencializados pela carga na barra. Os três principais músculos recrutados são o peitoral maior, tríceps braquial e deltoide1.</font>                                                                                        ', '6154d9c661cce.png'),
(3, 'agachamento', 'sobe desce, desce sobe ', '615e0fb0c5564.mp4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `condicao` enum('s','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`, `condicao`) VALUES
(1, 'bodybuilder', 's'),
(2, 'crossFit', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `cor` varchar(10) NOT NULL,
  `exercicio` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id`, `idAluno`, `titulo`, `cor`, `exercicio`, `descricao`, `inicio`, `fim`) VALUES
(12, 6, 'sdasdasd', '#ffc107', 3, 'asdasdasd', '2021-11-02 00:00:00', '2021-11-03 00:00:00'),
(13, 6, 'agachamento profundo', '#17a2b8', 3, '3 sessões de 20 agachamentos com pesos de 300kg', '2021-11-03 00:00:00', '2021-11-04 00:00:00'),
(14, 6, 'supino de alta performance', '#dc3545', 1, '10 sessões de 10 repetições  30kg', '2021-11-10 00:00:00', '2021-11-13 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `exercicios`
--
ALTER TABLE `exercicios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
