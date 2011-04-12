-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2011 at 07:17 AM
-- Server version: 5.1.52
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dding_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `essay`
--

CREATE TABLE IF NOT EXISTS `essay` (
  `essay_id` int(11) NOT NULL AUTO_INCREMENT,
  `essay_name` varchar(200) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`essay_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `essay_change_history`
--

CREATE TABLE IF NOT EXISTS `essay_change_history` (
  `essay_id` int(11) NOT NULL,
  `version_id` int(11) NOT NULL,
  `submited_essay_name` varchar(200) NOT NULL,
  `submited_essay` mediumblob NOT NULL,
  `scomment` varchar(2000) NOT NULL COMMENT 'student comment',
  `submited_essay_type` varchar(100) NOT NULL COMMENT '"word", "test"',
  `submited_essay_size` int(11) NOT NULL,
  `submit_date` date NOT NULL,
  `edited_essay_name` varchar(200) NOT NULL,
  `edited_essay` mediumblob NOT NULL,
  `edited_essay_type` varchar(100) NOT NULL COMMENT '"word", "test"',
  `edited_essay_size` int(11) NOT NULL,
  `edit_date` date NOT NULL,
  `count_words` int(11) NOT NULL,
  `ecomment` varchar(2000) NOT NULL,
  `uid` int(11) NOT NULL COMMENT 'the ID of essay owner'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `essay_service_types`
--

CREATE TABLE IF NOT EXISTS `essay_service_types` (
  `service_type_id` int(11) NOT NULL,
  `service_type_name` varchar(55) NOT NULL,
  `service_type_description` varchar(255) NOT NULL,
  `service_charge` int(11) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_payment`
--

CREATE TABLE IF NOT EXISTS `service_payment` (
  `transaction_id` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL COMMENT 'paid, failed',
  `total_amount` int(11) NOT NULL,
  `ext_transaction_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_selection`
--

CREATE TABLE IF NOT EXISTS `service_selection` (
  `service_selection_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT 'A student ID referring to the users table',
  `essay_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL COMMENT 'foreign key to the table essay_service_types',
  `discount` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `service_status` varchar(25) NOT NULL COMMENT '"selected", "checkout", "paid","assigned", "completed", "cancelled"',
  `transaction_id` int(11) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `submit_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `editor_id` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `last_update_datetime` datetime NOT NULL,
  PRIMARY KEY (`service_selection_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `skype_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(25) NOT NULL COMMENT '"teacher", "admin","student"',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `create_datetime` datetime NOT NULL,
  `effective_start_datetime` datetime NOT NULL,
  `effective_end_datetime` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `uid` int(11) NOT NULL,
  `subjects` varchar(500) NOT NULL,
  `interests` varchar(1000) NOT NULL,
  `activities` varchar(1000) NOT NULL,
  `experiences` varchar(1000) NOT NULL,
  `plans` varchar(1000) NOT NULL,
  `adversity` varchar(1000) NOT NULL,
  `skills` varchar(1000) NOT NULL,
  `rolemodel` varchar(1000) NOT NULL,
  `environment` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
