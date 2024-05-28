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
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `global_chat`
--

CREATE TABLE `global_chat` (
  `id` int NOT NULL,
  `message` varchar(255) NOT NULL,
  `name_send` varchar(100) NOT NULL,
  `date` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `global_chat`
--

INSERT INTO `global_chat` (`id`, `message`, `name_send`, `date`) VALUES
(1, 'ПРИВЕТ! как дела?', 'Кузнецов Глеб Игоревич', '16:40 27.06.2024'),
(2, 'ПРИВЕТ! нормально', 'user', '16:40 27.06.2024'),
(3, '$messenge', '$name', '16:40 27.06.2024'),
(4, 'Что делаешь?', 'Кузнецов Глеб Игоревич', '16:40 27.06.2024'),
(5, 'Что делаешь?', 'Кузнецов Глеб Игоревич', '16:40 27.06.2024'),
(6, 'Ничего', 'user', '16:40 27.06.2024'),
(7, 'Все привет! Как дела!', 'Лебедева Анастасия Евгеньевна', '16:40 27.06.2024'),
(8, 'Твои догадки — сущий вздор, Моих стихов ты не проникнул, Я знаю, ты картежный вор, Но от вина ужель отвыкнул?', 'Лебедева Анастасия Евгеньевна', '16:40 27.06.2024'),
(9, 'Всем пока', 'Кузнецов Глеб Игоревич', '17:07 27.05.2024'),
(10, 'GG', 'Кузнецов Глеб Игоревич', '17:07 27.05.2024'),
(11, '1', 'user', '17:01 2024.05.27'),
(12, 'Вот такие дела!!!!!!!', 'Кузнецов Глеб Игоревич', '07:43 2024.05.28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `global_chat`
--
ALTER TABLE `global_chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `global_chat`
--
ALTER TABLE `global_chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
