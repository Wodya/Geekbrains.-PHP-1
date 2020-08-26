<?php

$link = mysqli_connect('127.0.0.1', 'root', 'www12345', 'php_1');


function getPage($pages)
{
    $pageNumber = 1;
    if (key_exists('page', $_GET)) {
        $pageNumber = (int)$_GET['page'];
    }

    if (empty($pages[$pageNumber])) {
        $pageNumber = 1;
    }

    return $pages[$pageNumber];
}

function getId()
{
    if (!empty((int)$_GET['id'])) {
        return (int)$_GET['id'];
    }

    return 0;
}
