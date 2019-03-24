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
                <div id="<?=$product['id']?>" class="card">
                    <a href="product.php?product=<?=$product['title']?>">
                        <img class="img-animate" data-img-animate="<?=$product['id']?>" src="img/<?=$product['img']?>" alt="<?=$product['rus_name']?>">
                    </a>
                    <div class="label"><?=$product['rus_name']?> (<?=$product['price']?> рублей)</div>
                    <?php require 'parts/button.php';?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

</body>
<script src="libs/jquery.min.js"></script>
<script src="js/main.js"></script>
</html>

