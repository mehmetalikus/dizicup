-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Eki 2018, 18:36:42
-- Sunucu sürümü: 10.1.32-MariaDB
-- PHP Sürümü: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dizicup`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `actor`
--

CREATE TABLE `actor` (
  `actorId` int(11) NOT NULL,
  `actorName` varchar(255) NOT NULL,
  `actorImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `actor`
--

INSERT INTO `actor` (`actorId`, `actorName`, `actorImage`) VALUES
(1, 'Charlie Cox', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5WkCoFLZZap5RN9ar4-JyI-WCoepNjgq5h2uRv9tUeTBWKVPCVmO35GA'),
(2, 'Deborah Ann Woll', 'https://st2.depositphotos.com/5326338/10639/i/950/depositphotos_106396620-stock-photo-actress-deborah-ann-woll.jpg'),
(3, 'Vincent D\'Onofrio', 'http://tr.web.img2.acsta.net/c_215_290/pictures/16/02/17/13/55/281234.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `series`
--

CREATE TABLE `series` (
  `SeriesId` int(11) NOT NULL,
  `SeriesName` varchar(255) NOT NULL,
  `SeriesSummary` text NOT NULL,
  `SeriesYear` year(4) NOT NULL,
  `SeriesIMDB` double NOT NULL,
  `SeriesPosterImage` varchar(255) NOT NULL,
  `SeriesMiniPosterImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `series`
--

INSERT INTO `series` (`SeriesId`, `SeriesName`, `SeriesSummary`, `SeriesYear`, `SeriesIMDB`, `SeriesPosterImage`, `SeriesMiniPosterImage`) VALUES
(1, 'Daredevil', 'Başarılı bir avukat olan Matt Murdock, çocukken geçirdiği bir kaza sonucu gözlerini kaybeder (radyoaktif bir madde gözlerine sıçrar). Gözlerini kaybetmesine karşılık diğer duyularını geliştiren Murdock, kendini sürekli olarak psikolojik ve fiziksel olarak geliştirir.\r\n\r\nDuyma yetisi muazzam bir seviyeye varan Murdock, kulaklarını tıpkı bir radar gibi kullanarak çevresinde olan bitenin görüntüsünü zihninde canlandırır. Bunun yanına üstün dövüş yetenekleri de eklenince Matt Murdock, son derece tehlikeli, bir suçlu olarak karşılaşmak istediğiniz son adama dönüşecektir.\r\n\r\nYaşadığı ve büyüdüğü yer olan Hell\'s Kitchen\'da suç oranı tavan yapmıştır. Küçük yaşta mafya lideri Kingpin tarafından öldürülen babası için avukat olarak suçla savaşmayı seçen Murdock, adaletin mafyaya yetersiz kaldığını düşünür. Tamamıyla çeteler ve mafyaların elinde olan Hell\'s Kitchen\'a hak ettiği adaleti vermeyi ise kendine görev edinir.\r\n\r\nSon derece iyi dövüşen Matt Murdock, artık gündüzleri suçla adalet yoluyla mücadele eden bir avukat, geceleri ise suçla, adaletsizlikle kendi yöntemleriyle savaşan \'\'Daredevil\'\'dır. ', 2015, 9.1, 'https://i.amz.mshcdn.com/nwJayz2XWoGG0-nWXmmo7YET7SM=/fit-in/1200x9600/https%3A%2F%2Fblueprint-api-production.s3.amazonaws.com%2Fuploads%2Fcard%2Fimage%2F849399%2F50f1c068-71fb-49a0-9c5e-cd0780fe25c4.jpg', 'https://s01.diziler.com/630x250/18-08/05/daredevil.jpg?0.8017832025016771'),
(2, 'Lucifer', 'Lucifer, Tom Kapinos tarafından üretilen Amerikan fantastik polisiye komedi-drama dizisidir. 25 Ocak 2016\'da Fox\'da yayınlanmaya başlamıştır.[1][2] Neil Gaiman,Sam Kieth ve Mike Dringenberg tarafından yaratılan The Sandman çizgi roman serisinden esinlenilen dizinin senaryosunu Mike Carey yazmaktadır. 2016\'nın Nisan ayında Fox ikinci sezon için sözleşme yenilemiştir. 29 Mayıs 2017\'de biten ikinci sezonun ardından yılbaşından hemen sonra 2 Ocak 2017\'de üçüncü sezonuyla yayın hayatına devam etmiştir. 11 Mayıs 2018\'de dizinin iptal edildiği ve 4 sezonun olmayacağı açıklandı. Lucifer\'in iptal edilmesinin ardından dizinin fanları sosyal medyada dizinin devam etmesi için büyük kampanyalar başlattılar twitter\'da \"Luciferi Kurtar\" etiketi günlerce dünya gündeminde ilk sıralarda kalmayı başarınca yapımcılar yeni kanal arayışı için harekete geçti ve 15 Haziran 2018\'de Netflix\'in dizinin yayın haklarını satın aldığı ve diziye 4 sezon onayı verdiği açıklandı. Dizi yayın hayatına Netflix\'te devam edecek. ', 2016, 8.2, 'https://images-na.ssl-images-amazon.com/images/I/51qpQDgUaIL._SY450_.jpg', 'https://i2.wp.com/www.dreadcentral.com/wp-content/uploads/2017/09/lucifer-s3-newtime.jpg?fit=900%2C391&ssl=1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `series_episodes`
--

CREATE TABLE `series_episodes` (
  `EpisodeId` int(11) NOT NULL,
  `EpisodeName` varchar(255) NOT NULL,
  `EpisodeChapter` tinyint(4) NOT NULL,
  `EpisodeSeason` tinyint(4) NOT NULL,
  `EpisodeVideoURL` text NOT NULL,
  `EpisodeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EpisodeIMDB` double NOT NULL,
  `EpisodeSubtitle` tinyint(1) NOT NULL DEFAULT '0',
  `EpisodeSubtitlePath` varchar(255) NOT NULL,
  `ViewCount` int(11) NOT NULL DEFAULT '0',
  `SeriesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `series_episodes`
--

INSERT INTO `series_episodes` (`EpisodeId`, `EpisodeName`, `EpisodeChapter`, `EpisodeSeason`, `EpisodeVideoURL`, `EpisodeDate`, `EpisodeIMDB`, `EpisodeSubtitle`, `EpisodeSubtitlePath`, `ViewCount`, `SeriesID`) VALUES
(1, 'Into the Ring', 1, 1, 'https://video-frx5-1.xx.fbcdn.net/v/t42.9040-2/10000000_1571271586326743_2087534189539753984_n.mp4?_nc_cat=110&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJwcmVtdXRlX3N2ZV9oZCJ9&rl=1500&vabr=750&_nc_ht=video-frx5-1.xx&oh=80a05dacde4edc0977ad48b1e3d497c8&oe=5BD8DCEF', '2018-10-29 12:00:00', 9.2, 1, 'daredevil.1.1.vtt', 150, 1),
(2, 'Pilot', 1, 1, '', '2018-10-29 13:00:00', 8.9, 1, '', 2506, 2),
(3, 'Cut Man', 2, 1, 'https://video-frx5-1.xx.fbcdn.net/v/t42.9040-2/10000000_894719880699222_96414095875506176_n.mp4?_nc_cat=108&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJwcmVtdXRlX3N2ZV9oZCJ9&rl=1500&vabr=630&_nc_ht=video-frx5-1.xx&oh=861369da5d9f384971a225b4babebba6&oe=5BD8A16A', '2018-10-30 14:00:00', 9, 1, '', 150, 1),
(4, 'Devil', 2, 1, '0', '2018-10-29 15:00:00', 0, 0, '', 100, 2),
(5, 'Rabbit in a Snowstorm', 3, 1, '0', '2018-10-30 20:00:00', 8.5, 1, '', 150, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `series_quotes`
--

CREATE TABLE `series_quotes` (
  `QuoteId` int(11) NOT NULL,
  `Quote` varchar(255) NOT NULL,
  `QuoteFrom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `series_quotes`
--

INSERT INTO `series_quotes` (`QuoteId`, `Quote`, `QuoteFrom`) VALUES
(1, '\"I am the one thing you cannot stop, Flash!\"', 'The Flash Season 2 Episode 11 '),
(2, '\"I became better than you!\"', 'The Flash Season 2 Episode 11'),
(3, '\"Bu dünyadan özgür bir adam olarak gitmek kadar büyük bir zafer yoktur.\"', 'Spartacus Season 3 Episode 2'),
(4, '\"He is my brother.\"', 'Prison Break Season 1 Episode 1'),
(5, '\"Say my name.\"', 'Breaking Bad Season 5 Episode 7'),
(6, '\"I am the danger!\"', 'Breaking Bad Season 4 Episode 6'),
(7, '\"The dead talk, if you listen.\"', 'Prison Break Season 5 Episode 1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `starring`
--

CREATE TABLE `starring` (
  `strId` int(11) NOT NULL,
  `actId` int(11) NOT NULL,
  `serId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `starring`
--

INSERT INTO `starring` (`strId`, `actId`, `serId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `UserURL` varchar(25) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `UserPassword`, `UserEmail`, `UserURL`, `CreatedAt`) VALUES
(1, 'mehmetalikus', '12345', 'mehmetali.kus@hotmail.com', 'mehmetalikus', '2018-10-29 18:51:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users_info`
--

CREATE TABLE `users_info` (
  `infoId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userProfileImage` varchar(255) NOT NULL,
  `userBirthDate` date NOT NULL,
  `userSummary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users_info`
--

INSERT INTO `users_info` (`infoId`, `userId`, `userProfileImage`, `userBirthDate`, `userSummary`) VALUES
(1, 1, 'https://i.hizliresim.com/r1W57V.jpg', '1998-11-24', 'Developer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `watch_log`
--

CREATE TABLE `watch_log` (
  `logId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `episodeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `watch_log`
--

INSERT INTO `watch_log` (`logId`, `userId`, `episodeId`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 1, 4);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actorId`);

--
-- Tablo için indeksler `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`SeriesId`),
  ADD UNIQUE KEY `SeriesName` (`SeriesName`);

--
-- Tablo için indeksler `series_episodes`
--
ALTER TABLE `series_episodes`
  ADD PRIMARY KEY (`EpisodeId`);

--
-- Tablo için indeksler `series_quotes`
--
ALTER TABLE `series_quotes`
  ADD PRIMARY KEY (`QuoteId`),
  ADD UNIQUE KEY `Quote` (`Quote`);

--
-- Tablo için indeksler `starring`
--
ALTER TABLE `starring`
  ADD PRIMARY KEY (`strId`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`),
  ADD UNIQUE KEY `UserURL` (`UserURL`);

--
-- Tablo için indeksler `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`infoId`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Tablo için indeksler `watch_log`
--
ALTER TABLE `watch_log`
  ADD PRIMARY KEY (`logId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `actor`
--
ALTER TABLE `actor`
  MODIFY `actorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `series`
--
ALTER TABLE `series`
  MODIFY `SeriesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `series_episodes`
--
ALTER TABLE `series_episodes`
  MODIFY `EpisodeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `series_quotes`
--
ALTER TABLE `series_quotes`
  MODIFY `QuoteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `starring`
--
ALTER TABLE `starring`
  MODIFY `strId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users_info`
--
ALTER TABLE `users_info`
  MODIFY `infoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `watch_log`
--
ALTER TABLE `watch_log`
  MODIFY `logId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
