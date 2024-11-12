-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 12:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perfumes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `booking_amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `user_id`, `booking_amount`) VALUES
(4, '2024-11-07', 2, 7, '80.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) DEFAULT 1,
  `cart_status` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_qty`, `cart_status`, `product_id`, `booking_id`) VALUES
(4, 4, 1, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'For HER'),
(2, 'For HIM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_complainttype` varchar(100) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_complainttype`, `complaint_content`, `user_id`, `complaint_date`, `complaint_reply`, `complaint_status`) VALUES
(1, 'General Complaint', 'It was a disappointing experience for me while I searched over the site, unfortunately, I couldn\'t f', 3, '2024-10-15', 'Sorry for the unfortune experience from our side. We will try to upgrade and provide more options as', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complaintype_id` int(11) NOT NULL,
  `complaintype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Ernakulam'),
(3, 'Kottayam'),
(4, 'Idukki'),
(6, 'Thrissur'),
(7, 'Trivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `user_id`, `feedback_reply`) VALUES
(1, 'It was a good site. ', '2024-10-15', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locality`
--

CREATE TABLE `tbl_locality` (
  `locality_id` int(11) NOT NULL,
  `locality_name` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_locality`
--

INSERT INTO `tbl_locality` (`locality_id`, `locality_name`, `place_id`) VALUES
(2, 'Vyttila', 2),
(3, 'Edappally', 2),
(4, 'Marine Drive', 2),
(5, 'Mattancherry', 2),
(6, '', 0),
(7, 'Nellad', 1),
(8, 'Vazhakkulam', 1),
(9, 'Vattavada', 4),
(10, 'Chinnakanal', 4),
(12, 'Paravur', 5),
(13, 'Cherai', 5),
(15, 'Vaikom', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Muvattupuzha', 1),
(2, 'Kochi', 1),
(4, 'Adimali', 4),
(5, 'Kodungallur', 6),
(6, '', 0),
(7, 'Irinjalakuda', 6),
(8, 'Kowdiar', 7),
(9, 'Venjaramoodu', 7),
(10, 'Munnar', 0),
(11, 'Munnar', 4),
(12, 'Kattappana', 4),
(13, 'Changanassery', 3),
(14, 'Pala', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_details` varchar(50) NOT NULL,
  `product_photo` varchar(500) NOT NULL,
  `product_price` int(50) NOT NULL,
  `subCategory_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_details`, `product_photo`, `product_price`, `subCategory_id`, `shop_id`, `type_id`) VALUES
(9, 'Royal Rose ', 'A single floral rose perfume will typically be fem', 'ROYAL ROSE.webp', 20, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `product_id`, `user_review`, `user_rating`, `user_name`) VALUES
(1, '2024-10-15 02:27:12', 2, 'dfzdsfdsfs', '5', 'gdfgdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_contact` varchar(50) NOT NULL,
  `shop_email` varchar(50) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `shop_password` varchar(50) NOT NULL,
  `shop_logo` varchar(500) NOT NULL,
  `shop_proof` varchar(500) NOT NULL,
  `shop_doj` varchar(50) NOT NULL,
  `shop_location` varchar(50) NOT NULL,
  `shop_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_email`, `shop_address`, `shop_password`, `shop_logo`, `shop_proof`, `shop_doj`, `shop_location`, `shop_status`) VALUES
(3, 'Oris and Co. Pvt Ltd', '9435633901', 'orisandco@gmail.com  ', 'Oris and Co. Pvt Ltd, Kochi, Mattancherry', 'orisandco@123', 'SHOP(1) Oris & Co..jpg', 'SHOP(1) Oris & Co..jpg', '2024-11-06', '5', 1),
(4, 'Posy and Petal', '9496330210', 'posyandpetal_pp@gmail.com', 'Posy and Petal, Near Cherai, Kodungallur, Thrissur', 'posyandpetal@123', 'SHOP(2) Posy & Petal.jpg', 'SHOP(2) Posy & Petal.jpg', '2024-11-06', '13', 1),
(5, 'Noir Allegra', '9978234001', 'noirallegra_na@gmail.com', 'Noir Allegra, Vattavada Jun. Vattavada, Adimali, Idukki', 'allegranoir@123', 'SHOP(3) Noir Allegra.jpg', 'SHOP(3) Noir Allegra.jpg', '2024-11-06', '9', 1),
(6, 'Fragrance Emporium', '2990413244', 'fragranceemporium_fe@gmail.com', 'Fragrance Emporium, Near Vaikom Town, North Pala, Kottayam', 'fragranceemporium@123', 'SHOP(4) Fragrance Emporium.jpg', 'SHOP(4) Fragrance Emporium.jpg', '2024-11-06', '15', 1),
(7, 'Eau De Luxe', '9881435232', 'eaudeluxe_edl@gmail.com', 'Eau De Luxe, Gotcha Hut, Marine Drive, Kochi, Ernakulam', 'eaudeluxe@123', 'SHOP(5) Eau De Luxe.jpg', 'SHOP(5) Eau De Luxe.jpg', '2024-11-06', '4', 1),
(8, 'Parfum 24', '9647321002', 'parfum24_p24@gmail.com', 'Parfum 24, Near Paravur Jun, Paravur, Kodungallur, Thrissur', 'parfum24@123', 'SHOP(6) P2.jpg', 'SHOP(6) P2.jpg', '2024-11-06', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_qty` varchar(50) NOT NULL,
  `stock_date` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_qty`, `stock_date`, `product_id`) VALUES
(3, '2', '2024-11-07', 3),
(4, '2', '2024-11-07', 5),
(5, '2', '2024-11-07', 5),
(6, '2', '2024-11-07', 5),
(7, '2', '2024-11-07', 5),
(8, '2', '2024-11-07', 5),
(9, '2', '2024-11-07', 5),
(10, '5', '2024-11-07', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subCategory_id` int(11) NOT NULL,
  `subCategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subCategory_id`, `subCategory_name`, `category_id`) VALUES
(1, 'Single Floral', 1),
(2, 'Floral Bouquet', 1),
(4, 'Citrus', 2),
(5, 'Berry', 2),
(19, 'Single Floral', 2),
(20, 'Floral Bouquet', 2),
(22, 'Citrus ', 1),
(23, 'Berry', 1),
(25, 'Aquatic', 2),
(26, 'Aquatic', 1),
(28, 'Woody', 1),
(29, 'Woody', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'Parfum (Extrait de Parfum)'),
(2, 'Eau de Parfum (EDP)'),
(3, 'Eau de Toilette (EDT)'),
(4, 'Eau de Cologne (EDC)'),
(5, 'Eau Fraîche');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_dob` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_photo` varchar(200) NOT NULL,
  `place_id` int(50) NOT NULL,
  `user_doj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_gender`, `user_address`, `user_dob`, `user_password`, `user_photo`, `place_id`, `user_doj`) VALUES
(3, 'Megan  ', '4451283999  ', 'meganmeg@gmail.com ', 'Female', 'Meg House, Near Kowdiar Palace, 695003, Triivandrum District', '1995-07-19', 'megan@123', 'USER(1)', 8, '2024-10-15'),
(6, 'Ashish Gopal', '9772314520', 'ashishgopal_ag@gmail.com', 'Male', 'Gokarna House, Near SANTA CRUZ CATHEDRAL BASILICA Church, Kochi  \r\nErnakulam District  \r\n682001  \r\n', '1950-04-23', 'ashishgopal@123', 'USER(5).png', 2, '2024-11-06'),
(7, 'Diana Philip', '9100218881', 'dianaphilip_dp@gmail.com', 'Female', 'Alapatt House, Near Dhanya Theatre, Changanassery  \r\nKottayam District  \r\n686101  \r\nKerala, India', '2000-02-11', 'dianaphilip@123', 'USER(12).png', 13, '2024-11-06'),
(8, 'Omana Thampi', '9556645801', 'omanatampi_ot@gmail.com', 'Female', 'Thottathil House ,  Kattapana  \r\nIdukki District  \r\n685508 \r\nKerala, India', '1975-02-05', 'omanatampi@123', 'USER(3).jpeg', 12, '2024-11-06'),
(9, 'Kokila Purushothaman', '9008194532', 'kokilapurushothaman_kp@gmail.com', 'Female', 'House No. 15, Koodalmanikyam Temple \r\nIrinjalakuda, Thrissur District  \r\n680121  \r\nKerala, India', '1975-09-15', 'kokilapurushothaman@123', 'USER(6).png', 7, '2024-11-06'),
(10, 'Esabellah Benny', '8999208011', 'esabellahbenny_eb@gmail.com', 'Female', 'Flat 402, Silver Tower  \r\nMG Road, Near Liberty Square  \r\nPala, Kottayam District  \r\n686575  \r\nKeral', '2005-01-16', 'esabellahbenny@123', 'USER(8).png', 14, '2024-11-06'),
(11, 'Christy Madathil', '9772141551', 'christymadathil_cm@gmail.com', 'Male', 'Madathil House,  \r\nNear Hill View Park, Sector 5  \r\nAdimali, Idukki District   \r\n685561  \r\nKerala, I', '2000-12-30', 'christymadathil@123', 'USER(7).png', 4, '2024-11-07'),
(12, 'Swathy Swad', '9495669765', 'swathyswad6@gmail.com ', 'Female', 'Konattukudi House, Mekkadampu P.O  \r\nKadathy, Muvattupuzha, Ernakulam District  \r\n686661 \r\nKerala, I', '2010-07-03', 'swathyswad@123', 'USER(4).jpg', 1, '2024-11-07'),
(13, 'Theresa Aloshy', '9228271201', 'theresaaloshy_ta@gmail.com', 'Female', 'Flat  505, Silver Plaza Tower  \r\nMG Road, Near District Science Centre  \r\nVenjaramoodu, Trivandrum D', '1977-11-20', 'theresaaloshy@123', 'USER(2).jpeg', 9, '2024-11-07'),
(14, 'Somanath Pichai', '9448072852', 'somanathpichai_sp@gmail.com', 'Male', 'House No. 8, Near Kannan Devan Hills  \r\nMunnar, Idukki District  \r\n685612  \r\nKerala, India', '1979-10-31', 'somanathpichai@123', 'USER(10).png', 11, '2024-11-07'),
(15, 'Daksha Moksh Kumar', '8191235919', 'dakshamokshkumar_dmk@gmail.com', 'Male', 'House No. 10,   \r\nKattappana, Idukki District  \r\n685508  \r\nKerala, India', '1980-05-05', 'dakshamokshkumar@123', 'USER(11).png', 12, '2024-11-07'),
(16, 'Varun Sagar', '9558093245', 'varunsagar_vs@gmail.com', 'Male', 'Nikunjam Fortune, Flat no 501, \r\nKowdiar, Thiruvananthapuram District  \r\n 695003  \r\nKerala, India', '1991-08-20', 'varunsagar@123', 'USER(9).png', 8, '2024-11-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complaintype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_locality`
--
ALTER TABLE `tbl_locality`
  ADD PRIMARY KEY (`locality_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subCategory_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complaintype_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_locality`
--
ALTER TABLE `tbl_locality`
  MODIFY `locality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subCategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
