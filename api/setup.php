<?php
require __DIR__.'/db.php';
$db = get_db();
$db->exec("CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    features TEXT NOT NULL
)");
echo "Tables created";
