-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2016 at 05:16 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `decedati_boala`
--

CREATE TABLE `decedati_boala` (
  `boala` text,
  `decedati` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `decedati_boala`
--

INSERT INTO `decedati_boala` (`boala`, `decedati`) VALUES
('Boli ale aparatului circulator', '816780.60'),
('Tumori', '654096.60'),
('Boli ale aparatului respirator', '155948.37'),
('Accidente', '237512.09'),
('Boli ale aparatului digestiv', '213594.50');

-- --------------------------------------------------------

--
-- Table structure for table `decedati_judet`
--

CREATE TABLE `decedati_judet` (
  `judet` text,
  `decedati` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `decedati_judet`
--

INSERT INTO `decedati_judet` (`judet`, `decedati`) VALUES
('Alba', '4311'),
('Arad', '5791'),
('Arges', '7248'),
('Bacau', '8439'),
('Bihor', '7227'),
('Bistrita-N.', '3273'),
('Botosani', '5821'),
('Brasov', '6070'),
('Braila', '4717'),
('Buzau', '6681'),
('Caras-Sev.', '4057'),
('Calarasi', '4367'),
('Cluj', '7811'),
('Constanta', '7773'),
('Covasna', '2495'),
('Dambovita', '6251'),
('Dolj', '9558'),
('Galati', '6779'),
('Giurgiu', '4214'),
('Gorj', '4263'),
('Harghita', '3526'),
('Hunedoara', '5815'),
('Ialomita', '3884'),
('Iasi', '8547'),
('Ilfov', '3726'),
('Maramures', '5532'),
('Mehedinti', '3987'),
('Mures', '6777'),
('Neamt', '6502'),
('Olt', '6445'),
('Prahova', '9782'),
('Satu-Mare', '4212'),
('Salaj', '2954'),
('Sibiu', '4530'),
('Suceava', '7671'),
('Teleorman', '6740'),
('Timis', '7534'),
('Tulcea', '3077'),
('Vaslui', '5321'),
('Valcea', '4099'),
('Vrancea', '4701'),
('Bucuresti', '21286');

-- --------------------------------------------------------

--
-- Table structure for table `decedati_varsta`
--

CREATE TABLE `decedati_varsta` (
  `varsta` text,
  `decedati` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `decedati_varsta`
--

INSERT INTO `decedati_varsta` (`varsta`, `decedati`) VALUES
('intre 0 si  4 ani', '1919'),
('intre 5 si  9 ani', '195'),
('intre 10 si 14 ani', '232'),
('intre 15 si 19 ani', '435'),
('intre 20 si 24 ani', '693'),
('intre 25 si 29 ani', '1032'),
('intre 30 si 34 ani', '1270'),
('intre 35 si 39 ani', '2223'),
('intre 40 si 44 ani', '3866'),
('intre 45 si 49 ani', '6191'),
('intre 50 si 54 ani', '8500'),
('intre 55 si 59 ani', '16184'),
('intre 60 si 64 ani', '20865'),
('intre 65 si 69 ani', '21411'),
('intre 70 si 74 ani', '27172'),
('intre 75 si 79 ani', '41061'),
('intre 80 si 84 ani', '45345'),
('peste 85 ani', '55200');

-- --------------------------------------------------------

--
-- Table structure for table `durata_judet`
--

CREATE TABLE `durata_judet` (
  `judet` text,
  `durata` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durata_judet`
--

INSERT INTO `durata_judet` (`judet`, `durata`) VALUES
('Alba', '76.230'),
('Arad', '74.840'),
('Arges', '75.975'),
('Bacau', '74.360'),
('Bihor', '74.455'),
('Bistrita-N.', '75.705'),
('Botosani', '74.700'),
('Brasov', '76.600'),
('Braila', '74.810'),
('Buzau', '75.225'),
('Caras-Sev.', '74.790'),
('Calarasi', '73.540'),
('Cluj', '76.690'),
('Constanta', '75.175'),
('Covasna', '75.200'),
('Dambovita', '75.215'),
('Dolj', '74.840'),
('Galati', '75.100'),
('Giurgiu', '73.515'),
('Gorj', '75.100'),
('Harghita', '75.840'),
('Hunedoara', '75.195'),
('Ialomita', '74.350'),
('Iasi', '76.015'),
('Ilfov', '75.075'),
('Maramures', '74.930'),
('Mehedinti', '74.270'),
('Mures', '75.620'),
('Neamt', '75.440'),
('Olt', '74.445'),
('Prahova', '75.860'),
('Satu-Mare', '73.205'),
('Salaj', '74.640'),
('Sibiu', '76.175'),
('Suceava', '76.025'),
('Teleorman', '74.615'),
('Timis', '76.155'),
('Tulcea', '73.910'),
('Vaslui', '74.805'),
('Valcea', '77.900'),
('Vrancea', '75.690'),
('Bucuresti', '77.730');

-- --------------------------------------------------------

--
-- Table structure for table `nascuti_judet`
--

CREATE TABLE `nascuti_judet` (
  `judet` text,
  `nascuti` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nascuti_judet`
--

INSERT INTO `nascuti_judet` (`judet`, `nascuti`) VALUES
('Alba', '3133'),
('Arad', '3962'),
('Arges', '5132'),
('Bacau', '6672'),
('Bihor', '5947'),
('Bistrita-N.', '3481'),
('Botosani', '4279'),
('Brasov', '6229'),
('Braila', '2473'),
('Buzau', '3578'),
('Caras-Sev.', '2343'),
('Calarasi', '2859'),
('Cluj', '6378'),
('Constanta', '7258'),
('Covasna', '2387'),
('Dambovita', '4569'),
('Dolj', '5948'),
('Galati', '4621'),
('Giurgiu', '2476'),
('Gorj', '2784'),
('Harghita', '3281'),
('Hunedoara', '3225'),
('Ialomita', '2839'),
('Iasi', '9628'),
('Ilfov', '3885'),
('Maramures', '4632'),
('Mehedinti', '2310'),
('Mures', '5727'),
('Neamt', '5190'),
('Olt', '3237'),
('Prahova', '6378'),
('Satu-Mare', '3576'),
('Salaj', '2562'),
('Sibiu', '4393'),
('Suceava', '8303'),
('Teleorman', '2811'),
('Timis', '6731'),
('Tulcea', '1948'),
('Vaslui', '5022'),
('Valcea', '3104'),
('Vrancea', '3764'),
('Bucuresti', '19161');

-- --------------------------------------------------------

--
-- Table structure for table `populatie_judet`
--

CREATE TABLE `populatie_judet` (
  `judet` text,
  `populatie` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `populatie_judet`
--

INSERT INTO `populatie_judet` (`judet`, `populatie`) VALUES
('Judet', 'Populatie'),
('Alba', '383252'),
('Arad', '475841'),
('Arges', '650332'),
('Bacau', '748402'),
('Bihor', '620866'),
('Bistrita-N.', '329592'),
('Botosani', '460065'),
('Brasov', '629814'),
('Braila', '361218'),
('Buzau', '484524'),
('Caras-Sev.', '332267'),
('Calarasi', '320302'),
('Cluj', '718633'),
('Constanta', '770783'),
('Covasna', '229563'),
('Dambovita', '531715'),
('Dolj', '705760'),
('Galati', '635559'),
('Giurgiu', '278630'),
('Gorj', '369857'),
('Harghita', '334586'),
('Hunedoara', '475542'),
('Ialomita', '296162'),
('Iasi', '901590'),
('Ilfov', '371037'),
('Maramures', '527663'),
('Mehedinti', '290253'),
('Mures', '597849'),
('Neamt', '580933'),
('Olt', '456554'),
('Prahova', '815741'),
('Satu-Mare', '392129'),
('Salaj', '248794'),
('Sibiu', '463436'),
('Suceava', '740861'),
('Teleorman', '396522'),
('Timis', '739217'),
('Tulcea', '247111'),
('Vaslui', '476406'),
('Valcea', '406314'),
('Vrancea', '393303'),
('Bucuresti', '2110752');

-- --------------------------------------------------------

--
-- Table structure for table `populatie_varsta`
--

CREATE TABLE `populatie_varsta` (
  `varsta` text,
  `populatie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `populatie_varsta`
--

INSERT INTO `populatie_varsta` (`varsta`, `populatie`) VALUES
('intre 0 si 4 ani', 1048087),
('intre 5 si 9 ani', 1137286),
('intre 10 si 14 ani', 1137286),
('intre 15 si 19 ani', 1114987),
('intre 20 si 24 ani', 1382583),
('intre 25 si 29 ani', 1783978),
('intre 30 si 34 ani', 1717079),
('intre 35 si 39 ani', 1917777),
('intre 40 si 44 ani', 1783978),
('intre 45 si 49 ani', 1694779),
('intre 50 si 54 ani', 1293384),
('intre 55 si 59 ani', 1538681),
('intre 60 si 64 ani', 1360284),
('intre 65 si 69 ani', 1003488),
('intre 70 si 74 ani', 802790),
('intre 75 si 79 ani', 758191),
('intre 80 si 84 ani', 490594),
('peste 85 ani', 334496);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
