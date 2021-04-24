-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 12:12 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tojarcomdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `b_code` int(5) NOT NULL,
  `b_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `b_active` char(1) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buttons`
--

INSERT INTO `buttons` (`b_code`, `b_name`, `b_active`) VALUES
(1, 'حفظ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `m_code` bigint(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`m_code`, `m_name`, `m_active`) VALUES
(1, 'الصلاحيات', '1');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `P_code` bigint(11) NOT NULL,
  `P_title_ar` varchar(120) NOT NULL,
  `P_title_en` varchar(150) NOT NULL,
  `P_desc_ar` varchar(500) NOT NULL,
  `P_desc_en` varchar(150) NOT NULL,
  `P_photo` varchar(255) NOT NULL,
  `P_is_slider` char(1) NOT NULL,
  `P_active` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `s_code` bigint(11) NOT NULL,
  `s_menu_code` bigint(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_url` varchar(255) NOT NULL,
  `s_symbol` varchar(255) NOT NULL,
  `s_is_backend` char(1) NOT NULL,
  `s_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`s_code`, `s_menu_code`, `s_name`, `s_url`, `s_symbol`, `s_is_backend`, `s_active`) VALUES
(1, 1, 'صلاحيات المستخدمين', 'permissions', 'perm', '1', '0'),
(2, 1, 'اضافة زر', 'permissions/addEdit_button', 'btnadd', '1', '1'),
(3, 1, 'اضافة قائمة', 'permissions/addEdit_menu', 'menuadd', '1', '1'),
(4, 1, 'اضافة شاشة', 'permissions/addEdit_screen', 'scradd', '1', '1'),
(5, 1, 'اضافة زر الى شاشة', 'permissions/addbutton_screen', 'btn_to_scr', '1', '0'),
(6, 1, 'اضافة مستخدم او مدير', 'permissions/addEdit_users', 'usersadd', '1', '1'),
(7, 1, 'الحساب الشخصي ', 'Myaccount', 'accs', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `scr_has_btn`
--

CREATE TABLE `scr_has_btn` (
  `scrbtn_code` bigint(11) NOT NULL,
  `scrbtn_scr_code` bigint(11) NOT NULL,
  `scrbtn_btn_code` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `st_code` int(11) NOT NULL,
  `property` varchar(255) NOT NULL,
  `value` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`st_code`, `property`, `value`) VALUES
(1, 'is_with_permission', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_photos`
--

CREATE TABLE `subject_photos` (
  `S_code` bigint(11) NOT NULL,
  `Rcu_id` bigint(11) NOT NULL,
  `Photo_id` bigint(11) NOT NULL,
  `prefix_type` varchar(15) NOT NULL,
  `is_main` char(1) NOT NULL DEFAULT '0',
  `S_active` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_code` int(11) NOT NULL,
  `u_ID` int(9) NOT NULL,
  `u_fname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `u_sex` char(10) NOT NULL,
  `u_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `u_username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `u_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `u_type` char(1) CHARACTER SET utf8 NOT NULL,
  `u_birthday` varchar(30) NOT NULL,
  `u_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `u_scr_priv` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'all',
  `u_btn_priv` varchar(255) CHARACTER SET utf8 DEFAULT 'all',
  `u_active` char(1) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_code`, `u_ID`, `u_fname`, `u_sex`, `u_email`, `u_username`, `u_password`, `u_type`, `u_birthday`, `u_address`, `u_scr_priv`, `u_btn_priv`, `u_active`) VALUES
(1, 0, 'Muhammed ismail', 'Male', 'Super@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1984-08-16', 'Gaza2015', 'all', 'all', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`b_code`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`m_code`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`P_code`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`s_code`);

--
-- Indexes for table `scr_has_btn`
--
ALTER TABLE `scr_has_btn`
  ADD PRIMARY KEY (`scrbtn_code`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`st_code`);

--
-- Indexes for table `subject_photos`
--
ALTER TABLE `subject_photos`
  ADD PRIMARY KEY (`S_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `b_code` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `m_code` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `P_code` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `s_code` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `scr_has_btn`
--
ALTER TABLE `scr_has_btn`
  MODIFY `scrbtn_code` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_photos`
--
ALTER TABLE `subject_photos`
  MODIFY `S_code` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
