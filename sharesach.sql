-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2024 lúc 07:22 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sharesach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `ma_sach` varchar(20) NOT NULL,
  `manv` int(3) NOT NULL,
  `tieu_de` varchar(200) NOT NULL,
  `tac_gia` varchar(100) NOT NULL,
  `ma_the_loai` varchar(20) NOT NULL,
  `nam_xuat_ban` year(4) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `anh_bia` varchar(200) DEFAULT NULL,
  `link_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`ma_sach`, `manv`, `tieu_de`, `tac_gia`, `ma_the_loai`, `nam_xuat_ban`, `mo_ta`, `anh_bia`, `link_file`) VALUES
('1732557925366', 1, 'Cổ Chân Nhân 2', 'Cổ Chân Nhân', 'TT', '2024', 'Cổ Chân Nhân là 1 tác phẩm kinh điển trong làng truyện hắc ám lưu,Chỉ tiếc là tác phẩm này đã bị phong sát...\r\n\r\n', 'co-chan-nhan-2-cover.jpg', './files/Cổ Chân Nhân Quyển 6 - Ma Tôn Vĩnh Sinh.pdf'),
('BCVT', 1, 'Bản thiết kế trí tuệ', 'Ray Kurzweil', 'KH', '2005', 'Những tiến bộ trong công nghệ và sự bất tử.', 'bi-quyet-vuot-thoi-gian-cover.jpg', 'https://waka.vn/ebook/ban-thiet-ke-tri-tue-ray-kurzweil-blmQQW.html'),
('BMTT', 1, 'Bí ẩn tuổi thơ', 'G. Bernard Shaw', 'TT', '1939', 'Khám phá các suy nghĩ của trẻ em thông qua lăng kính triết học.', 'bi-mat-tuoi-tho-cover.jpg', './files/bi-an-tuoi-tho.pdf'),
('BMVT', 1, 'Vũ trụ huyền bí', 'Brian Greene', 'KH', '2003', 'Khám phá những bí ẩn sâu kín của không-thời gian.', 'bi-mat-cua-vu-tru-cover.jpg', ''),
('BSC', 1, 'Bí quyết sống chất', 'Mark Manson', 'KNS', '2016', 'Cuốn sách giúp xây dựng cuộc sống vui vẻ và hạnh phúc.', 'bi-quyet-song-chat-cover.jpg', './files/bi-quyet-song-chat.pdf'),
('CCKG', 1, 'Cuộc chiến không gian', 'Isaac Asimov', 'KH', '1972', 'Một câu chuyện khoa học viễn tưởng về không gian và thời gian.', 'cuoc-chien-khong-gian-cover.jpg', ''),
('CCN', 1, 'Cổ Chân Nhân', 'Cổ Chân Nhân', 'TT', '2019', 'Người là vạn vật linh hồn, cổ là thiên địa chân tinh.', 'co-chan-nhan-cover.jpg', 'https://banlong.us/truyen/co-chan-nhan'),
('CVND', 1, 'Making it all work', 'David Allen', 'KNS', '2001', 'Kỹ năng quản lý công việc và năng lượng hiệu quả.', 'cong-viec-nang-dong-cover.jpg', 'https://www.scribd.com/document/549192550/Making-It-All-Work'),
('DB', 1, 'Đế Bá', 'Yếm Bút Tiêu Sinh', 'TT', '2020', 'Ngàn vạn năm trước, Lý Thất Dạ trồng xuống một cây Thúy Trúc. Tám trăm vạn năm trước, Lý Thất Dạ nuôi một đầu cá chép. Năm trăm vạn năm trước, Lý Thất Dạ thu dưỡng một cái tiểu cô nương.', 'de-ba-cover.jpg', 'https://truyenfull.io/de-ba/'),
('DCKV', 1, 'Đỉnh Cấp Khí Vận, Lặng Lẽ Tu Luyện Ngàn Năm', 'Nhâm Ngã Tiếu', 'TT', '2018', 'Chuyển thế đi vào tu tiên thế giới, Hàn Tuyệt phát hiện chính mình mang theo trò chơi thuộc tính, vậy mà có thể đổ xúc xắc đổi mới linh căn tư chất cùng Tiên Thiên khí vận.', 'dinh-cap-khi-van-cover.jpg', 'https://truyenyy.vip/truyen/dinh-cap-khi-van-lang-le-tu-luyen-ngan-nam/'),
('DNT', 1, 'Đắc nhân tâm', 'Dale Carnegie', 'KNS', '1936', 'Cuốn sách hướng dẫn kỹ năng sống và ứng xử với mọi người.', 'dac-nhan-tam-cover.jpg', './files/dac-nhan-tam.pdf'),
('DPDCN', 1, 'Đại Phụng Đả Canh Nhân', 'Mại Báo Tiểu Lang Quân', 'TT', '2018', 'Thế giới này, có nho; có đạo; có phật; có yêu; có thuật sĩ. Tốt nghiệp trường cảnh sát Hứa Thất An yếu ớt tỉnh lại, phát hiện chính mình thân ở trong lao ngục, ba ngày sau lưu vong biên thuỳ. . . . .Hắn mới đầu mục đích chẳng qua là tự vệ, thuận tiện tại cái này không có nhân quyền trong xã hội làm cái phú gia ông nhàn nhã sống qua ngày.', 'dai-phung-da-canh-nhan-cover.jpg', './files/dai-phung-da-canh-nhan.pdf'),
('DTN', 1, 'Hành trình từ trái đất đến thiên đường', 'Vincent Van Gogh', 'TT', '2019', 'Những mảnh ghép về cuộc đời và tác phẩm của Van Gogh.', 'doi-tu-nghe-si-cover.jpg', 'https://sachtruyen.com.vn/sach/bat-mi-doi-hoa-si-vincent-van-gogh-hanh-trinh-tu-trai-dat-den-thien-duong'),
('GQLM', 1, 'Giải Quyết Lãnh Đạo', 'Jack Welch', 'KNS', '2013', 'Cẩm nang về lãnh đạo và quản lý hiệu quả.', 'giai-quyet-lanh-dao-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/giai-quyet-lanh-dao.pdf'),
('HSBL', 1, 'Hành trình sinh tồn', 'John Krakauer', 'LS', '1996', 'Cuộc phiêu lưu sinh tồn của một nhà thám hiểm.', 'hanh-trinh-sinh-ton-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/hanh-trinh-sinh-ton.pdf'),
('HTTT', 1, 'Hành Trình Tìm Kiếm', 'Nguyễn Huy Thiệp', 'TT', '2015', 'Một câu chuyện về hành trình tự khám phá bản thân.', 'hanh-trinh-tim-kiem-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/hanh-trinh-tim-kiem.pdf'),
('HVT', 1, 'Huyền thoại và thực tế', 'Albert Camus', 'TT', '1957', 'Những suy nghĩ triết học về cuộc sống và xã hội.', 'huyen-thoai-thuc-te-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/huyen-thoai-thuc-te.pdf'),
('KHVT', 1, 'Khoa Học Về Tình Yêu', 'Helen Fisher', 'KH', '2004', 'Tìm hiểu khoa học về tình yêu và mối quan hệ.', 'khoa-hoc-ve-tinh-yeu-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/khoa-hoc-ve-tinh-yeu.pdf'),
('KNGT', 1, 'Kỹ năng giao tiếp', 'Dale Carnegie', 'KNS', '2001', 'Hướng dẫn cách giao tiếp hiệu quả và xây dựng mối quan hệ.', 'ky-nang-giao-tiep-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/ky-nang-giao-tiep.pdf'),
('KVB', 1, 'Kinh Vô Biên', 'Nhiều tác giả', 'TT', '2022', 'Những góc nhìn mới về triết lý và cuộc sống.', 'kinh-vo-bien-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/kinh-vo-bien.pdf'),
('KVTD', 1, 'Khát Vọng Trỗi Dậy', 'Ro Yu-jin', 'TT', '2021', 'Seol từng là một tên mê cờ bạc, một tên thất bại, rác rưởi của loài người. Nhưng rồi, một cơn ác mộng mà cũng không hẳn là mơ đã khiến hắn thức tỉnh. Sở hữu những kỹ năng độc nhất, cậu ta cùng với giấc mơ kia, từng bước thay đổi cuộc đời của cậu trong thế giới mới được biết đến như là Thiên đường lạc lối.', 'khat-vong-troi-day-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/khat-vong-troi-day.pdf'),
('LCCM', 1, 'Làm chủ chính mình', 'Jocko Willink', 'KNS', '2017', 'Rèn luyện ý chí và khả năng tự quản lý bản thân.', 'lam-chu-chinh-minh-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/lam-chu-chinh-minh.pdf'),
('LNT', 1, 'Làm người tử tế', 'Lưu Dung', 'KNS', '2018', 'Cẩm nang đạo đức và triết lý cuộc sống.', 'lam-nguoi-tu-te-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/lam-nguoi-tu-te.pdf'),
('LSNL', 1, 'Lịch sử nhân loại', 'Yuval Noah Harari', 'LS', '2011', 'Tóm lược về quá trình tiến hóa của loài người.', 'lich-su-nhan-loai-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/lich-su-nhan-loai.pdf'),
('LSTG', 1, 'Lược sử thời gian', 'Stephen Hawking', 'KH', '1998', 'Cuốn sách khoa học phổ thông về vũ trụ.', 'luoc-su-thoi-gian-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/luoc-su-thoi-gian.pdf'),
('MTD', 1, 'Mặt tối của động lực', 'Daniel Pink', 'KNS', '2009', 'Tìm hiểu động lực và cảm xúc trong công việc.', 'mat-toi-cua-dong-luc-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/mat-toi-cua-dong-luc.pdf'),
('MTN', 1, 'Mặt Trời Mới', 'Toni Morrison', 'TT', '1992', 'Một câu chuyện về tình yêu và sự tồn tại.', 'mat-troi-moi-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/mat-troi-moi.pdf'),
('NCDL', 1, 'Nghệ thuật chiến đấu lặng lẽ', 'Sun Tzu', 'LS', '0000', 'Những chiến thuật quân sự qua góc nhìn của Sun Tzu.', 'nghe-thuat-chien-dau-lan-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/nghe-thuat-chien-dau.pdf'),
('NGCL', 1, 'Nguồn gốc các loài', 'Charles Darwin', 'KH', '2000', 'Sinh vật tiến hóa dần dần thông qua chọn lọc tự nhiên.', 'nguon-goc-cac-loai.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/nguon-goc-cac-loai.pdf'),
('NGK', 1, 'Nhà giả kim', 'Paulo Coelho', 'TT', '1988', 'Câu chuyện đầy triết lý về cuộc hành trình của một cậu bé.', 'nha-gia-kim-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/nha-gia-kim.pdf'),
('NGNN', 1, 'Những Giá Trị Ngân Hà', 'Carl Sagan', 'KH', '1985', 'Khám phá vũ trụ và những bí ẩn của nó.', 'nhung-gia-tri-ngan-ha-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/nhung-gia-tri-ngan-ha.pdf'),
('NMTT', 1, 'Những mặt tối của tâm lý học', 'Philip Zimbardo', 'KH', '2007', 'Khám phá những mặt tối của tâm lý con người.', 'nhung-mat-toi-tam-ly-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/nhung-mat-toi-tam-ly.pdf'),
('NV84', 1, '1984', 'George Orwell', 'TT', '1949', 'Một thế giới viễn tưởng đầy ám ảnh.', '1984-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/1984.pdf'),
('PBKG', 1, 'Phía bên kia gương', 'Lewis Carroll', 'TT', '0000', 'Hành trình kỳ ảo của Alice trong thế giới gương.', 'phia-ben-kia-guong-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/phia-ben-kia-guong.pdf'),
('QBCC', 1, 'Quỷ Bí Chi Chủ', 'Ái Tiềm Thủy Đích Ô Tặc', 'TT', '2018', 'Lịch sử cùng hắc ám trong sương mù.', 'quy-bi-chi-chu-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/quy-bi-chi-chu.pdf'),
('QTTC', 1, 'Quy Tắc Thành Công', 'Tony Robbins', 'KNS', '1996', 'Cẩm nang thực hành để đạt được thành công trong cuộc sống.', 'quy-tac-thanh-cong-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/quy-tac-thanh-cong.pdf'),
('SHVN', 1, 'Sức Hút Vô Nhiên', 'Robert Cialdini', 'KH', '2017', 'Khám phá tâm lý và sức mạnh của sự ảnh hưởng.', 'suc-hut-vo-nhien-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/suc-hut-vo-nhien.pdf'),
('STG', 1, 'Sống tối giản', 'Fumio Sasaki', 'KNS', '2015', 'Cách sống đơn giản, ít vật chất nhưng nhiều hạnh phúc.', 'song-toi-gian-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/song-toi-gian.pdf'),
('TDND', 1, 'Tự do trong đời', 'Lý Tiểu Long', 'KNS', '1967', 'Triết lý về tự do và phát triển cá nhân.', 'tu-do-trong-doi-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/tu-do-trong-doi.pdf'),
('TLDD', 1, 'Tâm lý học đám đông', 'Gustave Le Bon', 'KH', '0000', 'Tìm hiểu hành vi và tư duy của đám đông.', 'tam-ly-hoc-dam-dong-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/tam-ly-hoc-dam-dong.pdf'),
('TLK', 1, 'Thời Gian Là Vàng', 'Kiyosaki Robert', 'KNS', '2009', 'Cách quản lý thời gian hiệu quả trong cuộc sống.', 'thoi-gian-la-vang-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/thoi-gian-la-vang.pdf'),
('TMM', 1, 'Zero to One', 'Peter Thiel', 'KH', '2014', 'Khám phá tư duy đổi mới và khởi nghiệp.', 'tu-duy-doi-moi-cover.jpg', './files/khong-den-mot.pdf'),
('TPVT', 1, 'Tâm Pháp Vận Trình', 'Lê Minh', 'TT', '2020', 'Khám phá tâm lý và quy luật thành công trong cuộc sống.', 'tam-phap-van-trinh-cover.jpg', 'http://localhost/BaiTapNhom/ChiaSeSach/files/tam-phap-van-trinh.pdf'),
('VTSS', 1, 'Các thế giới song song', 'Michio Kaku', 'KH', '2004', 'Khám phá lý thuyết về các vũ trụ song song.', 'vu-tru-song-song-cover.jpg', './files/cac-the-gioi-song-song.pdf'),
('XTHN', 1, 'Phẩm chất vàng của nhà lãnh đạo', 'John C. Maxwell', 'KNS', '2010', 'Cẩm nang để thành công trong công việc và cuộc sống.', 'xu-the-hang-nhat-cover.jpg', './files/pham-chat-vang-cua-nha-lanh-dao.pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `ma_the_loai` varchar(20) NOT NULL,
  `ten_the_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`ma_the_loai`, `ten_the_loai`) VALUES
('KH', 'Khoa học'),
('KNS', 'Kỹ năng sống'),
('LS', 'Lịch sử'),
('TT', 'Tiểu thuyết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image__web`
--

CREATE TABLE `image__web` (
  `ma_hinh_anh` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `duong_dan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image__web`
--

INSERT INTO `image__web` (`ma_hinh_anh`, `ten`, `duong_dan`) VALUES
(1, 'logo', 'http://localhost/BaiTapNhom/ChiaSeSach/images/logo/hhv.png '),
(2, 'icon', 'http://localhost/BaiTapNhom/ChiaSeSach/images/logo/HH_Chan.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(3) NOT NULL,
  `honv` varchar(10) NOT NULL,
  `tennv` varchar(30) NOT NULL,
  `gioi_tinh` varchar(5) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(50) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `ten_tk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `honv`, `tennv`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `so_dien_thoai`, `avatar`, `ten_tk`) VALUES
(1, '', 'Admin', 'Nam', '2003-02-12', 'Khánh Hoà', '0123456789', 'http://localhost/BaiTapNhom/ChiaSeSach/images/avatars/ca.jpg', 'admin'),
(2, 'Nguyễn', 'Tuấn Tú', 'Nam', '2014-07-19', 'Nha Trang, Khánh Hoà', '0398634567', 'http://localhost/BaiTapNhom/ChiaSeSach/images/avatars/user1.jpg', 'ngtuantu'),
(3, 'Đàm', 'Viết Trọng', 'Nam', '2014-11-25', 'Nha Trang, Khánh Hoà', '0395014947', 'http://localhost/BaiTapNhom/ChiaSeSach/images/avatars/user2.jpg', 'viettrong'),
(4, '', '', '', '0000-00-00', '', '', '', 'tuantu1202'),
(5, '', '', '', '0000-00-00', '', '', '', 'tu2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `ma_danh_gia` int(11) NOT NULL,
  `manv` int(3) NOT NULL,
  `ma_sach` varchar(20) NOT NULL,
  `xep_hang` tinyint(1) NOT NULL CHECK (`xep_hang` between 1 and 5),
  `binh_luan` text DEFAULT NULL,
  `ngay_danh_gia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`ma_danh_gia`, `manv`, `ma_sach`, `xep_hang`, `binh_luan`, `ngay_danh_gia`) VALUES
(1, 3, 'CCN', 5, 'Truyện dark quá', '2024-10-30 05:16:43'),
(2, 3, 'QBCC', 5, 'Hay!', '2024-10-30 05:16:43'),
(3, 2, 'NGCL', 4, 'Hay!', '2024-10-30 05:16:43'),
(4, 2, 'CCN', 5, 'test cmt', '2024-11-24 07:03:03'),
(7, 2, 'CCN', 5, 'test lần 2', '2024-11-24 07:05:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ma_nguoi_dung` int(3) NOT NULL,
  `ten_tk` varchar(100) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `quyen` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ma_nguoi_dung`, `ten_tk`, `mat_khau`, `quyen`) VALUES
(1, 'admin', 'admin', 0),
(2, 'ngtuantu', '1234', 1),
(3, 'viettrong', '1234', 1),
(4, 'tuantu1202', '3108', 1),
(5, 'tu2', '1234', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ma_sach`),
  ADD KEY `manv` (`manv`),
  ADD KEY `ma_the_loai` (`ma_the_loai`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ma_the_loai`);

--
-- Chỉ mục cho bảng `image__web`
--
ALTER TABLE `image__web`
  ADD PRIMARY KEY (`ma_hinh_anh`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ma_danh_gia`),
  ADD KEY `ma_sach` (`ma_sach`),
  ADD KEY `manv` (`manv`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ma_nguoi_dung`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `image__web`
--
ALTER TABLE `image__web`
  MODIFY `ma_hinh_anh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ma_danh_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ma_nguoi_dung` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`ma_the_loai`) REFERENCES `categories` (`ma_the_loai`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`ma_sach`) REFERENCES `books` (`ma_sach`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
