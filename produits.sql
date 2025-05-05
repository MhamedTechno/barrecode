CREATE DATABASE IF NOT EXISTS produits_db;
USE produits_db;

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    code_barre VARCHAR(100) NOT NULL UNIQUE,
    prix DECIMAL(10,2) NOT NULL
);

INSERT INTO produits (nom, code_barre, prix) VALUES
('Coca-Cola 1L', '1234567890123', 7.50),
('Lait Centrale 1L', '9876543210987', 6.00),
('Pain', '1111111111111', 1.20);
