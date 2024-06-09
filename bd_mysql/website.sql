-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2024 г., 19:51
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
-- Структура таблицы `fine`
--

CREATE TABLE `fine` (
  `id` int NOT NULL,
  `names` varchar(255) NOT NULL,
  `amount` int NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `fine`
--

INSERT INTO `fine` (`id`, `names`, `amount`, `reason`) VALUES
(1, 'Кузнецов Глеб Игоревич', 1000, 'Опоздание'),
(2, 'Кузнецов Глеб Игоревич', 500, 'Опоздание'),
(3, 'Кузнецов Глеб Игоревич', 500, 'Опоздание'),
(4, 'Кузнецов Глеб Игоревич', 500, 'Опоздание');

-- --------------------------------------------------------

--
-- Структура таблицы `smena`
--

CREATE TABLE `smena` (
  `id` int NOT NULL,
  `data_smena` date NOT NULL,
  `fio_smena` varchar(255) NOT NULL,
  `login_user_smena` varchar(255) NOT NULL,
  `accept_smen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `smena`
--

INSERT INTO `smena` (`id`, `data_smena`, `fio_smena`, `login_user_smena`, `accept_smen`) VALUES
(1, '2024-06-06', 'Кузнецов Глеб Игоревич', 'gover-dev', 2),
(2, '2024-06-06', 'user', 'user', 1),
(1, '2024-06-07', 'Кузнецов Глеб Игоревич', 'gover-dev', 1),
(2, '2024-06-07', '', '', 0);

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
(5, 'anastasya_l', '123', 'Лебедева Анастасия Евгеньевна', '13.07.2001', 'Какая', 0),
(14, 'dima_k', '123', 'Курочкин Дмитрий Сергеевич', '10.02.2001', 'Que', 1),
(15, 'sveta_g', '123', 'Галкина Светлана Николаевна', '05.06.1989', 'Que', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wallet`
--

CREATE TABLE `wallet` (
  `id` int NOT NULL,
  `names` varchar(255) NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `wallet`
--

INSERT INTO `wallet` (`id`, `names`, `amount`) VALUES
(1, 'Кузнецов Глеб Игоревич', 25000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `fine`
--
ALTER TABLE `fine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
