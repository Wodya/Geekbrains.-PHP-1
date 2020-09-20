<?php
    /**@var array $orders */
?>
<?php if(empty($user)) : ?>
    <h2>Вы не авторизованы</h2>
<?php else:?>
    <?php if($user['is_admin']==1): ?>
        <h2>Все заказы</h2>
    <?php endif; ?>
    <div class="orders center">
        <?php foreach ($orders as $order): ?>
            <div class="order">
                <a href="?p=order&a=orderOne&orderId=<?=$order['id']?>"><?=$order['date']?></a>
                <p><?=$order['user_name']?></p>
                <p id="order_<?= $order['id'] ?>"><?=$order['state']?></p>
                    <p class="finish" id="order_<?= $order['id'] ?>_state" onclick="finishOrder(<?= $order['id'] ?>)"
                        <?php if($user['is_admin'] == 0 || $order['state']=='Завершен'): ?>
                           style="visibility: hidden"
                        <?php endif;?>
                    >Завершить</p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
