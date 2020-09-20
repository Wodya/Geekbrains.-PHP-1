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
    <label for="operation">Операция</label>
    <select class="element element_left" name="operation" id="operation">
        <option value="1" <?= selected(1)?> >+</option>
        <option value="2" <?= selected(2)?> >-</option>
        <option value="3" <?= selected(3)?> >*</option>
        <option value="4" <?= selected(4)?> >/</option>
    </select><BR>
    <input class="element" type="submit" value="Вычислить">
</form>
