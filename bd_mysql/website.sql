-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2024 г., 07:57
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `website`
--

-- --------------------------------------------------------

--
-- Структура таблицы `smena`
--

CREATE TABLE `smena` (
  `id` int NOT NULL,
  `data_smena` date NOT NULL,
  `fio_smena` varchar(255) NOT NULL,
  `login_user_smena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `smena`
--

INSERT INTO `smena` (`id`, `data_smena`, `fio_smena`, `login_user_smena`) VALUES
(1, '2024-01-01', 'user', 'user'),
(2, '2024-01-01', 'Кузнецов Глеб Игоревич', 'gover-dev'),
(3, '2024-01-01', '', ''),
(4, '2024-01-01', '', ''),
(5, '2024-01-01', '', ''),
(6, '2024-01-01', '', ''),
(7, '2024-01-01', '', ''),
(8, '2024-01-01', '', ''),
(9, '2024-01-01', '', ''),
(10, '2024-01-01', '', ''),
(1, '2024-01-02', 'user', 'user'),
(2, '2024-01-02', 'Лебедева Анастасия Евгеньевна', 'anastasya_l'),
(3, '2024-01-02', 'Кузнецов Глеб Игоревич', 'gover-dev'),
(1, '2024-06-28', 'Кузнецов Глеб Игоревич', 'gover-dev'),
(2, '2024-06-28', '', ''),
(1, '2024-05-28', 'Кузнецов Глеб Игоревич', 'gover-dev');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fio`, `dateofbirth`, `position`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', '00.00.0000', 'admin', 1),
(2, 'user', '123', 'user', '08.05.2024', 'dev', 0),
(3, 'gover-dev', '123', 'Кузнецов Глеб Игоревич', '20.11.2003', 'dev', 1),
(4, 'danil_j', '123', 'Жуков Данил Сергеевич', '05.10.1991', 'Комплектовщик', 0),
(5, 'anastasya_l', '123', 'Лебедева Анастасия Евгеньевна', '13.07.2001', 'Какая', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
