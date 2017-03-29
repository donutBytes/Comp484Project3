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
		
							$totalCost = 0;
							$totalSize = 0;
							foreach($products as $item) {

								if($item['order_id'] != $indexId) {
									$indexId--;
									echo '
												</tbody>
											</table>
											<div>
												<div class="row"><strong>Total Cost: </strong> $'.$totalCost.'</div>
												<div class="row"><strong>Total Size: </strong> $'.$totalSize.'</div>
											</div>
										</div>
										<br>
										<div>
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
									$totalCost = 0;
									$totalSize = 0;
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
								$totalCost = $item['price'];
								$totalSize = $item['size'];
								echo $entry;
							}
							echo '
									</tbody>
								<table>
							';
							// var_dump($products);
						?>