CREATE DATABASE wallet_db;

USE wallet_db;

CREATE TABLE wallets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(255) NOT NULL,
    balance INT DEFAULT 100,  -- Initial balance
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
