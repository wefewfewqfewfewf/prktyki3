-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Maj 2024, 09:25
-- Wersja serwera: 11.2.2-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `osoby`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wszys`
--

CREATE TABLE `wszys` (
  `imie` varchar(500) NOT NULL,
  `wiek` int(11) NOT NULL,
  `opis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Zrzut danych tabeli `wszys`
--

INSERT INTO `wszys` (`imie`, `wiek`, `opis`) VALUES
('Anna', 83, 'bomben machen'),
('Jan', 45, 'bomben machen'),
('Katarzyna', 33, 'bomben machen'),
('Piotr', 52, 'bomben machen'),
('Marta', 40, 'bomben machen'),
('Tomasz', 29, 'bomben machen'),
('Alicja', 37, 'bomben machen'),
('Michał', 34, 'bomben machen'),
('Julia', 26, 'bomben machen'),
('Adam', 48, 'bomben machen');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
