-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 16 2019 г., 09:36
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
(141, 116, 143, 'album_haykuhi1'),
(143, 116, 145, 'album_haykuhi2'),
(144, 116, 146, 'album_haykuhi2'),
(149, 115, 151, 'album_karen1'),
(150, 115, 152, 'album_karen1'),
(151, 115, 153, 'album_karen1'),
(152, 115, 154, 'album_karen2'),
(153, 115, 155, 'album_karen2');

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
(143, 116, '103081989.jpg', '0'),
(145, 116, '1565370394_art-fjentezi-devushki-4.jpg', '0'),
(146, 116, 'c3bc0b264c35b1017883ebea15b2c3a85.jpg', '0'),
(151, 115, '0aa4cf3741c8b15c0ef9303bb34f0a8cimg3.jpg', '0'),
(152, 115, '1d314525d7345f0991da18640dd9f736ee70a4bd6f06e912e3dc8fa45b939451images_(7).jpg', '0'),
(153, 115, '6f42bd0affbcbbf6c4b75b3d9f727ca0images_(6).jpg', '0'),
(154, 115, '781e99ebd3b867486ae83e93a1332e55img2.jpg', '0'),
(155, 115, '1720bae1e80e23c990394839caf754d7images_(2).jpg', '0');

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
(19, 115, 112, 'sdcdsdsc', '2019-12-15 19:09:09'),
(20, 113, 112, 'cxccsss', '2019-12-15 19:15:18'),
(21, 112, 113, 'dvdsfdsfdf', '2019-12-15 19:17:11'),
(22, 113, 112, 'fvfvf vfdf fdf', '2019-12-15 19:17:11');

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
(112, 'Narek', 'grigoryan', 'nare@out.ru', '1bbd886460827015e5d605ed44252251', '0aa4cf3741c8b15c0ef9303bb34f0a8cimg31.jpg', '17f75495dcfe787975e74bf5732fcac2', '1', '2019-12-15 18:43:04'),
(113, 'Annaa', 'Hovhannisyan', 'anna@outlook.com', '1bbd886460827015e5d605ed44252251', '1d314525d7345f0991da18640dd9f736ee70a4bd6f06e912e3dc8fa45b939451images_(7)1.jpg', '56f0b46b49e4bf26524e2fd393c92d1d', '1', '2019-12-15 18:44:21'),
(114, 'Aniii', 'Hovhannisyan', 'ani@outlook.com', '1bbd886460827015e5d605ed44252251', '8b6ea81d1e67ff496b07c82af832cba9images_(3).jpg', '0d48ad2008279a8eae9caa522a358d4c', '1', '2019-12-15 18:44:49'),
(115, 'Karen', 'Hovhannisyan', 'karen@out.com', '1bbd886460827015e5d605ed44252251', '', 'efe48f08e529cfc38412f758547b32c8', '1', '2019-12-15 18:45:25'),
(116, 'Haykuhi', 'Avetisyan', 'haykuhi@outlook.com', '1bbd886460827015e5d605ed44252251', '93221214.jpg', '7e5a4c9309b419f9f0e32a943977ae5d', '1', '2019-12-15 18:46:07'),
(117, 'fbdshjbbj', 'Hovhannisyan', 'lusinehovhannisyan280@gmail.com', '1bbd886460827015e5d605ed44252251', '', '06d79de42493f0b1378f70d9269c3af6', '1', '2019-12-15 19:17:55');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
