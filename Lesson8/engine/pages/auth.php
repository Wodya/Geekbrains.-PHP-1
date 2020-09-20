<?php
function indexAction()
{
    return render('authView',[
    ]);
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

    $sql = "SELECT id, login, name, password, is_admin FROM users WHERE login = '{$login}'";
    $result = mysqli_query(getLink(), $sql);
    $userData = mysqli_fetch_assoc($result);
    if (!empty($userData) && password_verify($password, $userData['password'])) {
        $_SESSION['user'] = [
            'id' => $userData['id'],
            'name' => $userData['name'],
            'is_admin' => $userData['is_admin']];
    }
    header('Location: /?p=auth');
    return;
}

function outAction()
{
    session_destroy();
    header('Location: /?p=auth');
}

