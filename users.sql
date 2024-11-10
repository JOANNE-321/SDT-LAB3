-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 04:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `birthday` date DEFAULT NULL,
  `program` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `birthday`, `program`) VALUES
(1, 'AISHA NAJWA BINTI ALI', 'aisha@graduate.utm.my', 'Female', '2005-03-30', 'Graphic Design and Multimedia'),
(2, 'PRAVIN A/L KUMAR ', 'prakumar@graduate.utm.my', 'Male', '2024-10-09', 'Network and Security'),
(3, 'AHMAD FAIZAL BIN AHMAD', 'ahmad.faizal@graduate.utm.my', 'Male', '2004-01-05', 'Data Engineering'),
(4, 'ARIF ZAMAN BIN AHMAD', 'arif.zaman@graduate.utm.my', 'Male', '2005-07-04', 'Software Engineering'),
(5, 'DEEPA NAIR A/P DESH', 'deepa@graduate.utm.my', 'Female', '2004-02-05', 'Data Engineering'),
(6, 'FARHANA MALIK BIN MOHAMED', 'farhana@graduate.utm.my', 'Female', '2005-05-05', 'Software Engineering'),
(7, 'LAILA BINTI AHMAD', 'laila.ahmad@graduate.utm.my', 'Female', '2005-05-04', 'Network and Security'),
(8, 'LIM LI WEI', 'liwei@graduate.utm.my', 'Male', '2005-05-04', 'Software Engineering'),
(9, 'MELVICE LEE MEI LING', 'melvice@graduate.utm.my', 'Female', '2005-04-05', 'Data Engineering'),
(10, 'NUR AISYAH BINTI ABDULLAH', 'nuraisyah@graduate.utm.my', 'Female', '2005-12-05', 'Bioinformatics'),
(11, 'RAJESH KUMAR A/L DESHIGEN', 'rajesh.@graduate.utm.my', 'Male', '2005-06-05', 'Bioinformatics'),
(12, 'RIVA A/P ALVIN', 'ravi@graduate.utm.my', 'Female', '2005-09-05', 'Bioinformatics'),
(13, 'SITI FATIMAH BINTI MOHD', 'sitifatimah@graduate.utm.my', 'Female', '2005-11-04', 'Graphic Design and Multimedia'),
(14, 'SIMON CHONG YI XIANG', 'simondric@graduate.utm.my', 'Male', '2005-10-24', 'Data Engineering'),
(15, 'SITI ZULAIKHA BINTI ALI', 'sitizul@graduate.utm.my', 'Female', '2005-09-05', 'Graphic Design and Multimedia'),
(16, 'TAN SIEW LING', 'tansl@graduate.utm.my', 'Female', '2005-10-05', 'Graphic Design and Multimedia'),
(17, 'TARRANCE CHING YEW ZU', 'tarrancel@graduate.utm.my', 'Male', '2005-03-21', 'Data Engineering'),
(18, 'TARANISHA KRISHNA A/P MURTHY', 'tara@graduate.utm.my', 'Female', '2005-08-15', 'Software Engineering'),
(19, 'VIJAY SHARMA A/L KUMAR', 'vijaysharma@graduate.utm.my', 'Male', '2005-07-05', 'Bioinformatics'),
(20, 'VIVIAN ANG SU YEN', 'vivian@graduate.utm.my', 'Female', '2005-04-04', 'Network and Security'),
(21, 'WONG JOO LEE', 'joolee@graduate.utm.my', 'Male', '2005-08-24', 'Network and Security'),
(22, 'XENIA LOO XUE ER', 'xenia@graduate.utm.my', 'Female', '2005-02-26', 'Graphic Design and Multimedia'),
(23, 'YASMINE BINTI RAMLI', 'yasmine@graduate.utm.my', 'Female', '2005-04-28', 'Data Engineering'),
(24, 'YONG WEI LUN', 'yongwl@graduate.utm.my', 'Male', '2005-09-03', 'Software Engineering'),
(25, 'ZHANG WEI QUAN', 'zhangweil@graduate.utm.my', 'Male', '2005-05-04', 'Bioinformatics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
