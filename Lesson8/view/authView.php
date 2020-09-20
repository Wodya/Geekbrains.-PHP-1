<?php if(empty(getLoginUser())): ?>
<form method="post" action="?p=auth&a=login">
    <input name="login" placeholder="login">
    <input name="password" placeholder="password">
    <input type="submit">
</form>
<?php else: ?>
<h2>вы авторизованы!</h2>
<a href="?p=auth&a=out">Выход</a>
<?php endif;?>

