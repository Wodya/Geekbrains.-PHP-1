<?php
function indexAction()
{
    return allAction();
}

function allAction()
{
    return '<h1>Пользователи</h1>';
}

function oneAction()
{
    return '<h1>Пользователь</h1>';
}

function addAction()
{
    if (!isAdmin()) {
        header('Location: /');
        return '';
    }

    return 'Добавление';
}