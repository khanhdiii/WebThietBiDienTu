-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 01:13 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `electronic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `Id_account` int(10) NOT NULL,
  `Id_role` int(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `BirthDay` date DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Status` bit(1) NOT NULL DEFAULT b'1',
  `Verify_Key` varchar(6) NOT NULL,
  `Verify_Status` bit(1) NOT NULL DEFAULT b'0',
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`Id_account`, `Id_role`, `UserName`, `Password`, `FullName`, `PhoneNumber`, `Email`, `BirthDay`, `City`, `District`, `Address`, `Status`, `Verify_Key`, `Verify_Status`, `CreatedDate`) VALUES
(1, 1, 'admin1', '123', 'Nguyễn Trọng Bình', '0384452653', 'trongbinh1366@gmail.com', NULL, '', '', 'Hà Tĩnh', b'1', '', b'0', '2021-10-17 05:35:50'),
(2, 1, 'admin2', '123', 'Trương Phước Nguyên', '0321546874', 'phuocnguyen878@gmail.com', NULL, '', '', 'Đà Nẵng', b'1', '', b'0', '2021-10-16 06:30:04'),
(18, 2, '123abc', '123456', 'trong binh', '1245687945', 'dsgsh@gmail.com', '2001-01-01', '', '', 'Hòa An - Quận Liên Chiểu - Đà Nẵng', b'1', '', b'0', '2021-10-16 06:30:04'),
(20, 2, 'trongbinh6869', '123456', 'Trọng Bình', '0384452653', 'testacc.v.e1@gmail.com', '1998-01-01', 'Đà Nẵng', 'Quận Cẩm Lệ', 'Hòa An', b'1', '8OJRLI', b'1', '2021-10-17 05:55:10'),
(24, 2, 'khanh', '123123', 'khanh', '032165165132', 'khanhd@gmail.com', '0000-00-00', 'Kon Tum', 'Thành phố KonTum', '12', b'1', 'D7P1KN', b'0', '2021-10-19 05:34:53'),
(26, 2, 'khanh1', '123123', 'fsdfsdf', '13215614651', 'khanh1dfdf@gmail.com', '0001-01-01', 'Kon Tum', 'Thành phố KonTum', 'kon tum', b'1', 'LDW1NZ', b'0', '2021-10-19 18:13:43'),
(27, 1, 'admin', '1', 'admin', '123', 'khanh@gmail.com', NULL, 'Kon Tum', 'Kon Tum', 'Kon Tum', b'1', '', b'1', '2021-10-19 05:33:24'),
(34, 2, 'khanh2', '123123', 'huynh duy khanh', '13215614651', 'khanh12369874@gmail.com', '2021-09-30', 'Bắc Ninh', 'Thành phố KonTum', 'kon tum', b'1', '32V0U8', b'1', '2021-10-28 14:39:33'),
(51, 2, '1224324', '123123', '324423', '43242342334243', 'khanh345fdfsd@gmail.com', '2021-10-08', 'Bắc Ninh', 'Thành phố Bắc Ninh', '1231', b'1', '3TX0YO', b'0', '2021-10-19 10:40:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `Id_Banner` int(10) NOT NULL,
  `BannerName` varchar(50) NOT NULL,
  `BannerImages` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`Id_Banner`, `BannerName`, `BannerImages`, `Status`, `Description`) VALUES
(1, 'Banner 1', 'banner-2.jpg', '1', 'Banner  slide 1'),
(2, 'Banner 2', 'banner1.PNG', '1', 'Banner slide 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `Id_category` int(10) NOT NULL,
  `CategoryIcon` varchar(50) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`Id_category`, `CategoryIcon`, `CategoryName`) VALUES
(1, '<i class=\"fas fa-mobile-alt\"></i>', 'Điện thoại'),
(2, '<i class=\"far fa-clock\"></i>', 'Đồng hồ'),
(3, '<i class=\"fas fa-laptop\"></i>', 'Máy tính'),
(4, '<i class=\"fas fa-tablet-alt\"></i>', 'Tablet'),
(5, '<i class=\"fas fa-headphones-alt\"></i>', 'Head phone'),
(6, '<i class=\"far fa-keyboard\"></i>', 'Phụ kiện'),
(7, '<i class=\"fas fa-gamepad\"></i>', 'Game'),
(8, '<i class=\"fas fa-home\"></i>', 'Smart home'),
(9, '<i class=\"fas fa-mobile\"></i>', 'Máy cũ'),
(10, '<i class=\"fas fas fa-tools\"></i>', 'Sửa chữa'),
(11, '<i class=\"fas fa-sd-card\"></i>', 'Sim thẻ'),
(12, '<i class=\"far fa-newspaper\"></i>', 'Tin tức'),
(13, '<i class=\"fas fa-bolt\"></i>', 'Flash sale'),
(14, '<i class=\"fas fa-fire-alt\"></i>', 'Khuyến mãi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `Id_orders` int(10) NOT NULL,
  `CodeOrder` varchar(10) NOT NULL,
  `Id_account` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Note` varchar(500) DEFAULT NULL,
  `OrderDate` datetime NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`Id_orders`, `CodeOrder`, `Id_account`, `Quantity`, `Note`, `OrderDate`, `Status`) VALUES
(2, 'SH76AEUI0B', 20, 2, '', '2021-10-16 12:10:27', 3),
(3, 'K05MXHK4F2', 20, 2, '', '2021-10-16 12:45:38', 1),
(4, 'OZ47UFPVS1', 20, 3, 'OK nhá shop', '2021-10-16 12:48:04', 3),
(5, 'GJR8VKB0F2', 20, 2, '', '2021-10-16 16:07:54', 4),
(7, '3HLREA561F', 20, 1, '', '2021-10-16 22:26:04', 3),
(8, 'JAKPBL4OFK', 24, 1, '', '2021-10-17 10:17:36', 2),
(9, '6ZYJ0PIURW', 34, 2, '', '2021-10-28 16:53:58', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `Id_order_detail` int(10) NOT NULL,
  `Id_orders` int(10) NOT NULL,
  `Id_product` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`Id_order_detail`, `Id_orders`, `Id_product`, `Quantity`, `Price`) VALUES
(3, 2, 3, 1, '13490000'),
(4, 2, 9, 2, '37290000'),
(5, 3, 28, 1, '990000'),
(6, 4, 32, 3, '5450000'),
(7, 4, 6, 1, '24990000'),
(8, 4, 21, 1, '3190000'),
(9, 5, 25, 1, '8390000'),
(10, 5, 26, 1, '6490000'),
(12, 7, 21, 10, '3190000'),
(13, 8, 2, 1, '29990000'),
(14, 9, 6, 2, '21241500'),
(15, 9, 3, 1, '11466500');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `Id_product` int(10) NOT NULL,
  `Id_supplier` int(10) NOT NULL,
  `Id_category` int(10) NOT NULL,
  `ProductName` varchar(500) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Price` decimal(18,0) NOT NULL,
  `ProductImage` varchar(50) DEFAULT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`Id_product`, `Id_supplier`, `Id_category`, `ProductName`, `Description`, `Price`, `ProductImage`, `Status`) VALUES
(1, 5, 1, 'Apple iPhone 12 Mini - 64GB - Chính hãng VN/A', 'iPhone 12 Mini – chiếc điện thoại “em út” trong thế hệ iPhone 12 năm nay đã chính thức được ra mắt. Mang trong mình những cải tiến vượt trội về hiệu năng trong một thân hình nhỏ bé, iPhone 12 Mini hứa hẹn sẽ làm bùng nổ thị trường di động trong thời gian tới.', '14990000', 'apple-iphone-12-mini-2.png', b'1'),
(2, 5, 1, 'Điện thoại di động Apple iPhone 13 Pro Max - 128GB - Chính hãng VN/A', 'Apple đã chính thức ra mắt dòng iPhone 2021 với tên gọi iPhone 13 Series. Trong đó iPhone 13 Pro Max là phiên bản cao cấp nhất với màn hình lớn, tốc độ làm tươi 120Hz và dung lượng lưu trữ lên tới 1TB.', '29990000', 'hinhdienthoai1.png', b'1'),
(3, 5, 1, 'iPhone 11 - 64GB - Chính hãng', 'iPhone 11 - siêu phẩm được mong chờ nhất năm 2019 của Apple chuẩn bị ra mắt. Với những cải tiến vượt trội, phiên bản iPhone mới nhất hứa hẹn sẽ làm bùng nổ thị trường công nghệ.', '13490000', 'hinhdienthoai2.png', b'1'),
(4, 5, 1, 'Apple iPhone 12 Pro Max - 128GB - Chính hãng VN/A', 'Cuối cùng sau nhiều ngày tháng trì hoãn, chiếc điện thoại iPhone 12 Pro Max được mong chờ trong suốt thời gian qua cũng đã lộ diện. Đây là sản phẩm smartphone cao cấp nhất của Apple với hàng loạt nâng cấp đáng kể so với thế hệ iPhone trước.', '28490000', 'hinhdienthoai3.png', b'1'),
(5, 5, 2, 'Apple Watch SE GPS, 40mm Aluminum Case with Sport Band - Chính hãng (VN/A)', 'Apple Watch siêu sang chảnh, lịch lãm tôn lên giá trị người đeo :))', '6390000', 'dongho1.png', b'1'),
(6, 5, 3, 'Apple M1 - MacBook Air 13\" 256GB 2020 - Chính hãng Apple Việt Nam', 'Năm 2020, Apple đã nâng cấp chiếc MacBook Air của mình với một hiệu năng vô cùng mạnh mẽ, tích hợp chip M1 thuộc thế hệ Apple Silicon có khả năng tối ưu hoá tốt, đem lại trải nghiệm sử dụng, làm việc, học tập và giải trí ấn tượng cho người dùng.', '24990000', 'maytinh1.png', b'1'),
(7, 5, 4, 'Máy tính bảng Apple iPad Pro M1 11\" - (2021) - Wifi - 128GB - Chính hãng Apple Việt Nam', 'Chính thức ra mắt trong sự kiện Spring Loaded 2021 của Apple, iPad Pro M1 2021 chính là tâm điểm được nhiều người chú ý nhất.', '19990000', 'tablet1.png', b'1'),
(8, 5, 5, 'Apple AirPods Pro - Chính Hãng VN/A', 'AirPods Pro là chiếc tai nghe không dây nổi tiếng đến từ thương hiệu Apple. Với thiết kế tinh tế cùng công nghệ hiện đại, sản phẩm này sẽ mang đến cho bạn những trải nghiệm âm thanh sâu lắng, chân thực.', '4990000', 'tainghe1.png', b'1'),
(9, 5, 3, 'Laptop Apple M1 - MacBook Pro 13\" 16GB/256GB 2020 - Chính hãng Apple Việt Nam', 'Sở hữu một thiết kế cực kì sang trọng nhờ việc được hoàn thiện từ kim loại nguyên khối cao cấp được kế thừa từ những dòng sản phẩm trước đây, cùng với một hiệu năng mạnh mẽ tiềm ẩn bên trong với bộ vi xử lý Apple M1 mới, MacBook Pro M1 2020 hứa hẹn sẽ mang lại một trải nghiệm hoàn toàn khác biệt dành cho những chủ nhân sở hữu mẫu máy này.', '37290000', 'maytinh2.png', b'1'),
(10, 5, 3, 'Apple M1 - MacBook Pro 13\' 512GB 2020 - Chính hãng Apple Việt Nam', 'Sở hữu một thiết kế cực kì sang trọng nhờ việc được hoàn thiện từ kim loại nguyên khối cao cấp được kế thừa từ những dòng sản phẩm trước đây, cùng với một hiệu năng mạnh mẽ tiềm ẩn bên trong với bộ vi xử lý Apple M1 mới, MacBook Pro M1 2020 hứa hẹn sẽ mang lại một trải nghiệm hoàn toàn khác biệt dành cho những chủ nhân sở hữu mẫu máy này.', '35790000', 'maytinh3.png', b'1'),
(11, 5, 3, 'Apple M1 - MacBook Air 13\" 512GB 2020 - Chính hãng Apple Việt Nam', 'Năm 2020, Apple đã nâng cấp chiếc MacBook Air của mình với một hiệu năng vô cùng mạnh mẽ, tích hợp chip M1 thuộc thế hệ Apple Silicon có khả năng tối ưu hoá tốt, đem lại trải nghiệm sử dụng, làm việc, học tập và giải trí ấn tượng cho người dùng.', '30590000', 'maytinh4.png', b'1'),
(12, 5, 3, 'Laptop Apple M1 - MacBook Pro 13\" 16GB/512GB 2020 - Chính hãng Apple Việt Nam', 'Sở hữu một thiết kế cực kì sang trọng nhờ việc được hoàn thiện từ kim loại nguyên khối cao cấp được kế thừa từ những dòng sản phẩm trước đây, cùng với một hiệu năng mạnh mẽ tiềm ẩn bên trong với bộ vi xử lý Apple M1 mới, MacBook Pro M1 2020 hứa hẹn sẽ mang lại một trải nghiệm hoàn toàn khác biệt dành cho những chủ nhân sở hữu mẫu máy này.', '42290000', 'maytinh5.png', b'1'),
(13, 1, 4, 'Samsung Galaxy Tab S7 FE (T735) - Chính hãng', 'Dù là phục vụ nhu cầu làm việc hay giải trí, vui chơi thì một chiếc máy tính bảng màn hình lớn chắc chắn sẽ luôn là sự lựa chọn tối ưu nhất. Nếu bạn đang tìm kiếm một thiết bị như vậy thì Samsung Galaxy Tab S7 FE sẽ đem đến trải nghiệm cực đã với hiệu năng tuyệt đỉnh và bút S Pen chuyên nghiệp.', '12790000', 'dienthoai1.png', b'1'),
(14, 1, 4, 'Máy tính bảng Samsung Galaxy Tab A7 Lite (T225) - Chính hãng', 'Ngoài Apple đang chiếm lĩnh thị trường máy tính bảng thì Samsung cũng đang dần chiếm được cảm tình của người dùng. Với sự ra mắt của Galaxy Tab A7 Lite, thiết kế siêu mỏng, hiệu năng vượt trội chắc chắn sẽ là người bạn đồng hành đầy phong cách trong cuộc sống.', '4150000', 'tablet2.png', b'1'),
(15, 1, 4, 'Máy tính bảng Samsung Galaxy Tab A7 2020 (T505) - Chính hãng', 'Ra mắt vào cuối năm 2020, Galaxy Tab A7 là một sản phẩm tablet tầm trung của Samsung. Đây là lựa chọn giá tốt cho những người dùng muốn trải nghiệm giải trí bất tận trên màn hình lớn mà không phải bỏ ra số tiền quá lớn.', '7290000', 'tablet3.png', b'1'),
(16, 1, 4, 'Máy tính bảng Samsung Galaxy Tab S7 Plus - Chính hãng', 'Ra mắt vào cuối năm 2020, Galaxy Tab S7+ là dòng máy tính bảng cao cấp mới nhất của Samsung. Đây là chiếc máy tính bảng đa năng, hoàn toàn có khả năng thay thế sử dụng như laptop thường ngày khi kết hợp với các phụ kiện bàn phím, S-Pen và giao diện DeX. ', '20290000', 'tablet4.png', b'1'),
(17, 1, 1, 'Điện thoại di động Samsung Galaxy Z Flip3 5G - 128GB - Chính hãng', 'Tiếp nối Galaxy Z Flip 5G được ra mắt vào năm 2020, Samsung Galaxy Z Flip3 5G mới của năm nay được kỳ vọng sẽ là một sự tiên phong về smartphone gập với thiết kế hoàn toàn mới, màn hình phụ lớn hơn và một số thông số kỹ thuật được nâng cấp đáng kể.', '24990000', 'dienthoai2.png', b'1'),
(18, 1, 1, 'Điện thoại di động Samsung Galaxy A72 - Chính hãng', 'Samsung là thương hiệu không còn xa lạ trên thị trường điện thoại thông minh. Bên cạnh các dòng flagship thuộc phân khúc cao cấp, Samsung ngày càng đầu tư nhiều cho các mẫu điện thoại tầm trung của mình. Mới đây, Samsung đã giới thiệu đến thị trường chiếc smartphone Galaxy A72 chính hãng. Nếu bạn là một Sam fan cụ thể là Galaxy A fan thì đừng bỏ qua sản phẩm này nhé. ', '9890000', 'dienthoai3.png', b'1'),
(19, 1, 1, 'Điện thoại di động Samsung Galaxy S21 Plus 256GB 5G - Chính hãng', 'Mở đầu cuộc chơi flagship năm 2021, Samsung đã giới thiệu chiếc Galaxy S21+ bên cạnh Galaxy S21 và S21 Ultra. Đây là một trong những chiếc máy cao cấp nhất của Samsung hiện tại với đầu tư xứng đáng về cả phần cứng lẫn phần mềm.', '22450000', 'dienthoai4.png', b'1'),
(20, 6, 1, 'Điện thoại di động Xiaomi Redmi 10 - 4GB/128GB - Chính Hãng DGW', 'Hiện tại, Redmi đã trở thành dòng sản phẩm nổi tiếng của Xiaomi và chiếm lĩnh một vị trí nhất định ở phân khúc tầm trung. Tháng 8/2021, hãng đã trình làng chiếc Redmi 10 hoàn toàn mới, hứa hẹn sẽ giành được sự chú ý nhờ sở hữu một số nâng cấp mới mà giá cả lại hợp lý.', '4290000', 'dienthoai5.png', b'1'),
(21, 6, 1, 'Điện thoại di động Xiaomi Redmi 9C - 4GB/128GB - Chính hãng DGW', 'Redmi 9C là mẫu điện thoại nằm trong phân khúc giá rẻ của Xiaomi ngay từ khi ra mắt đã thu hút được sự quan tâm của người dùng bởi thiết kế đẹp, cấu hình ổn trong tầm giá. ', '3190000', '9c212.png', b'1'),
(22, 6, 1, 'Điện thoại di động Xiaomi Redmi Note 10S - Chính hãng', 'Xiaomi công bố cho ra mắt Redmi Note 10S – dòng smartphone giá tầm trung đem lại chất lượng màn hình hiển thị cao, bộ bốn camera hỗ trợ chụp hình tối ưu, chipset Helio G95 và dung lượng pin lên đến 5000mAh.', '5890000', '10s-2.png', b'1'),
(23, 8, 1, 'Điện thoại di động OPPO Reno6 5G - Chính Hãng', 'Nối tiếp sự thành công của dòng Reno5, OPPO mới đây đã trình làng bộ đôi siêu phẩm thuộc dòng OPPO Reno6 series có cấu hình mạnh mẽ, thiết kế ấn tượng. Trong đó, chiếc OPPO Reno6 5G với những cải tiến mới mẻ hơn thế hệ tiền nhiệm chắc chắn sẽ là một siêu phẩm trên thị trường smartphone hiện nay mà bạn không nên bỏ lỡ!', '12990000', 'image-removebg-preview-3.png', b'1'),
(24, 8, 1, 'OPPO A54 - Chính hãng', 'OPPO - một trong những hang sản xuất smartphone lớn nhất Trung Quốc gần đây đã giới thiệu smartphone A54 đến với toàn cầu, chiếc điện thoại thông minh đi kèm với hỗ trợ mạng 5G cùng thiết kế ấn tượng sẽ đem lại trải nghiệm tuyệt vời nhất đến với người tiêu dùng.', '4190000', 'a54-combo-product-blue.png', b'1'),
(25, 1, 2, 'Đồng hồ thông minh Samsung Galaxy Watch 4 Classic BT 46mm - (R890) - Chính hãng', 'Samsung mới đây đã cho ra mắt Galaxy Watch4 Classic - thế hệ kế nhiệm cho dòng Watch 3 trình làng năm ngoái. Chiếc smartwatch này có nhiều điểm cải tiến mới về cấu hình, hệ điều hành và các tính năng theo dõi sức khỏe khác vô cùng “đáng đồng tiền bát gạo\" khiến bạn muốn sở hữu.', '8390000', 'watch-4-classic-1.png', b'1'),
(26, 1, 2, 'Đồng hồ thông minh Samsung Galaxy Watch 4 44mm BT - (R870) - Chính Hãng', 'Galaxy Watch4 Bluetooth là một trong bốn phiên bản đồng hồ thông minh mới nhất vừa được Samsung ra mắt. Sản phẩm này được tạo ra để trở thành người bạn đồng hành mỗi ngày trên hành trình hoàn thiện bản thân của bạn.', '6490000', 'image-removebg-preview-7.png', b'1'),
(27, 8, 2, 'Đồng hồ thông minh Oppo Watch 41mm dây silicone - Chính hãng', 'Không chỉ những tín đồ công nghệ mà những người dùng đồ điện tử thông thường cũng nên sắm cho mình một chiếc đồng hồ thông minh bên người, để giúp mọi thứ trở nên tiện dụng hơn trong đời sống hàng ngày. Nếu bạn đang tìm kiếm một chiếc đồng hồ thông minh với mức giá tầm trung, hãy cân nhắc chiếc đồng hồ thông minh Oppo Watch 41mm dây silicone tại Hoàng Hà Mobile.', '4090000', 'image-removebg-preview-9.png', b'1'),
(28, 6, 2, 'Vòng đeo tay thông minh Xiaomi Mi Band 6 - Chính hãng', 'Xiaomi Mi Band 6 có thể coi là chiếc vòng đeo tay kể thừa và phát triển cực tốt những tinh hoa của thế hệ trước. Màn hình AMOLED, hỗ trợ đo SpO2, đo nhịp tim, nhiều chế độ tập luyện thể thao… là những gì người dùng sẽ được trải nghiệm.', '990000', 'band-6.png', b'1'),
(29, 9, 5, 'Tai nghe JBL Quantum 400 - Chính hãng', 'Tai nghe siêu phẩm Yasuo, chất lượng vũ trụ Marvel', '1990000', 'image-removebg-preview-2.png', b'1'),
(30, 1, 5, 'Tai nghe Samsung Galaxy Buds 2 - Chính hãng', 'Trong vài năm qua, Samsung đã phát hành một số tai nghe không dây thực sự để cạnh tranh với Apple AirPods và AirPods Pro. Và ngày 11 tháng 8, Samsung chính thức giới thiệu mẫu tai nghe không dây tiếp theo của mình. Sxamsung Galaxy Buds2 là cái tên được “gã khổng lồ công nghệ” này lựa chọn. Chiếc tai nghe này được ra mắt cùng với Galaxy Z Fold và Z Flip3 trong sự kiện Galaxy Unpacked 2021.', '2790000', 'samsung-galaxy-buds2-chinh-hang-6.png', b'1'),
(31, 8, 5, 'Tai nghe Bluetooth Oppo Enco Buds - Chính Hãng', 'Oppo Enco Buds sở hữu thiết kế thanh lịch, sang trọng. Thân tai nghe trông khá bóng bẩy, lấp lánh như vỏ thủy tinh dưới ánh nắng. Đây là một thiết kế thực sự ấn tượng, thu hút mọi ánh nhìn. Mỗi bên tai nghe chỉ nặng 4 gram nên khi đeo không hề mang lại cảm giác khó chịu, ngược lại còn rất thoải mái, chắc chắn.', '690000', 'image-removebg-preview.png', b'1'),
(32, 9, 5, 'Loa Bluetooth JBL Xtreme 3 - Chính hãng', 'JBL là thương hiệu không còn xa lạ với người chơi “hệ âm thanh”. Với thiết kế nhỏ gọn, tiện lợi mà chất âm vô cùng ấn tượng, những chiếc loa JBL là sự lựa chọn của rất nhiều người dùng tại Việt Nam.', '5450000', 'image-removebg-preview-14.png', b'1'),
(33, 1, 3, 'Apple AirPods Pro', 'A', '1111', '1111.png', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_reviews`
--

CREATE TABLE `product_reviews` (
  `Id_product_review` int(10) NOT NULL,
  `Id_account` int(10) NOT NULL,
  `Id_product` int(10) NOT NULL,
  `Content` varchar(50) NOT NULL,
  `StarRating` int(10) NOT NULL,
  `Status` bit(1) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `Id_promotion` int(10) NOT NULL,
  `PromotionName` varchar(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Status` int(3) NOT NULL DEFAULT 1,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`Id_promotion`, `PromotionName`, `StartDate`, `EndDate`, `Status`, `CreatedDate`) VALUES
(1, 'Ngày 2/9', '2021-09-02', '2021-09-05', 3, '2021-09-30 18:31:35'),
(3, 'Back to school', '2021-09-01', '2021-10-15', 3, '2021-10-16 19:21:54'),
(4, 'Năm 2021', '2021-01-01', '2021-10-25', 3, '2021-10-28 14:28:37'),
(5, 'Black Friday', '2021-10-26', '2021-11-27', 2, '2021-10-28 14:28:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion_detail`
--

CREATE TABLE `promotion_detail` (
  `Id_Promotion_detail` int(10) NOT NULL,
  `Id_product` int(10) NOT NULL,
  `Id_promotion` int(10) NOT NULL,
  `Ratio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `promotion_detail`
--

INSERT INTO `promotion_detail` (`Id_Promotion_detail`, `Id_product`, `Id_promotion`, `Ratio`) VALUES
(18, 3, 5, 15),
(19, 4, 5, 15),
(20, 5, 5, 15),
(21, 6, 5, 15),
(22, 7, 5, 15),
(27, 19, 5, 11),
(28, 20, 5, 11),
(29, 21, 5, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `Id_role` int(10) NOT NULL,
  `RoleName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`Id_role`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Thành viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `Id_supplier` int(10) NOT NULL,
  `Supplier_Name` varchar(50) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`Id_supplier`, `Supplier_Name`, `Description`, `PhoneNumber`, `Email`, `Address`) VALUES
(1, 'SamSung', 'Samsung là một tập đoàn đa quốc gia khổng lồ của H', '1800588889', 'samsungvn@gmail.com', 'Số 2, đường Hải Triều, Phường Bến Nghé, Quận 1, TP'),
(3, 'Asus', 'AsusTek Computer Inc. là một tập đoàn đa quốc gia ', '01235649656', 'acer@gmail.com', 'Bắc Đầu, Đài Bắc, Đài Loan'),
(4, 'Lenovo', 'Lenovo Group Ltd. là tập đoàn đa quốc gia về công ', '054132216', 'lenovo@gmail', 'Vịnh Quarry, Hồng Kông'),
(5, 'Apple', 'Apple Inc. là một tập đoàn công nghệ đa quốc gia c', '031323046', 'apple@gmail.com', 'Cupertino, California, Hoa Kỳ'),
(6, 'Xiaomi', 'Tập đoàn lớn của Trung Quốc', '548645613165', 'xiaomi@gmail.com', 'Quảng Châu, Trung Quốc'),
(7, 'Huawei', 'Tập đoàn supper lớn của Tung Của', '1314544464556', 'huawei@bla.com', 'TaiWan,CHINA'),
(8, 'Oppo', 'Lại là tập công ty lớn của anh Tung Của', '44587441125', 'oppo@bede.com', 'Mengbailuoli,Taiwan,China'),
(9, 'JBL', 'Nhà sản xuất các thiết bị âm thanh đỉnh cao', '0163541565', 'jbl@gmail.com', 'Mengbaiok,Singapo');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Id_account`),
  ADD KEY `FK_Acount_Type` (`Id_role`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`Id_Banner`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id_category`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id_orders`),
  ADD KEY `FK_Accounts3` (`Id_account`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`Id_order_detail`),
  ADD KEY `FK_Orders` (`Id_orders`),
  ADD KEY `FK_Product` (`Id_product`) USING BTREE;

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id_product`),
  ADD KEY `FK_Supplier` (`Id_supplier`),
  ADD KEY `FK_Category` (`Id_category`);

--
-- Chỉ mục cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`Id_product_review`),
  ADD KEY `FK_Accounts1` (`Id_account`),
  ADD KEY `FK_Products1` (`Id_product`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`Id_promotion`);

--
-- Chỉ mục cho bảng `promotion_detail`
--
ALTER TABLE `promotion_detail`
  ADD PRIMARY KEY (`Id_Promotion_detail`),
  ADD KEY `FK_Products2` (`Id_product`),
  ADD KEY `FK_Promotion` (`Id_promotion`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id_role`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Id_supplier`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Id_account` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `Id_Banner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `Id_category` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `Id_orders` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `Id_order_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `Id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `Id_product_review` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Id_promotion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `promotion_detail`
--
ALTER TABLE `promotion_detail`
  MODIFY `Id_Promotion_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `Id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `FK_Acount_Type` FOREIGN KEY (`Id_role`) REFERENCES `role` (`Id_role`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_Accounts3` FOREIGN KEY (`Id_account`) REFERENCES `accounts` (`Id_account`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `FK_Orders` FOREIGN KEY (`Id_orders`) REFERENCES `orders` (`Id_orders`),
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`Id_product`) REFERENCES `products` (`Id_product`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`Id_category`) REFERENCES `category` (`Id_category`),
  ADD CONSTRAINT `FK_Supplier` FOREIGN KEY (`Id_supplier`) REFERENCES `supplier` (`Id_supplier`);

--
-- Các ràng buộc cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `FK_Accounts1` FOREIGN KEY (`Id_account`) REFERENCES `accounts` (`Id_account`),
  ADD CONSTRAINT `FK_Products1` FOREIGN KEY (`Id_product`) REFERENCES `products` (`Id_product`);

--
-- Các ràng buộc cho bảng `promotion_detail`
--
ALTER TABLE `promotion_detail`
  ADD CONSTRAINT `FK_Products2` FOREIGN KEY (`Id_product`) REFERENCES `products` (`Id_product`),
  ADD CONSTRAINT `FK_Promotion` FOREIGN KEY (`Id_promotion`) REFERENCES `promotion` (`Id_promotion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
