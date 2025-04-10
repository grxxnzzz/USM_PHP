<!-- public/create.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление новой задачи</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1><i class="bi bi-plus-circle">     </i>Добавить новую задачу</h1>
    
    <!-- Форма отправки данных методом POST -->
    <form action="../src/handlers/process_form.php" method="post">
        <!-- Заголовок задачи -->
        <label for="title">Название задачи:</label>
        <input type="text" name="title" id="title" required>
        <br><br>
        
        <!-- Категория задачи (например, "Работа", "Учёба", "Дом") -->
        <label for="category">Категория:</label>
        <select name="category" id="category">
            <option value="work">Работа</option>
            <option value="study">Учёба</option>
            <option value="home">Дом</option>
            <option value="other">Другое</option>
        </select>
        <br><br>
        
        <!-- Описание задачи -->
        <label for="description">Описание задачи:</label>
        <textarea name="description" id="description" rows="4" cols="50"></textarea>
        <br><br>
        
        <!-- Дополнительные поля (например, тэги или приоритет) -->
        <label for="tags">Тэги (выберите один или несколько):</label>
        <select name="tags[]" id="tags" multiple>
            <option value="urgent">Срочно</option>
            <option value="later">Можно отложить</option>
            <option value="personal">Личное</option>
            <option value="work">Работа</option>
        </select>
        <br><br>
        
        <!-- Дополнительное задание: динамическое добавление шагов задачи (необязательно) -->
        <div id="steps-container">
            <label>Шаги выполнения (дополнительно):</label>
            <div>
                <input type="text" name="steps[]" placeholder="Шаг 1">
            </div>
        </div>
        <button type="button" onclick="addStep()"><i class="bi bi-plus-lg">     </i>Добавить шаг</button>
        <br><br>
        
        <button type="submit"><i class="bi bi-send">     </i>Отправить</button>
    </form>

    <a href="index.php"><button><i class="bi bi-house">     </i>На главную</button></a>

    <!-- Для динамического добавления шагов -->
    <script>
        let stepCount = 1;
        function addStep() {
            stepCount++;
            const container = document.getElementById('steps-container');
            const newStep = document.createElement('div');
            newStep.innerHTML = `<input type="text" name="steps[]" placeholder="Шаг ${stepCount}">`;
            container.appendChild(newStep);
        }
    </script>
</body>
</html>
