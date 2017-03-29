<!DOCTYPE html>
<html>
<head>
	<title>Menu Page</title>

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
						Welcome Barista!
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
							require_once('db_connect.php');

							$stmt = $db->prepare('SELECT * FROM products');
							$stmt->execute();
							$items = $stmt->fetchAll();
							// var_dump($items[0]);

							foreach($items as $item) {
								$entry = '
									<tr>
										<td>'. $item['display_name'] .'</td>
										<td>'. $item['price'] .'</td>
										<td>'. $item['size'] .'</td>
										<th scope="row">
											<button class="btn btn-primary" id="'. $item['product_id'] .'">Add to Cart</button>
										</th>
									</tr>									
								';
								echo $entry;
							}
						?>
					</tbody>						
				</table>			
		</div>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('button').click(function() {
				$.ajax({
					type: "POST",
					url: "updateCart.php",
					data: { product_id: this.id },
					// dataType: "json",
					success: function(data){
						console.log('success');
					    // parsed = $.parseJSON(data);
					    // alert(data);
					    // console.log('hi');
					},
					error: function() {console.log('error');}
				});
			});
		});	
	</script>

</body>
</html>