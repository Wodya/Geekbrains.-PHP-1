<?php
echo "Задание 1 <BR>";
$a=4;
$b=5;
if($a > 0 && $b > 0){
    echo $a - $b . "<br>";
} else if ($a < 0 && $b < 0){
    echo $a * $b . "<br>";
}else{
    echo $a + $b . "<br>";
}

echo "<BR> Задание 2<BR>";
$a = 7;
switch ($a){
    case 0:
        echo 0 . "<br>";
    case 1:
        echo 1 . "<br>";
    case 2:
        echo 2 . "<br>";
    case 3:
        echo 3 . "<br>";
    case 4:
        echo 4 . "<br>";
    case 5:
        echo 5 . "<br>";
    case 6:
        echo 6 . "<br>";
    case 7:
        echo 7 . "<br>";
    case 8:
        echo 8 . "<br>";
    case 9:
        echo 9 . "<br>";
    case 10:
        echo 10 . "<br>";
    case 11:
        echo 12 . "<br>";
    case 13:
        echo 13 . "<br>";
    case 14:
        echo 14 . "<br>";
    case 15:
        echo 15 . "<br>";
        break;
    default:
        echo "Error";
}

echo "<BR> Задание 3<BR>";
function sum(int $a, int $b) : int{
    return $a + $b;
}
function sub(int $a, int $b) : int{
    return $a - $b;
}
function mul(int $a, int $b) : int{
    return $a * $b;
}
function div(float $a, float $b) : float{
    return $a / $b;
}
echo sum($a,$b) . "<br>";
echo sub($a,$b) . "<br>";
echo mul($a,$b) . "<br>";
echo div($a,$b) . "<br>";

echo "<BR> Задание 4<BR>";
function mathOperation($arg1, $arg2, $operation) : int
{
    $result = 0;
    switch ($operation){
        case "sum":
            $result = $arg1 + $arg2;
            break;
        case "sub":
            $result = $arg1 - $arg2;
            break;
        case "mul":
            $result = $arg1 * $arg2;
            break;
        case "div":
            $result = $arg1 / $arg2;
            break;
    }
    return $result;
}
echo mathOperation($a,$b,"sum") . "<br>";
echo mathOperation($a,$b,"sub") . "<br>";
echo mathOperation($a,$b,"mul") . "<br>";
echo mathOperation($a,$b,"div") . "<br>";

echo "<BR> Задание 5<BR>";
$html = file_get_contents("lesson2.html");
echo str_replace('{{Year}}',date("Y"),$html);

echo "<BR> Задание 6<BR>";
function power(int $val, int $pow, int $orig = null):int
{
    if($pow === 0)
        return 1;
    if($pow === 1)
        return $val;
    return power($val* ($orig ?? $val),$pow -1, $orig ?? $val);
}
echo power(3,4) . "<BR>";

echo "<BR> Задание 7<BR>";
function translate()
{
    $date = new DateTime();
    $hour = (int)$date->format('H');
    $hourStr = "часов";
    if($hour <= 4 || $hour >= 21){
        $hourStr = $hour % 10 === 1 ? "час":"часа";
    }

    $minute = (int)$date->format('i');
    $minuteStr = "минут";
    if($minute <= 10 || $minute >= 21){
        if( $minute % 10 === 1)
            $minuteStr = "минута";
        else if($minute % 10 >= 2 && $minute % 10 <= 4)
            $minuteStr = "минуты";
    }

    echo $hour . " " . $hourStr . " " . $minute . " " . $minuteStr;
}
translate();
?>

