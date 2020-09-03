<?php
    /**@var array $goods */
?>

<h1>Корзина</h1>
<?php if (empty($goods)): ?>
    'Нет товаров';
<?php else : ?>
    <?php foreach ($goods as $id => $good) : ?>
        <?php $total = $good['count'] * $good['price']; ?>
        <p>товар: <?= $good['name'] ?></p>
        <p>
            Количество:
            <a href="">-</a>
            <?= $good['count'] ?>
            <a href="?p=cart&a=add&id=<?= $id ?>">+</a>
        </p>
        <p>Цена: <?= $total ?></p>
        <hr>
    <?php endforeach; ?>
<?php endIf; ?>
<?php if (!empty(getLoginUser()) && !empty($goods)): ?>
    <button onclick="makeOrder()">Сделать заказ</button>
<?php endif; ?>

