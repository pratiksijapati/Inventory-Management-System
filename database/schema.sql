-- Database schema for Inventory Management System.
-- Reconstructed from the queries in the PHP files; adjust column sizes as needed.

CREATE DATABASE IF NOT EXISTS inventorysystem;
USE inventorysystem;

-- Login accounts (checked by loginpage.php)
CREATE TABLE IF NOT EXISTS logindetails (
  id   VARCHAR(50)  PRIMARY KEY,
  pass VARCHAR(255) NOT NULL
);

-- Current products and stock levels
CREATE TABLE IF NOT EXISTS addproduct (
  ProductName VARCHAR(100) PRIMARY KEY,
  Category    VARCHAR(100),
  Quantity    INT NOT NULL DEFAULT 0,
  Rate        DECIMAL(10,2),
  Total       DECIMAL(12,2)
);

-- Purchase history (written when a product is added)
CREATE TABLE IF NOT EXISTS purchase (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  ProductName VARCHAR(100),
  Category    VARCHAR(100),
  Quantity    INT,
  Rate        DECIMAL(10,2),
  Total       DECIMAL(12,2)
);

-- Sales history
CREATE TABLE IF NOT EXISTS sales (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  ProductName VARCHAR(100),
  Quantity    INT,
  Total       DECIMAL(12,2)
);

-- Demo login for local testing only. Change it before using the app anywhere else.
INSERT IGNORE INTO logindetails (id, pass) VALUES ('admin', 'admin123');
