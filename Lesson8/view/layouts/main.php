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
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="menu center">
    <ul>
        <?= getMainMenu() ?>
    </ul>
</div>
<p style="color: red"><?= $msg ?></p>
    <?= $content ?>

<script src="/js/script.js"></script>
</body>
</html>