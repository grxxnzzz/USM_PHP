<h2>Список задач</h2>

<?php foreach ($tasks as $task): ?>
    <div class="task">
        <h3><?= htmlspecialchars($task['title']) ?></h3>
        <p><strong>Категория:</strong> <?= htmlspecialchars($task['category']) ?></p>
        <p><strong>Описание:</strong> <?= nl2br(htmlspecialchars($task['description'])) ?></p>

        <?php if (!empty($task['tags'])): ?>
            <p><strong>Теги:</strong> <?= implode(', ', $task['tags']) ?></p>
        <?php endif; ?>

        <?php if (!empty($task['steps'])): ?>
            <p><strong>Шаги:</strong></p>
            <ul>
                <?php foreach ($task['steps'] as $step): ?>
                    <li><?= htmlspecialchars($step) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <hr>
    </div>
<?php endforeach; ?>
