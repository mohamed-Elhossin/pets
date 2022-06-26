-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 04:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL,
  `phone` varchar(44) NOT NULL,
  `email` varchar(44) NOT NULL,
  `password` varchar(22) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `password`, `image`, `role`) VALUES
(3, 'ahmed tofiq', '01117433885', 'm.m.m.elhossin@gmail.com', '123', 'Gull_portrait_ca_usa.jpg', 1),
(4, 'mariam khaled', '0123211233', 'mariam09@gmail.com', '123', 't4.jpeg', 0),
(5, 'Toma', '01117433885', 'm.m.m.elhossin@gmail.com', '123', 'admincase.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer_data` varchar(434) NOT NULL,
  `messageId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Pets Dogs'),
(3, 'sell'),
(4, 'chalter'),
(5, 'marry'),
(6, 'doctores');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `subject` varchar(33) NOT NULL,
  `data` varchar(322) NOT NULL,
  `replay` varchar(50) NOT NULL DEFAULT 'no Answer Yet',
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `data`, `replay`, `userId`) VALUES
(4, 'Problem', 'انا عندي مشكله', 'ممكن تقول مشكلتك', 4),
(5, 'problem', 'اي حاجه', 'no Answer Yet', 8);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(44) NOT NULL,
  `image` varchar(222) DEFAULT NULL,
  `description` varchar(55) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'waiting',
  `userId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description`, `status`, `userId`, `categoryId`) VALUES
(13, 'hi i want buy cat', 'p5.jpeg', 'please iam search about cat', 'done', 4, 1),
(14, 'test', 'Screenshot_1.png', 'testets', 'done', 8, 4),
(15, 'ياجماعه انا دكتوووور', 'Screenshot_1.png', 'الي عاير يكشف', 'waiting', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(66) NOT NULL,
  `email` varchar(66) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(333) NOT NULL,
  `password` varchar(33) NOT NULL,
  `image` varchar(211) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `image`) VALUES
(1, 'aaa', 'aaaa', '2121', 'asdas', '123', 'sadfdsa'),
(2, 'Mohamed El hosisnysss', 'm.m.m.elhossin@gmail.com', '01117433885', 'asdfdsfasfdsafdsafdsaf', '1234', '63346499.jfif'),
(3, 'Mohamed El hosisny', 'admin@admin.com', '01117433885', 'asdfdsfasfdsafdsafdsaf', '123', 'Gull_portrait_ca_usa.jpg'),
(4, 'Mohamed El hosisny', 'm.m.m.elhossin@gmail.com', '23424324324', 'nacer city', '123', 'download.png'),
(5, 'ahmed tofiq', 'admin@admin.com', '01117433885', 'nacer city', '123', 'CER_Course_F.jpg'),
(6, 'ahmed tofiq', 'admin@admin.com', '01117433885', 'nacer city', '123', 'CER_Course_F.jpg'),
(7, 'mariam khaled', 'mariam@gmail.com', '0111213822', 'nacer city', '1234', 't4.jpeg'),
(8, 'ahmed tofiq', 'ahmed@gmail.com', '01117433885', 'asfdsafd', '1234', 'ERD.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messageId` (`messageId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`messageId`) REFERENCES `messages` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
