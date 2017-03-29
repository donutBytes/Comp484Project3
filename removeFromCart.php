<?php 

session_start();

$id = $_POST['product_id'];
if($_SESSION['cart'][$id] > 1) {
	$_SESSION['cart']['$id']--;
} else if($_SESSION['cart'][$id] == 1){
	unset($_SESSION['cart'][$id]);
}

$data['result'] = 'Item Removed';
// echo json_encode($data);
// echo 'Item Removed';
echo $id;
exit();
?>