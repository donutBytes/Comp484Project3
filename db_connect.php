<?php

$conn = “mysql:host=localhost;dbname=tsarbucks”;

try {
   $db = new PDO($conn, “root”, “root”, [
      PDO::ATTR_PERSISTENT => true
   ]); // use the proper root credentials
}
catch(PDOException $e) {
   die(“Could not connect: “ . $e->getMessage());
}

?>