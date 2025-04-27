<h2>Добавить задачу</h2>

<form action="/src/handlers/tasks_create.php" method="post">
    <label>Название:
        <input type="text" name="title" required>
    </label><br><br>

    <label>Категория:
        <input type="text" name="category">
    </label><br><br>

    <label>Описание:<br>
        <textarea name="description" rows="4" cols="40"></textarea>
    </label><br><br>

    <label>Теги (через запятую):
        <input type="text" name="tags">
    </label><br><br>

    <label>Шаги (каждый шаг с новой строки):<br>
        <textarea name="steps" rows="4" cols="40"></textarea>
    </label><br><br>

    <button type="submit">Создать задачу</button>
</form>
