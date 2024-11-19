-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 07:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_parts`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billingid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL,
  `purchasedate` date NOT NULL,
  `deliverystatus` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billingid`, `customerid`, `purchasedate`, `deliverystatus`, `address`, `city`, `state`, `contactno`, `pincode`, `note`, `status`) VALUES
(12, 12, '2018-02-05', 'Pending', 'muslim town', 'Vehari', 'Pakistan', '9875641332', '652144', 'Payment type - Cash on delivery |Card holder  |Card no |expiry Date- |CVV No ', 'Active'),
(13, 12, '2018-02-05', 'Pending', 'khokhar chok', 'Multan', 'Pakistan', '9875641332', '652144', 'Payment type -  |Card holder  |Card no |expiry Date- |CVV No ', 'Active'),
(17, 11, '2018-02-07', 'Delivered', '2nd floor', 'Vehari', 'Pakistan', '7894561230', '574116', 'Payment type - Cash on delivery |Your Name  |Phone no |Product name- |Attach file ', 'Active'),
(18, 11, '2018-02-07', 'Delivered', '3rd floor', 'Lahore', 'Pakistan', '7894561230', '574116', 'Payment type - Cash on delivery |Your Name  |Phone no |Product name- |Attach file ', 'Active'),
(76, 12, '2024-04-04', 'Pending', '6 lat 43 wb vehari', 'Vehari', 'Punjab', '3040999904', '111111', 'Payment type - Cash on delivery |Your Name  |Phone no |Product name- |Attach file ', 'Active'),
(77, 12, '2024-04-23', 'Pending', '6 lat 43 wb vehari', 'Vehari', 'punjab', '3040999904', '111111', 'Payment type - Cash on delivery |Your Name  |Phone no |Product name- |Attach file ', 'Active'),
(85, 13, '2024-05-30', 'Pending', '43 wb ', 'vehari', 'punjab', '3040999904', '574116', 'Payment type - Cash on delivery |Your Name  |Phone no |Product name- |Attach file ', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cutomer`
--

CREATE TABLE `cutomer` (
  `customer_id` int(10) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `pincode` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cutomer`
--

INSERT INTO `cutomer` (`customer_id`, `customername`, `emailid`, `password`, `address`, `city`, `state`, `contactno`, `pincode`, `status`) VALUES
(12, 'tasleem', 'tasleem@gmail.com', '123abc', '65 Eb', 'luddon', 'punjab', '0309090912', 540369, 'Active'),
(13, 'raza', 'raza@gmail.com', 'raza1122', '43 wb ', 'vehari', 'punjab', '3040999904', 574116, 'Active'),
(14, 'Ayesha', 'ayesha@gmail.com', 'abc123', 'street no 7 ', 'Vehari', 'punjab', '0301001012', 111111, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeid` int(20) NOT NULL,
  `emptype` varchar(10) NOT NULL,
  `empname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeid`, `emptype`, `empname`, `loginid`, `password`, `status`) VALUES
(4, 'admin', 'Raza', 'raza@gmail.com', 'raza1122', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `ratings` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `fbdate` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `productid`, `customer_id`, `ratings`, `title`, `feedback`, `fbdate`, `status`) VALUES
(2, 19, 12, 4, 'awesome ', 'pritty good', '2018-02-05 23:54:46', 'Active'),
(3, 18, 11, 2, 'ok ok', 'Dont waste your money !!', '2018-02-06 18:40:18', 'Active'),
(4, 20, 12, 4, 'cool!!', 'amazing designs with attractive offers ..Umm I pretty liked it..', '2018-02-09 08:15:58', 'Active'),
(8, 17, 13, 5, 'Wow !!!', 'Lovely products.. Amazing', '2018-02-09 08:28:28', 'Active'),
(9, 18, 13, 2, 'Rocky', 'not much impressive', '2018-02-09 08:29:59', 'Active'),
(10, 21, 13, 4, 'Coolie !!', 'nice !!', '2018-02-09 14:53:26', 'Active'),
(11, 21, 13, 4, 'Coolie !!', 'nice !!', '2018-02-09 14:55:15', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL,
  `supplierid` int(10) NOT NULL,
  `message` text NOT NULL,
  `msgdttim` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offerid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `supplierid` int(10) NOT NULL,
  `discountamt` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offerid`, `productid`, `supplierid`, `discountamt`, `status`) VALUES
(5, 16, 12, 10.00, 'Active'),
(6, 17, 12, 5.00, 'Active'),
(7, 19, 13, 20.00, 'Active'),
(9, 18, 13, 500.00, 'Pending'),
(10, 26, 11, 5.00, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(10) NOT NULL,
  `productstypeid` int(10) NOT NULL,
  `supplierid` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `cost` float(10,2) NOT NULL,
  `specifications` text NOT NULL,
  `warranty` text NOT NULL,
  `installationdemo` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productstypeid`, `supplierid`, `title`, `description`, `cost`, `specifications`, `warranty`, `installationdemo`, `status`) VALUES
(16, 6, 12, 'Honda Civic Type R Style Carbon Fiber Fender 2 Pcs 2016-2021', 'Honda Civic Type R Style Carbon Fiber Fender 2 Pcs 2016-2021', 4500.00, 'Made in China<br />\r\nManufactured For:Honda', '100%', 'no', 'Active'),
(17, 5, 12, 'Honda City 2009-2021 Center Wheel Cup Logo', 'Honda City 2009-2021 Center Wheel Cup Logo', 2400.00, 'Made in China<br />\r\nManufactured For:Honda', '1 years', 'yes!! ...', 'Active'),
(18, 6, 11, 'ToyotaCorolla_Cross_Silicone_Key Cover', 'Protects your key remote from scratches and impact Made of good quality soft Silicone material Washable, Eco-friendly & Waterproof Easy to install with Logo Color: Black<br />\r\n', 600.00, 'Manufactured For:Toyota<br />\r\n', '9 months warranty only...', 'no', 'Active'),
(19, 7, 13, 'PLC Parking Assistant System In Silver Color For All Car(4 pcs)', 'PLC Parking Assistant System In Silver Color For All Car(4 pcs)', 4000.00, 'PLC Parking Assistant System In Silver Color For All Car(4 pcs)', 'no', 'Free ', 'Active'),
(20, 8, 12, 'Changan Oshan X7 2021-2023 Fan Shroud Complete ', 'Changan Oshan X7 2021-2023 Fan Shroud Complete ', 51000.00, 'Changan Oshan X7 2021-2023 Fan Shroud Complete ', '2', 'yes', 'Active'),
(23, 9, 11, 'Woodness Engineered Wood', 'awesome', 12000.00, 'awesome', '1 year', 'Installation and demo for this product is done free of cost as part of this purchase.', 'Active'),
(24, 5, 13, 'Suzuki 12 inch Wheel cover', 'Suzuki 12 inch Wheel cover', 2200.00, 'Suzuki 12 inch Wheel cover<br />\r\n', '100%', 'yes!!', 'Active'),
(25, 10, 16, 'Gladiator 2 Pcs Dashboard Polish 450ML With Microfiber Towel', 'Gladiator 2 Pcs Dashboard Polish 450ML With Microfiber Towel', 1600.00, 'Made in Pakistan', '10 day warranty on manufacturing defects only ', 'Not required for this product', 'Active'),
(26, 10, 11, 'honda-br-v-steering-wheel-only', 'honda-br-v-steering-wheel-only', 24500.00, 'non', '100%', 'Its done free of cost', 'Active'),
(28, 5, 15, 'Kia Picanto 2019-22 Wheel Cover (4 pcs) ', 'Kia Picanto 2019-22 Wheel Cover (4 pcs) ', 6000.00, 'Kia Picanto 2019-22 Wheel Cover (4 pcs) - Used<br />\r\nGenuine Used<br />\r\nManufactured For:Kia', '100', 'YES!!', 'Active'),
(29, 5, 11, 'Toyota Corolla 2014-2023 Wheel Cover \"15 Inches\" | Premium Quality ', 'Toyota Corolla 2014-2023 Wheel Cover \"15 Inches\" | Premium Quality ', 2000.00, 'Manufactured For:Toyota<br />\r\nSKU:New Corolla Wheel Cover<br />\r\nSeller:4Wheel Accessories', '1 year', 'Free ', 'Active'),
(30, 7, 0, 'Godrej record', 'godrej description', 5000.00, 'Hi ', '5', '', ''),
(43, 5, 12, 'Honda Universal Wheel Cover 15Inch', 'Honda Universal Wheel Cover 15Inch', 28500.00, 'Manufactured For:Honda<br />\r\nHonda Universal Wheel Cover 15Inch', '1', 'free', 'Active'),
(66, 9, 11, 'Toyota Corolla 2009-14 Side Mirror Indicator Light', 'Toyota Corolla 2009-14 Side Mirror Indicator Light', 380.00, 'Made in Pakistan<br />\r\nManufactured For:Toyota', '100', 'yes!!', 'Active'),
(67, 9, 15, 'KIA Picanto 2019-2021 Side Mirror', 'KIA Picanto 2019-2021 Side Mirror', 17500.00, 'Made in China<br />\r\nSeller: Kia', '100', 'yes!!', 'Active'),
(68, 9, 12, 'honda-civic-2016-2021-side-mirror-glass-tukri', 'honda-civic-2016-2021-side-mirror-glass-tukri', 2500.00, 'Made in China<br />\r\nSeller: Honda', '100', 'yes!!', 'Active'),
(69, 9, 12, 'tyre', 'need a tyre', 2400.00, 'no', '1', '', 'Customized'),
(72, 69, 11, 'tyre', 'Tyre price is 2600', 2600.00, '', '2', '', 'CustomizedBudget'),
(73, 6, 13, 'Tyre', 'abc', 2000.00, 'no', '1', '', 'Customized');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `productimgid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`productimgid`, `productid`, `imgpath`, `description`, `status`) VALUES
(51, 21, '1467044264aaa.jpg', '', 'Primary'),
(52, 21, '828313235a14.jpg', '', 'Active'),
(53, 21, '320081027a13.jpg', '', 'Active'),
(54, 21, '1482378919a12.jpg', '', 'Active'),
(70, 27, '1015021729a8.jpg', '', 'Active'),
(71, 27, '2097930209a7.jpg', '', 'Active'),
(72, 27, '47721829dq.jpeg', '', 'Active'),
(73, 27, '74615679daq.jpeg', '', 'Active'),
(74, 27, '280380188images.jpg', '', 'Primary'),
(82, 30, '14040109451.png', '', 'Primary'),
(83, 30, '8939608682.png', '', 'Active'),
(84, 35, '1730527924a10.jpg', '', 'Active'),
(85, 36, '548178582a9.jpg', 'ABCD image description', 'Active'),
(87, 52, '888439748a10.jpg', 'TEST RECORD', 'Active'),
(88, 56, '17363218661.png', 'Test description', 'Active'),
(89, 59, '1432743745a9.jpg', 'test sofa', 'Active'),
(90, 61, '112633423a10.jpg', 'Customize drawer', 'Active'),
(93, 17, '1658524133honda city tyre rim2.jpeg', 'Made in China', 'Active'),
(94, 17, '1050529670honda city tyre rim3.jpeg', 'Manufactured For:Honda', 'Active'),
(98, 17, '788385467honda_city_tyre_rim.jpeg', 'honda city tyre rim', 'Primary'),
(99, 24, '1723728696suzuki_12inch_wheel_cover.jpeg', 'suzuki 12inch wheel cover', 'Primary'),
(100, 29, '1363657082Toyota_Corolla_2014-2023_Wheel.jpeg', 'Toyota_Corolla_2014-2023_Wheel', 'Primary'),
(101, 28, '2091633426Kia_Picanto.jpeg', 'Kia Picanto Wheel Cover', 'Primary'),
(103, 43, '455523911honda_universal.jpeg', 'Honda Universal wheel cup logo', 'Primary'),
(104, 16, '1199240577honda-civic-type-r.jpeg', 'Honda Civic', 'Primary'),
(111, 18, '5427966330019018_suzuki-cultus-2016-rear-window-sunshade-curtain-black_415.png', 'TYOTA CROLA CROSS COVER', 'Primary'),
(112, 19, '8101486600018213_plc-parking-assistant-system-in-silver-color-for-all-car4-pcs_1280.jpeg', 'PLC Parking Assistant System In Silver Color For All Car(4 pcs)', 'Primary'),
(113, 20, '329104471changan-oshan-x7-2021-2023-fan-shroud-complete.jpeg', 'Changan Oshan X7 2021-2023 Fan Shroud Complete ', 'Primary'),
(114, 66, '149153656toyota-corolla-2009-14-side-mirror-indicator-light.jpeg', 'Toyota Corolla 2009-14 Side Mirror Indicator Light', 'Primary'),
(115, 67, '4382608380019177_kia-picanto-2019-2021-side-mirror_1280.jpeg', 'KIA Picanto 2019-2021 Side Mirror', 'Primary'),
(116, 67, '15846339360019178_kia-picanto-2019-2021-side-mirror_100.jpeg', 'KIA Picanto 2019-2021 Side Mirror', 'Active'),
(120, 68, '17400409240019284_honda-civic-2016-2021-side-mirror-glass-tukri_2500_xt.jpeg', 'honda civic glass miror', 'Active'),
(121, 68, '1507016620019284_honda-civic-2016-2021-side-mirror-glass-tukri_2500_xt.jpeg', 'honda civic glass miror', 'Primary'),
(126, 63, '603895400GLADIATOR-2-PIC.jpeg', 'GLADIATOR 2 PCS DASHBOARD POLISH 450ML WITH MICROFIBER TOWEL', 'Primary'),
(127, 25, '1939726015abc.jpeg', 'GLADIATOR 2 PCS DASHBOARD POLISH 450ML WITH MICROFIBER TOWEL', 'Primary'),
(128, 26, '1176364062int2.jpeg', 'honda-br-v-steering-wheel-only', 'Primary'),
(129, 69, '668816432exter.jpg', 'this', 'Active'),
(130, 16, '22346016ban4.jpg', 'no', 'Inactive'),
(131, 73, '2057270577ban6.webp', 'xyz', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `productstypeid` int(10) NOT NULL,
  `producttype` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `discription` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`productstypeid`, `producttype`, `icon`, `discription`, `status`) VALUES
(5, 'Tyres & Rims', '29733a3.jpg', 'Tyres and Rims related products', 'Active'),
(6, 'Accessories', '27130a2.jpg', 'Different Accessories', 'Active'),
(7, 'Electrical Parts', '31659a1.jpg', 'Electrical Parts', 'Active'),
(8, 'Engine & Parts', '25338images.jpg', 'Engine and parts', 'Active'),
(9, 'Exterior', '1668334857aaa.jpg', 'Exterior products', 'Active'),
(10, 'Interior', '1211465850a7.jpg', 'Interior products', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(10) NOT NULL,
  `billingid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `cgsttax` float(10,2) NOT NULL,
  `sgsttax` float(10,2) NOT NULL,
  `igsttax` float(10,2) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `billingid`, `customerid`, `productid`, `qty`, `cost`, `cgsttax`, `sgsttax`, `igsttax`, `discount`, `status`) VALUES
(10, 12, 12, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, '0.00'),
(11, 13, 12, 18, 1, 14000.00, 12.00, 12.00, 5.00, 0.00, '0.00'),
(12, 14, 11, 17, 2, 22999.00, 12.00, 12.00, 5.00, 5.00, '0.00'),
(13, 15, 11, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, '0.00'),
(14, 16, 11, 20, 1, 44000.00, 12.00, 12.00, 5.00, 0.00, '0.00'),
(15, 17, 11, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, '0.00'),
(16, 18, 11, 18, 1, 14000.00, 12.00, 12.00, 5.00, 0.00, '0.00'),
(17, 0, 0, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, ''),
(18, 20, 11, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(19, 21, 12, 20, 1, 44000.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(20, 22, 13, 21, 2, 18200.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(21, 23, 13, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(22, 24, 13, 18, 1, 14000.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(23, 25, 13, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(24, 26, 13, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(25, 27, 13, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(26, 28, 13, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(27, 29, 13, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(28, 30, 13, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(36, 0, 12, 16, 2, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(38, 0, 12, 16, 2, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(39, 0, 12, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(40, 0, 12, 18, 1, 14000.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(41, 31, 13, 19, 0, 32000.00, 12.00, 12.00, 5.00, 20.00, 'Active'),
(42, 0, 13, 19, 1, 32000.00, 12.00, 12.00, 5.00, 20.00, 'Active'),
(43, 0, 12, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(44, 32, 13, 0, 0, 0.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(45, 33, 13, 0, 0, 0.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(46, 34, 13, 0, 0, 0.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(47, 36, 13, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(48, 36, 13, 17, 2, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(49, 36, 13, 19, 3, 32000.00, 12.00, 12.00, 5.00, 20.00, 'Active'),
(50, 36, 13, 18, 1, 14000.00, 0.00, 0.00, 0.00, 0.00, 'Active'),
(51, 36, 13, 18, 4, 14000.00, 0.00, 0.00, 0.00, 0.00, 'Active'),
(52, 36, 13, 18, 1, 14000.00, 0.00, 0.00, 0.00, 0.00, 'Active'),
(53, 37, 13, 16, 13, 13000.00, 0.00, 0.00, 0.00, 10.00, 'Active'),
(54, 37, 13, 21, 12, 18200.00, 0.00, 0.00, 0.00, 0.00, 'Active'),
(55, 38, 13, 17, 1, 30000.00, 0.00, 0.00, 0.00, 5.00, 'Active'),
(56, 38, 13, 17, 1, 30000.00, 0.00, 0.00, 0.00, 5.00, 'Active'),
(57, 38, 13, 16, 1, 13000.00, 0.00, 0.00, 0.00, 10.00, 'Active'),
(59, 39, 13, 17, 1, 30000.00, 0.00, 0.00, 0.00, 5.00, 'Active'),
(60, 40, 12, 17, 2, 30000.00, 0.00, 0.00, 0.00, 5.00, 'Active'),
(61, 40, 12, 24, 4, 4499.00, 0.00, 0.00, 0.00, 0.00, 'Active'),
(62, 40, 12, 21, 5, 18200.00, 0.00, 0.00, 0.00, 0.00, 'Active'),
(66, 41, 12, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(67, 41, 12, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(68, 42, 13, 24, 1, 4499.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(69, 42, 13, 24, 1, 4499.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(70, 42, 13, 27, 1, 4500.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(71, 43, 13, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(72, 43, 13, 17, 1, 30000.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(73, 45, 13, 25, 1, 4999.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(75, 52, 14, 52, 1, 60000.00, 12.00, 12.00, 5.00, 0.00, ''),
(76, 53, 14, 52, 1, 60000.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(77, 54, 14, 52, 1, 60000.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(78, 55, 12, 36, 1, 44.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(79, 56, 12, 36, 1, 40000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(80, 57, 12, 36, 1, 40000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(81, 58, 12, 43, 1, 20000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(83, 59, 12, 16, 2, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(84, 59, 12, 16, 1, 13000.00, 12.00, 12.00, 5.00, 10.00, 'Active'),
(85, 60, 12, 43, 1, 20000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(86, 61, 12, 43, 1, 20000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(87, 62, 12, 56, 1, 50000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(88, 63, 12, 60, 1, 55000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(100, 75, 12, 65, 50, 100000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(105, 76, 12, 24, 1, 2200.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(114, 77, 12, 17, 1, 2400.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(115, 78, 12, 17, 1, 2400.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(116, 79, 12, 24, 1, 2200.00, 12.00, 12.00, 5.00, 0.00, 'Active'),
(117, 80, 12, 17, 1, 2400.00, 12.00, 12.00, 5.00, 5.00, 'Active'),
(121, 82, 12, 65, 50, 100000.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(122, 83, 12, 70, 1, 2600.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(124, 84, 12, 70, 1, 2600.00, 12.00, 12.00, 0.00, 0.00, 'Active'),
(127, 85, 13, 24, 1, 2200.00, 12.00, 12.00, 5.00, 0.00, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `supplierid` int(10) NOT NULL,
  `billno` int(10) NOT NULL,
  `stkdate` date NOT NULL,
  `qty` int(10) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockid`, `productid`, `supplierid`, `billno`, `stkdate`, `qty`, `cost`, `status`) VALUES
(20, 21, 11, 1230, '2018-02-17', 12, 12000.00, 'Active'),
(21, 21, 11, 234, '2018-01-01', 10, 10.00, 'Active'),
(22, 23, 11, 234, '2018-01-01', 10, 20000.00, 'Active'),
(23, 21, 11, 1210, '2018-02-09', 15, 10000.00, 'Active'),
(24, 16, 12, 1010, '2018-02-10', 10, 10000.00, 'Active'),
(25, 17, 12, 1231, '2018-02-17', 5, 5000.00, 'Active'),
(30, 30, 18, 1111, '2018-02-07', 12, 20000.00, 'Active'),
(32, 16, 12, 156, '2018-02-20', 50, 50000.00, 'Active'),
(36, 25, 12, 414, '2018-02-03', 50, 5000.00, 'Active'),
(37, 21, 11, 700, '2018-02-14', 150, 5000.00, 'Active'),
(38, 26, 11, 700, '2018-02-14', 60, 10000.00, 'Active'),
(39, 29, 11, 700, '2018-02-14', 20, 2000.00, 'Active'),
(40, 20, 12, 7070, '2018-02-24', 100, 6000.00, 'Active'),
(41, 17, 12, 101, '2018-03-24', 100, 6000.00, 'Active'),
(42, 16, 12, 101, '2018-03-24', 100, 6000.00, 'Active'),
(43, 18, 12, 101, '2018-03-24', 100, 6000.00, 'Active'),
(44, 20, 12, 101, '2018-03-24', 100, 6000.00, 'Active'),
(45, 25, 12, 101, '2018-03-24', 100, 600.00, 'Active'),
(46, 19, 13, 102, '2018-03-24', 100, 30000.00, 'Active'),
(47, 43, 12, 0, '0000-00-00', 12, 0.00, 'Active'),
(48, 24, 13, 0, '0000-00-00', 12, 0.00, 'Active'),
(50, 0, 0, 0, '0000-00-00', 12, 0.00, 'Active'),
(51, 28, 15, 0, '0000-00-00', 12, 0.00, 'Active'),
(52, 68, 12, 0, '0000-00-00', 14, 0.00, 'Active'),
(53, 67, 15, 0, '0000-00-00', 13, 0.00, 'Active'),
(54, 0, 11, 0, '0000-00-00', 15, 0.00, 'Active'),
(55, 66, 11, 0, '0000-00-00', 14, 0.00, 'Active'),
(56, 18, 11, 101, '2024-05-29', 1, 2400.00, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierid` int(10) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `companylogo` varchar(100) NOT NULL,
  `companydescription` text NOT NULL,
  `companyaddress` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierid`, `companyname`, `loginid`, `password`, `companylogo`, `companydescription`, `companyaddress`, `city`, `pincode`, `status`) VALUES
(11, 'Toyata', 'raza@gmail.com', 'raza1122', '', 'All type of  interiors and exteriors', '3rd floor', 'Lahore', '10101', 'Active'),
(12, 'Honda', 'insta', '222', '', 'we supply all type of car Parts', 'Multan Road', 'Vehari', '12121', 'Active'),
(13, 'Suzuki', 'mord', '333', '', 'We supply interior car parts', 'Bank Road', 'Multan', '555454', 'Active'),
(15, 'Kia', 'parto', 'techno', '1787273098CAR.jpg', 'All types of car parts', 'Vehari Choak', 'Burawala', '8888', 'Active'),
(16, 'Hyundai', 'parko', '1122', '5971886CAR1.jfif', 'We supply all type of  interiors', 'Main', 'Sahiwal', '25012', 'Active'),
(18, 'Hino', 'smart', 'smart', '1189396828CAR.jpg', 'All Types of Car Parts', 'Main', 'okara', '12345', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `taxid` int(10) NOT NULL,
  `taxtype` varchar(20) NOT NULL,
  `taxpercentage` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`taxid`, `taxtype`, `taxpercentage`, `status`) VALUES
(12, 'CGST', 12.00, 'Active'),
(13, 'SGST', 12.00, 'Active'),
(14, 'IGST', 5.00, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billingid`);

--
-- Indexes for table `cutomer`
--
ALTER TABLE `cutomer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offerid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`productimgid`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`productstypeid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierid`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`taxid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billingid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `cutomer`
--
ALTER TABLE `cutomer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `productimgid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `productstypeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
