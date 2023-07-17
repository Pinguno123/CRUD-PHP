-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2023 at 03:13 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `email`, `phone`, `address`, `created_at`) VALUES
(1, 'Douglas Emmanuel', 'soyemmanuel@gmail.com', '12121212', 'Ilopango, El Salvador', '2023-07-07 18:07:06'),
(2, 'Alexander Juarez', 'soyalexander@gmail.com', '77777777', 'San Salvador, San Salvador', '2023-07-07 18:07:06'),
(3, 'Diego Ignacio', 'soynacho@gmail.com', '71717171', 'San Gabriel, San Salvador', '2023-07-07 18:07:06'),
(4, 'Alexandra Alvarado', 'soyalexa@gmail.com', '32323232', 'Villa del Sol, San Salvador', '2023-07-07 18:07:06'),
(5, 'Shelsea Burgos', 'soyshelsea@gmail.com', '34343434', 'Apopa, El Salvador', '2023-07-07 18:07:06'),
(6, 'Angie Arias', 'soyangie@gmail.com', '21345661', 'San Rafael Cedros, El Salvador', '2023-07-07 19:46:58'),
(7, 'Cesar Samuel', 'soycesar@gmail.com', '71017955', 'San Salvador, El Salvador', '2023-07-07 19:48:08'),
(8, 'Douglas Rafael', 'soydouglas@gmail.com', '71017965', 'Ilopango, El Salvador', '2023-07-07 19:48:50'),
(11, 'Cesar Josue', 'soyjosue@gmail.com', '72304234', 'San Bartolo, El Salvador', '2023-07-07 20:24:26'),
(12, 'Rodrigo Miguel', 'soymiguel@gmail.com', '11111111', 'San Salvador, El Salvador', '2023-07-07 21:20:12'),
(14, 'Rodrigo Perez', 'soyperez@gmail.com', '10101010', 'San Salvador, El Salvador', '2023-07-07 21:28:59'),
(15, 'Anderson Amilcar', 'soyamilcar@gmail.com', '99999999', 'San Salvador, El Salvador', '2023-07-08 16:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `privilege` int(11) NOT NULL DEFAULT '2',
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `privilege`, `user`, `password`, `email`) VALUES
(1, 1, 'Admin', 'admin', 'soyadmin@gmail.com'),
(4, 2, 'Douglas', '123456', 'soydouglas@gmail.com'),
(6, 2, 'pedro', 'dl931dg$', 'soypedro'),
(7, 2, 'Douglas', 'dl931dg$', 'soydouglas@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
