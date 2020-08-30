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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = $_POST['login'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT );
        $sql = "INSERT INTO users 
                    (login, password, name) 
                VALUES ('{$login}', '{$password}', '{$name}')";
        mysqli_query(getLink(), $sql);

        header('Location: /?p=auth');
        exit();
    }
    return <<<html
    <h1>Заведение нового пользователя</h1>
    <form method="post">
        <input type="text" name="login" placeholder="login">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="name" placeholder="Имя">
        <input type="submit">
    </form>
html;
}

function cabinetAction(){
    if(empty($_SESSION['user'])){
        header("Location: ?p=auth");
        exit();
    }
    $id = $_SESSION['user'];
    $sql = "SELECT id, name, login FROM users WHERE id = {$id}";
    $result = mysqli_query(getLink(), $sql);
    $userData = mysqli_fetch_assoc($result);
    $name = $userData['name'];
    $login = $userData['login'];
    return <<<html
    <h1>Пользователь: $name</h1>
    <h1>Логин: $login</h1>
html;

    if (!empty($userData) && password_verify($password, $userData['password'])) {
        $_SESSION['user'] = $userData['id'];
    }
}