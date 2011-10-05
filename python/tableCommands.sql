CREATE TABLE tweets (tweetId INT,userId VARCHAR(50), createdAt DATETIME, twitterId VARCHAR(75), geoInfo NVARCHAR(500), Text NVARCHAR(1000));
ALTERTABLE tweets ADD PRIMARY KEY (tweetId);
ALTER TABLE tweets ADD INDEX(tweetId);
ALTER TABLE tweets MODIFY userId VARCHAR(50) NOT NULL;
ALTER TABLE tweets MODIFY createdAt DATETIME NOT NULL;
ALTER TABLE tweets MODIFY twitterId VARCHAR(75) NOT NULL;
ALTER TABLE tweets MODIFY Text VARCHAR(500) NOT NULL;
ALTER TABLE tweets MODIFY COLUMN tweetId INT NOT NULL AUTO_INCREMENT;

--insert these two lines into /etc/mysql/my.cnf under the [mysqld] section
--default-character-set=utf8
--skip-character-set-client-handshake
--Tue, 04 Oct 2011 02:51:27 +0000
