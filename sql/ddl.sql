CREATE TABLE tours (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    create_time DATETIME COMMENT 'Create Time',
    title VARCHAR(255),
    price VARCHAR(255)
);

CREATE TABLE reviews (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    create_time DATETIME COMMENT 'Create Time',
    author_name VARCHAR(255),
    body NVARCHAR(1000)
);

CREATE TABLE price (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    value INT NOT NULL COMMENT 'Price Value',
    currency VARCHAR(10) NOT NULL COMMENT 'Currency',
    tour_id INT NOT NULL COMMENT 'Foreign Key to tours',
    FOREIGN KEY (tour_id) REFERENCES tours (id) ON DELETE CASCADE
);

ALTER TABLE tours DROP COLUMN price;