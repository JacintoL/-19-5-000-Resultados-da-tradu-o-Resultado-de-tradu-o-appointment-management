-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Abr-2021 às 20:17
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `restaurante`
--
CREATE DATABASE trabalho1;
USE trabalho1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `nome` varchar(25) NOT NULL,
  `tel` int(11) NOT NULL,
  `nLugares` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `id_Tipo` int(2) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipoutilizador`
--

INSERT INTO `tipoutilizador` (`id_Tipo`, `descricao`) VALUES
(1, 'admin'),
(2, 'visitante'),
(3, 'cliente'),
(5, 'cliente nao validado'),
(4, 'chefe_mesa'),
(6, 'Utilizador apagado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `nomeUtilizador` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `morada` varchar(60) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `telemovel` int(9) NOT NULL,
  `tipoUtilizador` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`nomeUtilizador`, `email`, `morada`, `pass`, `telemovel`, `tipoUtilizador`) VALUES
('admin', 'admin@SUDCB.pt', 'Avenida de Espanha lote 10', '21232f297a57a5a743894a0e4a801fc3', 959654215, 1),
('cliente', 'cliente@hotmail.com','General Humberto Delgado lote 58', '4983a0ab83ed86e0e7213c8783940193', 924584714, 3),
('chefe_mesa', 'chefe_mesa@SUDCB.pt', 'Bairro da Alampada lote 67', 'abc0395e1e050fc33c49aed1e5b163b9', 917654321, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`tel`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
