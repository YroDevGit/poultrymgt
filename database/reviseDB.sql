-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for newpoultry
CREATE DATABASE IF NOT EXISTS `newpoultry` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `newpoultry`;

-- Dumping structure for table newpoultry.birdsmortality
CREATE TABLE IF NOT EXISTS `birdsmortality` (
  `BirdsMortality_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Deaths` int(11) NOT NULL,
  PRIMARY KEY (`BirdsMortality_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.birdsmortality: ~6 rows (approximately)
INSERT INTO `birdsmortality` (`BirdsMortality_ID`, `Date`, `Deaths`) VALUES
	(23, '2020-12-15', 5),
	(24, '2020-12-15', 9),
	(30, '2020-12-14', 19),
	(32, '2020-12-15', 12),
	(33, '2023-04-29', 4),
	(34, '2023-11-05', 10);

-- Dumping structure for table newpoultry.birdspurchase
CREATE TABLE IF NOT EXISTS `birdspurchase` (
  `BirdsPurchase_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `NumberOfBirds` int(11) NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`BirdsPurchase_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.birdspurchase: ~6 rows (approximately)
INSERT INTO `birdspurchase` (`BirdsPurchase_ID`, `Date`, `NumberOfBirds`, `Price`) VALUES
	(2, '2020-12-18', 40, 200),
	(5, '2020-12-11', 89, 11570),
	(8, '2020-12-14', 12, 488),
	(9, '2023-04-29', 4, 500),
	(10, '2023-11-05', 10, 1000),
	(13, '2024-01-08', 60, 200);

-- Dumping structure for table newpoultry.chickentbl
CREATE TABLE IF NOT EXISTS `chickentbl` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_price` double DEFAULT NULL,
  `c_qty` int(11) DEFAULT NULL,
  `c_total` double DEFAULT NULL,
  `c_date` date DEFAULT NULL,
  `c_cust` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.chickentbl: ~1 rows (approximately)
INSERT INTO `chickentbl` (`c_id`, `c_price`, `c_qty`, `c_total`, `c_date`, `c_cust`) VALUES
	(2, 52, 4, 208, '2024-01-25', 'asad');

-- Dumping structure for table newpoultry.composeprice
CREATE TABLE IF NOT EXISTS `composeprice` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `comprice` double DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.composeprice: ~1 rows (approximately)
INSERT INTO `composeprice` (`cid`, `comprice`) VALUES
	(1, 50);

-- Dumping structure for table newpoultry.composetbl
CREATE TABLE IF NOT EXISTS `composetbl` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_cust` varchar(1000) DEFAULT NULL,
  `c_date` date DEFAULT NULL,
  `c_sack` int(11) DEFAULT NULL,
  `c_price` float DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.composetbl: ~5 rows (approximately)
INSERT INTO `composetbl` (`c_id`, `c_cust`, `c_date`, `c_sack`, `c_price`, `stat`) VALUES
	(48, 'Super mario', '2023-11-07', 3, 10, 0),
	(49, 'Ninja turtles', '2023-11-07', 5, 10, 0),
	(50, 'vhlad amhir', '2023-11-07', 2, 10, 0),
	(51, 'cust', '2023-11-02', 1, 50, 0),
	(52, 'ronzie', '2023-11-07', 1, 50, 0);

-- Dumping structure for table newpoultry.eggs
CREATE TABLE IF NOT EXISTS `eggs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mname` varchar(100) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.eggs: ~4 rows (approximately)
INSERT INTO `eggs` (`id`, `mname`, `stat`) VALUES
	(7, 'Regular', 0),
	(8, 'Brook', 0),
	(9, 'Stain', 0),
	(11, 'Damaged', 0);

-- Dumping structure for table newpoultry.egg_size
CREATE TABLE IF NOT EXISTS `egg_size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size_name` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT 0,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.egg_size: ~6 rows (approximately)
INSERT INTO `egg_size` (`size_id`, `size_name`, `stat`) VALUES
	(1, 'mini', 0),
	(2, 'pewee', 0),
	(3, 'Small', 0),
	(4, 'midium', 0),
	(5, 'Large', 0),
	(6, 'XL', 0);

-- Dumping structure for table newpoultry.feedconsumption
CREATE TABLE IF NOT EXISTS `feedconsumption` (
  `FeedConsumption_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ConsDate` date NOT NULL,
  `Quantity` float NOT NULL,
  `Price` float NOT NULL,
  `Employee` int(11) NOT NULL,
  `feed` int(11) DEFAULT NULL,
  PRIMARY KEY (`FeedConsumption_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.feedconsumption: ~4 rows (approximately)
INSERT INTO `feedconsumption` (`FeedConsumption_ID`, `ConsDate`, `Quantity`, `Price`, `Employee`, `feed`) VALUES
	(37, '2024-01-08', 200, 1000, 1, 14),
	(38, '2024-01-08', 200, 0, 1, 14),
	(39, '2024-01-08', 3, 0, 1, 13),
	(40, '2024-01-12', 2, 0, 1, 14);

-- Dumping structure for table newpoultry.feedpurchase
CREATE TABLE IF NOT EXISTS `feedpurchase` (
  `FeedPurchase_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Quantity` float NOT NULL,
  `Price` float NOT NULL,
  `feedname` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`FeedPurchase_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.feedpurchase: ~2 rows (approximately)
INSERT INTO `feedpurchase` (`FeedPurchase_ID`, `Date`, `Quantity`, `Price`, `feedname`) VALUES
	(13, '2024-01-08', 200, 2000, 'no'),
	(14, '2024-01-08', 200, 1000, 'feed');

-- Dumping structure for table newpoultry.housing
CREATE TABLE IF NOT EXISTS `housing` (
  `house_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_name` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  PRIMARY KEY (`house_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.housing: ~4 rows (approximately)
INSERT INTO `housing` (`house_id`, `house_name`, `stat`) VALUES
	(1, 'House 1, row 1', 0),
	(2, 'House 1, row 2', 0),
	(3, 'House 2, row 1', 0),
	(4, 'House 2, row 2', 0);

-- Dumping structure for table newpoultry.inventory
CREATE TABLE IF NOT EXISTS `inventory` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `egg_id` int(11) DEFAULT NULL,
  `egg_size` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `tray` double DEFAULT NULL,
  `date_produced` datetime DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.inventory: ~8 rows (approximately)
INSERT INTO `inventory` (`inv_id`, `egg_id`, `egg_size`, `quantity`, `tray`, `date_produced`, `stat`) VALUES
	(30, 7, 3, 65, 2.1666666666666665, '2023-11-25 10:05:47', 0),
	(31, 7, 3, 25, 0.8333333333333334, '2023-11-25 10:06:17', 0),
	(32, 7, 3, 42, 1.4, '2023-12-12 16:51:38', 0),
	(33, 11, 3, 100, 0.43333333333333335, '2023-12-12 16:51:49', 0),
	(34, 8, 6, 100, 0.2, '2023-12-12 16:51:58', 0),
	(35, 9, 2, 100, 0.06666666666666667, '2023-12-12 16:52:05', 0),
	(36, 8, 6, 10, 0.3333333333333333, '2023-12-12 16:52:15', 0),
	(52, 12, 7, 100, 3.3333333333333335, '2024-01-08 20:37:32', 0);

-- Dumping structure for table newpoultry.log_history
CREATE TABLE IF NOT EXISTS `log_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.log_history: ~25 rows (approximately)
INSERT INTO `log_history` (`id`, `user`, `stat`, `date`) VALUES
	(154, 2, 1, '2024-01-08 20:35:32'),
	(155, 2, 0, '2024-01-08 20:36:20'),
	(156, 3, 1, '2024-01-08 20:36:23'),
	(157, 3, 0, '2024-01-08 20:36:27'),
	(158, 3, 1, '2024-01-08 20:36:31'),
	(159, 3, 0, '2024-01-08 20:36:34'),
	(160, 2, 1, '2024-01-08 20:36:37'),
	(161, 2, 1, '2024-01-10 20:01:50'),
	(162, 2, 0, '2024-01-10 20:49:21'),
	(163, 2, 1, '2024-01-10 20:51:57'),
	(164, 0, 1, '2024-01-11 14:18:19'),
	(165, 0, 0, '2024-01-11 14:18:24'),
	(166, 2, 1, '2024-01-11 14:30:38'),
	(167, 2, 0, '2024-01-11 14:30:42'),
	(168, 3, 1, '2024-01-11 14:31:02'),
	(169, 3, 0, '2024-01-11 14:31:05'),
	(170, 3, 1, '2024-01-11 14:31:10'),
	(171, 3, 0, '2024-01-11 14:31:13'),
	(172, 2, 1, '2024-01-11 19:15:31'),
	(173, 2, 0, '2024-01-11 19:15:51'),
	(174, 2, 1, '2024-01-11 19:16:21'),
	(175, 2, 0, '2024-01-11 19:20:43'),
	(176, 2, 1, '2024-01-11 19:20:46'),
	(177, 2, 1, '2024-01-12 07:06:34'),
	(178, 3, 1, '2024-01-18 22:50:29'),
	(179, 3, 0, '2024-01-18 22:53:45'),
	(180, 2, 1, '2024-01-21 21:15:50');

-- Dumping structure for table newpoultry.mapping
CREATE TABLE IF NOT EXISTS `mapping` (
  `map_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `vaccine_qty` int(11) DEFAULT NULL,
  `vac_date` datetime DEFAULT NULL,
  `vac_next` datetime DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `is_done` int(11) DEFAULT NULL,
  PRIMARY KEY (`map_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.mapping: ~9 rows (approximately)
INSERT INTO `mapping` (`map_id`, `house_id`, `vaccine_id`, `vaccine_qty`, `vac_date`, `vac_next`, `stat`, `is_done`) VALUES
	(1, 3, 6, 6, '2023-11-20 15:34:00', '2023-12-01 15:34:00', 0, 0),
	(2, 2, 5, 5, '2024-11-27 16:24:00', '2023-11-29 16:24:00', 0, 0),
	(3, 3, 8, 30, '2023-11-22 19:36:00', '2023-12-21 21:36:00', 0, 0),
	(4, 2, 8, 5, '2023-11-20 21:50:00', '2023-12-08 21:51:00', 0, 0),
	(5, 3, 8, 5, '2023-11-20 21:51:00', '2023-11-20 21:51:00', 0, 0),
	(9, 1, 8, 4, '2024-01-21 22:28:28', '2024-01-11 20:38:00', 0, 0),
	(10, 1, 8, 4, '2024-01-15 20:38:00', '2024-01-11 20:38:00', 1, 0),
	(11, 4, 8, 1, '2024-01-28 22:32:08', '2024-01-17 20:47:00', 0, 0),
	(12, 2, 5, 4, '2024-02-03 22:28:33', '2024-01-13 08:08:00', 0, 0);

-- Dumping structure for table newpoultry.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `ntitle` varchar(50) DEFAULT NULL,
  `ndesc` varchar(2000) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.notes: ~0 rows (approximately)

-- Dumping structure for table newpoultry.pertray
CREATE TABLE IF NOT EXISTS `pertray` (
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.pertray: ~1 rows (approximately)
INSERT INTO `pertray` (`quantity`) VALUES
	(30);

-- Dumping structure for table newpoultry.prices
CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mname` varchar(50) DEFAULT NULL,
  `prices` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.prices: ~9 rows (approximately)
INSERT INTO `prices` (`id`, `mname`, `prices`) VALUES
	(1, 'mini', 80),
	(2, 'pewee', 90),
	(3, 'small', 95),
	(4, 'Medium', 100),
	(5, 'Large', 120),
	(6, 'XL', 140),
	(7, 'Jumbo', 150),
	(8, 'Brook', 145),
	(9, 'Stain', 190);

-- Dumping structure for table newpoultry.production
CREATE TABLE IF NOT EXISTS `production` (
  `Production_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `NumberOfEggs` int(11) NOT NULL,
  `Numbercrack` int(11) DEFAULT NULL,
  `egg_mini` int(11) DEFAULT NULL,
  `egg_pewee` int(11) DEFAULT NULL,
  `egg_small` int(11) DEFAULT NULL,
  `egg_medium` int(11) DEFAULT NULL,
  `egg_large` int(11) DEFAULT NULL,
  `egg_xl` int(11) DEFAULT NULL,
  `egg_jumbo` int(11) DEFAULT NULL,
  `egg_brook` int(11) DEFAULT NULL,
  `egg_stain` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`Production_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.production: ~0 rows (approximately)

-- Dumping structure for table newpoultry.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `Sales_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `NumberOfEggs` int(11) NOT NULL,
  `Revenue` float NOT NULL,
  PRIMARY KEY (`Sales_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.sales: ~0 rows (approximately)

-- Dumping structure for table newpoultry.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(50) DEFAULT NULL,
  `egg_type` int(11) DEFAULT NULL,
  `egg_size` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `ddate` datetime DEFAULT NULL,
  `stat` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `tcode` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.transaction: ~2 rows (approximately)
INSERT INTO `transaction` (`id`, `customer`, `egg_type`, `egg_size`, `price`, `quantity`, `total`, `ddate`, `stat`, `user`, `tcode`) VALUES
	(162, 'MyName', 9, 4, 100, 1, 100, '2024-01-08 20:39:11', 1, 2, 'CWE4YR09AI65240801133910AD'),
	(163, 'full', 7, 3, 300, 2, 600, '2024-01-18 22:51:43', 1, 3, 'ABAI16O0O843241801155143CX');

-- Dumping structure for table newpoultry.user
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `usertype` int(11) DEFAULT NULL,
  `uname` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.user: ~3 rows (approximately)
INSERT INTO `user` (`User_ID`, `Username`, `Password`, `usertype`, `uname`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Admin'),
	(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 'Staff'),
	(3, 'staff', '1253208465b1efa876f982d8a9e73eef', 3, 'Cashier');

-- Dumping structure for table newpoultry.vaccines
CREATE TABLE IF NOT EXISTS `vaccines` (
  `vac_id` int(11) NOT NULL AUTO_INCREMENT,
  `vac_name` varchar(50) DEFAULT NULL,
  `vac_price` int(11) DEFAULT NULL,
  `vac_qty` int(11) DEFAULT NULL,
  `vac_date` date DEFAULT NULL,
  PRIMARY KEY (`vac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table newpoultry.vaccines: ~7 rows (approximately)
INSERT INTO `vaccines` (`vac_id`, `vac_name`, `vac_price`, `vac_qty`, `vac_date`) VALUES
	(4, 'sample vaccine', 500, 40, '2023-05-27'),
	(5, 'Vaccine', 200, 50, '2023-12-23'),
	(6, 'vacine1', 2400, 50, '2023-12-01'),
	(7, 'vaccine2', 1500, 50, '2023-11-05'),
	(8, 'Anti virys', 0, 50, '2023-11-20'),
	(10, 'vac', 1, 50, '2024-01-19'),
	(11, 'vaccc', 2, 50, '2024-01-20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
