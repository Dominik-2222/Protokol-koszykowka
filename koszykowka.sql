-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 03, 2023 at 03:48 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koszykowka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `a`
--

CREATE TABLE `a` (
  `ID` int(11) NOT NULL,
  `NR` text NOT NULL,
  `Imie_nazwisko` text DEFAULT NULL,
  `Liczba zdobytych punktow` int(11) DEFAULT NULL,
  `liczba trafionych za 1` int(11) DEFAULT NULL,
  `liczba nie trafionych za 1` int(11) DEFAULT NULL,
  `liczba trafionych za 2` int(11) DEFAULT NULL,
  `liczba nie trafionych za 2` int(11) DEFAULT NULL,
  `liczba trafionych za 3` int(11) DEFAULT NULL,
  `liczba nie trafionych za 3` int(11) DEFAULT NULL,
  `% trafionych za 2 i 3` int(11) DEFAULT NULL,
  `% trafionych za 1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `b`
--

CREATE TABLE `b` (
  `ID` int(11) NOT NULL,
  `NR` text NOT NULL,
  `Imie_nazwisko` text DEFAULT NULL,
  `Liczba zdobytych punktow` int(11) DEFAULT NULL,
  `liczba trafionych za 1` int(11) DEFAULT NULL,
  `liczba nie trafionych za 1` int(11) DEFAULT NULL,
  `liczba trafionych za 2` int(11) DEFAULT NULL,
  `liczba nie trafionych za 2` int(11) DEFAULT NULL,
  `liczba trafionych za 3` int(11) DEFAULT NULL,
  `liczba nie trafionych za 3` int(11) DEFAULT NULL,
  `% trafionych za 2 i 3` int(11) DEFAULT NULL,
  `% trafionych za 1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `b`
--

INSERT INTO `b` (`ID`, `NR`, `Imie_nazwisko`, `Liczba zdobytych punktow`, `liczba trafionych za 1`, `liczba nie trafionych za 1`, `liczba trafionych za 2`, `liczba nie trafionych za 2`, `liczba trafionych za 3`, `liczba nie trafionych za 3`, `% trafionych za 2 i 3`, `% trafionych za 1`) VALUES
(1, '1', NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(2, '2', NULL, 4, 0, 0, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `druzyny`
--

CREATE TABLE `druzyny` (
  `Nazwa A` text NOT NULL,
  `Wynik A` int(11) NOT NULL,
  `Wynik B` int(11) NOT NULL,
  `Nazwa B` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przebieg_gry`
--

CREATE TABLE `przebieg_gry` (
  `ID` int(11) NOT NULL,
  `NR` int(11) NOT NULL,
  `l_pkt` int(11) NOT NULL,
  `czy_trafil` int(11) NOT NULL,
  `druzyna` text DEFAULT NULL,
  `godzina_wpisania` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `a`
--
ALTER TABLE `a`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `b`
--
ALTER TABLE `b`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `przebieg_gry`
--
ALTER TABLE `przebieg_gry`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a`
--
ALTER TABLE `a`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `b`
--
ALTER TABLE `b`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `przebieg_gry`
--
ALTER TABLE `przebieg_gry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
