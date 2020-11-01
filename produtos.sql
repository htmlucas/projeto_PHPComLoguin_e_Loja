-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2017 às 20:51
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produtos`
--
CREATE DATABASE IF NOT EXISTS produtos;
use produtos;
-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(40) CHARACTER SET utf8 NOT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `sobrenome`, `usuario`, `email`, `senha`, `sexo`, `type`) VALUES
(1, 'Wladimir', 'Souza', 'Wladimir', 'wladimir5002@gmail.com', 'wladimir', 'M', 'A'),
(2, 'Lucas', 'Martins', 'LuquinhasDoMine', 'lucasmartinsde@gmail.com', '54609985', 'M', NULL),
(11, 'ASD', 'ASD', 'wladimirr', 'wladimir5002@gmail.com', 'comunistas', 'M', NULL),
(12, 'ASD', 'ASD', 'wladimirrrrrr', 'wladimir5002@gmail.com', 'comunistas', 'M', NULL),
(13, 'ASD', 'ASD', 'asdsd', 'asdasd@gmail.com', 'comunistas', 'M', NULL),
(14, 'Lucas', 'Freitas', 'lucas1998xd', 'lucasmartinsde@hotmail.com', 'lucas', 'M', NULL),
(15, 'Dougras', 'Maicom', 'oi', 'teste@gmail.com', 'oi', 'F', 'U'),
(16, 'Lucas', 'Martins', 'lmdfreitas', 'lucasmartinsde@outlook.com', 'lmf010203', 'M', NULL),
(41, 'MANO', 'QE', 'ACONTECEU', 'AQUI@GMAIL.COM', 'EIM', 'M', NULL),
(42, 'MANO', 'QE', 'ACONTECEUsda', 'AQUsdI@GMAIL.COM', 'comunistas', 'M', NULL),
(43, 'MANO', 'QE', 'asdasdasdasd', 'anasdfi@GMAIL.COM', 'asd', 'M', NULL),
(44, 'asd', 'ASD', 'AASDO', 'ODASJK@JF.COM', 'maicom', 'M', 'H'),
(45, 'asdasdds', 'asddaasd', 'asdasds', 'wladimiasdr5002@gmail.com', 'comunistasasd', 'M', ''),
(46, 'DAS', 'ASD', 'ASDASDAS', 'wladimir5002@ASDgmail.com', 'comunistasASD', 'M', 'U'),
(48, 'Usuario', 'Teste', 'UsuarioTeste', 'usuarioteste@gmail.com', 'usuario', 'M', 'U'),
(49, 'Opa', 'opa', 'opa', 'opa@gmail.com', 'opa', 'M', 'U'),
(50, 'oi', 'oi', 'oiw', 'oi@gmail.com', 'oi', 'M', 'U'),
(51, 'Usuario', 'usuario', 'usuario', 'usuario@usuario.com', '92593303', 'M', 'U'),
(52, 'Maicom', 'Douglas', 'Teste', 'wladimir5003@gmail.com', '54055175', 'M', 'U'),
(53, 'Wladimir', 'Oliveira', 'Oliveira', 'wladimir5005@gmail.com', '40851135', 'M', 'U'),
(54, 'Jessica', 'Batista', 'Jessica', 'jess12345batista@gmail.com', '59853210', 'M', 'U'),
(55, 'Larissa', 'Hidemi', 'Hikao', 'larissa.hikao@gmail.com', '08091999', 'F', 'U');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idmensagem` int(11) NOT NULL,
  `idlogin` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(11) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`idmensagem`, `idlogin`, `titulo`, `conteudo`, `telefone`) VALUES
(1, 1, 'Titulo da mensagem', 'Texto Da mensagem Texto da mensagemTexto Da mensagem Texto da mensagemTexto Da mensagem Texto da mensagemTexto Da mensagem Texto da mensagemTexto Da mensagem Texto da mensagemTexto Da mensagem Texto da mensagem', NULL),
(3, 1, 'Bom dia', 'Bom dia amiguinho', '12982327154'),
(7, 14, 'Ta tudo funcionando agora', 'Esta Ã© uma mensagem como teste para mostrar que estÃ¡ tudo finalmente funcionando', '10999999999'),
(16, 2, 'Mensagem', 'Texto da mensagem', '12981823123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProdutos` int(11) NOT NULL,
  `NomeProduto` varchar(20) CHARACTER SET latin1 NOT NULL,
  `CategoriaProduto` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `CorProduto` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `TamanhoProduto` varchar(3) CHARACTER SET latin1 DEFAULT NULL,
  `ImagemProduto` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PrecoProduto` float(7,2) NOT NULL,
  `DisponibilidadeProduto` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `QuantidadeProduto` int(5) DEFAULT NULL,
  `DescricaoProduto` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idProdutos`, `NomeProduto`, `CategoriaProduto`, `CorProduto`, `TamanhoProduto`, `ImagemProduto`, `PrecoProduto`, `DisponibilidadeProduto`, `QuantidadeProduto`, `DescricaoProduto`) VALUES
(37, 'TESTANDO TESTANDO TE', 'Vestuario', 'Verde', 'GG', '453f26ae3d9b621bc2d2976015c42292.jpg', 49.00, 'DisponÃ­vel', 1, 'fff'),
(38, 'ALGO QUALQUER', 'Calcados', 'Vermelho', 'G', 'f3acb5b2226ae4d6c37066eb83f7041d.png', 49.90, 'DisponÃ­vel', 1, 'FFFF'),
(39, 'Whey Protein  ', 'Alimentos', 'Preto', 'PP', '632abc1170db3baf338a8756f597b5ea.png', 99.90, 'DisponÃ­vel', 1, 'TATATATA'),
(41, 'Bola Jabulani', 'Equipamentos', 'Branco', 'PP', '594ab57f85fc0jabulani.png', 89.00, 'DisponÃ­vel', 1, 'Ã‰ UMA BOLA ZIKA'),
(42, 'Ciclismo Evolution ', 'Acessorios', 'Cinza', 'PP', '594db76e58a13Camisa bicicleta.jpg', 45.99, 'DisponÃ­vel', 100, 'Camisa Esportiva de ciclismo Evolution, Camisa de lÃ£ e elÃ¡stico'),
(43, 'Rush Energy', 'Alimentos', 'Branco', 'M', '594db864cad58Rush Energy.jpg', 80.00, 'DisponÃ­vel', 10000, 'Alimento Rush Energy, o melhor do mercado'),
(44, 'Gatorade', 'Alimentos', 'Vermelho', 'M', '594db8b5ef893Gatorade.jpg', 4.00, 'DisponÃ­vel', 10000, 'Gatorade Ã© uma Ã³tima opÃ§Ã£o de bebida energÃ©tica rica em sais minerais para o dia do esportista'),
(45, 'Camisa Nike', 'Vestuario', 'Branco', 'M', '594db8fc46bd6Camisa Nike.jpg', 70.00, 'DisponÃ­vel', 100, 'Camisa Nike 100% algodÃ£o,  antitranspirante, melhor para esportes'),
(46, 'Camisa Sport', 'Vestuario', 'Vermelho', 'G', '594db94770d5dCamisa Sport.png', 80.00, 'DisponÃ­vel', 20, 'Camisa Sport reserva'),
(47, 'Adidas Autheno', 'Vestuario', 'Preto', 'M', '594db9ac8d037Adidas Autheno.jpg', 40.00, 'DisponÃ­vel', 100, 'Camisa esportiva Adidas Autheno, 100% algodÃ£o, resistente'),
(49, 'Teste', 'Acessorios', 'Vermelho', 'PP', '5953e9879af35Raquete.jpg', 80.00, 'DisponÃ­vel', 30, 'ead'),
(51, 'Patinete do Batman', 'Acessorios', 'Cinza', 'P', '5953ece491ac5patinete do batmanh.jpg', 9990.00, 'DisponÃ­vel', 1, 'Patinete oficial do batman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idmensagem`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProdutos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idmensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProdutos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
