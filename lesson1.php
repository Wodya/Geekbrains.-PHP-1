

<?php
$a = 5;
$b = '05';
var_dump($a == $b);                     // Сравнение без типов. Неявное приведение к int. Числа равны => true
var_dump((int)'012345');                         // Явное приведение типа к int => 12345
var_dump((float)123.0 === (int)123.0);  // Сравнение с типами. Типы разные => false
var_dump((int)0 === (int)'hello, world'); // Явное преобразование 'hello, world' к int даёт 0. Сравнение с типами. Типы и числа равны => true

$title = 'Урок 1';
$h1 = 'Добрый день';
$p = 'Тестовое задание';
$year = Date('Y');

$a=3;
$b=7;

$a = $a+$b;
$b = $a - $b;
$a = $a - $b;

var_dump($a);
var_dump($b);
?>

<head>
    <title><?=$title?> </title>
</head>
<body>
<h1><?=$h1?></h1>
<p><?=$p?></p>
<p>Текущий год <?=$year?></p>
</body>