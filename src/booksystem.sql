-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/05/2026 às 19:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `booksystem`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `data_publicacao` date NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `autor`, `categoria`, `data_publicacao`, `quantidade`) VALUES
(9, 'Entendendo Algoritmos', 'Aditya Y. Bhargava', 'Algoritmo', '2017-01-01', 3),
(13, 'Banco de Dados Teoria e Desenvolvimento', 'Willian Pereira Alves', 'Banco de Dados', '2020-11-24', 8),
(14, 'PHP Programando com Orientação a Objetos', 'Pablo Dall Oglio', 'Programação', '2018-08-13', 3),
(15, 'Java Script: O Guia Definitivo', 'David Flanagan', 'Programação', '2025-11-13', 9),
(16, 'Introdução à Programação com Python', 'Nilo Ney Coutinho Menezes', 'Programação', '2024-03-11', 7),
(17, 'Programação Utilizando IA', 'Tom Taulli', 'Programação', '2024-09-09', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `RA` varchar(20) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `RA`, `senha`, `email`, `telefone`) VALUES
(24, 'GUILHERME GARCIA DE FRANÇA', '3026101032', '$2y$10$als4uQmSTqlO3vXZnTcZeOv8DhDlEQk/LABAkHmX4l/l53DRPwgYS', 'guigarcia@gmail.com', '11959230351'),
(25, 'KAIO FREITAS', '3126101757', '$2y$10$9NLMCK/8Ab2mTmerjoskMeTTJkMXigNtGdfNucoVkcjXO8kiBxR82', 'kaio@gmail.com', '11914781527'),
(26, 'HUGO FARIAS CAVALCANTE', '3026103248', '$2y$10$87IAcgzUSzp1Cv/qn.AyMuD6zQsjAIIW0t9zFLYTnSRqrWUd0tG7y', 'hugo@gmail.com', '11993680740'),
(27, 'GUILHERME GONÇALVES DA SILVA', '3025204388', '$2y$10$/IKf/yAPrTHLrFgy0qlIDuJJYVNp6gizwTq0X6EOWeXr2qisx6tyq', 'guigoncalves@gmail.com', '11963291435'),
(28, 'MATHEUS DA SILVA PEREIRA', '3126100908', '$2y$10$2DWyvcAT.Kn3SNFnkVtUh.ozt1MLp3mB/EAdyP3/7P3xARsvGESke', 'matheussilva@gmail.com', '11954657972'),
(29, 'IGOR TEODORO PEREIRA', '3026103857', '$2y$10$tMkqw7c7NkKQuCjbZfGqle1LGSM0.KbsKap16ogGGb8Fj0D4ARYwm', 'igor@gmail.com', '11948980492'),
(30, 'PAULO HENRIQUE TELES LAURENTI', '3025102923', '$2y$10$DMn.ppByUP9CbMmvsYd0Pe1.znP9jOqnXxK0etlzCVqX.S0PKm/my', 'paulo@gmail.com', '11948083567'),
(31, 'GUILHERME AMORIM', '3026103926', '$2y$10$r80HhNvW2Py.9d7Q2KK1/uGqNslLiJgj44slosOobh0iPwlhez7na', 'guiamorim@gmail.com', '11969057084'),
(32, 'LUCAS FERNANDES', '3126102099', '$2y$10$F7zmduaXXfzP.SYeeQHnTOu0Mh/d2v3hZq6svGFLzYo8g7GVSv5nO', 'lucas@gmail.com', '11932643501'),
(33, 'SABRINE APARECIDA DA SILVA', '3026105659', '$2y$10$c93/gOi.YgVQdVelhXRhxuiXrFjJgdjFnjR91r2FOZod.tDiKXKgq', 'sabrine@gmail.com', '11988571065'),
(34, 'MATHEUS CLASEN DIOGO', '3024201070', '$2y$10$5tNFNq57.mS6p1RamXgZ.OBZ/57FFb6/0jVwN/a8ZB3KTwyu.s97O', 'matheusclasen@gmail.com', '11983842418');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
