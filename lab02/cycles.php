<?php

$a = 0;
$b = 0;

// FOR
echo "FOR: \n";
for ($i = 0; $i <= 5; $i++) {
   $a += 10;
   echo "a = $a\n";
   $b += 5;
   echo "b = $b\n";
   echo "\n";
}

echo "End of the FOR loop:\na = $a, b = $b";

// обнуляю переменные от предыдущего цикла
$a = 0;
$b = 0;
$x = 0;

// while
echo "\n\nWHILE: \n";
while ($x <= 5) {
   $a += 10;
   echo "a = $a\n";
   $b += 5;
   echo "b = $b\n";
   echo "\n";
   $x++;
}

echo "End of the WHILE loop:\na = $a, b = $b";

// обнуляю переменные от предыдущего цикла
$a = 0;
$b = 0;
$x = 0;

// do-while
echo "\n\nDO-WHILE: \n";
do {
   $a += 10;
   echo "a = $a\n";
   $b += 5;
   echo "b = $b\n";
   echo "\n";
   $x++;
} while ($x <= 5);

echo "End of the DO-WHILE loop:\na = $a, b = $b";