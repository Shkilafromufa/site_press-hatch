<?php
session_start();

$config = require __DIR__.'/config.php';

try {
    $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset=utf8mb4";
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'db_error']);
    exit;
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';
header('Content-Type: application/json');

switch ($action) {
    case 'list':
        $stmt = $pdo->query('SELECT * FROM services ORDER BY id DESC');
        $services = $stmt->fetchAll();
        $services = array_map(function ($s) {
            $s['features'] = json_decode($s['features'], true) ?: [];
            return $s;
        }, $services);
        echo json_encode($services);
        break;

    case 'add':
        if (!isset($_SESSION['admin'])) {
            http_response_code(403);
            echo json_encode(['error' => 'forbidden']);
            break;
        }
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $pdo->prepare('INSERT INTO services (name, description, features) VALUES (?,?,?)');
        $stmt->execute([
            $data['name'] ?? '',
            $data['description'] ?? '',
            json_encode($data['features'] ?? [])
        ]);
        echo json_encode(['status' => 'ok']);
        break;

    case 'delete':
        if (!isset($_SESSION['admin'])) {
            http_response_code(403);
            echo json_encode(['error' => 'forbidden']);
            break;
        }
        $id = $_GET['id'] ?? 0;
        $stmt = $pdo->prepare('DELETE FROM services WHERE id = ?');
        $stmt->execute([$id]);
        echo json_encode(['status' => 'ok']);
        break;

    case 'login':
        $data = json_decode(file_get_contents('php://input'), true);
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';
        $stmt = $pdo->prepare('SELECT id, password_hash, role FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && $user['role'] === 'admin' && password_verify($password, $user['password_hash'])) {
            $_SESSION['admin'] = true;
            echo json_encode(['status' => 'ok']);
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'unauthorized']);
        }
        break;

    case 'check':
        echo json_encode(['admin' => isset($_SESSION['admin'])]);
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'unknown_action']);
}
