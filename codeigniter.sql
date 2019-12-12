-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 12 2019 г., 13:35
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `codeigniter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `album_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `album`
--

INSERT INTO `album` (`id`, `us_id`, `file_id`, `album_name`) VALUES
(101, 97, 103, 'album1'),
(102, 97, 104, 'album1'),
(103, 97, 105, 'album2'),
(104, 97, 106, 'album2'),
(105, 95, 107, 'album_ani1'),
(106, 95, 108, 'album_ani2'),
(107, 95, 109, 'album_ani2'),
(108, 95, 110, 'album_ani2');

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_profil` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `user_id`, `img`, `is_profil`) VALUES
(103, 97, '932212.jpg', '0'),
(104, 97, '10308198.jpg', '0'),
(105, 97, '1565370394_art-fjentezi-devushki-4.jpg', '0'),
(106, 97, 'c3bc0b264c35b1017883ebea15b2c3a8.jpg', '0'),
(107, 95, 's375 (1).webp', '0'),
(108, 95, '1565370394_art-fjentezi-devushki-4.jpg', '0'),
(109, 95, 's375 (1).webp', '0'),
(110, 95, 's375.webp', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_first` int(11) NOT NULL,
  `user_second` int(11) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `user_first`, `user_second`, `message`, `created_time`) VALUES
(11, 95, 96, 'dffdfdf gdfgdf bhgf', '2019-12-11 18:49:31'),
(12, 95, 96, 'fgdfh gfhdthg hgfhtd', '2019-12-11 18:49:31'),
(13, 96, 95, 'vhh jhjhj hjh', '2019-12-11 18:52:10'),
(14, 95, 96, 'hhjn hbhkjnl', '2019-12-11 18:52:10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prof_img` varchar(255) NOT NULL,
  `random_link` varchar(255) NOT NULL,
  `status` enum('0','1') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `prof_img`, `random_link`, `status`, `created_at`) VALUES
(94, 'AnnaAni', 'Hovhannisyan', 'anna@outlook.com', '1bbd886460827015e5d605ed44252251', '1565370394_art-fjentezi-devushki-4.jpg', 'e1b6ebdb4179148606a8298ab27cab4f', '1', '2019-12-11 18:23:34'),
(95, 'AniAnna', 'Hovhannisyan', 'ani@outlook.com', '1bbd886460827015e5d605ed44252251', 'resize.jfif', '09baeee64d92947ca2951ae7e779e900', '1', '2019-12-11 18:25:21'),
(96, 'karen', 'Hovhannisyan', 'karen@out.com', '1bbd886460827015e5d605ed44252251', 's375 (1).webp', 'faec7dacb9431ab09b11828df6c50eba', '1', '2019-12-11 18:25:56'),
(97, 'Narek', 'Hovhannisyan', 'nare@out.ru', '1bbd886460827015e5d605ed44252251', 'images.jfif', 'b988dd0090a09cdef8a60c131db3aaa9', '1', '2019-12-11 18:26:28'),
(98, 'Haykuhi', 'Hovhannisyan', 'haykuhi@outlook.com', '1bbd886460827015e5d605ed44252251', '1565370394_art-fjentezi-devushki-4.jpg', '9bb7785e9e7f325ac3fe5edc30071599', '1', '2019-12-11 18:29:10');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
