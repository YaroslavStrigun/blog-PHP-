-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Квт 02 2018 р., 20:41
-- Версія сервера: 5.6.38
-- Версія PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `test_blog`
--

-- --------------------------------------------------------

--
-- Структура таблиці `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `text` text,
  `categorie_id` int(11) DEFAULT NULL,
  `pubdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `text`, `categorie_id`, `pubdate`, `views`) VALUES
(1, 'PHP', 'php.jpg', 'PHP (произносится пи-эйч-пи́) — скриптовый язык программирования, созданный для генерации HTML-страниц на веб-сервере и работы с базами данных. На сегодняшний момент поддерживается подавляющим большинством представителей хостингов. Входит в «LAMP» — «стандартный» набор для создания веб-сайтов.', 4, '2018-04-01 18:22:38', 57),
(2, 'Конспект по веб-безопасности', 'test.jpg', 'FTP – не безопасный протокол, передает информацию не в зашифрованном виде, поэтому стоит выбрать либо FTPS, либо SFTP. Теперь по SSH, авторизация по ключам, ─ используем denyhost или его аналог, можно сменить дефолтный порт.\r\nВсе, что брутят, нужно закрывать. Если у вас есть свой сервер и вы хоть раз смотрели в логи, вы наверняка замечали многочисленные попытки авторизации по SSH и по FTP, идущие с китайских IP.\r\nВо вне должны смотреть только действительно нужные порты, остальное закрываем фаерволом.\r\nИспользуем всегда актуальные версии софта, вовремя обновляемся.', 7, '2018-04-01 18:25:06', 174),
(3, 'Test', 'test.jpg', 'Test', 5, '2018-04-02 19:20:19', 4),
(4, 'Test2', 'test.jpg', 'Testik', 4, '2018-04-02 19:20:49', 0),
(5, 'Test3', 'test.jpg', 'Oyoyyoyoy', 6, '2018-04-02 19:21:15', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `articles_categories`
--

CREATE TABLE `articles_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `articles_categories`
--

INSERT INTO `articles_categories` (`id`, `title`) VALUES
(4, 'Программирование'),
(5, 'Lifestyle'),
(6, 'Игры'),
(7, 'Безопасность'),
(8, 'Хакерство'),
(9, 'Разное');

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `pubdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `articles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `author`, `email`, `text`, `pubdate`, `articles_id`) VALUES
(1, 'Oleh.', 'rodrigo@gmail.com', 'Классная статья. Спасибо.', '2018-04-02 11:52:48', 2),
(2, 'Ирина', 'istrigun@ukr.net', 'Очень понравился материал.', '2018-04-02 11:56:24', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `articles_categories`
--
ALTER TABLE `articles_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
