<?php
session_start();
if(isset($_SESSION['usname'])!=''){
	print('VENOM');
	header("Location:index.php?login=success");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELLINS HOSTEL AND ACCOMMODATION | ADMIN</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/log.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-free-5.12.0-web/css/all.css"/>
    <script src="../js/sweetalert/dist/sweetalert.min.js"></script> 
 }
</head>
<body> 
        <form action="login.php" method="post">
             <img src="images\Sekulogo.png"/> 
        <div class="header"><h2>ELLINS HOSTEL AND ACCOMMODATION</h2></div>
            <h6>ADMIN LOGIN</h6>
            <?php
                $fullurl="http://[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullurl, "login=failed")==true){
                    echo"<div class='alert alert-danger p-0'role='alert'>
                     Invalid Username or Password
                    </div>";
                }else if(strpos($fullurl, "login=char")==true){
                    echo"<div class='alert alert-danger p-0'role='alert'>
                     Sorry Username does not exist
                    </div>";
                }

                ?>
            <div class="user form-group">
               
              <input  autocomplete="on" name="usname" class="form-control" type="text" placeholder="Username" required>
            </div>
            <div class="form-group">
              <div class="pass">
              
            </div>
              <input name="pass" class="form-control" type="password" placeholder="Password" required>
            </div>
            <div class="bresh">
             <button class="btn btn-success" name="login" type="submit">Login</button>
             <div>
              <a href="../index.php" class="text-success" style="align:center;">Back To Main Menu</a>
        </form>


</body>
</html>



















    
