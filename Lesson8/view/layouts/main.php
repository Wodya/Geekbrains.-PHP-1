<?php
    /**@var string $msg*/
    /**@var string $content*/
    /**@var string $title*/
    /**@var int $countGoodsInCart*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<ul>
    <li><a href="?page=1">Главная</a></li>
    <li><a href="?p=good&a=all">Товары</a></li>
    <li>
        <a href="?p=cart">
            Корзина <span class="countGood">(<?= $countGoodsInCart ?>)</span>
        </a>
    </li>
    <li><a href="?page=2">Пользователи</a></li>
    <li><a href="?p=user&a=add">Добавить пользователя</a></li>
    <li><a href="?p=auth&a=index">Вход</a></li>
</ul>
<p style="color: red"><?= $msg ?></p>
    <?= $content ?>

<script src="/js/script.js"></script>
</body>
</html>