-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mei 2019 om 13:35
-- Serverversie: 10.1.36-MariaDB
-- PHP-versie: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-p-a`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `abo`
--

CREATE TABLE `abo` (
  `Abo_ID` int(255) NOT NULL,
  `Class` varchar(20) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `abo`
--

INSERT INTO `abo` (`Abo_ID`, `Class`, `Price`) VALUES
(1, 'Maand', 5.99),
(2, 'Jaar', 36.99);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `color`
--

CREATE TABLE `color` (
  `Color_ID` int(20) NOT NULL,
  `Color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `color`
--

INSERT INTO `color` (`Color_ID`, `Color`) VALUES
(1, 'ufoGreen'),
(2, 'plasticPink'),
(3, 'protonPurple'),
(4, 'fieryReds'),
(5, 'oceanBlue'),
(6, 'sunsetOrange');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

CREATE TABLE `factuur` (
  `Invoice_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Abo_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `task`
--

CREATE TABLE `task` (
  `Task_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Task` varchar(150) NOT NULL,
  `Priority` varchar(10) NOT NULL,
  `Description` text NOT NULL,
  `Color_ID` int(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `End_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `task`
--

INSERT INTO `task` (`Task_ID`, `User_ID`, `Task`, `Priority`, `Description`, `Color_ID`, `Date`, `Time`, `End_time`) VALUES
(25, 831873457, 'Study', '4', 'studying', 4, '2019-05-20', '09:30:00', '12:00:00'),
(26, 831873457, 'Free time', '3', 'Free time', 5, '2019-05-20', '18:00:00', '22:00:00'),
(27, 831873457, 'deliver results', '3', 'presenting', 2, '2019-05-23', '14:00:00', '16:00:00'),
(28, 831873457, 'Working on projects', '3', 'help', 2, '2019-05-23', '09:00:00', '14:00:00'),
(29, 831873457, 'Working', '3', 'work', 3, '2019-05-25', '06:00:00', '17:00:00'),
(30, 831873457, 'Project working', '3', '.', 6, '2019-05-22', '09:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user_ID` int(255) NOT NULL,
  `E_mail` varchar(40) NOT NULL,
  `First_name` varchar(25) NOT NULL,
  `Last_name` varchar(25) NOT NULL,
  `passw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`user_ID`, `E_mail`, `First_name`, `Last_name`, `passw`) VALUES
(831873457, 'beheer@mypa.com', 'My-P-A', 'beheer', '21232f297a57a5a743894a0e4a801fc3'),
(831873458, 'beep@beepbeep.com', 'beep', 'beep', '1284e53a168a5ad955485a7c83b10de0'),
(831873461, 'Ricyosma@hotmail.nl', 'riccardo', 'van dam', '1284e53a168a5ad955485a7c83b10de0'),
(831873464, 'Ricyosma@gmail.com', 'Riccardo', 'Van Dam', 'd5a5b2edb04966f0b8c29faf4f92a082');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_abo`
--

CREATE TABLE `user_abo` (
  `Abo_ID` int(255) NOT NULL,
  `user_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `abo`
--
ALTER TABLE `abo`
  ADD PRIMARY KEY (`Abo_ID`);

--
-- Indexen voor tabel `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`Color_ID`);

--
-- Indexen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`Invoice_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Abo_ID` (`Abo_ID`);

--
-- Indexen voor tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`Task_ID`),
  ADD KEY `Color_ID` (`Color_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `E-mail` (`E_mail`);

--
-- Indexen voor tabel `user_abo`
--
ALTER TABLE `user_abo`
  ADD PRIMARY KEY (`Abo_ID`,`user_ID`),
  ADD KEY `Abo_ID` (`Abo_ID`,`user_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `abo`
--
ALTER TABLE `abo`
  MODIFY `Abo_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `color`
--
ALTER TABLE `color`
  MODIFY `Color_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `factuur`
--
ALTER TABLE `factuur`
  MODIFY `Invoice_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `task`
--
ALTER TABLE `task`
  MODIFY `Task_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=831873465;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `factuur_ibfk_1` FOREIGN KEY (`Abo_ID`) REFERENCES `user_abo` (`Abo_ID`),
  ADD CONSTRAINT `factuur_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user_abo` (`user_ID`);

--
-- Beperkingen voor tabel `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`Color_ID`) REFERENCES `color` (`Color_ID`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`user_ID`);

--
-- Beperkingen voor tabel `user_abo`
--
ALTER TABLE `user_abo`
  ADD CONSTRAINT `user_abo_ibfk_1` FOREIGN KEY (`Abo_ID`) REFERENCES `abo` (`Abo_ID`),
  ADD CONSTRAINT `user_abo_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
