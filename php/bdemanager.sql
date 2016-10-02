-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Out-2016 às 02:38
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdemanager`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bdtipousuario`
--

CREATE TABLE `bdtipousuario` (
  `codtipousuario` int(11) NOT NULL,
  `desctipousuario` varchar(15) NOT NULL,
  `limitearmazenamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bdtipousuario`
--

INSERT INTO `bdtipousuario` (`codtipousuario`, `desctipousuario`, `limitearmazenamento`) VALUES
(1, 'Professor', 52428800),
(2, 'Coordenador', 78643200);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `codusuario` int(11) NOT NULL,
  `loginusuario` varchar(20) NOT NULL,
  `senhausuario` varchar(25) NOT NULL,
  `totalarmazenado` int(11) NOT NULL,
  `codtipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bdtipousuario`
--
ALTER TABLE `bdtipousuario`
  ADD PRIMARY KEY (`codtipousuario`),
  ADD UNIQUE KEY `codtipousuario` (`codtipousuario`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`codusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bdtipousuario`
--
ALTER TABLE `bdtipousuario`
  MODIFY `codtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `codusuario` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
