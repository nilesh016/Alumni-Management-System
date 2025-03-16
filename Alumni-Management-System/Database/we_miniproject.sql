-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: CURRENT_TIMESTAMP
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `we_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmember`
--

CREATE TABLE `adminmember` (
  `ad_id` VARCHAR(5) NOT NULL PRIMARY KEY,
  `ad_password` VARCHAR(50) CHARACTER SET latin1 NOT NULL,
  `ad_fullname` VARCHAR(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `alumniinfo`
--

CREATE TABLE `alumniinfo` (
  `pi_register` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `pi_name` VARCHAR(100) NOT NULL,
  `pi_gender` VARCHAR(20) NOT NULL,
  `pi_email` VARCHAR(100) NOT NULL UNIQUE,
  `pi_mobile` VARCHAR(15) NOT NULL UNIQUE,
  `pi_session` VARCHAR(50) NOT NULL,
  `pi_branch` VARCHAR(50) NOT NULL,
  `pi_course` ENUM('B.Tech', 'M.Tech', 'Integrated M.Tech') NOT NULL DEFAULT 'B.Tech', 
  `pi_company` VARCHAR(100),
  `pi_address` TEXT,
  `pi_picture` LONGBLOB NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `alumnimember`
--

CREATE TABLE `alumnimember` (
  `pi_register` INT(11) NOT NULL PRIMARY KEY,
  `al_password` VARCHAR(255) NOT NULL,
  `al_status` ENUM('Pending', 'Approved', 'Rejected') NOT NULL DEFAULT 'Pending',
  FOREIGN KEY (`pi_register`) REFERENCES `alumniinfo`(`pi_register`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ann_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `ann_name` VARCHAR(100) NOT NULL,
  `ann_desc` TEXT NOT NULL,
  `ann_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `e_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `e_name` VARCHAR(100) NOT NULL,
  `e_date` DATE NOT NULL,
  `e_time` TIME NOT NULL,
  `e_desc` LONGTEXT NOT NULL,
  `e_venue` VARCHAR(50) NOT NULL,
  `e_pic` VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `financialdata`
--

CREATE TABLE `financialdata` (
  `payment_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `total_payment` DOUBLE(10,2) NOT NULL,
  `payment_purpose` VARCHAR(50) NOT NULL,
  `pi_register` INT(11) NOT NULL,
  `payment_date` DATE NOT NULL,
  FOREIGN KEY (`pi_register`) REFERENCES `alumnimember`(`pi_register`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `forumdata`
--

CREATE TABLE `forumdata` (
  `eforum_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `eforum_title` VARCHAR(250) NOT NULL,
  `eforum_author` VARCHAR(50) DEFAULT NULL,
  `eforum_content` TEXT DEFAULT NULL,
  `eforum_tags` VARCHAR(50) DEFAULT NULL,
  `eforum_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `forum_reply`
--

CREATE TABLE `forum_reply` (
  `forum_reply_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `forum_topic` VARCHAR(50) NOT NULL,
  `forum_message` TEXT NOT NULL,
  `forum_reply_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `forum_reply_name` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS=1;
COMMIT;
