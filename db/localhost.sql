-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2025 at 05:53 AM
-- Server version: 8.0.40
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prueba_tecnica`
--
CREATE DATABASE IF NOT EXISTS `prueba_tecnica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `prueba_tecnica`;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Dirección General'),
(2, 'Recursos Humanos'),
(3, 'Finanzas'),
(4, 'Contabilidad'),
(5, 'Marketing'),
(6, 'Ventas'),
(7, 'Operaciones'),
(8, 'Tecnologías de la Información'),
(9, 'Atención al Cliente'),
(10, 'Investigación y Desarrollo'),
(11, 'Legal'),
(12, 'Logística'),
(13, 'Compras'),
(14, 'Comunicación Corporativa'),
(15, 'Calidad');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `area_id` int NOT NULL,
  `boletin` int NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleado_rol`
--

CREATE TABLE `empleado_rol` (
  `empleado_id` int NOT NULL,
  `rol_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Director General'),
(2, 'Gerente de Recursos Humanos'),
(3, 'Contador'),
(4, 'Analista Financiero'),
(5, 'Jefe de Marketing'),
(6, 'Ejecutivo de Ventas'),
(7, 'Coordinador de Operaciones'),
(8, 'Desarrollador de Software'),
(9, 'Especialista en Atención al Cliente'),
(10, 'Ingeniero de Investigación y Desarrollo'),
(11, 'Abogado Corporativo'),
(12, 'Jefe de Logística'),
(13, 'Comprador'),
(14, 'Responsable de Comunicación Corporativa'),
(15, 'Coordinador de Calidad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleado_rol`
--
ALTER TABLE `empleado_rol`
  ADD PRIMARY KEY (`empleado_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `empleado_rol`
--
ALTER TABLE `empleado_rol`
  MODIFY `empleado_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
