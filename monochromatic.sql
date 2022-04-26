-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2022 at 05:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monochromatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `vid` varchar(30) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`vid`, `pid`, `quantity`) VALUES
('VISITOR-afkgu', 'p2', 2),
('VISITOR-fwyj', 'p1', 1),
('VISITOR-fwyj', 'p2', 3),
('VISITOR-mziuc', 'p1', 1),
('VISITOR-mziuc', 'p2', 1),
('VISITOR-tagiz', 'p1', 1),
('VISITOR-yfbl', 'p1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(256) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lname` varchar(256) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `custnum` int(11) NOT NULL,
  `invoicenum` varchar(15) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phno` varchar(15) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address1` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address2` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `state` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `country` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `zipcode` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `notes` varchar(200) CHARACTER SET utf8mb4 DEFAULT 'none',
  `pwd` varchar(500) CHARACTER SET utf8mb4 DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`custnum`, `invoicenum`, `fname`, `lname`, `phno`, `email`, `address1`, `address2`, `state`, `country`, `zipcode`, `notes`, `pwd`) VALUES
(15, '202004081017', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', ''),
(16, '202004081018', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'bling'),
(17, '202004081019', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'hehe hehe hehe', 'blingbling'),
(18, '202004081020', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'hehe hehe hehe', ''),
(19, '202004081021', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'hehe hehe hehe', 'nonejbkjuihhi'),
(20, '202004081022', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(21, '202004081023', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'bjhvjhgvghvhgv', 'none'),
(22, '202004101024', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(23, '202004111025', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'ebe is good\r\nbling', 'none'),
(24, '202004121026', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(25, '202004131027', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(26, '202004131028', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(27, '202004131029', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(28, '202004221030', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(29, '202004221031', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(30, '202004231032', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(31, '202004231033', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'DEliver ', 'none'),
(32, '202004241034', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(33, '202004251035', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(34, '202004251036', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(35, '202004261037', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(36, '202004291038', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(37, '202004291039', 'Ebenezer', 'B', '09880819910', 'eben17cs@cmrit.ac.in', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(38, '202004291040', 'Ebenezer', 'B', '09880819910', 'eben17cs@cmrit.ac.in', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(39, '202004291041', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(40, '202004301042', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(41, '202004301043', 'Ebenezer', 'B', '09880819910', 'eben17cs@cmrit.ac.in', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(42, '202004301044', 'Ebenezer', 'B', '09880819910', 'ebee21399@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(43, '202004301045', 'Ebenezer', 'B', '09880819910', 'eben17cs@cmrit.ac.in', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(44, '202004301046', 'Ebenezer', 'B', '09880819910', 'eben17cs@cmrit.ac.in', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(45, '202004301047', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(46, '202004301048', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(47, '202004301049', 'Ebenezer', 'B', '09880819910', 'eben17cs@cmrit.ac.in', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(48, '202004301050', 'Ebenezer', 'B', '09880819910', 'ebee21399@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(49, '202004301051', 'Ebenezer', 'B', '09880819910', 'ebee21399@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(50, '202004301052', 'R', 'BALASUBRAMANI', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(51, '202005011053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none'),
(52, '202005011054', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'Karnataka', 'India', '560037', 'none', 'none'),
(53, '202005011001', 'Ebenezer', 'B', '09880819910', 'ebee21399@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(54, '202005011001', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(55, '202005011001', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(56, '202005011002', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(57, '202005031003', 'Ebenezer', 'B', '09880819910', 'ebee21399@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(58, '202005031004', 'R', 'BALASUBRAMANI', '09880819910', 'ebee21399@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(59, '202005061005', 'Ebenezer', 'B', '09880819910', 'samebenezer21@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(60, '202005071006', 'krutant ', 'nandakumar ', '9986115052', 'krutant.nk@gmail.com', 'SRINIVASA ENCLAVE, G M PALYA', '', 'India', 'KARNATAKA', '560075', 'none', 'krutant99'),
(61, '202005081007', 'Ebenezer', 'B', '09880819910', 'ebeartpromo@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(62, '202005081008', 'R', 'BALASUBRAMANI', '09880819910', 'ebee21399@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(63, '202005091009', 'Ebenezer', 'B', '09880819910', 'eben17cs@cmrit.ac.in', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(64, '202005091010', 'Ebenezer', 'B', '09880819910', 'eben17cs@cmrit.ac.in', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(65, '202005101011', 'Ebenezer', 'B', '09880819910', 'ebee21399@gmail.com', 'G-1483 , 8th cross, HAL East Extn', 'Marathahalli', 'India', 'Karnataka', '560037', 'none', 'none'),
(66, '202204221012', 'ebe', 'b', '111', '111@gmail.com', '1233', '123', 'kar', 'ind', '12', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `invoicenumber`
--

CREATE TABLE `invoicenumber` (
  `sno` int(11) DEFAULT NULL,
  `invoicenum` varchar(15) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoicenumber`
--

INSERT INTO `invoicenumber` (`sno`, `invoicenum`) VALUES
(1000, 'Seed Value'),
(1001, '202005011001'),
(1002, '202005011002'),
(1003, '202005031003'),
(1004, '202005031004'),
(1005, '202005061005'),
(1006, '202005071006'),
(1007, '202005081007'),
(1008, '202005081008'),
(1009, '202005091009'),
(1010, '202005091010'),
(1011, '202005101011'),
(1012, '202204221012');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `subscribe_time` timestamp NULL DEFAULT current_timestamp(),
  `unsubscribe` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`email`, `name`, `subscribe_time`, `unsubscribe`) VALUES
('ebee21399@gmail.com', 'Ebenezer B', '2020-05-05 02:25:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderID` varchar(30) DEFAULT NULL,
  `intent` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `invoiceID` varchar(20) DEFAULT NULL,
  `total_amount` decimal(11,4) DEFAULT NULL,
  `currency_code` varchar(4) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderID`, `intent`, `status`, `invoiceID`, `total_amount`, `currency_code`, `email`, `fname`, `lname`) VALUES
(1, '51L54893160418823', 'CAPTURE', 'COMPLETED', 'noid4927', '52.4000', 'USD', NULL, NULL, NULL),
(2, '1HH35836BK460763B', 'CAPTURE', 'COMPLETED', 'bpfn7931', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(3, '39268272ET460935G', 'CAPTURE', 'COMPLETED', 'alue1394', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(4, '87042692KC7277319', 'CAPTURE', 'COMPLETED', 'wecn5340', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(5, '8A996287E9187171W', 'CAPTURE', 'COMPLETED', 'ztlr1980', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(6, '785281930J044680V', 'CAPTURE', 'COMPLETED', 'bmaz6978', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(7, '12224022R4342625V', 'CAPTURE', 'COMPLETED', 'jylu3952', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(8, '13M89323K6618120M', 'CAPTURE', 'COMPLETED', 'yxij7345', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(9, '57D79082NU376564M', 'CAPTURE', 'COMPLETED', 'lvtw5471', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(10, '4F5868017C073374Y', 'CAPTURE', 'COMPLETED', 'iate3740', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(11, '7F197784HS924335W', 'CAPTURE', 'COMPLETED', 'yqtr7160', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(12, '2KD13435EP430882T', 'CAPTURE', 'COMPLETED', 'sbnq9245', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(13, '1F1040347P753935J', 'CAPTURE', 'COMPLETED', 'edwu0428', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(14, '35G40791W63498343', 'CAPTURE', 'COMPLETED', 'rjob1506', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(15, '8RC03414RR062630X', 'CAPTURE', 'COMPLETED', 'sail0792', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(16, '1DD70596KA629521V', 'CAPTURE', 'COMPLETED', 'wubv0691', '52.4000', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(17, '2R1726250H2243709', 'CAPTURE', 'COMPLETED', '', '80.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(18, '4HG07326LB072671E', 'CAPTURE', 'COMPLETED', '', '20.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(19, '6H337452Y79023835', 'CAPTURE', 'COMPLETED', '', '80.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(20, '6D648626HF762673H', 'CAPTURE', 'COMPLETED', '202004301050', '110.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(21, '86P10329RE502310K', 'CAPTURE', 'COMPLETED', '', '110.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(22, '0PV906461F032871H', 'CAPTURE', 'COMPLETED', '', '60.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(23, '5PX40465GT118362P', 'CAPTURE', 'COMPLETED', '', '60.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(24, '6VM27378G2063743M', 'CAPTURE', 'COMPLETED', '202005081008', '60.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(25, '2RE89632YA3238348', 'CAPTURE', 'COMPLETED', '', '80.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(26, '2W874185TW715561M', 'CAPTURE', 'COMPLETED', '', '80.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe'),
(27, '3GG631880S418350R', 'CAPTURE', 'COMPLETED', '202005101011', '60.0100', 'USD', 'ebe.mono@shop.com', 'Ebe', 'Doe');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `num_ofprod` int(11) NOT NULL,
  `orderID` varchar(30) DEFAULT NULL,
  `invoiceID` varchar(20) DEFAULT NULL,
  `item_name` varchar(127) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `unit_amt` decimal(10,3) DEFAULT NULL,
  `currency_code` varchar(5) DEFAULT NULL,
  `sku` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`num_ofprod`, `orderID`, `invoiceID`, `item_name`, `description`, `quantity`, `unit_amt`, `currency_code`, `sku`) VALUES
(1, 'abcdefgh', '12345678', 'Simply', 'Seed', 1, '35.600', 'US', 'sku0'),
(2, '57D79082NU376564M', 'lvtw5471', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '7F197784HS924335W', 'yqtr7160', '', NULL, NULL, NULL, NULL, NULL),
(4, '2KD13435EP430882T', 'sbnq9245', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `quantity` int(11) DEFAULT 0,
  `price` decimal(12,2) DEFAULT 20.00,
  `description` varchar(3000) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pic` varchar(256) CHARACTER SET utf8mb4 DEFAULT NULL,
  `subpic1` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `subpic2` varchar(256) CHARACTER SET utf8mb4 DEFAULT NULL,
  `category` int(11) DEFAULT 1,
  `neworsale` varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `name`, `quantity`, `price`, `description`, `pic`, `subpic1`, `subpic2`, `category`, `neworsale`) VALUES
('p1', 'Airship', 5, '20.00', '.....', 'blimp.jpg', '', NULL, 1, 'New'),
('p2', 'Bare Your Fangs', 4, '30.00', '.....', 'smokesnake.jpg', '', NULL, 1, 'New'),
('p3', 'Conflict', 5, '40.00', '.....', 'conflict.jpg', '', NULL, 1, 'New'),
('p4', 'Peace Grenade', 5, '40.00', '.....', 'peacegrenade.jpg', '', NULL, 1, 'New'),
('p5', 'We\'re All The Same', 6, '30.00', '.....', 'allthesame.jpg', '', NULL, 1, 'New'),
('p6', 'Pop', 6, '20.00', '.....', 'popballoon.jpg', '', NULL, 1, 'New');

-- --------------------------------------------------------

--
-- Table structure for table `simplyorder`
--

CREATE TABLE `simplyorder` (
  `id` int(11) NOT NULL,
  `ordid` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simplyorder`
--

INSERT INTO `simplyorder` (`id`, `ordid`) VALUES
(240, '8312112948001234Bebe'),
(241, '4C8441693X021014Yebe'),
(242, '0U4753128P740612Xebe'),
(243, '0X639730193488546ebe'),
(244, '6RB152386L414504Aebe'),
(245, '097299810A779322Yebe'),
(246, '12224022R4342625Vebe'),
(247, '47834317UT444614Nebe'),
(248, '3ML80049N56748747ebe'),
(249, '13M89323K6618120Mebe'),
(250, '57D79082NU376564Mebe'),
(251, '4F5868017C073374Yebe'),
(252, '7F197784HS924335Webe'),
(253, '2KD13435EP430882Tebe'),
(254, '1F1040347P753935Jebe'),
(255, '35G40791W63498343ebe'),
(256, '4LM17866L5975742Aebe'),
(257, '06B61354YG5345939ebe'),
(258, '8RC03414RR062630Xebe'),
(259, '1DD70596KA629521Vebe'),
(260, '2R1726250H2243709ebe'),
(261, '4HG07326LB072671Eebe'),
(262, '6H337452Y79023835ebe'),
(263, '6D648626HF762673Hebe'),
(264, '86P10329RE502310Kebe'),
(265, '0PV906461F032871Hebe'),
(266, '5PX40465GT118362Pebe'),
(267, '6VM27378G2063743Mebe'),
(268, '2RE89632YA3238348ebe'),
(269, '2W874185TW715561Mebe'),
(270, '3GG631880S418350Rebe');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `vid` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`vid`, `visit_date`) VALUES
('VISITOR-afkgu', '2020-05-01 03:02:44'),
('VISITOR-eoqi', '2020-04-30 07:39:42'),
('VISITOR-fwyj', '2020-04-30 02:46:50'),
('VISITOR-mziuc', '2020-05-07 10:32:23'),
('VISITOR-ovqpf', '2022-04-26 01:21:22'),
('VISITOR-qkafw', '2020-08-01 16:24:08'),
('VISITOR-tagiz', '2022-04-22 01:57:13'),
('VISITOR-vskuf', '2020-08-02 01:17:48'),
('VISITOR-wumqd', '2020-08-03 16:56:21'),
('VISITOR-wxyt', '2020-05-01 02:48:58'),
('VISITOR-yfbl', '2020-04-30 11:47:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`vid`,`pid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`custnum`),
  ADD KEY `invoicenum` (`invoicenum`);

--
-- Indexes for table `invoicenumber`
--
ALTER TABLE `invoicenumber`
  ADD PRIMARY KEY (`invoicenum`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`num_ofprod`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `simplyorder`
--
ALTER TABLE `simplyorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `custnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `num_ofprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `simplyorder`
--
ALTER TABLE `simplyorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `visitors` (`vid`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
