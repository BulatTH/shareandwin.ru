-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 24 2017 г., 17:47
-- Версия сервера: 5.6.15-log
-- Версия PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shareandwin.ru`
--

-- --------------------------------------------------------

--
-- Структура таблицы `competition`
--

CREATE TABLE IF NOT EXISTS `competition` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `work_name` text NOT NULL,
  `image_url` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(3) NOT NULL,
  `text` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `read` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `notice`
--

INSERT INTO `notice` (`id`, `id_user`, `text`, `date`, `read`) VALUES
(1, 1, 'Участвуйте в косплей-конкурсе, регистрируйте и присылайте  ваше фото в образе любимых героев российского или советского кино и получите приз.\n<a href="reg_competition.php" class="resource_notice">Зарегистрироваться в конкурсе</a>\n', '24-05-2017 11:19:26', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL DEFAULT '1',
  `login` varchar(15) DEFAULT NULL,
  `password` text CHARACTER SET utf16,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `LastName` varchar(70) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Patronymic` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'images/sunset.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `status`, `login`, `password`, `email`, `phone`, `LastName`, `Name`, `Patronymic`, `url`) VALUES
(1, 2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bulat@yandex.ru', '89872282015', 'Хайрутдинов', 'Булат', 'Ришатович', 'images/sunset.jpg'),
(2, 1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@t.ru', '89872542135', 'Тестов', 'Тест', 'Тестович', 'images/sunset.jpg'),
(3, 1, 'o', 'd95679752134a2d9eb61dbd7b91c4bcc', '', '', '', '', '', 'images/sunset2.jpg'),
(4, 1, 'q', '7694f4a66316e53c8cdd9d9954bd611d', '', '', 'Блалов', 'Бла', 'Блалович', 'images/sunset.jpg'),
(5, 1, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', 'images/sunset.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
