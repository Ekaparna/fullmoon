-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2016 at 02:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `acquaintances`
--

CREATE TABLE IF NOT EXISTS `acquaintances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `acquaintances`
--

INSERT INTO `acquaintances` (`id`, `user_one`, `user_two`) VALUES
(1, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `acquaintances_request`
--

CREATE TABLE IF NOT EXISTS `acquaintances_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `acquaintances_request`
--

INSERT INTO `acquaintances_request` (`id`, `from`, `to`) VALUES
(37, 15, 3),
(56, 1, 15),
(58, 1, 6),
(59, 1, 7),
(60, 1, 13),
(61, 17, 6);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE IF NOT EXISTS `catagories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(32) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_post`
--

CREATE TABLE IF NOT EXISTS `comment_post` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `post_comment_id` int(11) NOT NULL,
  `reply` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL,
  `on_id` int(10) NOT NULL,
  `upvote` int(11) NOT NULL DEFAULT '0',
  `commentator_id` int(10) NOT NULL,
  `downvote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `on_id` (`on_id`,`commentator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `downvote`
--

CREATE TABLE IF NOT EXISTS `downvote` (
  `upvote_id` int(10) NOT NULL AUTO_INCREMENT,
  `who_id` int(11) NOT NULL,
  `whom_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`upvote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `endorsment`
--

CREATE TABLE IF NOT EXISTS `endorsment` (
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `endorser_id` int(11) NOT NULL,
  `endorsed_date` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `endorsment_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`endorsment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who_id` int(11) NOT NULL,
  `whom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `who_id`, `whom_id`) VALUES
(1, 7, 1),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_one`, `user_two`) VALUES
(9, 5, 6),
(20, 7, 6),
(23, 9, 1),
(25, 8, 1),
(28, 5, 1),
(29, 11, 1),
(30, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE IF NOT EXISTS `friend_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `from`, `to`) VALUES
(37, 7, 3),
(41, 4, 3),
(46, 8, 3),
(48, 9, 3),
(52, 4, 8),
(53, 4, 5),
(54, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `last_comment_id`
--

CREATE TABLE IF NOT EXISTS `last_comment_id` (
  `post_id` int(11) NOT NULL,
  `last_comment_id` int(11) NOT NULL,
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `last_post_id`
--

CREATE TABLE IF NOT EXISTS `last_post_id` (
  `user_id` int(10) NOT NULL,
  `last_post_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `last_post_id`
--

INSERT INTO `last_post_id` (`user_id`, `last_post_id`) VALUES
(1, 8),
(2, 0),
(3, 0),
(4, 0),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `last_reply_id`
--

CREATE TABLE IF NOT EXISTS `last_reply_id` (
  `comment_id` int(11) NOT NULL,
  `last_reply_id` int(11) NOT NULL,
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` varchar(10283) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mysqlitest`
--

CREATE TABLE IF NOT EXISTS `mysqlitest` (
  `id` int(3) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mysqlitestoop`
--

CREATE TABLE IF NOT EXISTS `mysqlitestoop` (
  `id` int(3) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mysqltest`
--

CREATE TABLE IF NOT EXISTS `mysqltest` (
  `id` int(3) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_post_id` int(10) NOT NULL,
  `post_time` timestamp NOT NULL,
  `post_keywords` text NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_date` text NOT NULL,
  `post_comment` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_post_id`, `post_time`, `post_keywords`, `post_image`, `post_content`, `user_id`, `post_date`, `post_comment`) VALUES
(1, 1, '0000-00-00 00:00:00', '', '', 'Hey ', 1, '', 0),
(2, 1, '0000-00-00 00:00:00', '', '', 'hello dear', 6, '', 0),
(3, 2, '0000-00-00 00:00:00', '', '', 'Hello world! I am here.', 1, '', 0),
(4, 3, '0000-00-00 00:00:00', '', '', 'deepak ; delete *from post ; //', 1, '', 0),
(5, 4, '0000-00-00 00:00:00', '', '', 'hey world!', 1, '', 0),
(6, 5, '0000-00-00 00:00:00', '', '', 'Yo! testing again', 1, '', 0),
(7, 6, '0000-00-00 00:00:00', '', '', 'testing 2', 1, '', 0),
(8, 7, '0000-00-00 00:00:00', '', '', 'Testing 3', 1, '', 0),
(9, 2, '0000-00-00 00:00:00', '', '', 'yo man', 6, '', 0),
(10, 3, '0000-00-00 00:00:00', '', '', 'I am here Rajiv ', 6, '', 0),
(11, 8, '0000-00-00 00:00:00', '', '', 'testing 4', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_time` timestamp NOT NULL,
  `post_author` varchar(50) NOT NULL,
  `post_keywords` text NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `category_id` int(10) NOT NULL,
  `post_date` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reply_comment`
--

CREATE TABLE IF NOT EXISTS `reply_comment` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_reply_id` int(11) NOT NULL,
  `comment_reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `endorsements` int(11) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skill_table`
--

CREATE TABLE IF NOT EXISTS `skill_table` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(100) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upvote`
--

CREATE TABLE IF NOT EXISTS `upvote` (
  `upvote_id` int(10) NOT NULL AUTO_INCREMENT,
  `who_id` int(11) NOT NULL,
  `whom_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`upvote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `enrollment_id` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `allow_email` int(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `state` int(11) NOT NULL DEFAULT '0',
  `password_recover` int(11) NOT NULL DEFAULT '0',
  `password_recover_text` varchar(20) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '0',
  `profile` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `enrollment_id`, `username`, `password`, `first_name`, `last_name`, `gender`, `age`, `email`, `email_code`, `allow_email`, `active`, `state`, `password_recover`, `password_recover_text`, `type`, `profile`) VALUES
(1, '04316401514', 'RAJIV', '7c6a180b36896a0a8c02787eeafb0e4c', 'Rajiv', 'Jha', '', 0, 'rajiv@techspace.club', '', 1, 1, 1, 0, '0', 1, 'images/profile/0275de7bff.jpg'),
(2, '45016401514', 'rajivjha', '7c6a180b36896a0a8c02787eeafb0e4c', 'rajiv', 'jha', '', 0, 'rajivjha2896@gmail.com', '', 0, 0, 0, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(3, '45116401514', 'rj_reloaded', '7c6a180b36896a0a8c02787eeafb0e4c', 'rajiv', 'jha', '', 0, 'meetrajivjha@yahoo.com', '', 0, 0, 0, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(4, '45216401514', 'rjrajivjha', '7c6a180b36896a0a8c02787eeafb0e4c', 'rj', 'jha', '', 0, 'rajivjha@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/18cf07e259.jpg'),
(5, '45316401514', 'rajivbharatjha', '7c6a180b36896a0a8c02787eeafb0e4c', 'Rajiv Bharat', 'Jha', '', 0, 'rajivbharatjha@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(6, '45416401514', 'alex', '5f4dcc3b5aa765d61d8327deb882cf99', 'alex', 'garnett', '', 0, 'alex@phpacademy.org', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(7, '45516401514', 'alex2', '7c6a180b36896a0a8c02787eeafb0e4c', 'alex', 'garnett', '', 0, 'alex2@phpacademy.org', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(8, '45616401514', 'alex3', '7c6a180b36896a0a8c02787eeafb0e4c', 'alex', 'garnett', '', 0, 'alex3@phpacademy.org', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(9, '45716401514', 'alex4', '7c6a180b36896a0a8c02787eeafb0e4c', 'alex', 'garnett', '', 0, 'alex4@phpacademy.org', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(10, '45816401514', 'alex5', '7c6a180b36896a0a8c02787eeafb0e4c', 'alex', 'garnett', '', 0, 'alex5@phpacademy.org', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(11, '45916401514', 'rajiv2', '7c6a180b36896a0a8c02787eeafb0e4c', 'rajivjha', 'jha', '', 0, 'rajivjha19962@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(12, '46016401514', 'rajiv3', '7c6a180b36896a0a8c02787eeafb0e4c', 'rajiv', 'jha', '', 0, 'rajivjha19963@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(13, '46116401514', 'pratibha', '7c6a180b36896a0a8c02787eeafb0e4c', 'pratibha', 'jha', '', 0, 'pratibhajha697@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultfemale.jpg'),
(14, '46216401514', 'pratibhajha', 'dfb57b2e5f36c1f893dbc12dd66897d4', 'pratibha', 'jha', '', 0, 'pratibhajha698@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/1f4e4c621f.jpg'),
(15, '46316401514', 'testuser1', '5f4dcc3b5aa765d61d8327deb882cf99', 'test', 'user', 'male', 18, 'testuser1@gmail.com', '', 0, 1, 0, 0, '0', 0, 'images/profile/734a072dc0.jpg'),
(16, '46416401514', 'testuser2', '5f4dcc3b5aa765d61d8327deb882cf99', 'test', 'user', 'female', 18, 'testuser2@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultfemale.jpg'),
(17, '', 'shubhamdj', 'af1da57369484e759ac6ef3e8940db29', 'shubham', 'kumar', 'male', 18, 'shubhamkmr698@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/defaultmale.jpg'),
(18, '02716401514', 'asas', 'e219b56989281a7846dd836161d7a2bd', 'asas', 'asas', 'male', 18, 'aa@gmail.com', '', 1, 1, 1, 0, '0', 0, 'images/profile/fdb37759fb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_table`
--

CREATE TABLE IF NOT EXISTS `user_type_table` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
