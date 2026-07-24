-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 08:46 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digikala_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE `analysis` (
  `id` int(255) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `value` text COLLATE utf8_persian_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `link` varchar(30) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `analysis`
--

INSERT INTO `analysis` (`id`, `title`, `value`, `product_id`, `link`) VALUES
(1, 'طراحی وساخت', '<p>توضیحات مربوط به نقد و بررسی طراحی و ساخت</p>\r\n\r\n<p>sdsdsdsd</p>\r\n', 1, 'one'),
(2, 'صفحه نمایش', 'توضیحات مربوط به صفحه نمایش', 1, 'two'),
(3, 'دوربین', 'شسبشسیبسشیبشسیب', 1, 'three'),
(4, 'باطری', 'بسیبسیبسیبس', 1, 'four');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `body`) VALUES
(1, 1, 'کیفیتش خوبه'),
(2, 2, 'جواب سوال دوم');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`title`, `parent`, `id`) VALUES
('موبایل', 1, 2),
('تبلت', 1, 3),
('نوت بوک', 1, 5),
('ادویه', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `category_attr`
--

CREATE TABLE `category_attr` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `category_attr`
--

INSERT INTO `category_attr` (`id`, `title`, `category_id`) VALUES
(1, 'مشخصات ظاهری', 2),
(2, 'سخت افزار', 2),
(3, 'مشخصات کلی', 2),
(4, 'مشخصات فنی', 2);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `hex` varchar(11) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `hex`) VALUES
(3, 'مشکی', '000'),
(4, 'سفید', 'fff'),
(5, 'نقره', 'bfbfbf');

-- --------------------------------------------------------

--
-- Table structure for table `color_for_product`
--

CREATE TABLE `color_for_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `color_for_product`
--

INSERT INTO `color_for_product` (`id`, `product_id`, `color_id`) VALUES
(40, 1, 3),
(41, 1, 4),
(42, 1, 5),
(43, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `positive` text COLLATE utf8_persian_ci NOT NULL,
  `negative` text COLLATE utf8_persian_ci NOT NULL,
  `insert_date` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `like_count` int(255) NOT NULL,
  `dislike_count` int(255) NOT NULL,
  `params` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `title`, `body`, `product_id`, `user_id`, `positive`, `negative`, `insert_date`, `like_count`, `dislike_count`, `params`) VALUES
(1, 'عنوان جدید', 'اینو خریدم راضی بودم', 1, 1, 'شارژش خوبه', 'حیف که دو سیم کارته نیست', '1397/2/3', 10, 2, 'a:2:{i:1;i:1;i:2;i:4;}'),
(2, 'چرا یک سیم کارته؟', 'خیلی بده که یه سیم کارت هست', 1, 2, 'نداره', 'خیلی داره', '97/4/2', 3, 5, 'a:2:{i:1;i:5;i:2;i:3;}');

-- --------------------------------------------------------

--
-- Table structure for table `comment_param`
--

CREATE TABLE `comment_param` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comment_param`
--

INSERT INTO `comment_param` (`id`, `title`, `sub_category_id`) VALUES
(1, 'نوآوری', 1),
(2, 'ارزش خرید نسبت به قیمت', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img`, `product_id`) VALUES
(6, '1556909140', 1),
(7, '1556909145', 1),
(8, '1556909148', 1);

-- --------------------------------------------------------

--
-- Table structure for table `garanty`
--

CREATE TABLE `garanty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `garanty`
--

INSERT INTO `garanty` (`id`, `name`) VALUES
(1, 'گارانتی 12 ماهه تلکام'),
(2, 'گارانتی 24 ماهه تلکام');

-- --------------------------------------------------------

--
-- Table structure for table `guarantees_for_product`
--

CREATE TABLE `guarantees_for_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `guarantees_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `guarantees_for_product`
--

INSERT INTO `guarantees_for_product` (`id`, `product_id`, `guarantees_id`) VALUES
(26, 1, 1),
(27, 1, 2),
(28, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `title` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `introduction` text COLLATE utf8_persian_ci NOT NULL,
  `mojodi` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `just_here` int(11) NOT NULL,
  `seen` int(255) NOT NULL,
  `3d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `cat`, `introduction`, `mojodi`, `discount`, `just_here`, `seen`, `3d`) VALUES
(1, 'گوشی مثالی', 1000, 1, '<p><span style=\"color:#ff0000\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طر</span>احان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>\r\n', 10, 5, 1, 30, 1),
(2, 'بسی', 222, 1, '<p>22222</p>\r\n', 2, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_attr_value`
--

CREATE TABLE `product_attr_value` (
  `id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `value` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product_attr_value`
--

INSERT INTO `product_attr_value` (`id`, `attr_id`, `value`, `product_id`) VALUES
(1, 1, '10*12 inch', 1),
(2, 2, '100gr', 1),
(3, 7, '1207*768', 1),
(7, 8, '30v', 1),
(11, 5, '3', 1),
(12, 13, 'دارد', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `insert_date` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `body`, `insert_date`, `user_id`, `product_id`) VALUES
(1, 'کیفیت دوربینش چه جوریه؟', '97/2/3', 1, 1),
(2, 'متن سوال دوم؟', '97/6/6', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `value` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'slider_items', '6'),
(2, 'Tell_company', '22222222-021'),
(3, 'Email', 'info@eShop.com');

-- --------------------------------------------------------

--
-- Table structure for table `specials_product`
--

CREATE TABLE `specials_product` (
  `id` int(255) NOT NULL,
  `start_time` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `days` int(255) NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `specials_product`
--

INSERT INTO `specials_product` (`id`, `start_time`, `days`, `product_id`) VALUES
(1, '1551610350', 6, 1),
(2, '1551610350', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `title`, `parent`) VALUES
(1, 'گوشی موبایل', 2),
(2, 'هدست', 2),
(3, 'باطری', 2),
(7, 'سامسونگ A+', 2),
(8, 'سیسی', 5),
(16, 'تند', 6),
(17, 'ترش', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_attr`
--

CREATE TABLE `sub_category_attr` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `sub_category_attr`
--

INSERT INTO `sub_category_attr` (`id`, `title`, `sub_category_id`, `parent`) VALUES
(1, 'ابعاد', 1, 1),
(2, 'وزن', 1, 1),
(4, 'رنگ', 1, 1),
(5, 'تعداد سیم کارت', 1, 3),
(7, 'رزولیشن', 1, 1),
(8, 'ولتاژ', 1, 2),
(9, 'توان باطری', 1, 2),
(10, 'مدل CPU', 1, 4),
(11, 'RAM', 1, 4),
(12, 'حافظه داخلی', 1, 4),
(13, 'WIFI', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `top_category`
--

CREATE TABLE `top_category` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `top_category`
--

INSERT INTO `top_category` (`id`, `title`) VALUES
(1, 'دیجیتال'),
(2, 'خوراکی');

-- --------------------------------------------------------

--
-- Table structure for table `top_slider`
--

CREATE TABLE `top_slider` (
  `id` int(255) NOT NULL,
  `img` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `top_slider`
--

INSERT INTO `top_slider` (`id`, `img`, `title`, `link`) VALUES
(1, 'public/images/sliders/slider1.jpg', 'محصولات خوب', ''),
(2, 'public/images/sliders/slider2.jpg', 'محصولات تخفیف خورده', ''),
(3, 'public/images/sliders/slider3.jpg', 'محصولات روز', ''),
(4, 'public/images/sliders/slider4.jpg', 'محصولات نایاب', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `fullname` varchar(150) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `fullname`) VALUES
(1, 'info@sadeq-khan.ir', '123456', 'sadeq khan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_attr`
--
ALTER TABLE `category_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_for_product`
--
ALTER TABLE `color_for_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_param`
--
ALTER TABLE `comment_param`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garanty`
--
ALTER TABLE `garanty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guarantees_for_product`
--
ALTER TABLE `guarantees_for_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attr_value`
--
ALTER TABLE `product_attr_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attr_id` (`attr_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specials_product`
--
ALTER TABLE `specials_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category_attr`
--
ALTER TABLE `sub_category_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_category`
--
ALTER TABLE `top_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_slider`
--
ALTER TABLE `top_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysis`
--
ALTER TABLE `analysis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_attr`
--
ALTER TABLE `category_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `color_for_product`
--
ALTER TABLE `color_for_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment_param`
--
ALTER TABLE `comment_param`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `garanty`
--
ALTER TABLE `garanty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guarantees_for_product`
--
ALTER TABLE `guarantees_for_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_attr_value`
--
ALTER TABLE `product_attr_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specials_product`
--
ALTER TABLE `specials_product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sub_category_attr`
--
ALTER TABLE `sub_category_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `top_category`
--
ALTER TABLE `top_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `top_slider`
--
ALTER TABLE `top_slider`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
