-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 29 2016 г., 13:12
-- Версия сервера: 10.1.8-MariaDB
-- Версия PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `evo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1458900459),
('m130524_201442_init', 1458900462),
('m160325_090136_categs', 1458900463);

-- --------------------------------------------------------

--
-- Структура таблицы `mov_categs`
--

CREATE TABLE `mov_categs` (
  `id` int(11) NOT NULL,
  `categ_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categ_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categ_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categ_order` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mov_categs`
--

INSERT INTO `mov_categs` (`id`, `categ_name`, `categ_img`, `categ_status`, `categ_order`) VALUES
(1, 'Animals', 'Koala.jpg_1459169001.jpg', '1', '1'),
(2, 'Plants', 'Hydrangeas.jpg_1459169075.jpg', '1', '2'),
(3, 'Planet', 'Desert.jpg_1459169047.jpg', '1', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `mov_gallery`
--

CREATE TABLE `mov_gallery` (
  `id` int(11) NOT NULL,
  `item_parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_order` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mov_gallery`
--

INSERT INTO `mov_gallery` (`id`, `item_parent_id`, `item_name`, `item_img`, `item_status`, `item_order`) VALUES
(3, '1', 'fghfghsfgh', 'Koala.jpg_1459175579.jpg', '1', '111'),
(4, '2', 'hjdghjdg', 'Hydrangeas.jpg_1459175572.jpg', 'gdhjdghj', '2'),
(5, '1', 'sgh sfghsf', 'Jellyfish.jpg_1459175566.jpg', '1', '1'),
(6, '1', 'rgsfghsfghg', 'Desert.jpg_1459175559.jpg', '23', '2323'),
(7, '1', 'sdfsdfs', 'Chrysanthemum.jpg_1459175551.jpg', '1', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `mov_migration`
--

CREATE TABLE `mov_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `mov_migration`
--

INSERT INTO `mov_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1459161876),
('m130524_201442_init', 1459161879),
('m160325_090136_categs', 1459162956),
('m160328_104203_gallery', 1459162956);

-- --------------------------------------------------------

--
-- Структура таблицы `mov_user`
--

CREATE TABLE `mov_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mov_user`
--

INSERT INTO `mov_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'SupreAdmin', '3sxx41Soari4ovQG6tGzAS3wH_IS-QzC', '$2y$13$xFEJ9lW5Wsnu6T2mATWOf.SLAm47XTPDfq/CNyq390uZG9JRnoFTe', NULL, 'gar.khotsanyan@gmail.com', 10, 1459150509, 1459150509);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `mov_categs`
--
ALTER TABLE `mov_categs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mov_gallery`
--
ALTER TABLE `mov_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mov_migration`
--
ALTER TABLE `mov_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `mov_user`
--
ALTER TABLE `mov_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mov_categs`
--
ALTER TABLE `mov_categs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `mov_gallery`
--
ALTER TABLE `mov_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `mov_user`
--
ALTER TABLE `mov_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
