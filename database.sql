-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Nov 04, 2023 at 10:55 PM
-- Server version: 11.1.2-MariaDB-1:11.1.2+maria~ubu2204
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2_hazi`
--
CREATE DATABASE IF NOT EXISTS `web2_hazi` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `web2_hazi`;


-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_url` varchar(30) NOT NULL,
  `menu_title` varchar(30) NOT NULL,
  `menu_parent` varchar(30) NOT NULL,
  `menu_permission` varchar(3) NOT NULL,
  `menu_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_url`, `menu_title`, `menu_parent`, `menu_permission`, `menu_order`) VALUES
('home', 'Haza', '', '111', 10),
('about', 'Rólunk', '', '111', 30),
('contact', 'Kapcsolat', 'about', '111', 40),
('admin', 'Admin', '', '001', 50),
('signin', 'Bejelentkezés', '', '100', 60),
('signup', 'Regisztráció', '', '100', 70),
('signout', 'Kijelentkezés', '', '011', 80);



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(12) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL DEFAULT '',
  `user_permission` varchar(3) NOT NULL DEFAULT '_1_',
  `user_lastname` varchar(32) NOT NULL DEFAULT '',
  `user_firstname` varchar(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Indexes for dumped tables
--


--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_url`);


--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
