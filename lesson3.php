<?php
echo "Задание 1 <BR>";
$num = 0;
while($num <= 100){
    if($num % 3 == 0)
        echo $num . " ";
    $num++;
}

echo "<BR><BR>Задание 2<BR>";
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
    global $translate;
    return str_replace(array_keys($translate), $translate, $str);
}
echo convert("добрый день!");

echo "<BR><BR>Задание 5<BR>";
function convert1(string $str) : string{
    //return str_replace(" ", "_", $str);
    for($i = 0 ; $i < strlen($str); $i++) {
        if($str[$i] == ' ')
            $str[$i] = '_';
    }
    return $str;
}
echo convert1("О сколько нам открытий чудных готовит просвещенья дух !") . '<BR>';

echo "<BR>Задание 6<BR>";
function generateMenu($menu):string{
    $htmlMenu = '';
    foreach ($menu as $item) {
        if (is_array($item)) {
            $subMenu = '';
            for($i = 1 ; $i < count($item) ; $i++)
                $subMenu .= "<a>$item[$i]</a>";
            $htmlMenu .= "<div><a><span>$item[0]</span></a><div>" . $subMenu . "</div></div>";
            continue;
        }
        $htmlMenu .= "<div><a><span>$item</span></a></div>";
    }
    return $htmlMenu;
}
$menu = ["Главная",["Новости","Новости о спорте","Новости о политеке","Новости о мире",],"Контакты","Справка"];
$html = file_get_contents("lesson3.html");
$menuHtml = generateMenu($menu);
$html = str_replace('{{menu}}',$menuHtml, $html);
echo $html;

echo "<BR><BR>Задание 7<BR>";
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
$translate[' '] = '_';
function convert2($str) {
    global $translate;
    return str_replace(array_keys($translate), $translate, $str);
}
echo convert2("добрый день!");

echo "<BR><BR>Задание 10<BR>";
$html = file_get_contents("lesson3_1.html");
function generateTable(int $rows, int $cols):string
{
    $html = '<tr><td></td>';
    //header
    for($i = 1; $i <= $cols; $i++){
        $html .= "<td>$i</td>";
    }
    $html .= '</tr>';

    for($i = 1; $i <= $rows; $i++) {
        $html .= '<tr>';
        for ($j = 0; $j <= $cols; $j++) {
            $num = $j == 0 ? $i : $i*$j;
            $html .= "<td>$num</td>";
        }
        $html .= '</tr>';
    }
    return $html;
}
$table = generateTable(4,5);
$html = str_replace('{{table}}',$table, $html);
echo $html;
