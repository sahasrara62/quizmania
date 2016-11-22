-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2016 at 07:58 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finaldata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('vic@gmail.com', '123456'),
('admin@quizmania.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('55892169bf6a7', '55892169d2efc'),
('5589216a3646e', '5589216a48722'),
('558922117fcef', '5589221195248'),
('55892211e44d5', '55892211f1fa7'),
('558922894c453', '558922895ea0a'),
('558922899ccaa', '55892289aa7cf'),
('558923538f48d', '558923539a46c'),
('55892353f05c4', '55892354051be'),
('558973f4389ac', '558973f462e61'),
('558973f4c46f2', '558973f4d4abe'),
('558973f51600d', '558973f526fc5'),
('558973f55d269', '558973f57af07'),
('558973f5abb1a', '558973f5e764a'),
('5589751a63091', '5589751a81bf4'),
('5589751ad32b8', '5589751adbdbd'),
('5589751b304ef', '5589751b3b04d'),
('5589751b749c9', '5589751b9a98c'),
('5783ebfe9b6a7', '5783ebfeb332a'),
('5783ebfecd4ae', '5783ebfed3740'),
('5783f1467b86f', '5783f1469452f'),
('5783f214d9318', '5783f21508897'),
('5783f31c83a0e', '5783f31c9b845'),
('5783f440ea479', '5783f4410cdee'),
('5783f494991b7', '5783f4949e7de'),
('5783f4e4ca1b8', '5783f4e5e2a69'),
('5783f52d666ab', '5783f52d7ffb9'),
('5783f59ebeaf3', '5783f59ecafd5'),
('578471184e603', '578471185984a'),
('57847e66a52aa', '5783f63f8c870'),
('57847e811cc8c', '5784711859837'),
('57847ef401bc1', '5784711859844'),
('57847f324b9d9', '5784711859843'),
('57847f46b74fc', '578471185984a'),
('57847f94e98c0', '578471185984a'),
('5784d30e9aca8', '5783f63f8c864'),
('5784d33df1f8e', '5783f60fe2763'),
('5784d374b1066', '5783f60fe2755'),
('5784d3f62ab5c', '5783f60fe2765'),
('5784d41810c8f', '5783f60fe2765'),
('578504f72cfc9', '578504f7374df'),
('5785051a84007', '5785051a90064'),
('5785053017fe1', '5785053021ee5'),
('5785053f3f014', '5785053f48084'),
('5785054e9d444', '5785054ea37d0'),
('5785055e64856', '5785055e73b1e'),
('5785056d2471a', '5785056d2ba9e'),
('5785057b4b8e6', '5785057b51087'),
('5785fc054a353', '5785fc0567936'),
('5785fc057ab38', '5785fc057ffaf'),
('5785fc0593240', '5785fc059c792'),
('578636c5326b7', '578636c54a439'),
('578636c5683ce', '578636c56d84f'),
('578636c57b3ae', '578636c57df05'),
('578636c590f0b', '578636c59d188'),
('578636c5b6faa', '578636c5b97f5'),
('578636c5e5e33', '578636c5ed3eb'),
('578639e454eeb', '578639e46d30b'),
('578639e4a561e', '578639e4bc9ef'),
('578639e4d0c94', '578639e4d3a92'),
('578639e4e9390', '578639e4ec11e'),
('578639e50ac3c', '578639e517261'),
('578639e52b54d', '578639e52e314'),
('57863e0c78fd7', '57863e0c8da97'),
('57863e0cb0fec', '57863e0cb38d1'),
('57863e0cc6b30', '57863e0cc94b2'),
('57863e0cd6fe2', '57863e0cdefbc'),
('57863e0d1640e', '57863e0d198d5'),
('57863e0d2942c', '57863e0d2c219');

-- --------------------------------------------------------

--
-- Table structure for table `graph`
--

CREATE TABLE `graph` (
  `eid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `performace` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('sunnygkp10@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2015-06-23 09:31:26'),
('sunnygkp10@gmail.com', '558920ff906b8', 4, 2, 2, 0, '2015-06-23 13:32:09'),
('avantika420@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2015-06-23 14:33:04'),
('avantika420@gmail.com', '5589222f16b93', 4, 2, 2, 0, '2015-06-23 14:49:39'),
('sunnygkp10@gmail.com', '5589741f9ed52', 4, 5, 3, 2, '2015-06-23 15:07:16'),
('mi5@hollywood.com', '5589222f16b93', 4, 2, 2, 0, '2015-06-23 15:12:56'),
('nik1@gmail.com', '558921841f1ec', 1, 2, 1, 1, '2015-06-23 16:11:50'),
('sunnygkp10@gmail.com', '5589222f16b93', 1, 2, 1, 1, '2015-06-24 03:22:38'),
('vikaskashyap431@gmail.com', '5589741f9ed52', -2, 5, 1, 4, '2016-07-07 05:56:38'),
('vic@gmail.com', '5589741f9ed52', -4, 4, 0, 4, '2016-07-11 04:08:44'),
('1234@gmail.com', '558920ff906b8', -2, 2, 0, 2, '2016-07-13 03:52:41'),
('1234@gmail.com', '558922ec03021', -3, 2, 0, 3, '2016-07-13 08:17:40'),
('1234@gmail.com', '55897338a6659', 1, 5, 2, 3, '2016-07-13 05:20:53'),
('1234@gmail.com', '558921841f1ec', -2, 2, 0, 2, '2016-07-13 05:22:08'),
('1234@gmail.com', '5589741f9ed52', 4, 5, 3, 2, '2016-07-13 05:22:56'),
('1234@gmail.com', '5589222f16b93', 4, 2, 2, 0, '2016-07-13 08:18:05'),
('1234@gmail.com', '5785fae973ffc', 0, 3, 1, 2, '2016-07-13 08:37:31'),
('bharatpuri30@gmail.com', '5589741f9ed52', -5, 5, 0, 5, '2016-07-13 11:44:50'),
('bharatpuri30@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2016-07-13 11:46:25'),
('bharatpuri30@gmail.com', '5589222f16b93', 4, 2, 2, 0, '2016-07-13 11:47:57'),
('bharatpuri30@gmail.com', '5786345703e7a', 9, 6, 5, 1, '2016-07-13 12:55:39'),
('bharatpuri30@gmail.com', '57863717b5520', 9, 6, 5, 1, '2016-07-13 13:15:18'),
('bharatpuri30@gmail.com', '57863b542d485', 12, 6, 6, 0, '2016-07-14 01:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('55892169bf6a7', 'usermod', '55892169d2efc'),
('55892169bf6a7', 'useradd', '55892169d2f05'),
('55892169bf6a7', 'useralter', '55892169d2f09'),
('55892169bf6a7', 'groupmod', '55892169d2f0c'),
('5589216a3646e', '751', '5589216a48713'),
('5589216a3646e', '752', '5589216a4871a'),
('5589216a3646e', '754', '5589216a4871f'),
('5589216a3646e', '755', '5589216a48722'),
('558922117fcef', 'echo', '5589221195248'),
('558922117fcef', 'print', '558922119525a'),
('558922117fcef', 'printf', '5589221195265'),
('558922117fcef', 'cout', '5589221195270'),
('55892211e44d5', 'int a', '55892211f1f97'),
('55892211e44d5', '$a', '55892211f1fa7'),
('55892211e44d5', 'long int a', '55892211f1fb4'),
('55892211e44d5', 'int a$', '55892211f1fbd'),
('558922894c453', 'cin>>a;', '558922895ea0a'),
('558922894c453', 'cin<<a;', '558922895ea26'),
('558922894c453', 'cout>>a;', '558922895ea34'),
('558922894c453', 'cout<a;', '558922895ea41'),
('558922899ccaa', 'cout', '55892289aa7cf'),
('558922899ccaa', 'cin', '55892289aa7df'),
('558922899ccaa', 'print', '55892289aa7eb'),
('558922899ccaa', 'printf', '55892289aa7f5'),
('558923538f48d', '255.0.0.0', '558923539a46c'),
('558923538f48d', '255.255.255.0', '558923539a480'),
('558923538f48d', '255.255.0.0', '558923539a48b'),
('558923538f48d', 'none of these', '558923539a495'),
('55892353f05c4', '192.168.1.100', '5589235405192'),
('55892353f05c4', '172.168.16.2', '55892354051a3'),
('55892353f05c4', '10.0.0.0.1', '55892354051b4'),
('55892353f05c4', '11.11.11.11', '55892354051be'),
('558973f4389ac', 'containing root file-system required during bootup', '558973f462e44'),
('558973f4389ac', ' Contains only scripts to be executed during bootup', '558973f462e56'),
('558973f4389ac', ' Contains root-file system and drivers required to be preloaded during bootup', '558973f462e61'),
('558973f4389ac', 'None of the above', '558973f462e6b'),
('558973f4c46f2', 'Kernel', '558973f4d4abe'),
('558973f4c46f2', 'Shell', '558973f4d4acf'),
('558973f4c46f2', 'Commands', '558973f4d4ad9'),
('558973f4c46f2', 'Script', '558973f4d4ae3'),
('558973f51600d', 'Boot Loading', '558973f526f9d'),
('558973f51600d', ' Boot Record', '558973f526fb9'),
('558973f51600d', ' Boot Strapping', '558973f526fc5'),
('558973f51600d', ' Booting', '558973f526fce'),
('558973f55d269', ' Quick boot', '558973f57aef1'),
('558973f55d269', 'Cold boot', '558973f57af07'),
('558973f55d269', ' Hot boot', '558973f57af17'),
('558973f55d269', ' Fast boot', '558973f57af27'),
('558973f5abb1a', 'bash', '558973f5e7623'),
('558973f5abb1a', ' Csh', '558973f5e7636'),
('558973f5abb1a', ' ksh', '558973f5e7640'),
('558973f5abb1a', ' sh', '558973f5e764a'),
('5589751a63091', 'q', '5589751a81bd6'),
('5589751a63091', 'wq', '5589751a81be8'),
('5589751a63091', ' both (a) and (b)', '5589751a81bf4'),
('5589751a63091', ' none of the mentioned', '5589751a81bfd'),
('5589751ad32b8', ' moves screen down one page', '5589751adbdbd'),
('5589751ad32b8', 'moves screen up one page', '5589751adbdce'),
('5589751ad32b8', 'moves screen up one line', '5589751adbdd8'),
('5589751ad32b8', ' moves screen down one line', '5589751adbde2'),
('5589751b304ef', ' yy', '5589751b3b04d'),
('5589751b304ef', 'yw', '5589751b3b05e'),
('5589751b304ef', 'yc', '5589751b3b069'),
('5589751b304ef', ' none of the mentioned', '5589751b3b073'),
('5589751b749c9', 'X', '5589751b9a98c'),
('5589751b749c9', 'x', '5589751b9a9a5'),
('5589751b749c9', 'D', '5589751b9a9b7'),
('5589751b749c9', 'd', '5589751b9a9c9'),
('5589751bd02ec', 'autoindentation is not possible in vi editor', '5589751bdadaa'),
('5783ebfe9b6a7', ' zd', '5783ebfeb331b'),
('5783ebfe9b6a7', 'cd z', '5783ebfeb332a'),
('5783ebfe9b6a7', 'cx ', '5783ebfeb332c'),
('5783ebfe9b6a7', 'c xz', '5783ebfeb332d'),
('5783ebfecd4ae', 'zdfv', '5783ebfed3734'),
('5783ebfecd4ae', 'dvzv', '5783ebfed3740'),
('5783ebfecd4ae', 'dfvz', '5783ebfed3742'),
('5783ebfecd4ae', 'dvf', '5783ebfed3747'),
('5783f1467b86f', 'qw', '5783f1469451f'),
('5783f1467b86f', 'qwe', '5783f1469452d'),
('5783f1467b86f', 'kabir', '5783f1469452f'),
('5783f1467b86f', 'qwert', '5783f14694530'),
('5783f214d9318', 'qqqqq', '5783f2150887b'),
('5783f214d9318', 'qwere', '5783f2150888f'),
('5783f214d9318', 'dvvdvf', '5783f21508894'),
('5783f214d9318', 'vvvvvvvvvvvvvvvvv', '5783f21508897'),
('5783f31c83a0e', 'optiona', '5783f31c9b83a'),
('5783f31c83a0e', 'optionb', '5783f31c9b845'),
('5783f31c83a0e', 'optionc', '5783f31c9b848'),
('5783f31c83a0e', 'optiond', '5783f31c9b84a'),
('5783f440ea479', '1', '5783f4410cddf'),
('5783f440ea479', '2', '5783f4410cdee'),
('5783f440ea479', '3', '5783f4410cdf0'),
('5783f440ea479', '4', '5783f4410cdf1'),
('5783f494991b7', '1', '5783f4949e7d2'),
('5783f494991b7', '2', '5783f4949e7de'),
('5783f494991b7', '3', '5783f4949e7df'),
('5783f494991b7', '4', '5783f4949e7e1'),
('5783f4e4ca1b8', '1', '5783f4e5e2a5b'),
('5783f4e4ca1b8', '2', '5783f4e5e2a69'),
('5783f4e4ca1b8', '3', '5783f4e5e2a6c'),
('5783f4e4ca1b8', '4', '5783f4e5e2a6e'),
('5783f52d666ab', 'x1', '5783f52d7ffa3'),
('5783f52d666ab', 'x2', '5783f52d7ffb5'),
('5783f52d666ab', 'x3', '5783f52d7ffb9'),
('5783f52d666ab', 'x4', '5783f52d7ffbc'),
('5783f59ebeaf3', '12', '5783f59ecafc2'),
('5783f59ebeaf3', '23', '5783f59ecafd2'),
('5783f59ebeaf3', '34', '5783f59ecafd4'),
('5783f59ebeaf3', '45', '5783f59ecafd5'),
('578471184e603', 'optionvic1', '5784711859837'),
('578471184e603', 'optionvic2', '5784711859843'),
('578471184e603', 'optionvic3', '5784711859844'),
('578471184e603', 'optionvic4', '578471185984a'),
('578504f72cfc9', 'testing', '578504f7374d4'),
('578504f72cfc9', 'testing', '578504f7374df'),
('578504f72cfc9', 'testing', '578504f7374e2'),
('578504f72cfc9', 'testing', '578504f7374e3'),
('5785051a84007', 'testing', '5785051a9003b'),
('5785051a84007', 'testing', '5785051a90061'),
('5785051a84007', 'testing', '5785051a90064'),
('5785051a84007', 'testing', '5785051a90066'),
('5785053017fe1', 'testing', '5785053021eda'),
('5785053017fe1', 'testing', '5785053021ee5'),
('5785053017fe1', 'testing', '5785053021ee7'),
('5785053017fe1', 'testing', '5785053021ee9'),
('5785053f3f014', 'testing', '5785053f48075'),
('5785053f3f014', 'testing', '5785053f48081'),
('5785053f3f014', 'testing', '5785053f48082'),
('5785053f3f014', 'testing', '5785053f48084'),
('5785054e9d444', 'testing', '5785054ea37c3'),
('5785054e9d444', 'testing', '5785054ea37d0'),
('5785054e9d444', 'testing', '5785054ea37d6'),
('5785054e9d444', 'testing', '5785054ea37d8'),
('5785055e64856', 'testing', '5785055e73b12'),
('5785055e64856', 'testing', '5785055e73b1e'),
('5785055e64856', 'testing', '5785055e73b21'),
('5785055e64856', 'testing', '5785055e73b23'),
('5785056d2471a', 'testing', '5785056d2ba8f'),
('5785056d2471a', 'testing', '5785056d2ba9c'),
('5785056d2471a', 'testing', '5785056d2ba9e'),
('5785056d2471a', 'testing', '5785056d2baa1'),
('5785057b4b8e6', 'testing', '5785057b5107c'),
('5785057b4b8e6', 'testing', '5785057b51087'),
('5785057b4b8e6', 'testing', '5785057b51089'),
('5785057b4b8e6', 'testing', '5785057b5108b'),
('5785fc054a353', 'select', '5785fc0567928'),
('5785fc054a353', 'list', '5785fc0567933'),
('5785fc054a353', 'dropdown', '5785fc0567936'),
('5785fc054a353', 'all of above', '5785fc056793a'),
('5785fc057ab38', '"head"', '5785fc057ff9d'),
('5785fc057ab38', '"body"', '5785fc057ffa8'),
('5785fc057ab38', '"web"', '5785fc057ffac'),
('5785fc057ab38', '"html"', '5785fc057ffaf'),
('5785fc0593240', 'bold', '5785fc059c780'),
('5785fc0593240', 'italic', '5785fc059c78c'),
('5785fc0593240', 'underline', '5785fc059c78f'),
('5785fc0593240', 'unordered list', '5785fc059c792'),
('578636c5326b7', 'picture', '578636c54a422'),
('578636c5326b7', 'image', '578636c54a433'),
('578636c5326b7', 'img', '578636c54a439'),
('578636c5326b7', 'src', '578636c54a43f'),
('578636c5683ce', 'html', '578636c56d83e'),
('578636c5683ce', 'head', '578636c56d84f'),
('578636c5683ce', 'title', '578636c56d856'),
('578636c5683ce', 'body', '578636c56d85c'),
('578636c57b3ae', 'th', '578636c57def4'),
('578636c57b3ae', 'tr', '578636c57df05'),
('578636c57b3ae', 'td', '578636c57df0b'),
('578636c57b3ae', 'tn', '578636c57df11'),
('578636c590f0b', 'ul tag', '578636c59d177'),
('578636c590f0b', 'ol tag', '578636c59d188'),
('578636c590f0b', 'list tag', '578636c59d18e'),
('578636c590f0b', 'dl tag', '578636c59d193'),
('578636c5b6faa', ' visited link', '578636c5b97f5'),
('578636c5b6faa', 'virtual link', '578636c5b9805'),
('578636c5b6faa', ' very good link', '578636c5b980b'),
('578636c5b6faa', ' active link', '578636c5b9810'),
('578636c5e5e33', 'class', '578636c5ed3d9'),
('578636c5e5e33', 'id', '578636c5ed3eb'),
('578636c5e5e33', 'dot', '578636c5ed3f1'),
('578636c5e5e33', 'all of above', '578636c5ed3f7'),
('578639e454eeb', ' RMI', '578639e46d2fb'),
('578639e454eeb', 'triggering event', '578639e46d308'),
('578639e454eeb', 'function/method', '578639e46d30b'),
('578639e454eeb', 'preprocessor', '578639e46d30e'),
('578639e4a561e', ' Syntax error', '578639e4bc9d9'),
('578639e4a561e', ' Missing of semicolons', '578639e4bc9e9'),
('578639e4a561e', 'Division by zero', '578639e4bc9ef'),
('578639e4a561e', '  All of the above', '578639e4bc9f2'),
('578639e4d0c94', 'Floating numbers', '578639e4d3a7e'),
('578639e4d0c94', '  Representation of functions that returns a value', '578639e4d3a8b'),
('578639e4d0c94', ' f is not present in JavaScript', '578639e4d3a8f'),
('578639e4d0c94', ' Form feed', '578639e4d3a92'),
('578639e4e9390', 'event type', '578639e4ec11e'),
('578639e4e9390', 'even target', '578639e4ec12a'),
('578639e4e9390', 'Both a and b', '578639e4ec12e'),
('578639e4e9390', ' None of the mentioned', '578639e4ec131'),
('578639e50ac3c', 'function', '578639e517261'),
('578639e50ac3c', 'interface', '578639e51726d'),
('578639e50ac3c', 'event', '578639e517271'),
('578639e50ac3c', 'handler', '578639e517274'),
('578639e52b54d', 'target', '578639e52e305'),
('578639e52b54d', 'type', '578639e52e314'),
('578639e52b54d', 'manner', '578639e52e31a'),
('578639e52b54d', 'all of above', '578639e52e31f'),
('57863e0c78fd7', 'echo"message"', '57863e0c8da97'),
('57863e0c78fd7', 'cout<<message', '57863e0c8daa8'),
('57863e0c78fd7', 'cin>>message', '57863e0c8daae'),
('57863e0c78fd7', 'non of above', '57863e0c8dab4'),
('57863e0cb0fec', 'Hypertext Preprocessor', '57863e0cb38d1'),
('57863e0cb0fec', 'Pre Hypertext Processor', '57863e0cb38e2'),
('57863e0cb0fec', ' Pre Hyper Processor', '57863e0cb38e7'),
('57863e0cb0fec', 'Pre Hypertext Process', '57863e0cb38ea'),
('57863e0cc6b30', 'Pond-sign', '57863e0cc9499'),
('57863e0cc6b30', 'yen-sign', '57863e0cc94ac'),
('57863e0cc6b30', 'dollar-sign', '57863e0cc94b2'),
('57863e0cc6b30', 'euro-sign', '57863e0cc94b7'),
('57863e0cd6fe2', 'store persistent user preference on a site', '57863e0cdefa2'),
('57863e0cd6fe2', ' save user authentication information from page to page', '57863e0cdefb2'),
('57863e0cd6fe2', 'create multipage forms', '57863e0cdefb7'),
('57863e0cd6fe2', 'all of above', '57863e0cdefbc'),
('57863e0d1640e', ' array_diff', '57863e0d198d5'),
('57863e0d1640e', ' diff_array ', '57863e0d198e5'),
('57863e0d1640e', ' arrays_diff', '57863e0d198eb'),
('57863e0d1640e', '  diff_arrays', '57863e0d198f1'),
('57863e0d2942c', 'MYSQL', '57863e0d2c206'),
('57863e0d2942c', 'IBM DB/2', '57863e0d2c212'),
('57863e0d2942c', 'POSTGRESQL', '57863e0d2c216'),
('57863e0d2942c', 'NONE OF ABOVE', '57863e0d2c219');

-- --------------------------------------------------------

--
-- Table structure for table `php`
--

CREATE TABLE `php` (
  `Type` varchar(20) NOT NULL,
  `Level` varchar(8) NOT NULL,
  `Question` varchar(500) NOT NULL,
  `Option_A` varchar(300) NOT NULL,
  `Option_B` varchar(300) NOT NULL,
  `Option_C` varchar(300) NOT NULL,
  `Option_D` varchar(300) NOT NULL,
  `Correct_Answer` varchar(300) NOT NULL,
  `Question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Level` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`, `Type`, `Level`) VALUES
('558920ff906b8', '55892169bf6a7', 'what is command for changing user information??', 4, 1, '', ''),
('558920ff906b8', '5589216a3646e', 'what is permission for view only for other??', 4, 2, '', ''),
('558921841f1ec', '558922117fcef', 'what is command for print in php??', 4, 1, '', ''),
('558921841f1ec', '55892211e44d5', 'which is a variable of php??', 4, 2, '', ''),
('5589222f16b93', '558922894c453', 'what is correct statement in c++??', 4, 1, '', ''),
('5589222f16b93', '558922899ccaa', 'which command is use for print the output in c++?', 4, 2, '', ''),
('558922ec03021', '558923538f48d', 'what is correct mask for A class IP???', 4, 1, '', ''),
('558922ec03021', '55892353f05c4', 'which is not a private IP??', 4, 2, '', ''),
('55897338a6659', '558973f4389ac', 'On Linux, initrd is a file', 4, 1, '', ''),
('55897338a6659', '558973f4c46f2', 'Which is loaded into memory when system is booted?', 4, 2, '', ''),
('55897338a6659', '558973f51600d', ' The process of starting up a computer is known as', 4, 3, '', ''),
('55897338a6659', '558973f55d269', ' Bootstrapping is also known as', 4, 4, '', ''),
('55897338a6659', '558973f5abb1a', 'The shell used for Single user mode shell is:', 4, 5, '', ''),
('5589741f9ed52', '5589751a63091', ' Which command is used to close the vi editor?', 4, 1, '', ''),
('5589741f9ed52', '5589751ad32b8', ' In vi editor, the key combination CTRL+f', 4, 2, '', ''),
('5589741f9ed52', '5589751b304ef', ' Which vi editor command copies the current line of the file?', 4, 3, '', ''),
('5589741f9ed52', '5589751b749c9', ' Which command is used to delete the character before the cursor location in vi editor?', 4, 4, '', ''),
('5589741f9ed52', '5589751bd02ec', ' Which one of the following statement is true?', 4, 5, '', ''),
('5786345703e7a', '578636c5326b7', 'A webpage displays a picture. What tag was used to display that picture?', 4, 1, 'HTML', 'level1'),
('5786345703e7a', '578636c5683ce', 'Tags and test that are not directly displayed on the page are written in _____ section.', 4, 2, 'HTML', 'level1'),
('5786345703e7a', '578636c57b3ae', 'Which tag allows you to add a row in a table?', 4, 3, 'HTML', 'level2'),
('5786345703e7a', '578636c590f0b', 'How can you make a numbered list?', 4, 4, 'HTML', 'level2'),
('5786345703e7a', '578636c5b6faa', 'What does vlink attribute mean?\r\n\r\n\r\n\r\n\r\n', 4, 5, 'HTML', 'level3'),
('5786345703e7a', '578636c5e5e33', 'Which attribute is used to name an element uniquely?', 4, 6, 'HTML', 'level3'),
('57863717b5520', '578639e454eeb', 'JavaScript Code can be called by using?', 4, 1, 'JAVASCRIPT', 'level1'),
('57863717b5520', '578639e4a561e', 'Which of the following is not considered as an error in JavaScript?\r\n\r\n\r\n ', 4, 2, 'JAVASCRIPT', 'level1'),
('57863717b5520', '578639e4d0c94', ' The escape sequence â€˜fâ€™ stands for?\r\n\r\n', 4, 3, 'JAVASCRIPT', 'level2'),
('57863717b5520', '578639e4e9390', 'The type that specifies what kind of event occured is?', 4, 4, 'JAVASCRIPT', 'level2'),
('57863717b5520', '578639e50ac3c', ' In general, event handler is nothing but', 4, 5, 'JAVASCRIPT', 'level3'),
('57863717b5520', '578639e52b54d', ' Which property specifies the property of the event?', 4, 6, 'JAVASCRIPT', 'level3'),
('57863b542d485', '57863e0c78fd7', 'Which command is used to print a string in php?', 4, 1, 'PHP', 'level1'),
('57863b542d485', '57863e0cb0fec', 'what does php stands for?', 4, 2, 'PHP', 'level2'),
('57863b542d485', '57863e0cc6b30', 'Variables always start with a ........ in PHP?', 4, 3, 'PHP', 'level2'),
('57863b542d485', '57863e0cd6fe2', 'Sessions allow you to ?', 4, 4, 'PHP', 'level2'),
('57863b542d485', '57863e0d1640e', 'What function computes the difference of arrays?\r\n\r\n\r\n', 4, 5, 'PHP', 'level3'),
('57863b542d485', '57863e0d2942c', 'Which of the following DBMSs do not have a native PHP extension?', 4, 6, 'PHP', 'level3');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('558920ff906b8', 'Linux : File Managment', 2, 1, 2, 5, '', 'linux', '2015-06-23 09:03:59'),
('5589222f16b93', 'C++ Coding', 2, 1, 2, 5, '', 'c++', '2015-06-23 09:09:03'),
('558922ec03021', 'Networking', 2, 1, 2, 5, '', 'networking', '2015-06-23 09:12:12'),
('55897338a6659', 'Linux:startup', 2, 1, 5, 10, '', 'linux', '2015-06-23 14:54:48'),
('5589741f9ed52', 'Linux :vi Editor', 2, 1, 5, 10, '', 'linux', '2015-06-23 14:58:39'),
('5786345703e7a', 'Html', 2, 1, 6, 15, '', '', '2016-07-13 12:30:15'),
('57863717b5520', 'Javascript', 2, 1, 6, 15, '', '', '2016-07-13 12:41:59'),
('57863b542d485', 'Php', 2, 1, 6, 15, '', '', '2016-07-13 13:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('1234@gmail.com', -8, '2016-07-13 08:37:31'),
('user@spic.com', 1, '2016-07-13 08:39:17'),
('bharatpuri30@gmail.com', 48, '2016-07-14 01:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `result_graph`
--

CREATE TABLE `result_graph` (
  `eid` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `marks` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_graph`
--

INSERT INTO `result_graph` (`eid`, `email`, `marks`, `total`, `percentage`) VALUES
('558922ec03021', '1234@gmail.com', -3, 4, 0),
('5589222f16b93', '1234@gmail.com', 4, 4, 100),
('5785f9c8470ef', '1234@gmail.com', -1, 2, 0),
('5785fae973ffc', '1234@gmail.com', 9, 12, 75),
('558921841f1ec', 'user@spic.com', 1, 4, 25),
('5785fae973ffc', 'bharatpuri30@gmail.com', 9, 12, 75),
('5589741f9ed52', 'bharatpuri30@gmail.com', -5, 10, 0),
('558921841f1ec', 'bharatpuri30@gmail.com', 4, 4, 100),
('5589222f16b93', 'bharatpuri30@gmail.com', 4, 4, 100),
('5786345703e7a', 'bharatpuri30@gmail.com', 9, 12, 75),
('57863b542d485', 'bharatpuri30@gmail.com', 18, 24, 75),
('57863717b5520', 'bharatpuri30@gmail.com', 9, 12, 75);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
(' Vikas', 'Male', 'nit hamirpur', '1234@gmail.com', 12334567890, 'd8578edf8458ce06fbc5bb76a58c5ca4'),
('Bharat', 'Male', 'nith', 'bharatpuri30@gmail.com', 8988337369, '5d41402abc4b2a76b9719d911017c592'),
('Nidhi', 'Female', 'nit hamirpur', 'nidhidhiman73@gmail.com', 123456677, '6f551f1f73b720e7c158c89ffab8222e'),
('User', 'Male', 'NIT Hamirpur', 'user@quizmania.com', 1234567890, '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `php`
--
ALTER TABLE `php`
  ADD PRIMARY KEY (`Question_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `php`
--
ALTER TABLE `php`
  MODIFY `Question_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
