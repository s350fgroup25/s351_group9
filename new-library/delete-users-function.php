<?php include("dbcon.php");
$user=$_GET["username"];
mysqli_query($mysqli,"delete from users where username='$user';") or die(mysqli_error($mysqli));
header("Location: delete-users.php");?>