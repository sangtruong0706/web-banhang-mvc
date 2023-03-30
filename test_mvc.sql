-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2023 lúc 05:12 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'sangadmin', '123456'),
(2, 'sanguser', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) UNSIGNED NOT NULL,
  `title_category` varchar(255) NOT NULL,
  `desc_category` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `title_category`, `desc_category`) VALUES
(1, 'Laptop', 'giá rẻ'),
(2, 'Tivi giá rẻ', 'tivi giá rẻ'),
(3, 'Điện thoại thông minh', 'siêu cấp vip pro'),
(10, 'Game', 'lmht'),
(11, 'Anime', 'phim');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_post`
--

CREATE TABLE `tbl_category_post` (
  `id_category_post` int(11) UNSIGNED NOT NULL,
  `title_category_post` varchar(255) NOT NULL,
  `desc_category_post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_post`
--

INSERT INTO `tbl_category_post` (`id_category_post`, `title_category_post`, `desc_category_post`) VALUES
(1, 'Kinh tế', 'trong nước'),
(2, 'Dự báo thời tiết', 'trong ngày'),
(4, 'League of Legends', 'game moba'),
(5, 'Pháp luật', 'toàn dân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(32) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `customer_name`, `customer_phone`, `customer_email`, `customer_password`, `customer_address`) VALUES
(1, 'truong van sang em', '0396456122', 'truongvansangem0706@gmail.com', '123456', 'an giang'),
(2, 'Doãn Chí Bình', '0396456122', 'binh@gmail.com', '123456', 'Châu Đốc An Giang'),
(3, 'abc', '123654785', 'sangtruong@gmail.com', '123456', 'Châu Đốc An Giang'),
(4, 'bình khùng', '01249877', 'binhkhung@gmail.com', '123456', 'an giang'),
(5, 'test 1', '123456987', 'test1@gmail.com', '123456', 'Châu Đốc An Giang'),
(6, 'test2', '0396445001', 'test2@gmail.com', '123456', 'Bình thành thoại sơn an giang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_payment` varchar(255) NOT NULL,
  `order_shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_code`, `order_date`, `order_status`, `order_payment`, `order_shipping`) VALUES
(1, '113', '21/03/2023 02:17:57pm', 0, 'vnpay', 1),
(2, '8794', '21/03/2023 02:20:04pm', 1, 'vnpay', 1),
(3, '267', '21/03/2023 04:04:40pm', 1, 'vnpay', 4),
(4, '7879', '21/03/2023 04:10:46pm', 0, 'vnpay', 1),
(5, '6781', '21/03/2023 08:59:40pm', 0, 'vnpay', 5),
(6, '9837', '22/03/2023 01:23:44pm', 1, 'vnpay', 6),
(7, '2108', '22/03/2023 02:38:59pm', 0, 'tienmat', 6),
(8, '7633', '22/03/2023 02:47:22pm', 0, 'chuyenkhoan', 6),
(9, '9638', '22/03/2023 02:54:41pm', 0, 'tienmat', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_code`, `product_id`, `product_quantity`, `name`, `phone_number`, `address`, `email`, `content`) VALUES
(1, '113', 4, 2, 'truong van sang em đẹp trai', '0396445221', 'bình thành thoại sơn an giang', 'truongvansangem0706@gmail.com', 'giao hàng lẹ dùm'),
(2, '8794', 6, 4, 'truong van sang em đẹp trai', '0396445221', 'bình thành thoại sơn an giang', 'truongvansangem0706@gmail.com', 'giao hàng lẹ dùm'),
(3, '267', 12, 2, 'dương thanh bình khùng', '013498755', 'an giang', 'binhkhung@gmail.com', 'giao hàng lẹ dùm nha'),
(4, '7879', 12, 1, 'truong van sang em đẹp trai', '0396445221', 'bình thành thoại sơn an giang', 'truongvansangem0706@gmail.com', 'giao hàng lẹ dùm'),
(5, '6781', 12, 1, 'test 1', '123456987', 'châu đốc an giang', 'test1@gmail.com', 'đóng gói cẩn thận'),
(6, '9837', 12, 1, 'test2', '0396445001', 'bình thành thoại sơn an giang', 'test2@gmail.com', 'đóng gói cẩn thận, giao nhanh'),
(7, '2108', 4, 2, 'test2', '0396445001', 'bình thành thoại sơn an giang', 'test2@gmail.com', 'đóng gói cẩn thận, giao nhanh'),
(8, '7633', 9, 2, 'test2', '0396445001', 'bình thành thoại sơn an giang', 'test2@gmail.com', 'đóng gói cẩn thận, giao nhanh'),
(9, '7633', 11, 1, 'test2', '0396445001', 'bình thành thoại sơn an giang', 'test2@gmail.com', 'đóng gói cẩn thận, giao nhanh'),
(10, '9638', 6, 1, 'test2', '0396445001', 'bình thành thoại sơn an giang', 'test2@gmail.com', 'đóng gói cẩn thận, giao nhanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id_post` int(11) NOT NULL,
  `desc_post` varchar(255) NOT NULL,
  `title_post` varchar(255) NOT NULL,
  `content_post` longtext NOT NULL,
  `img_post` varchar(255) NOT NULL,
  `id_category_post` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post`
--

INSERT INTO `tbl_post` (`id_post`, `desc_post`, `title_post`, `content_post`, `img_post`, `id_category_post`) VALUES
(1, 'What is Lorem Ipsum?', 'Bài viết số 1', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'ahri1678544518.png', 4),
(2, 'Why do we use it?', 'Bài viết số 2', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'zed1678544649.jpg', 5),
(3, 'Where does it come from?', 'Bài viết số 33', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'goku1678547361.jpg', 2),
(5, 'Where can I get some?', 'Bài viết số 66', 'The standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\n1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', '3lcdvsdlpvsled1678868326.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `title_product` varchar(255) NOT NULL,
  `price_product` varchar(32) NOT NULL,
  `desc_product` text NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `img_product` varchar(100) NOT NULL,
  `id_category` int(11) UNSIGNED NOT NULL,
  `product_hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `title_product`, `price_product`, `desc_product`, `quantity_product`, `img_product`, `id_category`, `product_hot`) VALUES
(4, 'Kirito', '2000000', 'Màn hình : Super Amoled 4.5k\r\nĐộ phân giải : 2K+(1440x3040)\r\nRam : 8GB\r\nCPU : Android 9.0\r\nGPU : Mali-G76 MP12\r\nSSD : 512MB', 2, 'kirito1678377367.jpg', 11, 1),
(5, 'Lux', '1000000', 'sp trong lmht', 1, 'lux1678513049.jpg', 2, 1),
(6, 'Zed', '500000', 'sát thủ', 3, 'zed1678515694.jpg', 10, 0),
(7, 'Irelia', '1000000', 'sát thủ đấu sĩ', 2, 'ahri1678521008.png', 10, 1),
(8, 'Jinx', '10000000', 'xạ thủ ', 2, 'bg21678862862.png', 1, 1),
(9, 'Iphone 12', '10000000', 'Màn hình : Super Amoled 4.5k\r\nĐộ phân giải : 2K+(1440x3040)\r\nRam : 8GB\r\nCPU : Android 9.0\r\nGPU : Mali-G76 MP12\r\nSSD : 512MB', 4, 'iphone1678865518.png', 3, 1),
(10, 'Iphone X', '20000000', 'Màn hình : Super Amoled 4.5k\r\nĐộ phân giải : 2K+(1440x3040)\r\nRam : 8GB\r\nCPU : Android 9.0\r\nGPU : Mali-G76 MP12\r\nSSD : 512MB', 2, 'iphone21678865570.jpg', 3, 1),
(11, 'product 3', '1000000', '<p>sản phẩm tệ</p>', 4, 'iphonex1679122873.png', 3, 1),
(12, 'Iphone 14 Pro', '25000000', '<p>điện thoại giá rẻ</p>', 4, 'ip141679389361.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `address`, `email`, `note`, `id_customer`) VALUES
(1, 'truong van sang em đẹp trai', '0396445221', 'bình thành thoại sơn an giang', 'truongvansangem0706@gmail.com', 'giao hàng lẹ dùm', 1),
(2, 'Doãn Chí Bình pro', '0907614552', 'bình thành thoại sơn an giang', 'binh@gmail.com', 'giao hàng lẹ dùm', 2),
(3, 'test no 2', '0907614552', 'Ninh Kiều Cần Thơ', 'sangtruong@gmail.com', 'giao nhanh', 3),
(4, 'dương thanh bình khùng', '013498755', 'an giang', 'binhkhung@gmail.com', 'giao hàng lẹ dùm nha', 4),
(5, 'test 1', '123456987', 'châu đốc an giang', 'test1@gmail.com', 'đóng gói cẩn thận', 5),
(6, 'test2', '0396445001', 'bình thành thoại sơn an giang', 'test2@gmail.com', 'đóng gói cẩn thận, giao nhanh', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vnpay`
--

CREATE TABLE `tbl_vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_amount` varchar(200) NOT NULL,
  `vnp_bankcode` varchar(200) NOT NULL,
  `vnp_banktranno` varchar(200) NOT NULL,
  `vnp_cardtype` varchar(200) NOT NULL,
  `vnp_orderinfo` varchar(200) NOT NULL,
  `vnp_paydate` varchar(200) NOT NULL,
  `vnp_tmncode` varchar(200) NOT NULL,
  `vnp_transactionno` varchar(200) NOT NULL,
  `order_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vnpay`
--

INSERT INTO `tbl_vnpay` (`id_vnpay`, `vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionno`, `order_code`) VALUES
(1, '400000000', 'NCB', 'VNP13973292', 'ATM', 'Thanh toán đơn hàng', '20230321141814', 'VHKWZDMW', '13973292', '113'),
(2, '200000000', 'NCB', 'VNP13973296', 'ATM', 'Thanh toán đơn hàng', '20230321142015', 'VHKWZDMW', '13973296', '8794'),
(3, '5000000000', 'NCB', 'VNP13973442', 'ATM', 'Thanh toán đơn hàng', '20230321160514', 'VHKWZDMW', '13973442', '8794'),
(4, '2500000000', 'NCB', 'VNP13973450', 'ATM', 'Thanh toán đơn hàng', '20230321161058', 'VHKWZDMW', '13973450', '7879'),
(5, '2500000000', 'NCB', 'VNP13973596', 'ATM', 'Thanh toán đơn hàng', '20230321210027', 'VHKWZDMW', '13973596', '6781'),
(6, '2500000000', 'NCB', 'VNP13973951', 'ATM', 'Thanh toán đơn hàng', '20230322132414', 'VHKWZDMW', '13973951', '9837');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  ADD PRIMARY KEY (`id_category_post`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_category_post` (`id_category_post`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Chỉ mục cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  MODIFY `id_category_post` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`id_category_post`) REFERENCES `tbl_category_post` (`id_category_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
