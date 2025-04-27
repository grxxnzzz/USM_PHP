<?php
// public/index.php

require_once __DIR__ . '/../src/db.php';

try {
    // Получаем последние 2 задачи
    $stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC LIMIT 2");
    $latestTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Декодируем JSON поля tags и steps
    foreach ($latestTasks as &$task) {
        $task['tags'] = json_decode($task['tags'], true);
        $task['steps'] = json_decode($task['steps'], true);
    }
} catch (PDOException $e) {
    die("Ошибка при получении задач: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список задач</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Последние задачи</h1>
    
    <?php if (!empty($latestTasks)): ?>
        <ul>
            <?php foreach ($latestTasks as $task): ?>
                <li>
                    <strong><?= htmlspecialchars($task['title']) ?></strong> - <?= htmlspecialchars($task['category']) ?><br>
                    <?= htmlspecialchars($task['description']) ?><br>

                    <?php if (!empty($task['tags'])): ?>
                        <strong>Теги:</strong> <?= implode(', ', $task['tags']) ?><br>
                    <?php endif; ?>

                    <?php if (!empty($task['steps'])): ?>
                        <strong>Шаги:</strong>
                        <ul>
                            <?php foreach ($task['steps'] as $step): ?>
                                <li><?= htmlspecialchars($step) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <em>Добавлено: <?= htmlspecialchars($task['created_at']) ?></em>
                </li>
                <hr>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Нет добавленных задач.</p>
    <?php endif; ?>

    <a href="/templates/tasks_create.php"><button>➕ Добавить новую задачу</button></a><br>
    <a href="/public/tasks_list.php"><button>📋 Посмотреть все задачи</button></a>
</body>
</html>
