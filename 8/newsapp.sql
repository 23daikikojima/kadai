-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 9 月 26 日 18:12
-- サーバのバージョン： 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_academy`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `newsapp`
--

CREATE TABLE IF NOT EXISTS `newsapp` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `vote_num` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `newsapp`
--

INSERT INTO `newsapp` (`id`, `title`, `content`, `category_id`, `category_name`, `create_date`, `update_date`, `vote_num`) VALUES
(1, 'Burberry leads the way for tech and fashion', 'After announcing a partnership with Apple Music earlier this week, British luxury brand Burberry has revealed that it’s also teaming up with Snapchat to debut its latest collection a day before it hits the runway at London Fashion Week.', 1, 'Apps', '2015-09-20 18:01:53', '2015-09-20 18:01:53', 0),
(2, 'Snip and Share for Chrome makes it simple to post GIFs,', 'Tweeting an article or posting it to Facebook isn’t the most challenging thing – and there are plenty of ways you can achieve the same goal.\r\n\r\nHowever, there aren’t too many tools that let you share an entire page, a cropped section or a manually selected piece of content – like a GIF, still image, video or words – all in one. The Crop and Share Chrome extension exists for just that reason.', 1, 'Apps', '2015-09-20 18:00:31', '2015-09-20 18:00:31', 0),
(3, 'Scoutee baseball radar measures pitch speed with your smartphone', 'At last, quantification seems to have finally made its way to where it’s actually important: Sports – baseball, in particular. Slovenia-based Scoutee has launched a $50,000 Kickstarter campaign for a smart radar that can measure the speed of baseball pitch and transfer the data to smartphone via Bluetooth.', 2, 'Gear', '2015-09-20 18:03:37', '2015-09-20 18:03:37', 0),
(4, 'BlackBerry’s Android phone is shaping up nicely in first leaked hands-on video', 'After months of rumors, it’s no surprise that BlackBerry is working on an Android device. But thanks to a leaked video by Canadian phone retailer Baka Mobile, we have our first look at the device in action – and it actually looks pretty nice!', 2, 'Gear', '2015-09-20 18:04:33', '2015-09-20 18:04:33', 0),
(5, 'Make a Foamy, Dairy-Free "Latte" With Xanthan Gum', 'Here it interacts with the water to thicken up the coffee and give it that smooth, creamy texture you’d get with a real latte. You might even want to try blending in other things like cinnamon or sugar to add some extra flavor.', 3, 'Lifehack', '2015-09-20 18:05:53', '2015-09-20 18:05:53', 0),
(6, 'Get 67% Off DreamHost SSD Hosting and a Domain Name ($2.95 a Month)', 'DreamHost is offering Lifehacker readers a year of SSD web hosting and a domain name for just $2.95 a month, 67% off the regular price. Build the site you’ve always dreamed of from the ground up and get all the key features you need to keep it running efficiently, all for only $35 annually. Use promo code lifehacker295dh.', 3, 'Lifehack', '2015-09-20 18:06:45', '2015-09-20 18:06:45', 0),
(7, 'Postmates expands to 10 new markets, pushing US presence to 40 cities total', 'In its effort to rapidly expand its on-demand capabilities, delivery app Postmates has expanded into 10 new major metro areas starting today.\r\n\r\nAnnounced in a blog post, the startup now provides service to Baltimore, Columbus, Jersey City, Kansas City, Milwaukee, Oklahoma City, Palm Springs, Pittsburgh, Raleigh and St. Louis. This bumps up Postmates’ total service areas to 40 different cities across 17 states and the District of Columbia.', 1, 'Apps', '2015-09-20 20:11:02', '2015-09-20 20:11:02', 0),
(8, 'Periscope has introduced Web profiles', 'Periscope announced today that users can now set up Web profiles for the streaming service.\r\n\r\nAll you have to do is go to periscope.tv/username to see a person’s profile and their recent broadcasts. For example, you can go to periscope.tv/thenextweb to check us out.', 1, 'Apps', '2015-09-20 20:11:48', '2015-09-20 20:11:48', 0),
(9, 'Inside the iPad Mini 4: Basically a smaller iPad Air 2', 'The iPad Pro stole the limelight at Apple’s event last week, while the iPad Mini 4 announcement was little more than a footnote.\r\n\r\nWas Apple hiding something? Well, the tinkerers at iFixit decided to get stuck in and find out.', 2, 'Gear', '2015-09-20 20:12:37', '2015-09-20 20:12:37', 0),
(10, 'Android One comes to Europe with the BQ Aquaris A4.5', 'After launching in numerous emerging markets in Asia and Africa, Google is expanding its Android One program to Europe.\r\n\r\nSpain and Portugal are the first to get on board the company’s program to bring low-cost handsets running the latest version of Android to customers.', 2, 'Gear', '2015-09-20 20:13:22', '2015-09-20 20:13:22', 0),
(11, 'Addappt is an Address Book That Updates When Your Friends Info Changes ', 'Android/iOS: Updating your contacts every time your friends change their info can be annoying, especially if you don’t know they’ve changed it. Addappt, on the other hand, is a social contacts app that updates automatically.', 3, 'Lifehack', '2015-09-20 20:14:15', '2015-09-20 20:14:15', 0),
(12, 'Nusiki Is a Social Stream of Nothing But Great Music', 'Web/Android/iOS: New music is easy to find, but if you want to hear what people think is good, you’ll need to go somewhere they actually choose and post songs they want other people to listen to. Nusiki is a service designed just for that—for you to share the songs you love, and discover other great tracks too.', 3, 'Lifehack', '2015-09-20 20:14:49', '2015-09-20 20:14:49', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsapp`
--
ALTER TABLE `newsapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsapp`
--
ALTER TABLE `newsapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
