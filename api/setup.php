<?php
require __DIR__.'/db.php';
$db = get_db();
$db->exec("CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    features TEXT NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL
)");

$exists = $db->query('SELECT COUNT(*) FROM admins')->fetchColumn();
if (!$exists) {
    $hash = password_hash('admin123', PASSWORD_DEFAULT);
    $stmt = $db->prepare('INSERT INTO admins (username, password_hash) VALUES (?, ?)');
    $stmt->execute(['admin', $hash]);
}

echo "Tables created";
