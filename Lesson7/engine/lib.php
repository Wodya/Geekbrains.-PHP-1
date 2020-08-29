<?php

function getLink()
{
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root', '', 'gbphp');
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