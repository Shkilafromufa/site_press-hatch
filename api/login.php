<?php
require __DIR__.'/db.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

$db = get_db();
$stmt = $db->prepare('SELECT password_hash FROM admins WHERE username = ?');
$stmt->execute([$username]);
$admin = $stmt->fetch();

if ($admin && password_verify($password, $admin['password_hash'])) {
    $_SESSION['admin'] = true;
    echo json_encode(['status' => 'ok']);
} else {
    http_response_code(401);
    echo json_encode(['error' => 'unauthorized']);
}
