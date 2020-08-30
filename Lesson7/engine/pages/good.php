<?php
function indexAction()
{
    $basketGoods = empty($_SESSION['basket']) ? [] : $_SESSION['basket'];
    $imgIdBasket = empty($_GET['img_id']) ? 0 : $_GET['img_id'];

    $query = mysqli_query(getLink(), 'select * from images order by visit_count desc,id');

    $goods = '';
    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['id'];
        $img = $row['name'];
        $desc = $row['desc'];
        $price = $row['price'];
        if($imgIdBasket == $id){
            if(empty($basketGoods[$imgIdBasket])){
                $basketGoods[$imgIdBasket]['id'] = $id;
                $basketGoods[$imgIdBasket]['name'] = $desc;
                $basketGoods[$imgIdBasket]['price'] = $price;
                $basketGoods[$imgIdBasket]['count'] = 1;
            }
            else {
                $basketGoods[$imgIdBasket]['count']++;
            }
            $_SESSION['basket'] = $basketGoods;
        }
        $inBasket = empty($basketGoods[$id]) ? 0 : $basketGoods[$id]['count'];
        $inBasketStr = $inBasket > 0 ? "<p>В корзине: $inBasket</p>" :"";
        $goods .= <<<html
            <div class="ware">
                <a href="?p=good&img_id=$id"><img class="image" src="img/$img"/><p>$desc</p><p class="image_price">$price</p>$inBasketStr</a>
            </div> 
html;
    }
    return "<div class='view center'>$goods</div)";
}


