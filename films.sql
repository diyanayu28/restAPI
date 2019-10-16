-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 11:57 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_film`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `sutradara` varchar(500) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `genre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `sutradara`, `tanggal_tayang`, `genre`) VALUES
(1, 'Harry Potter and the Sorcerer\'s Stone ', 'Chris Columbus', '2001-11-16', 'Fantasy, Romance'),
(2, 'Harry Potter and the Chamber of Secrets', 'Chris Columbus', '2002-11-15', 'Fantasy'),
(3, 'Harry Potter and the Prisoner of Azkaban', 'Alfonso Cuaron', '2005-05-31', 'Fantasy'),
(4, 'Harry Potter and the Goblet of Fire', 'Mike Newell', '2005-11-16', 'Fantasy'),
(5, 'My Annoying Brother', 'Yoo Young-ah', '2016-11-23', 'Drama'),
(6, 'Kimi no Na wa', 'Makoto Shinkai', '2016-08-26', 'Animation, Drama'),
(7, 'Avenger: Infinity War', 'Anthony Russo, Joe Russo', '2018-04-27', 'Action, Sci-fic'),
(8, 'Crazy Rich Asians', 'Jon M. Chu', '2018-08-15', 'Romantic comedy, COmedy-drama'),
(9, 'Bohemian Rhapsody', 'Bryan Singer', '2018-11-02', 'Music, Drama, Biography'),
(10, 'Mission: Impossible - Fallout  ', 'Christoper McQuarrie', '2018-07-27', 'Action');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
