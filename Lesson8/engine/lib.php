<?php

function getLink()
{
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('127.0.0.1', 'root', 'www12345', 'php_1');
    }

    return $link;
}

function getContent()
{
    $page = 'index';
    if (!empty($_GET['p'])) {
        $page = trim($_GET['p']);
    }

    $fileName = getFullNamePage($page);
    if (!file_exists($fileName)) {
        $fileName = getFullNamePage('index');
    }

    require_once $fileName;

    $action = 'index';
    if (!empty($_GET['a'])) {
        $action = trim($_GET['a']);
    }

    $action .= 'Action';
    if (!function_exists($action)) {
        $action = 'indexAction';
    }

    return $action();
}

function getFullNamePage($page)
{
    return __DIR__ . '/pages/' . $page . '.php';
}

function clearStr($str)
{
    return mysqli_real_escape_string(getLink(), strip_tags(trim($str)));
}

function isAdmin()
{
    return !empty($_SESSION['user']);
}

function getId()
{
    if (empty($_GET['id'])) {
        return 0;
    }

    return (int)$_GET['id'];
}
function postId()
{
    if (empty($_POST['id'])) {
        return 0;
    }

    return (int)$_POST['id'];
}

function redirect($path = '')
{
    if (!empty($path)) {
        header('Location: ' . $path);
        return;
    }

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }

    header('Location: /');
}

function setMSG($msg)
{
    $_SESSION['msg'] = $msg;
}

function getMSG()
{
    if (empty($_SESSION['msg'])) {
        return '';
    }
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    return $msg;
}

function goodsCount()
{
    if (empty($_SESSION['goods'])) {
        return 0;
    }

    return count($_SESSION['goods']);
}
function getGoods()
{
    return empty($_SESSION['goods']) ? null : $_SESSION['goods'];
}

function render($template, $params = [], $layout = 'main')
{
    $content = renderTmpl($template, $params);
    $layout = 'layouts/' . $layout;

    $title = 'Магазин';
    if (!empty($params['title'])) {
        $title = $params['title'];
    }
    return renderTmpl(
        $layout,
        [
            'countGoodsInCart' => goodsCount(),
            'content' => $content,
            'msg' => getMSG(),
            'title' => $title,
        ]
    );
}
function renderTmpl($template, $params = [])
{
    ob_start();
    extract($params);
    include dirname(__DIR__) . '/view/' . $template . '.php';
    return ob_get_clean();
}
function getLoginUser(){
    return empty($_SESSION['user'])?null:$_SESSION['user'];
}

function getMainMenu() : string
{
    /**@var int $countGoodsInCart*/
    $user = getLoginUser();
    $goodsCount = goodsCount();
    $str =  <<<html
        <li><a href="?page=1">Главная</a></li>
        <li><a href="?p=good&a=all">Товары</a></li>
        <li>
            <a href="?p=cart">
                Корзина <span class="countGood">({$goodsCount})</span>
            </a>
        </li>
        <li><a href="?page=2">Пользователи</a></li>
        <li><a href="?p=user&a=add">Добавить пользователя</a></li>
html;
        if(!empty($user))
            $str .= '<li><a href="?p=order">Заказы</a></li>';
        $str .= <<<html
        <li><a href="?p=auth&a=index">Вход</a></li>
html;
        return $str;
}