-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Feb 04, 2023 alle 01:12
-- Versione del server: 8.0.32
-- Versione PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestazioni`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `erogate`
--

DROP TABLE IF EXISTS `erogate`;
CREATE TABLE IF NOT EXISTS `erogate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipologiaPrestazione` int NOT NULL,
  `dataDiVendita` date NOT NULL,
  `quantità` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `erogate`
--

INSERT INTO `erogate` (`id`, `tipologiaPrestazione`, `dataDiVendita`, `quantità`) VALUES
(1, 1, '2023-01-30', 3),
(2, 3, '2023-01-30', 5),
(3, 2, '2023-01-30', 6),
(4, 4, '2023-02-02', 2),
(5, 1, '2023-02-03', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tipologia`
--

DROP TABLE IF EXISTS `tipologia`;
CREATE TABLE IF NOT EXISTS `tipologia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `tempoRisparmiato` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `tipologia`
--

INSERT INTO `tipologia` (`id`, `nome`, `tempoRisparmiato`) VALUES
(1, 'Pagamento bollette', 20),
(2, 'Prenotazioni Poste', 5),
(3, 'Pagamento Multe ', 6),
(4, 'Pagamento Bollo Auto', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
