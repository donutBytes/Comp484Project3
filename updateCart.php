<?php
	session_start();

	if(isset($_SESSION['cart'][$_POST['product_id']])) {
		$_SESSION['cart'][$_POST['product_id']]++;
	} else {
		$_SESSION['cart'][$_POST['product_id']] = 1;
	}

	$data['product_id'] = $_POST['product_id'];

	echo json_encode($data);

	exit();
?>	