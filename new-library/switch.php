<?php if ($_POST["username"]=="admin" and $_POST["password"]=="admin"){
    header("Location: admin-board.php");
}
else{
    include("dbcon.php");
    $username=$_POST["username"];
    $password=$_POST["password"];
    $result=mysqli_query($mysqli,"select * from users where username='$username' and password='$password';");
    if (mysqli_num_rows($result)==0){
        header("Location: index.php?wrong=true");
    }
    else{
        header("Location: member-board.php?username=$username&password=$password");
    }
}?>