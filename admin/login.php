
<?php 
include "db.php";
?>
<?php include 'includes/header.php';?>
<?php
//session_start();
if(isset($_SESSION['usname'])!=''){
	header("Location:index.php?login=success");
}
?>
<?php
if(isset($_POST['login'])){
 $usname= $_POST['usname'];
 $pass= $_POST['pass'];
 


$query = "SELECT * FROM admin WHERE Usname='".$usname."'";
$select_query=mysqli_query($connect,$query);
if(!$select_query){


	die("query failed".mysqli_error($connect));

}


while($row = mysqli_fetch_array($select_query))
	{
		 $db_id = $row['id'];
		 $db_username = $row['usname'];
		 $db_password = $row['pass'];
		 $decrypt = password_verify($pass,$db_password);
	}
if($usname !== $db_username && $decrypt!== 1){
	  ;
	header("Location:adminlog.php?login?login=char");


	
	}
elseif($usname == $db_username && $decrypt == 1){
	$_SESSION['usname']= $db_username;
	$_SESSION['pass']= $db_password;
	header("Location:index.php?login=success");
 }
 else
 {

 	header("Location:adminlog.php?login=failed");
 }
}
?>
</script>
