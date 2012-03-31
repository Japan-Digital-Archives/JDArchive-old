SET NAMES 'utf8';

DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues` (
  `issueId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL,
  `title` varchar(150) NOT NULL,
  `url` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `picture` int NOT NULL,
  `approved` int NOT NULL,
  `processedDate` datetime DEFAULT NULL
) ENGINE=Innodb DEFAULT CHARSET=utf8;
