<?php 
	require 'db_connect.php';
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users
			INNER JOIN model_has_roles
			ON users.id = model_has_roles.user_id
			WHERE email = :value1 AND password = :value2 ";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $email);
	$stmt->bindParam(':value2', $password);
	$stmt->execute();

	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	$_SESSION['login_user'] = $user;

	// var_dump($_SESSION['login_user']); die();

	// customer
	if($user['role_id'] == 2){
		header('location: index.php');
	}
	// admin
	else{
		header('location: category_list.php');

	}


?>