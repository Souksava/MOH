-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2020 at 08:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MOH`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `cer_id` int(11) NOT NULL,
  `cer_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cer_id2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`cer_id`, `cer_name`, `cer_id2`) VALUES
(2, 'ການແພດ', 6),
(3, 'ການຢາ', 5),
(4, 'ກະດູກ', 7);

-- --------------------------------------------------------

--
-- Table structure for table `certificate2`
--

CREATE TABLE `certificate2` (
  `cer_id2` int(11) NOT NULL,
  `cer_name2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certificate2`
--

INSERT INTO `certificate2` (`cer_id2`, `cer_name2`) VALUES
(2, 'ຊັ້ນຕົ້ນ'),
(3, 'ຊັ້ນກາງ'),
(4, 'ຊັ້ນສູງ'),
(5, 'ປະລິນຍາຕີ'),
(6, 'ປະລິນຍາໂທ'),
(7, 'ປະລິນຍາເອກ');

-- --------------------------------------------------------

--
-- Table structure for table `ethnicity`
--

CREATE TABLE `ethnicity` (
  `eth_id` int(11) NOT NULL,
  `eth_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ethnicity`
--

INSERT INTO `ethnicity` (`eth_id`, `eth_name`) VALUES
(1, 'ຊົນເຜົ່າລາວ'),
(3, 'ຊົນເຜົ່າໄຕ'),
(4, 'ຊົນເຜົ່າຜູ້ໄທ'),
(5, 'ຊົນເຜົ່າລື້'),
(6, 'ຊົນເຜົ່າຍວນ'),
(7, 'ຊົນເຜົ່າຢັ້ງ'),
(8, 'ຊົນເຜົ່າແຊກ'),
(9, 'ຊົນເຜົ່າໄທເໜືອ'),
(10, 'ຊົນເຜົ່າກຶມມຸ'),
(11, 'ຊົນເຜົ່າໄປຣ'),
(12, 'ຊົນເຜົ່າຊີງມູນ'),
(13, 'ຊົນເຜົ່າຜ້ອງ'),
(14, 'ຊົນເຜົ່າແທ່ນ'),
(15, 'ຊົນເຜົ່າເອີດູ'),
(16, 'ຊົນເຜົ່າບິດ'),
(17, 'ຊົນເຜົ່າລະເມດ'),
(18, 'ຊົນເຜົ່າສາມຕ່າວ'),
(19, 'ຊົນເຜົ່າກະຕາງ'),
(20, 'ຊົນເຜົ່າມະກອງ'),
(21, 'ຊົນເຜົ່າຕຣີ'),
(22, 'ຊົນເຜົ່າຢຣູ'),
(23, 'ຊົນເຜົ່າຕຣຽງ'),
(24, 'ຊົນເຜົ່າຕະໂອ້ຍ'),
(25, 'ຊົນເຜົ່າແຢະ'),
(26, 'ຊົນເຜົ່າເບຣົາ'),
(27, 'ຊົນເຜົ່າກະຕູ'),
(28, 'ຊົນເຜົ່າຮາຣັກ'),
(29, 'ຊົນເຜົ່າໂອຍ'),
(30, 'ຊົນເຜົ່າກຣຽງ'),
(31, 'ຊົນເຜົ່າເຈັງ'),
(32, 'ຊົນເຜົ່າສະດາງ'),
(33, 'ຊົນເຜົ່າຊ່ວຍ'),
(34, 'ຊົນເຜົ່າຍະເຫີນ'),
(35, 'ຊົນເຜົ່າວະລີ'),
(36, 'ຊົນເຜົ່າປະໂກະ'),
(37, 'ຊົນເຜົ່າຂະແມ'),
(38, 'ຊົນເຜົ່າຕຸ້ມ'),
(39, 'ຊົນເຜົ່າງວນ'),
(40, 'ຊົນເຜົ່າມ້ອຍ'),
(41, 'ຊົນເຜົາກຣີ'),
(42, 'ຊົນເຜົ່າມົ້ງ'),
(43, 'ຊົນເຜົ່າອິວມຽນ'),
(44, 'ຊົນເຜົ່າອາຄາ'),
(45, 'ຊົນເຜົ່າພູນ້ອຍ'),
(46, 'ຊົນເຜົ່າລາຫູ'),
(47, 'ຊົນເຜົ່າສີລາ'),
(48, 'ຊົນເຜົ່າຮາຢີ'),
(49, 'ຊົນເຜົ່າໂລໂລ'),
(50, 'ຊົນເຜົ່າຫໍ້'),
(51, 'ຊົນເຜົ່າບູຣ'),
(52, 'ຄົນຕ່າງຊາດ');

-- --------------------------------------------------------

--
-- Table structure for table `listtranddetail`
--

CREATE TABLE `listtranddetail` (
  `detail_id` int(11) NOT NULL,
  `per_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `nation_id` int(11) NOT NULL,
  `nation_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nation_id`, `nation_name`) VALUES
(2, 'ໄທ'),
(3, 'ຈີນ'),
(4, 'ລາວ');

-- --------------------------------------------------------

--
-- Table structure for table `personality`
--

CREATE TABLE `personality` (
  `per_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `per_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `tel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(50) DEFAULT NULL,
  `eth_id` int(11) DEFAULT NULL,
  `nation_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `cer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personality`
--

INSERT INTO `personality` (`per_id`, `per_name`, `per_surname`, `gender`, `dob`, `tel`, `address`, `email`, `type_id`, `eth_id`, `nation_id`, `sec_id`, `cer_id`) VALUES
('ກຄພ001', 'ທ່ານ ດຣ ນ ພູເງິນ', 'ພົງໄຊ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 32, 4),
('ກຄພ002', 'ທ່ານ ດຣ ພູປະສົງ', 'ຊົມພູ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 32, 2),
('ກຄພ003', 'ທ່ານ ດຣ ນ ດາລຸນີ', 'ພອນແກ້ວ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 32, 2),
('ກປຟ002', 'ທ່ານ ດຣ. ນ ສົມມະນາ', 'ລັດຕະນະ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 10, 3),
('ກປຟ003', 'ທ່ານ ດຣ ນ ນິ່ງນ່ອງ', 'ໄຊຍະວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 10, 2),
('ກສທ001', 'ທ່ານ ດຣ ນ ໂສນິ', 'ສີສົມຫວັງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 30, 2),
('ກອຢ001', 'ທ່ານ ນ ຈັນສະໝອນ', 'ນະດອນໄຮ່', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 36, 2),
('ກອຢ002', 'ທ່ານ ນ ຮຸ່ງເທວາ', 'ດວງສະຫວັນ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 36, 2),
('ຄຕພ001', 'ທ່ານ ອ່ອນຄຳ', 'ຊາວົງສີ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 7, 2),
('ຄທພ001', 'ທ່ານ ປອ ສິດທິເດດ', 'ສົມມະນິດ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 37, 2),
('ຄທພ002', 'ທ່ານ ດຣ ນ ຟອງສະໝຸດ', 'ດວງນຸວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 37, 2),
('ຄທພ003', 'ທ່ານ ດຣ ບຸນສົງ', 'ບຸດສຳພັນ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 37, 2),
('ຄທພ004', 'ທ່ານ ດຣ ວຽງຄຳ', 'ແກ້ວຫາວົງ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 37, 3),
('ຄພບ001', 'ທ່ານ. ດຣ ນ ອານຸສອນ', 'ສີລຸລາດ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 6, 2),
('ຄພບ002', 'ທ່ານ. ນ ດາລາສຸກ', 'ຄຳລຸນວິໄລວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 6, 4),
('ຄພສ003', 'ທ່ານ ດຣ ປາດຖະໜາ ', 'ປັນຍາວິເສດ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 14, 3),
('ຄພສ004', 'ທ່ານ ດຣ ວິໄລວັນ', 'ໝື່ນລາຊະວົງ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 14, 3),
('ຄພສ005', 'ທ່ານ ດຣ ນ ອັບປະສອນ', 'ພູມິນ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 14, 2),
('ຄສທ001', 'ທ່ານ ດຣ ວຽງນະຄອນ', 'ວົງໄຊ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 9, 2),
('ຕນພ001', 'ທ່ານ ນ. ສຸພາພອນ ', 'ວົສັກ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 7, 4),
('ຕນພ002', 'ທ່ານ ນ. ຈັນດາວອນ', 'ພັນທະວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 7, 4),
('ທຄທພມວສ001', 'ທ່ານ ດຣ ນ ຄຳໃບ', 'ທຳມະວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 35, 2),
('ທົດສອບ1', 'ທ່ານ ໄຊສົມບູນ', 'ໄຊຍະ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 2, 1, 4, 24, 4),
('ພກພ001', 'ທ່ານ ປທ ດຣ ລັດດາວັນ', 'ແສງດາລາ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 25, 4),
('ພຄກປ001', ' ທ່ານ ດຣ ນ ພູມສະຫວັນ', 'ອຸນນະວົງ', 'ຊາຍ', '2020-03-06', '-', '-', '-', 1, 1, 4, 11, 2),
('ພຄປອ001', 'ທ່ານ ດຣ ນິ່ງນ່ອງ', 'ໄຊຍະວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 15, 2),
('ພຄສ001', 'ທ່ານ ນ ສຸພາພອນ', 'ໄຊພະວົງສາ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 26, 4),
('ພຍບ002', 'ທ່ານ ຄຳສອນ', 'ເນົາວະລາດ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 6, 3),
('ພປຟ001', 'ທ່ານ ດຣ ສົມຈັນ', 'ທຸນສະຫວັດ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 11, 4),
('ພສຂສ001', 'ທ່ານ ນ. ວິລະວັນ', 'ຄຸ້ມມະວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 17, 2),
('ພສທຈ001', 'ທ່ານ ດຣ ສຸລິຍາ', 'ແກ້ວຫາວົງ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 20, 3),
('ພສທຈ002', 'ທ່ານ ດຣ ລັດສະໝີ', 'ສີພັນ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 20, 4),
('ພສທຊກ001', 'ທ່ານ ດຣ ສົມປອງ', 'ດວງຫອມ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 18, 4),
('ມວສ001', 'ທ່ານ ນ ພູທອນ', 'ຈັນທະລົງສີ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 22, 3),
('ມວສ002', 'ທ່ານ ນ ປັບພາວັນ ', 'ຈັນປະດິດ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 22, 3),
('ມວສ003', 'ທ່ານ ດຣ ໄມຄອນ', 'ວິຫຼ້າຄຳໄຊ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 22, 2),
('ມວສ004', 'ທ່ານ ດຣ ພົມມະວົງ', 'ຊາລີກາບແກ້ວ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 22, 2),
('ມວສ005', 'ທ່ານ ດຣ ຈັນສຸກ', 'ວົງສານສຸວັນ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 22, 2),
('ສກພ001', 'ທ່ານ ແສງທາວາ', 'ໄຊຍະສິດວົງ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 2, 4),
('ສຂຍມ001', 'ທ່ານ ນ ມະນີພອນ', 'ຂັນທະວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 33, 2),
('ສຂຍມ002', 'ທ່ານ ນ ປາອີ້', 'ໄຊຍະຊ້າງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 33, 3),
('ສຄພ001', 'ທ່ານ ດຣ ວິສະນຸ', 'ຫານຊະນະ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 8, 4),
('ສທສ001', 'ທ່ານ ຈອນລີ້', 'ພັນທະດີ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 9, 4),
('ສທສອຕປ001', 'ທ່ານ ດຣ ໜູພາດ', 'ພົມແກ່ທ້າວ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 12, 2),
('ສປຮ001', 'ທ່ານ ນ ສຸດທິດາ', 'ລຸນນິວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 29, 2),
('ສວຢ001', 'ທ ຈື່', 'ທ່າວ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 42, 4, 28, 2),
('ສວລ001', 'ທ່ານ ດຣ ພອນປະດິດ', 'ສັງໄຊຍະລາດ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 34, 4),
('ສວລ002', 'ທ່ານ ສີນະຄອນ', 'ໄຊຍະເດດ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 34, 2),
('ຫປສ001', 'ທ່ານ ນ ໄກ່ສະໝອນ', 'ບຸນຍະຣິດ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 27, 4),
('ຮໝຈປສ001', 'ທ່ານ ດຣ ນ ສຸດສະດາ', 'ນະລົງສັກ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 19, 2),
('ຮໝຊກ001', 'ທ່ານ. ສົມສະໄໝ', 'ວາດສະຫງ່າ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 4, 4),
('ຮໝຊຖ001', 'ທ່ານ ດຣ ນ ດາລີວັນ', 'ພະໄຊຍະແສງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 21, 3),
('ຮໝຊຖ002', 'ທ່ານ ນ ສາຍຄຳ', 'ພະໄຊຍະແສງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 21, 3),
('ຮໝບຊ001', 'ທ່ານ.ນ ລີນ່າ', 'ບໍລິວັນ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 5, 4),
('ຮໝມຕພ001', 'ທ່ານ ນ ພຸດທະລົມ', 'ແກ້ວມະໄລທອງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 23, 4),
('ຮໝມຕພ003', 'ທ່ານ ນ ວິພາພອນ', 'ອິນພາວົງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 23, 3),
('ຮໝມຕພ004', 'ທ່ານ ດຣ ສຸດທະນາລິນ', 'ແກ້ວວິໄລຫົງ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 23, 4),
('ຮໝມຕພ111', 'ຂັນທະພອນ', 'ພູມມິພາກ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 23, 4),
('ຮໝມຫສ001', 'ທ່ານ ນ ສົມສະຫວັນ', 'ສີຫາລາດ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 31, 4),
('ຮໝສຖ120', 'ກົວເຮີ', 'ເຢຍປ່າວ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 42, 4, 21, 3),
('ຮໝສລວ001', 'ທ່ານ ດຣ ລັດສະໝີ', 'ສຸພັນທອງ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 4, 4),
('ຮໝສລວ002', 'ທ່ານ ດຣ ວັນທອງ', 'ບຸນວິໄລ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 16, 2),
('ຮໝອຕ001', 'ທ່ານ.ນ ມະນີສັກ', 'ສຸລິຍະມິດ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 3, 2),
('ຮໝອຕ002', 'ທ່ານ ດຣ ໄຊຍະສອນ', 'ແມນວິໄລ', 'ຊາຍ', '0000-00-00', '-', '-', '-', 1, 1, 4, 3, 4),
('ຮຮສທຊຂ001', 'ທ່ານ ນ ຢູບີ', 'ແສງຄຳຢອງ', 'ຍິງ', '0000-00-00', '-', '-', '-', 1, 1, 4, 24, 4);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`pro_id`, `pro_name`) VALUES
(1, 'ນະຄອນຫຼວງວຽງຈັນ'),
(2, 'ແຂວງວຽງຈັນ'),
(3, 'ອັດຕະປື\r\n'),
(4, 'ຈຳປາສັກ'),
(5, 'ສະຫວັນນະເຂດ'),
(6, 'ສາລະວັນ'),
(7, 'ຄຳມ່ວນ'),
(8, 'ບໍລິຄຳໄຊ'),
(9, 'ຜົ້ງສາລີ'),
(10, 'ຫຼວງນ້ຳທາ'),
(11, 'ອຸດົມໄຊ'),
(12, 'ບໍ່ແກ້ວ'),
(13, 'ຫຼວງພະບາງ'),
(14, 'ໄຊຍະບູລີ'),
(15, 'ຫົວພັນ'),
(16, 'ເຊກອງ'),
(17, 'ໄຊສົມບູນ'),
(18, 'ຊຽງຂວງ');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_id` int(11) NOT NULL,
  `sec_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `village` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_id`, `sec_name`, `village`, `district`, `province`) VALUES
(2, 'ສູນການແພດຟື້ນຟູໜ້າທີ່ການ', '-', '-', 1),
(3, 'ໂຮງໝໍແຂວງອັດຕະປື', '', '', 3),
(4, 'ໂຮງໝໍແຂວງເຊກອງ', '', '', 16),
(5, 'ໂຮງໝໍແຂວງບໍລິຄຳໄຊ', '', '', 8),
(6, 'ຄະນະພະຍາບານສາດ', '', '', 1),
(7, 'ຄະນະເຕັກນິກການແພດ', '', '', 1),
(8, 'ສະຖາບັນຄົ້ນຄວ້າ ແລະ ພັດທະນາການສຶກສາ', '', '', 1),
(9, 'ຄະນະສາທາລະນະສຸກສາດ', '', '', 1),
(10, 'ກົມປິ່ນປົວ ແລະ ຟື້ນຟູໜ້າທີ່ການ', '', '', 1),
(11, 'ພະແນກປິ່ນປົວ ແລະ ຟື້ນຟູໜ້າທີ່ການ', '', '', 1),
(12, 'ພະແນກສາທາລະນະສຸກແຂວງອັດຕະປື', '', '', 3),
(13, 'ໂຮງໝໍຈຳປາສັກ', '', '', 4),
(14, 'ຄະນະແພດສາດ', '', '', 1),
(15, 'ພະແນກຄຸ້ມຄອງການປິ່ນປົວພາກເອກະຊົນ', '', '', 1),
(16, 'ໂຮງໝໍແຂວງສາລະວັນ', '', '', 6),
(17, 'ພະແນກສາທາລະນະສຸກ ແຂວງສາລະວັນ', '', '', 6),
(18, 'ພະແນກສາທາລະນະສຸກແຂວງເຊກອງ', '', '', 16),
(19, 'ໂຮງໝໍແຂວງຈຳປາສັກ', '', '', 4),
(20, 'ພະແນກສາທາລະນະສຸກແຂວງຈຳປາສັກ', '', '', 4),
(21, 'ໂຮງໝໍເຊດຖາທິຣາດ', '', '', 1),
(22, 'ມວສ', '', '', 1),
(23, 'ໂຮງໝໍມິດຕະພາບ', '', '', 1),
(24, 'ໂຮງຮຽນສາທາລະນະສຸກແຂວງຊຽງຂວາງ', '', '', 18),
(25, 'ພະແນກກວດສອບ ແລະ ພັດທະນາລະບົບປະກັນສຸກຂະພາບ', '', '', 1),
(26, 'ພະແນກຄຸ້ມຄອງລະບົບປະກັນສຸຂະພາບ', '', '', 1),
(27, 'ຫ້ອງການປະກັນສຸຂະພາບ', '', '', 1),
(28, 'ສູນວິໄຈອາຫານ ແລະ ຢາ', '', '', 1),
(29, 'ສູນປິ່ນປົວ ແລະ ຮັກສາສຸຂະພາບຕາ', '', '', 1),
(30, 'ກະຊວງສາທາລະນະສຸກ', '', '', 1),
(31, 'ໂຮງໝໍມະໂຫສົດ', '', '', 1),
(32, 'ກົມຄວບຄຸມພະຍາດຕິດຕໍ່', '', '', 1),
(33, 'ສູນໄຂ້ຍຸງແມ່ກາຝາກ ແລະ ແມງໄມ້', '', '', 1),
(34, 'ສູນວິເຄາະ ແລະ ລະບາດວິທະຍາ', '', '', 1),
(35, 'ທັນຕະກຳເດັກຄະນະທັນຕະແພດສາດ ມວສ', '', '', 1),
(36, 'ກົມອາຫານ ແລະ ຢາ', '', '', 1),
(37, 'ຄະນະທັນຕະແພດສາດ', '', '', 1),
(38, 'ພະແນກສາຂາແຂວງຈຳປາສັກ', '', '', 4),
(39, 'ກົມອະນາໄມ ແລະ ສົ່ງເສີມສຸຂະພາບ', '', '', 1),
(40, 'ມະຫາວິທະຍາໄລ ວິທະຍາສາດ ສຸຂະພາບ', '', '', 1),
(41, 'ສູນສຸຂະພາບແມ່ ແລະ ເດັກ', '', '', 1),
(42, 'ກົມແຜນການ ແລະ ການຮ່ວມມື', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status` int(11) NOT NULL,
  `status_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`, `status_name`) VALUES
(1, 'ຫົວໜ້າ'),
(2, 'ຜູ້ໃຊ້ລະບົບ'),
(3, 'ຜູ້ຊົມໃຊ້ລະບົບ'),
(4, 'ປິດໃຊ້ງານ');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `train_id` int(11) NOT NULL,
  `place` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `year` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `region` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `No_` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quota_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_` date DEFAULT NULL,
  `time_` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_edit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`train_id`, `place`, `topic`, `date_start`, `date_end`, `year`, `amount`, `region`, `No_`, `quota_name`, `note`, `date_`, `time_`, `user_id`, `user_edit`) VALUES
(1, 'ສປ ຈີນ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: ເຕັກນິກການປິ່ນປົວຟື້ນຟູໜ້າທີ່ການ', '2020-01-06', '2020-04-06', '2020', '0.00', 'ຕ່າງປະເທດ', '0001', 'ພວກກ່ຽວຮັບຜິດຊອບເອງ', '-', '2020-03-15', '12:50:03', 2, 'Admin'),
(2, 'ສ.ເກົາຫຼີ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: 2019 C3BIRD Training Course in Infectious Disease for Foreign Researchers - Basic GCP and GLP Course', '2019-12-23', '2020-01-03', '2020', '0.00', 'ຕ່າງປະເທດ', '0002', 'Seoul National University ສ. ເກົາຫຼີ', '-', '2020-03-15', '12:56:48', 2, NULL),
(3, 'ປະເທດຍີ່ປຸ່ນ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: ການຮັບຮອງຄຸນນະພາບໂຮງໝໍ ແລະ ການຄຸ້ມຄອງຄຸນນະພາບໂຮງໝໍ ແລະ ຄວາມປອດໄພຂອງຄົນເຈັບ', '2020-01-19', '2020-01-24', '2020', '0.00', 'ຕ່າງປະເທດ', '0003', 'ໂຄງການ The Project for improving Quality of Health Care Services', '-', '2020-03-15', '13:07:58', 2, NULL),
(4, 'ປະເທດຍີ່ປຸ່ນ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: ການຮັບຮອງຄຸນນະພາບໂຮງໝໍ ແລະ ການຄຸ້ມຄອງຄຸນນະພາບໂຮງໝໍ ແລະ ຄວາມປອດໄພຂອງຄົນເຈັບ', '2020-01-19', '2020-01-31', '2020', '0.00', 'ຕ່າງປະເທດ', '0003', 'ໂຄງການ The Project for improving Quality of Health Care Services', '-', '2020-03-15', '13:13:54', 2, NULL),
(5, 'ປະເທດໄທ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: Neprology', '2019-12-08', '2020-03-08', '2020', '0.00', 'ຕ່າງປະເທດ', '0004', 'ຜູ້ກ່ຽວຮັບຜິດຊອບເອງ', '-', '2020-03-15', '13:17:24', 2, NULL),
(6, 'ປະເທດຝຣັ່ງ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: Centre Hospitalier Intercommunal de Castres Mazamet', '2019-11-18', '2019-12-06', '2019', '0.00', 'ຕ່າງປະເທດ', '0005', 'The Foundation PIERE FABRE', '-', '2020-03-15', '13:20:44', 2, NULL),
(7, 'ປະເທດໄທ', 'ເຂົ້າຮ່ວມຊຸດສຳມະນາໃນຫົວຂໍ້: The Fast Track Modal Toword Reducing Maternal Mortality', '2019-12-02', '2019-12-03', '2019', '0.00', 'ຕ່າງປະເທດ', '0007', 'ພວກກ່ຽວຮັບຜິດຊອບເອງ', '-', '2020-03-15', '13:58:26', 4, NULL),
(8, 'ປະເທດໄທ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: Physician\'s training workshop on hepatits B virus (HBV) and hepatits C virus (HCV) sreening, diagnosis and treatment', '2019-12-02', '2019-12-03', '2019', '0.00', 'ຕ່າງປະເທດ', '0006', 'TREATASIA', '-', '2020-03-15', '14:38:56', 4, NULL),
(9, 'ປະເທດຫວຽດນາມ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: Regional training on actuarial analysis of Social Health Insurance fund', '2019-11-04', '2019-11-08', '2019', '0.00', 'ຕ່າງປະເທດ', '0008', 'ອົງການແຮງງານສາກົນ ILO ປະຈຳຫວຽດນາມ', '-', '2020-03-15', '14:52:05', 4, NULL),
(10, 'ປະເທດອີຕາລີ', 'ເຂົ້າຮ່ວມຝຶກອົບຮົມກ່ຽວກັບຫົວຂໍ້: ການເກັບຕົວຢ່າງ ແລະ ການວິໄຈໄມໂກທ໊ອບ \" BTSF Training on Sampling and Analysis Course 1- Mycotoxins \"', '2019-12-02', '2019-12-13', '2019', '0.00', 'ຕ່າງປະເທດ', '0009', 'ມູນນິທິວິທະຍາສາດແຫ່ງຊາດ ( NSF Consultants )', '-', '2020-03-15', '14:55:58', 4, NULL),
(11, 'ສສ ຫວຽດນາມ', 'ການນຳໃຊ້ເຄື່ອງມືທັນສະໄໝໃນການຜ່າຕັດແກ່ນຕາຂຸ້ນ ( Phacomulsification )', '2019-09-09', '2019-12-08', '2019', '0.00', 'ຕ່າງປະເທດ', '0009', 'Vietnam National Institute of Ophthalmology', '-', '2020-03-15', '14:59:02', 4, NULL),
(12, 'ປະເທດເກົາຫຼີ', 'ເຂົ້າຮ່ວມອົບຮົມໃນຫົວຂໍ້: The Safety of Medical Cyclotorn Based Rediopharmaceuticals', '2019-12-02', '2019-12-06', '2019', '0.00', 'ຕ່າງປະເທດ', '0010', 'IAEA', '-', '2020-03-15', '15:02:41', 4, NULL),
(13, 'ປະເທດຈີນ', 'Training Course on Malaria Prevention and control Technology for \" Countries', '2019-10-30', '2019-11-29', '2019', '0.00', 'ຕ່າງປະເທດ', '0011', 'ສປ ຈີນ', '-', '2020-03-15', '15:06:14', 4, NULL),
(14, 'ປະເທດກຳປູເຈຍ', 'PP1. Analytical Toxicology case studies and Application', '2020-02-17', '2020-02-21', '2020', '0.00', 'ຕ່າງປະເທດ', '0012', 'Fondation Pierre Fabra', '-', '2020-03-15', '15:09:23', 4, NULL),
(15, 'ປະເທດຈີນ', 'THE dental training courses', '2019-12-24', '2019-12-30', '2019', '0.00', 'ຕ່າງປະເທດ', '0013', 'College and Hospital Stomatology Guangxi Medical University', '-', '2020-03-15', '15:12:50', 4, NULL),
(17, 'ປັກກິ່ງ ປະເທດຈີນ', 'ປິ່ນປົວກະດູກ', '2020-02-01', '2020-03-19', '2020', '0.00', 'ຕ່າງປະເທດ', '0056', 'ລັດຖະບານຈີນ', '-', '2020-03-24', '14:48:06', 2, 'Admin'),
(18, 'ກົມການສຶກສາສາທາລະນະສຸກ', 'ທັກສະການສອນດ້ານຄຣີນິກ', '2019-11-04', '2019-11-08', '2019', '143799000.00', 'ພາຍໃນປະເທດ', '034', 'ລັດຖະບານ', '-', '2020-03-24', '15:29:53', 4, NULL),
(19, 'ss', 'ss', '2020-03-24', '2020-03-24', '2019', '0.00', 'ພາຍໃນປະເທດ', '0003', 'ss', '-', '2020-03-24', '21:09:50', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tranddetail`
--

CREATE TABLE `tranddetail` (
  `detail_id` int(11) NOT NULL,
  `per_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `train_id` int(11) DEFAULT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tranddetail`
--

INSERT INTO `tranddetail` (`detail_id`, `per_id`, `train_id`, `note`) VALUES
(5, 'ສກພ001', 1, '-'),
(6, 'ຮໝອຕ001', 1, '-'),
(7, 'ຮໝຊກ001', 1, '-'),
(8, 'ຮໝບຊ001', 1, '-'),
(12, 'ຄພບ001', 2, '-'),
(13, 'ຄຕພ001', 2, '-'),
(14, 'ສຄພ001', 2, '-'),
(15, 'ຄພບ002', 2, '-'),
(16, 'ພຍບ002', 2, '-'),
(17, 'ສທສ001', 2, '-'),
(18, 'ຄສທ001', 2, '-'),
(19, 'ຄພສ003', 2, '-'),
(20, 'ຄພສ004', 2, '-'),
(21, 'ຕນພ001', 2, '-'),
(22, 'ຕນພ002', 2, '-'),
(27, 'ກປຟ002', 3, '-'),
(28, 'ພປຟ001', 3, '-'),
(29, 'ພຄປອ001', 3, '-'),
(30, 'ພຄກປ001', 3, '-'),
(34, 'ສທສອຕປ001', 4, '-'),
(35, 'ຮໝສລວ002', 4, '-'),
(36, 'ຮໝສລວ001', 4, '-'),
(37, 'ພສຂສ001', 4, '-'),
(38, 'ພສທຊກ001', 4, '-'),
(39, 'ຮໝຈປສ001', 4, '-'),
(40, 'ພສທຈ001', 4, '-'),
(41, 'ຮໝອຕ002', 4, '-'),
(49, 'ຮໝຊຖ001', 5, '-'),
(50, 'ມວສ001', 6, '-'),
(53, 'ຮໝມຕພ001', 7, '-'),
(54, 'ຮຮສທຊຂ001', 7, '-'),
(56, 'ຮໝຊຖ002', 8, '-'),
(57, 'ພກພ001', 9, '-'),
(58, 'ພຄສ001', 9, '-'),
(59, 'ຫປສ001', 9, '-'),
(60, 'ສວຢ001', 10, '-'),
(61, 'ສປຮ001', 11, '-'),
(62, 'ຮໝມຕພ003', 12, '-'),
(63, 'ກຄພ001', 13, '-'),
(64, 'ສຂຍມ001', 13, '-'),
(65, 'ສຂຍມ002', 13, '-'),
(66, 'ສວລ001', 13, '-'),
(70, 'ມວສ003', 14, '-'),
(71, 'ມວສ005', 14, '-'),
(72, 'ທຄທພມວສ001', 14, '-'),
(73, 'ທຄທພມວສ001', 15, '-'),
(74, 'ຄທພ003', 15, '-'),
(75, 'ຄທພ002', 15, '-'),
(76, 'ຄທພ001', 15, '-'),
(77, 'ຄທພ004', 15, '-'),
(84, 'ພຄກປ001', 17, '-'),
(85, 'ທົດສອບ1', 17, '-'),
(87, 'ພຄສ001', 1, '-'),
(88, 'ຮໝມຕພ111', 18, '-'),
(89, 'ຮໝສຖ120', 18, '-'),
(91, 'ຮໝສຖ120', 19, '-');

-- --------------------------------------------------------

--
-- Table structure for table `type_person`
--

CREATE TABLE `type_person` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_person`
--

INSERT INTO `type_person` (`type_id`, `type_name`) VALUES
(1, 'ວິຊາການ'),
(2, 'ນັກສຶກສາ'),
(3, 'ທະຫານ'),
(4, 'ຕຳຫຼວດ');

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

CREATE TABLE `username` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`user_id`, `user_name`, `user_surname`, `gender`, `address`, `tel`, `email`, `pass`, `status`) VALUES
(2, 'Admin', 'MOH', 'ຊາຍ', 'ກະຊວງສາທາລະນະສຸກ', '+856 20 5795 9555', 'admin@moh.com', '123', 1),
(3, 'User_view', 'MOH', 'ຊາຍ', 'ກະຊວງສາທາລະນະສຸກ', '020-5555-6633', 'user_view@moh.com', '123', 3),
(4, 'User', 'MOH', 'ຊາຍ', 'ກະຊວງສາທາລະນະສຸກ', '+856 20 5232 9555', 'user@moh.com', '123', 2),
(7, 'ໄຊສ', 'ໄຊ', 'ຍິງ', '-', '-', '2@hotmail.com', '12345', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`cer_id`),
  ADD KEY `cer_id2` (`cer_id2`);

--
-- Indexes for table `certificate2`
--
ALTER TABLE `certificate2`
  ADD PRIMARY KEY (`cer_id2`);

--
-- Indexes for table `ethnicity`
--
ALTER TABLE `ethnicity`
  ADD PRIMARY KEY (`eth_id`);

--
-- Indexes for table `listtranddetail`
--
ALTER TABLE `listtranddetail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`nation_id`);

--
-- Indexes for table `personality`
--
ALTER TABLE `personality`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `eth_id` (`eth_id`),
  ADD KEY `nation_id` (`nation_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `sec_id` (`sec_id`),
  ADD KEY `cer_id` (`cer_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_id`),
  ADD KEY `province` (`province`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`train_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tranddetail`
--
ALTER TABLE `tranddetail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `train_id` (`train_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Indexes for table `type_person`
--
ALTER TABLE `type_person`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `cer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificate2`
--
ALTER TABLE `certificate2`
  MODIFY `cer_id2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ethnicity`
--
ALTER TABLE `ethnicity`
  MODIFY `eth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `listtranddetail`
--
ALTER TABLE `listtranddetail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `nation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `train_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tranddetail`
--
ALTER TABLE `tranddetail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `type_person`
--
ALTER TABLE `type_person`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `username`
--
ALTER TABLE `username`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`cer_id2`) REFERENCES `certificate2` (`cer_id2`);

--
-- Constraints for table `listtranddetail`
--
ALTER TABLE `listtranddetail`
  ADD CONSTRAINT `listtranddetail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `username` (`user_id`);

--
-- Constraints for table `personality`
--
ALTER TABLE `personality`
  ADD CONSTRAINT `personality_ibfk_1` FOREIGN KEY (`eth_id`) REFERENCES `ethnicity` (`eth_id`),
  ADD CONSTRAINT `personality_ibfk_2` FOREIGN KEY (`nation_id`) REFERENCES `nationality` (`nation_id`),
  ADD CONSTRAINT `personality_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `type_person` (`type_id`),
  ADD CONSTRAINT `personality_ibfk_4` FOREIGN KEY (`sec_id`) REFERENCES `section` (`sec_id`),
  ADD CONSTRAINT `personality_ibfk_5` FOREIGN KEY (`cer_id`) REFERENCES `certificate` (`cer_id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`province`) REFERENCES `province` (`pro_id`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `username` (`user_id`);

--
-- Constraints for table `tranddetail`
--
ALTER TABLE `tranddetail`
  ADD CONSTRAINT `tranddetail_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `training` (`train_id`),
  ADD CONSTRAINT `tranddetail_ibfk_2` FOREIGN KEY (`per_id`) REFERENCES `personality` (`per_id`);

--
-- Constraints for table `username`
--
ALTER TABLE `username`
  ADD CONSTRAINT `username_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
