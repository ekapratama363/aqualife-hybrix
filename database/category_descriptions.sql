-- ============================================================
-- DDL: category_descriptions
-- Mirip product_descriptions, menggunakan category_id sebagai
-- foreign key ke tabel categories
-- ============================================================

CREATE TABLE `category_descriptions` (
  `id`          INT(11)       NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(255)  NOT NULL,
  `subtitle`    VARCHAR(255)  DEFAULT NULL,
  `description` TEXT          NOT NULL,
  `images`      VARCHAR(255)  DEFAULT NULL,
  `link`        VARCHAR(255)  DEFAULT NULL,
  `position`    INT(11)       NOT NULL DEFAULT 1,
  `category_id` INT(11)       DEFAULT NULL,
  `created_at`  TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cat_desc_category` (`category_id`),
  CONSTRAINT `fk_cat_desc_category`
    FOREIGN KEY (`category_id`)
    REFERENCES `categories` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
