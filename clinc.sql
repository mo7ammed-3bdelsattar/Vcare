-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 12:05 AM
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
-- Database: `clinc`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `name`, `email`, `phone`, `major_id`, `image`) VALUES
(1, 'shenouda', 'shenoudamouris602@gmail.com', '01280060795', 1, 'mm.jpg'),
(2, 'ssf', 'ssx@mm.com', '01280060795', 1, 'mkm.jpg'),
(3, 'ssf', 'ssx@mm.com', '01280060795', 1, 'mkm.jpg'),
(4, 'its name', 'shenoudamouris123@gmail.com', '01280028196', 1, 'mnbbm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `status` enum('pending','visited','cancelled','') NOT NULL,
  `date` varchar(100) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `email`, `phone`, `status`, `date`, `patient_id`, `doctor_id`, `user_id`) VALUES
(45, 'name', 'shenoudamouris123@gmail.com', '01280060795', 'visited', '2024-09-21 17:42:52', 33, 18, 5),
(46, 'name', '108120221010692@stud.cu.edu.eg', '01266666666', 'cancelled', '2024-09-21 17:53:40', 34, 22, 5),
(47, 'name', '108120221010692@stud.cu.edu.eg', '01266666666', 'pending', '2024-09-21 17:53:40', 34, 22, 5),
(48, 'aXPOMSXCM', '108120221010692@stud.cu.edu.eg', '01234567895', 'pending', '2024-09-21 18:31:33', 35, 21, 5),
(49, 'aXPOMSXCM', '108120221010692@stud.cu.edu.eg', '01234567895', 'pending', '2024-09-21 18:31:33', 35, 21, 5),
(50, 'aXPOMSXCM', '108120221010692@stud.cu.edu.eg', '01234567895', 'pending', '2024-09-21 18:31:33', 35, 21, 5),
(51, 'shenouda', 'shenoudamouris123@gmail.com', '01266666666', 'visited', '2024-09-21 19:10:40', 36, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `major_id` int(11) NOT NULL,
  `start-end` varchar(5) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL DEFAULT 'Egypt/cairo',
  `visitors` int(11) NOT NULL,
  `days` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `major_id`, `start-end`, `price`, `image`, `phone`, `email`, `adress`, `visitors`, `days`, `user_id`) VALUES
(17, 'Sara', 1, '10-2', 100, 'assets/images/doctors/01.jpg', '01234567890', 'sara@gmail.com', 'Egypt/cairo/maadi/horryah/21-4-8', 2, 'sun,wed', 4),
(18, 'Nermeen', 2, '10-2', 100, 'assets/images/doctors/02.jpg', '01234567891', 'nermeen@gmail.com', 'Egypt/cairo/maadi/andrya/3-4-8', 0, 'sat,tue', 1),
(19, 'maya', 3, '10-2', 100, 'assets/images/doctors/03.jpg', '01234567892', 'maya@gmail.com', 'Egypt/cairo/maadi/horryah/21-4-8', 0, 'mon,th', 1),
(20, 'Marawan', 4, '2-6', 200, 'assets/images/doctors/04.jpg', '01234567893', 'marawan@gmail.com', 'Egypt/cairo/maadi/horryah/21-4-8', 0, 'sun,wed', 1),
(21, 'Mohammed Khan', 5, '2-6', 200, 'assets/images/doctors/05.jpg', '01234567894', 'mohammedkhan@gmail.com', 'Egypt/cairo/maadi/horryah/21-4-8', 0, 'fri,tue', 1),
(22, 'Sayed', 6, '3-7', 200, 'assets/images/doctors/06.jpg', '01234567895', 'sayed@gmail.com', 'Egypt/cairo/maadi/horryah/21-4-8', 0, 'mon,tha', 2),
(23, 'Saad', 7, '3-8', 200, 'assets/images/doctors/07.jpg', '01234567896', 'saad@gmail.com', 'Egypt/cairo/maadi/andrya/3-4-8', 0, 'sun,wed', 1),
(24, 'Negga', 8, '4-4', 100, 'assets/images/doctors/08.jpg', '01234567890', 'negga@gmail.com', 'Egypt/cairo/maadi/andrya/3-4-8', 0, 'all days', 1);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `title`, `description`, `image`) VALUES
(1, 'Have a Medical Question?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque, laborum saepe enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur cum iure quod facere.', 'assets/images/banner.jpg'),
(2, 'everything you need is found at VCare.', 'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery.', 'https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg'),
(3, 'About Us', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque, laborum saepe enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur cum iure quod facere.', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `title`, `image`) VALUES
(1, 'Internal', 'assets/images/majors/01.jpg'),
(2, 'Pediatrics', 'assets/images/majors/02.jpg'),
(3, 'Obstetrics and Gynecology', 'assets/images/majors/03.jpg'),
(4, 'Surgery', 'assets/images/majors/04.jpg'),
(5, 'Neurology', 'assets/images/majors/05.jpg'),
(6, 'Cardiology', 'assets/images/majors/06.jpg'),
(7, 'Dermatology', 'assets/images/majors/07.jpg'),
(8, 'Ophthalmology', 'assets/images/majors/08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `phone`, `email`, `doctor_id`, `user_id`, `date`) VALUES
(4, 'shenouda', '01280028196', '108120221010692@stud.cu.edu.eg', 23, 5, '0'),
(5, 'shenouda', '01280060795', 'shenouda@gmail.com', 22, 5, '0'),
(6, 'its name', '01234567895', 'new@h.com', 22, 5, '0'),
(7, 'its name', '01234567895', 'new@h.com', 22, 5, '0'),
(8, 'ssx', '01280060795', 'ssx@mm.com', 22, 5, '0'),
(9, 'shenouda', '01266666666', 'shenoudamouris123@gmail.com', 24, 5, '0'),
(10, 'shenouda', '01280060795', '108120221010692@stud.cu.edu.eg', 21, 5, '0'),
(11, 'shenouda', '01280060795', '108120221010692@stud.cu.edu.eg', 21, 5, '0'),
(15, 'shenouda', '01280060795', 'new@h.com', 18, 5, '2024-09-21 10:53:40'),
(16, 'shenouda', '01280060795', 'new@h.com', 18, 5, '2024-09-21 10:54:47'),
(17, 'shenouda', '01280060795', 'new@h.com', 18, 5, '2024-09-21 10:54:53'),
(18, 'shenouda', '01280060795', 'new@h.com', 18, 5, '2024-09-21 11:00:05'),
(19, 'shenouda', '01280060795', 'new@h.com', 18, 5, '2024-09-21 11:06:15'),
(20, 'shenouda', '01280060795', 'new@h.com', 18, 5, '2024-09-21 11:18:46'),
(21, 'shenouda', '01280060795', 'new@h.com', 18, 5, '2024-09-21 11:19:26'),
(22, 'shenouda', '01280028196', 'shenouda@gmail.com', 22, 5, '2024-09-21 11:23:10'),
(23, 'shenouda', '01280028196', 'shenouda@gmail.com', 22, 5, '2024-09-21 11:24:03'),
(25, 'shenouda', '01280028196', 'shenoudamouris602@gmail.com', 17, 5, '2024-09-21 14:50:33'),
(26, 'shenouda', '01280028196', 'shenoudamouris602@gmail.com', 17, 5, '2024-09-21 14:53:10'),
(27, 'shenouda', '01280028196', 'shenoudamouris602@gmail.com', 17, 5, '2024-09-21 14:53:18'),
(28, 'shenouda', '01280028196', 'shenoudamouris602@gmail.com', 17, 5, '2024-09-21 14:55:30'),
(29, 'shenouda', '01280060795', '108120221010692@stud.cu.edu.eg', 22, 5, '2024-09-21 16:45:19'),
(30, 'shenouda', '01280060795', '108120221010692@stud.cu.edu.eg', 22, 5, '2024-09-21 16:48:22'),
(31, 'name', '01234567895', 'shenoudamouris123@gmail.com', 22, 5, '2024-09-21 16:51:47'),
(32, 'shenouda', '01234567892', '108120221010692@stud.cu.edu.eg', 17, 5, '2024-09-21 17:25:46'),
(33, 'name', '01280060795', 'shenoudamouris123@gmail.com', 18, 5, '2024-09-21 17:42:52'),
(34, 'name', '01266666666', '108120221010692@stud.cu.edu.eg', 22, 5, '2024-09-21 17:53:40'),
(35, 'aXPOMSXCM', '01234567895', '108120221010692@stud.cu.edu.eg', 21, 5, '2024-09-21 18:31:33'),
(36, 'shenouda', '01266666666', 'shenoudamouris123@gmail.com', 17, 5, '2024-09-21 19:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'assets/images/users/00.png',
  `type` enum('user','doctor','admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `image`, `type`) VALUES
(1, 'null', 'null', 'null', '01010101010', 'assets/images/00.png', 'user'),
(2, 'Mohammed Abdelsattar', 'mohammedabdelsattar2@gmail.com', 'e2847a61b93f410e6f591bb546b4fe3dc7014a55', '01015616884', 'assets/images/users/00.png', 'user'),
(3, 'Mohammed', 'mohammedabdelsattar@gmail.com', 'e2847a61b93f410e6f591bb546b4fe3dc7014a55', '01015616883', 'assets/images/users/00.png', 'user'),
(4, 'shenouda', 'shenouda@gmail.com', '962f7467f2b47f059e6224ec652ebf0090d88ead', '01280028196', 'assets/images/users/00.png', 'doctor'),
(5, 'shenouda', 'shenouda11@gm.com', '9ae14666e6ccf76f44734ce4b243459777e44cbd', '01234567895', 'assets/images/users/00.png', 'user'),
(6, 'newUser', 'new@h.com', '9ae14666e6ccf76f44734ce4b243459777e44cbd', '01266666666', 'assets/images/users/00.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `doctor_id`, `user_id`) VALUES
(1, 22, 3),
(2, 17, 4),
(3, 17, 2),
(4, 17, 4),
(5, 17, 5),
(6, 17, 5),
(7, 17, 5),
(8, 17, 5),
(9, 17, 5),
(10, 17, 5),
(11, 17, 5),
(12, 17, 5),
(13, 17, 5),
(14, 17, 5),
(15, 17, 5),
(16, 17, 5),
(17, 17, 5),
(18, 17, 5),
(19, 17, 5),
(20, 17, 5),
(21, 17, 5),
(22, 17, 5),
(23, 17, 5),
(24, 17, 5),
(25, 17, 5),
(26, 17, 5),
(27, 17, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`),
  ADD KEY `user-id` (`user_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `apply` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `major_id` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`),
  ADD CONSTRAINT `user-id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `visitors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
