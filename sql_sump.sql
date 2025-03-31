-- /* SQL Dump (sql_dump.sql) */
-- CREATE DATABASE car_rental;
-- USE car_rental;

-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(50) NOT NULL,
--     password VARCHAR(50) NOT NULL
-- );

-- CREATE TABLE cars (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     car_name VARCHAR(100) NOT NULL,
--     car_description TEXT NOT NULL,
--     car_price DECIMAL(10,2) NOT NULL,
--     car_image VARCHAR(255) NOT NULL
-- );
/* SQL Dump (sql_dump.sql) */
CREATE DATABASE car_rental;
USE car_rental;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_name VARCHAR(100) NOT NULL,
    car_description TEXT NOT NULL,
    car_price DECIMAL(10,2) NOT NULL,
    car_image VARCHAR(255) NOT NULL
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    username VARCHAR(50) NOT NULL,
    FOREIGN KEY (car_id) REFERENCES cars(id),
    FOREIGN KEY (username) REFERENCES users(username)
);