<?php
try {
	$connection = new PDO('mysql:host=localhost; dbname=rentalDB','root', '');
	// echo "Made the connection to the rental database";
} catch (PDOException $e) {
	echo "Error!: ". $e->getMessage(). "<br/>";
	die();
}
?>