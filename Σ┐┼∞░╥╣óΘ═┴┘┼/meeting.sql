-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `meeting`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `booking_tb`
-- 

CREATE TABLE `booking_tb` (
  `id` int(5) NOT NULL auto_increment,
  `subject` varchar(200) NOT NULL,
  `header` varchar(200) NOT NULL,
  `nummeeting` varchar(10) NOT NULL,
  `room_id` varchar(5) NOT NULL,
  `booking_date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `checktool` text,
  `checkfood` text,
  `department` varchar(200) NOT NULL,
  `person_meeting` text NOT NULL,
  `remark` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `datetime_send` varchar(50) NOT NULL,
  `booking_status` varchar(50) NOT NULL,
  `txt_tmp1` text,
  `txt_tmp2` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `booking_tb`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `list_tb`
-- 

CREATE TABLE `list_tb` (
  `id` int(5) NOT NULL auto_increment,
  `list_type` varchar(200) NOT NULL,
  `list_name` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- dump ตาราง `list_tb`
-- 

INSERT INTO `list_tb` VALUES (1, 'เตรียมอาหาร', 'อาหารว่างเช้า');
INSERT INTO `list_tb` VALUES (2, 'เตรียมอาหาร', 'อาหารว่างกลางวัน');
INSERT INTO `list_tb` VALUES (3, 'เตรียมอาหาร', 'อาหารว่างบ่าย');
INSERT INTO `list_tb` VALUES (4, 'อุปกรณ์ที่ใช้', 'เครื่องฉายโปรเจคเตอร์');
INSERT INTO `list_tb` VALUES (5, 'อุปกรณ์ที่ใช้', 'คอมพิวเตอร์โน๊ตบุ๊ค');
INSERT INTO `list_tb` VALUES (6, 'อุปกรณ์ที่ใช้', 'Pointer');
INSERT INTO `list_tb` VALUES (7, 'อุปกรณ์ที่ใช้', 'White Board');
INSERT INTO `list_tb` VALUES (8, 'อุปกรณ์ที่ใช้', 'กล้องถ่ายภาพ');
INSERT INTO `list_tb` VALUES (9, 'อุปกรณ์ที่ใช้', 'Compony profile');
INSERT INTO `list_tb` VALUES (10, 'เตรียมอาหาร', 'อาหารเย็น');
INSERT INTO `list_tb` VALUES (11, 'อุปกรณ์ที่ใช้', 'อุปกรณ์ PPE');
INSERT INTO `list_tb` VALUES (12, 'อุปกรณ์ที่ใช้', 'Compony brochure');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `room_tb`
-- 

CREATE TABLE `room_tb` (
  `id` int(5) NOT NULL auto_increment,
  `room_name` varchar(200) NOT NULL,
  `room_pic` varchar(100) NOT NULL,
  `room_address` varchar(500) NOT NULL,
  `total_seat` varchar(10) NOT NULL,
  `response_name` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `room_tb`
-- 

INSERT INTO `room_tb` VALUES (1, 'ห้องประชุมใหญ่', 'nofile.jpg', 'ห้อง 344 ชั้น 3 ตึก 4 \r\nบริษัท AAA จำกัด (มหาชน)', '200', 'กรอกชื่อ-นามสกุล', 'ฝ่ายอาคารและสถานที่', '021234567', '-');
INSERT INTO `room_tb` VALUES (2, 'ห้องประชุมเล็ก', 'nofile.jpg', 'ห้อง 234 ชั้น 2 ตึก 3 \r\nบริษัท AAA จำกัด (มหาชน)', '50', 'กรอกชื่อ-นามสกุล', 'ฝ่ายอาคารและสถานที่', '021234567', '-');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `user_tb`
-- 

CREATE TABLE `user_tb` (
  `id` int(5) NOT NULL auto_increment,
  `role` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `user_status` varchar(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `user_tb`
-- 

INSERT INTO `user_tb` VALUES (1, 'ผู้ดูแลระบบ', 'admin', 'admin', 'กรอกชื่อ-นามสกุล', 'กรอกตำแหน่ง', 'กรอกสังกัด', 'กรอกอีเมล์', 'กรอกเบอร์โทรศัพท์', 'Y');
INSERT INTO `user_tb` VALUES (2, 'ผู้ใช้งานทั่วไป', 'user', 'user', 'กรอกชื่อ-นามสกุล', 'กรอกตำแหน่ง', 'กรอกสังกัด', 'กรอกอีเมล์', 'กรอกเบอร์โทรศัพท์', 'Y');
