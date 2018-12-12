create database IF NOT exists `L2C_KE_PHP_CMS`;
use `L2C_KE_PHP_CMS`;

CREATE TABLE if not exists `Users`(
	`ID` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`email` varchar(256) NOT NULL,
	`password` varchar(64) NOT NULL,
	`nickname` varchar(128) NOT NULL
	);

CREATE TABLE if not exists `Pages`(
	`ID` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`title` varchar(128) NOT NULL,
	`content` TEXT,
	`User_ID` int,
    `menu_label` varchar(128),
    `menu_order` int
);

ALTER TABLE `Pages` ADD CONSTRAINT fk_Pages_Users_idx FOREIGN KEY Pages(`User_ID`) REFERENCES Users(`ID`);


INSERT INTO `Users` (`email`, `password`, `nickname`) VALUES ("admin@admin.sk", "Administrator", "Admin);
INSERT INTO `Users` (`email`, `password`, `nickname`) VALUES ("janko@admin.sk", "Janko", "Jan");
INSERT INTO `Users` (`email`, `password`, `nickname`) VALUES ("durko@admin.sk", "Duro", "Durko");