<?php
	// secure DB credentials
	require_once('vendor/autoload.php');
	$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
	$dotenv->load();
	
	$servername = $_ENV['dbservername'];
	$username = $_ENV['dbusername'];
	$password = $_ENV['dbpassword'];
	$dbname = 'bookdb';

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection Failed: " . $conn->connect_error);
	}
	
	$sql = "select * from book";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo $row['author'];
	}		
	

?>