<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
<body>

	<div class="container-fill">
		<div class="text-center bg-inverse" style="padding: 10px">
			<div class="row">
				<div class="col-2">
					<h2 style="color:white">BaristaVille</h1>
				</div>
				<div class="col-1">
					<a href="customerHomePage.php" >
						<h6 style="color:white">Home</h1>
					</a>
				</div>				
				<div class="col-1">
					<a href="menuPage.php">
						<h6 style="color:white">Menu</h1>
					</a>
				</div>				
				<div class="col-1">
					<a href="myOrdersPage.php" >
						<h6 style="color:white">My Orders</h1>
					</a>
				</div>				
				<div class="col-4"></div>
				<div class="col-1">
					<a href="myCartPage.php" style="align-right">
						<h6 style="color:white">
							My Cart
						</h1>
					</a>
				</div>				
				<div class="col-2">
					<h6 style="color:white">
						Welcome Customer!
						<a href="logoutController.php" style="align-right">Logout</a>
					</h1>
				</div>				
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th>Size (oz)</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
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
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$("button").not('#submit').click(function() {
				$.ajax({
					type: "POST",
					url: "removeFromCart.php",
					data: { product_id: this.id },
					success: function(data){
						console.log('success');
					},
					error: function() {console.log('error');}
				});
		    	$("#" + $(this).attr('id')).closest('tr').remove();
			});
			$("#submit").click(function() {
				$.ajax({
					type: "POST",
					url: "submitOrderController.php",
					data: {},
					success: function(data) {
						console.log('success');
						location.reload();
					}
				});
			});
		});	
	</script>

</body>
</html>