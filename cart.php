<?php 

require_once 'parts/header.php';

// echo('<pre>');
// var_dump($_SESSION);
// echo('</pre>');



if (isset($_SESSION['cart'])) {
	

if (count($_SESSION['cart']) == 0){ ?>
	<div class="main">
		<div class="card">Вы удалили все товары.</div>
	</div>
	<a class="back" href="index.php">На главную.</a>
<?php } else if (count($_SESSION['cart']) > 0) { 
	foreach ($_SESSION['cart'] as $key=>$product) { ?>                    
		<div class="cart">
			<a href="product.php?product=<?=$product['title']?>">
				<img src="img/<?=$product['img']?>" alt="<?=$product['rus_name']?>">
			</a>
			<div class="cart-descr"><?=$product['rus_name']?> в количестве <?=$product['quantity']?> шт на сумму <?=$product['quantity'] * $product['price']?> рублей</div>
			<form action="actions/delete.php" method="POST">
				<input type="hidden" name="delete" value="<?=$key?>"> 
				<input type="submit" value="Удалить"> 
			</form>
		</div>
<?php } ?>
		<hr>
		<form class="order" method="POST" action="actions/mail.php">
			<input type="text" name="username" required placeholder="Ваше имя">
			<input type="text" name="phone" required placeholder="Ваше телефон">
			<input type="email" name="email" required placeholder="Ваше Email">
			<input type="submit" name="order" placeholder="Отправить заказ">
		</form>
<?php } ?>
	
<?php } else if (isset($_SESSION['order'] )) { ?>
	<div class="main">
		<div class="card">
		Ваш заказ под номером <?=$_SESSION['order']?> принят.
		</div>
	</div>
	<a class="back" href="index.php">На главную.</a>
<?php } else { ?>
	<div class="main">
		<div class="card">В кознине товаров нет.</div>
	</div>
	<a class="back" href="index.php">На главную.</a>
<?php } ?>

<hr>

</body>
</html>

