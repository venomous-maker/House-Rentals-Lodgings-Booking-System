<?php

	include 'db.php';

	if (isset($_POST['update'])){

		$id = $_POST['foodid'];

		$name = $_POST['foodname'];
		$type = $_POST['foodtype'];
		$price = $_POST['foodprice'];
		$file_name = $_FILES['foodimage']['name'];
		$file_temp = $_FILES['foodimage']['tmp_name'];
		$folder = '../images/';
		$desc = $_POST['fooddesc'];

		move_uploaded_file($file_temp, $folder.$file_name);

		$query = "UPDATE menu SET NAME_OF_FOOD='$name', CAT_OF_FOOD='$type', PRICE='$price', IMAGES='$file_name', DESCRIPTION='$desc' WHERE FOOD_ID='$id'";
		$query_run = mysqli_query($connect,$query);

		if($query_run){
			echo '<script> alert("Data Updated"); </script>';
			header("Location: ../meals_menu.php");
		}else{
			echo '<script> alert("Data Not Updated"); </script>';
			header("Location: ../meals_menu.php");
		}
	}
?>