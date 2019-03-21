<?php 
session_start(); 
require_once 'db/db.php';

$cats = $connect->query("SELECT * FROM cats");
$cats = $cats->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($cats);
// echo "</pre>";

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Главная</a></li>
        <?php foreach ($cats as $cat) { ?>
            <li><a href="index.php?cat=<? echo $cat['name']?>"><? echo $cat['rus_name']?></a></li>
        <?php } ?>
        <li><a href="cart.php">Корзина (Товаров: 
            <?php if (isset($_SESSION['totalQuantity'])) { ?>
                <?=$_SESSION['totalQuantity']?>
            <?php } else { ?>
                    0
           <?php } ?>
                 на сумму 
            <?php if (isset($_SESSION['totalPrice'])) { ?>
               <?=$_SESSION['totalPrice']?>
            <?php } else { ?> 
              0
          <?php } ?>
          руб)
            </a>
        </li>
    </ul>
</nav>
<hr>