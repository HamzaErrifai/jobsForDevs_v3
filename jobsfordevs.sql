-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 08:21 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsfordevs`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `user_id`, `title`, `description`, `created_at`) VALUES
(1, 2, 'Java Developer', 'Location: Remote\r\n Requirements:\r\n Java/J2EE and various technologies in this ecosystem (JSP, Spring, JDBC, Hibernate, Maven, Tomcat, etc.), Web based application development experience with HTML/HTML5, Javascript and frameworks (jquery, prototype, etc.) Nice to have:\r\n Knows how to write web services (SOAP, REST, AJAX, etc), Experience with database systems (SQL/RDBMS, NoSQL), Scripting languages: shell, perl or python, Documentation skills\r\n Crypto, SSL/TLS, PKI,\r\n Network protocols on user and programming level, Secure coding practices,\r\n Development experience with distributed systems, Good English skills,\r\n Masters degree in Information Technology or similar.\r\n When applying please send us the following to jobs@nxlog.org: a short cover letter explaining why you are interested in the position, your CV/resume,\r\n salary requirements (hourly rate).', '2020-08-21 16:58:31'),
(16, 1, 'HIAAJA', 'hsnslmqnfnflkqfnlf', '2020-08-28 18:41:36'),
(21, 7, 'sqsDDsd', 'qsfffqqfqf', '2020-08-28 23:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `img_src` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_url` varchar(255) DEFAULT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `email_verifyed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `user_id`, `company_name`, `img_src`, `company_email`, `company_url`, `company_location`, `created_at`, `email_verifyed`) VALUES
(1, 2, 'ARP_INC', 'templates/img/nologo.png', 'arp@arp.com', 'www.arpinc.com', 'Morocco', '2020-08-21 13:15:25', 0),
(2, 6, 'Agent', 'templates/img/nologo.png', 'agent@nyagent.com', 'www.agent.com', 'New york', '2020-08-28 22:58:32', 0),
(3, 7, 'dqsdqkd', 'templates/img/nologo.png', 'dlqsjd@dqksjdq.com', 'DQDBS.DIKLD.com', 'qqlfjnFB', '2020-08-28 22:59:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `img_src` varchar(255) DEFAULT NULL,
  `is_employer` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `email_verifyed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pwd`, `img_src`, `is_employer`, `created_at`, `email_verifyed`) VALUES
(1, 'hamza', 'test', 'test@test.com', '$2y$10$p30N8TbMh.GanLBBmWHqMOsu7aPP6xwwrOyUKJjlbAEzm7PuaB/CS', 'server/default/noAvatar.png', 0, '2020-08-21 12:40:29', 1),
(2, 'hamza', 'ap', 'lol@lol.com', '$2y$10$9I/6A6261RmI13JU8MuWje.Yh9agjG8GSyl1SxRK1aNZXM8HiLTpy', 'server/default/noAvatar.png', 1, '2020-08-21 13:15:24', 1),
(3, 'guy', 'wow', 'jks@hos.com', '$2y$10$P1QEZqfa.KzPcIigyb5EbenF9woEIcOGDmUfMdMNnzfSpI7rmYyOS', 'server/default/noAvatar.png', 0, '2020-08-22 13:29:07', 0),
(4, 'ksksks', 'd,odkzqk', 'jsksjs@jfofj.com', '$2y$10$2KjJLLOkRV9TOEzFPl4Lj.bDkdOWuZQPXzjlQFagC4m4uNrmgxdf2', 'server/default/noAvatar.png', 0, '2020-08-25 13:29:01', 0),
(5, 'hewow', 'qut', 'qut@qut.com', '$2y$10$rRZeT6Lz50fPS6cGHb85f.tt28IsP9bmTXJYHGxmo0OCHlDJ2obDK', 'server/default/noAvatar.png', 0, '2020-08-28 22:56:50', 0),
(6, 'qt', 'guy', 'qtguy@qt.com', '$2y$10$T.gXBifSRp93NR7s2HNweO40PgZDxnUc93DLpz2c0xnia5sR.utpq', 'server/default/noAvatar.png', 1, '2020-08-28 22:58:32', 0),
(7, 'great', 'guy', 'hdh@dld.com', '$2y$10$KepcabFgVuLEQZd7z4ecnuMM5dZdi0Sk58W3mmAErFvivUxJRvRp2', 'server/default/noAvatar.png', 1, '2020-08-28 22:59:57', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
