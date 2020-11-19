<?php 
	$servername = "localhost";
	$dbname = "jpbatch4_phpproject";
	$user = "root";
	$password ="";

	$dsn = "mysql:host=$servername; dbname=$dbname";

	$pdo = new PDO($dsn, $user, $password);

	try{
		$conn = $pdo;

		// set the PDO Error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// echo "Connected Successfully.";

	}catch(PDOException $e){
		echo "Connection Failed ".$e->getMessage();
	}

?>