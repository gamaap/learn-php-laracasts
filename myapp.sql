CREATE DATABASE myapp;

USE myapp;

CREATE TABLE posts
(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL
) ENGINE = InnoDB;

INSERT INTO posts (title) VALUES ('My First Blog Post');
INSERT INTO posts (title) VALUES ('My Second Blog Post');