-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jan-2023 às 00:28
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blogdesafiofinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Pets'),
(2, 'Pelos'),
(3, 'Alimentação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_post`
--

CREATE TABLE `categoria_post` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria_post`
--

INSERT INTO `categoria_post` (`id`, `id_post`, `id_categoria`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `comentario` varchar(120) NOT NULL,
  `registro_datahora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_usuario`, `id_post`, `comentario`, `registro_datahora`) VALUES
(1, 1, 1, 'Nice', '2023-01-05 14:40:20'),
(2, 1, 1, 'Legal', '2023-01-05 14:40:20'),
(3, 2, 3, 'Teste', '2023-01-05 14:40:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `post_conteudo` varchar(700) NOT NULL,
  `id_visibilidade` int(11) NOT NULL,
  `post_data` datetime NOT NULL DEFAULT current_timestamp(),
  `post_titulo` varchar(30) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `url_post` varchar(100) NOT NULL,
  `post_senha` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `post_modificacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `id_author`, `post_conteudo`, `id_visibilidade`, `post_data`, `post_titulo`, `imagem`, `url_post`, `post_senha`, `status`, `post_modificacao`) VALUES
(1, 1, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica', 2, '2022-12-28 22:28:24', 'cuidados com pets', '/home/user/www/image', 'https:/blog.site.com.br/cuidado-com-pets', NULL, NULL, '2023-01-06 23:47:15'),
(2, 2, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica', 2, '2022-12-28 22:28:24', 'cuidados com os pelos', '/home/user/www/image', 'https:/blog.site.com.br/cuidado-com-os-pelos', NULL, NULL, '0000-00-00 00:00:00'),
(3, 3, 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica', 3, '2022-12-28 22:28:24', 'alimentação', '/home/user/www/image', 'https:/blog.site.com.br/alimentacao', '*****', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Adminstrador'),
(2, 'Autor'),
(3, 'Editor'),
(4, 'Assinante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `create_at`, `id_tipo_usuario`) VALUES
(1, 'guibrochado', 'guibrochado@gmail.com', '*****', '2022-12-21 20:18:00', 1),
(2, 'mariacarol', 'mariacarolina@gmail.com', '*****', '2022-12-21 20:18:00', 2),
(3, 'Marcos', 'marcos@gmail.com', '*****', '2022-12-21 20:18:00', 3),
(5, 'e', 'e@e.com', 'kjlhfli34', '2023-01-03 20:05:48', 1),
(6, 'j', 'j@email.com', 'nkjnek3423', '2023-01-03 21:08:25', 1),
(7, 'manu', 'man@email.com', 'iehor2o4i33', '2023-01-03 21:09:53', 1),
(8, 'mais', 'um@email.com', '983749uhrkjew', '2023-01-03 21:10:59', 1),
(9, 'outro', 'ou@email.com', 'oiehro4j5o23', '2023-01-03 21:11:32', 1),
(10, 'Biri', 'din@aiyolk.com', 'ihi', '2023-01-05 00:03:37', 1),
(11, 'Carlos', 'Jc@email.com', 'nkjqkj33333', '2023-01-05 00:43:17', 4),
(12, 'Eu', 'eu@email.com', 'kmdoin3oie0', '2023-01-06 22:29:03', 3),
(13, 'Eu', 'eu@email.com', 'kmdoin3oie0', '2023-01-06 22:29:25', 3),
(14, 'o', 'o@e.com', 'oio23e4', '2023-01-06 22:29:37', 1),
(15, 'o', 'o@e.com', 'oio23e4', '2023-01-06 22:29:56', 1),
(16, 'w', 'e@e.cm', 'lkwmd333333', '2023-01-06 22:30:09', 1),
(17, 'l', 'k@e.com', 'kmorkm3r324', '2023-01-06 22:30:48', 1),
(18, 'l', 'kl@we,.com', 'owiejo34', '2023-01-06 22:32:54', 1),
(19, '', '', '', '2023-01-07 15:36:29', 1),
(20, '', 'peter@email.com', 'lkj4l3kj4l3', '2023-01-07 16:03:49', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visibilidade`
--

CREATE TABLE `visibilidade` (
  `id` int(11) NOT NULL,
  `visibilidade` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `visibilidade`
--

INSERT INTO `visibilidade` (`id`, `visibilidade`) VALUES
(1, 'publico'),
(2, 'privado'),
(3, 'protegido por senha');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria_post`
--
ALTER TABLE `categoria_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_post` (`id_post`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_visibilidade` (`id_visibilidade`);

--
-- Índices para tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Índices para tabela `visibilidade`
--
ALTER TABLE `visibilidade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categoria_post`
--
ALTER TABLE `categoria_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `visibilidade`
--
ALTER TABLE `visibilidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `categoria_post`
--
ALTER TABLE `categoria_post`
  ADD CONSTRAINT `categoria_post_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `categoria_post_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_visibilidade`) REFERENCES `visibilidade` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
