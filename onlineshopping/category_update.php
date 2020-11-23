<?php 
	
	require('db_connect.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$oldphoto = $_POST['oldphoto'];

	$newphoto = $_FILES['photo'];

	if ($newphoto['size'] > 0) {
		$basepath="image/category/";
		$fullpath=$basepath.$newphoto['name']; //photo/category/vote1.jpg
		move_uploaded_file($newphoto['tmp_name'], $fullpath);
	}
	else{
		$fullpath = $oldphoto;
	}

	$sql = "UPDATE categories SET name=:value1, logo=:value2 WHERE id=:value3";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam('value1', $name);
	$stmt->bindParam('value2', $fullpath);
	$stmt->bindParam('value3', $id);
	$stmt->execute();

	header('location:category_list.php');


?>