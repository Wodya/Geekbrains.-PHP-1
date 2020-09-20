<?php
function selected(int $val){
    if(getPostValue('operation') == $val)
        return 'selected';
}
function getPostValue(string $name){
    return key_exists($name, $_POST)? $_POST[$name] : 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = (int)$_POST['num1'];
    $num2 = (int)$_POST['num2'];
    $num3 = 0;
    if ($_POST['operation'] == 1) {
        $num3 = $num1 + $num2;
    } elseif ($_POST['operation'] == 2) {
        $num3 = $num1 - $num2;
    } elseif ($_POST['operation'] == 3) {
        $num3 = $num1 * $num2;
    } elseif ($_POST['operation'] == 4) {
        $num3 = $num2 == 0 ? 'Деление на ноль' : $num1 / $num2;
    }
    echo "<h3>Результат: $num3</h3>";
}
?>
<style>
    .element{
        margin-top: 15px;
    }
    .element_left{
        margin-left: 15px;
    }
</style>

<form method="post">
    <input class="element" type="text" name="num1" value="<?= getPostValue('num1') ?>">
    <input class="element element_left" type="text" name="num2" value="<?= getPostValue('num2') ?>"><BR>

    <div class="calc-buttons">
        <button class="calc-button" type="submit" name="operation" value="1">Сложить</button>
        <button class="calc-button" type="submit" name="operation" value="2">Вычесть</button>
        <button class="calc-button" type="submit" name="operation" value="3">Умножить</button>
        <button class="calc-button" type="submit" name="operation" value="4">Разделить</button>
    </div>
</form>
