<?php
    /**@var array $goods*/
?>
<h1>Товары</h1>

<?php foreach ($goods as $good) : ?>
    <h3><?= $good['name'] ?></h3>
    <p>Цена: <?= $good['price'] ?>р.</p>
    <p>Количество: <?= $good['count'] ?></p>
    <hr>
<?php endforeach; ?>