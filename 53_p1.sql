-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 03 月 13 日 03:54
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `53_p1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `login_log`
--

CREATE TABLE `login_log` (
  `user` varchar(100) NOT NULL,
  `login_time` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `login_log`
--

INSERT INTO `login_log` (`user`, `login_time`, `status`) VALUES
('admin', '2023-03-13 10:42:26', '登入成功'),
('dfsdsf', '2023-03-13 10:50:35', '登入失敗'),
('admin', '2023-03-13 10:51:28', '登入成功'),
('1234', '2023-03-13 10:54:16', '登入失敗');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_des` text NOT NULL,
  `price` varchar(25) NOT NULL,
  `links` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `images` varchar(100) NOT NULL,
  `template` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_des`, `price`, `links`, `time`, `images`, `template`) VALUES
(1, '黑咖啡', '好喝的黑咖啡，濃醇香。', '90', 'coffee.com', '2023-03-14 10:02:16', '70584e942a29aa478fbaa0faf112d10a.jpg', '1'),
(2, '咖啡', '好喝的咖啡', '100', 'coffee.com', '2023-03-14 10:47:40', '3734058876904565f2ab6e19addfd0d5.jpg', '2');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `role` int(1) NOT NULL,
  `user_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `user`, `pw`, `user_name`, `role`, `user_id`) VALUES
(1, 'admin', '1234', '超級管理員', 0, '0000'),
(2, 'coffee', '1234', '咖啡使用者', 1, '0001');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
