<?php
// устанавливаем часовой пояс
date_default_timezone_set('Europe/Kiev');
// получаем текущий час в 24-часовом формате
$hour = date("H");
// получаем номер дня недели (1 = понедельник, ..., 7 = воскресенье)
$dayOfWeek = date("N");

$johnSchedule = "";
$janeSchedule = "";

switch ($dayOfWeek) {
    case 1:
    case 3:
    case 5:
        $johnSchedule = "8:00 - 12:00";
        break;
    default:
        $johnSchedule = "<i>Нерабочий день</i>";
}

switch ($dayOfWeek) {
    case 2:
    case 4:
    case 6:
        $janeSchedule = "12:00 - 16:00";
        break;
    default:
        $janeSchedule = "<i>Нерабочий день</i>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab02</title>
    <style>
        body {
            overflow: hidden;
        }
        .container {
            width: 50vw;
            height: 99vh;
            display: flex;
            flex-direction: column;
            margin: auto;
        }
        .container > div {
            width: 100%;
            height: fit-content;
        }
        .container > div > table{
            width: 100%;
        }
        /* таблицу создавал с помощью генератора html таблиц */
        /* мне лень делать было их с нуля тегами 😅*/
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: center;
            vertical-align: top
        }
    </style>
</head>
<body>

<div class="container">
    <div>
        <h1>Сегодня: <?php echo date("d.m.Y / H:i"); ?></h1>
    </div>
    <div>
        <table class="tg">
            <thead>
                <tr>
                    <th class="tg-0pky"><b>№</b></th>
                    <th class="tg-0pky"><b>Фамилия Имя</b></th>
                    <th class="tg-0pky"><b>График работы</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tg-0pky">1</td>
                    <td class="tg-0pky">John Doe</td>
                    <td class="tg-0pky"><?php echo "$johnSchedule" ?></td>
                </tr>
                <tr>
                    <td class="tg-0pky">2</td>
                    <td class="tg-0pky">Jane Doe</td>
                    <td class="tg-0pky"><?php echo "$janeSchedule" ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>