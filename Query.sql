-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 25, 2023 lúc 11:15 AM
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
-- Cơ sở dữ liệu: `db_phutungxemay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_admin`
--

CREATE TABLE `bang_admin` (
  `Idadmin` int(11) NOT NULL,
  `Tenadmin` varchar(255) NOT NULL,
  `Emailadmin` varchar(100) NOT NULL,
  `Useradmin` varchar(255) NOT NULL,
  `Matkhauadmin` varchar(255) NOT NULL,
  `Capdoadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_admin`
--

INSERT INTO `bang_admin` (`Idadmin`, `Tenadmin`, `Emailadmin`, `Useradmin`, `Matkhauadmin`, `Capdoadmin`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_danhmuctintuc`
--

CREATE TABLE `bang_danhmuctintuc` (
  `Iddanhmuc` int(11) NOT NULL,
  `Tieude` varchar(255) NOT NULL,
  `Mota` text NOT NULL,
  `Tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_danhmuctintuc`
--

INSERT INTO `bang_danhmuctintuc` (`Iddanhmuc`, `Tieude`, `Mota`, `Tinhtrang`) VALUES
(1, 'Sports news', 'Good news', 1),
(2, 'Tech news', 'Good news', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_dathang`
--

CREATE TABLE `bang_dathang` (
  `Iddathang` int(11) NOT NULL,
  `Idsanpham` int(11) NOT NULL,
  `Tensp` varchar(255) NOT NULL,
  `Idkhachhang` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Giaban` varchar(255) NOT NULL,
  `Anhsanpham` varchar(255) NOT NULL,
  `Tinhtrang` int(11) NOT NULL DEFAULT 0,
  `Ngaymua` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_dathang`
--

INSERT INTO `bang_dathang` (`Iddathang`, `Idsanpham`, `Tensp`, `Idkhachhang`, `Soluong`, `Giaban`, `Anhsanpham`, `Tinhtrang`, `Ngaymua`) VALUES
(33, 55, 'Bộ Nhông sên dĩa Light cho Honda Sonic', 6, 1, '420000', '1938141953.jpg', 2, '2023-03-25 08:38:43'),
(34, 69, 'The genuine DNA (54) DNA Pod Filter for motorcycles', 6, 1, '850000', 'bc4bc62be6.jpg', 2, '2023-03-31 10:19:15'),
(35, 68, 'The genuine DNA air filter for Honda SH350i', 6, 1, '2500000', '891ad1d864.jpg', 2, '2023-03-31 10:19:28'),
(36, 63, 'The Carbon Brake Lever for Winner', 6, 1, '1300000', '2c3a367940.jpg', 2, '2023-03-31 10:19:42'),
(37, 61, 'The RCB 5-spoke Wheel is a genuine product designed for the Exciter 150 (1.6-1.6)', 6, 1, '2500000', 'd49422fd38.jpg', 2, '2023-03-31 10:19:53'),
(38, 40, 'RCB Disc Brake (genuine) for Click/Vario.', 6, 1, '90000', 'ccefb3211d.jpg', 2, '2023-03-31 10:20:07'),
(39, 47, 'The dry battery for Motobatt Gel MTZ5S.', 8, 1, '420000', '1acd28865c.jpg', 2, '2023-03-31 10:40:30'),
(40, 39, 'Genuine RCB Front Disc Brake for Exciter 150/155, NVX motorcycles.', 8, 1, '90000', 'af28faaf58.jpg', 2, '2023-03-31 10:40:30'),
(41, 66, 'The latest model of KingSpeed 220mm disc brake with 4 holes for Wave and AB motorcycles', 8, 1, '520000', '2a468f02fe.jpg', 2, '2023-03-31 10:40:30'),
(42, 37, 'The Light Chain Sprocket Set for Yamaha Sirius/Jupiter', 8, 1, '400000', 'b8e1be341e.jpg', 2, '2023-03-31 10:40:30'),
(43, 70, 'The K&N air filter cleaning kit (genuine)', 6, 1, '550000', '5bffef3285.jpg', 2, '2023-04-06 11:33:46'),
(44, 73, 'The K&N YA-1515 air filter is designed for the Exciter 150 motorcycle. ', 6, 1, '950000', '7818007db0.jpg', 2, '2023-04-10 07:34:27'),
(45, 72, 'The genuine Uma air filter designed for Vario, Click, and Air Blade 125 motorcycles. ', 6, 1, '280000', '0c901306d8.jpg', 2, '2023-04-10 07:52:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_giohang`
--

CREATE TABLE `bang_giohang` (
  `Idgiohang` int(11) NOT NULL,
  `Idsanpham` int(11) NOT NULL,
  `Idgiaodich` varchar(255) NOT NULL,
  `Tensp` varchar(255) NOT NULL,
  `Giaban` varchar(255) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Anhsanpham` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_giohang`
--

INSERT INTO `bang_giohang` (`Idgiohang`, `Idsanpham`, `Idgiaodich`, `Tensp`, `Giaban`, `Soluong`, `Anhsanpham`) VALUES
(89, 72, '6hr2cehrdl6ogeml2daki67a24', 'The genuine Uma air filter designed for Vario, Click, and Air Blade 125 motorcycles. ', '280000', 1, '0c901306d8.jpg'),
(90, 72, 'fh9at9n2rps9qfr1tbk24l6c1t', 'The genuine Uma air filter designed for Vario, Click, and Air Blade 125 motorcycles. ', '280000', 1, '0c901306d8.jpg'),
(91, 72, 'eu1iobjjcv3154q10qgghkbi2l', 'The genuine Uma air filter designed for Vario, Click, and Air Blade 125 motorcycles. ', '280000', 1, '0c901306d8.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_khachhang`
--

CREATE TABLE `bang_khachhang` (
  `Idkhachhang` int(11) NOT NULL,
  `Tenkhachhang` varchar(255) NOT NULL,
  `Diachi` varchar(255) NOT NULL,
  `Sophone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_khachhang`
--

INSERT INTO `bang_khachhang` (`Idkhachhang`, `Tenkhachhang`, `Diachi`, `Sophone`, `Email`, `Matkhau`) VALUES
(6, 'test', 'Cần Thơ', '0815378057', 'heinekencn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'Trần Thanh Nhân', 'Huyện Cái Nước', '+841275378057', 'heinekencn84@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'test', '123456', '0123456789', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_loaisp`
--

CREATE TABLE `bang_loaisp` (
  `Idloai` int(11) NOT NULL,
  `Tenloai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_loaisp`
--

INSERT INTO `bang_loaisp` (`Idloai`, `Tenloai`) VALUES
(39, 'Motorcycle Chain Sprocket'),
(40, 'Motorcycle Brake Pads'),
(41, 'Shock Absorber'),
(42, 'Battery'),
(43, 'Motorcycle Wheel Rim'),
(44, 'Motorcycle Brake Lever'),
(45, 'Motorcycle Disk Brake'),
(46, 'Motorcycle Air Filter');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_sanpham`
--

CREATE TABLE `bang_sanpham` (
  `Idsanpham` int(11) NOT NULL,
  `Tensp` varchar(255) NOT NULL,
  `Giaban` varchar(255) NOT NULL,
  `Anhsanpham` varchar(255) NOT NULL,
  `Mota` text NOT NULL,
  `Noidung` text NOT NULL,
  `Idloaisp` int(11) NOT NULL,
  `Idthuonghieusp` int(11) NOT NULL,
  `Thuoctinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_sanpham`
--

INSERT INTO `bang_sanpham` (`Idsanpham`, `Tensp`, `Giaban`, `Anhsanpham`, `Mota`, `Noidung`, `Idloaisp`, `Idthuonghieusp`, `Thuoctinh`) VALUES
(37, 'The Light Chain Sprocket Set for Yamaha Sirius/Jupiter', '400000', 'b8e1be341e.jpg', 'The Light Chain Sprocket Set for Yamaha Sirius/Jupiter gasoline engines is a product that provides superior performance and durability. This set includes chain sprockets that are specifically designed to work perfectly with your Sirius/Jupiter motorcycle, giving you a smooth and reliable ride. Its lightweight design allows for better acceleration and performance, making it an excellent upgrade for those who are looking to enhance their bike\'s performance. The chain in this sprocket set is coated with a state-of-the-art electroplating technology that gives it a sleek golden appearance. The sprocket set is made of durable steel that withstands the test of time. This product is manufactured by reputable brand Light Speed Racing in Vietnam, known for providing high-quality products at a reasonable price. The Light Chain Sprocket Set for Yamaha Sirius/Jupiter gasoline engines can be easily installed as a direct replacement for the original parts and shares the same specifications. Upgrade your motorcycle\'s performance with this reliable and lightweight sprocket set from Light Speed Racing.\r\n', 'The Light Chain Sprocket Set for Yamaha Sirius/Jupiter gasoline engines features a 428HS 104-link gold-plated chain and a 15-36 tooth steel sprocket set that provides long-lasting durability over time. The chain is coated with state-of-the-art technology using advanced electroplating to achieve its golden color. This product is manufactured by reputable brand Light Speed Racing in Vietnam, known for providing high-quality products at a reasonable price. The Light Chain Sprocket Set for Yamaha Sirius/Jupiter gasoline engines can be easily installed as a direct replacement for the original parts and shares the same specifications. It comes with a warranty of either 6 months or 12,000 kilometers, whichever comes first. Upgrade your Yamaha Sirius/Jupiter motorcycle\'s performance with this reliable and durable sprocket set from Light Speed Racing. The set is designed to be an exact match for the original parts, so it can be easily installed and fit perfectly with the same specifications. The set is made of durable steel that can withstand the test of time and is coated in high-quality electroplating that gives it a sleek gold appearance.', 39, 24, 1),
(38, 'The Light Chain Sprocket Set for Yamaha Exciter 135 5-gear model 2011-2015', '420000', '4190e90f0c.jpg', 'The Light Chain Sprocket Set for Yamaha Exciter 135 5-gear model 2011-2015 is a product that provides excellent performance and durability. This set includes chain sprockets that are designed to work perfectly with your Exciter 135 motorcycle, ensuring a smooth and reliable ride. Its lightweight design allows for better acceleration and performance, making it an excellent upgrade for those who want to enhance their bike\'s performance. This sprocket set is made using high-quality materials, ensuring long-lasting durability and reliability. So, if you\'re looking for a lightweight and reliable sprocket set for your Yamaha Exciter 135, this Light Chain Sprocket Set is an excellent choice.\r\n', 'The Light Chain Sprocket Set for Yamaha Exciter 135 5-gear model 2011-2015 features a 428HS 122-link gold-plated chain and a 14-38 tooth steel sprocket set that provide long-lasting durability over time. The chain is coated with a state-of-the-art technology using advanced electroplating to achieve its golden color. This product is manufactured by reputable brand Light Speed Racing in Vietnam, known for providing high-quality products at a reasonable price. The Light Chain Sprocket Set for the Exciter 135 5-gear model can be easily installed as a direct replacement for the original parts and shares the same specifications. It comes with a warranty of either 6 months or 12,000 kilometers, whichever comes first. Upgrade your motorcycle\'s performance with this reliable and durable sprocket set from Light Speed Racing.', 39, 24, 1),
(39, 'Genuine RCB Front Disc Brake for Exciter 150/155, NVX motorcycles.', '90000', 'af28faaf58.jpg', 'The Genuine RCB Front Disc Brake for Exciter 150/155, NVX motorcycles is a high-quality brake upgrade designed for optimum performance and safety. This product is authentic, ensuring that you get top-quality materials and the highest level of suitability for your motorbike. With this brake, you can enjoy efficient and smooth braking, which enhances both your safety and overall riding experience. So, if you want the best braking performance for your Exciter 150/155, NVX motorcycle, the Genuine RCB Front Disc Brake is the ideal choice.\r\n', 'The Genuine RCB Front Disc Brake for Exciter 150, Exciter 155, NVX is compatible with high-quality tires, ensuring a smooth and comfortable ride. The RCB disc brake is designed to provide maximum safety and minimize damage to the brake disc. Upgrade to the RCB front disc brake for the best braking performance and optimal safety when riding your Exciter 150, Exciter 155 or NVX.', 40, 25, 1),
(40, 'RCB Disc Brake (genuine) for Click/Vario.', '90000', 'ccefb3211d.jpg', 'The RCB Disc Brake (genuine) for Click/Vario is an authentic product that is designed to enhance the braking system of your motorcycle. This brake is specifically designed for use with the Click and Vario models and provides incredible stopping power with smooth operation. It is made using high-quality materials, ensuring long-lasting durability and reliability. The RCB disc brake provides maximum safety and helps prevent damage to the brake disc. Upgrading to this brake can significantly improve your overall riding experience by enhancing your bike\'s performance and ensuring that you can control it with ease. With the RCB Disc Brake, you can rest assured that you are getting a top-quality product that is optimized for use with your bike, ensuring the best and safest riding experience possible.\r\n', 'RCB Disc Brake is a genuine product designed for Click/Vario motorcycles. This product is manufactured by RCB - a well-known brand in the motorcycle accessories industry. The RCB Disc Brake is constructed with high-quality materials to provide excellent braking performance and durability. The brake rotor is precision-machined to ensure smooth operation and reduced friction. The 4-piston caliper provides excellent stopping power and stability during braking. The product is treated with an anti-corrosion coating and coated with a black matte finish to ensure long-lasting durability and resistance to impact and abrasion. Installing the RCB Disc Brake on your Click/Vario motorcycle will greatly enhance the braking performance and reliability of your vehicle. With its excellent quality and durability, this product is a great choice for riders who demand the best from their motorcycle.', 40, 25, 1),
(41, 'Authentic RCB Rear Disc Brake (genuine) for Winner 150', '90000', '672631dc10.jpg', 'The genuine RCB rear disc brake kit is designed specifically for the Honda Winner motorcycle. It is a high-performance aftermarket product that enhances the stopping power and overall efficiency of the motorcycle\'s rear brake system. The RCB rear disc brake kit includes a high-quality disc brake rotor, along with a caliper and brake pads that are specifically designed to work together with the Honda Winner\'s original braking system. The kit also includes all necessary mounting hardware for easy installation. The RCB rear disc brake kit is made using premium-grade materials to ensure maximum durability and performance. It provides superior braking power and greater heat dissipation, which helps to reduce brake fade and ensure consistent performance even under heavy use. This brake kit is an ideal choice for riders who demand the best possible braking performance from their Honda Winner motorcycle. It is easy to install and directly replaces the original rear drum brake system, providing a significant improvement in the overall braking power and control of the motorcycle. With the RCB rear disc brake kit, Honda Winner riders can enjoy a more reliable and efficient braking system that ensures safety and confidence on the road.', 'RCB Rear Disc Brake is an authentic disc brake product designed specifically for the Winner 150 motorcycle. This product is manufactured by the reputable RCB brand - one of the leading brands in the motorcycle accessories industry. The RCB Rear Disc Brake with a diameter of 220mm is highly accurate in machining, optimizing brake performance and reducing friction. In addition, the product is equipped with a 4-notch piston set to increase stability during braking and reduce wear and tear. The anti-corrosion coating and black matte paint on the surface of the product make the RCB Rear Disc Brake highly durable and resistant to impact and abrasion during use. With significantly improved braking efficiency and excellent reliability, the RCB Rear Disc Brake product will be an excellent choice to enhance the driving experience on your Winner 150.', 40, 25, 1),
(42, 'Genuine Vietnam oil tank Nitron shock absorber for Wave, Dream, Future', '4900000', '39c6f1dd17.jpg', 'The Nitron shock absorber is a high-quality aftermarket suspension product designed for use on the Honda Wave, Dream, and Future motorcycles. It is a genuine product made in Vietnam, using premium-grade materials and advanced manufacturing processes that ensures its durability and performance. The Nitron shock absorber features a high-performance oil-filled design that delivers superior damping characteristics and ensures consistent performance even in the toughest conditions. It is equipped with a fully-adjustable suspension system that can be fine-tuned to suit individual riding styles and preferences. With its locally made genuine quality, the Nitron shock absorber is designed to deliver the best possible performance and is easy to install. It is a direct replacement for the original shock absorber, without requiring any special modifications. The Nitron shock absorber is the perfect choice for riders who demand the best possible suspension performance for their Honda Wave, Dream, or Future motorcycle. It provides a smoother, more comfortable ride while also improving the bike\'s overall handling and stability. With its high-quality construction and fully-adjustable suspension system, the Nitron shock absorber is a must-have upgrade for any rider looking to get the most out of their motorcycle.\r\n', 'Genuine Vietnamese oil tank Nitron shock absorber for Wave, Dream, Future  is designed with full function to increase the swing, elasticity of the fork, so it is suitable for many Bikers who can go on bad roads or carry heavy and light as you like. Genuine Nitron shock absorber fork in Vietnam, a new brand of fork in Vietnam is very popular in the motorcycle toy market with the advantage of beautiful design, meticulous detail and very smooth and quiet swing. and especially the price is very reasonable. Nitron oil tank shock absorber for Wave, Dream, Future with warranty 12 months 1 to 1 exchange genuine Nitron Vietnam.', 41, 26, 1),
(43, 'Nitron shock absorber with genuine Vietnamese oil tank for AB motorcycles', '4900000', '580abc5873.jpg', 'The Nitron shock absorber is a high-quality aftermarket suspension component designed for the Honda AB motorcycle. It is manufactured with premium-grade materials and is proven to enhance the overall handling and performance of the bike. The Nitron shock absorber features a high-performance, oil-filled design that provides superior damping and ensures consistent performance, even in extreme conditions. It is equipped with a fully-adjustable suspension system that can be custom-tuned to suit individual riding styles and preferences. As a genuine, locally-made product in Vietnam, the Nitron shock absorber is built to the highest standards of craftsmanship and quality, ensuring that it is a reliable and long-lasting product. It is easy to install and is a direct replacement for the original shock absorber, without requiring any special modifications. The Nitron shock absorber is the ideal choice for riders who want to achieve the best possible performance from their Honda AB motorcycle. It provides a smoother, more comfortable ride, while also enhancing the bike\'s overall handling and stability. With its high-quality construction and fully-adjustable suspension system, the Nitron shock absorber is the perfect upgrade for riders who demand the best suspension performance possible.\r\n', 'Genuine Vietnamese oil tank Nitron shock absorber for AB, PCX  is fully designed with the function of increasing damping adjustment, fork elasticity, so it is suitable for many Bikers who can go on bad roads, beautiful or light at will. Genuine Vietnam Nitron shock absorber, a new brand of fork in Vietnam is very popular in the motorcycle toy market with the advantages of beautiful design, detailed ratio at the same time smooth, smooth and gentle. Especially, the price is very reasonable. Nitron genuine Vietnamese oil tank for Air Blade is warranted for 12 months 1 to 1 genuine Nitron Vietnam.', 41, 26, 1),
(44, 'RCB VS shock absorber (genuine) for AB 125 (yellow)', '4600000', 'b7cf9e8ec0.jpg', 'The genuine RCB VS shock absorber is a high-performance suspension component designed specifically for the Honda AB 125 with yellow springs. It is a premium aftermarket product that is designed to improve the overall handling and performance of the motorcycle. The RCB VS shock absorber is manufactured using high-quality materials to ensure maximum durability and longevity. It is equipped with advanced damping technology that provides better ride quality and handling, especially over rough terrain. The shock absorber is gas-charged, which helps to minimize fade and maintain consistent performance even after long periods of use. The RCB VS shock absorber is easy to install and does not require any special tools or modifications. The shock absorber is a direct replacement for the OEM part, and it maintains the factory ride height and geometry of the motorcycle. This shock absorber is an ideal choice for riders who demand the best performance from their motorcycles. It is especially useful for riders who enjoy riding on rough terrain or who require a more comfortable ride without sacrificing performance. With the RCB VS shock absorber, Honda AB 125 riders can enjoy a smoother, more controlled ride, and better handling and stability.\r\n', 'Genuine RCB VS fork with gold tyre for AB 125 2013-2019...with oil tank on top, modern design from Europe, RCB VD fork has 2 more loxos to replace, especially fork with gold plated ty increases the aesthetic quite high. Rear fork RCB VS oil tank for AirBlade 125 Rebound button to adjust the date of the fork foot suitable for all terrains. RCB VS fork for Air Blade 125 life 2013-2019 high 320mm and warranty: 12 months genuine RCB.', 41, 25, 1),
(45, 'Shock Absorber RCB VD fork for Honda AB 125 (gold)', '4200000', 'a2559560fe.jpg', 'The genuine RCB VD shock absorber is designed for the Honda AB 125 (with yellow springs). It is a high-quality suspension component that helps to improve the overall handling and performance of the motorcycle. The RCB VD shock absorber features a sturdy and durable construction, with a high-quality finish and improved damping characteristics that provide better ride quality and handling, especially over rough terrain. It has a gas-charged design, which helps to minimize fade and maintain consistent performance over time. This shock absorber is a direct replacement for the OEM part and is easy to install, requiring no special tools or modifications. It is also designed to provide a comfortable ride while maintaining excellent stability and control, which is essential for riders who demand the best performance from their motorcycles.\r\n', 'RCB VD fork genuine new model for  Honda AB 125 2013 - 2019 model year and ...with oil tank on top, modern design from Europe, RCB VD fork has 2 more loxos for replacement, especially fork with gold-plated nipples, which increases the aesthetics quite high. Rear fork RCB VD oil tank for AB 125 with 2 buttons to increase Rebound suitable for all terrains. It is possible to increase the adjustment in 2 features of spring and elasticity of the Fork. RCB VD fork for Honda Air Blade 125 height 320mm. Warranty: 12 months genuine RCB.', 41, 25, 1),
(46, 'The Motobatt SWTZ5-BS dry battery.', '420000', 'e82ee04d06.jpg', 'The Motobatt SWTZ5-BS is a maintenance-free dry cell battery designed for use in motorcycles, scooters, ATVs, and other power sports applications. It features AGM (Absorbed Glass Mat) technology which means that the acid is absorbed in a mat of fiberglass, making the battery spill-proof and leak-proof. This battery has a voltage of 12V, a capacity of 4Ah, and a cold cranking amperage (CCA) of 70A. It is also designed to provide higher cranking power for easier starting, and longer life compared to traditional lead-acid batteries. The Motobatt SWTZ5-BS battery is a direct replacement for the standard YTX5L-BS lead-acid battery and can be used in a wide range of motorcycles and other vehicles. It comes pre-charged and sealed, ready for installation, and does not require any maintenance.', 'The Motobatt SWTZ5-BS dry battery is a specially designed rechargeable battery for motorcycles and electric bicycles. With a capacity of 12V and 4AH, this product ensures sufficient energy supply for starting the engine and using electronic devices on the vehicle. With the latest Absorbed Glass Mat (AGM) technology, this type of battery does not leak or spill acid and is more durable than conventional batteries. This helps ensure safety in use and complete environmental protection. The SWTZ5-BS product also has other superior features, such as the ability to withstand strong impacts and vibrations, as well as the ability to fast charge up to 90% capacity in the shortest time. With its compact design and maintenance-free features, the Motobatt SWTZ5-BS battery is an ideal choice for those who love cars and personal transportation vehicles.', 42, 27, 1),
(47, 'The dry battery for Motobatt Gel MTZ5S.', '420000', '1acd28865c.jpg', '<p>The Motobatt Gel MTZ5S is a high-performance, maintenance-free, dry battery designed for use in a wide range of motorcycles and other powersports applications. It is made with advanced gel electrolyte technology, which provides superior performance and longer life compared to traditional flooded batteries.</p>\r\n\r\n<p>This battery is spill-proof and has a sealed construction, making it safe and easy to install in any position. Additionally, the battery is vibration-resistant and can withstand extreme temperatures, making it ideal for use in harsh environments.</p>\r\n\r\n<p>Overall, the Motobatt Gel MTZ5S is a reliable and durable dry battery that provides consistent power and performance, and is designed to last longer and require less maintenance than traditional batteries.</p>\r\n', '<p>Battery GEL Motobatt MTZ5S<br />\r\nCapacity: 12V - 4.2AH<br />\r\nTechnology: 100% GEL, Maintenance Free (MF), Pressure Regulating Valve (VRLA), Welding Machine (SW)<br />\r\nDimensions: 113 x 70 x 85&nbsp;(mm)</p>\r\n\r\n<p>Battery GEL Motobatt MTZ5S&nbsp;12 months warranty. Origin USA.<br />\r\nExceptional Features:<br />\r\n- GEL technology, no acid leakage, high efficiency and longer service life.<br />\r\n- Silver-coated, leak-proof output port increases durability and conductivity.<br />\r\n- Impact resistant ABS plastic, good durability. Increase battery life by up to 50%.<br />\r\n- Bigger capacity, stronger performance boost.</p>\r\n\r\n<p>GEL Motobatt MTZ5S battery&nbsp;used for the following models:<br />\r\n-&nbsp;Honda: All Wave (RS, Alpha 110), Airblade 110 (2008 - 2011), Drag, Revo, Blade, Vario 110, Scoopy, Spacy, Winner, Click Thai, Future, Vision (2012-2013).<br />\r\n-&nbsp;Suzuki: Shogun 125, Skydive, Skywave, Hayate 125i.<br />\r\n-&nbsp;Yamaha: Exciter, Exciter 135 (2011), Mio, Mio Model Awal, Sirius FI, Mio J, Jupiter MX, Jupiter Z (2011), Nouvo (4-6), Grande, Fino 125cc</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<em><img alt=\"Bình ắc quy khô motobatt gel mtz5s - 1\" src=\"https://shop2banh.vn/images/2021/10/20211012_a49e54e035e005a75a7ca8e83d2d820f_1634011593.jpg\" /></em>The dry battery for Motobatt Gel MTZ5S.</p>\r\n', 42, 27, 1),
(48, 'The Motobatt MTZ6S GEL Battery', '420000', '12f0ecb94c.jpg', 'The Motobatt MTZ6S GEL Battery is a maintenance-free motorcycle battery designed for exceptional performance and long-lasting durability. This battery features a valve-regulated design that eliminates the need for adding water or checking electrolyte levels. Its advanced maintenance-free gel technology provides increased cranking power, more capacity, and longer lifespan than conventional batteries. The MTZ6S battery has a 12V voltage and 6.5Ah capacity, making it an excellent choice for motorcycles with high electrical demands. With its superior design and construction, the Motobatt MTZ6S GEL Battery ensures reliable starting power and consistent performance.\r\n', 'The Motobatt MTZ6S GEL Battery is a special type of lead gel battery designed for use in motorcycles, electric bikes, lawnmowers, specialized machinery, and other transportation vehicles. With a capacity of 6V and 4AH, it ensures powerful starting capabilities for various types of engines and equipment. With the latest lead gel technology, this product doesn\'t leak acid or any harmful materials, providing safe operation and full environmental protection. The MTZ6S battery is also highly durable, able to withstand impacts and strong vibrations, prolonging the service life of the devices it powers. With its convenient design and maintenance-free features, the Motobatt MTZ6S GEL Battery is a perfect choice for those who love personal transportation vehicles.', 42, 27, 1),
(49, 'The Motobatt SW12V5-1A Dry Cell Battery', '420000', '655053d464.jpg', 'The Motobatt SW12V5-1A Dry Cell Battery is a sealed maintenance-free battery designed for use in motorcycles and other powersports vehicles. Its advanced design and construction feature a high-performance lead-acid AGM (absorbed glass mat) technology that provides high cranking power, increased capacity, and long-lasting durability. This battery is not only reliable but also convenient, as it requires no water or other maintenance throughout its life. It has a capacity of 12 volts and 5 amps and is an ideal choice for those who demand the best for their motorcycles.\r\n', 'The Motobatt SW12V5-1A is a specially designed dry cell battery for use in motorcycles, electric bikes, ATVs, and other personal transportation vehicles. With a capacity of 12V and 5AH, it ensures a perfect replacement for conventional motorcycle batteries. This type of battery has many advantages, such as its ability to withstand impacts, no leaking or acid discharge, long-lasting durability, and support for quick charging up to 90% of its capacity in the shortest possible time. With its compact design, no maintenance required, and easy installation, the Motobatt SW12V5-1A is an excellent choice for enthusiasts of vehicles and personal transportation.', 42, 27, 1),
(54, 'Motorcycle Chain Sprocket Light for Honda Winner', '420000', '25cde52506.jpg', 'The \"Light Chain Sprocket Set\" for the Honda Winner includes the \"Light Gold 428HS 122-Link Chain\" that has a pitch of 10mm, and \"15-44 Front/Rear Sprocket Set\" made from durable steel that has long-lasting endurance. The chain is coated with gold using advanced electroplating technology to ensure maximum durability. This product is made by Light Speed Racing, a brand originating from Vietnam that is known to provide quality products at a reasonable price. The Light NSD Set for the Honda Winner 150 and Winner X fits perfectly and has the same specifications as the original set. It comes with a 6-month or 12,000 km warranty, depending on which condition is met first. The set is designed to be easy to install and to function like the original set. With the Light Chain Sprocket Set, you can trust that your Honda Winner will offer a smooth and reliable ride.', 'The \"Light Chain Sprocket Set\" for the Honda Winner includes a \"Light Gold 428HS 122-Link Chain\" that has a pitch of 10mm, and a \"15-44 Front/Rear Sprocket Set\" made of durable steel that has long-lasting endurance. The chain is coated with gold using advanced electroplating technology to ensure maximum durability. This product is made by Light Speed Racing, a brand originating from Vietnam that is known for providing quality products at a reasonable price. The Light NSD Set for the Honda Winner 150 and Winner X fits perfectly and has the same specifications as the original set. It comes with a 6-month or 12,000 km warranty, depending on which condition is met first. The set is designed to be easy to install and to function just like the original set. With the Light Chain Sprocket Set, you can trust that your Honda Winner will offer a smooth and reliable ride.\r\n                                    ', 39, 24, 1),
(55, 'Motorcycle Chain Sprocket Light for Honda Sonic', '420000', '1938141953.jpg', 'The \"Light Chain Sprocket Set\" for the Honda Sonic comes with a \"Light Gold 428HS 122-Link Chain\" that has a pitch of 10mm, and a \"15-42 Front/Rear Sprocket Set\" made of durable steel that lasts over time. The chain is coated with gold using advanced electroplating technology to ensure longevity. This product is made by Light Speed Racing, a brand originating from Vietnam that is considered a reliable supplier of quality products at a reasonable price. The Light NSD Set for the Honda Sonic fits perfectly and has the same specifications as the original set, and comes with a 6-month or 12,000km warranty, depending on which condition is met first.\r\n', 'The Light NSD Set for the Honda Sonic fits perfectly and has the same specifications as the original set. It comes with a 6-month or 12,000km warranty, depending on which condition is met first. The set is designed to be easy to install and to function like the original set. With the Light Chain Sprocket Set, you can trust that your Honda Sonic will offer a smooth and reliable ride.\r\n\r\n                                                                                                            ', 39, 24, 1),
(59, 'The RCB 10-spoke Wheel is a genuine product that is designed for Raider and Satria motorcycles. ', '3400000', '8b3b6cb593.jpg', 'The RCB 10-spoke Wheel is a genuine product that is designed for Raider and Satria motorcycles. This wheel is manufactured by RCB, a trusted brand in the motorcycle accessories industry. The RCB 10-spoke Wheel is made from high-quality materials to ensure durability and reliability on the road. Its 10-spoke design is both sleek and sporty, and reduces weight for better performance. The wheel is coated with a special layer to resist corrosion and abrasion, ensuring long-lasting use. This product is designed specifically for Raider and Satria motorcycles, providing an easy and hassle-free installation process. The RCB 10-spoke Wheel will significantly enhance the appearance and performance of your motorcycle, providing you with a smoother and more confident ride. Overall, the RCB 10-spoke Wheel is an excellent option for riders who desire a balance of style and performance for their Raider or Satria motorcycle. With its high-quality construction and durability, this product is an investment you can trust.', 'The RCB 10-spoke Wheel is a genuine product designed for Raider and Satria motorcycles, with a front wheel size of 1.6 and a rear wheel size of 2.15. This wheel is perfect for bikers who love racing and desire a stylish look for their motorcycle. Its unique 10-spoke design adds a touch of sophistication to any ride. RCB is a trusted brand in the motorcycle accessories industry, and their high-quality construction is evident in their 10-spoke Wheel. The wheel is both durable and visually appealing, with a sleek and edgy look that commands attention on the road. The RCB 10-spoke Wheel is also designed for easy installation and can be fitted to your motorcycle without requiring any modifications. The RCB 10-spoke Wheel for Raider and Satria motorcycles comes in three colors: black, gold, and white. This allows bikers to choose the color that best suits the look and style of their motorcycle. Overall, the RCB 10-spoke Wheel is an excellent option for bikers who want to upgrade the appearance and performance of their Raider or Satria motorcycle. It is a genuine product manufactured by RCB and provides a premium look that is both stylish and timeless.', 43, 25, 1),
(60, 'The RCB 8-spoke Wheel is a genuine product designed specifically for Vario and Click motorcycles', '2800000', '30d6855a08.jpg', 'The RCB 8-spoke Wheel is a genuine product designed specifically for Vario and Click motorcycles. This wheel is manufactured by RCB, a well-known brand in the motorcycle accessories industry. The RCB 8-spoke Wheel is made from high-quality materials to ensure durability and reliability on the road. The 8-spoke design provides an attractive and sporty look while also reducing weight for better performance. The wheel is coated with a special layer to resist impact and abrasion, ensuring long-lasting use. This product is designed specifically for Vario and Click motorcycles, making the installation process easy and hassle-free. The RCB 8-spoke Wheel will significantly enhance the appearance and performance of your motorcycle, providing you with a smoother and more confident ride. Overall, the RCB 8-spoke Wheel is an excellent choice for riders who demand the best in terms of style and performance for their Vario and Click motorcycles. With its high quality and durability, this product is sure to exceed your expectations.', 'The RCB 8-spoke Wheel is a genuine and popular product in the market, designed for Vario and Click motorcycles. Its 8-spoke design is perfectly suited for the smaller frame of the Vario and Click models. RCB is a trusted brand in the motorcycle industry, and the quality of their products is well-regarded by many bikers. The RCB 8-spoke Wheel for the Vario and Click comes in a wheel size of 1.85-2.15. These wheels are made from high-quality materials and are specially coated to resist impact and abrasion, ensuring their durability and reliability on the road. The RCB 8-spoke Wheel is a genuine product manufactured by the RCB brand based in Malaysia, and comes with a 1-year warranty from the manufacturer. Overall, the RCB 8-spoke Wheel is an excellent and trustworthy choice for riders who want to upgrade the appearance and performance of their Vario or Click motorcycle.', 43, 25, 1),
(61, 'The RCB 5-spoke Wheel is a genuine product designed for the Exciter 150 (1.6-1.6)', '2500000', 'd49422fd38.jpg', 'The RCB 5-spoke Wheel is a genuine product designed for the Exciter 150 with a 1.6-1.6 wheel size. This wheel is manufactured by RCB, a well-known brand in the motorcycle accessories industry. The RCB 5-spoke Wheel is made of high-quality materials to ensure durability and reliability on the road. Its 5-spoke design provides a sleek and stylish appearance while also reducing weight for better performance. The wheel is specially coated to resist corrosion and abrasion, ensuring long-lasting use. The product is specifically designed for the Exciter 150 motorcycle with a 1.6-1.6 wheel size, providing an easy and hassle-free installation process. The RCB 5-spoke Wheel will greatly enhance the appearance and performance of your motorcycle, giving you a smoother and more confident ride. Overall, the RCB 5-spoke Wheel is an excellent choice for riders who demand the best in terms of style and performance for their Exciter 150 motorcycle.', 'RCB wheels of 5 super small versions for Exciter 150 with 1.6 before 1.6 version on a very cool car, for Biker who likes racing style, looks compact but very quality. Mounted on the car like a zin without making porridge. RCB Racingboy 5 wheels for Exciter 150 version 1.6-1.6 with 2 Colors: Black/Yellow. Genuine RCB products are warranted for 6 months.', 43, 25, 1),
(62, 'Carbon Brake Lever for Honda SH (2 Discs)', '1300000', '7f1f97141b.jpg', 'The Carbon Brake Lever for Honda SH (2 Discs) is a high-quality replacement component for the brake lever on Honda SH motorcycles with a dual-disc brake system. The outstanding feature of this product is its surface made of super light carbon fiber, which helps reduce weight and enhance aesthetics for your bike. The brake lever is designed to be sturdy, durable, and perfectly compatible with your motorcycle. With the combination of features and stunning appearance, this product is sure to satisfy enthusiasts seeking to customize and perfect their Honda SH motorcycles.', 'The Carbon Brake Lever for Honda SH 2 Discs is designed with a solid single-piece carbon construction, ensuring durability and excellent resistance to scratches and breakage. Our product is made with high-quality materials and superior craftsmanship compared to cheaper options available in the market. It features an adjustable lever, suitable for different hand sizes and provides extra comfort during long-distance riding. The Carbon Brake Lever for Honda SH is equipped with a hinge that fits precisely like the OEM, with no modifications required.', 44, 25, 1),
(63, 'The Carbon Brake Lever for Winner', '1300000', '2c3a367940.jpg', 'The \"Carbon Brake Lever for Winner\" is a high-quality replacement component for the brake lever on Honda Winner motorcycles. The product offers superior performance and style, thanks to its carbon fiber construction which reduces weight and enhances aesthetics for your bike. The brake lever is designed to be strong, durable and provides excellent resistance to scratches and breakage. Additionally, it features an adjustable lever suitable for different hand sizes, reducing fatigue and providing extra comfort during long-distance riding. This Carbon Brake Lever is an excellent choice for riders who are seeking to customize and upgrade their motorcycle\'s performance and aesthetics.', 'The Carbon Brake Lever for Winner is designed with a solid single-piece carbon construction, ensuring durability and excellent resistance to scratches and breakage. Our product is made with high-quality materials and superior craftsmanship compared to cheaper options available in the market. It features an adjustable lever, suitable for different hand sizes reducing fatigue and providing extra comfort during long-distance riding. The Carbon Brake Lever for Winner X series also comes with a hinge that fits precisely like the OEM, with no modifications required.', 44, 25, 1),
(64, 'The Carbon Brake Lever for Honda Sonic, MSX, CBR150', ' 1300000', '1e6df86025.jpg', 'The Carbon Brake Lever for Honda Sonic, MSX, CBR150\" is an aftermarket replacement component, designed to replace the stock brake lever on your Honda Sonic, MSX, or CBR150 motorcycle. Our product features a solid carbon fiber construction, which provides superior durability and protection against scratches and breakage. The lever is designed to be lightweight, yet strong, which allows for a more comfortable and responsive braking experience. Additionally, the carbon fiber material enhances the overall aesthetics of your bike, giving it a sleek and sporty look. The lever is also built with an adjustable mechanism that caters to different hand sizes, reducing fatigue and ensuring comfortable control and handling during long rides. Upgrade your motorcycle\'s braking performance and style with our Carbon Brake Lever for Honda Sonic, MSX, CBR150.', 'The Carbon Brake Lever for Honda Sonic, CBR150, and MSX is designed with a solid single-piece carbon construction, ensuring durability and excellent resistance to scratches and breakage. Our product is made with high-quality materials and superior craftsmanship compared to cheaper options available in the market. It features an adjustable lever, suitable for different hand sizes reducing fatigue and providing extra comfort during long-distance riding. The Carbon Brake Lever for Honda Sonic, CBR150, and MSX also comes with a hinge that fits precisely like the OEM, with no modifications required.', 44, 25, 1),
(65, 'KingSpeed 260mm Disc Brake', '550000', '26358ee6fe.jpg', 'KingSpeed 260mm Disc Brake is a high-quality aftermarket product designed as a replacement for the stock disc brake on your motorcycle. Made with premium materials and advanced manufacturing techniques, this brake disc offers superior stopping power, excellent heat dissipation, and reliable performance even under extreme conditions. Its large diameter of 260mm increases the effective braking radius, allowing for smoother and more precise braking. With its durable construction and precision engineering, the KingSpeed 260mm Disc Brake is a must-have upgrade for riders looking to enhance the safety and performance of their bikes.', 'The KingSpeed 260mm disc brake has just released a new model for a hot new brand on the market with a very beautiful and unique design, yet at a reasonable price. The new model features a flower-shaped design which looks very appealing. The latest version of KingSpeed 260mm disc brake has 4 bolt holes and can be fitted for various motorcycle models such as Wave, AB, old Exciter 135, and Sirius who want to upgrade their brake system with a larger disc brake.', 45, 28, 1),
(66, 'The latest model of KingSpeed 220mm disc brake with 4 holes for Wave and AB motorcycles', '520000', '2a468f02fe.jpg', 'The latest model of KingSpeed 220mm disc brake with 4 bolt holes is now available for Wave and AB motorcycles. This aftermarket product is designed as a replacement for the stock disc brake, and it delivers excellent stopping power, improved heat dissipation, and reliable performance in various weather conditions. With its high-quality construction, the KingSpeed 220mm disc brake is a great upgrade for riders looking to enhance the safety and performance of their bikes.', 'The KingSpeed 220mm disc brake for Wave and AB motorcycles has just released a new model for a hot new brand on the market. The new model features a beautiful and unique flower-like design, yet at a very affordable price. The latest version of KingSpeed 220mm disc brake has 4 bolt holes and can be easily installed on Wave, AB, old Exciter 135, and Sirius motorcycles without any modifications. With its high-quality construction, the KingSpeed 220mm disc brake is a great investment for riders who want to enhance the safety and performance of their bikes.', 45, 28, 1),
(67, 'The genuine X1R disc brake for Raider motorcycles.', '550000', '66cdfe9497.jpg', 'The X1R disc brake is an aftermarket product designed specifically for Raider motorcycles. It is manufactured by a trusted brand that is known for producing high-quality motorcycle parts and accessories. This disc brake is designed to provide riders with reliable braking performance, even in wet or slippery conditions. It is made from durable materials that can withstand the high temperatures generated during heavy braking. Additionally, the X1R disc brake is easy to install and comes with all the necessary hardware. Overall, it is a great investment for Raider riders who want to improve the safety and performance of their motorcycles.', 'Genuine X1R front brake disc for Suzuki Raider, Satria, moderate cotton design, not too brush style, suitable for Biker who goes with a simple but still beautiful style, thick X1R goods, the quality has been trusted by many customers use use.\r\nX1R zin brake disc size 290mm fits exactly like Raider/Satria without needing to be modified.', 45, 30, 1),
(68, 'The genuine DNA air filter for Honda SH350i', '2500000', '891ad1d864.jpg', 'The genuine DNA air filter designed specifically for Honda SH350i is a well-known European brand that ranks among the top in the world. Made of mesh filter material that can be cleaned and reused over 100 times (every 5000km cleaning interval), it offers long-lasting durability that practically matches the lifespan of the motorcycle. Additionally, with its plug-and-play design, users can replace the stock air filter without having to modify or alter the original structure of the motorcycle. The DNA air filter for SH350i is an excellent choice to replace the stock air filter, offering the advantages of lifetime reuse, strong air intake that increases engine performance, and long-lasting durability. It is a genuine DNA product made in Greece.', 'The genuine DNA air filter designed specifically for Honda SH350i is a well-known European brand that ranks among the top in the world. Made of mesh filter material that can be cleaned and reused over 100 times (every 5000km cleaning interval), it offers long-lasting durability that practically matches the lifespan of the motorcycle. Additionally, with its plug-and-play design, users can replace the stock air filter without having to modify or alter the original structure of the motorcycle. The DNA air filter for SH350i is an excellent choice to replace the stock air filter, offering the advantages of lifetime reuse, strong air intake that increases engine performance, and long-lasting durability. It is a genuine DNA product made in Greece.', 46, 31, 1),
(69, 'The genuine DNA (54) DNA Pod Filter for motorcycles', '850000', 'bc4bc62be6.jpg', 'The DNA (54) DNA Pod Filter is a high-quality air filter designed for use with motorcycles. It is a genuine DNA product that is made to the highest standards of quality and performance. With its innovative pod-style design, the DNA (54) filter improves engine airflow, which can lead to improved horsepower and torque. Made with high-quality materials and designed to be highly durable, the DNA (54) filter has a long lifespan and can be easily cleaned and reused. It is an excellent choice for motorcycle enthusiasts who want to improve the performance of their bike while keeping it well-protected and well-maintained. Overall, the DNA (54) DNA Pod Filter is a top-quality air filter designed to deliver excellent performance, longevity, and ease of use for motorcycle riders.', 'The genuine DNA (54) DNA Pod Filter is specifically designed for motorcycles that have been modified and feature a large fuel intake. Its pod-style design allows for increased airflow to match the lowered fuel-to-air ratio, resulting in improved acceleration and a powerful howling sound. As a renowned European brand, DNA is a top player in the industry. Constructed with a mesh filter material, this filter is reusable and can be washed over 100 times (every 5000km), making it a durable and long-lasting choice for your motorcycle. Manufactured in Greece by DNA, this (54) DNA Pod Filter is an authentic product of superior quality and performance.', 46, 31, 1),
(70, 'The K&N air filter cleaning kit (genuine)', '550000', '5bffef3285.jpg', 'K&N air filter cleaning kit includes 2 bottles: 1 cleaning bottle and 1 spray bottle of oil to restore the air filter, can be used for all types of permanent mesh air filters such as: K&N, BMC, DNA.. Wash the dirty air filter and restore the original air filter function. K&N air filter cleaning kit is a genuine product of K&N made in USA.', 'K&N air filter cleaning kit includes 2 bottles: 1 cleaning bottle and 1 spray bottle of oil to restore the air filter, can be used for all types of permanent mesh air filters such as: K&N, BMC, DNA.. Wash the dirty air filter and restore the original air filter function. K&N air filter cleaning kit is a genuine product of K&N made in USA.', 46, 32, 1),
(71, 'The genuine Uma air filter for Honda Winner and Sonic.', '280000', '69ed610ee7.jpg', 'The Uma air filter is a high-quality, genuine product designed specifically for use with Honda Winner and Sonic motorcycles. It is made from premium materials to ensure optimal performance and maximum durability, providing you with a superior filtering capacity to keep your engine running smoothly and efficiently. With its advanced filtration technology, the Uma air filter effectively removes contaminants and particles from the air, preventing them from entering your engine and reducing its lifespan. Designed to fit perfectly and easy to install, this air filter is an essential component for anyone looking to maintain their Honda Winner or Sonic motorcycle in top condition.', 'The genuine Uma air filter is a direct replacement part for the original air filter of Honda Winner and Sonic. The Uma air filter, which is made of foam, is able to filter air cleaner than the original paper filter. It has a longer service life and can be cleaned by blowing off dust. It is recommended to replace the Uma air filter when it gets too dirty after long usage, and not to wash or clean it. The Uma air filter is an official Uma Racing product that fits perfectly for Honda Winner 150, Winner X, and Sonic motorcycles.', 46, 33, 1),
(72, 'The genuine Uma air filter designed for Vario, Click, and Air Blade 125 motorcycles. ', '280000', '0c901306d8.jpg', 'The genuine Uma air filter designed for Vario, Click, and Air Blade 125 motorcycles. This high-quality air filter is an official Uma Racing product and is made with premium materials to ensure maximum durability and optimum performance. The Uma air filter is designed with foam material which provides cleaner air filtration compared to the original paper filter. This air filter has a longer service life and can be cleaned by blowing off dust. We recommend replacing the Uma air filter when it becomes too dirty after prolonged use, rather than washing or cleaning it. The Uma air filter fits snugly and perfectly for Honda Vario, Click, and Air Blade 125 motorcycles as a direct replacement to the original air filter.', ' The genuine Uma air filter is a direct replacement part for the original air filter of Honda Vario, Click, and Air Blade 125 motorcycles. The Uma air filter, which is made of foam, is able to filter air cleaner than the original paper filter. It has a longer service life and can be cleaned by blowing off dust. It is recommended to replace the Uma air filter when it gets too dirty after long usage, and not to wash or clean it. The Uma air filter is an official Uma Racing product that fits perfectly for AB125, Vario, and Click motorcycles as a direct replacement to the original air filter.', 46, 33, 1),
(73, 'The K&N YA-1515 air filter is designed for the Exciter 150 motorcycle. ', '950000', '7818007db0.jpg', 'The K&N YA-1515 air filter is designed for the Exciter 150 motorcycle. It is a high-performance air filter that provides superior filtration efficiency and increased airflow compared to the stock air filter. The K&N air filter is designed with an oiled cotton gauze material which can be washed and reused, making it more environmentally friendly and cost-effective in the long run. It is engineered to fit perfectly into the stock air filter box without modifications needed. The K&N YA-1515 air filter is a reliable upgrade for Exciter 150 riders looking to improve their motorcycle\'s performance and prolong the service life of their air filter.', 'The K&N YA-1515 air filter for the Exciter 150 provides both excellent filtration and increased airflow, allowing the engine to efficiently accelerate and operate smoothly. The engine\'s performance can benefit from the stable air/fuel ratio that the K&N air filter provides, especially during acceleration and long-distance driving. The K&N YA-1515 air filter is a genuine K&N product, imported from the USA, and is specifically designed for use with the Exciter 150 air filter. It is a reliable choice for owners seeking to improve their motorcycle\'s performance and reduce operating costs over the long term, as it can be washed and reused for a prolonged service life.', 46, 32, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_slider`
--

CREATE TABLE `bang_slider` (
  `Idslider` int(11) NOT NULL,
  `Tenslider` varchar(255) NOT NULL,
  `Anhslider` varchar(255) NOT NULL,
  `Trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_slider`
--

INSERT INTO `bang_slider` (`Idslider`, `Tenslider`, `Anhslider`, `Trangthai`) VALUES
(15, 'Image1', '750364c535.jpg', 1),
(16, 'Image 2', 'eb4d2bdef5.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_thuonghieu`
--

CREATE TABLE `bang_thuonghieu` (
  `Idthuonghieu` int(11) NOT NULL,
  `Tenthuonghieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_thuonghieu`
--

INSERT INTO `bang_thuonghieu` (`Idthuonghieu`, `Tenthuonghieu`) VALUES
(24, 'Light'),
(25, 'RCB'),
(26, 'Nitron'),
(27, 'Motobatt'),
(28, 'KingSpeed'),
(30, 'X1R'),
(31, 'DNA'),
(32, 'K&amp;N'),
(33, 'Uma Racing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_tintuc`
--

CREATE TABLE `bang_tintuc` (
  `Idtintuc` int(11) NOT NULL,
  `Tentintuc` varchar(255) NOT NULL,
  `Mota` text NOT NULL,
  `Noidung` text NOT NULL,
  `Danhmuctintuc` int(11) NOT NULL,
  `Hinhanh` varchar(255) NOT NULL,
  `Trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_tintuc`
--

INSERT INTO `bang_tintuc` (`Idtintuc`, `Tentintuc`, `Mota`, `Noidung`, `Danhmuctintuc`, `Hinhanh`, `Trangthai`) VALUES
(1, 'Vietnamese chess is famous in the history of world tournaments: Lai Ly Huynh won 1 more gold', 'Excellently defeating the very strong Hong Kong player Phung Gia Tuan, who has just won the runner-up in the world standard chess, Lai Ly Huynh helps Vietnamese chess win the first fast chess gold medal in history at the 2022 world championship.', 'On October 29, the 2022 World Chess Championship held in Malaysia will take place a fast chess competition. The players play 7 games to find the champion. In the 7th game taking place this afternoon, Lai Ly Huynh (11 points) faced Phung Gia Tuan (11 points) in the decisive match for the championship. Phung Gia Tuan is much appreciated when the Hong Kong (China) player has just won the world silver medal this year in the standard chess content. Facing a very strong opponent, Lai Ly Huynh competed extremely focused to win, thereby bringing back the first world rapid chess gold medal in history for Vietnamese chess. With this gold medal, Lai Ly Huynh received 5000 USD in prize money (about 124 million VND). In turn are the Chan Y (Chinese Taipei) and Phung Gia Tuan (Hong Kong). A day earlier, Lai Ly Huynh and Nguyen Thanh Bao also excellently overcame very strong players from China and Hong Kong to bring home the first men\'s team gold medal in history for the country\'s chess. In addition, the Vietnamese chess team also had two more gold medals in U16 women\'s Dinh Tran Thanh Lam and U12 women\'s Nguyen Trac Hoang Thi. An extremely successful tournament of the Vietnamese chess team with the excellence of the individual players as well as a bold mark from the coaching staff when there were reasonable tactical instructions to distribute the strength to the foreign athletes. home during many intense matches. Especially when for many years, this subject has been dominated by almost absolute players from China. The World Chess Championship 2022 will take place from October 23-29 in Malaysia, bringing together more than 10 countries and territories around the world such as the US, Russia, Finland, Japan, Thailand, and Indonesia. , Malaysia, China, Hong Kong, Chinese Taipei, Singapore, Brunei and Vietnam.', 1, 'c8b140cb83.jpg', 1),
(2, '\"Lonely and defeated\" Duy Nhat unleashed a blow that made his opponent run away at MMA Vietnam', 'Nguyen Tran Duy Nhat with his dangerous attacks and speed made the opponent constantly retreat and run away and suddenly asked to \"stop the game\", thereby swaggering straight into the final of MMA Vietnam.', 'The focus of the professional MMA martial arts event LION Championship 2022 taking place late on October 22 at Quan Ngua General Sports Palace (Hanoi) is the semi-final competition in the 60 kg weight class between Nguyen Tran Duy Nhat and Phan. Huy Hoang. Duy Nhat pressed fiercely with many strong Muay moves that made Huy Hoang extremely difficult. Known as the \"lonely and defeated\" of the Vietnamese Muay village with 7 world championships, Duy Nhat continues to cause \"fever\" in his first attempt at a professional MMA tournament. Especially in the previous quarter-final, the 33-year-old boxer shocked the country\'s martial arts village when he went upstream to knock-out his opponent after receiving nearly 50 punches to the face and being hit by an extremely dangerous strangulation. Meanwhile, Phan Huy Hoang has also shown his class after 2 consecutive knockout victories to participate in the semi-finals. The 26-year-old boxer is highly appreciated for his fighting skills when he won gold in both Kickboxing and Taekwondo. In some situations, Huy Hoang had to run away to avoid the blow from \"Lonely and defeated\". Worthy of a showdown between two masters who are good at standing, Huy Hoang immediately launched high-speed kicks as soon as the match started. Unique also responded with powerful foot attacks aimed at the opponent\'s head. In the middle of the first half, Huy Hoang tried to wrestle Duy to the floor, but \"Lonely asked for defeat\" to defend firmly before choosing to sit on the opponent\'s body. Although Huy Hoang was locked with one hand, he showed very good defense, creating a fierce struggle on the floor until the end of the first round. The 26-year-old boxer gave up before the third round started. The two boxers continued to have many fiery exchange situations in the 2nd round. Duy Nhat, with extensive experience, launched extremely high-quality tower-breaking kicks. While actively attacking, Duy Nhat was caught by Huy Hoang. However, Duy Nhat successfully defended against the opponent\'s consecutive punches before counterattacking with dangerous knee attacks that made Huy Hoang constantly retreat, even running to another corner of the cage. Huy Hoang was almost knocked out at the end of the second set when he was hit by two consecutive knee blows from Duy Nhat, but the 26-year-old boxer stood firm. Suffering many heavy blows and being pushed too hard from Duy Nhat, Huy Hoang suddenly gave up before entering the 3rd round, through which Duy Nhat won a technical knockout and won a place in the group. conclude. Duy Nhat\'s opponent in the final is Vo Thanh Trung Tin. This match is the highlight of the martial arts event scheduled to take place on November 26 in Phu Quoc. In the remaining match, the number one MMA fighter in Vietnam, Tran Quang Loc, was surprised when he knocked out the master of Nhu Nghiem Tung Lam when the match took place in less than 30 seconds with an extremely heavy left hand hook. in the 70 kg weight class. Quang Loc\'s opponent in the final will be Vietnamese-born boxer Nguyen Van Kamil (Poland).', 1, '5a5482b405.jpg', 1),
(3, 'Bao Phuong Vinh overwhelmed 2 German players and won the World Cup billiards game', 'The young talent of Vietnamese billiards Bao Phuong Vinh had a great start when he consecutively defeated two German players to win the right to continue at the prestigious Carom 3 tournament Veghel World Cup 2022 taking place in Ho Chi Minh City. Netherlands.', 'Bao Phuong Vinh is a competitive player \"opening goods\" for the Vietnamese Billiards team at the prestigious Carom 3-band tournament Veghel World Cup 2022 taking place from October 23-29 in the Netherlands. Starting in the second qualifying round taking place late on October 24 and early in the morning on October 25, Phuong Vinh was in Group L with two German players, Gurhan Kabak and Norbert Roestel. In the opening match against Gurhan Kabak, Phuong Vinh played confidently to defeat the opponent after only 18 turns. The young Vietnamese player soon prepped his opponent with average series, before launching a 7-point hit to lead 19-8 after the first half. In the second half, Phuong Vinh had another 6-point line to finish with the score 30-16. Next, Phuong Vinh entered the \"final\" match with Norbert Roestel, the previous player also won against Gurhan Kabak to compete for the top spot with the only ticket to the next round. Norbert Roestel entered the game better and made Phuong Vinh constantly be in a chasing position. With smooth strikes that scored 9 points in a row in 2 rounds, Phuong Vinh reversed the lead 19-12 before ending the match with a difference of 30-19 after 21 innings. Two impressive victories helped Phuong Vinh enter the 3rd qualifying round, where another Vietnamese representative will also compete, Nguyen Tran Thanh Tu (world No. 44). In the third qualifying round, which took place late on October 25 and early in the morning of October 26, Nguyen Tran Thanh Tu was in Group B with Colombian stars Robinson Morales and Wilkowski Huub (Netherlands). Meanwhile, Bao Phuong Vinh is in Group O with Salem Khaled (Egypt) and Novak Radek (Czech Republic). The Carom 3 Ice Veghel World Cup 2022 will take place from October 23-29 in the Netherlands, bringing together the world\'s best players. Vietnam has 5 representatives to attend including Bao Phuong Vinh, Nguyen Duc Anh Chien, Nguyen Tran Thanh Tu, Do Nguyen Trung Hau and Tran Quyet Chien.', 1, 'b9c2606b16.jpg', 1),
(4, 'Barca spent 222 million euros still playing poorly, Xavi is only good at throwing money out the window?', 'Splashing a lot of money on the transfer market does not help Barca better.', 'Barca fans were extremely disappointed when they saw the home team being beaten by Liverpool or AS Roma despite leading with a gap of 3 goals in the first leg. But it\'s clear that those pains are not enough when they see the home team appear weak in the last 2 seasons in the C1 Cup. Last season, many Barca fans could blame Messi\'s absence for going down to the Europa League. However, up to the current season, when the Catalan team splashed out 153 million euros, everything is still \"closed\". Philosophy has a saying: \"Material determines consciousness\". However, with Barca, this saying is completely opposite. They have Lewandowski, the top scorer in the Champions League for many seasons. But that is still too little for Xavi\'s team to compare with other competitors in the same table. Since the beginning of the C1 Cup season, Barca has only scored 8 goals, the number is in the poor average category in the tournament. The attack is blunt, but Barca\'s defense is not good with no match in this year\'s C1 Cup keeping a clean sheet. And remember, this team also spends a lot of money to strengthen the defense. 222 million euros is the number that Barca splashed into the transfer market in the past 2 seasons. But up to now, the result is still a round zero. Worth mentioning, the Catalan team is still in the financial crisis. The current Barca players are no different from \"mobile money\". They can only bully the teams below the muscle, and when they meet the skeleton opponents, this team shows its weaknesses both professionally and mentally. They are always appreciated, then enter the big matches with the spirit, the attitude is described as about to \"eat up\" the opponent. But the results are often just pain. Every club has its ups and downs. But with what is happening at Barca, when will they find their position in the prestigious C1 Cup arena?', 1, 'b972cfe4cf.jpg', 1),
(5, 'iPhone can still be tracked even when powered off', 'Recently, researchers at the Technical University of Darmstadt (Germany) discovered that even when the iPhone is powered off, the device can still be tracked.', 'According to the researchers, when powered off, iPhones still provide a small amount of power reserve for Bluetooth, Ultra Wideband and NFC chips so they can work for up to 24 hours. This means that users can easily locate the device even if the iPhone has run out of battery or is powered off. However, hackers can take advantage of this feature to gain control of the iPhone even when the device is powered off. While this vulnerability is worrisome, you don\'t need to worry too much unless you\'re using a jailbroken iPhone. Jailbreaking iPhone allows users to install more add-ons, expand accessibility on the device, however, this also opens a loophole that allows hackers to easily penetrate the device. . If you think your data is at risk, consider taking some action to prevent identity theft, such as setting up a lock screen password, activating 2-factor authentication. factor for your Apple ID account… and update your iPhone to the latest iOS version.', 2, 'de60eafed8.jpg', 1),
(6, 'Update Chrome immediately to urgently patch zero-day vulnerability', 'On the evening of October 28 (Vietnam time), Google released a new update for Chrome browser to urgently patch the zero-day vulnerability that is currently being actively exploited.', 'Avast security researchers Jan Vojtěšek, Milánek and Przemek Gmerek discovered the vulnerability for the first time on October 25, 2022. The vulnerability CVE-2022-3723 is related to a mistake in the V8 JavaScript engine. This is the third actively exploited bug on Chrome browser this year, after CVE-2022-1096 and CVE-2022-1364. Update Chrome immediately to urgently patch zero-day vulnerability - 1. Google said it has received reports related to exploitation of vulnerability CVE-2022-3723 in the wild, however, still as At all times, the company did not provide details about the nature of the attack. Since the beginning of this year, Google has urgently patched seven different zero-day vulnerabilities, including CVE-2022-0609, CVE-2022-1096, CVE-2022-1364, CVE-2022-2294, CVE-2022-2856 , CVE-2022-3075. To limit the attack, users should update Chrome browser to version 107.0.5304.87 (macOS and Linux) and 107.0.5304.87/.88 (Windows) by typing in the command line chrome://settings address bar /help, then wait a moment for the data download to complete, click Relaunch to restart. In addition, browsers using open source Chromium such as Microsoft Edge, Brave, Opera and Vivaldi also need to update to the new version immediately (if any). Hackers have various techniques to exploit browser vulnerabilities. Fortunately, there are several steps you can take to reduce the risk of your browser being compromised. Although the browser has many vulnerabilities, developers usually quickly solve it by releasing patches. That is why users should regularly update the browser they are using to the latest version. Be careful when installing extensions, although convenient, extensions can also have vulnerabilities or even worse, collect user data. Therefore, you should carefully read the reviews from previous users before installing. Hackers often use phishing techniques to distribute exploits that target unpatched vulnerabilities in browsers. The simplest way to limit being hacked is to never open emails or messages from unknown senders, never click on links or open attachments unless you are sure it comes from a legitimate source. Even if you receive messages or emails from acquaintances, you should confirm with them by calling or using social networks.', 2, '557338acc1.jpeg', 1),
(7, 'Mark Zuckerberg is the billionaire with the most wealth \'evaporated\' of the year', 'Billionaire Mark Zuckerberg\'s net worth has plummeted after Meta Group suffered a second consecutive quarter of revenue decline.', 'Bloomberg reported on October 28, Facebook founder Mark Zuckerberg\'s fortune has plummeted by $100 billion this year, and this is the steepest decline among the richest people on the planet. \"The CEO of Meta Corporation has taken the biggest hit on the list of billionaires,\" Bloomberg wrote. Mr. Zuckerberg\'s current net worth is only 38.1 billion USD and drops to the 28th place of the richest people in the world. This is quite a strong fall from the high of $ 142 billion in September 2021. Less than two years ago, this tech mogul ranked third behind Jeff Bezos and Bill Gates in total net worth. The 38-year-old billionaire\'s wealth has mostly gone down since he decided to change the company\'s name from Facebook to Meta. This businessman holds more than 350 million shares in Meta. Mark Zuckerberg\'s decision to invest in the Metaverse virtual universe has led to a series of criticisms, while the project needs billions of dollars a year to complete. Meta\'s quarterly revenue continued to struggle because of declining online advertising, competition from video-sharing platform TikTok, as well as growing skepticism about Metaverse\'s future. Q3 2022 revenue was $27.7 billion, down 4.5% from a year ago and the company\'s second consecutive quarterly decline. Before 2022, Zuckerberg\'s company had never experienced a drop in sales. However, Meta Group warned that fourth-quarter revenue of this year will also decline similarly. Year-to-date, Meta stock is down more than 61%. The stock closed October 27 nearly 25% lower, at $97.94 a share. At its peak in September 2021, Meta\'s share price reached as high as $382 per share.', 2, 'b5fb8ae4f5.jpg', 1),
(8, 'Older iPhone users should update immediately', 'Recently, Apple has released an update for older iPhone models to fix the vulnerability CVE-2023-23529, which allows crooks to execute arbitrary code.', 'The security issue this time is related to a type confusion bug in WebKit, which allows crooks to execute arbitrary code. As always, vulnerability details are not disclosed to prevent abuse in the wild. If you are using an old iPhone, you should update to iOS 15.7.4 as soon as possible by going to Settings - General - Software update - Download and Install. about and install). For example, iPhone 6s (all models), iPhone 7 (all models), iPhone SE (1st generation), iPad Air 2, iPad mini (4th generation), and iPod Touch (7th generation). Besides, Apple also released iOS 16.4, iPadOS 16.4, macOS Ventura 13.3, macOS Monterey 12.6.4, macOS Big Sur 11.7.5, tvOS 16.4 and watchOS 9.4 updates with many new improvements and bug fixes. To ensure safety, users should back up all data on iPhone through iTunes or iCloud before proceeding with the update.                                    ', 2, '90059f1e04.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_yeuthich`
--

CREATE TABLE `bang_yeuthich` (
  `Idyeuthich` int(11) NOT NULL,
  `Idkhachhang` int(11) NOT NULL,
  `Idsanpham` int(11) NOT NULL,
  `Tensp` varchar(255) NOT NULL,
  `Giaban` varchar(255) NOT NULL,
  `Anhsanpham` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_yeuthich`
--

INSERT INTO `bang_yeuthich` (`Idyeuthich`, `Idkhachhang`, `Idsanpham`, `Tensp`, `Giaban`, `Anhsanpham`) VALUES
(44, 0, 53, 'Mâm RCB 5 cây (chính hãng) cho Exciter 150 bản 1.6-1.85', '4200000', 'fecc47b20f.jpg'),
(45, 5, 53, 'Mâm RCB 5 cây (chính hãng) cho Exciter 150 bản 1.6-1.85', '4200000', 'fecc47b20f.jpg'),
(46, 6, 72, 'The genuine Uma air filter designed for Vario, Click, and Air Blade 125 motorcycles. ', '280000', '0c901306d8.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bang_admin`
--
ALTER TABLE `bang_admin`
  ADD PRIMARY KEY (`Idadmin`);

--
-- Chỉ mục cho bảng `bang_danhmuctintuc`
--
ALTER TABLE `bang_danhmuctintuc`
  ADD PRIMARY KEY (`Iddanhmuc`);

--
-- Chỉ mục cho bảng `bang_dathang`
--
ALTER TABLE `bang_dathang`
  ADD PRIMARY KEY (`Iddathang`);

--
-- Chỉ mục cho bảng `bang_giohang`
--
ALTER TABLE `bang_giohang`
  ADD PRIMARY KEY (`Idgiohang`);

--
-- Chỉ mục cho bảng `bang_khachhang`
--
ALTER TABLE `bang_khachhang`
  ADD PRIMARY KEY (`Idkhachhang`);

--
-- Chỉ mục cho bảng `bang_loaisp`
--
ALTER TABLE `bang_loaisp`
  ADD PRIMARY KEY (`Idloai`);

--
-- Chỉ mục cho bảng `bang_sanpham`
--
ALTER TABLE `bang_sanpham`
  ADD PRIMARY KEY (`Idsanpham`);

--
-- Chỉ mục cho bảng `bang_slider`
--
ALTER TABLE `bang_slider`
  ADD PRIMARY KEY (`Idslider`);

--
-- Chỉ mục cho bảng `bang_thuonghieu`
--
ALTER TABLE `bang_thuonghieu`
  ADD PRIMARY KEY (`Idthuonghieu`);

--
-- Chỉ mục cho bảng `bang_tintuc`
--
ALTER TABLE `bang_tintuc`
  ADD PRIMARY KEY (`Idtintuc`);

--
-- Chỉ mục cho bảng `bang_yeuthich`
--
ALTER TABLE `bang_yeuthich`
  ADD PRIMARY KEY (`Idyeuthich`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bang_admin`
--
ALTER TABLE `bang_admin`
  MODIFY `Idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bang_danhmuctintuc`
--
ALTER TABLE `bang_danhmuctintuc`
  MODIFY `Iddanhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bang_dathang`
--
ALTER TABLE `bang_dathang`
  MODIFY `Iddathang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `bang_giohang`
--
ALTER TABLE `bang_giohang`
  MODIFY `Idgiohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `bang_khachhang`
--
ALTER TABLE `bang_khachhang`
  MODIFY `Idkhachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bang_loaisp`
--
ALTER TABLE `bang_loaisp`
  MODIFY `Idloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `bang_sanpham`
--
ALTER TABLE `bang_sanpham`
  MODIFY `Idsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `bang_slider`
--
ALTER TABLE `bang_slider`
  MODIFY `Idslider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `bang_thuonghieu`
--
ALTER TABLE `bang_thuonghieu`
  MODIFY `Idthuonghieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `bang_tintuc`
--
ALTER TABLE `bang_tintuc`
  MODIFY `Idtintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `bang_yeuthich`
--
ALTER TABLE `bang_yeuthich`
  MODIFY `Idyeuthich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
