-- Migration: product_images — ganti product_id menjadi category_id
-- Jalankan secara berurutan

-- 1. Tambah kolom category_id
ALTER TABLE `product_images`
  ADD COLUMN `category_id` INT(11) DEFAULT NULL AFTER `product_id`;

-- 2. (Opsional) Salin nilai product_id ke category_id jika datanya masih relevan
-- UPDATE `product_images` SET `category_id` = `product_id`;

-- 3. Hapus kolom product_id
ALTER TABLE `product_images`
  DROP COLUMN `product_id`;

-- 4. Tambah foreign key ke tabel categories
ALTER TABLE `product_images`
  ADD KEY `fk_prod_img_category` (`category_id`),
  ADD CONSTRAINT `fk_prod_img_category`
    FOREIGN KEY (`category_id`)
    REFERENCES `categories` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE;
