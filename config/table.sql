DROP TABLE IF EXISTS userdata;
CREATE TABLE userdata(
id INT(15) UNSIGNED  NOT NULL AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(255) NOT NULL,
lastname VARCHAR(255) NOT NULL,
username VARCHAR(255) NOT NULl,
email VARCHAR(255) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
status ENUM('0','1') NOT NULl DEFAULT '0',
reseturl VARCHAR(256),
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
ipaddress VARCHAR(255)
);

DROP TABLE IF EXISTS staticpage;
CREATE TABLE staticpage (
id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
url VARCHAR(255) NOT NULL UNIQUE,
title TEXT,
description TEXT,
content TEXT,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
ipaddress VARCHAR(255)
);

DROP TABLE IF EXISTS category;
CREATE TABLE category (
id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
description  VARCHAR(255) NOT NULL,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
ipaddress VARCHAR(255)
); 

DROP TABLE IF EXISTS media;
CREATE TABLE media (
id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
url VARCHAR(255) NOT NULL,
ext VARCHAR(10) NOT NULL
);

DROP TABLE IF EXISTS author;
CREATE TABLE author (
id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
biography TEXT,
userdata_id INT(15) UNSIGNED NOT NULL,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
ipaddress VARCHAR(255),
CONSTRAINT author_FK1 FOREIGN KEY (userdata_id) REFERENCES userdata(id) ON UPDATE CASCADE
); 

DROP TABLE IF EXISTS dynamicpage;
CREATE TABLE dynamicpage (
id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
url VARCHAR(255) NOT NULL,
title TEXT,
description TEXT,
content TEXT,
category_id INT(15) UNSIGNED NOT NULL,
author_id INT(15) UNSIGNED NOT NULL,
created TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
ipaddress VARCHAR(255) NOT NULL,
CONSTRAINT dynamicpages_FK1 FOREIGN KEY (category_id) REFERENCES category(id) ON UPDATE CASCADE,
CONSTRAINT dynamicpages_FK4 FOREIGN KEY (author_id) REFERENCES author(id) ON UPDATE CASCADE
); 

DROP TABLE IF EXISTS comment;
CREATE TABLE comment(
id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
dynamicpage_id INT(15) UNSIGNED NOT NULL,
comment TEXT,
CONSTRAINT comment_FK1 FOREIGN KEY (dynamicpage_id) REFERENCES dynamicpage (id)  ON UPDATE CASCADE
);







  







