<?php
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
    return render("userAddView",[
        'title' => 'Добавление пользователя',
    ]);
}
