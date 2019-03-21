<?php 
require_once 'parts/header.php';

if (isset($_GET['product'])) {
    $currentProduct = $_GET['product'];
    $product = $connect->query("SELECT * FROM products WHERE title='$currentProduct'");
    $product = $product->fetch(PDO::FETCH_ASSOC);
}
/*echo('<pre>');
print_r();
echo('</pre>');*/

// echo('<pre>');
// var_dump();
// echo('</pre>');

?>
<?php if (empty($product)) { ?>
	<div class="main">
		<div class="card">Такого товара не существует!</div>
	</div>
<?php } else { ?>
	<div class="product-card">
	    <a href="index.php">Вернуться на главную</a>

	    <h2><?=$product['rus_name']?> (<?=$product['price']?> рублей)</h2>
	    <div class="descr"><?=$product['descr']?></div>
	    <img width="300" src="img/<?=$product['img']?>" alt="<?=$product['rus_name']?>">
	    <form method="POST" action="actions/add.php">
            <input type="hidden" name="id" value="<?=$product['id']?>">
            <input type="submit" value="Добавить в корзину">
        </form>
	    <!-- <button type="submit">Добавить в корзину</button> -->
	</div>
<?php } ?>
