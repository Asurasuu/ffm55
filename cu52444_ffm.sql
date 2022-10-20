-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 19 2022 г., 12:12
-- Версия сервера: 5.7.35-38
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cu52444_ffm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cols`
--

CREATE TABLE IF NOT EXISTS `cols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cols`
--

INSERT INTO `cols` (`id`, `user_id`, `event_id`) VALUES
(2, '1', '1'),
(3, '2', '1'),
(4, '3', '1'),
(6, '4', '1'),
(7, '4', '2'),
(8, '5', '1'),
(9, '6', '1'),
(11, '7', '1'),
(12, '11', '1'),
(13, '12', '1'),
(14, '13', '1'),
(15, '14', '1'),
(16, '15', '1'),
(17, '16', '1'),
(18, '17', '1'),
(19, '19', '1'),
(20, '20', '1'),
(21, '21', '1'),
(22, '22', '1'),
(23, '23', '1'),
(24, '24', '1'),
(25, '25', ''),
(26, '26', '1'),
(27, '27', '1'),
(28, '28', '1'),
(29, '29', ''),
(30, '1', '2'),
(31, '2', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `text` longtext NOT NULL,
  `palace` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `rules` varchar(255) DEFAULT NULL,
  `protocol` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `title`, `cover`, `text`, `palace`, `day`, `month`, `year`, `rules`, `protocol`) VALUES
(1, 'Чемпионат и первенство Омской области по функциональному многоборью', 'files_62199dd19ed14.jpg', '<p>\nПриглашаем всех атлетов Омска и Омской области принять участие в чемпионате по функциональному многоборью.\n</p>\n\n<p>\nСоревнования пройдут 26 марта в СКК им. Виктора Блинова, по адресу: ул. Декабристов, 91\n</p>\n\n<p>\nСоревнования проводятся в следующих категориях: <br>\n- юноши и девушки 14-15 лет; <br>\n- юноши и девушки 16-17 лет; <br>\n- юниоры и юниорки 18-20 лет; <br>\n- мужчины и женщины 21-39; <br>\n- мастера 40+; <br>\n- scaled (базовая).\n</p>\n\n<p>\nОрганизационный взнос за участие составляет: <br>\nдля категорий 14 - 17 лет - 1000 рублей <br>\nостальные категории (18+) - 1500рублей <br>\n</p>\n\n<p>\nДля допуска к соревнованиям каждый участник обязан иметь: <br>\n- медицинскую справку о допуске к соревнованиям; <br>\n- полис обязательного медицинского страхования; <br>\n- спортивную страховку от несчастных случаев; <br>\n- заполненный отказ от претензий; <br>\n- документ, удостоверяющий личность; <br>\n</p>\n\n<p>\nФорму отказа от претензий и список заданий по категориям вы можете увидеть в <a href=\"https://vk.com/club210523180\">группе соревнований</a>.\n</p>', 'ГПОО «СКК им. В.Блинова»', '26', '03', 22, 'Polozhenie.docx', 'Spisok_uchastnikov.xlsx'),
(2, 'Областные соревнования по функциональному многоборью', '5sH7D8LbUHW5pEcLHhYgBEoXR7ddEqDLdw-ijdUoU1r2LCrJUuTOer18qP-Loji7x2TgHGCS9OuOx04QNy8nHWGU.jpg', '<p>Уважаемые атлеты, с радостью вам сообщаем, что 19 ноября состоятся   Областные соревнования по функциональному многоборью!</p>  <p> Приглашаем всех спортсменов Омска и Омской области к участию в этом мероприятии.   </p>    <p> Представлены следующие категории:  <br> 14-15,16-17,18-20,21-39, мастера 40+ , scaled.   </p>    <p>Соревнования пройдут: 19 ноября в ГПОО «СКК им. В.Блинова» ,   ул. Декабристов, 91, Омск   <br> 10:00  </p>    <p> ✅Регистрация до 6 ноября включительно.   </p>    <p><a href=\"https://t.me/+3MZqmtKk6VczZGMy\">ТГ канал соревнований</a></p>', 'ГПОО «СКК им. В.Блинова»', '19', '11', 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `fotos`
--

INSERT INTO `fotos` (`id`, `title`, `cover`, `link`, `day`, `month`, `year`) VALUES
(1, 'Чемпионат и первенство Омской области по функциональному многоборью', 'files_624951cf088bb.jpg', 'https://vk.com/album-210523180_283616251', '26', '03', '22');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `cover`, `text`, `day`, `month`, `year`) VALUES
(1, 'Состоялся Чемпионат и первенство Омской области по функциональному многоборью', 'files_624955decdfd2.JPG', '<p>\nСостоялся Чемпионат и первенство Омской области по функциональному многоборью?\n</p>\n\n<p>\nМы благодарны всем участникам, которые не побоялись прийти и показать себя. Большое спасибо всем волонтёрам, организаторам и судьям, с чьей помощью состоялось мероприятие.\n</p>\n\n<p>\nНадеемся, что каждый из вас достиг своей цели в участии. Для всех атлетов это бесценный опыт, который сделает их сильнее. Прийти сюда - это уже победа. Победа над собой.\n</p>\n\n<p>\nПобедители и призеры:\n</p>\n\n<p>\n<b>Категория 14-15 лет</b> <br>\n1 место -Учайкин Матвей <br>\n2 место - Герасимов Михаил <br>\n3 место - Кульман Кирилл <br>\n</p>\n\n<p>\n<b>Категория 16-17 Юноши</b> <br>\n1 место -Остришко Богдан <br>\n2 место - Светличный Матвей <br>\n3 место - Саврасов Павел <br>\n</p>\n\n<p>\n<b>Категория 16-17 Юниорки</b><br>\n1 место -Тиль Варвара <br>\n2 место - Анохина Елена <br>\n3 место - Степаненко Евгения <br>\n</p>\n\n<p>\n<b>Категория 18-20 Юниоры</b> <br>\n1 место -Кирьянов Никита <br>\n2 место - Новоселов Андрей <br>\n3 место - Асташин Игорь <br>\n</p>\n\n<p>\n<b>Категория 21-39 Мужчины</b> <br>\n1 место - Самохин Александр <br>\n2 место - Хиневич Владимир <br>\n3 место - Иванов Константин <br>\n</p>\n\n<p>\n<b>Категория 21-39 Женщины</b> <br>\n1 место - Герасименко Ирина <br>\n2 место - Конопля Валерия <br>\n3 место - Никифорова Ольга <br>\n</p>\n\n<p>\n<b>Категория 40+ Мужчины</b> <br>\n1 место- Остришко Максим <br>\n2 место - Чебаньков Павел <br>\n3 место - Орловский Владимир <br>\n</p>\n\n<p>\n<b>Категория 40+ Женщины</b> <br>\n1 место- Шнитова Лариса <br>\n2 место - Григорьева Зульфия <br>\n3 место - Панасенко Екатерина <br>\n</p>\n\n<p>\n<b>scaled женщины:</b> <br>\n1 место - Юдина Анна <br>\n2 место -Ланкова Ален <br>\n3 место- Полухина Ксения <br>\n</p>\n\n<p>\n<b>scaled мужчины:</b> <br>\n1 место-Дитятив Антон <br>\n2 место - Абрашин Иван <br>\n3 место - Афонин Александр <br>\n</p>\n\n<p>\nДо новых встреч !\n</p>', '26', '03', 22);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `lastname`, `email`, `password`, `status`) VALUES
(1, 'Андрей', 'Новоселов', 'Владиславович', 'andrey.novoselov.v@yandex.ru', '$2y$10$TCdX7slwrT4nmCSDF5Sq3uYXeNTW7JVamXik4WbcEyvjWCA5IU.Fy', 10),
(2, 'Никита ', 'Кирьянов', 'Александрович', 'n_kirianov@mail.ru', '$2y$10$lM2EmYOCLiD89NSy1DRRsO0w0cVtE24pB/2yxA1cVnF58/pIBM5sK', 1),
(3, 'Ирина', 'Герасименко ', 'Владимировна', 'iriska_407@mail.ru', '$2y$10$to2t3iWhRy6oxh4suue3HOLubNNKE0D.8SrR7RAVja6QHu43JL3yi', 1),
(4, 'Антон', 'Дитятив', 'Юрьевич', 'anton_dityativ@mail.ru', '$2y$10$6fffivstpPd03Y3nryXkqOXgNXHft6KGmmnVeGPT20KPEiTexWi0y', 1),
(5, 'Александр ', 'Самохин', 'Олегович', 'dganek2009@mail.ru', '$2y$10$/3O5LSSV1XhYdvjmdnXbA.3wC15lexdSdmuFOCpZkrBCsZGz1L0l6', 1),
(6, 'Владимир', 'Хиневич', 'Валерьевич', 'vovanmax88@mail.ru', '$2y$10$NNVRtCxvKMsZVFAs9yeBSucPGs9onOyqUrxyTeXG2itVkT2uTb/oi', 1),
(11, 'Максим', 'Остришко', 'Николаевич', 'mostrishko@yandex.ru', '$2y$10$k/LJLoLkWdyZsO8Ra8.n6eAliM2JTHyDmd0BxBnar.Ba7mTE72yX6', 1),
(12, 'Светлана', 'Астафьева', 'Анатольевна', 'svetlast@mail.ru', '$2y$10$WKLyZiSvDkpDFMcRdNsLXeHGG81biCGtMQOPDsM5SAsnxDPmKeY52', 1),
(13, 'Татьяна', 'Сергиенко', 'Игоревна', 'ta-nja.89@list.ru', '$2y$10$Kcy2fYdSF638el9E181RneDEe6VZUhYNI.FbMT6s9X9e40YO3l662', 1),
(14, 'Варвара ', 'Тиль', 'Евгеньевна', 'varya_til@mail.ru', '$2y$10$pUIkN.mCnY9exQeoVLunjevUExraKoCIfmkUHAm.4KcS.EU81OJ3O', 1),
(15, 'Богдан', 'Остришко', 'Максимович', 'bostrishko2006@gmail.com', '$2y$10$Ows607SGlOl5KyVGepcreutXjbcAaTZvMdypZYGWqrtWZwd3kxJ0O', 1),
(16, 'Константин', 'Иванов', 'Афанасьевич ', 'gunbalagan@mail.ru', '$2y$10$quzefD6rK5xmPNPCw0A46.YUaLQPTZsJseE02vRO96y4jLUHb3eK6', 1),
(17, 'Александр', 'Сметанин', 'Кириллович', 'sashkasmet@yandex.ru', '$2y$10$MkmRtwloJnp86PvCSS31w.9O0R54sKjYHyPByyloZrgAkLtJqmq.q', 1),
(18, 'Сергей', 'Мусияк', 'Александрович', 'crossfit.omsk@gmail.com', '$2y$10$/Qd5paCsYeZYHsJPkARIe.htTQZ0qQY/x4BX3R2TGZKPIcATk7jXS', 1),
(19, 'Никита ', 'Зайчук', 'Артемович ', 'a_qw_00@mail.ru', '$2y$10$oSmpMobhPVp0V1hYtuyBd.VPu7FGoZ2F4tHvFeHqHLZyTqaqtRGfS', 1),
(20, 'Виктор', 'Испалатов', 'Валерьевич', '89502113526@mail.ru', '$2y$10$2w/Gq1cbH6Qyf5agvnboz.UiBGhANvfchBJyMPzf3rmH7WsBIWgFG', 1),
(21, 'Артем', 'Бромот', 'Сергеевич', 'bromot04art@mail.ru', '$2y$10$h8WX8ykA1XP2Y62GM0ANVue5coJrPTDXqxqGaMKZd8tk1yYd4v1MS', 1),
(22, 'Александр', 'Афонин', 'Сергеевич', 'afonin146@yandex.ru', '$2y$10$lI9WshlcgZa4PWiZZUt/SOA8WVAdVuxBmffY24GR6Ke/LUdES3a.S', 1),
(23, 'Ксения', 'Полухина', 'Андреевна', 'susa_98@mail.ru', '$2y$10$evlF5bbTIGKFlVI45LtVSuwEWnIzwg2YWrA./NLrQNOfX5hCV6AAu', 1),
(24, 'Алёна', 'Ланкова', 'Алексеевна', 'lankovaa1994@mail.ru', '$2y$10$WrKL4Vgr8Nxw91Jj5bkJK.MxXLOlgSI9c4hseUA03uq2PdtU4AFvW', 1),
(25, 'Анна', 'Юдина', 'Владимировна ', 'yudinaanna83@mail.ru', '$2y$10$lHu9xi.kjr2QzZwFYhyvpOaYM8e5a7Ds7n4bOn8tSbtSuAKpejMlW', 1),
(26, 'Ирина', 'Наумова', 'Викторовна', 'Yolka1985@list.ru', '$2y$10$DYLsMHecd0GyJ6AS1EiP.uKFVeyOKtAJ0jyZlo5v1Ygtss06bPpmS', 1),
(27, 'Евгений', 'Касаткин', 'Павлович ', 'kas_kasich@mail.ru', '$2y$10$SXaTF/EUIaHpOg3EQXX4X.W3AydbKPzeAxOyJaH7AHO17DuplTHdm', 1),
(28, 'Артем', 'Наумочкин', ' Юрьевич', 'anaumochkin@gmail.com', '$2y$10$WlJmj5hIDfvpKY5i23jUH.zu9Ow/OImMD7/c.DyhlwVuvH5UM8WPC', 1),
(29, 'Кирилл', 'Кульман', 'Николаевич', 'kulmankirill1@gmail.com', '$2y$10$lXGS2olpXJbGWaR0hj0JnOyEwDbkoOloS1nPmXV.ix9T/43LVRyTK', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
