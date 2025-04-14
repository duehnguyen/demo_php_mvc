use demo_db;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password) VALUES
('Nguyen Van A', 'nguyenvana@example.com', 'hashed_password_1'),
('Tran Thi B', 'tranthib@example.com', 'hashed_password_2'),
('Le Van C', 'levanc@example.com', 'hashed_password_3');