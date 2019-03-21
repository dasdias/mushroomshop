<?php 
// session_start(); 

require_once 'parts/header.php';

if (isset($_SESSION['cart'])) { 
    foreach ($_SESSION['cart'] as $product) { ?>                    
        <div class="cart">
            <a href="product.php?product=<?=$product['title']?>">
                <img src="img/<?=$product['img']?>" alt="<?=$product['rus_name']?>">
            </a>
            <div class="cart-descr"><?=$product['rus_name']?> в количестве <?=$product['quantity']?> шт на сумму <?=$product['quantity'] * $product['price']?> рублей</div>
            <button type="submit">Удалить</button>
        </div>
    <?php } ?>
<?php } else { ?>
    <div class="main">
        <div class="card">
            Вы ещё не добавили товары в корзину.
        </div>
    </div>
<?php } ?>


       

        <hr>

</body>
</html>

