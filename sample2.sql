-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2015 at 10:19 AM
-- Server version: 5.6.10
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getall`()
    NO SQL
select * from users$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUser`()
    NO SQL
begin
	select * from users;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Quần Áo', '2015-05-25', '2015-05-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf32_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'bài viết', 'nội dung ', '2015-05-25 00:00:00', '2015-05-25 00:00:00'),
(2, 2, 'lẵng thầm', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, ex, ipsum! Veritatis obcaecati suscipit, non facilis, tenetur ratione, saepe facere tempore quaerat molestiae magni rem omnis, ducimus ab aperiam consectetur.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, ex, ipsum! Veritatis obcaecati suscipit, non facilis, tenetur ratione, saepe facere tempore quaerat molestiae magni rem omnis, ducimus ab aperiam consectetur.', '2015-05-25 00:00:00', '2015-05-25 00:00:00'),
(3, 3, 'Mùa xuân', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, ex, ipsum! Veritatis obcaecati suscipit, non facilis, tenetur ratione, saepe facere tempore quaerat molestiae magni rem omnis, ducimus ab aperiam consectetur.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, ex, ipsum! Veritatis obcaecati suscipit, non facilis, tenetur ratione, saepe facere tempore quaerat molestiae magni rem omnis, ducimus ab aperiam consectetur.', '2015-05-25 00:00:00', '2015-05-25 00:00:00'),
(4, 1, 'Cách đồng  việt', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum cumque nulla dolore, alias ducimus? At placeat laborum tempora magni vel eum, mollitia hic dignissimos non omnis? Odit id, quaerat repellat.', '2015-05-25 00:00:00', '2015-05-25 00:00:00'),
(5, 2, 'Bác nông dân chân thật', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum cumque nulla dolore, alias ducimus? At placeat laborum tempora magni vel eum, mollitia hic dignissimos non omnis? Odit id, quaerat repellat.', '2015-05-25 00:00:00', '2015-05-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Tran Quoc Viet', '123', '2015-05-25 00:00:00', '2015-05-25 00:00:00'),
(2, 'Văn Chí Dũng', '456', '2015-05-25 00:00:00', '2015-05-25 00:00:00'),
(3, 'Đoàn Dự', '789', '2015-05-25 00:00:00', '2015-05-25 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
