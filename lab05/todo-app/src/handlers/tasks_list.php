<?php
require_once __DIR__ . '/../db.php';

$pdo = getPDO();
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Декодируем JSON-поля
foreach ($tasks as &$task) {
    $task['tags'] = json_decode($task['tags'], true);
    $task['steps'] = json_decode($task['steps'], true);
}
