-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 jan 2020 om 22:23
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `ID` int(100) NOT NULL,
  `username` int(100) NOT NULL,
  `text` text COLLATE utf8mb4_icelandic_ci NOT NULL,
  `datum` varchar(20) COLLATE utf8mb4_icelandic_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_icelandic_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post`
--

CREATE TABLE `post` (
  `id` int(100) NOT NULL,
  `titel` varchar(250) COLLATE utf8mb4_icelandic_ci NOT NULL,
  `datum` date NOT NULL,
  `tekst` varchar(500) COLLATE utf8mb4_icelandic_ci NOT NULL,
  `plaatje` varchar(500) COLLATE utf8mb4_icelandic_ci NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_icelandic_ci;

--
-- Gegevens worden geëxporteerd voor tabel `post`
--

INSERT INTO `post` (`id`, `titel`, `datum`, `tekst`, `plaatje`, `image`) VALUES
(1, 'Eerste Post', '2020-01-29', 'Hoi dit is de eerste post', 'Dit is een plaatje', ''),
(2, 'Yo', '0000-00-00', 'Hay', 'Hay', ''),
(4, 'Papa', '0000-00-00', 'Hoi', '', ''),
(6, 'Hay', '0000-00-00', 'Hay', 'Jooony.png', ''),
(9, '', '0000-00-00', '', '', ''),
(10, 'plaayje', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `username` text COLLATE utf8mb4_icelandic_ci NOT NULL,
  `password` text COLLATE utf8mb4_icelandic_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_icelandic_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('Daan', '1234');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
