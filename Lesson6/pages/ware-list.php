<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File view</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="view center">
    <?php
    $query = mysqli_query($link,'select * from images order by visit_count desc,id');

    while($row = mysqli_fetch_assoc($query)){
        $id = $row['id'];
        $img = $row['name'];
        $desc = $row['desc'];
        echo <<<html
            <div class="ware">
                <a href="?page=8&img_id=$id" target="_blank"><img class="image" src="./img/$img"/><p>$desc</p></a>
                
            </div> 
html;
    }
    ?>
</div>
</body>
</html>