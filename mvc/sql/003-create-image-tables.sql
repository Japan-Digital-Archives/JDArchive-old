DROP TABLE IF EXISTS testimonial_image;
CREATE TABLE testimonial_image (
    id INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    testimonial_id INTEGER,
    filename VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci,
    extension CHAR(3) CHARACTER SET utf8 COLLATE utf8_general_ci,
    description VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
    lat FLOAT,
    lng FLOAT,
    address VARCHAR(255),
    FOREIGN KEY (testimonial_id) REFERENCES testimonial(id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS testimonial_image_tag;
CREATE TABLE testimonial_image_tag (
    id INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    testimonial_image_id INTEGER NOT NULL,
    tag VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
    FOREIGN KEY (testimonial_image_id) REFERENCES testimonial_image(id)
);