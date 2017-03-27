<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="text-center bg-inverse" style="padding: 10px">
			<div class="row">	
				<a href="home" style="align-right" class="col-2">Home</a>
				<div class="col-8">
					<h1 style="color:white">Welcome to BaristaVille</h1>
				</div>
				<a href="loginPage" class="col-2">Login</a>
			</div>
		</div>
		<br>
		<form action="/loginController.php" method="get">
			<div class="form-group" align="center" >
				<label for="inputUsername" class="font-weight-bold">Email address</label>
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<input type="username" class="form-control" id="inputUsername" aria-describedby="usernameHelp" placeholder="Enter Username" required="true">
					</div>
				</div>
				<small id="usernameHelp" class="form-text text-muted">Enter your capitalist e-mail so you can work you vanilla job.</small>
			</div>
			<div class="form-group" align="center">
				<label for="inputPassword" class="font-weight-bold">Password</label>
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password" required="true">
					</div>
				</div>
				<small id="passwordNote" class="form-text text-muted">Make sure your password is the same as your Username.</small>
			</div>
			<div class="form-group" align="center">
				<a class="nav-link" href="Inbox.html#" style="color:black">
					<button class="btn btn-primary font-weight-bold">
						Sign In
					</button> 
				</a>
			</div>

		</form>
	</div>

</body>
</html>