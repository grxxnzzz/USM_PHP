<?php
// public/index.php

// Определяем путь к файлу хранения
$storageFile = __DIR__ . '/../storage/tasks.txt';

// Проверяем, существует ли файл, и читаем данные
$tasks = file_exists($storageFile) ? file($storageFile, FILE_IGNORE_NEW_LINES) : [];

// Преобразуем строки в массив объектов (если задачи хранятся как JSON)
$tasksArray = array_map(function($task) {
    return json_decode($task, true);
}, $tasks);

// Получаем два последних элемента массива
$latestTasks = array_slice($tasksArray, -2);
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
                    <strong><?php echo htmlspecialchars($task['title']); ?></strong> - <?php echo htmlspecialchars($task['category']); ?><br>
                    <?php echo htmlspecialchars($task['description']); ?><br>
                    <em>Добавлено: <?php echo $task['created_at']; ?></em>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Нет добавленных задач.</p>
    <?php endif; ?>
    <a href="create.php"><button><i class="bi bi-file-plus">     </i>Добавить новую задачу</button></a>
    <br>
    <a href="tasks_list.php"><button><i class="bi bi-list">     </i>Посмотреть все задачи</button></a>
</body>
</html>
