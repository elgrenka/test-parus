-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 18 2024 г., 11:27
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `parus_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lots`
--

CREATE TABLE `lots` (
  `id` int UNSIGNED NOT NULL,
  `trade_number` varchar(255) NOT NULL,
  `lot_number` int UNSIGNED NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description` text,
  `start_price` decimal(10,2) DEFAULT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `inn` varchar(20) DEFAULT NULL,
  `case_number` varchar(50) DEFAULT NULL,
  `auction_date` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lots`
--

INSERT INTO `lots` (`id`, `trade_number`, `lot_number`, `url`, `description`, `start_price`, `email`, `phone`, `inn`, `case_number`, `auction_date`) VALUES
(1, '40338-ОАОФ', 1, 'https://nistp.ru/bankrot/trade_view.php?trade_nid=354770', '1. Автомобиль, грузовой самосвал МАЗ 551605-230-024, VIN Y3M55160550004815, год выпуска 2005, г/н Е684ТА62; 2. Дробилка СЛФ-1550М', '442800.00', 'Sigunova.nata@mail.ru', '+79106429053', '4632221298', 'А35-8846/2022', '2024-04-08 10:00:00'),
(10, '40349-ЗАОФ', 1, 'https://nistp.ru/bankrot/trade_view.php?trade_nid=354853', 'Доля в праве, размер доли 1/65 на земельный участок общей площадью 12847153 кв. м., местоположение: Местоположение установлено относительно ориентира, расположенного за пределами участка.Ориентир с.Орехов Лог.Участок находится примерно в 3600 м, по направлению на северо-запад от ориентира. Почтовый адрес ориентира: обл. Новосибирская, МО Ореховологовского сельсовета, р-н Краснозерский., кадастровый номер: 54:13:025317:280, категория земель: земли сельскохозяйственного назначения', '59000.00', 'arbitr.torgi@list.ru', '+7-499-938-74-30 доб. 455', '542705230574', 'А45-16445/2023', '28.03.2024 15:00:00'),
(34, '40398-ОАОФ', 1, 'https://nistp.ru/bankrot/trade_view.php?trade_nid=355309', 'Автомобиль SSANGYONGISTANA, 1999 года выпуска, двигатель №66291110 056327, шасси № KPDAB7E81XP056251, цвет зеленый<br>', '125000.00', '\r\n                                        buzzi2002@mail.ru<br>', '\r\n                                        83852635410<br>', '753000767660', 'А03-9264/2023<br>', '29.03.2024 09:00:00<br>'),
(42, '40389-ОТПП', 2, 'https://nistp.ru/bankrot/trade_view.php?trade_nid=355250', 'Земельный участок сельскохозяйственного назначения площадью 41092 +/-70, расположенный: Ивановская область, Верхнеландеховский район, рядом д.Аксеново, кадастровый номер:37:01:000000:425<br>', '46434.00', '\r\n                                        mars0306@mail.ru<br>', '\r\n                                        +79203456666<br>', '370800000838', '№ А17-10907/2021<br>', '-');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
