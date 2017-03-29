<?php

session_start();
require_once('db_connect.php');

$stmt = $db->prepare('
		UPDATE orders
		SET completed = 1
		WHERE product_id = ?
		AND order_id = ?
	');
$stmt->execute([$_POST['product_id'], $_POST['order_id']]);

echo 'Order Updated';
exit();
	
?>