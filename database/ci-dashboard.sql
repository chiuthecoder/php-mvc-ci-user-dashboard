CREATE SCHEMA `ci-dashboard` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

USE `ci-dashboard`;

CREATE TABLE IF NOT EXISTS `products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `description` VARCHAR(255) NULL,
  `price` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
  );


CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `confirm_password` VARCHAR(45) NULL,
  `user_level' VARCHAR(45) NOT NULL DEFAULT 'normal',
  `description` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
  );

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `user_level`, `created_at`, `updated_at`) VALUES ('1', 'Fox', 'Smith', 'fox@gmail.com', '11', 'admin', '2015/04/04', '2015/04/04');


CREATE TABLE IF NOT EXISTS `messages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `message` TEXT NULL,
  `author_id` INT NULL,
  `recipient_id` INT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
  );



CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `product_id` INT NULL,
  `qty` INT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
  );
