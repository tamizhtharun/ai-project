-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 06:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultancy_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(5) NOT NULL,
  `CATEGORY_NAME` varchar(255) NOT NULL,
  `CATEGORY_IMAGE` varchar(255) NOT NULL,
  `CATEGORY_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CATEGORY_NAME`, `CATEGORY_IMAGE`, `CATEGORY_DATE`) VALUES
(1, 'something', 'Screenshot 2024-08-17 155439.png', '2024-08-22'),
(2, 'something', 'Screenshot 2024-04-19 204202.png', '2024-08-22'),
(3, 'v', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `S_ID` int(5) NOT NULL,
  `S_NAME` varchar(50) NOT NULL,
  `S_ADDRESS` varchar(255) NOT NULL,
  `S_PHONE_NUMBER` varchar(10) NOT NULL,
  `S_EMAIL` varchar(100) NOT NULL,
  `S_PASSWORD` varchar(100) NOT NULL,
  `ROLE` varchar(11) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`S_ID`, `S_NAME`, `S_ADDRESS`, `S_PHONE_NUMBER`, `S_EMAIL`, `S_PASSWORD`, `ROLE`) VALUES
(1, 'ganesan', 'soorapatti', '2147483647', 'g@co.in', '$2y$10$RUEcz7JuZN6cmhJ.LXmdVe/Ih2YpbFZIsYXovw/dKAOFLrAc/y7WW', 'pending'),
(2, 'g', 'soorapatti', '2147483647', 'bh@gh.kj', '$2y$10$.9wx9o6zMwzMOzlQtFy.2ezesTX/82Zj6u0ZdQcCXbCJw0tIk38D6', 'pending'),
(3, 'Chandran', 'pudukottai', '6374511901', 'c@co.in', '$2y$10$nmdWkSClsdPyIyNOn2mUZOkYitwQ03mN5OoGteTvzyDvipNYhSffW', 'pending'),
(4, 'nithish', 'theni', '6863263635', 'nithish@co.in', '$2y$10$N807HHLpNJoJfkocrwwocekyUqGRM953yqEdMQXysw3gSa0AjIk46', 'pending'),
(5, 'Nithish', 'WHITE HOUSE', '9786965780', 'nithishswim7@gmail.com', '$2y$10$3Mo5.6FEdd8oGPi0kOciS.KUljUFm7pFtTa07sKgE6pbHpz98UUUW', 'pending'),
(6, 'nithish', '66/3, VRB nayidu st, Vadakarai, Periyakulam', '0978696578', 'main@co.in', '$2y$10$yH3vBksTch2g.EJ5fphpXujaB5Y/moPpLdVC3.we4z9v0NUrRHfea', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `PASSWORD` varchar(191) NOT NULL,
  `ROLE` varchar(25) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `EMAIL`, `PHONE_NUMBER`, `PASSWORD`, `ROLE`) VALUES
(6, 'chandran', 'c@co.in', '6374511901', '123', 'user'),
(7, 'nithish', 'n@co.in', '9786965780', '12345', 'user'),
(8, 'chandru', 'l@co.in', '3387587735', 'huerhy', 'user'),
(9, 'cshg', 'c@in.kd', '7862186629', 'hgss', 'user'),
(10, 'ganesh', 'g@co.in', '8248488688', 'Ganesh@22', 'user'),
(11, 'CHANDRAN', 'c@co.co', '6374511901', 'Chandran@22', 'user'),
(12, 'Chandran', 'cc@co.in', '8971298728', 'Chandr@22', 'user'),
(13, 'thiru', 'g@co.im', '9296932166', 'Ganesh@2', 'user'),
(14, 'Nithish Kumar R', 'nithishswim7@gmail.com', '9786965780', 'Nithish@123', 'user'),
(15, 'nithish', 'nithish@gmail.com', '5184688876', 'Ajkyg@123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `S_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
