-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Out-2021 às 23:57
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
  `login` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `anexo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `celular`, `login`, `senha`, `anexo`) VALUES
(1, 'Lucas sena', 'admin@gmail.com', '88981754649', 'admin', 'admin', '6154c2e54d468.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` char(14) NOT NULL,
  `login` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `condicao` enum('s','n') NOT NULL,
  `anexo` varchar(60) NOT NULL,
  `descricao` text NOT NULL,
  `turma` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `email`, `celular`, `login`, `senha`, `condicao`, `anexo`, `descricao`, `turma`) VALUES
(5, 'lucas sena', 'lucas@gmail.com', '88992450331', 'lucas@gmail.com', '$2y$10$d2USufP.iXwTpQST/kQJre9z/.mhBuGpZXBWBsDD9Wz9YkhqDlvP2', 's', '615dfb4e0543e.jpg', '                                                                                                                                                                                                                                                                                                                                                treinamento de hipertrofia                                                                                                                                                                                                                                                                                                                     ', 'bodybuilder'),
(6, 'Damião lucas', 'l@gmail.com', '88981754649', 'l@gmail.com', '$2y$10$FDSM0SYtMoHieaU6o4UAOOn4O3mdRyt4951GWK1KBaAHHm7vyL4g6', 's', '615dfb35b7d58.png', '                                                amador                                            ', 'crossFit');

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
  ADD UNIQUE KEY `login` (`login`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
