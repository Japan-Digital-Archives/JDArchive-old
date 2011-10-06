SET NAMES 'utf8';

DROP TABLE IF EXISTS `tweets`;
CREATE TABLE `tweets` (
  `tweetId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userId` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `twitterId` varchar(75) NOT NULL,
  `geoInfo` varchar(500) DEFAULT NULL,
  `Text` varchar(500) NOT NULL
) ENGINE=Innodb DEFAULT CHARSET=utf8;
