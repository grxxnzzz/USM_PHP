<?php

$dir = 'image/';
$images = array_diff(scandir($dir), array('..', '.'));

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab03 - Images</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            width: 70vw;
            margin: auto;
        }
        .gallery { 
            display: flex; 
            flex-wrap: wrap; 
            justify-content: center; gap: 10px; 
        }
        .gallery img { 
            width: 200px;
            height: 200px;
            border: 2px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h2>Галерея изображений</h2>
    <div class="gallery">
        <?php foreach ($images as $image): ?>
            <img src="<?= $dir . htmlspecialchars($image) ?>" alt="Изображение">
        <?php endforeach; ?>
    </div>
</body>
</html>
