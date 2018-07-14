-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 14 2018 г., 15:41
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `newspaper`
--

-- --------------------------------------------------------

--
-- Структура таблицы `main_page`
--

CREATE TABLE `main_page` (
  `id` int(255) NOT NULL,
  `type` enum('main_new','news','newspaper','authors') NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main_page`
--

INSERT INTO `main_page` (`id`, `type`, `content`) VALUES
(1, 'news', '[\"1\",\"2\"]'),
(2, 'newspaper', '[\"dsdsdsd dsdsd dsdsdsd\",\"dsdsdsd dsdsd dsdsdsd\",\"dsdsdsd dsdsd dsdsdsd\"]'),
(3, 'authors', '[\"2\",\"2\"]'),
(4, 'main_new', '[\"1\"]');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `annotation` text NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `annotation`, `views`, `date`, `last_edit`) VALUES
(1, 'Пример новости', '<p>Содержание</p>\r\n', 'Краткое содержание', 0, '2018-07-14 06:04:40', '2018-07-14 06:04:40'),
(2, 'Новость 2', '<p>А это и есть полное содержание данной статьи.</p>\r\n', 'Должно быть кратким содержанием', 0, '2018-07-14 12:34:33', '2018-07-14 12:34:33');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(63) NOT NULL,
  `password` varchar(63) NOT NULL,
  `type` int(15) NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL DEFAULT 'no-photo.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `type`, `photo`) VALUES
(1, 'Алексей', 'Губин', 'alecmei.gubin@yandex.ru', '4511913', 1, '1.png'),
(2, 'Pascal', 'Proger', 'pascal@mail.ru', '123456', 2, 'no-photo.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `main_page`
--
ALTER TABLE `main_page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `main_page`
--
ALTER TABLE `main_page`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
