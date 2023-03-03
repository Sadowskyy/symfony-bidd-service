-- You can paste here some schemas etc. also you can do it in another file with .sql extension
DROP DATABASE IF EXISTS application;

CREATE DATABASE IF NOT EXISTS application;

USE application;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id`         int(10) NOT NULL AUTO_INCREMENT,
    `uuid`       varchar(36) CHARACTER SET utf8  NOT NULL,
    `email`      varchar(250) CHARACTER SET utf8 NOT NULL,
    `password`   char(60) CHARACTER SET utf8 DEFAULT NULL,
    `language`   char(2) CHARACTER SET utf8      NOT NULL,
    `created_at` datetime                        NOT NULL,
    `updated_at` datetime                        NOT NULL,
    PRIMARY KEY (`id`),
    KEY          `email` (`email`),
    KEY          `uuid` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;

INSERT INTO `users` (`id`, `uuid`, `email`, `password`, `language`, `created_at`, `updated_at`)
VALUES (1, '07153a4a-f96b-11e9-afd5-0242ac12000b', 'admin@symfony.dev', '$2a$12$8E4kJMqXFD2MpSfEPhnyBu19TdXmAIPsVXZ1/sIHeFoQZyqV5/S4O', 'en', '2000-10-28 10:10:10', '2020-10-28 11:11:08');

UNLOCK TABLES;

DROP TABLE IF EXISTS `auctions`;

CREATE TABLE `auctions` (
    `id`    int(10) NOT NULL AUTO_INCREMENT,
    `uuid`  varchar(36) CHARACTER SET utf8  NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    `start_time` datetime NOT NULL,
    `end_time` datetime NOT NULL,
    `starting_price` int(10) NOT NULL,
    `current_bid` int(10) NOT NULL,
    `seller_id` INT NOT NULL,
    `winner_id` INT,
    `status` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT fk_auctions_sellers FOREIGN KEY (seller_id) REFERENCES users(id),
    CONSTRAINT fk_auctions_winners FOREIGN KEY (winner_id) REFERENCES users(id)
);

CREATE TABLE `roles`
(
    `id`         int(10) NOT NULL AUTO_INCREMENT,
    `user_id`    int(10) NOT NULL,
    `role`       varchar(64) CHARACTER SET utf8 NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `roles` WRITE;
# Here we can paste some roles data.
UNLOCK TABLES;
