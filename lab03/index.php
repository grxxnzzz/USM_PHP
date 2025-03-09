<?php

declare(strict_types=1);

$transactions = [
    ["id" => 1, "date" => "2019-01-01", "amount" => 100.00, "description" => "Payment for groceries", "merchant" => "SuperMart"],
    ["id" => 2, "date" => "2020-02-15", "amount" => 75.50, "description" => "Dinner with friends", "merchant" => "Local Restaurant"],
    ["id" => 3, "date" => "2021-05-10", "amount" => 200.75, "description" => "Electronics purchase", "merchant" => "Tech Store"],
];

/**
 * Вычисляет общую сумму всех транзакций.
 *
 * @param array $transactions Массив транзакций.
 * @return float Общая сумма транзакций.
 */
function calculateTotalAmount(array $transactions): float {
    return array_sum(array_column($transactions, 'amount'));
}

/**
 * Ищет транзакции по части описания.
 *
 * @param array $transactions Массив транзакций.
 * @param string $descriptionPart Часть описания для поиска.
 * @return array Найденные транзакции.
 */
function findTransactionByDescription(array $transactions, string $descriptionPart): array {
    return array_filter($transactions, fn($t) => stripos($t['description'], $descriptionPart) !== false);
}

/**
 * Ищет транзакцию по ID.
 *
 * @param array $transactions Массив транзакций.
 * @param int $id ID транзакции.
 * @return array|null Найденная транзакция или null, если не найдена.
 */
function findTransactionById(array $transactions, int $id): ?array {
    foreach ($transactions as $transaction) {
        if ($transaction['id'] === $id) {
            return $transaction;
        }
    }
    return null;
}

/**
 * Ищет транзакцию по ID, используя array_filter.
 *
 * @param array $transactions Массив транзакций.
 * @param int $id ID транзакции.
 * @return array|null Найденная транзакция или null, если не найдена.
 */
function findTransactionByIdFiltered(array $transactions, int $id): ?array {
    $result = array_filter($transactions, fn($t) => $t['id'] === $id);
    return $result ? reset($result) : null;
}

/**
 * Возвращает количество дней с момента транзакции.
 *
 * @param string $date Дата транзакции (YYYY-MM-DD).
 * @return int Количество дней с момента транзакции.
 */
function daysSinceTransaction(string $date): int {
    $transactionDate = new DateTime($date);
    $currentDate = new DateTime();
    return (int) $transactionDate->diff($currentDate)->days;
}

/**
 * Добавляет новую транзакцию.
 *
 * @param int $id ID транзакции.
 * @param string $date Дата транзакции (YYYY-MM-DD).
 * @param float $amount Сумма транзакции.
 * @param string $description Описание транзакции.
 * @param string $merchant Название организации.
 */
function addTransaction(int $id, string $date, float $amount, string $description, string $merchant): void {
    global $transactions;
    $transactions[] = ["id" => $id, "date" => $date, "amount" => $amount, "description" => $description, "merchant" => $merchant];
}

// Сортировка по дате
usort($transactions, fn($a, $b) => strcmp($a['date'], $b['date']));

// Сортировка по сумме (по убыванию)
usort($transactions, fn($a, $b) => $b['amount'] <=> $a['amount']);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab03</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 70vw;
            margin: auto;
        }
    </style>
</head>
<body>
    <h2>Список транзакций</h2>
    <table border='1'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Описание</th>
                <th>Организация</th>
                <th>Дней назад</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $transaction['id'] ?></td>
                    <td><?= $transaction['date'] ?></td>
                    <td><?= number_format($transaction['amount'], 2) ?></td>
                    <td><?= htmlspecialchars($transaction['description']) ?></td>
                    <td><?= htmlspecialchars($transaction['merchant']) ?></td>
                    <td><?= daysSinceTransaction($transaction['date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><b>Общая сумма всех транзакций: </b><?= number_format(calculateTotalAmount($transactions), 2) ?> </p>
</body>
</html>