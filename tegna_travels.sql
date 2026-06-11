-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 11 jun 2026 om 10:54
-- Serverversie: 8.4.8
-- PHP-versie: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tegna_travels`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trips`
--

CREATE TABLE `trips` (
  `id` int NOT NULL,
  `locatie` varchar(100) NOT NULL,
  `land` varchar(100) NOT NULL,
  `prijs` int NOT NULL,
  `duur` varchar(50) NOT NULL,
  `beschrijving` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `trips`
--

INSERT INTO `trips` (`id`, `locatie`, `land`, `prijs`, `duur`, `beschrijving`, `foto`) VALUES
(1, 'Santorini', 'Griekenland', 4200, '7 nachten', 'Witgekalkte cliffside villa\'s met privébutler en uitzicht op de caldera bij zonsondergang.', 'Santorini_Small_Picture.png'),
(2, 'Malé Atol', 'Maldiven', 7800, '7 nachten', 'Overwater villa\'s, huisrif binnen handbereik, en privédiners op een onbewoond zandeiland.', 'Male_Small_Picture.png'),
(3, 'Amalfikust', 'Italië', 5400, '7 nachten', 'Citroengaarden, klassieke Riva-boottochten, en intieme tafels in Positano.', 'Amalfikust_Small_Pictures.png'),
(4, 'Ubud', 'Indonesië', 3200, '10 nachten', 'Verborgen jungle villa\'s met privézwembad en uitzicht over de rijstvelden.', 'Ubud_Small_Picture.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `created`, `role`) VALUES
(1, 'db.rosmalen@icloud.com', 'Billetjje', 'Adam', '2026-06-02 09:31:18', 'user'),
(2, 'adamgeitenneuker@gmail.com', 'Billentjes123', 'Pikkelikker', '2026-06-02 09:31:52', 'user'),
(8, 'Abshiri@gmail.com', 'AnaalSoldaat', 'Abshiri', '2026-06-02 09:57:55', 'user'),
(9, '', '', '', '2026-06-02 09:59:03', 'user');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
