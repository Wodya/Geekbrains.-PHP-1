<?php
function indexAction()
{
    return render(
        'cartIndex',
        [
            'goods' => $_SESSION['goods'],
            'title' => 'Корзина',
        ]
    );
}

function addAjaxAction()
{
    header('Content-Type: application/json');
    $id = postId();
    $success = false;
    if (empty($id)) {
        echo json_encode([
            'success' => $success
        ]);
        return;
    }

    $msg = goodAdd($id);

    if (empty($msg)) {
        $msg = 'Товар успешно добавлен';
        $success = true;
    }

    echo json_encode([
        'success' => $success,
        'msg' => $msg,
        'count' => goodsCount()
    ]);
}


function addAction()
{
    $msg = goodAdd(getId());

    if (empty($msg)) {
        $msg = 'Товар успешно добавлен';
    }

    setMSG($msg);
    redirect();
}

function goodAdd($id)
{
    if (empty($id)) {
        return 'Не передан id';
    }

    $sql = 'SELECT id, name, price, info FROM goods WHERE id = ' . $id;
    $res = mysqli_query(getLink(), $sql);
    $row = mysqli_fetch_assoc($res);
    if (empty($row)) {
        return 'ТОвар не найден';
    }

    if (!empty($_SESSION['goods'][$id])) {
        $_SESSION['goods'][$id]['count']++;
        return '';
    }

    $_SESSION['goods'][$id] = [
        'name' => $row['name'],
        'price' => $row['price'],
        'count' => 1,
    ];

    return '';
}
