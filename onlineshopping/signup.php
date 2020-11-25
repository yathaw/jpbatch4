<?php 
	
	require 'db_connect.php';

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	
	$profile = 'image/user1.jpg';

	$status = 0;

	$roleid = 2;

	// Insert USER
	$sql = "INSERT INTO users(name, profile, email, password, phone, address, status)
	VALUES (:v1, :v2, :v3, :v4, :v5, :v6, :v7)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':v1', $name);
	$stmt->bindParam(':v2', $profile);
	$stmt->bindParam(':v3', $email);
	$stmt->bindParam(':v4', $password);
	$stmt->bindParam(':v5', $phone);
	$stmt->bindParam(':v6', $address);
	$stmt->bindParam(':v7', $status);
	$stmt->execute();


	// LAST user_id
	$userid = $conn->lastInsertId();


	// Insert model_has_role
	$sql = "INSERT INTO model_has_roles(user_id, role_id) VALUES (:v1, :v2)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':v1', $userid);
	$stmt->bindParam(':v2', $roleid);
	$stmt->execute();

	session_start();

	$_SESSION['reg_success'] = "Yes, It's not easy, but you did it! Please Signin again.";

	header('location: login.php');
















?>