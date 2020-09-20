<?php
    /**@var array $goods*/
?>
<h1>Товары</h1>

<?php foreach ($goods as $good) : ?>
    <h3><?= $good['name'] ?></h3>
    <p>
        <img style="width: 100px" src=<?= "/img/image{$good['id']}.jpg"?> alt="">
    </p>
    <p><?= $good['info'] ?></p>
    <p><?= $good['price'] ?>р.</p>
    <a href="?p=good&a=one&id=<?= $good['id'] ?>">подробнее</a>
    <p
            style="cursor: pointer;"
            onclick="addGood(<?= $good['id'] ?>)"
    >
        Добавить в корзину
    </p>
    <hr>
<?php endforeach; ?>