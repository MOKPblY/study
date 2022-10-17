-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 17 2022 г., 09:35
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `iddo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `entrants`
--

CREATE TABLE `entrants` (
  `id` int NOT NULL,
  `surname` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `name` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `patro` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `grad_date` date DEFAULT NULL,
  `tel` char(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `prog` enum('Бакалавриат','Магистратура','Специалитет','Аспирантура') DEFAULT 'Бакалавриат',
  `score` smallint UNSIGNED DEFAULT '200',
  `file` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `univer` enum('МЭИ','МГТУ','МФТИ','МИРЭА','МТУСИ','МГУ') DEFAULT 'МЭИ',
  `red` bit(1) DEFAULT b'0',
  `gto` bit(1) DEFAULT b'0',
  `olymp` bit(1) DEFAULT b'0',
  `dorm` bit(1) DEFAULT b'0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `entrants`
--

INSERT INTO `entrants` (`id`, `surname`, `name`, `patro`, `grad_date`, `tel`, `email`, `prog`, `score`, `file`, `univer`, `red`, `gto`, `olymp`, `dorm`) VALUES
(1, 'Зуев', 'Семен', 'Семенович', '2021-07-31', '89267366223', 'semarussia14@gmail.com', 'Бакалавриат', 201, 'ege27.doc', 'МЭИ', b'0', b'0', b'0', b'0'),
(2, 'Петров', 'Петр', 'Петрович', '2021-07-31', '89999999999', 'petya123@ya.ru', 'Бакалавриат', 201, '', 'МЭИ', b'0', b'0', b'0', b'0'),
(3, 'Петров', 'Петр', 'Петрович', '2021-07-31', '89999999999', 'petya123@ya.ru', 'Бакалавриат', 201, '4519-петон.docx', 'МФТИ', b'0', b'1', b'0', b'1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `entrants`
--
ALTER TABLE `entrants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `entrants`
--
ALTER TABLE `entrants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
