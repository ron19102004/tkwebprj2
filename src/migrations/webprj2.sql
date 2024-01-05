-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 12:42 AM
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
-- Database: `webprj2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `avatar`, `deleted`) VALUES
(1, 'Giant', '1704414196_Distributor-statement-with-Giant-Logo-Guide-Performance-Blue.jpg', 0),
(2, 'Twitter', '1704414167_logo-Twitter.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) NOT NULL,
  `id_color` bigint(20) NOT NULL,
  `id_size` bigint(20) NOT NULL,
  `id_product` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `finished` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `id_color`, `id_size`, `id_product`, `id_user`, `quantity`, `finished`, `deleted`) VALUES
(1, 6, 2, 1, 2, 1, 0, 1),
(2, 6, 1, 1, 2, 3, 1, 0),
(3, 6, 2, 1, 2, 11, 1, 0),
(4, 6, 2, 1, 2, 2, 1, 0),
(5, 6, 2, 1, 2, 4, 1, 0),
(6, 6, 2, 1, 2, 4, 1, 0),
(7, 6, 2, 1, 2, 3, 1, 0),
(8, 6, 1, 1, 2, 3, 1, 0),
(9, 1, 2, 2, 2, 1, 1, 0),
(10, 7, 1, 3, 2, 2, 0, 1),
(11, 7, 1, 3, 2, 2, 1, 0),
(12, 1, 2, 2, 2, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `deleted`) VALUES
(1, 'Xe Đạp Đua', 'dua.jpg', 0),
(2, 'Xe Đạp Địa Hình', 'dia-hinh.jpg', 0),
(3, 'Xe Đạp Điện', 'dien.jpg', 0),
(4, 'Xe Đạp Thể Thao', 'the-thao.jpg', 0),
(5, 'Xe Đạp Gia Đình', 'gia-dinh.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `value`, `deleted`) VALUES
(1, 'Đỏ', '#FF0000', 0),
(2, 'Xanh Dương', '#0000FF', 0),
(3, 'Xanh Lá', '#00FF00', 0),
(4, 'Vàng', '#FFFF00', 0),
(5, 'Tím', '#800080', 0),
(6, 'Hường', '#e2cecd', 0),
(7, 'Đen', '#000000	', 0),
(8, 'Trắng', '#fff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `id_product` bigint(20) DEFAULT NULL,
  `content` text NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_comment_reply` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_product`, `content`, `deleted`, `time`, `id_comment_reply`) VALUES
(7, 2, 1, 'Sản phẩm tuyệt vời lắm', 0, '2024-01-05 23:20:05', 0),
(8, 2, 1, 'Giá cả còn hợp lý nữa', 0, '2024-01-05 23:23:13', 7),
(9, 3, 1, 'Có thiệc hong c 🥲🥲', 0, '2024-01-05 23:31:42', 7),
(10, 3, 1, 'Tôi nghĩ cái giá này quá phù hợp', 0, '2024-01-05 23:32:49', 0),
(11, 3, 1, 'Shop uy tín', 0, '2024-01-05 23:33:18', 0),
(12, 3, 1, 'Lúc bạn mua thì giá bao nhiêu ạ', 0, '2024-01-05 23:34:36', 7),
(13, 3, 1, 'Tôi đang định mua mà không biết giá này có hời không', 0, '2024-01-05 23:36:19', 7),
(14, 2, 1, 'Bữa mua giảm có 8tr5 thoai á bạn :V', 0, '2024-01-05 23:41:33', 7),
(15, 2, 2, 'Tôi đã mua 2 chiếc , hi vọng sẽ được giao sớm', 0, '2024-01-05 23:42:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` bigint(20) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `id_category` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `finished` tinyint(1) DEFAULT 0,
  `id_discount` bigint(20) DEFAULT NULL,
  `id_ship` bigint(20) DEFAULT NULL,
  `id_cart` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `finished`, `id_discount`, `id_ship`, `id_cart`) VALUES
(7, 1, 0, 14, 7),
(8, 0, 0, 14, 8),
(9, 0, 0, 14, 9),
(10, 0, 0, 15, 11);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `warranty_policy` text DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `discount` bigint(20) DEFAULT 0,
  `discount_start` datetime DEFAULT NULL,
  `discount_end` datetime DEFAULT NULL,
  `id_brand` bigint(20) DEFAULT NULL,
  `id_category` bigint(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `available` bigint(20) DEFAULT 0,
  `avatar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `warranty_policy`, `price`, `discount`, `discount_start`, `discount_end`, `id_brand`, `id_category`, `deleted`, `available`, `avatar`) VALUES
(1, 'Xe Đạp Đường Phố Touring LIV Alight 2 – Bánh 700C – 2023', '<p><strong>Xe Đạp Đường Phố Touring LIV Alight 2</strong> là một chiếc xe đạp đường phố đa năng, phù hợp với nhiều nhu cầu khác nhau.</p><p>Xe có thiết kế thời trang, bắt mắt, kết hợp với hiệu suất cao và khả năng vận hành ổn định.</p><p>Đây là lựa chọn lý tưởng cho những người muốn khám phá thế giới xung quanh qua các chuyến đi đường phố.</p><figure class=\"table\"><table><thead><tr><th>Đặc điểm</th><th>Mô tả</th></tr></thead><tbody><tr><td>Khung</td><td>Nhôm</td></tr><tr><td>Bánh xe</td><td>700C</td></tr><tr><td>Hệ thống truyền động</td><td>Hiệu quả</td></tr><tr><td>Bộ chuyển động</td><td>Shimano</td></tr><tr><td>Hệ thống phanh</td><td>Phanh đĩa thủy lực</td></tr><tr><td>Bàn đạp và ghi đông</td><td>Ergonomic</td></tr><tr><td>Thiết kế</td><td>Thời trang</td></tr><tr><td>Kích thước</td><td>Nhiều</td></tr></tbody></table></figure>', NULL, 10500, 9999, NULL, NULL, 1, 4, 0, 166, '1704382935_2023_Alight2_Pink-1.jpg'),
(2, 'Xe Đạp Thể Thao Road Twitter Gravel PB Hybrid 29 inch Size M', '<h3>Thiết kế ấn tượng, kiểu dáng mạnh mẽ</h3><p><a href=\"https://www.dienmayxanh.com/xe-dap/twitter-gravel-pb-hybrid-29-inch-do-size-m\">Xe đạp thể thao Road Twitter Gravel PB Hybrid 29 inch Size M</a>&nbsp;đã gây “thương nhớ” ngay từ cái nhìn đầu tiên khi sở hữu thiết kế thể thao mạnh mẽ cùng nhiều phiên bản màu cá tính, thời thượng (các phiên bản màu còn hàng tùy vào khu vực và địa điểm, bài viết sử dụng phiên bản màu đen để minh họa sản phẩm). Đây là mẫu xe đạp lai đến từ thương hiệu&nbsp;<strong>Twitter</strong>, phù hợp để phục vụ cho việc tập luyện thể thao, đi học, đi làm hay đi phượt thám hiểm địa hình.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/680;\" src=\"https://cdn.tgdd.vn/Products/Images/9758/251284/twitter-gravel-pb-hybrid-700c-size-m-den-glr-1.jpg\" alt=\"1\" width=\"1020\" height=\"680\"></figure><h3><a href=\"https://www.dienmayxanh.com/xe-dap-suon-carbon\">Khung sườn sợi carbon</a>&nbsp;size M bền nhẹ</h3><p>Twitter Gravel PB Hybrid với khung sườn <strong>sợi carbon</strong> nhẹ, bền cho tổng trọng lượng xe lý tưởng chỉ khoảng&nbsp;<strong>9.7 kg</strong>&nbsp;với khả năng tải trọng cao đến&nbsp;<strong>150 kg, </strong>phù hợp với những người có chiều cao từ <strong>175 - 190&nbsp;cm</strong>. Kiểu dáng sườn xe được thiết kế tối ưu khí động học tạo sự cứng cáp và hỗ trợ bạn về đích nhanh chóng.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/680;\" src=\"https://cdn.tgdd.vn/Products/Images/9758/251284/twitter-gravel-pb-hybrid-700c-size-m-den-glr-2.jpg\" alt=\"2\" width=\"1020\" height=\"680\"></figure><h3>Bánh xe 29 inch mỏng nhẹ cao cấp</h3><p>Xe sở hữu cặp lốp <strong>Innova</strong>&nbsp;nhiều gai, vành xe&nbsp;<strong>Retrospec</strong>&nbsp;dày&nbsp;<strong>19 mm</strong>, căm xe&nbsp;<strong>Shunjiu</strong>&nbsp;và đùm xe&nbsp;<strong>Retrospec</strong>. Tất cả hoạt động đồng bộ với nhau để tăng khả năng bám đường, khả năng vượt chướng ngại vật và di chuyển linh hoạt hơn khi xe đi qua các vùng đất gập ghềnh, sỏi đá.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/680;\" src=\"https://cdn.tgdd.vn/Products/Images/9758/251284/twitter-gravel-pb-hybrid-700c-size-m-den-glr-3.jpg\" alt=\"3\" width=\"1020\" height=\"680\"></figure><h3>Tay lái dạng thẳng, không sừng dễ điều chuyển hướng</h3><p>Vị trí tay lái không sừng&nbsp;<strong>Twitter</strong>&nbsp;được bố trí hợp lý với khoảng cách phù hợp so với yên xe, giúp các biker điều khiển xe linh hoạt, đảm bảo an toàn khi đi vào các con hẻm nhỏ hay đoạn đường đông đúc xe cộ vào giờ cao điểm.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/680;\" src=\"https://cdn.tgdd.vn/Products/Images/9758/251284/twitter-gravel-pb-hybrid-700c-size-m-den-glr-7-1.jpg\" alt=\"-4\" width=\"1020\" height=\"680\"></figure><h3>Bộ truyền động nhanh nhạy, chuyển số mượt mà</h3><p><a href=\"https://www.dienmayxanh.com/xe-dap\">Xe đạp</a>&nbsp;được trang bị bộ truyền động cao cấp với tay đề và chuyển dĩa của thương hiệu&nbsp;<strong>Retrospec</strong>, bộ&nbsp;<strong>11 líp SUGEK-11S, 11-30T</strong>, sên xe&nbsp;<strong>YBN-11S</strong>&nbsp;cùng giò dĩa đến từ thương hiệu&nbsp;<strong>Retrospec</strong>, giúp bạn thoải mái trải nghiệm nhiều tốc độ khác nhau trên đường.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/680;\" src=\"https://cdn.tgdd.vn/Products/Images/9758/251284/twitter-gravel-pb-hybrid-700c-size-m-den-glr-12-1.jpg\" alt=\"-5\" width=\"1020\" height=\"680\"></figure><h3>Thiết kế phanh đĩa an toàn</h3><p>Để bạn lưu thông an toàn khi đi trên đường, hãng đã sử dụng bộ phanh đĩa&nbsp;và tay thắng của thương hiệu&nbsp;<strong>Retrospec</strong>&nbsp;chất lượng có độ nhạy cao, lực hãm lớn giúp bạn xử lý tình huống khẩn cấp chính xác và an toàn.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/680;\" src=\"https://cdn.tgdd.vn/Products/Images/9758/251284/twitter-gravel-pb-hybrid-700c-size-m-den-glr-15.jpg\" alt=\"6\" width=\"1020\" height=\"680\"></figure><h3>Phuộc xe gọn gàng, giữ xe ổn định</h3><p>Cặp phuộc đơ của&nbsp;<a href=\"https://www.dienmayxanh.com/xe-dap-twitter\">xe đạp Twitter</a>&nbsp;cứng cáp và chắc chắn giúp người đạp tăng tốc nhanh chóng khi di chuyển trên đường trường.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/680;\" src=\"https://cdn.tgdd.vn/Products/Images/9758/251284/twitter-gravel-pb-hybrid-700c-size-m-den-glr-9.jpg\" alt=\"7\" width=\"1020\" height=\"680\"></figure><h3>Yên xe êm ái, mềm mại</h3><p>Xe đạp còn tạo sự thoải mái cho người dùng với yên xe&nbsp;<strong>Twitter</strong>&nbsp;bọc đệm êm ái cùng cọc yên <strong>hợp kim nhôm</strong>&nbsp;<strong>Retrospec</strong>&nbsp;đường kính&nbsp;<strong>31.2 mm</strong>. Ngoài ra, người dùng có thể tùy thích điều chỉnh độ cao yên xe phù hợp với chiều cao của mình.</p><figure class=\"image\"><img style=\"aspect-ratio:1020/680;\" src=\"https://cdn.tgdd.vn/Products/Images/9758/251284/twitter-gravel-pb-hybrid-700c-size-m-do-glr-10-1.jpg\" alt=\"-6\" width=\"1020\" height=\"680\"></figure><p><a href=\"https://www.dienmayxanh.com/xe-dap-dua-road-bike\">Xe đạp thể thao Road</a>&nbsp;Twitter Gravel PB Hybrid 29 inch Size M có vẻ ngoài mạnh mẽ với màu sắc thời thượng cùng chất lượng vượt trội đến từ bộ truyền động Retrospec, khung sườn sợi carbon,… Đây là mẫu xe đạp phù hợp với những ai đam mê với tốc độ cao và cũng thích hợp để làm phương tiện di chuyển hàng ngày.</p>', '<p>Mã giảm <strong>100.000đ áp dụng đơn hàng từ 500.000đ</strong></p><p>Đại siêu thị Online với <strong>15.000</strong> sản phẩm tiêu dùng, thịt, cá, rau…</p><p><strong>FREEship</strong> đơn hàng từ 300.000đ hoặc thành viên VÀNG</p><p>Giao nhanh trong <strong>2 giờ</strong></p>', 12370, 0, NULL, NULL, 2, 1, 0, 99, '1704414550_twitter-gravel-pb-hybrid-29-inch-den-size-s-gallery-1-1.jpg'),
(3, 'Xe Đạp Đua Triathlon / TT Trek Speed Concept SLR 7', '<figure class=\"table\"><table><tbody><tr><td><h3><strong>XE&nbsp;SẼ PHÙ HỢP VỚI BẠN NẾU:&nbsp;</strong></h3><p>Bạn nỗ lực cho những chặng đua và mong muốn một chiếc xe tri thực thụ, nghiêm túc với mục tiêu đã đề ra.&nbsp;</p><p>Tốc độ tối đa&nbsp;đến từ hiệu suất khí động học vượt trội. Khả năng điều khiển điện tử không dây mượt mà, chính xác, thông minh từ bộ truyền động Shimano Dura-Ace/Ultegra, và tất cả những lợi thế đến từ thiết kế tối ưu, tiện dụng khi cần nạp năng lượng và nước trên đường đua.&nbsp;</p></td><td><h3><strong>CÔNG NGHỆ TRÊN XE:</strong></h3><p>Khung carbon 800 Series OCLV cực nhẹ, với thiết kế KVF (Kammtail Virtual Foil) giúp triệt tiêu sức kéo từ gió, phuộc full carbon Speed Concept, giảm chấn âm sườn IsoSpeed, bộ tiếp năng lượng, tiếp nước và dụng cụ sửa chữa tích hợp hoàn toàn vào khung xe.&nbsp;</p><p>Hệ thống truyền động điện tử không dây himano Dura-Ace/Ultegra Di2 12 tốc độ, yên xe chuyên dụng cho triathlon Bontrager Hilo Comp, thắng đĩa thủy lực mạnh mẽ, ổn định trong mọi điều kiện thời tiết, và cuối cùng, là bộ bánh carbon với độ cao vành tối ưu khí động học từ Bontrager.</p></td><td><h3><strong>VÀ TRÊN TẤT CẢ:&nbsp;</strong></h3><p>Speed Concept vừa nhanh vừa thông minh.&nbsp;Thiết kế đơn giản, tinh tế và những tính năng tích hợp đảm bảo&nbsp;chặng đua tự tin hơn, tiết kiệm thời gian tại những điểm chuyển tiếp và sẵn sàng cho đường chạy đầy năng lượng. SLR 7 sẽ góp phần cải thiện thành tích với bộ truyền động công nghệ cao từ Shimano và bánh xe tuyệt vời từ Bontrager.&nbsp;</p></td></tr></tbody></table></figure><h2><strong>LÝ DO BẠN CHỌN&nbsp;VÌ...</strong></h2><p>1 – Hệ thống tiếp năng lượng/ nước thông minh giúp&nbsp;dễ dàng nạp năng lượng, giữ trạng thái khỏe khoắn, tỉnh táo trên suốt đường đua trong khi vẫn giữ tư thế aero tối ưu khi đang di chuyển với tốc độ cao.</p><p>2 – Thiết kế dễ lắp đặt &amp; vận chuyển: sẵn sàng cho mọi cuộc đua, ở bất cứ đâu trên thế giới.</p><p>3 – Bộ truyền động điện tử Dura-Ace/Ultegra Di2 thông minh, mượt mà và hoàn toàn không dây.</p><p>4 – Ống trên IsoSpeed IsoSpeed giúp giảm thiểu chấn động từ những cung đường gồ ghề, giúp chuyển động&nbsp;thoải mái và ổn định.&nbsp;</p><p>5 – Một chiếc xe chỉ của riêng bạn: Speed Concept được hỗ trợ trong chương trình Project One, cho phép bạn lựa chọn dòng xe, màu sơn, phụ tùng và phụ kiện. Theo cách bạn muốn.</p><p>&nbsp;</p><p><img src=\"https://file.hstatic.net/1000092436/file/21-136cr_speed_concept_1760x990_bda0c842804649dbabb533d5b6d28d70_master.jpg\" alt=\"Xe đạp đua triathlon Trek Speed Concept SLR 7\" width=\"1024\" height=\"576\"></p><figure class=\"table\"><table><tbody><tr><td><img src=\"https://file.hstatic.net/1000092436/file/feature_fastaeroshapes_ef9d10f32dd5400dbef3201b0306414e_master.jpeg\" alt=\"Thiết kế khí động học - Fast aero shapes | R+\" width=\"768\" height=\"433\"></td><td><h2><strong>THIẾT KẾ KHÍ ĐỘNG HỌC - TỐI ƯU TỐC ĐỘ&nbsp;</strong></h2><p>Khung xe Speed Concept là chiếc xe đạp nhanh nhất mà Trek từng thử nghiệm - chính xác thì&nbsp;nó nhanh hơn 6 phút so với phiên bản&nbsp;trước đó trong cuộc thi đấu ba môn phối hợp thế giới tại Kona. Khung bằng sợi carbon OCLV 800 Series siêu nhẹ với các hình dạng ống Kammtail Virtual Foil giảm lực cản không khí.</p></td></tr><tr><td><img src=\"https://file.hstatic.net/1000092436/file/feature_fsmartstorage_295c8a4798df4086af614e52485b96d5_master.jpeg\" alt=\"Ngăn chứa thông minh - Smart Storage | R+\" width=\"768\" height=\"433\"></td><td><h2><strong>NGĂN CHỨA THÔNG MINH</strong></h2><p>Ngăn chứa gel năng lượng và nước uống tích hợp trên xe giúp bạn lấy một cách dễ dàng và thuận tiện trong khi vẫn giữ tư thế aero tối ưu khi đang di chuyển với tốc độ cao.</p></td></tr><tr><td><img src=\"https://file.hstatic.net/1000092436/file/feature_dialintheperfectfit_c466e82937604a8ca51d9f1677636b41_master.jpg\" alt=\"Tay nghỉ điều chỉnh theo nhu cầu - Dial perfect fit | R+\" width=\"768\" height=\"433\"></td><td><h2><strong>TAY NGHỈ TÙY CHỈNH&nbsp;</strong></h2><p>Hệ thống tay nghỉ được thiết kế để phù hợp với càng nhiều vận động viên ba môn phối hợp càng tốt. Nó hoàn toàn có thể tùy chỉnh một cách đơn giản&nbsp;và duy trì thiết lập đó trong suốt hành trình.&nbsp;</p></td></tr><tr><td><img src=\"https://file.hstatic.net/1000092436/file/feature_smoothride_75a1e59548864a9d8ac6e250034d6f5b_master.jpeg\" alt=\"Trải nghiệm lái mượt mà - Smooth ride | R+\" width=\"768\" height=\"433\"></td><td><h2><strong>TRẢI NGHIỆM LÁI MƯỢT MÀ&nbsp;</strong></h2><p>Công nghệ&nbsp;IsoSpeed giúp giảm thiểu chấn động từ những cung đường gồ ghề, giúp bạn thoải mái&nbsp;và ít mệt mỏi hơn không chỉ khi đạp xe mà cả khi chuyển sang chạy bộ.&nbsp;</p></td></tr><tr><td><img src=\"https://file.hstatic.net/1000092436/file/shimanoultegra_techfeature_16x9_31jan2022_b747db8bafc646b8b1ed942fc1cf982b_master.jpeg\" alt=\"Bộ đề điện tử - Shimano Ultegra Di2 | R+\" width=\"768\" height=\"432\"></td><td><h2><strong>BỘ TRUYỀN ĐỘNG ĐIỆN TỬ SHIMANO ULTEGRA DI2</strong></h2><p>Ultegra Di2 R8100 là hệ thống truyền động tiên tiến nhất từ&nbsp;Shimano, tích hợp nhiều tính năng đột phá. Công nghệ HYPERGLIDE+ cho phép chuyển đề líp&nbsp;liền mạch cả lên và xuống, ngay cả với tốc độ tối đa hay địa hình phức tạp.&nbsp;</p><p>Hệ thống tay đề&nbsp;không dây Di2 mới độc quyền từ Shimano trang bị&nbsp;12 tốc độ đảm bảo mọi nhu cầu cần thiết. Thiết kế công thái học và khí động học được nâng cao ở mọi góc độ và có thể thiết lập hệ thống truyền động theo cách mình muốn thông qua ứng dụng E-Tube thân thiện với người dùng từ&nbsp;Shimano.</p></td></tr></tbody></table></figure><p>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><img src=\"https://file.hstatic.net/1000092436/file/featureasset_304555_project_one_road_f1d399a7ff684595a9512fef312dcac2_master.jpeg\" alt=\"Tự thiết kế xe theo nhu cầu - Project One | R+\" width=\"480\" height=\"480\"></td><td><h2><strong>PROJECT ONE&nbsp;</strong></h2><p>Nếu bạn không hài lòng với thiết kế xe vì trông gần như tương tự nhau với những xe khác.&nbsp;<br><br>Hãy tự thiết kế nên chiếc xe trong mơ mang dấu ấn cá nhân của bạn với Project One, chương trình tùy chỉnh xe đạp theo nhu cầu từ Trek.&nbsp;<br><br>Liên hệ ngay với nhân viên Ride Plus để được tư vấn và báo giá.&nbsp;</p></td></tr><tr><td><img src=\"https://file.hstatic.net/1000092436/file/bt20_campaign_warrantiedforlife_techfeature_roadpdp_d4d114f7fe58476eba586982e8d49600_master.jpeg\" alt=\"Bảo hành trọn đời | R+\" width=\"480\" height=\"480\"></td><td><h2><strong>TREK CARBON CARE</strong></h2><p>Chính sách Carbon Care cho phép bạn có thể thay thế khung xe carbon bị hư hỏng hoặc các phụ tùng khác một cách dễ dàng.&nbsp;</p><p>Carbon Care là một chính sách độc quyền mà Trek dành tặng cho khách hàng với chương trình giảm giá đặc biệt cho việc thay thế sản phẩm bằng sợi carbon như khung xe, phuộc và các phụ tùng khác.</p><p>Ride Plus tự hào là trung tâm bảo hành chính hãng được ủy quyển bởi Trek tại Việt Nam.&nbsp;<br><br>&nbsp;</p></td></tr><tr><td><img src=\"https://file.hstatic.net/1000092436/file/carbon_care_bike_feature_road_366a2271060c4ce79bf5facd026d60f7_master.jpeg\" alt=\"TREK CARBON CARE | R+\" width=\"480\" height=\"480\"></td><td><h2><strong>BẢO HÀNH TRỌN ĐỜI</strong></h2><p>Bánh xe carbon có thể làm nhẹ chuyến đi và cải thiện hiệu suất&nbsp;- và khi bạn sử dụng sản phẩm từ&nbsp;Bontrager, khoản đầu tư của bạn sẽ được bảo vệ. Tất cả các bánh xe carbon Bontrager đều được bảo hành trọn đời cho chủ sở hữu đầu tiên theo chính sách bảo hành toàn cầu từ Trek.</p><p>Ride Plus tự hào là trung tâm bảo hành chính hãng được ủy quyển bởi Trek tại Việt Nam.&nbsp;</p></td></tr></tbody></table></figure>', NULL, 299000, 0, NULL, NULL, 1, 1, 0, 18, '1704423904_SpeedConceptSLR7_22_35577_A_Accessory3-copy.jpg'),
(4, 'Xe Đạp Thể Thao Thành Phố Jett Catina', '<figure class=\"table\"><table><tbody><tr><td>KÍCH THƯỚC&nbsp;</td><td>SIZE CHUNG&nbsp;</td></tr><tr><td>LOẠI BÁNH&nbsp;</td><td>700C [622]</td></tr><tr><td>TỐC ĐỘ&nbsp;</td><td>7</td></tr><tr><td>HÀNH TRÌNH&nbsp;</td><td>-</td></tr><tr><td>KHUNG</td><td>KHUNG THÉP CARBON TIÊU CHUẨN DÒNG XE THÀNH PHỐ&nbsp;</td></tr><tr><td>PHUỘC SAU&nbsp;</td><td>-</td></tr><tr><td>PHUỘC TRƯỚC</td><td>THÉP CARBON&nbsp;</td></tr><tr><td>BỘ CỔ&nbsp;</td><td>THREADED SEMI-INTEGRATED |&nbsp; THÉP</td></tr><tr><td>CỔ LÁI&nbsp;</td><td>1\" QUILL&nbsp; |&nbsp; HỢP KIM NHÔM&nbsp;</td></tr><tr><td>TAY LÁI&nbsp;</td><td>OVERSIZED RISER |&nbsp; 620MM&nbsp; |HỢP KIM NHÔM&nbsp;</td></tr><tr><td>BAO TAY NẮM&nbsp;</td><td>92/125MM&nbsp;&nbsp;</td></tr><tr><td>THẮNG TRƯỚC&nbsp;</td><td>THẮNG CÀNG NHÔM&nbsp;</td></tr><tr><td>THẮNG SAU&nbsp;</td><td>THẮNG CÀNG NHÔM</td></tr><tr><td>TAY THẮNG&nbsp;</td><td>4_FINGER&nbsp; |&nbsp;HỢP KIM NHÔM</td></tr><tr><td>TAY ĐỀ&nbsp;</td><td>TAY ĐỀ VẶN SHIMANO REVOSHIFT 7 SPEEDS</td></tr><tr><td>GIÒ ĐẠP&nbsp;</td><td>170MM&nbsp; |&nbsp;HỢP KIM NHÔM</td></tr><tr><td>GIÒ ĐĨA&nbsp;</td><td>40T&nbsp; |&nbsp; NHÔM+ CHẮN XÍCH NHỰA TỔNG HỢP</td></tr><tr><td>ĐỀ TRƯỚC&nbsp;</td><td>-</td></tr><tr><td>ĐỀ SAU&nbsp;</td><td>SHIMANO TOURNEY</td></tr><tr><td>SÊN XE&nbsp;</td><td>KMC&nbsp;</td></tr><tr><td>LÍP XE&nbsp;</td><td>SHIMANO&nbsp; |&nbsp; 14-28T</td></tr><tr><td>CHÉN TRỤC GIỮA</td><td>SEALED BB&nbsp; &nbsp;|&nbsp; THÉP&nbsp;</td></tr><tr><td>BÀN ĐẠP&nbsp;</td><td>LOẠI THÀNH PHỐ&nbsp; |&nbsp; NHỰA + PHẢN QUANG&nbsp;</td></tr><tr><td>NIỀNG XE&nbsp;</td><td>2 LƠ |&nbsp; HỢP KIM NHÔM</td></tr><tr><td>ĐÙM TRƯỚC&nbsp;</td><td>3/8\" KHÓA ĐÙM&nbsp; |&nbsp;HỢP KIM NHÔM</td></tr><tr><td>ĐÙM SAU</td><td>3/8\" KHÓA ĐÙM&nbsp; |&nbsp;HỢP KIM NHÔM</td></tr><tr><td>CĂM XE&nbsp;</td><td>36_CĂM x THÉP 14G VỚI ĐẦU CĂM UCP</td></tr><tr><td>VỎ (LỐP) XE&nbsp;</td><td>KENDA 700 X 38&nbsp; |&nbsp; CAO SU&nbsp;</td></tr><tr><td>RUỘT (XĂM) XE</td><td>CST_ AMERICAN VALVE</td></tr><tr><td>YÊN XE&nbsp;</td><td>JETT URBAN SERIES&nbsp;</td></tr><tr><td>CỐT YÊN&nbsp;</td><td>31.6MM MICRO ADJUST&nbsp; |HỢP KIM NHÔM</td></tr><tr><td>KHÓA CỐT YÊN</td><td>HỢP KIM NHÔM + KHOÁ LỤC GIÁC 5MM</td></tr><tr><td>PHỤ KIỆN</td><td>RỔ XE NHÔM&nbsp; +&nbsp; VÈ XE + DẢI PHẢN QUANG + CHÂN CHÓNG&nbsp;</td></tr></tbody></table></figure>', NULL, 4999, 0, NULL, NULL, 1, 4, 0, 10, '1704424115_img_9396_2084b37f108b41ab8399d9b670874440_master.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_colors`
--

CREATE TABLE `products_colors` (
  `id` bigint(20) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `id_color` bigint(20) DEFAULT NULL,
  `id_product` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_colors`
--

INSERT INTO `products_colors` (`id`, `deleted`, `id_color`, `id_product`) VALUES
(1, 0, 6, 1),
(2, 0, 1, 2),
(3, 0, 4, 2),
(4, 0, 7, 3),
(5, 0, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) NOT NULL,
  `image` text NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `id_product` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `image`, `deleted`, `id_product`) VALUES
(6, '1704382921_2023_Alight2_Pink_13.jpg', 0, 1),
(7, '1704382928_2023_Alight2_Pink_8.jpg', 0, 1),
(8, '1704382935_2023_Alight2_Pink-1.jpg', 0, 1),
(9, '1704382945_2023_Alight2_Pink_9.jpg', 0, 1),
(10, '1704414550_twitter-gravel-pb-hybrid-29-inch-den-size-s-gallery-1-1.jpg', 0, 2),
(11, '1704414558_twitter-gravel-pb-hybrid-29-inch-den-do-size-m-glr-1-1.jpg', 0, 2),
(12, '1704423904_SpeedConceptSLR7_22_35577_A_Accessory3-copy.jpg', 0, 3),
(13, '1704423933_SpeedConceptSLR7_22_35577_A_Alt2.jpg', 0, 3),
(14, '1704424115_img_9396_2084b37f108b41ab8399d9b670874440_master.jpg', 0, 4),
(15, '1704424121_PN1932-700x700.png', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products_sizes`
--

CREATE TABLE `products_sizes` (
  `id` bigint(20) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `id_size` bigint(20) DEFAULT NULL,
  `id_product` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `deleted`, `id_size`, `id_product`) VALUES
(2, NULL, 2, 1),
(3, NULL, 1, 1),
(4, NULL, 2, 2),
(5, NULL, 1, 3),
(6, NULL, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` bigint(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `content` text DEFAULT NULL,
  `id_order` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `time`, `content`, `id_order`) VALUES
(1, '2024-01-04 23:06:56', 'Đơn được khởi tạo thành công', 7),
(2, '2024-01-04 23:08:21', 'Đơn đang chuẩn bị đóng hàng', 7),
(29, '2024-01-05 01:48:27', 'Đơn hàng đã được vận chuyển', 7),
(30, '2024-01-05 01:48:29', 'Đơn hàng đang trong quá trình vận chuyển', 7),
(31, '2024-01-05 01:48:31', 'Xin lỗi, tạm hết hàng.Đơn hàng sẽ đến với bạn sớm nhất', 7),
(32, '2024-01-05 02:06:56', 'Đơn hàng đã đến tay người dùng', 7),
(33, '2024-01-05 02:09:44', 'Đơn hàng đã được khởi tạo thành công', 8),
(34, '2024-01-05 02:55:09', 'Đơn hàng đã được shipper lấy hàng', 8),
(35, '2024-01-05 02:55:16', 'Đơn hàng đã được khởi tạo thành công', 9),
(36, '2024-01-05 02:55:17', 'Đơn hàng đã được shipper lấy hàng', 9),
(37, '2024-01-05 02:55:19', 'Đơn hàng đã được vận chuyển', 9);

-- --------------------------------------------------------

--
-- Table structure for table `quantity_in`
--

CREATE TABLE `quantity_in` (
  `id` bigint(20) NOT NULL,
  `id_product` bigint(20) DEFAULT NULL,
  `value` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quantity_in`
--

INSERT INTO `quantity_in` (`id`, `id_product`, `value`, `date`) VALUES
(1, 1, 100, '2024-01-04 14:35:55'),
(2, 2, 50, '2024-01-05 00:33:07'),
(3, 2, 50, '2024-01-05 03:08:59'),
(4, 4, 10, '2024-01-05 03:09:13'),
(5, 1, 20, '2024-01-05 03:20:13'),
(6, 1, 20, '2024-01-05 03:20:15'),
(7, 1, 20, '2024-01-05 03:20:30'),
(8, 1, 20, '2024-01-05 03:20:33'),
(9, 3, 20, '2024-01-05 03:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `quantity_out`
--

CREATE TABLE `quantity_out` (
  `id` bigint(20) NOT NULL,
  `id_product` bigint(20) DEFAULT NULL,
  `value` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quantity_out`
--

INSERT INTO `quantity_out` (`id`, `id_product`, `value`, `date`) VALUES
(1, 1, 10, '2024-01-04 15:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `id` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`id`, `address`, `phoneNumber`, `id_user`, `deleted`) VALUES
(1, 'Quảng Nam', '0392477615', 2, 1),
(2, 'Đà Nẵng', '0392477615', 2, 1),
(3, 'on', '0392477615', 2, 1),
(4, 'on', '0392477615', 2, 1),
(5, 'on', '0392477615', 2, 1),
(6, 'on', '0392477615', 2, 1),
(7, 'on', '0392477615', 2, 1),
(8, 'on', '0392477615', 2, 1),
(9, 'on', '0392477615', 2, 1),
(10, 'on', '0392477615', 2, 1),
(11, 'Quảng Nam', '0392477615', 2, 1),
(12, 'Quảng Nam', '0392477615', 2, 1),
(13, 'Quảng Nam', '0392477615', 2, 0),
(14, 'Đà Nẵng', '0392477615', 2, 0),
(15, 'Bình Phước', '0392477615', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `value`, `deleted`) VALUES
(1, 'Nhỏ', 'S', 0),
(2, 'Trung Bình', 'M', 0),
(3, 'Lớn', 'L', 0),
(4, 'Rất Lớn', 'XL', 0),
(5, 'Siêu Lớn', 'XXL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `vip` tinyint(1) DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  `avatar` text DEFAULT 'avatar_default.png',
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `phoneNumber`, `email`, `password`, `address`, `vip`, `deleted`, `avatar`, `role`) VALUES
(1, 'Trần Ngọc Anh', 'Dũng', '0392477615', 'ron19102004@gmail.com', '$2y$10$bNmcOTQO6rVK1/XFke0YCO0T4uT031hnXkpkrfoXN2l2uBv77w6b6', NULL, 0, 0, 'avatar_default.png', 'admin'),
(2, 'Lê Nguyễn Thùy', 'Trang', '0382280722', 'trangle@gmail.com', '$2y$10$wV3lyETs2bXLxbAHrIC72uETSfU4r.K7GPRK197swkh/dZ/jwKcfK', NULL, 0, 0, 'trang.jpg', 'user'),
(3, 'Phan Văn ', 'Tiến', '0392477610', 'tien@gmail.com', '$2y$10$fSLK5YZVDZfRGjUe5VHz2uU6k0Rkk25sPsN4VJtjLb4rfG7dT2mAe', NULL, 0, 0, 'avatar_default.png', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_discounts`
--

CREATE TABLE `user_discounts` (
  `id` bigint(20) NOT NULL,
  `id_discount` bigint(20) DEFAULT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ship` (`id_ship`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `products_colors`
--
ALTER TABLE `products_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `quantity_in`
--
ALTER TABLE `quantity_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `quantity_out`
--
ALTER TABLE `quantity_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_discounts`
--
ALTER TABLE `user_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_discount` (`id_discount`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_colors`
--
ALTER TABLE `products_colors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products_sizes`
--
ALTER TABLE `products_sizes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `quantity_in`
--
ALTER TABLE `quantity_in`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quantity_out`
--
ALTER TABLE `quantity_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ships`
--
ALTER TABLE `ships`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_discounts`
--
ALTER TABLE `user_discounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_ship`) REFERENCES `ships` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `carts` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `products_colors`
--
ALTER TABLE `products_colors`
  ADD CONSTRAINT `products_colors_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `products_colors_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products_images`
--
ALTER TABLE `products_images`
  ADD CONSTRAINT `products_images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD CONSTRAINT `products_sizes_ibfk_1` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `products_sizes_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Constraints for table `quantity_in`
--
ALTER TABLE `quantity_in`
  ADD CONSTRAINT `quantity_in_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `quantity_out`
--
ALTER TABLE `quantity_out`
  ADD CONSTRAINT `quantity_out_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `ships`
--
ALTER TABLE `ships`
  ADD CONSTRAINT `ships_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_discounts`
--
ALTER TABLE `user_discounts`
  ADD CONSTRAINT `user_discounts_ibfk_1` FOREIGN KEY (`id_discount`) REFERENCES `discounts` (`id`),
  ADD CONSTRAINT `user_discounts_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
