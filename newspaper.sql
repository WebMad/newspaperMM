-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 26 2018 г., 12:13
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
-- База данных: `newsPaper`
--

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE `information` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`id`, `type`, `text`) VALUES
(1, 'contacts', '<p>Адрес редакции:<br />\r\nг. Астрахань, ул. Анри Барбюса, 7<br />\r\nРегиональный школьный технопарк<br />\r\nЭл.адрес: mar194@yandex.ru<br />\r\nТел.: +7(8512) 52-68-92<br />\r\n+7(908) 623-28-33</p>\r\n'),
(2, 'editorial_board', '<ul class=\"list-unstyled text-small\">\r\n			              <li><a class=\"text-muted\" href=\"#\">Директор РШТ: В.Войков</a></li>\r\n			              <li><a class=\"text-muted\" href=\"#\">Редактор: М.Бобровская</a></li>\r\n			              <li><a class=\"text-muted\" href=\"#\">Дизайн названия: М. Агафонов</a></li>\r\n			            </ul>'),
(3, 'about_us', '<p>1 сентября 2015 года Региональный школьный технопарк начал выпуск детской городской ежемесячной газеты &laquo;Мы Можем!&raquo;. Материалы газеты готовятся обучающимися общеобразовательных организаций Астраханской области под руководством преподавателей РШТ. &laquo;Мы Можем!&raquo; является медиа-площадкой для репортажей и интервью о детском научно-техническом творчестве, интересах и проблемах детей и молодежи. Попробовать свои силы в разных жанрах журнали может любой обучающийся.</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `main_page`
--

CREATE TABLE `main_page` (
  `id` int(255) NOT NULL,
  `news` text NOT NULL,
  `newspapers` text NOT NULL,
  `authors` text NOT NULL,
  `main_new` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main_page`
--

INSERT INTO `main_page` (`id`, `news`, `newspapers`, `authors`, `main_new`) VALUES
(1, '', '', '[\"11\",\"12\"]', '[\"1\"]');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `annotation` text NOT NULL,
  `images` text NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `last_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `annotation`, `images`, `views`, `last_edit`, `date`) VALUES
(1, 'Тест', '<p><em>Текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст </em></p>\r\n\r\n<p><strong>Текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст</strong></p>\r\n\r\n<p><s>текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст</s></p>\r\n\r\n<p><u>текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст</u></p>\r\n', 'Описание', '[]', 11, '2018-07-12 11:06:55', '2018-07-12 11:06:55'),
(4, 'Тест', '<p>Тестовое содержание</p>\r\n', 'Тестовое краткое содержание', '[]', 1, '2018-07-19 06:43:19', '2018-07-19 06:43:19'),
(5, 'Заголовок', '<p>Содержание</p>\r\n', 'Краткое содержание', '[\"1532319016.png\",\"1532319017.jpg\",\"1532319018.jpg\"]', 3, '2018-07-23 04:10:16', '2018-07-23 04:10:16');

-- --------------------------------------------------------

--
-- Структура таблицы `newspapers`
--

CREATE TABLE `newspapers` (
  `id` int(255) NOT NULL,
  `text` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no-photo.png',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `newspapers`
--

INSERT INTO `newspapers` (`id`, `text`, `filename`, `img`, `date`) VALUES
(1, 'jhghkj hkhjkh', '1532595207.pdf', '1532595207.jpg', '2018-07-26 08:53:27'),
(2, 'rtrtrtrt tr tr trt r', '1532595299.pdf', '1532595299.jpg', '2018-07-26 08:54:59'),
(3, 'trtertretert te ter tre', '1532595317.pdf', '1532595317.jpg', '2018-07-26 08:55:17');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(63) NOT NULL,
  `password` varchar(63) NOT NULL,
  `photo` varchar(63) NOT NULL DEFAULT 'no-photo.png',
  `type` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `photo`, `type`) VALUES
(1, 'Алексей', 'Губин', 'alecmei.gubin@yandex.ru', '4511913', '1.png', 1),
(2, 'Алексей', 'Губин', 'alecmei.gubin@yandex.r', '', 'no-photo.png', 0),
(3, 'Алексей', 'Губин', 'alecmei.gubin@yandex.r', '', 'no-photo.png', 0),
(4, 'Алексей', 'Губин', 'alecmei.gubin@yandex.r', '', 'no-photo.png', 0),
(5, 'Алексей', 'Губин', 'alecmei.gubin@yandex.r', '', 'no-photo.png', 0),
(6, 'Алексей', 'Губин', 'alecmei.gubin@yandex.ru', '', 'no-photo.png', 0),
(7, 'Алексей', 'dsd', 'alecmei.gubin@yandex.ru', '', 'no-photo.png', 0),
(8, 'Алексей', 'dsds', 'alecmei.gubin@yandex.ru', '', 'no-photo.png', 0),
(9, 'Алексей', 'dffdf', 'alecmei.gubin@yandex.ru', '', 'no-photo.png', 0),
(10, 'Алексей', 'dffdf', 'alecmei.gubin@yandex.ru', '', 'no-photo.png', 0),
(11, 'Анатолий', 'Костыренко', 'kostyrenkoaa@gmail.com', '123456', '111.jpg', 2),
(12, 'Алексей', 'Губин', 'alecmei@yandex.ru', '4511913', '12.jpg', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `newspapers`
--
ALTER TABLE `newspapers`
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
-- AUTO_INCREMENT для таблицы `information`
--
ALTER TABLE `information`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `main_page`
--
ALTER TABLE `main_page`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `newspapers`
--
ALTER TABLE `newspapers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
