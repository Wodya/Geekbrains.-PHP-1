<?php
function indexAction()
{
  if (empty($_SESSION['user'])) {
    return <<<php
<form method="post" action="?p=auth&a=login">
    <input name="login" placeholder="login">
    <input name="password" placeholder="password">
    <input type="submit">
</form>
php;

  }
    return <<<php
    вы авторизованы!
    <a href="?p=auth&a=out">Выход</a>
php;
}

function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /?p=auth');
        return;
    }

    if (empty($_POST['password']) || empty($_POST['login'])) {
        header('Location: /?p=auth');
        return;
    }

    $password = $_POST['password'];
    $login = clearStr($_POST['login']);

    $sql = "SELECT login, password FROM users WHERE login = '{$login}'";
    $result = mysqli_query(getLink(), $sql);
    $userData = mysqli_fetch_assoc($result);
    if (!empty($userData) && password_verify($password, $userData['password'])) {
        $_SESSION['user'] = 1;
    }
    header('Location: /?p=auth');
    return;
}

function outAction()
{
    session_destroy();
    header('Location: /?p=auth');
}

