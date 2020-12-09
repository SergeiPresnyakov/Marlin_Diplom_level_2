-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 09 2020 г., 16:06
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
-- База данных: `profiles`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` tinyint(4) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permissions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permissions`) VALUES
(1, 'Simple user', ''),
(2, 'Administrator', '{\"admin\":1}');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` varchar(255) NOT NULL,
  `group_id` tinyint(4) NOT NULL DEFAULT '1',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `group_id`, `registration_date`) VALUES
(1, 'Админ Админский', 'adminadminsky@gmail.com', '$2y$10$pDEyGHaL9N4ocjFsEXGTLO.MibMC3qlCUtE1WtANd8cetcts7gVhq', 'Я здесь главный. И вообще...', 2, '2020-12-09 12:51:36'),
(2, 'Киану Ривз', 'keanureeves@gmail.com', '$2y$10$eUtIzznfvkfAz9ie0U7nwu.4VXOq6gd.opSvbarlV.JRRINpfb/YW', 'Ты потрясающий! Вы все потрясающие!', 1, '2020-12-09 12:52:20'),
(3, 'Тони Старк', 'tonystark@gmail.com', '$2y$10$.qNpkCtydbxDo58l8F1HBOsEMWKAN8KE9fIlPqs2nAz1oV.IAtCq2', 'Вы знаете кто я', 1, '2020-12-09 12:53:01'),
(4, 'Элвис Пресли', 'elvispresley@gmail.com', '$2y$10$Sj9eq1y/lT.qYvVUvC5HOeJYJYo7NZVo4kX11eSwjot3afWyY.XqG', 'Пою песни', 1, '2020-12-09 12:53:45'),
(5, 'Иван Иванов', 'ivanivanov@gmail.com', '$2y$10$GIGBlQ3JViljTPiy59HXXuId.tmfIyCHnC/OMKdzEsM1eZJNPmESS', 'Я понятия не имею что я здесь делаю', 1, '2020-12-09 12:54:22'),
(6, 'Петр Петров', 'petrpetrov@gmail.com', '$2y$10$gTLj4Xc80RnuFQ.Rxjel4udhO.fxYmLKH1kYakEokCxHxU1dFqf8i', 'Здесь могла быть ваша реклама', 1, '2020-12-09 12:55:00'),
(7, 'Сергей Пресняков', 'sergeypresniakov@gmail.com', '$2y$10$ThQe3vLhH0J3.tfrqkUaBORXQA06cjKhD40IewdAUxCF.JlOKsBCK', 'Хочу на 3-й уровень', 1, '2020-12-09 12:55:34');

-- --------------------------------------------------------

--
-- Структура таблицы `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `hash`) VALUES
(3, 10, '87ec5f84eccae7fb352f80a60a2d35eb9bf67552bfee39ca8dd94f607d5d8a0a'),
(5, 8, '894c83564420106a2ea03b863fc8a7040b813069412bd94d8876d868ad18d979'),
(6, 1, 'c9bfb282e70c6263f55a259b4c10e11764dcaa556c516647bb4a73adbdb0d90e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
