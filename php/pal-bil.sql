-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 01 jan 2021 kl 11:58
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `pal-bil`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `manufacturers` varchar(30) NOT NULL,
  `year` int(4) NOT NULL,
  `distance` int(10) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `cars`
--

INSERT INTO `cars` (`id`, `userID`, `title`, `manufacturers`, `year`, `distance`, `description`, `image`, `date`) VALUES
(1, 1, 'test', 'Audi', 0, 0, 'testar', ' ', '2020-12-29 14:56:41'),
(2, 1, 'Säljer min audi', 'Audi', 0, 0, 'fin fin bil', ' ', '2020-12-30 14:14:49'),
(5, 1, 'testar', 'Audi', 0, 0, 'testar', ' ', '2020-12-30 14:44:32');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'andreas', 'andreaswallstrom098@gmail.com', '4297f44b13955235245b2497399d7a93', 'admin'),
(2, 'stefan', 'stefanhalllberg@live.se', '3d186804534370c3c817db0563f0e461', 'admin');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`) USING BTREE;

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
