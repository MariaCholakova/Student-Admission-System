-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2018 at 09:15 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmi_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(6) DEFAULT NULL,
  `password` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('maria', 1111),
('svetla', 2222),
('vaska', 3333);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(1) DEFAULT NULL,
  `title` varchar(38) DEFAULT NULL,
  `type` varchar(9) DEFAULT NULL,
  `students_count` int(1) DEFAULT NULL,
  `accepted_students` text,
  `min_grade` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `title`, `type`, `students_count`, `accepted_students`, `min_grade`) VALUES
(1, 'Софтуерно инженерство', 'Бакалавър', 8, '9601132569 9608243781 9604278567 9611278572 9603132564 9609132567 8911204509 9205127622', '0.00'),
(2, 'Компютърни науки', 'Бакалавър', 8, '9604278575 9601232565 9612243785 9602243786 9604278568 9608283789 9601132562 9103024572', '0.00'),
(3, 'Информатика', 'Бакалавър', 7, '9608243782 9411126210 9608043788 9604278570 9601032568 9606179405 9608243783', '0.00'),
(4, 'Информационни системи', 'Бакалавър', 6, '9601282566 9608143787 9601132563 9608243790 9604278576 9604278569', '0.00'),
(5, 'Изкуствен интелект', 'Магистър', 8, '9108243782 9202243786 9203132564 9201132564 9204278569 9211278573 9212243786 9208243786', '0.00'),
(6, 'Компютърна графика', 'Магистър', 8, '9201232565 9609243781 9205278571 9211278572 9204278571 9205167833 8906224509 8910224509', '0.00'),
(7, 'Логика и алгоритми', 'Магистър', 7, '9201232566 9212243785 9201282566 9202278567 9208243785 9204278568 9208243784', '0.00'),
(8, 'Математическо моделиране в икономиката', 'Магистър', 7, '9202243787 9607174408 9205167832 9204278570 9201132561 9201132562 9201132565', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `EGN` bigint(10) NOT NULL,
  `name` varchar(27) DEFAULT NULL,
  `mobile` int(9) DEFAULT NULL,
  `email` varchar(23) DEFAULT NULL,
  `gender` varchar(4) DEFAULT NULL,
  `diploma` decimal(3,2) DEFAULT NULL,
  `exam` decimal(3,2) DEFAULT NULL,
  `total_grade` decimal(4,2) DEFAULT NULL,
  `program` varchar(9) DEFAULT NULL,
  `first_wish` varchar(38) DEFAULT NULL,
  `second_wish` varchar(38) DEFAULT NULL,
  `third_wish` varchar(38) DEFAULT NULL,
  `admission_type` varchar(16) DEFAULT NULL,
  `accepted_at` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`EGN`, `name`, `mobile`, `email`, `gender`, `diploma`, `exam`, `total_grade`, `program`, `first_wish`, `second_wish`, `third_wish`, `admission_type`, `accepted_at`) VALUES
(8906224509, 'Поля Емилова Янкова', 893671455, 'polya11@abv.bg', 'Жена', '5.00', '0.00', '5.00', 'Магистър', 'Компютърна графика', '', '', 'платено', ''),
(8910224509, 'Кристина Найденова Нанчева', 893674455, 'krasimira11@abv.bg', 'Жена', '5.00', '0.00', '5.00', 'Магистър', 'Компютърна графика', '', '', 'платено', ''),
(8911204509, 'Красимира Найденова Нанчева', 893674455, 'krasimira11@abv.bg', 'Жена', '5.00', '0.00', '5.00', 'Бакалавър', 'Софтуерно инженерство', '', '', 'платено', ''),
(9103024572, 'Павел Станиславов Миленков', 882356780, 'pavell@abv.bg', 'Мъж', '4.00', '0.00', '4.00', 'Бакалавър', 'Компютърни науки', '', '', 'платено', ''),
(9108243782, 'Димитър Янков Младенов', 883658370, 'AlbusSerpents@abv.bg', 'Мъж', '6.00', '5.52', '17.04', 'Магистър', 'Изкуствен интелект', 'Компютърна графика', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9108243783, 'Здравко Василев Велков', 883658371, 'z_shehov@abv.bg', 'Мъж', '4.00', '3.83', '11.66', 'Магистър', 'Компютърна графика', 'Логика и алгоритми', 'Изкуствен интелект', 'държавна поръчка', ''),
(9201132561, 'Евгения Стойчева Ковачева', 883688821, 'gabi_0113@abv.bg', 'Жена', '5.00', '4.23', '13.46', 'Магистър', 'Математическо моделиране в икономиката', 'Логика и алгоритми', 'Компютърна графика', 'държавна поръчка', 'first_wish'),
(9201132562, 'Стоян Михайлов Манолов', 883688822, 'kmanolov3@abv.bg', 'Мъж', '5.00', '4.02', '13.04', 'Магистър', 'Компютърна графика', 'Математическо моделиране в икономиката', 'Логика и алгоритми', 'държавна поръчка', 'second_wish'),
(9201132563, 'Иван Христов Моллов', 883688823, 'iv_mollov@abv.bg', 'Мъж', '5.00', '4.36', '13.72', 'Магистър', 'Компютърна графика', 'Логика и алгоритми', 'Изкуствен интелект', 'държавна поръчка', 'first_wish'),
(9201132564, 'Теодор Иванов Гайдаров', 882954323, 'todor_gaidarov@abv.bg', 'Мъж', '6.00', '4.23', '14.46', 'Магистър', 'Изкуствен интелект', 'Компютърна графика', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9201132565, 'Павел Станиславов Миленков', 882356780, 'pavell@abv.bg', 'Мъж', '4.00', '0.00', '4.00', 'Магистър', 'Математическо моделиране в икономиката', '', '', 'платено', ''),
(9201232565, 'Мартин Иванов Праматаров', 883688825, 'm_gavrilov@abv.bg', 'Мъж', '6.00', '5.88', '17.76', 'Магистър', 'Компютърна графика', 'Логика и алгоритми', 'Изкуствен интелект', 'държавна поръчка', 'first_wish'),
(9201232566, 'Христо Петров Илиев', 882954325, 'fmiitso@abv.bg', 'Мъж', '6.00', '5.60', '17.20', 'Магистър', 'Логика и алгоритми', 'Изкуствен интелект', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9201282566, 'Михаела Петровa Дончевa', 883688826, 'mishadd97@abv.bg', 'Жена', '6.00', '5.32', '16.64', 'Магистър', 'Логика и алгоритми', 'Изкуствен интелект', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9201282567, 'Генчо Славчев Митушев', 882954326, 'mbsa4321@abv.bg', 'Мъж', '5.00', '4.02', '13.04', 'Магистър', 'Логика и алгоритми', 'Компютърна графика', 'Математическо моделиране в икономиката', 'държавна поръчка', 'third_wish'),
(9202243786, 'Марио Симеонов Петров', 883658374, 'MarioMnt@abv.bg', 'Мъж', '6.00', '5.44', '16.88', 'Магистър', 'Изкуствен интелект', 'Компютърна графика', 'Логика и алгоритми', 'държавна поръчка', 'first_wish'),
(9202243787, 'Николай Асенов Апостолов', 883688829, 'Nikolay_Kotuzov@abv.bg', 'Мъж', '6.00', '5.72', '17.44', 'Магистър', 'Математическо моделиране в икономиката', 'Логика и алгоритми', 'Компютърна графика', 'държавна поръчка', 'first_wish'),
(9202278567, 'Милен Захариев Димитров', 882954317, 'ivan_zh@abv.bg', 'Мъж', '6.00', '5.12', '16.24', 'Магистър', 'Логика и алгоритми', 'Изкуствен интелект', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9203132564, 'Дарко Стоянов Кръстев', 883688824, 'dancevdarko@abv.bg', 'Мъж', '6.00', '4.87', '15.74', 'Магистър', 'Изкуствен интелект', 'Компютърна графика', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9203132565, 'Калоян Христов Дочев', 882954324, '61971_Kaloyan@abv.bg', 'Мъж', '5.00', '3.83', '12.66', 'Магистър', 'Компютърна графика', 'Логика и алгоритми', 'Изкуствен интелект', 'държавна поръчка', ''),
(9204278568, 'Васил Mетодиев Петров', 882954318, 'vasil_pashov1@abv.bg', 'Мъж', '5.00', '4.58', '14.16', 'Магистър', 'Логика и алгоритми', 'Компютърна графика', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9204278569, 'Сввтлан Тодоров Митев', 882954319, 'a_Stanimir@abv.bg', 'Мъж', '5.00', '3.95', '12.90', 'Магистър', 'Изкуствен интелект', 'Компютърна графика', 'Логика и алгоритми', 'държавна поръчка', 'first_wish'),
(9204278570, 'Йоана Мишева  Стоянова', 882954320, 'yoanka_96@abv.bg', 'Жена', '6.00', '4.56', '15.12', 'Магистър', 'Математическо моделиране в икономиката', 'Логика и алгоритми', 'Компютърна графика', 'държавна поръчка', 'first_wish'),
(9204278571, 'Мирослав Димитров Николов', 883658376, 'mironikolov_vt@abv.bg', 'Мъж', '6.00', '4.56', '15.12', 'Магистър', 'Компютърна графика', 'Математическо моделиране в икономиката', 'Логика и алгоритми', 'държавна поръчка', 'first_wish'),
(9205127622, 'Роксана Павлова Янева', 887256711, 'roxy@abv.bg', 'Жена', '5.00', '0.00', '5.00', 'Бакалавър', 'Софтуерно инженерство', '', '', 'платено', ''),
(9205167832, 'Галена Христова Грозева', 883658375, '61850_gabriela@abv.bg', 'Жена', '6.00', '5.12', '16.24', 'Магистър', 'Математическо моделиране в икономиката', 'Логика и алгоритми', 'Компютърна графика', 'държавна поръчка', 'first_wish'),
(9205167833, 'Стефан Никоалаев Русинов', 883688830, 'stamen9@abv.bg', 'Мъж', '5.00', '4.87', '14.74', 'Магистър', 'Компютърна графика', 'Математическо моделиране в икономиката', 'Логика и алгоритми', 'държавна поръчка', 'first_wish'),
(9205278571, 'Даниел Анастасов Илиев', 882954321, 'Kirincho@abv.bg', 'Мъж', '6.00', '5.12', '16.24', 'Магистър', 'Компютърна графика', 'Математическо моделиране в икономиката', 'Логика и алгоритми', 'държавна поръчка', 'first_wish'),
(9205278572, 'Цветелина Василева Видева ', 883658377, 'SmiLe22@abv.bg', 'Жена', '5.00', '4.20', '13.40', 'Магистър', 'Компютърна графика', 'Логика и алгоритми', 'Изкуствен интелект', 'държавна поръчка', 'second_wish'),
(9208243784, 'Деян Петров Боянов', 883658372, 'deyan_boikliev@abv.bg', 'Мъж', '5.00', '4.23', '13.46', 'Магистър', 'Логика и алгоритми', 'Изкуствен интелект', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9208243785, 'Росен Стефанов Чолаков', 883688827, 'kelanved96@abv.bg', 'Мъж', '6.00', '4.87', '15.74', 'Магистър', 'Логика и алгоритми', 'Компютърна графика', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9208243786, 'Румяна Павлова Янева', 887256711, 'roxy@abv.bg', 'Жена', '5.00', '0.00', '5.00', 'Магистър', 'Изкуствен интелект', '', '', 'платено', ''),
(9211278572, 'Симона Красимирова Асенова', 882954322, 'simona_tsenova17@abv.bg', 'Жена', '6.00', '5.00', '16.00', 'Магистър', 'Компютърна графика', 'Логика и алгоритми', 'Изкуствен интелект', 'държавна поръчка', 'first_wish'),
(9211278573, 'Поля Петкова Кръстева', 883658378, 'polinakk61789@abv.bg', 'Жена', '5.00', '3.95', '12.90', 'Магистър', 'Изкуствен интелект', 'Компютърна графика', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9212243785, 'Игор Иванов Симитчийски', 883658373, 'ksimitchij@abv.bg', 'Мъж', '6.00', '5.52', '17.04', 'Магистър', 'Логика и алгоритми', 'Компютърна графика', 'Математическо моделиране в икономиката', 'държавна поръчка', 'first_wish'),
(9212243786, 'Георги Димитров Карамазов', 883688828, 'gklogodazhki@abv.bg', 'Мъж', '5.00', '3.95', '12.90', 'Магистър', 'Изкуствен интелект', 'Компютърна графика', 'Логика и алгоритми', 'държавна поръчка', 'first_wish'),
(9411126210, 'Моника Иванова Кирякова', 884320933, 'monika333@abv.bg', 'Жена', '6.00', '5.03', '16.06', 'Бакалавър', 'Информатика', 'Софтуерно инженерство', 'Компютърни науки', 'държавна поръчка', 'first_wish'),
(9601032568, 'Георги Димитров Хаджийски', 883688828, 'gklogodazhki@abv.bg', 'Мъж', '5.00', '3.95', '12.90', 'Бакалавър', 'Информатика', 'Компютърни науки', 'Софтуерно инженерство', 'държавна поръчка', 'first_wish'),
(9601132562, 'Калоян Михайлов Манолов', 883688822, 'kmanolov3@abv.bg', 'Мъж', '5.00', '4.02', '13.04', 'Бакалавър', 'Компютърни науки', 'Информатика', 'Информационни системи', 'държавна поръчка', 'first_wish'),
(9601132563, 'Иван Стефанов Моллов', 883688823, 'iv_mollov@abv.bg', 'Мъж', '5.00', '4.36', '13.72', 'Бакалавър', 'Информационни системи', 'Софтуерно инженерство', 'Информатика', 'държавна поръчка', 'first_wish'),
(9601132569, 'Николай Асенов Котузов', 883688829, 'Nikolay_Kotuzov@abv.bg', 'Мъж', '6.00', '5.72', '17.44', 'Бакалавър', 'Софтуерно инженерство', 'Информатика', 'Информационни системи', 'държавна поръчка', 'first_wish'),
(9601232565, 'Мартин Иванов Гаврилов', 883688825, 'm_gavrilov@abv.bg', 'Мъж', '6.00', '5.76', '17.52', 'Бакалавър', 'Компютърни науки', 'Софтуерно инженерство', 'Информационни системи', 'държавна поръчка', 'first_wish'),
(9601282566, 'Михаела Петровa Дончевa', 883688826, 'mishadd97@abv.bg', 'Жена', '6.00', '5.32', '16.64', 'Бакалавър', 'Информационни системи', 'Информатика', 'Компютърни науки', 'държавна поръчка', 'first_wish'),
(9602243786, 'Марио Симеонов Петров', 883658374, 'MarioMnt@abv.bg', 'Мъж', '6.00', '5.44', '16.88', 'Бакалавър', 'Компютърни науки', 'Информационни системи', 'Информатика', 'държавна поръчка', 'first_wish'),
(9603132564, 'Дарко Стоянов Данчев', 883688824, 'dancevdarko@abv.bg', 'Мъж', '6.00', '4.87', '15.74', 'Бакалавър', 'Софтуерно инженерство', 'Информационни системи', 'Информатика', 'държавна поръчка', 'first_wish'),
(9604278567, 'Иван Захариев Димитров', 882954317, 'ivan_zh@abv.bg', 'Мъж', '6.00', '5.12', '16.24', 'Бакалавър', 'Софтуерно инженерство', 'Информатика', 'Информационни системи', 'държавна поръчка', 'first_wish'),
(9604278568, 'Васил Александров Пашов', 882954318, 'vasil_pashov1@abv.bg', 'Мъж', '5.00', '4.58', '14.16', 'Бакалавър', 'Компютърни науки', 'Софтуерно инженерство', 'Информационни системи', 'държавна поръчка', 'first_wish'),
(9604278569, 'Станимир Тодоров Митев', 882954319, 'a_Stanimir@abv.bg', 'Мъж', '5.00', '3.95', '12.90', 'Бакалавър', 'Информационни системи', 'Информатика', 'Компютърни науки', 'държавна поръчка', 'first_wish'),
(9604278570, 'Йоана Христова  Стоянова', 882954320, 'yoanka_96@abv.bg', 'Жена', '6.00', '4.56', '15.12', 'Бакалавър', 'Софтуерно инженерство', 'Компютърни науки', 'Информатика', 'държавна поръчка', 'third_wish'),
(9604278575, 'Христо Петров Илиев', 882954325, 'fmiitso@abv.bg', 'Мъж', '6.00', '5.88', '17.76', 'Бакалавър', 'Компютърни науки', 'Информатика', 'Информационни системи', 'държавна поръчка', 'first_wish'),
(9604278576, 'Стефан Славчев Митушев', 882954326, 'mbsa4321@abv.bg', 'Мъж', '5.00', '4.02', '13.04', 'Бакалавър', 'Информационни системи', 'Софтуерно инженерство', 'Информатика', 'държавна поръчка', 'first_wish'),
(9606179405, 'Калоян Христов Дочев', 882954324, '61971_Kaloyan@abv.bg', 'Мъж', '5.00', '3.83', '12.66', 'Бакалавър', 'Компютърни науки', 'Информационни системи', 'Информатика', 'държавна поръчка', 'third_wish'),
(9607174408, 'Никол Григорова Запрянова', 887350244, 'nikol@abv.bg', 'Жена', '6.00', '5.34', '16.68', 'Магистър', 'Математическо моделиране в икономиката', 'Изкуствен интелект', 'Компютърна графика', 'държавна поръчка', 'first_wish'),
(9607278573, 'Тодор Иванов Гайдаров', 882954323, 'todor_gaidarov@abv.bg', 'Мъж', '6.00', '4.23', '14.46', 'Бакалавър', 'Софтуерно инженерство', 'Компютърни науки', 'Информационни системи', 'държавна поръчка', 'second_wish'),
(9608043788, 'Мирослав Димитров Николов', 883658376, 'mironikolov_vt@abv.bg', 'Мъж', '6.00', '4.56', '15.12', 'Бакалавър', 'Софтуерно инженерство', 'Информатика', 'Информационни системи', 'държавна поръчка', 'second_wish'),
(9608143787, 'Габриела Христова Грозева', 883658375, '61850_gabriela@abv.bg', 'Жена', '6.00', '5.12', '16.24', 'Бакалавър', 'Информационни системи', 'Софтуерно инженерство', 'Информатика', 'държавна поръчка', 'first_wish'),
(9608243781, 'Мария Тодорова Чолакова', 883658369, 'mimi_0408@abv.bg', 'Жена', '6.00', '5.60', '17.20', 'Бакалавър', 'Софтуерно инженерство', 'Компютърни науки', 'Информатика', 'държавна поръчка', 'first_wish'),
(9608243782, 'Димитър Илиев Найденов', 883658370, 'AlbusSerpents@abv.bg', 'Мъж', '6.00', '5.52', '17.04', 'Бакалавър', 'Информатика', 'Компютърни науки', 'Софтуерно инженерство', 'държавна поръчка', 'first_wish'),
(9608243783, 'Здравко Василев Шехов', 883658371, 'z_shehov@abv.bg', 'Мъж', '4.00', '3.83', '11.66', 'Бакалавър', 'Софтуерно инженерство', 'Информатика', 'Информационни системи', 'държавна поръчка', 'second_wish'),
(9608243784, 'Деян Петров Боиклиев', 883658372, 'deyan_boikliev@abv.bg', 'Мъж', '5.00', '4.23', '13.46', 'Бакалавър', 'Софтуерно инженерство', 'Компютърни науки', 'Информационни системи', 'държавна поръчка', ''),
(9608243790, 'Полина Йорданова Гълъбова', 883658378, 'polinakk61789@abv.bg', 'Жена', '5.00', '4.12', '13.24', 'Бакалавър', 'Информационни системи', 'Информатика', 'Компютърни науки', 'държавна поръчка', 'first_wish'),
(9608283789, 'Лиляна Василева Андреева', 883658377, 'SmiLe22@abv.bg', 'Жена', '5.00', '4.20', '13.40', 'Бакалавър', 'Компютърни науки', 'Софтуерно инженерство', 'Информационни системи', 'държавна поръчка', 'first_wish'),
(9609132567, 'Румен Стефанов Чолаков', 883688827, 'kelanved96@abv.bg', 'Мъж', '6.00', '4.87', '15.74', 'Бакалавър', 'Софтуерно инженерство', 'Компютърни науки', 'Информатика', 'държавна поръчка', 'first_wish'),
(9609243781, 'Мария Станимирова Пенева', 883658369, 'mimi_0408@abv.bg', 'Жена', '6.00', '5.60', '17.20', 'Магистър', 'Компютърна графика', 'Логика и алгоритми', 'Изкуствен интелект', 'държавна поръчка', 'first_wish'),
(9610202570, 'Стамен Никоалаев Русинов', 883688830, 'stamen9@abv.bg', 'Мъж', '5.00', '4.87', '14.74', 'Бакалавър', 'Софтуерно инженерство', 'Компютърни науки', 'Информационни системи', 'държавна поръчка', 'second_wish'),
(9611278572, 'Симона Красимирова Ценова', 882954322, 'simona_tsenova17@abv.bg', 'Жена', '6.00', '5.00', '16.00', 'Бакалавър', 'Софтуерно инженерство', 'Информатика', 'Информационни системи', 'държавна поръчка', 'first_wish'),
(9612243785, 'Милен Ненчев Добрев', 883658373, 'ksimitchij@abv.bg', 'Мъж', '6.00', '5.52', '17.04', 'Бакалавър', 'Компютърни науки', 'Информатика', 'Информационни системи', 'държавна поръчка', 'first_wish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`EGN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
