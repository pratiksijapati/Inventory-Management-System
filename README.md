# Inventory Management System

A web-based inventory system for a small shop or warehouse: add products, record sales and sales returns, track stock levels and view purchase and sales reports.

Built with **PHP** and **MySQL**.

> **Status:** completed college project, run locally (XAMPP).

## Features

- Login page backed by a MySQL table
- Add products with category, quantity and rate (also recorded as a purchase)
- Sell products: only items in stock are listed, and stock is reduced automatically
- Sales returns that add quantity back to stock
- Stock overview of all products
- Reports listing purchase and sales history

## Tech stack

| Layer | Technologies |
|---|---|
| Frontend | HTML, CSS |
| Backend | PHP (MySQLi) |
| Database | MySQL |

## How it works

```
HTML forms  →  PHP scripts (addProduct.php, sellProduct.php, salesReturn.php, …)
                    │  MySQLi
                    ▼
            MySQL: addproduct · purchase · sales · logindetails
```

| Page | File |
|---|---|
| Login | `loginpage.html` → `loginpage.php` |
| Dashboard | `Home.html` |
| Add product | `addproduct.html` → `addProduct.php` |
| Sell product | `sell_Product.php` → `sellProduct.php` |
| Sales return | `sales_Return.php` → `salesReturn.php` |
| Stock | `stock.php` |
| Reports | `Report.php` |

## Getting started

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** and **MySQL**.
2. Clone this repository into `xampp/htdocs`:
   ```bash
   git clone https://github.com/pratiksijapati/Inventory-Management-System.git
   ```
3. Open phpMyAdmin (`http://localhost/phpmyadmin`) and import `database/schema.sql`. It creates the `inventorysystem` database, its tables, and a demo login (`admin` / `admin123`).
4. Check the connection settings in `Database.php`. The defaults are XAMPP's `localhost`, `root` and an empty password.
5. Open `http://localhost/Inventory-Management-System/loginpage.html`.

## Known limitations

This was built as a learning project. Before any real use it would need:

- Hashed passwords (`password_hash`) instead of plain-text comparison
- Prepared statements for every query, to prevent SQL injection
- Sessions, so pages can't be opened without logging in
