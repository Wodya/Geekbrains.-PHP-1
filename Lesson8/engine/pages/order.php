<?php

function indexAction()
{
    $user = getLoginUser();
    $orders = null;
    if(!empty($user)) {
        $sql = 'SELECT o.id,o.date,o.state,u.name user_name FROM php_1.orders o join php_1.users u on o.user_id=u.id';
        if ($user['is_admin'] == 0)
            $sql .= " where o.user_id={$user['id']}";
        $res = mysqli_query(getLink(), $sql);

        $orders = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    return render(
        'orderView',
        [
            'user' => $user,
            'orders' => $orders,
            'title' => 'Заказы'
        ]
    );
}
function orderOneAction()
{
    if(empty($_GET['orderId']))
    {
        setMSG('Ошибка получения заказа');
        header('Location: /');
        return;
    }
    $orderId = $_GET['orderId'];
    $sql = "SELECT id,goods FROM orders where id=$orderId";
    $res = mysqli_query(getLink(), $sql);
    $result = mysqli_fetch_assoc($res);
    $goods = json_decode($result['goods'],true);
    return render(
        'orderOne',
        [
            'orderId' => $orderId,
            'goods' => $goods,
            'title' => "Подробности заказа {$result['id']}"
        ]
    );
}
function makeAjaxAction()
{
    header('Content-Type: application/json');
    $user = getLoginUser();
    $goods = getGoods();
    if($user == null || $goods == null)
    {
        $success = false;
        $msg = 'Ошибка оформления заказа';
    }
    else {
        $json_goods = addslashes(json_encode($goods));
        $sql = "INSERT INTO `php_1`.`orders` (`user_id`, `goods`, `state`) VALUES ({$user['id']}, '{$json_goods}', 'новый')";
        mysqli_query(getLink(), $sql);

        $_SESSION['goods']=[];
        $success = true;
        $msg = 'Заказ оформлен';
    }
    echo json_encode([
        'success' => $success,
        'msg' => $msg,
        'count' => goodsCount()
    ]);
}

function finishAjaxAction()
{
    header('Content-Type: application/json');
    $user = getLoginUser();
    $orderId = empty($_GET['order_id']) ? null : $_GET['order_id'];
    if($user == null || $orderId == null)
    {
        $success = false;
        $msg = 'Ошибка завершения заказа';
    }
    else if($user['is_admin'] != 1)
    {
        $success = false;
        $msg = 'Ошибка оформления заказа';
    }
    else {
        $sql = "UPDATE `php_1`.`orders` SET `state` = 'Завершен' WHERE (`id` = $orderId);";
        mysqli_query(getLink(), $sql);

        $success = true;
        $msg = 'Заказ оформлен';
    }
    echo json_encode([
        'success' => $success,
        'msg' => $msg,
        'count' => goodsCount()
    ]);


}