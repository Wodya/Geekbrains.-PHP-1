<?php
function indexAction()
{
    $basketGoods = empty($_SESSION['basket']) ? [] : $_SESSION['basket'];
    $basketHtml = '';
    if(count($basketGoods) == 0){
        $basketHtml = '<p>Пусто</p>';
    }else{
        foreach ($basketGoods as $item){
            $id = $item['id'];
            $name = $item['name'];
            $price = $item['price'];
            $count = $item['count'];
            $sum = $count*$price;
            $basketHtml .= <<<html
            <div class="basket_item">
                <p>$name</p><p>$price</p><p>$count</p><p class="image_price">$sum</p><a href="?p=basket&a=delete&img_id=$id">Удалить</a><a href="?p=basket&a=add&img_id=$id">Добавить</a>
            </div> 
html;
        }
    }
    return "<h1>Корзина</h1><div class='basket center'>$basketHtml</div)";
}

function addAction(){
    if(empty($_GET['img_id']))
    {
        header("Location: ?p=basket");
        exit();
    }
    $id = (int)$_GET['img_id'];
    $_SESSION['basket'][$id]['count'] ++;
    header("Location: ?p=basket");
}
function deleteAction(){
    if(empty($_GET['img_id']))
    {
        header("Location: ?p=basket");
        exit();
    }
    $id = (int)$_GET['img_id'];

    $_SESSION['basket'][$id]['count']--;
    if($_SESSION['basket'][$id]['count'] == 0){
        unset($_SESSION['basket'][$id]);
    }

    header("Location: ?p=basket");
}
