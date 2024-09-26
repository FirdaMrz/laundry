-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2024 pada 03.59
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(22) NOT NULL,
  `Adm_Name` text NOT NULL,
  `Adm_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin_login`
--

INSERT INTO `admin_login` (`ID`, `Adm_Name`, `Adm_Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_form`
--

CREATE TABLE `contact_form` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone_No` varchar(15) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `contact_form`
--

INSERT INTO `contact_form` (`ID`, `Name`, `Phone_No`, `Message`) VALUES
(1, 'ff', '085tc', 'tc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `ID` int(22) NOT NULL,
  `User_ID` int(22) NOT NULL,
  `Order_Code` int(20) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Total_Item` int(22) NOT NULL,
  `Total_Price` int(22) NOT NULL,
  `Pick_up_date` date NOT NULL,
  `Delivery_date` date NOT NULL,
  `Phone_No` int(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Pick_Up_status` text NOT NULL,
  `Delivery_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`ID`, `User_ID`, `Order_Code`, `User_Name`, `Total_Item`, `Total_Price`, `Pick_up_date`, `Delivery_date`, `Phone_No`, `Address`, `Pick_Up_status`, `Delivery_status`) VALUES
(17, 5, 823544, 'imran', 4, 400, '2018-10-19', '2018-10-20', 2147483647, 'Faisalabad, Pakistan', 'No', 'Deliver'),
(18, 5, 972038, 'imran', 10, 1500, '2018-10-26', '2018-10-05', 2147483647, 'Faisalabad, Pakistan', 'No', 'Deliver'),
(19, 5, 817848, 'imran', 1, 100, '2018-10-26', '2018-10-25', 2147483647, 'Faisalabad, Pakistan', 'No', 'Deliver'),
(20, 7, 853927, 'admin', 1, 100, '2018-10-11', '2018-10-10', 2147483647, '615 G.block Gulistan Colony Fsd', 'No', 'Deliver'),
(21, 6, 863120, 'usman', 2, 250, '2018-11-07', '2018-11-13', 2147483647, 'Faisalabad, Pakistan', 'No', 'Deliver'),
(22, 5, 91748, 'imran', 13, 1900, '2018-11-06', '2018-11-06', 0, 'Faisalabad, Pakistan', 'No', 'Deliver'),
(23, 5, 635845, 'imran', 13, 1900, '2018-11-06', '2018-11-06', 0, 'Faisalabad, Pakistan', 'No', 'Deliver'),
(24, 5, 779737, 'imran', 13, 1900, '2018-11-06', '2018-11-06', 0, 'Faisalabad, Pakistan', 'No', 'Deliver'),
(25, 8, 656240, 'Sikander', 4, 1050, '2018-11-13', '2018-11-14', 2147483647, 'sagarrd hhhhh', 'No', 'Deliver'),
(26, 5, 580445, 'imran', 1, 300, '2024-08-02', '2024-08-04', 0, 'yes', 'No', 'Deliver'),
(27, 0, 625697, '', 0, 0, '2024-09-10', '2024-09-13', 123, 'p', 'No', 'No');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_temp`
--

CREATE TABLE `order_temp` (
  `ID` int(22) NOT NULL,
  `User_ID` int(22) NOT NULL,
  `Services_Name` text NOT NULL,
  `Services_Type` text NOT NULL,
  `Laundry_Price` int(100) NOT NULL,
  `Dry_Price` int(100) NOT NULL,
  `Total_Item` int(100) NOT NULL,
  `Pick_Delivery_Status` text NOT NULL,
  `Order_Status` text NOT NULL,
  `Order_code` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `order_temp`
--

INSERT INTO `order_temp` (`ID`, `User_ID`, `Services_Name`, `Services_Type`, `Laundry_Price`, `Dry_Price`, `Total_Item`, `Pick_Delivery_Status`, `Order_Status`, `Order_code`) VALUES
(32, 5, 'Suit', 'woman', 0, 100, 4, '2', 'active', '823544'),
(33, 5, 'Cote121', 'Men,s', 50, 100, 10, '2', 'active', '972038'),
(34, 5, 'Suit', 'woman', 0, 100, 1, '2', 'active', '817848'),
(37, 7, 'Suit', 'woman', 0, 100, 1, '2', 'active', '853927'),
(38, 5, 'Suit', 'woman', 0, 100, 1, '2', 'active', '91748'),
(39, 6, 'Cote121', 'Men,s', 50, 100, 1, '2', 'active', '863120'),
(40, 6, 'Suit', 'woman', 0, 100, 1, '2', 'active', '863120'),
(41, 5, 'Cote121', 'Men,s', 50, 100, 12, '2', 'active', '91748'),
(42, 8, 'jacket', 'Children', 0, 250, 3, '2', 'active', '656240'),
(43, 8, 'shirt', 'Men,s', 200, 100, 1, '2', 'active', '656240'),
(44, 5, 'shirt', 'Men,s', 200, 100, 1, '2', 'active', '580445'),
(45, 0, 'Women', '', 0, 0, 0, '2', 'active', '625697');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_type`
--

CREATE TABLE `services_type` (
  `ID` int(22) NOT NULL,
  `Services_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `services_type`
--

INSERT INTO `services_type` (`ID`, `Services_Name`) VALUES
(2, 'Men,s'),
(4, 'Women'),
(5, 'Children');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_uploade`
--

CREATE TABLE `services_uploade` (
  `ID` int(22) NOT NULL,
  `Services_Name` varchar(100) NOT NULL,
  `Services_Type` varchar(100) NOT NULL,
  `Dry_Price` int(120) NOT NULL,
  `Laundry_Price` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `services_uploade`
--

INSERT INTO `services_uploade` (`ID`, `Services_Name`, `Services_Type`, `Dry_Price`, `Laundry_Price`) VALUES
(6, 'shirt', 'Men,s', 100, 200),
(7, 'jacket', 'Children', 250, 0),
(8, 'kurta', 'Men,s', 300, 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `ID` int(22) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`ID`, `User_Name`, `Password`) VALUES
(5, 'imran', '1234'),
(6, 'usman', '1212'),
(7, 'admin', '123'),
(8, 'Sikander', 'shikari'),
(9, 'firda', '085'),
(10, 'mareza', '08575562123'),
(11, 'mrz', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_registration`
--

CREATE TABLE `user_registration` (
  `ID` int(22) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Father_Name` varchar(255) NOT NULL,
  `Password` int(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact_No` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_registration`
--

INSERT INTO `user_registration` (`ID`, `User_Name`, `Father_Name`, `Password`, `Address`, `Contact_No`) VALUES
(18, 'mrz', '', 123, 'p', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `services_type`
--
ALTER TABLE `services_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `services_uploade`
--
ALTER TABLE `services_uploade`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `services_type`
--
ALTER TABLE `services_type`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `services_uploade`
--
ALTER TABLE `services_uploade`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_login`
--
ALTER TABLE `user_login`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
