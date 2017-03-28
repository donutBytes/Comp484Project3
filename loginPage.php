<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

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
					<a href="homePage.php" >
						<h6 style="color:white">Home</h1>
					</a>
				</div>				
				<div class="col-8"></div>
				<div class="col-1">
					<a href="loginPage.php" style="align-right">
						<h6 style="color:white">Login</h1>
					</a>
				</div>				
			</div>
		</div>
	</div>
		<br>
		<form action="loginController.php" method="post">
			<div class="form-group" align="center" >
				<label for="inputUsername" class="font-weight-bold">Username</label>
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<input type="text" class="form-control" name="inputUsername" id="inputUsername" aria-describedby="usernameHelp" placeholder="Enter Username" required="true">
					</div>
				</div>
				<small id="usernameHelp" class="form-text text-muted">Enter your capitalist username so you can work you vanilla job.</small>
			</div>
			<div class="form-group" align="center">
				<label for="inputPassword" class="font-weight-bold">Password</label>
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" required="true">
					</div>
				</div>
				<small id="passwordNote" class="form-text text-muted">Make sure your password is the same as your Username.</small>
			</div>
			<div class="form-group" align="center">
				<button class="btn btn-primary font-weight-bold" type="submit" id="submit">
					Sign In
				</button>
			</div>
		</form>
		<div id="loginFail"></div>
	</div>

<!-- 	<script type="text/javascript">
		$(document).ready(function() {
			$('#submit').click(function() {
				$.ajax({
					type: 'POST',
					url: "loginController.php",
					success: function(data) {
						console.log('hi');
						if(data) {
							window.location.href = data;
						} else {
							// $('#loginFail').html('<h4>Username or Password not Valid</h4>');
						}
					},
					failure: function() {
						console.log('didnt make it');
					}
				});
			});
		});
	</script>
 -->
</body>
</html>