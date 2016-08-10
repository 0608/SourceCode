-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-14 14:53:39
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `created_project`
--

CREATE TABLE IF NOT EXISTS `created_project` (
  `u_id` int(12) NOT NULL,
  `p_id` int(12) NOT NULL,
  `project_state` varchar(32) CHARACTER SET latin1 NOT NULL,
  `reason` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `created_project`
--

INSERT INTO `created_project` (`u_id`, `p_id`, `project_state`, `reason`) VALUES
(3, 1, 'no  oko', ''),
(3, 2, '1', ''),
(3, 2, '0', ''),
(3, 3, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `u_id` int(12) NOT NULL,
  `time` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `p_id` int(12) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(12) CHARACTER SET latin1 NOT NULL,
  `type` varchar(12) CHARACTER SET latin1 NOT NULL,
  `property` varchar(32) CHARACTER SET latin1 NOT NULL,
  `fund` double NOT NULL,
  `reward_method` varchar(32) CHARACTER SET latin1 NOT NULL,
  `start_time` date NOT NULL,
  `finish_time` date NOT NULL,
  `contact_way` varchar(32) CHARACTER SET latin1 NOT NULL,
  `max_member` int(32) NOT NULL,
  `picture` varchar(32) CHARACTER SET latin1 NOT NULL,
  `address` varchar(32) CHARACTER SET latin1 NOT NULL,
  `team_name` varchar(32) CHARACTER SET latin1 NOT NULL,
  `created_by` varchar(32) CHARACTER SET latin1 NOT NULL,
  `state` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `rate` double NOT NULL,
  `have_member` int(12) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `project_deadline` date NOT NULL,
  `labid` int(20) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`p_id`, `p_name`, `type`, `property`, `fund`, `reward_method`, `start_time`, `finish_time`, `contact_way`, `max_member`, `picture`, `address`, `team_name`, `created_by`, `state`, `description`, `rate`, `have_member`, `reason`, `project_deadline`, `labid`) VALUES
(1, 'nuberi', 'Competition', '??', 234, '??', '2015-10-02', '2015-10-23', '726381', 5, '?', 'jshjewef', 'awefewf', 'wefwef', 'projchecked', '', 0.33333333333333, 0, '', '0000-00-00', 0),
(2, 'fsd', 'Competition', 'Outsourcing', 859, 'Funds', '2015-11-09', '2015-11-22', 'adsada', 20, '', '', '', '', 'checked', 'ada', 0, 7, 'hhahhasdba', '2015-11-10', 0),
(3, 'wer', 'Competition', 'Outsourcing', 649, 'Funds', '2015-11-15', '2015-11-30', 'werw', 5, '', '', '', '', 'checked', 'werwe', 0, 0, '', '2015-11-19', 0),
(4, 'we', 'Competition', 'Outsourcing', 481, 'Funds', '2015-11-19', '2015-11-30', 'wer', 5, '', '', '', '', 'checked', 'wer', 0, 0, '', '2015-11-07', 0),
(5, '2qe', 'Competition', 'Outsourcing', 1377, 'Funds', '2015-11-16', '2015-11-30', 'qwe', 5, '', '', '', '123', 'projchecking', 'qdw', 0, 0, '', '2015-11-07', 0),
(6, '123', 'Competition', 'Outsourcing', 1125, 'Funds', '2015-11-08', '2015-11-08', '2', 2, '', '', '', '123', 'checked', '13', 0, 0, '', '2015-11-11', 0),
(15, '13', 'Competition', 'Outsourcing', 1223, 'Funds', '0000-00-00', '0000-00-00', '', 0, '', '', '', '123', 'checked', 'd', 0, 0, '', '0000-00-00', 0),
(16, '12', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-16', '2015-11-23', 'few', 4, '', '', '', '123', 'checked', 'wweff', 0, 0, '', '2015-11-11', 0),
(17, '231', 'Competition', 'Outsourcing', 1069, 'Funds', '2015-11-08', '2015-11-08', '13', 4, '', '', '', '123', 'projchecked', '123', 0, 0, '', '2015-11-10', 0),
(18, 'd', 'Competition', 'Outsourcing', 1041, 'Funds', '2015-11-08', '2015-11-08', '23', 2, '', '', '', '123', 'checking', 'wd', 0, 0, '12312', '2015-11-13', 0),
(19, 'qe', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '123', 'checked', 'eq', 0, 0, '', '2015-11-04', 0),
(20, 'eee', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-16', '2015-11-17', 'e', 0, '', '', '', '123', 'finish', 'e', 0, 0, '', '2015-11-12', 1),
(21, '231', 'Competition', 'Outsourcing', 1265, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '123', 'finish', 'fe', 0, 0, '', '2015-11-05', 3),
(22, '23', 'Competition', 'Outsourcing', 663, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '123', 'finish', '', 0, 0, '', '2015-11-02', 0),
(23, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '123', 'finish', '', 0, 0, '', '2015-11-18', 0),
(24, '2', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '123', 'finish', '', 0, 0, '', '0000-00-00', 0),
(25, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '0', 'finish', '', 0, 0, '', '2015-10-29', 0),
(26, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '0', 'checking', '', 0, 0, '', '2015-10-29', 2),
(27, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '0', 'checking', '', 0, 0, '', '2015-10-29', 0),
(28, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '0', 'checking', '', 0, 0, '', '2015-10-29', 1),
(29, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '0', 'checking', '', 0, 0, '', '2015-10-29', 0),
(30, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', '0', 'checking', '', 0, 0, '', '2015-10-29', 0),
(31, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', 'project_application', 'checking', '', 0, 0, '', '2015-10-29', 0),
(32, 'e', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-08', '2015-11-08', '', 0, '', '', '', 'project_application', 'checking', '', 0, 0, '', '2015-10-29', 0),
(33, '', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-09', '2015-11-09', '', 0, '', '', '', '123', 'checking', '', 0, 0, '', '0000-00-00', 0),
(34, '', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-09', '2015-11-09', '', 0, '', '', '', '123', 'checking', '', 0, 0, '', '0000-00-00', 0),
(35, '', 'Competition', 'Outsourcing', 0, 'Funds', '2015-11-09', '2015-11-09', '', 0, '', '', '', '123', 'checking', '', 0, 0, '', '0000-00-00', 0),
(36, '333', 'Competition', 'Outsourcing', 1629, 'Funds', '2015-11-15', '2015-11-15', '', 4, '', '', '', '123', 'checking', '', 0, 0, '', '2015-11-17', 0),
(37, '', 'Competition', 'Outsourcing', 0, 'Funds', '0000-00-00', '0000-00-00', '', 0, '', '', '', '123', 'checking', '', 0, 0, '', '0000-00-00', 0),
(38, 'sdfs', 'Competition', 'Outsourcing', 0, 'Funds', '2015-12-02', '2015-12-02', '', 0, '', '', '', '123', 'checking', '', 0, 0, '', '2015-12-15', 0),
(39, '', 'Competition', 'Outsourcing', 0, 'Funds', '2015-12-03', '2015-12-03', '', 0, '', '', '', '123', 'checking', '', 0, 0, '', '2015-11-12', 0),
(40, '', 'Competition', 'Outsourcing', 0, 'Funds', '2015-12-03', '2015-12-03', '', 0, '', '', '', '123', 'checking', '', 0, 0, '', '2015-11-12', 0),
(41, '', 'Competition', 'Outsourcing', 0, 'Funds', '2015-12-03', '2015-12-03', '', 0, '', '', '', '123', 'checking', '', 0, 0, '', '2015-11-12', 0);

-- --------------------------------------------------------

--
-- 表的结构 `schdule`
--

CREATE TABLE IF NOT EXISTS `schdule` (
  `p_id` int(12) NOT NULL,
  `task` text NOT NULL,
  `finish_time` date NOT NULL,
  `state` varchar(32) NOT NULL,
  `u_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `schdule`
--

INSERT INTO `schdule` (`p_id`, `task`, `finish_time`, `state`, `u_id`) VALUES
(1, 'hjashgd', '0000-00-00', '2', 1),
(1, 'kakdfj', '0000-00-00', '0', 2),
(1, 'ada', '0000-00-00', '0', 2),
(1, 'wfef', '0000-00-00', '2', 1),
(1, '', '0000-00-00', '0', 2),
(1, '', '0000-00-00', '0', 2);

-- --------------------------------------------------------

--
-- 表的结构 `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `u_id` int(12) NOT NULL,
  `p_id` int(12) NOT NULL,
  `state` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `signup`
--

INSERT INTO `signup` (`u_id`, `p_id`, `state`) VALUES
(1, 2, 'passed'),
(2, 2, 'unpassed'),
(3, 2, 'passing'),
(1, 2, 'passing'),
(1, 2, 'passing'),
(1, 2, 'passing'),
(1, 2, 'passing'),
(1, 2, 'passing'),
(1, 2, 'passing'),
(1, 2, 'passing'),
(1, 2, 'passing'),
(1, 2, 'passing');

-- --------------------------------------------------------

--
-- 表的结构 `takepart_project`
--

CREATE TABLE IF NOT EXISTS `takepart_project` (
  `u_id` int(12) NOT NULL,
  `p_id` int(12) NOT NULL,
  `user_state` varchar(32) CHARACTER SET latin1 NOT NULL,
  `reason` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `takepart_project`
--

INSERT INTO `takepart_project` (`u_id`, `p_id`, `user_state`, `reason`) VALUES
(1, 2, '???????', ''),
(123, 4, '0', ''),
(123, 4, '', ''),
(123, 1, '', ''),
(123, 4, '', ''),
(123, 11, '', ''),
(123, 12, '0', ''),
(123, 13, '0', '');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(2) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(12) NOT NULL,
  `studentId` varchar(32) NOT NULL,
  `password` int(12) NOT NULL,
  `email` varchar(32) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `birthday` date NOT NULL,
  `grade` varchar(12) NOT NULL,
  `major` varchar(24) NOT NULL,
  `hometown` varchar(32) NOT NULL,
  `lab` varchar(32) NOT NULL,
  `labid` int(20) NOT NULL,
  `identity` varchar(32) NOT NULL,
  `personaId` int(32) NOT NULL,
  `phone_number` varchar(24) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `id` (`u_id`),
  KEY `id_2` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `studentId`, `password`, `email`, `sex`, `birthday`, `grade`, `major`, `hometown`, `lab`, `labid`, `identity`, `personaId`, `phone_number`) VALUES
(1, 'zizi', '201200131093', 123, 'zizi@gmail.com', 'nv', '0000-00-00', '2012', '', '', '', 0, 'administrator', 0, '1836622888'),
(2, 'mary', '201200131199', 1, 'mary@gmail.com', '', '0000-00-00', '', '', '', '', 100, 'company', 0, '18377662908'),
(3, '123', '201200131155', 123, '751211@qq.com', '', '0000-00-00', '', '', '', '', 0, 'student', 0, '18366110009'),
(4, '', '201300130020', 0, '', '', '0000-00-00', '', '', '', '', 0, '', 0, ''),
(5, '', '', 0, '', '', '0000-00-00', '', '', '', '', 100, '', 0, ''),
(6, '', '201300130082', 0, '', '', '0000-00-00', '', '', '', '', 0, '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
