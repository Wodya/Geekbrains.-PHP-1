<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $sql = "INSERT INTO users 
                    (login, password) 
                VALUES ('{$login}', '{$password}')";
        mysqli_query($link, $sql);
        header('Location: ?page=2');
        exit();
    }
?>

<form method="post">
    <input type="text" name="login" placeholder="login">
    <input type="text" name="password" placeholder="password">
    <input type="submit">
</form>