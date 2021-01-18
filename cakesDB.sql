-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.4.17-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных cakes
CREATE DATABASE IF NOT EXISTS `cakes` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cakes`;

-- Дамп структуры для таблица cakes.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы cakes.orders: ~8 rows (приблизительно)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Дамп структуры для таблица cakes.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы cakes.products: ~9 rows (приблизительно)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `price`, `description`) VALUES
	(1, 'Торт "Наполеон"', 500, 'Вкусный торт "Наполеон"'),
	(2, 'Торт "Черепаха"', 350, 'Вкусный торт "Черепаха"'),
	(3, 'Торт "Панчо"', 380, NULL),
	(4, 'Торт "Муровейник"', 350, NULL),
	(5, 'Торт "Рафаэлло"', 1500, NULL),
	(6, 'Торт "Сникерс"', 400, NULL),
	(7, 'Торт "Прага"', 350, NULL),
	(8, 'Торт "Агент Купер"', 540, NULL),
	(9, 'Торт "Трюфель"', 700, NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица cakes.products_to_carts
CREATE TABLE IF NOT EXISTS `products_to_carts` (
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы cakes.products_to_carts: ~0 rows (приблизительно)
DELETE FROM `products_to_carts`;
/*!40000 ALTER TABLE `products_to_carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_to_carts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
