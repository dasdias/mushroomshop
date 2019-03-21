<?php 
require_once 'parts/header.php';

if (isset($_GET['cat'])) {
    $currentCat = $_GET['cat'];
    $products = $connect->query("SELECT * FROM products WHERE cat='$currentCat'");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
} else {
    $products = $connect->query("SELECT * FROM products");
    $products = $products->fetchAll(PDO::FETCH_ASSOC);
}
?>

    <div class="main">
        <?php if (empty($products)) { ?>
             <div class="card">Такой категории товаров не существует!</div>           
        <?php } else { ?>
            <?php foreach ($products as $product) { ?>
                <div class="card">
                    <a href="product.php?product=<?=$product['title']?>">
                        <img src="img/<?=$product['img']?>" alt="<?=$product['rus_name']?>">
                    </a>
                    <div class="label"><?=$product['rus_name']?> (<?=$product['price']?> рублей)</div>
                    <form method="POST" action="actions/add.php">
                        <input type="hidden" name="id" value="<?=$product['id']?>">
                        <input type="submit" value="Добавить в корзину">
                    </form>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

</body>
</html>

