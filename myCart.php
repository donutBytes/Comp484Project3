<?php 
session_start();
require_once('db_connect.php');

// var_dump($_SESSION['cart']);
$totalCost = 0;
$totalSize = 0;
if(!isset($_SESSION['cart'])) {
	// echo 'hi';	
} else if(sizeof($_SESSION['cart']) == 0) {
	// echo 'this';
} else {
	$stmt = $db->prepare('
		SELECT * 
		FROM products
		WHERE product_id = ?
		');

	$items = $_SESSION['cart'];

	$indexId = 1;
		foreach($items as $id => $quantity) {
		if($quantity > 1) {
			$stmt->execute([$id]);
			$product = $stmt->fetchAll();

			for($i = 0; $i < $quantity; $i++) {
				$entry = '
					<tr id="'. $indexId .'">
						<td>'. $product[0]['display_name'] .'</td>
						<td>'. $product[0]['price'] .'</td>
						<td>'. $quantity .'</td>
						<th scope="row">
							<button class="btn btn-danger" id="'. $product[0]['product_id'] .'">Remove from Cart</button>
						</th>
					</tr>									
				';
				echo $entry;
				$indexId++;
				$totalCost += $product[0]['price'];
				$totalSize += $product[0]['size'];
			}
		}
		else if($quantity == 1){	
			$stmt->execute([$id]);
			$product = $stmt->fetchAll();

			$entry = '
				<tr id="'.$indexId.'">
					<td>'. $product[0]['display_name'] .'</td>
					<td>'. $product[0]['price'] .'</td>
					<td>'. $quantity .'</td>
					<th scope="row">
						<button class="btn btn-danger" id="'. $product[0]['product_id'] .'">Remove from Cart</button>
					</th>
				</tr>									
			';
			echo $entry;
			$indexId++;
			$totalCost += $product[0]['price'];
			$totalSize += $product[0]['size'];					
		}
	}
}
echo '
			</tbody>						
		</table>			
	</div>
';
if($totalCost > 0 && $totalSize > 0) {
	echo '
		<div class="row"><strong>Total Cost: </strong> $'.$totalCost.'</div>
		<div class="row"><strong>Total Size: </strong> $'.$totalSize.'</div>
	';
}
echo '
	<br>
	<div class="row">
';	
if($totalCost > 0 && $totalSize > 0) {
	echo '<button id="submit" class="btn btn-primary">Submit Order</button>';
}
?>