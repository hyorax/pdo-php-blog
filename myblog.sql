-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 12 Tem 2020, 11:25:32
-- Sunucu sürümü: 5.7.26
-- PHP Sürümü: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `myblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `postblog`
--

DROP TABLE IF EXISTS `postblog`;
CREATE TABLE IF NOT EXISTS `postblog` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` text COLLATE utf8_turkish_ci NOT NULL,
  `post_text` text COLLATE utf8_turkish_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_photo` text COLLATE utf8_turkish_ci NOT NULL,
  `post_pin` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `postblog`
--

INSERT INTO `postblog` (`post_id`, `post_title`, `post_text`, `post_date`, `post_photo`, `post_pin`) VALUES
(1, 'lorem ipsum', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt officia amet corrupti voluptas vitae dolorum temporibus ipsum, eos esse distinctio eveniet. Soluta est id beatae nesciunt eaque facilis voluptatibus ad!\r\n\r\n', '2020-07-01 10:35:15', 'https://g.hizliresim.com/buzul-gundogumu', 1),
(2, 'lorem ipsum52', '5Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt officia amet corrupti voluptas vitae dolorum temporibus ipsum, eos esse distinctio eveniet. Soluta est id beatae nesciunt eaque facilis voluptatibus ad!\r\n\r\n', '2020-07-01 10:35:15', 'https://g.hizliresim.com/gokyuzundeki-ates', 0),
(7, 'lorem ipsum5', '5Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt officia amet corrupti voluptas vitae dolorum temporibus ipsum, eos esse distinctio eveniet. Soluta est id beatae nesciunt eaque facilis voluptatibus ad!\r\n\r\n', '2020-07-03 15:58:13', 'https://upload.wikimedia.org/wikipedia/tr/1/1e/Pulse-wallpaper-10543798.jpg', 0),
(4, 'lorem ipsum4', '44Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt officia amet corrupti voluptas vitae dolorum temporibus ipsum, eos esse distinctio eveniet. Soluta est id beatae nesciunt eaque facilis voluptatibus ad!\r\n\r\n', '2020-07-01 10:35:15', 'https://g.hizliresim.com/mavi-gundogumu', 0),
(5, 'lorem ipsum52', '15Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt officia amet corrupti voluptas vitae dolorum temporibus ipsum, eos esse distinctio eveniet. Soluta est id beatae nesciunt eaque facilis voluptatibus ad!\r\n\r\n', '2020-07-01 10:35:15', 'https://g.hizliresim.com/gokyuzundeki-ates', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `postgenel`
--

DROP TABLE IF EXISTS `postgenel`;
CREATE TABLE IF NOT EXISTS `postgenel` (
  `genel_hakkimda` text COLLATE utf8_turkish_ci NOT NULL,
  `genel_iletisim` text COLLATE utf8_turkish_ci NOT NULL,
  `genel_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `genel_resim` text COLLATE utf8_turkish_ci NOT NULL,
  `genel_id` int(11) NOT NULL AUTO_INCREMENT,
  `genel_adi` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`genel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `postgenel`
--

INSERT INTO `postgenel` (`genel_hakkimda`, `genel_iletisim`, `genel_aciklama`, `genel_resim`, `genel_id`, `genel_adi`) VALUES
('11112312312Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis labore vel eaque? Fuga officia itaque et, consequatur ullam, iusto tenetur fugiat explicabo quasi aliquam nobis porro est earum. Ratione, l1ibero.11', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis labore vel eaque? Fuga officia itaque et, consequatur ullam, iusto tenetur fugiat explicabo quasi aliquam nobis porro est earum. Ratione, libero.11', 'Software Developer,11', '../assets/img/ben.jpg', 1, 'sametpalitci');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `postuser`
--

DROP TABLE IF EXISTS `postuser`;
CREATE TABLE IF NOT EXISTS `postuser` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `postuser`
--

INSERT INTO `postuser` (`user_id`, `user_username`, `user_password`) VALUES
(1, 'samet', '0000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
