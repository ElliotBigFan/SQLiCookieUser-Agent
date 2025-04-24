CREATE DATABASE IF NOT EXISTS sqli_lab;
USE sqli_lab;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  password VARCHAR(100),
  cookie TEXT
);

CREATE TABLE logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  useragent TEXT,
  cookie TEXT
);

CREATE TABLE IF NOT EXISTS themes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT
);

INSERT INTO themes (name, description) VALUES
('default', 'Default site theme'),
('dark', 'Dark mode'),
('retro', 'Retro terminal theme');

INSERT INTO users (username, password, cookie) VALUES ('admin_user', 'supersecure', 'admin');
INSERT INTO users (username, password, cookie) VALUES ('guest_user', 'password123', 'guest');
