
<?php session_start()?>

<?php
$_SESSION['usname']= null;
$_SESSION['pass']= null;
header("Location:../adminlog.php");
?>