CREATE DATABASE IF NOT EXISTS ip_lab;
USE ip_lab;
CREATE TABLE IF NOT EXISTS books(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(150),author VARCHAR(100),category VARCHAR(80),available INT DEFAULT 1);
CREATE TABLE IF NOT EXISTS loans(id INT AUTO_INCREMENT PRIMARY KEY,student VARCHAR(100),book_id INT,issue_date DATE,due_date DATE,status VARCHAR(20) DEFAULT 'Issued',fine DECIMAL(8,2) DEFAULT 0);
CREATE TABLE IF NOT EXISTS rooms(id INT AUTO_INCREMENT PRIMARY KEY,room_type VARCHAR(80),price DECIMAL(10,2),quantity INT,description VARCHAR(255));
INSERT INTO rooms(room_type,price,quantity,description) SELECT 'Standard',1500,10,'Standard room' WHERE NOT EXISTS(SELECT 1 FROM rooms WHERE room_type='Standard');
INSERT INTO rooms(room_type,price,quantity,description) SELECT 'Deluxe',2500,8,'Deluxe room' WHERE NOT EXISTS(SELECT 1 FROM rooms WHERE room_type='Deluxe');
INSERT INTO rooms(room_type,price,quantity,description) SELECT 'Family',3500,5,'Family room' WHERE NOT EXISTS(SELECT 1 FROM rooms WHERE room_type='Family');
INSERT INTO rooms(room_type,price,quantity,description) SELECT 'Suite',5000,3,'Suite room' WHERE NOT EXISTS(SELECT 1 FROM rooms WHERE room_type='Suite');
CREATE TABLE IF NOT EXISTS hotel_bookings(id INT AUTO_INCREMENT PRIMARY KEY,guest VARCHAR(100),room_id INT,checkin DATE,checkout DATE,guests INT,status VARCHAR(20) DEFAULT 'Booked');
CREATE TABLE IF NOT EXISTS buses(id INT AUTO_INCREMENT PRIMARY KEY,bus_name VARCHAR(100),category VARCHAR(80),origin VARCHAR(100),destination VARCHAR(100),travel_date DATE,departure_time TIME,price DECIMAL(10,2),total_seats INT,available_seats INT);
CREATE TABLE IF NOT EXISTS bus_bookings(id INT AUTO_INCREMENT PRIMARY KEY,passenger VARCHAR(100),bus_id INT,seats INT,status VARCHAR(20) DEFAULT 'Booked');
CREATE TABLE IF NOT EXISTS bus_comments(id INT AUTO_INCREMENT PRIMARY KEY,bus_id INT,person VARCHAR(100),comment TEXT,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
INSERT INTO buses(bus_name,category,origin,destination,travel_date,departure_time,price,total_seats,available_seats)
SELECT 'City Express','Volvo','Chennai','Bengaluru',CURDATE()+INTERVAL 1 DAY,'21:00:00',850,40,40 WHERE NOT EXISTS(SELECT 1 FROM buses WHERE bus_name='City Express');
