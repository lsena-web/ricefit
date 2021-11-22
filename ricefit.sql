-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2021 às 23:30
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
(1, 'Lucas sena', 'admin@gmail.com', '88981754649', '$2y$10$jO0rhg2pJRyKdK.pRichs.ie6BiViKVNcsV7EN8VjcAzZbVyvAA6a', '618dac62e387a.jpg');

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
  `sexo` enum('m','f') NOT NULL,
  `condicao` enum('s','n') NOT NULL,
  `anexo` varchar(60) NOT NULL,
  `descricao` text NOT NULL,
  `turma` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `email`, `celular`, `senha`, `sexo`, `condicao`, `anexo`, `descricao`, `turma`) VALUES
(5, 'lucas sena', 'lucas@gmail.com', '88992450331', '$2y$10$d2USufP.iXwTpQST/kQJre9z/.mhBuGpZXBWBsDD9Wz9YkhqDlvP2', 'm', 's', '615dfb4e0543e.jpg', '                                                                                                                                                                                                                                                                                                                                                treinamento de hipertrofia                                                                                                                                                                                                                                                                                                                     ', 'bodybuilder'),
(6, 'Damião lucas', 'l@gmail.com', '88981754649', '$2y$10$FDSM0SYtMoHieaU6o4UAOOn4O3mdRyt4951GWK1KBaAHHm7vyL4g6', 'm', 's', '615dfb35b7d58.png', '                                                amador                                            ', 'bodybuilder'),
(8, 'lucas dev', 'dev@gmail.com', '99999999999', '$2y$10$6vlngoJ98F4n9UuS34HgyepDSMqfSkoRI1Xg8kZNCnIHp.SRy.Sxa', 'm', 'n', '618c054cce2e2.jpg', '<p>descrição teste</p>', 'bodybuilder'),
(9, 'Cosmo Samuel Alencar de Sena', 'gerente@gerente.com', '88888888888', '$2y$10$g8pzQZ7Dda5F77jQq.pZ/u9s0VO2ijNbStr1DAgzOGwN4U2.WVZte', 'm', 's', '618dacf4c9608.jpg', 'hipertrofia', 'bodybuilder'),
(10, 'zefinha', 'zefinha@gmail.com', '88977776666', '$2y$10$2oBBC40L0q7PTiQFh8JeNOUf1aWDYyY7S7LvUFbPKR3zLqAXd1.ym', 'f', 's', '61998b3aaa585.jpg', '<p>testando cadastro</p>', 'crossFit'),
(11, 'josefa', 'josefa@gmail.com', '77655554444', '$2y$10$FPjfLp2qPuOM.kyhmKXlreN4nsiMNWLdce/bWpbACcGOM.4re4Tky', 'f', 's', '61998cb2add06.jpg', '<p>testando cadastro de josefa</p>', 'bodybuilder');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `imc` float NOT NULL,
  `pescoco` float NOT NULL,
  `ombros` float NOT NULL,
  `peitoral` float NOT NULL,
  `abdomen` float NOT NULL,
  `cintura` float NOT NULL,
  `quadril` float NOT NULL,
  `bicepsDireito` float NOT NULL,
  `bicepsEsquerdo` float NOT NULL,
  `antebracoDireito` float NOT NULL,
  `antebracoEsquerdo` float NOT NULL,
  `coxaDireita` float NOT NULL,
  `coxaEsquerda` float NOT NULL,
  `panturrilhaDireita` float NOT NULL,
  `panturrilhaEsquerda` float NOT NULL,
  `dataAvaliacao` date NOT NULL,
  `dataAtualizacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `idAluno`, `peso`, `altura`, `imc`, `pescoco`, `ombros`, `peitoral`, `abdomen`, `cintura`, `quadril`, `bicepsDireito`, `bicepsEsquerdo`, `antebracoDireito`, `antebracoEsquerdo`, `coxaDireita`, `coxaEsquerda`, `panturrilhaDireita`, `panturrilhaEsquerda`, `dataAvaliacao`, `dataAtualizacao`) VALUES
(1, 9, 85.5, 1.74, 28.2, 41.5, 121.5, 101.5, 96, 92.5, 105, 39.5, 39.5, 30.5, 29.5, 60.5, 60, 42.5, 41.5, '2021-11-20', '2021-11-21');

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
(3, 'agachamento', 'sobe desce, desce sobe ', '615e0fb0c5564.mp4'),
(4, 'rosca alternada', '<p>gsdfgpuiasdfisaihgfpiasgihsag sughuashgu</p>', '6195807c0ac2b.jpg');

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
(14, 6, 'supino de alta performance', '#dc3545', 1, '10 sessões de 10 repetições  30kg', '2021-11-10 00:00:00', '2021-11-13 00:00:00'),
(16, 9, 'agachamento', '#17a2b8', 3, 'agachamento profundo', '2021-11-17 00:00:00', '2021-11-18 00:00:00'),
(17, 9, 'asdasdasdasd', '#dc3545', 3, 'sdasdasdasdasd', '2021-11-18 00:00:00', '2021-11-22 00:00:00');

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
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
