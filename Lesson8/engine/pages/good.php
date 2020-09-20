<?php
function indexAction()
{
    return allAction();
}

function allAction()
{
    $sql = 'SELECT id, name, price, info FROM goods';
    $res = mysqli_query(getLink(), $sql);

    $goods = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return render(
        'goodAll',
        [
            'goods' => $goods,
            'title' => 'Все Товары'
        ]
    );
}

function oneAction()
{
    $sql = 'SELECT id, name, price, info FROM goods WHERE id = ' . getId();
    $res = mysqli_query(getLink(), $sql);
    $good = mysqli_fetch_assoc($res);
    return render(
        'goodOne',
        [
            'good' => $good,
            'title' => $good['name']
        ]
    );
}
