-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Nov-2021 às 01:17
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
(1, 'Lucas sena', 'admin@gmail.com', '88981754649', '$2y$10$8aH6j6H6fKBi6zw3JRCWp.MmThCG0RG1sc/JnyVIx8Ul6vDyTjd8u', '618dac62e387a.jpg');

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
  `turma` varchar(30) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `email`, `celular`, `senha`, `sexo`, `condicao`, `anexo`, `descricao`, `turma`, `link`) VALUES
(1, 'lucas sena', 'lsena.web@gmail.com', '88999642994', '$2y$10$YlPzWpgM5D0JFHal1juYp.eKWHhJSuO.eHubWNPQd.6cZjkXa1IQS', 'm', 's', '61a3899f5438c.jpg', '<span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; text-align: justify;\">é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.</span>', 'bodybuilder', '$2y$10$zX3Rq6lgWRqLs5VN91SQaOE32Pge5SCgkcSFDj2wr.yVDpGTJSSzm');

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
  `dataAtualizacao` date NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `idAluno`, `peso`, `altura`, `imc`, `pescoco`, `ombros`, `peitoral`, `abdomen`, `cintura`, `quadril`, `bicepsDireito`, `bicepsEsquerdo`, `antebracoDireito`, `antebracoEsquerdo`, `coxaDireita`, `coxaEsquerda`, `panturrilhaDireita`, `panturrilhaEsquerda`, `dataAvaliacao`, `dataAtualizacao`, `link`) VALUES
(1, 1, 80, 1.75, 26.1, 40, 120, 90, 80, 60, 80, 40, 40, 30, 30, 60, 60, 50, 50, '2021-11-26', '2021-11-28', '$2y$10$hWNbxw8bNzvsXk4kShUvH.H0Vmeg.MWRRs5s20Qo3CSeNJ90WIpBe'),
(2, 1, 78, 1.78, 24.6, 41, 130, 95, 75, 80, 85, 45, 45, 35, 35, 65, 65, 55, 55, '2021-11-27', '2021-11-28', '$2y$10$EUw7cQau8dSkW.39ZpcpZu30GCyBBvmKXVlJG.QMXndJRAus3C87S'),
(3, 1, 75, 1.78, 23.7, 45, 140, 100, 70, 72, 80, 50, 50, 40, 40, 80, 80, 70, 70, '2021-11-28', '2021-11-28', '$2y$10$ZEmxFghBiqgcv23wXnLsjew8UTfMmjCAmf9lQiY66/zPBO24dS5hm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `magreza` text NOT NULL,
  `normal` text NOT NULL,
  `sobrepeso` text NOT NULL,
  `obesidade` text NOT NULL,
  `obesidadeGrave` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `configs`
--

INSERT INTO `configs` (`id`, `magreza`, `normal`, `sobrepeso`, `obesidade`, `obesidadeGrave`) VALUES
(1, 'Você está abaixo do peso ideal. Isso pode ser apenas uma característica pessoal, mas também pode ser um sinal de desnutrição ou de algum problema de saúde.', 'Parabéns, você está com o peso normal. Recomendamos que mantenha hábitos saudáveis em seu dia a dia. Especialistas sugerem ingerir de 4 a 5 porções diárias de frutas, verduras e legumes, além da prática de exercícios físicos - pelo menos 150 minutos semanais.', 'Atenção! Alguns quilos a mais já são suficientes para que algumas pessoas desenvolvam doenças associadas, como diabetes e hipertensão. É importante rever seus hábitos.', 'Sinal de alerta! O excesso de peso é fator de risco para desenvolvimento de outros problemas de saúde. A boa notícia é que uma pequena perda de peso já traz benefícios à saúde.', 'Sinal vermelho! Ao atingir este nível de IMC, o risco de doenças associadas é muito alto.');

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
(1, 'crossfit', 'n'),
(2, 'bodybuilder', 's');

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
-- Índices para tabela `configs`
--
ALTER TABLE `configs`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `configs`
--
ALTER TABLE `configs`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
