-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 May 2021, 18:47:03
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `e-ticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_resim` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_ad` varchar(50) NOT NULL,
  `kullanici_mail` varchar(100) NOT NULL,
  `kullanici_password` varchar(50) NOT NULL,
  `kullanici_adsoyad` varchar(50) NOT NULL,
  `kullanici_unvan` varchar(100) NOT NULL,
  `kullanici_yetki` varchar(50) NOT NULL DEFAULT '0',
  `kullanici_durum` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_ad`, `kullanici_mail`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`) VALUES
(15, '2021-05-10 18:11:02', 'b', 'sdadad@sadad', 'b', '', '', '1', 1),
(16, '2021-05-14 01:19:07', 'admin', 'sdadad@sadad', '1234', '', '', '0', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(3) NOT NULL,
  `sepet_adet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `siparis_no` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `siparis_toplam` float(9,2) NOT NULL,
  `siparis_odeme` enum('0','1') NOT NULL,
  `siparis_tip` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparis_detay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_fiyat` int(9) NOT NULL,
  `urun_adet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparis_detay_id`, `siparis_id`, `urun_id`, `urun_fiyat`, `urun_adet`) VALUES
(46, 87, 3, 30, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_teslim`
--

CREATE TABLE `siparis_teslim` (
  `siparis_teslim_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `kullanici_id` int(11) NOT NULL,
  `siparis_toplam` float NOT NULL,
  `siparis_tip` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `siparis_teslim`
--

INSERT INTO `siparis_teslim` (`siparis_teslim_id`, `siparis_id`, `siparis_zaman`, `kullanici_id`, `siparis_toplam`, `siparis_tip`) VALUES
(59, 87, '2021-05-18 09:29:38', 15, 30, 'Banka Havalesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(32) NOT NULL,
  `urun_baslik` varchar(32) NOT NULL,
  `urun_hakkinda` text NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_fiyat` int(32) NOT NULL,
  `urun_resim` varchar(300) NOT NULL,
  `urun_durum` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_baslik`, `urun_hakkinda`, `urun_stok`, `urun_fiyat`, `urun_resim`, `urun_durum`) VALUES
(1, 'Ilk ürün', '              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 101, 30, 'https://i.imgyukle.com/2021/03/22/Nl4Qeq.jpg', 1),
(3, 'İkinci Ürün ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 90, 30, 'https://i.imgyukle.com/2021/04/13/O5wU7N.jpg', 0),
(10, 'Üçüncü Ürün', 'but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 30, 20, 'https://i.imgyukle.com/2021/05/17/OKtJT6.jpg', 0),
(11, 'Dördüncü ürün', 'but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20, 10, 'https://i.imgyukle.com/2021/05/17/OKtr9y.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_ekleyen` varchar(200) NOT NULL,
  `yorum_eposta` varchar(200) NOT NULL,
  `yorum_mesaj` varchar(200) NOT NULL,
  `yorum_tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `yorum_urun_id` int(11) NOT NULL DEFAULT 0,
  `yorum_onay` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_ekleyen`, `yorum_eposta`, `yorum_mesaj`, `yorum_tarih`, `yorum_urun_id`, `yorum_onay`) VALUES
(18, 'admin', '<br />\r\n<b>Notice</b>:  Undefined index: kullanici_mail in <b>C:\\xampp\\htdocs\\Projeler\\WebProj\\detay.php</b> on line <b>147</b><br />\r\n', 'yorum', '2021-05-14 10:06:47', 1, 0),
(19, 'admin', '<br />\r\n<b>Notice</b>:  Undefined index: kullanici_mail in <b>C:\\xampp\\htdocs\\Projeler\\WebProj\\detay.php</b> on line <b>147</b><br />\r\n', 'deeme', '2021-05-14 10:10:00', 1, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparis_detay_id`);

--
-- Tablo için indeksler `siparis_teslim`
--
ALTER TABLE `siparis_teslim`
  ADD PRIMARY KEY (`siparis_teslim_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_detay`
--
ALTER TABLE `siparis_detay`
  MODIFY `siparis_detay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_teslim`
--
ALTER TABLE `siparis_teslim`
  MODIFY `siparis_teslim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
