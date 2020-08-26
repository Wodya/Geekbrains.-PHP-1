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
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $text = $_POST['review_text'];
        if(!empty($text)){
            $query = mysqli_query($link, "INSERT INTO `php_1`.`reviews` (`image_id`, `text`) VALUES ($id, '$text');");
            mysqli_query($link, $query);
            header("Location: ?page=8&img_id=$id&novisit");
            exit();
        }
    }else if(!key_exists('novisit',$_GET)){
        $query = mysqli_query($link, "Update images set visit_count = visit_count + 1 where id=$id");
        mysqli_query($link, $query);
    }
    $query = mysqli_query($link,"select * from images where id=$id");
    $row = mysqli_fetch_assoc($query);
    $img = "img/" . $row['name'];
    $count = $row['visit_count'];

    ob_start();
    $query = mysqli_query($link,"select * from reviews where image_id=$id order by date desc");
    while($row = mysqli_fetch_assoc($query)){
        $date = date_format(date_create_from_format('Y-m-d H:i:s', $row['date']),'d-m-Y H:i:s');
        $text = $row['text'];
        echo <<<html
            <div class="review">
                <p class="review_date">$date</p>
                <p class="review_text">$text</p>
            </div>
html;

    }

    $reviews = ob_get_clean();
?>
<body>
    <img src="<?= $img ?>" class="image_big" alt="">
    <h1>Количество просмотров <?= $count ?></h1>
    <form method="post" class="review_form">
        <input type="text" name="review_text" class="review_form_text">
        <input type="submit" class="review_form_button" value="Добавить отзыв">
    </form>
    <?=$reviews?>
</body>
</html>

