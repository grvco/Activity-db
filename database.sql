-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Czas generowania: 09 Lip 2022, 20:28
-- Wersja serwera: 5.7.34
-- Wersja PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `abase`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `abase`
--

CREATE TABLE `abase` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `priority` tinyint(1) NOT NULL,
  `activity` varchar(60) NOT NULL,
  `expected_time` int(6) NOT NULL,
  `allocated_time` int(6) DEFAULT NULL,
  `wages` int(6) DEFAULT NULL,
  `hourly` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `abase`
--

INSERT INTO `abase` (`id`, `date`, `priority`, `activity`, `expected_time`, `allocated_time`, `wages`, `hourly`) VALUES
(1, '2022-07-03', 1, 'Pisanie tej tabelki z Kubą', 600, 2000, 1, 0),
(2, '2022-07-03', 1, 'Jedzenie pizz', 1600, 19999, 1, 0),
(3, '2022-07-09', 0, 's', 1, 98, 8, 5),
(4, '2022-07-09', 1, 'don', 3, 7, 7, 60),
(5, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(6, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(7, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(8, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(9, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(10, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(11, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(12, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(13, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(14, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(15, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL),
(16, '2022-07-09', 0, 'a', 1, NULL, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `abase`
--
ALTER TABLE `abase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `abase`
--
ALTER TABLE `abase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
