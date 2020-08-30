<?php
    /**@var array $good*/
?>

<h1><?= $good['name']?></h1>
<p><?= $good['info']?></p>
<p><?= $good['price']?>р.</p>
<p><a href="?p=cart&a=add&id=<?= $good['id']?>">Добавить в корзину</a></p>
<a href="?p=good">Назад</a>
<hr>