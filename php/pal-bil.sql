-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 13 jan 2021 kl 15:12
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
  `model` varchar(20) NOT NULL,
  `reg` varchar(8) NOT NULL,
  `manufacturers` varchar(30) NOT NULL,
  `year` int(4) NOT NULL,
  `distance` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `cars`
--

INSERT INTO `cars` (`id`, `userID`, `model`, `reg`, `manufacturers`, `year`, `distance`, `price`, `description`, `date`) VALUES
(60, 1, 'A3', 'sad222', 'Audi', 2000, 2000, 200000, 'fin fin audi A3', '2021-01-13 11:01:43'),
(64, 1, 'M4', 'haj199', 'BMW', 2000, 29999, 20000000, 'bmw', '2021-01-13 14:48:27'),
(65, 1, 'clio', 'ytt888', 'Renault', 2016, 20000, 90000, 'ajajajaj', '2021-01-13 15:07:45'),
(66, 1, 'Fabia', 'uha991', 'Skoda', 2020, 0, 400000, 'test data', '2021-01-13 15:11:31');

-- --------------------------------------------------------

--
-- Tabellstruktur `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `car_id` varchar(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `images`
--

INSERT INTO `images` (`id`, `car_id`, `file_name`) VALUES
(16, '60', '5ffec50770b9e3.08281498.jpg'),
(17, '60', '5ffec50771ad09.41607591.jpg'),
(18, '60', '5ffec50772edd7.84796213.jpg'),
(19, '60', '5ffec50773f4e9.70681299.jpg'),
(20, '61', '5ffec80087aa75.06588289.jpg'),
(21, '61', '5ffec80088f878.76424355.jpg'),
(22, '62', 'pexels-pixabay-38637.jpg'),
(23, '62', 'pexels-pixabay-38637.jpg'),
(24, '62', 'pexels-pixabay-38637.jpg'),
(25, '62', 'pexels-pixabay-38637.jpg'),
(26, '62', 'pexels-pixabay-38637.jpg'),
(29, '63', '5ffeea31b11068.90982266.jpg'),
(30, '63', '5ffeea31b37f20.61561504.jpg'),
(36, '60', '5ffef9c8258fd9.74700880.jpg'),
(37, '60', '5ffef9d9179fe5.41022244.jpg'),
(51, '64', '5ffefd8b0cfc98.71053003.jpg'),
(52, '64', '5ffefd8b0dcf60.55977625.jpg'),
(53, '65', '5ffefeb20038c0.68076244.jpg'),
(55, '66', '5ffeff937ef183.62844083.jpg'),
(57, '66', '5ffeff9380c186.81054195.jpg');

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
-- Index för tabell `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_id` (`car_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT för tabell `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
