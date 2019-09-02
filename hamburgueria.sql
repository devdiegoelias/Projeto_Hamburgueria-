-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Set-2019 às 06:08
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamburgueria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `igredientes` text,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `status` enum('A Fazer','Em Andamento','Concluido') DEFAULT 'A Fazer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `id_produto`, `quantidade`, `igredientes`, `data`, `hora`, `status`) VALUES
(20, 8, 19, 1, 'Bacon,Ovo', '2019-09-01', '19:17:23', 'Concluido'),
(21, 7, 21, 3, 'Pão,Molho Especial', '2019-09-01', '19:18:01', 'Concluido'),
(22, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-08-28', '19:36:16', 'Concluido'),
(23, 9, 20, 3, 'Salada,Ovo', '2019-08-31', '19:36:22', 'A Fazer'),
(24, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-09-01', '19:36:16', 'Concluido'),
(25, 8, 21, 3, 'Pão,Molho Especial', '2019-09-01', '19:18:01', 'Concluido'),
(26, 7, 21, 3, 'Pão,Molho Especial', '2019-08-20', '19:18:01', 'Concluido'),
(27, 9, 21, 3, 'Pão,Molho Especial', '2019-09-01', '19:18:01', 'Concluido'),
(28, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-09-01', '19:36:16', 'A Fazer'),
(29, 9, 21, 3, 'Pão,Molho Especial', '2019-08-30', '19:18:01', 'Concluido'),
(30, 9, 21, 3, 'Pão,Molho Especial', '2019-08-29', '19:18:01', 'Concluido'),
(31, 8, 21, 3, 'Pão,Molho Especial', '2019-09-01', '19:18:01', 'Concluido'),
(32, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-09-01', '19:36:16', 'Em Andamento'),
(33, 7, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-08-28', '19:36:16', 'Em Andamento'),
(34, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-08-30', '19:36:16', 'Em Andamento'),
(35, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-09-01', '19:36:16', 'Concluido'),
(36, 7, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-08-31', '19:36:16', 'Em Andamento'),
(37, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-08-28', '19:36:16', 'Em Andamento'),
(38, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-08-28', '19:36:16', 'Em Andamento'),
(39, 9, 26, 5, 'Pão,200g Queijo,3 x Carnes', '2019-08-31', '19:36:16', 'Em Andamento'),
(40, 9, 20, 3, 'Salada,Ovo', '2019-08-28', '19:36:22', 'Em Andamento'),
(41, 7, 20, 3, 'Salada,Ovo', '2019-08-28', '19:36:22', 'A Fazer'),
(42, 9, 20, 3, 'Salada,Ovo', '2019-08-30', '19:36:22', 'Concluido'),
(43, 7, 20, 3, 'Salada,Ovo', '2019-08-28', '19:36:22', 'Concluido'),
(44, 9, 20, 3, 'Salada,Ovo', '2019-08-28', '19:36:22', 'Concluido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `igredientes` text NOT NULL,
  `img` varchar(32) DEFAULT 'padrao.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `igredientes`, `img`) VALUES
(19, 'X-Bacon', '32.28', 'Bacon,Ovo,Queijo,Pão,Salada', '69626755026dc1edb18fad11b1c930a5'),
(20, 'X-Salada', '28.50', 'Salada,Ovo,Carne,Pão', 'fd5d3d27c039bdca6e15daff2f7d3051'),
(21, 'X- tudo', '18.80', 'Pão,Molho Especial,Presunto,Salsicha,Salada,Carne,Pão', '962b219a8b1649e13dc349bb8d9d44be'),
(22, 'Cachorro quente', '15.59', 'Salsicha,Molho Especial,Batata Palha', '35a7da4921eb1666e31e4b4c35bbcec2'),
(23, 'Misto Quente', '9.99', 'Queijo,Presulto,Pão', '1c79366016643929c3f0b7dfdeb7b2c8'),
(25, 'Bruto', '30.00', 'Pão,Queijo,3 x Carne,200g Presulto', '3fed460bfe447df336f6240aab9102ec'),
(26, 'Hamburguer artesanal', '85.05', 'Pão,200g Queijo,300g Batata Palha,3 x Carnes', '08d16b0c6331a42305affc03179b47b4'),
(27, 'Hamburguer Simples', '8.00', 'Pão,Carne,Salada', 'ebf027891b60d0279d83d244c832a0b1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` text NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `permissao` enum('cliente','administrador') NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `telefone`, `endereco`, `bairro`, `cidade`, `permissao`) VALUES
(6, 'Administrador', 'admin@admin', '202cb962ac59075b964b07152d234b70', '14997224399', 'AV Padre barnage giron', 'Portal', 'Dois Córregos', 'administrador'),
(7, 'Diego', 'diego@diego', '202cb962ac59075b964b07152d234b70', '14997224399', 'Av 15 de Novembro', 'Centro', 'Jau', 'cliente'),
(8, 'Jao', 'joao@joao.com', '202cb962ac59075b964b07152d234b70', '14997224399', 'Av 15 de Novembro', 'Centro', 'Jau', 'cliente'),
(9, 'Renato', 'renato@renato.com', '202cb962ac59075b964b07152d234b70', '14997224399', 'Av 15 de Novembro', 'Centro', 'Jau', 'cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pedidos_usuario` (`id_usuario`),
  ADD KEY `FK_pedidos_produtos` (`id_produto`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_pedidos_produtos` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `FK_pedidos_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
