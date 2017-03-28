<?php 

require_once('db_connect.php');

$login = $db->prepare('
	SELECT * 
	FROM users 
	LEFT JOIN user_roles on users.username = user_roles.role
	WHERE username = ? AND password = ?
	');

$login->execute([$_POST['inputUsername'], $_POST['inputPassword']]);
$results = $login->fetch();
// var_dump($results);

if(sizeof($results) > 0)
{
	var_dump($results);
	session_start();
	$_SESSION['role'] = $results['role'];
	header('Location: ' . $results['role'] . 'HomePage.php'); 
	exit();
}
else 
{
	header('Location: loginPage.php');
	exit();
}
	
?>