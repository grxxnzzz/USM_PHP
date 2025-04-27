<?php
require_once __DIR__ . '/../db.php';

$tags = isset($_POST['tags']) ? array_map('trim', explode(',', $_POST['tags'])) : [];
$steps = isset($_POST['steps']) ? array_filter(array_map('trim', explode("\n", $_POST['steps']))) : [];

$data = [
    'title' => $_POST['title'] ?? '',
    'category' => $_POST['category'] ?? '',
    'description' => $_POST['description'] ?? '',
    'tags' => json_encode($tags, JSON_UNESCAPED_UNICODE),
    'steps' => json_encode($steps, JSON_UNESCAPED_UNICODE),
];


$pdo = getPDO();
$sql = "INSERT INTO tasks (title, category, description, tags, steps) 
        VALUES (:title, :category, :description, :tags, :steps)";
$stmt = $pdo->prepare($sql);
$stmt->execute($data);

// редирект обратно на список
header('Location: /');
exit;
