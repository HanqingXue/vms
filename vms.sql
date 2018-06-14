-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-09-05 09:05:55
-- 服务器版本： 10.1.11-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- 表的结构 `vms_devices`
--

CREATE TABLE `vms_devices` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(16) NOT NULL,
  `device_number` varchar(32) NOT NULL,
  `device_phone_num` varchar(32) NOT NULL,
  `device_phone_category_id` int(32) NOT NULL,
  `device_message_category` varchar(32) NOT NULL,
  `device_install_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_devices`
--

INSERT INTO `vms_devices` (`device_id`, `device_name`, `device_number`, `device_phone_num`, `device_phone_category_id`, `device_message_category`, `device_install_time`) VALUES
(33, '设备88888887', '88888887', '18245046296', 0, '1', '2016-07-12'),
(34, '设备14141414', '14141414', '13113131313', 0, '1', '2016-07-14');

-- --------------------------------------------------------

--
-- 表的结构 `vms_device_phone`
--

CREATE TABLE `vms_device_phone` (
  `device_phone_category_id` int(11) NOT NULL,
  `device_phone_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_device_phone`
--

INSERT INTO `vms_device_phone` (`device_phone_category_id`, `device_phone_name`) VALUES
(0, '移动'),
(1, '联通'),
(2, '电信');

-- --------------------------------------------------------

--
-- 表的结构 `vms_materials`
--

CREATE TABLE `vms_materials` (
  `material_id` bigint(20) NOT NULL,
  `material_name` varchar(64) NOT NULL,
  `material_total_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_materials`
--

INSERT INTO `vms_materials` (`material_id`, `material_name`, `material_total_amount`) VALUES
(1, '物资 #1', 100),
(2, '物资 #2', 500),
(3, '物资 #3', 200),
(4, '物资 #4', 10);

-- --------------------------------------------------------

--
-- 表的结构 `vms_material_allocation`
--

CREATE TABLE `vms_material_allocation` (
  `material_id` bigint(20) NOT NULL,
  `vehicle_id` bigint(20) NOT NULL,
  `material_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_material_allocation`
--

INSERT INTO `vms_material_allocation` (`material_id`, `vehicle_id`, `material_amount`) VALUES
(1, 1, 0),
(1, 2, 30),
(1, 4, 30),
(2, 2, 50),
(2, 3, 50),
(3, 1, 50);

-- --------------------------------------------------------

--
-- 表的结构 `vms_message_send`
--

CREATE TABLE `vms_message_send` (
  `device_message_category` int(11) NOT NULL,
  `message_send_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_message_send`
--

INSERT INTO `vms_message_send` (`device_message_category`, `message_send_name`) VALUES
(0, '短信'),
(1, '联网');

-- --------------------------------------------------------

--
-- 表的结构 `vms_options`
--

CREATE TABLE `vms_options` (
  `option_id` int(4) NOT NULL,
  `option_key` varchar(64) NOT NULL,
  `option_name` varchar(32) NOT NULL,
  `option_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_options`
--

INSERT INTO `vms_options` (`option_id`, `option_key`, `option_name`, `option_value`) VALUES
(1, 'speed-lower-bound', '车速 下限', '0'),
(2, 'speed-upper-bound', '车速 上限', '80'),
(3, 'engine-speed-lower-bound', '发送机转速 下限', '0'),
(4, 'engine-speed-upper-bound', '发送机转速 上限', '1800'),
(5, 'mileage-lower-bound', '里程 下限', '0'),
(6, 'mileage-upper-bound', '里程 上限', '2000'),
(7, 'fuel-quantity-lower-bound', '燃油油量 下限', '0'),
(8, 'fuel-quantity-upper-bound', '燃油油量 上限', '100'),
(9, 'steering-oil-volumn-lower-bound', '转向油量 下限', '110'),
(10, 'steering-oil-volumn-upper-bound', '转向油量 上限', '1000'),
(11, 'steering-oil-temperature-lower-bound', '转向油温 下限', '0'),
(12, 'steering-oil-temperature-upper-bound', '转向油温 上限', '100'),
(13, 'left-brake-pressure-lower-bound', '左制动器气压 下限', '0'),
(14, 'left-brake-pressure-upper-bound', '左制动器气压 上限', '100'),
(15, 'right-brake-pressure-lower-bound', '右制动器气压 下限', '0'),
(16, 'right-brake-pressure-upper-bound', '右制动器气压 上限', '100'),
(17, 'left-brake-hydraulic-lower-bound', '左制动器液压 下限', '0'),
(18, 'left-brake-hydraulic-upper-bound', '左制动器液压 上限', '100'),
(19, 'right-brake-hydraulic-lower-bound', '右制动器液压 下限', '0'),
(20, 'right-brake-hydraulic-upper-bound', '右制动器液压 上限', '100'),
(21, 'actuator-temperature-lower-bound', '分动器温度 下限', '0'),
(22, 'actuator-temperature-upper-bound', '分动器温度 上限', '100'),
(23, 'gearbox-radiator-temperature-lower-bound', '变速散热器温度 下限', '0'),
(24, 'gearbox-radiator-temperature-upper-bound', '变速散热器温度 上限', '100'),
(25, '1-bridge-brake-pedal-temperature-lower-bound', '1桥制动踏片温度 下限', '0'),
(26, '1-bridge-brake-pedal-temperature-upper-bound', '1桥制动踏片温度 上限', '1000'),
(27, '1-bridge-temperature-lower-bound', '1桥温度 下限', '0'),
(28, '1-bridge-temperature-upper-bound', '1桥温度 上限', '99.9'),
(29, '2-bridge-brake-pedal-temperature-lower-bound', '2桥制动踏片温度 下限', '0'),
(30, '2-bridge-brake-pedal-temperature-upper-bound', '2桥制动踏片温度 上限', '100'),
(31, '2-bridge-temperature-lower-bound', '2桥温度 下限', '0'),
(32, '2-bridge-temperature-upper-bound', '2桥温度 上限', '100'),
(33, 'AB-line-voltage-lower-bound', 'AB线电压 下限', '220'),
(34, 'AB-line-voltage-upper-bound', 'AB线电压 上限', '380'),
(35, 'BC-line-voltage-lower-bound', 'BC线电压 下限', '220'),
(36, 'BC-line-voltage-upper-bound', 'BC线电压 上限', '380'),
(37, 'AC-line-voltage-lower-bound', 'AC线电压 下限', '220'),
(38, 'AC-line-voltage-upper-bound', 'AC线电压 上限', '380'),
(39, 'A-phase-voltage-lower-bound', 'A相电压 下限', '230'),
(40, 'A-phase-voltage-upper-bound', 'A相电压 上限', '380'),
(41, 'B-phase-voltage-lower-bound', 'B相电压 下限', '230'),
(42, 'B-phase-voltage-upper-bound', 'B相电压 上限', '380'),
(43, 'C-phase-voltage-lower-bound', 'C相电压 下限', '230'),
(44, 'C-phase-voltage-upper-bound', 'C相电压 上限', '380'),
(45, 'A-phase-current-lower-bound', 'A相电流 下限', '0'),
(46, 'A-phase-current-upper-bound', 'A相电流 上限', '10'),
(47, 'B-phase-current-lower-bound', 'B相电流 下限', '0'),
(48, 'B-phase-current-upper-bound', 'B相电流 上限', '10'),
(49, 'C-phase-current-lower-bound', 'C相电流 下限', '0'),
(50, 'C-phase-current-upper-bound', 'C相电流 上限', '10'),
(51, 'frequency-lower-bound', '频率 下限', '0'),
(52, 'frequency-upper-bound', '频率 上限', '1000'),
(53, 'battery-temperature-lower-bound', '蓄电池温度 下限', '0'),
(54, 'battery-temperature-upper-bound', '蓄电池温度 上限', '100'),
(55, 'battery-voltage-lower-bound', '蓄电池电压 下限', '230'),
(56, 'battery-voltage-upper-bound', '蓄电池电压 上限', '380'),
(57, 'battery-current-lower-bound', '蓄电池组电流 下限', '0'),
(58, 'battery-current-upper-bound', '蓄电池组电流 上限', '10'),
(59, 'engine-oil-temperature-lower-bound', '机组油温 下限', '0'),
(60, 'engine-oil-temperature-upper-bound', '机组油温 上限', '100'),
(61, 'engine-oil-pressure-lower-bound', '机组油压 下限', '0'),
(62, 'engine-oil-pressure-upper-bound', '机组油压 上限', '100'),
(63, 'engine-water-temperature-lower-bound', '机组水温 下限', '0'),
(64, 'engine-water-temperature-upper-bound', '机组水温 上限', '100');

-- --------------------------------------------------------

--
-- 表的结构 `vms_vehicles`
--

CREATE TABLE `vms_vehicles` (
  `vehicle_id` bigint(20) NOT NULL,
  `vehicle_name` varchar(64) NOT NULL,
  `vehicle_drive_mode_id` int(4) NOT NULL,
  `vehicle_passengers` int(4) NOT NULL,
  `vehicle_mass` int(8) NOT NULL,
  `vehicle_load_mass` int(8) NOT NULL,
  `vehicle_max_mass` int(8) NOT NULL,
  `vehicle_max_load_mass` int(8) NOT NULL,
  `vehicle_outline_long` int(8) NOT NULL,
  `vehicle_outline_width` int(8) NOT NULL,
  `vehicle_outline_height` int(8) NOT NULL,
  `vehicle_max_speed` int(8) NOT NULL,
  `vehicle_wheelbase` int(8) NOT NULL,
  `vehicle_track` int(8) NOT NULL,
  `vehicle_front_overhang` int(8) NOT NULL,
  `vehicle_rear_overhang` int(8) NOT NULL,
  `vehicle_min_ground_clearance` int(8) NOT NULL,
  `vehicle_max_climbing_degree` int(8) NOT NULL,
  `vehicle_max_side_inclination_angle` int(8) NOT NULL,
  `vehicle_category_id` int(11) NOT NULL,
  `vehicle_displacement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_vehicles`
--

INSERT INTO `vms_vehicles` (`vehicle_id`, `vehicle_name`, `vehicle_drive_mode_id`, `vehicle_passengers`, `vehicle_mass`, `vehicle_load_mass`, `vehicle_max_mass`, `vehicle_max_load_mass`, `vehicle_outline_long`, `vehicle_outline_width`, `vehicle_outline_height`, `vehicle_max_speed`, `vehicle_wheelbase`, `vehicle_track`, `vehicle_front_overhang`, `vehicle_rear_overhang`, `vehicle_min_ground_clearance`, `vehicle_max_climbing_degree`, `vehicle_max_side_inclination_angle`, `vehicle_category_id`, `vehicle_displacement`) VALUES
(3, '黑A00002', 1, 5, 10000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2.0a'),
(15, '黑B00001', 2, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '3.0'),
(18, '黑A66666', 1, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2.2');

-- --------------------------------------------------------

--
-- 表的结构 `vms_vehicle_catrgories`
--

CREATE TABLE `vms_vehicle_catrgories` (
  `vehicle_category_id` int(11) NOT NULL,
  `vehicle_catrgories_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_vehicle_catrgories`
--

INSERT INTO `vms_vehicle_catrgories` (`vehicle_category_id`, `vehicle_catrgories_name`) VALUES
(0, '管理用车'),
(1, '生产用车'),
(2, '后勤用车');

-- --------------------------------------------------------

--
-- 表的结构 `vms_vehicle_drive_modes`
--

CREATE TABLE `vms_vehicle_drive_modes` (
  `vehicle_drive_mode_id` int(4) NOT NULL,
  `vehicle_drive_mode_slug` varchar(32) NOT NULL,
  `vehicle_drive_mode_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vms_vehicle_drive_modes`
--

INSERT INTO `vms_vehicle_drive_modes` (`vehicle_drive_mode_id`, `vehicle_drive_mode_slug`, `vehicle_drive_mode_name`) VALUES
(1, 'two-wheel-drive', '两轮驱动'),
(2, 'four-wheel-drive', '四轮驱动');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vms_devices`
--
ALTER TABLE `vms_devices`
  ADD PRIMARY KEY (`device_id`),
  ADD UNIQUE KEY `device_name` (`device_name`),
  ADD UNIQUE KEY `device_number` (`device_number`),
  ADD KEY `device_phone_category_id` (`device_phone_category_id`),
  ADD KEY `device_message_category` (`device_message_category`);

--
-- Indexes for table `vms_device_phone`
--
ALTER TABLE `vms_device_phone`
  ADD PRIMARY KEY (`device_phone_category_id`);

--
-- Indexes for table `vms_materials`
--
ALTER TABLE `vms_materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `vms_material_allocation`
--
ALTER TABLE `vms_material_allocation`
  ADD PRIMARY KEY (`material_id`,`vehicle_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `vms_message_send`
--
ALTER TABLE `vms_message_send`
  ADD PRIMARY KEY (`device_message_category`),
  ADD KEY `device_message_category` (`device_message_category`);

--
-- Indexes for table `vms_options`
--
ALTER TABLE `vms_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `vms_vehicles`
--
ALTER TABLE `vms_vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicle_drive_mode_id` (`vehicle_drive_mode_id`),
  ADD KEY `vehicle_category_id` (`vehicle_category_id`);

--
-- Indexes for table `vms_vehicle_catrgories`
--
ALTER TABLE `vms_vehicle_catrgories`
  ADD PRIMARY KEY (`vehicle_category_id`),
  ADD KEY `vms_vehicle_catrgories_id` (`vehicle_category_id`);

--
-- Indexes for table `vms_vehicle_drive_modes`
--
ALTER TABLE `vms_vehicle_drive_modes`
  ADD PRIMARY KEY (`vehicle_drive_mode_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `vms_devices`
--
ALTER TABLE `vms_devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `vms_materials`
--
ALTER TABLE `vms_materials`
  MODIFY `material_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `vms_message_send`
--
ALTER TABLE `vms_message_send`
  MODIFY `device_message_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `vms_options`
--
ALTER TABLE `vms_options`
  MODIFY `option_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- 使用表AUTO_INCREMENT `vms_vehicles`
--
ALTER TABLE `vms_vehicles`
  MODIFY `vehicle_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用表AUTO_INCREMENT `vms_vehicle_drive_modes`
--
ALTER TABLE `vms_vehicle_drive_modes`
  MODIFY `vehicle_drive_mode_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 限制导出的表
--

--
-- 限制表 `vms_material_allocation`
--
ALTER TABLE `vms_material_allocation`
  ADD CONSTRAINT `vms_material_allocation_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `vms_materials` (`material_id`),
  ADD CONSTRAINT `vms_material_allocation_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vms_vehicles` (`vehicle_id`);

--
-- 限制表 `vms_vehicles`
--
ALTER TABLE `vms_vehicles`
  ADD CONSTRAINT `vms_vehicles_ibfk_1` FOREIGN KEY (`vehicle_drive_mode_id`) REFERENCES `vms_vehicle_drive_modes` (`vehicle_drive_mode_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
