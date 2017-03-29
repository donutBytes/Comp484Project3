<?php 

session_start();
require_once('db_connect.php');

if(isset($_SESSION['cart'])) {
	$cart = $_SESSION['cart'];

	if(sizeof($cart) > 0) {
		$stmt = $db->prepare('
				SELECT *
				FROM orders
				ORDER BY order_id DESC 
				LIMIT 1
			');
		$stmt->execute();
		$result = $stmt->fetchAll();
		// var_dump($result);
		$orderId = $result[0]['order_id'] + 1;

		$insert = $db->prepare('
				INSERT INTO orders
				(order_id, user_id, product_id, quantity, completed)
				VALUES 
				('. $orderId .', 1, ?, ?, 0)
			');

		foreach($cart as $item => $quantity) {
			$insert->execute([$item, $quantity]);
		}
		$_SESSION['cart'] = [];
	}	

	echo 'Order Submitted!';
	exit();
}	
else {
	echo 'Error Submitting Order - No Items in Cart';
	exit();
}

?>