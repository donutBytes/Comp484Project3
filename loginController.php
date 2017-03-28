<?php 
session_start();

require_once('db_connect.php');

$login = $db->prepare('
	SELECT * 
	FROM users 
	LEFT JOIN user_roles on users.username = user_roles.role
	WHERE username = ? AND password = ?
	');

var_dump($login->execute([$_POST['inputUsername'], $_POST['inputPassword']]));

if($login->execute([$_POST['inputUsername'], $_POST['inputPassword']]))
{
	$credentials = $login->fetchAll();
	$_SESSION['role'] = $credentials[0]['role'];
	header('');
}
else 
{
	echo 'Username not valid';
}

// if( $_POST['inputUsername'] && $_POST['inputPassword'])
// {
// 	echo 'made it';
// 	echo "Welcome: ". $_POST['inputUsername']. "<br />";
// 	echo "Your password is: ". $_POST["inputPassword"]. "<br />";
// } 
// else {
// 	echo 'didnt make it';
// }


// $stmt = $db->prepare('SELECT * FROM orders');
// $stmt->execute();
// $bullshit = $stmt->fetchAll();
// var_dump($bullshit);
	
?>