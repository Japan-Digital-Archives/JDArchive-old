ALTER TABLE `testimonial`
      ADD COLUMN created TIMESTAMP NOT NULL DEFAULT NOW(),
      ADD COLUMN spamkarma FLOAT DEFAULT 0.0,
      ADD COLUMN client_ip VARCHAR(15),
      ADD COLUMN flags TINYINT DEFAULT 1;

ALTER TABLE `testimonial_location` ADD COLUMN `name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci;