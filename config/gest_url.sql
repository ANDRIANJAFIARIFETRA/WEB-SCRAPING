-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2021 at 02:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gest_url`
--

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `code_site` int(11) NOT NULL,
  `nom_site` varchar(255) NOT NULL,
  `url_site` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`code_site`, `nom_site`, `url_site`) VALUES
(2, 'Youtube', 'https://www.youtube.com'),
(15, 'Introduction à NLP', 'https://ichi.pro/fr/introduction-a-nlp-partie-1-pretraitement-du-texte-en-python-157232264432278'),
(16, 'Responsive voice ', 'https://responsivevoice.org/text-to-speech-languages/texte-en-parole-francais/'),
(17, 'Facebook ', 'https://web.facebook.com/'),
(18, 'OWASP', 'https://sucuri.net/guides/owasp-top-10-security-vulnerabilities-2021/'),
(19, 'Stack Overflow', 'https://stackoverflow.com/'),
(20, 'Open Classrooms', 'https://openclassrooms.com/fr/');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `code_site_fk` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `code_user` varchar(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`code_user`, `nom`, `prenom`, `username`, `password`) VALUES
('U001', 'ANDRIANJAFIARIFETRA ', 'Jedidia Amy', 'Jedidia', 'jedidia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`code_site`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD KEY `code_site_fk` (`code_site_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `code_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
