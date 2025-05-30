# Контрольные вопросы

### 1. Что такое массивы в PHP?
Массивы в PHP — это упорядоченные коллекции значений, которые могут хранить несколько элементов под одним именем переменной. Они позволяют группировать данные и легко ими управлять.

В PHP есть три типа массивов:

- Индексированные массивы — элементы имеют числовые индексы.
- Ассоциативные массивы — ключами являются строки.
- Многомерные массивы — массивы внутри массивов.

### 2. Каким образом можно создать массив в PHP?
Индексированный массив:
```php
$numbers = array(1, 2, 3, 4, 5); 
$numbers = [1, 2, 3, 4, 5]; // Современный синтаксис
```
---

Ассоциативный массив:
```php
$user = [
    "name" => "grxxndxxm",
    "age" => 21,
    "email" => "grxxndxxm@example.com"
];
```

---

Многомерный массив:
```php
$users = [
    ["name" => "John", "age" => 25],
    ["name" => "Jane", "age" => 30]
];
```
### 3. Для чего используется цикл foreach?
Цикл `foreach` используется для перебора элементов массива без необходимости вручную управлять индексами. Он проходит по каждому элементу массива и выполняет заданные операции.

`foreach` удобен тем, что автоматически перебирает все элементы массива, не требуя использования `count()` или `for`