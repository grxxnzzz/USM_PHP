<?php
// src/handlers/process_form.php

// Подключаем вспомогательные функции, если они необходимы для валидации/фильтрации
require_once __DIR__ . '/../helpers.php';

/**
 * Функция для очистки входных данных
 *
 * @param string $data
 * @return string
 */
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Проверяем, что данные отправлены методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем и фильтруем данные формы
    $title = isset($_POST['title']) ? sanitize_input($_POST['title']) : '';
    $category = isset($_POST['category']) ? sanitize_input($_POST['category']) : '';
    $description = isset($_POST['description']) ? sanitize_input($_POST['description']) : '';
    $tags = isset($_POST['tags']) ? array_map('sanitize_input', $_POST['tags']) : [];
    $steps = isset($_POST['steps']) ? array_map('sanitize_input', $_POST['steps']) : [];

    // Инициализируем массив ошибок
    $errors = [];

    // Простейшая валидация: обязательные поля
    if (empty($title)) {
        $errors['title'] = 'Название задачи обязательно для заполнения.';
    }
    if (empty($category)) {
        $errors['category'] = 'Пожалуйста, выберите категорию.';
    }
    // Вы можете добавить дополнительные проверки (например, длина текста, допустимые символы и т.д.)

    // Если ошибки есть, перенаправляем обратно в форму с сообщениями об ошибках
    if (!empty($errors)) {
        // Здесь можно сохранить ошибки в сессию или передать их через GET-параметры
        // Для простоты можно использовать сессию:
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header('Location: ../../public/create.php');
        exit;
    }

    // Подготовка данных для сохранения (вы можете модифицировать формат по необходимости)
    $taskData = [
        'title' => $title,
        'category' => $category,
        'description' => $description,
        'tags' => $tags,
        'steps' => $steps,
        'created_at' => date('d-m-Y H:i')
    ];

    // Определяем путь к файлу хранения. Используем __DIR__ для корректного разрешения пути.
    $storageFile = __DIR__ . '/../../storage/tasks.txt';

    // Записываем данные в файл. Каждая запись – это строка с JSON-объектом.
    $jsonData = json_encode($taskData, JSON_UNESCAPED_UNICODE);
    file_put_contents($storageFile, $jsonData . PHP_EOL, FILE_APPEND);

    // После успешной обработки перенаправляем пользователя на главную страницу
    header('Location: ../../public/index.php');
    exit;
} else {
    // Если запрос не методом POST, можно выдать ошибку или перенаправить пользователя
    header('Location: ../../public/create.php');
    exit;
}
?>
