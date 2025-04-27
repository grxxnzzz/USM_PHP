<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <nav>
        <a href="/">Список задач</a> |
        <a href="/templates/tasks_create.php">Добавить задачу</a>
    </nav>

    <hr>

    <main>
        <?php
            if (strpos($_SERVER['REQUEST_URI'], 'create') !== false) {
                include __DIR__ . '/tasks_create.php';
            } else {
                include __DIR__ . '/tasks_list.php';
            }
        ?>
    </main>

</body>
</html>