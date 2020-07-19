<?php
echo "Задание 1 <BR>";
$num = 0;
while($num <= 100){
    if($num % 3 == 0)
        echo $num . " ";
    $num++;
}

echo "<BR>Задание 2<BR>";
$num = 0;
do{
    if($num == 0)
        $str = "ноль";
    else if($num % 2 == 1)
        $str = "нечётное число";
    else
        $str = "чётное число";

    echo $num . ' - ' . $str . "<BR>";
    $num++;
}while($num <= 10);

echo "<BR>Задание 3<BR>";
$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловска", "Кронштадт"],
    "Рязанская область" => ["Город 1", "Город 2", "Город 3", "Карамба"]
];
foreach($regions as $region => $cities) {
    echo $region . ":<BR>" . implode(",", $cities) . "<BR>";
}

echo "<BR>Задание 4<BR>";
$translate = ['a'=> 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'i', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'ph', 'х' => 'h', 'ц' => 'c', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'i', 'ъ' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'];

function convert($str) {
    //Функция str_split не работает с UNF-8, поэтому приходится идти по строке самостоятельно
    global $translate;
    $dest = "";
    $length = mb_strlen($str, 'UTF-8');

    for ($i = 0; $i < $length; $i += 1) {
        $char = mb_substr($str, $i, 1, 'UTF-8');
        $dest .= array_key_exists($char, $translate)? $translate[$char] : $char;
    }

    return $dest;
}
echo convert("добрый день!");

echo "<BR>Задание 5<BR>";
function convert1(string $str) : string{
    return str_replace(" ", "_", $str);
}
echo convert1("О сколько нам открытий чудных готовит просвещенья дух!");

echo "<BR>Задание 6<BR>";
$menu = ["Пункт 1","Пункт 2","Пункт 3",["Пункт 3.1","Пункт 3.3","Пункт 3.2",],"Пункт 4","Пункт 5"];
function convertMenu($total, $item){
    if(is_array($item))
        return $total . "<ul>" . array_reduce($item, "convertMenu") . "</ul>";
    return $total . "<li>" . $item . "</li>";
}
$menuHtml = array_reduce($menu,"convertMenu");
?>
<body>
<ul>
    <?=$menuHtml?>
</ul>
</body>

<?php
echo "<BR>Задание 7<BR>";
function echoVar($num){
    echo $num . "<BR>";
}
for($i = 0; $i <= 9; echoVar($i),$i++);

echo "<BR>Задание 8<BR>";
function firstK(string $city) : string{
    return mb_substr($city,0,1, 'UTF-8') == "К";
}
foreach($regions as $region => $cities) {
    echo $region . ":<BR>" . implode(",", array_filter($cities, "firstK")) . "<BR>";
}

echo "<BR>Задание 9<BR>";
function convert2($str) {
    global $translate;
    $dest = "";
    $length = mb_strlen($str, 'UTF-8');

    for ($i = 0; $i < $length; $i += 1) {
        $char = mb_substr($str, $i, 1, 'UTF-8');
        if($char == " ")
            $char = "_";
        $dest .= array_key_exists($char, $translate)? $translate[$char] : $char;
    }

    return $dest;
}
echo convert2("добрый день!");
