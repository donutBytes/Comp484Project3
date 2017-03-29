<!DOCTYPE html>
<html>
<head>
	<title>My Orders</title>

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
					<a href="pendingOrdersPage.php" >
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
						<?php 
							session_start();	
							require_once('db_connect.php');

							$stmt = $db->prepare('
								SELECT * 
								FROM orders
								LEFT JOIN products ON orders.product_id = products.product_id 
								ORDER BY order_id DESC
								');
							$stmt->execute();
							$products = $stmt->fetchAll();

							$indexId = $products[0]['order_id'];
							echo '
								<h1>Order '. $indexId .'</h1>
								<table class="table">
									<thead>
										<tr>
											<th>Product Name</th>
											<th>Size (oz)</th>
											<th>Quantity</th>
											<th>Price</th>
											<th></th>
										</tr>
									</thead>
									<tbody>				
							';
		
							foreach($products as $item) {

								if($item['order_id'] != $indexId) {
									$indexId--;
									echo '
											</tbody>
										</table>
										<h1>Order '. $indexId .'</h1>
										<table class="table">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Size (oz)</th>
													<th>Quantity</th>
													<th>Price</th>
													<th></th>
												</tr>
											</thead>
											<tbody>				
									';
								}

								if($item['completed'] == 0) {
									$entry = '
										<tr>
											<td>'. $item['display_name'] .'</td>
											<td>'. $item['size'] .'</td>
											<td>'. $item['quantity'] .'</td>
											<td>'. $item['price'] .'</td>
											<th scope="row">
												<span class="badge badge-default">Pending</span>
											</th>
										</tr>									
										';
								}
								else if($item['completed'] == 1){
									$entry = '
										<tr>
											<td>'. $item['display_name'] .'</td>
											<td>'. $item['size'] .'</td>
											<td>'. $item['quantity'] .'</td>
											<td>'. $item['price'] .'</td>
											<th scope="row">
												<span class="badge badge-success">Completed</span>
											</th>
										</tr>									
										';
								}
								echo $entry;
							}
							echo '
									</tbody>
								<table>
							';
							// var_dump($products);
						?>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('button').click(function() {
				$.ajax({
					type: "POST",
					url: "updateSession.php",
					data: { product_id: this.id},
					dataType: "json",
					success: function(data){
					     // var new = $.parseJSON(data);
					     alert(data.response);
					     // console.log('hi');
					},
					error: function() {console.log('error');}
				});
			});
		});	
	</script>

</body>
</html>