-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 07:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falvorfinds`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `username` char(10) DEFAULT NULL,
  `PASSWORD` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`username`, `PASSWORD`) VALUES
('c', 'c'),
('chill', 'chillmacoding');

-- --------------------------------------------------------

--
-- Table structure for table `recommendedfood`
--

CREATE TABLE `recommendedfood` (
  `location` varchar(20) NOT NULL,
  `foodname1` varchar(20) NOT NULL,
  `foodname2` varchar(20) NOT NULL,
  `foodname3` varchar(20) NOT NULL,
  `foodname4` varchar(20) NOT NULL,
  `foodname5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommendedfood`
--

INSERT INTO `recommendedfood` (`location`, `foodname1`, `foodname2`, `foodname3`, `foodname4`, `foodname5`) VALUES
('pokhara', 'baini.jpg', 'BANDARAIXA.jpg', 'chelseabrantford.jpe', 'AANCHAL.jpg', '8OOTA.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurantid` int(20) NOT NULL,
  `restaurantname` varchar(20) NOT NULL,
  `foodItServes` varchar(20) NOT NULL,
  `restaurantlocation` varchar(20) NOT NULL,
  `restarantimage` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurantid`, `restaurantname`, `foodItServes`, `restaurantlocation`, `restarantimage`) VALUES
(8, 'bajekosekuwa', 'sekua', 'anamnagar', 'anamnagar_bajeko_sekuwa.jpeg'),
(9, 'momohouse', 'momo', 'chipledhunga', 'ktm momo house-min.jpg'),
(10, 'chillmacoding', 'momo', 'chipledhunga', '420479066_1425311328421676_3197449574451789794_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) DEFAULT NULL,
  `ratings` float NOT NULL,
  `review` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `ratings`, `review`, `email`) VALUES
(2, 5, 'test gaeko hai ', ''),
(2, 1, 'test no 2', ''),
(1, 1, 'kaamai nalauni resaturent', ''),
(1, 1, 'kaamai nalauni resaturent', ''),
(1, 1, 'kaamai nalauni resaturent', ''),
(1, 5, 'op xa hai jamaharu', ''),
(1, 5, 'chill ma hai mitra', ''),
(2, 3, 'masu ko jhool', ''),
(1, 5, 'bababl restaurent', ''),
(2, 3, 'ok xa ta', ''),
(2, 3, 'ok xa ta', 'test@gmail.com'),
(2, 5, 'babbal restaurant', 'ronaldo@gmail.com'),
(1, 5, 'masu ko jhool', 'test@gmail.com'),
(1, 1, 'joiko raicha', 'test@gmail.com'),
(9, 1, 'test gareko hai', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `searchfood`
--

CREATE TABLE `searchfood` (
  `foodname` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `variety` varchar(20) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `restaurant` varchar(20) NOT NULL,
  `ratings` float NOT NULL,
  `IMAGE` varchar(225) NOT NULL,
  `location` varchar(20) NOT NULL,
  `num_reviews` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `searchfood`
--

INSERT INTO `searchfood` (`foodname`, `price`, `variety`, `restaurantid`, `restaurant`, `ratings`, `IMAGE`, `location`, `num_reviews`) VALUES
('thukpa', 'below 1000', 'chicken', 1, 'momohouse', 3.29999, '????\0JFIF\0\0\0\0\0\0??\0lExif\0\0II*\0\0\0\0\01\0\0\0\02\0\0\0\0\0\0\0\0\0i?\0\0\0\0:\0\0\0\0\0\0\0Google\0\0\0\0?\0\0\0\00220?\0\0\0\0@\0\0?\0\0\0\02\0\0\0\0\0\0???ICC_PROFILE\0\0\0?\0\0\0\0\0\0\0mntrRGB XYZ ?\0\0\0\0$\0acsp\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0??\0\0\0\0', 'pokhara', 10),
('thukpa', 'below 1000', 'chicken', 2, 'nepal momo house', 3.3077, '????\0JFIF\0\0\0\0\0\0??\0?\0\n\Z\Z\Z\Z\Z\Z!.%+!\Z&8&,/1555\Z$;@;4?.4514+%+44644444646444614644454444441444444444444444444144??\0\0?S\"\0??\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0??\0@\0\0\0', 'pokhara', 13),
('sekuwa', 'below 1000', 'buff', 1, 'momohouse', 3.29999, '/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSExMWFhUWFxgYGBYXGBcYGhgYFxYYGRYXGBgYICggGB0lGxgXITEhJSkrLi4uGCAzODMtNygtLisBCgoKDg0OGxAQGy0lICUyLS0tLS0tMi0vLS0tLTUtLS0tLSsyLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAJUBUgMBIgACE', 'pokhara', 2),
('chowmein', 'below 1000', 'chicken', 1, 'momohouse', 3.29999, '/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAENDQ0NHQ0tTU0tocGRwaJqNgYGNmumms6azpun/3P/c3P/c//////////////////////////////////////8BQ0NDQ0dDS1NTS2hwZHBomo2BgY2a6aazprOm6f/c/9zc/9z////////////////////////////////////////CABEIAJUBUgMBIgACE', 'pokhara', 2),
('momo', 'below 1000', 'veg', 1, 'momohouse', 3.29999, '????\0JFIF\0\0\0\0\0\0??\0?\0CCCCGCKSSKhpdph??????馳????????????????????????????????????????CCCCGCKSSKhpdph??????馳??????????????????????????????????????????\0\0?R\"\0??\0\0\0\0\0\0\0\0\0\0\0\0\0\0??\0\0\0\0\0?P?@\0\0Ec):nh\0\0\09mL', 'pokhara', 2),
('momo', 'below 1000', 'buff', 6, 'kathmandu momo house', 3, '/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAFBQUFBVUFpkZFp9h3iHfbmqm5uquf/I18jXyP////////////////////////////////////////////////8BUFBQUFVQWmRkWn2HeId9uaqbm6q5/8jXyNfI///////////////////////////////////////////////////CABEIA4QEsAMBIgACE', 'kathmandu', 1),
('sekuwa', 'below 1000', 'buff', 8, 'bajeko sekuwa', 5, '. anamnagar_bajeko_sekuwa.jpeg', 'pokhara', 1),
('momo', 'below 1000', 'veg', 9, 'momo house', 3, '. samosa-min.jpg', 'pokhara', 2),
('momo', 'below 1000', 'chicken', 9, 'momo house', 3, 'ktm momo house.jpg', 'pokhara', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userid` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `phone` int(10) NOT NULL,
  `location` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userid`, `username`, `passwd`, `email`, `age`, `phone`, `location`) VALUES
(1, 'sandesh', 'chillmacoding', 'test@gmail.com', 84, 2147483647, 'pokhara'),
(2, 'tester', 'tester', 'tester@gmail.com', 25, 123456789, 'kathmandu'),
(3, 'RONALDO', 'chillmacoding', 'tester1@gmail.com', 25, 1, 'pokhara'),
(4, 'tester3', 'chillmahai', 'test3@gmail.com', 18, 123456789, 'pokhara'),
(5, 'ram', 'asdfg', 'ram@gmail.com', 25, 2147483647, 'Pokhara'),
(6, 'RONALDO', 'ronaldo', 'ronaldo@gmail.com', 39, 0, 'pokhara'),
(7, 'hawa', 'chillmacoding', 'hawa@gmail.com', 25, 1, 'kathmandu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurantid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurantid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
