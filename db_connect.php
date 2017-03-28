<?php

// $conn = 'mysql:host=localhost;dbname=tsarbucks';
$conn = 'mysql:host=127.0.0.1;port=3306;dbname=tsarbucks';

try {
   $db = new PDO($conn, 'root', '', [
      PDO::ATTR_PERSISTENT => true
   ]); // use the proper root credentials
}
catch(PDOException $e) {
   die('Could not connect: ' . $e->getMessage());
}

?>