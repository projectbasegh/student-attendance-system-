CREATE DATABASE attendance_db;

USE attendance_db;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fingerprint_id INT NOT NULL UNIQUE,
    name VARCHAR(100),
    student_id VARCHAR(50) UNIQUE
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fingerprint_id INT NOT NULL,
    date DATE,
    login_time TIME,
    logout_time TIME,
    FOREIGN KEY (fingerprint_id) REFERENCES students(fingerprint_id)
);
