<?php 
require_once('db_connect.php');

$stmt = $db->prepare(“SELECT * FROM drinks WHERE price > ?”);
$bullshit = $stmt->execute();

echo $bullshit;
	
?>