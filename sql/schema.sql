CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    features TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL
);

INSERT INTO admins (username, password_hash) VALUES
('admin', '$2y$12$3sa/aTZWtXhoBkMjijgCMecyr8CCmQnSLk0BdxJ/jjRUEm8Njcgb2')
ON DUPLICATE KEY UPDATE username=username;
