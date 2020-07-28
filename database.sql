-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 28 2020 г., 14:58
-- Версия сервера: 5.6.47
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mybd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_update` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `status`, `user_name`, `email`, `text`, `admin_update`) VALUES
(1, 1, 'Данил', 'danil62@gmail.com', 'Изменить номер телефона в шапке', 0),
(2, 0, 'Андрей', 'andrey42@yandex.ru', 'Установить на сайт Счетчик Яндекс Метрика', 1),
(3, 1, 'Михаил', '96-mishail@gmail.com', 'Удалить папку mycar с корня сайта', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
