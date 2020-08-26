CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`id`)
)