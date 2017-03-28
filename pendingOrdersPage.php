<!DOCTYPE html>
<html>
<head>
	<title>Pending Orders</title>

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
					<a href="baristaHomePage.php" >
						<h6 style="color:white">Home</h1>
					</a>
				</div>				
				<div class="col-1">
					<a href="pendingOrdersPage.php" >
						<h6 style="color:white">Pending Orders</h1>
					</a>
				</div>				
				<div class="col-6"></div>
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
							<th>Size (oz)</th>
							<th>Quantity</th>
							<th>Price</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
							require_once('db_connect.php');

							$stmt = $db->prepare('
								SELECT * 
								FROM orders
								LEFT JOIN products on orders.product_id = products.product_id
								WHERE completed = 0
								');
							$stmt->execute();
							$items = $stmt->fetchAll();
							// var_dump($items[0]);

							$totalPrice = 0;
							$totalSize = 0;
							foreach($items as $item) {
								$entry = '
									<tr>
										<td>'. $item['display_name'] .'</td>
										<td>'. $item['size'] .'</td>
										<td>'. $item['quantity'] .'</td>
										<td>'. $item['price'] .'</td>
										<th scope="row">
											<button class="btn btn-success" id="'. $item['product_id'] .'">Mark Complete</button>
										</th>
									</tr>									
								';
								echo $entry;
								$totalPrice = $totalPrice + $item['price'];
								$totalSize = $totalSize + $item['size'];
							}
						?>
					</tbody>						
				</table>	
				<div class="col-9"></div>		
				<div class="col-3" style="align-right">
					<?php 
						echo '<h5><strong>Total Price: </strong>$'. $totalPrice .'</h5>';
						echo '<h5><strong>Total Size: </strong>$'. $totalSize .'</h5>';
					?>
				</div>
		</div>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('button').click(function() {
				$('#' + $(this).attr('id')).replaceWith('<span class="badge badge-success">Complete!</span>');
				$.ajax({
					type: "POST",
					url: "updateOrder.php",
					data: { product_id: $(this).attr('id') },
					// dataType: "json",
					success: function(data){
					     // var new = $.parseJSON(data);
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