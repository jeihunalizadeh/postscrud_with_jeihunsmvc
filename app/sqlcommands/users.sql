-- TABLE STRUCTURE FOR TABLE 'users' 
CREATE TABLE IF NOT EXISTS `users` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`created_at` datetime NOT NULL,
PRIMARY KEY (`id`)
)