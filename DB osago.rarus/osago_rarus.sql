-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2019 at 10:37 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osago.rarus`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_drivers_table`
--

CREATE TABLE `age_drivers_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `age_drivers_table`
--

INSERT INTO `age_drivers_table` (`id`, `short_name`) VALUES
(1, '16-21'),
(2, '22-24'),
(3, '25-29'),
(4, '30-34'),
(5, '35-39'),
(6, '40-49'),
(7, '50-59'),
(8, 'старше 59');

-- --------------------------------------------------------

--
-- Table structure for table `age_experience_table`
--

CREATE TABLE `age_experience_table` (
  `id` int(100) NOT NULL,
  `id_age` int(11) DEFAULT NULL,
  `id_experience` int(11) DEFAULT NULL,
  `base_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `age_experience_table`
--

INSERT INTO `age_experience_table` (`id`, `id_age`, `id_experience`, `base_rate`) VALUES
(1, 1, 1, 1.5),
(2, 1, 1, 1.87),
(3, 1, 2, 1.87),
(4, 1, 3, 1.87),
(5, 1, 4, 1.66),
(6, 1, 5, 1.66),
(7, 2, 1, 1.77),
(8, 2, 2, 1.77),
(9, 2, 3, 1.77),
(10, 2, 4, 1.04),
(11, 2, 5, 1.04),
(12, 2, 6, 1.04),
(13, 3, 1, 1.77),
(14, 3, 2, 1.69),
(15, 3, 3, 1.63),
(16, 3, 4, 1.04),
(17, 3, 5, 1.04),
(18, 3, 6, 1.04),
(19, 3, 7, 1.01),
(20, 4, 1, 1.63),
(21, 4, 2, 1.63),
(22, 4, 3, 1.63),
(23, 4, 4, 1.04),
(24, 4, 5, 1.04),
(25, 4, 6, 1.01),
(26, 4, 7, 0.96),
(27, 4, 8, 0.96),
(28, 5, 1, 1.63),
(29, 5, 2, 1.63),
(30, 5, 3, 1.63),
(31, 5, 4, 0.99),
(32, 5, 5, 0.96),
(33, 5, 6, 0.96),
(34, 5, 7, 0.96),
(35, 5, 8, 0.96),
(36, 6, 1, 1.63),
(37, 6, 2, 1.63),
(38, 6, 3, 1.63),
(39, 6, 4, 0.96),
(40, 6, 5, 0.96),
(41, 6, 6, 0.96),
(42, 6, 7, 0.96),
(43, 6, 8, 0.96),
(44, 7, 1, 1.63),
(45, 7, 2, 1.63),
(46, 7, 3, 1.63),
(47, 7, 4, 0.96),
(48, 7, 5, 0.96),
(49, 7, 6, 0.96),
(50, 7, 7, 0.96),
(51, 7, 8, 0.96),
(52, 8, 1, 1.6),
(53, 8, 2, 1.6),
(54, 8, 3, 1.6),
(55, 8, 4, 0.93),
(56, 8, 5, 0.93),
(57, 8, 6, 0.93),
(58, 8, 7, 0.93),
(59, 8, 8, 0.93);

-- --------------------------------------------------------

--
-- Table structure for table `city_registration_table`
--

CREATE TABLE `city_registration_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `type1` float DEFAULT NULL,
  `type2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city_registration_table`
--

INSERT INTO `city_registration_table` (`id`, `short_name`, `type1`, `type2`) VALUES
(1, 'Республика Адегея', 1.5, 1.5),
(2, 'Симферополь', 0.6, 0.6),
(3, 'Чебоксары', 1.7, 1),
(4, 'Анапа, Геленджик', 1.3, 0.8),
(5, 'Краснодар, Новороссийск', 1.8, 1),
(6, 'Владивосток', 1.4, 1),
(7, 'Воронеж', 1.5, 1.1),
(8, 'Ленинградская область', 1.3, 0.8),
(9, 'Московская область', 1.7, 1),
(10, 'Ростов-на-Дону', 1.8, 1),
(11, 'Тольяти', 1.5, 1),
(12, 'Смоленск', 1.2, 0.8),
(13, 'Челябинск', 2.1, 1.3),
(14, 'Санкт-Петербург', 1.8, 1),
(15, 'Севастополь', 0.6, 0.6),
(16, 'Москва', 2, 1.2);

-- --------------------------------------------------------

--
-- Table structure for table `engine_power_table`
--

CREATE TABLE `engine_power_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `base_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `engine_power_table`
--

INSERT INTO `engine_power_table` (`id`, `short_name`, `base_rate`) VALUES
(1, 'до 50 включительно', 0.6),
(2, 'свыше 50 до 70 включительно', 1),
(3, 'свыше 70 до 100 включительно', 1.1),
(4, 'свыше 100 до 120 включительно', 1.2),
(5, 'свыше 120 до 150 включительно', 1.4),
(6, 'свыше 150 ', 1.6);

-- --------------------------------------------------------

--
-- Table structure for table `experience_drivers_table`
--

CREATE TABLE `experience_drivers_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience_drivers_table`
--

INSERT INTO `experience_drivers_table` (`id`, `short_name`) VALUES
(1, '0'),
(2, '1'),
(3, '2'),
(4, '3-4'),
(5, '5-6'),
(6, '7-9'),
(7, '10-14'),
(8, 'более 14');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_period_table`
--

CREATE TABLE `insurance_period_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `base_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurance_period_table`
--

INSERT INTO `insurance_period_table` (`id`, `short_name`, `base_rate`) VALUES
(1, 'от 5 до 15 дней', 0.2),
(2, 'от 16 дней до 1 месяца', 0.3),
(3, '2 месяца', 0.4),
(4, '3 месяца', 0.5),
(5, '4 месяца', 0.6),
(6, '5 месяца', 0.65),
(7, '6 месяца', 0.7),
(8, '7 месяца', 0.8),
(9, '8 месяца', 0.9),
(10, '9 месяца', 0.95),
(11, '10 месяцев и более', 1);

-- --------------------------------------------------------

--
-- Table structure for table `KBM_table`
--

CREATE TABLE `KBM_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `base_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `KBM_table`
--

INSERT INTO `KBM_table` (`id`, `short_name`, `base_rate`) VALUES
(1, 'm', 2.45),
(2, '1', 2.45),
(3, '2', 2.3),
(4, '3', 1.55),
(5, '4', 1.4),
(6, '5', 1),
(7, '6', 0.95),
(8, '7', 0.9),
(9, '8', 0.85),
(10, '9', 0.8),
(11, '10', 0.75),
(12, '11', 0.7),
(13, '12', 0.65),
(14, '13', 0.6),
(15, '14', 0.55),
(16, '15', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `KPt_table`
--

CREATE TABLE `KPt_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `base_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `KPt_table`
--

INSERT INTO `KPt_table` (`id`, `short_name`, `base_rate`) VALUES
(1, 'ТС категория А М - юр. лицо', 1.16),
(2, 'ТС категория С СЕ число ПМ 16 и менее', 1.4),
(3, 'ТС категория С СЕ число ПМ 16 и более', 1.25),
(4, 'Тракторы строительная техника', 1.24),
(5, 'Другие типы', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_table`
--

CREATE TABLE `main_table` (
  `id` int(100) NOT NULL,
  `type_ts` int(11) DEFAULT NULL,
  `engine_power` int(11) DEFAULT NULL,
  `city_registration` int(11) DEFAULT NULL,
  `number_drivers` int(11) DEFAULT NULL,
  `insurance_period` int(11) DEFAULT NULL,
  `KBM` int(11) DEFAULT NULL,
  `KPt` int(11) DEFAULT NULL,
  `age_drivers` int(11) DEFAULT NULL,
  `experience_drivers` int(11) DEFAULT NULL,
  `foreigner` int(11) DEFAULT NULL,
  `legal_form` int(11) DEFAULT NULL,
  `period_use` int(11) DEFAULT NULL,
  `violations` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_table`
--

INSERT INTO `main_table` (`id`, `type_ts`, `engine_power`, `city_registration`, `number_drivers`, `insurance_period`, `KBM`, `KPt`, `age_drivers`, `experience_drivers`, `foreigner`, `legal_form`, `period_use`, `violations`) VALUES
(1, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 2, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(3, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(7, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(9, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(10, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(11, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(12, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(13, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(14, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(15, 11, 4, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(16, 11, 4, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(17, 12, 4, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(18, 8, 4, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(19, 1, 4, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(20, 1, 4, 2, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(21, 1, 4, 2, 1, 11, 1, 5, 1, 1, 1, 1, 1, 1),
(22, 2, 4, 2, 1, 11, 1, 5, 1, 1, 1, 1, 1, 1),
(23, 2, 4, 2, 1, 11, 1, 5, 1, 1, 1, 1, 8, 1),
(24, 3, 4, 2, 1, 11, 1, 5, 1, 1, 1, 1, 8, 1),
(25, 3, 4, 2, 1, 11, 1, 5, 1, 1, 2, 2, 8, 1),
(26, 2, 4, 2, 1, 11, 1, 5, 1, 1, 2, 2, 8, 1),
(27, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(28, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(29, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(30, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(31, 1, 1, 1, 1, 1, 1, 5, 1, 4, 1, 1, 1, 1),
(32, 1, 1, 1, 1, 1, 1, 5, 1, 4, 1, 1, 1, 1),
(33, 1, 1, 1, 1, 1, 1, 5, 1, 5, 1, 1, 1, 1),
(34, 6, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(35, 1, 1, 1, 1, 1, 1, 5, 6, 1, 1, 1, 1, 1),
(36, 7, 4, 7, 1, 1, 1, 4, 1, 1, 2, 1, 1, 1),
(37, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(38, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(39, 2, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(40, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(41, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(42, 8, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(43, 4, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1),
(44, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(45, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 7, 1),
(46, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 6, 1),
(47, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(48, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 8, 1),
(49, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(50, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 7, 1),
(51, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 7, 1),
(52, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 7, 1),
(53, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 7, 1),
(54, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(55, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(56, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 7, 1),
(57, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(58, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(59, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(60, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(61, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(62, 1, 1, 1, 1, 1, 1, 5, 1, 1, 2, 2, 8, 1),
(63, 1, 1, 1, 1, 1, 1, 5, 1, 1, 2, 2, 8, 1),
(64, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(65, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(66, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(67, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(68, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(69, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(70, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(71, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(72, 6, 4, 8, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(73, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(74, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(75, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(76, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 7, 1),
(77, 9, 4, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(78, 5, 4, 11, 1, 5, 1, 3, 1, 1, 1, 1, 1, 1),
(79, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(80, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(81, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(82, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(83, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(84, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(85, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(86, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(87, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(88, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(89, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(90, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(91, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(92, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(93, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(94, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(95, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(96, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(97, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(98, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(99, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(100, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(101, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(102, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(103, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(104, 3, 3, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(105, 3, 3, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(106, 1, 1, 1, 1, 1, 1, 5, 1, 5, 1, 1, 1, 1),
(107, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(108, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(109, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(110, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(111, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(112, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(113, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(114, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(115, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(116, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(117, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(118, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(119, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(120, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(121, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(122, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(123, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(124, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(125, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(126, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(127, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(128, 6, 6, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(129, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(130, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(131, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(132, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(133, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(134, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(135, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(136, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(137, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(138, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(139, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(140, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(141, 1, 1, 1, 1, 1, 1, 5, 1, 6, 1, 1, 1, 1),
(142, 2, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(143, 8, 1, 1, 1, 1, 1, 5, 1, 5, 1, 1, 1, 1),
(144, 1, 4, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(145, 4, 5, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1),
(146, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 8, 1),
(147, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 8, 1),
(148, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(149, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 2, 1, 1),
(150, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(151, 1, 1, 1, 1, 8, 1, 5, 1, 1, 1, 1, 1, 1),
(152, 1, 1, 1, 1, 11, 1, 5, 1, 1, 1, 1, 1, 1),
(153, 1, 1, 1, 1, 11, 1, 5, 1, 1, 1, 1, 1, 1),
(154, 1, 1, 1, 1, 11, 1, 5, 1, 1, 1, 1, 1, 1),
(155, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(156, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(157, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(158, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(159, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(160, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(161, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(162, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(163, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(164, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1),
(165, 1, 1, 1, 1, 1, 1, 5, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `period_use_table`
--

CREATE TABLE `period_use_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `base_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `period_use_table`
--

INSERT INTO `period_use_table` (`id`, `short_name`, `base_rate`) VALUES
(1, '3 месяца ', 0.5),
(2, '4 месяца', 0.6),
(3, '5 месяца', 0.65),
(4, '6 месяца', 0.7),
(5, '7 месяца', 0.8),
(6, '8 месяца', 0.9),
(7, '9 месяца', 0.95),
(8, '10 месяца и более', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_ts_table`
--

CREATE TABLE `type_ts_table` (
  `id` int(100) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `base_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_ts_table`
--

INSERT INTO `type_ts_table` (`id`, `short_name`, `base_rate`) VALUES
(1, 'ТС категория А М', 694),
(2, 'ТС категория B ВE - физ. лицо ИП', 2746),
(3, 'ТС категория B  ВE - юр. лицо', 2058),
(4, 'ТС в качестве Такси', 4110),
(5, 'ТС категория D DЕ число ПМ 16 и менее', 2246),
(6, 'ТС категория D DЕ число ПМ 16 и более', 2807),
(7, 'ТС категория D DЕ региональные перевозки', 4110),
(8, 'ТС категория Tb тролейбусы', 2246),
(9, 'ТС категория Tm трамваи', 1410),
(10, 'Тракторы строительная техника', 899),
(11, 'ТС категории C CE массой 16 тонн и менее', 2807),
(12, 'ТС категории C CE массой 16 тонн и более', 4227);

-- --------------------------------------------------------

--
-- Table structure for table `user_options_table`
--

CREATE TABLE `user_options_table` (
  `id` int(100) NOT NULL,
  `number_drivers_limited` varchar(255) DEFAULT NULL,
  `legal_form` varchar(255) DEFAULT NULL,
  `foreigner` varchar(255) DEFAULT NULL,
  `violations` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_options_table`
--

INSERT INTO `user_options_table` (`id`, `number_drivers_limited`, `legal_form`, `foreigner`, `violations`) VALUES
(1, 'Ограниченое количество лиц допущеных к управлению ТС', 'физ. лицо', 'да', 'да'),
(2, 'Не ограниченое количество лиц допущеных к управлению ТС', 'юр. лицо', 'нет', 'нет');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_drivers_table`
--
ALTER TABLE `age_drivers_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age_experience_table`
--
ALTER TABLE `age_experience_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_registration_table`
--
ALTER TABLE `city_registration_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engine_power_table`
--
ALTER TABLE `engine_power_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_drivers_table`
--
ALTER TABLE `experience_drivers_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_period_table`
--
ALTER TABLE `insurance_period_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KBM_table`
--
ALTER TABLE `KBM_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KPt_table`
--
ALTER TABLE `KPt_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_table`
--
ALTER TABLE `main_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `period_use_table`
--
ALTER TABLE `period_use_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_ts_table`
--
ALTER TABLE `type_ts_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_options_table`
--
ALTER TABLE `user_options_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_drivers_table`
--
ALTER TABLE `age_drivers_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `age_experience_table`
--
ALTER TABLE `age_experience_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `city_registration_table`
--
ALTER TABLE `city_registration_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `engine_power_table`
--
ALTER TABLE `engine_power_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `experience_drivers_table`
--
ALTER TABLE `experience_drivers_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `insurance_period_table`
--
ALTER TABLE `insurance_period_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `KBM_table`
--
ALTER TABLE `KBM_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `KPt_table`
--
ALTER TABLE `KPt_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `main_table`
--
ALTER TABLE `main_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `period_use_table`
--
ALTER TABLE `period_use_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `type_ts_table`
--
ALTER TABLE `type_ts_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_options_table`
--
ALTER TABLE `user_options_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
