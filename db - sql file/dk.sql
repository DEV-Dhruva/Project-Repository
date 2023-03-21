-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 02:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dk`
--

-- --------------------------------------------------------

--
-- Table structure for table `upload_data`
--

CREATE TABLE `upload_data` (
  `FILE_NAME` varchar(100) NOT NULL,
  `FILE_SIZE` int(10) NOT NULL,
  `FILE_TYPE` varchar(20) NOT NULL,
  `CATEGORY` varchar(50) NOT NULL,
  `UPLOADED_BY` varchar(50) NOT NULL,
  `PATH` varchar(100) NOT NULL,
  `DOMAIN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_data`
--

INSERT INTO `upload_data` (`FILE_NAME`, `FILE_SIZE`, `FILE_TYPE`, `CATEGORY`, `UPLOADED_BY`, `PATH`, `DOMAIN`) VALUES
('script.js', 4, 'text/javascript', 'Code Files', 'rohit45', 'user_data/rohit45/script.js', 'Web Technology'),
('style.css', 2, 'text/css', 'Code Files', 'rohit45', 'user_data/rohit45/style.css', 'Web Technology'),
('playing.gif', 54, 'image/gif', 'Media', 'rohit45', 'user_data/rohit45/playing.gif', 'Web Technology'),
('index.html', 4, 'text/html', 'Code Files', 'virat18', 'user_data/virat18/index.html', 'Data Science'),
('lp.html', 2, 'text/html', 'Code Files', 'virat18', 'user_data/virat18/lp.html', 'Data Science'),
('bar.png', 2, 'image/png', 'Media', 'virat18', 'user_data/virat18/bar.png', 'Data Science'),
('csv.png', 3, 'image/png', 'Media', 'virat18', 'user_data/virat18/csv.png', 'Data Science'),
('DWM_MP_Report.docx', 691, 'application/vnd.open', 'Documents', 'virat18', 'user_data/virat18/DWM_MP_Report.docx', 'IOT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'rohit45', '13ccdc7b565b0d5e7dd8897f0517a1ce'),
(2, 'virat18', 'dfe7a95d6befb3147a06073399dce3cb'),
(3, 'msd07', '9c9b396f994b4135b91e03873f5f8456'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
