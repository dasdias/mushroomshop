<?php 
session_start();
require_once '../db/db.php';

if (isset($_POST['order'])) {
	// echo('<pre>');
	// var_dump($_POST);
	// echo('</pre>');
	$username = htmlentities($_POST['username']);
	$email = htmlentities($_POST['email']);
	$phone = htmlentities($_POST['phone']);
	$connect->query("INSERT INTO myorder (username, phone, email) VALUES ('$username', '$phone', '$email')");

	echo "Успех";
	/*$lastId = $connect->query("SELECT MAX(id) FROM myorder WHERE email='$email'");
	$lastId = $lastId->fetsh(PDO::FETCH_ASSOC);
	$lastId = $lastId['MAX(id)'];
	// echo $lastId['MAX(id)'];

	$message = "<h2>Ваш заказ под номером $lastId принят.</h2>";
	$message .= "<h3>Состав заказа :</h3>";

		foreach ($_SESSION['cart'] as $product) {
			$message .= "
			<div>{$product['rus_name']} в колличестве 
			{$product['quantity']}<div>";
		}
	$message .="<p>Сумма заказа: {
				$product['totalPrice']} рублей</p>";

	$headers = 'MIME-Version: 1.0 '. "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$subject = "Ваш заказ под номером $lastId принят.";

	mail($email, $subject, $message, $headers);*/

	
}


?>