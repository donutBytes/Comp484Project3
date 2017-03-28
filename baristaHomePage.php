<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>

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
	<div class="container-fluid">
		<h1>Bartisa Home</h1>
		<p>
			<a href="pendingOrdersPage.php">Make something </a> 
			or 
			<a href="logoutController.php"> go home</a>
		</p>
	</div>

</body>
</html>