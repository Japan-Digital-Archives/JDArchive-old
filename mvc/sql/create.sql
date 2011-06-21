DROP TABLE IF EXISTS testimonial;
CREATE TABLE testimonial (
    id INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
    name_public TINYINT,
    email VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
    city VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
    occupation VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
    year_of_birth SMALLINT,
    story TEXT CHARACTER SET utf8 COLLATE utf8_general_ci,
    from_year SMALLINT,
    from_month TINYINT,
    from_day TINYINT,
    from_hour TINYINT,
    to_year SMALLINT,
    to_month TINYINT,
    to_day TINYINT,
    to_hour TINYINT
) CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS testimonial_location;
CREATE TABLE testimonial_location (
    id INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    testimonial_id INTEGER NOT NULL,
    lat FLOAT,
    lng FLOAT,
    FOREIGN KEY (testimonial_id) REFERENCES testimonial(id)
);