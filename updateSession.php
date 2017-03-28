<?php

	$_SESSION['cart'][$_POST['product_id']] += 1;

	$data['product_id'] = $_POST['product_id'];

	echo json_encode($data);

	exit();
?>	