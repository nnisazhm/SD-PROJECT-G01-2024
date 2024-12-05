-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2024 at 06:57 PM
-- Server version: 8.2.0
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meqa.my`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `birthday`, `gender`) VALUES
(1, 'Mia', 'Adriana', 'mia@gmail.com', '0126052231', '2002-10-10', 'Female'),
(2, 'Harris', 'Hakimi', 'haris@gmail.com', '0123636598', '2003-10-04', 'Male'),
(3, 'Zareef', 'Iskandar', 'zareef@yahoo.com', '0134852365', '2004-06-05', 'Male'),
(4, 'Anis', 'Aqilah', 'anis@gmail.com', '0125558875', '1997-10-07', 'Female'),
(5, 'Sarah', 'Suhaimi', 'sarahsuhaimi@gmail.com', '0173528543', '2000-04-20', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE `customer_profile` (
  `customer_id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_profile`
--

INSERT INTO `customer_profile` (`customer_id`, `full_name`, `email`, `phone`, `address`, `gender`) VALUES
(1, 'nurin', 'nurin@yahoo.com', '013362514', 'no 9 jalan nilai perdana', 'Female'),
(2, 'husna', 'husna@gmail.com', '012365478', 'no 2 taman bunga raya', 'Female'),
(3, 'naim', 'naim@gmail.com', '0132312123', 'no 1 warisan indah', 'Male'),
(4, 'firdaus', 'daus@gmail.com', '0147474578', 'no 9 jln puteri', 'Male'),
(5, 'mia adlina', 'mia@yahoo.com', '014758588', 'no 50 jln cyberjaya', 'Female'),
(6, 'adam fahmi', 'adam@yahoo.com', '0125558875', 'L-G-12 jalan desa vista', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'ami', 'ami@gmail.com', 'others', 'hihi', '2024-11-04 15:17:46'),
(2, 'hani', 'hani@gmail.com', 'others', 'hhahahaa', '2024-11-05 14:48:43'),
(3, 'nia', 'nia@gmail.com', 'others', 'huhuhu', '2024-11-05 14:51:02'),
(4, 'nisa', 'nnisazhm@gmail.com', 'Feedback', 'Bnw tak cantik tukar la pink', '2024-11-12 18:50:23'),
(5, 'Gojo', 'yowaimo@gmail.com', 'Improvement', 'it&#039;s 3:55 am rn', '2024-11-12 19:55:43'),
(6, 'ain', 'ain@gmail.com', 'Busuk', 'Wangi', '2024-11-13 06:31:45'),
(7, 'ain', 'ain@gmail.com', 'SD', 'miss cantik &lt;3', '2024-11-13 07:04:54'),
(8, 'Nisa Azham', 'nnisazhm@gmail.com', 'Product Feedback', 'Please restock the Olivia Set!', '2024-11-19 10:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pending',
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `item_count` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `email`, `product_name`, `order_status`, `order_date`, `total_amount`, `item_count`, `quantity`, `price`, `subtotal`) VALUES
(1, 'mia', 'mia@gmail.com', 'kebaya', 'Completed', '2024-11-19 15:32:12', 100.00, 2, 2, 50.00, 100.00),
(2, 'nini\r\n', 'nini@gmail.com', 'shawl', 'Processing', '2024-11-13 06:25:55', 40.00, 2, 2, 20.00, 40.00),
(3, 'Afrina', 'afrina@gmail.com', 'Kurung', 'Processing', '2024-11-13 06:30:00', 75.00, 1, 1, 75.00, 75.00),
(4, 'dania', 'dania@gmail.com', 'Satin Shawl', 'Order Received', '2024-01-08 02:05:50', 20.00, 3, 3, 60.00, 60.00),
(5, 'Ariana', 'ariana@gmail.com', 'kurung', 'Order Received', '2024-01-17 02:08:15', 70.00, 2, 2, 140.00, 140.00),
(6, 'Ain', 'ain@gmail.com', 'abaya', 'Order Received', '2024-01-24 02:08:15', 50.00, 1, 1, 50.00, 50.00),
(7, 'Nisa', 'nisa@gmail.com', 'shawl', 'Order Received', '2024-01-30 02:12:28', 20.00, 4, 4, 80.00, 80.00),
(8, 'Afifah', 'afifah@gmail.com', 'kurung', 'Shipping', '2024-08-23 02:12:28', 70.00, 3, 3, 210.00, 210.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` varchar(8) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_size` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_color` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_sku` varchar(100) NOT NULL,
  `product_quantity` varchar(8) NOT NULL,
  `product_status` enum('Active','Inactive','Out Of Stock') NOT NULL,
  `product_media` text,
  `product_images` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_category`, `product_size`, `product_color`, `product_sku`, `product_quantity`, `product_status`, `product_media`, `product_images`, `created_at`, `updated_at`) VALUES
(3, 'Olivia Set', 'NEW IN  \r\n\r\nOlivia Set 2.0 \r\n\r\nLong shirt + Long skirt \r\nMaterial: Cotton mix parachute type of material, high quality & premium (nampak mahal) \r\nSize: S, M & L \r\n\r\n- strechable waist \r\n- long shirt (labuh) \r\n- 2 pockets \r\n- HIGH QUALITY material , easy to iron & wash   \r\n\r\nMeasurement : \r\n\r\nS & M (below 55 kg) \r\nVest \r\nArm hole - 18\r\nLength - 16\r\nChest-33\r\n\r\nSkirt \r\nWaistline - 28/29\r\nLength - 34\r\nHips - 64\r\n\r\nL (below 63kg) \r\nVest \r\nArm hole - 20\r\nChest - 35\r\nLength - 16\r\n\r\nSkirt\r\nWaistline - 30/31\r\nLength - 34\r\nHips - 64', '109', 'SET', 'S,M,L', 'Black,White,Brown', 'SET-OLI24-BB', '22', 'Active', NULL, NULL, '2024-10-06 16:49:55', '2024-10-07 10:36:03'),
(4, 'Sierra Loungewear', 'SIERRA : with drawstrings on the side 😍 fit up till XL \r\nMaterial : high quality soft linen \r\n❌ jarang ❌ panas \r\nVery airy, comfy & stylish loungewear \r\n\r\nFully stretchable waist with two pockets \r\nAdjustable strings, you may style it in 2 ways (loose/tight) \r\nBreastfeeding friendly \r\n\r\nMEASUREMENT \r\nShoulder : 48cm\r\nChest: 59 + | 108 \r\nLength : 68 +\r\nSleeves: 59cm\r\nWaist: 95++ cm up to 36’ \r\nHips : 110cm\r\nLength : 100cm', '89', 'SET', 'S,M,L,XL', 'Black,Brown,Green,Blue,Pink', 'SET-SRA24-MLT', '42', 'Active', NULL, NULL, '2024-10-07 11:17:27', '2024-10-07 11:17:59'),
(6, 'Jennie Denim Hoodie', 'Quality : High quality unique & rare piece ! Limited edition , only in MEQA \r\n\r\nType : Hoodie with button & long sleeves \r\n\r\nStylo and IN TREND \r\n\r\nFit from XS - small XL  , recommended 70 kg & below \r\nChest up till 43 \r\nLength 24.5', '109', 'TOP', 'S,M,L', 'Blue', 'TOP-JEN24-BL', '16', 'Active', NULL, 'meqaJennieDenimTop.png', '2024-10-09 02:56:48', '2024-11-12 19:00:01'),
(7, 'Emily Pants', 'Material : Soft & heavy high quality chiffon mixed poly\r\nStyle : High waist , sleek wide leg pants\r\n❌ panas ❌ jarang \r\nFree size fit XS -   L \r\n\r\n\r\nMeasurements : \r\n \r\nEMILY Pants ( dummy pockets in front ) \r\nLength 42\r\nWaist up to 34\r\nHips 44\r\n\r\nEMILY 2.0  ( real side pockets ) \r\nLength 42 \r\nWaist up to 32 only \r\nHips 44 ', '60', 'BTM', 'S,M,L', 'White,Green', 'BTM-EMI24-BG', '32', 'Active', NULL, NULL, '2024-10-09 03:02:50', '2024-10-09 03:03:13'),
(8, 'Teja Kaftan', 'Material : soft rayon 40 % opacity \r\n\r\n-FREESIZE fit up till xxl\r\n-suitable for preggy mom\r\n-mix rayon, 30 % opacity \r\n-comes w inner skirt \r\n-FREE 3 tier brooch \r\n-attached with adjustable inner strings so you can adjust the height / labuh\r\n.\r\n\r\nEasy to wear , comfy & airy ! 😍', '159', 'KFTN', 'S,M,L', 'Brown,Orange,Yellow', 'KFTN-TJA24-JF', '67', 'Active', NULL, NULL, '2024-10-09 03:05:32', '2024-10-11 17:50:55'),
(9, 'Melati Kurung', 'Material : Soft Satin , very soft , comfy & airy ✨\r\nFREE SHAWL & BROOCH! \r\n\r\nFreesize fit XS - small XXL\r\n\r\n\r\nTop : V neck , full buttons with full sulam piku at the edge and sleeves\r\n\r\nBust 46’\r\nLength 26’\r\nSleeves 22’\r\n\r\nSkirt : Pareo with strings ( adjustable , suitable for height until 172cm ) \r\n\r\n100cm x 150cm\r\n\r\n** model height 175 & 170 cm \r\n\r\nAvailable in Putih Melati  , Biru Larut , Hitam Manis & Merah Jambu🤍\r\n\r\nLIMITED PCS ONLY ! ', '149', 'KRG', '', '', 'KRG-MLT24-BPV', '37', 'Active', NULL, NULL, '2024-10-11 17:53:56', '2024-10-11 17:54:12'),
(10, 'Uniqlo Skirt', 'Material : soft silk satin \r\nwith side zipper , high waist\r\n\r\n❌ jarang . comfy . stylish! \r\n\r\navailable size SM & L \r\nnormal cutting . high waist . slim fit', '59', 'BTM', '', '', 'BTM-UNQ24-GVP', '75', 'Active', NULL, NULL, '2024-10-11 17:56:04', '2024-11-11 10:29:15'),
(11, 'Klara Set', '', '89', 'SET', 'XS,S,M,L,XL', 'Brown', 'SET-KLA24-BR', '43', 'Active', NULL, NULL, '2024-11-11 12:55:56', '2024-11-11 13:06:18'),
(12, 'Ciara Set', '', '89', 'SET', 'XS,S,M,L,XL', 'Red,Blue', 'SET-CIA24-RB', '84', 'Active', NULL, NULL, '2024-11-11 13:04:08', '2024-11-11 13:04:46'),
(13, 'Anggun Kurung', '', '289', 'KRG', 'XS,S,M,L,XL', 'Gray,Violet', 'KRG-AGN24-SV', '63', 'Active', NULL, NULL, '2024-11-11 13:16:08', '2024-11-11 13:16:47'),
(14, 'Brit Knitted Jumper', 'NEW IN MEQA . BRIT JUMPER Material : High quality knit tak terlalu tebal tak jarang . Selesa. Oversize fit up till XL Front zipper + long sleeves measurements : armhole :19 ‘ Lenght 24.5’ Chest 50-52’', '55', 'OTW', 'XS,S,M,L,XL', 'Black', 'OTW-BRT24-BK', '73', 'Active', NULL, 'meqaBritJumperOuterwear.png', '2024-11-12 19:13:42', '2024-11-12 19:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`) VALUES
(4, 3, 'uploads/meqaOlivia.png'),
(5, 4, 'uploads/meqaSierra.jpg'),
(6, 6, 'uploads/meqaJennie.png'),
(7, 7, 'uploads/meqaEmily.png'),
(8, 8, 'uploads/meqaTeja.png'),
(9, 9, 'uploads/meqaMelatiBlue.jpg'),
(10, 10, 'uploads/meqaUniqloEmerald.jpg'),
(11, 11, 'uploads/meqaKlaraSetBrown.jpg'),
(12, 12, 'uploads/meqaCiaraLoungewearSet.png'),
(13, 13, 'uploads/meqaAnggunKurungSilverPurple.jpg'),
(14, 14, 'uploads/meqaBritJumperOuterwear.png');

-- --------------------------------------------------------

--
-- Table structure for table `staff_profile`
--

CREATE TABLE `staff_profile` (
  `staff_id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `position` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff_profile`
--

INSERT INTO `staff_profile` (`staff_id`, `full_name`, `email`, `phone`, `position`, `address`) VALUES
(10, 'mia qistina', 'mia@gmail.com', '012456123', 'interns', 'no 12 jln sepang'),
(11, 'Aisyah Afrina', 'aisyah@gmail.com', '014757811', 'supervisor', 'no 12 jln nilai impian '),
(12, 'mimi mawi', 'mimi@gmail.com', '012789858', 'supervisor', 'ksj'),
(21, 'adah syu', 'adah@gmail.com', '012365478', 'finance', 'no 55 jln sepang'),
(22, 'Arif Haikal', 'arifhaikal@gmail.com', '0198757617', 'cashier', 'no 8 jln kota sepang'),
(25, 'mia', 'mia@gmail.com', '0122121212', 'finance', 'no 12 jln sepang'),
(27, 'dian', 'dian@gmail.com', '0102256245', 'finance', ' JLN BST'),
(28, 'ecah', 'nadeaisyah@gmail.com', '0140256245', 'cashier', 'NO 255 JLN BBST'),
(33, 'Puteri Qistina', 'puteri@gmail.com', '0123636598', 'supervisor', 'no 15 warisan indah sepang'),
(35, 'nina', 'nina@gmail.com', '010202025', 'finance', 'A-5-3(b) jalan serdang jaya'),
(38, 'kaka', 'kaka@gmail.com', '0152025123', 'finance', 'A-5-9 jalan jaya maju'),
(44, 'Arsyad Haris', 'arsyad@gmail.com', '0134852365', 'Marketing', 'no 9 jalan tun razak '),
(50, 'kuku', 'kuku@gmail.com', '0175025123', 'finance', 'A7 jalanraya'),
(55, 'Faris Irfan', 'faris@gmail.com', '0196356289', 'Finance', 'no 5 jalan ksj'),
(57, 'kiki', 'kiki@gmail.com', '018585123', 'finance', 'A75 jalanraya'),
(66, 'Vian', 'Vian@gmail.com', '0102056245', 'finance', ' JLN BSS'),
(67, 'rian', 'rian@gmail.com', '0102056245', 'finance', ' JLN BSS'),
(78, 'airis', 'airis@gmail.com', '011111111111', 'center', 'no 1 taanjung rambutan'),
(85, 'lian', 'lian@gmail.com', '0102256245', 'finance', ' JLN BSTS'),
(86, 'mian', 'mian@gmail.com', '0102056245', 'finance', ' JLN BSS'),
(87, 'ian', 'ian@gmail.com', '0102256245', 'finance', ' JLN BST'),
(91, 'emma', 'emma@gmail.com', '0102323654', 'supervisor', 'NO 500 JLN BBST'),
(93, 'rian', 'rian@gmail.com', '0102056245', 'finance', ' JLN BSS'),
(95, 'zira', 'zira@gmail.com', '0132040003', 'finance', 'JLN BSTS'),
(97, 'emma', 'emma@gmail.com', '0102323654', 'supervisor', 'NO 500 JLN BBST'),
(99, 'Sarah Inarah', 'sarah@yahoo.com', '011235689', 'Customer Service', 'no 34 jalan jenderam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','staff','admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `verification_token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`, `verification_token`, `is_verified`, `firstname`, `lastname`, `phone`, `birthday`, `gender`, `address`, `location`, `job_title`, `website`, `reset_token`, `reset_token_expiration`) VALUES
(124, 'nizzaazham04@gmail.com', '$2y$10$YiG5rHxmXRoEiS3BIvurX.Zpjvudr5rNiJ.4LMbRM/uYc3tda9xlm', 'staff', '2024-09-10 13:52:40', '5c2e490751f56924ca3de9e4ab1d76c4', 0, 'Khairunnisa Azham', '', NULL, NULL, NULL, NULL, 'Kuala Lumpur', 'Frontend Developer', 'linkedin/khairunnisa-azham', 'eb8f144ae7e3bd7690b321c9dbc67c5d', '2024-11-19 13:48:48'),
(125, 'ronseu04@gmail.com', '$2y$10$dV6rmw08sW7QfzzHrRfYAulIoJBAdwNlKcws5mFe1HiFhdNjSGh6.', 'staff', '2024-09-10 15:07:10', '4b4618ed5ba9e8d1a54d1f644d8697e9', 0, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'ariana@gmail.com', '$2y$10$X.BlvGW.huZfrEPLBLAT.u0R9nz3.chGlsv5jSN/7dXIdWPvBao2u', 'customer', '2024-09-10 16:58:04', '569e0ad2941a1ba4b8596527a589cdf9', 0, 'ariana', 'azri', '0163926499', '2004-02-07', 'Female', 'jalan rejang 7, 53300 setapak kuala lumpur', NULL, NULL, NULL, NULL, NULL),
(128, 'nurafifahnabihah21@gmail.com', '$2y$10$8E5E3vP.cHFLoW8pyFK7UeXdJMegPQsfq0VBC0Ed7EBhuqGS1/ACO', 'customer', '2024-09-10 17:11:47', '61358c89cf4bb5929d7dd7569793d5eb', 0, 'afifah', 'norisham', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'yaya@gmail.com', '$2y$10$48GqsAxYlJcsT1tkpAXG9.C06LyskVBJH/pl00HWrHyjc9fkrOP7i', 'customer', '2024-09-11 05:36:53', 'f8a87f49a8a84d6fed26bbdcd1266922', 0, 'yaya', 'ahmad', '01836193640', '2008-08-08', 'Female', 'jalan rejang 10, setapak, 53300 kuala lumpur', NULL, NULL, NULL, NULL, NULL),
(130, 'nurain@yahoo.com', '$2y$10$p.EQLgy.M0egGaYsOlIsZOHQU/U3cyukjG/r2BQCuoMmAFga/8XNe', 'customer', '2024-09-11 06:10:44', 'e728269583a31f1bdf0423a65ce5eb85', 0, 'nurain', 'azmi', '0142537469', '2024-08-04', 'Female', 'kuala lumpur', NULL, NULL, NULL, NULL, NULL),
(131, 'h0neygyuu0@gmail.com', '$2y$10$wI4zMeJ08rH9S1CGDODVy.Dx0m5qb7OTNAfj2Nu46FpgIHnAQDeFC', 'customer', '2024-10-08 04:15:55', 'f109827f8b360fb8b2936ab315505195', 0, 'satoru', 'gojo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'dayangnurnazihah.m@gmail.com', '$2y$10$dtpzzYZdVUi5a65ndOHp2uBA5wXluoKtRdu6YK35ixmq5OR8BVpR6', 'staff', '2024-10-09 04:24:58', '1b0099182892e6b82a3b070e7d7ce7f4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-09 06:26:39'),
(133, 'customer@gmail.com', 'customer', 'customer', '2024-11-12 19:48:14', NULL, 0, 'customerella', 'custinda', '01127291538', '2024-11-01', 'Female', 'no. 127, customer condominium, taman bukit customer, customer indah customer darul custy', 'taman bukit customer', 'customer', 'customer.my', NULL, NULL),
(134, 'nnisazhm@gmail.com', '$2y$10$QBR3MvKokccxBzbZvPzfA.kzJ5WCgoKzuNq9Fhwa.ZZRajqWxk.ZO', 'customer', '2024-11-12 19:50:24', '71a6884ce0525afff45077c319d338d9', 0, 'Khairunnisa', 'Azham', '0125154822', '2004-10-26', 'Female', 'no.127, taman customer, bukit customer indah', 'taman bukit customer', NULL, NULL, NULL, NULL),
(136, 'khairunnisa04@graduate.utm.my', '$2y$10$oytNkjgqX1TEgaoY9YF2EOnW1bTUj2jizMhLulea7G2JdOYZDyb8a', 'customer', '2024-11-19 07:56:34', 'cf561716c5ba39b2e6acc1901f8ec9c9', 0, 'Khairunnisa', 'Azham', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25404f36b93a45ee66e52bdddcdf3a18', '2024-11-19 09:21:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
