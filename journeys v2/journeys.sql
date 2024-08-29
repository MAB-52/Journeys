-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 01:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journeys`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `userid` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `taxi` int(11) NOT NULL,
  `taxad` varchar(400) NOT NULL,
  `fromD` date NOT NULL,
  `toD` date NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `bookingno` int(11) NOT NULL,
  `cardNum` bigint(20) NOT NULL,
  `expiryy` date DEFAULT NULL,
  `cvv` int(11) NOT NULL,
  `cardname` varchar(200) NOT NULL,
  `booktime` varchar(300) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `price` bigint(20) NOT NULL,
  `address` varchar(400) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `city`, `price`, `address`, `phone`, `img`) VALUES
(1, 'Citizen Hotel', 'Mumbai', 5654, '960, Juhu Tara Rd, Airport Area, Juhu, Mumbai, Maharashtra 400049', '022 6693 2525', 'media/citizen.jpg'),
(2, 'ITC Maratha', 'Mumbai', 12721, 'Sahar Village, Andheri East, Mumbai, Maharashtra 400099', '022 2830 3030', 'media/itc.jpg'),
(3, 'Hotel Seven Hills Inn', 'Mumbai', 2150, 'Millenium Plaza, New T2 Airport Link Road, Telephone Exchange Road, near Sakinaka, Andheri East, Mumbai, Maharashtra 400059', '081693 39686', 'media/sevenhills.jpg'),
(4, 'Taj Mahal Tower', 'Mumbai', 14956, 'PJ Ramchandani Marg, Apollo Bandar, Colaba, Mumbai, Maharashtra 400001', '022 6665 3000', 'media/tajmahaltower.jpg'),
(5, 'Hotel Trident (Bandra-Kurla)', 'Mumbai', 11405, 'C 56, G Block BKC, Bandra Kurla Complex, Bandra East, Mumbai, Maharashtra 400098', '022 6672 7777', 'media/tridentbandrakurla.jpg'),
(6, 'Trident Hotel (Nariman Point)', 'Mumbai', 13528, 'CR 2 Nariman Point, Marine Dr, Mumbai, Maharashtra 400021', '022 6632 4343', 'media/tridentnarimanpoint.jpg'),
(7, 'DoubleTree by Hilton', 'Ahmedabad', 5880, 'Ambli Rd, Vikram Nagar, Ahmedabad, Gujarat 380058', '079 4105 0000', 'media/DoubleTree by Hilton.jpg'),
(8, 'The Ummed', 'Ahmedabad', 4753, 'Near Ahmedabad Airport, Ahmedabad | 1.9 km from Sardar Vallabhbhai Patel International Airport', '01295042894', 'media/Hotel The Ummed.jpg'),
(9, 'Hyatt', 'Ahmedabad', 6214, 'Next to Ahmedabad One Mall, Vastrapur, Vastrapur, 380015 Ahmedabad, India', '02222085127', 'media/Hyatt Ahmedabad.jpg'),
(10, 'Radisson Blu Hotel', 'Ahmedabad', 5397, 'Near Panchvati Cross Roads Off C.G. Road Ambawadi, Ellis Bridge, 380006 Ahmedabad', '02228968715', 'media/Radisson Blu.jpg'),
(11, 'Holiday Inn Bengaluru Racecourse', 'Bengaluru', 3541, '#16/1,Sheshadri Road, Bengaluru, 560009', '02223826028', 'media/Holiday Inn Bengaluru.jpg'),
(12, 'Hyatt Centric MG Road', 'Bengaluru', 4248, '1/1, Swami Vivekananda Road, Ulsoor, Ulsoor, 560008 Bangalore', '02225540843', 'media/Hyatt Centric MG Road.jpg'),
(13, 'The Oberoi', 'Bengaluru', 10918, 'Mahatma Gandhi Rd, Yellappa Garden, Yellappa Chetty Layout, Sivanchetti Gardens, Bengaluru, Karnataka 560001', '02225025086', 'media/the oberoi.jpg'),
(14, 'ibis', 'Bengaluru', 6791, 'Plot No - 30, Rajaram Mohan Roy Road, Off, Richmond Rd, Bengaluru, Karnataka 560027', '08042548000', 'media/ibis.jpg'),
(15, 'ITC Grand Chola', 'Chennai', 7649, 'No. 63, Mount Road, Guindy, Guindy, 600032 Chennai', '02226103544', 'media/ITC Grand Chola.jpg'),
(16, 'ibis City Centre', 'Chennai', 3286, 'Mount road, Chennai | 370 m from Thousand Lights Mosque', '02226439292', 'media/Ibis Chennai OMR.jpg'),
(17, 'Novotel', 'Chennai', 8634, 'City Centre, Near Boat Club, &, Anna Salai, Nandanam, Chennai, Tamil Nadu 600035', '04424302333', 'media/Novotel Chennai Chamiers.jpg'),
(18, 'Hotel Vertu', 'Delhi', 4242, 'Mahipalpur, Delhi | 4.2 km from Indira Gandhi International Airports', '02226182281', 'media/hotel virtu.jpg'),
(19, 'Radisson Blu Plaza', 'Delhi', 9459, 'Radisson Blu Plaza Delhi Airport, Nh 8, near Mahipalpur Extension, Block R, Mahipalpur Village, Mahipalpur, New Delhi, Delhi', '01126314912', 'media/Radisson Blu Plaza1.jpg'),
(20, 'The Park', 'Delhi', 8706, '15 Parliament Street, Near Connaught Place, Connaught Place, 110001 New Delhi', '02228513354', 'media/the park.jpg'),
(21, 'Hyatt', 'Pune', 12784, 'Weikfield IT Citi Info Park, Nagar Rd, Sakore Nagar, Viman Nagar, Pune, Maharashtra', '01155155819', 'media/hyat.jpg'),
(22, 'Parc Estique', 'Pune', 2863, '198, 1/1A, Nagar Rd, Clover Park, Viman Nagar, Pune, Maharashtra 411014', '02041004100', 'media/Hotel Parc Estique.jpg'),
(23, 'ibis', 'Pune', 4999, '198, 1/1A, Nagar Rd, Clover Park, Viman Nagar, Pune, Maharashtra 411014', '02041004100', 'media/ibispune.jpg'),
(24, 'Hilton', 'Jaipur', 5531, 'Plot No. 42, Geejgarh House, Hawa Sadak, 302006 Jaipur', '02228886565', 'media/Hilton Jaipur.jpg'),
(25, 'Holiday Inn Jaipur City Centre', 'Jaipur', 8865, 'No. 1, Sardar Patel Marg, Nehru Sahkar Bhawan, C-Scheme, 22 Godam Circle, 302001 Jaipur', '02222086746', 'media/Holiday Inn Jaipur City.jpg'),
(26, 'Hyatt', 'Hyderabad', 7909, 'Road no. 2, I.T Park, Gachibowli, 500019 Hyderabad', '02227693093', 'media/Hyatt Place Hyderabad Banjara.jpg'),
(27, 'Novotel Hyderabad Convention Centre', 'Hyderabad', 8461, 'Novotel & HICC Complex (Adjacent to Hitec City), P O Bag 1101, 500081 Hyderabad', '02652358712', 'media/Novotel Hyderabad.jpg'),
(28, 'Trident Hotel', 'Hyderabad', 9999, 'Hitec City, Near Cyber Towers, Madhapur, 500081 Hyderabad', '08041223512', 'media/Trident, Hyderabad.jpg'),
(29, 'Hotel Express Inn', 'Thane', 2626, 'Thane Ghodbunder Road,Near Versave Bridge, Next to Fountain Hotel, 401104 Thane', '02225323339', 'media/express inn.jpg'),
(30, 'Fortune Park Lake City', 'Thane', 8100, 'Near Viviana Mall, Thane West, Thane', '02226338831', 'media/fortune.jpg'),
(31, 'Hotel Tip Top Plaza', 'Thane', 4000, 'Dharamveer Nagar, Thane | 480 m from Western Railway Stn - Bhayander', '02223435262', 'media/tip top plaza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `pass`, `phone`, `dob`, `id`) VALUES
('Altamash', 'abcd@gmail.com', 'abcd', 1234567890, '2003-01-01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingno`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
