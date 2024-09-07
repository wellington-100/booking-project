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