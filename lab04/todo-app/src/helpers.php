<?php
// src/helpers.php

/**
 * Функция для выводы массива ошибок в удобном формате
 *
 * @param array $errors
 * @param string $fieldName
 * @return string
 */
function displayError($errors, $fieldName) {
    if (isset($errors[$fieldName])) {
        return '<span class="error">' . $errors[$fieldName] . '</span>';
    }
    return '';
}
?>
