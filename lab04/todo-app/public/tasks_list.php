<?php
// public/tasks_list.php

$storageFile = __DIR__ . '/../storage/tasks.txt';
$tasks = file_exists($storageFile) ? file($storageFile, FILE_IGNORE_NEW_LINES) : [];
$tasksArray = array_map(function($task) {
    return json_decode($task, true);
}, $tasks);

// Параметр page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 5;
$totalTasks = count($tasksArray);
$totalPages = ceil($totalTasks / $perPage);

// Определяем индекс для array_slice
$offset = ($page - 1) * $perPage;
$currentTasks = array_slice($tasksArray, $offset, $perPage);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все задачи - Страница <?php echo $page; ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1><i class="bi bi-list">     </i>Список задач (Страница <?php echo $page; ?>)</h1>
    <?php if (!empty($currentTasks)): ?>
        <ol>
            <?php foreach ($currentTasks as $task): ?>
                <li>
                    <strong><?php echo htmlspecialchars($task['title']); ?></strong> - <?php echo htmlspecialchars($task['category']); ?><br>
                    <h4><i class="bi bi-card-text">     </i>Описание</h4>
                    <p><?php echo htmlspecialchars($task['description']); ?></p><br>
                    <?php if (!empty(array_filter($task['steps']))): ?>
                    <h4><i class="bi bi-check-all">     </i>Шаги</h4>
                    <ul style="list-style-type: none; padding: 0; margin: 0;">
                        <?php foreach ($task['steps'] as $step): ?>
                            <li><i class="bi bi-dot">     </i><?php echo htmlspecialchars($step)?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <h4><i class="bi bi-bookmarks">     </i>Теги</h4>
                    <em><i><?php echo htmlspecialchars(implode(', ', $task['tags'])); ?></i></em><br>
                    <em><i class="bi bi-calendar">     </i>Добавлено: <?php echo $task['created_at']; ?></em>
                </li>
                <br>
            <?php endforeach; ?>
        </ol>
    <?php else: ?>
        <p>Нет задач для отображения на этой странице.</p>
    <?php endif; ?>

    <!-- Навигация по страницам -->
    <div>
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>"><button><i class="bi bi-arrow-return-left">     </i>Предыдущая страница</button></a>
        <?php endif; ?>
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>"><button><i class="bi bi-arrow-right">     </i>Следующая страница</button></a>
        <?php endif; ?>
    </div>
    <br>
    <a href="index.php"><button><i class="bi bi-house">     </i>На главную</button></a>
</body>
</html>
