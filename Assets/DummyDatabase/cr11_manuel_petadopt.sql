-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Jul 2020 um 03:35
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_manuel_petadopt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `animalID` int(11) NOT NULL,
  `animal_name` varchar(128) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `location` varchar(64) DEFAULT NULL,
  `animal_type` varchar(64) DEFAULT NULL,
  `animal_age` int(2) DEFAULT NULL,
  `phone_number` int(32) NOT NULL,
  `animal_image` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`animalID`, `animal_name`, `zipcode`, `location`, `animal_type`, `animal_age`, `phone_number`, `animal_image`) VALUES
(3, 'Fluffy', 1234, 'YourTown', 'Cat', 2, 12345678, 'Assets/DummyPictures/fluff1.jpg'),
(4, 'Miezi', 1234, 'YourTown', 'Cat', 5, 12345678, 'Assets/DummyPictures/fluff2.jpg'),
(5, 'Mittens', 1234, 'YourTown', 'Cat', 9, 12345678, 'Assets/DummyPictures/fluff3.jpg'),
(6, 'Mauzmauz', 1234, 'YourTown', 'Cat', 12, 12345678, 'Assets/DummyPictures/fluff4.jpg'),
(7, 'Noperope', 1234, 'YourTown', 'Green Treepython', 17, 12345678, 'Assets/DummyPictures/fluff5.jpg'),
(8, 'Darling', 1234, 'YourTown', 'Saltwater Crocodile', 34, 12345678, 'Assets/DummyPictures/fluff6.jpg'),
(9, 'Fluffball', 1234, 'YourTown', 'Chinchilla', 2, 12345678, 'Assets/DummyPictures/fluff7.jpg'),
(10, 'Dangerkitty', 1234, 'YourTown', 'Cat', 7, 12345678, 'Assets/DummyPictures/fluff8.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `nickname` varchar(25) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `registerDate` datetime DEFAULT NULL,
  `status` enum('user','admin','superadmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `nickname`, `email`, `password`, `profileImage`, `registerDate`, `status`) VALUES
(18, 'John', 'Doe', 'foo', 'example88@gmail.com', '$2y$10$YC9gdOmjMzihXXnnO46kXuuDz/WBk9MY5837hKMsAZ/HJO2dh4Psu', './Assets/ProfileImages/640x640_eebc767b-55fd-409e-9073-0f4d1ea00e27.jpg', '2020-07-25 19:50:02', 'user'),
(19, 'John', 'Doe', 'admin', 'admin@gmail.com', '$2y$10$6K6BV7Ip9VafIxFCQSujrOaAlpycTsXQRawkkK7VEugDP3nDArflG', './Assets/ProfileImages/640x640_eebc767b-55fd-409e-9073-0f4d1ea00e27.jpg', '2020-07-25 19:51:45', 'admin'),
(20, 'John', 'Doe', 'qadfgad', 'super@gmail.com', '$2y$10$rp4JbTY5CkMYa1kLZ/RYOOhbx2PMmhBolkq7ngvRUuyhGR1beoDo.', './Assets/ProfileImages/640x640_eebc767b-55fd-409e-9073-0f4d1ea00e27.jpg', '2020-07-25 19:57:37', 'superadmin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `animalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
