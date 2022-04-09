CREATE TABLE cats(
    `id`  INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL ,
    `created_at` DATETIME DEFAULT NOW(),
     PRIMARY KEY(id)
    );

CREATE TABLE products(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `desc` VARCHAR(255) NOT NULL,
    `price` DECIMAL(8,2) NOT NULL,
    `img`  VARCHAR(255) NOT NULL,
    `pieces_no` SMALLINT NOT NULL ,
    `created_at` DATETIME DEFAULT NOW(),
    `cat_id` INT UNSIGNED ,
    PRIMARY KEY(id),
    FOREIGN KEY (`cat_id`) REFERENCES cats(id) 
    ON DELETE SET NULL
       );

CREATE TABLE orders (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) ,
    `status` ENUM ('pending','canceled','approved') DEFAULT 'pending' ,
    `created_at` DATETIME DEFAULT NOW(),
    PRIMARY KEY (id)
       );

CREATE TABLE order_details(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `product_id` INT UNSIGNED,
    `order_id` INT UNSIGNED,
    `qty` INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(`product_id`) REFERENCES `products`(id) ON DELETE SET NULL,
    FOREIGN KEY(`order_id`) REFERENCES `orders`(id) ON DELETE SET NULL
     );
CREATE TABLE admins(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
   `password`VARCHAR(255) NOT NULL,
   `created_at` DATETIME DEFAULT NOW(),
   `is_super` ENUM ('admin','super') DEFAULT 'admin' ,
    PRIMARY KEY(`id`)
     );