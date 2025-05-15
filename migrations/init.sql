CREATE SCHEMA `ospwww`;

CREATE TABLE `ospwww`.`blog_post` (
                                      `id` INT NOT NULL AUTO_INCREMENT,
                                      `title` VARCHAR(128) NOT NULL,
                                      `author` VARCHAR(64) NOT NULL,
                                      `created_at` DATETIME NOT NULL,
                                      `image_url` VARCHAR(64) NOT NULL,
                                      `content` TEXT NOT NULL,
                                      PRIMARY KEY (`id`));
