<?php 
session_start();
require_once '../db/db.php';

if (isset($_POST['order'])) {
	// echo('<pre>');
	// var_dump($_POST);
	// echo('</pre>');
	$username = htmlentities(trim($_POST['username']));
	$email = htmlentities(trim($_POST['email']));
	$phone = htmlentities(trim($_POST['phone']));
	$emailAdmin = 'admin@example.ru';
	$connect->query("INSERT INTO myorder (username, phone, email) VALUES ('$username', '$phone', '$email')");

	// echo "Успех";
	$lastId = $connect->query("SELECT MAX(id) FROM myorder WHERE email='$email'");
	$lastId = $lastId->fetch(PDO::FETCH_ASSOC);
	$lastId = $lastId['MAX(id)'];
	// echo $lastId['MAX(id)'];
	
	// User message
	$message = "<h2>Ваш заказ под номером $lastId принят.</h2>";
	$message .= "<h3>Состав заказа :</h3>";

		foreach ($_SESSION['cart'] as $product) {
			$message .= "<div>{$product['rus_name']} в колличестве {$product['quantity']} шт.<div>";
		}
	$message .="<p>Сумма заказа: {$_SESSION['totalPrice']} рублей</p>";
	// END User message

	// Admin message 
	$adminMessage = "<h2>Пользователь {$username} сделал заказ под номером {$lastId}.</h2>";
	$adminMessage .= "<h3>Состав заказа :</h3>";

	foreach ($_SESSION['cart'] as $product) {
			$adminMessage .= "<div>{$product['rus_name']} в колличестве {$product['quantity']} шт.<div>";
		}
	$adminMessage .="<p>Сумма заказа: {$_SESSION['totalPrice']} рублей</p>";
	// END Admin message 

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$subject = "Ваш заказ под номером $lastId принят.";

	$adminSubject = "Пользователь $username сделал заказ под номером $lastId ";


	mail($email, $subject, $message, $headers);
	mail($emailAdmin, $adminSubject, $adminMessage, $headers);

	unset($_SESSION['totalQuantity']);
 	unset($_SESSION['totalPrice']);
 	unset($_SESSION['cart']);

 	$_SESSION['order'] = $lastId;
}
header('Location:' . $_SERVER['HTTP_REFERER']);


?>