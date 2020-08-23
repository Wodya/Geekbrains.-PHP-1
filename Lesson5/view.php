<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
    $id= $_GET['img_id'];
    $sql = mysqli_connect('127.0.0.1','root','','php_1');
    $query = mysqli_query($sql,"Update images set visit_count = visit_count + 1 where id=$id");
    mysqli_stmt_execute($query);

    $query = mysqli_query($sql,"select * from images where id=$id");
    $row = mysqli_fetch_assoc($query);
    $img = "img/" . $row['name'];
    $count = $row['visit_count'];

?>
<body>
    <img src="<?= $img ?>" class="image_big" alt="">
    <h1>Количество просмотров <?= $count ?></h1>
</body>
</html>

