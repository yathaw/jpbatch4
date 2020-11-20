<?php 
	
	require 'db_connect.php';

	$name=$_POST['name'];
	// $image=$_FILES['image'];

	$unitprice=$_POST['unitprice'];
	$discount=$_POST['discount'];
	$description=$_POST['description'];
	$brand=$_POST['brand'];
	$subcategory=$_POST['category'];

	$source_dir="image/item/";
	

	$fileNames_arr = array(); 

	foreach($_FILES['images']['name'] as $key=>$val){ 

		$file_name = mt_rand(100000, 999999);
  		$file_exe_array = explode('.', $_FILES['images']['name'][$key]);
  		$file_exe = $file_exe_array[1];

  		$file_path=$source_dir.$file_name.'.'.$file_exe;

		array_push($fileNames_arr, $file_path);

		move_uploaded_file($_FILES['images']['tmp_name'][$key],$file_path);
    } 

	$codeno = "OP_".mt_rand(100000, 999999);

	$fileNames = implode("|",$fileNames_arr);


	$sql="INSERT into items (codeno, name, photo, price, discount, description, brand_id, subcategory_id) VALUES(:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8)";
	$stmt= $pdo->prepare($sql);
	$stmt->bindParam(':value1',$codeno);
	$stmt->bindParam(':value2',$name);
	$stmt->bindParam(':value3',$fileNames);
	$stmt->bindParam(':value4',$unitprice);
	$stmt->bindParam(':value5',$discount);
	$stmt->bindParam(':value6',$description);
	$stmt->bindParam(':value7',$brand);
	$stmt->bindParam(':value8',$subcategory);

	$stmt->execute();

    // $last_id = $pdo->lastInsertId();

	if($stmt->rowCount()){
		header("location:item_list.php");
	}
	else{
		echo " Error !";
	}



?>